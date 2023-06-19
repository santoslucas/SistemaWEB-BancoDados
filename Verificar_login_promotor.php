<?php
    session_start();
    $c = oci_connect("ECLBDIT207", "Cebcdhj2702@", "bdengcomp_low");
    if (!$c) {
        $m = oci_error();
        trigger_error("Could not connect to database: ". $m["message"], E_USER_ERROR);
    }

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $query = "SELECT * FROM usuario u INNER JOIN promotor p ON u.email = p.email WHERE p.email = :email AND u.senha = :senha";
    $stmt = oci_parse($c, $query);
    oci_bind_by_name($stmt, ":email", $email);
    oci_bind_by_name($stmt, ":senha", $senha);
    oci_execute($stmt);

    $row = oci_fetch_assoc($stmt);
    if ($row) {
        // Login bem-sucedido
        echo "Login bem-sucedido!";
        $_SESSION['email'] = $email;
        header("Location: Tela_promotor.php");
    } else {
        // Login falhou
        session_destroy();
        echo "Email ou senha inválidos.";
    }
    
    oci_free_statement($stmt);
    oci_close($c);

?>