<?php
header("Content-Type: application/json");

// Path to IMEI storage file
$data_file = "../backend/storage/data.json";

// Load existing IMEI data
$imei_data = file_exists($data_file) ? json_decode(file_get_contents($data_file), true) : [];

// Check if an IMEI was provided
if (!isset($_GET["imei"])) {
    echo json_encode(["error" => "IMEI number is required"]);
    exit();
}

$searched_imei = trim($_GET["imei"]);
$result = ["imei" => $searched_imei, "status" => "Not Found"];

// Search for the IMEI in the data
foreach ($imei_data as $imei_entry) {
    if ($imei_entry["imei"] === $searched_imei) {
        $result["status"] = $imei_entry["status"];
        $result["reported_on"] = $imei_entry["reported_on"];
        break;
    }
}

// Return the result as JSON
echo json_encode($result);
?>
