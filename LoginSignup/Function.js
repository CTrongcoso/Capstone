var popup = document.getElementById('Confirmation');
var display = 0;

function hideShow() {
    if (popup.style.display === 'block') {
        popup.style.display = 'none';
        display = 0;  // Change to 0 when hiding
    } else {
        popup.style.display = 'block';
        display = 1;  // Change to 1 when showing
    }
}
