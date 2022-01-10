<?php
/**
 * @var $errors array
 * @var $allAuthors array
 */
?>

<form action="" method="post" enctype="multipart/form-data">
    <div>
        <table>
            <tr>
                <td>Введите название книги:</td>
                <td><input type="text" name="title"
                           value="<?= htmlspecialchars($_POST['title'] ?? '') ?>">
                </td>
                <td> <?= ($errors['title'] ?? '') ?></td>
            </tr>
            <tr>
                <td>Выберите автора 1:</td>
                <td>
                    <select name="author1">
                        <?php
                        foreach ($allAuthors as $author) { ?>
                            <option value="<?= $author['id'] ?>"
                                <?php if (isset($_POST['author1']) && $_POST['author1'] == $author['author']) {
                                    echo ' selected="selected"';
                                } ?>><?= htmlspecialchars($author['author']) ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td><?= ($errors['author1'] ?? '') ?></td>
            </tr>
            <tr>
                <td>Выберите автора 2:</td>
                <td>
                    <select name="author2">
                        <?php
                        foreach ($allAuthors as $author) { ?>
                            <option value="<?= $author['id'] ?>"
                                <?php if (isset($_POST['author2']) && $_POST['author2'] == $author['author']) {
                                    echo ' selected="selected"';
                                } ?>><?= htmlspecialchars($author['author']) ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td><?= ($errors['author2'] ?? '') ?></td>
            </tr>
            <tr>
                <td>Выберите автора 3:</td>
                <td>
                    <select name="author3">
                        <?php
                        foreach ($allAuthors as $author) { ?>
                            <option value="<?= $author['id'] ?>"
                                <?php if (isset($_POST['author3']) && $_POST['author3'] == $author['author']) {
                                    echo ' selected="selected"';
                                } ?>><?= htmlspecialchars($author['author']) ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td><?= ($errors['author3'] ?? '') ?></td>
            </tr>
            <tr>
                <td>Введите описание книги:</td>
                <td><textarea name="description" rows="5"
                              cols="30"><?= htmlspecialchars($_POST['description'] ?? '') ?></textarea>
                </td>
                <td><?= $errors['description'] ?? '' ?></td>
            </tr>
            <tr>
                <td>Добавить фото книги:</td>
                <td><input type="file" name="img"
                                              accept="image/jpeg,image/jpg,image/png,image/gif,image/bmp">
                </td>
                <td> <?= $errors['img'] ?? '' ?> </td>
            </tr>
        </table>
        <br>
        <input type="submit" name="add" value="Добавить книгу">
    </div>
</form>
