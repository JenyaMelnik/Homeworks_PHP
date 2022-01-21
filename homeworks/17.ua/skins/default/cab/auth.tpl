<?php
if (!isset($status) || $status != 'ok') {
    echo $errors ?? ''; ?>
    <div id="auth">
        <form action="" method="post" onsubmit="return checkLength('login', 'password')">
            <table>
                <tr>
                    <td><input type="text" id="login" name="login" placeholder="введите логин"></td>
                </tr>
                <tr>
                    <td><input type="password" id="password" name="pass" placeholder="введите пароль"></td>
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
    <p class="congratulation">Поздравляем, вы авторизировались</p>
<?php } ?>
