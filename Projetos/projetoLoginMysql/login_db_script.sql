CREATE DATABASE login_db;
use login_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (name, email, password) VALUES
('Alice', 'user1@example.com', '$2y$10$N9qo8uLOickgx2ZMRZoMyeIjZGhV5WrN/3sHF0ZIcW3n9fR5GybUi'),
('Bob', 'user2@example.com', '$2y$10$K0MZ0G/NcYOgQhQ1F.CBge5XmvG0yPSYQUXU.S1hyQVGjdckO00Oe');

select * from users;

DELETE FROM users
WHERE email IN ('user1@example.com', 'user2@example.com');