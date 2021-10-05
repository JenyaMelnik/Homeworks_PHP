<?php
/**
 * @var $dbc mysqli
 */

if (isset($_POST['delete'])) {
    if (!empty($_POST['ids'])) {
        $arrayIds = [];
        foreach ($_POST['ids'] as $v) {
            $arrayIds[] = (int)$v;
        }
        $ids = implode(',', $arrayIds);
        mysqli_query($dbc, "
DELETE FROM `goods`
WHERE `id` IN (" . $ids . ")
        ") or exit(mysqli_error($dbc));

        $_SESSION['notice'] = 'Товары удалены';

    } else {
        $_SESSION['notice'] = 'Выберите хотя бы один товар';
    }
    header("Location:/index.php?module=goods");
    exit();
}

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    mysqli_query($dbc, "
    DELETE FROM `goods` 
    WHERE `id` = " . (int)$_GET['id'] . "
    ") or exit(mysqli_error($dbc));

    $_SESSION['notice'] = 'Товар удален';
    header("Location:/index.php?module=goods");
    exit();
}

$wines = mysqli_query($dbc, "
SELECT *
FROM `goods`
ORDER BY `id` DESC
") or exit(mysqli_error($dbc));

if (isset($_SESSION['notice'])) {
    $notice = $_SESSION['notice'];
    unset($_SESSION['notice']);
}
