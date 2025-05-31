<?php
    // controllers/AuthController.php

    // Inicia a sessão para guardar os dados do usuário
    session_start();

    // Verifica se o formulário foi enviado via POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        // Importa a classe User
        require_once '../models/User.php';

        // Cria um novo objeto User
        $user = new User();

        // Captura o e-mail e a senha enviados pelo formulário
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Busca o usuário pelo e-mail no banco de dados
        $existingUser = $user->findByEmail($email);

        // Verifica se o usuário foi encontrado e se a senha está correta
        if ($existingUser && password_verify($password, $existingUser['password'])) {
            // Login bem-sucedido → cria sessão com nome e email
            $_SESSION['user_name'] = $existingUser['name'];
            $_SESSION['user_email'] = $existingUser['email'];

            // Redireciona para o painel (dashboard)
            header('Location: ../views/dashboard.php');
            exit;
        } else {
            // Dados incorretos → redireciona de volta com erro
            header('Location: ../views/login.html?error=invalid');
            exit;
        }
    } else {
        // Acesso indevido via GET
        header('Location: ../public/index.html');
        exit;
    }
