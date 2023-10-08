// Disable keyboard shortcuts (Ctrl+C, Ctrl+X, Ctrl+V)
document.addEventListener('keydown', function (e) {
    if ((e.ctrlKey || e.metaKey) && (e.key === 'c' || e.key === 'x' || e.key === 'v')) {
        e.preventDefault();
    }
});
