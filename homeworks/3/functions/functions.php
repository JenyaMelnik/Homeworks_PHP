<?php
/**
 * Проверить на ошибки валидации
 *
 * @param string $login
 * @param string $text
 * @return string|null
 */
function validateData(string $login, string $text): ?string
{
    if ($login == '' && $text == '')
        return 'Вы не заполнили форму';

    if ($login == '' || $text == '')
        return 'Вы не ввели логин или пароль';

    return null;
}

/**
 * Сохранение данных в файл
 *
 * @param string $login
 * @param string $text
 * @param string $filename
 */
function saveToFile(string $login, string $text, string $filename = '2.txt')
{
    $loginText = $login . ': ' . $text . PHP_EOL;
    file_put_contents($filename, $loginText, FILE_APPEND);
}
