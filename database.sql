-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 17, 2020 at 04:27 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `axexamplus`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_answers`
--

DROP TABLE IF EXISTS `tbl_answers`;
CREATE TABLE IF NOT EXISTS `tbl_answers` (
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `opt` int(11) NOT NULL,
  PRIMARY KEY (`question_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_answers_temp`
--

DROP TABLE IF EXISTS `tbl_answers_temp`;
CREATE TABLE IF NOT EXISTS `tbl_answers_temp` (
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `opt` int(11) NOT NULL,
  PRIMARY KEY (`question_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exams`
--

DROP TABLE IF EXISTS `tbl_exams`;
CREATE TABLE IF NOT EXISTS `tbl_exams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exams_questions`
--

DROP TABLE IF EXISTS `tbl_exams_questions`;
CREATE TABLE IF NOT EXISTS `tbl_exams_questions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `exam_id` int(10) DEFAULT NULL,
  `question_number` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `exam_id` (`exam_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` text,
  `token` text,
  `suspend` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_answers`
--
ALTER TABLE `tbl_answers`
  ADD CONSTRAINT `tbl_answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `tbl_exams_questions` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_answers_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_answers_temp`
--
ALTER TABLE `tbl_answers_temp`
  ADD CONSTRAINT `tbl_answers_temp_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `tbl_exams_questions` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_answers_temp_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_exams_questions`
--
ALTER TABLE `tbl_exams_questions`
  ADD CONSTRAINT `tbl_exams_questions_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `tbl_exams` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
