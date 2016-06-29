# SQL Manager 2010 Lite for MySQL 4.6.0.5
# ---------------------------------------
# Host     : localhost
# Port     : 3306
# Database : erp


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE `erp`
    CHARACTER SET 'latin1'
    COLLATE 'latin1_swedish_ci';

USE `erp`;

#
# Structure for the `categories` table : 
#

CREATE TABLE `categories` (
  `category_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `category_code` bigint(20) DEFAULT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `category_desc` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `is_deleted` bit(1) DEFAULT b'0',
  `is_active` bit(1) DEFAULT b'1',
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `category_code` (`category_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `customer_photos` table : 
#

CREATE TABLE `customer_photos` (
  `photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT '0',
  `photo_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`photo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

#
# Structure for the `customers` table : 
#

CREATE TABLE `customers` (
  `customer_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_code` varchar(125) DEFAULT '',
  `customer_name` varchar(555) DEFAULT '',
  `address` varchar(555) DEFAULT '',
  `email_address` varchar(100) DEFAULT '',
  `landline` varchar(100) DEFAULT '',
  `mobile_no` varchar(100) DEFAULT '',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` bit(1) DEFAULT b'0',
  `is_active` bit(1) DEFAULT b'1',
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

#
# Structure for the `supplier_photos` table : 
#

CREATE TABLE `supplier_photos` (
  `photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) DEFAULT '0',
  `photo_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`photo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

#
# Structure for the `suppliers` table : 
#

CREATE TABLE `suppliers` (
  `supplier_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `supplier_code` varchar(125) DEFAULT '',
  `supplier_name` varchar(555) DEFAULT '',
  `address` varchar(555) DEFAULT '',
  `email_address` varchar(100) DEFAULT '',
  `landline` varchar(100) DEFAULT '',
  `mobile_no` varchar(100) DEFAULT '',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` bit(1) DEFAULT b'0',
  `is_active` bit(1) DEFAULT b'1',
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

#
# Structure for the `user_accounts` table : 
#

CREATE TABLE `user_accounts` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) DEFAULT '',
  `user_pword` varchar(500) DEFAULT '',
  `user_lname` varchar(100) DEFAULT '',
  `user_fname` varchar(100) DEFAULT '',
  `user_mname` varchar(100) DEFAULT '',
  `user_address` varchar(155) DEFAULT '',
  `user_email` varchar(100) DEFAULT '',
  `user_mobile` varchar(100) DEFAULT '',
  `user_telephone` varchar(100) DEFAULT '',
  `user_bdate` date DEFAULT '0000-00-00',
  `user_group_id` int(11) DEFAULT '0',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  `date_created` datetime DEFAULT NULL,
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for the `user_groups` table : 
#

CREATE TABLE `user_groups` (
  `user_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group` varchar(135) DEFAULT '',
  `user_group_desc` varchar(500) DEFAULT '',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for the `customer_photos` table  (LIMIT 0,500)
#

INSERT INTO `customer_photos` (`photo_id`, `customer_id`, `photo_path`) VALUES 
  (8,15,'assets/img/anonymous-icon.png'),
  (9,16,'assets/img/customer/5771a29130890.jpg'),
  (10,17,'assets/img/customer/5771a9daeabec.jpg'),
  (11,18,'assets/img/anonymous-icon.png'),
  (12,19,'assets/img/anonymous-icon.png'),
  (15,20,'assets/img/customer/577379d57ecee.jpg');
COMMIT;

#
# Data for the `customers` table  (LIMIT 0,500)
#

INSERT INTO `customers` (`customer_id`, `customer_code`, `customer_name`, `address`, `email_address`, `landline`, `mobile_no`, `date_created`, `date_modified`, `is_deleted`, `is_active`) VALUES 
  (15,'','Paul Christian Rueda','San Jose, San Simon, Pampanga, Philippines','','','','0000-00-00 00:00:00','2016-06-27 16:12:49',0,1),
  (16,'','Gelyn Joy Manalang','nnn','','','','0000-00-00 00:00:00','2016-06-27 16:05:10',0,1),
  (17,'','Jose Rizal','fg','','','','0000-00-00 00:00:00','2016-06-27 16:05:14',0,1),
  (18,'','Andres Bonifacio','f\r\n\r\n\r\n','','','','0000-00-00 00:00:00','2016-06-27 16:05:20',0,1),
  (19,'','fff','fff','','','','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1),
  (20,'','aaaaddd','aaaa','','','','0000-00-00 00:00:00','2016-06-29 14:39:16',0,1);
COMMIT;

#
# Data for the `supplier_photos` table  (LIMIT 0,500)
#

INSERT INTO `supplier_photos` (`photo_id`, `supplier_id`, `photo_path`) VALUES 
  (15,22,'assets/img/anonymous-icon.png'),
  (16,23,'assets/img/anonymous-icon.png'),
  (17,21,'assets/img/supplier/57737b1648d68.jpg');
COMMIT;

#
# Data for the `suppliers` table  (LIMIT 0,500)
#

INSERT INTO `suppliers` (`supplier_id`, `supplier_code`, `supplier_name`, `address`, `email_address`, `landline`, `mobile_no`, `date_created`, `date_modified`, `is_deleted`, `is_active`) VALUES 
  (21,'','JG Yambao','Pampanga','sample@sample.net','090','909','0000-00-00 00:00:00','2016-06-29 15:34:54',0,1),
  (22,'','jgasdf','samplke','dadsa','090','909','0000-00-00 00:00:00','2016-06-29 15:22:11',1,1),
  (23,'','aaa','sdsd','asdf','asdf','asdf','0000-00-00 00:00:00','2016-06-29 15:21:06',1,1);
COMMIT;

#
# Data for the `user_accounts` table  (LIMIT 0,500)
#

INSERT INTO `user_accounts` (`user_id`, `user_name`, `user_pword`, `user_lname`, `user_fname`, `user_mname`, `user_address`, `user_email`, `user_mobile`, `user_telephone`, `user_bdate`, `user_group_id`, `is_active`, `is_deleted`, `date_created`, `date_modified`) VALUES 
  (1,'admin','d033e22ae348aeb5660fc2140aec35850c4da997','Rueda','Paul Christian','Bontia','San Jose, San Simon, Pampanga','chrisrueda14@yahoo.com','0935-746-7601','','0000-00-00',1,1,0,NULL,'0000-00-00 00:00:00');
COMMIT;

#
# Data for the `user_groups` table  (LIMIT 0,500)
#

INSERT INTO `user_groups` (`user_group_id`, `user_group`, `user_group_desc`, `is_active`, `is_deleted`, `date_created`, `date_modified`) VALUES 
  (1,'Super User','Can access all features.',1,0,'0000-00-00 00:00:00','0000-00-00 00:00:00');
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;