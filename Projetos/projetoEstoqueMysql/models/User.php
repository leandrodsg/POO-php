<?php
    // Classe que representa um usuário do sistema
    class User {
        // Atributos públicos e simples
        public $id;
        public $username;
        public $password;

        // Construtor para criar objetos User
        public function __construct($id, $username, $password) {
            $this->id = $id;
            $this->username = $username;
            $this->password = $password;
        }
    }