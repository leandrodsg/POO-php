<?php
    // Classe responsável por conectar com o banco usando PDO
    class Database {
        // Método estático que retorna a conexão pronta
        public static function connect() {
            // Configurações do banco
            $host = 'localhost';            // Endereço do banco (localhost para XAMPP)
            $dbname = 'estoque';            // Nome do banco criado
            $username = 'root';             // Usuário padrão do XAMPP
            $password = '';                 // Senha vazia no XAMPP

            try {
                // Criar a conexão usando PDO
                $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

                // Configura o PDO para lançar exceções em erros
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return $pdo;

            } catch (PDOException $e) {
                // Mostra erro se a conexão falhar
                die("Database connection failed: " . $e->getMessage());
            }
        }
    }
