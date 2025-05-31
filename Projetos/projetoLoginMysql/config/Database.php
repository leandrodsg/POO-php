<?php
    // config/Database.php

    // Criamos a classe Database para organizar a conexão com o banco
    class Database {
        // Atributos privados com as informações da conexão
        private $host = "localhost";           // Endereço do banco (geralmente localhost no XAMPP)
        private $db_name = "login_db";         // Nome do banco de dados que criamos no Workbench
        private $username = "root";            // Usuário padrão do MySQL no XAMPP
        private $password = "";                // Senha padrão (geralmente vazia no XAMPP)
        private $conn;                         // Vai armazenar a conexão PDO

        // Método público para criar e retornar a conexão
        public function connect() {
            $this->conn = null; // Começa com a conexão vazia

            try {
                // Tenta criar uma nova conexão com PDO
                $this->conn = new PDO(
                    "mysql:host={$this->host};dbname={$this->db_name};charset=utf8",
                    $this->username,
                    $this->password
                );

                // Configura o modo de erro do PDO para lançar exceções (útil para debug)
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $e) {
                // Se der erro, mostra a mensagem (em produção isso seria escondido!)
                echo "Connection error: " . $e->getMessage();
            }

            // Retorna a conexão criada (ou null se deu erro)
            return $this->conn;
        }
    }
