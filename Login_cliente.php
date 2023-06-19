
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            text-align: center;
        }
        form label, form input[type="submit"] {
            display: block;
            margin: 10px auto;
            text-align: left;
            width: 200px;
        }
        p {
            text-align: center;
        }
        .login-title {
            text-align: center;
            color: purple;
            font-size: 24px;
        }
        .login-input {
            display: block;
            margin: 0 auto;
            width: 200px;
        }
        .create-account {
            text-align: center;
            margin-top: 20px;
        }
        .create-account p {
            margin: 0;
        }
    </style>
</head>
<body>
    <h2 class="login-title">Login</h2>
    <form action="Verificar_login_cliente.php" method="post">
        <label for="email">Email:</label>
        <input class="login-input" type="email" id="email" name="email" required><br>
        <label for="senha">Senha:</label>
        <input class="login-input" type="password" id="senha" name="senha" required><br>
        <input type="submit" value="Entrar">
    </form>
    <br>
    <p class="create-account">Não tenho uma conta. <a href="Form_cadastrar_cliente.php">Criar conta</a></p>
</body>
</html>