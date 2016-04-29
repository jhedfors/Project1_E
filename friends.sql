-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: friends
-- ------------------------------------------------------
-- Server version	5.5.41-log

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
-- Table structure for table `friendships`
--

DROP TABLE IF EXISTS `friendships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `friendships` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_friendships_users_idx` (`user_id`),
  KEY `fk_friendships_users1_idx` (`friend_id`),
  CONSTRAINT `fk_friendships_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_friendships_users1` FOREIGN KEY (`friend_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `friendships`
--

LOCK TABLES `friendships` WRITE;
/*!40000 ALTER TABLE `friendships` DISABLE KEYS */;
INSERT INTO `friendships` VALUES (7,2,5,'2016-04-28 22:06:39','2016-04-28 22:06:39'),(8,5,2,'2016-04-28 22:06:39','2016-04-28 22:06:39'),(15,2,3,'2016-04-28 22:11:33','2016-04-28 22:11:33'),(16,3,2,'2016-04-28 22:11:33','2016-04-28 22:11:33'),(17,2,4,'2016-04-28 22:21:35','2016-04-28 22:21:35'),(18,4,2,'2016-04-28 22:21:35','2016-04-28 22:21:35'),(19,2,6,'2016-04-28 22:21:39','2016-04-28 22:21:39'),(20,6,2,'2016-04-28 22:21:39','2016-04-28 22:21:39');
/*!40000 ALTER TABLE `friendships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `alias` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'Jeff Hedfors','Jeff','jeff@hedfors.net','a642a77abd7d4f51bf9226ceaf891fcbb5b299b8','1967-11-30 00:00:00','2016-04-28 21:04:27','2016-04-28 21:04:27'),(3,'Kazu Hedfors','Kazu','kazu@hedfors.net','a642a77abd7d4f51bf9226ceaf891fcbb5b299b8','1967-11-30 00:00:00','2016-04-28 21:04:29','2016-04-28 21:04:29'),(4,'Jayden Hedfors','Jaycen','jayden@hedfors.net','a642a77abd7d4f51bf9226ceaf891fcbb5b299b8','1967-11-30 00:00:00','2016-04-28 21:04:31','2016-04-28 21:04:31'),(5,'Keefer Hedfors','Keefer','keefer@hedfors.net','a642a77abd7d4f51bf9226ceaf891fcbb5b299b8','1967-11-30 00:00:00','2016-04-28 21:17:18','2016-04-28 21:17:18'),(6,'Linda Goebel','Linda','linda@goebel.com','a642a77abd7d4f51bf9226ceaf891fcbb5b299b8','1967-11-30 00:00:00','2016-04-28 21:17:21','2016-04-28 21:17:21'),(7,'Jim Hedford','Jim','jim@hedford.com','a642a77abd7d4f51bf9226ceaf891fcbb5b299b8','1967-11-30 00:00:00','2016-04-28 21:28:20','2016-04-28 21:28:20'),(9,'Julie Hedford','Julie','julie@hedford.com','a642a77abd7d4f51bf9226ceaf891fcbb5b299b8','1999-09-09 00:00:00','2016-04-28 22:01:32','2016-04-28 22:01:32');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-28 22:51:35
