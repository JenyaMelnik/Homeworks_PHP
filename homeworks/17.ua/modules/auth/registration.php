<?php
/**
 * @var $dbc mysqli
 */
// обработка формы
if (isset($_POST['login'], $_POST['password'], $_POST['email'], $_POST['age'])) {
    $errors = [];
    if (empty($_POST['login'])) {
        $errors['login'] = 'Вы не заполнили логин';
    } elseif (mb_strlen($_POST['login']) < 2) {
        $errors['login'] = 'Слишком короткий логин';
    } elseif (mb_strlen($_POST['login']) > 16) {
        $errors['login'] = 'Слишком длинный логин';
    }
    if (mb_strlen($_POST['password']) < 5) {
        $errors['password'] = 'Пароль должен быть длиннее 4 символов';
    }
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Вы не заполнили email';
    }
    if (!count($errors)) {
        q("
        INSERT INTO `users` SET
        `login` = '" . mres($_POST['login']) . "',
        `password` = '" . mres($_POST['password']) . "',
        `email` = '" . mres($_POST['email']) . "',
        `age` = " . (int)$_POST['age'] . "
        ") or exit(mysqli_error($dbc));

        $_SESSION['regOk'] = 'OK';
        header("Location: /index.php?module=auth&page=registration");
        exit();
    }
}