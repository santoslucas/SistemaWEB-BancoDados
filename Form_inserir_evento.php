<!DOCTYPE html>
<html>
<head>
  <title>Inserir Evento</title>
  <style>
    body {
      background-color: #E6E6FA; /* Código hexadecimal para a cor roxo lilás claro */
      margin: 0;
      padding: 0;
    }

    .header {
      background-color: #9370DB; /* Código hexadecimal para a cor roxo escuro */
      text-align: center;
      padding: 20px;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      margin-bottom: 20px;
    }

    .header h1 {
      color: #FFFFFF; /* Código hexadecimal para a cor branca */
      font-size: 40px;
      margin: 0;
    }

    .form-container {
      text-align: left;
      border: 2px solid black;
      padding: 20px;
      border-radius: 10px;
      margin-top: 100px;
      max-width: 400px;
      margin-left: auto;
      margin-right: auto;
    }

    .form-group {
      display: flex;
      align-items: center;
      justify-content: left;
      margin-bottom: 5px;
    }

    .form-group label {
      margin-right: 10px;
    }

    .form-group input[type="number"],
    .form-group input[type="text"] {
      flex: 1;
      width: 100%;
      text-align: right;
    }

    .center-button {
      display: flex;
      justify-content: center;
    }

    .center-title {
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="header">
    <h1>TESSERACT</h1>
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
</html>
