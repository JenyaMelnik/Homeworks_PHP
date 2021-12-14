<?php
Core::$CSS[] = '<link type="text/css" rel=stylesheet href="/css/booksStyle.css"';

$queryAuthors = query("
    SELECT * FROM `books_author`
");

include "./" . Core::$CONTROLLER . "/books/addAuthors.php";
include "./" . Core::$CONTROLLER . "/books/editAuthors.php";

if (isset($_SESSION['notice'])) {
    $notice = $_SESSION['notice'];
    unset($_SESSION['notice']);
}


