<?php

// Configure session settings BEFORE session_start() is called
if (session_status() === PHP_SESSION_NONE) {
    ini_set('session.cookie_lifetime', 86400); // 24 hours
    ini_set('session.gc_maxlifetime', 86400); // 24 hours
    ini_set('session.cookie_httponly', 1); // Prevent JavaScript access to session cookie
    ini_set('session.use_strict_mode', 1); // Prevent session fixation attacks
}

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "regtest";

if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
{
    die("failed to connect!");
}