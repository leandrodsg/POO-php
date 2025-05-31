<?php
    session_start(); // Permite usar a sessão para acessar dados do usuário

    // Se o usuário não estiver logado, redireciona para login
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }

    // Inclui a classe de tarefas
    require_once __DIR__ . '/../models/Task.php';

    // Cria uma instância e busca as tarefas do usuário logado
    $task = new Task();
    $task->usuario_id = $_SESSION['user_id'];
    $tarefas = $task->getByUser(); // Array com todas as tarefas
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Your Tasks</title>
        <style>
            body { font-family: Arial; padding: 20px; max-width: 600px; margin: auto; }
            input, button { padding: 8px; width: 100%; margin-top: 10px; }
            ul { list-style: none; padding: 0; }
            li { padding: 10px; border-bottom: 1px solid #ccc; }
            .message { margin: 10px 0; padding: 10px; border-radius: 4px; }
            .error { background-color: #f8d7da; color: #842029; }
            .success { background-color: #d1e7dd; color: #0f5132; }
            .logout { float: right; font-size: 14px; }
        </style>
    </head>
    <body>

        <h2>Hello, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h2>
        <a href="../public/logout.php" class="logout">Logout</a>

        <!-- Exibe mensagens da sessão -->
        <?php if (isset($_SESSION['success'])): ?>
            <div class="message success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
        <?php endif; ?>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="message error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>

        <!-- Formulário para adicionar nova tarefa -->
        <form action="../controllers/TaskController.php" method="POST">
            <input type="text" name="descricao" placeholder="Enter a new task" required>
            <button type="submit">Add Task</button>
        </form>

        <h3>Your Tasks</h3>

        <!-- Lista as tarefas -->
        <ul>
            <?php if (count($tarefas) > 0): ?>
                <?php foreach ($tarefas as $t): ?>
                    <li><?php echo htmlspecialchars($t['descricao']); ?></li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>You have no tasks yet.</li>
            <?php endif; ?>
        </ul>

    </body>
    </html>
