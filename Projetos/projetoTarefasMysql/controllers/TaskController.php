<?php
    session_start(); // Permite acessar $_SESSION

    require_once __DIR__ . '/../models/Task.php';

    // Garante que o usuário está logado
    if (!isset($_SESSION['user_id'])) {
        header('Location: ../views/login.php');
        exit;
    }

    // Verifica se foi enviado um POST para criar tarefa
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['descricao'])) {
            $task = new Task();
            $task->descricao = $_POST['descricao'];
            $task->usuario_id = $_SESSION['user_id'];

            if ($task->create()) {
                $_SESSION['success'] = "Task added successfully!";
            } else {
                $_SESSION['error'] = "Error adding task.";
            }

            header('Location: ../views/dashboard.php');
            exit;
        }
    }
