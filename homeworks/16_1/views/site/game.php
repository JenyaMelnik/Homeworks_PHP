<?php
error_reporting(-1);
ini_set('display_errors', 'on');
header('Content-Type: text/html; charset=utf-8');
session_start();

$clientHealth = $_SESSION['client_health'] ?? null;
$serverHealth = $_SESSION['server_health'] ?? null;

if (isset($_GET['reset'])) {
    $clientHealth = 10;
    $serverHealth = 10;

    $number = 0;
    $rand = 0;
}

if (is_null($clientHealth) || is_null($serverHealth)) {
    $clientHealth = 10;
    $serverHealth = 10;
}

$number = null;
$rand = null;

if (isset($_GET['number'])) {
    $number = $_GET['number'];
    $rand = rand(1, 3);
}

if (isset($_GET['submit'])) {
    if ($number >= 1 && $number <= 3) {
        if ($number == $rand) {
            $clientHealth -= rand(1, 4);
        } else {
            $serverHealth -= rand(1, 4);
        }
    }
}

$_SESSION['client_health'] = $clientHealth;
$_SESSION['server_health'] = $serverHealth;

if ($clientHealth <= 0 || $serverHealth <= 0) {
    $winner = $_SESSION['client_health'] > $_SESSION['server_health']
        ? 'client'
        : 'server';
    unset($_SESSION['client_health']);
    unset($_SESSION['server_health']);
    header("Location: https://homeworks.ua/homeworks/16_1/views/site/gameover.php?winner=" . $winner);
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
        <span> Здоровье клиента: </span> <?= $clientHealth ?> <br>
        <span> Здоровье сервера: </span> <?= $serverHealth ?>
    </div>
</main>

<footer>
</footer>

