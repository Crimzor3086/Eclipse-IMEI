<?php
session_start();

// Hardcoded admin credentials (change these for security)
$admin_user = "admin";
$admin_pass = "password";

// If already logged in, redirect to admin panel
if (isset($_SESSION["admin_logged_in"])) {
    header("Location: admin.php");
    exit();
}

// Handle login attempt
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["username"] === $admin_user && $_POST["password"] === $admin_pass) {
        $_SESSION["admin_logged_in"] = true;
        header("Location: admin.php");
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Eclipse IMEI</title>
    <link rel="stylesheet" href="../frontend/assets/css/styles.css">
</head>
<body>
    <h2>Admin Login</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</body>
</html>
