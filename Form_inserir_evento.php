<!DOCTYPE html>
<html>
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
    <h3 class="center-title">Preencha os dados do evento</h3>
    <form method="post" action="Inserir_Evento.php">
      <div class="form-group">
        <label for="id">ID:</label>
        <input type="number" name="ID">
      </div>
      <br>
      <div class="form-group">
        <label for="nome">Nome do evento:</label>
        <input type="text" name="Nome">
      </div>
      <br>
      <div class="form-group">
        <label for="descricao">Descrição do evento:</label>
        <input type="text" name="Descricao">
      </div>
      <br>
      <div class="form-group">
        <label for="valor">Preço:</label>
        <input type="number" name="Valor">
      </div>
      <br>
      <div class="form-group">
        <label for="local">Local:</label>
        <input type="text" name="Local">
      </div>
      <br>
      <div class="form-group">
        <label for="local">Quantidade de ingressos:</label>
        <input type="number" name="Qtd_ingressos">
      </div>
      <br>
      <div class="center-button">
        <input type="submit" value="Inserir ingresso">
      </div>
    </form>
  </div>
</body>
<link rel="stylesheet" href="css/global.css">
<link rel="stylesheet" href="css/header.css">
</html>
