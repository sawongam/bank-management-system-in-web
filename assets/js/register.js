// Eye Logic for Register Page
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