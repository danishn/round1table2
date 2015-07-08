-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2015 at 11:51 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `access_requests`
--

CREATE TABLE IF NOT EXISTS `access_requests` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `table_name` varchar(100) NOT NULL,
  `request_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL COMMENT '-1-rejected, 0-pending, 1-approved',
  `info` text NOT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `access_requests`
--

INSERT INTO `access_requests` (`request_id`, `name`, `email`, `table_name`, `request_date`, `status`, `info`) VALUES
(1, 'danish', 'danish@demo.com', 'RTN', '2015-06-16 11:40:10', 0, ''),
(2, 'danish', 'danish1@demo.com', 'danish', '2015-06-16 11:51:13', 0, ''),
(3, 'danish', '1demo@demo.com', 'RTN', '2015-06-16 16:01:06', 0, ''),
(4, 'danish', 'demoasd@demo.com', 'RTN', '2015-06-16 16:17:56', 0, ''),
(5, 'danish', 'demoasd@demo.com12', 'RTN', '2015-06-20 07:48:51', 0, ''),
(6, 'danish nadaf', 'demo@demo.com12', 'RTN1', '2015-06-20 08:29:17', 0, ''),
(7, 'danish nadaf', 'demo@demo.com123', 'RTN1', '2015-06-20 08:37:06', 0, ''),
(8, 'danish nadaf', 'demoasd@demo.com123', 'RTN', '2015-06-20 09:34:01', 0, ''),
(9, 'danish nadf', 'demo11@demo.com', 'RTN-1', '2015-06-22 22:26:25', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `last_login` date NOT NULL,
  `date_created` date NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `api_access`
--

CREATE TABLE IF NOT EXISTS `api_access` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `member_id` int(10) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `member_id` (`member_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `conveners`
--

CREATE TABLE IF NOT EXISTS `conveners` (
  `convener_id` int(10) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `table_code` varchar(25) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `image_url` text NOT NULL,
  `details` text NOT NULL,
  PRIMARY KEY (`convener_id`),
  KEY `member_id` (`member_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `conveners`
--

INSERT INTO `conveners` (`convener_id`, `member_id`, `name`, `table_code`, `designation`, `email`, `mobile`, `image_url`, `details`) VALUES
(1, 0, 'Danish C', 'KMRT-4', 'president', 'danish@gmail.com', '9999999999', '/api/public/images/big/favorites/demo_(1)7.png', 'I am convener'),
(2, 0, 'Danish C', 'KMRT-4', 'president', 'danish@gmail.com', '9999999999', '/api/public/images/big/favorites/demo_(1)7.png', 'I am convener'),
(3, 0, 'Tr. Navin Bhansali', 'KMRT-4', 'National President ', ' navin@airtech.com.np', '9801034288', '/api/public/images/big/favorites/demo_(1)7.png', 'I am convener'),
(4, 1, 'Demo Convener', 'KRTM-1', 'Vice President -2', 'demo@demo.com', '7894567812', '/api/public/images/big/conveners/rtn.jpg', 'no detailsas'),
(5, 11, 'Demo', 'KRT-1', 'Vice President', 'demo@demo.com', '78945678', '/api/public/images/big/conveners/rtn.jpg', 'no details'),
(6, 13, 'Demo', 'KRT-1', 'Vice President', 'demo@demo.com', '78945678', '/api/public/images/big/conveners/rtn.jpg', 'no details'),
(7, 13, 'Demo', 'KRT-1', 'Vice President', 'danish@danish.com', '78945678', '/api/public/images/big/conveners/rtn.jpg', 'no details');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int(10) NOT NULL AUTO_INCREMENT,
  `event_name` text NOT NULL,
  `type` varchar(10) NOT NULL,
  `short_desc` text NOT NULL,
  `long_desc` text NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `event_venue` text NOT NULL,
  `created_on` date NOT NULL,
  `member_id` int(11) NOT NULL COMMENT 'created_by',
  `is_spause` tinyint(1) NOT NULL COMMENT '0 - no, 1-yes',
  `is_children` tinyint(1) NOT NULL COMMENT '0-No, 1-Yes',
  `table_count` int(11) NOT NULL COMMENT 'no of invites',
  `big_url` text NOT NULL,
  `thumb_url` text NOT NULL,
  `status` varchar(20) NOT NULL COMMENT 'pending, approved, rejected',
  PRIMARY KEY (`event_id`),
  KEY `member_id` (`member_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='event table' AUTO_INCREMENT=75 ;

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
(13, 'annual get-together1', 'meeting', '', '', '2015-08-11', '01:30:00', 'Kathmandu', '2015-06-20', 1, 1, 0, 1, '', '', 'pending'),
(14, 'Imp meeting-1', 'meeting', '', '', '2016-01-15', '01:00:00', 'Kathmandu', '2015-06-21', 1, 1, 0, 3, '', '', 'pending'),
(15, 'Imp meeting-1', 'meeting', '', '', '2016-01-15', '01:00:00', 'Kathmandu', '2015-06-21', 1, 1, 0, 3, '', '', 'pending'),
(16, 'Imp meeting-1', 'meeting', '', '', '2016-01-15', '01:00:00', 'Kathmandu', '2015-06-21', 1, 1, 0, 3, '', '', 'pending'),
(17, 'Imp meeting-1', 'meeting', '', '', '2016-01-15', '01:00:00', 'Kathmandu', '2015-06-21', 1, 1, 0, 3, '', '', 'pending'),
(65, 'RTN event demo-dan', 'meeting', '', '', '2015-06-30', '17:03:00', 'Kathmandu', '2015-07-01', 1, 0, 0, 3, '', '', 'pending'),
(64, 'RTN event demo-dan', 'meeting', '', '', '2015-06-30', '17:03:00', 'Kathmandu', '2015-06-30', 1, 0, 0, 3, '', '', 'pending'),
(63, 'RTN event demo-dan', 'meeting', '', '', '2015-06-30', '17:03:00', 'Kathmandu', '2015-06-30', 1, 0, 0, 3, '', '', 'pending'),
(62, 'RTN Meeting demo-dan', 'meeting', '', '', '2015-06-30', '17:03:00', 'Kathmandu', '2015-06-30', 1, 1, 0, 3, '', '', 'pending'),
(60, 'RTN Meeting demo-dan', 'meeting', '', '', '2015-11-16', '12:03:00', 'Kathmandu', '2015-06-25', 5, 1, 0, 3, '', '', 'pending'),
(61, 'RTN Meeting demo-dan', 'event', '', '', '2015-11-16', '12:03:00', 'Kathmandu', '2015-06-25', 5, 1, 0, 3, '/api/public/images/big/events/demo6.png', '/api/public/images/thumb/events/demo6.png', 'pending'),
(32, 'Meeting+for+RTN+-1', 'event', '', '', '2016-01-15', '12:30:00', 'Kathmandu', '2015-06-21', 1, 0, 1, 1, '/api/public/images/big/rtn.jpg', '/api/public/images/thumb/rtn.jpg', 'pending'),
(33, 'Meeting+for+RTN+-1', 'event', '', '', '2016-01-15', '12:30:00', 'Kathmandu+nepal', '2015-06-21', 1, 0, 1, 1, '/api/public/images/big/rtn.jpg', '/api/public/images/thumb/rtn.jpg', 'pending'),
(34, 'Meeting for RTN -1', 'event', '', '', '2016-01-15', '12:30:00', 'Kathmandu nepal', '2015-06-21', 1, 0, 1, 3, '/api/public/images/big/rtn.jpg', '/api/public/images/thumb/rtn.jpg', 'pending'),
(74, 'meeting 123', 'meeting', '', '', '2013-07-05', '02:05:00', 'pune', '2015-07-04', 5, 1, 0, 3, '', '', 'pending'),
(73, 'vdnwdnlsn', 'meeting', '', '', '2016-07-09', '02:20:00', 'kathmandu', '2015-07-02', 5, 1, 1, 6, '', '', 'pending'),
(72, 'bzbbxn', 'event', '', '', '2015-10-02', '11:35:00', 'bbzbzn', '2015-07-02', 5, 1, 0, 3, '/api/public/images/big/events/event__1435860166427.png', '/api/public/images/thumb/events/event__1435860166427.png', 'pending'),
(71, 'hzjnxn', 'event', '', '', '2015-09-02', '11:31:00', 'bzzbzb', '2015-07-02', 5, 1, 0, 3, '/api/public/images/big/events/event__1435860004824.png', '/api/public/images/thumb/events/event__1435860004824.png', 'pending'),
(70, 'hhvv', 'event', '', '', '2015-10-02', '11:30:00', 'bbhh', '2015-07-02', 5, 1, 0, 4, '/api/public/images/big/events/event__1435859817595.png', '/api/public/images/thumb/events/event__1435859817595.png', 'pending'),
(69, 'eveny 1', 'event', '', '', '2015-09-02', '01:19:00', 'kathmandu', '2015-07-02', 5, 1, 1, 3, '/api/public/images/big/events/event__1435859234120.png', '/api/public/images/thumb/events/event__1435859234120.png', 'pending'),
(50, 'RTN demo event', 'event', '', '', '2015-12-13', '12:30:00', 'Nepal kat', '2015-06-21', 2, 1, 0, 1, '/api/public/images/big/events/demo2.png', '/api/public/images/big/events/demo2.png', 'pending'),
(51, 'RTN demo event', 'event', '', '', '2015-12-13', '12:30:00', 'Nepal kat', '2015-06-21', 2, 1, 0, 1, '/api/public/images/big/events/demo3.png', '/api/public/images/thumb/events/demo3.png', 'pending'),
(52, 'RTN demo event', 'event', '', '', '2015-12-13', '12:30:00', 'Nepal kat', '2015-06-21', 2, 1, 0, 1, '/api/public/images/big/events/demo4.png', '/api/public/images/thumb/events/demo4.png', 'pending'),
(68, 'RTN Event', 'event', '', '', '2015-06-30', '11:45:00', 'Kathmandu', '2015-07-01', 1, 0, 0, 3, '/api/public/images/big/events/abc.png', '/api/public/images/thumb/events/abc.png', 'pending'),
(54, 'annual get-together1', 'meeting', '', '', '2015-08-11', '01:30:00', 'Kathmandu', '2015-06-21', 1, 1, 0, 2, '', '', 'pending'),
(59, 'RTN Meeting demo-dan', 'meeting', '', '', '2015-06-06', '12:03:00', 'Kathmandu', '2015-06-25', 5, 1, 0, 3, '', '', 'pending'),
(56, 'annual get-together1', 'event', '', '', '2015-08-11', '01:30:00', 'Kathmandu', '2015-06-21', 1, 1, 0, 1, '/api/public/images/big/events/demo_(1).png', '/api/public/images/thumb/events/demo_(1).png', 'pending'),
(66, 'RTN event demo-dan', 'meeting', '', '', '2015-06-30', '17:03:00', 'Kathmandu', '2015-07-01', 1, 0, 0, 3, '', '', 'pending'),
(67, 'Added by danish', 'event', '', '', '2015-07-15', '06:30:00', 'Cybage', '2015-07-01', 12, 1, 0, 3, '/api/public/images/big/events/demo.jpg', '/api/public/images/thumb/events/demo.jpg', 'pending'),
(58, 'KART In', 'meeting', '', '', '2015-07-23', '15:30:00', 'Kath', '2015-06-23', 1, 1, 0, 4, '', '', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `event_tables`
--

CREATE TABLE IF NOT EXISTS `event_tables` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Entry Id for table',
  `event_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `event_id` (`event_id`),
  KEY `table_id` (`table_id`),
  KEY `table_id_2` (`table_id`),
  KEY `table_id_3` (`table_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `event_tables`
--

INSERT INTO `event_tables` (`id`, `event_id`, `table_id`) VALUES
(1, 58, 1),
(2, 58, 12),
(3, 58, 45),
(4, 58, 3),
(5, 59, 2),
(6, 59, 5),
(7, 59, 3),
(8, 60, 2),
(9, 60, 5),
(10, 60, 3),
(11, 61, 2),
(12, 61, 5),
(13, 61, 3),
(14, 62, 2),
(15, 62, 5),
(16, 62, 3),
(17, 63, 2),
(18, 63, 5),
(19, 63, 3),
(20, 64, 2),
(21, 64, 5),
(22, 64, 3),
(23, 65, 2),
(24, 65, 5),
(25, 65, 3),
(26, 66, 2),
(27, 66, 5),
(28, 66, 3),
(29, 67, 1),
(30, 67, 5),
(31, 67, 3),
(32, 68, 2),
(33, 68, 5),
(34, 68, 13),
(35, 69, 0),
(36, 69, 5),
(37, 69, 8),
(38, 70, 0),
(39, 70, 2),
(40, 70, 5),
(41, 70, 7),
(42, 71, 0),
(43, 71, 5),
(44, 71, 7),
(45, 72, 0),
(46, 72, 4),
(47, 72, 7),
(48, 73, 0),
(49, 73, 13),
(50, 73, 17),
(51, 73, 21),
(52, 73, 4),
(53, 73, 9),
(54, 74, 0),
(55, 74, 5),
(56, 74, 8);

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE IF NOT EXISTS `favorites` (
  `brand_id` int(10) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(100) NOT NULL,
  `image_url` text NOT NULL,
  `offer_desc` text NOT NULL,
  `website_url` text NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0-inactive, 1-active',
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='favorite brands' AUTO_INCREMENT=9 ;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`brand_id`, `brand_name`, `image_url`, `offer_desc`, `website_url`, `status`) VALUES
(1, 'ROUND TABLE INTERNATIONAL', '/api/public/images/big/favorites/rti.png', '-', 'www.rtinternational.org', 1),
(2, 'LADIES CIRCLE', '/api/public/images/big/favorites/lc3.png', '-', 'www.ladiescircle.org', 1),
(3, 'WOCO', '/api/public/images/big/favorites/wf.png', '-', 'www.woco.info', 1),
(4, 'ALL4NEPAL', '/api/public/images/big/favorites/an.png', '-', 'www.all4nepal.org', 1),
(5, 'RTI WORLD MEET 2016', '/api/public/images/big/favorites/rt.png', '-', 'www.rtiwm2016.com', 1),
(6, 'SIDDHARTHA BANK', '/api/public/images/big/favorites/sb.png', '-', 'www.siddharthabank.com', 1),
(7, 'UNO CARD', '/api/public/images/big/favorites/uc.png', '-', 'www.uno.com.np', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `image_id` int(10) NOT NULL AUTO_INCREMENT,
  `member_id` int(10) NOT NULL,
  `image_name` text NOT NULL,
  `image_desc` text NOT NULL,
  `submit_date` date NOT NULL,
  PRIMARY KEY (`image_id`),
  KEY `member_id` (`member_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Image Gallery' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`image_id`, `member_id`, `image_name`, `image_desc`, `submit_date`) VALUES
(1, 12, 'adgh45sd6.jkd', 'test upload', '2015-07-08'),
(2, 1, 'adgh421ddsf5sd6.jkd', 'test upload 2', '2015-07-08');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `member_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Member Id',
  `table_id` int(11) NOT NULL,
  `password` varchar(250) NOT NULL,
  `registration_date` date NOT NULL,
  `last_visit_date` datetime NOT NULL,
  `member_type` int(11) NOT NULL COMMENT '0 - member 1- admin',
  `status` tinyint(1) NOT NULL COMMENT '1-active 0- inactive',
  `email` varchar(250) NOT NULL,
  `client_id` varchar(25) NOT NULL COMMENT 'client id for mobile apps',
  `otp` varchar(10) NOT NULL,
  `designation` varchar(250) NOT NULL,
  PRIMARY KEY (`member_id`),
  UNIQUE KEY `email` (`email`,`otp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=119 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `table_id`, `password`, `registration_date`, `last_visit_date`, `member_type`, `status`, `email`, `client_id`, `otp`, `designation`) VALUES
(1, 1, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, 'ajaybansal@wlink.com.np123', 'cid001', 'otp12', 'Demo Designation'),
(2, 1, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '2yaramtex@yahoo.co.in', 'cid002', 'otp12', '-'),
(3, 5, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '3drrksingh_np@yahoo.co.in', 'cid003', 'otp12', 'Designation'),
(4, 4, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, 'rishi@mail.com.np', 'cid004', 'otp12', '-'),
(5, 4, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '5hemant@golchha.com', 'cid005', 'otp12', '-'),
(6, 1, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '6sarawagi@wlink.com.np', 'cid006', 'otp12', '-'),
(7, 1, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '7rara@mos.com.np', 'cid007', 'otp12', '-'),
(8, 1, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '8dtcnepal@hotmail.com', 'cid008', 'otp12', '-'),
(9, 1, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '9kapilsweta@yahoo.com', 'cid009', 'otp12', '-'),
(10, 1, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '10minaimpax@info.com.np', 'cid010', 'otp12', '-'),
(11, 1, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '11rajiv2412@yahoo.com', 'cid011', 'otp12', '-'),
(12, 1, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '12sanjeev@mos.com.np', 'cid012', 'otp12', '-'),
(13, 1, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '13sunilkedia0_jj@yahoo.com', 'cid013', 'otp12', '-'),
(14, 2, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '14jtcl@wlink.com.np', 'cid014', 'otp12', '-'),
(15, 2, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '15mk@kediaorganisation.com', 'cid015', 'otp12', '-'),
(16, 2, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '16tyrehouse@mail.com.np', 'cid016', 'otp12', '-'),
(17, 2, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '17rmcltd@wlink.com.np', 'cid017', 'otp12', '-'),
(18, 2, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '18saurabh@mos.com.np', 'cid018', 'otp12', '-'),
(19, 2, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '19sandeep@raraapparels.com', 'cid019', 'otp12', '-'),
(20, 2, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '20makharia@wlink.com.np', 'cid020', 'otp12', '-'),
(21, 2, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '21khetan@rishav.wlink.com.np', 'cid021', 'otp12', '-'),
(22, 2, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '22shakti@mos.com.np', 'cid022', 'otp12', '-'),
(23, 2, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '23shekhar@golchha.com', 'cid023', 'otp12', '-'),
(24, 2, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '24kankaiboudha@yahoo.com', 'cid024', 'otp12', '-'),
(25, 2, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '25rst@col.com.np', 'cid025', 'otp12', '-'),
(26, 2, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '26info@msgroup.com.np', 'cid026', 'otp12', '-'),
(27, 2, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '27goa@wlink.com.np', 'cid027', 'otp12', '-'),
(28, 2, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '28amarsons@wlink.com.np', 'cid028', 'otp12', '-'),
(29, 2, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '29shivco@wlink.com.np', 'cid029', 'otp12', '-'),
(30, 2, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '30bbaid@wlink.com.np', 'cid030', 'otp12', '-'),
(31, 3, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '31dn.khandelwal@gmail.com', 'cid031', 'otp12', '-'),
(32, 3, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '32', 'cid032', 'otp12', '-'),
(33, 3, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '33mukesh051@gmail.com', 'cid033', 'otp12', '-'),
(34, 3, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '34himalg@atc.net.np', 'cid034', 'otp12', '-'),
(35, 3, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '35arvindkhetan@ntc.net.np', 'cid035', 'otp12', '-'),
(36, 3, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '36manojgas@gmail.com', 'cid036', 'otp12', '-'),
(37, 3, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '37gdgroup@atcnet.com.np', 'cid037', 'otp12', '-'),
(38, 3, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '38rst@cyberspace.com.np', 'cid038', 'otp12', '-'),
(39, 3, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '39sanjay@kedianepal.com', 'cid039', 'otp12', '-'),
(40, 3, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '40sunjaypatwari@gmail.com', 'cid040', 'otp12', '-'),
(41, 3, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '41sitaraintl@gmail.com', 'cid041', 'otp12', '-'),
(42, 3, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '42umeshbirgunj@gmail.com', 'cid042', 'otp12', '-'),
(43, 3, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '43vagrwal@gmail.com', 'cid043', 'otp12', '-'),
(44, 3, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '44rmc.vishnu@gmail.com', 'cid044', 'otp12', '-'),
(45, 3, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '45info_antiquity@yahoo.com', 'cid045', 'otp12', '-'),
(46, 4, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '46twmanpower@wlink.com.np', 'cid046', 'otp12', '-'),
(47, 4, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '47anand@yetishop.com', 'cid047', 'otp12', '-'),
(48, 4, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '48appi@mos.com.np', 'cid048', 'otp12', '-'),
(49, 4, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '49kishan@shivco.wlink.com.np', 'cid049', 'otp12', '-'),
(50, 4, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '50mkpoddar@wlink.com.np', 'cid050', 'otp12', '-'),
(51, 4, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '51navin@ace-organisation.com', 'cid051', 'otp12', '-'),
(52, 4, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '52gdnepal@yahoo.com', 'cid052', 'otp12', '-'),
(53, 4, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '53gangotri@wlink.com.np', 'cid053', 'otp12', '-'),
(54, 4, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '54luharerom@gmail.com', 'cid054', 'otp12', '-'),
(55, 4, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '55arita@wlink.com.np', 'cid055', 'otp12', '-'),
(56, 4, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '56rcpl@wlink.com.np', 'cid056', 'otp12', '-'),
(57, 4, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '57pci@wlink.com.np', 'cid057', 'otp12', '-'),
(58, 4, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '58sanjay_agrawal_l@yahoo.com', 'cid058', 'otp12', '-'),
(59, 4, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '59chok@info.com.np', 'cid059', 'otp12', '-'),
(60, 4, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '60sanjay@golchha.com', 'cid060', 'otp12', '-'),
(61, 4, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '61shepherd@mos.com.np', 'cid061', 'otp12', '-'),
(62, 4, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '62vka@mawnepal.com', 'cid062', 'otp12', '-'),
(63, 4, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '63raees@hotmail.com', 'cid063', 'otp12', '-'),
(64, 5, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '64anuragtransport@mail.com', 'cid064', 'otp12', '-'),
(65, 5, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '65rathi_brt@wlink.com.np', 'cid065', 'otp12', '-'),
(66, 5, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '66sharma@bcn.com.np', 'cid066', 'otp12', '-'),
(67, 5, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '67mayurbrt@wlink.com.np', 'cid067', 'otp12', '-'),
(68, 5, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '68fashion@nns.com.np', 'cid068', 'otp12', '-'),
(69, 5, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '69rekha24461@hotmail.com', 'cid069', 'otp12', '-'),
(70, 5, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '70rkg@golchha.com', 'cid070', 'otp12', '-'),
(71, 5, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '71arun112@mail.com', 'cid071', 'otp12', '-'),
(72, 5, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '72reliancenepal@gmail.com', 'cid072', 'otp12', '-'),
(73, 5, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '73sanjay_brt@wlink.com.np', 'cid073', 'otp12', '-'),
(74, 5, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '74jodh@nns.com.np', 'cid074', 'otp12', '-'),
(75, 5, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '75teakingg@gmail.com', 'cid075', 'otp12', '-'),
(76, 5, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '76manoj.fashion@nns.com.np', 'cid076', 'otp12', '-'),
(77, 6, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '77Ashwani761@gmail.com', 'cid077', 'otp12', '-'),
(78, 6, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '78gaurav4818@yahoo.com', 'cid078', 'otp12', '-'),
(79, 6, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '79hemantagrawal70@yahoo.com', 'cid079', 'otp12', '-'),
(80, 6, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '80siddheswari@vianet.com', 'cid080', 'otp12', '-'),
(81, 6, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '81siddhartha_steel@yahoo.com', 'cid081', 'otp12', '-'),
(82, 6, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '82pawanhl@bcci.com.np', 'cid082', 'otp12', '-'),
(83, 6, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '83rajeev@beriwal.com', 'cid083', 'otp12', '-'),
(84, 6, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '84gsgroup@softtech.com.np', 'cid084', 'otp12', '-'),
(85, 6, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '85agrawalrishi@yahoo.co.in', 'cid085', 'otp12', '-'),
(86, 6, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '86aswanisunil@ntv.yahoo.com', 'cid086', 'otp12', '-'),
(87, 6, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '87sanjay@agrawal.com', 'cid087', 'otp12', '-'),
(88, 7, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '88akash@golchha.com', 'cid088', 'otp12', '-'),
(89, 7, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '89amit@shtcnepal.com', 'cid089', 'otp12', '-'),
(90, 7, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '90amit@beganigroup.com', 'cid090', 'otp12', '-'),
(91, 7, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '91zddnat@wlink.com.np', 'cid091', 'otp12', '-'),
(92, 7, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '92govs1974@yahoo.com', 'cid092', 'otp12', '-'),
(93, 7, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '93hitesh@golchha.com', 'cid093', 'otp12', '-'),
(94, 7, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '94jitendra@mos.com.np', 'cid094', 'otp12', '-'),
(95, 7, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '95eastex@wlink.com.np', 'cid095', 'otp12', '-'),
(96, 7, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '96rahul@gadia.com.np', 'cid096', 'otp12', '-'),
(97, 7, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '97sarawagi53@gmail.com', 'cid097', 'otp12', '-'),
(98, 7, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '98shakt@hotmail.com', 'cid098', 'otp12', '-'),
(99, 7, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '99everest@ntc.net.np', 'cid099', 'otp12', '-'),
(100, 7, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '100sbtodi@gmail.com', 'cid100', 'otp12', '-'),
(101, 7, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '101sachi@wlink.com.np', 'cid101', 'otp12', '-'),
(102, 7, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '102vgroup@mos.com.np', 'cid102', 'otp12', '-'),
(103, 7, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '103tater@wlink.com.np', 'cid103', 'otp12', '-'),
(104, 8, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '104nikhil61184@wlink.com.np', 'cid104', 'otp12', '-'),
(105, 8, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '105navin.kejriwal@gmail.com', 'cid105', 'otp12', '-'),
(106, 20, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '106mlvksons@gmail.com', 'cid106', 'otp12', '-'),
(107, 20, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '107pulses_nepal@yahoo.co.in', 'cid107', 'otp12', '-'),
(108, 8, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '108prakashsaraf74@yahoo.com', 'cid108', 'otp12', '-'),
(109, 8, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '109rahul@cyberspace.com.np', 'cid109', 'otp12', '-'),
(110, 8, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '110deeptyre@gmail.com', 'cid110', 'otp12', '-'),
(111, 8, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '111sanjeevagrawal174@gmail.com', 'cid111', 'otp12', '-'),
(112, 8, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '112shashi_ranjan@yahoo.com', 'cid112', 'otp12', '-'),
(113, 8, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '113shekhar7@hotmail.com', 'cid113', 'otp12', '-'),
(114, 8, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '114sumit@usnet.com.np', 'cid114', 'otp12', '-'),
(115, 8, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '115vkabra@cyberspace.com.np', 'cid115', 'otp12', '-'),
(116, 8, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '116vkarnani@gmail.com', 'cid116', 'otp12', '-'),
(117, 8, 'pwd', '2015-12-02', '2015-12-02 00:00:00', 0, 1, '117jaggroup@atcnet.com.np', 'cid117', 'otp12', '-');

-- --------------------------------------------------------

--
-- Table structure for table `members_info`
--

CREATE TABLE IF NOT EXISTS `members_info` (
  `member_id` int(10) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) NOT NULL,
  `big_url` text NOT NULL,
  `thumb_url` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `reg_date` date NOT NULL,
  `anniversary_date` date DEFAULT NULL,
  `spouse_name` varchar(50) NOT NULL,
  `spouse_dob` date DEFAULT NULL,
  `spouse_mobile` varchar(20) DEFAULT NULL,
  `res_addr` text NOT NULL,
  `res_phone` varchar(20) DEFAULT NULL,
  `res_city` varchar(50) NOT NULL,
  `office_addr` text NOT NULL,
  `office_phone` varchar(20) NOT NULL,
  `office_city` varchar(50) NOT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `website_url` text,
  `other_details` text,
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `zip` varchar(15) NOT NULL,
  `blood_group` varchar(15) NOT NULL,
  `business_areas` text NOT NULL,
  PRIMARY KEY (`member_id`),
  UNIQUE KEY `member_id` (`member_id`),
  KEY `member_id_2` (`member_id`),
  KEY `member_id_3` (`member_id`),
  KEY `member_id_4` (`member_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Members Info';

--
-- Dumping data for table `members_info`
--

INSERT INTO `members_info` (`member_id`, `fname`, `mname`, `lname`, `big_url`, `thumb_url`, `gender`, `dob`, `mobile`, `email`, `reg_date`, `anniversary_date`, `spouse_name`, `spouse_dob`, `spouse_mobile`, `res_addr`, `res_phone`, `res_city`, `office_addr`, `office_phone`, `office_city`, `designation`, `fax`, `website_url`, `other_details`, `state`, `country`, `zip`, `blood_group`, `business_areas`) VALUES
(59, 'Sanjay', NULL, 'Chokhani', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1971-06-14', '+977-9851030876', 'chok@info.com.np', '2015-12-02', '2014-12-02', 'Sunita', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(60, 'Sanjay', NULL, 'Golchha', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1970-04-12', '+977-9851021493', 'sanjay@golchha.com', '2015-12-02', '2014-12-02', 'Seema', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(61, 'Shakti', NULL, 'Begani', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1969-09-13', '+977-9851021407', 'shepherd@mos.com.np', '2015-12-02', '2014-12-02', 'Kirti', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(62, 'Vishnu', NULL, 'Agrawal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1971-09-25', '+977-9851022264', 'vka@mawnepal.com', '2015-12-02', '2014-12-02', 'Tulika', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(63, 'Raees', NULL, 'Uddin', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1967-10-16', '+977-9851064189', 'raees@hotmail.com', '2015-12-02', '2014-12-02', 'Shophia', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(64, 'Dilip', NULL, 'Dharewal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1966-12-08', '9852020554', 'anuragtransport@mail.com', '2015-12-02', '2014-12-02', 'Rose', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(65, 'Dinesh', NULL, 'Rathi', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1963-09-10', '9852020074', 'rathi_brt@wlink.com.np', '2015-12-02', '2014-12-02', 'Vandana', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(66, 'Jayendra', NULL, 'Sharma', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1969-09-21', '9852020201', 'sharma@bcn.com.np', '2015-12-02', '2014-12-02', 'Monica', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(67, 'Kishan', NULL, 'Dhanwat', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1964-08-25', '+977-9851108627', 'mayurbrt@wlink.com.np', '2015-12-02', '2014-12-02', 'Samta', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(68, 'Kishan', NULL, 'Todi', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1967-08-25', '9852020082', 'fashion@nns.com.np', '2015-12-02', '2014-12-02', 'Neetu', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(69, 'Raj K.', NULL, 'Agrawal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1966-12-27', '9852020150', 'rekha24461@hotmail.com', '2015-12-02', '2014-12-02', 'Rekha', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(70, 'Rajkumar', NULL, 'Golchha', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1964-09-24', '9852020007', 'rkg@golchha.com', '2015-12-02', '2014-12-02', 'Sandhya', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(71, 'Rajendra Pd.', NULL, 'Mundra', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1965-01-14', '9852024410', 'arun112@mail.com', '2015-12-02', '2014-12-02', 'Urmila', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(72, 'Rakesh', NULL, 'Surana', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1972-06-17', '9852020051', 'reliancenepal@gmail.com', '2015-12-02', '2014-12-02', 'Jyoti', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(73, 'Sanjay', NULL, 'Agrawal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1967-06-19', '9852022201', 'sanjay_brt@wlink.com.np', '2015-12-02', '2014-12-02', 'Rekha', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(74, 'Subhash', NULL, 'Goyal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1971-08-15', '9852023801', 'jodh@nns.com.np', '2015-12-02', '2014-12-02', 'Rachana', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(75, 'Tarun', NULL, 'Sancheti', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1966-06-01', '9852020190', 'teakingg@gmail.com', '2015-12-02', '2014-12-02', 'Jayshree', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(76, 'Manoj', NULL, 'Todi', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1970-04-24', '9852021921', 'manoj.fashion@nns.com.np', '2015-12-02', '2014-12-02', 'Mukta', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(77, 'Deepak', NULL, 'Aswani', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1971-09-25', '+ 977-9747042008', 'Ashwani761@gmail.com', '2015-12-02', '2014-12-02', 'Ashu', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(78, 'Gaurav', NULL, 'Agrawal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1974-07-27', '+977-9857020247', 'gaurav4818@yahoo.com', '2015-12-02', '2014-12-02', 'Arti', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(79, 'Hemant', NULL, 'Agrawal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1970-01-03', '+977-9857023742', 'hemantagrawal70@yahoo.com', '2015-12-02', '2014-12-02', 'Amita', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(80, 'Kamlesh', NULL, 'Agrawal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1966-10-21', '9857021992', 'siddheswari@vianet.com', '2015-12-02', '2014-12-02', 'Poonam', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(81, 'Manish', NULL, 'Roongta', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1973-08-28', '9857020631', 'siddhartha_steel@yahoo.com', '2015-12-02', '2014-12-02', 'Sunita', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(82, 'Pawan', NULL, 'Halwai', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '0000-00-00', '9857020680', 'pawanhl@bcci.com.np', '2015-12-02', '2014-12-02', 'Ritu', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(83, 'Rajeev', NULL, 'Beriwal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1975-10-17', '9857023052', 'rajeev@beriwal.com', '2015-12-02', '2014-12-02', 'Nitu', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(84, 'Rajesh', NULL, 'Agrawal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1971-05-30', '9857020160', 'gsgroup@softtech.com.np', '2015-12-02', '2014-12-02', 'Benu', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(85, 'Rishi', NULL, 'Agrawal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1965-08-29', '9857020690', 'agrawalrishi@yahoo.co.in', '2015-12-02', '2014-12-02', 'Sangeeta', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(86, 'Sunil', NULL, 'Aswani', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1969-09-18', '', 'aswanisunil@ntv.yahoo.com', '2015-12-02', '2014-12-02', 'Savi', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(87, 'Sanjay', NULL, 'Agrawal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1970-05-12', '9857021685', 'sanjay@agrawal.com', '2015-12-02', '2014-12-02', 'Neelam', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(88, 'Akash', NULL, 'Golchha', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1977-12-08', '+977-9851023519', 'akash@golchha.com', '2015-12-02', '2014-12-02', 'Prerna', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(89, 'Amit', NULL, 'Agrawal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1976-02-18', '+977-9851020384', 'amit@shtcnepal.com', '2015-12-02', '2014-12-02', 'Sweta', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', 'Nepal', '', 'A+', '-'),
(90, 'Amit', NULL, 'Begani', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '0000-00-00', '+977-9851033132', 'amit@beganigroup.com', '2015-12-02', '2014-12-02', 'Suruchi', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(91, 'Atul', NULL, 'Sarawagi', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '0000-00-00', '+977-9851038270', 'zddnat@wlink.com.np', '2015-12-02', '2014-12-02', 'Dipali', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(92, 'Govind', NULL, 'Agrawal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1974-11-13', '+977-9851020360', 'govs1974@yahoo.com', '2015-12-02', '2014-12-02', 'Babita', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(93, 'Hitesh', NULL, 'Golchha', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '0000-00-00', '', 'hitesh@golchha.com', '2015-12-02', '2014-12-02', 'Udita', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(94, 'Jitendra', NULL, 'Baid', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '0000-00-00', '+977-9851079782', 'jitendra@mos.com.np', '2015-12-02', '2014-12-02', 'Shilpa', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(95, 'Mukul', NULL, 'Lohia', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1974-11-26', '+977-9851020655', 'eastex@wlink.com.np', '2015-12-02', '2014-12-02', 'Smita', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(96, 'Rahul', NULL, 'Gadia', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '0000-00-00', '+977-9851022475', 'rahul@gadia.com.np', '2015-12-02', '2014-12-02', 'Anu', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(97, 'Sandeep', NULL, 'Sarawagi', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1973-04-11', '+977-9851038268', 'sarawagi53@gmail.com', '2015-12-02', '2014-12-02', 'Reshmi', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(98, 'Sanjay', NULL, 'Agrawal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1973-03-28', '+977-9851043570', 'shakt@hotmail.com', '2015-12-02', '2014-12-02', 'Puja', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(99, 'Sanjeev', NULL, 'Saraf', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1975-07-19', '+977-9851024421', 'everest@ntc.net.np', '2015-12-02', '2014-12-02', 'Upasana', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(100, 'Shashi Bhusan', NULL, 'Todi', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1978-03-17', '+977-9851032301', 'sbtodi@gmail.com', '2015-12-02', '2014-12-02', 'Nitisha', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(101, 'Sumit', NULL, 'Kedia', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '0000-00-00', '+977-9851034781', 'sachi@wlink.com.np', '2015-12-02', '2014-12-02', 'Ritu', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(102, 'Vishal', NULL, 'Agrawal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '0000-00-00', '+977-9721310014', 'vgroup@mos.com.np', '2015-12-02', '2014-12-02', 'Smita', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(103, 'Vivek', NULL, 'Tater', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1976-12-12', '+977-9851065996', 'tater@wlink.com.np', '2015-12-02', '2014-12-02', 'Payal', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(104, 'Nikhil', NULL, 'Chamria', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '0000-00-00', '', 'nikhil61184@wlink.com.np', '2015-12-02', '2014-12-02', 'Ruby', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(105, 'Naveen', NULL, 'Kejriwal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '0000-00-00', '+977-9855022311', 'navin.kejriwal@gmail.com', '2015-12-02', '2014-12-02', '', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(106, 'Abhishek', NULL, 'Beriwal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1979-11-30', '9857020505', 'mlvksons@gmail.com', '2015-12-02', '2014-12-02', 'Preeti', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(107, 'Sandeep', NULL, 'Agrawal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1975-02-16', '9857020361', 'pulses_nepal@yahoo.co.in', '2015-12-02', '2014-12-02', 'Kirti', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', 'Nepal', '', 'A+', '-'),
(108, 'Prakash', NULL, 'Saraf', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '0000-00-00', '9804206125', 'prakashsaraf74@yahoo.com', '2015-12-02', '2014-12-02', 'Ranjana', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(109, 'Rahul', NULL, 'Lohia', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '0000-00-00', '', 'rahul@cyberspace.com.np', '2015-12-02', '2014-12-02', 'Swati', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(110, 'Ravi', NULL, 'Agrawal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '0000-00-00', '', 'deeptyre@gmail.com', '2015-12-02', '2014-12-02', 'Ruchi', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(111, 'Sanjeev', NULL, 'Agrawal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '0000-00-00', '9855022727', 'sanjeevagrawal174@gmail.com', '2015-12-02', '2014-12-02', 'Shashi', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(112, 'Shashi', NULL, 'Ranjan', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '0000-00-00', '', 'shashi_ranjan@yahoo.com', '2015-12-02', '2014-12-02', 'Vineeta', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', 'Nepal', '', 'A+', '-'),
(113, 'Shekhar', NULL, 'Agrawal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '0000-00-00', '', 'shekhar7@hotmail.com', '2015-12-02', '2014-12-02', 'Nitika', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(1, 'Demo', NULL, 'demo', '/api/public/images/big/members/member_1_profile.jpg', '/api/public/images/thumb/members/member_1_profile.jpg', 'male', '1989-05-13', '789456123', 'ajaybansal@wlink.com.np123', '2015-12-02', '2014-12-11', 'Demo Spouse', '1991-11-15', NULL, '-', '021-123456', 'Pune', '-', '231-4567891', 'Pune', 'Demo Designation', '-', 'test.com', 'this is other details', 'maharashtra', '149', '', 'B+', '-'),
(2, 'Arun', NULL, 'Agrawal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1971-06-29', '+977-9851031599', 'yaramtex@yahoo.co.in', '2015-12-02', '2014-12-02', 'Sweta', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(3, 'Demo123', NULL, 'demo12', '/api/public/images/big/members/member_3_profile.jpg', '/api/public/images/thumb/members/member_3_profile.jpg', 'male', '1989-05-15', '213456', '3drrksingh_np@yahoo.co.in', '2015-12-02', '2015-05-15', 'Spouse', '1989-05-15', NULL, '-', '021 00 123456', 'Pune', '-', '231 00 4567891', 'Pune', 'Designation', '-', 'test.com', 'this is other details', 'maharashtra', '149', '', 'AB-', '-'),
(4, 'Hamendra', NULL, 'Agrawal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1970-02-19', '+977-9851079060', 'rishi@mail.com.np', '2015-12-02', '2014-12-02', 'Rina', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(5, 'Hemant', NULL, 'Golchha', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1970-03-18', '977-9851021057', 'hemant@golchha.com', '2015-12-02', '2014-12-02', 'Rupali', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(6, 'Ajay', NULL, 'Sarawagi', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1970-09-20', '+977-9851022484', 'sarawagi@wlink.com.np', '2015-12-02', '2014-12-02', 'Rachana', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(7, 'Harsh', NULL, 'Garg', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1966-12-29', '', 'rara@mos.com.np', '2015-12-02', '2014-12-02', 'Namrata', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(8, 'Kanhiya', NULL, 'Mittal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1972-04-15', '+977-9851033365', 'dtcnepal@hotmail.com', '2015-12-02', '2014-12-02', 'Roopa', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(9, 'Kapil', NULL, 'Jain', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1978-05-15', '+977-9803097393', 'kapilsweta@yahoo.com', '2015-12-02', '2014-12-02', 'Sweta', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(10, 'Munesh', NULL, 'Jain', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1970-08-08', '+977-9851056422', 'minaimpax@info.com.np', '2015-12-02', '2014-12-02', 'Sapana', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(11, 'Rajiv', NULL, 'Bajoria', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1970-12-24', '+977-9851033352', 'rajiv2412@yahoo.com', '2015-12-02', '2014-12-02', 'Rashmi', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(12, 'Sanjeev', NULL, 'Agrawal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1969-07-26', '+977-9851033365', 'sanjeev@mos.com.np', '2015-12-02', '2014-12-02', 'Suman', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(13, 'Sunil', NULL, 'Kedia', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1971-11-27', '+977-9851055475', 'sunilkedia0_jj@yahoo.com', '2015-12-02', '2014-12-02', 'Richa', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(14, 'Hemant', NULL, 'Gadia', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1967-08-25', '+977-9851022451', 'jtcl@wlink.com.np', '2015-12-02', '2014-12-02', 'Rekha', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(15, 'Manoj', NULL, 'Kedia', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1969-12-01', '+977-9851020442', 'mk@kediaorganisation.com', '2015-12-02', '2014-12-02', 'Savita', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', 'Nepal', '', 'A+', '-'),
(16, 'Raj Kumar', NULL, 'More', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1964-12-24', '+977-9851078103', 'tyrehouse@mail.com.np', '2015-12-02', '2014-12-02', 'Beena', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(17, 'Rajesh', NULL, 'Agrawal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1969-06-05', '+977-9851021890', 'rmcltd@wlink.com.np', '2015-12-02', '2014-12-02', 'Sangita', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(18, 'Rajesh', NULL, 'Jatia', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1969-05-21', '+977-9851024340', 'saurabh@mos.com.np', '2015-12-02', '2014-12-02', 'Sonu', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(19, 'Sandeep', NULL, 'Garg', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1969-11-05', '+977-9851021769', 'sandeep@raraapparels.com', '2015-12-02', '2014-12-02', 'Shivani', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(20, 'Sandeep', NULL, 'Makharia', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1967-05-25', '+977-9851021098', 'makharia@wlink.com.np', '2015-12-02', '2014-12-02', 'Babita', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(21, 'Sanjay K', NULL, 'Khetan', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1969-10-12', '+977-9851030066', 'khetan@rishav.wlink.com.np', '2015-12-02', '2014-12-02', 'Priti', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(22, 'Satish', NULL, 'Kedia', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1967-11-03', '+977-9851023882', 'shakti@mos.com.np', '2015-12-02', '2014-12-02', 'Monika', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(23, 'Shekhar', NULL, 'Golchha', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1966-08-12', '+977-9851020682', 'shekhar@golchha.com', '2015-12-02', '2014-12-02', 'Seema', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(24, 'Shiv K', NULL, 'Agrawal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1966-01-20', '+977-9851020299', 'kankaiboudha@yahoo.com', '2015-12-02', '2014-12-02', 'Usha', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(25, 'Shyam', NULL, 'Mall', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1969-09-27', '+977-9851022275', 'rst@col.com.np', '2015-12-02', '2014-12-02', 'Leela', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(26, 'Sumit K.', NULL, 'Agrawal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1978-08-25', '', 'info@msgroup.com.np', '2015-12-02', '2014-12-02', 'Manju', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(27, 'Sunil', NULL, 'Mehta', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '0000-00-00', '+977-9851023072', 'goa@wlink.com.np', '2015-12-02', '2014-12-02', 'Priti', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(28, 'Umed', NULL, 'Dharewa', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1967-08-05', '+977-9851023701', 'amarsons@wlink.com.np', '2015-12-02', '2014-12-02', 'Vandana', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(29, 'Vijay', NULL, 'Agrawal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1966-12-02', '+977-9851025017', 'shivco@wlink.com.np', '2015-12-02', '2014-12-02', 'Vandana', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(30, 'Vijay', NULL, 'Baidya', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1965-09-24', '+977- 9851020986', 'bbaid@wlink.com.np', '2015-12-02', '2014-12-02', 'Babita', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(31, 'Dinesh', NULL, 'Khandelwal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1969-04-27', '+977-98550 22195', 'dn.khandelwal@gmail.com', '2015-12-02', '2014-12-02', 'Sudha', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(32, 'Dipankar', NULL, 'Kabra', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1972-03-25', '', '', '2015-12-02', '2014-12-02', 'Nitu', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(33, 'Dr. Mukesh', NULL, 'Agrawal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', '', '1968-10-21', '+977-98550 20863', 'mukesh051@gmail.com', '2015-12-02', '2014-12-02', 'Bela', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(34, 'Gopal', NULL, 'Khetan', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1970-05-24', '+977-98550 22713', 'himalg@atc.net.np', '2015-12-02', '2014-12-02', 'Kavita', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(35, 'Arvind', NULL, 'Khetan', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1968-10-28', '+977-98550 22900', 'arvindkhetan@ntc.net.np', '2015-12-02', '2014-12-02', 'Sunita', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(36, 'Manoj K', NULL, 'Das', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1973-12-17', '+977-98450 24828', 'manojgas@gmail.com', '2015-12-02', '2014-12-02', 'Rashmi', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', 'Nepal', '', 'A+', '-'),
(37, 'Rakesh', NULL, 'Chachan', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1971-02-23', '+977-98550 22159', 'gdgroup@atcnet.com.np', '2015-12-02', '2014-12-02', 'Seema', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(38, 'Ram', NULL, 'Malla', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1969-09-27', '+977-98550 23220', 'rst@cyberspace.com.np', '2015-12-02', '2014-12-02', 'Indu', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(39, 'Sanjay', NULL, 'Kedia', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '0000-00-00', '+977-98550 21209', 'sanjay@kedianepal.com', '2015-12-02', '2014-12-02', 'Rashmi', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(40, 'Sunjay', NULL, 'Patwari', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1972-08-12', '+977-98550 20000', 'sunjaypatwari@gmail.com', '2015-12-02', '2014-12-02', 'Pooja', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(41, 'Satish', NULL, 'Agarwal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1973-10-02', '+977-98550 20419', 'sitaraintl@gmail.com', '2015-12-02', '2014-12-02', 'Nisha', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(42, 'Umesh', NULL, 'Agrawal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1968-06-04', '+977-98550 20141', 'umeshbirgunj@gmail.com', '2015-12-02', '2014-12-02', 'Shobha', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(43, 'Vishal', NULL, 'Agrawal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1972-04-19', '+977-98550 22850', 'vagrwal@gmail.com', '2015-12-02', '2014-12-02', 'Rashmi', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(44, 'Vishnu', NULL, 'Agrawal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1971-01-20', '+977-98550 22190', 'rmc.vishnu@gmail.com', '2015-12-02', '2014-12-02', 'Sweety', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(45, 'Vishwa Karan', NULL, 'Jain', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1968-10-21', '', 'info_antiquity@yahoo.com', '2015-12-02', '2014-12-02', 'Sarita', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(46, 'Alok', NULL, 'Taparia', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1970-06-04', '+977-9851025927', 'twmanpower@wlink.com.np', '2015-12-02', '2014-12-02', 'Radhika', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(47, 'Anand', NULL, 'Bagaria', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1972-03-10', '', 'anand@yetishop.com', '2015-12-02', '2014-12-02', 'Renu', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(48, 'Birendra', NULL, 'Baid', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1973-06-01', '+977-9851024233', 'appi@mos.com.np', '2015-12-02', '2014-12-02', 'Archana', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(49, 'Kishan', NULL, 'Agrawal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1971-07-31', '977-9851027683', 'kishan@shivco.wlink.com.np', '2015-12-02', '2014-12-02', 'Sunita', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', 'Nepal', '', 'A+', '-'),
(50, 'Navin', NULL, 'Poddar', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1970-10-07', '+977-9851021015', 'mkpoddar@wlink.com.np', '2015-12-02', '2014-12-02', 'Mansi', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(51, 'Navin', NULL, 'Bhansali', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1975-07-18', '+977-9851034288', 'navin@ace-organisation.com', '2015-12-02', '2014-12-02', 'Mili', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(52, 'Pradeep', NULL, 'Agrawal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1969-11-22', '+977-9851022600', 'gdnepal@yahoo.com', '2015-12-02', '2014-12-02', 'Manju', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(53, 'Pravin', NULL, 'Lohia', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1970-01-27', '+977-9851030172', 'gangotri@wlink.com.np', '2015-12-02', '2014-12-02', 'Sweta', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(54, 'Rahul', NULL, 'More', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1969-11-03', '+977-9851023782', 'luharerom@gmail.com', '2015-12-02', '2014-12-02', 'Ritu', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(55, 'Rajesh K', NULL, 'Jindal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1969-09-26', '+977-9851023212', 'arita@wlink.com.np', '2015-12-02', '2014-12-02', 'Sangeeta', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(56, 'Rishi', NULL, 'Agrawal (Chainwala)', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1974-01-16', '+977-9851006639', 'rcpl@wlink.com.np', '2015-12-02', '2014-12-02', 'Ekta', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(57, 'Sandeep', NULL, 'Sharda', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1972-08-15', '+977-9851020391', 'pci@wlink.com.np', '2015-12-02', '2014-12-02', 'Manisha', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(58, 'Sanjay', NULL, 'Agrawal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1971-10-22', '+977-9841296351', 'sanjay_agrawal_l@yahoo.com', '2015-12-02', '2014-12-02', 'Priya', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(114, 'Sumit', NULL, 'Agrawal', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1976-06-02', '985502220', 'sumit@usnet.com.np', '2015-12-02', '2014-12-02', 'Manisha', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(115, 'Vinay', NULL, 'Kabra', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1976-06-26', '', 'vkabra@cyberspace.com.np', '2015-12-02', '2014-12-02', 'Pallavi', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(116, 'Vishal', NULL, 'Karnani', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1976-01-09', '9855022833', 'vkarnani@gmail.com', '2015-12-02', '2014-12-02', 'Seema', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-'),
(117, 'Vishal', NULL, 'Patwari', '/api/public/images/big/members/default.jpg', '/api/public/images/thumb/members/default.jpg', 'Male', '1972-12-20', '', 'jaggroup@atcnet.com.np', '2015-12-02', '2014-12-02', 'Aparna', NULL, NULL, '-', '52552255', '-', '-', '566565555', '-', '-', '-', 'test.com', 'this is other details', '', '149', '', 'A+', '-');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(10) NOT NULL AUTO_INCREMENT,
  `member_id` int(10) NOT NULL COMMENT 'created_by',
  `headline` text NOT NULL,
  `big_url` text NOT NULL,
  `thumb_url` text NOT NULL,
  `description` text NOT NULL,
  `tagline` text,
  `table_count` int(10) NOT NULL,
  `status` varchar(20) NOT NULL COMMENT 'rejected, pending, approved ',
  `creation_date` date NOT NULL,
  `news_date` date NOT NULL,
  `publish_date` date DEFAULT NULL,
  `broadcast` varchar(20) NOT NULL COMMENT 'failed, broadcasted',
  `image_date` date NOT NULL COMMENT 'image taken on',
  PRIMARY KEY (`news_id`),
  KEY `member_id` (`member_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `member_id`, `headline`, `big_url`, `thumb_url`, `description`, `tagline`, `table_count`, `status`, `creation_date`, `news_date`, `publish_date`, `broadcast`, `image_date`) VALUES
(1, 10, 'RTN Website launched', '/api/public/images/big/news/demo_(1)7.png', '/api/public/images/thumb/news/demo_(1)7.png', 'On 15 July%2C 2015. RTN Nepal is Launching Mobile application to connect our members', '', 0, 'pending', '2015-06-21', '2015-06-21', NULL, 'pending', '2015-06-21'),
(2, 10, 'RTN Website launched', '/api/public/images/big/news/demo_(1).png', '/api/public/images/thumb/news/demo_(1).png', 'On 15 July%2C 2015. RTN Nepal is Launching Mobile application to connect our members', '', 0, 'pending', '2015-06-21', '2015-06-21', NULL, 'pending', '2015-06-21'),
(3, 12, 'RTN News -1 sdgfhs', '/api/public/images/big/news/demo_(1)1.png', '/api/public/images/thumb/news/demo_(1)1.png', 'sdkjla sdd sdjkhfkja jgsdjh gydsgjh sdghdsh ghdsghfgdsj  ds  sdjds gsdjhf', '', 0, 'pending', '2015-06-21', '2015-06-21', NULL, 'pending', '2015-06-21'),
(4, 12, 'demo e-news', '/api/public/images/big/news/demo_(1)2.png', '/api/public/images/thumb/news/demo_(1)2.png', 'demo news description%2C demo news description%2C demo news description', '', 0, 'pending', '2015-06-21', '2015-06-21', NULL, 'pending', '2015-06-21'),
(5, 12, 'demo e-news', '/api/public/images/big/news/demo_(1)3.png', '/api/public/images/thumb/news/demo_(1)3.png', 'demo news description%2C demo news description%2C demo news description', '', 0, 'pending', '2015-06-21', '2015-06-21', NULL, 'pending', '2015-06-21'),
(6, 45, 'demo e-news 112345', '/api/public/images/big/news/demo_(1)4.png', '/api/public/images/thumb/news/demo_(1)4.png', '456 546demo news description%2C demo news description%2C demo news description', '', 0, 'pending', '2015-06-21', '2015-06-21', NULL, 'pending', '2015-06-21'),
(7, 1, 'RTN- News 1', '/api/public/images/big/news/demo_images1.jpg', '/api/public/images/thumb/news/demo_images1.jpg', 'RTN demo news 2015', '', 1, 'pending', '2015-06-23', '2015-06-23', NULL, 'pending', '2015-06-23'),
(8, 1, 'RTN- News 1', '/api/public/images/big/news/demo_images2.jpg', '/api/public/images/thumb/news/demo_images2.jpg', 'RTN demo news 2015', '', 1, 'pending', '2015-06-23', '2015-06-23', NULL, 'pending', '2015-06-23'),
(9, 1, 'RTN- News 1', '/api/public/images/big/news/demo_images3.jpg', '/api/public/images/thumb/news/demo_images3.jpg', 'RTN demo news 2015', '', 4, 'pending', '2015-06-23', '2015-06-23', NULL, 'pending', '2015-06-23'),
(10, 1, 'RTN- News 1', '/api/public/images/big/news/demo_images6.jpg', '/api/public/images/thumb/news/demo_images6.jpg', 'RTN demo news 2015', '', 4, 'pending', '2015-06-23', '2015-06-23', NULL, 'pending', '2015-06-23'),
(11, 1, 'RTN- News 1', '/api/public/images/big/news/demo_images7.jpg', '/api/public/images/thumb/news/demo_images7.jpg', 'RTN demo news 2015', '', 4, 'pending', '2015-06-23', '2015-06-23', NULL, 'pending', '2015-06-23'),
(12, 1, 'RTN- News 1', '/api/public/images/big/news/demo_images8.jpg', '/api/public/images/thumb/news/demo_images8.jpg', 'RTN demo news 2015', '', 4, 'pending', '2015-06-23', '2015-06-23', NULL, 'pending', '2015-06-23'),
(13, 1, 'RTN- News 1', '/api/public/images/big/news/demo_images9.jpg', '/api/public/images/thumb/news/demo_images9.jpg', 'RTN demo news 2015', '', 4, 'pending', '2015-06-23', '2015-06-23', NULL, 'pending', '2015-06-23'),
(14, 12, 'Demo news Headline', '/api/public/images/big/news/demo.png', '/api/public/images/thumb/news/demo.png', 'demo description here', '', 3, 'pending', '2015-06-25', '2015-06-25', NULL, 'pending', '2015-06-25'),
(15, 5, 'demo34', '/api/public/images/big/news/news_1435996093611.png', '/api/public/images/thumb/news/news_1435996093611.png', 'details.  ... ', '', 3, 'pending', '2015-07-04', '2015-07-04', NULL, 'pending', '2015-07-04'),
(16, 5, 'demo 34', '/api/public/images/big/news/news_1435996333841.png', '/api/public/images/thumb/news/news_1435996333841.png', 'bznjzjz', '', 4, 'pending', '2015-07-04', '2015-07-04', NULL, 'pending', '2015-07-04');

-- --------------------------------------------------------

--
-- Table structure for table `news_tables`
--

CREATE TABLE IF NOT EXISTS `news_tables` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Entry Id for table',
  `news_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `news_id` (`news_id`),
  KEY `table_id` (`table_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `news_tables`
--

INSERT INTO `news_tables` (`id`, `news_id`, `table_id`) VALUES
(1, 10, 1),
(2, 10, 12),
(3, 10, 21),
(4, 10, 10),
(5, 11, 1),
(6, 11, 12),
(7, 11, 21),
(8, 11, 10),
(9, 12, 1),
(10, 12, 12),
(11, 12, 21),
(12, 12, 10),
(13, 13, 1),
(14, 13, 12),
(15, 13, 21),
(16, 13, 10),
(17, 14, 1),
(18, 14, 12),
(19, 14, 20),
(20, 15, 0),
(21, 15, 5),
(22, 15, 8),
(23, 16, 0),
(24, 16, 5),
(25, 16, 6),
(26, 16, 8);

-- --------------------------------------------------------

--
-- Table structure for table `notification_ids`
--

CREATE TABLE IF NOT EXISTS `notification_ids` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `member_id` int(10) NOT NULL,
  `os` varchar(20) NOT NULL COMMENT 'gcm/apn',
  `token` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `member_id` (`member_id`),
  KEY `member_id_2` (`member_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `notification_ids`
--

INSERT INTO `notification_ids` (`id`, `member_id`, `os`, `token`) VALUES
(1, 1, 'gcm', ''),
(2, 1, 'gcm', ''),
(3, 1, 'gcm', ''),
(4, 1, 'gcm', ''),
(5, 1, 'gcm', ''),
(6, 1, 'apn', ''),
(7, 1, 'gcm', ''),
(8, 1, 'gcm', ''),
(9, 4, 'gcm', 'asd123asd15as4d6as'),
(10, 4, 'gcm', 'asd123asd15as4d6as');

-- --------------------------------------------------------

--
-- Table structure for table `rsvp`
--

CREATE TABLE IF NOT EXISTS `rsvp` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `member_id` int(10) NOT NULL,
  `event_id` int(10) NOT NULL,
  `rsvp` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'null, yes, no, may_be',
  `response_date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rsvp`
--

INSERT INTO `rsvp` (`id`, `member_id`, `event_id`, `rsvp`, `response_date`) VALUES
(1, 1, 1, 'may be', '2015-07-08'),
(2, 11, 12, 'no', '2015-07-08');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE IF NOT EXISTS `tables` (
  `table_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Table Id',
  `table_name` varchar(250) NOT NULL COMMENT 'Name',
  `table_code` varchar(50) NOT NULL COMMENT 'Table Code',
  `description` text NOT NULL,
  `created_on` date NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0 - inactive 1- active',
  `big_url` varchar(250) NOT NULL,
  `thumb_url` text NOT NULL,
  `members_count` int(10) NOT NULL,
  PRIMARY KEY (`table_id`),
  UNIQUE KEY `table_code` (`table_code`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Table Information Under Round Table Nepal' AUTO_INCREMENT=23 ;

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
(19, 'BIRGUNJ RISING ROUND TABLE 20 - BIRGUNJ', 'BRRT-20', 'BRRT-20', '2015-06-17', 1, '/api/public/images/big/brrt20.png', '/api/public/images/thumb/brrt20.png', 0),
(20, 'Kathmandu Ace Round Table 21 - Kathmandu', 'KART - 21', 'KART - 21', '2015-06-23', 1, '/api/public/images/big/kart21.png', '/api/public/images/thumb/kart21.png', 0),
(21, 'Kathmandu Zeal Round Table 22 - Kathmandu', 'KZRT - 22', 'KZRT - 22', '2015-06-25', 1, '/api/public/images/big/kzrt22.png', '/api/public/images/thumb/kzrt22.png', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
