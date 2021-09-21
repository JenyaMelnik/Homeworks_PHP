<?php
/**
 * @var $dbc mysqli
 */
if (isset($_POST['edit'], $_POST['title'], $_POST['category'], $_POST['text'], $_POST['description'])) {
    foreach ($_POST as $k => $v) {
        $_POST['k'] = trim($v);
    }

    mysqli_query($dbc, "
    UPDATE `news` SET 
`date`        = NOW(),
`title`       = '" . mysqli_real_escape_string($dbc, trim($_POST['title'])) . "',
`category`    = '" . mysqli_real_escape_string($dbc, trim($_POST['category'])) . "',
`text`        = '" . mysqli_real_escape_string($dbc, trim($_POST['text'])) . "',
`description` = '" . mysqli_real_escape_string($dbc, trim($_POST['description'])) . "'
WHERE `id` = " . (int)$_GET['id'] . "
") or exit(mysqli_error($dbc));

    $_SESSION['info'] = 'Запись была изменена';
    header("Location: /index.php?module=news");
    exit();
}

$news = mysqli_query($dbc, "
SELECT *
FROM `news`
WHERE `id` = " . (int)$_GET['id'] . "
LIMIT 1
") or exit(mysqli_error($dbc));
if (!mysqli_num_rows($news)) {
    $_SESSION['info'] = 'Данной новости не существует!';
    header("Location: /index.php?module=news");
    exit();
}
$row = mysqli_fetch_assoc($news);

if (isset($_POST['title'])) {
    $row['title'] = $_POST['title'];
}