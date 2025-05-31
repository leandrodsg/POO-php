<?php
    session_start();

    if (!isset($_SESSION['usuario_id'])) {
        header("Location: login.html");
        exit;
    }

    require_once '../config/Database.php';

    $contato = null;

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $usuario_id = $_SESSION['usuario_id'];

        $db = new Database();
        $conexao = $db->conectar();

        $sql = "SELECT * FROM contatos WHERE id = :id AND usuario_id = :usuario_id LIMIT 1";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':usuario_id', $usuario_id);
        $stmt->execute();
        $contato = $stmt->fetch(PDO::FETCH_ASSOC);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $contato ? 'Edit Contact' : 'Add Contact'; ?></title>
</head>
<body>
    <h2><?php echo $contato ? 'Edit Contact' : 'Add New Contact'; ?></h2>

    <form action="../controllers/ContatoController.php" method="POST">
        <?php if ($contato): ?>
            <input type="hidden" name="id" value="<?php echo $contato['id']; ?>">
        <?php endif; ?>

        <label for="nome">Name:</label><br>
        <input type="text" name="nome" required value="<?php echo $contato['nome'] ?? ''; ?>"><br><br>

        <label for="telefone">Phone:</label><br>
        <input type="text" name="telefone" value="<?php echo $contato['telefone'] ?? ''; ?>"><br><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" value="<?php echo $contato['email'] ?? ''; ?>"><br><br>

        <button type="submit"><?php echo $contato ? 'Update' : 'Save'; ?></button>
    </form>

    <br>
    <a href="dashboard.php">← Back to dashboard</a>
</body>
</html>
