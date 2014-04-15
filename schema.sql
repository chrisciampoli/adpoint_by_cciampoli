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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requests`
--

LOCK TABLES `requests` WRITE;
/*!40000 ALTER TABLE `requests` DISABLE KEYS */;
INSERT INTO `requests` VALUES (1,2,'5','0','Tue Mar 25 2014','6:30PM - 10:30PM','pending'),(2,2,'8,9','0','Wed Mar 26 2014','2:30PM - 10:30PM','pending'),(3,2,'5','0','Wed Mar 26 2014','2:30PM - 10:30PM','pending'),(4,2,'9','0','Wed Mar 26 2014','2:30PM - 10:30PM','pending'),(5,2,'9','0','Wed Mar 26 2014','2:30PM - 10:30PM','pending'),(6,2,'8','0','Wed Mar 26 2014','2:30PM - 10:30PM','pending'),(7,2,'5,8','0','Wed Mar 26 2014','2:30PM - 10:30PM','pending'),(8,2,'9','0','Wed Mar 26 2014','2:30PM - 10:30PM','pending');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedules`
--

LOCK TABLES `schedules` WRITE;
/*!40000 ALTER TABLE `schedules` DISABLE KEYS */;
INSERT INTO `schedules` VALUES (4,'edward burdeno','[{\"date\":\"22\\/3\\/2014\",\"title\":\"Starbucks: College - Cashier\",\"color\":\"#333\",\"content\":\"6:30PM - 10:30PM\"},{\"date\":\"23\\/3\\/2014\",\"title\":\"Starbucks: College - Barista\",\"color\":\"#333\",\"content\":\"2:30PM - 10:30PM\"},{\"date\":\"24\\/3\\/2014\",\"title\":\"Starbucks: College - Barista\",\"color\":\"#333\",\"content\":\"2:30PM - 10:30PM\"}]','2014-03-24 06:01:26'),(5,'christopher ciampoli','[{\"date\":\"25\\/3\\/2014\",\"title\":\"Starbucks: College - Cashier\",\"color\":\"#333\",\"content\":\"6:30PM - 10:30PM\"},{\"date\":\"26\\/3\\/2014\",\"title\":\"Starbucks: College - Barista\",\"color\":\"#333\",\"content\":\"2:30PM - 10:30PM\"},{\"date\":\"27\\/3\\/2014\",\"title\":\"Starbucks: College - Barista\",\"color\":\"#333\",\"content\":\"2:30PM - 10:30PM\"}]','2014-03-25 16:04:10');
/*!40000 ALTER TABLE `schedules` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'\0\0','administrator','59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4','9462e8eee0','admin@admin.com','',NULL,NULL,NULL,1268889823,1268889823,1,'Admin','istrator','ADMIN','0'),(2,'\0\0','christopher ciampoli','a8eb1f0a280b70861a8bbba4cb19b7cd5eadde35',NULL,'chrisciampoli@gmail.com',NULL,'03427d2a4e847b3e1ab601856dff5c83201835cf',1392185472,NULL,1390343473,1397530729,1,'Christopher','Ciampoli','Swift Schedules','6192491738'),(3,'\0\0','steven acapela','3d81e68e1a376f50cdb65f1779fe2af3a4748c62',NULL,'sacapela@test.com',NULL,NULL,NULL,NULL,1390343719,1392343909,1,'steven','acapela','Swift Schedules','6192491738'),(4,'\0\0','jim bean','a368f07ef56e23dd8429fcb2b094ffd061e3c733',NULL,'jbean@starbucks.com',NULL,NULL,NULL,NULL,1390544347,1395103270,1,'Jim','Bean','Starbucks','44444444'),(5,'¿®D','edward burdeno','fc20f2329dd51abe95042bba872af73a5fd8d510',NULL,'eburdeno@swiftschedules.com',NULL,NULL,NULL,NULL,1390768392,1397522592,1,'Edward','Burdeno','Swift Schedules','1231231234'),(6,'x≈$','action jackson','45ca09916f4a4b0ea3134baf078109cb3d526d9b',NULL,'test@test.com',NULL,NULL,NULL,NULL,1391151433,1394432451,1,'Action','Jackson','test@test.com','1234555565'),(7,'¢„…','test employee','43e5ce82f539a9ed92d4ca8e0e42642917fedcc1',NULL,'tester@test.com',NULL,NULL,NULL,NULL,1393979081,1394852887,1,'Test','Employee','test','6191233211'),(8,'¢„…','jeff saenz','46040aa77e516ae118ef912f6f85cd71d95bcd0a',NULL,'jeff.saenz@gmail.com',NULL,NULL,NULL,NULL,1394245543,1397172346,1,'Jeff','Saenz','Swiftnco','1111111111'),(9,'¢„…','ian gearhart','8920d29b8ee54342fa6aee72e113793008e47819',NULL,'gearhartian@gmail.com',NULL,NULL,NULL,NULL,1394245583,1395097339,1,'Ian','Gearhart','Swiftnco','1111111111'),(21,'¢„…','james brown','fea62a3a16c0f86053e1d8999c3db7696e0ee476',NULL,'jbrown@swiftnco.com',NULL,NULL,NULL,NULL,1397455991,1397455991,1,'James','Brown','Swift Schedules','1111111111'),(22,'¢„…','steve jeve','9b38ebb4c2f969617621a32a43c8da8135af43e6',NULL,'sjeve@gmail.com',NULL,NULL,NULL,NULL,1397456063,1397456063,1,'Steve','Jeve','Swift Schedules','1111111111'),(23,'¢„…','john doe','4670a6fe566e95d59f422e59ef605198b079b828',NULL,'jdoe@example.com',NULL,NULL,NULL,NULL,1397456194,1397456260,1,'John','Doe','Swift Schedules','1111111111'),(24,'¢„…','james peach','faeaf5af7fea3a121051db75cce0f8e90dcb2639',NULL,'jpeach@gmail.com',NULL,NULL,NULL,NULL,1397463423,1397463423,1,'james','peach','Swift Schedules','1111111111'),(25,'¢„…','caine ciampoli','27a6e93401c4623adfcd8b6e37da5b5f2564be86',NULL,'caine@ciampoli.com',NULL,NULL,NULL,NULL,1397530752,1397530752,1,'Caine','Ciampoli','Swift Schedules','1111111111');
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
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` VALUES (34,1,1),(52,2,1),(53,2,3),(35,3,1),(36,4,3),(26,5,2),(17,6,3),(20,7,1),(46,8,2),(28,9,2),(66,21,2),(67,22,2),(68,23,2),(69,24,2),(70,25,2);
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

-- Dump completed on 2014-04-15  3:14:16
