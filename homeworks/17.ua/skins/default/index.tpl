<?php
/**
 * @var $notice string
 * @var $isAuthUser bool
 * @var $isAuthAdmin bool
 * @var $isAdminIP bool
 * @var $module string
 * @var $page string
 */
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Заголовок страницы</title>
    <meta name="description" content="Описание страницы">
    <meta name="keywords" content="Ключевые слова через запятую">
    <link href="/css/normalize.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<header>
    <div class="logPass">
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
                    <?php if ($notice): ?>
                        <span class="notice"> <?= $notice ?> </span>
                    <?php endif ?>
                    <?php if (!isset($_SESSION['user'])) { ?>
                        <a href="<?= createUrl(['module' => 'cab', 'page' => 'auth']) ?>">AUTHORIZE </a> /
                        <a href="<?= createUrl(['module' => 'cab', 'page' => 'registration']) ?>">REGISTER </a>
                    <?php } else { ?>
                        <span>Привет, <?= $_SESSION['user']['login'] ?></span>
                        <a href="<?= createUrl(['module' => 'cab', 'page' => 'exit']) ?>"
                           class="sprite sprite-zz-sign-in"></a>
                    <?php } ?>
                    <?php if ($isAdminIP || $isAuthAdmin): ?>
                        <a href="<?= createUrl(['module' => 'admin', 'page' => 'main']) ?>" class="admin">ADMIN</a>
                    <?php endif ?>
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
                    <a href="/">Wine store online</a>
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
        <?php include "components/nav.tpl" ?>
    </nav>
    <div id="content">
        <?php include "$module/$page.tpl"; ?>
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
                <?= COPYRIGHT ?>
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