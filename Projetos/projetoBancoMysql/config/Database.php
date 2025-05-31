<?php
    // Início da classe Database, que será responsável por conectar ao MySQL
    class Database
    {
        // Dados privados, usados apenas dentro da classe
        private $host = 'localhost';       // Endereço do banco (localhost se for no seu PC)
        private $dbname = 'bank_system';   // Nome do banco de dados
        private $username = 'root';        // Usuário padrão do XAMPP
        private $password = '';            // Senha vazia no XAMPP por padrão
        private $conn;                     // Armazena a conexão PDO

        // Método público que retorna a conexão quando chamada
        public function connect()
        {
            // Tentamos conectar usando um bloco try/catch para tratar possíveis erros
            try {
                // Criamos a string de conexão (DSN) com o banco de dados
                $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", 
                                    $this->username, 
                                    $this->password);

                // Configura o PDO para mostrar erros como exceções (boa prática)
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Retorna a conexão para ser usada em outros arquivos
                return $this->conn;

            } catch (PDOException $e) {
                // Se ocorrer erro, mostramos a mensagem
                die("Database connection failed: " . $e->getMessage());
            }
        }
    }
?>
