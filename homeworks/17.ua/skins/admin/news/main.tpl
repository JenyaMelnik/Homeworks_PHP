<?php
/**
 * @var $news mysqli
 * @var $newsCategories mysqli
 */

if (isset($_SESSION['user'])) {
    if ($_SESSION['user']['access'] == 5) {

        $category = $_GET['category'] ?? 'Все новости'; ?>

        <div class="item">
            <?php
            if (isset($info)) { ?>
                <h2> <?= $info; ?> </h2>
            <?php } ?>
            <a href="<?= createUrlChpu(['module' => 'news', 'page' => 'add']) ?>">ДОБАВИТЬ НОВОСТЬ</a>
            <hr>
            <div>
                <p>
                    <a href="/admin/news"><b>Все категории</b></a>
                    <?php
                    while ($categories = $newsCategories->fetch_assoc()) { ?>
                        <a href="/admin/news?category=<?= $categories['category'] ?>"><b><?= $categories['category'] ?></b></a>
                    <?php } ?>
                </p>
                <p><b><?= $category ?>:</b></p>
                <form action="" method="post">
                    <?php
                    if (mysqli_num_rows($news)) {
                        while ($newsRow = mysqli_fetch_assoc($news)) { ?>
                            <div>
                                <div>
                                    <label><input type="checkbox" name="ids[]" value="<?= $newsRow['id'] ?>"></label>
                                    <a href="<?= createUrlChpu(['module' => 'news', 'page' => 'edit']) ?>?category=<?= $category ?>&id=<?= $newsRow['id'] ?>">СМОТРЕТЬ/РЕДАКТИРОВАТЬ</a>
                                    <a href="<?= createUrlChpu(['module' => 'news']) ?>?action=delete&id=<?= $newsRow['id'] ?>">УДАЛИТЬ</a>
                                </div>
                                <div><?= $newsRow['date']; ?></div>
                                <div class="text"><?= $newsRow['title']; ?></div>
                            </div>
                            <hr>
                        <?php }
                    } else { ?>
                        <span>Нет товаров</span>
                    <?php } ?>
                    <input type="submit" name="delete" value="Удалить отмеченные записи">
                </form>
            </div>
        </div>
    <?php } else {
        echo 'У Вас не доступа к разделу NEWS';
    }
} else {
    echo 'Вы не авторизировались';
} ?>