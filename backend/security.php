<?php

/**
 * Sanitize IMEI input to ensure it's safe for processing.
 *
 * @param string $imei The IMEI number input.
 * @return string The sanitized IMEI number.
 */
function sanitizeIMEI($imei) {
    return preg_replace('/\D/', '', $imei); // Remove non-numeric characters
}

/**
 * Validate IMEI format (must be 15 digits).
 *
 * @param string $imei The IMEI number to validate.
 * @return bool True if valid, false otherwise.
 */
function validateIMEI($imei) {
    return preg_match('/^\d{15}$/', $imei);
}

/**
 * Verify API Key to restrict unauthorized access.
 *
 * @param string $providedKey The API key from request.
 * @return bool True if valid, false otherwise.
 */
function verifyAPIKey($providedKey) {
    $validAPIKey = "your_secure_api_key"; // Change this to your actual API key

    return $providedKey === $validAPIKey;
}

?>
