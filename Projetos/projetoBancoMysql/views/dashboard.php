<?php
    session_start();

    // Verifica se o usuário está logado
    if (!isset($_SESSION['user'])) {
        echo "You are not logged in.";
        exit;
    }

    // Pega os dados da sessão
    $user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Bank Account</title>
</head>
<body>
    <h2>Welcome, <?= htmlspecialchars($user['name']) ?>!</h2>
    <p>Your balance is: $<?= number_format($user['balance'], 2) ?></p>

    <h3>Account actions</h3>
    <form action="../controllers/AccountController.php" method="POST">
        <label for="amount">Amount:</label><br>
        <input type="number" step="0.01" name="amount" required><br><br>

        <button type="submit" name="type" value="deposit">Deposit</button>
        <button type="submit" name="type" value="withdraw">Withdraw</button>
    </form>

    <br>
    <a href="../logout.php">Logout</a>
</body>
</html>
