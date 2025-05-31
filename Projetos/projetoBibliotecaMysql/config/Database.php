<?php
    // Ativamos a exibição de erros (somente para desenvolvimento, remover em produção)
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    // Declaramos a classe Database, que cuidará da conexão com o banco de dados
    class Database {
        // Método estático para permitir chamar sem criar um objeto (Database::connect())
        public static function connect() {
            // Informações necessárias para a conexão
            $host = 'localhost';             // Endereço do servidor MySQL (normalmente é localhost)
            $dbname = 'biblioteca';          // Nome do banco de dados que vamos usar
            $user = 'root';                  // Usuário padrão do XAMPP
            $password = '';                  // Senha padrão (vazia no XAMPP)

            try {
                // Criamos o objeto PDO com as configurações acima
                $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
                
                // Definimos o modo de erro do PDO para lançar exceções (ajuda no debug)
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                // Retornamos a conexão pronta para ser usada
                return $pdo;
            } catch (PDOException $e) {
                // Em caso de erro, mostramos a mensagem (somente em desenvolvimento!)
                die("Database connection failed: " . $e->getMessage());
            }
        }
    }
?>
