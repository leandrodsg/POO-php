
# Sistema de Biblioteca com PHP + MySQL (POO + MVC)

Este projeto é um sistema didático de biblioteca desenvolvido em PHP com Programação Orientada a Objetos (POO), PDO para acesso a banco de dados MySQL, uso de SESSION para login e estruturação em padrão MVC simples.

### Objetivo

Praticar os conceitos de PHP com foco em:

- POO (encapsulamento, classes, métodos)
- PDO com prepared statements
- Sessões (`SESSION`) para autenticação
- Estrutura de diretórios em MVC
- Manipulação de formulários `POST`
- Organização de arquivos para projeto real

---

## Estrutura de Pastas

```
/biblioteca/
├── config/              # Conexão com o banco (PDO)
├── controllers/         # Lógica de login e livros
├── models/              # Classes Livro e Usuario
├── views/               # Páginas HTML/PHP
├── public/              # index, logout e css
└── README.md
```

---

## Banco de Dados

BD `biblioteca` no MySQL com as tabelas:

```sql
CREATE DATABASE biblioteca;
USE biblioteca;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(100) NOT NULL
);

INSERT INTO usuarios (email, senha)
VALUES ('admin@example.com', '123456');

CREATE TABLE autores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL
);

INSERT INTO autores (nome) VALUES
('George Orwell'), ('J.K. Rowling'), ('Jane Austen');

CREATE TABLE livros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    autor_id INT NOT NULL,
    FOREIGN KEY (autor_id) REFERENCES autores(id)
);
```

---

## Funcionalidades

- Login de usuário com verificação
- Proteção de rotas com `SESSION`
- Cadastro de livro com SELECT de autor
- Listagem de livros com autor
- Logout funcional
- Estrutura MVC limpa e simples