<?php

$c = oci_connect("ECLBDIT207", "Cebcdhj2702@", "bdengcomp_low");
if (!$c) {
    $m = oci_error();
    trigger_error("Could not connect to database: ". $m["message"], E_USER_ERROR);
}

if($_POST['ID'] && $_POST['Nome'] && $_POST['Descricao'] && $_POST['Valor']
&& $_POST['Local'] && $_POST['Qtd_ingressos'] && $_POST['Email_promotor']){
    
    $s = oci_parse($c, "INSERT INTO EVENTO VALUES (:1, :2, :3, :4, :5, :6, :7)");
    if (!$s) {
        $m = oci_error($c);
        trigger_error("Não pôde compilar a sentença: ". $m["message"], E_USER_ERROR);
    }

    oci_bind_by_name($s, ":1", $_POST['ID']);
    oci_bind_by_name($s, ":2", $_POST['Nome']);
    oci_bind_by_name($s, ":3", $_POST['Descricao']);
    oci_bind_by_name($s, ":4", $_POST['Valor']);
    oci_bind_by_name($s, ":5", $_POST['Local']);
    oci_bind_by_name($s, ":6", $_POST['Qtd_ingressos']);
    oci_bind_by_name($s, ":7", $_POST['Email_promotor']);
    $r = oci_execute($s, OCI_NO_AUTO_COMMIT); // for PHP <= 5.3.1 use OCI_DEFAULT instead

    if (!$r) {
        $m = oci_error($s);
        trigger_error("Não pôde executar a sentença: ". $m["message"], E_USER_ERROR);
    }

    oci_commit($c);

}
    //print "Empregado (".$_POST['emp_id'].", ".$_POST['emp_nome'].", ". $_POST['emp_cargo'].", ".$_POST['emp_num_dep']. ") inserido.";
    // Redirecionar para a página do evento

    if($_POST['ID'] && $_POST['Nome'] && $_POST['Descricao'] && $_POST['Valor']
    && $_POST['Local'] && $_POST['Qtd_ingressos'] && $_POST['Email_promotor']){
        
    

    //----------------------LOGICA INSERIR INGRESSOS--------------------------------------
    $idEvento = $_POST['ID'];
    $qtdIngressos = $_POST['Qtd_ingressos'];
    $valorIngresso = $_POST['Valor'];
    $valorMeia = $valorIngresso/2;
    $tipoMeia = "Meia";
    $tipoInteira = "Inteira";
    

    //INSERIR MEIA
    for ($i = 1; $i <= $qtdIngressos/2; $i++) { //insere ingressos do tipo meia
        $s = oci_parse($c, "INSERT INTO INGRESSO VALUES ('$i','$idEvento','$valorMeia', '$tipoMeia',NULL,NULL)");
        if (!$s) {
            $m = oci_error($c);
            trigger_error("Não pôde compilar a sentença: " . $m["message"], E_USER_ERROR);
        }


        $r = oci_execute($s, OCI_NO_AUTO_COMMIT);

        if (!$r) {
            $m = oci_error($s);
            trigger_error("Não pôde executar a sentença: " . $m["message"], E_USER_ERROR);
        }
    }

    //INSERIR INTEIRA
    for ($i = ($qtdIngressos/2)+1; $i <= $qtdIngressos; $i++) { //insere ingressos do tipo inteira
        $s = oci_parse($c, "INSERT INTO INGRESSO VALUES ('$i','$idEvento','$valorIngresso','$tipoInteira',NULL,NULL)");
        if (!$s) {
            $m = oci_error($c);
            trigger_error("Não pôde compilar a sentença: " . $m["message"], E_USER_ERROR);
        }


        $r = oci_execute($s, OCI_NO_AUTO_COMMIT);

        if (!$r) {
            $m = oci_error($s);
            trigger_error("Não pôde executar a sentença: " . $m["message"], E_USER_ERROR);
        }
    }

    oci_commit($c);

}
    //--------------------------------------------------------------------------------------

    //header("Location: pagina_evento.php?id=" . $_POST['ID'] . "&nome=" . urlencode($nomeEvento));
    exit;

?>

