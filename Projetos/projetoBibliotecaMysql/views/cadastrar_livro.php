<?php
    // Inicia a sessão para garantir que só logados acessem
    session_start();

    // Redireciona se não estiver logado
    if (!isset($_SESSION['usuario_id'])) {
        header('Location: login.html');
        exit;
    }

    // Conecta ao banco para buscar autores
    require_once __DIR__ . '/../config/Database.php';
    $pdo = Database::connect();

    // Consulta simples para buscar autores
    $stmt = $pdo->query("SELECT id, nome FROM autores");
    $autores = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Book</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <h2>Add New Book</h2>

    <form action="../controllers/LivroController.php" method="POST">
        <label for="titulo">Title:</label><br>
        <input type="text" id="titulo" name="titulo" required><br><br>

        <label for="autor_id">Author:</label><br>
        <select id="autor_id" name="autor_id" required>
            <option value="">-- Select an Author --</option>
            <?php foreach ($autores as $autor): ?>
                <option value="<?php echo $autor['id']; ?>">
                    <?php echo htmlspecialchars($autor['nome']); ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <input type="submit" value="Save Book">
    </form>

    <br>
    <a href="dashboard.php">Back to Dashboard</a>
</body>
</html>
