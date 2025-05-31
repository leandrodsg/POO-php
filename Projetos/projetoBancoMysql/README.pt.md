# Sistema de Conta Bancária (PHP + MySQL + POO + MVC)

Projeto didático construído para praticar conceitos fundamentais de PHP com orientação a objetos, integração com MySQL via PDO e uso de sessões para controle de autenticação de usuários.

---

## Objetivo

Este sistema simula uma aplicação bancária simples onde é possível:

- Criar uma conta com nome, email e senha
- Fazer login seguro
- Visualizar saldo da conta
- Realizar depósitos e saques
- Encerrar sessão

---

## Estrutura de Pastas

```
banco/
│
├── config/
│   └── Database.php              # Conexão PDO com banco de dados
│
├── controllers/
│   ├── AuthController.php        # Login, cadastro e sessão do usuário
│   └── AccountController.php     # Depósito, saque e atualização de saldo
│
├── models/
│   └── User.php                  # Classe Usuário (representa uma conta bancária)
│
├── views/
│   ├── login.html                # Tela de login
│   ├── register.html             # Tela de cadastro
│   └── dashboard.php             # Área logada com saldo e ações
│
├── public/
│   └── index.html                # Página inicial com links para login/cadastro
│
├── logout.php                    # Encerra a sessão do usuário
├── banco_script.sql              # Script SQL para criação do banco
└── README.pt.md                  # Descrição técnica do projeto
```

---

## Banco de Dados

```sql
CREATE DATABASE bank_system;

USE bank_system;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    balance DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

## Funcionalidades

- Registro de usuário com senha criptografada
- Login com verificação segura
- Sessão ativa com dados do usuário logado
- Visualização do saldo atual
- Depósito e saque de valores
- Logout
