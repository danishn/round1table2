-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2015 at 09:46 PM
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

INSERT INTO `access_requests` (`request_id`, `name`, `email`, `table_name`, `request_date`, `status`, `info`) VALUES
(1, 'danish', 'danish@demo.com', 'RTN', '2015-06-16 17:25:10', 0, ''),
(2, 'danish', 'danish1@demo.com', 'danish', '2015-06-16 17:36:13', 0, ''),
(3, 'danish', '1demo@demo.com', 'RTN', '2015-06-16 21:46:06', 0, ''),
(4, 'danish', 'demoasd@demo.com', 'RTN', '2015-06-16 22:02:56', 0, ''),
(5, 'danish', 'demoasd@demo.com12', 'RTN', '2015-06-20 13:33:51', 0, ''),
(6, 'danish nadaf', 'demo@demo.com12', 'RTN1', '2015-06-20 14:14:17', 0, ''),
(7, 'danish nadaf', 'demo@demo.com123', 'RTN1', '2015-06-20 14:22:06', 0, ''),
(8, 'danish nadaf', 'demoasd@demo.com123', 'RTN', '2015-06-20 15:19:01', 0, '');

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `type`, `short_desc`, `long_desc`, `event_date`, `event_time`, `event_venue`, `created_on`, `member_id`, `is_spause`, `is_children`, `table_count`, `big_url`, `thumb_url`, `status`) VALUES
(1, 'annual get-together1', 'event', '', '', '2015-08-11', '01:30:00', 'Kathmandu', '2015-06-20', 1, 0, 0, 1, '/api/public/images/big/rtn.jpg', '/api/public/images/thumb/rtn.jpg', 'pending'),
(2, 'RTN Event -1', 'event', '', '', '2015-11-12', '05:00:00', 'Kathmandu - BI', '2015-06-20', 1, 0, 0, 4, '/api/public/images/big/rtn.jpg', '/api/public/images/thumb/rtn.jpg', 'pending'),
(3, 'RTN Event -2', 'event', '', '', '2015-08-13', '01:00:00', 'Kathmandu - B', '2015-06-20', 1, 0, 0, 4, '/api/public/images/big/rtn.jpg', '/api/public/images/thumb/rtn.jpg', 'pending'),
(4, 'RTN Event -77', 'event', '', '', '2016-01-12', '01:00:00', 'ABC Venue', '2015-06-20', 1, 0, 0, 1, '/api/public/images/big/rtn.jpg', '/api/public/images/thumb/rtn.jpg', 'pending'),
(5, 'RTN', 'event', '', '', '2016-01-12', '01:00:00', 'test Venue', '2015-06-20', 1, 0, 0, 1, '/api/public/images/big/rtn.jpg', '/api/public/images/thumb/rtn.jpg', 'pending'),
(6, 'RTN', 'event', '', '', '2016-01-12', '01:00:00', 'test Venue', '2015-06-20', 1, 0, 0, 1, '/api/public/images/big/rtn.jpg', '/api/public/images/thumb/rtn.jpg', 'pending'),
(7, 'RTN 123', 'event', '', '', '2016-01-12', '01:00:00', 'test Venue', '2015-06-20', 1, 0, 0, 1, '/api/public/images/big/rtn.jpg', '/api/public/images/thumb/rtn.jpg', 'pending'),
(8, '123 RTN', 'event', '', '', '2016-01-12', '01:00:00', 'test Venue', '2015-06-20', 1, 0, 0, 1, '/api/public/images/big/rtn.jpg', '/api/public/images/thumb/rtn.jpg', 'pending'),
(9, '123 RTN 123', 'event', '', '', '2016-01-12', '01:00:00', 'test Venue', '2015-06-20', 1, 0, 0, 1, '/api/public/images/big/rtn.jpg', '/api/public/images/thumb/rtn.jpg', 'pending'),
(10, 'annual get-together1', 'event', '', '', '2015-08-11', '01:30:00', 'Kathmandu', '2015-06-20', 1, 1, 1, 1, '/api/public/images/big/rtn.jpg', '/api/public/images/thumb/rtn.jpg', 'pending'),
(11, 'annual get-together1', 'event', '', '', '2015-08-11', '01:30:00', 'Kathmandu', '2015-06-20', 1, 0, 1, 1, '/api/public/images/big/rtn.jpg', '/api/public/images/thumb/rtn.jpg', 'pending'),
(12, 'annual get-together1', 'event', '', '', '2015-08-11', '01:30:00', 'Kathmandu', '2015-06-20', 1, 0, 0, 1, '/api/public/images/big/rtn.jpg', '/api/public/images/thumb/rtn.jpg', 'pending'),
(13, 'annual get-together1', 'meeting', '', '', '2015-08-11', '01:30:00', 'Kathmandu', '2015-06-20', 1, 1, 0, 1, '/api/public/images/big/rtn.jpg', '/api/public/images/thumb/rtn.jpg', 'pending'),
(14, 'Imp meeting-1', 'meeting', '', '', '2016-01-15', '01:00:00', 'Kathmandu', '2015-06-21', 1, 1, 0, 3, '', '', 'pending'),
(15, 'Imp meeting-1', 'meeting', '', '', '2016-01-15', '01:00:00', 'Kathmandu', '2015-06-21', 1, 1, 0, 3, '', '', 'pending'),
(16, 'Imp meeting-1', 'meeting', '', '', '2016-01-15', '01:00:00', 'Kathmandu', '2015-06-21', 1, 1, 0, 3, '', '', 'pending'),
(17, 'Imp meeting-1', 'meeting', '', '', '2016-01-15', '01:00:00', 'Kathmandu', '2015-06-21', 1, 1, 0, 3, '', '', 'pending'),
(18, 'Imp+meeting-1', 'event', '', '', '2016-01-15', '00:00:00', 'Kathmandu', '2015-06-21', 1, 1, 0, 1, '/api/public/images/big/rtn.jpg', '/api/public/images/thumb/rtn.jpg', 'pending'),
(19, 'Imp+meeting-1', 'event', '', '', '2016-01-15', '00:00:00', 'Kathmandu', '2015-06-21', 1, 1, 0, 1, '/api/public/images/big/rtn.jpg', '/api/public/images/thumb/rtn.jpg', 'pending'),
(20, 'Imp+meeting-1', 'event', '', '', '2016-01-15', '03:00:00', 'Kathmandu', '2015-06-21', 1, 1, 0, 1, '/api/public/images/big/rtn.jpg', '/api/public/images/thumb/rtn.jpg', 'pending'),
(21, 'Imp+meeting-1', 'event', '', '', '2016-01-15', '12:30:00', 'Kathmandu', '2015-06-21', 1, 1, 0, 1, '/api/public/images/big/rtn.jpg', '/api/public/images/thumb/rtn.jpg', 'pending'),
(22, 'Imp+meeting-1', 'event', '', '', '2016-01-15', '12:30:00', 'Kathmandu', '2015-06-21', 1, 1, 0, 1, '/api/public/images/big/rtn.jpg', '/api/public/images/thumb/rtn.jpg', 'pending'),
(23, 'Imp+meeting-1', 'meeting', '', '', '2016-01-15', '12:30:00', 'Kathmandu', '2015-06-21', 1, 1, 0, 1, '', '', 'pending'),
(24, 'Imp+meeting-1', 'meeting', '', '', '2016-01-15', '12:30:00', 'Kathmandu', '2015-06-21', 1, 1, 0, 1, '', '', 'pending'),
(25, 'Imp+meeting-1', 'meeting', '', '', '2016-01-15', '12:30:00', 'Kathmandu', '2015-06-21', 1, 1, 0, 1, '', '', 'pending'),
(26, 'Imp+meeting-1', 'meeting', '', '', '2016-01-15', '12:30:00', 'Kathmandu', '2015-06-21', 1, 1, 1, 1, '', '', 'pending'),
(27, 'Imp+meeting-1', 'meeting', '', '', '2016-01-15', '12:30:00', 'Kathmandu', '2015-06-21', 1, 1, 1, 1, '', '', 'pending'),
(28, 'Imp+meeting-1', 'meeting', '', '', '2016-01-15', '12:30:00', 'Kathmandu', '2015-06-21', 1, 0, 1, 1, '', '', 'pending'),
(29, 'Imp+Meeting-1', 'meeting', '', '', '2016-01-15', '12:30:00', 'Kathmandu', '2015-06-21', 1, 0, 1, 1, '', '', 'pending'),
(30, 'Meeting+for+RTN+-1', 'meeting', '', '', '2016-01-15', '12:30:00', 'Kathmandu', '2015-06-21', 1, 0, 1, 1, '', '', 'pending'),
(31, 'Meeting+for+RTN+-1', 'event', '', '', '2016-01-15', '12:30:00', 'Kathmandu', '2015-06-21', 1, 0, 1, 1, '/api/public/images/big/rtn.jpg', '/api/public/images/thumb/rtn.jpg', 'pending'),
(32, 'Meeting+for+RTN+-1', 'event', '', '', '2016-01-15', '12:30:00', 'Kathmandu', '2015-06-21', 1, 0, 1, 1, '/api/public/images/big/rtn.jpg', '/api/public/images/thumb/rtn.jpg', 'pending'),
(33, 'Meeting+for+RTN+-1', 'event', '', '', '2016-01-15', '12:30:00', 'Kathmandu+nepal', '2015-06-21', 1, 0, 1, 1, '/api/public/images/big/rtn.jpg', '/api/public/images/thumb/rtn.jpg', 'pending'),
(34, 'Meeting for RTN -1', 'event', '', '', '2016-01-15', '12:30:00', 'Kathmandu nepal', '2015-06-21', 1, 0, 1, 3, '/api/public/images/big/rtn.jpg', '/api/public/images/thumb/rtn.jpg', 'pending'),
(35, 'Meeting for RTN -1', 'event', '', '', '2016-01-15', '12:30:00', 'Kathmandu nepal', '2015-06-21', 1, 0, 1, 3, '/api/public/images/big/rtn.jpg', '/api/public/images/thumb/rtn.jpg', 'pending'),
(36, 'Meeting for RTN -1', 'event', '', '', '2016-01-15', '12:30:00', 'Kathmandu nepal', '2015-06-21', 1, 0, 1, 3, '/api/public/images/big/rtn.jpg', '/api/public/images/thumb/rtn.jpg', 'pending'),
(37, 'RTN+demo', 'event', '', '', '2015-12-13', '12:30:00', 'Nepal', '2015-06-21', 2, 1, 0, 1, '/api/public/images/big/rtn.jpg', '/api/public/images/thumb/rtn.jpg', 'pending'),
(38, 'RTN demo event', 'event', '', '', '2015-12-13', '12:30:00', 'Nepal kat', '2015-06-21', 2, 1, 0, 1, '/api/public/images/big/rtn.jpg', '/api/public/images/thumb/rtn.jpg', 'pending'),
(39, 'RTN demo event', 'event', '', '', '2015-12-13', '12:30:00', 'Nepal kat', '2015-06-21', 2, 1, 0, 1, '/api/public/images/big/rtn.jpg', '/api/public/images/thumb/rtn.jpg', 'pending'),
(40, 'RTN demo event', 'event', '', '', '2015-12-13', '12:30:00', 'Nepal kat', '2015-06-21', 2, 1, 0, 1, '/api/public/images/big/rtn.jpg', '/api/public/images/thumb/rtn.jpg', 'pending'),
(41, 'RTN demo event', 'event', '', '', '2015-12-13', '12:30:00', 'Nepal kat', '2015-06-21', 2, 1, 0, 1, '/api/public/images/big/rtn.jpg', '/api/public/images/thumb/rtn.jpg', 'pending'),
(42, 'RTN demo event', 'event', '', '', '2015-12-13', '12:30:00', 'Nepal kat', '2015-06-21', 2, 1, 0, 1, '/api/public/images/big/rtn.jpg', '/api/public/images/thumb/rtn.jpg', 'pending'),
(43, 'RTN demo event', 'event', '', '', '2015-12-13', '12:30:00', 'Nepal kat', '2015-06-21', 2, 1, 0, 1, '/api/public/images/big/rtn.jpg', '/api/public/images/thumb/rtn.jpg', 'pending'),
(44, 'RTN demo event', 'event', '', '', '2015-12-13', '12:30:00', 'Nepal kat', '2015-06-21', 2, 1, 0, 1, '/api/public/images/big/rtn.jpg', '/api/public/images/thumb/rtn.jpg', 'pending'),
(45, 'RTN demo event', 'event', '', '', '2015-12-13', '12:30:00', 'Nepal kat', '2015-06-21', 2, 1, 0, 1, '/api/public/images/big/rtn.jpg', '/api/public/images/thumb/rtn.jpg', 'pending'),
(46, 'RTN demo event', 'event', '', '', '2015-12-13', '12:30:00', 'Nepal kat', '2015-06-21', 2, 1, 0, 1, '/api/public/images/big/rtn.jpg', '/api/public/images/thumb/rtn.jpg', 'pending'),
(47, 'RTN demo event', 'event', '', '', '2015-12-13', '12:30:00', 'Nepal kat', '2015-06-21', 2, 1, 0, 1, '/api/public/images/big/rtn.jpg', '/api/public/images/thumb/rtn.jpg', 'pending'),
(48, 'RTN demo event', 'event', '', '', '2015-12-13', '12:30:00', 'Nepal kat', '2015-06-21', 2, 1, 0, 1, '/api/public/images/big/events/demo.png', '/api/public/images/thumb/rtn.jpg', 'pending'),
(49, 'RTN demo event', 'event', '', '', '2015-12-13', '12:30:00', 'Nepal kat', '2015-06-21', 2, 1, 0, 1, '/api/public/images/big/events/demo1.png', '/api/public/images/big/events/demo1.png', 'pending'),
(50, 'RTN demo event', 'event', '', '', '2015-12-13', '12:30:00', 'Nepal kat', '2015-06-21', 2, 1, 0, 1, '/api/public/images/big/events/demo2.png', '/api/public/images/big/events/demo2.png', 'pending'),
(51, 'RTN demo event', 'event', '', '', '2015-12-13', '12:30:00', 'Nepal kat', '2015-06-21', 2, 1, 0, 1, '/api/public/images/big/events/demo3.png', '/api/public/images/thumb/events/demo3.png', 'pending'),
(52, 'RTN demo event', 'event', '', '', '2015-12-13', '12:30:00', 'Nepal kat', '2015-06-21', 2, 1, 0, 1, '/api/public/images/big/events/demo4.png', '/api/public/images/thumb/events/demo4.png', 'pending'),
(53, 'RTN demo event', 'event', '', '', '2015-12-13', '12:30:00', 'Nepal kat', '2015-06-21', 2, 1, 0, 1, '/api/public/images/big/events/demo5.png', '/api/public/images/thumb/events/demo5.png', 'pending'),
(54, 'annual get-together1', 'meeting', '', '', '2015-08-11', '01:30:00', 'Kathmandu', '2015-06-21', 1, 1, 0, 2, '', '', 'pending'),
(55, 'annual get-together1', 'meeting', '', '', '2015-08-11', '01:30:00', 'Kathmandu', '2015-06-21', 1, 1, 0, 1, '', '', 'pending'),
(56, 'annual get-together1', 'event', '', '', '2015-08-11', '01:30:00', 'Kathmandu', '2015-06-21', 1, 1, 0, 1, '/api/public/images/big/events/demo_(1).png', '/api/public/images/thumb/events/demo_(1).png', 'pending'),
(57, 'annual get-together1', 'event', '', '', '2015-08-11', '01:30:00', 'Kathmandu', '2015-06-21', 1, 1, 0, 1, '/api/public/images/big/events/demo_(1)1.png', '/api/public/images/thumb/events/demo_(1)1.png', 'pending');

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `table_id`, `password`, `registration_date`, `last_visit_date`, `member_type`, `status`, `email`, `client_id`, `otp`, `designation`) VALUES
(1, 2, '123', '2015-06-11', '0000-00-00 00:00:00', 0, 1, 'demo@demo.com', 'a1b2c3', '13206', ''),
(2, 2, '123', '2015-06-11', '0000-00-00 00:00:00', 0, 1, 'demo1@demo.com', '', 'd1b9d', '');

--
-- Dumping data for table `members_info`
--

INSERT INTO `members_info` (`member_id`, `fname`, `mname`, `lname`, `big_url`, `thumb_url`, `gender`, `dob`, `mobile`, `email`, `reg_date`, `anniversary_date`, `spouse_name`, `spouse_dob`, `spouse_mobile`, `res_addr`, `res_phone`, `res_city`, `office_addr`, `office_phone`, `office_city`, `designation`, `fax`, `website_url`, `other_details`, `state`, `country`, `zip`, `blood_group`, `business_areas`) VALUES
(1, 'asd', 'nasbnd', 'gasfhgj', '/api/public/images/big/members/rtn.jpg', '/api/public/images/thumb/members/rtn.jpg', 'male', '2015-06-18', 'asd', 'danishnadaf@gmail.com', '2015-06-18', '2015-06-06', 'sdad', NULL, NULL, 'sada', NULL, 'asd', 'asd', 'asd', 'sad', NULL, NULL, NULL, NULL, 'asd', 'sad', 'sad', 'ab+ve', 'sad');

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `member_id`, `headline`, `big_url`, `thumb_url`, `description`, `tagline`, `status`, `creation_date`, `news_date`, `publish_date`, `broadcast`, `image_date`) VALUES
(1, 10, 'RTN Website launched', '/api/public/images/big/news/demo_(1)7.png', '/api/public/images/thumb/news/demo_(1)7.png', 'On 15 July%2C 2015. RTN Nepal is Launching Mobile application to connect our members', '', 'pending', '2015-06-21', '2015-06-21', NULL, 'pending', '2015-06-21'),
(2, 10, 'RTN Website launched', '/api/public/images/big/news/demo_(1).png', '/api/public/images/thumb/news/demo_(1).png', 'On 15 July%2C 2015. RTN Nepal is Launching Mobile application to connect our members', '', 'pending', '2015-06-21', '2015-06-21', NULL, 'pending', '2015-06-21'),
(3, 12, 'RTN News -1 sdgfhs', '/api/public/images/big/news/demo_(1)1.png', '/api/public/images/thumb/news/demo_(1)1.png', 'sdkjla sdd sdjkhfkja jgsdjh gydsgjh sdghdsh ghdsghfgdsj  ds  sdjds gsdjhf', '', 'pending', '2015-06-21', '2015-06-21', NULL, 'pending', '2015-06-21'),
(4, 12, 'demo e-news', '/api/public/images/big/news/demo_(1)2.png', '/api/public/images/thumb/news/demo_(1)2.png', 'demo news description%2C demo news description%2C demo news description', '', 'pending', '2015-06-21', '2015-06-21', NULL, 'pending', '2015-06-21'),
(5, 12, 'demo e-news', '/api/public/images/big/news/demo_(1)3.png', '/api/public/images/thumb/news/demo_(1)3.png', 'demo news description%2C demo news description%2C demo news description', '', 'pending', '2015-06-21', '2015-06-21', NULL, 'pending', '2015-06-21'),
(6, 45, 'demo e-news 112345', '/api/public/images/big/news/demo_(1)4.png', '/api/public/images/thumb/news/demo_(1)4.png', '456 546demo news description%2C demo news description%2C demo news description', '', 'pending', '2015-06-21', '2015-06-21', NULL, 'pending', '2015-06-21');

--
-- Dumping data for table `notification_ids`
--

INSERT INTO `notification_ids` (`id`, `member_id`, `os`, `token`) VALUES
(1, 1, 'gcm', 'bndf7000'),
(2, 1, 'gcm', 'bndf700'),
(3, 1, 'gcm', 'bndf70045'),
(4, 1, 'gcm', '123456'),
(5, 1, 'gcm', 'bndf79212q12');

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
