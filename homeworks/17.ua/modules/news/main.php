<?php
/**
 * @var $dbc mysqli
 */

if (isset($_POST['delete'])) {
    foreach ($_POST['ids'] as $k => $v) {
        $_POST['ids'][$k] = (int)$v;
    }

    $ids = implode(',', $_POST['ids']);
    mysqli_query($dbc, "
DELETE FROM `news`
WHERE `id` IN (" . $ids . ")
    ") or exit(mysqli_error($dbc));

    $_SESSION['info'] = 'Новости удалены';
    header("Location: /index.php?module=news");
    exit();
}

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    mysqli_query($dbc, "
DELETE FROM `news`
WHERE `id` = " . $_GET['id'] . "
    ") or exit(mysqli_error($dbc));

    $_SESSION['info'] = 'Новость удалена';
    header("Location: /index.php?module=news");
    exit();
}

$news = q("SELECT * FROM `newss` ORDER BY `id` DESC ");

if (isset($_SESSION['info'])) {
    $info = $_SESSION['info'];
    unset($_SESSION['info']);
}