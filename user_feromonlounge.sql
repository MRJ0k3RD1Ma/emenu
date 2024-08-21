-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 21, 2024 at 02:41 PM
-- Server version: 10.11.8-MariaDB-ubu2204
-- PHP Version: 8.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_feromonlounge`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(445) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `navigate_id` int(10) UNSIGNED NOT NULL,
  `status` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `image` varchar(445) NOT NULL,
  `sort` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `navigate_id`, `status`, `image`, `sort`) VALUES
(1, 'ИЧИМЛИКЛАР', 1, 0, '1701859262.7994.jpg', 1),
(2, 'fast food', 2, 1, '1722784368.0588.jpg', 1),
(3, 'Salat', 2, 1, '1722786016.2266.jpg', 1),
(4, 'Алкоголь на разлив', 1, 1, '1722786036.8078.png', 1),
(5, 'Алкогольные коктейли', 1, 1, '1722786058.1848.jpg', 1),
(6, 'Безалкогольные коктейли на основе чая', 1, 1, '1722786100.8138.jpg', 1),
(7, 'Безалкогольные коктейли', 1, 1, '1722786216.4447.jpg', 1),
(8, 'Кофе', 1, 1, '1722786235.6233.jpg', 1),
(9, 'Кофейные коктейли без алкоголя', 1, 1, '1722786253.9772.jpg', 1),
(10, 'Кувшинные Лимонады', 1, 1, '1722786278.2715.jpg', 1),
(11, 'Молочные коктейли', 1, 1, '1722786305.3528.jpg', 1),
(12, 'Напитки газированные стеклo', 1, 1, '1722786321.3803.jpg', 1),
(13, 'Наши вкусные цветочные чаи', 1, 1, '1722786343.3057.jpg', 1),
(14, 'пивные закуски', 2, 1, '1722786360.4255.jpg', 1),
(15, 'Пиво', 1, 1, '1722786377.4269.jpg', 1),
(16, 'Пицца', 2, 1, '1722786392.6322.jpg', 1),
(17, 'Свежевыжатые соки', 1, 1, '1722786409.8045.jpeg', 1),
(18, 'Смузи', 1, 1, '1722786425.9388.jpg', 1),
(19, 'Фруктовое ассорти', 2, 1, '1722786441.1257.jpg', 1),
(20, 'Чайная Церемония', 1, 1, '1722786459.2893.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(445) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `comment` varchar(445) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `narxi` double NOT NULL,
  `narxi2` double NOT NULL DEFAULT 0,
  `image` varchar(445) NOT NULL,
  `status` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `category_id` int(10) UNSIGNED NOT NULL,
  `sort` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `comment`, `narxi`, `narxi2`, `image`, `status`, `category_id`, `sort`) VALUES
(1, 'Coca Cola', '', 20000, 0, '1701859590.5174.jpg', 0, 1, 1),
(2, 'xотдог обычный', '', 0, 0, '1722786504.1189.jpg', 1, 2, 1),
(3, 'Двойной чизбургер', '', 0, 0, '1722786522.5952.jpg', 1, 2, 1),
(4, 'Куринный бургер(KFC бургер)', '', 0, 0, '1722786536.4457.jpg', 1, 2, 1),
(5, 'Турецкий хот дог', '', 0, 0, '1722786549.6617.jpg', 1, 2, 1),
(6, 'Фри', '', 0, 0, '1722786563.0111.jpg', 1, 2, 1),
(7, 'Чизбургер', '', 0, 0, '1722786576.0404.jpg', 1, 2, 1),
(8, 'Шаверма', '', 0, 0, '1722786590.7417.jpg', 1, 2, 1),
(9, 'Буррата', '', 0, 0, '1722786613.5787.jpg', 1, 3, 1),
(10, 'Хрустящие баклажаны', '', 0, 0, '1722786628.0909.jpg', 1, 3, 1),
(11, 'Цезарь', '', 0, 0, '1722786642.2241.jpg', 1, 3, 1),
(12, 'Olmeca Silver текила', '', 0, 0, '1722786663.7508.jpg', 1, 4, 1),
(13, 'Белуга водка', '', 0, 0, '1722786678.6653.png', 1, 4, 1),
(14, 'Виски Ballantines', '', 0, 0, '1722786693.0894.jpg', 1, 4, 1),
(15, 'Виски Bushmills', '', 0, 0, '1722786706.3672.jpg', 1, 4, 1),
(16, 'Виски Captain Morgan', '', 0, 0, '1722786721.0711.jpg', 1, 4, 1),
(17, 'Виски Chivas Regal', '', 0, 0, '1722786731.5994.jpg', 1, 4, 1),
(18, 'Виски Famous Grouse', '', 0, 0, '1722786742.5182.jpg', 1, 4, 1),
(19, 'Виски Jameson Orange', '', 0, 0, '1722786755.3483.jpeg', 1, 4, 1),
(20, 'Виски Red Label', '', 0, 0, '1722786771.6237.jpg', 1, 4, 1),
(21, 'Водка Absolut', '', 0, 0, '1722786785.0976.png', 1, 4, 1),
(22, 'Коньяк Арарат', '', 0, 0, '1722786797.6987.jpg', 1, 4, 1),
(23, 'Текила Jose Cuervo', '', 0, 0, '1722786811.6378.jpg', 1, 4, 1),
(24, 'B 52', '', 0, 0, '1722786833.5461.jpeg', 1, 5, 1),
(25, 'Апероль Шприц', '', 0, 0, '1722786844.8305.jpg', 1, 5, 1),
(26, 'Базиликовый удар', '', 0, 0, '1722786857.0974.jpeg', 1, 5, 1),
(27, 'Верджин мохито мята коктейль', '', 0, 0, '1722786878.3673.jpg', 1, 5, 1),
(28, 'Виски кола', '', 0, 0, '1722786890.6904.jpeg', 1, 5, 1),
(29, 'Водка мятный чай', '', 0, 0, '1722786903.3467.jpg', 0, 5, 1),
(30, 'Водка с мятным чаем', '', 0, 0, '1722786914.873.jpg', 1, 5, 1),
(31, 'Водка спрайт', '', 0, 0, '1722786927.1231.jpg', 1, 5, 1),
(32, 'Водка тоник', '', 0, 0, '1722786943.7932.jpg', 1, 5, 1),
(33, 'Водка энергетик', '', 0, 0, '1722786955.309.jpg', 1, 5, 1),
(34, 'Голубая Лагуна', '', 0, 0, '1722786967.0426.jpeg', 1, 5, 1),
(35, 'Джин тоник с огурцом', '', 0, 0, '1722786977.9073.jpg', 1, 5, 1),
(36, 'Джон Коллинз', '', 0, 0, '1722786988.0307.jpeg', 1, 5, 1),
(37, 'Коктейль Мохито', '', 0, 0, '1722786998.9877.jpeg', 1, 5, 1),
(38, 'Коктейль Чай доброе утро', '', 0, 0, '1722787013.4453.jpg', 1, 5, 1),
(39, 'Кровавая Мэри', '', 0, 0, '1722787023.5708.jpeg', 1, 5, 1),
(40, 'Куба либре', '', 0, 0, '1722787034.3422.jpg', 1, 5, 1),
(41, 'Лонг айленд Техаский', '', 0, 0, '1722787047.031.jpg', 1, 5, 1),
(42, 'Лондонский мятный свизл', '', 0, 0, '1722787058.3656.jpg', 1, 5, 1),
(43, 'Маргарита клубничная', '', 0, 0, '1722787069.4929.jpeg', 1, 5, 1),
(44, 'Маргарита', '', 0, 0, '1722787082.7806.jpg', 1, 5, 1),
(45, 'Мохито клубничный алкогольный', '', 0, 0, '1722787093.2427.jpg', 1, 5, 1),
(46, 'Мохито малиновый', '', 0, 0, '1722787102.505.jpg', 1, 5, 1),
(47, 'Мятный с ромом', '', 0, 0, '1722787112.3008.jpg', 1, 5, 1),
(48, 'Отвертка', '', 0, 0, '1722787121.1446.jpeg', 1, 5, 1),
(49, 'Пино Колада', '', 0, 0, '1722787132.3981.jpeg', 1, 5, 1),
(50, 'Ром Кола', '', 0, 0, '1722787142.0708.jpg', 1, 5, 1),
(51, 'Россини', '', 0, 0, '1722787151.8015.jpeg', 1, 5, 1),
(52, 'Светофор', '', 0, 0, '1722787162.025.jpeg', 1, 5, 1),
(53, 'Текила Санрайс', '', 0, 0, '1722787172.5605.jpg', 1, 5, 1),
(54, 'Хиросима', '', 0, 0, '1722787184.9533.jpeg', 1, 5, 1),
(55, 'Черный русский', '', 0, 0, '1722787195.764.jpg', 1, 5, 1),
(56, 'Безалкогольные коктейли на основе чая', '', 0, 0, '1722787214.8659.jpg', 1, 6, 1),
(57, 'Алые паруса', '', 0, 0, '1722787237.3585.jpg', 1, 7, 1),
(58, 'Клубничный лимонад', '', 0, 0, '1722787249.825.jpg', 1, 7, 1),
(59, 'Клубничный слинг', '', 0, 0, '1722787259.3317.jpg', 1, 7, 1),
(60, 'Малиновый лимонад', '', 0, 0, '1722787270.5385.jpg', 1, 7, 1),
(61, 'Манго слинг', '', 0, 0, '1722787279.8176.jpg', 1, 7, 1),
(62, 'Мохито', '', 0, 0, '1722787290.6161.jpg', 1, 7, 1),
(63, 'Огуречный лимонад', '', 0, 0, '1722787302.0076.jpg', 1, 7, 1),
(64, 'Пеликан коктейль', '', 0, 0, '1722787311.8262.jpg', 1, 7, 1),
(65, 'Ягодный лимонад', '', 0, 0, '1722787323.0385.jpg', 1, 7, 1),
(66, 'Американо', '', 0, 0, '1722787339.4694.jpg', 1, 8, 1),
(67, 'Какао', '', 0, 0, '1722787348.4349.jpeg', 1, 8, 1),
(68, 'Капучино', '', 0, 0, '1722787357.7072.jpg', 1, 8, 1),
(69, 'Латте', '', 0, 0, '1722787367.6145.jpg', 1, 8, 1),
(70, 'Эспрессо', '', 0, 0, '1722787376.0784.jpg', 1, 8, 1),
(71, 'Фруточино грейпфрутовый', '', 0, 0, '1722787391.6097.jpg', 1, 9, 1),
(72, 'Холодный кофе аршат', '', 0, 0, '1722787413.2985.jpg', 1, 9, 1),
(73, 'Холодный Латте классический', '', 0, 0, '1722787424.5935.jpeg', 1, 9, 1),
(74, 'Холодный латте с орео', '', 0, 0, '1722787434.5917.jpg', 1, 9, 1),
(75, 'Шмель', '', 0, 0, '1722787445.0643.jpg', 1, 9, 1),
(76, 'Витаминный лимонад в кувшине', '', 0, 0, '1722787526.3022.jpg', 1, 10, 1),
(77, 'Грейпфрутовый лимонад', '', 0, 0, '1722787537.9092.jpg', 1, 10, 1),
(78, 'Классический лимонад в кувшине', '', 0, 0, '1722787546.7139.jpg', 1, 10, 1),
(79, 'Лимонад Дюшес в кувшине', '', 0, 0, '1722787557.0903.jpg', 1, 10, 1),
(80, 'Мандариновый лимонад в кувшине', '', 0, 0, '1722787565.5864.jpg', 1, 10, 1),
(81, 'Мятный лимонад в кувшине', '', 0, 0, '1722787574.5471.jpg', 1, 10, 1),
(82, 'Огуречно-базиликовый лимонад', '', 0, 0, '1722787587.3847.jpg', 1, 10, 1),
(83, 'Банановый милкшейк', '', 0, 0, '1722787603.163.jpg', 1, 11, 1),
(84, 'Клубничный милкшейк', '', 0, 0, '1722787615.0054.jpg', 1, 11, 1),
(85, 'Малиновый милкшейк', '', 0, 0, '1722787623.4467.jpg', 1, 11, 1),
(86, 'Сникерс милкшейк', '', 0, 0, '1722787633.0258.jpg', 1, 11, 1),
(87, 'Шоколадный милкшейк', '', 0, 0, '1722787641.2157.jpg', 1, 11, 1),
(88, 'Боржоми', '', 0, 0, '1722787655.4494.jpg', 1, 12, 1),
(89, 'Кола', '', 0, 0, '1722787663.4508.jpg', 1, 12, 1),
(90, 'Спрайт', '', 0, 0, '1722787804.7628.jpg', 1, 12, 1),
(91, 'Фанта', '', 0, 0, '1722787815.0152.jpg', 1, 12, 1),
(92, 'tea-glass-teapot-mango-berries', '', 0, 0, '1722787834.1508.jpg', 1, 13, 1),
(93, 'Гренки с соусом Тартар', '', 0, 0, '1722787849.4928.jpg', 1, 14, 1),
(94, 'Пивное ассорти', '', 0, 0, '1722787864.5268.jpg', 1, 14, 1),
(95, 'Пивные закуски Феромон', '', 0, 0, '1722787876.7445.jpg', 1, 14, 1),
(96, 'Sarbast', '', 0, 0, '1722787899.42.jpg', 1, 15, 1),
(97, 'Tuborg', '', 0, 0, '1722787909.4234.jpg', 1, 15, 1),
(98, 'WeissBerg(безалкогольное пиво)', '', 0, 0, '1722787920.5909.jpg', 1, 15, 1),
(99, 'Балтика 7', '', 0, 0, '1722787930.2029.jpg', 1, 15, 1),
(100, 'Барнаульноебархотное', '', 0, 0, '1722787941.3888.jpg', 1, 15, 1),
(101, 'Хмелка', '', 0, 0, '1722787949.7282.jpg', 1, 15, 1),
(102, 'Шымкентское', '', 0, 0, '1722787959.1138.jpg', 1, 15, 1),
(103, 'Аристократ', '', 0, 0, '1722787977.3119.jpg', 1, 16, 1),
(104, 'Буррата', '', 0, 0, '1722787985.3627.jpg', 1, 16, 1),
(105, 'Маргарита', '', 0, 0, '1722787993.6954.jpg', 1, 16, 1),
(106, 'Мясная', '', 0, 0, '1722788005.2122.jpg', 1, 16, 1),
(107, 'Пепперони', '', 0, 0, '1722788014.3039.jpg', 1, 16, 1),
(108, 'Феромон', '', 0, 0, '1722788025.0195.jpg', 1, 16, 1),
(109, 'Хохланд', '', 0, 0, '1722788032.3287.jpg', 1, 16, 1),
(110, 'Апельсиновый', '', 0, 0, '1722788047.0006.jpeg', 1, 17, 1),
(111, 'Морковный', '', 0, 0, '1722788065.1233.jpg', 1, 17, 1),
(112, 'Яблочный', '', 0, 0, '1722788072.7337.jpg', 1, 17, 1),
(113, 'Смузи Бодрячок', '', 0, 0, '1722788085.4103.jpg', 1, 18, 1),
(114, 'смузи Ягодный твист', '', 0, 0, '1722788095.208.jpg', 1, 18, 1),
(115, 'Черносмородиновый смузи', '', 0, 0, '1722788102.6702.jpg', 1, 18, 1),
(116, 'Яблочное наслаждение  смузи', '', 0, 0, '1722788112.8261.jpg', 1, 18, 1),
(117, 'Фруктовое ассорти', '', 0, 0, '1722788126.8543.jpg', 1, 19, 1),
(118, 'Фруктовое салат с мороженым', '', 0, 0, '1722788135.6176.jpg', 1, 19, 1),
(119, 'Чайная Церемония', '', 0, 0, '1722788161.3938.jpg', 1, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `navigate`
--

CREATE TABLE `navigate` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(445) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `status` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `sort` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `navigate`
--

INSERT INTO `navigate` (`id`, `name`, `status`, `sort`) VALUES
(1, 'БАР', 1, 1),
(2, 'КУХНЯ', 1, 1),
(3, 'КАЛЬЯНЫ', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL DEFAULT 0,
  `org_name` varchar(100) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `telefon_main` varchar(50) DEFAULT NULL,
  `telefon_mob` varchar(50) DEFAULT NULL,
  `telefon_home` varchar(50) DEFAULT NULL,
  `hr` varchar(50) DEFAULT NULL,
  `mfo` varchar(50) DEFAULT NULL,
  `bank` varchar(250) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `inn` varchar(50) DEFAULT NULL,
  `okonh` varchar(70) DEFAULT NULL,
  `direktor` varchar(100) DEFAULT NULL,
  `summaoy` double NOT NULL DEFAULT 1,
  `summakun` double NOT NULL DEFAULT 1,
  `vat_rate` double NOT NULL DEFAULT 1,
  `vat_value` double NOT NULL DEFAULT 1,
  `unit_price` double NOT NULL DEFAULT 1,
  `subtotal` double NOT NULL DEFAULT 1,
  `send_date` date DEFAULT NULL,
  `summaoy2` double NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(500) DEFAULT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `access_token` varchar(500) DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) DEFAULT 1,
  `image` varchar(255) DEFAULT 'default/avatar.png',
  `phone` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `auth_key`, `token`, `code`, `access_token`, `created`, `updated`, `status`, `image`, `phone`) VALUES
(4, 'Administrator', 'admin', '$2y$13$Hx9.Rv/1278Ap0H9MXMsEO6ghMsLP/6VZVaW4wJPTSSi85udZ6ili', NULL, NULL, NULL, NULL, '2023-10-19 17:03:20', '2023-10-19 17:03:20', 1, 'default/avatar.png', '+998999670395');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigate`
--
ALTER TABLE `navigate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `navigate`
--
ALTER TABLE `navigate`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
