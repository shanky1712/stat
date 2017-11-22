/*
SQLyog Community Edition- MySQL GUI v6.54
MySQL - 5.5.8-log : Database - rightern_mystat
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `actions` */

DROP TABLE IF EXISTS `actions`;

CREATE TABLE `actions` (
  `tag_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `traffic_id` bigint(20) NOT NULL,
  `event_id` int(11) NOT NULL,
  `user_api_key` varchar(50) NOT NULL,
  `page_label` varchar(250) NOT NULL,
  `action_label` varchar(250) NOT NULL,
  `action_value` varchar(250) NOT NULL,
  `tag_created_on` datetime NOT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `actions` */

/*Table structure for table `events` */

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `event_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(250) NOT NULL,
  `event_created_on` datetime NOT NULL,
  `event_modified_on` datetime NOT NULL,
  PRIMARY KEY (`event_id`),
  KEY `index_events` (`event_name`(10))
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `events` */

insert  into `events`(`event_id`,`event_name`,`event_created_on`,`event_modified_on`) values (1,'_Pageview','2013-03-14 05:24:02','0000-00-00 00:00:00'),(2,'_trackEvent','2014-03-19 00:56:49','0000-00-00 00:00:00');

/*Table structure for table `pause` */

DROP TABLE IF EXISTS `pause`;

CREATE TABLE `pause` (
  `pause_id` int(10) NOT NULL AUTO_INCREMENT,
  `paused_by` varchar(25) NOT NULL,
  `pause_title` varchar(250) NOT NULL,
  `pause_start` date NOT NULL,
  `pause_end` date NOT NULL,
  `pause_created_on` datetime NOT NULL,
  `pause_modified_on` datetime NOT NULL,
  `pause_is_active` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`pause_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

/*Data for the table `pause` */

/*Table structure for table `site_access` */

DROP TABLE IF EXISTS `site_access`;

CREATE TABLE `site_access` (
  `site_access_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `site_id` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`site_access_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `site_access` */

/*Table structure for table `sites` */

DROP TABLE IF EXISTS `sites`;

CREATE TABLE `sites` (
  `site_id` int(11) NOT NULL AUTO_INCREMENT,
  `site_api_key` varchar(50) NOT NULL,
  `site_name` varchar(250) NOT NULL,
  `site_url` varchar(250) NOT NULL,
  `created_by` int(11) NOT NULL,
  `site_created_on` datetime NOT NULL,
  PRIMARY KEY (`site_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `sites` */

/*Table structure for table `traffic` */

DROP TABLE IF EXISTS `traffic`;

CREATE TABLE `traffic` (
  `traffic_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_api_key` varchar(15) NOT NULL,
  `user_screen_size` varchar(10) DEFAULT NULL,
  `user_browser_size` varchar(10) DEFAULT NULL,
  `url` varchar(75) DEFAULT NULL,
  `user_agent_lang` varchar(10) DEFAULT NULL,
  `user_ip` varchar(25) DEFAULT NULL,
  `visit_key` varchar(50) DEFAULT NULL,
  `session_id` varchar(50) DEFAULT NULL,
  `user_city` varchar(150) DEFAULT NULL,
  `user_country` varchar(50) DEFAULT NULL,
  `user_browser_name` varchar(50) DEFAULT NULL,
  `user_browser_version` varchar(10) DEFAULT NULL,
  `referrer` varchar(250) DEFAULT NULL,
  `platform` varchar(50) DEFAULT NULL,
  `cookieset` enum('0','1') DEFAULT NULL COMMENT '0 - Not Set , 1 - Set',
  `useragent` varchar(255) DEFAULT NULL,
  `user_server_name` varchar(150) DEFAULT NULL,
  `user_country_code` varchar(150) DEFAULT NULL,
  `user_region_name` varchar(150) DEFAULT NULL,
  `user_region_code` varchar(50) DEFAULT NULL,
  `user_latitude` varchar(50) DEFAULT NULL,
  `user_longitude` varchar(50) DEFAULT NULL,
  `user_time_zone` varchar(50) DEFAULT NULL,
  `user_postal_code` varchar(50) DEFAULT NULL,
  `user_continent_code` varchar(50) DEFAULT NULL,
  `data_created_on` datetime NOT NULL,
  PRIMARY KEY (`traffic_id`),
  KEY `traffic_api` (`user_api_key`(10))
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `traffic` */

/*Table structure for table `user_type` */

DROP TABLE IF EXISTS `user_type`;

CREATE TABLE `user_type` (
  `user_type_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_type_name` varchar(100) NOT NULL,
  `user_type_created_on` datetime NOT NULL,
  `user_type_modified_on` datetime NOT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `user_type` */

insert  into `user_type`(`user_type_id`,`user_type_name`,`user_type_created_on`,`user_type_modified_on`) values (1,'client','2013-03-13 01:20:23','0000-00-00 00:00:00'),(2,'admin','2013-03-13 01:45:32','0000-00-00 00:00:00');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_unique_id` varchar(25) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `user_api_key` varchar(50) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_logo` varchar(250) NOT NULL,
  `user_type` enum('1','2') NOT NULL DEFAULT '1' COMMENT ' 1 - Client, 2 - Admin',
  `user_is_active` enum('0','1') NOT NULL DEFAULT '1' COMMENT ' 0 - Inactive, 1 - Active',
  `user_created_on` datetime NOT NULL,
  `user_modified_on` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

/* Procedure structure for procedure `Check_Events` */

/*!50003 DROP PROCEDURE IF EXISTS  `Check_Events` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `Check_Events`(IN `eventname` VARCHAR(50))
BEGIN
										SELECT event_id FROM `events` WHERE `event_name` = eventname LIMIT 1;
									END */$$
DELIMITER ;

/* Procedure structure for procedure `Check_Pause_Status` */

/*!50003 DROP PROCEDURE IF EXISTS  `Check_Pause_Status` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `Check_Pause_Status`(IN `api_key` VARCHAR(50), IN `current_pause_date` DATE)
BEGIN
										SELECT pause_id FROM pause WHERE pause_is_active = '1' AND pause_start <= current_pause_date AND pause_end >= current_pause_date AND paused_by = api_key;
								  END */$$
DELIMITER ;

/* Procedure structure for procedure `Check_User_Api` */

/*!50003 DROP PROCEDURE IF EXISTS  `Check_User_Api` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `Check_User_Api`(IN `api_key` VARCHAR(50))
BEGIN
	SELECT site_id FROM sites WHERE BINARY site_api_key = api_key LIMIT 1;
END */$$
DELIMITER ;

/* Procedure structure for procedure `Count_Unique` */

/*!50003 DROP PROCEDURE IF EXISTS  `Count_Unique` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `Count_Unique`(IN `api_key` VARCHAR(50))
BEGIN
									SELECT traffic_id FROM traffic WHERE user_api_key = api_key GROUP BY user_ip;
								  END */$$
DELIMITER ;

/* Procedure structure for procedure `Insert_Actions` */

/*!50003 DROP PROCEDURE IF EXISTS  `Insert_Actions` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `Insert_Actions`(IN `traffic_id` BIGINT(20), IN `event_id` INT(11), IN `api_key` VARCHAR(50), IN `page_label` VARCHAR(250), IN `action_label` VARCHAR(250), IN `action_value` VARCHAR(250), IN `current_datetime` DATETIME  )
BEGIN
											INSERT INTO actions (	
																traffic_id, 
																event_id, 
																user_api_key,
																page_label, 
																action_label, 
																action_value,
																tag_created_on
															)
	
															VALUES (
																	traffic_id, 
																	event_id, 
																	api_key,
																	page_label, 
																	action_label, 
																	action_value,
																	current_datetime
																);
												END */$$
DELIMITER ;

/* Procedure structure for procedure `INSERT_TRAFFIC` */

/*!50003 DROP PROCEDURE IF EXISTS  `INSERT_TRAFFIC` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `INSERT_TRAFFIC`(IN `api_key` VARCHAR(15), IN `scrnsiz` VARCHAR(10), IN `bsiz` VARCHAR(10), IN `url` VARCHAR(75), IN `lang` VARCHAR(10), IN `ip` VARCHAR(25), IN `gene_key` VARCHAR(50), IN `sid` VARCHAR(50), IN `city` VARCHAR(150), IN `country_name` VARCHAR(50), IN `bro_name` VARCHAR(50), IN `bro_version` VARCHAR(10), IN `referrer` VARCHAR(250), IN `useragent` VARCHAR(255), IN `cookieset` ENUM('0', '1'), IN `platform` VARCHAR(50), IN `s_name` VARCHAR(150), IN `country_cde` VARCHAR(150), IN `region_name` VARCHAR(50), IN `region_code` VARCHAR(50), IN `latitude` VARCHAR(50), IN `longitude` VARCHAR(50), IN `time_zone` VARCHAR(50), IN `postal_code` VARCHAR(50), IN `continent_code` VARCHAR(50), IN `curt_date` DATETIME)
BEGIN
										INSERT INTO traffic
				
														(	user_api_key, 
															user_screen_size, 
															user_browser_size, 
															url, 
															user_agent_lang, 
															user_ip,
															visit_key, 
															session_id, 
															user_city, 
															user_country,
															user_browser_name,
															user_browser_version,
															referrer,
															useragent,
															cookieset,
															platform,
															user_server_name,
															user_country_code, 
															user_region_name,
															user_region_code,
															user_latitude,
															user_longitude,
															user_time_zone,
															user_postal_code,
															user_continent_code,
															data_created_on
														) 
													VALUES 
														(	api_key, 
															scrnsiz, 
															bsiz, 
															url, 
															lang, 
															ip, 
															gene_key,
															sid, 
															city, 
															country_name, 
															bro_name, 
															bro_version, 
															referrer, 
															useragent, 
															cookieset, 
															platform, 
															s_name,
															country_cde,
															region_name,
															region_code,
															latitude,
															longitude,
															time_zone,
															postal_code,
															continent_code,
															curt_date
														);			
														
														 END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
