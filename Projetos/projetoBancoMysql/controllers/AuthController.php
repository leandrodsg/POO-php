<?php
    session_start();
    require_once __DIR__ . '/../models/User.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {

        if ($_POST['action'] === 'register') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = new User($name, $email, $password);

            if ($user->findByEmail($email)) {
                echo "<p>Email already registered.</p>";
                echo '<a href="../views/register.html"><button>Back to Register</button></a>';
                exit;
            }

            if ($user->register()) {
                echo "<p>User created successfully. You can login now.</p>";
                echo '<a href="../views/login.html"><button>Go to Login</button></a>';
                exit;
            } else {
                echo "<p>Error creating user.</p>";
                echo '<a href="../views/register.html"><button>Back to Register</button></a>';
                exit;
            }
        }

        if ($_POST['action'] === 'login') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = new User();
            $data = $user->findByEmail($email);

            if ($data && password_verify($password, $data['password'])) {
                $_SESSION['user'] = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'balance' => $data['balance']
                ];
                header('Location: ../views/dashboard.php');
                exit;
            } else {
                echo "<p>Invalid credentials.</p>";
                echo '<a href="../views/login.html"><button>Back to Login</button></a>';
                exit;
            }
        }
    }
?>