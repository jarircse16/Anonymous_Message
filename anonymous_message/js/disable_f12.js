document.onkeydown = function (event) {
    if (event.keyCode == 123) { // 123 is the key code for F12
        console.log("F12 key is disabled.");
        return false; // Prevent default behavior (opening Developer Tools)
    }
};
