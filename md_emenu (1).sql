-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 11:58 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `md_emenu`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(445) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `navigate_id` int(10) UNSIGNED NOT NULL,
  `status` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `image` varchar(445) NOT NULL,
  `sort` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `navigate_id`, `status`, `image`, `sort`) VALUES
(1, 'ИЧИМЛИКЛАР', 1, 1, '1701859262.7994.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(445) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `comment` varchar(445) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
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
(1, 'Coca Cola', '', 20000, 0, '1701859590.5174.jpg', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `navigate`
--

CREATE TABLE `navigate` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(445) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
