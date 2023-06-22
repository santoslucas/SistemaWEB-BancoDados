<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <div class="header">
        <h1>TESSERACT</h1>
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
