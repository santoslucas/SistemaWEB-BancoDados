<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <style>
    body {
      background-color: #E6E6FA; /* Código hexadecimal para a cor roxo lilás claro */
    }

    html, body {
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-container {
      text-align: center;
    }

    .form-group {
      display: flex;
      align-items: center;
      justify-content: flex-start;
      margin-bottom: 10px;
    }

    .form-group label {
      margin-right: 10px;
    }
  </style>
</head>
<body>
  <div class="login-container">
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
</html>
