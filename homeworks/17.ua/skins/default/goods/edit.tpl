<?php
/**
 * @var $errors array
 * @var $row array
 */
?>
<div class="item">
    <form action="" method="post">
        <div>
            <span>Выберите категорию: </span>
            <select name="category">
                <?php
                $category = ['Белые вина', 'Красные вина', 'Крепленые вина'];
                foreach ($category as $v) { ?>
                    <option value="<?= $v ?>"
                        <?php if (isset($_POST['category']) && $_POST['category'] == $v) {
                            echo ' selected="selected"';
                        } ?>><?= $v ?></option>
                <?php } ?>
            </select>
        </div>
        <br>
        <div>
            <span>Введите название вина: </span>
            <input type="text" name="title" value="<?= htmlspecialchars($row['title']) ?? '' ?>">
            <span><?= $errors['title'] ?? '' ?></span>
        </div>
        <br>
        <div>
            <span>Введите описание вина: </span>
            <textarea rows="5" cols="25"
                      name="description"><?= htmlspecialchars($row['description']) ?? '' ?></textarea>
            <span><?= $errors['description'] ?? '' ?></span>
        </div>
        <br>
        <div>
            <span>Введите крепость вина: </span>
            <input type="text" name="strength" value="<?= (float)$row['strength'] ?? '' ?>"> <span> %</span>
            <?= $errors['strength'] ?? '' ?>
        </div>
        <br>
        <div>
            <span>Введите цену вина: </span>
            <input type="text" name="price" value="<?= (float)$row['price'] ?? '' ?>"><span> грн.</span>
            <?= $errors['price'] ?? '' ?>
        </div>
        <br>
        <div>
            <span>Есть ли товар в наличии:</span>
            <select name="availability">
                <option value="1">Есть в наличии</option>
                <option value="0">Нет в наличии</option>
            </select>
        </div>
        <br>
        <input type="submit" name="edit" value="Отредактировать">
    </form>
</div>