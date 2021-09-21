<?php
/**
 * @var $dbc mysqli
 */

if (isset($_POST['edit'], $_POST['category'], $_POST['title'], $_POST['description'],
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
UPDATE `goods` SET 
`category` = '" . mysqli_real_escape_string($dbc, trim($_POST['category'])) . "',
`title` = '" . mysqli_real_escape_string($dbc, trim($_POST['title'])) . "',
`description` = '" . nl2br(mysqli_real_escape_string($dbc, trim($_POST['description']))) . "',
`strength` = " . (float)trim($_POST['strength']) . ",
`price` = " . (float)trim($_POST['price']) . ",
`availability` = " . (int)trim($_POST['availability']) . "
WHERE `id` = " . (int)$_GET['id'] . "
    ") or exit(mysqli_error($dbc));

        $_SESSION['notice'] = 'Товар отредактирован';
        header("Location:/index.php?module=goods");
        exit();
    }
}

$wines = mysqli_query($dbc, "
SELECT *
FROM `goods`
WHERE `id` = " . $_GET['id'] . "
LIMIT 1
") or exit(mysqli_error($dbc));

if (!mysqli_num_rows($wines)) {
    $_SESSION['notice'] = 'Данного товара не существует';
    header("Location:index.php?module=goods");
    exit();
}

$row = mysqli_fetch_assoc($wines);

if (isset($_POST['title'])) {
    $row['title'] = $_POST['title'];
}
if (isset($_POST['description'])) {
    $row['description'] = $_POST['description'];
}
if (isset($_POST['strength'])) {
    $row['strength'] = $_POST['strength'];
}
if (isset($_POST['price'])) {
    $row['price'] = $_POST['price'];
}
