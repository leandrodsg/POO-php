# Projeto Mini Trello com PHP & MySQL

Este projeto é um sistema simples de cadastro de usuários e tarefas, no estilo "mini Trello".

---

## Objetivo do Projeto

> Criar uma aplicação funcional que permita:

- Criar conta de usuário
- Fazer login com senha segura
- Criar e listar tarefas pessoais
- Gerenciar sessões com segurança
- Usar organização de arquivos em pastas (MVC básico)

---

## Tecnologias utilizadas

- PHP com PDO para conexão segura com MySQL
- MySQL para persistência de dados
- HTML/CSS responsivo (sem frameworks externos)
- SESSION para autenticação do usuário
- Organização com pastas: `/models`, `/controllers`, `/views`, `/public`, `/config`

---

## Estrutura de Pastas

```
PROJETOTAREFASMYSQL/
│
├── config/               # Conexão com o banco (Database.php)
├── controllers/          # Processamento de formulários (login, tarefas)
├── models/               # Representação de entidades (User, Task)
├── views/                # Telas com HTML + PHP (login, cadastro, dashboard)
├── public/               # Arquivos acessíveis no navegador (index.html, css, logout.php)
└── README_pt.md          # Este arquivo
```

---

## Funcionalidades

-  Cadastro de usuário com validação de email único
-  Login com verificação de senha segura
-  Criação de tarefas vinculadas ao usuário logado
-  Proteção de rotas via sessão
-  Logout com destruição de sessão
-  Interface amigável e responsiva

---

## Banco de Dados usado

```sql
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE tarefas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descricao TEXT NOT NULL,
    usuario_id INT,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);
```