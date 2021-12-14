<?php
/**
 * @var $errors array
 * @var $allCategories array
 */
?>

<div>
    <form action="" method="post">
        <table>
            <tr>
                <td>Заголовок новости:</td>
                <td><input type="text" name="title"
                           value="<?= htmlspecialchars($_POST['title'] ?? '') ?>"></td>
                <td><?= $errors['title'] ?? '' ?></td>
            </tr>
            <tr>
                <td>Выберите категорию:</td>
                <td>
                    <select name="category">
                        <?php
                        foreach ($allCategories as $category) { ?>
                            <option value="<?= $category ?>"
                                <?php if (isset($_POST['category']) && $_POST['category'] == $category) {
                                    echo ' selected="selected"';
                                } ?>><?= $category ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td><?= $errors['category'] ?? '' ?></td>
            </tr>
            <tr>
                <td>Введите текст:
                <td><textarea name="text" rows="5" cols="30"><?= htmlspecialchars($_POST['text'] ?? '') ?></textarea>
                </td>
                <td><?= $errors['text'] ?? '' ?></td>
            </tr>
        </table>
        <input type="submit" name="add" value="Добавить новость">
    </form>
</div>
