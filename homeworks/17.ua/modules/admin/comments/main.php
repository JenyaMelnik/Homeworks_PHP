<?php

// ============================================ Удаление комментария ===============================================
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $deleteQuery = query("
        DELETE FROM `comments`
        WHERE `id` = " . (int)$_GET['id']
    );

    $_SESSION['notice'] = 'Коментарий удален';
    redirectTo(['module' => 'comments']);
}

// =========================================== Все комментарии =====================================================
$allCommentsQuery = query( "SELECT * FROM `comments` ORDER BY `id` DESC ");

// =================================================================================================================
if (isset($_SESSION['notice'])) {
    $notice = $_SESSION['notice'];
    unset($_SESSION['notice']);
}
