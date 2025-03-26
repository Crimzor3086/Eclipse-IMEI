<?php
/**
 * Logs system activities into logs.txt.
 *
 * @param string $message The log message.
 */
function logEvent($message) {
    $log_file = "../backend/storage/logs.txt"; // Log file path
    $timestamp = date("Y-m-d H:i:s"); // Current timestamp
    $log_entry = "[$timestamp] $message" . PHP_EOL; // Log format

    // Append log entry to file
    file_put_contents($log_file, $log_entry, FILE_APPEND);
}
?>
