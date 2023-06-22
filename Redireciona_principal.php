<?php 
    session_start();
    if(isset($_SESSION['email'])){
        session_destroy();
        header('location: Pagina_principal.php');
        exit();
    }

    else{
        header('location: Tela_login.php');
        exit();
    }
?>