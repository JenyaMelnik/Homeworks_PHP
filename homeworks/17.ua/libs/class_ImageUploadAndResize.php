<?php

class ImageUploadAndResize
{
    public array $array = ['image/gif', 'image/jpeg', 'image/png', 'image/jpg'];
    public array $array2 = ['gif', 'jpeg', 'png', 'jpg'];

    public function checkAndLoad($name, $array): array
    {
        $errors = [];
        if ($array['img']['size'] < 1000 || $array['img']['size'] > 50000000) {
            $errors['img'] = 'Размер изображения не подходит';
        } else {
            preg_match('#\.([a-z]+)$#ui', $array['img']['name'], $matches);
            if (isset($matches[1])) {

                $type = mb_strtolower($matches[1]);
                $temp = getimagesize($array['img']['tmp_name']);

                if (!in_array($type, $this->array2)) {
                    $errors['img'] = 'Не подходит расширение изображения';
                } elseif (!in_array($temp['mime'], $this->array)) {
                    $errors['img'] = 'Не подходит тип файла, можно загружать только изображения';
                } elseif (!move_uploaded_file($array['img']['tmp_name'], $name)) {
                    $errors['img'] = 'Изображение не загружено. Ошибка';
                }
            } else {
                $errors['img'] = 'Даный файл не является картинкой. Допускаются типы файлов: jpg, jpeg, png, gif';
            }
        }
        return $errors;
    }

    public function resize($name, $name2, $array, $maxWidth, $maxHeight): bool
    {
        $type = $array['img']['type'];
        switch ($type) {

            case 'image/jpg':
            case 'image/jpeg':
                $image = imagecreatefromjpeg($name);
                break;

            case 'image/png':
                $image = imagecreatefrompng($name);
                break;

            case 'image/gif':
                $image = imagecreatefromgif($name);
                break;

            case 'image/bmp':
                $image = imagecreatefrombmp($name);
                break;
        }

        if (!isset($image)) {
            return false;
        }

        $imgWidth = imagesx($image);
        $imgHeight = imagesy($image);

        if ($imgWidth < 10 || $imgHeight < 10) {
            return false;
        }

        if ($imgWidth < $maxWidth && $imgHeight < $maxHeight) {
            return true;
        }

        if (round($imgWidth / $maxWidth, 2) > round($imgHeight / $maxHeight, 2)) {
            $ratio = round($imgWidth / $maxWidth, 2);
        } else {
            $ratio = round($imgHeight / $maxHeight, 2);
        }

        $newWidth = $imgWidth / $ratio;
        $newHeight = $imgHeight / $ratio;

        if ($newWidth < 10 || $newHeight < 10) {
            return false;
        }

        $newImg = imagecreatetruecolor($newWidth, $newHeight);

        imagecopyresampled($newImg, $image, 0, 0, 0, 0, $newWidth, $newHeight, $imgWidth, $imgHeight);
        imagejpeg($newImg, $name2);

        imagedestroy($image);
        imagedestroy($newImg);

        return true;
    }
}
