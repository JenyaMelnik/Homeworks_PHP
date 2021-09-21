<?php
/**
 * @var $row array
 */
?>

<div>
    <form action="" method="post">
        <div>
            <span>Заголовок новости:</span>
            <input type="text" name="title" value="<?= htmlspecialchars($row['title']); ?>">
        </div>
        <div>
            <span>Категория новости:</span>
            <input type="text" name="category" value="<?= htmlspecialchars($row['category']); ?>">
        </div>
        <div>
            <span>Описание новости:</span>
            <textarea name="description"><?= htmlspecialchars($row['description']); ?></textarea>
        </div>
        <div>
            <span>Полный текст новости:</span>
            <textarea name="text"><?= htmlspecialchars($row['text']); ?></textarea>
        </div>
        <input type="submit" name="edit" value="Отредактировать новость">
    </form>
</div>