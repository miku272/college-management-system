-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 18, 2022 at 05:48 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_type` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `user_name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `user_type`, `email`, `password`, `user_name`) VALUES
(4, 'student', 'student1@example.com', '123', 'Naresh Sharma'),
(8, 'teacher', 'teacher1@example.com', '123', 'Amit Patel'),
(6, 'parent', 'parent1@example.com', '123', 'Ashok Sharma'),
(7, 'librarian', 'librarian1@example.com', '123', 'Krishna Patel'),
(9, 'counsellor', 'counsellor1@example.com', '123', 'Chirag Mehta'),
(10, 'counsellor', 'counsellor2@example.com', '123', 'Mohini Patel'),
(11, 'admin', 'admin1@example.com', '123', 'Mohini Patel');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `course_name` text NOT NULL,
  `category` text NOT NULL,
  `duration` int NOT NULL,
  `price` int NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `course_image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `category`, `duration`, `price`, `date_added`, `course_image`) VALUES
(1, 'Bachelors of Business Administration (BBA)', 'Business and Management', 3, 15000, '2022-07-29 10:57:24', 'web_designing.jpg'),
(2, 'Bachelors of Computers Application', 'Computer Science and IT', 3, 15000, '2022-07-29 00:00:00', 'web_designing.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `metadata`
--

DROP TABLE IF EXISTS `metadata`;
CREATE TABLE IF NOT EXISTS `metadata` (
  `id` int NOT NULL AUTO_INCREMENT,
  `item_id` int NOT NULL,
  `meta_key` text NOT NULL,
  `meta_value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `metadata`
--

INSERT INTO `metadata` (`id`, `item_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'section', '4'),
(2, 1, 'section', '5'),
(3, 2, 'section', '6'),
(4, 2, 'section', '7'),
(5, 3, 'section', '8'),
(6, 3, 'section', '9'),
(7, 12, 'day_name', 'monday'),
(27, 18, 'class_id', '1'),
(28, 18, 'section_id', '4'),
(29, 19, 'from', '09:10'),
(30, 19, 'to', '10:00'),
(31, 20, 'from', '10:00'),
(32, 20, 'to', '10:50'),
(33, 21, 'from', '10:50'),
(34, 21, 'to', '11:40'),
(35, 22, 'from', '11:40'),
(36, 22, 'to', '12:30'),
(37, 23, 'from', '12:30'),
(38, 23, 'to', '13:20'),
(39, 24, 'from', '13:20'),
(40, 24, 'to', '14:10'),
(41, 25, 'from', '14:10'),
(42, 25, 'to', '15:00');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `author` int NOT NULL DEFAULT '1',
  `title` text NOT NULL,
  `description` text NOT NULL,
  `type` varchar(100) NOT NULL,
  `publish_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(50) NOT NULL,
  `parent` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author`, `title`, `description`, `type`, `publish_date`, `modified_date`, `status`, `parent`) VALUES
(1, 1, 'First Year (FY)', 'First Year Description', 'class', '2021-06-20 02:32:16', '2022-08-10 13:37:51', 'publish', 0),
(2, 1, 'Second Year (SY)', 'Second Year Description', 'class', '2021-06-20 02:32:16', '2022-08-10 13:36:07', 'publish', 0),
(3, 1, 'Third Year (TY)', 'Third Year Description', 'class', '2021-06-20 02:33:48', '2021-06-20 02:33:48', 'publish', 0),
(4, 1, 'Semester 1', 'Semester 1 Description', 'section', '2021-06-20 02:33:48', '2022-08-10 13:35:13', 'publish', 0),
(5, 1, 'Semester 2', 'Semester 2 Description', 'section', '2021-06-20 02:33:48', '2022-08-10 13:35:06', 'publish', 0),
(6, 1, 'Semester 3', 'Semester 3 Description', 'section', '2021-06-20 02:33:48', '2022-08-10 13:35:06', 'publish', 0),
(7, 1, 'Semester 4', 'Semester 4 Description', 'section', '2021-06-20 02:33:48', '2022-08-10 13:35:06', 'publish', 0),
(8, 1, 'Semester 5', 'Semester 5 Description', 'section', '2021-06-20 02:33:48', '2022-08-10 13:35:06', 'publish', 0),
(9, 1, 'Semester 6', 'Semester 6 Description', 'section', '2021-06-20 02:33:48', '2022-08-10 13:35:06', 'publish', 0),
(18, 1, 'Mathematics', 'Mathematics Description', 'subject', '2022-08-16 18:30:00', '2022-08-17 11:36:00', 'publish', 0),
(19, 1, 'First Period', 'First Period Description', 'period', '2022-08-16 18:30:00', '2022-08-17 11:49:52', 'publish', 0),
(20, 1, 'Second Period', 'Second Period Description', 'period', '2022-08-16 18:30:00', '2022-08-17 11:50:47', 'publish', 0),
(21, 1, 'Third Period', 'Third Period Description', 'period', '2022-08-16 18:30:00', '2022-08-17 11:51:14', 'publish', 0),
(22, 1, 'Fourth Period (Break)', 'Fourth Period (Break) Description', 'period', '2022-08-16 18:30:00', '2022-08-17 11:52:07', 'publish', 0),
(23, 1, 'Fifth Period', 'Fifth Period Description', 'period', '2022-08-16 18:30:00', '2022-08-17 11:53:09', 'publish', 0),
(24, 1, 'Sixth Period', 'Sixth Period Description', 'period', '2022-08-16 18:30:00', '2022-08-17 11:53:36', 'publish', 0),
(25, 1, 'Seventh Period', 'Seventh Period Description', 'period', '2022-08-16 18:30:00', '2022-08-17 11:54:05', 'publish', 0),
(26, 1, 'CPPM', 'CPPM Description', 'subject', '2022-08-16 18:30:00', '2022-08-17 13:04:22', 'publish', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
