<?php
    // models/UserInterface.php

    // Interface define o que toda classe de "usuário" precisa implementar
    interface UserInterface {
        public function setName($name);     // Define o nome
        public function getName();          // Pega o nome

        public function setEmail($email);   // Define o e-mail
        public function getEmail();         // Pega o e-mail

        public function setPassword($password); // Define a senha (criptografada)
        public function getPassword();          // Pega a senha (criptografada)

        public function save();             // Salva o usuário no banco
        public function findByEmail($email); // Busca usuário por e-mail
    }
