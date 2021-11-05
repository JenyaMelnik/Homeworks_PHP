<?php

if (isset($_POST['add'],
    $_POST['login'],
    $_POST['password'],
    $_POST['age'],
    $_POST['email'],
    $_POST['active'],
    $_POST['access'])) {

    $errors = [];

    if (empty($_POST['login'])) {
        $errors['login'] = 'Вы не ввели логин';
    } elseif (!preg_match('#^[\wё\s-]+$#u', $_POST['login'])) {
        $errors['login'] = 'Недопустимые символы!';
    } elseif (mb_strlen($_POST['login']) < 2) {
        $errors['login'] = 'Пароль должен быть не менее двух символа';
    } elseif (mb_strlen($_POST['login']) > 20) {
        $errors['login'] = 'Пароль должен быть не более 20 символов';
    } elseif ($_POST['login'] != trim($_POST['login'])) {
        $errors['login'] = 'Не ставьте пробелы в начале и конце строки';
    }

    if (empty($_POST['password'])) {
        $errors['password'] = 'Вы не ввели пароль';
    } elseif (mb_strlen($_POST['password']) < 5) {
        $errors['password'] = 'Вы должен быть не менее 5 символов';
    }

    if (empty($_POST['age'])) {
        $errors['age'] = 'Вы не ввели возраст';
    } elseif (!preg_match('#^[\d]{1,3}$#ui', $_POST['age'])) {
        $errors['age'] = 'используйте только цифры';
    }

    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Вы не верно ввели email';
    }

    if ($_POST['active'] != 0 && $_POST['active'] != 1) {
        $errors['active'] = 'Вы не указали доступ';
    }

    if ($_POST['access'] < 0 || $_POST['access'] > 5) {
        $errors['access'] = 'Вы не указали права';
    }

    if (!count($errors)) {
        $res = query("
            SELECT `id` FROM `users` 
            WHERE `login` = '" . escapeString(trim($_POST['login'])) . "'
            LIMIT 1
        ");
        if (mysqli_num_rows($res)) {
            $errors['login'] = 'Пользователь с таким логином уже существует';
        }

        $res = query("
            SELECT `id` FROM `users`
            WHERE `email` = '" . escapeString(trim($_POST['email'])) . "'
            LIMIT 1
        ");
        if (mysqli_num_rows($res)) {
            $errors['email'] = 'Пользователь с таким email уже существует';
        }
    }

    if (!count($errors)) {
        query("
            INSERT INTO `users` 
            SET `login` = '" . escapeString(trim($_POST['login'])) . "',
             `password` = '" . escapeString(trim(myHash($_POST['password']))) . "',
                  `age` = " . (int)trim($_POST['age']) . ",
                `email` = '" . escapeString(trim($_POST['email'])) . "',
               `active` = " . (int)trim($_POST['active']) . ",
               `access` = " . (int)trim($_POST['access']) . ",
                 `hash` = '" . escapeString(myHash($_POST['login'] . $_POST['age'])) . "'
        ");
        $_SESSION['notice'] = 'Пользователь добавлен';
        header("Location: ./add");
        exit();
    }
}

if (isset($_SESSION['notice'])) {
    $notice = $_SESSION['notice'] = 'Пользователь добавлен';
    unset($_SESSION['notice']);
}
