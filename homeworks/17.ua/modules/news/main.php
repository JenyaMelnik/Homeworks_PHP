<?php

$news = query("
    SELECT * 
    FROM `news` 
    ORDER BY `id` DESC 
");

if (isset($_SESSION['notice'])) {
    $notice = $_SESSION['notice'];
    unset($_SESSION['notice']);
}
