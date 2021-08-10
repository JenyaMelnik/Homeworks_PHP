<?php

$allowed = ['static', 'contacts', 'aboutus', 'game', 'manager', 'errors', 'auth', 'admin', 'food', 'wines', 'gifts',];

$module = $_GET['module'] ?? 'static';
$page = $_GET['page'] ?? 'main';

if(!in_array($module, $allowed)) {
	$module = 'errors';
	$page = '404';
}

$isAuthAdmin = $_COOKIE['auth_admin'] ?? null;
$isAuthUser = $_COOKIE['auth_user'] ?? null;

$isAdminIP = $_SERVER['REMOTE_ADDR'] === '127.0.0.3';

$adminModules = ['admin',];

$isAdminRoute = in_array($module, $adminModules);

if($isAdminRoute && (!$isAdminIP && !$isAuthAdmin)) {
	$module = 'errors';
	$page = '403';
}

$modulePath = './modules/'.$module.'/'.$page.'.php';

if(!file_exists($modulePath)) {
	$module = 'errors';
	$page = '404';
	$modulePath = './modules/'.$module.'/'.$page.'.php';
}