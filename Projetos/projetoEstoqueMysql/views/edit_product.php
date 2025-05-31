<?php
    session_start();

    require_once __DIR__ . '/../controllers/AuthController.php';
    require_once __DIR__ . '/../controllers/ProductController.php';

    // Protege a página
    if (!AuthController::isLoggedIn()) {
        header('Location: login.php');
        exit;
    }

    // Verifica se foi passado o ID
    if (!isset($_GET['id'])) {
        header('Location: dashboard.php');
        exit;
    }

    $id = $_GET['id'];
    $product = ProductController::getProductById($id);

    // Se não encontrar o produto
    if (!$product) {
        echo "Product not found.";
        exit;
    }

    // Se enviou o formulário
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $quantity = $_POST['quantity'];

        ProductController::updateProduct($id, $name, $quantity);

        header('Location: dashboard.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
</head>
<body>
    <h2>Edit Product</h2>

    <form method="POST" action="">
        <label>Name:</label><br>
        <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required><br><br>

        <label>Quantity:</label><br>
        <input type="number" name="quantity" value="<?= $product['quantity'] ?>" required><br><br>

        <button type="submit">Update Product</button>
    </form>

    <p><a href="dashboard.php">⬅️ Back to Dashboard</a></p>
</body>
</html>
