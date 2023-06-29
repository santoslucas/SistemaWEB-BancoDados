<!DOCTYPE html>
<html>
<head>
<title>Selecionar Cadastro</title>
</head>
<body>
    <div class="header">
        <h1><a href="Pagina_principal.php" style="color: white; text-decoration: none;">TESSERACT</a></h1>
        <div class="buttons">
            <?php
            session_start();
            if (isset($_SESSION['email'])) {
                $email = $_SESSION['email'];
                echo '<a href="perfil.php">' . $email . '</a>';
            }
            ?>
             <a href="Redireciona_principal.php" class="logout"><?php if(isset($_SESSION['email'])) echo 'Sair'; else echo 'Login'; ?></a>
        </div>
    </div>
    <div class="form-container">
    <h1>Selecione o tipo de cadastro:</h1>
        <ul>
            <li><a href="Form_cadastrar_cliente.php">Cadastrar Cliente</a></li>
            <li><a href="Form_cadastrar_promotor.php">Cadastrar Promotor</a></li>
        </ul>
    </div>
</body>
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/Style_login.css">
</html>
