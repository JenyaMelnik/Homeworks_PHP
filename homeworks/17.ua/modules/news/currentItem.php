<?php

$news_ = query("
    SELECT *
    FROM `news`
    WHERE `id` = " . (int)$_GET['id'] . "
    LIMIT 1
");

if (!mysqli_num_rows($news_)) {
    $_SESSION['notice'] = 'Данной новости не существует!';
    redirectTo(['module' => 'news']);
}

$item = mysqli_fetch_assoc($news_);