<?php
/**
 * @var $dbc mysqli
 */

if (isset($_POST['add'],
    $_POST['category'],
    $_POST['title'],
    $_POST['description'],
    $_POST['strength'],
    $_POST['price'],
    $_POST['availability'])) {

    $errors = [];
    if (empty($_POST['title'])) {
        $errors['title'] = 'Вы не ввели название';
    }
    if (empty($_POST['description'])) {
        $errors['description'] = 'Вы не ввели описание';
    }
    if (empty($_POST['strength'])) {
        $errors['strength'] = 'Вы не ввели крепость';
    }
    if (empty($_POST['price'])) {
        $errors['price'] = 'Вы не ввели цену';
    }
    if (!count($errors)) {
        query("
INSERT INTO `goods` SET 
`category`     = '" . escapeString(trim($_POST['category'])) . "',
`title`        = '" . escapeString(trim($_POST['title'])) . "',
`description`  = '" . escapeString(trim($_POST['description'])) . "',
`strength`     = " . (float)trim($_POST['strength']) . ",
`price`        = " . (float)trim($_POST['price']) . ",
`availability` = " . (int)trim($_POST['availability']) . "
    ") or exit(mysqli_error($dbc));

        $_SESSION['notice'] = 'Товар добавлен';
        redirectTo(['module' => 'goods']);
    }
}