// Eye Opening Logic
let eyeLogin = document.getElementById('eye-login');
let password = document.getElementById('password');
eyeLogin.onclick = function () {
    if (password.type == 'password') {
        password.type = 'text';
        eyeLogin.src = '../assets/img/eye-close.png';
    } else {
        password.type = 'password';
        eyeLogin.src = '../assets/img/eye-open.png';
    }
}

//Client Side Validation
document.querySelector('form').addEventListener('submit', function (event) {

    let accNo = document.getElementById('accountNumber').value;
    let password = document.getElementById('password').value;
    let errorAccNo = document.getElementById('error-accountNumber');
    let errorPassword = document.getElementById('error-password');

    if (accNo === '') {
        event.preventDefault();
        errorAccNo.textContent = 'Account Number is required';
        return;
    } else {
        errorAccNo.textContent = '';
    }

    if (password === '') {
        event.preventDefault();
        errorPassword.textContent = 'Password is required';
        return;
    } else {
        errorPassword.textContent = '';
    }

});