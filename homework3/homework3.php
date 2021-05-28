<?php
error_reporting(-1);
ini_set('display_errors', 'on');
header('Content-Type: text/html; charset=utf-8');

include './functions/functions.php';

$result = '';

if (isset($_POST['login']) && isset($_POST['text'])) {
    $login = $_POST['login'];
    $text = $_POST['text'];

    $result = validateData($login, $text);

    if (!$result) {
        saveToFile($login, $text);
        $result = 'Форма заполнена';
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Заголовок страницы</title>
    <meta name="description" content="Описание страницы">
    <meta name="keywords" content="Ключевые слова через запятую">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/normalize.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <div>
        <?= $result ?>
    </div>
<form action="" method="post">
    <input name="login" placeholder="Введите логин"><br>
    <textarea name="text" placeholder="Введите текст"></textarea><br>
    <input type="submit" value="Отправить">
</form>
</body>
</html>

