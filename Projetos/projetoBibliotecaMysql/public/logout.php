<?php
    // Iniciamos a sessão para poder destruí-la
    session_start();

    // Limpamos todas as variáveis da sessão
    session_unset();

    // Destruímos a sessão completamente
    session_destroy();

    // Redirecionamos o usuário para a tela de login
    header('Location: ../views/login.html');
    exit;
