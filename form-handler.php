<?php
// Simple form debugger for ASGUHM LP Treatment Plugin

header('Content-Type: text/plain; charset=utf-8');

echo "--- ASGUHM LP Form Debugger ---

";
echo "Form submitted on: " . date("Y-m-d H:i:s") . "\n";
echo "------------------------------------

";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST)) {
        echo "No POST data received.";
    } else {
        echo "Received POST data:\n\n";
        foreach ($_POST as $key => $value) {
            // Sanitize output just in case, although we are printing plain text
            $key_sanitized = htmlspecialchars($key, ENT_QUOTES, 'UTF-8');
            $value_sanitized = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
            echo "- " . $key_sanitized . ": " . $value_sanitized . "\n";
        }
    }
} else {
    echo "This handler only accepts POST requests.";
}

echo "\n\n--- End of Debug ---";


