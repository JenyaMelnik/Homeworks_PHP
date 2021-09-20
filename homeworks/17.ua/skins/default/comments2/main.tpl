<?php
/**
 * @var $errors array
 * @var $dbc mysqli
 * @var $addedComment bool;
 */
?>
<div class="enter">
    <?php if (isset($_SESSION['addedComment'])) { ?>
        <p>Ваш комментарий добавлен</p>
    <?php } ?>
    <form action="" method="post">
        <table>
            <tr>
                <td>Логин</td>
                <td><label for="name"><input type="text" name="name"
                                             value="<?php echo htmlspecialchars(($_POST['name']) ?? ''); ?>"></label>
                </td>
                <td><?= $errors['name'] ?? ''; ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><label for="email"><input type="text" name="email"
                                              value="<?php echo htmlspecialchars(($_POST['email']) ?? ''); ?>"></label>
                </td>
                <td><?= $errors['email'] ?? ''; ?></td>
            </tr>
            <tr>
                <td><label for="comment">Введите комментарий:</label></td>
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
    $sql = mysqli_query($dbc, "SELECT * FROM `comments` ORDER BY `id` DESC ") or exit(mysqli_error());
    if (mysqli_num_rows($sql)) {
        while ($comment = mysqli_fetch_assoc($sql)) { ?>
            <div class="comment">
                <div class="nameComment">
                    <?= htmlspecialchars($comment['name']) . ' ' . $comment['date'] ?>
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