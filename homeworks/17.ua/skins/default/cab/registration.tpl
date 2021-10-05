<?php
/**
 * @var $errors array
 */

if (!isset($_SESSION['regOk'])) { ?>
    <div>
        <form action="" method="post">
            <table>
                <tr>
                    <td><input type="text" name="login" placeholder="* введите логин"
                               value="<?= htmlspecialchars($_POST['login'] ?? '') ?>"></td>
                    <td> <?= htmlspecialchars($errors['login'] ?? '') ?></td>
                </tr>
                <tr>
                    <td><input type="password" name="pass" placeholder="* введите пароль"></td>
                    <td> <?= htmlspecialchars($errors['pass'] ?? '') ?></td>
                </tr>
                <tr>
                    <td><input type="text" name="email" placeholder="* введите email"
                               value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"></td>
                    <td> <?= htmlspecialchars($errors['email'] ?? '') ?></td>
                </tr>
                <tr>
                    <td><input type="text" name="age" placeholder="введите ваш возраст"
                               value="<?= htmlspecialchars($_POST['age'] ?? '') ?>"></td>
                    <td> <?= htmlspecialchars($errors['age'] ?? '') ?></td>
                </tr>
            </table>
            <p>* - обязательно для заполнения</p>
            <input type="submit" name="submit" value="Зарегистрироваться">
        </form>
    </div>
<?php } else {
    unset($_SESSION['regOk'])?>
    <p>Поздравляем, Вы успешно зарегистривались. Для активации аккаунта пройдите по ссылке, которую мы отправили вам на
        почту</p>
<?php } ?>