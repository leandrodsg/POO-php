<?php
    // Inicia a sessão
    session_start();

    // Importa os controllers
    require_once __DIR__ . '/../controllers/AuthController.php';
    require_once __DIR__ . '/../controllers/ProductController.php';

    // Verifica se está logado
    if (!AuthController::isLoggedIn()) {
        header('Location: login.php');
        exit;
    }

    // Se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Pega os dados
        $name = $_POST['name'];
        $quantity = $_POST['quantity'];

        // Insere o produto no banco
        ProductController::addProduct($name, $quantity);

        // Redireciona para o dashboard
        header('Location: dashboard.php');
        exit;
    }
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Product</title>
</head>
<body>
    <h2>Add Product</h2>

    <form method="POST" action="">
        <label>Product Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Quantity:</label><br>
        <input type="number" name="quantity" required><br><br>

        <button type="submit">Save Product</button>
    </form>

    <p><a href="dashboard.php">⬅️ Back to Dashboard</a></p>
</body>
</html>
