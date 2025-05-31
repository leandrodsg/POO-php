<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit;
}

require_once '../config/Database.php';

$db = new Database();
$conexao = $db->conectar();

$usuario_id = $_SESSION['usuario_id'];

$sql = "SELECT * FROM contatos WHERE usuario_id = :usuario_id";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':usuario_id', $usuario_id);
$stmt->execute();

$contatos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Contact Agenda</title>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['usuario_nome']); ?>!</h2>
    <a href="../logout.php">Logout</a>
    <h3>Your Contacts</h3>

    <a href="contato_form.php">+ Add new contact</a><br><br>

    <?php if (count($contatos) === 0): ?>
        <p>No contacts found.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($contatos as $contato): ?>
                <li>
                    <?php echo htmlspecialchars($contato['nome']); ?> -
                    <?php echo htmlspecialchars($contato['telefone']); ?> -
                    <?php echo htmlspecialchars($contato['email']); ?>
                    [<a href="contato_form.php?id=<?php echo $contato['id']; ?>">Edit</a>]
                    [<a href="../controllers/ContatoController.php?delete=<?php echo $contato['id']; ?>">Delete</a>]
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>
