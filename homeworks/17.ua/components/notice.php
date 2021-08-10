<?php

if(isset($_COOKIE['auth_admin'])) {
	$notice = 'Вы вошли как: ' . $_COOKIE['auth_admin'] . ' (admin)';
} elseif (isset($_COOKIE['auth_user'])) {
	$notice = 'Вы вошли как: ' . $_COOKIE['auth_user'];
} else $notice = '';
