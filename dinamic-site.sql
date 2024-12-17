-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Дек 17 2024 г., 23:52
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

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(121) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(2, 'vladimir12', '123yhyhyhh'),
(4, 'tgtfgrgrgrrrggr11', 'tgtgtgt'),
(5, 'errr', 'ereerer34ee');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint NOT NULL,
  `id_category` int DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `id_user`, `title`, `img`, `content`, `status`, `id_category`, `created_date`) VALUES
(1, 50, 'Бесконечность не пределjuyju', '', '<p>амамкемкккмкмjuju</p>', 1, 5, '2024-12-16 20:41:59'),
(2, 50, 'mujmumm', '0saLf9vVE4o.jpeg', '<p>mmmum</p>', 1, 4, '2024-12-16 20:44:46'),
(3, 50, 'mmumuimu', '0saLf9vVE4o.jpeg', '<p>umumuuum</p>', 1, 2, '2024-12-16 22:00:50'),
(4, 50, 'jujuijuj', '0XH8b_Jtie4.jpg', '<p>ujujujuju</p>', 0, 5, '2024-12-16 22:01:06'),
(5, 50, 'yhyhyhyhy', '_mmydDVce5c.jpg', '<p>yhyhyhyhyh</p>', 1, 4, '2024-12-16 22:41:26'),
(6, 50, 'huujuju', '_mmydDVce5c.jpg', '<p>ujujujujuju</p>', 1, 2, '2024-12-16 22:41:43'),
(7, 50, 'thgtyghttg', '_mmydDVce5c.jpg', '<p>tgttttt</p>', 1, 4, '2024-12-16 23:21:20'),
(8, 50, 'hnnitni6yjnijnotjnon', '-2mVdUML2dM.jpg', '<p>tntnmknjmnionjyojnyon</p>', 1, 4, '2024-12-16 23:21:40'),
(9, 50, 'hyyhyhy', '0saLf9vVE4o.jpeg', '<p>hyhyhyhyhyh</p>', 1, 2, '2024-12-16 23:48:28'),
(10, 50, 'рнрнрн', '1734357137_0saLf9vVE4o.jpeg', '<p>рнрнрнрнрнрннр</p>', 1, 2, '2024-12-16 23:52:17'),
(11, 50, 'tgttg', '1734357802_0XH8b_Jtie4.jpg', '<p>gtgtgtgtg</p>', 1, 4, '2024-12-17 00:03:22'),
(12, 50, 'jjjjjjjj', '', '<p>jjjjjjj</p>', 1, 5, '2024-12-17 22:28:42'),
(13, 50, 'ujuuujujuuj', '', '<p>ujuujuujjuu</p>', 1, 4, '2024-12-17 23:12:18'),
(14, 50, 'yhyhyhyyh', '1734442029_0saLf9vVE4o.jpeg', '<p>yhyhyhyhyy</p>', 1, 4, '2024-12-17 23:27:09'),
(15, 50, 'gggggggggggggggggggggggggggggg', '1734442192_0XH8b_Jtie4.jpg', '<p>gggggggggggggggggggggggggggggggg</p>', 1, 5, '2024-12-17 23:29:52');

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
(4, 0, '44', 'for@gmail.com', '12345', '2024-11-27 12:17:12'),
(7, 0, '123673486646', 'r@hjyyre.ru', '1234324343fhur686uyfh', '2020-12-31 14:00:01'),
(13, 0, 'dfdhyhefrf', 'efefyhyeff@frfrr', '$2y$10$xrTjS7fcz9NtNjUUxf4osOaWmsgkJT1r5m2SMSnB1J8x50gqlpmAW', '2024-11-27 14:36:26'),
(14, 0, 'vladimirzed', 'vlad@fnurjfhru', '$2y$10$UQwqbkBfvGfzYXtp5HJRcuW9bdEPtqokOxj95RrmTVKlIa4y0XIVW', '2024-11-27 14:40:56'),
(16, 0, 'vladimirzed00', 'vlad@fnurj00fhru', '$2y$10$h1765j2zWC/PQjKUHpfhQetztiK2smd2qABs6cjxhWATJkQkjr2Ai', '2024-11-27 14:44:36'),
(19, 0, 'vladimirzed000', 'vlad@fnurj000fhru', '$2y$10$YNtrnPWS3tOx3fzwyK9LZOwDhgqMuff8rovrKldwlBxzDdb9H.y.G', '2024-11-27 14:45:46'),
(20, 0, 'Muchin', 'muchin@ndedede', '$2y$10$04997EswVPd9WHelU9TB8e8JuYLfeYcKshpzCaBoVV1OpA0Om6HIS', '2024-11-27 14:49:12'),
(22, 0, 'btgbtbt', 'tbttb@vfvf', '$2y$10$/PzZPFFrJQRqiP/sRp.YMO97wuev4J1gYubEJyRFIUlGV1gqNd2R2', '2024-11-27 15:04:28'),
(23, 0, 'vladimimuchin00', 'ghghygbygyy@jijijijijijijiii', '$2y$10$E5Go7VV3kDWye83uIUV8Xu8AHLLamiPzTCWLNcHMjml2AIsQH7xe6', '2024-11-28 23:47:00'),
(24, 0, 'vladimimukhin898989898898', 'ghuhuuhuhuhuhuhuhu@jkjkjkjkjkjkjjkjj', '$2y$10$yuNy6L/RPRIpL3mUSLUXSe/kz3X7hpnqVl/o3h2DsVvU5aZLox7ie', '2024-11-28 23:50:23'),
(25, 0, 'vladimirmukhin898988777', 'dfdfdfdfdfdfdfdfdf@bnbnbnbnbnbnbb', '$2y$10$bvM5tqg0mn0l4DtUIccGcOQggYYDjLH3/zqX6IJDmn.4vIEzm2qsa', '2024-11-28 23:56:46'),
(26, 0, 'tgtgt', 'tgtgt@ggt', '$2y$10$KB11emKMfs1aKO2.gco7xOnY.Lh6Yg.xOHqK7zAwi9zXjoo5sLj9i', '2024-12-10 13:16:44'),
(29, 0, '6565', '56565@gr', 'rgrgrgr', '2024-12-12 11:55:41'),
(31, 0, 'yhyhyh', 'yhyhyh@tgtgt', 'tgtt', '2024-12-12 12:02:26'),
(33, 0, 'rfrfr', 'frfr@fvttrv', 'tgtgt', '2024-12-12 12:03:06'),
(35, 0, 'tgtgtt', 'tgtfgtg@rfrfr', 'rfrrrfr', '2024-12-12 23:29:08'),
(36, 0, 'rfhrffhyrfuhfurehfuyr', 'frfrrrfr@effrefef', '$2y$10$d9AySfUu2v1MBz9pVf7nC.PMq/ljhMHHsvbdtFhym.tGT5xwkcj/m', '2024-12-12 23:53:47'),
(37, 0, 'tgtgttg', 'vladimir@gmail.com', '$2y$10$oEKYKMQGLDYyyHeoYc3PseNZfL01LsvYZnUAK6UeJ6RC7hvrqaHQq', '2024-12-13 00:08:35'),
(38, 0, 'rfrfrfrf', 'vladimir1@gmail.com', '$2y$10$8igVWhGkygAif7aPGYMfoOX5mDy/IBnL4qoAtKqevehjMtTYLa1mq', '2024-12-13 00:12:04'),
(39, 0, 'rfrfrfrf', 'vladimir2@gmail.com', '$2y$10$UdfL57I9miQ0PaJz1YppyeybTnA0s/FL4NHwFeXpnax4swGPN1zS6', '2024-12-13 00:13:37'),
(40, 0, 'tgtgtttt', 'tgthhtyhytt@gtrgtgtg', '$2y$10$gnMRKR5QPjvuggz9PD8bXuMeP4x74aWVZcndaUwAQ3lMgDCWwESfO', '2024-12-13 00:19:05'),
(41, 0, 'tgtgtt', 'tgtgttg@ukjikiki', '$2y$10$PvMIFJNFdxknQRV8.tsC0.v5oKzDWPBwflJxrbCPoQXwnpmSAPQxK', '2024-12-13 00:35:35'),
(42, 0, '4t54t5t5', 't5t555@JUJUU', '$2y$10$SP8LYu/FpburXrhU2wL9KuSCbRwLMuP5D9jLgBZCdTzdVW4Nektie', '2024-12-13 00:37:36'),
(43, 0, 'tg66g', 'ftg5g5@tgtgt', '$2y$10$CpcSAoyhO80c0JEeAuji0eqGIWGduWXGD3/SSNQ1UOPK0isYoeOWm', '2024-12-13 12:56:53'),
(44, 0, 'tg66g', 'ftg5g5@tgtgtttt', '$2y$10$Lzr0OYVyjeBsHddlaYmIFu1y1X7x02Kr6eRUqkUcOUZutxk9cxsYW', '2024-12-13 12:57:32'),
(45, 0, 'tg66gg', 'ftg5g5@tgtgttttuu', '$2y$10$.pB31gfpnoGVy8GJc/e3Mu6ems6QQdwjT7FYi3azHom.JwlLqFwei', '2024-12-13 13:00:31'),
(46, 0, 'vladimir', 'rcrrrr@dededed', '$2y$10$ezcVvN4ZcgewIGxDqp1H/uxHdSA/ftWWRB8byxiMXGqHfpVjAQ9wy', '2024-12-13 13:04:19'),
(47, 0, 'hbyttyhyt', 'yhyhy@edee', '$2y$10$yy9agFG/EKKoFsLtQkqj/O4u4GxUdkC7UiPek51Nw8JH1oEb/T.Ta', '2024-12-14 07:08:58'),
(48, 0, 'jhujuju', 'uuju@efrefrff', '$2y$10$jmVLvVu.L6hCooDGIAz1t.1D1rEx6Nz/BrPxS//o6Mp/rWGoxBDD6', '2024-12-14 07:10:59'),
(49, 0, 'vladimirzed', 'vladimir@ee', '$2y$10$mXoCIQRyMwLMRyyWcs8BxetTaTPDUF89CyIYcQSEgMWrqxZ18gxYq', '2024-12-14 07:13:00'),
(50, 1, 'VladimirMukhin00', 'vladimir.zed30@gmail.com', '$2y$10$sCoW/YPKhozZogWMO7wBpuVotVbh23k7HL81VisvGUhO8.ic2wVf2', '2024-12-14 08:43:32');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

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
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
