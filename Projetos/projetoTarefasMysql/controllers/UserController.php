<?php
    session_start(); // Inicia sessão (obrigatório para usar $_SESSION)

    require_once __DIR__ . '/../models/User.php';

    // Verifica se foi enviado um formulário
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Verifica se é cadastro
        if (isset($_POST['action']) && $_POST['action'] === 'register') {
            $user = new User();
            $user->name = $_POST['name'];
            $user->email = $_POST['email'];
            $user->password = $_POST['password'];

            if ($user->register()) {
                $_SESSION['success'] = "Account created successfully!";
                header('Location: ../views/login.php');
                exit;
            } else {
                $_SESSION['error'] = "Email already exists.";
                header('Location: ../views/register.php');
                exit;
            }

        // Verifica se é login
        } elseif (isset($_POST['action']) && $_POST['action'] === 'login') {
            $user = new User();
            $user->email = $_POST['email'];
            $user->password = $_POST['password'];

            $result = $user->login();

            if ($result) {
                $_SESSION['user_id'] = $result['id'];
                $_SESSION['user_name'] = $result['nome'];
                header('Location: ../views/dashboard.php');
                exit;
            } else {
                $_SESSION['error'] = "Invalid email or password.";
                header('Location: ../views/login.php');
                exit;
            }
        }
    }
