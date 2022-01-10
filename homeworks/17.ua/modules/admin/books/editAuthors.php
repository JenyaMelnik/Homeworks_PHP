<?php

if (isset($_POST['editAuthor'], $_POST['authorName'])) {
    if (empty($_POST['authorName'])) {
        $error = 'Вы не ввели автора';
    }

    if (!isset($error)) {
        query("
            UPDATE `books_author`
            SET `author` = '" . escapeString(trim($_POST['authorName'])) . "'
            WHERE `id` = " . (int)$_GET['id'] . "
        ");

        $_SESSION['notice'] = 'Автор изменен';
        redirectTo(['module' => 'books', 'page' => 'authors']);
    }
}

if (isset($_GET['id'])) {
    $queryAuthor = query("
        SELECT * FROM `books_author`
        WHERE `id` = " . (int)$_GET['id'] . "
        LIMIT 1
    ");

    $author = $queryAuthor->fetch_assoc();
    $queryAuthor->close();
}

