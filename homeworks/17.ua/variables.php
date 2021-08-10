<?php

$allowed = ['static', 'contacts', 'aboutus', 'game', 'manager', 'errors', 'auth', 'admin', 'food', 'wines', 'gifts',];

$module = $_GET['module'] ?? 'static';
$page = $_GET['page'] ?? 'main';

if(!in_array($module, $allowed)) {
	$module = 'errors';
	$page = '404';
}