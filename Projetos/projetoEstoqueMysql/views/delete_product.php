<?php
    session_start();

    require_once __DIR__ . '/../controllers/AuthController.php';
    require_once __DIR__ . '/../controllers/ProductController.php';

    // Verifica se está logado
    if (!AuthController::isLoggedIn()) {
        header('Location: login.php');
        exit;
    }

    // Verifica se veio com ID válido
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Deleta o produto
        ProductController::deleteProduct($id);
    }

    // Volta pro dashboard
    header('Location: dashboard.php');
    exit;
