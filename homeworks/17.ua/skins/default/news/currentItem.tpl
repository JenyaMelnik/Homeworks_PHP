<?php
/**
 * @var $selectedNews array
 */
?>

<div class="item">
    <div>
        <div>
            <div><?= htmlspecialchars($selectedNews['date']); ?></div>
            <div class="text"><?= htmlspecialchars($selectedNews['title']); ?></div>
            <div class="text"><?= nl2br(htmlspecialchars($selectedNews['text'])); ?></div>
        </div>
        <hr>
    </div>
    <a href="<?= createUrlChpu(['module' => 'news']) ?>?category=<?= $_GET['category'] ?>"> Вернутся к новостям </a>
</div>

