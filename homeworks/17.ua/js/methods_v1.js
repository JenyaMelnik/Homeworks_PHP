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
    if (loginLength < 2) {
        alert('Login должен быть не меньше 2 символов! Вы ввели ' + loginLength);
        return false;
    }
    if (passwordLength < 2) {
        alert('Password должен быть не меньше 2 символов! Вы ввели ' + passwordLength);
        return false;
    }
}