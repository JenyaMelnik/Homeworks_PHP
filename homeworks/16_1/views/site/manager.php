<?php
error_reporting(-1);
ini_set('display_errors', 'on');
header('Content-Type: text/html; charset=utf-8');

$mainDir = realpath(__DIR__ . '/../../');
$str = strlen($mainDir);
$path = $_GET['link'] ?? '';
$dir = realpath($mainDir . $path);
$checkPath = substr($dir, 0, $str);

if ($checkPath != $mainDir) {
    $path = '';
    $dir = $mainDir;
}

$scanDir = scandir($dir);

$elements = [];

foreach ($scanDir as $element) {
    if ($element == '.') {
        continue;
    }
    if ($dir == $mainDir && $element == '..') {
        continue;
    }
    $currentPath = $dir . '/' . $element;
    $isDir = is_dir($currentPath);
    if ($isDir && $element != '..') {
        $link = $path . '/' . $element;
        $elements[] = '<img src="../../img/folder.jpg" width="20" height="28" alt="folder"> &nbsp <a href="https://homeworks.ua/homeworks/16_1/views/site/manager.php?link=' . $link . '">' . $element . '</a>';
    } else if ($isDir && $element == '..') {
        $link = $path . '/' . $element;
        $elements[] = '<a href="https://homeworks.ua/homeworks/16_1/views/site/manager.php?link=' . $link . '">' . $element . '</a>';
    } else if (!$isDir && $element != '..') {
        $elements[] = '<img src="../../img/file.jpg" width="20" height="28" alt="file">' . $element;
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
    <link href="/16_1/css/normalize.css" rel="stylesheet">
    <link href="/16_1/css/style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<?php foreach ($elements as $element): ?>
    <div>
        <?= $element ?>
    </div>
<?php endforeach; ?>

</body>



