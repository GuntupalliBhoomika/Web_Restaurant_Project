document.getElementById('signup-form').addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent form submission for now (will be handled later)
    
    // Get form inputs
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;
    var address = document.getElementById('address').value;
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirm-password').value;

    // Validate inputs
    if (!name || !email || !phone || !address || !password || !confirmPassword) {
        alert('Please fill in all fields.');
        return;
    }

    if (password !== confirmPassword) {
        alert('Passwords do not match.');
        return;
    }

    // Assuming signup is successful, show the dialog box
    showDialog();
});

function showDialog() {
    var dialog = document.getElementById('dialog');
    dialog.style.display = 'block';
}

document.getElementById('continue-button').addEventListener('click', function () {
    // Redirect to the home page
    window.location.href = 'Homepage.html';
});
