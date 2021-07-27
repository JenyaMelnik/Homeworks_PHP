<?php
error_reporting(-1);
ini_set('display_errors', 'on');
header('Content-Type: text/html; charset=utf-8');

$loginAdmin = 'login';
$passAdmin = 'password';

$notice = '';

$login = $_POST['login'] ?? null;
$pass = $_POST['pass'] ?? null;
$email = $_POST['email'] ?? null;

if (isset($_POST['submit'])) {
    if ($login && $pass && $email
        && filter_var($email, FILTER_VALIDATE_EMAIL)
    ) {
        $notice = 'Вы успешно авторизировались';
        setcookie('auth_user', 1, time() + 3600 * 24, '/');
        $_COOKIE['auth_user'] = 1;
        if ($login === $loginAdmin && $pass === $passAdmin) {
            setcookie('auth_admin', 1, time() + 3600 * 24, '/');
            $_COOKIE['auth_admin'] = 1;
        }
    } else $notice = 'Не корректно заполнена форма';
}

$isAuthAdmin = $_COOKIE['auth_admin'] ?? null;
$isAuthUser = $_COOKIE['auth_user'] ?? null;

if (isset($_POST['exit'])) {
    setcookie('auth_admin', '1', time() - 3600, '/');
    setcookie('auth_user', '1', time() - 3600, '/');
    $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https'?'https':'http';
    header("Location: $protocol://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]);
}
// echo '<pre>'; var_dump($_SERVER); echo '</pre>';

const CREATED = '2021';
$copyright = CREATED === date('Y')
    ? CREATED
    : CREATED . ' - ' . date('Y');

$page = $_GET['page'] ?? 'main';

$isAdminIP = $_SERVER['REMOTE_ADDR'] === '127.0.0.3';

$adminRoutes = [
    'admin',
];

$isAdminRoute = in_array($page, $adminRoutes);

$pageDir = $isAdminRoute ? 'admin' : 'site';

if ($isAdminRoute && !$isAdminIP) {
    $page = '403';
    $pageDir = 'site';
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Заголовок страницы</title>
    <meta name="description" content="Описание страницы">
    <meta name="keywords" content="Ключевые слова через запятую">
    <link href="css/normalize.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<header>
    <?php if ($notice): ?>
        <div class="notice"> <?= $notice ?> </div>
    <?php endif ?>
    <div class="logPass">
        <?php if (!$isAuthUser && !$isAuthAdmin): ?>
            <form action="" method="post">
                <div> введите email &nbsp; <label> <input type="text" name="email" value=""> </label></div>
                <div> введите логин &nbsp; <label> <input type="text" name="login" value=""> </label></div>
                <div> введите пароль <label> <input type="password" name="pass" value=""> </label></div>
                <div class="enter"><input type="submit" name="submit" value="ВОЙТИ "></div>
            </form>
        <?php endif ?>
    </div>
    <div class="registration">
        <div class="container clearfix">
            <div class="col-registration clearfix">
                <div class="language">
                    <a href="#">ENGLISH &nbsp;</a>
                    <div class="drop-menu">
                        <a href="#">English</a>
                        <a href="#">Russian</a>
                        <a href="#">Deutsch</a>
                    </div>
                    <a href="#" class="sprite sprite-zz-arrow"></a>
                    <span>&nbsp; |</span>
                </div>
                <div class="language">
                    <a href="#">&#36; &nbsp; USD &nbsp;</a>
                    <div class="drop-menu">
                        <a href="#">&euro; Euro</a>
                        <a href="#">&pound; Pound Sterling</a>
                        <a href="#">&#36; US Dollar</a>
                    </div>
                    <a href="#" class="sprite sprite-zz-arrow"></a>
                </div>
            </div>
            <div class="col-registration2">
                <div class="wishlist">
                    <a href="#">&#9825; &nbsp; MY WISHLIST o</a>
                    &nbsp; &nbsp; &nbsp;
                    <?php if (!$isAuthUser && !$isAuthAdmin): ?>
                        <a href="#" class="sprite sprite-zz-sign-in"></a>
                        <a href="#">SIGN IN </a> /
                        <a href="#">REGISTER</a> &nbsp;
                    <?php else: ?>
                        <form action="" method="post">
                            <div class="exit"><input type="submit" name="exit" value="ВЫХОД"></div>
                        </form>
                    <?php endif ?>
                    <?php if ($isAdminIP || $isAuthAdmin): ?>
                        <a href="index.php?page=admin">ADMIN</a>
                    <?php endif ?>
                </div>
                <div class="game">
                    <a href="views/site/game.php"> Играть в игру (ДЗ 16_2)</a>
                    <a href="views/site/manager.php"> Файловый менеджер (ДЗ 16_3)</a> <br><br>
                </div>
            </div>
        </div>
    </div>
    <div class="search">
        <div class="container clearfix">
            <div class="col">
                <div class="input clearfix">
                    <div class="input2-mail">
                        <p>Search</p>
                    </div>
                    <a href="#" class="sprite sprite-z-loupe"></a>
                </div>
            </div>
            <div class="col">
                <div class="main-link">
                    <a href="https://homeworks.ua/homeworks/16_1/index.php">Wine store online</a>
                </div>
            </div>
            <div class="col">
                <a href="#" class="sprite sprite-z-my-cart"></a>
            </div>
        </div>
    </div>
</header>
<main>
    <nav>
        <div class="language">
            <a href="index.php?page=redWines">RED WINES</a>
            <div class="drop-menu clearfix">
                <div class="drop-col">
                    <a href="#" class="padding"><strong>RED WINE</strong></a>
                    <a href="#">CABERNET SAUVIGNON</a>
                    <a href="#">BORDEAUX BLENDS</a>
                    <a href="#">PINOT NOIR</a>
                    <a href="#">SANGIOVESE</a>
                </div>
                <div class="drop-col">           <!-- second col-->
                    <a href="#" class="padding"><strong>WHITE WINE</strong></a>
                    <a href="#">CHARDONNAY</a>
                    <a href="#">SAUVIGNON BLANC</a>
                    <a href="#">RIESLING</a>
                    <a href="#">PINOT GRIS/GRIGIO</a>
                </div>
                <div class="drop-col">           <!-- third col-->
                    <a href="#" class="padding"><strong>NAPA VALLEY</strong></a>
                    <a href="#">SONOMA COUNTY</a>
                    <a href="#">CENTRAL COAST</a>
                    <a href="#">WASHINGTON</a>
                    <a href="#">OREGON</a>
                </div>
                <div class="drop-col">           <!-- fourth col-->
                    <a href="#" class="padding"><strong>FRANCE</strong></a>
                    <a href="#">CHAMPAGNE</a>
                    <a href="#">BORDEAUX</a>
                    <a href="#">BURGUNDY</a>
                    <a href="#">RHONE</a>
                </div>
                <div class="drop-col">           <!-- fifth col-->
                    <a href="#" class="padding"><strong>ITALY</strong></a>
                    <a href="#">TUSCANY</a>
                    <a href="#">PIEDMONT</a>
                    <a href="#">SPAIN</a>
                    <a href="#">PORTUGAL</a>
                </div>
                <div class="drop-col">           <!-- sixth col-->
                    <a href="#" class="padding"><strong>CALIFORNIA</strong></a>
                    <a href="#">NAPA VALLEY</a>
                    <a href="#">SONOMA COUNTY</a>
                    <a href="#">SENTRAL COAST</a>
                    <a href="#">WASHINGTON</a>
                </div>
            </div>
        </div>
        <a href="index.php?page=roseWines">ROSE WINES</a>
        <a href="index.php?page=whiteWines">WHITE WINES</a>
        <a href="index.php?page=giftPacks">GIFT PACKS</a>
        <a href="index.php?page=seaFood">SEA FOOD</a>
        <a href="index.php?page=snackCheese">SNACK AND CHEESE</a>
    </nav>
    <div id="content">
        <?php include "views/$pageDir/$page.php"; ?>
    </div>
</main>
<footer>
    <div class="container clearfix">
        <div class="footer-links clearfix">
            <div class="footer-col">
                <ul>
                    <li><a href="#">ABOUT US</a></li>
                    <li><a href="#">DELIVERY INFORMATION</a></li>
                    <li><a href="#">PRIVACY POLICY</a></li>
                    <li><a href="#">TERMS & CONDITIONS</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <ul>
                    <li><a href="#">CONTACT US</a></li>
                    <li><a href="#">RETURNS</a></li>
                    <li><a href="#">SITE MAP</a></li>
                    <li><a href="#">BLOG</a></li>
                </ul>
            </div>
            <p class="copyright">
                Powered By OpenCart Wine Store Online &copy;
                <?= $copyright ?>
            </p>
        </div>
        <div class="footer-mail">
            <p class="newsletter">NEWSLETTER</p>
            <p class="footer-content">Sign up to receive the latest news, exclusive offers, and other discount
                information.</p>
            <div class="input-2 clearfix">
                <div class="input2-mail">
                    <p>Enter Your Email</p>
                </div>
                <a href="#" class="sprite sprite-letter"></a>
            </div>
            <div class="social-list">
                <a href="https://www.google.com.ua" target="_blank" class="sprite sprite-google"></a>
                <a href="https://www.youtube.com/" target="_blank" class="sprite sprite-youtube"></a>
                <a href="https://www.pinterest.com/" target="_blank" class="sprite sprite-pinterest"></a>
                <a href="https://twitter.com/" target="_blank" class="sprite sprite-twitter"></a>
                <a href="https://www.facebook.com/" target="_blank" class="sprite sprite-facebook"></a>
            </div>
        </div>
    </div>
</footer>
</body>
</html>

