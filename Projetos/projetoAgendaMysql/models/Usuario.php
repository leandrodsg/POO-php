<?php
    // models/Usuario.php

    // Classe que representa um usuário do sistema
    class Usuario {
        public $id;
        public $nome;
        public $email;
        public $senha;

        // Construtor básico para preencher os atributos
        public function __construct($id, $nome, $email, $senha) {
            $this->id = $id;
            $this->nome = $nome;
            $this->email = $email;
            $this->senha = $senha;
        }
    }
?>
