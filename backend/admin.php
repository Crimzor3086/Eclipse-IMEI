<?php
session_start();

$admin_user = "admin";  // Change this for security
$admin_pass = "password"; // Change this for security

// Handle login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    if ($_POST["username"] === $admin_user && $_POST["password"] === $admin_pass) {
        $_SESSION["admin_logged_in"] = true;
    } else {
        $error = "Invalid username or password!";
    }
}

// Handle logout
if (isset($_GET["logout"])) {
    session_destroy();
    header("Location: admin.php");
    exit();
}

// Check if admin is logged in
if (!isset($_SESSION["admin_logged_in"])) {
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
            <button type="submit" name="login">Login</button>
        </form>
    </body>
    </html>
<?php
    exit();
}

// If admin is logged in, display dashboard
$data_file = "../backend/storage/data.json";
$imei_data = file_exists($data_file) ? json_decode(file_get_contents($data_file), true) : [];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Eclipse IMEI</title>
    <link rel="stylesheet" href="../frontend/assets/css/styles.css">
</head>
<body>
    <h2>Admin Panel - Reported IMEIs</h2>
    <a href="?logout=true">Logout</a>
    <table border="1">
        <tr>
            <th>IMEI</th>
            <th>Status</th>
            <th>Reported On</th>
        </tr>
        <?php foreach ($imei_data as $imei) { ?>
            <tr>
                <td><?php echo htmlspecialchars($imei["imei"]); ?></td>
                <td><?php echo htmlspecialchars($imei["status"]); ?></td>
                <td><?php echo htmlspecialchars($imei["reported_on"]); ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
