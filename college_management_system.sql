-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 30, 2022 at 05:18 PM
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
-- Database: `college_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_type` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `user_name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `user_type`, `email`, `password`, `user_name`) VALUES
(4, 'student', 'student1@example.com', '202cb962ac59075b964b07152d234b70', 'Naresh Sharma'),
(8, 'teacher', 'teacher1@example.com', '202cb962ac59075b964b07152d234b70', 'Amit Patel'),
(6, 'parent', 'parent1@example.com', '202cb962ac59075b964b07152d234b70', 'Ashok Sharma'),
(7, 'librarian', 'librarian1@example.com', '202cb962ac59075b964b07152d234b70', 'Krishna Patel'),
(9, 'counsellor', 'counsellor1@example.com', '202cb962ac59075b964b07152d234b70', 'Chirag Mehta');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `section` text NOT NULL,
  `added_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `title`, `section`, `added_date`) VALUES
(1, 'class 1', 'Section A,Section B,Section C', '2022-07-28'),
(2, 'class 2', 'Section A,Section B', '2022-07-30'),
(3, 'class 3', 'Section A,Section B,Section C', '2022-07-30'),
(4, 'class 4', 'Section A,Section B,Section C,Section D', '2022-07-30');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` text NOT NULL,
  `category` text NOT NULL,
  `duration` text NOT NULL,
  `price` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `course_image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `category`, `duration`, `price`, `date_added`, `course_image`) VALUES
(1, 'Advanced Web Designing', 'programming', '45 hours', 15000, '2022-07-29 10:57:24', 'web_designing.jpg'),
(2, 'Flutter', 'app-development', '30 hours', 15000, '2022-07-29 00:00:00', 'web_designing.jpg'),
(5, 'HTML', 'web-designing', '30 hours', 10000, '2022-07-29 00:00:00', 'web_designing.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

DROP TABLE IF EXISTS `sections`;
CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `title`) VALUES
(1, 'Section A'),
(2, 'Section B'),
(3, 'Section C'),
(6, 'Section D');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
