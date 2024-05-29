<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Process login (this example assumes credentials are correct)
    echo "Logged in as " . htmlspecialchars($username);
}
?>