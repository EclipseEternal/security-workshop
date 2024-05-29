<form action="index.php" method="post">
    <input type="text" name="username">
    <input type="password" name="password">
    <button type="submit">Submit</button>
</form>

<?php
$conn = new mysqli($_ENV['MYSQL_HOST'], $_ENV['MYSQL_USER'], $_ENV['MYSQL_PASSWORD'], $_ENV['MYSQL_DATABASE']);

$conn->execute_query("CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);");

$conn->execute_query("INSERT INTO users (username, password) VALUES ('super user', 'super password')");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    return;
}
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Welcome, " . htmlspecialchars($username);
} else {
    echo "Invalid credentials.";
}

?>