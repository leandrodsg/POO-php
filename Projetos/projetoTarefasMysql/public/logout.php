<?php
    session_start(); // Inicia a sessão para poder destruí-la

    session_unset(); // Limpa todas as variáveis de sessão
    session_destroy(); // Encerra a sessão por completo

    // Redireciona o usuário de volta para a página de login
    header('Location: ../views/login.php');
    exit;
