
# Library System using PHP + MySQL (OOP + MVC)

This is a beginner-friendly project for practicing object-oriented PHP with MySQL, built using a simplified MVC structure, SESSION for login, and clean file organization.

---

## Goal

Practice PHP concepts with a focus on:

- Object-Oriented Programming (OOP)
- PDO with prepared statements
- Session-based login system
- MVC folder structure
- POST form handling
- Clean and maintainable code

---

## Folder Structure

```
/biblioteca/
├── config/              # Database connection (PDO)
├── controllers/         # Login and book logic
├── models/              # Book and User classes
├── views/               # HTML/PHP pages
├── public/              # index, logout and css
└── README.md
```

---

## Database Setup

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
('George Orwell'), ('J.K. Rowling'), (Jane Austen');

CREATE TABLE livros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    autor_id INT NOT NULL,
    FOREIGN KEY (autor_id) REFERENCES autores(id)
);
```

---

## Features

- Login with email and password
- SESSION-based route protection
- Add book with author selection
- List all books with author names
- Logout
- MVC code organization