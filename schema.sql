-- MySQL dump 10.13  Distrib 5.5.35, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: swift_schedules
-- ------------------------------------------------------
-- Server version	5.5.35-0ubuntu0.12.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `company_settings`
--

DROP TABLE IF EXISTS `company_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(100) DEFAULT NULL,
  `company_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) DEFAULT NULL,
  `shifts` text,
  `locations` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_settings`
--

LOCK TABLES `company_settings` WRITE;
/*!40000 ALTER TABLE `company_settings` DISABLE KEYS */;
INSERT INTO `company_settings` VALUES (1,'Subway','Subway','bjohnson@subway.com',NULL,NULL),(2,'SwiftnCo','Starbucks','',NULL,NULL),(3,'Swift Schedules','Not farts','admin@gmsil.com','[{\"name\":\"Morning\",\"shift_start\":\"7:30AM\",\"shift_end\":\"3:30PM\"},{\"name\":\"Afternoon\",\"shift_start\":\"12:30PM\",\"shift_end\":\"7:30PM\"},{\"name\":\"Evening\",\"shift_start\":\"2:30PM\",\"shift_end\":\"9:30PM\"}]','[{\"name\":\"Mission Valley\",\"address\":\"321 Mission Gorge, SD\",\"manager\":\"Steve\",\"contact\":\"6192221122\"},{\"name\":\"Fashion Valley\",\"address\":\"123 Fletcher, SD\",\"manager\":\"Jessica\",\"contact\":\"6192221122\"},{\"name\":\"SDSU Campus\",\"address\":\"426 Montazuma, SD\",\"manager\":\"Paul\",\"contact\":\"6192221122\"}]');
/*!40000 ALTER TABLE `company_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'admin','Administrator'),(2,'members','General User'),(3,'manager','Manager'),(4,'starbucks','Starbucks ');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(100) NOT NULL,
  `location_name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempts`
--

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `requester_id` int(11) NOT NULL,
  `target_id` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `shift` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `company` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requests`
--

LOCK TABLES `requests` WRITE;
/*!40000 ALTER TABLE `requests` DISABLE KEYS */;
INSERT INTO `requests` VALUES (1,42,'43','0','Fri May 09 2014','5:30PM-10:30PM','denied','Subway'),(2,45,'44','0','Fri May 16 2014','5:30PM-10:30PM','accepted','Swift Schedules');
/*!40000 ALTER TABLE `requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedules`
--

DROP TABLE IF EXISTS `schedules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `schedule` text NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedules`
--

LOCK TABLES `schedules` WRITE;
/*!40000 ALTER TABLE `schedules` DISABLE KEYS */;
INSERT INTO `schedules` VALUES (1,'jim bean','[{\"date\":\"16\\/4\\/2014\",\"title\":\"SDSU\",\"color\":\"#333\",\"content\":\"7:30PM-10:30PM\"},{\"date\":\"17\\/4\\/2014\",\"title\":\"SDSU\",\"color\":\"#333\",\"content\":\"7:30PM-10:30PM\"},{\"date\":\"18\\/4\\/2014\",\"title\":\"SDSU\",\"color\":\"#333\",\"content\":\"7:30PM-10:30PM\"}]','2014-04-17 05:44:03'),(2,'jeff saenz','[{\"date\":\"17\\/4\\/2014\",\"title\":\"Mission Valley\",\"color\":\"#333\",\"content\":\"5:15pm-10:45pm\"},{\"date\":\"18\\/4\\/2014\",\"title\":\"Mission Valley\",\"color\":\"#333\",\"content\":\"5:45pm-10:45pm\"},{\"date\":\"16\\/4\\/2014\",\"title\":\"Mission Valley\",\"color\":\"#333\",\"content\":\"11:30pm-5:00am\"},{\"date\":\"24\\/4\\/2014\",\"title\":\"midsion valley\",\"color\":\"#333\",\"content\":\"5:30pm-10:00pm\"},{\"date\":\"25\\/4\\/2014\",\"title\":\"midsion valley\",\"color\":\"#333\",\"content\":\"4:30pm-10:00pm\"}]','2014-04-17 05:55:47'),(3,'ian gearhart','[{\"date\":\"19\\/4\\/2014\",\"title\":\"Mission Valley\",\"color\":\"#333\",\"content\":\"4:00pm-9:30pm\"},{\"date\":\"17\\/4\\/2014\",\"title\":\"SDSU\",\"color\":\"#333\",\"content\":\"10:00am-3:30pm\"}]','2014-04-17 05:58:16'),(4,'eddie burdeno','[{\"date\":\"17\\/4\\/2014\",\"title\":\"SDSU\",\"color\":\"#333\",\"content\":\"5:30PM-10:30PM\"},{\"date\":\"18\\/4\\/2014\",\"title\":\"SDSU\",\"color\":\"#333\",\"content\":\"5:30PM-10:30PM\"},{\"date\":\"19\\/4\\/2014\",\"title\":\"SDSU\",\"color\":\"#333\",\"content\":\"5:30PM-10:30PM\"},{\"date\":\"27\\/4\\/2014\",\"title\":\"Mission Valley\",\"color\":\"#333\",\"content\":\"5:30PM-10:30PM\"},{\"date\":\"29\\/4\\/2014\",\"title\":\"mission vallet\",\"color\":\"#333\",\"content\":\"5:30PM-10:30PM\"},{\"date\":\"2\\/5\\/2014\",\"title\":\"Mission Valley\",\"color\":\"#333\",\"content\":\"5:30PM-10:30PM\"},{\"date\":\"4\\/5\\/2014\",\"title\":\"Mission Valley\",\"color\":\"#333\",\"content\":\"5:30PM-10:30PM\"},{\"date\":\"9\\/5\\/2014\",\"title\":\"Mission Valley\",\"color\":\"#333\",\"content\":\"5:30PM-10:30PM\"},{\"date\":\"11\\/5\\/2014\",\"title\":\"Valley Center\",\"color\":\"#333\",\"content\":\"5:30PM-10:00PM\"}]','2014-04-17 16:09:45'),(5,'ian gearheart','[{\"date\":\"21\\/4\\/2014\",\"title\":\"College\",\"color\":\"#333\",\"content\":\"10:30AM-2:30PM\"}]','2014-04-17 16:10:40'),(6,'edward  burdeno','[{\"date\":\"24\\/4\\/2014\",\"title\":\"midsion valley\",\"color\":\"#333\",\"content\":\"5:30pm-10:00pm\"}]','2014-04-24 08:48:48'),(7,'steve acapela1','[{\"date\":\"9\\/5\\/2014\",\"title\":\"Mission Valley\",\"color\":\"#333\",\"content\":\"5:30PM-10:30PM\"}]','2014-05-09 20:06:43'),(8,'john doe','[{\"date\":\"16\\/5\\/2014\",\"title\":\"Fashion Valley\",\"color\":\"#333\",\"content\":\"5:30PM-10:30PM\"}]','2014-05-17 04:52:13'),(9,'christopher ciampoli','[{\"date\":\"22\\/5\\/2014\",\"title\":\"Mis\",\"color\":\"#333\",\"content\":\"5:30PM-10:30PM\"}]','2014-05-22 04:02:54'),(10,'christopher ciampoli1','[{\"date\":\"23\\/5\\/2014\",\"title\":\"Mission Valley\",\"color\":\"#333\",\"content\":\"5:30PM-10:30PM\"}]','2014-05-23 18:32:17');
/*!40000 ALTER TABLE `schedules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shifts`
--

DROP TABLE IF EXISTS `shifts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shifts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(100) NOT NULL,
  `shift_name` varchar(100) NOT NULL,
  `shift_start` varchar(100) NOT NULL,
  `shift_end` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shifts`
--

LOCK TABLES `shifts` WRITE;
/*!40000 ALTER TABLE `shifts` DISABLE KEYS */;
/*!40000 ALTER TABLE `shifts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'\0\0','administrator','59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4','9462e8eee0','admin@admin.com','',NULL,NULL,NULL,1268889823,1268889823,1,'Admin','istrator','ADMIN','0'),(2,'\0\0','christopher ciampoli','a8eb1f0a280b70861a8bbba4cb19b7cd5eadde35',NULL,'chrisciampoli@gmail.com',NULL,'03427d2a4e847b3e1ab601856dff5c83201835cf',1392185472,NULL,1390343473,1401073746,1,'Christopher','Ciampoli','Swift Schedules','6192491738'),(33,'¢„…','edward  burdeno','7356cb6808de2a48f63df1b3c6aebfdf9170a11c',NULL,'eburdeno@swiftnco.com',NULL,NULL,NULL,NULL,1397699114,1400913217,1,'Edward ','Burdeno','SwiftnCo','7148528612'),(36,'¢„…','steve acapela','6697ae6210e671d0320c3e14237c49191f9f6094',NULL,'sacapela@starbucks.com',NULL,NULL,NULL,NULL,1397713343,1397713524,1,'Steve','Acapela','Starbucks','1111111111'),(37,'¢„…','jim bean','54651319849b637e6709f4e0748bd67516b058ab',NULL,'jbean@starbucks.com',NULL,NULL,NULL,NULL,1397713419,1397713470,1,'Jim','Bean','Starbucks','1111111111'),(38,'¢„…','frank rizzo','6467a4cc8d3f693efa59a455f41c103af34dd66c',NULL,'frizzo@starbucks.com',NULL,NULL,NULL,NULL,1397713594,1397713594,1,'Frank','Rizzo','Starbucks','1111111111'),(39,'ÆAI','jeff saenz','8d43ac66c11bfc6ecdfbfc46ff921dba2a90bc4b',NULL,'jeff@swiftnco.com',NULL,NULL,NULL,NULL,1397714103,1398795560,1,'Jeff','Saenz','SwiftnCo','714-552-9010'),(40,'ÆAI','ian gearhart','a9a1d766b8899d510c89310e9cb82bf677767aa7',NULL,'gearhart.ian@gmail.com',NULL,NULL,NULL,NULL,1397714253,1397714504,1,'Ian','Gearhart','SwiftnCo','951-237-2262'),(41,'BWC6','bill johnson','8725aecd79323ffdc3a64c347dc69b3745025308',NULL,'bjohnson@subway.com',NULL,NULL,NULL,NULL,1397750114,1399857572,1,'Bill','Johnson','Subway','1233213333'),(42,'¢¿4÷','eddie burdeno','4edb71fefcbf4a2925c21f2bd5cdbbbc547b3335',NULL,'eburdeno@subway.com',NULL,NULL,NULL,NULL,1397750933,1400128774,1,'Eddie','Burdeno','Subway','1111111111'),(43,'¢¿4÷','ian gearheart','321232c00a8c88781fd385dd5c66fae17d00fe32',NULL,'igearheart@subway.com',NULL,NULL,NULL,NULL,1397751016,1399677706,1,'Ian','Gearheart','Subway','1112342321'),(44,'F∑[b','steve acapela1','536f0f7f5dcdb92330f2ca97360bdb030ed9c198',NULL,'sacapela@swiftshifts.com',NULL,NULL,NULL,NULL,1399665987,1399666017,1,'Steve','Acapela','Swift Schedules','6192235656'),(45,'¢„…','john doe','272c434c104cb166f7c8d3047cf3706a6f1f1f98',NULL,'jdoe@swiftshifts.com',NULL,NULL,NULL,NULL,1400302314,1400869384,1,'John','Doe','Swift Schedules','6194322211'),(46,'F∑[b','michael jackson','b7fa141ae9eb4cb82d17277b1e7b788d0b261fa0',NULL,'mjackson@jackson.com',NULL,NULL,NULL,NULL,1400869457,1400869496,1,'Michael','Jackson','Jackson Entertainment','1111111111'),(47,'F∑[b','christopher ciampoli1','c619f3fd9a230236a6e2148d3508aa7f0d71f8b5',NULL,'cciampoli@jackson.com',NULL,NULL,NULL,NULL,1400869911,1400869946,1,'Christopher','Ciampoli','Jackson Entertainment','6192312212');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` VALUES (34,1,1),(111,2,1),(112,2,3),(97,33,3),(102,36,3),(103,37,2),(104,38,2),(105,39,2),(106,40,2),(108,41,3),(113,42,2),(114,43,2),(115,44,2),(116,45,2),(118,46,3),(119,47,2);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-05-26 20:40:45
