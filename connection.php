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

// Determine environment
$environment = getenv('ENVIRONMENT') ?: 'local';
$mongodbUri = getenv('MONGODB_URI');

if ($environment === 'production' && $mongodbUri) {
    // Production: Use MongoDB Atlas
    try {
        // Use MongoDB driver with simple connection
        $mongoClient = new MongoDB\Driver\Manager($mongodbUri);
        $con = $mongoClient;
        
        // Test connection
        $command = new MongoDB\Driver\Command(['ping' => 1]);
        $mongoClient->executeCommand('admin', $command);
        
        // Store in global variable for compatibility
        $GLOBALS['mongodb'] = $mongoClient;
        $GLOBALS['isMongoDb'] = true;
    } catch (Exception $e) {
        die("MongoDB Connection failed: " . $e->getMessage());
    }
} else {
    // Local Development: Use MySQL
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "regtest";

    if (!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
        die("MySQL connection failed: " . mysqli_connect_error());
    }
    
    $GLOBALS['mysql'] = $con;
    $GLOBALS['isMongoDb'] = false;
}
