<?php
    // controllers/LoginController.php

    session_start(); // Inicia a sessão

    require_once __DIR__ . '/../config/Database.php'; // Conecta ao banco

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Captura os dados enviados pelo formulário
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';

        // Conecta ao banco
        $db = new Database();
        $conexao = $db->conectar();

        // Busca o usuário com o email informado
        $sql = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifica se o usuário existe e se a senha está correta
        if ($usuario && password_verify($senha, $usuario['senha'])) {
            // Salva o ID e nome do usuário na sessão
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];

            // Redireciona para a dashboard (área protegida)
            header("Location: ../views/dashboard.php");
            exit;
        } else {
            echo "Invalid email or password.";
        }
    } else {
        echo "Invalid request.";
    }
