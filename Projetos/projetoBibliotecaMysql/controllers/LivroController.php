<?php
    // Iniciamos a sessão para verificar se o usuário está logado
    session_start();

    // Verifica se o usuário está autenticado
    if (!isset($_SESSION['usuario_id'])) {
        // Se não estiver logado, redireciona para o login
        header('Location: ../views/login.html');
        exit;
    }

    // Incluímos o modelo do Livro
    require_once __DIR__ . '/../models/Livro.php';

    // Verifica se o formulário foi enviado via POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Pegamos os dados enviados do formulário
        $titulo = $_POST['titulo'] ?? '';
        $autor_id = $_POST['autor_id'] ?? '';

        // Criamos uma nova instância de Livro
        $livro = new Livro();

        // Usamos o método salvar para inserir no banco
        $sucesso = $livro->salvar($titulo, $autor_id);

        // Verifica se salvou com sucesso
        if ($sucesso) {
            // Redireciona para o dashboard com uma mensagem simples
            echo "<script>alert('Book added successfully!'); window.location.href = '../views/dashboard.php';</script>";
            exit;
        } else {
            echo "<script>alert('Error saving book.'); window.location.href = '../views/dashboard.php';</script>";
            exit;
        }
    } else {
        // Se o acesso ao controller não for via POST, redireciona
        header('Location: ../views/dashboard.php');
        exit;
    }
