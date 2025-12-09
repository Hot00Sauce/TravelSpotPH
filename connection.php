<?php

// Load environment variables from .env file
if (file_exists(__DIR__ . '/.env')) {
    $env = parse_ini_file(__DIR__ . '/.env');
    foreach ($env as $key => $value) {
        putenv("$key=$value");
    }
}

// Configure session settings BEFORE session_start() is called
if (session_status() === PHP_SESSION_NONE) {
    ini_set('session.cookie_lifetime', 86400); // 24 hours
    ini_set('session.gc_maxlifetime', 86400); // 24 hours
    ini_set('session.cookie_httponly', 1); // Prevent JavaScript access to session cookie
    ini_set('session.use_strict_mode', 1); // Prevent session fixation attacks
}

// Database Configuration - Auto-detect environment
$environment = getenv('ENVIRONMENT') ?: 'local';

if ($environment === 'production') {
    // Production: Use remote database from environment variables
    $dbhost = getenv('DB_HOST') ?: 'localhost';
    $dbuser = getenv('DB_USER') ?: 'root';
    $dbpass = getenv('DB_PASS') ?: '';
    $dbname = getenv('DB_NAME') ?: 'regtest';
} else {
    // Local Development: Use local MySQL
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "regtest";
}

// Create database connection
if (!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Set charset to utf8
mysqli_set_charset($con, "utf8");

