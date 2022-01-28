<?php
/**
 * @var $dbc mysqli
 */

if (isset($_SESSION['user'], $_POST['sendComment'])) {
    $errors = [];
    if (empty($_POST['comment'])) {
        $errors['comment'] = 'Вы не заполнили комментарий';
    }
    if (!count($errors)) {
        query("
        INSERT INTO `comments` SET
`login` = '" . mysqli_real_escape_string($dbc, $_SESSION['user']['login']) . "',
`email` = '" . mysqli_real_escape_string($dbc, $_SESSION['user']['email']) . "',
`comment` = '" . mysqli_real_escape_string($dbc, $_POST['comment']) . "',
`date` = NOW()
");
        $_SESSION['notice'] = 'Ваш комментарий добавлен';
        redirectTo(['module' => 'comments']);
        //exit();
    }
}

if (isset($_SESSION['notice'])) {
    $notice = $_SESSION['notice'];
    unset($_SESSION['notice']);
}