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
    <h3>Insira os dados referentes a compra</h3>
    <form method="post" action="Comprar_ingresso.php">
      <div class="form-group">
        <label for="numInteira">Quantidade de ingressos inteira:</label>
        <input type="number" name="numInteira" value=0 min="0">
        <?php $s = oci_parse($c, "SELECT COUNT(ID) as quantidade FROM INGRESSO WHERE ID_evento='$eventoID' and Tipo='Inteira' and Email_cliente is null group by ID_evento");
              
              if (!$s) {
                $m = oci_error($c);
                trigger_error("Não pôde compilar a sentença: ". $m["message"], E_USER_ERROR);
              }

              oci_execute($s); // for PHP <= 5.3.1 use OCI_DEFAULT instead

              // Obtém a quantidade de ingressos
              if ($row = oci_fetch_assoc($s)) {
                $quantidadeIngressos = $row["QUANTIDADE"];
                if ($quantidadeIngressos > 1)
                  echo "$quantidadeIngressos disponíveis";
                else
                  echo "$1 disponível";
              } 
              else 
                echo "Indisponível";
        ?>
      </div>
      <br>
      <div class="form-group">
        <label for="numMeia">Quantidade de ingressos meia:</label>
        <input type="number" name="numMeia" value=0 min="0">
        <?php $s = oci_parse($c, "SELECT COUNT(ID) as quantidade FROM INGRESSO WHERE ID_evento='$eventoID' and Tipo='Meia' and Email_cliente is null group by ID_evento");
              if (!$s) {
                $m = oci_error($c);
                trigger_error("Não pôde compilar a sentença: ". $m["message"], E_USER_ERROR);
              }

              $r = oci_execute($s, OCI_NO_AUTO_COMMIT); // for PHP <= 5.3.1 use OCI_DEFAULT instead

              // Obtém a quantidade de ingressos
              if ($row = oci_fetch_assoc($s)) {
                $quantidadeIngressos = $row["QUANTIDADE"];
                if ($quantidadeIngressos > 1)
                  echo "$quantidadeIngressos disponíveis";
                else
                  echo "$1 disponível";
              } 
              else 
                echo "Indisponível";
        ?>
      </div>
      <br>
      <div class="form-group">
        <label for="IDcupom">Cupom:</label>
        <input type="text" name="IDcupom">
      </div>
      <div class="print-only">
        Cupom inválido!
      </div>
      <br>
      <input type="submit" value="Finalizar compra">
    </form>
  </div>
</body>
<link rel="stylesheet" href="css/global.css">
</html>
