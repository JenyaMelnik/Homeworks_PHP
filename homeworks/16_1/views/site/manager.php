<?php
error_reporting(-1);
ini_set('display_errors', 'on');
header('Content-Type: text/html; charset=utf-8');

const TYPE_DIR = 'dir';
const TYPE_FILE = 'file';
const TYPE_TO_UP = 'up';

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

$dirs = [];
$files = [];
$toUp = [];

foreach ($scanDir as $element) {
    if ($element == '.') {
        continue;
    }

    if ($dir == $mainDir && $element == '..') {
        continue;
    }

    $currentPath = $dir . '/' . $element;
    $isDir = is_dir($currentPath);
    $type = $link = null;

    if ($isDir && $element != '..') {
        $link = $path . '/' . $element;
        $type = TYPE_DIR;
        $dirs[] = [
            'link' => $link,
            'type' => $type,
            'name' => $element,
        ];
    } else if ($isDir && $element == '..') {
        $link = $path . '/' . $element;
        $type = TYPE_TO_UP;
        $toUp[] = [
            'link' => $link,
            'type' => $type,
            'name' => $element,
        ];
    } else if (!$isDir && $element != '..') {
        $type = TYPE_FILE;
        $files[] = [
            'type' => $type,
            'name' => $element,
        ];
    }
}

$elements = array_merge($toUp, $dirs, $files)

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
    <?php if ($element['type'] == TYPE_FILE): ?>
        <div>
            <img src="../../img/file.jpg" width="20" height="28" alt="file"> <?= $element['name'] ?>
        </div>
    <?php elseif ($element['type'] == TYPE_DIR): ?>
        <div>
            <img src="../../img/folder.jpg" width="20" height="28" alt="folder"> &nbsp
            <a href="/homeworks/16_1/views/site/manager2.php?link=<?= $element['link'] ?>"><?= $element['name'] ?></a>
        </div>
    <?php elseif ($element['type'] == TYPE_TO_UP): ?>
        <div>
            <a href="https://homeworks.ua/homeworks/16_1/views/site/manager2.php?link=<?= $element['link'] ?>">..</a>
        </div>
    <?php endif ?>
<?php endforeach; ?>

</body>



