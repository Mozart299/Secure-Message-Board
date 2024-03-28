<?php
session_start();
require 'db.php';

// Check if the request is a POST request, if the user is logged in, and if the CSRF token is valid
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['loggedin']) && isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
    $username = $_SESSION['username']; // Assuming the username is stored in the session
    $message = $_POST['message'] ?? ''; 

    // Insert message into the database with CSRF protection
    $stmt = $pdo->prepare("INSERT INTO messages (username, message) VALUES (?, ?)");
    $stmt->execute([$username, $message]);

    // Redirect back to the message board page
    header('Location: index.php');
    exit;
} else {
    // CSRF token is not set or not valid, handle the error appropriately
    echo "Error: Invalid CSRF token or user not logged in.";
    exit;
}
?>