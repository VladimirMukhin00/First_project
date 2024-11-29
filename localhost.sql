-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Ноя 29 2024 г., 01:51
-- Версия сервера: 8.0.39
-- Версия PHP: 8.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dinamic-site`
--
CREATE DATABASE IF NOT EXISTS `dinamic-site` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dinamic-site`;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `admin` tinyint NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `admin`, `username`, `email`, `password`, `created`) VALUES
(1, 0, 'tvbtvtt', 'tvbtttt', 'tvtttttttoooo', '2024-11-26 15:35:25'),
(4, 1, '44', 'for@gmail.com', '12345', '2024-11-27 12:17:12'),
(7, 0, '123673486646', 'r@hjyyre.ru', '1234324343fhur686uyfh', '2020-12-31 14:00:01'),
(13, 0, 'dfdhyhefrf', 'efefyhyeff@frfrr', '$2y$10$xrTjS7fcz9NtNjUUxf4osOaWmsgkJT1r5m2SMSnB1J8x50gqlpmAW', '2024-11-27 14:36:26'),
(14, 0, 'vladimirzed', 'vlad@fnurjfhru', '$2y$10$UQwqbkBfvGfzYXtp5HJRcuW9bdEPtqokOxj95RrmTVKlIa4y0XIVW', '2024-11-27 14:40:56'),
(16, 0, 'vladimirzed00', 'vlad@fnurj00fhru', '$2y$10$h1765j2zWC/PQjKUHpfhQetztiK2smd2qABs6cjxhWATJkQkjr2Ai', '2024-11-27 14:44:36'),
(19, 0, 'vladimirzed000', 'vlad@fnurj000fhru', '$2y$10$YNtrnPWS3tOx3fzwyK9LZOwDhgqMuff8rovrKldwlBxzDdb9H.y.G', '2024-11-27 14:45:46'),
(20, 0, 'Muchin', 'muchin@ndedede', '$2y$10$04997EswVPd9WHelU9TB8e8JuYLfeYcKshpzCaBoVV1OpA0Om6HIS', '2024-11-27 14:49:12'),
(22, 0, 'btgbtbt', 'tbttb@vfvf', '$2y$10$/PzZPFFrJQRqiP/sRp.YMO97wuev4J1gYubEJyRFIUlGV1gqNd2R2', '2024-11-27 15:04:28'),
(23, 0, 'vladimimuchin00', 'ghghygbygyy@jijijijijijijiii', '$2y$10$E5Go7VV3kDWye83uIUV8Xu8AHLLamiPzTCWLNcHMjml2AIsQH7xe6', '2024-11-28 23:47:00'),
(24, 0, 'vladimimukhin898989898898', 'ghuhuuhuhuhuhuhuhu@jkjkjkjkjkjkjjkjj', '$2y$10$yuNy6L/RPRIpL3mUSLUXSe/kz3X7hpnqVl/o3h2DsVvU5aZLox7ie', '2024-11-28 23:50:23'),
(25, 0, 'vladimirmukhin898988777', 'dfdfdfdfdfdfdfdfdf@bnbnbnbnbnbnbb', '$2y$10$bvM5tqg0mn0l4DtUIccGcOQggYYDjLH3/zqX6IJDmn.4vIEzm2qsa', '2024-11-28 23:56:46');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
