<?php
$base_url = "/Anonymous_Message"; // Set this to the base URL of your site

// Custom error handler function
function custom404Error() {
    global $base_url;
    header("Location: $base_url/index.php");
    exit;
}

// Set the custom error handler
set_error_handler("custom404Error");

// Check if the request URI is valid, and if not, trigger a custom error
if ($_SERVER['REQUEST_URI'] !== "$base_url/index.php" && $_SERVER['REQUEST_URI'] !== "$base_url/") {
    trigger_error("Invalid URL", E_USER_ERROR);
}

// Restore the default error handler
restore_error_handler();

?>
