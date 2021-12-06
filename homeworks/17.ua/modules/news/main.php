<?php

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
        $_SESSION['notice'] = 'Данной категории не существует';
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

if (isset($_SESSION['notice'])) {
    $notice = $_SESSION['notice'];
    unset($_SESSION['notice']);
}
