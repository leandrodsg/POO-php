<?php
    session_start();

    if (!isset($_SESSION['usuario_id'])) {
        header("Location: ../views/login.html");
        exit;
    }

    require_once '../config/Database.php';

    $db = new Database();
    $conexao = $db->conectar();

    // ADICIONAR ou ATUALIZAR CONTATO
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome'])) {
        $id = $_POST['id'] ?? null;
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'] ?? '';
        $email = $_POST['email'] ?? '';
        $usuario_id = $_SESSION['usuario_id'];

        if ($id) {
            // Atualizar contato
            $sql = "UPDATE contatos SET nome = :nome, telefone = :telefone, email = :email
                    WHERE id = :id AND usuario_id = :usuario_id";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':usuario_id', $usuario_id);
        } else {
            // Adicionar novo contato
            $sql = "INSERT INTO contatos (nome, telefone, email, usuario_id)
                    VALUES (:nome, :telefone, :email, :usuario_id)";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':usuario_id', $usuario_id);
        }

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':email', $email);

        if ($stmt->execute()) {
            header("Location: ../views/dashboard.php");
            exit;
        } else {
            echo $id ? "Error updating contact." : "Error adding contact.";
        }
    }

    // DELETAR CONTATO
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $usuario_id = $_SESSION['usuario_id'];

        $sql = "DELETE FROM contatos WHERE id = :id AND usuario_id = :usuario_id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':usuario_id', $usuario_id);
        $stmt->execute();

        header("Location: ../views/dashboard.php");
        exit;
    }
