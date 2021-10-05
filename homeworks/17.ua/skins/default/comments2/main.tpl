<?php
/**
 * @var $errors array
 * @var $dbc mysqli
 * @var $addedComment bool;
 */

if (isset($_SESSION['user'])) { ?>
    <div class="enter">
        <?php if (isset($_SESSION['addedComment'])) { ?>
            <p>Ваш комментарий добавлен</p>
        <?php } ?>
        <form action="" method="post">
            <table>
                <tr>
                    <td><label for="comment"><?= $_SESSION['user']['login'] ?>, ведите комментарий:</label></td>
                </tr>
                <tr>
                    <td colspan="2"><label for="comment"><textarea rows="10" cols="42"
                                                                   name="comment"><?php echo htmlspecialchars(($_POST['comment']) ?? ''); ?></textarea></label>
                    </td>
                    <td><?= $errors['comment'] ?? ''; ?></td>
                </tr>
            </table>
            <input type="submit" name="sendComment" value="Добавить комментарий">
        </form>
    </div>
    <h4>Комментарии:</h4>
    <div class="allComments">
        <?php
        $res = query("SELECT * FROM `comments` ORDER BY `id` DESC ");
        if (mysqli_num_rows($res)) {
            while ($comment = mysqli_fetch_assoc($res)) { ?>
                <div class="comment">
                    <div class="nameComment">
                        <?= htmlspecialchars($comment['login']) . ' ' . $comment['date'] ?>
                    </div>
                    <div class="textComment">
                        <?= nl2br(htmlspecialchars($comment['comment'])) ?>
                    </div>
                </div>
                <?php
            }
        } else { ?>
            <p>Нет записей</p>
        <?php }
        unset($_SESSION['addedComment']);
        ?>
    </div>
<?php } else { ?>
    <p>Авторизируйтесь чтобы войти в раздел комментариев</p>
<?php } ?>
