<?php
    // Incluímos a conexão com banco
    require_once __DIR__ . '/../config/Database.php';

    class Livro {

        // Método para salvar um novo livro
        public function salvar($titulo, $autor_id) {
            $pdo = Database::connect();

            $sql = "INSERT INTO livros (titulo, autor_id) VALUES (:titulo, :autor_id)";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':autor_id', $autor_id);

            return $stmt->execute(); // retorna true se der certo
        }

        // Método para listar todos os livros com nome do autor
        public function listarTodos() {
            $pdo = Database::connect();

            $sql = "SELECT livros.id, livros.titulo, autores.nome AS autor
                    FROM livros
                    JOIN autores ON livros.autor_id = autores.id
                    ORDER BY livros.id DESC";

            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC); // retorna lista com todos os livros
        }
    }
