CREATE DATABASE estoque;

USE estoque;

-- Tabela de usuários para login
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Inserir um usuário de teste (senha: 123456)
INSERT INTO users (username, password)
VALUES ('admin', SHA2('123456', 256));

-- Tabela de produtos
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    quantity INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Inserir alguns produtos de exemplo
INSERT INTO products (name, quantity) VALUES
('USB Cable', 20),
('Wireless Mouse', 15),
('Laptop Charger', 10);

select * from users;

INSERT INTO users (username, password)
VALUES ('admin', SHA2('123456', 256)),
       ('leandro', SHA2('senha123', 256));
