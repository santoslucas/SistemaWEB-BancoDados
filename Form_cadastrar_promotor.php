<!DOCTYPE html>
<html>
<head>
  <title>TESSERACT</title>
  <style>
    body {
      background-color: #E6E6FA; /* Código hexadecimal para a cor roxo lilás claro */
      margin: 0;
      padding: 0;
    }

    .header {
      background-color: #9370DB; /* Código hexadecimal para a cor azul-violeta */
      text-align: center;
      padding: 20px;
    }

    .header h1 {
      color: #FFFFFF; /* Código hexadecimal para a cor branca */
      font-size: 40px;
    }

    .form-container {
      text-align: center;
      border: 2px solid black;
      padding: 20px;
      border-radius: 10px;
      margin-top: 20px;
      max-width: 400px;
      margin-left: auto;
      margin-right: auto;
    }

    .form-group {
      display: flex;
      align-items: center;
      justify-content: center;
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
    <h3>Insira seus dados</h3>
    <form method="post" action="Cadastrar_Promotor.php">
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" name="Email">
      </div>
      <br>
      <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" name="Nome">
      </div>
      <br>
      <div class="form-group">
        <label for="senha">Senha:</label>
        <input type="text" name="Senha">
      </div>
      <br>
      <div class="form-group">
        <label for="cnpj">CNPJ:</label>
        <input type="number" name="CNPJ">
      </div>
      <br>
      <input type="submit" value="Criar conta">
    </form>
  </div>
</body>
</html>
