<?php
/**
 * @var $allCategories array
 */
?>

<div>
    <a href="<?= createUrlChpu(['module' => 'news']) ?>?category=<?= $_GET['category'] ?>"><b> Вернутся к новостям </b></a>
    <form action="" method="post">
        <table>
            <tr>
                <td>Заголовок новости:</td>
                <td><input type="text" name="title"
                           value="<?= htmlspecialchars($currentNews['title'] ?? '') ?>"></td>
                <td><?= $errors['title'] ?? '' ?></td>
            </tr>
            <tr>
                <td>Категория новости:</td>
                <td>
                    <select name="category">
                        <?php
                        foreach ($allCategories as $category) { ?>
                            <option value="<?= $category ?>"
                                <?php if (isset($currentCategory['category']) && $currentCategory['category'] == $category) {
                                    echo 'selected="selected"';
                                } ?>><?= $category ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td><?= $errors['category'] ?? '' ?></td>
            </tr>
            <tr>
                <td>Текст новости:
                <td><textarea name="text" rows="5"
                              cols="30"><?= htmlspecialchars($currentNews['text'] ?? '') ?></textarea></td>
                <td><?= $errors['text'] ?? '' ?></td>
            </tr>
        </table>
        <input type="submit" name="edit" value="Отредактировать новость">
    </form>
</div>
