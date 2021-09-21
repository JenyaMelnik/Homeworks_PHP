<?php
/**
 * @var $dbc mysqli
 */

if (isset($_POST['add'], $_POST['title'], $_POST['category'], $_POST['text'], $_POST['description'])) {
    mysqli_query($dbc, "
    INSERT INTO `news` SET 
`date`        = NOW(),
`title`       = '" . mysqli_real_escape_string($dbc, trim($_POST['title'])) . "',
`category`    = '" . mysqli_real_escape_string($dbc, trim($_POST['category'])) . "',
`text`        = '" . mysqli_real_escape_string($dbc, trim($_POST['text'])) . "',
`description` = '" . mysqli_real_escape_string($dbc, trim($_POST['description'])) . "'
") or exit(mysqli_error($dbc));

    $_SESSION['info'] = 'Запись добавлена';
    header("Location: /index.php?module=news");
    exit();
}
