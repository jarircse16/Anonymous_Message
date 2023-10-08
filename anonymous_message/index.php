<?php
include 'redirect.php';
// Function to generate a random captcha string
function generateCaptcha($length = 5)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $captcha = '';
    $charCount = strlen($characters);

    for ($i = 0; $i < $length; $i++) {
        $captcha .= $characters[rand(0, $charCount - 1)];
    }

    return $captcha;
}

// Validate captcha
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user inputs
    $message = $_POST['message'];
    $captchaInput = $_POST['captcha'];

    if (isset($_SESSION['captcha']) && $_SESSION['captcha'] === $captchaInput) {
        // Valid captcha, proceed to save the message
        $date = date('Y-m-d_H:i:s'); // Replace spaces with underscores
        $ip = $_SERVER['REMOTE_ADDR'];

        // Check if the directory exists or create it
        $directory = "messages";
        if (!is_dir($directory)) {
            if (!mkdir($directory, 0777, true)) {
                die("Failed to create directory: $directory");
            }
        }

        $date = date('Y-m-d_H-i-s'); // Use underscores and hyphens as separators
        $filename = "./messages/Message_" . $date . ".txt";

        // Save message and IP to a text file
        $content = "Date/Time: $date\nIP: $ip\nMessage: $message\n\n";

        // Check if the file exists
        if (file_put_contents($filename, $content, FILE_APPEND) !== false) {
            echo "<center>&nbsp;&nbsp;&nbsp;&nbsp;</center>";
        } else {
            echo "<center>&nbsp;&nbsp;&nbsp;&nbsp;</center>";
        }
    } else {
        echo "<center>&nbsp;&nbsp;&nbsp;&nbsp;</center>";
    }
} else {
    // Generate and store a random captcha string in the session
    $_SESSION['captcha'] = generateCaptcha();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Send Anonymous Message</title>
    <script src="js/disable_keyboard_shortcut.js"></script>
    <script src="js/disable_right_click.js"></script>
    <script src="js/disable_f12.js"></script>
    <link rel="stylesheet" type="text/css" href="css/disable_text_selection.css">
    <link rel="stylesheet" type="text/css" href="css/textbox_formatting.css">
    <link rel="stylesheet" type="text/css" href="css/color.css">


</head>
<body>
    <h1></h1>
    <form method="POST" action="">

      <!--<label for="message">Message:</label><br><br>-->
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea id="message" name="message" placeholder="Type here" rows="0" cols="0" required></textarea><br><br><br><br><br><br><br><br>

      <!--  <label for="captcha">Captcha:</label><br>-->
        <center><div id="captchaContainer"></div><br>

        <button type="button" onclick="refreshCaptcha()"><img src="images/icons/refresh.png" height="20" width="20" alt="Refresh"></img></button><br><br>

        <input type="text" id="captcha" name="captcha" placeholder="Enter captcha here" required>


        <br><br>

    <button type="submit" value="Send"><img src="images/icons/send.png" height="20" width="20" alt="Send"></button>

    </form></center>

    <script src="js/captcha_refresh.js"></script>
</body>
</html>
