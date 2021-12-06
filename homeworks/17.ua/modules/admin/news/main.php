<?php
/**
 * @var $dbc mysqli
 */
//==================================  Удаление нескольких записей  ==================================================
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

//==================================  Удаление одной записи  ========================================================
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    query("
        DELETE FROM `news`
        WHERE `id` = " . $_GET['id'] . "
    ");

    $_SESSION['info'] = 'Новость удалена';
    redirectTo(['module' => 'news']);
}

//===================================  Выбираем все категории  ======================================================
$newsCategories = query("
     SELECT *
     FROM `news_category`
     ORDER BY `id` ASC 
");

//===================================  Выбираем новости по категории, else - все новости ============================
if (isset($_GET['category'])) {
    $result = query("
        SELECT `id`
        FROM `news_category`
        WHERE `category` = '" . htmlspecialchars($_GET['category']) . "'
        LIMIT 1
    ");

    if (!$result->num_rows) {
        $_SESSION['info'] = 'Данной категории не существует';
        redirectTo(['module' => 'news']);
    }

    $categoryId = $result->fetch_assoc();
    $result->close();

    $news = query("
        SELECT * 
        FROM `news` 
        WHERE `category_id` = " . (int)$categoryId['id'] . "
        ORDER BY `id` DESC 
    ");
} else {
    $news = query("
        SELECT * 
        FROM `news` 
        ORDER BY `id` DESC 
    ");
}

if (isset($_SESSION['info'])) {
    $info = $_SESSION['info'];
    unset($_SESSION['info']);
}