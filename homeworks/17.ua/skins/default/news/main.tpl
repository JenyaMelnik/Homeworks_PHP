<?php
/**
 * @var $news mysqli
 */
?>
<div>
    <?php
    if (isset($info)) { ?>
        <h2> <?= $info; ?> </h2>
    <?php } ?>
    <a href="/index.php?module=news&page=add">ДОБАВИТЬ НОВОСТЬ</a>
    <div>
        <br>
        <p><b>Все существующие новости:</b></p>
        <form action="" method="post">
            <?php
            while ($row = mysqli_fetch_assoc($news)) { ?>
                <div>
                    <div>
                        <input type="checkbox" name="ids[]" value="<?= $row['id'] ?>">
                        <a href="/index.php?module=news&page=edit&id=<?= $row['id'] ?>">РЕДАКТИРОВАТЬ</a>
                        <a href="/index.php?module=news&action=delete&id=<?= $row['id'] ?>">УДАЛИТЬ</a>
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