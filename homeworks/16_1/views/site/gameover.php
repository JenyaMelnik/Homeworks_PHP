<?php
error_reporting(-1);
ini_set('display_errors', 'on');
header('Content-Type: text/html; charset=utf-8');
session_start();

//header("Location: index.php?page=game1over&action=win"); - зачем здесь action=win

if ($_SESSION['client_health'] > $_SESSION['server_health']) {
    $win = 'Клиент';
} else {
    $win = 'Сервер';
}

if (isset($_GET['newGame'])) {
    $_SESSION['client_health'] = 10;
    $_SESSION['server_health'] = 10;
    $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)) == 'https' ? 'https' : 'http';
    header("Location: $protocol://" . $_SERVER["SERVER_NAME"] . '/homeworks/16_1/views/site/game.php');
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
    <a href="https://homeworks.ua/homeworks/16_1/"> Вернуться на сайт </a>
    <br> <br>
    <span> Победил: </span> <?= $win; ?>
    <br> <br>
    <form action="" method="get">
        <input type="submit" name="newGame" value="Начать новую игру">
    </form>
</main>

<footer>
</footer>

