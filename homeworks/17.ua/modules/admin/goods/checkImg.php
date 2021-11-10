<?php
$array = ['image/gif', 'image/jpeg', 'image/png', 'image/jpg'];
$array2 = ['gif', 'jpeg', 'png', 'jpg'];

if ($_FILES['img']['size'] < 5000 || $_FILES['img']['size'] > 50000000) {
    $errors['img'] = 'Размер изображения не подходит';
} else {
    preg_match('#\.([a-z]+)$#ui', $_FILES['img']['name'], $matches);
    if (isset($matches[1])) {

        $matches[1] = mb_strtolower($matches[1]);

        $temp = getimagesize($_FILES['img']['tmp_name']);
        $name = '/uploaded/' . date('Ymd-His') . 'img' . rand(10000, 99999) . '.jpg';

        if (!in_array($matches[1], $array2)) {
            $errors['img'] = 'Не подходит расширение изображения';
        } elseif (!in_array($temp['mime'], $array)) {
            $errors['img'] = 'Не подходит тип файла, можно загружать только изображения';
        } elseif (!move_uploaded_file($_FILES['img']['tmp_name'], '.' . $name)) {
            $errors['img'] = 'Изображение не загружено. Ошибка';
        }
    } else {
        $errors['img'] = 'Даный файл не является картинкой. Допускаются типы файлов: jpg, jpeg, png, gif';
    }
}