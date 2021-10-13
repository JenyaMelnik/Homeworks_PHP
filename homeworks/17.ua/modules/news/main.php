<?php
/**
 * @var $dbc mysqli
 */

Core::$META['title'] = 'TITLE NEWS';
Core::$CSS[] = '<link href="/css/style.css" rel="stylesheet">';

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
    redirectTo(['module' => 'news']);
}

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    mysqli_query($dbc, "
DELETE FROM `news`
WHERE `id` = " . $_GET['id'] . "
    ") or exit(mysqli_error($dbc));

    $_SESSION['info'] = 'Новость удалена';
    redirectTo(['module' => 'news']);
}

$news = query("SELECT * FROM `news` ORDER BY `id` DESC ");

if (isset($_SESSION['info'])) {
    $info = $_SESSION['info'];
    unset($_SESSION['info']);
}