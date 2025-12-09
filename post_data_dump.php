<?php
/**
 * post_data_dump.php
 *
 * This script is for testing purposes. It receives POST requests and
 * outputs all received POST data in a key-value pair format.
 *
 * It has no dependencies on WordPress, themes, or other plugins.
 */

header('Content-Type: text/plain; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "--- Received POST Data ---

";
    if (!empty($_POST)) {
        foreach ($_POST as $key => $value) {
            // Handle arrays/objects within POST data if necessary
            if (is_array($value) || is_object($value)) {
                echo $key . ": " . print_r($value, true) . "\n";
            } else {
                echo $key . ": " . $value . "\n";
            }
        }
    } else {
        echo "No POST data received.
";
    }
} else {
    echo "This script only processes POST requests.
";
}

echo "\n--------------------------\n";
echo "Current Timestamp: " . date('Y-m-d H:i:s') . "\n";
?>
