<!DOCTYPE html>
<html>
<head>
    <title>Tela do Cliente</title>
    <style>
        body {
            background-color: #E6E6FA; /* Código hexadecimal para a cor roxo lilás claro */
            margin: 0;
            padding: 0;
        }

        .container {
            text-align: center;
            border: 2px solid black;
            padding: 20px;
            border-radius: 10px;
            margin: 20px auto;
            max-width: 400px;
        }

        .container h2 {
            margin-bottom: 10px;
        }

        .container ul {
            padding: 0;
            list-style-type: none;
            margin-bottom: 10px;
        }

        .container ul li {
            margin-bottom: 5px;
        }

        .container ul li a {
            text-decoration: none;
        }
    </style>
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
    <div class="container">
        <h2>Informações do Cliente</h2>
        <p>Email: <?php echo $email; ?></p>

        <h3>Opções</h3>
        <ul>
            <li><a href="Consulta_ingresso.php">Consultar Ingresso</a></li>
        </ul>
    </div>
</body>
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/Style_login.css">
</html>