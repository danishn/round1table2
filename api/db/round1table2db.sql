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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

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
  `designation` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `image-url` text NOT NULL,
  `details` text NOT NULL,
  PRIMARY KEY (`convener_id`),
  KEY `member_id` (`member_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='event table' AUTO_INCREMENT=58 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='favorite brands' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `image_id` int(10) NOT NULL AUTO_INCREMENT,
  `member_id` int(10) NOT NULL,
  `big_url` text NOT NULL,
  `thumb_url` text NOT NULL,
  `submit_date` date NOT NULL,
  `image_desc` text NOT NULL,
  PRIMARY KEY (`image_id`),
  KEY `member_id` (`member_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Image Gallery' AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `table_id`, `password`, `registration_date`, `last_visit_date`, `member_type`, `status`, `email`, `client_id`, `otp`, `designation`) VALUES
(1, 2, '123', '2015-06-11', '0000-00-00 00:00:00', 0, 1, 'demo@demo.com', 'a1b2c3', '13206', ''),
(2, 2, '123', '2015-06-11', '0000-00-00 00:00:00', 0, 1, 'demo1@demo.com', '', 'd1b9d', '');

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
(1, 'asd', 'nasbnd', 'gasfhgj', '/api/public/images/big/members/rtn.jpg', '/api/public/images/thumb/members/rtn.jpg', 'male', '2015-06-18', 'asd', 'danishnadaf@gmail.com', '2015-06-18', '2015-06-06', 'sdad', NULL, NULL, 'sada', NULL, 'asd', 'asd', 'asd', 'sad', NULL, NULL, NULL, NULL, 'asd', 'sad', 'sad', 'ab+ve', 'sad');

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
  `status` varchar(20) NOT NULL COMMENT 'rejected, pending, approved ',
  `creation_date` date NOT NULL,
  `news_date` date NOT NULL,
  `publish_date` date DEFAULT NULL,
  `broadcast` varchar(20) NOT NULL COMMENT 'failed, broadcasted',
  `image_date` date NOT NULL COMMENT 'image taken on',
  PRIMARY KEY (`news_id`),
  KEY `member_id` (`member_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notification_ids`
--

CREATE TABLE IF NOT EXISTS `notification_ids` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `member_id` int(10) NOT NULL,
  `os` varchar(20) NOT NULL COMMENT 'gcm/apn',
  `token` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `notification_id` (`token`),
  KEY `member_id` (`member_id`),
  KEY `member_id_2` (`member_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `notification_ids`
--

INSERT INTO `notification_ids` (`id`, `member_id`, `os`, `token`) VALUES
(1, 1, 'gcm', 'bndf7000'),
(2, 1, 'gcm', 'bndf700'),
(3, 1, 'gcm', 'bndf70045'),
(4, 1, 'gcm', '123456'),
(5, 1, 'gcm', 'bndf79212q12');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Table Information Under Round Table Nepal' AUTO_INCREMENT=22 ;

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
