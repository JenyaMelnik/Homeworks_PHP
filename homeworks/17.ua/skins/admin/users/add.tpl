<?php if (isset($notice)) { ?>
    <h2> <?= $notice ?></h2>
<?php } ?>
<a href="/admin/users"> ВЕРНУТСЯ К ПРОСМОТРУ ПОЛЬЗОВАТЕЛЕЙ </a>
<br><br>
<form action="" method="post">
    <table class="user-info user">
        <tr class="description">
            <td>Введите логин</td>
            <td><input type="text" name="login" value="<?= htmlspecialchars($_POST['login'] ?? '') ?>">
            </td>
            <td> <?= (htmlspecialchars($errors['login'] ?? '')) ?></td>
        </tr>
        <tr class="description">
            <td>Введите пароль</td>
            <td><input type="password" name="password" value="<?= htmlspecialchars($_POST['password'] ?? '') ?>">
            </td>
            <td> <?= (htmlspecialchars($errors['password'] ?? '')) ?></td>
        </tr>
        <tr class="description">
            <td>Введите возраст</td>
            <td><input type="text" name="age" value="<?= (int)($_POST['age'] ?? '') ?>"></td>
            <td> <?= (htmlspecialchars($errors['age'] ?? '')) ?></td>
        </tr>
        <tr class="description">
            <td>Введите email</td>
            <td><input type="text" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
            </td>
            <td> <?= (htmlspecialchars($errors['email'] ?? '')) ?></td>
        </tr>
        <tr class="description">
            <td>Укажите доступ</td>
            <td>
                <input type="radio" name="active" value="1" checked>
                Открыт
                <br>
                <input type="radio" name="active" value="0"> Бан
            </td>
        </tr>
        <tr class="description">
            <td>Укажите группу прав</td>
            <td>
                <input type="radio" name="access" value="5"> Админ
                <br>
                <input type="radio" name="access" value="0" checked> User
            </td>
        </tr>
    </table>
    <br>
    <input type="submit" name="add" value="Добавить пользователя">
</form>