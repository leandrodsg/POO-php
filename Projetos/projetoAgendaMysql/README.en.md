# Contact Agenda System (PHP + MySQL + OOP + MVC)

Educational project built to practice object-oriented PHP, secure connection to MySQL using PDO, clean file organization (simplified MVC), and session-based user authentication.

---

## Purpose

This project simulates a simple agenda where users can register, list, and delete personal contacts. It also includes user authentication with session control.

- PHP with OOP (encapsulation, classes and attributes)
- MySQL connection using PDO
- Organized codebase following MVC responsibilities
- Basic form validation using `POST`
- Session control using `SESSION` (login/logout)

---

## Folder Structure

```
agenda/
│
├── config/
│   └── Database.php              # PDO connection to MySQL
│
├── controllers/
│   ├── ContatoController.php     # Handles creating, listing, and deleting contacts
│   ├── LoginController.php       # Processes user login
│   └── RegisterController.php    # Processes new user registration
│
├── models/
│   ├── Contato.php               # Contact class
│   └── Usuario.php               # User class
│
├── views/
│   ├── contato_form.php          # Contact form
│   ├── dashboard.php             # Main page with contact list
│   ├── login.html                # Login screen
│   ├── register.html             # Registration screen
│
├── public/
│   └── index.html                # Landing page with login/register links
│
├── logout.php                    # Ends user session
├── agenda_script.sql             # SQL script to set up the database
└── README.en.md                  # Project technical description
```

---

## Database

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

## Features

- User registration with password hashing
- Login with session management
- Personal contact registration
- Contact list for the logged-in user
- Contact deletion
- User logout
