-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-11-16 09:02:43
-- 伺服器版本： 10.4.14-MariaDB
-- PHP 版本： 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `project_dashboard`
--

-- --------------------------------------------------------

--
-- 資料表結構 `experience`
--

CREATE TABLE `experience` (
  `id` int(6) UNSIGNED NOT NULL,
  `ex_value` int(3) DEFAULT NULL,
  `ex_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `experience`
--

INSERT INTO `experience` (`id`, `ex_value`, `ex_name`) VALUES
(1, 0, '一年以下'),
(2, 1, '一年'),
(3, 2, '兩年'),
(4, 3, '三年'),
(5, 4, '四年'),
(6, 5, '五年'),
(7, 6, '六年'),
(8, 7, '七年'),
(9, 8, '七年以上');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
