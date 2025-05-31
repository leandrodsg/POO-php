<?php
    session_start();
    session_destroy(); // Encerra a sessão
    header("Location: views/login.html"); // Redireciona para login
    exit;
?>
