/*==================================================================================
    Custom JS (Any custom js code you want to apply should be defined here).
====================================================================================*/
/* Show or Hide Password */
const passwordField = document.getElementsByClassName("o-show-pass");
const validIcon = document.getElementsByClassName("valid-pass");
const valid = document.querySelectorAll('input:required:invalid+.valid-img');
const message = document.querySelectorAll('.password-rule>p');
const pass_log_msg = document.querySelector('.password-rule-login>p');
const log_passfield = document.querySelector('.o-log-passfield');
const btn = document.querySelector('.btn-register');


//  password validation
passwordField[0].addEventListener('keyup', function () {
    // password valid check
    if (passwordField[0].validity.valid) {
        message[0].innerHTML = 'Password valid'
        message[0].classList.add('text-success')
        setTimeout(function () {
            message[0].innerHTML = ''
        }, 3000)
        // password invalid check
    } else if (!passwordField[0].validity.valid) {
        message[0].innerHTML = 'Password harus menggunakan huruf besar [A-Z] dan huruf kecil [a-z] dengan campuran angka, minimal 8 karakter.'
        message[0].classList.remove('text-success')
    }
});

passwordField[passwordField.length - 1].addEventListener('keyup', function () {
    let password = passwordField[0].value
    let confirm = passwordField[passwordField.length - 1].value
    if (passwordField[passwordField.length - 1].validity.valid && confirm === password) {
        message[message.length - 1].innerHTML = 'Konfirmasi password valid'
        message[message.length - 1].classList.add('text-success')
        btn.classList.remove('disabled')
        setTimeout(function () {
            message[message.length - 1].innerHTML = ''
        }, 3000)
    } else if (!passwordField[passwordField.length - 1].validity.valid || confirm !== password) {
        message[message.length - 1].innerHTML = 'Konfirmasi password tidak sesuai dengan password anda'
        message[message.length - 1].classList.remove('text-success')
        btn.classList.add('disabled')
    }
});

for (let index = 0; index < validIcon.length; index++) {
    var click = false;
    validIcon[index].addEventListener('click', function () {
        click = !click;
        if (click == true) {
            passwordField[index].setAttribute('type', 'text');
            validIcon[index].style.backgroundImage = "url('assets_hmpg/img/icons/eye-close.png')";
        } else {
            passwordField[index].setAttribute('type', 'password');
            validIcon[index].style.backgroundImage = "url('assets_hmpg/img/icons/eye.png')";
        }
    });
}

// Login pass rule
log_passfield.addEventListener('keyup', function () {
    if (log_passfield.validity.valid) {
        pass_log_msg.innerHTML = 'Password valid';
        pass_log_msg.classList.add('text-success')
        setTimeout(function () {
            pass_log_msg.innerHTML = '';
        }, 3000)
    } else {
        pass_log_msg.innerHTML = 'Password harus mengandung uppercase[A-Z] dan numerik[0-9]!';
        pass_log_msg.classList.remove('text-success');
    }
})

