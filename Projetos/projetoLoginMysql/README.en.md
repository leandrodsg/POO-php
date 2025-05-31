
# PHP OOP Project with Login and Session

## Objective

This project follows a simplified MVC structure with clear separation of responsibilities, organized folders, secure MySQL connection using PDO, and session-based user login management.

---

## Key Concepts Practiced

- Object-Oriented Programming (OOP)
- Encapsulation, Interface, Class
- Sessions using `$_SESSION` for login
- MySQL database with PDO
- `password_hash()` and `password_verify()` for password security
- HTML forms with `POST`, redirections, and basic validations

---

## 🗂 Project Structure

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
└── README.md
```

---

## Database

```sql
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
);
```

## User Flow

1. Homepage with links
2. Registration form → creates user with encrypted password
3. Login form → verifies using `password_verify()`
4. Session created → user is redirected to `dashboard.php`
5. Logout → destroys session and returns to the homepage
---
