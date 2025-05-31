<?php
    // Incluímos a classe de conexão com o banco de dados
    require_once __DIR__ . '/../config/Database.php';

    class Usuario {

        // Método para verificar login
        public function login($email, $senha) {
            // Obtemos a conexão com o banco
            $pdo = Database::connect();

            // SQL para buscar o usuário pelo email e senha
            $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";

            // Preparamos a query
            $stmt = $pdo->prepare($sql);

            // Ligamos os parâmetros aos valores recebidos
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha); // ⚠️ Aqui usamos texto simples por simplicidade (poderia ser hash)

            // Executamos a query
            $stmt->execute();

            // Buscamos o resultado
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            // Retornamos os dados se encontrado, ou false
            return $usuario ? $usuario : false;
        }
    }
