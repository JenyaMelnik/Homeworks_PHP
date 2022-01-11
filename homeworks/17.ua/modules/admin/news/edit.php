<?php

if (isset($_POST['edit'],
    $_POST['title'],
    $_POST['categoryId'],
    $_POST['text'])) {

    $errors = [];

    if (empty($_POST['title'])) {
        $errors['title'] = 'Вы не ввели заголовок';
    } elseif (mb_strlen($_POST['title']) < 10) {
        $errors['title'] = 'Заголовок должен быть не менее 10 символа';
    }
    if (empty($_POST['categoryId'])) {
        $errors['category'] = 'Вы не выбрали категорию';
    }
    if (empty($_POST['text'])) {
        $errors['text'] = 'Вы не ввели текст новости';
    } elseif (mb_strlen($_POST['text']) < 20) {
        $errors['text'] = 'Текст новости должен быть не менее 20 символа';
    }

    if (!$errors) {

        query("
            UPDATE `news` 
            SET `title`       = '" . escapeString(trim($_POST['title'])) . "',
                `category_id` = " . (int)($_POST['categoryId']) . ",
                `text`        = '" . escapeString(trim($_POST['text'])) . "',
                `date`        = NOW()
            WHERE `id`        = " . (int)$_GET['id'] . "
        ");
        $_SESSION['info'] = 'Новость изменена';
        redirectTo(['module' => 'news']);
    }
}

//==============================================  Текущая новость  ==================================================
$news = query("
            SELECT *
            FROM `news`
            WHERE `id` = " . (int)$_GET['id'] . "
            LIMIT 1
        ");
if (!$news->num_rows) {
    $_SESSION['info'] = 'Данной новости не существует!';
    redirectTo(['module' => 'news']);
}

$currentNews = $news->fetch_assoc();
$news->close();

//==========================================  Категория текущей новости  ============================================
$category = query("
                SELECT `category`
                FROM `news_category`
                WHERE `id` = '" . $currentNews['category_id'] . "'
            ");
if ($category->num_rows) {
    $currentCategory = $category->fetch_assoc();
}

$category->close();

//===============================================  Все категории  ===================================================
$categories = query("
              SELECT *
              FROM `news_category`
              ORDER BY `id`
          ");

if ($categories->num_rows) {
    while ($category = $categories->fetch_assoc()) {
        $allCategories[] = $category;
    }
}

$categories->close();

//===================================================================================================================
$currentNews['title'] = $_POST['title'] ?? $currentNews['title'];
$currentNews['text'] = $_POST['text'] ?? $currentNews['text'];
