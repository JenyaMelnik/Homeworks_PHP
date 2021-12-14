<?php
/**
 * @var $books mysqli
 * @var $shownBooks string
 * @var $author string
 */

if (isset($_SESSION['user'])) { ?>
    <div class="item">
        <p><b><?= $notice ?? ''; ?></b></p>
        <h2>
            <strong><?= $shownBooks ?></strong>
        </h2>
        <?php
        if (isset($_GET['author'])) { ?>
            <a href="<?= createUrlChpu(['module' => 'books']) ?>"><b>Все авторы</b></a>
        <?php } ?>
        <hr>
        <div>
            <?php
            if ($books->num_rows) {
                while ($book = $books->fetch_assoc()) { ?>
                    <div>
                        <h2>
                            <strong><?= htmlspecialchars($book['title']); ?></strong>
                        </h2>
                    </div>
                    <div>
                        <img src="<?= $book['img'] ?>" alt="image">
                    </div>
                    <a href="<?= createUrlChpu(['module' => 'books', 'page' => 'currentBook']) ?>?<?= $author ?>id=<?= (int)$book['id'] ?>">Подробнее...</a>
                    <hr>
                <?php }
            } else { ?>
                <span>Нет книг</span>
                <br>
            <?php } ?>
        </div>
    </div>
<?php } else {
    echo 'Авторизируйтесь что бы просматривать раздел книги';
}