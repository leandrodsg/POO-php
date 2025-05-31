<?php
// Inicia a sessão
session_start();

// Conecta com o banco
require_once __DIR__ . '/../config/Database.php';

// Inicializa mensagem
$message = "";

// Se formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Conexão com o banco
    $conn = Database::connect();

    // Verifica se o username já existe
    $check = $conn->prepare("SELECT * FROM users WHERE username = :username");
    $check->bindParam(':username', $username);
    $check->execute();

    if ($check->rowCount() > 0) {
        $message = "Username already taken.";
    } else {
        // Criptografa a senha
        $hashed = hash('sha256', $password);

        // Insere novo usuário
        $insert = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $insert->bindParam(':username', $username);
        $insert->bindParam(':password', $hashed);

        if ($insert->execute()) {
            $message = "User registered successfully.";
        } else {
            $message = "Error during registration.";
        }
    }
}
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register New User</title>
</head>
<body>
    <h2>Register</h2>

    <?php if (!empty($message)): ?>
        <p style="color: blue;"><?= $message ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Create Account</button>
    </form>

    <p><a href="login.php">Back to Login</a></p>
</body>
</html>
