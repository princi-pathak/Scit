$(document).ready(function () {
    const hiddenDiv = document.getElementById('hiddenDiv');
    hiddenDiv.style.display = 'none';
});
var inputField = document.getElementById('lead_id');

if (inputField.value.trim() !== '') {
    hiddenDiv.style.display = 'block'; // Show the div
} else {
    hiddenDiv.style.display = 'none'; // Hide the div if input is empty
}

