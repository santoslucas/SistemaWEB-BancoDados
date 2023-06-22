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
    <form method="post" action="Criar_cupom.php">
      <div class="form-group">
        <label for="ID">ID:</label>
        <input type="text" name="ID">
      </div>
      <br>
      <div class="form-group">
        <label for="ID_evento">ID_Evento:</label>
        <input type="text" name="ID_evento">
      </div>
      <br>
      <div class="form-group">
        <label for="Desconto">Porcentagem de Desconto:</label>
        <input type="text" name="Desconto">
      </div>
      <br>
      <input type="submit" value="Criar cupom">
    </form>
  </div>
</body>
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/Style_login.css">
</html>