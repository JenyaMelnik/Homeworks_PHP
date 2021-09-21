<?php
/**
 * @var $dbc mysqli
 */

if (isset($_POST['add'], $_POST['category'], $_POST['title'], $_POST['description'],
    $_POST['strength'], $_POST['price'], $_POST['availability'])) {
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
        mysqli_query($dbc, "
INSERT INTO `goods` SET 
`category` = '" . mysqli_real_escape_string($dbc, trim($_POST['category'])) . "',
`title` = '" . mysqli_real_escape_string($dbc, trim($_POST['title'])) . "',
`description` = '" . nl2br(mysqli_real_escape_string($dbc, trim($_POST['description']))) . "',
`strength` = " . (float)trim($_POST['strength']) . ",
`price` = " . (float)trim($_POST['price']) . ",
`availability` = " . (float)trim($_POST['availability']) . "
    ") or exit(mysqli_error($dbc));

        $_SESSION['notice'] = 'Товар добавлен';
        header("Location:/index.php?module=goods");
        exit();
    }
}