-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 15, 2022 at 06:35 AM
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
-- Database: `dunder_miflin`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `employee_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` varchar(80) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `designation` varchar(20) DEFAULT NULL,
  `date_of_joining` date DEFAULT NULL,
  `salary` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `name`, `date_of_birth`, `address`, `phone`, `designation`, `date_of_joining`, `salary`) VALUES
(2, 'Shane', '2022-09-01', 'asdfsf', 5678901234, 'wizarding', '2022-09-15', 76543),
(3, 'Wilson Fisk', '2022-09-08', 'Wattery lane birmingham', 9999999999, 'wizarding', '2022-09-15', 100000000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
