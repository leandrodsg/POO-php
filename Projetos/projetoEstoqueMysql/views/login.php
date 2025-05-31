<?php
    // Inicia a sessão
    session_start();

    // Importa o controller de autenticação
    require_once __DIR__ . '/../controllers/AuthController.php';

    // Se o formulário for enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Tenta fazer login
        if (AuthController::login($username, $password)) {
            // Redireciona para o dashboard
            header('Location: dashboard.php');
            exit;
        } else {
            // Mensagem de erro
            $error = "Invalid username or password.";
        }
    }
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Stock System</title>
</head>
<body>
    <h2>Login</h2>

    <!-- Exibe mensagem de erro se houver -->
    <?php if (isset($error)): ?>
        <p style="color: red;"><?= $error ?></p>
    <?php endif; ?>

    <!-- Formulário de login -->
    <form method="POST" action="">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>

    <!-- Link para registro -->
    <p>Don't have an account? <a href="register.php">Register here</a></p>
</body>
</html>