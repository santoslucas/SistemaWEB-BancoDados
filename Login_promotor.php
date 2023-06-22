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
        <form action="Verificar_login_promotor.php" method="post">
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
        <br>
        <p>Quer ser um promotor? <a href="Form_cadastrar_promotor.php">Criar conta</a></p>
    </div>
</body>
<link rel="stylesheet" href="css/Style_login.css">
</html>