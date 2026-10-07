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
  created_at DATETIME NOT NULL
);

INSERT INTO customers (full_name, email, phone, created_at) VALUES
('Ana Reyes', 'ana.reyes@example.com', '0917-123-4501', '2026-10-01 09:00:00'),
('Ben Santos', 'ben.santos@example.com', '0917-123-4502', '2026-10-01 09:15:00'),
('Carla Mendoza', 'carla.mendoza@example.com', '0917-123-4503', '2026-10-02 10:30:00'),
('Diego Cruz', 'diego.cruz@example.com', '0917-123-4504', '2026-10-03 11:45:00'),
('Ella Garcia', 'ella.garcia@example.com', '0917-123-4505', '2026-10-04 13:00:00');

INSERT INTO users (username, full_name, created_at) VALUES
('admin', 'Alex Dela Cruz', '2026-10-01 08:00:00'),
('manager01', 'Bianca Flores', '2026-10-01 08:15:00'),
('cashier01', 'Carlo Ramos', '2026-10-01 08:30:00'),
('cashier02', 'Diana Lim', '2026-10-01 08:45:00'),
('stock01', 'Enzo Navarro', '2026-10-01 09:00:00');
