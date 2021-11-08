-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 08 2021 г., 16:33
-- Версия сервера: 5.7.29
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `jenyamelnik1986`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `login` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `login`, `email`, `comment`, `date`) VALUES
(1, 'Sasha', '', 'Сегодня хорошая погода', '2021-08-11 00:00:00'),
(2, 'Kolya', '', 'Всем привет!', '2021-08-11 00:00:00'),
(3, 'Jenya', '', 'Классная база данных!', '2021-08-11 00:00:00'),
(13, 'Оля', 'Olya@i.ua', 'Хороший магазин!', '2021-09-09 17:48:27'),
(7, 'Саша', 'Sahsa@i.ua', 'Summer have gone', '2021-09-09 17:30:21'),
(8, 'Евгений', 'jenyamelnik1986@gmail.com', 'Всем привет!', '2021-09-09 17:34:36'),
(9, 'Андрей', 'Dron@i.ua', 'Люблю крассное вино!', '2021-09-09 17:37:23'),
(10, 'Коля', 'Kolya@i.ua', 'А я люблю белое', '2021-09-09 17:41:12'),
(11, 'Vasya', 'Vasya@i.ua', 'А я пью водку', '2021-09-09 17:42:51'),
(12, 'Lena', 'Lena@i.ua', 'А я все пью!', '2021-09-09 17:45:56'),
(14, 'Anna', 'Anna@i.ua', 'Посоветуйте хорошее вино', '2021-09-09 17:50:28'),
(15, 'Vera', 'Vera@i.ua', 'Anna, бери 777, не пожалеешь!', '2021-09-09 17:55:57'),
(16, 'Dasha', 'Dasha@i.ua', 'Anna, я пробовала 777 - БОМБА!', '2021-09-09 17:57:16'),
(17, 'Jenya', 'Jenya@i.ua', 'Андрей (2021-09-09 17:37:23)\r\n- Люблю крассное вино!\r\n\r\nАндрей, \"крассное\" пишется с одной \"c\")))', '2021-09-09 17:59:30'),
(18, 'Masha', 'Masha@i.ua', 'Привет.\r\nКак дела?', '2021-09-09 18:09:39'),
(19, 'Masha', 'Masha@i.ua', 'Привет.\r\nКак дела?', '2021-09-09 18:09:39'),
(20, 'Sveta', 'Sveta@i.ua', 'Я пью белое вино<br />\r\nи крассное<br />\r\nи водку', '2021-09-09 18:17:35'),
(21, 'Lera', 'Lera@i.ua', '', '2021-09-09 19:30:43'),
(22, 'Jenya2', 'Jenya@i.ua', 'Всем привет<br />\r\n', '2021-09-09 19:32:44'),
(27, 'Jenya123', 'Jenya123@i.ua', 'Ghbdtn\r\nrfr ltkf\r\nbffdg', '2021-09-10 09:37:51'),
(26, 'Jenya', 'erhaehae@i.ua', 'zdfhadghadgj', '2021-09-09 19:53:48'),
(28, 'Jenya123', 'Jenya123@i.ua', 'Ghbdtn\r\nrfr ltkf\r\nbffdg', '2021-09-10 09:47:39'),
(29, 'Jenya4321', 'JEnya@i.ua', 'Hello\r\nsdfhgsjwrykmts', '2021-09-10 09:49:30'),
(30, 'Jenya4321', 'JEnya@i.ua', 'Hello\r\nsdfhgsjwrykmts', '2021-09-10 09:49:35'),
(31, 'Jenya4321', 'JEnya@i.ua', 'Hello\r\nsdfhgsjwrykmts', '2021-09-10 09:49:39'),
(32, 'Denya', 'Denya@i.ua', 'afhadgn\r\nxbn\r\nxbvm\r\n', '2021-09-10 10:10:12'),
(33, 'Denya', 'Denya@i.ua', 'afhadgn\r\nxbn\r\nxbvm\r\n', '2021-09-10 10:10:12'),
(34, 'Oleh', 'Oleh@i.ua', 'aehagh\r\nsdghsxvnm\r\ncvn', '2021-09-10 10:13:33'),
(35, 'Petya', 'Petya@i.ua', 'sfhsfhm\r\nsfhmsfhm', '2021-09-10 10:14:11'),
(37, 'Renat', 'Renat@i.ua', 'abwbvetopuwidahlkhb\r\ndfbkewjl', '2021-09-15 10:34:10'),
(38, 'Jenya', 'jenyamelnik1986@gmail.com', 'zdsfhadnvxcnbxf', '2021-09-16 14:18:13'),
(41, 'Jenya', 'Jenya@i.ua', 'aehdgnsgn', '2021-09-16 16:18:52'),
(42, 'Jenya', 'Jenya@i.ua', 'adthae;igjnsx;fign', '2021-09-16 16:19:30'),
(43, 'Jenya', 'jenyamelnik1986@gmail.com', 'kjfkcgkgcghkc', '2021-09-16 16:21:54'),
(44, 'Jenya', 'Jenya@i.ua', 'zdfbzdgnfgnxg', '2021-09-16 16:30:52'),
(45, 'Jenya', 'jenyamelnik1986@gmail.com', 'eyetdgfgncbnvbnsfjsfhf\r\nfhmh\r\nfhmx', '2021-09-16 16:34:20'),
(46, 'Jenya', 'jenyamelnik1986@gmail.com', 'sfjmsdfhm\r\ngnmfhklu\r\nj.,', '2021-09-16 16:37:17'),
(47, 'Yevhenii Melnik', 'jenyamelnik1986@gmail.com', 'eatnfhn', '2021-09-16 16:38:27'),
(48, 'Jenya', 'jenyamelnik1986@gmail.com', 'zdgnshmsdghmdg', '2021-09-16 16:44:33'),
(49, 'Jenya', 'Jenya@i.ua', 'Привет.\r\nПривет', '2021-09-20 09:48:41'),
(50, 'Jenya', 'jenyamelnik1986@gmail.com', 'ЙЙЙЙЙЙЙЙ', '2021-10-04 15:30:21'),
(51, 'Anna', 'Anna@i.ua', 'qwrgqehqtja', '2021-10-05 15:44:01'),
(52, 'Anna', 'Anna@i.ua', 'qazqazqaz', '2021-10-05 15:44:11');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `category` enum('Белые вина','Красные вина','Крепленые вина','') COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `strength` float NOT NULL,
  `price` smallint(6) NOT NULL,
  `availability` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 - есть в наличии\r\n0 - нет в наличии'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `category`, `title`, `description`, `strength`, `price`, `availability`) VALUES
(1, 'Белые вина', 'Sauvignon Blanc Marlborough Sun', 'Яркость Совиньон Блана проявляется в выразительном аромате маракуйи, крыжовника, листьев черной смородины в обрамлении тонких цитрусовых тонов. Во вкусе хорошо сбалансированное вино, обладает приятной свежестью и ярким характером. Послевкусие затяжное, освежающее.', 13, 345, 1),
(2, 'Белые вина', 'Chardonnay', 'Ароматное, утонченное Шардоне с нюансами манго, персиков, цитрусов и цветения липы. Во вкусе, свежее, фруктовое, питкое. Послевкусие мягкое, фруктовое. Отлично сочетается с различной рыбой, моллюсками, пастой со сливочным соусом и белым мясом, а также хорошо в качестве аперитива.', 13, 520, 1),
(3, 'Красные вина', 'Pinot Noir', 'Применяя свой многолетний опыт в Бургундии Doudet Naudin создали этот Пино Нуар с лоз, высаженных в Долине Од региона Лангедок-Руссильон вблизи Пиренеев, где прохладнее климат и мягче температуры. Вино с выразительным ароматом темных и красных ягод, гармонично переплетенных с цветочными тонами. Вкус обладает прекрасным балансом и элегантностью присущему Пино Нуару. Вино дополнит множество блюд от холодных закусок до белого и красного мяса.', 12.5, 290, 1),
(4, 'Красные вина', 'Cabernet Sauvignon Reserva', 'Кольчагуа - одна из чилийских винных долин, с большим международным авторитетом. В этой же долине, между прибрежным хребтом и Тихим океаном разбиты виноградники хозяйства. Линейка «Reserva» - прекрасные повседневные вина, которые никогда не подведут. Перед вами 100% Кабарне Совиньон, выдержанный 6 месяцев в дубовых бочках. Вино предлагает четко очерченные оттенки черной смородины, ванили и фиалки. Вино средней насыщенности, с сочными танинами и прекрасным фруктовым акцентом на послевкусие. Хорошее дополнение к мясным блюдам.', 14, 430, 1),
(5, 'Крепленые вина', 'Fonseca Tawny', 'Аромат раскрывается оттенками абрикос, спелых слив, пряностей и сливочного масла. Во вкусе ощущаются нюансы джема и прекрасный баланс. Послевкусие затяжное, уравновешенное хорошо интегрированной кислотностью.', 20, 385, 1),
(6, 'Крепленые вина', 'Taylor\'s Fine Ruby', 'Яркий фруктовый аромат наполнен оттенками черной смородины, вишни и спелой сливы. Вкус переполнен фруктовым характером. Послевкусие долгое, оставляющее приятную сладость.', 20, 350, 0),
(8, 'Белые вина', 'Каберне', 'фтаиофвтжипофтвпжиофтвпи', 15, 100, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'meta title',
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'meta keywords',
  `meta_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'meta description'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `date`, `title`, `category`, `text`, `description`, `meta_title`, `meta_keywords`, `meta_description`) VALUES
(5, '2021-09-25 17:01:14', 'В Украине родилось много котят', 'Животные', 'В Украине родилось 230 котят. Это на 20 котят больше чем в прошлом году.', 'В Украине родилось 230 котят.', '', '', ''),
(10, '2021-10-19 21:18:54', 'чарьчаобчпоб', 'ситбсиьбь', 'чттичмтястлдия', 'ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffgggggggggggggggggggg', 'meta title', 'meta keywords', 'meta description'),
(11, '2021-10-19 21:18:42', 'пРИВЕТы', 'МЧЬМТЬЧМ', 'МТЬСМТЬ', 'wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww', 'meta title', 'meta keywords', 'meta description'),
(21, '2021-10-19 21:18:34', 'ahajnar', ',cstyle.css', 'h,fk,fk.', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', 'meta title', 'meta keywords', 'meta description');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'login',
  `age` tinyint(4) UNSIGNED NOT NULL DEFAULT '18',
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `access` tinyint(4) NOT NULL DEFAULT '0',
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `userAgent` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `age`, `email`, `password`, `active`, `hash`, `access`, `ip`, `userAgent`) VALUES
(2, 'Sasha', 34, '', '', 0, '', 0, '', ''),
(4, 'Marharita', 31, '', '', 0, '', 0, '', ''),
(5, 'Olya', 31, '', '', 0, '', 0, '', ''),
(6, 'Sergey', 36, '', '', 0, '', 0, '', ''),
(7, 'Sergey2', 31, '', '', 0, '', 0, '', ''),
(8, 'Denys', 18, '', '', 0, '', 0, '', ''),
(10, 'Yamamoto', 9, '', '', 0, '', 0, '', ''),
(11, 'inpost', 2, 'inpost@list.ru', '123', 0, '', 0, '', ''),
(12, 'Vasilij', 25, 'Vasilij@.ru', '345', 0, '', 0, '', ''),
(13, 'Tolya', 18, 'Tolya2003@i.ua', '123456789', 0, '', 0, '', ''),
(15, 'Dima', 34, 'Dima1999@i.ua', 'CB4wFZWK//fyU', 0, '', 0, '', ''),
(16, 'login1', 20, 'Login@i.ua', 'login1', 0, '', 0, '', ''),
(18, 'login2', 25, 'Login2@i.ua', 'password2', 0, '', 0, '', ''),
(41, 'Jenya', 35, 'jenyamelnik1986@gmail.com', 'CBcGtU7HY7hPU', 1, 'CB6epMtaLxOII', 5, 'CBacOoVtp4.ZM', 'CBqpDcR7bIjQs'),
(43, 'Rita', 31, 'Rita@i.ua', 'CB4wFZWK//fyU', 1, 'CBQHm3yu2ikWc', 0, '', ''),
(45, 'Anna', 25, 'Anna@i.ua', 'CB4wFZWK//fyU', 1, 'CBLkijhaQAl2Y', 0, 'CBacOoVtp4.ZM', 'CBsArLTFekQzI'),
(46, 'Nikolay', 40, 'Nikolay@i.ua', 'CBdb5tnrHmBWA', 1, 'CBcxQMfO0TWCg', 0, '', ''),
(50, 'Makar', 25, 'Makar@i.ua', 'CBTKEi/g6HDxk', 1, 'CB0A346UhHAos', 0, '', ''),
(51, 'Polina', 27, 'Polina@i.ua', 'CBdb5tnrHmBWA', 1, 'CBR0sB1y4qpcA', 0, '', ''),
(52, 'Alenka', 31, 'Alenka@i.ua', 'CBaNmpw53Mh92', 1, 'CBgEcjpXVK6ag', 0, '', ''),
(54, 'Nikkolay', 45, 'Nikkolay@i.ua', 'CBdb5tnrHmBWA', 1, 'CBp.fGK4ttVE.', 0, '', ''),
(58, 'Vassya', 45, 'Vassya@i.ua', 'CBdb5tnrHmBWA', 1, 'CBAcldwPMYj0.', 0, '', ''),
(62, 'Roman', 25, 'Roman@i.ua', 'CBdb5tnrHmBWA', 1, 'CB88tkMWL6Gns', 0, '', ''),
(64, 'Oleh', 25, 'Oleh@i.ua', 'CBdb5tnrHmBWA', 1, 'CB7253PFLDhUg', 0, '', ''),
(66, 'Vova', 23, 'Vova@i.ua', 'CBdb5tnrHmBWA', 1, 'CBptHAn6dli0c', 0, '', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ixTitle` (`title`),
  ADD KEY `ixCategory` (`category`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ixTitle` (`title`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ixLogin` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
