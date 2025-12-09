-- TravelSpotPH Database Setup
-- Run this SQL script to set up the database

-- Create database
CREATE DATABASE IF NOT EXISTS regtest;

-- Use the database
USE regtest;

-- Create users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(20) NOT NULL UNIQUE,
    user_name VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_user_id (user_id),
    INDEX idx_user_name (user_name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Optional: Create a sample user (username: testuser, password: test123)
-- Note: In production, passwords should be hashed!
INSERT INTO users (user_id, user_name, password) VALUES 
('12345', 'testuser', 'test123')
ON DUPLICATE KEY UPDATE user_name=user_name;

-- Display created table structure
DESCRIBE users;

-- Display all users
SELECT * FROM users;
