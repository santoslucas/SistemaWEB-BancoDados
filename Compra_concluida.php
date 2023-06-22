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
    <h1>TESSERACT</h1>
    <div class="buttons">
            <?php
          
            if (isset($_SESSION['email'])) {
              $email = $_SESSION['email'];
              echo '<a href="perfil.php">' . $email . '</a>';
            }
            ?>
             <a href="Redireciona_principal.php" class="logout"><?php if(isset($_SESSION['email'])) echo 'Sair'; else echo 'Login'; ?></a>
        </div>
  </div>
  <div class="form-container">
    <h3>Compra concluída!</h3>
    <br>
    <p>Valor total da compra: </p>
    <?php
        $totalCompra = $_SESSION['total'];
        $formattedValor = 'R$' . number_format($totalCompra, 2, ',');

        echo $formattedValor;
    ?> <br>
  </div>
</body>
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/Style_login.css">
</html>



