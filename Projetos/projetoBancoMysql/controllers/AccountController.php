<?php
    session_start();
    require_once __DIR__ . '/../config/Database.php';

    if (!isset($_SESSION['user'])) {
        echo "Access denied.";
        exit;
    }

    // Pega o ID do usuário logado
    $userId = $_SESSION['user']['id'];

    // Conecta ao banco
    $db = new Database();
    $conn = $db->connect();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $amount = floatval($_POST['amount']);
        $type = $_POST['type']; // deposit ou withdraw

        // Pegamos o saldo atual
        $stmt = $conn->prepare("SELECT balance FROM users WHERE id = :id");
        $stmt->bindParam(':id', $userId);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            echo "User not found.";
            exit;
        }

        $currentBalance = $user['balance'];

        if ($type === 'deposit') {
            $newBalance = $currentBalance + $amount;
        } elseif ($type === 'withdraw') {
            if ($amount > $currentBalance) {
                echo "Insufficient balance.";
                exit;
            }
            $newBalance = $currentBalance - $amount;
        } else {
            echo "Invalid operation.";
            exit;
        }

        // Atualiza o saldo
        $stmt = $conn->prepare("UPDATE users SET balance = :balance WHERE id = :id");
        $stmt->bindParam(':balance', $newBalance);
        $stmt->bindParam(':id', $userId);

        if ($stmt->execute()) {
            $_SESSION['user']['balance'] = $newBalance; // atualiza na sessão também
            header('Location: ../views/dashboard.php');
            exit;
        } else {
            echo "Error updating balance.";
        }
    }
?>