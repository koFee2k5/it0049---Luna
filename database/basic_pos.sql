CREATE DATABASE IF NOT EXISTS basic_pos CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE basic_pos;

DROP TABLE IF EXISTS customers;
DROP TABLE IF EXISTS tasks;
DROP TABLE IF EXISTS users;

CREATE TABLE tasks (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(150) NOT NULL,
  status VARCHAR(20) NOT NULL DEFAULT 'pending',
  task_date DATE NOT NULL,
  created_at DATETIME NOT NULL
);

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  full_name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  created_at DATETIME NOT NULL
);

INSERT INTO tasks (title, status, task_date, created_at) VALUES
('Review project requirements', 'completed', '2026-10-09', '2026-10-09 08:00:00'),
('Create database tables', 'completed', '2026-10-09', '2026-10-09 08:30:00'),
('Build task model', 'completed', '2026-10-10', '2026-10-10 09:00:00'),
('Build profile page', 'in progress', '2026-10-10', '2026-10-10 10:00:00'),
('Test today dashboard', 'in progress', '2026-10-11', '2026-10-11 08:00:00'),
('Polish interface', 'pending', '2026-10-11', '2026-10-11 09:00:00'),
('Check navigation', 'pending', '2026-10-11', '2026-10-11 09:30:00'),
('Prepare submission', 'pending', '2026-10-12', '2026-10-12 08:00:00');

INSERT INTO users (username, full_name, email, created_at) VALUES
('luna', 'Juan Lorenzo M. Luna', 'juan.luna@example.com', '2026-10-01 08:00:00');
