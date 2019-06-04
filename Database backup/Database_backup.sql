-- MySQL dump 10.13  Distrib 8.0.15, for Win64 (x86_64)
--
-- Host: localhost    Database: canclub_web
-- ------------------------------------------------------
-- Server version	8.0.15

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(200) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `prop_id` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mem_id_idx` (`mem_id`),
  KEY `prop_id_idx` (`prop_id`),
  CONSTRAINT `mem_id` FOREIGN KEY (`mem_id`) REFERENCES `member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `prop_id` FOREIGN KEY (`prop_id`) REFERENCES `proposal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'Helal olsun başkana!','2019-05-06',1,1),(2,'Çok Güzel bir etkinlik!','2019-05-05',1,2),(3,'Süper','2019-05-07',1,3),(4,'Olmamış','2019-05-08',2,3),(5,'Fena değil','2019-05-11',1,2),(6,'Abi mükemmel','2019-05-10',2,2),(7,'Niye kimse beğenmedi?','2019-05-11',3,1),(8,'Ben beğendim aslında :D','2019-05-11',3,3),(9,'Tam aradığım konferans yine red saloon da :))','2019-05-11',2,3),(10,'Arkadaşlar bakın bu seminere gelin lütfen!','2019-05-12',14,1),(11,'Hak yiyen HACK yer!','2019-05-12',4,2),(12,'Zaten her yer pil toplama kutusu oldu yeter artık!','2019-05-12',11,2),(13,'Sayın Başkan gerçekten bıktık :\'(','2019-05-12',14,2),(14,'İzmir\'in dağlarında çiçekler açar','2019-05-12',5,3);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES (1,'Melo','Genesis','melo@yahoo.com','Computer Engineering','melo','123','1997-01-01'),(2,'Seno','Genesis','seno@gmail.com','Mechatronics Engineering','seno','123','1991-11-11'),(3,'Yesis','Alamurat','yeprem@hotmail.com','Computer Engineering','yeprem','123','1998-04-23'),(4,'Seyyah','Yolcu','seyyah@gmail.com','Electrical Electronics Engineering','seyyah','123','1992-04-17'),(5,'Alibir','ASD','alibir@gmail.com','Electronics and Communication Engineering','alibirAA','123','1995-08-08'),(6,'HukukAli','Adaletinolu','hkali@gmail.com','Faculty of Law','huka123','huk321','1995-06-05'),(7,'BankörTevfik','Bankonot','bank@gmail.com','Faculty of Law','banko','123','1995-05-08'),(8,'Züftü','Yaban','zft@gmail.com','Industrial Engineering','zft06ankara','zft_06','1995-09-07'),(9,'Afife','Hokka','aff@gmail.com','Civil Engineering','afife32','istanbul','1995-05-02'),(11,'Azize','Kaldiran','azize@gmail.com','Mechanical Engineering','azER','aze45','1995-02-06'),(12,'Mezize','Saldiran','mez@gmail.com','Computer Engineering','mzzG97','mezemeze','1994-11-03'),(13,'Hazize','Doldiran','haz@gmail.com','Mechatronics Engineering','hakko','hoper','1997-08-08'),(14,'Martin','Ava','mar@gmail.com','Computer Engineering','muradiye','martinli','1995-10-06'),(15,'Dolak','AGa','d@gmail.com','Mechatronics Engineering','şehnaz','longa','1995-12-30'),(16,'Kalmak','Kulu','kal@gmail.com','Computer Engineering','hicazkar','zülfikar','1996-04-02'),(17,'Deli','Kosimov','del@gmail.com','Mechatronics Engineering','Delimine','delidliro','1996-09-28'),(18,'Hoppa','Malako','heop@gmail.com','Computer Engineering','saban','salako','1995-08-04'),(19,'Rizeli','Meloc','riz@gmail.com','Civil Engineering','yesilcam','arogora','1996-08-28'),(20,'Mehmet','Malik','mehmo@gmail.com','CENG','mehmotec','123','1992-12-12'),(21,'Sena','Tanrıverdi','seno@genesis.com','Psychology','seno','123','1996-10-06'),(22,'Melih','Yaşar','melih@hotmail.com','Computer Engineering','melih','melo','2017-01-29'),(23,'Yeni','Eski','yen@g.com','ECE','new','123','2016-04-07'),(24,'Alender','Kalender','safak@gen.com','HUK','safak','123','2010-02-28'),(25,'Hayda','Genesis','safa2k@gen.com','CENG','hoyda','123','2012-04-30'),(30,'Seyyah','Yolcu','seyyah@gmail.com','CENG','seyyah','123','1992-12-12'),(31,'Calendar','York','tuy@gen.com','MECE','atarli','123','2011-04-30'),(32,'Late','Mate','ubuntu@mate.com','CENG','mate','123','1991-04-30'),(33,'Seno','Genesis','seno@gmail.com','Computer Engineering','seno','123','1991-11-11'),(41,'Ahmet','Mehmetler','ahmet@gmail.com','Computer Engineering','ahmets','123','1996-12-12'),(43,'Can','Manay','can@mail.com','Computer Engineering','can','123','1967-05-03'),(45,'Arif','Işık','arif@gmail.com','CENG','arif','123','1996-05-03'),(47,'Gulder','Hayat','gul@gmail.com','ECE','hayat','123','1973-07-12'),(48,'Aptu','Soymaz','as@gmail.com','CENG','aptu','123','1996-08-06');
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proposal`
--

DROP TABLE IF EXISTS `proposal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `proposal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mem_id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `likeCount` int(11) unsigned DEFAULT NULL,
  `dislikeCount` int(11) unsigned DEFAULT NULL,
  `createdAt` date DEFAULT NULL,
  `isActive` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `proposal_ibfk_1` (`mem_id`),
  CONSTRAINT `proposal_ibfk_1` FOREIGN KEY (`mem_id`) REFERENCES `member` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proposal`
--

LOCK TABLES `proposal` WRITE;
/*!40000 ALTER TABLE `proposal` DISABLE KEYS */;
INSERT INTO `proposal` VALUES (1,1,'technical trip','18 Mart Çanakkale Gezisi',5,0,'2019-05-10',1),(2,2,'seminar','Yapay Zeka',5,0,'2019-05-09',1),(3,1,'meeting','Klüp Konseyi Toplantısı',5,0,'2019-05-08',1),(4,3,'seminar','Siber Güvenlik Konferansı',5,0,'2019-05-07',1),(5,1,'technical trip','İzmir Yüksek Teknoloji Enstitüsü Teknik Gezisi',4,1,'2019-05-11',1),(8,1,'seminar','Çankaya Üniversitesi Tanıtım Semineri',1,3,'2019-05-11',1),(9,1,'social project','Çocuk Esirgeme Kurumu Yardım Projesi',0,3,'2019-05-11',1),(11,2,'other','Pil Toplama Kutularının Kampüs içinde Arttırılması',0,2,'2019-05-11',1),(12,1,'seminar','Data Mining Semineri',0,2,'2019-05-11',1),(13,1,'seminar','Kara Delikler Semineri',0,2,'2019-05-11',1),(14,1,'seminar','Büyük Veri',1,1,'2019-05-11',1);
/*!40000 ALTER TABLE `proposal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `voted_by`
--

DROP TABLE IF EXISTS `voted_by`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `voted_by` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prop_id` int(11) NOT NULL,
  `mem_by` int(11) NOT NULL,
  `liked` int(11) DEFAULT '0',
  `disliked` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `prop_idx` (`prop_id`),
  KEY `mem_by_idx` (`mem_by`),
  CONSTRAINT `mem_by` FOREIGN KEY (`mem_by`) REFERENCES `member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `prop` FOREIGN KEY (`prop_id`) REFERENCES `proposal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `voted_by`
--

LOCK TABLES `voted_by` WRITE;
/*!40000 ALTER TABLE `voted_by` DISABLE KEYS */;
INSERT INTO `voted_by` VALUES (1,1,1,1,0),(12,2,1,1,0),(13,3,1,1,0),(14,4,1,1,0),(15,5,1,1,0),(16,8,1,0,1),(17,9,1,0,1),(18,11,1,0,1),(19,12,1,0,1),(20,1,2,1,0),(21,2,2,1,0),(22,3,2,1,0),(23,4,2,1,0),(24,5,2,1,0),(25,8,2,0,1),(26,9,2,0,1),(27,12,2,0,1),(28,14,2,0,1),(29,1,3,1,0),(30,2,3,1,0),(31,3,3,1,0),(32,4,3,1,0),(33,5,3,1,0),(34,8,3,0,1),(35,9,3,0,1),(36,11,3,0,1),(37,13,3,0,1),(38,1,4,1,0),(39,2,4,1,0),(40,3,4,1,0),(41,4,4,1,0),(42,5,4,1,0),(43,8,4,1,0),(44,1,22,1,0),(45,2,22,1,0),(46,3,22,1,0),(47,4,22,1,0),(48,5,22,0,1),(49,13,1,0,1),(50,14,1,1,0);
/*!40000 ALTER TABLE `voted_by` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-12 17:48:26
