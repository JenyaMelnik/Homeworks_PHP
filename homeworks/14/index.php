<?php
error_reporting(-1);
ini_set('display_errors', 'on');
header('Content-Type: text/html; charset=utf-8');

include './functions/functions.php';

$result = '';

if (isset ($_GET ['number1'], $_GET['number2'], $_GET['action'])) {
    $num1 = (float)$_GET['number1'];
    $num2 = (float)$_GET['number2'];
    $action = $_GET['action'];
    $result = calc($num1, $num2, $action);
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Заголовок страницы</title>
    <meta name="description" content="Описание страницы">
    <meta name="keywords" content="Ключевые слова через запятую">
    <link href="/css/normalize.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<a href="/" class="active" title="нажмите чтобы перейти">главная страница</a>
<br>
<h1> Калькулятор </h1>
<form action="" method="get">
    <div>
        <label>введите число 1 <input type="text" name="number1" value=""></label>
    </div>
    <div>
        <label>введите число 2 <input type="text" name="number2" value=""></label>
    </div>
    <div>
        <br>
        <b>выберите действие:</b> <br>
        <label> плюс <input type="radio" name="action" value="плюс"> | </label>
        <label> минус <input type="radio" name="action" value="минус"> | </label>
        <label> умножить <input type="radio" name="action" value="умножить"> | </label>
        <label> поделить <input type="radio" name="action" value="поделить"> | </label>
    </div>
    <br>
    <div>
        <input type="submit" name="submit" value="посчитать">
    </div>
    <br>
</form>
<?= 'Результат: ' . $result; ?>
</body>