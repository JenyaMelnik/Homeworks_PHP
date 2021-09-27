<?php
/**
 * @var $module string
 * @var $page string
 */

$dbc = mysqli_connect(Core::$DB_LOCAL, Core::$DB_LOGIN, Core::$DB_PASS, Core::$DB_NAME);
mysqli_set_charset($dbc, 'utf8');

$name = $_GET['name'] ?? null;
$email = $_GET['email'] ?? null;
$comment = $_GET['comment'] ?? null;
$errors = [];
$mysqlErrors = [];

$addedComment = false;

if (isset($_SESSION['comment_saved'])) {
    $addedComment = true;
    unset($_SESSION['comment_saved']);
}

if (!is_null($name) && empty($name)) {
    $errors['name'] = 'Вы не ввели имя';
}
if (!is_null($email) && (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))) {
    $errors['email'] = 'Email введен не корректно';
}
if (!is_null($comment) && empty($comment)) {
    $errors['comment'] = 'Вы не ввели комментарий';
}

if (!$errors && $name && $email && $comment) {
    $name_ = mysqli_real_escape_string($dbc, $name);
    $email_ = mysqli_real_escape_string($dbc, $email);
    $date_ = date("Y-m-d H:i:s");
    $comment_ = mysqli_real_escape_string($dbc, $comment);
    $sql = "
INSERT INTO `comments` 
SET `name` = '$name_',
    `email` = '$email_',
    `date` =  '$date_',
    `comment` = '$comment_';
        ";
    if (mysqli_query($dbc, $sql)) {
        $_SESSION['comment_saved'] = true;
        redirectTo(['module' => $module, 'page' => $page]);
    } else {
        $mysqlErrors[] = mysqli_error($dbc);
    }
}
$comments = [];

$sql = "SELECT * FROM `comments` ORDER BY `id` DESC";
if ($res = mysqli_query($dbc, $sql)) {
    $comments = mysqli_num_rows($res)
        ? mysqli_fetch_all($res, MYSQLI_ASSOC)
        : [];
} else {
    $mysqlErrors[] = mysqli_error($dbc);
}


