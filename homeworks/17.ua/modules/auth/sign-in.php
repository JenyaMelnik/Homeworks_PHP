<?php

$loginAdmin = 'Jenya';
$passAdmin = 'pass';

$login = $_POST['login'] ?? null;
$pass = $_POST['pass'] ?? null;
$email = $_POST['email'] ?? null;

if(isset($_POST['submit'])) {
	if($login && $pass && $email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
		setcookie('auth_user', $_POST['login'], time() + 3600 * 24, '/');
		$_COOKIE['auth_user'] = $_POST['login'];
		header("Location: " . createAbsoluteUrl(['module' => 'static', 'page' => 'main']));
		if($login === $loginAdmin && $pass === $passAdmin) {
			setcookie('auth_admin', $_POST['login'], time() + 3600 * 24, '/');
			$_COOKIE['auth_admin'] = $_POST['login'];
		}
	}
	else $notice = 'Не корректно заполнена форма';
}