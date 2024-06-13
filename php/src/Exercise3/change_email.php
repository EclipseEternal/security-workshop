<?php
session_start();
$conn = new mysqli($_ENV['MYSQL_HOST'], $_ENV['MYSQL_USER'], $_ENV['MYSQL_PASSWORD'], $_ENV['MYSQL_DATABASE']);

echo sprintf('Logged in user ID: %d \n', $_SESSION['user_id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_user_name = $_POST['username'];
    $user_id = $_SESSION['user_id']; // Assuming the user is logged in and user_id is stored in session

    $query = "UPDATE users SET `username` = '$new_user_name' WHERE id = $user_id";
    if ($conn->query($query)) {
        echo "User name changed successfully.";
    } else {
        echo "Failed to change email.";
    }
}
?>
