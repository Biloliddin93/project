-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 11 2018 г., 15:29
-- Версия сервера: 5.6.31-log
-- Версия PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yardan`
--

-- --------------------------------------------------------

--
-- Структура таблицы `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL,
  `banner_group_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `banner_title` varchar(255) DEFAULT NULL,
  `banner_alt` varchar(255) DEFAULT NULL,
  `banner_deck` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `banner_category`
--

CREATE TABLE IF NOT EXISTS `banner_category` (
  `id` int(11) NOT NULL,
  `position_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `banner_category`
--

INSERT INTO `banner_category` (`id`, `position_name`) VALUES
(1, 'FRONT SLIDER'),
(2, 'FRONT RIGHT'),
(3, 'FRONT LEFT'),
(4, 'INNER BOTTOM');

-- --------------------------------------------------------

--
-- Структура таблицы `banner_group`
--

CREATE TABLE IF NOT EXISTS `banner_group` (
  `id` int(11) NOT NULL,
  `img_group_id` int(11) NOT NULL,
  `inserted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `banner_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url_alias` varchar(255) NOT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `body` text,
  `content_group_id` int(11) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `inserted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `content_group`
--

CREATE TABLE IF NOT EXISTS `content_group` (
  `id` int(11) NOT NULL,
  `img_gallery_id` int(11) NOT NULL,
  `inserted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `content_seo`
--

CREATE TABLE IF NOT EXISTS `content_seo` (
  `id` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_deck` text NOT NULL,
  `keyswords` varchar(255) DEFAULT NULL,
  `content_group_id` int(11) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `inserted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `img_gallery`
--

CREATE TABLE IF NOT EXISTS `img_gallery` (
  `id` int(11) NOT NULL,
  `image_title` varchar(255) NOT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `language_id` int(11) NOT NULL,
  `img_grp_id` int(11) NOT NULL,
  `inserted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `img_gallery`
--

INSERT INTO `img_gallery` (`id`, `image_title`, `alt`, `summary`, `language_id`, `img_grp_id`, `inserted_at`, `updated_at`) VALUES
(10, 'test', 'testestestset', 'testsetestestse', 2, 14, '2018-05-10 09:50:02', NULL),
(11, 'testx', 'testestestset', 'testsetestestse', 2, 14, '2018-05-10 09:50:02', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `img_group`
--

CREATE TABLE IF NOT EXISTS `img_group` (
  `id` int(11) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `inserted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `img_group`
--

INSERT INTO `img_group` (`id`, `img_url`, `inserted_at`, `updated_at`) VALUES
(14, '20180510125002.jpg', '2018-05-10 14:50:02', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `id` int(11) NOT NULL,
  `language_prefix` varchar(255) NOT NULL,
  `language_name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `language`
--

INSERT INTO `language` (`id`, `language_prefix`, `language_name`, `created_at`, `updated_at`) VALUES
(1, 'az', 'Azerbayjan', NULL, NULL),
(2, 'ru', 'Russian', NULL, NULL),
(3, 'en', 'English', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1525888781),
('m180509_171422_content', 1525888784),
('m180509_171452_content_seo', 1525888784),
('m180509_171526_content_group', 1525888784),
('m180509_171543_img_group', 1525888784),
('m180509_171555_img_gallery', 1525888785),
('m180509_171624_banner_category', 1525888785),
('m180509_171634_banner_group', 1525888785),
('m180509_171650_banner', 1525888785),
('m180509_171659_users', 1525888847),
('m180510_054456_language', 1525931210),
('m180510_054456_settings', 1526013034);

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL,
  `admin_language_id` int(11) NOT NULL,
  `site_language_id` int(11) DEFAULT NULL,
  `empty_stats` tinyint(3) DEFAULT NULL,
  `adminemail` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `site_title` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `admin_language_id`, `site_language_id`, `empty_stats`, `adminemail`, `favicon`, `site_title`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 1, 'admin@mail.ru', '20180511104535.png', 'Yardan', '2018-05-11 00:00:00', '2018-05-11 17:29:02');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_stats` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `fullname`, `login`, `password`, `email`, `avatar`, `created_at`, `updated_at`, `user_stats`) VALUES
(5, 'qwertyy', 'admin', '1', 'admin@bk.ru', '20180510091013.jpg', '2018-05-10 06:10:13', '2018-05-11 12:23:58', 2),
(6, 'vbnbn', 'adminx', '1', 'Bk@bk.ru', '20180510091024.jpg', '2018-05-10 06:10:24', '2018-05-11 12:29:27', 1),
(7, 'BK', 'admins', '12345678', 'Bxexe@bk.ru', '20180510124907.jpg', '2018-05-10 09:49:07', '2018-05-11 12:23:36', 2),
(8, 'BK', 'admins', '12345678', 'Bxexe@bk.ru', '20180510124907.jpg', '2018-05-10 09:49:07', NULL, 1),
(9, 'BK', 'admins', '12345678', 'Bxexe@bk.ru', '20180510124907.jpg', '2018-05-10 09:49:07', '2018-05-11 12:23:58', 2),
(10, 'BK', 'admins', '12345678', 'Bxexe@bk.ru', '20180510124907.jpg', '2018-05-10 09:49:07', NULL, 1),
(11, 'BK', 'admins', '12345678', 'Bxexe@bk.ru', '20180510124907.jpg', '2018-05-10 09:49:07', NULL, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `banner_category`
--
ALTER TABLE `banner_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `banner_group`
--
ALTER TABLE `banner_group`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `content_group`
--
ALTER TABLE `content_group`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `content_seo`
--
ALTER TABLE `content_seo`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `img_gallery`
--
ALTER TABLE `img_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `img_group`
--
ALTER TABLE `img_group`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `banner_category`
--
ALTER TABLE `banner_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `banner_group`
--
ALTER TABLE `banner_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `content_group`
--
ALTER TABLE `content_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `content_seo`
--
ALTER TABLE `content_seo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `img_gallery`
--
ALTER TABLE `img_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `img_group`
--
ALTER TABLE `img_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
