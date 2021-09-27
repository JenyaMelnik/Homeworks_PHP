<?php

spl_autoload_register(function ($class) {
    include './libs/class_' . $class . '.php';
});

function dump($array, $stop = false)
{
    echo '<pre>' . print_r($array, 1) . '</pre>';
    if (!$stop) {
        exit();
    }
}

/**
 * @param $var
 */
function dd($var)
{
    echo '<pre>' . print_r($var, 1) . '</pre>';
    exit();
}

/**
 * Create absolute URL
 *
 * @param array $params
 * @return string
 */
function createAbsoluteUrl(array $params): string
{
    return URI . createUrl($params);
}

/**
 * Create URL
 *
 * @param array $params
 * @return string
 */
function createUrl(array $params): string
{
    return 'index.php?' . http_build_query($params);
}

/**
 * Redirect
 *
 * @param array $params
 */
function redirectTo(array $params): void
{
    header("Location: " . createUrl($params));
    exit();
}

/**
 *mysqli_query
 *
 * @param $query string
 * @return bool|mysqli_result
 */
function q(string $query)
{
    global $dbc;
    $res = mysqli_query($dbc, $query);
    if (!$res) {
        $info = debug_backtrace();
        $error = "QUERY: " . htmlspecialchars($query) . "<br>\n" . mysqli_error($dbc) . "<br>\n" .
            "file: " . $info[0]['file'] . "<br>\n" .
            "line: " . $info[0]['line'] . "<br>\n" .
            "date:" . date("Y-m-d H:i:s") . "<br>\n";
        $errorPut = "QUERY: " . $query . "\n" . mysqli_error($dbc) . "\n" .
            "file: " . $info[0]['file'] . "\n" .
            "line: " . $info[0]['line'] . "\n" .
            "date" . date("Y-m-d H:i:s");
//        Отправка уведомления на почту
        file_put_contents('./logs/mysql.log', $errorPut . "\n\n", FILE_APPEND);
        echo $error;
        exit();
    } else {
        return $res;
    }
}

/**
 * trim all array's elements
 *
 * @param $el
 * @return array|string
 */
function trimAll($el)
{
    if (!is_array($el)) {
        $el = trim($el);
    } else {
        $el = array_map('trimAll', $el);
    }
    return $el;
}


/**
 * to int all array's elements
 *
 * @param $el
 * @return array|int
 */
function intAll($el)
{
    if (!is_array($el)) {
        $el = (int)($el);
    } else {
        $el = array_map('intAll', $el);
    }
    return $el;
}

/**
 * htmlspecialchars all array's elements
 *
 * @param $el
 * @return array
 */
function htmlspecialcharsAll($el)
{
    if (!is_array($el)) {
        $el = htmlspecialcharsAll($el);
    } else {
        $el = array_map('htmlspecialcharsAll', $el);
    }
    return $el;
}

/**
 * mysqli_real_escape_string all array's elements
 *
 * @param $el
 * @return array|string
 */
function mres($el)
{
    if (!is_array($el)) {
        global $dbc;
        $el = mysqli_real_escape_string($dbc, $el);
    } else {
        $el = array_map('mres', $el);
    }
    return $el;
}

