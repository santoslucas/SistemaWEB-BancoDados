<?php

$c = oci_connect("ECLBDIT207", "Cebcdhj2702@", "bdengcomp_low");
if (!$c) {
    $m = oci_error();
    trigger_error("Could not connect to database: ". $m["message"], E_USER_ERROR);
}

if($_POST['Email'] && $_POST['Nome'] && $_POST['Senha'] && $_POST['CNPJ']){

    
    $s = oci_parse($c, "INSERT INTO USUARIO VALUES (:1, :2, :3)");
    if (!$s) {
        $m = oci_error($c);
        trigger_error("Não pôde compilar a sentença: ". $m["message"], E_USER_ERROR);
    }

    oci_bind_by_name($s, ":1", $_POST['Email']);
    oci_bind_by_name($s, ":2", $_POST['Nome']);
    oci_bind_by_name($s, ":3", $_POST['Senha']);
    
    $r = oci_execute($s, OCI_NO_AUTO_COMMIT); // for PHP <= 5.3.1 use OCI_DEFAULT instead

    if (!$r) {
        $m = oci_error($s);
        trigger_error("Não pôde executar a sentença: ". $m["message"], E_USER_ERROR);
    }

    oci_commit($c);
}

if($_POST['Email'] && $_POST['Nome'] && $_POST['Senha'] && $_POST['CNPJ']){
    //inserir promotor
    $s = oci_parse($c, "INSERT INTO PROMOTOR VALUES (:1, :4)");
    if (!$s) {
        $m = oci_error($c);
        trigger_error("Não pôde compilar a sentença: ". $m["message"], E_USER_ERROR);
    }

    oci_bind_by_name($s, ":1", $_POST['Email']);
    oci_bind_by_name($s, ":4", $_POST['CNPJ']);
    
    $r = oci_execute($s, OCI_NO_AUTO_COMMIT); // for PHP <= 5.3.1 use OCI_DEFAULT instead

    if (!$r) {
        $m = oci_error($s);
        trigger_error("Não pôde executar a sentença: ". $m["message"], E_USER_ERROR);
    }


    oci_commit($c);

}


?>

