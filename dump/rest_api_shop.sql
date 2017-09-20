-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Сен 20 2017 г., 18:20
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
-- Структура таблицы `ras_currencies`
--

CREATE TABLE `ras_currencies` (
  `currency_id` int(11) UNSIGNED NOT NULL,
  `currency_title` varchar(100) DEFAULT NULL,
  `currency_name` varchar(50) DEFAULT NULL,
  `currency_course` decimal(12,8) DEFAULT NULL,
  `currency_active` enum('Y','N') DEFAULT 'Y',
  `currency_main` enum('Y','N') DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ras_currencies`
--

INSERT INTO `ras_currencies` (`currency_id`, `currency_title`, `currency_name`, `currency_course`, `currency_active`, `currency_main`) VALUES
(1, 'руб', 'RUB', '1.00000000', 'Y', 'Y'),
(2, '$', 'USD', '0.01730000', 'Y', 'N');

-- --------------------------------------------------------

--
-- Структура таблицы `ras_images`
--

CREATE TABLE `ras_images` (
  `image_id` bigint(20) UNSIGNED NOT NULL,
  `image_title` varchar(255) DEFAULT NULL,
  `image_name` varchar(100) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ras_images`
--

INSERT INTO `ras_images` (`image_id`, `image_title`, `image_name`, `image_path`) VALUES
(1, 'Prey', 'Prey.jpg', '/images/'),
(2, 'Far Cry Primal', 'far-cry-primal2.jpg', '/images/'),
(3, 'The Evil Within 2', 'evil-within.jpg', '/images/'),
(4, 'Tom Clancy\'s Ghost Recon: Wildlands', 'ghost.jpg', '/images/'),
(5, 'Assassin’s Creed IV: Black Flag', 'assasin.jpg', '/images/'),
(6, 'Call of Duty: WWII', 'CoD_WW2.jpg', '/images/'),
(7, 'Fallout 4', 'fallout.jpg', '/images/'),
(8, 'Wolfenstein 2', 'wolfenstein-2-trailer.jpg', '/images/'),
(9, 'Metro Last Light: Redux', 'metro.jpg', '/images/'),
(10, 'Battlefield 4', 'battle.jpg', '/images/'),
(11, 'Mortal Kombat X', 'mk.jpg', '/images/'),
(12, 'Plants vs. Zombies: Garden Warfare', 'PvZ.jpg', '/images/'),
(13, 'Batman: Arkham Origins', 'bat.jpg', '/images/'),
(14, 'For Honor', 'ForHonor.jpg', '/images/'),
(15, '', 'prey1.jpg', '/images/'),
(16, '', 'prey2.jpg', '/images/'),
(17, '', 'prey3.jpg', '/images/'),
(18, '', 'prey4.jpg', '/images/'),
(19, '', 'prey5.jpg', '/images/'),
(20, '', 'prey6.jpg', '/images/'),
(21, '', 'prey7.jpg', '/images/'),
(22, '', 'prey8.jpg', '/images/'),
(23, NULL, 'prey_prev1-155x87.jpg', '/images/'),
(24, NULL, 'prey_prev2-155x87.jpg', '/images/'),
(25, NULL, 'prey_prev3-155x87.jpg', '/images/'),
(26, NULL, 'prey_prev4-155x87.jpg', '/images/'),
(27, NULL, 'prey_prev5-155x87.jpg', '/images/'),
(28, NULL, 'prey_prev6-155x87.jpg', '/images/'),
(29, NULL, 'prey_prev7-155x87.jpg', '/images/'),
(30, NULL, 'prey_prev8-155x87.jpg', '/images/');

-- --------------------------------------------------------

--
-- Структура таблицы `ras_products`
--

CREATE TABLE `ras_products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_api_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_title` varchar(255) DEFAULT NULL,
  `chpu` varchar(255) DEFAULT NULL,
  `content` longtext,
  `content_activation` longtext,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` varchar(512) DEFAULT NULL,
  `seo_keywords` varchar(255) DEFAULT NULL,
  `product_price` decimal(12,2) DEFAULT NULL,
  `product_discount` decimal(12,2) DEFAULT NULL,
  `product_thumbnail_path` varchar(255) DEFAULT NULL,
  `product_thumbnail_name` varchar(255) DEFAULT NULL,
  `date_create` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_create_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ras_products`
--

INSERT INTO `ras_products` (`product_id`, `product_api_id`, `product_title`, `chpu`, `content`, `content_activation`, `seo_title`, `seo_description`, `seo_keywords`, `product_price`, `product_discount`, `product_thumbnail_path`, `product_thumbnail_name`, `date_create`, `date_create_gmt`, `date_modified`, `date_modified_gmt`) VALUES
(1, 1, 'Counter-Strike: Global Offensive', 'counter-strike-global-offensive', 'Описание игры Counter-strike', NULL, 'Игра Counter-strike: Global Offensive', 'Это игра Counter-strike: Global Offensive', 'Игра, Counter-strike, Global Offensive', '32.30', '20.00', NULL, NULL, '2017-08-12 09:00:00', '2017-08-12 12:00:00', '2017-08-12 09:00:00', '2017-08-12 12:00:00'),
(2, 2, 'Ведьмак 3', 'vedmak-3', 'Описание игры Ведьмак 3', NULL, 'Игра Ведьмак 3', 'Это игра Ведьмак 3', 'Игра, Ведьмак 3', '24.42', NULL, NULL, NULL, '2017-08-12 09:30:00', '2017-08-12 12:30:00', '2017-08-12 09:30:00', '2017-08-12 12:30:00'),
(3, 3, 'GTA 5', 'gta-5', 'Описание игры GTA 5', NULL, 'Игра GTA 5', 'Это игра GTA 5', 'Игра, GTA 5', '32.40', NULL, 'images/thumbnails', 'GTA5.png', '2017-08-12 09:00:00', '2017-08-12 12:00:00', '2017-08-12 09:00:00', '2017-08-12 12:00:00'),
(4, 4, 'Starcraft 2', 'starcraft-2', 'Описание игры Starcraft 2', NULL, 'Игра Starcraft 2', 'Это игра Starcraft 2', 'Игра, Starcraft 2', '1.45', NULL, NULL, NULL, '2017-08-12 09:30:00', '2017-08-12 12:30:00', '2017-08-12 09:30:00', '2017-08-12 12:30:00'),
(5, 5, 'Fallout 4', 'fallout 4', 'Описание игры Fallout 4', NULL, 'Игра Fallout 4', 'Это игра Fallout 4', 'Игра, Fallout 4', '52.40', NULL, NULL, NULL, '2017-08-12 09:00:00', '2017-08-12 12:00:00', '2017-08-12 09:00:00', '2017-08-12 12:00:00'),
(6, 6, 'Total War: WARHAMMER II', 'total-war-warhammer-ii', 'Описание игры Total War: WARHAMMER II', NULL, 'Игра Total War: WARHAMMER II', 'Это игра Total War: WARHAMMER II', 'Игра, Total War, WARHAMMER II', '200.30', '59.50', NULL, NULL, '2017-08-12 09:30:00', '2017-08-12 12:30:00', '2017-08-12 09:30:00', '2017-08-12 12:30:00'),
(7, 7, 'Mortal Kombat X', 'mortal-kombat-x', 'Описание игры Mortal Kombat X', NULL, 'Игра Mortal Kombat X', 'Это игра Mortal Kombat X', 'Игра, Mortal Kombat X', NULL, NULL, NULL, NULL, '2017-08-12 09:00:00', '2017-08-12 12:00:00', '2017-08-12 09:00:00', '2017-08-12 12:00:00'),
(8, 8, 'The Evil Within 2', 'the-evil-within 2', 'Описание игры The Evil Within 2', NULL, 'Игра The Evil Within 2', 'Это игра The Evil Within 2', 'Игра, The Evil Within 2', '1599.00', '20.00', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 9, 'Prey', 'prey', '<p>Действие Prey происходит в 2032 году. Вы обнаруживаете себя на лунной орбите, на борту\r\n								космической станции «Талос-1». Эксперимент, в котором вы участвовали, должен был\r\n								навсегда изменить человеческую расу, но привел к катастрофическим последствиям. Станцию\r\n								захватили враждебные пришельцы, которые теперь ведут на вас охоту. Раскрывая мрачные\r\n								тайны «Талоса» и собственного прошлого, вам предстоит выживать, полагаясь на подручные\r\n								средства, собственную смекалку, оружие и сверхспособности. Судьба «Талоса-1» и всех, кто\r\n								находится на борту, — в ваших руках.</p>', '<ul class=\"instuction\">\r\n									<li>Получите оплаченный ключ активации в личном кабинете.</li>\r\n\r\n									<li>Если не установлен Steam клиент, Вам необходимо скачать его с официального\r\n										сайта (<a href=\"http://store.steampowered.com/about/\" target=\"_blank\">http://store.steampowered.com/about/</a>)\r\n										и установить.\r\n									</li>\r\n\r\n									<li>Войдите в свой фккаунт Steam (если он у Вас уже есть), либо создайте новую\r\n										учетную запись\r\n									</li>\r\n\r\n									<li>В меню «Игры» выбирайте пункт «Активировать через Steam». В открывшееся окошке\r\n										вводите полученный код.\r\n									</li>\r\n\r\n									<li>После активации ключа, игра отобразится в библиотеке Steam и вы сможете её\r\n										скачать.\r\n									</li>\r\n								</ul>', 'Игра Prey', 'Это игра Prey', 'Игра, Prey', '1199.00', '30.00', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 10, 'Far Cry Primal', 'far-cry-primal', 'Описание игры Far Cry Primal', NULL, 'Игра Far Cry Primal', 'Это игра Far Cry Primal', 'Игра, Far Cry Primal', '1199.00', '40.00', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 11, 'Tom Clancy\'s Ghost Recon: Wildlands', 'ghost-recon-wildlands', 'Описание игры Tom Clancy\'s Ghost Recon: Wildlands', NULL, 'Игра Tom Clancy\'s Ghost Recon: Wildlands', 'Это игра Tom Clancy\'s Ghost Recon: Wildlands', 'Игра, Ghost Recon, Wildlands', '1199.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 12, 'Assassin’s Creed IV: Black Flag', 'assassins-creed-4-black-flag', 'Описание игры Assassin’s Creed IV: Black Flag', NULL, 'Игра Assassin’s Creed IV: Black Flag', 'Это игра Assassin’s Creed IV: Black Flag', 'Игра, Assassin’s Creed IV, Black Flag', '1599.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 13, 'Call of Duty: WWII', 'call-of-duty-wwii', 'Описание игры Call of Duty: WWII', NULL, 'Игра Call of Duty: WWII', 'Это игра Call of Duty: WWII', 'Игра, Call of Duty: WWII', '999.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 14, 'Wolfenstein 2', 'wolfenstein-2', 'Описание игры Wolfenstein 2', NULL, 'Игра Wolfenstein 2', 'Это игра Wolfenstein 2', 'Игра, Wolfenstein 2', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 15, 'Metro Last Light: Redux', 'metro-last-light-redux', 'Описание игры Metro Last Light: Redux', NULL, 'Игра Metro Last Light: Redux', 'Это игра Metro Last Light: Redux', 'Игра, Metro Last Light: Redux', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 16, 'Battlefield 4', 'battlefield-4', 'Описание игры Battlefield 4', NULL, 'Игра Battlefield 4', 'Это игра Battlefield 4', 'Игра, Battlefield 4', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 17, 'Plants vs. Zombies: Garden Warfare', 'plants-vs-zombies-garden-warfare', 'Описание игры Plants vs. Zombies: Garden Warfare', NULL, 'Игра Plants vs. Zombies: Garden Warfare', 'Это игра Plants vs. Zombies: Garden Warfare', 'Игра, Plants vs. Zombies: Garden Warfare', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 18, 'Batman: Arkham Origins', 'batman-arkham-origins', 'Описание игры Batman: Arkham Origins', NULL, 'Игра Batman: Arkham Origins', 'Это игра Batman: Arkham Origins', 'Игра, Batman: Arkham Origins', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 19, 'For Honor', 'for-honor', 'Описание игры For Honor', NULL, 'Игра For Honor', 'Это игра For Honor', 'Игра, For Honor', '1999.00', '10.00', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `ras_products_images`
--

CREATE TABLE `ras_products_images` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image_id` bigint(20) UNSIGNED NOT NULL,
  `type_image` enum('MAIN','SECONDARY','BIG_SCREENSHOT','SMALL_SCREENSHOT') DEFAULT 'SECONDARY',
  `image_big_small` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ras_products_images`
--

INSERT INTO `ras_products_images` (`product_id`, `image_id`, `type_image`, `image_big_small`) VALUES
(5, 7, 'MAIN', NULL),
(7, 11, 'MAIN', NULL),
(8, 3, 'MAIN', NULL),
(9, 1, 'MAIN', NULL),
(9, 15, 'BIG_SCREENSHOT', 1),
(9, 16, 'BIG_SCREENSHOT', 2),
(9, 17, 'BIG_SCREENSHOT', 3),
(9, 18, 'BIG_SCREENSHOT', 4),
(9, 19, 'BIG_SCREENSHOT', 5),
(9, 20, 'BIG_SCREENSHOT', 6),
(9, 21, 'BIG_SCREENSHOT', 7),
(9, 22, 'BIG_SCREENSHOT', 8),
(9, 23, 'SMALL_SCREENSHOT', 1),
(9, 24, 'SMALL_SCREENSHOT', 2),
(9, 25, 'SMALL_SCREENSHOT', 3),
(9, 26, 'SMALL_SCREENSHOT', 4),
(9, 27, 'SMALL_SCREENSHOT', 5),
(9, 28, 'SMALL_SCREENSHOT', 6),
(9, 29, 'SMALL_SCREENSHOT', 7),
(9, 30, 'SMALL_SCREENSHOT', 8),
(10, 2, 'MAIN', NULL),
(11, 4, 'MAIN', NULL),
(12, 5, 'MAIN', NULL),
(13, 6, 'MAIN', NULL),
(14, 8, 'MAIN', NULL),
(15, 9, 'MAIN', NULL),
(16, 10, 'MAIN', NULL),
(17, 12, 'MAIN', NULL),
(18, 13, 'MAIN', NULL),
(19, 14, 'MAIN', NULL);

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
  `value_date` datetime DEFAULT NULL,
  `value_ext_html` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ras_products_properties`
--

INSERT INTO `ras_products_properties` (`product_id`, `property_id`, `value_str`, `value_int`, `value_dec`, `value_flt`, `value_date`, `value_ext_html`) VALUES
(1, 1, 'Windows Vista', NULL, NULL, NULL, NULL, NULL),
(1, 6, NULL, NULL, NULL, NULL, '2012-08-21 00:00:00', NULL),
(1, 7, 'Шутеры', NULL, NULL, NULL, NULL, NULL),
(2, 1, 'Windows 7', NULL, NULL, NULL, NULL, NULL),
(2, 6, NULL, NULL, NULL, NULL, '2015-05-19 00:00:00', NULL),
(2, 7, 'Ролевые игры', NULL, NULL, NULL, NULL, NULL),
(3, 7, 'Экшен', NULL, NULL, NULL, NULL, NULL),
(9, 9, 'Steam', NULL, NULL, NULL, NULL, '<img src=\'/rest_api_shop/images/steamlogo.png\' id=\'logo_brand\'> '),
(7, 7, 'Файтинги', NULL, NULL, NULL, NULL, NULL),
(5, 6, NULL, NULL, NULL, NULL, '2015-11-10 00:00:00', NULL),
(4, 8, 'В реальном времени', NULL, NULL, NULL, NULL, NULL),
(2, 8, 'Магия', NULL, NULL, NULL, NULL, NULL),
(4, 7, 'Стратегии', NULL, NULL, NULL, NULL, NULL),
(1, 1, 'Windows 7', NULL, NULL, NULL, NULL, NULL),
(1, 1, 'Windows 8', NULL, NULL, NULL, NULL, NULL),
(2, 1, 'Windows 7', NULL, NULL, NULL, NULL, NULL),
(4, 6, NULL, NULL, NULL, NULL, '2010-07-27 00:00:00', NULL),
(9, 1, 'Windows 7', NULL, NULL, NULL, NULL, NULL),
(9, 1, 'Windows 8', NULL, NULL, NULL, NULL, NULL),
(9, 1, 'Windows 10', NULL, NULL, NULL, NULL, NULL),
(9, 2, 'Intel i5-2400', NULL, NULL, NULL, NULL, NULL),
(9, 2, 'AMD FX-8320', NULL, NULL, NULL, NULL, NULL),
(9, 3, 'GTX 660 2GB', NULL, NULL, NULL, NULL, NULL),
(9, 3, 'AMD Radeon 7850 2 GB', NULL, NULL, NULL, NULL, NULL),
(9, 4, '8 GB ОЗУ', NULL, NULL, NULL, NULL, NULL),
(9, 5, '20 ГБ', NULL, NULL, NULL, NULL, NULL),
(9, 7, 'Экшен', NULL, NULL, NULL, NULL, NULL),
(9, 7, 'Приключения', NULL, NULL, NULL, NULL, NULL),
(9, 10, 'Русский', NULL, NULL, NULL, NULL, NULL),
(9, 6, NULL, NULL, NULL, NULL, '2017-05-05 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `ras_properties`
--

CREATE TABLE `ras_properties` (
  `property_id` int(11) UNSIGNED NOT NULL,
  `property_title` varchar(255) DEFAULT NULL,
  `property_name` varchar(255) DEFAULT NULL,
  `type` enum('INTEGER','DECIMAL','FLOAT','TEXT','DATE') NOT NULL DEFAULT 'INTEGER',
  `filter` enum('SELECT','MULTISELECT','LIST','RANGE') NOT NULL DEFAULT 'SELECT',
  `sort` enum('Y','N') NOT NULL DEFAULT 'N',
  `active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `show_index` enum('Y','N') DEFAULT 'N',
  `show_view` enum('Y','N') NOT NULL DEFAULT 'N',
  `technical_requirements` enum('Y','N') DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ras_properties`
--

INSERT INTO `ras_properties` (`property_id`, `property_title`, `property_name`, `type`, `filter`, `sort`, `active`, `show_index`, `show_view`, `technical_requirements`) VALUES
(1, 'Операционная система', 'operacionnaya-sistema', 'TEXT', 'SELECT', 'N', 'Y', 'Y', 'Y', 'Y'),
(2, 'Процессор', 'processor', 'TEXT', 'SELECT', 'N', 'Y', 'N', 'Y', 'Y'),
(3, 'Видеокарта', 'videokarta', 'TEXT', 'SELECT', 'N', 'Y', 'N', 'Y', 'Y'),
(4, 'Оперативная память', 'operativnaya-pamyat', 'TEXT', 'SELECT', 'N', 'Y', 'N', 'Y', 'Y'),
(5, 'Жесткий диск', 'jestkiy-disk', 'TEXT', 'SELECT', 'N', 'Y', 'N', 'Y', 'Y'),
(6, 'Дата выхода', 'data-vyhoda', 'DATE', 'RANGE', 'Y', 'Y', 'Y', 'Y', 'N'),
(7, 'Жанр', 'genre', 'TEXT', 'MULTISELECT', 'N', 'Y', 'Y', 'Y', 'N'),
(8, 'Тег', 'tag', 'TEXT', 'LIST', 'N', 'Y', 'Y', 'Y', 'N'),
(9, 'Активация', 'activation', 'TEXT', 'SELECT', 'N', 'Y', 'Y', 'Y', 'N'),
(10, 'Язык', 'language', 'TEXT', 'SELECT', 'N', 'Y', 'N', 'Y', 'N');

-- --------------------------------------------------------

--
-- Структура таблицы `ras_settings`
--

CREATE TABLE `ras_settings` (
  `setting_id` int(11) UNSIGNED NOT NULL,
  `setting_title` varchar(255) DEFAULT NULL,
  `setting_name` varchar(255) NOT NULL,
  `setting_value` varchar(255) NOT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ras_settings`
--

INSERT INTO `ras_settings` (`setting_id`, `setting_title`, `setting_name`, `setting_value`, `active`) VALUES
(1, 'Игры в слайдере на главной странице', 'MainSliderGames', '8,9,10', 'Y'),
(2, 'Игры в баннере на главной странице', 'MainBannerGames', '12,11,13,5,14,15,16,7,17,18,19', 'Y'),
(3, 'Игры для предзаказа на главной странице', 'MainPreOrderGames', '8,3', 'Y');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `ras_currencies`
--
ALTER TABLE `ras_currencies`
  ADD PRIMARY KEY (`currency_id`);

--
-- Индексы таблицы `ras_images`
--
ALTER TABLE `ras_images`
  ADD PRIMARY KEY (`image_id`),
  ADD UNIQUE KEY `image_id` (`image_id`),
  ADD UNIQUE KEY `image_name_path_index` (`image_id`,`image_name`,`image_path`),
  ADD KEY `name` (`image_name`),
  ADD KEY `path` (`image_path`),
  ADD KEY `title` (`image_title`);

--
-- Индексы таблицы `ras_products`
--
ALTER TABLE `ras_products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_id` (`product_id`),
  ADD KEY `product_api_id` (`product_api_id`),
  ADD KEY `chpu` (`chpu`),
  ADD KEY `date_create` (`date_create`),
  ADD KEY `date_create_gmt` (`date_create_gmt`),
  ADD KEY `date_modified` (`date_modified`),
  ADD KEY `date_modified_gmt` (`date_modified_gmt`),
  ADD KEY `product_title` (`product_title`) USING BTREE,
  ADD KEY `product_thumbnail_name` (`product_thumbnail_name`) USING BTREE,
  ADD KEY `product_thumbnail_path` (`product_thumbnail_path`) USING BTREE,
  ADD KEY `product_discount` (`product_discount`) USING BTREE;

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
  ADD UNIQUE KEY `property_name_index` (`property_id`,`property_title`),
  ADD KEY `active` (`active`),
  ADD KEY `type` (`type`),
  ADD KEY `show_index` (`show_index`),
  ADD KEY `filter` (`filter`),
  ADD KEY `sort` (`sort`),
  ADD KEY `property_title` (`property_title`) USING BTREE;

--
-- Индексы таблицы `ras_settings`
--
ALTER TABLE `ras_settings`
  ADD PRIMARY KEY (`setting_id`),
  ADD UNIQUE KEY `setting_name_index` (`setting_id`,`setting_name`),
  ADD KEY `setting_name` (`setting_name`) USING BTREE,
  ADD KEY `setting_value` (`setting_value`) USING BTREE,
  ADD KEY `active` (`active`) USING BTREE,
  ADD KEY `setting_title` (`setting_title`) USING BTREE;

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `ras_currencies`
--
ALTER TABLE `ras_currencies`
  MODIFY `currency_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `ras_images`
--
ALTER TABLE `ras_images`
  MODIFY `image_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT для таблицы `ras_products`
--
ALTER TABLE `ras_products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT для таблицы `ras_properties`
--
ALTER TABLE `ras_properties`
  MODIFY `property_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `ras_settings`
--
ALTER TABLE `ras_settings`
  MODIFY `setting_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
