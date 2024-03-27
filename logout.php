<?php
session_start();

// Check if the CSRF token is set and valid
if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
    // Log out the user
    $_SESSION = array();
    session_destroy();

    // Redirect to the login page
    header('Location: index.php');
    exit;
} else {
    // CSRF token is not set or not valid, handle the error appropriately
    echo "Error: Invalid CSRF token.";
    exit;
}
