<?php

const CREATED = '2021';

define('COPYRIGHT', CREATED === date('Y') ? CREATED : CREATED.' - '.date('Y'));

const SKIN = 'default';

$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)) == 'https' ? 'https' : 'http';
define('URI', "$protocol://".$_SERVER["SERVER_NAME"] . '/');

const DB_NAME = 'main';
const DB_LOGIN = 'root';
const DB_PASS = 'root';
const DB_LOCAL = 'localhost';

