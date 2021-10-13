<?php
error_reporting(-1);
ini_set('display_errors', 1);
header('Content-Type: text/html; charset=utf-8');
session_start();

/**
 * @var $modulePath string
 * @var $skinPath string
 */

// Конфиг сайта
include_once './config.php';
include_once './libs/default.php';
include_once './variables.php';

include_once './components/auth.php';
include_once './components/notice.php';

// Роутер
include_once './route.php';

ob_start();
    include './modules/allPages.php';
    include $modulePath;
    include $skinPath;
    $content = ob_get_contents();
ob_end_clean();

include './skins/' . Core::$SKIN . '/index.tpl';
