-- Criar o banco
CREATE DATABASE IF NOT EXISTS agenda_contatos DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE agenda_contatos;

-- Tabela de usuários (para login)
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

-- Tabela de contatos (pertencem a um usuário)
CREATE TABLE contatos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(20),
    email VARCHAR(100),
    usuario_id INT,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

-- Inserir um usuário de teste
INSERT INTO usuarios (nome, email, senha)
VALUES ('Leandro', 'leandro@exemplo.com', MD5('123456'));

select * from usuarios;

-- Inserir um contato para esse usuário (suponha que id do usuário é 1)
INSERT INTO contatos (nome, telefone, email, usuario_id)
VALUES ('Contato Teste', '11999998888', 'exemplo.com', 1);
