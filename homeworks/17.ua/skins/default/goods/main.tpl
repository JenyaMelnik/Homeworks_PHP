<?php
/**
 * @var $wines array
 */
?>
<div>
    <?php
    if (isset($notice)) { ?>
        <h2> <?= $notice ?> </h2>
    <?php } ?>
    <a href="/index.php?module=goods&page=add">ДОБАВИТЬ ТОВАР</a><br><br>
    <div class="item">
        <form action="" method="post">
            <?php
            if (mysqli_num_rows($wines)) {
                while ($row = mysqli_fetch_assoc($wines)) { ?>
                    <div>
                        <a href="/index.php?module=goods&action=delete&id=<?= (int)$row['id'] ?>">УДАЛИТЬ</a>
                        <a href="/index.php?module=goods&page=edit&id=<?= (int)$row['id'] ?>">РЕДАКТИРОВАТЬ</a>
                        <h1 class="category"><?= htmlspecialchars($row['category']) ?></h1>
                        <h2>
                            <input type="checkbox" name="ids[]" value="<?= (int)$row['id'] ?>">
                            <strong><?= htmlspecialchars($row['title']) ?></strong>
                        </h2>
                        <span><?= htmlspecialchars($row['description']) ?></span><br><br>
                        <span>Крепость: <b><?= (float)$row['strength'] ?>%</b></span><br>
                        <span>Цена: <b><?= (float)$row['price'] ?></b> грн.</span><br><br>
                        <span>Наличие товара: </span>
                        <?php if ($row['availability']) { ?>
                            <span><b>Есть в наличии</b></span>
                        <?php } else { ?>
                            <span><b>Нет в наличии</b></span>
                        <?php } ?>
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