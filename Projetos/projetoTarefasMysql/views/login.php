<?php
session_start(); // Necessário para acessar e mostrar mensagens com $_SESSION
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In</title>
    <style>
        body { font-family: Arial; padding: 20px; max-width: 500px; margin: auto; }
        input, button { display: block; margin-top: 10px; padding: 8px; width: 100%; }
        .message { margin: 10px 0; padding: 10px; border-radius: 4px; }
        .error { background-color: #f8d7da; color: #842029; }
        .success { background-color: #d1e7dd; color: #0f5132; }
    </style>
</head>
<body>

    <h2>Welcome back</h2>

    <!-- Exibe mensagem de erro se houver -->
    <?php if (isset($_SESSION['error'])): ?>
        <div class="message error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php endif; ?>

    <!-- Exibe mensagem de sucesso se houver -->
    <?php if (isset($_SESSION['success'])): ?>
        <div class="message success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
    <?php endif; ?>

    <!-- Formulário de login -->
    <form action="../controllers/UserController.php" method="POST">
        <input type="email" name="email" placeholder="Email address" required>
        <input type="password" name="password" placeholder="Your password" required>

        <!-- Campo oculto que avisa ao controller que esse é um login -->
        <input type="hidden" name="action" value="login">

        <button type="submit">Log In</button>
    </form>

    <p>Don't have an account yet? <a href="register.php">Create one here</a></p>

</body>
</html>
