<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exercise 3: CSRF Vulnerability</title>
</head>
<body>
<?php
session_start();
$_SESSION['user_id'] = 1;
echo sprintf('Logged in user ID: %d \n', $_SESSION['user_id']);

?>
<h1>Change User Email</h1>
<form method="post" action="change_email.php">
    <label for="email">New Email:</label>
    <input type="email" id="email" name="email" required>
    <button type="submit">Change Email</button>
</form>
</body>
</html>
