-- MySQL dump 10.13  Distrib 8.0.40, for Linux (x86_64)
--
-- Host: localhost    Database: test2
-- ------------------------------------------------------
-- Server version	8.0.40-0ubuntu0.24.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','admin');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agencies`
--

DROP TABLE IF EXISTS `agencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agencies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agencies`
--

LOCK TABLES `agencies` WRITE;
/*!40000 ALTER TABLE `agencies` DISABLE KEYS */;
INSERT INTO `agencies` VALUES (1,'Tana Tours','Basée à Analakely, Antananarivo, spécialisée dans les circuits et hôtels.','2024-12-05 08:10:55'),(2,'Nosy Be Voyages','Agence de voyages située à Nosy Be, proposant des séjours balnéaires.','2024-12-05 08:10:55'),(3,'Baobab Expeditions','Expéditions à travers les régions emblématiques de Madagascar, basée à Toliara.','2024-12-05 08:10:55'),(4,'Lemur Adventures','Découverte des lémuriens et randonnées, basée à Toamasina.','2024-12-05 08:10:55'),(5,'Vanilla Island Travel','Agence spécialisée dans les circuits sur la route de la vanille, située à Sambava.','2024-12-05 08:10:55'),(6,'Tsingy Trek','Randonnées et expéditions dans les Tsingy de Bemaraha, basée à Morondava.','2024-12-05 08:10:55'),(7,'Antananarivo Express','Circuits culturels dans la capitale et ses environs, basée à Ivato.','2024-12-05 08:10:55'),(8,'Diego Suarez Découvertes','Exploration de Diego Suarez et ses environs.','2024-12-05 08:10:55'),(9,'Isalo Aventures','Randonnées et aventures dans le parc national de l’Isalo, basée à Ranohira.','2024-12-05 08:10:55'),(10,'Mahajanga Plage Tours','Séjours balnéaires à Mahajanga.','2024-12-05 08:10:55'),(11,'Antsirabe Thermal Voyages','Cures thermales et séjours bien-être à Antsirabe.','2024-12-05 08:10:55'),(12,'Fianarantsoa Heritage Tours','Circuits culturels autour de Fianarantsoa.','2024-12-05 08:10:55'),(13,'Sainte-Marie Island Escape','Excursions et séjours à Sainte-Marie.','2024-12-05 08:10:55'),(14,'Ankarana Safaris','Safari dans le parc national d’Ankarana.','2024-12-05 08:10:55'),(15,'Ranomafana Rainforest Tours','Exploration de la forêt tropicale de Ranomafana.','2024-12-05 08:10:55'),(16,'Morondava Baobab Alley','Circuits autour de l’allée des Baobabs, à Morondava.','2024-12-05 08:10:55'),(17,'Antsiranana Bay Cruises','Croisières et circuits à Diego Suarez.','2024-12-05 08:10:55'),(18,'Andasibe-Mantadia Explorations','Découvertes dans le parc national d’Andasibe.','2024-12-05 08:10:55'),(19,'Ifaty Beach Getaways','Séjours balnéaires et snorkeling à Ifaty.','2024-12-05 08:10:55'),(20,'Ambositra Artisanal Tours','Découverte de l’artisanat Zafimaniry à Ambositra.','2024-12-05 08:10:55'),(21,'avy tour',NULL,'2024-12-05 20:13:10');
/*!40000 ALTER TABLE `agencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `service_id` int DEFAULT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_phone` varchar(20) NOT NULL,
  `client_email` varchar(255) NOT NULL,
  `reservation_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `service_id` (`service_id`),
  CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
INSERT INTO `reservations` VALUES (1,6,'bolo','54654654','tsoa@tsoa.com','2025-02-12','2024-12-05 10:22:22'),(2,2,'bolo','54654654','bolorack@gmail.com','2025-02-02','2024-12-05 10:24:29'),(3,2,'nix','54654654','livanirina586@gmail.com','2025-02-02','2024-12-05 10:25:12'),(4,2,'bolo','54654654','tsoa@tsoa.com','2025-02-02','2024-12-05 10:29:15'),(5,3,'livanirina','54654654','tsoa@tsoa.com','2025-02-12','2024-12-05 10:34:22'),(6,1,'bolo','54654654','tsoa@tsoa.com','2025-02-01','2024-12-05 10:35:38'),(7,1,'bolo','54654654','livanirina586@gmail.com','2025-02-12','2024-12-05 10:38:30'),(8,1,'bolo','54654654','tsoa@tsoa.com','2025-05-02','2024-12-05 10:40:31'),(9,1,'bolo','54654654','bolorack@gmail.com','2023-02-02','2024-12-05 10:43:55'),(10,2,'bolo','54654654','tsoa@tsoa.com','2025-05-02','2024-12-05 10:58:26'),(11,2,'bolo','54654654','tsoa@tsoa.com','2025-05-02','2024-12-05 11:00:10'),(12,1,'bolo','54654654','bolorack@gmail.com','2025-02-12','2024-12-05 11:05:24'),(13,4,'bolo','54654654','tsoa@tsoa.com','2025-02-12','2024-12-05 11:15:29'),(14,1,'bolo','54654654','tsoa@tsoa.com','2025-05-02','2024-12-05 17:51:03'),(15,1,'bolo','54654654','tsoa@tsoa.com','2025-02-12','2024-12-05 18:12:38'),(16,1,'bolo','54654654','tsoa@tsoa.com','2025-05-12','2024-12-05 18:18:06'),(17,1,'bolo','54654654','tsoa@tsoa.com','2025-05-12','2024-12-05 18:22:41'),(18,5,'tsoa','54654654','dsfqd@f.p','2025-02-02','2024-12-05 18:36:03'),(19,5,'tsoa','54654654','dsfqd@f.p','2025-02-02','2024-12-05 18:36:55'),(20,5,'tsoa','54654654','dsfqd@f.p','2025-02-02','2024-12-05 18:39:16');
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `agency_id` int DEFAULT NULL,
  `type` enum('circuit','hotel') NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `stars` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `agency_id` (`agency_id`),
  CONSTRAINT `services_ibfk_1` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,1,'circuit','Découverte d\'Antananarivo','Visite guidée de la capitale malgache',75000.00,NULL,'2024-12-05 08:10:55'),(2,2,'circuit','Plages paradisiaques de Nosy Be','Séjour balnéaire sur l\'île aux parfums',250000.00,NULL,'2024-12-05 08:10:55'),(3,NULL,'circuit','Aventure dans l\'Allée des Baobabs','sdfqsdfqsdf',0.00,5,'2024-12-05 08:10:55'),(4,4,'circuit','À la rencontre des lémuriens','Safari photo dans le parc national d\'Andasibe-Mantadia',180000.00,NULL,'2024-12-05 08:10:55'),(5,5,'circuit','Route de la Vanille','Découverte des plantations de vanille de Sambava',95000.00,NULL,'2024-12-05 08:10:55'),(6,1,'hotel','Le Louvre Antananarivo','Hôtel 4 étoiles situé à Analakely',180000.00,4,'2024-12-05 08:10:55'),(7,2,'hotel','Ravintsara Wellness Hotel','Hôtel 5 étoiles à Nosy Be',350000.00,5,'2024-12-05 08:10:55'),(8,3,'hotel','Renala au Sable d\'Or','Hôtel 3 étoiles à Toliara',120000.00,3,'2024-12-05 08:10:55'),(9,4,'hotel','Hotel La Veranda','Hôtel 4 étoiles à Toamasina',200000.00,4,'2024-12-05 08:10:55'),(10,5,'hotel','Vanilla Hotel & Spa','Hôtel 3 étoiles à Sambava',150000.00,3,'2024-12-05 08:10:55'),(11,3,'circuit','hotel',NULL,0.00,NULL,'2024-12-05 19:51:47'),(12,2,'circuit','bolo',NULL,0.00,NULL,'2024-12-05 19:52:17'),(13,1,'hotel','test','test',99999999.99,4,'2024-12-05 20:15:13');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-05 23:51:50
