-- Standalone Customer Accounts and User Accounts setup for TFA1.
CREATE DATABASE IF NOT EXISTS basic_pos CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE basic_pos;

DROP TABLE IF EXISTS customers;
DROP TABLE IF EXISTS users;

CREATE TABLE customers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  full_name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  phone VARCHAR(20),
  created_at DATETIME NOT NULL
);

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  full_name VARCHAR(100) NOT NULL,
  avatar VARCHAR(255) NULL,
  created_at DATETIME NOT NULL
);

INSERT INTO customers (full_name, email, phone, created_at) VALUES
('Sofia Martinez', 'sofia.martinez@example.com', '09171234567', '2026-10-01 08:15:00'),
('Noah Williams', 'noah.williams@example.com', '09181234567', '2026-10-02 09:20:00'),
('Isabella Garcia', 'isabella.garcia@example.com', '09191234567', '2026-10-03 10:25:00'),
('Ethan Brown', 'ethan.brown@example.com', '09201234567', '2026-10-04 11:30:00'),
('Mia Davis', 'mia.davis@example.com', '09211234567', '2026-10-05 12:35:00');

INSERT INTO users (username, full_name, created_at) VALUES
('luna', 'Juan Lorenzo M. Luna', '2026-10-01 08:00:00'),
('admin', 'Maria Santos', '2026-10-02 09:00:00'),
('cashier01', 'Paolo Reyes', '2026-10-03 10:00:00'),
('cashier02', 'Ana Garcia', '2026-10-04 11:00:00'),
('manager', 'Rafael Cruz', '2026-10-05 08:30:00');
