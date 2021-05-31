<?php
/** Калькулятор
 * @param float $num1
 * @param float $num2
 * @param string $action
 * @return string
 */
function calc(float $num1, float $num2, string $action): string {
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
        case '':
            return 'Вы не выбрали действие';
    }

    return 'Неизвестный метод!';
}