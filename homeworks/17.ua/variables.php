<?php

$dbc = mysqli_connect(Core::$DB_LOCAL, Core::$DB_LOGIN, Core::$DB_PASS, Core::$DB_NAME);
mysqli_set_charset($dbc, 'utf8');



if (isset($_GET['route'])) {
    $temp = explode('/', $_GET['route']);

    if ($temp[0] == 'admin') {
        Core::$CONTROLLER = Core::$CONTROLLER . '/admin';
        Core::$SKIN = 'admin';
        unset($temp[0]);
    }
    $i = 0;
    foreach ($temp as $k => $v) {
        if ($i == 0) {
            if (!empty($v)) {
                $_GET['module'] = $v;
            }
        } elseif ($i == 1) {
            if (!empty($v)) {
                $_GET['page'] = $v;
            }
        } else {
            $_GET['key' . ($k - 1)] = $v;
        }
        ++$i;
    }
    unset($_GET['route']);
}

$module = $_GET['module'] ?? 'static';
$page = $_GET['page'] ?? 'main';

if (!isset($_GET['module'])) {
    $module = 'static';
} else {
    $res = query("
        SELECT * 
        FROM `pages`
        WHERE `module` = '" . escapeString($_GET['module']) . "'
        LIMIT 1
    ");
    if (!mysqli_num_rows($res)) {
        redirectTo(['page' => '404']);
    } else {
        $staticpage = mysqli_fetch_assoc($res);
        if ($staticpage['static'] == 1) {
            $module = 'staticpage';
        }
    }
}


/*
if (!isset($_GET['module'])) {
    $_GET['module'] = 'static';
}

$module = $_GET['module'] ?? 'static';
$page = $_GET['page'] ?? 'main';

$allowed = ['draft', 'comments', 'comments2', 'components', 'static', 'contacts', 'aboutus', 'game', 'game2', 'manager', 'manager2',
    'errors', 'cab', 'admin', 'food', 'wines', 'gifts', 'news', 'goods'];

if (!in_array($module, $allowed) && Core::$SKIN != 'admin') {
    $module = 'errors';
    $page = '404';
}
*/


