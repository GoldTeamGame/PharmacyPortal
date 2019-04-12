-- MySQL dump 10.13  Distrib 5.5.38, for osx10.6 (i386)
--
-- Host: localhost    Database: Photos
-- ------------------------------------------------------
-- Server version	5.5.38

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
-- Drop/Create the database -- Added by Socratis Tornaritis
--
DROP DATABASE IF EXISTS Photos;
CREATE DATABASE Photos;
USE Photos;

--
-- Table structure for table `Album`
--

DROP TABLE IF EXISTS `Album`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Album` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `dateCreated` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Album`
--

LOCK TABLES `Album` WRITE;
/*!40000 ALTER TABLE `Album` DISABLE KEYS */;
INSERT INTO `Album` VALUES (1,'beach','2016-01-15'),(2,'mountain','2016-01-26'),(3,'valley','2016-01-19');
/*!40000 ALTER TABLE `Album` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Occasion`
--

DROP TABLE IF EXISTS `Occasion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Occasion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `dateOccured` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Occasion`
--

LOCK TABLES `Occasion` WRITE;
/*!40000 ALTER TABLE `Occasion` DISABLE KEYS */;
INSERT INTO `Occasion` VALUES (1,'tanning','2016-01-15'),(2,'climbing','2016-01-26'),(3,'farming','2016-01-09');
/*!40000 ALTER TABLE `Occasion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Photo`
--

DROP TABLE IF EXISTS `Photo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Photo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(30) DEFAULT NULL,
  `dateTaken` date DEFAULT NULL,
  `locationTaken` varchar(50) DEFAULT NULL,
  `imagePath` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Photo`
--

LOCK TABLES `Photo` WRITE;
/*!40000 ALTER TABLE `Photo` DISABLE KEYS */;
INSERT INTO `Photo` VALUES (1,'beta.jpg','2016-01-15','nowhere','../images/beta.jpg'),(2,'alpha.jpg','2016-01-26','there','../images/alpha.jpg'),(3,'gamma.jpg','2016-01-09','here','../images/gamma.jpg');
/*!40000 ALTER TABLE `Photo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Photo_Album`
--

DROP TABLE IF EXISTS `Photo_Album`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Photo_Album` (
  `photo$id` int(10) unsigned NOT NULL,
  `album$id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`photo$id`,`album$id`),
  KEY `album$id` (`album$id`),
  CONSTRAINT `photo_album_ibfk_1` FOREIGN KEY (`photo$id`) REFERENCES `Photo` (`id`),
  CONSTRAINT `photo_album_ibfk_2` FOREIGN KEY (`album$id`) REFERENCES `Album` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Photo_Album`
--

LOCK TABLES `Photo_Album` WRITE;
/*!40000 ALTER TABLE `Photo_Album` DISABLE KEYS */;
INSERT INTO `Photo_Album` VALUES (1,1),(3,1),(1,2),(2,2),(1,3),(2,3);
/*!40000 ALTER TABLE `Photo_Album` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Photo_Occasion`
--

DROP TABLE IF EXISTS `Photo_Occasion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Photo_Occasion` (
  `photo$id` int(10) unsigned NOT NULL,
  `occasion$id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`photo$id`,`occasion$id`),
  KEY `occasion$id` (`occasion$id`),
  CONSTRAINT `photo_occasion_ibfk_1` FOREIGN KEY (`photo$id`) REFERENCES `Photo` (`id`),
  CONSTRAINT `photo_occasion_ibfk_2` FOREIGN KEY (`occasion$id`) REFERENCES `Occasion` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Photo_Occasion`
--

LOCK TABLES `Photo_Occasion` WRITE;
/*!40000 ALTER TABLE `Photo_Occasion` DISABLE KEYS */;
INSERT INTO `Photo_Occasion` VALUES (1,1),(1,2),(3,2),(1,3),(2,3);
/*!40000 ALTER TABLE `Photo_Occasion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES (1,'ross123','ross123','ross123@siue.edu'),(2,'guest','guest','guest@siue.edu');
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;



-- Dump completed on 2016-03-23 12:01:48
