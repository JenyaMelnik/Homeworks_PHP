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
$paragraph = ' — алкогольный напиток (крепость: натуральных — 9—16 % об., креплёных — 16—22 % об.), получаемый полным или частичным спиртовым брожением виноградного сока (иногда с добавлением спирта и других веществ — так называемое «креплёное вино»). Наука, изучающая вина, — энология.';

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <meta <?= $description; ?>>
    <meta name="keywords" content="<?php echo $keywords; ?>">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/normalize.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<div class="menu">
    <a href="/index.php" class="active" title="нажмите чтобы перейти">главная страница</a>
    <a href="/1.html" title="нажмите чтобы перейти">ссылка 2</a>
    <a href="/1.jpeg" target="_blank">фото котика</a>
</div>

<h1> <?= $wine; ?> </h1>
<p> Этимология </p>

<div>
    <h2>
        <?php
        echo $text2;
        echo '<br>';
        echo($old * 2 - 17);
        ?>
    </h2>
    <p>
        <?= $wine, $paragraph; ?>
    </p>
    <p>
        <?= 'Обычно считается древним средиземноморским термином; отмечается сходство между наименованиями вина во многих индоевропейских языках, некоторых семитских языках и в картвельских языках (др.-греч. οῖνος, лат. vīnum, арм. gini, готск. wein, др.-в.-нем. wîn, груз. ɣvino, араб. waynun‎, др.-евр. jajin), теория о средиземноморском происхождении слова согласуется с тем, что родиной вина считают Кавказ и Малую Азию, и с отсутствием близких слов в индоиранских языках. В славянских языках (например, ст.‑слав. винѩга) заимствовано из латыни, либо из немецких языков; версия заимствования из латыни согласуется с тем, что виноградарство в Европе распространялось преимущественно римлянами.[1][2]' ?>
    </p>
</div>
</body>
</html>

