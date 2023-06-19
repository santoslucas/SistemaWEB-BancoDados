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
    <h3>Insira os dados referentes a compra</h3>
    <form method="post" action="Comprar_ingresso.php">
      <div class="form-group">
        <label for="numInteira">Quantidade de ingressos inteira:</label>
        <input type="number" name="numInteira">
        <?php $s = oci_parse($c, "SELECT COUNT(*) FROM INGRESSO WHERE ID_evento='$eventoID' and Tipo='Inteira' and Email_cliente is null");
              if (!$s) {
                $m = oci_error($c);
                trigger_error("Não pôde compilar a sentença: ". $m["message"], E_USER_ERROR);
              }

              $r = oci_execute($s, OCI_NO_AUTO_COMMIT); // for PHP <= 5.3.1 use OCI_DEFAULT instead

              if ($r == 1)
                echo $r . " disponivel <br>";
              else if ($r == 0)
                echo "nenhum disponivel <br>";
              else  
                echo $r . " disponiveis <br>";
        ?>
      </div>
      <br>
      <div class="form-group">
        <label for="numMeia">Quantidade de ingressos meia:</label>
        <input type="number" name="numMeia">
        <?php $s = oci_parse($c, "SELECT COUNT(*) FROM INGRESSO WHERE ID_evento='$eventoID' and Tipo='Meia' and Email_cliente is null");
              if (!$s) {
                $m = oci_error($c);
                trigger_error("Não pôde compilar a sentença: ". $m["message"], E_USER_ERROR);
              }

              $r = oci_execute($s, OCI_NO_AUTO_COMMIT); // for PHP <= 5.3.1 use OCI_DEFAULT instead

              if ($r == 1)
                echo $r . " disponivel <br>";
              else if ($r == 0)
                echo "nenhum disponivel <br>";
              else  
                echo $r . " disponiveis <br>";
        ?>
      </div>
      <br>
      <div class="form-group">
        <label for="IDcupom">Cupom:</label>
        <input type="text" name="IDcupom">
      </div>
      <br>
      <input type="submit" value="Finalizar compra">
    </form>
  </div>
</body>
</html>
