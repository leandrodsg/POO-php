<?php
    // Classe que representa um Produto do estoque
    class Product {
        // Atributos públicos (simples e diretos)
        public $id;
        public $name;
        public $quantity;
        public $created_at;

        // Construtor para preencher os dados ao criar um objeto
        public function __construct($id, $name, $quantity, $created_at) {
            $this->id = $id;
            $this->name = $name;
            $this->quantity = $quantity;
            $this->created_at = $created_at;
        }
    }