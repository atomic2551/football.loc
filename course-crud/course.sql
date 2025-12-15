CREATE DATABASE course_db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE course_db;

CREATE TABLE courses (
                         id INT AUTO_INCREMENT PRIMARY KEY,
                         name VARCHAR(100) NOT NULL,
                         teacher VARCHAR(100) NOT NULL,
                         duration INT NOT NULL
);
