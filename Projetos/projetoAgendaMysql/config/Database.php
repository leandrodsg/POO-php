<?php
    // config/Database.php

    class Database {
        // Propriedades privadas para armazenar os dados da conexão
        private $host = 'localhost';           // Host do banco (XAMPP usa localhost)
        private $dbname = 'agenda_contatos';   // Nome do banco criado no Workbench
        private $usuario = 'root';             // Usuário padrão do XAMPP
        private $senha = '';                   // Senha padrão do XAMPP (normalmente vazia)

        public $conexao; // Essa propriedade será usada para guardar a conexão PDO

        // Método que retorna a conexão
        public function conectar() {
            $this->conexao = null;

            try {
                // Criamos a conexão com o banco usando PDO
                $this->conexao = new PDO(
                    "mysql:host=" . $this->host . ";dbname=" . $this->dbname,
                    $this->usuario,
                    $this->senha
                );

                // Configuramos o PDO para lançar exceções em caso de erro
                $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $e) {
                // Se der erro, mostramos a mensagem (em um projeto real, seria melhor logar isso)
                echo "Erro de conexão com o banco: " . $e->getMessage();
            }

            // Retorna o objeto de conexão
            return $this->conexao;
        }
    }
?>