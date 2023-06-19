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
    
    // Aqui você pode obter as informações do cliente a partir da sessão
    $email = $_SESSION['email'];

    if(isset($_GET['id'])) {
        $eventoID = $_GET['id'];
        $_SESSION['eventoID'] = $eventoID;
    }

    $query = "SELECT * FROM EVENTO E WHERE E.ID = '$eventoID'";
    $stmt = oci_parse($c, $query);
    oci_execute($stmt);

    // Recupere os dados do evento em um array associativo
    $evento = oci_fetch_assoc($stmt);

    // Atribua os valores das colunas a variáveis individuais
    $nome = $evento['NOME'];
    $descricao = $evento['DESCRICAO'];
    $valor = $evento['VALOR'];
    $local = $evento['LOCAL'];
    $qtd_ingressos = $evento['QTD_INGRESSOS'];
    $email_promotor = $evento['EMAIL_PROMOTOR'];
    
    $query = "SELECT * FROM USUARIO U WHERE U.Email = '$email_promotor'";
    $stmt = oci_parse($c, $query);
    oci_execute($stmt);

    // Recupere os dados do promotor em um array associativo
    $promotor = oci_fetch_assoc($stmt);
    $nome_promotor = $promotor['NOME'];
?>


<!DOCTYPE html>
<html>
<head>
    <h1><?php echo $nome; ?></h1>
</head>
<body>
    <h3>Descricao:</h3>
    <p><?php echo $descricao; ?></p>
    <p><a href="Form_comprar_ingresso.php">Comprar</a></p>
</body>
</html>