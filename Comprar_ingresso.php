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

    if($_POST['numInteira'] && $_POST['numMeia']){
        $numInteira = $_POST['numInteira'];
        $numMeia = $_POST['numMeia'];

        if ($_POST['IDcupom']){
            $IDcupom = $_POST['IDcupom'];
            $s = oci_parse($c, "UPDATE INGRESSO SET Email_cliente = '$emailCliente', ID_cupom = '$IDcupom' WHERE Email_cliente IS NULL and Tipo = 'Inteira' LIMIT '$numInteira';");
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

            $s = oci_parse($c, "UPDATE INGRESSO SET Email_cliente = '$emailCliente', ID_cupom = '$IDcupom' WHERE Email_cliente IS NULL and Tipo = 'Meia' LIMIT '$numMeia';");
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

        else{
            $s = oci_parse($c, "UPDATE INGRESSO SET Email_cliente = '$emailCliente' WHERE Email_cliente IS NULL and Tipo = 'Inteira' LIMIT '$numInteira';");
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

            $s = oci_parse($c, "UPDATE INGRESSO SET Email_cliente = '$emailCliente' WHERE Email_cliente IS NULL and Tipo = 'Meia' LIMIT '$numMeia';");
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
    }
?>