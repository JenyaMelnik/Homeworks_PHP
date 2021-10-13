<?php
/**
 * @var $dbc mysqli
 */
if (isset($_POST['edit'],
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
        foreach ($_POST as $k => $v) {
            $_POST['k'] = trim($v);
        }

        query("
    UPDATE `news` SET 
`date`        = NOW(),
`title`       = '" . mysqli_real_escape_string($dbc, trim($_POST['title'])) . "',
`category`    = '" . mysqli_real_escape_string($dbc, trim($_POST['category'])) . "',
`text`        = '" . mysqli_real_escape_string($dbc, trim($_POST['text'])) . "',
`description` = '" . mysqli_real_escape_string($dbc, trim($_POST['description'])) . "'
WHERE `id` = " . (int)$_GET['id'] . "
");

        $_SESSION['info'] = 'Запись была изменена';
        redirectTo(['module' => 'news']);
    }
}

$news = query("
SELECT *
FROM `news`
WHERE `id` = " . (int)$_GET['id'] . "
LIMIT 1
");
if (!mysqli_num_rows($news)) {
    $_SESSION['info'] = 'Данной новости не существует!';
    redirectTo(['module' => 'news']);
}
$row = mysqli_fetch_assoc($news);

$row['title'] = $_POST['title'] ?? $row['title'];
$row['category'] = $_POST['category'] ?? $row['category'];
$row['description'] = $_POST['description'] ?? $row['description'];
$row['text'] = $_POST['text'] ?? $row['text'];
