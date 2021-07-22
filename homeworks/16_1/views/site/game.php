<?php
error_reporting(-1);
ini_set('display_errors', 'on');
header('Content-Type: text/html; charset=utf-8');
session_start();

if (!isset($_SESSION['client'])) {
    $_SESSION['client'] = 10;
    $_SESSION['server'] = 10;
}

if (isset($_GET['number'])) {
    $number = $_GET['number'];
    $rand = rand(1, 3);
} else {
    $number = '';
    $rand = '';
}

if (isset($_GET['submit'])) {
    if ($number == 1 || $number == 2 || $number == 3) {
        if ($_GET['number'] == $rand) {
            $_SESSION['client'] -= rand(1, 4);
        } else {
            $_SESSION['server'] -= rand(1, 4);
        }
    }
}

if (isset($_GET['reset'])) {
    $_SESSION['client'] = 10;
    $_SESSION['server'] = 10;
    $number = '';
    $rand = '';
}

if ($_SESSION['client'] <= 0 || $_SESSION['server'] <= 0) {
    header("Location: https://homeworks.ua/homeworks/16_1/views/site/gameover.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Заголовок страницы</title>
    <meta name="description" content="Описание страницы">
    <meta name="keywords" content="Ключевые слова через запятую">
    <link href="/16_1/css/normalize.css" rel="stylesheet">
    <link href="/16_1/css/style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<header>
</header>

<main>
    <br>
    <a href="https://homeworks.ua/homeworks/16_1/"> Вернуться на сайт </a>
    <br> <br>
    <div class="form">
        <form action="" method="get">
            <label> введите число от 1 до 3 <input type="text" name="number" value="1"> </label>
            <input type="submit" name="submit" value="ввести">
            <input type="submit" name="reset" value="сбросить результат">
        </form>
    </div>
    <div class="notice">
        <p> Ваше число: <?= $number ?> </p>
        <p> Случайное число: <?= $rand ?> </p>
    </div>
    <div class="health">
        <?php
        echo 'Здоровье клиента: ' . $_SESSION['client'] . '<br>';
        echo 'Здоровье сервера: ' . $_SESSION['server'];
        ?>
    </div>
</main>

<footer>
</footer>

