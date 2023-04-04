-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 04 2023 г., 18:45
-- Версия сервера: 8.0.30
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii2_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `parent_id` int DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `parent_id`, `name`, `keywords`, `description`) VALUES
(1, NULL, 'Sportswear', NULL, NULL),
(2, NULL, 'Mens', NULL, NULL),
(3, NULL, 'Womens', NULL, NULL),
(4, NULL, 'Kids', NULL, NULL),
(5, 1, 'Nike', NULL, NULL),
(6, 1, 'Under Armour', NULL, NULL),
(7, 1, 'Adidas', NULL, NULL),
(8, 1, 'Puma', NULL, NULL),
(9, 1, 'Asics', NULL, NULL),
(10, 2, 'Fendi', NULL, NULL),
(11, 2, 'Guess', NULL, NULL),
(12, 2, 'Valentino', NULL, NULL),
(13, 2, 'Dior', NULL, NULL),
(14, 2, 'Versace', NULL, NULL),
(15, 2, 'Armani', NULL, NULL),
(16, 2, 'Prada', NULL, NULL),
(17, 2, 'Dolce and Gabbana', NULL, NULL),
(18, 2, 'Chanel', NULL, NULL),
(23, 2, 'Gucci', NULL, NULL),
(24, 3, 'Fendi', NULL, NULL),
(25, 3, 'Guess', NULL, NULL),
(26, 3, 'Valentino', NULL, NULL),
(27, 3, 'Dior', NULL, NULL),
(28, 3, 'Versace', NULL, NULL),
(29, 3, 'Armani', NULL, NULL),
(30, 3, 'Prada', NULL, NULL),
(31, 3, 'Dolce and Gabbana', NULL, NULL),
(32, 3, 'Chanel', NULL, NULL),
(33, 3, 'Gucci', NULL, NULL),
(39, NULL, 'Fashion', NULL, NULL),
(40, NULL, 'Households', NULL, NULL),
(41, NULL, 'Interiors', NULL, NULL),
(42, NULL, 'Clothing', NULL, NULL),
(43, NULL, 'Bags', NULL, NULL),
(44, NULL, 'Shoes', NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-category-parent_id` (`parent_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `fk-category-parent_id` FOREIGN KEY (`parent_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
