-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 06 2015 г., 00:24
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `timerbase`
--

-- --------------------------------------------------------

--
-- Структура таблицы `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `username` varchar(16) NOT NULL,
  `GameName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `games`
--

INSERT INTO `games` (`username`, `GameName`) VALUES
('adm', '3X3'),
('adm', 'Пазлы'),
('adm2', '3x3'),
('adm2', 'Пирамида'),
('adm2', 'Игра1'),
('adm2', 'Игра2');

-- --------------------------------------------------------

--
-- Структура таблицы `results`
--

CREATE TABLE IF NOT EXISTS `results` (
  `GameName` varchar(50) NOT NULL,
  `username` varchar(16) NOT NULL,
  `result` varchar(8) NOT NULL,
  `data` date NOT NULL,
  `ResToFloat` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `results`
--

INSERT INTO `results` (`GameName`, `username`, `result`, `data`, `ResToFloat`) VALUES
('1', '2', '00:50:37', '2015-05-14', 50);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(16) NOT NULL,
  `passwd` char(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`username`, `passwd`, `email`) VALUES
('adm', '*50828F76185B29CDB820881262BB160006CBAC6', 'ilyasin060495@gmail.com'),
('adm1', '*5E8870230DEAABEBF48AA4E359D409A92296295', 'rrr@ttt.ru'),
('adm2', 'fba9f1c9ae2a8afe7815c9cdd492512622a66302', 'adm@mail.ru'),
('sasha', '747417f2206148a3118d02f3adf20b5e4139baac', 'ilyasin060495@gmail.com22'),
('usr', 'b7c40b9c66bc88d38a59e554c639d743e77f1b65', '1@mail.com'),
('va', '20eabe5d64b0e216796e834f52d61fd0b70332fc', '222@ddd.ru'),
('vasya', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'pochta@mail.ru');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
