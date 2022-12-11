-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 11, 2022 at 11:58 AM
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
  PRIMARY KEY (`envelope_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `envelope`
--

INSERT INTO `envelope` (`envelope_id`, `user_id`, `envelopes`, `time`, `file_name`, `envelope_used`) VALUES
(1, 2, 500, '2022-12-09 15:53:32', NULL, NULL),
(2, 1, 555, '2022-12-09 15:53:58', NULL, NULL),
(3, 2, 555, '2022-12-10 15:01:21', NULL, NULL),
(4, 2, 45, '2022-12-10 15:01:35', NULL, NULL),
(5, 2, NULL, '2022-12-10 18:55:16', NULL, NULL),
(6, 2, NULL, '2022-12-10 18:56:20', NULL, NULL),
(7, 2, NULL, '2022-12-10 18:59:59', 'RINKIPRASAD SAHA_ApplicationForm.pdf', NULL),
(8, 2, NULL, '2022-12-10 19:12:22', NULL, NULL),
(9, 2, NULL, '2022-12-10 19:21:33', 'rinki_internship_appreciation1.pdf', NULL),
(10, 2, NULL, '2022-12-10 19:40:24', 'rinki_internship_appreciation2.pdf', NULL),
(11, 2, NULL, '2022-12-10 19:42:04', 'rinki_internship_appreciation3.pdf', NULL),
(12, 2, NULL, '2022-12-10 19:42:39', 'rinki_Internship_Certificate.pdf', NULL),
(13, 3, NULL, '2022-12-11 06:25:14', 'rinki_Internship_Certificate1.pdf', 1),
(14, 3, NULL, '2022-12-11 06:35:51', 'rinki_Internship_Certificate2.pdf', 1),
(15, 3, NULL, '2022-12-11 06:37:29', 'RINKI_PRASAD_SAHA11.pdf', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`page_id`, `user_id`, `pages`, `time`, `page_used`) VALUES
(3, 2, 110, '2022-12-09 16:47:55', NULL),
(6, 2, 321, '2022-12-10 11:40:05', NULL),
(5, 3, 700, '2022-12-10 10:24:51', NULL),
(7, 2, 1000, '2022-12-10 15:01:03', NULL),
(8, 2, 0, '2022-12-10 19:42:04', 0),
(9, 2, 0, '2022-12-10 19:42:39', 0),
(10, 3, 0, '2022-12-11 06:25:26', 0),
(11, 3, 0, '2022-12-11 06:35:53', 1),
(12, 3, 0, '2022-12-11 06:37:29', 2);

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
  `user_type` enum('Admin','User') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_type`) VALUES
(1, 'Sandipan', 'grandred@demo.com', '0b340aecc87b4eceecf5c4105839aaa3', 'Admin'),
(2, 'Rahul Pal Chowdhury', 'rahul@wellnessslg.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin'),
(3, 'rinki', 'rinki@test', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
