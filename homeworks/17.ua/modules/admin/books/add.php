<?php
/**
 * @var $dbc mysqli
 */

if (isset($_POST['add'],
    $_POST['title'],
    $_POST['author1'],
    $_POST['description'])) {

    $errors = [];

    if (mb_strlen($_POST['title']) < 2) {
        $errors['title'] = 'Название книги должно быть не менее двух символов';
    } elseif (mb_strlen($_POST['title']) > 30) {
        $errors['title'] = 'Название книги должно быть не более 30 символов';
    }

    if (empty($_POST['author1'])) {
        $errors['author1'] = 'Выберите автора книги';
    }

    if (empty($_POST['description'])) {
        $errors['description'] = 'Вы не ввели описание';
    }

    if ($_FILES['img']['error'] == 0) {
        $booksCore = new Core;
        $booksCore::$ORIGINAL_PATH = '/uploaded/books/original/';
        $booksCore::$RESIZED_PATH = '/uploaded/books/100x100/';
        $imgPath = $booksCore::$ORIGINAL_PATH . date('Ymd-His') . 'img' . rand(10000, 99999) . '.jpg';
        $uploadedImagePath = '.' . $imgPath;

        $newFoto = new ImageUploadAndResize;
        $errors = $newFoto->checkAndLoad($uploadedImagePath, $_FILES);

        if (!count($errors)) {
            $imgResizedPath = $booksCore::$RESIZED_PATH . date('Ymd-His') . 'img' . rand(10000, 99999) . '.jpg';
            $resizedImagePath = '.' . $imgResizedPath;
            if (!$newFoto->resize($uploadedImagePath, $resizedImagePath, $_FILES, 100, 100)) {
                $errors['img'] = 'Не подходящий размер фото';
            }
        }
    }

    if (!count($errors)) {

        $authors[] = $_POST['author1'];
        if (!empty($_POST['author2'])) {
            $authors[] = $_POST['author2'];
        }
        if (!empty($_POST['author3'])) {
            $authors[] = $_POST['author3'];
        }

        $selectedAuthors = query("
            SELECT * FROM `books_author`
            WHERE `author` IN ('" . implode("','", escapeString($authors)) . "')
            ORDER BY `id` ASC
        ");

        if (!$selectedAuthors->num_rows) {
            $_SESSION['notice'] = 'Ошибка! Выбранные авторы отсутсвуют!';
        } else {

            query("
            	INSERT INTO `books` 
            	SET `title` = '" . escapeString(trim($_POST['title'])) . "',
             	    `description` = '" . escapeString(trim($_POST['description'])) . "'
      		");

            $id = mysqli_insert_id(DBConnectAndClose::connect());

            if ($_FILES['img']['error'] == 0 && isset($imgResizedPath)) {
                query("
                    UPDATE `books` 
                    SET  `img` = '" . escapeString($imgResizedPath) . "'
                    WHERE `id` = " . $id . "
                ");
            }

            while ($selectedAuthor = $selectedAuthors->fetch_assoc()) {
                query("
                    INSERT INTO `books2books_author`
                    SET `book_id` = " . $id . ",
                    `author_id` = " . $selectedAuthor['id'] . "
                ");
            }

            $_SESSION['notice'] = 'Книга дабавлена';
        }
        redirectTo(['module' => 'books']);
    }
}

//============================================== Выбираем всех авторов ==============================================
$authors = query("
              SELECT *
              FROM `books_author`
              ORDER BY `author` ASC
          ");
while ($author = $authors->fetch_assoc()) {
    $allAuthors[] = $author['author'];
}

$authors->close();

if (empty($allAuthors)) {
    $allAuthors[] = 'Нет авторов';
}
