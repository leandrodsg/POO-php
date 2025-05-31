<?php
    // Importa a classe de conexão
    require_once __DIR__ . '/../config/Database.php';

    class ProductController {

        // Adiciona um novo produto no banco
        public static function addProduct($name, $quantity) {
            $conn = Database::connect();

            $sql = "INSERT INTO products (name, quantity) VALUES (:name, :quantity)";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':quantity', $quantity);

            return $stmt->execute();
        }

        // Retorna todos os produtos do banco
        public static function getAllProducts() {
            $conn = Database::connect();

            $sql = "SELECT * FROM products ORDER BY id DESC";
            $stmt = $conn->query($sql);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // Retorna um único produto pelo ID
        public static function getProductById($id) {
            $conn = Database::connect();

            $stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        // Atualiza os dados de um produto
        public static function updateProduct($id, $name, $quantity) {
            $conn = Database::connect();

            $stmt = $conn->prepare("UPDATE products SET name = :name, quantity = :quantity WHERE id = :id");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->bindParam(':id', $id);

            return $stmt->execute();
        }
        // Remove um produto pelo ID
        public static function deleteProduct($id) {
            $conn = Database::connect();

            $stmt = $conn->prepare("DELETE FROM products WHERE id = :id");
            $stmt->bindParam(':id', $id);

            return $stmt->execute();
        }
    }