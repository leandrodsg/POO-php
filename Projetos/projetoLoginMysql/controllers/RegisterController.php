<?php
    // controllers/RegisterController.php

    // Iniciamos a sessão (boa prática caso usemos mensagens ou login direto após cadastro)
    session_start();

    // Verifica se o formulário foi enviado com método POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        // Importa a classe User (POO) para criar o usuário
        require_once '../models/User.php';

        // Cria um novo objeto usuário
        $user = new User();

        // Define os dados recebidos do formulário
        $user->setName($_POST['name']);
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['password']); // já é criptografada na classe

        // Antes de salvar, verifica se o e-mail já existe no banco
        if ($user->findByEmail($_POST['email'])) {
            // E-mail já usado, redireciona com erro (melhoria futura: mostrar mensagem)
            header('Location: ../views/register.html?error=email-exists');
            exit;
        }

        // Tenta salvar o usuário no banco
        if ($user->save()) {
            // Sucesso! Redireciona para login
            header('Location: ../views/login.html?success=registered');
            exit;
        } else {
            // Algo deu errado (ex: erro de banco)
            header('Location: ../views/register.html?error=save-failed');
            exit;
        }
    } else {
        // Acesso indevido ao arquivo sem POST
        header('Location: ../public/index.html');
        exit;
    }
