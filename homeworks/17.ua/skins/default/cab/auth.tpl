<?php
if (!isset($status) || $status != 'ok') {
    echo $errors ?? ''; ?>
    <div>
        <form action="" method="post">
            <table>
                <tr>
                    <td><input type="text" name="login" placeholder="введите логин"></td>
                </tr>
                <tr>
                    <td><input type="password" name="pass" placeholder="введите пароль"></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox" name="autoauth"> Запомнить меня</label></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="Войти"></td>
                </tr>
            </table>
        </form>
    </div>
<?php } else { ?>
    <p>Поздравляем, вы авторизировались</p>
<?php } ?>
