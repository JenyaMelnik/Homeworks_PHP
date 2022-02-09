<?php
$allCommentsQuery = query( "SELECT * FROM `comments` ORDER BY `id` DESC ");

// =================================================================================================================
if (isset($_SESSION['notice'])) {
    $notice = $_SESSION['notice'];
    unset($_SESSION['notice']);
}
