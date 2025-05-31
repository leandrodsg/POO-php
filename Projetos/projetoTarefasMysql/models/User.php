<?php
    require_once __DIR__ . '/../config/Database.php';

    // Classe que representa o usuário do sistema
    class User {
        private $conn;

        // Atributos que vamos usar no cadastro e login
        public $id;
        public $name;
        public $email;
        public $password;

        // Construtor - conecta com o banco
        public function __construct() {
            $database = new Database();
            $this->conn = $database->getConnection();
        }

        // Método para cadastrar um novo usuário
        public function register() {
            // Verifica se já existe um usuário com este email
            $sql_check = "SELECT id FROM usuarios WHERE email = :email";
            $stmt = $this->conn->prepare($sql_check);
            $stmt->bindParam(':email', $this->email);
            $stmt->execute();

            // Se encontrar, não deixa cadastrar de novo
            if ($stmt->rowCount() > 0) {
                return false;
            }

            // Criptografa a senha antes de salvar
            $senha_segura = password_hash($this->password, PASSWORD_DEFAULT);

            // Prepara o SQL de inserção
            $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:name, :email, :password)";
            $stmt = $this->conn->prepare($sql); // Preparando a SQL

            // Substitui os valores nos placeholders
            $stmt->bindParam(':name', $this->name); // Ligando os valores
            $stmt->bindParam(':email', $this->email); // Ligando os valores
            $stmt->bindParam(':password', $senha_segura); // Ligando os valores

            // Executa o insert
            return $stmt->execute(); // Executando a ação
        }

        // Método para fazer login
        public function login() {
            // Busca o usuário pelo email
            $sql = "SELECT * FROM usuarios WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':email', $this->email);
            $stmt->execute();

            // Se encontrou 1 usuário
            if ($stmt->rowCount() == 1) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                // Verifica se a senha digitada bate com a senha criptografada
                if (password_verify($this->password, $user['senha'])) {
                    return $user; // Login ok
                }
            }

            return false; // Login falhou
        }
    }
