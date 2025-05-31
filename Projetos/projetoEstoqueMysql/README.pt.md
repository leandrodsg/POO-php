# Sistema de Controle de Estoque (PHP + MySQL + POO + MVC)

Projeto didático desenvolvido com foco na prática de PHP orientado a objetos, conexão segura com MySQL (PDO), organização em pastas (MVC simplificado) e controle de sessões.

---

## Objetivo

Este projeto simula um sistema básico de cadastro e gerenciamento de produtos em estoque, com autenticação de usuário:

- PHP com POO (classes, construtores, encapsulamento básico)
- Conexão com MySQL via PDO
- Estruturação de arquivos em MVC simplificado
- Uso de sessões (SESSION) para login
- Formulários com POST e tratamento de dados

---

## Estrutura de Pastas

```
estoque/
│
├── config/
│   └── Database.php              # Classe de conexão PDO com MySQL
│
├── controllers/
│   ├── AuthController.php        # Login, sessão e autenticação
│   └── ProductController.php     # Lógica de CRUD de produtos
│
├── models/
│   ├── Product.php               # Classe Produto
│   └── User.php                  # Classe Usuário
│
├── views/
│   ├── login.php                 # Formulário de login
│   ├── register.php              # Registro de novo usuário
│   ├── dashboard.php             # Listagem de produtos
│   ├── add_product.php           # Formulário de adição
│   ├── delete_product.php            # Exclui produto (com confirmação)
│   └── edit_product.php          # Edição de produto
│
├── public/
│   └── index.html                # Página inicial do sistema
│
└── logout.php                    # Encerra a sessão
 
```

## Bando de Dados

```sql
CREATE DATABASE estoque;

USE estoque;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password)
VALUES ('admin', SHA2('123456', 256));

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    quantity INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

## Funcionalidades

- Login com verificação segura (`hash sha256`)
- Cadastro de novos usuários
- Cadastro de produtos com nome e quantidade
- Listagem de todos os produtos
- Edição de produtos existentes
- Exclusão com confirmação
- Logout com destruição de sessão