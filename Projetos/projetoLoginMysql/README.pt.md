# Projeto PHP POO com Login e Sessão

## Objetivo

Este projeto segue o modelo MVC simplificado, com separação de responsabilidades, organização de arquivos, conexão segura com MySQL usando PDO, e gerenciamento de sessão de usuário com login simples.

---

## Conceitos praticados

- Programação Orientada a Objetos (POO)
- Encapsulamento, Interface, Classe
- Sessões com `$_SESSION` para login
- Banco de dados MySQL com PDO
- `password_hash()` e `password_verify()` para segurança de senha
- Formulários `POST`, redirecionamentos, validações básicas

---

## 🗂 Estrutura de Pastas

```
/login-project
├── config/
│   └── Database.php
├── models/
│   ├── UserInterface.php
│   └── User.php
├── controllers/
│   ├── AuthController.php
│   ├── RegisterController.php
│   └── LogoutController.php
├── views/
│   ├── login.html
│   ├── register.html
│   └── dashboard.php
├── public/
│   └── index.html
└── README.pt.md
```

---

## Banco de Dados

```sql
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
);
```

## Fluxo do usuário

1. Página inicial com links
2. Formulário de cadastro → cria usuário com senha criptografada
3. Formulário de login → verifica com `password_verify()`
4. Sessão criada → usuário é redirecionado para `dashboard.php`
5. Logout → destrói sessão e retorna à página inicial
---