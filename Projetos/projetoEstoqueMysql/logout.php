<?php
    // Inicia a sessão (se ainda não tiver sido iniciada)
    session_start();

    // Destroi a sessão completamente
    session_destroy();

    // Redireciona para a página inicial
    header('Location: public/index.html');
    exit;