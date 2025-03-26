<?php
session_start();

// Ensure only logged-in admins can access this page
if (!isset($_SESSION["admin_logged_in"])) {
    header("Location: login.php");
    exit();
}

// Path to JSON file
$data_file = "../backend/storage/data.json";

// Load existing IMEI data
$imei_data = file_exists($data_file) ? json_decode(file_get_contents($data_file), true) : [];

// Handle delete request
if (isset($_GET["delete"])) {
    $imei_to_delete = $_GET["delete"];
    $imei_data = array_filter($imei_data, function ($entry) use ($imei_to_delete) {
        return $entry["imei"] !== $imei_to_delete;
    });

    file_put_contents($data_file, json_encode(array_values($imei_data), JSON_PRETTY_PRINT));
    header("Location: manage_imei.php");
    exit();
}

// Handle update request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_imei"])) {
    $imei_to_update = $_POST["imei"];
    $new_status = $_POST["status"];

    foreach ($imei_data as &$entry) {
        if ($entry["imei"] === $imei_to_update) {
            $entry["status"] = $new_status;
            break;
        }
    }

    file_put_contents($data_file, json_encode($imei_data, JSON_PRETTY_PRINT));
    header("Location: manage_imei.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage IMEI Records - Eclipse IMEI</title>
    <link rel="stylesheet" href="../frontend/assets/css/styles.css">
</head>
<body>
    <h2>Manage IMEI Records</h2>
    <a href="admin.php">Back to Admin Panel</a>
    <a href="admin.php?logout=true" style="float:right;">Logout</a>

    <table border="1">
        <tr>
            <th>IMEI</th>
            <th>Status</th>
            <th>Reported On</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($imei_data as $imei) { ?>
            <tr>
                <td><?php echo htmlspecialchars($imei["imei"]); ?></td>
                <td>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="imei" value="<?php echo htmlspecialchars($imei["imei"]); ?>">
                        <select name="status">
                            <option value="Lost" <?php if ($imei["status"] == "Lost") echo "selected"; ?>>Lost</option>
                            <option value="Found" <?php if ($imei["status"] == "Found") echo "selected"; ?>>Found</option>
                        </select>
                        <button type="submit" name="update_imei">Update</button>
                    </form>
                </td>
                <td><?php echo htmlspecialchars($imei["reported_on"]); ?></td>
                <td>
                    <a href="?delete=<?php echo urlencode($imei["imei"]); ?>" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
