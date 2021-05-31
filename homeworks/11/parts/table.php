<?php
echo '<table class="table">';
for ($row = 1; $row < 4; ++$row) {
    echo '<tr>';
    for ($col = 1; $col < 6; ++$col) {
        if (($row == 1 && $col == 5) || ($row == 2 && $col == 3)) {
            $color = 'green';
        } elseif ($col == 2 || $col == 4) {
            $color = 'red';
        } else {
            $color = 'yellow';
        }
        echo '<td class="border '.$color.' padding">'.$row.' : '.$col.'</td>';
    }
    echo '</tr>';
}
echo '</table>';
