<?php
header("Content-Type: application/json");

// Path to the storage file
$data_file = "../backend/storage/data.json";

// Ensure the request is a POST request
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(["error" => "Invalid request method. Use POST."]);
    exit();
}

// Get raw POST data
$input_data = json_decode(file_get_contents("php://input"), true);

// Validate input
if (!isset($input_data["imei"]) || !isset($input_data["status"])) {
    echo json_encode(["error" => "IMEI number and status are required"]);
    exit();
}

$imei = trim($input_data["imei"]);
$status = trim($input_data["status"]);
$reported_on = date("Y-m-d");

// Validate IMEI format (must be 15 digits)
if (!preg_match("/^\d{15}$/", $imei)) {
    echo json_encode(["error" => "Invalid IMEI format. Must be 15 digits."]);
    exit();
}

// Load existing IMEI data
$imei_data = file_exists($data_file) ? json_decode(file_get_contents($data_file), true) : [];

// Check for duplicate IMEI
foreach ($imei_data as $entry) {
    if ($entry["imei"] === $imei) {
        echo json_encode(["error" => "This IMEI is already reported."]);
        exit();
    }
}

// Add new IMEI entry
$imei_data[] = [
    "imei" => $imei,
    "status" => $status,
    "reported_on" => $reported_on
];

// Save to file
file_put_contents($data_file, json_encode($imei_data, JSON_PRETTY_PRINT));

// Success response
echo json_encode(["success" => "IMEI reported successfully", "imei" => $imei, "status" => $status, "reported_on" => $reported_on]);
?>
