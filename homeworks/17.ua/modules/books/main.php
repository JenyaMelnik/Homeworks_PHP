<?php

$shownBooks = 'Все книги';
$author = '';

//========================== Выбираем текущего автора и его книги, else - все книги =================================
if (isset($_GET['author'])) {
    $queryBookId = query("
        SELECT `book_id`
        FROM `books2books_author`
        WHERE `author_id` = '" . htmlspecialchars($_GET['author']) . "'
    ");

    if (!$queryBookId->num_rows) {
        $_SESSION['notice'] = 'У данного автора нет книг';
        redirectTo(['module' => 'books']);
    }

    while ($bookId = $queryBookId->fetch_assoc()) {
        $booksId[] = (int)$bookId['book_id'];
    }
    $queryBookId->close();

    $books = query("
        SELECT * 
        FROM `books` 
        WHERE `id` IN (" . implode(", ", $booksId) . ")
        ORDER BY `id` DESC 
    ");

    $queryAuthor = query("
        SELECT `author` 
        FROM `books_author`
        WHERE `id` = " . htmlspecialchars($_GET['author']) . "
        LIMIT 1
    ");

    $currentAuthor = $queryAuthor->fetch_assoc();
    $queryAuthor->close();

    $shownBooks = 'Книги автора: ' . $currentAuthor['author'];
    $author = 'author=' . $_GET['author'] . '&';
} else {
    $books = query("
        SELECT * 
        FROM `books` 
        ORDER BY `id` DESC 
    ");
}
//===================================================================================================================

if (isset($_SESSION['notice'])) {
    $notice = $_SESSION['notice'];
    unset($_SESSION['notice']);
}
