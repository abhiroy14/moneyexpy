-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 17, 2019 at 05:58 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expense`
--

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

DROP TABLE IF EXISTS `expense`;
CREATE TABLE IF NOT EXISTS `expense` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `e_amount` int(11) DEFAULT NULL,
  `e_name` varchar(20) NOT NULL DEFAULT 'ex',
  `e_detail` text,
  `date` date NOT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`eid`, `cid`, `e_amount`, `e_name`, `e_detail`, `date`) VALUES
(1, 1, 200, 'food', 'wertyuijhgfdsfghjnbvcxcvbnmgfdsfghg', '2019-11-14'),
(17, 13, -100, 'food', '', '2019-11-15'),
(3, 1, -50, 'fuel', '', '2019-11-13'),
(4, 1, -50, 'fuel', '', '2019-11-13'),
(5, 1, -50, 'fuel', '', '2019-11-13'),
(6, 1, 100, 'shop', '', '2019-11-15'),
(7, 1, 100, 'shop', '', '2019-11-15'),
(8, 1, 100, 'shop', '', '2019-11-15'),
(9, 1, 100, 'shop', '', '2019-11-15'),
(10, 1, 100, 'shop', '', '2019-11-15'),
(11, 1, 100, 'shop', '', '2019-11-15'),
(12, 1, 100, 'shop', '', '2019-11-15'),
(13, 1, 100, 'shop', '', '2019-11-15'),
(14, 1, 100, 'shop', '', '2019-11-15'),
(15, 1, 100, 'shop', '', '2019-11-15'),
(16, 1, 200, 'movie', '', '2019-11-17'),
(19, 13, 200, 'extra', 'NULL', '2019-11-14'),
(21, 1, 12, 'extra', '', '2019-11-15'),
(27, 27, 200, 'fuel', '', '2019-11-16'),
(28, 27, -200, 'goods', '', '2019-11-15'),
(29, 28, 400, 'movie', '', '2019-11-08'),
(30, 28, -1200, 'rent', '', '2019-11-07'),
(31, 27, 20, 'extra', '', '2019-11-22');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `token` text,
  `t_date` datetime DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `name`, `email`, `password`, `token`, `t_date`) VALUES
(1, 'abhijeet', 'abhi@gmail.com', 'abhi1234', '1b47b3a5899f52a8', '2019-11-17 03:38:09'),
(2, 'ravi', 'gymboy1497@gmail.com', 'ravi1234', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `username`
--

DROP TABLE IF EXISTS `username`;
CREATE TABLE IF NOT EXISTS `username` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(40) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `username`
--

INSERT INTO `username` (`cid`, `c_name`, `uid`) VALUES
(1, 'aritra', 1),
(13, 'dev', 1),
(3, 'amit', 1),
(28, 'ram', 2),
(5, 'raman', 1),
(7, 'david', 1),
(9, 'roy', 1),
(27, 'amit', 2),
(15, 'nav', 1),
(17, 'ram', 1),
(18, 'ram', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
