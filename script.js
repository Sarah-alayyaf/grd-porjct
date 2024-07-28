const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

function register() {
    // Check if all required fields are filled
    const inputs = document.querySelectorAll('.form-container.sign-up input[required]');
    let allFilled = true;
    inputs.forEach(input => {
        if (!input.value.trim()) {
            allFilled = false;
        }
    });

    // Redirect to HomePage.html if all fields are filled
    if (allFilled) {
        window.location.href = 'HomePage.html';
    } else {
        alert('Please fill in all required fields.');
    }
}

function signIn() {
    // Check if username and password fields are filled
    const username = document.getElementById('signin-username').value;
    const password = document.getElementById('signin-password').value;

    if (username.trim() === "" || password.trim() === "") {
        alert("Please fill in all required fields.");
    } else {
        // Redirect to HomePage.html if fields are filled
        window.location.href = 'HomePage.html';
    }
}

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});