<?php
    // logout.php

    session_start();       // Inicia a sessão (caso exista)
    session_unset();       // Limpa todas as variáveis de sessão
    session_destroy();     // Destrói a sessão

    // Redireciona para a página inicial
    header("Location: public/index.html");
    exit;
?>
