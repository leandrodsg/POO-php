# Mini Trello Project with PHP & MySQL

This project is a simple task and user manager.

---

## Project Goal

> A practical learning project that includes:

- User account creation
- Secure login with sessions
- Creating and listing tasks by user
- Structured folder organization (MVC-style)
- Clear code with line-by-line explanation

---

## Technologies used

- **PHP** with **PDO** for secure database connection
- **MySQL** for data persistence
- **HTML/CSS** (responsive layout)
- **SESSION** management for login
- File separation: `/models`, `/controllers`, `/views`, `/public`, `/config`

---

## Project Structure

```
PROJETOTAREFASMYSQL/
│
├── config/               # Database connection (Database.php)
├── controllers/          # Form processing (login, tasks)
├── models/               # Entity logic (User, Task)
├── views/                # Pages using HTML + PHP (login, register, dashboard)
├── public/               # Front-facing files (index.html, css, logout.php)
└── README_en.md          # This file
```

---

## Features

- User registration with unique email validation
- Login with password verification
- Task creation for logged-in users
- Route protection via session
- Logout with session destruction
- Clean, responsive interface

---

## Database structure

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