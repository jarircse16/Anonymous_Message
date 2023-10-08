<?php
$message = "This is a test message.";
$folder = "messages"; // Specify the folder name
$filename = "$folder/test_message.txt"; // Combine folder and filename

if (!is_dir($folder)) {
    // Create the folder if it doesn't exist
    mkdir($folder, 0755, true);
}

if (file_put_contents($filename, $message) !== false) {
    echo "Message saved successfully!";
} else {
    echo "Error saving message.";
}
?>
