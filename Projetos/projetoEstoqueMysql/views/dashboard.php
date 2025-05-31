<?php
    session_start();

    require_once __DIR__ . '/../controllers/AuthController.php';
    require_once __DIR__ . '/../controllers/ProductController.php';

    // Protege a rota
    if (!AuthController::isLoggedIn()) {
        header('Location: login.php');
        exit;
    }

    // Busca todos os produtos
    $products = ProductController::getAllProducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Dashboard</title>
</head>
<body>
    <h2>Welcome, <?= $_SESSION['user']['username'] ?>!</h2>

    <p>
        <a href="add_product.php">➕ Add New Product</a> |
        <a href="../logout.php">Logout</a>
    </p>

    <h3>Product List</h3>

    <?php if (count($products) > 0): ?>
        <table border="1" cellpadding="10">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>

            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $product['id'] ?></td>
                    <td><?= htmlspecialchars($product['name']) ?></td>
                    <td><?= $product['quantity'] ?></td>
                    <td><?= $product['created_at'] ?></td>
                    <td>
                        <a href="edit_product.php?id=<?= $product['id'] ?>">Edit</a> |
                        <a href="delete_product.php?id=<?= $product['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No products registered yet.</p>
    <?php endif; ?>
</body>
</html>
