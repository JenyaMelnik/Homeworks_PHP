<?php

$paginator = new Paginator();

//=========================================== Удаление нескольких записей ===========================================
if (isset($_POST['delete'])) {
    if (!empty($_POST['booksToDelete'])) {
        $booksToDeleteIds = [];
        foreach ($_POST['booksToDelete'] as $bookToDelete) {
            $booksToDeleteIds[] = (int)$bookToDelete;
        }
        $booksToDelete = implode(',', $booksToDeleteIds);
        query("
            DELETE FROM `books`
            WHERE `id` IN (" . $booksToDelete . ")
        ");
        query("
            DELETE FROM `books2books_author`
            WHERE `book_id` IN (" . $booksToDelete . ")
        ");

        $_SESSION['notice'] = 'Книги удалены';
    } else {
        $_SESSION['notice'] = 'Выберите хотя бы одну книгу';
    }
    redirectTo(['module' => 'books']);
}

//========================================== Удаление одной записи ==================================================
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    query("
        DELETE FROM `books` 
        WHERE `id` = " . (int)$_GET['id'] . "
    ");
    query("
        DELETE FROM `books2books_author` 
        WHERE `book_id` = " . (int)$_GET['id'] . "
    ");

    $_SESSION['notice'] = 'Книга удалена';
    redirectTo(['module' => 'books']);
}
//===================================================================================================================

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

    $numberOfItems = query("
        SELECT COUNT(id) AS cnt
        FROM `books` 
        WHERE `id` IN (" . implode(", ", $booksId) . ")
        ORDER BY `id` DESC 
    ")->fetch_object()->cnt;

    $paginator->numberOfItems = $numberOfItems;

    $books = query("
        SELECT * 
        FROM `books` 
        WHERE `id` IN (" . implode(", ", $booksId) . ")
        ORDER BY `id` DESC 
        LIMIT " . $paginator->sqlQueryLIMIT() . "
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

    $numberOfItems = query("
        SELECT COUNT(id) AS cnt
        FROM `books` 
        ORDER BY `id` DESC 
    ")->fetch_object()->cnt;

    $paginator->numberOfItems = $numberOfItems;

    $books = query("
        SELECT * 
        FROM `books` 
        ORDER BY `id` DESC 
        LIMIT " . $paginator->sqlQueryLIMIT() . "
    ");
}
//===================================================================================================================

if (isset($_SESSION['notice'])) {
    $notice = $_SESSION['notice'];
    unset($_SESSION['notice']);
}


