<?php
error_reporting(-1);
ini_set('display_errors', 'on');
header('Content-Type: text/html; charset=utf-8');

$text2 = 'Hello John';
$old = '34';
$description = 'name="description" content="Описание страницы"';
$wine = 'Вино';
$title = 'Page title';
$keywords = 'Ключевые слова через запятую';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <meta <?= $description; ?>>
    <meta name="keywords" content="<?= $keywords ?>">
    <link href="css/style.css" rel="stylesheet">
    <link href="/css/normalize.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<a href="/" class="active" title="нажмите чтобы перейти">главная страница</a>
<br>
<h1> <?= $wine; ?> </h1>
<p> Этимология </p>
<div>
    <p>
        <?php
        echo $text2;
        echo '<br>';
        echo($old * 2 - 17);
        ?>
    </p>
    <p>
        <?php include './parts/wine.php'; ?>
    </p>
    <p>
        <?= 'Обычно считается древним средиземноморским термином; отмечается сходство между наименованиями вина во многих индоевропейских языках, некоторых семитских языках и в картвельских языках (др.-греч. οῖνος, лат. vīnum, арм. gini, готск. wein, др.-в.-нем. wîn, груз. ɣvino, араб. waynun‎, др.-евр. jajin), теория о средиземноморском происхождении слова согласуется с тем, что родиной вина считают Кавказ и Малую Азию, и с отсутствием близких слов в индоиранских языках. В славянских языках (например, ст.‑слав. винѩга) заимствовано из латыни, либо из немецких языков; версия заимствования из латыни согласуется с тем, что виноградарство в Европе распространялось преимущественно римлянами.[1][2]' ?>
    </p>
</div>
</body>
</html>

