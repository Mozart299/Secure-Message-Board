<?php
// login.php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? ''; // In a real application, you would hash and verify the password

    // Secure SQL query using prepared statements
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->execute([$username, $password]);

    if ($stmt->rowCount() > 0) {
        // User authenticated
        $user = $stmt->fetch();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $user['username']; // It's safer to use the username from the database
        header('Location: index.php');
        exit;
    } else {
        // User not authenticated
        $_SESSION['error'] = 'Invalid username or password.';
        header('Location: index.php');
        exit;
    }
}
?>