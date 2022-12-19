-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 19, 2022 at 01:30 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `well_report`
--

-- --------------------------------------------------------

--
-- Table structure for table `envelope`
--

DROP TABLE IF EXISTS `envelope`;
CREATE TABLE IF NOT EXISTS `envelope` (
  `envelope_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `envelopes` int(11) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `file_name` varchar(255) DEFAULT NULL,
  `envelope_used` int(11) DEFAULT NULL,
  `manager` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`envelope_id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `envelope`
--

INSERT INTO `envelope` (`envelope_id`, `user_id`, `envelopes`, `time`, `file_name`, `envelope_used`, `manager`) VALUES
(41, 3, NULL, '2022-12-14 16:04:08', NULL, 1, NULL),
(42, 3, NULL, '2022-12-14 16:04:34', NULL, 1, NULL),
(44, 3, NULL, '2022-12-14 16:14:09', NULL, 1, NULL),
(45, 3, NULL, '2022-12-14 16:20:42', NULL, 1, NULL),
(38, 2, 10, '2022-12-14 15:54:10', NULL, NULL, NULL),
(39, 2, NULL, '2022-12-14 15:54:33', 'rinki_internship_appreciation14.pdf', 1, NULL),
(52, 7, NULL, '2022-12-17 16:24:52', 'rinki_Internship_Certificate.pdf', 1, 'qwerty'),
(48, 3, NULL, '2022-12-17 13:45:49', 'rinki_internship_appreciation1.pdf', 1, 'rinki'),
(49, 3, NULL, '2022-12-17 13:48:17', 'rinki_internship_appreciation2.pdf', 1, NULL),
(50, 5, NULL, '2022-12-17 13:50:18', 'rinki_internship_appreciation3.pdf', 1, 'qwerty'),
(51, 3, NULL, '2022-12-17 13:50:45', 'rinki_internship_appreciation4.pdf', 1, 'qwerty'),
(53, 7, NULL, '2022-12-17 16:29:33', 'rinki_internship_appreciation.pdf', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lastlogin`
--

DROP TABLE IF EXISTS `lastlogin`;
CREATE TABLE IF NOT EXISTS `lastlogin` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`login_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lastlogin`
--

INSERT INTO `lastlogin` (`login_id`, `user_id`, `last_login`) VALUES
(1, 3, '2022-12-14 10:11:58'),
(2, 3, '2022-12-14 10:31:30'),
(3, 3, '2022-12-14 12:23:21'),
(4, 3, '2022-12-17 07:14:27'),
(5, 4, '2022-12-17 12:42:43'),
(6, 5, '2022-12-17 12:46:53'),
(7, 5, '2022-12-17 12:48:26'),
(8, 5, '2022-12-17 12:51:59'),
(9, 3, '2022-12-17 13:45:19'),
(10, 5, '2022-12-17 13:49:17'),
(11, 4, '2022-12-17 14:53:52'),
(12, 3, '2022-12-17 15:26:57'),
(13, 3, '2022-12-17 15:29:35'),
(14, 5, '2022-12-17 16:19:31'),
(15, 7, '2022-12-17 16:25:59');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

DROP TABLE IF EXISTS `page`;
CREATE TABLE IF NOT EXISTS `page` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `pages` int(11) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `page_used` int(11) DEFAULT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`page_id`, `user_id`, `pages`, `time`, `page_used`) VALUES
(70, 7, NULL, '2022-12-17 16:29:38', 1),
(69, 7, NULL, '2022-12-17 16:24:53', 1),
(68, 3, NULL, '2022-12-17 16:11:37', -1),
(67, 3, NULL, '2022-12-17 13:50:46', 1),
(66, 5, NULL, '2022-12-17 13:50:18', 1),
(65, 3, NULL, '2022-12-17 13:48:17', 1),
(64, 3, NULL, '2022-12-17 13:45:50', 1),
(63, 3, NULL, '2022-12-17 13:44:20', 1),
(62, 3, NULL, '2022-12-17 07:17:06', -1),
(61, 3, NULL, '2022-12-17 07:16:38', 1),
(60, 3, NULL, '2022-12-17 07:15:18', -1),
(59, 3, NULL, '2022-12-14 16:20:42', 0),
(58, 3, NULL, '2022-12-14 16:14:09', 0),
(57, 3, 10, '2022-12-14 16:06:14', NULL),
(56, 3, NULL, '2022-12-14 16:04:56', 1),
(55, 3, NULL, '2022-12-14 16:04:34', 0),
(54, 3, NULL, '2022-12-14 16:04:08', 0),
(53, 2, NULL, '2022-12-14 15:55:09', -2),
(52, 2, NULL, '2022-12-14 15:54:55', 2),
(51, 2, NULL, '2022-12-14 15:54:33', 1),
(50, 2, 10, '2022-12-14 15:54:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` enum('Admin','User','Manager') COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_type`, `note`) VALUES
(1, 'Sandipan', 'grandred@demo.com', '0b340aecc87b4eceecf5c4105839aaa3', 'Admin', ''),
(2, 'Rahul Pal Chowdhury', 'rahul@wellnessslg.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin', ''),
(4, 'test', 'test@com', '827ccb0eea8a706c4c34a16891f84e7b', 'User', ''),
(5, 'qwerty', 'qwerty@com', '827ccb0eea8a706c4c34a16891f84e7b', 'Manager', ''),
(7, 'rinki', 'rinki@test', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin', 'jngh hfh');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
