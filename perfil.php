<?php 
    session_start();
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
    }
    else{
        header("Location: Pagina_principal.php");
    }
    
    $c = oci_connect("ECLBDIT207", "Cebcdhj2702@", "bdengcomp_low");
    if (!$c) {
        $m = oci_error();
        trigger_error("Could not connect to database: ". $m["message"], E_USER_ERROR);
    }
    $s = oci_parse($c, "SELECT * FROM CLIENTE e WHERE e.Email = '$email'");
    if (!$s) {
        $m = oci_error($c);
        trigger_error("Could not parse statement: ". $m["message"], E_USER_ERROR);
    }
    oci_execute($s);

    $row = oci_fetch_assoc($s);
    if ($row) {
        header("Location: Tela_cliente.php");
    }
    else{
        header("Location: Tela_promotor.php");
    }
?>