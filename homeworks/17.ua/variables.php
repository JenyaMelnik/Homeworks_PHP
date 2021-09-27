<?php

$allowed = ['draft', 'comments', 'comments2', 'components', 'static', 'contacts', 'aboutus', 'game', 'game2', 'manager', 'manager2',
            'errors', 'auth', 'admin', 'food', 'wines', 'gifts', 'news', 'goods'];

$module = $_GET['module'] ?? 'static';
$page = $_GET['page'] ?? 'main';

$dbc = mysqli_connect(Core::$DB_LOCAL, Core::$DB_LOGIN, Core::$DB_PASS, Core::$DB_NAME);
mysqli_set_charset($dbc, 'utf8');

if(!in_array($module, $allowed)) {
	$module = 'errors';
	$page = '404';
}
