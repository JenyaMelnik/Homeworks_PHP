<?php
error_reporting(-1);
ini_set('display_errors',1);
header('Content-Type: text/html; charset=utf-8');
session_start();

/**
 * @var $modulePath string
 */

// Конфиг сайта
include_once './config.php';
include_once './libs/default.php';
include_once './variables.php';

include_once './components/auth.php';
include_once './components/notice.php';

// Роутер
include $modulePath;
include './skins/'.SKIN.'/index.tpl';
