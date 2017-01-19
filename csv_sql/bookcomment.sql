-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-11-09 13:57:36
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
-- 表的结构 `bookcomment`
--

CREATE TABLE `bookcomment` (
  `CID` int(6) UNSIGNED ZEROFILL NOT NULL,
  `FSBN` mediumint(5) NOT NULL,
  `ID` char(12) COLLATE utf8_unicode_ci NOT NULL,
  `CTIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `COMMENT` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `bookcomment`
--

INSERT INTO `bookcomment` (`CID`, `FSBN`, `ID`, `CTIME`, `COMMENT`) VALUES
(000003, 10001, '201410311072', '2016-10-29 15:44:20', '《软件体的生命周期》是[美国]特德·姜的作品，2015年5月译林出版社出版。译者张博然等。 作者特德·姜是为世界科幻界认可的华裔科幻作家。他游走在科幻边缘，在科幻架构上探讨哲学、人性与情感。《软件体的生命周期》一书结集了特德·姜的《软件体的生命周期》、《赏心悦目》、《商人和炼金术士之门》等六部作品。随着数码体市场的发展、壮大、冷淡和萧条，数码体们的命运也随之发生变迁。'),
(000004, 10001, '201410311072', '2016-10-29 16:12:34', '冻住，不洗澡!'),
(000008, 10001, '201410311072', '2016-10-30 07:20:47', '如果我跑的足够快,我的孤独就追不上我。'),
(000009, 10002, '201410311072', '2016-11-08 11:58:43', '午时已到！'),
(000010, 10016, '201410311072', '2016-11-09 08:01:28', '学医救不了中国人！'),
(000011, 10027, '201410311072', '2016-11-09 08:11:40', '42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookcomment`
--
ALTER TABLE `bookcomment`
  ADD PRIMARY KEY (`CID`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `bookcomment`
--
ALTER TABLE `bookcomment`
  MODIFY `CID` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
