<?php
/**
 * @var $news mysqli
 */

if (isset($_SESSION['user'])) {
    if ($_SESSION['user']['access'] == 5) { ?>
        <div class="item">
            <?php
            if (isset($info)) { ?>
                <h2> <?= $info; ?> </h2>
            <?php } ?>
            <a href="<?= createUrlChpu(['module' => 'news', 'page' => 'add']) ?>">ДОБАВИТЬ НОВОСТЬ</a>
            <hr>
            <div>
                <br>
                <p><b>Все существующие новости:</b></p>
                <form action="" method="post">
                    <?php
                    while ($row = mysqli_fetch_assoc($news)) { ?>
                        <div>
                            <div>
                                <input type="checkbox" name="ids[]" value="<?= $row['id'] ?>">
                                <a href="<?= createUrlChpu(['module' => 'news', 'page' => 'edit']) ?>?id=<?= $row['id'] ?>">РЕДАКТИРОВАТЬ</a>
                                <a href="<?= createUrlChpu(['module' => 'news']) ?>&action=delete&id=<?= $row['id'] ?>">УДАЛИТЬ</a>
                            </div>
                            <div><?= $row['date']; ?></div>
                            <div class="text"><?= $row['title']; ?></div>
                        </div>
                        <hr>
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