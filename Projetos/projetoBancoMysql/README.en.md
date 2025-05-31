# Bank Account System (PHP + MySQL + OOP + MVC)

Educational project designed to practice key concepts of PHP with object-oriented programming, MySQL integration using PDO, and session handling for secure user authentication.

---

## Purpose

This system simulates a simple bank account application where users can:

- Create an account with name, email, and password
- Log in securely
- View account balance
- Perform deposits and withdrawals
- Log out safely

---

## Folder Structure

```
bank/
│
├── config/
│   └── Database.php              # PDO connection to the database
│
├── controllers/
│   ├── AuthController.php        # Handles user login, registration, and session
│   └── AccountController.php     # Handles deposit, withdrawal, and balance updates
│
├── models/
│   └── User.php                  # User class (represents a bank account)
│
├── views/
│   ├── login.html                # Login page
│   ├── register.html             # Registration page
│   └── dashboard.php             # Logged-in area with balance and actions
│
├── public/
│   └── index.html                # Landing page with links to login/register
│
├── logout.php                    # Ends the user session
├── banco_script.sql              # SQL script to set up the database
└── README.en.md                  # Technical project description
```

---

## Database

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

## Features

- User registration with password hashing
- Secure login verification
- Active session with logged-in user data
- Current balance display
- Deposit and withdrawal operations
- Logout functionality
