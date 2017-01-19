-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-11-09 13:53:24
-- 服务器版本： 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fantasystar`
--

-- --------------------------------------------------------

--
-- 表的结构 `yourword`
--

CREATE TABLE `yourword` (
  `WID` int(11) NOT NULL,
  `ID` char(12) COLLATE utf8_unicode_ci NOT NULL,
  `WTITLE` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `WTIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `WMESSAGE` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `yourword`
--

INSERT INTO `yourword` (`WID`, `ID`, `WTITLE`, `WTIME`, `WMESSAGE`) VALUES
(1, '201410311072', '云游', '2016-11-09 10:24:46', '我觉得orz'),
(2, '201410311072', 'test', '2016-11-09 11:00:48', 'test\r\n\r\n幻星科幻协会\r\n\r\n 上海·浦东新区·临港新城·上海海事大学·中远图书馆\r\n\r\n QQ群：182332107\r\n\r\n 13917995827\r\n\r\n smuhxxh@163.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `yourword`
--
ALTER TABLE `yourword`
  ADD PRIMARY KEY (`WID`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `yourword`
--
ALTER TABLE `yourword`
  MODIFY `WID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
