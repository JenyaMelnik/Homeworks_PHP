<?php
/**
 * @var $row array
 */
?>

<div>
    <form action="" method="post">
        <table>
            <tr>
                <td>Заголовок новости:</td>
                <td><input type="text" name="title"
                           value="<?= htmlspecialchars($row['title'] ?? '') ?>"></td>
                <td><?= $errors['title'] ?? '' ?></td>
            </tr>
            <tr>
                <td>Введите категорию:</td>
                <td><input type="text" name="category"
                           value="<?= htmlspecialchars($row['category'] ?? '') ?>"></td>
                <td><?= $errors['category'] ?? '' ?></td>
            </tr>
            <tr>
                <td>Введите описание:
                <td><textarea name="description"><?= htmlspecialchars($row['description'] ?? '') ?></textarea></td>
                <td><?= $errors['description'] ?? '' ?></td>
            </tr>
            <tr>
                <td>Введите категорию:</td>
                <td><input type="text" name="text"
                           value="<?= htmlspecialchars($row['text'] ?? '') ?>"></td>
                <td><?= $errors['text'] ?? '' ?></td>
            </tr>
        </table>
        <input type="submit" name="edit" value="Отредактировать новость">
    </form>
</div>
