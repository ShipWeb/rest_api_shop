-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Сен 11 2017 г., 15:09
-- Версия сервера: 10.1.21-MariaDB
-- Версия PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `rest_api_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ras_categories`
--

CREATE TABLE `ras_categories` (
  `category_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `number_products` bigint(20) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ras_categories`
--

INSERT INTO `ras_categories` (`category_id`, `title`, `name`, `number_products`) VALUES
(1, 'Шутеры', 'shooters', 1),
(2, 'Ролевые игры', 'role-playing-games', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `ras_images`
--

CREATE TABLE `ras_images` (
  `image_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ras_images`
--

INSERT INTO `ras_images` (`image_id`, `title`, `name`, `path`) VALUES
(1, 'Counter-Strike: Global Offensive', 'counter_strike_global_offensive.jpg', '/uploads/images/games/'),
(2, 'Ведьмак 3', 'vedmak_3.jpg', '/uploads/images/games/');

-- --------------------------------------------------------

--
-- Структура таблицы `ras_products`
--

CREATE TABLE `ras_products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_api_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `chpu` varchar(255) DEFAULT NULL,
  `content` longtext,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` varchar(512) DEFAULT NULL,
  `seo_keywords` varchar(255) DEFAULT NULL,
  `date_create` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_create_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ras_products`
--

INSERT INTO `ras_products` (`product_id`, `product_api_id`, `title`, `chpu`, `content`, `seo_title`, `seo_description`, `seo_keywords`, `date_create`, `date_create_gmt`, `date_modified`, `date_modified_gmt`) VALUES
(1, 1, 'Игра Counter-Strike: Global Offensive', 'igra-counter-strike-global-offensive', 'Описание игры Counter-strike', 'Игра Counter-strike: Global Offensive', 'Это игра Counter-strike: Global Offensive', 'Игра, Counter-strike, Global Offensive', '2017-08-12 09:00:00', '2017-08-12 12:00:00', '2017-08-12 09:00:00', '2017-08-12 12:00:00'),
(2, 2, 'Игра Ведьмак 3', 'igra-vedmak-3', 'Описание игры Ведьмак 3', 'Игра Ведьмак 3', 'Это игра Ведьмак 3', 'Игра, Ведьмак 3', '2017-08-12 09:30:00', '2017-08-12 12:30:00', '2017-08-12 09:30:00', '2017-08-12 12:30:00'),
(3, 3, 'Игра Counter-Strike: Global Offensive', 'igra-counter-strike-global-offensive', 'Описание игры Counter-strike', 'Игра Counter-strike: Global Offensive', 'Это игра Counter-strike: Global Offensive', 'Игра, Counter-strike, Global Offensive', '2017-08-12 09:00:00', '2017-08-12 12:00:00', '2017-08-12 09:00:00', '2017-08-12 12:00:00'),
(4, 4, 'Игра Ведьмак 3', 'igra-vedmak-3', 'Описание игры Ведьмак 3', 'Игра Ведьмак 3', 'Это игра Ведьмак 3', 'Игра, Ведьмак 3', '2017-08-12 09:30:00', '2017-08-12 12:30:00', '2017-08-12 09:30:00', '2017-08-12 12:30:00'),
(5, 5, 'Игра Counter-Strike: Global Offensive', 'igra-counter-strike-global-offensive', 'Описание игры Counter-strike', 'Игра Counter-strike: Global Offensive', 'Это игра Counter-strike: Global Offensive', 'Игра, Counter-strike, Global Offensive', '2017-08-12 09:00:00', '2017-08-12 12:00:00', '2017-08-12 09:00:00', '2017-08-12 12:00:00'),
(6, 6, 'Игра Ведьмак 3', 'igra-vedmak-3', 'Описание игры Ведьмак 3', 'Игра Ведьмак 3', 'Это игра Ведьмак 3', 'Игра, Ведьмак 3', '2017-08-12 09:30:00', '2017-08-12 12:30:00', '2017-08-12 09:30:00', '2017-08-12 12:30:00'),
(7, 7, 'Игра Counter-Strike: Global Offensive', 'igra-counter-strike-global-offensive', 'Описание игры Counter-strike', 'Игра Counter-strike: Global Offensive', 'Это игра Counter-strike: Global Offensive', 'Игра, Counter-strike, Global Offensive', '2017-08-12 09:00:00', '2017-08-12 12:00:00', '2017-08-12 09:00:00', '2017-08-12 12:00:00'),
(8, 8, 'Игра Ведьмак 3', 'igra-vedmak-3', 'Описание игры Ведьмак 3', 'Игра Ведьмак 3', 'Это игра Ведьмак 3', 'Игра, Ведьмак 3', '2017-08-12 09:30:00', '2017-08-12 12:30:00', '2017-08-12 09:30:00', '2017-08-12 12:30:00'),
(9, 9, 'Игра Counter-Strike: Global Offensive', 'igra-counter-strike-global-offensive', 'Описание игры Counter-strike', 'Игра Counter-strike: Global Offensive', 'Это игра Counter-strike: Global Offensive', 'Игра, Counter-strike, Global Offensive', '2017-08-12 09:00:00', '2017-08-12 12:00:00', '2017-08-12 09:00:00', '2017-08-12 12:00:00'),
(10, 10, 'Игра Ведьмак 3', 'igra-vedmak-3', 'Описание игры Ведьмак 3', 'Игра Ведьмак 3', 'Это игра Ведьмак 3', 'Игра, Ведьмак 3', '2017-08-12 09:30:00', '2017-08-12 12:30:00', '2017-08-12 09:30:00', '2017-08-12 12:30:00');

-- --------------------------------------------------------

--
-- Структура таблицы `ras_products_categories`
--

CREATE TABLE `ras_products_categories` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ras_products_categories`
--

INSERT INTO `ras_products_categories` (`product_id`, `category_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `ras_products_images`
--

CREATE TABLE `ras_products_images` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ras_products_images`
--

INSERT INTO `ras_products_images` (`product_id`, `image_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `ras_products_properties`
--

CREATE TABLE `ras_products_properties` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `property_id` int(11) UNSIGNED NOT NULL,
  `value_str` varchar(255) DEFAULT NULL,
  `value_int` bigint(20) DEFAULT NULL,
  `value_dec` decimal(12,2) DEFAULT NULL,
  `value_flt` double DEFAULT NULL,
  `value_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ras_products_properties`
--

INSERT INTO `ras_products_properties` (`product_id`, `property_id`, `value_str`, `value_int`, `value_dec`, `value_flt`, `value_date`) VALUES
(1, 1, NULL, NULL, '10.20', NULL, NULL),
(1, 2, 'Windows Vista, Windows 7', NULL, NULL, NULL, NULL),
(1, 7, NULL, NULL, NULL, NULL, '2012-08-21 00:00:00'),
(2, 1, NULL, NULL, '21.54', NULL, NULL),
(2, 2, 'Windows Vista, Windows 7, Windows 8', NULL, NULL, NULL, NULL),
(2, 7, NULL, NULL, NULL, NULL, '2015-05-19 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `ras_properties`
--

CREATE TABLE `ras_properties` (
  `property_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` enum('INTEGER','DECIMAL','FLOAT','TEXT','DATE') NOT NULL DEFAULT 'INTEGER',
  `sort` enum('SELECT','MULTISELECT','LIST','RANGE') NOT NULL DEFAULT 'SELECT',
  `active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `show_index` enum('Y','N') DEFAULT 'N',
  `show_view` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ras_properties`
--

INSERT INTO `ras_properties` (`property_id`, `name`, `type`, `sort`, `active`, `show_index`, `show_view`) VALUES
(1, 'Цена', 'DECIMAL', 'RANGE', 'Y', 'Y', 'Y'),
(2, 'Операционная система', 'TEXT', 'SELECT', 'Y', 'N', 'Y'),
(3, 'Процессор', 'TEXT', 'SELECT', 'Y', 'N', 'Y'),
(4, 'Видеокарта', 'TEXT', 'SELECT', 'Y', 'N', 'Y'),
(5, 'Оперативная память', 'TEXT', 'SELECT', 'Y', 'N', 'Y'),
(6, 'Жесткий диск', 'TEXT', 'SELECT', 'Y', 'N', 'Y'),
(7, 'Дата выхода', 'DATE', 'RANGE', 'Y', 'Y', 'Y');

-- --------------------------------------------------------

--
-- Структура таблицы `ras_settings`
--

CREATE TABLE `ras_settings` (
  `setting_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(100) NOT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `ras_categories`
--
ALTER TABLE `ras_categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_id` (`category_id`),
  ADD UNIQUE KEY `category_name_index` (`category_id`,`name`),
  ADD KEY `name` (`name`);

--
-- Индексы таблицы `ras_images`
--
ALTER TABLE `ras_images`
  ADD PRIMARY KEY (`image_id`),
  ADD UNIQUE KEY `image_id` (`image_id`),
  ADD UNIQUE KEY `image_name_path_index` (`image_id`,`name`,`path`),
  ADD KEY `name` (`name`),
  ADD KEY `path` (`path`),
  ADD KEY `title` (`title`);

--
-- Индексы таблицы `ras_products`
--
ALTER TABLE `ras_products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_id` (`product_id`),
  ADD KEY `product_api_id` (`product_api_id`),
  ADD KEY `id` (`product_id`),
  ADD KEY `title` (`title`),
  ADD KEY `chpu` (`chpu`),
  ADD KEY `date_create` (`date_create`),
  ADD KEY `date_create_gmt` (`date_create_gmt`),
  ADD KEY `date_modified` (`date_modified`),
  ADD KEY `date_modified_gmt` (`date_modified_gmt`);

--
-- Индексы таблицы `ras_products_categories`
--
ALTER TABLE `ras_products_categories`
  ADD UNIQUE KEY `product_category_index` (`product_id`,`category_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `ras_products_images`
--
ALTER TABLE `ras_products_images`
  ADD UNIQUE KEY `product_image_index` (`product_id`,`image_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `image_id` (`image_id`);

--
-- Индексы таблицы `ras_products_properties`
--
ALTER TABLE `ras_products_properties`
  ADD UNIQUE KEY `product_property_index` (`product_id`,`property_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `property_id` (`property_id`),
  ADD KEY `value_str` (`value_str`),
  ADD KEY `value_int` (`value_int`),
  ADD KEY `value_dec` (`value_dec`),
  ADD KEY `value_flt` (`value_flt`),
  ADD KEY `value_date` (`value_date`);

--
-- Индексы таблицы `ras_properties`
--
ALTER TABLE `ras_properties`
  ADD PRIMARY KEY (`property_id`),
  ADD UNIQUE KEY `property_name_index` (`property_id`,`name`),
  ADD KEY `name` (`name`),
  ADD KEY `active` (`active`),
  ADD KEY `type` (`type`),
  ADD KEY `show_index` (`show_index`);

--
-- Индексы таблицы `ras_settings`
--
ALTER TABLE `ras_settings`
  ADD PRIMARY KEY (`setting_id`),
  ADD UNIQUE KEY `setting_name_index` (`setting_id`,`name`),
  ADD KEY `name` (`name`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `ras_categories`
--
ALTER TABLE `ras_categories`
  MODIFY `category_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `ras_images`
--
ALTER TABLE `ras_images`
  MODIFY `image_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `ras_products`
--
ALTER TABLE `ras_products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `ras_properties`
--
ALTER TABLE `ras_properties`
  MODIFY `property_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `ras_settings`
--
ALTER TABLE `ras_settings`
  MODIFY `setting_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
