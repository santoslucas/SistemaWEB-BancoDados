<?php
session_start();

// Verificar se o usuário está logado, caso contrário, redirecionar para a tela de login
if (!isset($_SESSION['email'])) {
    header('Location: Verificar_login_promotor.php');
    exit;
}

// Aqui você pode obter as informações do promotor a partir da sessão
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Página do Promotor</title>
</head>
<body>
    <h2>Informações do Promotor</h2>
    <p>Email: <?php echo $email; ?></p>
    <p>Nome: <?php echo $nome_promotor; ?></p>

    <h3>Opções</h3>
    <ul>
        <li><a href="Form_inserir_evento.php">Cadastrar Evento</a></li>
        <li><a href="Form_cadastrar_cupom.php">Cadastrar Cupom</a></li>
    </ul>

    <p><a href="Login_promotor.php">Sair</a></p>
</body>
</html>