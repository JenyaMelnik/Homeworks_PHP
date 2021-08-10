<?php
/**
 * @var $module string
 */

$isAuthAdmin = $_COOKIE['auth_admin'] ?? null;
$isAuthUser = $_COOKIE['auth_user'] ?? null;

$isAdminIP = $_SERVER['REMOTE_ADDR'] === '127.0.0.3';

$adminModules = ['admin',];

$isAdminRoute = in_array($module, $adminModules);

if($isAdminRoute && (!$isAdminIP && !$isAuthAdmin)) {
	$module = 'errors';
	$page = '403';
}