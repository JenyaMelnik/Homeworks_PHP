<?php
/**
 * @var $errors array
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
            <input type="text" name="title" value="<?= htmlspecialchars($_POST['title'] ?? '') ?>">
            <span><?= $errors['title'] ?? '' ?></span>
        </div>
        <br>
        <div>
            <span>Введите описание вина: </span>
            <textarea rows="5" cols="25"
                      name="description"><?= htmlspecialchars($_POST['description'] ?? '') ?></textarea>
            <span><?= $errors['description'] ?? '' ?></span>
        </div>
        <br>
        <div>
            <span>Введите крепость вина: </span>
            <input type="text" name="strength" value="<?= (float)($_POST['strength'] ?? '') ?>"> <span> %</span>
            <?= $errors['strength'] ?? '' ?>
        </div>
        <br>
        <div>
            <span>Введите цену вина: </span>
            <input type="text" name="price" value="<?= (float)($_POST['price'] ?? '') ?>"><span> грн.</span>
            <?= $errors['price'] ?? '' ?>
        </div>
        <br>
        <div>
            <span>Есть ли товар в наличии:</span>
            <select name="availability">
                <option value="1" <?php if (isset($_POST['availability']) && $_POST['availability'] == '1') {
                    echo 'selected="selected"';
                } ?>>Есть в наличии
                </option>
                <option value="0" <?php if (isset($_POST['availability']) && $_POST['availability'] == '0') {
                    echo 'selected="selected"';
                } ?>>Нет в наличии
                </option>
            </select>
        </div>
        <br>
        <input type="submit" name="add" value="Добавить">
    </form>
</div>