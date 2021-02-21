-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-11-17 17:20:05
-- 伺服器版本： 10.4.14-MariaDB
-- PHP 版本： 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `projects`
--

-- --------------------------------------------------------

--
-- 資料表結構 `authority`
--

CREATE TABLE `authority` (
  `admin_id` int(6) UNSIGNED NOT NULL,
  `admin_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_account` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_authority` tinyint(4) NOT NULL,
  `admin_create_date` datetime DEFAULT NULL,
  `admin_edit_date` datetime DEFAULT NULL,
  `valid` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `authority`
--

INSERT INTO `authority` (`admin_id`, `admin_name`, `admin_account`, `admin_password`, `admin_email`, `admin_authority`, `admin_create_date`, `admin_edit_date`, `valid`) VALUES
(1, '柯文儒', 'lsloane0', 'zurqoep76cr2', 'lsloane0@iii.com', 1, '2020-10-16 00:00:00', '2021-01-11 00:00:00', 1),
(2, '黃怡芳', 'gforstall1', '7zcfzg', 'gforstall1@iii.com', 1, '2020-10-11 00:00:00', '2021-01-07 00:00:00', 1),
(3, '陳淑萍', 'kshave2', 'bhawihk0', 'kshave2@iii.com', 1, '2020-10-05 00:00:00', '2020-12-15 00:00:00', 1),
(4, '游惠敏', 'bdecourcy3', 'nbazhervphyy', 'bdecourcy3@iii.com', 2, '2020-09-30 00:00:00', '2021-03-27 00:00:00', 1),
(5, '邱冠宏', 'ndeas4', 'pxyczbt2p', 'ndeas4@iii.com', 2, '2020-10-10 00:00:00', '2021-01-02 00:00:00', 1),
(6, '徐雅婷', 'rpaulo5', '6rdzut83dz', 'rpaulo5@iii.com', 2, '2020-10-23 00:00:00', '2020-11-28 00:00:00', 1),
(7, '張琦治', 'ckamen6', 'oqrrtkisd', 'ckamen6@iii.com', 3, '2020-10-30 00:00:00', '2020-11-23 00:00:00', 1),
(8, '陳世昌', 'vspacie7', 'k2da4c5my3yj', 'vspacie7@iii.com', 3, '2020-10-29 00:00:00', '2020-11-29 00:00:00', 1),
(9, '郭婉如', 'dwarnock8', 'gzm7t77qu', 'dwarnock8@iii.com', 3, '2020-09-30 00:00:00', '2021-03-06 00:00:00', 1),
(10, '陳至翰', 'oalsobrook9', 'a7pfdwyr8qzh', 'oalsobrook9@iii.com', 2, '2020-10-31 00:00:00', '2021-03-25 00:00:00', 0),
(11, '陳郁善', 'lglyssannea', 'w7uq1njx', 'lglyssannea@iii.com', 1, '2020-10-11 00:00:00', '2020-11-17 18:28:56', 0),
(12, '李東來', 'ptudbaldb', 'wp4wfcyufp', 'ptudbaldb@iii.com', 1, '2020-10-01 00:00:00', '2020-11-17 16:32:44', 0),
(13, '王孟涵', 'scatheryc', 'ym9xrd', 'scatheryc@iii.com', 2, '2020-09-18 00:00:00', '2020-11-17 11:37:30', 0),
(14, '張世傑', 'pgirardid', 'ipavwbbw9l', 'pgirardid@iii.com', 3, '2020-09-13 00:00:00', '2021-01-10 00:00:00', 0),
(15, '吳雅航', 'cskelhornee', '8fopajj', 'cskelhornee@iii.com', 2, '2020-10-31 00:00:00', '2020-11-17 10:56:04', 0),
(16, '晏政哲', 'mtilzeyf', 'm1eynrtqi4tv', 'mtilzeyf@iii.com', 3, '2020-09-20 00:00:00', '2021-01-08 00:00:00', 0),
(17, '陳明惠', 'gpieleg', 'mffcopknua', 'gpieleg@iii.com', 3, '2020-10-11 00:00:00', '2020-11-17 01:37:53', 0),
(18, '趙淑娟', 'hcloakeh', '0mctawwx', 'hcloakeh@iii.com', 2, '2020-09-04 00:00:00', '2020-11-17 01:37:51', 0),
(19, '張佩蓉', 'dmollini', 'rzmztbif', 'dmollini@iii.com', 3, '2020-10-05 00:00:00', '2020-11-17 01:37:48', 0),
(20, '王秀輝', 'tellerayj', 'bnn0ri', 'tellerayj@iii.com', 3, '2020-09-09 00:00:00', '2021-01-22 00:00:00', 0),
(21, 'SDD', '123', 'sf', 'sf@sd', 2, '2020-11-17 00:00:00', '2020-11-17 11:34:26', 0),
(22, 'qsdswer', 'assdsdd', '3', '1@d', 1, '2020-11-27 00:00:00', '2020-11-18 00:00:00', 0),
(23, 'qsdswerwefwef', 'assdsdd', 'f', 's@s', 2, '2020-11-04 00:00:00', '2020-11-17 00:00:00', 0),
(24, '王裕盛', 'asdf951', '12345', 'es@ggg', 1, '2020-11-19 00:00:00', '2020-11-28 00:00:00', 0),
(25, 'qsdsw', 'asasdsd', 'sdaaaads', '1@3sdsdssss', 2, '2020-11-19 00:00:00', '2020-11-28 00:00:00', 0),
(26, 'sdsd', 'sdssd', 'sdds', 's@assd', 1, '2020-11-11 00:00:00', '2020-11-20 00:00:00', 0),
(27, 'dgdf', 'dgdf', 'gddf', 'dg@fddfdf', 1, '2020-11-18 00:00:00', '2020-11-26 00:00:00', 0),
(28, 'd', 's', 'ds', 'ds@sd', 1, '2020-11-09 00:00:00', '2020-11-19 00:00:00', 0),
(29, 'aa', 'sa', 'as', 'as@as', 1, '2020-12-04 00:00:00', '2020-11-19 00:00:00', 0),
(30, '1', '2', '3', '4@w', 1, '2020-11-19 00:00:00', '2020-11-19 00:00:00', 0),
(31, '1', '2', '13', '12@ds', 1, '2020-11-26 00:00:00', '2020-11-27 00:00:00', 0),
(32, '12', '2', 'wedw', 'w@dw', 1, '2020-11-12 00:00:00', '2020-11-12 00:00:00', 0),
(33, 'wdqw', '2', 'sdf', 'swef@y', 1, '2020-11-18 00:00:00', '2020-11-18 00:00:00', 0),
(34, 'qw', 'assdsdd', 'qw', 'qw@sd', 1, '2020-11-25 00:00:00', '2020-11-18 00:00:00', 0),
(35, 'ASASAS', 'assdsddASAS', 'ASASAS', 'AS@ERASAS', 1, '2020-11-20 00:00:00', '2020-11-20 00:00:00', 0),
(36, 'sd', 'sd', 'sada', 'asd@asd', 1, '2020-11-18 00:00:00', '2020-11-26 00:00:00', 0),
(37, 'sds', 'sdvsd', 'vsdvs', 'dvsdv@sd', 2, '2020-11-13 00:00:00', '2020-11-19 00:00:00', 0),
(38, 'asd', 'asda', 'sda', 'da@asd', 1, '2020-11-25 00:00:00', '2020-11-19 00:00:00', 0),
(39, 'sdfstrhrt', 'rtr', 'trtr', 'sdf@sd', 1, '2020-11-19 00:00:00', '2020-11-20 00:00:00', 0),
(40, 'rthr', 'trhhrrtrt', 'hrt', 'r@rfge', 1, '2020-11-26 00:00:00', '2020-11-27 00:00:00', 0),
(41, 'sdsds', 'dfsdfsdf', 'dsfsdfdsf', 'sdfsfd@sdfsdf', 1, '2020-11-12 00:00:00', '2020-11-19 00:00:00', 0),
(42, 'asda', 'sdasd', 'asdads', 'ad@asd', 1, '0000-00-00 00:00:00', NULL, 0),
(43, 'asc', 'asc', 'asc', 'asc@asc', 1, '2020-11-25 00:00:00', '2020-11-27 00:00:00', 0),
(44, 'as', 'asa', 'asd', 'dasd@asd', 1, '2020-11-26 00:00:00', '2020-11-27 00:00:00', 0),
(45, '23asasasas', '23', '23', '23@ew', 1, '2020-11-25 00:00:00', '2020-11-26 00:00:00', 0),
(46, 'sdsdasasas', 'sdssdsd', 'dsdsd', 'sdsd@sdsds', 1, '2020-11-25 00:00:00', '2020-11-26 00:00:00', 0),
(47, 'aef', 'qq', 'qwe', 'qweq@aef', 1, '2006-11-24 00:00:00', '2020-11-17 01:37:46', 0),
(48, 'gdfgdf', 'gdfgdfgd', 'dgsgd', 'sdgsd@dsfsf', 2, '2020-11-17 00:00:00', '2020-11-17 01:37:44', 0),
(49, 'dfbgsf', 'gsfgsf', 'fgsgsf', 'sfgsg@sfdf', 2, '2020-11-17 00:00:00', '2020-11-17 01:37:41', 0),
(50, 'sfdg', 'fsgd', 'sdg', 'sgsd@sdf', 1, '2020-11-17 00:00:00', '2020-11-17 01:37:39', 0),
(51, 'fgfg', 'fgfg', 'fgfg', 'gfg@frfe', 1, '2020-11-17 00:00:00', '2020-11-17 09:35:36', 0),
(52, 'ere', 'rer', 'ere', 'er@sd', 1, '2020-11-17 00:00:00', '2020-11-17 11:36:55', 0),
(53, 'assds', 'as', 'assa', 'asa@asd', 1, '2020-11-17 18:03:34', '2020-11-17 18:03:45', 0),
(54, 'dsdsdf', 'fsdfsdfs', 'sdfdf', 'sdf@sfsdf', 2, '2020-11-17 19:28:51', '2020-11-17 19:29:20', 0);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `authority`
--
ALTER TABLE `authority`
  ADD PRIMARY KEY (`admin_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `authority`
--
ALTER TABLE `authority`
  MODIFY `admin_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
