<?php
/**
 * @var $books mysqli
 * @var $shownBooks string
 * @var $author string
 * @var $paginator Paginator
 */

if (isset($_SESSION['user'])) { ?>
    <div class="item">
        <p><b><?= $notice ?? ''; ?></b></p>
        <a href="<?= createUrlChpu(['module' => 'books', 'page' => 'add']) ?>"><b>ДОБАВИТЬ КНИГУ</b></a>
        <a href="<?= createUrlChpu(['module' => 'books', 'page' => 'authors']) ?>"><b>РЕДАКТИРОВАТЬ АВТОРОВ</b></a>
        <hr>
        <h2>
            <strong><?= htmlspecialchars($shownBooks) ?></strong>
        </h2>
        <?php
        if (isset($_GET['author'])) { ?>
            <a href="<?= createUrlChpu(['module' => 'books']) ?>"><b>Все авторы</b></a>
        <?php } ?>
        <hr>
        <div>
            <form action="" method="post">
                <?php
                if ($books->num_rows) {
                    while ($book = $books->fetch_assoc()) { ?>
                        <a href="<?= createUrlChpu(['module' => 'books', 'page' => 'edit']) ?>?<?= $author ?>id=<?= (int)$book['id'] ?>">Редактировать</a>
                        <a href="<?= createUrlChpu(['module' => 'books']) ?>?action=delete&id=<?= (int)$book['id'] ?>">УДАЛИТЬ</a>
                        <div>
                            <h2>
                                <label><input type="checkbox" name="booksToDelete[]" value="<?= (int)$book['id'] ?>">
                                    <strong><?= htmlspecialchars($book['title']); ?></strong>
                                </label>
                            </h2>
                        </div>
                        <div>
                            <img src="<?= $book['img'] ?>" height="100" >
                        </div>
                        <a href="<?= createUrlChpu(['module' => 'books', 'page' => 'currentBook']) ?>?<?= $author ?>id=<?= (int)$book['id'] ?>">Подробнее...</a>
                        <hr>
                    <?php }
                } else { ?>
                    <span>Нет книг</span>
                    <br>
                <?php } ?>
                <input type="submit" name="delete" value="Удалить отмеченные записи">
            </form>
        </div>
    </div>
    <div>
        <a href="<?= createUrlChpu(['module' => 'books', 'page' => 'main']) ?>?<?= htmlspecialchars($author) ?>p=1"><b>Первая</b></a>
        <a href="<?= createUrlChpu(['module' => 'books', 'page' => 'main']) ?>?<?= htmlspecialchars($author) ?>p=<?= ($paginator->previousPage()) ?>"><b>Назад</b></a>
    <?php
        for ($i = $paginator->startPaginator(); $i < $paginator->endPaginator(); ++$i) {
            if ($i == $paginator->currentPage()) { ?>
                <a href="<?= createUrlChpu(['module' => 'books', 'page' => 'main']) ?>?<?= htmlspecialchars($author) ?>p=<?= $i ?>"><?= '<b>' . $i . '</b>' ?>
            <?php } else { ?>
                <a href="<?= createUrlChpu(['module' => 'books', 'page' => 'main']) ?>?<?= htmlspecialchars($author) ?>p=<?= $i ?>"><?= $i ?>
            <?php }
        } ?>
        <a href="<?= createUrlChpu(['module' => 'books', 'page' => 'main']) ?>?<?= htmlspecialchars($author) ?>p=<?= ($paginator->nextPage()) ?>"><b>Вперед</b></a>
        <a href="<?= createUrlChpu(['module' => 'books', 'page' => 'main']) ?>?<?= htmlspecialchars($author) ?>p=<?= $paginator->numberOfPages() ?>"><b>Конец</b></a>
    </div>
<?php } else {
    echo 'Авторизируйтесь что бы просматривать раздел книги';
} ?>






