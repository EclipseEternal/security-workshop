<?php
    session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exercise 3: CSRF Vulnerability</title>
</head>
<body>
<?php

$_SESSION['user_id'] = 1;
echo sprintf('Logged in user ID: %d <br/>', $_SESSION['user_id']);

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

?>
<h1>Change User Name</h1>
<form method="post" action="change_email.php">
    <label for="username">New User name:</label>
    <input id="username" name="username" required>
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
    <button type="submit">Change Name</button>
</form>
</body>
</html>
