<?php
require 'db.php';

// Fetch messages from the database using a prepared statement
$stmt = $pdo->prepare("SELECT * FROM messages ORDER BY created_at DESC");
$stmt->execute();
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);