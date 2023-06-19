<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            background-color: #E6E6FA; /* Código hexadecimal para a cor roxo lilás claro */
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #9370DB; /* Código hexadecimal para a cor roxo médio */
            text-align: center;
            padding: 20px;
        }

        .header h1 {
            color: #FFFFFF; /* Código hexadecimal para a cor branca */
            font-size: 40px;
            margin: 0;
        }

        .form-container {
            text-align: center;
            border: 2px solid black;
            padding: 20px;
            border-radius: 10px;
            margin: 20px auto;
            max-width: 400px;
            display: flex;
            flex-direction: column;
            align-items: center; /* Centraliza verticalmente */
        }

        .form-group {
            display: flex;
            align-items: center;
            justify-content: center; /* Centraliza horizontalmente */
            margin-bottom: 10px;
        }

        .form-group label {
            margin-right: 10px;
        }
    </style>
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
</html>