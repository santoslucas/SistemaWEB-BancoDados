<?php
    session_start();

    $c = oci_connect("ECLBDIT207", "Cebcdhj2702@", "bdengcomp_low");
    if (!$c) {
        $m = oci_error();
        trigger_error("Could not connect to database: ". $m["message"], E_USER_ERROR);
    }

    // Verificar se o usuário está logado, caso contrário, redirecionar para a tela de login
    if (!isset($_SESSION['email'])) {
        header('Location: Login_cliente.php');
        exit;
    }

    $eventoID = $_SESSION['eventoID'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Compra</title>
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
      max-width: 500px;
      margin-left: auto;
      margin-right: auto;
    }

    .form-group {
      display: flex;
      align-items: left;
      justify-content: left;
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
    <h3>Quantidade de ingressos indisponível</h3>
    <br>
    <a href=Pagina_evento.php?id=<?php echo $eventoID;?>&nome=>Retornar à compra</a>
  </div>
</body>
</html>



