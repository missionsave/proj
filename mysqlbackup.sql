-- MariaDB dump 10.17  Distrib 10.4.8-MariaDB, for Win64 (AMD64)
--
-- Host: remotemysql.com    Database: GBtyfP4tfL
-- ------------------------------------------------------
-- Server version	8.0.13-4

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `MyGuests`
--

DROP TABLE IF EXISTS `MyGuests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MyGuests` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reg_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MyGuests`
--

LOCK TABLES `MyGuests` WRITE;
/*!40000 ALTER TABLE `MyGuests` DISABLE KEYS */;
INSERT INTO `MyGuests` VALUES (1,'aaa','bbb',NULL,'2019-11-28 23:18:39');
/*!40000 ALTER TABLE `MyGuests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fund`
--

DROP TABLE IF EXISTS `fund`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fund` (
  `cid` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `comment` blob,
  PRIMARY KEY (`cid`),
  KEY `ix_length_email` (`email`(255))
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fund`
--

LOCK TABLES `fund` WRITE;
/*!40000 ALTER TABLE `fund` DISABLE KEYS */;
INSERT INTO `fund` VALUES (1,'<?php\r\n	\r\n$servername = \"remotemysql.com\";\r\n$username = \"GBtyfP4tfL\";\r\n$password = \"\";\r\n$dbname = \"GBtyfP4tfL\";\r\n\r\ntry {\r\n    $conn = new PDO(\"mysql:host=$servername;dbname=$dbname\", $username, $password);\r\n    // set the PDO error mode to exception\r\n    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);\r\n\r\n    // sql to create table\r\n    $sql = \"CREATE TABLE MyGuests (\r\n    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,\r\n    firstname VARCHAR(30) NOT NULL,\r\n    lastname VARCHAR(30) NOT NULL,\r\n    email VARCHAR(50),\r\n    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP\r\n    )\";\r\n    // use exec() because no results are returned\r\n    //$conn->exec($sql);\r\n    //echo \"Table MyGuests created successfully\";\r\n	\r\n		$sql=\"CREATE TABLE IF NOT EXISTS fund (\r\n	 cid INTEGER PRIMARY KEY,\r\n	 name TEXT NOT NULL,\r\n	 email TEXT NOT NULL,\r\n	 KEY ix_length_email (email(255)),\r\n	 amount INTEGER NOT NULL,\r\n	 comment BLOB\r\n	)ENGINE=InnoDB;\";\r\n	$conn->query($sql);\r\n	\r\n	\r\n    }\r\ncatch(PDOException $e)\r\n    {\r\n    echo $sql . \"<br>\" . $e->getMessage();\r\n    }\r\n\r\n$conn = null;\r\n\r\n\r\n\r\n?>','a',1,NULL);
/*!40000 ALTER TABLE `fund` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabFases`
--

DROP TABLE IF EXISTS `tabFases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabFases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Fase` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `FaseEn` tinytext COLLATE utf8_unicode_ci,
  `Level` double NOT NULL DEFAULT '0',
  `EstimatedHours` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabFases`
--

LOCK TABLES `tabFases` WRITE;
/*!40000 ALTER TABLE `tabFases` DISABLE KEYS */;
INSERT INTO `tabFases` VALUES (1,'Implementação do elevador do robot','Robot Elevator Implementation',1,80),(2,'Implementação do desumidificador','Dehumidifier Implementation',1,120),(3,'Implementação dos painéis solares','Implementation of solar panels',1,160),(4,'Implementação do robot plantio','Implementation of the planting robot',1,320),(5,'Implementação do robot colheita','Robot Harvest Implementation',1,320),(6,'Implementação da estrutura','Structure implementation',1,80),(7,'Implementação da maquete','Mockup Implementation',1,160),(8,'Produção da maquete','Mockup Production',1,80),(9,'Produção  da estrutura','Structure Production',2,80),(10,'Implementação do site','Website Implementation',1,320),(11,'Implementação da confeção de sopa','Implementation of soup making',1,320),(12,'Implementação do processo de compostagem','Composting process implementation',1,200),(13,'Implementação do sistema elétrico','Implementation of the electrical system',1,80),(14,'Produção  do sistema elétrico','Prodution of the electrical system',2,80),(15,'Implementação da informática','Computer implementation',1,160),(16,'Implementação dos copos','Cup implementation',1,160),(17,'Implementação do robot estrutura','Implementation of the robot structure',1,80);
/*!40000 ALTER TABLE `tabFases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabJobs`
--

DROP TABLE IF EXISTS `tabJobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabJobs` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `date` text COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` text COLLATE utf8_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `job` text COLLATE utf8_unicode_ci NOT NULL,
  `presentention` text COLLATE utf8_unicode_ci NOT NULL,
  `cv` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`cid`),
  UNIQUE KEY `idxemail` (`email`(16)) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabJobs`
--

LOCK TABLES `tabJobs` WRITE;
/*!40000 ALTER TABLE `tabJobs` DISABLE KEYS */;
INSERT INTO `tabJobs` VALUES (1,'2019-12-05 20:44:35','Daniel Santos','danielchanfana@gmail.com','939741806',2000,'engelect','teste','');
/*!40000 ALTER TABLE `tabJobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabPontos`
--

DROP TABLE IF EXISTS `tabPontos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabPontos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idWorker` int(11) NOT NULL,
  `idfase` int(11) NOT NULL,
  `start` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end` datetime DEFAULT NULL,
  `obs` tinytext CHARACTER SET utf8 COLLATE utf8_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabPontos`
--

LOCK TABLES `tabPontos` WRITE;
/*!40000 ALTER TABLE `tabPontos` DISABLE KEYS */;
INSERT INTO `tabPontos` VALUES (1,1,10,'2019-11-29 19:36:00','2019-11-29 19:39:00',NULL),(2,1,10,'2019-11-29 19:40:02','2019-11-29 20:40:05',NULL),(3,1,10,'2019-11-29 15:40:40','2019-11-29 19:40:40',NULL),(4,1,10,'2019-11-29 19:12:56','2019-11-29 23:10:00',NULL),(5,1,10,'2019-11-30 01:00:00','2019-12-01 01:30:00',NULL),(6,1,6,'2019-12-02 19:00:00','2019-12-04 19:06:55',NULL),(13,1,6,'2019-12-04 19:24:16','2019-12-04 19:24:31',NULL),(14,1,8,'2019-12-04 19:25:36','2019-12-04 19:25:57',NULL),(15,1,11,'2019-12-04 19:30:31','2019-12-04 19:37:25',NULL),(16,1,4,'2019-12-04 19:37:55','2019-12-04 19:39:01',NULL),(17,1,2,'2019-12-04 19:41:57','2019-12-04 19:42:07',NULL),(18,1,1,'2019-12-04 19:42:28','2019-12-04 19:43:02',NULL),(19,1,17,'2019-12-04 20:19:18','2019-12-04 21:48:10',NULL),(20,1,7,'2019-12-04 21:48:22','2019-12-04 22:01:34',NULL),(21,1,7,'2019-12-04 22:01:44','2019-12-04 22:41:23',NULL),(24,2,3,'2019-12-04 22:07:31','2019-12-04 23:02:27',NULL),(25,1,7,'2019-12-04 22:41:27','2019-12-04 22:41:29',NULL),(26,1,7,'2019-12-04 22:41:30','2019-12-04 22:41:32',NULL),(27,1,7,'2019-12-04 22:41:33','2019-12-04 22:41:34',NULL),(28,1,7,'2019-12-04 22:41:35','2019-12-04 22:41:37',NULL),(29,1,7,'2019-12-04 22:41:39','2019-12-04 22:41:43',NULL),(30,1,7,'2019-12-04 22:41:44','2019-12-04 22:41:47',NULL),(31,1,7,'2019-12-04 22:41:49','2019-12-04 22:41:53',NULL),(33,1,10,'2019-12-04 23:13:09','2019-12-04 23:40:30',NULL),(34,1,10,'2019-12-04 23:42:06','2019-12-04 23:45:58',NULL),(35,1,10,'2019-12-04 23:54:07','2019-12-04 23:54:19',NULL),(36,1,10,'2019-12-04 23:54:27','2019-12-04 23:55:06',NULL),(37,1,10,'2019-12-04 23:55:19','2019-12-04 23:58:34',NULL),(38,1,10,'2019-12-05 00:15:29','2019-12-05 00:15:33',NULL),(39,1,10,'2019-12-05 14:39:08','2019-12-05 14:39:40',NULL),(40,1,5,'2019-12-05 14:39:49','2019-12-05 14:52:15',NULL),(41,1,5,'2019-12-05 14:52:48','2019-12-05 14:54:04',NULL),(42,1,5,'2019-12-05 15:04:29','2019-12-05 15:05:00',NULL),(43,1,10,'2019-12-05 15:17:26','2019-12-05 15:18:30',NULL),(44,1,10,'2019-12-06 21:48:51','2019-12-06 21:51:19',NULL),(45,1,10,'2019-12-06 21:51:26','2019-12-06 21:51:41',NULL),(46,1,10,'2019-12-06 21:53:24','2019-12-06 21:53:33',NULL),(47,1,10,'2019-12-06 22:40:52','2019-12-06 22:41:09',NULL),(48,1,10,'2019-12-08 01:34:45','2019-12-08 01:35:13',NULL),(49,1,10,'2019-12-08 01:35:20','2019-12-08 01:36:09',NULL),(50,1,10,'2019-12-08 01:36:22','2019-12-08 01:36:35',NULL),(51,1,10,'2019-12-08 01:36:37','2019-12-08 01:40:40',NULL),(52,1,10,'2019-12-08 01:40:41','2019-12-08 01:40:48',NULL),(53,1,10,'2019-12-08 01:40:51','2019-12-08 01:40:59',NULL),(54,1,10,'2019-12-08 01:41:08','2019-12-08 01:41:09',NULL),(55,1,10,'2019-12-08 01:44:27','2019-12-08 01:44:55',NULL),(56,1,10,'2019-12-08 01:44:56','2019-12-08 01:47:00',NULL),(57,1,10,'2019-12-08 01:47:26','2019-12-08 01:47:26',NULL),(58,1,10,'2019-12-08 01:49:37','2019-12-08 01:49:48',NULL),(59,1,10,'2019-12-08 01:49:48','2019-12-08 01:51:37',NULL),(60,1,10,'2019-12-08 01:52:52','2019-12-08 01:52:59',NULL),(61,1,10,'2019-12-08 01:53:03','2019-12-08 01:56:43',NULL),(62,1,10,'2019-12-08 02:01:06','2019-12-08 02:01:45',NULL),(63,1,10,'2019-12-08 02:02:39','2019-12-08 02:04:20',NULL),(64,1,10,'2019-12-08 02:05:47','2019-12-08 02:06:01',NULL),(65,1,10,'2019-12-08 02:09:30','2019-12-08 02:10:08',NULL),(66,1,10,'2019-12-08 02:11:22','2019-12-08 02:24:06',NULL),(67,1,10,'2019-12-08 02:24:09','2019-12-08 02:24:20',NULL),(68,1,10,'2019-12-08 02:27:45','2019-12-08 02:32:52',NULL),(69,1,10,'2019-12-08 02:33:08','2019-12-08 12:26:08',NULL),(70,1,10,'2019-12-08 12:29:40','2019-12-08 12:30:29',NULL),(71,1,10,'2019-12-08 12:30:47','2019-12-08 12:32:47',NULL),(72,1,10,'2019-12-08 14:43:00','2019-12-08 15:00:54',NULL),(73,1,10,'2019-12-08 23:46:44','2019-12-08 23:48:04',NULL),(74,1,10,'2019-12-10 20:37:13','2019-12-10 20:38:33',NULL),(75,1,10,'2019-12-12 10:05:32','2019-12-12 11:46:32',NULL),(76,1,8,'2019-12-12 18:06:16','2019-12-12 18:34:13',NULL),(77,1,10,'2019-12-12 18:48:06','2019-12-12 19:24:06',NULL),(78,1,10,'2019-12-13 00:36:50','2019-12-13 00:51:13',NULL),(79,1,10,'2019-12-13 02:47:41','2019-12-13 02:54:53',NULL),(80,1,10,'2019-12-13 03:51:27','2019-12-13 04:49:09',NULL),(81,1,4,'2019-12-13 05:32:48','2019-12-13 06:00:02',NULL),(82,1,4,'2019-12-13 06:18:28','2019-12-13 06:28:41',NULL),(83,1,10,'2019-12-13 12:53:03','2019-12-13 13:10:55',NULL),(84,1,10,'2019-12-13 14:21:40','2019-12-13 16:22:46',NULL),(85,1,10,'2019-12-13 16:50:33','2019-12-13 17:35:11',NULL),(86,1,10,'2019-12-13 17:39:44','2019-12-13 17:49:27',NULL),(87,1,15,'2019-12-13 22:16:00','2019-12-13 22:24:21',NULL),(88,1,15,'2019-12-13 22:43:58','2019-12-13 23:05:15',NULL),(89,1,10,'2019-12-13 23:19:11','2019-12-13 23:36:23',NULL),(90,1,10,'2019-12-14 00:09:45','2019-12-14 00:33:00',NULL),(91,1,10,'2019-12-14 01:05:47','2019-12-14 01:31:05',NULL),(92,1,10,'2019-12-14 01:38:27','2019-12-14 01:50:02',NULL),(93,1,10,'2019-12-14 01:50:10','2019-12-14 01:55:26',NULL),(94,1,10,'2019-12-14 02:11:29','2019-12-14 02:22:35',NULL),(95,1,10,'2019-12-14 16:47:57','2019-12-14 17:01:19',NULL),(96,1,10,'2019-12-14 17:19:26','2019-12-14 17:33:03',NULL);
/*!40000 ALTER TABLE `tabPontos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabWorkers`
--

DROP TABLE IF EXISTS `tabWorkers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabWorkers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `pass` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `email` tinytext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabWorkers`
--

LOCK TABLES `tabWorkers` WRITE;
/*!40000 ALTER TABLE `tabWorkers` DISABLE KEYS */;
INSERT INTO `tabWorkers` VALUES (1,'Daniel Chanfana Santos','ttt','superbem@gmail.com'),(2,'Miguel','','miguel@gmail.com');
/*!40000 ALTER TABLE `tabWorkers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test2`
--

DROP TABLE IF EXISTS `test2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test2` (
  `a1` int(11) NOT NULL,
  `a2` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test2`
--

LOCK TABLES `test2` WRITE;
/*!40000 ALTER TABLE `test2` DISABLE KEYS */;
/*!40000 ALTER TABLE `test2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teste`
--

DROP TABLE IF EXISTS `teste`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teste` (
  `a` int(11) NOT NULL,
  `b` int(11) NOT NULL,
  `c` int(11) NOT NULL,
  `d` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teste`
--

LOCK TABLES `teste` WRITE;
/*!40000 ALTER TABLE `teste` DISABLE KEYS */;
INSERT INTO `teste` VALUES (1,2,3,3),(2,2,2,2),(3,3,3,3),(4,4,4,4),(10,10,10,10),(11,11,11,11),(12,12,12,12),(13,13,13,13);
/*!40000 ALTER TABLE `teste` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-14 22:02:18
