<?php
    // models/User.php

    require_once 'UserInterface.php';
    require_once __DIR__ . '/../config/Database.php';

    class User implements UserInterface {
        // Atributos privados para aplicar encapsulamento
        private $name;
        private $email;
        private $password;

        private $conn; // Conexão com o banco

        // Construtor: conecta com o banco automaticamente ao criar um User
        public function __construct() {
            $db = new Database();
            $this->conn = $db->connect();
        }

        // Métodos da interface implementados abaixo:

        public function setName($name) {
            $this->name = htmlspecialchars(strip_tags($name)); // Limpa caracteres perigosos
        }

        public function getName() {
            return $this->name;
        }

        public function setEmail($email) {
            $this->email = filter_var($email, FILTER_SANITIZE_EMAIL); // Limpa e-mail
        }

        public function getEmail() {
            return $this->email;
        }

        public function setPassword($password) {
            // Criptografa a senha ao definir
            $this->password = password_hash($password, PASSWORD_DEFAULT);
        }

        public function getPassword() {
            return $this->password;
        }

        // Salva o usuário no banco de dados
        public function save() {
            $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
            $stmt = $this->conn->prepare($sql);

            // Vincula os valores protegidos por bind
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':password', $this->password);

            // Executa e retorna true/false
            return $stmt->execute();
        }

        // Busca um usuário pelo e-mail (para login)
        public function findByEmail($email) {
            $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':email', $email);

            $stmt->execute();

            // Retorna o usuário como array associativo ou false
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
