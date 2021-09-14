<?php
error_reporting(-1);
ini_set('display_errors', 'on');
header('Content-Type: text/html; charset=utf-8');
session_start();

$winner = $_GET['winner'] ?? null;

if ($winner != 'client' && $winner != 'server') {
    $winner = null;
}

$translations = [
    'client' => 'клиент',
    'server' => 'сервер',
];

$winnerRu = $translations[$winner] ?? null;

$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)) == 'https' ? 'https' : 'http';
$hrefNewGame = $protocol . '://' . $_SERVER["SERVER_NAME"] . '/homeworks/16_1/views/site/game.php';

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Заголовок страницы</title>
    <meta name="description" content="Описание страницы">
    <meta name="keywords" content="Ключевые слова через запятую">
    <link href="css/normalize.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<main>
    <a href="https://homeworks.ua/homeworks/16_1/"> Вернуться на сайт </a>
    <br><br>
    <?php if ($winnerRu): ?>
        <span> Победил: </span> <?= $winnerRu; ?>
    <?php else: ?>
        <span> Неизвестный метод </span>
    <?php endif ?>
    <br><br>
    <a href="<?= $hrefNewGame ?>">New Game</a>
</main>
<footer>
</footer>