<?php
    // Inicia a sessão
    session_start();

    // Verifica se o usuário está logado
    if (!isset($_SESSION['usuario_id'])) {
        // Redireciona se não estiver logado
        header('Location: login.html');
        exit;
    }

    // Inclui o modelo de Livro
    require_once __DIR__ . '/../models/Livro.php';

    // Cria a instância e busca todos os livros
    $livro = new Livro();
    $livros = $livro->listarTodos();
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Dashboard - Library System</title>
        <link rel="stylesheet" href="../public/css/style.css">
    </head>
    <body>
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['usuario_email']); ?>!</h2>

        <a href="../views/cadastrar_livro.php">Add New Book</a> | 
        <a href="../public/logout.php">Logout</a>

        <h3>Registered Books</h3>

        <?php if (count($livros) > 0): ?>
            <table border="1" cellpadding="8">
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                </tr>
                <?php foreach ($livros as $livro): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($livro['titulo']); ?></td>
                        <td><?php echo htmlspecialchars($livro['autor']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No books registered.</p>
        <?php endif; ?>
    </body>
    </html>
