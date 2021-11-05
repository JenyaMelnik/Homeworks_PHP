<?php
/**
 * @var $dbc mysqli
 */

if (isset($_POST['add'],
    $_POST['title'],
    $_POST['category'],
    $_POST['text'],
    $_POST['description'])) {

    $errors = [];

    if (empty($_POST['title'])) {
        $errors['title'] = 'Вы не ввели заголовок';
    }
    if (empty($_POST['category'])) {
        $errors['category'] = 'Вы не ввели категорию';
    }
    if (empty($_POST['description'])) {
        $errors['description'] = 'Вы не ввели описание';
    }
    if (empty($_POST['text'])) {
        $errors['text'] = 'Вы не ввели текс новости';
    }

    if (!$errors) {
        query("
            INSERT INTO `news` 
            SET `title`       = '" . mysqli_real_escape_string($dbc, trim($_POST['title'])) . "',
                `category`    = '" . mysqli_real_escape_string($dbc, trim($_POST['category'])) . "',
                `text`        = '" . mysqli_real_escape_string($dbc, trim($_POST['text'])) . "',
                `description` = '" . mysqli_real_escape_string($dbc, trim($_POST['description'])) . "'
        ");
        $_SESSION['info'] = 'Запись добавлена';
        redirectTo(['module' => 'news']);
    }
}
