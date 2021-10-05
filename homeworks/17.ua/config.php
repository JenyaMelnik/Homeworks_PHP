<?php

class Core {
    static  $CREATED = '2021';
    static  $SKIN = 'default';
    static  $DB_NAME = 'jenyamelnik1986';
    static  $DB_LOGIN = 'jenyamelnik1986';
    static  $DB_PASS = 'Jrwq1_13jwqdnXX';
    static  $DB_LOCAL = 'localhost';
    static  $DOMAIN = 'https://17.ua/';
}


//const CREATED = '2021';

define('COPYRIGHT', Core::$CREATED === date('Y') ? Core::$CREATED : Core::$CREATED.' - '.date('Y'));

//const SKIN = 'default';

$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)) == 'https' ? 'https' : 'http';
define('URI', "$protocol://".$_SERVER["SERVER_NAME"] . '/');

//const DB_NAME = 'main';
//const DB_LOGIN = 'root';
//const DB_PASS = 'root';
//const DB_LOCAL = 'localhost';

