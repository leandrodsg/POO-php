<?php
    // Iniciamos a sessão
    session_start();

    // Verificamos se o usuário está logado
    if (isset($_SESSION['usuario_id'])) {
        // Se estiver logado, redireciona para a página principal (dashboard)
        header('Location: ../views/dashboard.php');
        exit;
    } else {
        // Se não estiver logado, redireciona para a tela de login
        header('Location: ../views/login.html');
        exit;
    }
