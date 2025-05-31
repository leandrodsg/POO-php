<?php
    // Primeiro, incluímos o arquivo da conexão
    require_once __DIR__ . '/../config/Database.php';

    // Criamos a classe User, que representa um usuário do sistema
    class User
    {
        // Atributos privados (encapsulados)
        private $conn;       // Conexão com o banco de dados
        private $name;
        private $email;
        private $password;
        private $balance;

        // Construtor da classe: é chamado ao criar um novo objeto User
        public function __construct($name = null, $email = null, $password = null, $balance = 0)
        {
            // Quando instanciamos, já criamos uma conexão com o banco
            $database = new Database();
            $this->conn = $database->connect();

            // Preenchemos os atributos (caso tenham sido passados)
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
            $this->balance = $balance;
        }

        // Método para registrar um novo usuário no banco
        public function register()
        {
            // Antes de salvar, vamos criptografar a senha
            $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);

            // Preparamos a query com parâmetros seguros
            $sql = "INSERT INTO users (name, email, password, balance) 
                    VALUES (:name, :email, :password, :balance)";

            $stmt = $this->conn->prepare($sql);

            // Ligamos os valores aos parâmetros
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':balance', $this->balance);

            // Executamos a inserção
            return $stmt->execute();
        }

        // Método para buscar um usuário por e-mail (ex: no login)
        public function findByEmail($email)
        {
            $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            // Retorna o usuário encontrado (ou false se não achar)
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
?>