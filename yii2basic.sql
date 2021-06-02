-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 19 2019 г., 13:06
-- Версия сервера: 5.5.50-log
-- Версия PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii2basic`
--

-- --------------------------------------------------------

--
-- Структура таблицы `wfm_categories`
--

CREATE TABLE IF NOT EXISTS `wfm_categories` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `wfm_categories`
--

INSERT INTO `wfm_categories` (`id`, `title`) VALUES
(1, 'Apple'),
(2, 'Asus'),
(3, 'Nokia'),
(4, 'Samsung'),
(5, 'Sony');

-- --------------------------------------------------------

--
-- Структура таблицы `wfm_products`
--

CREATE TABLE IF NOT EXISTS `wfm_products` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `price` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `wfm_products`
--

INSERT INTO `wfm_products` (`id`, `title`, `category_id`, `price`) VALUES
(1, 'Apple iPhone XS Max 64GB (Silver) Dual SIM', 1, 1100),
(2, 'iPhone 7 Plus 128Gb Black', 1, 600),
(3, 'Apple iPhone SE 32gb Gold Neverlock', 1, 400),
(4, 'Мобильный телефон Asus ZenFone Live 2GB/32GB (ZB501KL-4A053A) DualSim Navy Black', 2, 120),
(5, 'Мобильный телефон Nokia 3.1 Plus Dual Sim 3/32GB TA-1104 Baltic', 3, 150),
(6, 'Мобильный телефон Nokia 7 Plus Dual Sim Black', 3, 280),
(7, 'Мобильный телефон Samsung Galaxy S10 8/128 GB Black (SM-G973FZKDSEK)', 4, 1000),
(8, 'Мобильный телефон Samsung Galaxy A30 4/64GB Blue (SM-A305FZBOSEK)', 4, 220),
(9, 'Мобильный телефон Samsung Galaxy S9 Plus 64GB Titanium Gray', 4, 800),
(10, 'Мобильный телефон Samsung Galaxy Note 9 6/128GB Midnight Black', 4, 850);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `wfm_categories`
--
ALTER TABLE `wfm_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `wfm_products`
--
ALTER TABLE `wfm_products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `wfm_categories`
--
ALTER TABLE `wfm_categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `wfm_products`
--
ALTER TABLE `wfm_products`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
