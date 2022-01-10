<?php
/**
 * @var $dbc mysqli
 */

if (isset($_POST['add'],
    $_POST['title'],
    $_POST['category'],
    $_POST['text'])) {

    $errors = [];

    if (empty($_POST['title'])) {
        $errors['title'] = 'Вы не ввели заголовок';
    } elseif (mb_strlen($_POST['title']) < 10) {
        $errors['title'] = 'Заголовок должен быть не менее 10 символа';
    }
    if (empty($_POST['category'])) {
        $errors['category'] = 'Вы не выбрали категорию';
    }
    if (empty($_POST['text'])) {
        $errors['text'] = 'Вы не ввели текст новости';
    } elseif (mb_strlen($_POST['text']) < 20) {
        $errors['text'] = 'Текст новости должен быть не менее 20 символа';
    }

    if (!$errors) {
        $category = query("
            SELECT `id`
            FROM `news_category`
            WHERE `id` = '" . escapeString($_POST['id']) . "'
            LIMIT 1
        ");
        $categoryId = $category->fetch_assoc();
        $category->close();

        query("
            INSERT INTO `news` 
            SET `title`       = '" . escapeString(trim($_POST['title'])) . "',
                `category_id` = " . (int)($categoryId['id']) . ",
                `text`        = '" . escapeString(trim($_POST['text'])) . "',
                `date`        = NOW();
        ");
        $_SESSION['info'] = 'Запись добавлена';
        redirectTo(['module' => 'news']);
    }
}

//==================================================  Все категории  ================================================
$categories = query("
              SELECT *
              FROM `news_category`
              ORDER BY `id`
          ");
while ($category = $categories->fetch_assoc()) {
    $allCategories[] = $category;
}

$categories->close();

if (empty($allCategories)) {
    $allCategories[] = 'Категории отсутствуют';
}
