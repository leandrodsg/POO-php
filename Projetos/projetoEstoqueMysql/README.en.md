
# Stock Control System (PHP + MySQL + OOP + MVC)

Educational project focused on practicing PHP with object-oriented programming, secure MySQL connection using PDO, simplified MVC folder structure, and session control.

---

## Objective

This project simulates a basic inventory system for registering and managing products with user authentication:

- PHP with OOP (classes, constructors, basic encapsulation)
- MySQL connection using PDO
- File structure with simplified MVC
- Use of sessions (SESSION) for login
- POST forms and data handling

---

## Folder Structure

```
estoque/
│
├── config/
│   └── Database.php              # PDO connection class
│
├── controllers/
│   ├── AuthController.php        # Login, session and authentication
│   └── ProductController.php     # CRUD logic for products
│
├── models/
│   ├── Product.php               # Product class
│   └── User.php                  # User class
│
├── views/
│   ├── login.php                 # Login form
│   ├── register.php              # New user registration
│   ├── dashboard.php             # Product listing
│   ├── add_product.php           # Product addition form
│   ├── delete_product.php        # Delete product (with confirmation)
│   └── edit_product.php          # Edit product
│
├── public/
│   └── index.html                # System home page
│
└── logout.php                    # Ends the session

```

## Database

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

## Features

- Login with secure hash verification (`sha256`)
- New user registration
- Product registration with name and quantity
- List all products
- Edit existing products
- Delete product with confirmation
- Logout with session destruction