<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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
    <title>Tela de Login</title>
        <script>
            function redirecionarLoginPromotor() {
            window.location.href = "Login_promotor.php";
            }
            
            function redirecionarLoginCliente() {
            window.location.href = "Login_cliente.php";
            }
        </script>
    </head>
<body>
  <button onclick="redirecionarLoginPromotor()">Login Promotor</button>
  <br>
  <button onclick="redirecionarLoginCliente()">Login Cliente</button>
</body>
    </div>
</body>
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/Style_login.css">
</html>