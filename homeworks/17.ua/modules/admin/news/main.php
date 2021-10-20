<?php
/**
 * @var $dbc mysqli
 */

if (isset($_POST['delete'])) {
    foreach ($_POST['ids'] as $k => $v) {
        $_POST['ids'][$k] = (int)$v;
    }

    $ids = implode(',', $_POST['ids']);
    query("
        DELETE FROM `news`
        WHERE `id` IN (" . $ids . ")
    ");

    $_SESSION['info'] = 'Новости удалены';
    redirectTo(['module' => 'news']);
}

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    query("
        DELETE FROM `news`
        WHERE `id` = " . $_GET['id'] . "
    ");

    $_SESSION['info'] = 'Новость удалена';
    redirectTo(['module' => 'news']);
}

$news = query("
            SELECT * 
            FROM `news` 
            ORDER BY `id` DESC 
        ");

if (isset($_SESSION['info'])) {
    $info = $_SESSION['info'];
    unset($_SESSION['info']);
}