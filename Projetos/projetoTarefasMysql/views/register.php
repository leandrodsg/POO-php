<?php
session_start(); // Permite exibir mensagens guardadas na sessão
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Account</title>
    <style>
        body { font-family: Arial; padding: 20px; max-width: 500px; margin: auto; }
        input, button { display: block; margin-top: 10px; padding: 8px; width: 100%; }
        .message { margin: 10px 0; padding: 10px; border-radius: 4px; }
        .error { background-color: #f8d7da; color: #842029; }
        .success { background-color: #d1e7dd; color: #0f5132; }
    </style>
</head>
<body>

    <h2>Create a New Account</h2>

    <!-- Exibe mensagem de erro -->
    <?php if (isset($_SESSION['error'])): ?>
        <div class="message error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php endif; ?>

    <!-- Exibe mensagem de sucesso -->
    <?php if (isset($_SESSION['success'])): ?>
        <div class="message success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
    <?php endif; ?>

    <!-- Formulário de cadastro -->
    <form action="../controllers/UserController.php" method="POST">
        <input type="text" name="name" placeholder="Your name" required>
        <input type="email" name="email" placeholder="Email address" required>
        <input type="password" name="password" placeholder="Choose a password" required>

        <!-- Define que este formulário é de cadastro -->
        <input type="hidden" name="action" value="register">

        <button type="submit">Register</button>
    </form>

    <p>Already have an account? <a href="login.php">Log in here</a></p>

</body>
</html>
