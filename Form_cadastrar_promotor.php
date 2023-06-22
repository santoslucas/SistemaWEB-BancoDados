<!DOCTYPE html>
<html>
<head>
  <title>TESSERACT</title>
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
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/Style_login.css">
</html>
