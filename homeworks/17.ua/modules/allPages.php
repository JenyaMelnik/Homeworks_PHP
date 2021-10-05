<?php
/**
 * @var $module string
 * @var $page string
 */

if (isset($_SESSION['user']) && !isset($_SESSION['ban'])) {
    $res = query("
SELECT * 
FROM `users`
WHERE `id` = " . (int)$_SESSION['user']['id'] . "
LIMIT 1
    ");
    $_SESSION['user'] = mysqli_fetch_assoc($res);
    if ($_SESSION['user']['active'] != 1) {
        $_SESSION['ban'] = 1;
        header("Location: /index.php?module=cab&page=exit");
        exit();
    }
} elseif (isset($_COOKIE['autoAuthHash'], $_COOKIE['autoAuthId'])) {
    $res = query("
SELECT *
FROM `users`
WHERE `id`      = " . (int)($_COOKIE['autoAuthId']) . "
AND `hash`      = '" . escapeString(myHash($_COOKIE['autoAuthHash'])) . "'
AND `ip`        = '" . escapeString(myHash($_SERVER['REMOTE_ADDR'])) . "'
AND `userAgent` = '" . escapeString(myHash($_SERVER['HTTP_USER_AGENT'])) . "'
LIMIT 1
    "); // нужно ли писать LIMIT 1, так как только один id может быть со значением $_COOKIE['autoauthid'] ??
    if (mysqli_num_rows($res)) {
        $_SESSION['user'] = mysqli_fetch_assoc($res);
    } else {
        setcookie('autoAuthHash', escapeString(myHash($_SESSION['user']['id'] . $_SESSION['user']['login'] . $_SESSION['user']['email'])), time() - 360, '/');
        setcookie('autoAuthId', (int)$_SESSION['user']['id'], time() - 360, '/');
        header("Location: /index.php?module=cab&page=exit");
        exit();
    }
}
