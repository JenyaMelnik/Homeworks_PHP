<?php
/**
 * @var $item array
 */
?>

<div class="item">
    <div>
        <div>
            <div><?= htmlspecialchars($item['date']); ?></div>
            <div class="text"><?= htmlspecialchars($item['text']); ?></div>
            <div class="text"><?= nl2br(htmlspecialchars($item['description'])); ?></div>
        </div>
        <hr>
    </div>
    <a href="<?= createUrlChpu(['module' => 'news']) ?>"> Вернутся к новостям </a>
</div>

