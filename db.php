<?php
// Database connection variables
$host = 'localhost';
$dbname = 'message_board';
$user = 'root';
$pass = '';

// DSN for the connection
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

// PDO options
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Throw exceptions on errors
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Set default fetch mode to associative array
    PDO::ATTR_EMULATE_PREPARES => false, // Use real prepared statements
];

// Connect to the database
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname: " . $e->getMessage());
}
