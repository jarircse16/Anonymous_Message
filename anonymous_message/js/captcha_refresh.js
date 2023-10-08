// Function to refresh the captcha and change placeholder colors
function refreshCaptcha() {
    var captchaContainer = document.getElementById('captchaContainer');
    var inputElements = document.querySelectorAll('input');
    var textareaElement = document.querySelector('textarea');

    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'captcha.php', true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            captchaContainer.innerHTML = xhr.responseText;
            var placeholderColor = getRandomColor(); // Get a random color for placeholders

            // Change placeholder color for text areas
            textareaElement.style.setProperty('color', placeholderColor, 'important');

            // Change placeholder color for input boxes
            inputElements.forEach(function (input) {
                input.style.setProperty('color', placeholderColor, 'important');
            });

            captchaContainer.style.color = placeholderColor; // Change text color
            //captchaContainer.style.backgroundColor = 'black'; // Change this to your desired background color
            captchaContainer.style.border = 'none'; // Remove the border
            captchaContainer.style.fontSize = '24px'; // Set the font size to 24px
            captchaContainer.style.fontFamily = 'Consolas, monospace'; // Set the font family to Consolas
        }
    };
    xhr.send();
}

// Function to generate a random color (hexadecimal format) excluding black
function getRandomColor() {
    const letters = '0123456789ABCDEF';
    let color = '#';

    do {
        color = '#';

        for (let i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
    } while (color === '#000000'); // Keep generating until a non-black color is generated

    return color;
}

// Initial captcha generation when the page loads
refreshCaptcha();
