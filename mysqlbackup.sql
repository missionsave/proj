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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabFases`
--

LOCK TABLES `tabFases` WRITE;
/*!40000 ALTER TABLE `tabFases` DISABLE KEYS */;
INSERT INTO `tabFases` VALUES (1,'Implementação do elevador do robot',NULL,1,80),(2,'Implementação do desumidificador',NULL,1,120),(3,'Implementação dos painéis solares',NULL,1,320),(4,'Implementação do robot plantio',NULL,1,320),(5,'Implementação do robot colheita',NULL,1,320),(6,'Implementação da estrutura',NULL,1,80),(7,'Implementação da maquete',NULL,1,160),(8,'Produção da maquete',NULL,1,80),(9,'Produção  da estrutura',NULL,2,80),(10,'Implementação do site',NULL,1,320),(11,'Implementação da confeção de sopa',NULL,1,320);
/*!40000 ALTER TABLE `tabFases` ENABLE KEYS */;
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabPontos`
--

LOCK TABLES `tabPontos` WRITE;
/*!40000 ALTER TABLE `tabPontos` DISABLE KEYS */;
INSERT INTO `tabPontos` VALUES (1,1,10,'2019-11-29 19:36:00',NULL),(2,1,10,'2019-11-29 19:40:02','2019-11-29 20:40:05'),(3,1,10,'2019-11-29 15:40:40','2019-11-29 19:40:40'),(4,1,10,'2019-11-29 19:12:56','2019-11-29 23:10:00'),(5,1,10,'2019-11-30 01:00:00','2019-12-01 01:30:00'),(6,1,6,'2019-12-02 19:00:00','2019-12-04 19:06:55'),(13,1,6,'2019-12-04 19:24:16','2019-12-04 19:24:31'),(14,1,8,'2019-12-04 19:25:36','2019-12-04 19:25:57'),(15,1,11,'2019-12-04 19:30:31','2019-12-04 19:37:25'),(16,1,4,'2019-12-04 19:37:55','2019-12-04 19:39:01'),(17,1,2,'2019-12-04 19:41:57','2019-12-04 19:42:07'),(18,1,1,'2019-12-04 19:42:28','2019-12-04 19:43:02'),(19,1,5,'2019-12-04 20:19:18','2019-12-04 21:48:10'),(20,1,7,'2019-12-04 21:48:22','2019-12-04 22:01:34'),(21,1,7,'2019-12-04 22:01:44',NULL),(24,2,3,'2019-12-04 22:07:31',NULL);
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
INSERT INTO `tabWorkers` VALUES (1,'Daniel Chanfana Santos','ttt','superbem@gmail.com'),(2,'Miguel','aaa','miguel@gmail.com');
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
INSERT INTO `test2` VALUES (22,'teste22');
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

-- Dump completed on 2019-12-04 22:39:36
