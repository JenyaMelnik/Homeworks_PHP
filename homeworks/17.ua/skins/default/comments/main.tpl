<?php
/**
 * @var $errors array
 * @var $res array
 * @var $module string
 * @var $name string
 * @var $email string
 * @var $comment string
 * @var $mysqlErrors array
 * @var $comments array
 * @var $addedComment bool
 */
?>

<?php if ($mysqlErrors): ?>
    <div class="sql-error">
        <p>Ошибки в MySQL</p>
        <ul>
            <?php foreach ($mysqlErrors as $mysqlError) : ?>
                <li><?=$mysqlError?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<div class="comments">
    <div class="enter">
        <?php if ($addedComment): ?>
            <div>
                <b>Ваш комментарий добавлен</b>
            </div>
            <br>
        <?php endif ?>
        <p> Напишите свой комментарий:</p>
        <form action="https://17.ua/index.php?module=comments&page=main" method="get">
            <input type="hidden" name="module" value="comments">
            <input type="hidden" name="page" value="main">
            <table>
                <tr>
                    <td><label for="name">Имя</label></td>
                    <td><input type="text" id="name" name="name" value="<?= htmlspecialchars($name); ?>"></td>
                    <td> <?= @$errors['name']; ?> </td>
                </tr>
                <tr>
                    <td><label for="email">Email</label></td>
                    <td><input type="text" id="email" name="email" value="<?= htmlspecialchars($email); ?>"></td>
                    <td> <?= @$errors['email']; ?> </td>
                </tr>
                <tr>
                    <td><label for="comment">Введите комментарий:</label></td>
                </tr>
                <tr>
                    <td colspan="2"><textarea id="comment" rows="10" cols="42"
                                              name="comment"><?= htmlspecialchars($comment); ?></textarea>
                    <td> <?= @$errors['comment']; ?> </td>
                </tr>
            </table>
            <input type="submit" name="comSubmit" value="Добавить комментарий">
        </form>
    </div>
    <h4> Комментарии: </h4>
    <div class="allComments">
        <?php if ($comments): ?>
            <?php foreach ($comments as $comment_): ?>
                <div class="comment">
                    <div class="nameComment"> <?= htmlspecialchars($comment_['login']) ?> <?= $comment_['date'] ?> </div>
                    <div class="textComment"> <?= nl2br(htmlspecialchars($comment_['comment'])) ?> </div>
                </div>
            <?php endforeach ?>
        <?php else: ?>
            Нет записей
        <?php endif; ?>
    </div>
</div>


