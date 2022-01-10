<?php

if (isset($_POST['editCategory'], $_POST['categoryName'], $_GET['id'])) {
    if (mb_strlen($_POST['categoryName']) < 3) {
        $editError = 'Название категории должно быть не меньше 3 символов';
    }

    if (!isset($editError)) {
        $queryCategory = query("
            SELECT * FROM `news_category`
            WHERE `category` = '" . escapeString($_POST['categoryName']) . "'
            LIMIT 1
        ");

        if (!$queryCategory->num_rows) {
            query("
            UPDATE `news_category`
            SET `category` = '" . escapeString(trim($_POST['categoryName'])) . "'
            WHERE `id` = " . (int)$_GET['id'] . "
        ");

            $_SESSION['notice'] = 'Категория изменена';
            redirectTo(['module' => 'news', 'page' => 'categories']);
        } else {
            $editError = 'Данная категория уже существует';
        }
    }
}

if (isset($_GET['id'])) {
    $currentCategories = query("
        SELECT * FROM `news_category`
        WHERE `id` = " . (int)$_GET['id'] . "
        LIMIT 1
    ");

    if ($currentCategories->num_rows) {
        $currentCategory = $currentCategories->fetch_assoc();
        $currentCategories->close();
    }
}

