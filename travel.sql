-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 11, 2015 at 12:33 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE IF NOT EXISTS `campaigns` (
  `campaign_id` int(11) NOT NULL AUTO_INCREMENT,
  `cname` tinytext,
  `subject` tinytext,
  `architect` tinytext,
  `email` varchar(100) DEFAULT NULL,
  `pnumber` varchar(100) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  `description` text,
  `admin` varchar(100) DEFAULT NULL,
  `image` longblob,
  `country` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`campaign_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `campaigns`
--


-- --------------------------------------------------------

--
-- Table structure for table `campaign_supporters`
--

CREATE TABLE IF NOT EXISTS `campaign_supporters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campaign_id` int(11) DEFAULT NULL,
  `supporter_email` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `campaign_supporters`
--


-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_id` int(11) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `commenter_email` varchar(200) DEFAULT NULL,
  `comment` varchar(1500) DEFAULT NULL,
  `status_owner` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `comments`
--


-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `sender_email` varchar(100) DEFAULT NULL,
  `subject` text,
  `message` text,
  `country` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `contact`
--


-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE IF NOT EXISTS `education` (
  `education_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(300) DEFAULT NULL,
  `type` varchar(300) DEFAULT NULL,
  `pnumber` varchar(300) DEFAULT NULL,
  `admin_email` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `website` varchar(300) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `description` text,
  `country` varchar(300) DEFAULT NULL,
  `photo` longblob,
  PRIMARY KEY (`education_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `education`
--


-- --------------------------------------------------------

--
-- Table structure for table `embassies`
--

CREATE TABLE IF NOT EXISTS `embassies` (
  `embassy_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) DEFAULT NULL,
  `country_representing` varchar(60) DEFAULT NULL,
  `number` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `description` text,
  `photo` longblob,
  PRIMARY KEY (`embassy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `embassies`
--


-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `owner` text,
  `event` tinytext,
  `pnumber` varchar(50) DEFAULT NULL,
  `email` text,
  `admin_email` tinytext,
  `daye` varchar(20) DEFAULT NULL,
  `monthe` varchar(30) DEFAULT NULL,
  `yeare` varchar(20) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `description` text,
  `country` varchar(50) DEFAULT NULL,
  `image` longblob,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `events`
--


-- --------------------------------------------------------

--
-- Table structure for table `event_attend`
--

CREATE TABLE IF NOT EXISTS `event_attend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `attendee_email` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `event_attend`
--


-- --------------------------------------------------------

--
-- Table structure for table `friendship`
--

CREATE TABLE IF NOT EXISTS `friendship` (
  `friendship_id` int(11) NOT NULL AUTO_INCREMENT,
  `guest_friend` varchar(300) DEFAULT NULL,
  `host_friend` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`friendship_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `friendship`
--


-- --------------------------------------------------------

--
-- Table structure for table `friend_requests`
--

CREATE TABLE IF NOT EXISTS `friend_requests` (
  `friend_requests_id` int(11) NOT NULL AUTO_INCREMENT,
  `guest_friend` varchar(300) DEFAULT NULL,
  `host_friend` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`friend_requests_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `friend_requests`
--


-- --------------------------------------------------------

--
-- Table structure for table `import_export`
--

CREATE TABLE IF NOT EXISTS `import_export` (
  `import_export_id` int(11) NOT NULL AUTO_INCREMENT,
  `business` varchar(100) DEFAULT NULL,
  `type` varchar(70) DEFAULT NULL,
  `products` varchar(70) DEFAULT NULL,
  `number` varchar(50) DEFAULT NULL,
  `admin_email` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  `location` varchar(300) DEFAULT NULL,
  `description` text,
  `country` varchar(100) DEFAULT NULL,
  `name` varchar(300) DEFAULT NULL,
  `photo` longblob,
  PRIMARY KEY (`import_export_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `import_export`
--


-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE IF NOT EXISTS `inbox` (
  `inbox_id` int(11) NOT NULL AUTO_INCREMENT,
  `seen_id` int(11) DEFAULT NULL,
  `message_id` int(11) DEFAULT NULL,
  `sender_email` varchar(50) DEFAULT NULL,
  `receiver_email` varchar(50) DEFAULT NULL,
  `message` text,
  `country` varchar(60) DEFAULT NULL,
  `fname` varchar(60) DEFAULT NULL,
  `lname` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`inbox_id`),
  UNIQUE KEY `seen_id` (`seen_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `inbox`
--


-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` text CHARACTER SET utf8,
  `lname` text CHARACTER SET utf8,
  `email` text CHARACTER SET utf8,
  `pnumber` text,
  `password` text CHARACTER SET utf8,
  `country` text CHARACTER SET utf8,
  `gender` tinytext CHARACTER SET utf8,
  `confirmed` int(11) DEFAULT NULL,
  `confirm_code` int(11) DEFAULT NULL,
  `image` longblob,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `info`
--


-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `pnumber` varchar(200) DEFAULT NULL,
  `admin_email` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `description` text,
  `country` varchar(200) DEFAULT NULL,
  `photo` longblob,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `jobs`
--


-- --------------------------------------------------------

--
-- Table structure for table `land`
--

CREATE TABLE IF NOT EXISTS `land` (
  `land_id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(400) DEFAULT NULL,
  `number` varchar(400) DEFAULT NULL,
  `email` varchar(400) DEFAULT NULL,
  `admin_email` varchar(400) DEFAULT NULL,
  `website` varchar(400) DEFAULT NULL,
  `location` varchar(400) DEFAULT NULL,
  `price` varchar(500) DEFAULT NULL,
  `description` text,
  `name` varchar(2000) DEFAULT NULL,
  `photo` longblob,
  `country` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`land_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `land`
--


-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `like_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_id` int(11) DEFAULT NULL,
  `liker_email` varchar(300) DEFAULT NULL,
  `status_owner` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`like_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `likes`
--


-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_email` varchar(100) DEFAULT NULL,
  `receiver_email` varchar(100) DEFAULT NULL,
  `message` text,
  `country` varchar(200) DEFAULT NULL,
  `fname` varchar(200) DEFAULT NULL,
  `lname` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `messages`
--


-- --------------------------------------------------------

--
-- Table structure for table `seen_friendship`
--

CREATE TABLE IF NOT EXISTS `seen_friendship` (
  `seen_friendship_id` int(11) NOT NULL AUTO_INCREMENT,
  `friendship_id` int(11) DEFAULT NULL,
  `guest_friend` varchar(200) DEFAULT NULL,
  `host_friend` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`seen_friendship_id`),
  UNIQUE KEY `friendship_id` (`friendship_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `seen_friendship`
--


-- --------------------------------------------------------

--
-- Table structure for table `seen_messages`
--

CREATE TABLE IF NOT EXISTS `seen_messages` (
  `seen_id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) DEFAULT NULL,
  `sender_email` varchar(100) DEFAULT NULL,
  `receiver_email` varchar(100) DEFAULT NULL,
  `message` text,
  `country` varchar(200) DEFAULT NULL,
  `fname` varchar(200) DEFAULT NULL,
  `lname` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`seen_id`),
  UNIQUE KEY `message_id` (`message_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `seen_messages`
--


-- --------------------------------------------------------

--
-- Table structure for table `seen_nots`
--

CREATE TABLE IF NOT EXISTS `seen_nots` (
  `seen_nots_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `fname` varchar(200) DEFAULT NULL,
  `lname` varchar(200) DEFAULT NULL,
  `commenter_email` varchar(200) DEFAULT NULL,
  `status_owner` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`seen_nots_id`),
  UNIQUE KEY `comment_id` (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `seen_nots`
--


-- --------------------------------------------------------

--
-- Table structure for table `see_nots`
--

CREATE TABLE IF NOT EXISTS `see_nots` (
  `see_nots_id` int(11) NOT NULL,
  `status_id` int(11) DEFAULT NULL,
  `commenters` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`see_nots_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `see_nots`
--


-- --------------------------------------------------------

--
-- Table structure for table `see_nots2`
--

CREATE TABLE IF NOT EXISTS `see_nots2` (
  `see_nots2_id` int(11) NOT NULL AUTO_INCREMENT,
  `see_nots_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `commenters` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`see_nots2_id`),
  UNIQUE KEY `see_nots_id` (`see_nots_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `see_nots2`
--


-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(200) DEFAULT NULL,
  `type` tinytext,
  `pnumber` text,
  `admin_email` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `description` text,
  `country` varchar(200) DEFAULT NULL,
  `photo` longblob,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `service`
--


-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `lname` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `country` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `status` text CHARACTER SET utf8,
  `name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `image` longblob,
  `campaign` varchar(50) DEFAULT NULL,
  `campaign_id` int(11) DEFAULT NULL,
  `cname` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `status`
--

