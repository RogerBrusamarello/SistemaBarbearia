<?php
    session_start();
    session_destroy();

    //redireciona o usuário para a página de login
    header("Location: ../View/Site/telas/Login.php");
?>