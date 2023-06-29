<!DOCTYPE html>
<html>
<head>
  <title>Preencha os dados do cliente</title>
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
    <h3>Insira seus dados abaixo</h3>
    <form method="post" action="Cadastrar_Cliente.php">
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
        <label for="cpf">CPF:</label>
        <input type="number" name="CPF">
      </div>
      <br>
      <div class="form-group">
        <label for="data_nascimento">Data de nascimento:</label>
        <input type="date" name="Data_nascimento">
      </div>
      <br>
      <input type="submit" value="Criar conta">
    </form>
  </div>
</body>
<link rel="stylesheet" href="css/global.css">
<link rel="stylesheet" href="css/header.css">
</html>
