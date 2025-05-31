<?php
    // Inicia a sessão (caso ainda não tenha sido iniciada)
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Importa conexão com o banco e o model User
    require_once __DIR__ . '/../config/Database.php';
    require_once __DIR__ . '/../models/User.php';

    // Controller de autenticação (login)
    class AuthController {

        // Método que processa o login
        public static function login($username, $password) {
            // Conecta com o banco
            $conn = Database::connect();

            // Busca o usuário pelo nome
            $sql = "SELECT * FROM users WHERE username = :username LIMIT 1";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            $userData = $stmt->fetch(PDO::FETCH_ASSOC);

            // Se encontrou o usuário
            if ($userData) {
                // Verifica se a senha está correta
                $hashedInput = hash('sha256', $password);

                if ($hashedInput === $userData['password']) {
                    // Cria objeto User
                    $user = new User(
                        $userData['id'],
                        $userData['username'],
                        $userData['password']
                    );

                    // Armazena informações na sessão (sem senha)
                    $_SESSION['user'] = [
                        'id' => $user->id,
                        'username' => $user->username
                    ];

                    return true;
                }
            }

            // Se não encontrou ou senha errada
            return false;
        }

        // Verifica se o usuário está logado
        public static function isLoggedIn() {
            return isset($_SESSION['user']);
        }
    }