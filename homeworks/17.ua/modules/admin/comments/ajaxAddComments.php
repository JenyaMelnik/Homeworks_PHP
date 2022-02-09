<?php

$dbc = mysqli_connect('localhost', 'jenyamelnik1986', 'Jrwq1_13jwqdnXX', 'jenyamelnik1986');
mysqli_set_charset($dbc, 'utf8');

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
        exit();
    }
}
