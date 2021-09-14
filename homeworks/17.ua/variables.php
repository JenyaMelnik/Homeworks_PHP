<?php

$allowed = ['comments', 'components', 'static', 'contacts', 'aboutus', 'game', 'manager',
            'errors', 'auth', 'admin', 'food', 'wines', 'gifts',];

$module = $_GET['module'] ?? 'static';
$page = $_GET['page'] ?? 'main';

$link = mysqli_connect(DB_LOCAL, DB_LOGIN, DB_PASS, DB_NAME);
mysqli_set_charset($link, 'utf8');

if(!in_array($module, $allowed)) {
	$module = 'errors';
	$page = '404';
}
