<?php
/**
 * @var $author array
 */
?>

<div>
    <form action="" method="post">
        Автор:
        <input type="text" name="authorName" value="<?= htmlspecialchars($author['author'] ?? '')?>">
        <input type="submit" name="editAuthor" value="Сохранить изменения">
        <?= $error ?? '' ?>
    </form>
</div>