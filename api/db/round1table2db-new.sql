-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2015 at 12:27 AM
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
  `request_date` timestamp NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '-1-rejected, 0-pending, 1-approved',
  `info` text NOT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `access_requests`
--

INSERT INTO `access_requests` (`request_id`, `name`, `email`, `table_name`, `request_date`, `status`, `info`) VALUES
(1, 'danish', 'danish@demo.com', 'RTN', '2015-06-16 17:25:10', 0, ''),
(2, 'danish', 'danish1@demo.com', 'danish', '2015-06-16 17:36:13', 0, '');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `family` tinyint(1) NOT NULL COMMENT '0 - family-no, 1- family-yes',
  `big_url` text NOT NULL,
  `thumb_url` text NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '-1-rejected, 0-pending, 1-approved',
  PRIMARY KEY (`event_id`),
  KEY `member_id` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='event table' AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='favorite brands' AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Image Gallery' AUTO_INCREMENT=1 ;

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
  `status` tinyint(1) NOT NULL COMMENT '0-active 1- inactive',
  `email` varchar(250) NOT NULL,
  `client_id` varchar(25) NOT NULL COMMENT 'client id for mobile apps',
  `otp` varchar(10) NOT NULL,
  `designation` varchar(250) NOT NULL,
  PRIMARY KEY (`member_id`),
  UNIQUE KEY `email` (`email`,`otp`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `table_id`, `password`, `registration_date`, `last_visit_date`, `member_type`, `status`, `email`, `client_id`, `otp`, `designation`) VALUES
(1, 1, '123', '2015-06-11', '0000-00-00 00:00:00', 0, 1, 'demo@demo.com', 'a1b2c3', '10869', ''),
(2, 2, '123', '2015-06-11', '0000-00-00 00:00:00', 0, 1, 'demo1@demo.com', '', '7995a', '');

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
  `blood_group` varchar(8) NOT NULL,
  `business_areas` text NOT NULL,
  PRIMARY KEY (`member_id`),
  UNIQUE KEY `member_id` (`member_id`),
  KEY `member_id_2` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Members Info';

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
  `status` tinyint(1) NOT NULL COMMENT '-1-rejected, 0-pending, 1 - approved ',
  `creation_date` date NOT NULL,
  `publish_date` date NOT NULL,
  `broadcast` tinyint(1) NOT NULL COMMENT '0-failed, 1-broadcasted',
  `image_date` date NOT NULL COMMENT 'image taken on',
  PRIMARY KEY (`news_id`),
  KEY `member_id` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `notification_ids`
--

INSERT INTO `notification_ids` (`id`, `member_id`, `os`, `token`) VALUES
(1, 1, 'gcm', '12345'),
(4, 2, 'gcm', '123451'),
(5, 1, 'gcm', '123110'),
(7, 1, 'gcm', '123a110');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Table Information Under Round Table Nepal' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`table_id`, `table_name`, `table_code`, `description`, `created_on`, `status`, `big_url`, `thumb_url`, `members_count`) VALUES
(1, 'KATHMANDU ROUND TABLE 1 - KATHMANDU', 'KRT-1', '', '2015-06-11', 1, '/api/public/images/big/krt1.png', '/api/public/images/thumb/krt1.png', 1),
(2, 'KATHMANDU ELITE ROUND TABLE 2 - KATHMANDU', 'KERT-2', '', '2015-06-11', 1, '/api/public/images/big/kert2.png', '/api/public/images/thumb/kert2.png', 3),
(3, 'BIRGUNJ ROUND TABLE 3 BIRGUNJ', 'BRT-3', '', '2015-06-11', 1, '/api/public/images/big/brt3.png', '/api/public/images/thumb/brt3.png', 5);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `api_access`
--
ALTER TABLE `api_access`
  ADD CONSTRAINT `api_access_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `conveners`
--
ALTER TABLE `conveners`
  ADD CONSTRAINT `conveners_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `event_tables`
--
ALTER TABLE `event_tables`
  ADD CONSTRAINT `event_tables_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_tables_ibfk_2` FOREIGN KEY (`table_id`) REFERENCES `tables` (`table_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `members_info`
--
ALTER TABLE `members_info`
  ADD CONSTRAINT `members_info_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `news_tables`
--
ALTER TABLE `news_tables`
  ADD CONSTRAINT `news_tables_ibfk_1` FOREIGN KEY (`news_id`) REFERENCES `news` (`news_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `news_tables_ibfk_2` FOREIGN KEY (`table_id`) REFERENCES `tables` (`table_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notification_ids`
--
ALTER TABLE `notification_ids`
  ADD CONSTRAINT `notification_ids_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
