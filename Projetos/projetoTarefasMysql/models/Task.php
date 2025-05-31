<?php
    require_once __DIR__ . '/../config/Database.php';

    class Task {
        private $conn;

        public $id;
        public $descricao;
        public $usuario_id;

        public function __construct() {
            $database = new Database();
            $this->conn = $database->getConnection();
        }

        // Cadastra uma nova tarefa
        public function create() {
            $sql = "INSERT INTO tarefas (descricao, usuario_id) VALUES (:descricao, :usuario_id)";
            $stmt = $this->conn->prepare($sql);

            // Substitui os placeholders pelos valores reais
            $stmt->bindParam(':descricao', $this->descricao);
            $stmt->bindParam(':usuario_id', $this->usuario_id);

            return $stmt->execute(); // Retorna true se salvou, false se falhou
        }

        // Lista todas as tarefas de um usuário
        public function getByUser() {
            $sql = "SELECT * FROM tarefas WHERE usuario_id = :usuario_id ORDER BY id DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':usuario_id', $this->usuario_id);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna array com as tarefas
        }
    }
