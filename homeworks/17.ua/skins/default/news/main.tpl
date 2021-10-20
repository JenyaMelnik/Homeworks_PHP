<?php
/**
 * @var $news mysqli
 */

echo $notice ?? '';

if (isset($_SESSION['user'])) { ?>
    <div class="item">
        <div>
            <p><b>Новости:</b></p>
            <?php
            if (mysqli_num_rows($news)) {
                while ($row = mysqli_fetch_assoc($news)) { ?>
                    <div>
                        <div><?= $row['date']; ?></div>
                        <div class="text"><?= $row['title']; ?></div>
                    </div>
                    <a href="<?= createUrlChpu(['module' => 'news', 'page' => 'currentItem']) ?>&id=<?= (int)$row['id'] ?>">Подробнее...</a>
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