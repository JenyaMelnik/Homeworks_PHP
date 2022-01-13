<?php
$paginator = new Paginator();
$paginator->itemsOnPage = 2;

$shownBooks = 'Все книги';
$author = '';

//========================== Выбираем текущего автора и его книги, else - все книги =================================
if (isset($_GET['author'])) {
    $author = 'author=' . $_GET['author'] . '&';

    $queryBookId = query("
        SELECT `book_id`
        FROM `books2books_author`
        WHERE `author_id` = " . (int)$_GET['author']
    );

    if (!$queryBookId->num_rows) {
        $_SESSION['notice'] = 'У данного автора нет книг';
        redirectTo(['module' => 'books']);
    }

    $bookIds = [];
    while ($bookId = $queryBookId->fetch_assoc()) {
        $bookIds[] = (int)$bookId['book_id'];
    }
    $queryBookId->close();

    $numberOfItems = query("
        SELECT COUNT(id) AS cnt
        FROM `books` 
        WHERE `id` IN (" . implode(", ", $bookIds) . ")
    ")->fetch_object()->cnt;

    $paginator->numberOfItems = $numberOfItems;

    $queryBooks = query("
        SELECT * 
        FROM `books` 
        WHERE `id` IN (" . implode(", ", $bookIds) . ")
        ORDER BY `id` ASC
        " . $paginator->sqlQueryLimit()
    );

    $queryAuthor = query("
        SELECT `author` 
        FROM `books_author`
        WHERE `id` = " . (int)$_GET['author'] . "
        LIMIT 1
    ");

    if ($queryAuthor->num_rows) {
        $currentAuthor = $queryAuthor->fetch_assoc();
    }

    $queryAuthor->close();

    if (isset($currentAuthor)) {
        $shownBooks = 'Книги автора: ' . $currentAuthor['author'];
    }

} else {

    $numberOfItems = query("
        SELECT COUNT(id) AS cnt
        FROM `books` 
    ")->fetch_object()->cnt;

    $paginator->numberOfItems = $numberOfItems;

    $queryBooks = query("
        SELECT * 
        FROM `books` 
        ORDER BY `id` ASC
        " . $paginator->sqlQueryLimit()
    );
}

$booksIds = [];
$books = [];

if ($queryBooks->num_rows) {
    while ($queryBook = $queryBooks->fetch_assoc()) {
        $booksIds[] = $queryBook['id'];
        $books[] = $queryBook;
    }
}

//==================================== Выбираем ids авторов на странице =============================================
//========================== Выбираем связку book_ids to author_ids для книг на странице ============================
$authorsIdOnPage = [];
$booksIdToAuthorsIdOnPage = [];

$queryBooksToAuthors = query("
    SELECT * FROM `books2books_author`
    WHERE `book_id` IN (" . implode(", ", $booksIds) . ")
");

if ($queryBooksToAuthors->num_rows) {
    while ($bookToAuthor = $queryBooksToAuthors->fetch_assoc()) {
        $booksIdToAuthorsIdOnPage[$bookToAuthor['book_id']][] = $bookToAuthor['author_id'];
        if (!in_array($bookToAuthor['author_id'], $authorsIdOnPage)) {
            $authorsIdOnPage[] = $bookToAuthor['author_id'];
        }
    }
}

$queryBooksToAuthors->close();

//======================================== Выбираем авторов книг на странице ========================================
$allAuthorsOnPage = [];

$queryAllAuthorsOnPage = query("
    SELECT * FROM `books_author`
    WHERE `id` IN (" . implode(", ", $authorsIdOnPage) . ")
");

if ($queryAllAuthorsOnPage->num_rows) {
    while ($authorOnPage = $queryAllAuthorsOnPage->fetch_assoc()) {
        if ($authorOnPage['author'] == '') {
            continue;
        }
        $allAuthorsOnPage[$authorOnPage['id']] = $authorOnPage['author'];
    }
}


//===================================================================================================================
if (isset($_SESSION['notice'])) {
    $notice = $_SESSION['notice'];
    unset($_SESSION['notice']);
}
