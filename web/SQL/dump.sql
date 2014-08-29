-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.16 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.0.0.4400
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for weather_db
DROP DATABASE IF EXISTS `weather_db`;
CREATE DATABASE IF NOT EXISTS `weather_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `weather_db`;


-- Dumping structure for table weather_db.data
DROP TABLE IF EXISTS `data`;
CREATE TABLE IF NOT EXISTS `data` (
  `dataid` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(200) NOT NULL,
  PRIMARY KEY (`dataid`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

-- Dumping data for table weather_db.data: 26 rows
DELETE FROM `data`;
/*!40000 ALTER TABLE `data` DISABLE KEYS */;
INSERT INTO `data` (`dataid`, `text`) VALUES
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
	(69, 'new'),
	(70, 'this '),
	(71, 'this '),
	(72, 'this '),
	(73, 'www'),
	(74, 'test'),
	(75, 'this is the dashboard'),
	(76, 'dashboard note'),
	(77, 'this is '),
	(78, 'this is '),
	(79, 'iyi');
/*!40000 ALTER TABLE `data` ENABLE KEYS */;


-- Dumping structure for table weather_db.note
DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `noteid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`noteid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table weather_db.note: ~5 rows (approximately)
DELETE FROM `note`;
/*!40000 ALTER TABLE `note` DISABLE KEYS */;
INSERT INTO `note` (`noteid`, `userid`, `title`, `content`, `date_added`) VALUES
	(1, 1, 'Ioto', 'This is a note', '0000-00-00 00:00:00'),
	(4, 1, 'yet another note 1', ' contents ', '2014-08-26 11:50:11'),
	(5, 1, 'note on the airplane', 'yeeey, this works', '2014-08-26 12:46:15'),
	(7, 1, 'awesome!', '', '2014-08-26 12:46:50'),
	(8, 2, 'new note ', 'wow\r\n', '2014-08-26 12:48:26'),
	(9, 1, 'note ', 'dsdas', '2014-08-27 19:12:36');
/*!40000 ALTER TABLE `note` ENABLE KEYS */;


-- Dumping structure for table weather_db.person
DROP TABLE IF EXISTS `person`;
CREATE TABLE IF NOT EXISTS `person` (
  `person_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `age` int(9) unsigned NOT NULL,
  `gender` varchar(1) NOT NULL,
  PRIMARY KEY (`person_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table weather_db.person: ~3 rows (approximately)
DELETE FROM `person`;
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
INSERT INTO `person` (`person_id`, `name`, `age`, `gender`) VALUES
	(1, 'ioto', 28, 'm'),
	(2, 'john', 21, 'm'),
	(3, 'm&#259;ria', 22, 'f');
/*!40000 ALTER TABLE `person` ENABLE KEYS */;


-- Dumping structure for table weather_db.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role` enum('default','admin','owner') NOT NULL DEFAULT 'default',
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  UNIQUE KEY `uid` (`userid`),
  KEY `uid_2` (`userid`),
  KEY `uid_3` (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table weather_db.user: 7 rows
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`userid`, `role`, `username`, `password`) VALUES
	(1, 'owner', 'ioto', '2f5bff5b8ad4e7d763527faa098c9bd1'),
	(2, 'admin', 'admin', '2f5bff5b8ad4e7d763527faa098c9bd1'),
	(3, 'admin', 'default', '2f5bff5b8ad4e7d763527faa098c9bd1'),
	(5, 'default', 'test', '671256c5f366fe793b2fafa2de658027'),
	(8, 'default', 'defaultdogface', 'fb756591e33222607c8f6e530c689c1b'),
	(7, 'default', 'new', '91f06616c2d35f4af9af391e16e9dffe'),
	(9, 'default', 'whatshisface', '3709f4de2981a854cdc36b2682ed7cf1');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
