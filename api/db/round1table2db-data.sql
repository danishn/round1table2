-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2015 at 01:33 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `round1table2db`
--

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `table_id`, `password`, `registration_date`, `last_visit_date`, `member_type`, `status`, `email`, `gcm_id`, `apn_id`, `otp`, `designation`) VALUES
(1, 1, '123', '2015-06-11', '0000-00-00 00:00:00', 0, 1, 'demo@demo.com', '', '', '123', ''),
(2, 2, '123', '2015-06-11', '0000-00-00 00:00:00', 0, 1, 'demo1@demo.com', '', '', '123', '');

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`table_id`, `table_name`, `table_code`, `description`, `created_on`, `status`, `big_url`, `thumb_url`, `members_count`) VALUES
(1, 'KATHMANDU ROUND TABLE 1 - KATHMANDU', 'KRT-1', '', '2015-06-11', 1, '/api/public/images/big/krt1.png', '/api/public/images/thumb/krt1.png', 1),
(2, 'KATHMANDU ELITE ROUND TABLE 2 - KATHMANDU', 'KERT-2', '', '2015-06-11', 1, '/api/public/images/big/kert2.png', '/api/public/images/thumb/kert2.png', 3),
(3, 'BIRGUNJ ROUND TABLE 3 BIRGUNJ', 'BRT-3', '', '2015-06-11', 1, '/api/public/images/big/brt3.png', '/api/public/images/thumb/brt3.png', 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
