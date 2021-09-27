<?php
/**
 * @var $errors array
 */

?>
<div>
    <?php if (!isset($_SESSION['regOk'])) { ?>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Логин *</td>
                    <td><input type="text" name="login" value="<?= @htmlspecialchars($_POST['login']); ?>"></td>
                    <td> <?= @$errors['login'] ?> </td>
                </tr>
                <tr>
                    <td>Пароль *</td>
                    <td><input type="password" name="password" value="<?= @htmlspecialchars($_POST['password']); ?>">
                    </td>
                    <td> <?= @$errors['password'] ?> </td>
                </tr>
                <tr>
                    <td>E-mail *</td>
                    <td><input type="text" name="email" value="<?= @htmlspecialchars($_POST['email']); ?>"></td>
                    <td> <?= @$errors['email'] ?> </td>
                </tr>
                <tr>
                    <td>age</td>
                    <td><input type="text" name="age" value="<?= @htmlspecialchars($_POST['age']); ?>"></td>
                    <td> <?= @$errors['age'] ?> </td>
                </tr>
            </table>
            <p> * - обязательно для заполнения </p>
            <input type="submit" name="sendreg" value="Зарегистрироваться">
        </form>
    <?php } else {
        unset($_SESSION['regOk']); ?>
        <div> Вы успешно зарегистрировались на сайте</div>
    <?php } ?>
</div>

