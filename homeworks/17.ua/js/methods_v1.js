function showHide() {
    var element = document.getElementById('auth');
    if (element.style.display === 'block') {
        element.style.display = 'none';
    } else {
        element.style.display = 'block';
    }
}

function checkLength(id, id2) {
    var loginLength = document.getElementById(id).value.length;
    var passwordLength = document.getElementById(id2).value.length;
    if (loginLength < 2 && passwordLength < 2) {

        document.getElementById('loginError').innerHTML = 'минимум 2 символа. Вы ввели ' + loginLength;
        document.getElementById('passwordError').innerHTML = 'минимум 2 символа. Вы ввели ' + passwordLength;
        return false;
    } else if (loginLength < 2 && passwordLength >= 2) {
        document.getElementById('loginError').innerHTML = 'минимум 2 символа. Вы ввели ' + loginLength;
        document.getElementById('passwordError').innerHTML = '';
        return false;
    } else if (passwordLength < 2 && loginLength >= 2) {
        document.getElementById('passwordError').innerHTML = 'минимум 2 символа. Вы ввели ' + passwordLength;
        document.getElementById('loginError').innerHTML = '';
        return false;
    } else {
        document.getElementById('loginError').innerHTML = '';
        document.getElementById('passwordError').innerHTML = '';
    }
}