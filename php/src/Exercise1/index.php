<?php
// Vulnerable Code
$conn = new mysqli("db", "user", "password", "test");

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Welcome, " . htmlspecialchars($username);
} else {
    echo "Invalid credentials.";
}
?>