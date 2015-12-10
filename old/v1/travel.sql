/*
SQLyog Enterprise v10.42 
MySQL - 5.5.8-log : Database - travel
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`travel` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `travel`;

/*Table structure for table `campaign` */

DROP TABLE IF EXISTS `campaign`;

CREATE TABLE `campaign` (
  `campaign_id` int(11) NOT NULL,
  `codee` text CHARACTER SET utf8,
  `title` text CHARACTER SET utf8,
  `bye` text CHARACTER SET utf8,
  `email` text CHARACTER SET utf8,
  `admin_email` varchar(500) DEFAULT NULL,
  `number` text CHARACTER SET utf8,
  `website` text CHARACTER SET utf8,
  `description` text CHARACTER SET utf8,
  `namee` text CHARACTER SET utf8,
  `photo` longblob,
  `country` text CHARACTER SET utf8,
  PRIMARY KEY (`campaign_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `campaign` */

/*Table structure for table `campaign_status` */

DROP TABLE IF EXISTS `campaign_status`;

CREATE TABLE `campaign_status` (
  `campaign_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) DEFAULT NULL,
  `name` varchar(400) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `admin_email` varchar(200) DEFAULT NULL,
  `status` text,
  `photo` longblob,
  PRIMARY KEY (`campaign_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `campaign_status` */

/*Table structure for table `campaign_supporters` */

DROP TABLE IF EXISTS `campaign_supporters`;

CREATE TABLE `campaign_supporters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campaign_id` int(11) DEFAULT NULL,
  `supporter_email` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `campaign_supporters` */

/*Table structure for table `comment_campaign_status` */

DROP TABLE IF EXISTS `comment_campaign_status`;

CREATE TABLE `comment_campaign_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campaign_status_id` int(11) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `commenter_email` varchar(300) DEFAULT NULL,
  `status` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `comment_campaign_status` */

/*Table structure for table `comment_event_status` */

DROP TABLE IF EXISTS `comment_event_status`;

CREATE TABLE `comment_event_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_status_id` int(11) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `commenter_email` varchar(300) DEFAULT NULL,
  `status` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `comment_event_status` */

/*Table structure for table `comments` */

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status_id` int(11) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `commenter_email` varchar(200) DEFAULT NULL,
  `status` varchar(15000) DEFAULT NULL,
  `status_owner` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `comments` */

/*Table structure for table `contact` */

DROP TABLE IF EXISTS `contact`;

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `sender_email` varchar(100) DEFAULT NULL,
  `subject` text,
  `message` text,
  `country` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `contact` */

/*Table structure for table `education` */

DROP TABLE IF EXISTS `education`;

CREATE TABLE `education` (
  `education_id` int(11) NOT NULL AUTO_INCREMENT,
  `centre` text CHARACTER SET utf8,
  `service` text CHARACTER SET utf8,
  `number` text CHARACTER SET utf8,
  `email` text CHARACTER SET utf8,
  `admin_email` text CHARACTER SET utf8,
  `website` text CHARACTER SET utf8,
  `location` text CHARACTER SET utf8,
  `courses` text CHARACTER SET utf8,
  `description` text CHARACTER SET utf8,
  `country` text CHARACTER SET utf8,
  `name` text CHARACTER SET utf8,
  `photo` longblob,
  PRIMARY KEY (`education_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `education` */

/*Table structure for table `embassies` */

DROP TABLE IF EXISTS `embassies`;

CREATE TABLE `embassies` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `embassies` */

/*Table structure for table `event_attend` */

DROP TABLE IF EXISTS `event_attend`;

CREATE TABLE `event_attend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `attendee_email` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `event_attend` */

/*Table structure for table `event_status` */

DROP TABLE IF EXISTS `event_status`;

CREATE TABLE `event_status` (
  `event_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `country` varchar(300) DEFAULT NULL,
  `admin_email` varchar(300) DEFAULT NULL,
  `status` text,
  `photo` longblob,
  PRIMARY KEY (`event_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `event_status` */

/*Table structure for table `events` */

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `owner` text,
  `event` tinytext,
  `number` tinytext,
  `email` text,
  `admin_email` tinytext,
  `website` tinytext,
  `daye` varchar(20) DEFAULT NULL,
  `monthe` varchar(30) DEFAULT NULL,
  `yeare` varchar(20) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `description` text,
  `country` varchar(50) DEFAULT NULL,
  `photo` longblob,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `events` */

/*Table structure for table `friends` */

DROP TABLE IF EXISTS `friends`;

CREATE TABLE `friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `you` text CHARACTER SET utf8,
  `friend_email` text CHARACTER SET utf8,
  `country` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `friends` */

/*Table structure for table `import_export` */

DROP TABLE IF EXISTS `import_export`;

CREATE TABLE `import_export` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `import_export` */

/*Table structure for table `inbox` */

DROP TABLE IF EXISTS `inbox`;

CREATE TABLE `inbox` (
  `inbox_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) DEFAULT NULL,
  `sender_email` varchar(50) DEFAULT NULL,
  `receiver_email` varchar(50) DEFAULT NULL,
  `message` text,
  `country` varchar(60) DEFAULT NULL,
  `fname` varchar(60) DEFAULT NULL,
  `lname` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`inbox_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `inbox` */

/*Table structure for table `info` */

DROP TABLE IF EXISTS `info`;

CREATE TABLE `info` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` text CHARACTER SET utf8,
  `lname` text CHARACTER SET utf8,
  `email` text CHARACTER SET utf8,
  `password` text CHARACTER SET utf8,
  `country` text CHARACTER SET utf8,
  `gender` tinytext CHARACTER SET utf8,
  `job` text CHARACTER SET utf8,
  `skills` text CHARACTER SET utf8,
  `religion` text CHARACTER SET utf8,
  `relationship` text CHARACTER SET utf8,
  `kids` text CHARACTER SET utf8,
  `hobbies` text CHARACTER SET utf8,
  `places` text CHARACTER SET utf8,
  `about` text CHARACTER SET utf8,
  `image` longblob,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `info` */

/*Table structure for table `jobs` */

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `jobs_id` int(11) NOT NULL AUTO_INCREMENT,
  `employer` text CHARACTER SET utf8,
  `job` text CHARACTER SET utf8,
  `number` text CHARACTER SET utf8,
  `email` text CHARACTER SET utf8,
  `admin_email` text CHARACTER SET utf8,
  `website` text CHARACTER SET utf8,
  `location` text CHARACTER SET utf8,
  `country` text CHARACTER SET utf8,
  `description` text CHARACTER SET utf8,
  `name` text CHARACTER SET utf8,
  `photo` longblob,
  PRIMARY KEY (`jobs_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `jobs` */

/*Table structure for table `land` */

DROP TABLE IF EXISTS `land`;

CREATE TABLE `land` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `land` */

/*Table structure for table `messages` */

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_email` varchar(100) DEFAULT NULL,
  `receiver_email` varchar(100) DEFAULT NULL,
  `message` text,
  `country` varchar(200) DEFAULT NULL,
  `fname` varchar(200) DEFAULT NULL,
  `lname` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `messages` */

/*Table structure for table `seen_messages` */

DROP TABLE IF EXISTS `seen_messages`;

CREATE TABLE `seen_messages` (
  `seen_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) DEFAULT NULL,
  `sender_email` varchar(100) DEFAULT NULL,
  `receiver_email` varchar(100) DEFAULT NULL,
  `message` text,
  `country` varchar(200) DEFAULT NULL,
  `fname` varchar(200) DEFAULT NULL,
  `lname` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`seen_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `seen_messages` */

/*Table structure for table `seen_nots` */

DROP TABLE IF EXISTS `seen_nots`;

CREATE TABLE `seen_nots` (
  `seen_nots_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_id` int(11) DEFAULT NULL,
  `fname` varchar(200) DEFAULT NULL,
  `lname` varchar(200) DEFAULT NULL,
  `commenter_email` varchar(200) DEFAULT NULL,
  `status` text,
  `status_owner` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`seen_nots_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `seen_nots` */

/*Table structure for table `service` */

DROP TABLE IF EXISTS `service`;

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `business` text CHARACTER SET utf8,
  `service` text CHARACTER SET utf8,
  `number` text CHARACTER SET utf8,
  `admin_email` varchar(300) DEFAULT NULL,
  `email` text CHARACTER SET utf8,
  `website` text CHARACTER SET utf8,
  `location` text CHARACTER SET utf8,
  `description` text CHARACTER SET utf8,
  `country` text CHARACTER SET utf8,
  `name` text CHARACTER SET utf8,
  `photo` longblob,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `service` */

/*Table structure for table `status` */

DROP TABLE IF EXISTS `status`;

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `lname` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `country` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `status` text CHARACTER SET utf8,
  `name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `image` longblob,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `status` */

/*Table structure for table `status_like` */

DROP TABLE IF EXISTS `status_like`;

CREATE TABLE `status_like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status_id` int(11) DEFAULT NULL,
  `status_liker_email` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `status_like` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
