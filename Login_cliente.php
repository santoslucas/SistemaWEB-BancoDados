<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <div class="header">
        <h1>TESSERACT</h1>
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
        <h2>Login</h2>
        <form method="POST" action="Verificar_login_cliente.php">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>

            <input type="submit" value="Entrar">
        </form>
        <p>Não tenho uma conta. <a href="Form_cadastrar_cliente.php">Criar conta</a></p>
    </div>
</body>
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/Style_login.css">
</html>
