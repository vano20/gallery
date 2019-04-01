-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.9-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for gallery
CREATE DATABASE IF NOT EXISTS `gallery` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `gallery`;

-- Dumping structure for table gallery.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `cmt_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cmt_photo` int(10) unsigned NOT NULL,
  `cmt_user` int(10) unsigned NOT NULL,
  `cmt_body` varchar(255) NOT NULL,
  `cmt_dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cmt_id`),
  KEY `photo id` (`cmt_photo`),
  KEY `user id` (`cmt_user`),
  CONSTRAINT `photo id` FOREIGN KEY (`cmt_photo`) REFERENCES `photos` (`pht_id`),
  CONSTRAINT `user id` FOREIGN KEY (`cmt_user`) REFERENCES `users` (`usr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='table for photo comments';

-- Dumping data for table gallery.comments: ~0 rows (approximately)
DELETE FROM `comments`;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Dumping structure for table gallery.photos
CREATE TABLE IF NOT EXISTS `photos` (
  `pht_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pht_title` varchar(50) NOT NULL,
  `pht_caption` varchar(100) NOT NULL,
  `pht_alternatetext` varchar(100) NOT NULL,
  `pht_description` text NOT NULL,
  `pht_filename` varchar(255) NOT NULL,
  `pht_type` varchar(50) NOT NULL,
  `pht_size` int(11) NOT NULL,
  `pht_dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pht_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COMMENT='table for photos path and owner';

-- Dumping data for table gallery.photos: ~3 rows (approximately)
DELETE FROM `photos`;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT INTO `photos` (`pht_id`, `pht_title`, `pht_caption`, `pht_alternatetext`, `pht_description`, `pht_filename`, `pht_type`, `pht_size`, `pht_dateadded`) VALUES
	(6, 'Car 1', 'Lamborghini', 'Lamborghini Ventox', 'It\'s a super car, created by an italian who was worked with enzo ferrari', 'images-1.jpg', 'image/jpeg', 28947, '2019-03-09 19:09:24'),
	(7, 'Car 2', 'Chavy', 'Chevrolet', 'It\'s Chevo, chevrolet, chavy car', 'images_2.jpg', 'image/jpeg', 18578, '2019-03-09 19:15:22'),
	(8, 'Car 3', '', '', '', 'images-3.jpg', 'image/jpeg', 18096, '2019-03-09 18:45:07'),
	(9, 'Large Car 1', '', '', '', '_large_image_1.jpg', 'image/jpeg', 479843, '2019-03-09 20:07:38');
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;

-- Dumping structure for table gallery.users
CREATE TABLE IF NOT EXISTS `users` (
  `usr_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `usr_username` varchar(50) NOT NULL,
  `usr_password` varchar(255) NOT NULL,
  `usr_firstname` varchar(50) DEFAULT NULL,
  `usr_lastname` varchar(50) DEFAULT NULL,
  `usr_pic` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`usr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COMMENT='users table';

-- Dumping data for table gallery.users: ~0 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`usr_id`, `usr_username`, `usr_password`, `usr_firstname`, `usr_lastname`, `usr_pic`) VALUES
	(1, 'vano20', 'Rahasia', 'savano', 'miatama', 'images-20.jpg');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
