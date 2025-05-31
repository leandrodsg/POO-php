<?php
    // Define a classe Database para encapsular a conexão PDO com o MySQL
    class Database {
        // Atributos privados com as informações de acesso ao banco
        private $host = "localhost";
        private $db_name = "tarefas_db";
        private $username = "root";
        private $password = "";
        public $conn; // Conexão será pública para acesso externo (controlado)

        // Método público que retorna a conexão PDO
        public function getConnection() {
            $this->conn = null; // Inicializa com null para evitar erro

            try {
                // Cria a conexão com o banco usando PDO
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8",
                                    $this->username, $this->password);

                // Ativa o modo de erros como exceções para tratar falhas com clareza
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $exception) {
                // Caso dê erro na conexão, exibe a mensagem
                echo "Connection error: " . $exception->getMessage();
            }

            return $this->conn; // Retorna a conexão ativa para uso
        }
    }
