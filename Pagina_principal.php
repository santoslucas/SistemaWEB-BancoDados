<!DOCTYPE html>
<html>
<head>
    <title>Página Principal</title>
    <style>
        .event {
            display: inline-block;
            margin: 10px;
            text-align: center;
        }

        #myCarousel {
            width: 400px; /* Defina o comprimento desejado */
            height: 300px; /* Defina a altura desejada */
            margin: 0 auto; /* Centralize horizontalmente */
        }

    </style>
    <!-- Adicione os links para os arquivos do Bootstrap CSS e JavaScript -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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

    <!-- Adicione o carrossel de imagens -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicadores -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
        </ol>

        <!-- Slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="imagem1.jpg" alt="Evento 1" width="400" height="300">
            </div>
            <div class="item">
                <img src="imagem2.jpg" alt="Evento 2" width="400" height="300">
            </div>
            <div class="item">
                <img src="imagem3.jpg" alt="Evento 3" width="400" height="300">
            </div>
            <div class="item">
                <img src="imagem4.jpg" alt="Evento 4" width="400" height="300">
            </div>
            <div class="item">
                <img src="imagem5.jpg" alt="Evento 5" width="400" height="300">
            </div>
            <!-- Adicione mais slides conforme necessário -->
        </div>

        <!-- Controles -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Próximo</span>
        </a>
    </div>

    <!-- Centralize as imagens abaixo do carrossel -->
    <div style="text-align: center;">
        <div class="event">
            <a href="evento.php?evento=1">
            <img src="imagem1l.jpg" alt="Evento 1" width="200"
        <div>
    <div>
<body>
<link rel="stylesheet" href="css/header.css">
</html>
