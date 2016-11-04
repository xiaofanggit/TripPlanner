CREATE DATABASE  IF NOT EXISTS `trip_planner` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `trip_planner`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: trip_planner
-- ------------------------------------------------------
-- Server version	5.7.16-log

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
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `need_purchased` tinyint(1) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `items_user_id_foreign` (`user_id`),
  CONSTRAINT `items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (1,2,'Passport/visa(s)','Important. Don\'t forget.',0,0.00,'2016-11-04 06:45:10','2016-11-04 06:45:10'),(2,2,'Personal ID','Could be  a student ID card or driver license.',0,0.00,'2016-11-04 06:46:15','2016-11-04 06:46:15'),(3,2,'Frequent flyer card(s) and other loyalty program cards such as a hotel or hostel','',0,0.00,'2016-11-04 06:46:47','2016-11-04 06:46:47'),(4,2,'Cash and credit card(s)','',0,0.00,'2016-11-04 06:47:11','2016-11-04 06:47:11'),(5,2,'Health insurance cards/document(s)','',0,0.00,'2016-11-04 06:47:29','2016-11-04 06:47:29'),(6,2,'Travel insurance info','Not buy yet',1,200.00,'2016-11-04 06:48:05','2016-11-04 06:48:19'),(7,2,'Hotel and/or tour contact information','Not ready yet',0,0.00,'2016-11-04 06:54:01','2016-11-04 06:54:01'),(8,2,'Transportation tickets (plane, train, bus, car, etc.)','Not buy yet',1,1000.00,'2016-11-04 06:55:33','2016-11-04 06:55:33'),(9,2,'Emergency contacts and important addresses','',0,0.00,'2016-11-04 06:56:35','2016-11-04 06:56:35'),(13,2,'Mobile device and charger','Need to buy a charger',0,20.00,'2016-11-04 07:10:24','2016-11-04 12:45:21'),(14,2,'iPad or e-reader and charger','also need to buy a charger',0,20.00,'2016-11-04 07:10:56','2016-11-04 07:11:55'),(15,2,'Headphones ','(consider noise-reducing headphones if you\'re sensitive to sound) ',0,30.00,'2016-11-04 07:12:53','2016-11-04 07:13:10'),(17,3,'lanlan\'s items','lanlan\'s items',1,10.00,'2016-11-04 11:00:14','2016-11-04 11:01:19'),(18,3,'111111','11111aaaaa',0,123.00,'2016-11-04 11:00:28','2016-11-04 11:56:01'),(20,3,'222222222','222222222bbbbb',1,3132.00,'2016-11-04 11:01:01','2016-11-04 11:56:09'),(21,3,'3333333333','3333333333ddddddddddd',1,0.00,'2016-11-04 11:39:23','2016-11-04 11:56:20'),(22,3,'44444444','4444444444eeeeeeeeeeeeee',1,0.00,'2016-11-04 11:47:37','2016-11-04 11:56:28'),(23,3,'555555','55555555ffffffff',0,0.00,'2016-11-04 11:47:43','2016-11-04 11:58:36'),(24,2,'Packing Organizers','packing folders, packing cubes, packing sacs, etc',0,25.00,'2016-11-04 12:28:33','2016-11-04 12:43:23');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `luggages`
--

DROP TABLE IF EXISTS `luggages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `luggages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `luggage_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `luggage_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `luggages_user_id_foreign` (`user_id`),
  CONSTRAINT `luggages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `luggages`
--

LOCK TABLES `luggages` WRITE;
/*!40000 ALTER TABLE `luggages` DISABLE KEYS */;
INSERT INTO `luggages` VALUES (1,2,'Carry-on','Important things should be here','2016-11-04 07:14:07','2016-11-04 07:14:07'),(2,2,'Blue Main Bag','Cloth, ​​Travel pillow, blanket etc will be here','2016-11-04 07:15:08','2016-11-04 07:15:08'),(3,2,'Black main bag','','2016-11-04 07:17:50','2016-11-04 07:17:50'),(6,3,'ddddddddddd','ddddddddddddddd','2016-11-04 11:01:47','2016-11-04 11:01:47'),(7,3,'Cccccccccccccccc','cccccccccccccccccccccc','2016-11-04 11:02:17','2016-11-04 11:02:17');
/*!40000 ALTER TABLE `luggages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `luggages_items`
--

DROP TABLE IF EXISTS `luggages_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `luggages_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item_id` int(10) unsigned NOT NULL,
  `luggage_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `luggages_items_item_id_index` (`item_id`),
  KEY `luggages_items_luggage_id_index` (`luggage_id`),
  CONSTRAINT `luggages_items_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  CONSTRAINT `luggages_items_luggage_id_foreign` FOREIGN KEY (`luggage_id`) REFERENCES `luggages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `luggages_items`
--

LOCK TABLES `luggages_items` WRITE;
/*!40000 ALTER TABLE `luggages_items` DISABLE KEYS */;
INSERT INTO `luggages_items` VALUES (3,23,6,NULL,NULL),(5,22,6,NULL,NULL),(6,21,6,NULL,NULL),(7,1,1,NULL,NULL),(8,24,1,NULL,NULL),(9,15,1,NULL,NULL),(10,2,1,NULL,NULL),(11,4,1,NULL,NULL);
/*!40000 ALTER TABLE `luggages_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_11_02_000000_create_users_table',1),(2,'2014_11_02_100000_create_password_resets_table',1),(3,'2016_11_02_192512_create_items_table',1),(4,'2016_11_02_192558_create_luggages_table',1),(5,'2016_11_02_194546_create_Luggages_items_table',1),(6,'2016_11_02_215117_create_purchased_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchased`
--

DROP TABLE IF EXISTS `purchased`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchased` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `item_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `purchased_user_id_item_id_index` (`user_id`,`item_id`),
  KEY `purchased_item_id_foreign` (`item_id`),
  CONSTRAINT `purchased_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  CONSTRAINT `purchased_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchased`
--

LOCK TABLES `purchased` WRITE;
/*!40000 ALTER TABLE `purchased` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchased` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'xiaofang','xiaofangwxf@gmail.com','$2y$10$A3XYytQRSlbhu.IDUUS1mu3JkmTXIIk8VoPuvO64MdXAHj9H6UHeC','yZTnK7UwAcThwFIieZDdDY8yiTlsMX1Hc8j5rbf6rcB5YbO7oDpJTJroYzQ4','2016-11-04 06:29:23','2016-11-04 12:14:03'),(2,'xiaofang','maomao@gmail.com','$2y$10$5ZFUrJVyv9FzaUuwjDeN0eckF0GyQC/C2cJtMTuvsdmNARra6j3vW','gYgRerxPopvoJVRCo2JqlqBpx2l9kNhLKcDLnN2NUlZRVq3KbDFGXFIj6XDr','2016-11-04 06:31:21','2016-11-04 12:26:10'),(3,'lanlan','lanlan@gmal.com','$2y$10$n/04GlJ7tXQgvWY08Y59/OMTN5rKCbOc7xyIoU3ZuRwIhpAmzvDR6','tgNpER7Y1cyE6nGYs6qdVaePJuOMXqxs83Yd2LJYJjwzCNFh2P0tt7Fq3Yuq','2016-11-04 10:53:56','2016-11-04 11:58:46');
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

-- Dump completed on 2016-11-04  6:39:52
