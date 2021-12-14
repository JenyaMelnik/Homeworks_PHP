<?php
/**
 * @var $queryAuthors mysqli
 * @var $notice string
 */
?>

<p><b><?= $notice ?? '' ?></b></p>
<div class="border">
    <p>
        ДОБАВИТЬ АВТОРА
        <?php include "./skins/" . Core::$SKIN . "/books/addAuthors.tpl"; ?>
    </p>
</div>
<div class="clearfix">
    <div class="border floatleft">
        <p><b>ВСЕ АВТОРЫ:</b></p>
        <ul>
            <?php
            while ($authors = $queryAuthors->fetch_assoc()) { ?>
                <li><a href="/admin/books/authors?id=<?= $authors['id'] ?>"> <?= $authors['author'] ?></a></li>
            <?php } ?>
        </ul>
    </div>
    <div class="border floatleft">
        <p>
            ИЗМЕНИТЬ АВТОРА
            <?php include "./skins/" . Core::$SKIN . "/books/editAuthors.tpl"; ?>
        </p>
    </div>
</div>