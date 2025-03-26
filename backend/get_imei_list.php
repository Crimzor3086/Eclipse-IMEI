<?php
header("Content-Type: application/json");

// Path to IMEI storage file
$data_file = "../backend/storage/data.json";

// Load existing IMEI data
$imei_data = file_exists($data_file) ? json_decode(file_get_contents($data_file), true) : [];

// Return the list of IMEIs as JSON
echo json_encode($imei_data, JSON_PRETTY_PRINT);
?>
