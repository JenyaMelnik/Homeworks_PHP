<?php

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
        $error = "QUERY: " . $query . "<br>\n" . mysqli_error($dbc) . "<br>\n file: " . $info[0]['file'] .
            "<br>\n line: " . $info[0]['line'] . "<br>\n" . date("Y-m-d H:i:s");
//        Отправка уведомления на почту
        file_put_contents('./logs/mysql.log', strip_tags($error) . "\n\n", FILE_APPEND);
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