<?php
/**
 * @var $error string
 * @var $author array
 */
?>

<div>
    <form action="" method="post">
        Автор:
        <input type="text" name="authorName" value="<?= $author['author'] ?? ''?>">
        <input type="submit" name="editAuthor" value="Сохранить изменения">
        <?= $error ?? '' ?>
    </form>
</div>