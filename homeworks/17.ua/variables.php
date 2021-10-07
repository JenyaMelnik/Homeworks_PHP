<?php

if (isset($_GET['route'])) {
    $temp = explode('/', $_GET['route']);
    foreach ($temp as $k => $v) {
        if ($k == 0) {
            $_GET['module'] = $v;
        } elseif ($k == 1) {
            $_GET['page'] = $v;
        } else {
            $_GET['key'. ($k-1)] = $v;
        }
    }
    unset($_GET['route']);
}

$allowed = ['draft', 'comments', 'comments2', 'components', 'static', 'contacts', 'aboutus', 'game', 'game2', 'manager', 'manager2',
            'errors', 'cab', 'admin', 'food', 'wines', 'gifts', 'news', 'goods'];

$module = $_GET['module'] ?? 'static';
$page = $_GET['page'] ?? 'main';

$dbc = mysqli_connect(Core::$DB_LOCAL, Core::$DB_LOGIN, Core::$DB_PASS, Core::$DB_NAME);
mysqli_set_charset($dbc, 'utf8');

if(!in_array($module, $allowed)) {
	$module = 'errors';
	$page = '404';
}
