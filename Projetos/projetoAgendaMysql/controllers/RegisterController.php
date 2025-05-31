<?php
    // controllers/RegisterController.php

    require_once __DIR__ . '/../config/Database.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST['nome'] ?? '';
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';

        if (empty($nome) || empty($email) || empty($senha)) {
            echo "All fields are required.";
            exit;
        }

        // Criptografa a senha
        $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

        // Conecta ao banco
        $db = new Database();
        $conexao = $db->conectar();

        // Verifica se já existe um usuário com esse email
        $verifica = $conexao->prepare("SELECT id FROM usuarios WHERE email = :email");
        $verifica->bindParam(':email', $email);
        $verifica->execute();

        if ($verifica->rowCount() > 0) {
            echo "Email already registered.";
            exit;
        }

        // Insere novo usuário
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senhaCriptografada);

        if ($stmt->execute()) {
            echo "User registered successfully. <a href='../views/login.html'>Login here</a>";
        } else {
            echo "Error while registering user.";
        }
    } else {
        echo "Invalid request.";
    }
?>
