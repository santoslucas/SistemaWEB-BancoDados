<?php
    session_start();

    $c = oci_connect("ECLBDIT207", "Cebcdhj2702@", "bdengcomp_low");
    if (!$c) {
        $m = oci_error();
        trigger_error("Could not connect to database: ". $m["message"], E_USER_ERROR);
    }

    // Verificar se o usuário está logado, caso contrário, redirecionar para a tela de login
    if (!isset($_SESSION['email'])) {
        header('Location: Login_cliente.php');
        exit;
    }
    $emailCliente = $_SESSION['email'];

    if (!isset($_SESSION['eventoID'])) {
        header('Location: Pagina_principal.php');
        exit;
    } 

    $eventoID = $_SESSION['eventoID'];

    if($_POST['numInteira'])
        $numInteira = $_POST['numInteira'];
    else
        $numInteira = 0;
    if($_POST['numMeia'])
        $numMeia = $_POST['numMeia'];
    else
        $numMeia = 0;

    // Pega quantidade de ingressos
    // qtd de inteiras
    $qtdInteira=0;
    $qtdMeia=0;
    $s = oci_parse($c, "SELECT COUNT(ID) as quantidade FROM INGRESSO WHERE ID_evento='$eventoID' and Tipo='Inteira' and Email_cliente is null group by ID_evento");
    
    if (!$s) {
        $m = oci_error($c);
        trigger_error("Não pôde compilar a sentença: ". $m["message"], E_USER_ERROR);
    }

    $r = oci_execute($s, OCI_NO_AUTO_COMMIT); // for PHP <= 5.3.1 use OCI_DEFAULT instead

    if (!$r) {
        $m = oci_error($s);
        trigger_error("Não pôde executar a sentença: ". $m["message"], E_USER_ERROR);
    }

    if ($row = oci_fetch_assoc($s)) {
        $qtdInteira = $row["QUANTIDADE"];
    }

    // qtd de meias
    $s = oci_parse($c, "SELECT COUNT(ID) as quantidade FROM INGRESSO WHERE ID_evento='$eventoID' and Tipo='Meia' and Email_cliente is null group by ID_evento");

    if (!$s) {
        $m = oci_error($c);
        trigger_error("Não pôde compilar a sentença: ". $m["message"], E_USER_ERROR);
    }

    $r = oci_execute($s, OCI_NO_AUTO_COMMIT); // for PHP <= 5.3.1 use OCI_DEFAULT instead

    if (!$r) {
        $m = oci_error($s);
        trigger_error("Não pôde executar a sentença: ". $m["message"], E_USER_ERROR);
    }

    if ($row = oci_fetch_assoc($s)) {
        $qtdMeia = $row["QUANTIDADE"];
    }

    // Redireciona caso numero de ingressos extrapole o numero disponivel
    if($qtdInteira < $numInteira || $qtdMeia < $numMeia){
        header('Location: Erro_Compra_Ingressos.php');
        exit;
    }
    
    $total = 0.00;
    if ($_POST['IDcupom']){
        $IDcupom = $_POST['IDcupom'];

        $query = "SELECT C.ID, C.Desconto FROM CUPOM C WHERE C.ID = '$IDcupom' and C.ID_evento = '$eventoID'";
        $s = oci_parse($c, $query);
        if (!$s) {
            $m = oci_error($c);
            trigger_error("Não pôde compilar a sentença: ". $m["message"], E_USER_ERROR);
        }

        $r = oci_execute($s);

        if (!$r) {
            $m = oci_error($s);
            trigger_error("Não pôde executar a sentença: ". $m["message"], E_USER_ERROR);
        }

        $rowDesc = oci_fetch_assoc($s);

        if ($rowDesc) {

            for ($i = 0; $i < $numInteira; $i++) {
                $s = oci_parse($c, "UPDATE INGRESSO SET Email_cliente = '$emailCliente', ID_cupom = '$IDcupom' 
                                    where id = (SELECT MIN(ID) FROM ingresso WHERE Email_cliente IS NULL and Tipo = 'Inteira' and ID_evento = '$eventoID') and ID_evento = '$eventoID'");
                if (!$s) {
                    $m = oci_error($c);
                    trigger_error("Não pôde compilar a sentença: ". $m["message"], E_USER_ERROR);
                }
            
                $r = oci_execute($s, OCI_NO_AUTO_COMMIT); // for PHP <= 5.3.1 use OCI_DEFAULT instead
            
                if (!$r) {
                    $m = oci_error($s);
                    trigger_error("Não pôde executar a sentença: ". $m["message"], E_USER_ERROR);
                }

                oci_commit($c);
            }

            for ($i = 0; $i < $numMeia; $i++) {
                $s = oci_parse($c, "UPDATE INGRESSO SET Email_cliente = '$emailCliente', ID_cupom = '$IDcupom' 
                                    where id = (SELECT MIN(ID) FROM ingresso WHERE Email_cliente IS NULL and Tipo = 'Meia' and ID_evento = '$eventoID') and ID_evento = '$eventoID'");
                if (!$s) {
                    $m = oci_error($c);
                    trigger_error("Não pôde compilar a sentença: ". $m["message"], E_USER_ERROR);
                }
            
                $r = oci_execute($s, OCI_NO_AUTO_COMMIT); // for PHP <= 5.3.1 use OCI_DEFAULT instead
            
                if (!$r) {
                    $m = oci_error($s);
                    trigger_error("Não pôde executar a sentença: ". $m["message"], E_USER_ERROR);
                }
            
                oci_commit($c);
            }

            // Calcula valor ingressos
            $total = 0;
            $s = oci_parse($c, "SELECT VALOR FROM INGRESSO WHERE ID_evento = '$eventoID' and Tipo = 'Inteira' GROUP BY VALOR");
            if (!$s) {
            $m = oci_error($c);
                trigger_error("Não pôde compilar a sentença: ". $m["message"], E_USER_ERROR);
            }

            $r = oci_execute($s, OCI_NO_AUTO_COMMIT); // for PHP <= 5.3.1 use OCI_DEFAULT instead

            if (!$r) {
                $m = oci_error($s);
                trigger_error("Não pôde executar a sentença: ". $m["message"], E_USER_ERROR);
            }

            if ($row = oci_fetch_assoc($s)) {
                if($numInteira > 0) $total += $row["VALOR"]*$numInteira * (1.00 - ($rowDesc["DESCONTO"] * 0.01));
                if($numMeia > 0) $total += ($row["VALOR"]/2)*$numMeia * (1.00 - ($rowDesc["DESCONTO"] * 0.01));
            } 

            $_SESSION['total'] = $total;
        }

        else{
            header('Location: Form_errCupom_Comprar_Ingresso.php');
            exit;
        }
    }


    // sem cupom
    else{
        for ($i = 0; $i < $numInteira; $i++) {
            $s = oci_parse($c, "UPDATE INGRESSO SET Email_cliente = '$emailCliente' 
                            where id = (SELECT MIN(ID) FROM ingresso WHERE Email_cliente IS NULL and Tipo = 'Inteira' and ID_evento = '$eventoID') and ID_evento = '$eventoID'");
            if (!$s) {
                $m = oci_error($c);
                trigger_error("Não pôde compilar a sentença: ". $m["message"], E_USER_ERROR);
            }
        
            $r = oci_execute($s, OCI_NO_AUTO_COMMIT); // for PHP <= 5.3.1 use OCI_DEFAULT instead
        
            if (!$r) {
                $m = oci_error($s);
                trigger_error("Não pôde executar a sentença: ". $m["message"], E_USER_ERROR);
            }

            oci_commit($c);
        }
        
        for ($i = 0; $i < $numMeia; $i++) {
            $s = oci_parse($c, "UPDATE INGRESSO SET Email_cliente = '$emailCliente'
                                where id = (SELECT MIN(ID) FROM ingresso WHERE Email_cliente IS NULL and Tipo = 'Meia' and ID_evento = '$eventoID') and ID_evento = '$eventoID'");
            if (!$s) {
                $m = oci_error($c);
                trigger_error("Não pôde compilar a sentença: ". $m["message"], E_USER_ERROR);
            }
        
            $r = oci_execute($s, OCI_NO_AUTO_COMMIT); // for PHP <= 5.3.1 use OCI_DEFAULT instead
        
            if (!$r) {
                $m = oci_error($s);
                trigger_error("Não pôde executar a sentença: ". $m["message"], E_USER_ERROR);
            }
        
            oci_commit($c);
        }

        // Calcula valor ingressos
        $total = 0;
        $s = oci_parse($c, "SELECT VALOR FROM INGRESSO WHERE ID_evento = '$eventoID' and Tipo = 'Inteira' GROUP BY VALOR");
        if (!$s) {
        $m = oci_error($c);
            trigger_error("Não pôde compilar a sentença: ". $m["message"], E_USER_ERROR);
        }

        $r = oci_execute($s, OCI_NO_AUTO_COMMIT); // for PHP <= 5.3.1 use OCI_DEFAULT instead

        if (!$r) {
            $m = oci_error($s);
            trigger_error("Não pôde executar a sentença: ". $m["message"], E_USER_ERROR);
        }

        if ($row = oci_fetch_assoc($s)) {
            if($numInteira > 0) $total += $row["VALOR"]*$numInteira;
            if($numMeia > 0) $total += ($row["VALOR"]/2)*$numMeia;
        } 
        
        $_SESSION['total'] = $total;
    }

    header('Location: Compra_concluida.php');
?>