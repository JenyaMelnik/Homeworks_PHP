<?php
/**
 * autoload classes
 */
spl_autoload_register(function ($class) {
    include './libs/class_' . $class . '.php';
});

/**
 * hashing
 *
 * @param $var
 * @return string
 */
function myHash($var): string
{
    $salt = 'ABC';
    $salt2 = 'CBA';
    return crypt(md5($var . $salt), $salt2);
}

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
 * Create Chpu URL
 *
 * @param array $params
 * @return string
 */
function createUrlChpu(array $params): string
{
    if (!Core::isAdminController()) {
        $url = URI . implode('/', $params);
    } else {
        $url = URI . 'admin/' . implode('/', $params);
    }
    return $url;
}

/**
 * Redirect
 *
 * @param array $params
 */
function redirectTo(array $params): void
{
    header("Location: " . createUrlChpu($params));
    exit();
}

/**
 *mysqli_query
 *
 * @param $query string
 * @return bool|mysqli_result
 */
function query(string $query)
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
    return !is_array($el)
        ? trim($el)
        : array_map('trimAll', $el);
}

/**
 * to int all array's elements
 *
 * @param $el
 * @return array|int
 */
function intAll($el)
{
    return !is_array($el)
        ? (int)$el
        : array_map('intAll', $el);
}

/**
 * htmlspecialchars all array's elements
 *
 * @param $el
 * @return array|string
 */
function htmlspecialcharsAll($el)
{
    return !is_array($el)
        ? htmlspecialchars($el)
        : array_map('htmlspecialcharsAll', $el);
}

/**
 * mysqli_real_escape_string all array's elements
 *
 * @param $el
 * @return array|string
 */
function escapeString($el)
{
    global $dbc;
    return !is_array($el)
        ? mysqli_real_escape_string($dbc, $el)
        : array_map('escapeString', $el);
}

/**
 * @param $type
 * @param $name
 * @param $resizedName
 * @param $maxWidth
 * @param $maxHeight
 * @return bool
 */
function resize_img($type, $name, $resizedName, $maxWidth, $maxHeight): bool
{
    switch ($type) {

        case 'jpg':
        case 'jpeg':
            $image = imagecreatefromjpeg($name);
            break;

        case 'png':
            $image = imagecreatefrompng($name);
            break;

        case 'gif':
            $image = imagecreatefromgif($name);
            break;

        case 'bmp':
            $image = imagecreatefrombmp($name);
            break;
    }

    if (isset($image)) {

        $imgWidth = imagesx($image);
        $imgHeight = imagesy($image);

        if (round($imgWidth / $maxWidth, 2) > round($imgHeight / $maxHeight, 2)) {
            $ratio = round($imgWidth / $maxWidth, 2);
        } else {
            $ratio = round($imgHeight / $maxHeight, 2);
        }

        $newWidth = $imgWidth / $ratio;
        $newHeight = $imgHeight / $ratio;

        if ($newWidth > 10 && $newHeight > 10) {

            $newImg = imagecreatetruecolor($newWidth, $newHeight);

            imagecopyresampled($newImg, $image, 0, 0, 0, 0, $newWidth, $newHeight, $imgWidth, $imgHeight);
            imagejpeg($newImg, $resizedName);

            imagedestroy($image);
            imagedestroy($newImg);

            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
