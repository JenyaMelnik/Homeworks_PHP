<?php

if (isset($_POST['login'], $_POST['pass'])) {
    $res = query("
    SELECT *
    FROM `users`
WHERE `login` = '" . escapeString($_POST['login']) . "'
AND `password` = '" . escapeString(myHash($_POST['pass'])) . "'
AND `active` = 1
LIMIT 1
    ");
    if (mysqli_num_rows($res)) {
        $_SESSION['user'] = mysqli_fetch_assoc($res);
        $status = 'ok';
        if (isset($_POST['autoauth'])) {
            setcookie('autoAuthHash', escapeString(myHash($_SESSION['user']['id'] . $_SESSION['user']['login'] . $_SESSION['user']['email'])), time() + 360 * 24 * 30 * 12, '/');
            $_COOKIE['autoAuthHash'] = escapeString(myHash($_SESSION['user']['id'] . $_SESSION['user']['login'] . $_SESSION['user']['email']));

            setcookie('autoAuthId', (int)($_SESSION['user']['id']), time() + 360 * 24 * 30 * 12, '/');
            $_COOKIE['autoAuthId'] = (int)($_SESSION['user']['id']);

            query("
            UPDATE `users` 
SET `hash`  = '" . escapeString(myHash($_SESSION['user']['id'] . $_SESSION['user']['login'] . $_SESSION['user']['email'])) . "',
`ip`        = '" . escapeString(myHash($_SERVER['REMOTE_ADDR'])) . "',
`userAgent` = '" . escapeString(myHash($_SERVER['HTTP_USER_AGENT'])) . "'
WHERE `id`  = " . (int)($_SESSION['user']['id']) . "
LIMIT 1 
            "); // нужно ли писать LIMIT 1, так как только один id может быть со значением $_SESSION['user']['id'] ??
        }
    } else {
        $errors = 'Нет пользавателя с таким логином и паролем, или ваш аккаунт не активен';
    }
}