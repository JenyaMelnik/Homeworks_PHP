<?php
/**
 * @var $errors array
 * @var $currentBook array
 * @var $allAuthors array
 */
?>

<form action="" method="post" enctype="multipart/form-data">
    <div>
        <table>
            <tr>
                <td>Название книги:</td>
                <td><input type="text" name="title"
                           value="<?= htmlspecialchars($currentBook['title']); ?>">
                </td>
                <td> <?= $errors['title'] ?? '' ?></td>
            </tr>
            <tr>
                <td>Автор 1:</td>
                <td>
                    <select name="author1">
                        <?php
                        foreach ($allAuthors as $author) { ?>
                            <option value="<?= $author['id'] ?>"
                                <?php if (isset($currentBookAuthorsName[0]['author']) && $currentBookAuthorsName[0]['author'] == $author['author']) {
                                    echo ' selected="selected"';
                                } ?>><?= htmlspecialchars($author['author']) ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td><?= $errors['author1'] ?? '' ?></td>
            </tr>
            <tr>
                <td>Автор 2:</td>
                <td>
                    <select name="author2">
                        <?php
                        foreach ($allAuthors as $author) { ?>
                            <option value="<?= $author['id'] ?>"
                                <?php if (isset($currentBookAuthorsName[1]['author']) && $currentBookAuthorsName[1]['author'] == $author['author']) {
                                    echo ' selected="selected"';
                                } ?>><?= htmlspecialchars($author['author']) ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td><?= $errors['author2'] ?? '' ?></td>
            </tr>
            <tr>
                <td>Автор 3:</td>
                <td>
                    <select name="author3">
                        <?php
                        foreach ($allAuthors as $author) { ?>
                            <option value="<?= $author['id'] ?>"
                                <?php if (isset($currentBookAuthorsName[2]['author']) && $currentBookAuthorsName[2]['author'] == $author['author']) {
                                    echo ' selected="selected"';
                                } ?>><?= htmlspecialchars($author['author']) ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td><?= $errors['author3'] ?? '' ?></td>
            </tr>
            <tr>
                <td>Описание книги:</td>
                <td><textarea name="description" rows="5"
                              cols="30"><?= htmlspecialchars($currentBook['description']) ?></textarea>
                </td>
                <td><?= $errors['description'] ?? '' ?></td>
            </tr>
            <tr>
                <td>Фото книги:
                    <div class="text">
                        <img src="<?= $currentBook['img']; ?>" alt="image">
                    </div>
                </td>
                <td><input type="file" name="img"
                           accept="image/jpeg,image/jpg,image/png,image/gif,image/bmp">
                </td>
                <td> <?= $errors['img'] ?? '' ?> </td>
            </tr>
        </table>
        <br>
        <input type="submit" name="edit" value="Сохранить изменения">
    </div>
</form>
