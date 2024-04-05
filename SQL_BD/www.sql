-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 05 2024 г., 08:24
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `www`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `rule` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `userlastname` varchar(32) NOT NULL,
  `birthday` date NOT NULL,
  `userlogin` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `class` varchar(32) NOT NULL,
  `teacher` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `rule`, `username`, `userlastname`, `birthday`, `userlogin`, `password`, `email`, `class`, `teacher`) VALUES
(6, 'Студент', 'Антон', 'Антонов', '1999-05-23', 'login', 'password', 'dfakhiev@yandex.ru', '9Б', NULL),
(7, 'Педагог', 'Кирилл', 'Кириллов', '1963-01-23', 'teacher', 'password', 'dfakhiev@yandex.ru', '9Б', NULL),
(8, 'Студент', 'Афоний', 'Алекберов', '2001-02-12', 'login2', 'password', 'dfakhiev@yandex.ru', '9Б', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
