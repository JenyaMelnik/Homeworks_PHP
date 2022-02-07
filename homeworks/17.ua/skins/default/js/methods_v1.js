function deletionСonfirmation() {
    return confirm('Вы уверены что хотите удалить?');
}

function showHide() {
    var element = document.getElementById('auth');
    if (element.style.display === 'block') {
        element.style.display = 'none';
    } else {
        element.style.display = 'block';
    }
}

function validateLength(id, errorId) {
    var length = document.getElementById(id).value.length;
    if (length < 3) {
        document.getElementById(errorId).innerHTML = 'минимум 3 символа. Вы ввели: ' + length;
        return false;
    } else {
        document.getElementById(errorId).innerHTML = '';
        return true;
    }
}

function validateLengthTwoField(id, errorId, id2, errorId2) {
    var loginLength = document.getElementById(id).value.length;
    var passwordLength = document.getElementById(id2).value.length;
    var errors = {};

    if (loginLength < 2) {
        errors.login = 'минимум 2 символа. Вы ввели ' + loginLength;
    }
    if (passwordLength < 2) {
        errors.password = 'минимум 2 символа. Вы ввели ' + passwordLength;
    }

    if (Object.keys(errors).length !== 0) {
        errors.hasOwnProperty('login')
            ? document.getElementById(errorId).innerHTML = errors.login
            : document.getElementById(errorId).innerHTML = '';

        errors.hasOwnProperty('password')
            ? document.getElementById(errorId2).innerHTML = errors.password
            : document.getElementById(errorId2).innerHTML = '';

        return false;
    }
}

function myAjaxComments(userLogin, userEmail) {
    if (validateLength('comment', 'commentError')) {
        var comment = document.getElementById('comment').value;
        $.ajax({
            url: '',
            type: "POST",
            cache: false,
            data: {login: userLogin, email: userEmail, comment: comment},
            success: function (msg) {
                var comment = JSON.parse(msg);
                if (document.getElementById('notice').style.display !== 'none') {
                    document.getElementById('notice').style.display = 'none';
                }
                document.getElementById('commentWasAdded').style.display = 'block';
                document.getElementById('addedCommentLoginAndDate').innerHTML = comment.login + '<br>' + comment.date;
                document.getElementById('addedCommentText').innerHTML = comment.comment + '<hr>';
            },
        });

        document.getElementById('allComments').innerHTML =
            document.getElementById('addedComment').innerHTML + document.getElementById('allComments').innerHTML;
    }
}
