<?php
if (isset($_GET['id'])) {
    $queryAuthor = query("
        SELECT * FROM `books_author`
        WHERE `id` = " . (int)$_GET['id'] . "
        LIMIT 1
    ");

    if ($queryAuthor->num_rows) {
        $author = $queryAuthor->fetch_assoc();
        $queryAuthor->close();
    }
}

if (isset($_POST['editAuthor'], $_POST['editAuthorName'])) {

    if (!isset($author)) {
        $errorEdit = 'Выберите автора для редактирования';

    } else {

        if (empty($_POST['editAuthorName'])) {
            $errorEdit = 'Вы не ввели автора';
        }

        if ($_POST['editAuthorName'] == $author['author']) {
            $errorEdit = 'Вы ничего не изменили';
        }

// =========================================== Проверка на дублирование автора ======================================
        if (!isset($errorEdit)) {
            $query = query("
            SELECT * FROM `books_author`
            WHERE `author` = '" . escapeString(trim($_POST['editAuthorName'])) . "'
        ");

            if ($query->num_rows && $_POST['editAuthorName'] != $author['author']) {
                $errorEdit = 'Такой автор уже есть';
            }
        }

        if (!isset($errorEdit)) {
            query("
            UPDATE `books_author`
            SET `author` = '" . escapeString(trim($_POST['editAuthorName'])) . "'
            WHERE `id` = " . (int)$_GET['id'] . "
        ");

            $_SESSION['notice'] = 'Автор изменен';
            redirectTo(['module' => 'books', 'page' => 'authors']);
        }

        $author['author'] = $_POST['editAuthorName'] ?? $author['author'];
    }
}
