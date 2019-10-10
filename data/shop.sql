-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 26 2019 г., 16:33
-- Версия сервера: 8.0.15
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_session` varchar(60) COLLATE utf8_bin NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `id_session`, `id_product`, `quantity`) VALUES
(421, 'sc022864ovgecog7f8l9t3ul2565h5n0', 294, 1),
(422, 'sc022864ovgecog7f8l9t3ul2565h5n0', 294, 1),
(423, 'sc022864ovgecog7f8l9t3ul2565h5n0', 294, 1),
(424, 'sc022864ovgecog7f8l9t3ul2565h5n0', 294, 1),
(425, 'sc022864ovgecog7f8l9t3ul2565h5n0', 294, 1),
(426, 'sc022864ovgecog7f8l9t3ul2565h5n0', 294, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id_product` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `text` varchar(200) COLLATE utf8_bin NOT NULL,
  `name` varchar(45) COLLATE utf8_bin NOT NULL,
  `date` datetime DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id_product`, `id`, `text`, `name`, `date`, `email`) VALUES
(12, 90, 'ПРИВЕТ', 'admin', '2019-06-24 00:13:24', 'admin@admin'),
(13, 93, 'Отличный магаз!', 'Гость', '2019-06-24 00:14:24', '432@4324324'),
(3, 99, 'comment', 'коммент', '2019-06-24 13:13:24', 'comment@com'),
(3, 100, 'fefsf', 'dgggdfg', '2019-06-24 13:13:24', '432@43243244343242344444444444'),
(11, 101, 'ыыыыыыыыыыыыыыыыыыыыыыыыыыыыыыыыы', 'admin', '2019-06-24 13:15:24', 'admin@admin'),
(13, 103, '4534534', 'dgggdfg', '2019-06-24 13:32:24', '432@43243244343242344444444444'),
(13, 104, '4535435345345', '324233434324444444444', '2019-06-24 13:32:24', '432@43243244343242344444444444'),
(4, 105, 'rwer', 'rwew', '2019-06-30 11:47:30', '432@43243244343242344444444444');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `status` varchar(45) COLLATE utf8_bin NOT NULL DEFAULT 'Не подтверждён',
  `email` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `address` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `phone` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `id_product` varchar(120) COLLATE utf8_bin DEFAULT NULL,
  `id_session` varchar(45) COLLATE utf8_bin NOT NULL,
  `name` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `summ` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `status`, `email`, `address`, `phone`, `id_product`, `id_session`, `name`, `summ`) VALUES
(4, 'Не подтверждён', 'Guest', 'Russia Moscow Tverskaya', '31321', '293;293;293', 'sc022864ovgecog7f8l9t3ul2565h5n0', 'vit', 69),
(5, 'Не подтверждён', 'Guest', '  ', '7686', '293;293;293', 'sc022864ovgecog7f8l9t3ul2565h5n0', '', 69),
(6, 'Не подтверждён', 'admin@admin.com', 'Russia Moscow Tverskaya', '8888888888888', '293;293;293;289;289;290;290;290;293;293', 'sc022864ovgecog7f8l9t3ul2565h5n0', 'vitaliy', 283),
(7, 'Не подтверждён', 'admin@admin.com', '  ', '9999', '293;293;293', 'lufruqgf0q5o1v97mt5leru8r4lh7jlp', '', 69),
(8, 'Не подтверждён', 'admin@admin.com', '  ', '31321', '293;293;293', 'lufruqgf0q5o1v97mt5leru8r4lh7jlp', '', 69),
(9, 'Не подтверждён', 'admin@admin.com', '  ', '898', '293;293;292;292;294', 'lufruqgf0q5o1v97mt5leru8r4lh7jlp', '', 114),
(13, 'Не подтверждён', 'admin@admin.com', '  ', '9', '294', 'lufruqgf0q5o1v97mt5leru8r4lh7jlp', '', 24),
(14, 'Не подтверждён', 'efron.vit@gmail.com', 'Russia Moscow Tverskaya', '8907546777', '294;293;295', 'mqvo0gmr814j6pco3qk61bguheail1u3', 'Скозлепоп', 87),
(15, 'Не подтверждён', 'efron.vit@gmail.com', 'Russia Moscow Tverskaya', '08890909', '293;289;295;293;294;292;261;261;246;246', 'mqvo0gmr814j6pco3qk61bguheail1u3', 'vitaliy', 276);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_bin NOT NULL,
  `rating` int(11) DEFAULT '1',
  `color` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `discription` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `img_id` varchar(45) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `rating`, `color`, `discription`, `price`, `img_id`) VALUES
(1, 'jersey', 1, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 20, '3'),
(2, 'jersey', 2, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 21, '4'),
(3, 'pants', 3, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 22, '5'),
(4, 'pants', 4, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '6'),
(5, 'pants', 5, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 24, '7'),
(6, 'pants', 6, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 40, '8'),
(7, 'pants', 7, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 35, '9'),
(8, 'pants', 8, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 36, '10'),
(9, 'sweatshirt', 9, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 32, '11'),
(10, 'sweatshirt', 10, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures befуore cutting-edge 3 servуices.', 45, '12'),
(11, 'sweatshirt', 11, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 43, '13'),
(12, 'sweatshirt', 12, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 54, '14'),
(13, 'jersey', 13, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 20, '3'),
(14, 'jersey', 14, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 21, '4'),
(15, 'pants', 15, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 22, '5'),
(16, 'pants', 16, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '6'),
(17, 'pants', 17, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 24, '7'),
(18, 'pants', 18, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 40, '8'),
(19, 'pants', 19, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 35, '9'),
(20, 'pants', 20, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 36, '10'),
(21, 'sweatshirt', 21, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 32, '11'),
(22, 'sweatshirt', 22, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '12'),
(23, 'sweatshirt', 23, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 43, '13'),
(24, 'sweatshirt', 24, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 54, '14'),
(25, 'jersey', 25, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 20, '3'),
(26, 'jersey', 26, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 21, '4'),
(27, 'pants', 27, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 22, '5'),
(28, 'pants', 28, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '6'),
(29, 'pants', 29, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 24, '7'),
(30, 'pants', 30, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 40, '8'),
(31, 'pants', 31, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 35, '9'),
(32, 'pants', 32, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 36, '10'),
(33, 'sweatshirt', 33, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 32, '11'),
(34, 'sweatshirt', 34, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '12'),
(35, 'sweatshirt', 35, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 43, '13'),
(36, 'sweatshirt', 36, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 54, '14'),
(37, 'jersey', 37, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 20, '3'),
(38, 'jersey', 38, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 21, '4'),
(39, 'pants', 39, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 22, '5'),
(40, 'pants', 40, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '6'),
(41, 'pants', 41, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 24, '7'),
(42, 'pants', 42, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 40, '8'),
(43, 'pants', 43, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 35, '9'),
(44, 'pants', 44, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 36, '10'),
(45, 'sweatshirt', 45, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 32, '11'),
(46, 'sweatshirt', 46, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '12'),
(47, 'sweatshirt', 47, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 43, '13'),
(48, 'jersey', 48, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 20, '3'),
(49, 'jersey', 49, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 21, '4'),
(50, 'pants', 50, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 22, '5'),
(51, 'pants', 51, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '6'),
(52, 'pants', 52, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 24, '7'),
(53, 'pants', 53, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 40, '8'),
(54, 'pants', 54, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 35, '9'),
(55, 'pants', 55, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 36, '10'),
(56, 'sweatshirt', 56, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 32, '11'),
(57, 'sweatshirt', 57, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '12'),
(58, 'sweatshirt', 58, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 43, '13'),
(59, 'sweatshirt', 59, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 54, '14'),
(60, 'jersey', 60, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 20, '3'),
(61, 'jersey', 61, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 21, '4'),
(62, 'pants', 62, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 22, '5'),
(63, 'pants', 63, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '6'),
(64, 'pants', 64, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 24, '7'),
(65, 'pants', 65, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 40, '8'),
(66, 'pants', 66, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 35, '9'),
(67, 'pants', 67, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 36, '10'),
(68, 'sweatshirt', 68, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 32, '11'),
(69, 'sweatshirt', 69, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '12'),
(70, 'sweatshirt', 70, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 43, '13'),
(71, 'sweatshirt', 71, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 54, '14'),
(72, 'jersey', 72, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 20, '3'),
(73, 'jersey', 73, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 21, '4'),
(74, 'pants', 74, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 22, '5'),
(75, 'pants', 75, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '6'),
(76, 'pants', 76, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 24, '7'),
(77, 'pants', 77, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 40, '8'),
(78, 'pants', 78, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 35, '9'),
(79, 'pants', 79, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 36, '10'),
(80, 'sweatshirt', 80, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 32, '11'),
(81, 'sweatshirt', 81, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '12'),
(82, 'sweatshirt', 82, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 43, '13'),
(83, 'sweatshirt', 83, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 54, '14'),
(84, 'jersey', 84, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 20, '3'),
(85, 'jersey', 85, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 21, '4'),
(86, 'pants', 86, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 22, '5'),
(87, 'pants', 87, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '6'),
(88, 'pants', 88, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 24, '7'),
(89, 'pants', 89, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 40, '8'),
(90, 'pants', 90, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 35, '9'),
(91, 'pants', 91, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 36, '10'),
(92, 'sweatshirt', 92, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 32, '11'),
(93, 'sweatshirt', 93, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '12'),
(94, 'jersey', 94, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 20, '3'),
(95, 'jersey', 95, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 21, '4'),
(96, 'pants', 96, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 22, '5'),
(97, 'pants', 97, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '6'),
(98, 'pants', 98, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 24, '7'),
(99, 'pants', 99, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 40, '8'),
(100, 'pants', 100, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 35, '9'),
(101, 'pants', 101, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 36, '10'),
(102, 'sweatshirt', 102, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 32, '11'),
(103, 'sweatshirt', 103, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '12'),
(104, 'sweatshirt', 104, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 43, '13'),
(105, 'sweatshirt', 105, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 54, '14'),
(106, 'jersey', 106, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 20, '3'),
(107, 'jersey', 107, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 21, '4'),
(108, 'pants', 108, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 22, '5'),
(109, 'pants', 109, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '6'),
(110, 'pants', 110, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 24, '7'),
(111, 'pants', 111, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 40, '8'),
(112, 'pants', 112, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 35, '9'),
(113, 'pants', 113, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 36, '10'),
(114, 'sweatshirt', 114, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 32, '11'),
(115, 'sweatshirt', 115, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '12'),
(116, 'sweatshirt', 116, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 43, '13'),
(117, 'sweatshirt', 117, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 54, '14'),
(118, 'jersey', 118, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 20, '3'),
(119, 'jersey', 119, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 21, '4'),
(120, 'pants', 120, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 22, '5'),
(121, 'pants', 121, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '6'),
(122, 'pants', 122, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 24, '7'),
(123, 'pants', 123, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 40, '8'),
(124, 'pants', 124, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 35, '9'),
(125, 'pants', 125, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 36, '10'),
(126, 'sweatshirt', 126, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 32, '11'),
(127, 'sweatshirt', 127, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '12'),
(128, 'sweatshirt', 128, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 43, '13'),
(129, 'sweatshirt', 129, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 54, '14'),
(130, 'jersey', 130, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 20, '3'),
(131, 'jersey', 131, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 21, '4'),
(132, 'pants', 132, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 22, '5'),
(133, 'pants', 133, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '6'),
(134, 'pants', 134, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 24, '7'),
(135, 'pants', 135, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 40, '8'),
(136, 'pants', 136, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 35, '9'),
(137, 'pants', 137, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 36, '10'),
(138, 'sweatshirt', 138, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 32, '11'),
(139, 'sweatshirt', 139, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '12'),
(140, 'sweatshirt', 140, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 43, '13'),
(141, 'jersey', 141, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 20, '3'),
(142, 'jersey', 142, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 21, '4'),
(143, 'pants', 143, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 22, '5'),
(144, 'pants', 144, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '6'),
(145, 'pants', 145, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 24, '7'),
(146, 'pants', 146, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 40, '8'),
(147, 'pants', 147, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 35, '9'),
(148, 'pants', 148, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 36, '10'),
(149, 'sweatshirt', 149, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 32, '11'),
(150, 'sweatshirt', 150, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '12'),
(151, 'sweatshirt', 151, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 43, '13'),
(152, 'sweatshirt', 152, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 54, '14'),
(153, 'jersey', 153, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 20, '3'),
(154, 'jersey', 154, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 21, '4'),
(155, 'pants', 155, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 22, '5'),
(156, 'pants', 156, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '6'),
(157, 'pants', 157, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 24, '7'),
(158, 'pants', 158, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 40, '8'),
(159, 'pants', 159, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 35, '9'),
(160, 'pants', 160, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 36, '10'),
(161, 'sweatshirt', 161, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 32, '11'),
(162, 'sweatshirt', 162, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '12'),
(163, 'sweatshirt', 163, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 43, '13'),
(164, 'sweatshirt', 164, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 54, '14'),
(165, 'jersey', 165, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 20, '3'),
(166, 'jersey', 166, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 21, '4'),
(167, 'pants', 167, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 22, '5'),
(168, 'pants', 168, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '6'),
(169, 'pants', 169, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 24, '7'),
(170, 'pants', 170, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 40, '8'),
(171, 'pants', 171, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 35, '9'),
(172, 'pants', 172, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 36, '10'),
(173, 'sweatshirt', 173, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 32, '11'),
(174, 'sweatshirt', 174, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '12'),
(175, 'sweatshirt', 175, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 43, '13'),
(176, 'sweatshirt', 176, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 54, '14'),
(177, 'jersey', 177, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 20, '3'),
(178, 'jersey', 178, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 21, '4'),
(179, 'pants', 179, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 22, '5'),
(180, 'pants', 180, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '6'),
(181, 'pants', 181, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 24, '7'),
(182, 'pants', 182, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 40, '8'),
(183, 'pants', 183, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 35, '9'),
(184, 'pants', 184, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 36, '10'),
(185, 'sweatshirt', 185, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 32, '11'),
(186, 'jersey', 186, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 20, '3'),
(187, 'jersey', 187, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 21, '4'),
(188, 'pants', 188, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 22, '5'),
(189, 'pants', 189, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '6'),
(190, 'pants', 190, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 24, '7'),
(191, 'pants', 191, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 40, '8'),
(192, 'pants', 192, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 35, '9'),
(193, 'pants', 193, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 36, '10'),
(194, 'sweatshirt', 194, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 32, '11'),
(195, 'sweatshirt', 195, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '12'),
(196, 'sweatshirt', 196, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 43, '13'),
(197, 'sweatshirt', 197, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 54, '14'),
(198, 'jersey', 198, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 20, '3'),
(199, 'jersey', 199, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 21, '4'),
(200, 'pants', 200, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 22, '5'),
(201, 'pants', 201, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '6'),
(202, 'pants', 202, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 24, '7'),
(203, 'pants', 203, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 40, '8'),
(204, 'pants', 204, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 35, '9'),
(205, 'pants', 205, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 36, '10'),
(206, 'sweatshirt', 206, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 32, '11'),
(207, 'sweatshirt', 207, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '12'),
(208, 'sweatshirt', 208, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 43, '13'),
(209, 'sweatshirt', 209, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 54, '14'),
(210, 'jersey', 210, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 20, '3'),
(211, 'jersey', 211, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 21, '4'),
(212, 'pants', 212, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 22, '5'),
(213, 'pants', 213, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '6'),
(214, 'pants', 214, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 24, '7'),
(215, 'pants', 215, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 40, '8'),
(216, 'pants', 216, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 35, '9'),
(217, 'pants', 217, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 36, '10'),
(218, 'sweatshirt', 218, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 32, '11'),
(219, 'sweatshirt', 219, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '12'),
(220, 'sweatshirt', 220, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 43, '13'),
(221, 'sweatshirt', 221, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 54, '14'),
(222, 'jersey', 222, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 20, '3'),
(223, 'jersey', 223, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 21, '4'),
(224, 'pants', 224, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 22, '5'),
(225, 'pants', 225, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '6'),
(226, 'pants', 226, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 24, '7'),
(227, 'pants', 227, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 40, '8'),
(228, 'pants', 228, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 35, '9'),
(229, 'pants', 229, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 36, '10'),
(230, 'sweatshirt', 230, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 32, '11'),
(231, 'sweatshirt', 231, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '12'),
(232, 'sweatshirt', 232, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 43, '13'),
(233, 'jersey', 233, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 20, '3'),
(234, 'jersey', 234, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 21, '4'),
(235, 'pants', 235, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 22, '5'),
(236, 'pants', 236, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '6'),
(237, 'pants', 237, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 24, '7'),
(238, 'pants', 238, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 40, '8'),
(239, 'pants', 239, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 35, '9'),
(240, 'pants', 240, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 36, '10'),
(241, 'sweatshirt', 241, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 32, '11'),
(242, 'sweatshirt', 242, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '12'),
(243, 'sweatshirt', 243, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 43, '13'),
(244, 'sweatshirt', 244, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 54, '14'),
(245, 'jersey', 245, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 20, '3'),
(246, 'jersey', 246, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 21, '4');
INSERT INTO `product` (`id`, `name`, `rating`, `color`, `discription`, `price`, `img_id`) VALUES
(247, 'pants', 247, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 22, '5'),
(248, 'pants', 248, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '6'),
(249, 'pants', 249, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 24, '7'),
(250, 'pants', 250, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 40, '8'),
(251, 'pants', 251, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 35, '9'),
(252, 'pants', 252, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 36, '10'),
(253, 'sweatshirt', 253, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 32, '11'),
(254, 'sweatshirt', 254, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '12'),
(255, 'sweatshirt', 255, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 43, '13'),
(256, 'sweatshirt', 256, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 54, '14'),
(257, 'jersey', 257, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 20, '3'),
(258, 'jersey', 258, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 21, '4'),
(259, 'pants', 259, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 22, '5'),
(260, 'pants', 260, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '6'),
(261, 'pants', 261, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 24, '7'),
(262, 'pants', 262, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 40, '8'),
(263, 'pants', 263, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 35, '9'),
(264, 'pants', 264, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 36, '10'),
(265, 'sweatshirt', 265, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 32, '11'),
(266, 'sweatshirt', 267, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '12'),
(267, 'sweatshirt', 267, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 43, '13'),
(268, 'sweatshirt', 268, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 54, '14'),
(269, 'jersey', 269, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 20, '3'),
(270, 'jersey', 270, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 21, '4'),
(271, 'pants', 271, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 22, '5'),
(272, 'pants', 272, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '6'),
(273, 'pants', 273, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 24, '7'),
(274, 'pants', 274, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 40, '8'),
(275, 'pants', 275, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 35, '9'),
(276, 'pants', 276, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 36, '10'),
(277, 'sweatshirt', 277, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 32, '11'),
(278, 'jersey', 278, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 20, '3'),
(279, 'jersey', 279, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 21, '4'),
(280, 'pants', 280, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 22, '5'),
(281, 'pants', 281, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '6'),
(282, 'pants', 282, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 24, '7'),
(283, 'pants', 283, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 40, '8'),
(284, 'pants', 284, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 35, '9'),
(285, 'pants', 285, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 36, '10'),
(286, 'sweatshirt', 286, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 32, '11'),
(287, 'sweatshirt', 287, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '12'),
(288, 'sweatshirt', 288, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 43, '13'),
(289, 'sweatshirt', 289, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 54, '14'),
(290, 'jersey', 290, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 20, '3'),
(291, 'jersey', 291, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 21, '4'),
(292, 'pants', 292, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 22, '5'),
(293, 'pants', 296, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23, '6'),
(294, 'pants', 294, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 24, '7'),
(295, 'pants', 299, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 40, '8');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `password` varchar(100) COLLATE utf8_bin NOT NULL,
  `phone` varchar(45) COLLATE utf8_bin NOT NULL,
  `hash` varchar(120) COLLATE utf8_bin DEFAULT NULL,
  `id_cart_session` varchar(45) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `hash`, `id_cart_session`) VALUES
(47, 'admin', 'admin@admin.com', '$2y$10$o/uFwQ9t5Ogqd8z1yxBS3e1NMygXTk/8ciYj8zy11zhrO.jXK4qc.', '999', '5182095845d3a14b989aae5.67528606', 'vgrosrl491j3fo7k2cjn5g943o11gh68'),
(48, 'admin', 'admin@admin.ru', '$2y$10$/RE0jzgEzFqw7Q6uSWP3JeDK/4o3S9en5cq/sYWk0N4QMCtldY3OC', '999', '7442181435d3618a1e0da99.33188617', '4q6kee13a3gqcsl4p37os59kt9hqm4fg'),
(50, 'efron', 'efron.vit@gmail.com', '$2y$10$7WBTGzHlqoXGSzDg.wqoreORvOEK89SDbVqkbWW0kOD./lCJ0Iyp.', '123', '230398775d3611aac2d3d3.65375998', 'dq4lpv589g07csvp3lnge5v4hnq0huef'),
(51, 'vit', 'admin1@adm1in.com', '$2y$10$r7eC6luJP.z07Oj8DOCqgOSofiZQzFHvg2pw7HlNQ3R7IgY2RJ7k2', '1233', '13759806805d398e130f5883.09776139', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
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
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=451;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
