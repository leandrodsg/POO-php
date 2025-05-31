# Sistema de Agenda de Contatos (PHP + MySQL + POO + MVC)

Projeto didático desenvolvido com foco na prática de PHP orientado a objetos, conexão segura com MySQL (PDO), estruturação limpa de arquivos (MVC simplificado) e gerenciamento de sessão para autenticação de usuário.

---

## Objetivo

Este projeto simula uma agenda simples onde é possível cadastrar, listar e excluir contatos pessoais. Também implementa autenticação de usuários via formulário com sessão ativa.

- PHP com POO (encapsulamento, classes e atributos)
- Conexão com MySQL utilizando PDO
- Organização dos arquivos por responsabilidade (MVC)
- Validação simples de formulário com `POST`
- Controle de sessão com `SESSION` (login/logout)

---

## Estrutura de Pastas

```
agenda/
│
├── config/
│   └── Database.php              # Classe de conexão PDO com MySQL
│
├── controllers/
│   ├── ContatoController.php     # Controla criação, listagem e exclusão de contatos
│   ├── LoginController.php       # Processa login do usuário
│   └── RegisterController.php    # Processa cadastro de novo usuário
│
├── models/
│   ├── Contato.php               # Classe Contato
│   └── Usuario.php               # Classe Usuario
│
├── views/
│   ├── contato_form.php          # Formulário para adicionar novo contato
│   ├── dashboard.php             # Página principal com listagem de contatos
│   ├── login.html                # Tela de login
│   ├── register.html             # Tela de cadastro
│
├── public/
│   └── index.html                # Página inicial com link para login/cadastro
│
├── logout.php                    # Encerra a sessão do usuário
├── agenda_script.sql             # Script SQL para criação do banco
└── README.pt.md                  # Descritivo técnico do projeto
```

---

## Banco de Dados

```sql
CREATE DATABASE agenda;

USE agenda;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE contatos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(20),
    usuario_id INT,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);
```

---

## Funcionalidades

- Registro de novo usuário com senha criptografada
- Login de usuário com sessão
- Cadastro de contatos pessoais
- Listagem dos contatos do usuário logado
- Exclusão de contatos
- Logout
