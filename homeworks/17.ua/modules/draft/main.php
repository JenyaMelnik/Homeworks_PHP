<?php

$resault = query("
    SELECT *
    FROM `goods_category`
    ORDER BY `id`
");
?>
    <select name="category">
        <?php while ($row = $resault->fetch_assoc()) { ?>
            <option value="<?= $row['category'] ?>"><?= $row['category'] ?></option>
        <?php } ?>
    </select>
<?php
$resault->close();


$res = query("
    SELECT *
    FROM `goods`
    WHERE `id` = 1
");
$row = $res->fetch_assoc();
echo 'Данное вино относиться к категории: ' . $row['category'];

