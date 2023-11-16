CREATE DATABASE  IF NOT EXISTS `itelec3db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `itelec3db`;
-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: itelec3db
-- ------------------------------------------------------
-- Server version	8.0.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categorytbl`
--

DROP TABLE IF EXISTS `categorytbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorytbl` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `category_name` text NOT NULL,
  `category_description` text,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorytbl`
--

LOCK TABLES `categorytbl` WRITE;
/*!40000 ALTER TABLE `categorytbl` DISABLE KEYS */;
INSERT INTO `categorytbl` VALUES (1,'soft drinks','water-based flavored drinks'),(2,'alcoholic beverages','fermented liquor which contains ethanol'),(3,'street food','ready-to-eat foods'),(4,'dairy','food product which is made of or contains milk'),(5,'fruit','sweet and fleshy product of a tree or other plant ');
/*!40000 ALTER TABLE `categorytbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itemtbl`
--

DROP TABLE IF EXISTS `itemtbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `itemtbl` (
  `item_id` int NOT NULL AUTO_INCREMENT,
  `item_name` text NOT NULL,
  `item_price` double NOT NULL,
  `item_quantity` int NOT NULL,
  `category_id` int NOT NULL,
  PRIMARY KEY (`item_id`),
  KEY `category_id_idx` (`category_id`),
  CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `categorytbl` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itemtbl`
--

LOCK TABLES `itemtbl` WRITE;
/*!40000 ALTER TABLE `itemtbl` DISABLE KEYS */;
INSERT INTO `itemtbl` VALUES (1,'magnolia apple',15,100,1),(2,'red horse',120,150,2),(3,'bananaque',5,50,3),(4,'Yogurt',50,34,4),(5,'apple',20,79,5),(10,'test',1,1,1),(11,'test one',23,1121,5);
/*!40000 ALTER TABLE `itemtbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordertbl`
--

DROP TABLE IF EXISTS `ordertbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ordertbl` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `item_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `total` double DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordertbl`
--

LOCK TABLES `ordertbl` WRITE;
/*!40000 ALTER TABLE `ordertbl` DISABLE KEYS */;
INSERT INTO `ordertbl` VALUES (1,1,100,1500),(2,2,1,120),(3,3,5,25),(4,4,2,100),(5,5,5,100);
/*!40000 ALTER TABLE `ordertbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usertbl`
--

DROP TABLE IF EXISTS `usertbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usertbl` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `gender` text NOT NULL,
  `civil_status` text NOT NULL,
  `birthdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usertbl`
--

LOCK TABLES `usertbl` WRITE;
/*!40000 ALTER TABLE `usertbl` DISABLE KEYS */;
INSERT INTO `usertbl` VALUES (1,'BALAKUBAK','blkbk12','balakubak123','MALE','SINGLE','2004-02-15'),(2,'makimaki','maimaki2','makiimaki1000','MALE','SINGLE','2003-03-03'),(3,'McFries','rrrrr0','ilovefries','MALE','SINGLE','2002-02-01'),(4,'whatsmyname','mynameiswhat','mwahahah00921','MALE','SINGLE','2004-06-05'),(5,'IMPETUSBLAZE','remskie123','remskye0989','MALE','SINGLE','2000-07-08'),(27,'NAMER','usernamer','PW123123','MALE','SINGLE','2000-12-12'),(31,'test','test','test','male','singles','2000-01-01');
/*!40000 ALTER TABLE `usertbl` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-16  2:05:44
