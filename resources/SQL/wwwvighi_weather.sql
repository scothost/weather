-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 27, 2014 at 10:53 PM
-- Server version: 5.5.37-cll
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wwwvighi_weather`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `text`) VALUES
(60, 'xxy'),
(59, 'xxy'),
(55, 'eddede'),
(52, 'here'),
(54, 'olanda'),
(58, 'dsds'),
(57, 'dsdssd'),
(61, 'yhuu'),
(62, 'penis'),
(63, 'new'),
(64, 'ewew'),
(65, 'ewew'),
(66, 'dsds'),
(67, 'new'),
(68, 'trtr'),
(69, 'new');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role` enum('default','admin','owner') NOT NULL DEFAULT 'default',
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  UNIQUE KEY `uid` (`id`),
  KEY `uid_2` (`id`),
  KEY `uid_3` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role`, `username`, `password`) VALUES
(1, 'owner', 'ioto', '2f5bff5b8ad4e7d763527faa098c9bd1'),
(2, 'admin', 'admin', '2f5bff5b8ad4e7d763527faa098c9bd1'),
(3, 'admin', 'default', '2f5bff5b8ad4e7d763527faa098c9bd1'),
(5, 'default', 'test', '671256c5f366fe793b2fafa2de658027'),
(8, 'default', 'defaultdogface', 'fb756591e33222607c8f6e530c689c1b'),
(7, 'default', 'new', '91f06616c2d35f4af9af391e16e9dffe'),
(9, 'default', 'whatshisface', '3709f4de2981a854cdc36b2682ed7cf1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
