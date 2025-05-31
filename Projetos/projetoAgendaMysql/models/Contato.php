<?php
    // models/Contato.php

    // Classe que representa um contato do usuário
    class Contato {
        public $id;
        public $nome;
        public $telefone;
        public $email;
        public $usuario_id;

        // Construtor básico para preencher os atributos
        public function __construct($id, $nome, $telefone, $email, $usuario_id) {
            $this->id = $id;
            $this->nome = $nome;
            $this->telefone = $telefone;
            $this->email = $email;
            $this->usuario_id = $usuario_id;
        }
    }
?>
