<?php

$c = oci_connect("ECLBDIT207", "Cebcdhj2702@", "bdengcomp_low");
if (!$c) {
    $m = oci_error();
    trigger_error("Could not connect to database: ". $m["message"], E_USER_ERROR);
}

if($_POST['ID'] && $_POST['ID_evento'] && $_POST['Desconto']){

    //verifica se o evento ao qual se deseja atribuir o cupom existe
    $IDEvento = $_POST['ID_evento'];
    $query = "SELECT * FROM CUPOM C INNER JOIN EVENTO E ON C.ID_evento = E.ID WHERE E.ID = :IDEvento";
    $stmt = oci_parse($c, $query);
    oci_bind_by_name($stmt, ":IDEvento", $IDEvento);

    oci_execute($stmt);

    $row = oci_fetch_assoc($stmt);
    if ($row) {
        //evento existe

        $s = oci_parse($c, "INSERT INTO CUPOM VALUES (:1, :2, :3)"); //cria cupom
        if (!$s) {
            $m = oci_error($c);
            trigger_error("Não pôde compilar a sentença: ". $m["message"], E_USER_ERROR);
        }

        oci_bind_by_name($s, ":1", $_POST['ID']);
        oci_bind_by_name($s, ":2", $_POST['ID_evento']);
        oci_bind_by_name($s, ":3", $_POST['Desconto']);

        $r = oci_execute($s, OCI_NO_AUTO_COMMIT); // for PHP <= 5.3.1 use OCI_DEFAULT instead

        if (!$r) {
            $m = oci_error($s);
            trigger_error("Não pôde executar a sentença: ". $m["message"], E_USER_ERROR);
        }

        oci_commit($c);
        
        echo "Cupom criado!";

    } else {
        //evento não existe
        echo "O evento de ID :IDEvento não existe";
    }
    
    

}
    
    //header("Location: pagina_evento.php?id=" . $_POST['ID'] . "&nome=" . urlencode($nomeEvento));
    exit;

?>

