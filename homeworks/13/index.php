<?php
error_reporting(-1);
ini_set('display_errors', 'on');
header('Content-Type: text/html; charset=utf-8');
/**
 * Калькулятор
 *
 * @param float $num1 первое число
 * @param float $num2 второе число
 * @param string $action действие, допустимые: плюс, минус, умножить, помножить, разделить, поделить
 * @return string
 */
function calc(float $num1, float $num2, string $action = 'плюс'): string
{
    switch ($action) {
        case 'плюс':
            return $num1 . ' + ' . $num2 . ' = ' . ($num1 + $num2);
        case 'минус':
            return $num1 . ' - ' . $num2 . ' = ' . ($num1 - $num2);
        case 'умножить':
        case 'помножить':
            return $num1 . ' * ' . $num2 . ' = ' . $num1 * $num2;
        case 'поделить':
        case 'разделить':
            if ($num2 == 0)
                return 'Нельзя делить на ноль';
            return $num1 . ' / ' . $num2 . ' = ' . $num1 / $num2;
    }

    return 'Неизвестный метод!';
}

echo '<a href="/" class="active" title="нажмите чтобы перейти">главная страница</a> <br>';

echo calc(24, 4, 'поделить');
