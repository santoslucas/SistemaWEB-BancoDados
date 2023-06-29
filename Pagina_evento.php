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
    
    // Aqui você pode obter as informações do cliente a partir da sessão
    $email = $_SESSION['email'];

    if(isset($_GET['id'])) {
        $eventoID = $_GET['id'];
        $_SESSION['eventoID'] = $eventoID;
    }

    $query = "SELECT * FROM EVENTO E WHERE E.ID = '$eventoID'";
    $stmt = oci_parse($c, $query);
    oci_execute($stmt);

    // Recupere os dados do evento em um array associativo
    $evento = oci_fetch_assoc($stmt);

    // Atribua os valores das colunas a variáveis individuais
    $nome = $evento['NOME'];
    $descricao = $evento['DESCRICAO'];
    $valor = $evento['VALOR'];
    $local = $evento['LOCAL'];
    $email_promotor = $evento['EMAIL_PROMOTOR'];
    
    $query = "SELECT * FROM USUARIO U WHERE U.Email = '$email_promotor'";
    $stmt = oci_parse($c, $query);
    oci_execute($stmt);

    // Recupere os dados do promotor em um array associativo
    $promotor = oci_fetch_assoc($stmt);
    $nome_promotor = $promotor['NOME'];
?>

<!DOCTYPE html>
<html>
<head>
    <title> <?php echo $nome?> </title>
</head>
<body>
    <div class="header">
        <h1><a href="Pagina_principal.php" style="color: white; text-decoration: none;">TESSERACT</a></h1>
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
        <h2> <?php echo $nome ?> </h2>
        <h4> Promotor: <?php echo $nome_promotor; ?><h4>
        <h3>Descrição:</h3>
        <?php echo $descricao; ?> <br><br>
        <?php echo '<b>Local:</b>' . $local; ?><br><br>
        <form action='Form_comprar_ingresso.php' method='GET'>
        <h4>Preço inteira: <?php echo 'R$' . number_format($valor, 2, ',') ?> | Preço meia: <?php echo 'R$' . number_format($valor/2, 2, ',') ?></h4>
        <button type='submit' class='evento-button'>Comprar</button>
        </form><br>

    </div>
</body>
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/Style_login.css">
</html>
