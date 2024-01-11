// Eye Logic
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