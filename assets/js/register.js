// Eye Opening Logic
let eyeRegister = document.getElementById('eye-register');
let eyeConfirm = document.getElementById('eye-confirm');
let password = document.getElementById('password');
let passwordConfirm = document.getElementById('confirm-password');
eyeRegister.onclick = function () {
    if (password.type == 'password') {
        password.type = 'text';
        eyeRegister.src = '../assets/img/eye-close.png';
    } else {
        password.type = 'password';
        eyeRegister.src = '../assets/img/eye-open.png';
    }
}
eyeConfirm.onclick = function () {
    if (passwordConfirm.type == 'password') {
        passwordConfirm.type = 'text';
        eyeConfirm.src = '../assets/img/eye-close.png';
    } else {
        passwordConfirm.type = 'password';
        eyeConfirm.src = '../assets/img/eye-open.png';
    }
}

// Form Validation
document.querySelector('form').addEventListener('submit', function (event) {

    let fullName = document.getElementById('fullName').value;
    let address = document.getElementById('address').value;
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let confirmPassword = document.getElementById('confirm-password').value;

    let errorFullName = document.getElementById('error-fullName');
    let errorAddress = document.getElementById('error-address');
    let errorEmail = document.getElementById('error-email');
    let errorPassword = document.getElementById('error-password');
    let errorConfirmPassword = document.getElementById('error-confirmPassword');

    if (fullName === '') {
        event.preventDefault();
        errorFullName.textContent = 'Full Name is required';
        return;
    } else {
        errorFullName.textContent = '';
    }

    if (address === '') {
        event.preventDefault();
        errorAddress.textContent = 'Address is required';
        return;
    } else {
        errorAddress.textContent = '';
    }

    if (email === '') {
        event.preventDefault();
        errorEmail.textContent = 'Email is required';
        return;
    } else {
        errorEmail.textContent = '';
    }

    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        event.preventDefault();
        errorEmail.textContent = 'Please enter a valid email';
        return;
    } else {
        errorEmail.textContent = '';
    }

    if (password === '') {
        event.preventDefault();
        errorPassword.textContent = 'Password is required';
        return;
    } else {
        errorPassword.textContent = '';
    }

    if (password.length < 8) {
        event.preventDefault();
        errorPassword.textContent = 'Password must be at least 8 characters long';
        return;
    } else {
        errorPassword.textContent = '';
    }

    if (!/\d/.test(password)) {
        event.preventDefault();
        errorPassword.textContent = 'Password must contain at least one number';
        return;
    } else {
        errorPassword.textContent = '';
    }

    if (confirmPassword !== password) {
        event.preventDefault();
        errorConfirmPassword.textContent = 'Password does not match';
        return;
    } else {
        errorConfirmPassword.textContent = '';
    }

});