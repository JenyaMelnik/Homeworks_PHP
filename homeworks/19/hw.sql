-- 1.1
INSERT INTO `users`
SET `login` = 'Петрович';

-- 1.2
INSERT INTO `users`
SET `login` = 'Yamamoto',
    `age` = 10;

-- 1.3
INSERT INTO `users`
SET `login` = 'inpost',
    `age` = 2,
    `password` = 123,
    `email` = 'inpost@list.ru';

-- 1.4
INSERT INTO `users`
SET `login` = 'Tolya',
    `age` = 18,
    `password` = '123456789',
    `email` = 'Tolya2003@i.ua';

INSERT INTO `users`
SET `login` = 'Dima',
    `age` = 22,
    `password` = 'Dima1999',
    `email` = 'Dima1999@i.ua';

-- 2
UPDATE `users`
SET `age` = 9
WHERE `login` = 'Yamamoto';

-- 3
DELETE
FROM `users`
WHERE `login` = 'Петрович'
  AND `id` = 9;

-- 4.1
SELECT *
FROM `users`
WHERE `age` >= 20
  AND `age` <= 25
ORDER BY `age` DESC;

-- 4.2
SELECT *
FROM `users`
WHERE `login` = 'inpost';

-- 4.3
SELECT *
FROM `users` LIMIT 4;