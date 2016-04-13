-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Апр 13 2016 г., 19:55
-- Версия сервера: 5.5.47-0ubuntu0.14.04.1
-- Версия PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `obj_object`
--

CREATE TABLE IF NOT EXISTS `obj_object` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `towns_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `i_t_id` (`towns_id`),
  KEY `i_type_id` (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `obj_object`
--

INSERT INTO `obj_object` (`id`, `name`, `towns_id`, `type_id`) VALUES
(1, 'Макдональдс', 1, 1),
(3, 'Библиотека имени Ленина', 1, 3),
(4, 'Веб студия', 1, 1),
(5, 'Молочная ферма', 2, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `obj_towns`
--

CREATE TABLE IF NOT EXISTS `obj_towns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `obj_towns`
--

INSERT INTO `obj_towns` (`id`, `name`) VALUES
(1, 'Москва'),
(2, 'Барнаул');

-- --------------------------------------------------------

--
-- Структура таблицы `obj_type`
--

CREATE TABLE IF NOT EXISTS `obj_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `i_type_i` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `obj_type`
--

INSERT INTO `obj_type` (`id`, `name`, `parent_id`) VALUES
(1, 'Ресторан', NULL),
(2, 'Общественная организация', NULL),
(3, 'Библиотека', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `obj_type_prorerty`
--

CREATE TABLE IF NOT EXISTS `obj_type_prorerty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `towns_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `i_type` (`type_id`),
  KEY `i_town` (`towns_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `obj_type_prorerty`
--

INSERT INTO `obj_type_prorerty` (`id`, `name`, `towns_id`, `type_id`) VALUES
(1, 'Зал для некурящих', 1, 1),
(2, 'Парковка', 1, 1),
(3, 'Чтение только в зале', 1, 3);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `obj_object`
--
ALTER TABLE `obj_object`
  ADD CONSTRAINT `obj_object_ibfk_2` FOREIGN KEY (`towns_id`) REFERENCES `obj_towns` (`id`),
  ADD CONSTRAINT `obj_object_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `obj_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `obj_type`
--
ALTER TABLE `obj_type`
  ADD CONSTRAINT `obj_type_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `obj_type` (`id`);

--
-- Ограничения внешнего ключа таблицы `obj_type_prorerty`
--
ALTER TABLE `obj_type_prorerty`
  ADD CONSTRAINT `obj_type_prorerty_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `obj_type` (`id`),
  ADD CONSTRAINT `obj_type_prorerty_ibfk_1` FOREIGN KEY (`towns_id`) REFERENCES `obj_towns` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
