CREATE DATABASE IF NOT EXISTS basic_pos CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE basic_pos;

DROP TABLE IF EXISTS customers;
DROP TABLE IF EXISTS tasks;
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
  email VARCHAR(100) NOT NULL,
  created_at DATETIME NOT NULL
);

CREATE TABLE tasks (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(150) NOT NULL,
  description TEXT,
  status ENUM('Pending', 'In Progress', 'Completed') NOT NULL DEFAULT 'Pending',
  task_date DATE NOT NULL,
  created_at DATETIME NOT NULL
);

INSERT INTO customers (full_name, email, phone, created_at) VALUES
('Mara Villanueva', 'mara.villanueva@lunatasks.test', '0917-284-6301', '2026-10-01 09:00:00'),
('Nico Bautista', 'nico.bautista@lunatasks.test', '0917-284-6302', '2026-10-01 09:15:00'),
('Sofia Navarro', 'sofia.navarro@lunatasks.test', '0917-284-6303', '2026-10-02 10:30:00'),
('Paolo Mercado', 'paolo.mercado@lunatasks.test', '0917-284-6304', '2026-10-03 11:45:00'),
('Leah Castillo', 'leah.castillo@lunatasks.test', '0917-284-6305', '2026-10-04 13:00:00');

INSERT INTO users (username, full_name, email, created_at) VALUES
('luna', 'Juan Lorenzo M. Luna', 'juan.luna@example.com', '2026-10-01 08:00:00');

INSERT INTO tasks (title, description, status, task_date, created_at) VALUES
('Review project requirements', 'Check the laboratory instructions and plan the implementation.', 'Completed', '2026-10-09', '2026-10-09 08:00:00'),
('Create database tables', 'Prepare the tasks and users tables for the application.', 'Completed', '2026-10-09', '2026-10-09 08:30:00'),
('Build task model', 'Connect the tasks table to CodeIgniter through TaskModel.', 'Completed', '2026-10-10', '2026-10-10 09:00:00'),
('Build profile page', 'Display the demo user account on the profile route.', 'In Progress', '2026-10-10', '2026-10-10 10:00:00'),
('Test today dashboard', 'Verify that the welcome page filters tasks by today’s date.', 'In Progress', '2026-10-11', '2026-10-11 08:00:00'),
('Polish interface', 'Apply the soft pink visual theme and responsive layout.', 'Pending', '2026-10-11', '2026-10-11 09:00:00'),
('Check navigation', 'Test all required routes and links.', 'Pending', '2026-10-11', '2026-10-11 09:30:00'),
('Prepare submission', 'Review the project files and database export before submission.', 'Pending', '2026-10-12', '2026-10-12 08:00:00');
