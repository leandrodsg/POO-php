CREATE DATABASE tarefas_db;

USE tarefas_db;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);

CREATE TABLE tarefas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descricao TEXT NOT NULL,
    usuario_id INT,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

ALTER TABLE usuarios
ADD senha VARCHAR(255) NOT NULL,
ADD CONSTRAINT email_unico UNIQUE (email);