<?php
    session_start();
    // Verificar se o usuário está logado, caso contrário, redirecionar para a tela de login
    if (!isset($_SESSION['email'])) {
        header('Location: Login_cliente.php');
        exit;
    }

// Aqui você pode obter as informações do promotor a partir da sessão
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Página do Cliente</title>
</head>
<body>
    <h2>Informações do Cliente</h2>
    <p>Email: <?php echo $email; ?></p>

    <h3>Opções</h3>
    <ul>
        <li><a href="Cliente_consulta_ingresso.php">Consultar Ingressos</a></li>
    </ul>

    <p><a href="Login_cliente.php">Sair</a></p>
</body>
</html>