<?php
session_start();
$conn = new mysqli($_ENV['MYSQL_HOST'], $_ENV['MYSQL_USER'], $_ENV['MYSQL_PASSWORD'], $_ENV['MYSQL_DATABASE']);

echo sprintf('Logged in user ID: %d \n', $_SESSION['user_id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token validation failed");
    }

    $new_email = $_POST['email'];
    $user_id = $_SESSION['user_id']; // Assuming the user is logged in and user_id is stored in session

    # Bonus -> fixing the SQL injection as well
    $stmt = $conn->prepare("UPDATE users SET email = ? WHERE id = ?");
    $stmt->bind_param("si", $new_email, $user_id);
    if ($stmt->execute()) {
        echo "Email changed successfully.";
    } else {
        echo "Failed to change email.";
    }
}
?>
