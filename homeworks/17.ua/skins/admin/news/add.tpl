<?php
/**
 * @var $errors array
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
                <td>Введите категорию:</td>
                <td><input type="text" name="category"
                           value="<?= htmlspecialchars($_POST['category'] ?? '') ?>"></td>
                <td><?= $errors['category'] ?? '' ?></td>
            </tr>
            <tr>
                <td>Введите описание:
                <td><textarea name="description"><?= htmlspecialchars($_POST['description'] ?? '') ?></textarea></td>
                <td><?= $errors['description'] ?? '' ?></td>
            </tr>
            <tr>
                <td>Введите категорию:</td>
                <td><input type="text" name="text"
                           value="<?= htmlspecialchars($_POST['text'] ?? '') ?>"></td>
                <td><?= $errors['text'] ?? '' ?></td>
            </tr>
        </table>
        <input type="submit" name="add" value="Добавить новость">
    </form>
</div>
