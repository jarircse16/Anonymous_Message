<?php
// Function to generate a random captcha string
function generateCaptcha($length = 5)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $captcha = '';
    $charCount = strlen($characters);

    for ($i = 0; $i < $length; $i++) {
        $captcha .= $characters[rand(0, $charCount - 1)];
    }

    session_start();
    $_SESSION['captcha'] = $captcha; // Store the captcha in the session for validation

    echo $captcha; // Output the captcha text as plain text
}

// Generate and output the captcha
generateCaptcha();
?>
