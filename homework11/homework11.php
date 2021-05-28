<?php
error_reporting(-1);
ini_set('display_errors','on');
header('Content-Type: text/html; charset=utf-8');
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
<?php include './table.php';?>
</body>
</html>