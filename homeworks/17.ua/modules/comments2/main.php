<?php
/**
 * @var $dbc mysqli
 */

if (isset($_POST['name'], $_POST['email'], $_POST['comment'])) {
    $errors = [];
    if (empty($_POST['name'])) {
        $errors['name'] = 'Вы не заполнили логин';
    }
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Вы не заполнили email';
    }
    if (empty($_POST['comment'])) {
        $errors['comment'] = 'Вы не заполнили комментарий';
    }
    if (!count($errors)) {
        $query = "
        INSERT INTO `comments` SET
`name` = '" . mysqli_real_escape_string($dbc, $_POST['name']) . "',
`email` = '" . mysqli_real_escape_string($dbc, $_POST['email']) . "',
`comment` = '" . mysqli_real_escape_string($dbc, $_POST['comment']) . "',
`date` = '" . date("Y-m-d H:i:s") . "'";

        mysqli_query($dbc, $query) or exit(mysqli_error($dbc));
        $_SESSION['addedComment'] = true;
        header("Location: /index.php?module=comments2&page=main");
        exit();
    }
}
