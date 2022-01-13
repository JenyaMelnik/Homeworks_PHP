<?php
/**
 * @var $news mysqli
 * @var $newsCategories mysqli
 */

echo $notice ?? '';
$category = $_GET['category'] ?? 'Все новости';

if (isset($_SESSION['user'])) { ?>
    <div class="item">
        <div>
            <p>
                <a href="/news"><b>Все новости</b></a>
                <?php
                while ($categories = $newsCategories->fetch_assoc()) { ?>
                    <a href="/news?category=<?= htmlspecialchars($categories['category']) ?>"><b><?= htmlspecialchars($categories['category']) ?></b></a>
                <?php } ?>
            </p>
            <p><b><?= htmlspecialchars($category) ?>:</b></p>
            <?php
            if ($news->num_rows) {
                while ($newsRow = $news->fetch_assoc()) { ?>
                    <div>
                        <div><?= $newsRow['date']; ?></div>
                        <div class="text"><?= htmlspecialchars($newsRow['title']); ?></div>
                    </div>
                    <a href="<?= createUrlChpu(['module' => 'news', 'page' => 'currentItem']) ?>?category=<?= htmlspecialchars($category) ?>&id=<?= (int)$newsRow['id'] ?>">Подробнее...</a>
                    <hr>
                <?php }
            } else { ?>
                <span>Нет товаров</span>
            <?php } ?>
        </div>
    </div>
<?php } else {
    echo 'Авторизируйтесь что бы просматривать раздел новостей';
}