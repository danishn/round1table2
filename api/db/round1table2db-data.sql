-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2015 at 11:52 PM
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
-- Dumping data for table `access_requests`
--
/*
INSERT INTO `access_requests` (`request_id`, `name`, `email`, `table_name`, `request_date`, `status`, `info`) VALUES
(1, 'danish', 'danish@demo.com', 'RTN', '2015-06-16 17:25:10', 0, ''),
(2, 'danish', 'danish1@demo.com', 'danish', '2015-06-16 17:36:13', 0, '');
*/
--
-- Dumping data for table `members`
--
/*
INSERT INTO `members` (`member_id`, `table_id`, `password`, `registration_date`, `last_visit_date`, `member_type`, `status`, `email`, `client_id`, `otp`, `designation`) VALUES
(1, 1, '123', '2015-06-11', '0000-00-00 00:00:00', 0, 1, 'demo@demo.com', 'a1b2c3', '998aa', ''),
(2, 2, '123', '2015-06-11', '0000-00-00 00:00:00', 0, 1, 'demo1@demo.com', '', '7995a', '');
*/
--
-- Dumping data for table `members_info`
--

INSERT INTO `members_info` (`member_id`, `fname`, `mname`, `lname`, `big_url`, `thumb_url`, `gender`, `dob`, `mobile`, `email`, `reg_date`, `anniversary_date`, `spouse_name`, `spouse_dob`, `spouse_mobile`, `res_addr`, `res_phone`, `res_city`, `office_addr`, `office_phone`, `office_city`, `designation`, `fax`, `website_url`, `other_details`, `state`, `country`, `zip`, `blood_group`, `business_areas`) VALUES
(1, 'demo', 'd', 'name', '/api/public/images/big/members/rtn.jpg', '/api/public/images/thumb/members/rtn.jpg', 'male', '1989-08-15', '8793700938', 'danishnadaf@gmail.com', '2015-06-18', '2010-08-15', 'demo', '1991-08-15', '123456789', 'pune', '123456', 'pune', 'pune', '-', 'pune', 'SE', '123', NULL, NULL, 'maharashtra', 'india', '411061', 'B+ve', 'Software'),
(2, 'demo1', NULL, 'name2', '/api/public/images/big/members/rtn.jpg', '/api/public/images/thumb/members/rtn.jpg', 'male', '1988-06-18', '123456789', 'danishn@technokratz.in', '2015-06-18', NULL, 'abc', NULL, NULL, 'abc', NULL, 'zz', 'zzzz', '456', 'asda', NULL, NULL, NULL, NULL, 'saaa', 'asd', 'sadas', 'O+ve', 'asd asd asd');

--
-- Dumping data for table `notification_ids`
--
/*
INSERT INTO `notification_ids` (`id`, `member_id`, `os`, `token`) VALUES
(1, 1, 'gcm', '12345'),
(4, 2, 'gcm', '123451'),
(5, 1, 'gcm', '123110'),
(7, 1, 'gcm', '123a110'),
(8, 1, 'gcm', '12311011'),
(10, 1, 'gcm', '123110111'),
(11, 1, 'gcm', 'dsfsjlhdfi');
*/
--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`table_id`, `table_name`, `table_code`, `description`, `created_on`, `status`, `big_url`, `thumb_url`, `members_count`) VALUES
(1, 'KATHMANDU ROUND TABLE 1 - KATHMANDU', 'KRT-1', 'KRT-1', '2015-06-11', 1, '/api/public/images/big/krt1.png', '/api/public/images/thumb/krt1.png', 1),
(2, 'KATHMANDU ELITE ROUND TABLE 2 - KATHMANDU', 'KERT-2', 'KERT-2', '2015-06-11', 1, '/api/public/images/big/kert2.png', '/api/public/images/thumb/kert2.png', 3),
(3, 'BIRGUNJ ROUND TABLE 3 BIRGUNJ', 'BRT-3', 'BRT-3', '2015-06-11', 1, '/api/public/images/big/brt3.png', '/api/public/images/thumb/brt3.png', 5),
(4, 'KATHMANDU METRO ROUND TABLE 4 - KATHMANDU', 'KMRT-4', 'KMRT-4', '2015-06-17', 1, '/api/public/images/big/kmrt4.png', '/api/public/images/thumb/kmrt4.png', 0),
(5, 'BIRATNAGAR ROUND TABLE 5 - BIRATNAGAR', 'BRT-5', 'BRT-5', '2015-06-17', 1, '/api/public/images/big/brt5.png', '/api/public/images/thumb/brt5.png', 0),
(6, 'SIDDHARTHNAGAR ROUND TABLE 6 - BHAIRWAHA', 'SRT-6', 'SRT-6', '2015-06-17', 1, '/api/public/images/big/srt6.png', '/api/public/images/thumb/srt6.png', 0),
(7, 'KATHMANDU ICON ROUND TABLE 7 - KATHMANDU', 'KIRT-7', 'KIRT-7', '2015-06-17', 1, '/api/public/images/big/kirt7.png', '/api/public/images/thumb/kirt7.png', 0),
(8, 'BIRGUNJ FRIENDS ROUND TABLE 8 - BIRGUNJ', 'BFRT-8', 'BFRT-8', '2015-06-17', 1, '/api/public/images/big/bfrt8.png', '/api/public/images/thumb/bfrt8.png', 0),
(9, 'BIRATNAGAR PRIME ROUND TABLE 10 - BIRATNAGAR', 'BPRT-10', 'BPRT-10', '2015-06-17', 1, '/api/public/images/big/bprt10.png', '/api/public/images/thumb/bprt10.png', 0),
(10, 'BIRTNAGAR PLATINUM ROUND TABLE 11 - BIRATNAGAR', 'BPRT-11', 'BPRT-11', '2015-06-17', 1, '/api/public/images/big/bprt11.png', '/api/public/images/thumb/bprt11.png', 0),
(11, 'KATHMANDU CENTRAL ROUND TABLE 12 - KATHMANDU', 'KCRT-12', 'KCRT-12', '2015-06-17', 1, '/api/public/images/big/kcrt12.png', '/api/public/images/thumb/kcrt12.png', 0),
(12, 'BIRGUNJ YOUTH ROUND TABLE 13 - BIRGUNJ', 'BYRT-13', 'BYRT-13', '2015-06-17', 1, '/api/public/images/big/byrt13.png', '/api/public/images/thumb/byrt13.png', 0),
(13, 'NARAYANGHAR ROUND TABLE 14 - NARAYANGHAR', 'NRT-14', 'NRT-14', '2015-06-17', 1, '/api/public/images/big/nrt14.png', '/api/public/images/thumb/nrt14.png', 0),
(14, 'BIRATNAGAR CENTRAL ROUND TABLE 15 - BIRATNAGAR', 'BCRT-15', 'BCRT-15', '2015-06-17', 1, '/api/public/images/big/bcrt15.png', '/api/public/images/thumb/bcrt15.png', 0),
(15, 'LUMBINI ROUND TABLE 16 - BHAIRWAHA', 'LRT-16', 'LRT-16', '2015-06-17', 1, '/api/public/images/big/lrt16.png', '/api/public/images/thumb/lrt16.png', 0),
(16, 'KATHMANDU UNITED ROUND TABLE 17 - KATHMANDU', 'KURT-17', 'KURT-17', '2015-06-17', 1, '/api/public/images/big/kurt17.png', '/api/public/images/thumb/kurt17.png', 0),
(17, 'BIRATNAGAR SAPPHIRE ROUND TABLE 18 - BIRATNAGAR', 'BSRT-18', 'BSRT-18', '2015-06-17', 1, '/api/public/images/big/bsrt18.png', '/api/public/images/thumb/bsrt18.png', 0),
(18, 'KATHMANDU BLUES ROUND TABLE 19 - KATHMANDU', 'KBRT-19', 'KBRT-19', '2015-06-17', 1, '/api/public/images/big/kbrt19.png', '/api/public/images/thumb/kbrt19.png', 0),
(19, 'BIRGUNJ RISING ROUND TABLE 20 - BIRGUNJ', 'BRRT-20', 'BRRT-20', '2015-06-17', 1, '/api/public/images/big/brrt20.png', '/api/public/images/thumb/brrt20.png', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
