<?php
session_start();

echo '<pre>';
print_r($_SESSION);
print_r($_COOKIE);
print_r($_GET['page']);
echo '</pre>';

var_dump($_GET);