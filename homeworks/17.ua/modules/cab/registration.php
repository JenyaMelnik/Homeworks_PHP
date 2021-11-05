<?php
/**
 * @var $dbc mysqli
 */
// обработка формы

if (isset($_POST['login'],
    $_POST['pass'],
    $_POST['email'],
    $_POST['age'])) {

    $errors = [];

    if (empty($_POST['login'])) {
        $errors['login'] = 'Вы не ввели логин';
    } elseif (mb_strlen($_POST['login']) < 2) {
        $errors['login'] = 'Слишком короткий логин';
    } elseif (mb_strlen($_POST['login']) > 20) {
        $errors['login'] = 'Слишком длинный логин';
    }

    if (mb_strlen($_POST['pass']) < 5) {
        $errors['pass'] = 'длинна пароля должна быть более 4 символов';
    }

    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Вы не верно ввели email';
    }

    if (!count($errors)) {
        $res = query("
SELECT `id` 
FROM `users`
WHERE `login` = '" . escapeString($_POST['login']) . "'
LIMIT 1
        ");
        if (mysqli_num_rows($res)) {
            $errors['login'] = 'Пользователь с таким логином уже существует';
        }

        $res = query("
SELECT `id` 
FROM `users`
WHERE `email` = '" . escapeString($_POST['email']) . "'
LIMIT 1
        ");
        if (mysqli_num_rows($res)) {
            $errors['email'] = 'Пользователь с таким email уже существует';
        }
    }
    if (!count($errors)) {
        query("
        INSERT INTO `users` SET 
`login`    = '" . escapeString(trim($_POST['login'])) . "',
`password` = '" . escapeString(myHash($_POST['pass'])) . "',
`email`    = '" . escapeString(trim($_POST['email'])) . "',
`age`      = " . (int)trim($_POST['age']) . ",
`hash`     = '" . escapeString(myHash($_POST['login'] . $_POST['age'])) . "'
        ");

        $id = mysqli_insert_id($dbc);
        $_SESSION['regOk'] = 'ok';

        Mail::$subject = 'Регистрация на сайте';
        Mail::$to = $_POST['email'];
        Mail::$text = 'Вы зарегистрировались на сайте. Для активации аккаунта перейдите по ссылке: 
        ' . Core::$DOMAIN . 'index.php?module=cab&page=activate&id=' . $id . '&hash=' . myHash($_POST['login'] . $_POST['age']) . '
        ';
        Mail::send();
        redirectTo(['module' => 'cab', 'page' => 'registration']);
    }
}