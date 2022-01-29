<?php
$dbc = mysqli_connect('localhost', 'jenyamelnik1986', 'Jrwq1_13jwqdnXX', 'jenyamelnik1986');
mysqli_set_charset($dbc, 'utf8');

$allCommentsQuery = mysqli_query($dbc, "SELECT * FROM `comments` ORDER BY `id` DESC ");

// ============================================ Удаление комментария ===============================================
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $deleteQuery = mysqli_query($dbc, "
        DELETE FROM `comments`
        WHERE `id` = " . (int)$_GET['id']
    );

    $_SESSION['notice'] = 'Коментарий удален';
    redirectTo(['module' => 'comments']);
}

// ======================================= Добавление комментария ==================================================
if (isset($_POST['login'], $_POST['comment'], $_POST['email'])) {
    $comment = [
        'login' => htmlspecialchars($_POST['login']),
        'email' => htmlspecialchars($_POST['email']),
        'comment' => nl2br(htmlspecialchars($_POST['comment'])),
        'date' => date("Y-m-d H:i:s")
    ];

    $addCommentSqlQuery = " INSERT INTO `comments` SET
            `login`   = '" . mysqli_real_escape_string($dbc, $_POST['login']) . "',
            `email`   = '" . mysqli_real_escape_string($dbc, $_POST['email']) . "',
            `comment` = '" . mysqli_real_escape_string($dbc, $_POST['comment']) . "',
            `date`    = '" . $comment['date'] . "'";

    if (mysqli_query($dbc, $addCommentSqlQuery)) {
        $comment['id'] = mysqli_insert_id($dbc);
        echo json_encode($comment);
    }
}

// =================================================================================================================
if (isset($_SESSION['notice'])) {
    $notice = $_SESSION['notice'];
    unset($_SESSION['notice']);
}
