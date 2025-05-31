<?php
    // controllers/LogoutController.php

    // Inicia a sessão para poder destruí-la
    session_start();

    // Remove todas as variáveis da sessão
    session_unset();

    // Encerra a sessão completamente
    session_destroy();

    // Redireciona o usuário para a página inicial
    header('Location: ../public/index.html');
    exit;
