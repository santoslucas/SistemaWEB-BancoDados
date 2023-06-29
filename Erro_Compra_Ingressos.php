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
    <h3>Quantidade de ingressos indisponível</h3>
    <br>
    <a href=Pagina_evento.php?id=<?php echo $eventoID;?>&nome=>Retornar à compra</a>
  </div>
</body>
<link rel="stylesheet" href="css/global.css">
</html>



