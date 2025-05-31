<?php
    // Iniciamos a sessão (obrigatório para trabalhar com $_SESSION)
    session_start();

    // Incluímos a classe Usuario (responsável por buscar os dados no banco)
    require_once __DIR__ . '/../models/Usuario.php';

    // Verificamos se o formulário foi enviado via método POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Pegamos os dados do formulário de login
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';

        // Criamos uma instância do modelo Usuario
        $usuario = new Usuario();

        // Chamamos o método login para verificar se os dados estão corretos
        $usuarioEncontrado = $usuario->login($email, $senha);

        // Se o login for bem-sucedido
        if ($usuarioEncontrado) {
            // Armazenamos os dados do usuário na sessão
            $_SESSION['usuario_id'] = $usuarioEncontrado['id'];
            $_SESSION['usuario_email'] = $usuarioEncontrado['email'];

            // Redirecionamos para o dashboard
            header('Location: ../views/dashboard.php');
            exit;
        } else {
            // Se o login falhar, redirecionamos de volta para o login com erro
            // (poderíamos adicionar um parâmetro GET ?erro=1, mas vamos manter simples)
            echo "<script>alert('Invalid email or password'); window.location.href = '../views/login.html';</script>";
            exit;
        }
    } else {
        // Se o acesso não for via POST, redirecionamos direto para o login
        header('Location: ../views/login.html');
        exit;
    }
