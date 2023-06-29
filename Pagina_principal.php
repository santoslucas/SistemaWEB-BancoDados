<?php
    session_start();
    if(isset($_SESSION['email']))
        $email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Pagina principal</title>
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
        <h2>Eventos em destaque</h2><br>
        <?php
        $conn = oci_connect("ECLBDIT207", "Cebcdhj2702@", "bdengcomp_low");
        if (!$conn) {
            $m = oci_error();
            trigger_error("Could not connect to database: ". $m["message"], E_USER_ERROR);
        }
    
        // Consulta para obter os eventos
        $query = "SELECT * FROM evento";
        $stmt = oci_parse($conn, $query);
        oci_execute($stmt);

        // Exibir os eventos
        while ($row = oci_fetch_assoc($stmt)) {
            $idEvento = $row['ID'];
            $nomeEvento = $row['NOME'];
            $descricaoEvento = $row['DESCRICAO'];
            
            // Criação do botão para a página de evento com o ID do evento como parâmetro na URL
            echo "<form action='Pagina_evento.php' method='GET'>";
            echo "<input type='hidden' name='id' value='$idEvento'>";
            echo "<button type='submit' class='evento-button'>$nomeEvento </button>";
            echo "</form>";
            // Exibir a descrição do evento
            echo "<p>$descricaoEvento</p>";
            echo "<hr style='height: 1px; background-color: black; width: 100%;'><br>";
        }
        // Fechar a conexão com o banco de dados
        oci_close($conn);
?>
    </div>
</body>
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/Style_login.css">
</html>

