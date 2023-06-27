-- MariaDB dump 10.19  Distrib 10.6.12-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: practice
-- ------------------------------------------------------
-- Server version	10.6.12-MariaDB-0ubuntu0.22.04.1

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `meta` text DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `desktop_image` varchar(255) DEFAULT NULL,
  `mobile_image` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `slider_desktop_image` varchar(255) DEFAULT NULL,
  `mobile_slider_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (5,'SHORT STORY','SHORT STORY','SHORT STORY','SHORT STORY','crime-1_0dcaf4b12c6ab3c805ff4fa61aa5fcec.jpg','horror-5_0dcaf4b12c6ab3c805ff4fa61aa5fcec.jpg',NULL,'2023-04-20 18:53:22','2023-04-18 18:53:25',NULL,NULL),(6,'WEBSERIES','WEBSERIES','WEBSERIES','WEBSERIES','top-gallery-5_821ca26029c07bc0e96ff2e0ca8a52e5.jpg',NULL,NULL,'2023-04-22 03:25:36','2023-04-18 19:05:12',NULL,NULL),(7,'READING','READING','READING','READING',NULL,NULL,NULL,'2023-04-20 18:54:43','2023-04-18 19:14:21',NULL,NULL),(9,'AUDIO BOOKS','AUDIO BOOKS','AUDIO BOOKS','AUDIO BOOKS',NULL,NULL,NULL,'2023-04-20 18:54:56','2023-04-20 18:54:56',NULL,NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_media_durations`
--

DROP TABLE IF EXISTS `product_media_durations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_media_durations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `product_media_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `duration_time` varchar(191) DEFAULT NULL,
  `end_time` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_media_durations`
--

LOCK TABLES `product_media_durations` WRITE;
/*!40000 ALTER TABLE `product_media_durations` DISABLE KEYS */;
INSERT INTO `product_media_durations` VALUES (1,9,10,2,'00:07','03:08','2023-04-28 21:08:57','2023-04-28 21:31:59');
/*!40000 ALTER TABLE `product_media_durations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_medias`
--

DROP TABLE IF EXISTS `product_medias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_medias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `media_name` varchar(255) DEFAULT NULL,
  `media_path` text DEFAULT NULL,
  `media_type` varchar(191) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_medias`
--

LOCK TABLES `product_medias` WRITE;
/*!40000 ALTER TABLE `product_medias` DISABLE KEYS */;
INSERT INTO `product_medias` VALUES (8,2,'Episode 1','Rubicon Drill_06d18df56e5a38bb202feadab8158129.mp3',NULL,NULL,NULL,'2023-04-27 19:07:07','2023-04-27 19:07:07'),(9,2,'Episode','sample-9s_a8d11e4ed965c2b004edf01bcefe8133.mp3',NULL,NULL,NULL,'2023-04-27 19:19:54','2023-04-27 19:19:54'),(10,9,'test','Rubicon Drill_c89b6db421ac91ad2bdd2589458d0f50.mp3',NULL,NULL,NULL,'2023-04-27 19:22:55','2023-04-27 19:22:55'),(11,9,'Episode Love Story','Dilan Di Gall_e6a96cb1bf72f0aa0463ed89f48eae96.mp3',NULL,NULL,NULL,'2023-04-27 20:12:39','2023-04-27 20:12:39'),(12,9,'testing','Maan Meri Jaan(PagalWorld.com.se)_bc61b75b4a0cc0f04e576f578573d53d.mp3',NULL,NULL,NULL,'2023-04-28 06:56:51','2023-04-28 06:56:51'),(13,9,'episode4','Maan Meri Jaan(PagalWorld.com.se)_845da269325509f716899e3e5f17799a.mp3',NULL,NULL,NULL,'2023-04-28 06:59:04','2023-04-28 06:59:04');
/*!40000 ALTER TABLE `product_medias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  `meta` text DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(200) DEFAULT NULL,
  `narrator` varchar(200) DEFAULT NULL,
  `genre` varchar(200) DEFAULT NULL,
  `duration` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `desktop_image` varchar(255) DEFAULT NULL,
  `mobile_image` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `slider_desktop_image` varchar(255) DEFAULT NULL,
  `mobile_slider_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (2,5,15,'product1','product1','product 1','product 1','sdf',NULL,NULL,NULL,'dfds','drama-1_5598aab34fad174bf25783ea5c8687ce.jpg',NULL,NULL,'2023-04-26 06:53:54','2023-04-20 19:41:51',NULL,NULL),(3,5,15,'product2','product2','product2','product2',NULL,NULL,NULL,NULL,'sdf','drama-1_82f337c6b86cae84489c691f791764d1.jpg',NULL,NULL,'2023-04-23 10:13:18','2023-04-20 20:33:02',NULL,NULL),(4,5,15,'product3','product3','product3','product3',NULL,NULL,NULL,NULL,'product3','drama-2_b7e52e72ae6b7a805c37be6451793c1d.jpg',NULL,NULL,'2023-04-23 10:13:23','2023-04-20 20:33:45',NULL,NULL),(5,5,15,'product4','product4','product4','product4',NULL,NULL,NULL,NULL,'product4','drama-3_ac3e2c93392368e5afa383ff00078882.jpg',NULL,NULL,'2023-04-23 10:13:27','2023-04-20 20:34:29',NULL,NULL),(6,5,15,'product5','product5','product5','product5',NULL,NULL,NULL,NULL,'product5','drama-1_a489e4e6db8cc6ec19f6486448f8ed44.jpg',NULL,NULL,'2023-04-23 10:13:34','2023-04-20 20:35:04',NULL,NULL),(7,5,15,'product6','product6','product6','product6',NULL,NULL,NULL,NULL,'product6','drama-2_6faf1c3418c9267666d40b2b2300236f.jpg',NULL,NULL,'2023-04-23 10:13:39','2023-04-20 20:35:28',NULL,NULL),(8,5,15,'product7','product7','product7','product7',NULL,NULL,NULL,NULL,'product7','drama-3_a1680b8c6d1580eedd31b5d95c6e4646.jpg',NULL,NULL,'2023-04-23 10:13:44','2023-04-20 20:35:53',NULL,NULL),(9,5,6,'Love Story1','love-story1','Love Story','Love Story','Surinder Mohan','Garima','Indian Army','10 Minutes','<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno est&aacute;ndar de las industrias desde. simplemente el texto deLorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno est&aacute;ndar de las industrias desde. simplemente el texto deLorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno est&aacute;ndar de las industrias desde. simplemente el texto deLorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno est&aacute;ndar de las industrias desde. simplemente el texto de</p>','love-story-1_e524faf949f6eab1fecb9ec4f5704807.jpg','top-gallery-5_ce05623a6895b953dfe5288e2a100675.jpg',NULL,'2023-04-27 20:11:42','2023-04-21 10:44:07',NULL,NULL),(10,5,6,'Love Story2',NULL,'Love Story2','Love Story2',NULL,NULL,NULL,NULL,'Love Story2','love-story-3_53807b4d61d8df83cf51537d9088ec66.jpg',NULL,NULL,'2023-04-21 10:55:53','2023-04-21 10:55:53',NULL,NULL),(11,5,6,'Love Story3',NULL,'Love Story3','Love Story3',NULL,NULL,NULL,NULL,'Love Story3','love-story-4_46e95d42d38c8b45a0017682ff264486.jpg',NULL,NULL,'2023-04-21 10:56:33','2023-04-21 10:56:33',NULL,NULL),(12,5,6,'Love Story4',NULL,'Love Story4','Love Story4',NULL,NULL,NULL,NULL,'Love Story4','love-story-5_875bf3aec5ad6b8e0f7809350defa9e4.jpg',NULL,NULL,'2023-04-21 10:57:00','2023-04-21 10:57:00',NULL,NULL),(13,5,6,'Love Story5',NULL,'Love Story4','Love Story4',NULL,NULL,NULL,NULL,'Love Story4','love-story-4_adb8bf6326e50181431b779112422845.jpg',NULL,NULL,'2023-04-21 10:58:13','2023-04-21 10:57:42',NULL,NULL),(14,5,6,'Love Story6',NULL,'Love Story6','Love Story6',NULL,NULL,NULL,NULL,'Love Story6','love-story-1_eb7f17a1e3d07a89d2ef274bd7d6c516.jpg',NULL,NULL,'2023-04-21 10:58:40','2023-04-21 10:58:40',NULL,NULL),(15,5,6,'Love Story7',NULL,'Love Story7','Love Story7',NULL,NULL,NULL,NULL,'Love Story7','love-story-5_979115bf5a4ef6cfb405acc6355ad6d3.jpg',NULL,NULL,'2023-04-21 11:16:40','2023-04-21 11:16:40',NULL,NULL),(16,5,7,'Crime1',NULL,'Crime1','Crime1',NULL,NULL,NULL,NULL,'Crime1','crime-1_fb08b9041dab1aba1b14dc45e620331e.jpg',NULL,NULL,'2023-04-21 11:17:55','2023-04-21 11:17:55',NULL,NULL),(17,5,7,'Crime2',NULL,'Crime2','Crime2',NULL,NULL,NULL,NULL,'Crime2','crime-3 (1)_ef3ec9dd3626347921e4577830a2630c.jpg',NULL,NULL,'2023-04-21 11:18:19','2023-04-21 11:18:19',NULL,NULL),(18,5,7,'Crime3',NULL,'Crime3','Crime3',NULL,NULL,NULL,NULL,'Crime3','crime-4_2b4fab0e0596f7993bd6eea9b61fa361.jpg',NULL,NULL,'2023-04-21 11:18:46','2023-04-21 11:18:46',NULL,NULL),(19,5,7,'Crime4',NULL,'Crime4','Crime4',NULL,NULL,NULL,NULL,'Crime4','crime-5_a40f61ad5b277defc9c087747447104d.jpg',NULL,NULL,'2023-04-21 11:19:13','2023-04-21 11:19:13',NULL,NULL),(20,5,7,'Crime5',NULL,'Crime5','Crime5',NULL,NULL,NULL,NULL,'Crime5','crime-1_cc0a6417f0424ab7e5457b9868e17dc5.jpg',NULL,NULL,'2023-04-21 11:21:52','2023-04-21 11:19:46',NULL,NULL),(21,5,7,'Crime6',NULL,'Crime6','Crime6',NULL,NULL,NULL,NULL,'Crime6','crime-4_60d74af13b96c7bcc4aae829e9d4eb4a.jpg',NULL,NULL,'2023-04-21 11:21:19','2023-04-21 11:20:09',NULL,NULL),(22,5,7,'Crime7',NULL,'Crime7','Crime7',NULL,NULL,NULL,NULL,'Crime7','crime-3_859b5d50692006cc85a67128e0140f8d.jpg',NULL,NULL,'2023-04-21 11:22:22','2023-04-21 11:22:22',NULL,NULL),(23,5,11,'Horror1',NULL,'Horror1','Horror1',NULL,NULL,NULL,NULL,'Horror1','horror-3_e708b52f85425b68b50a82f49a0a58e3.jpg',NULL,NULL,'2023-04-21 11:23:18','2023-04-21 11:23:18',NULL,NULL),(24,5,11,'Horror2',NULL,'Horror2','Horror2',NULL,NULL,NULL,NULL,'Horror2','horror-3_863a3774bf1332c1396acd36cff3b1b2.jpg',NULL,NULL,'2023-04-21 11:23:37','2023-04-21 11:23:37',NULL,NULL),(25,5,11,'Horror3',NULL,'Horror3','Horror3',NULL,NULL,NULL,NULL,'Horror3','horror-3_c1caaa1d97aa72b436e00939767eac78.jpg',NULL,NULL,'2023-04-21 11:24:05','2023-04-21 11:24:05',NULL,NULL),(26,5,11,'Horror4',NULL,'Horror4','Horror4',NULL,NULL,NULL,NULL,'Horror4','horror-3_04b6eaf9fcebacbe646bbde4c77daed8.jpg',NULL,NULL,'2023-04-21 11:24:32','2023-04-21 11:24:32',NULL,NULL),(27,5,11,'Horror5',NULL,'Horror5','Horror5',NULL,NULL,NULL,NULL,'Horror5','horror-3_71f31b6b0b260d0e4b7595bd196b03e4.jpg',NULL,NULL,'2023-04-21 11:25:55','2023-04-21 11:25:55',NULL,NULL),(28,5,11,'Horror6',NULL,'Horror6','Horror6',NULL,NULL,NULL,NULL,'Horror6','horror-3_365ecaa59ed3c520f976baecddb0fc91.jpg',NULL,NULL,'2023-04-21 11:26:15','2023-04-21 11:26:15',NULL,NULL),(29,5,11,'Horror7',NULL,'Horror7','Horror7',NULL,NULL,NULL,NULL,'Horror7','horror-3_9731319e4285a1634dd98f8356d9f390.jpg',NULL,NULL,'2023-04-21 11:26:45','2023-04-21 11:26:45',NULL,NULL),(30,9,12,'Book Summary1',NULL,'Book Summary1','Book Summary1',NULL,NULL,NULL,NULL,'Book Summary1','book-summary-1_577a3021b7649822c096a74399eaba98.jpg',NULL,NULL,'2023-04-21 11:31:41','2023-04-21 11:31:41',NULL,NULL),(31,9,12,'Book Summary2',NULL,'Book Summary2','Book Summary2',NULL,NULL,NULL,NULL,'Book Summary2','book-summary-3_0b815630e381cdc9901c1611821167a9.jpg',NULL,NULL,'2023-04-21 11:32:11','2023-04-21 11:32:11',NULL,NULL),(32,9,12,'Book Summary3',NULL,'Book Summary3','Book Summary3',NULL,NULL,NULL,NULL,'Book Summary3','book-summary-4_5b7244eed2f426d461e7c96fbf0d439d.jpg',NULL,NULL,'2023-04-21 11:33:01','2023-04-21 11:33:01',NULL,NULL),(33,9,12,'Book Summary4',NULL,'Book Summary4','Book Summary4',NULL,NULL,NULL,NULL,'Book Summary4','book-summary-5_ed62d0afd68aa0e921dad21d6fc6be5b.jpg',NULL,NULL,'2023-04-21 11:33:29','2023-04-21 11:33:29',NULL,NULL),(34,9,12,'Book Summary5',NULL,'Book Summary5','Book Summary5',NULL,NULL,NULL,NULL,'Book Summary5','book-summary-1_99cf1da24dd449ae9656ea99db0bea51.jpg',NULL,NULL,'2023-04-21 11:33:56','2023-04-21 11:33:56',NULL,NULL),(35,9,12,'Book Summary6',NULL,'Book Summary6','Book Summary6',NULL,NULL,NULL,NULL,'Book Summary6','book-summary-3_32390833ff6ec95b2bff9258f5cbed25.jpg',NULL,NULL,'2023-04-21 11:34:20','2023-04-21 11:34:20',NULL,NULL),(36,9,12,'Book Summary7',NULL,'Book Summary7','Book Summary7',NULL,NULL,NULL,NULL,'Book Summary7','book-summary-4_44fac552605f1352b0f3551d7fb9e3c1.jpg',NULL,NULL,'2023-04-21 11:34:54','2023-04-21 11:34:54',NULL,NULL),(37,9,13,'Kids1',NULL,'Kids1','Kids1',NULL,NULL,NULL,NULL,'Kids1','kids-1_3eea133cb50425da29b48fd392a59c09.jpg',NULL,NULL,'2023-04-21 11:35:43','2023-04-21 11:35:43',NULL,NULL),(38,9,13,'Kids2',NULL,'Kids2','Kids2',NULL,NULL,NULL,NULL,'Kids2','kids-3_e194897a173080090550cff0163e0055.jpg',NULL,NULL,'2023-04-21 11:36:04','2023-04-21 11:36:04',NULL,NULL),(39,9,13,'Kids3',NULL,'Kids3','Kids3',NULL,NULL,NULL,NULL,'Kids3','kids-4_10b3c82b95ce95f183d15c641b2ae904.jpg',NULL,NULL,'2023-04-21 11:36:28','2023-04-21 11:36:28',NULL,NULL),(40,9,13,'Kids4',NULL,'Kids4','Kids4',NULL,NULL,NULL,NULL,'Kids4','kids-5_d9cc20ea83f0fd9be9ee5369936848be.jpg',NULL,NULL,'2023-04-21 11:38:53','2023-04-21 11:38:53',NULL,NULL),(41,9,13,'Kids5',NULL,'Kids5','Kids5',NULL,NULL,NULL,NULL,'Kids5','kids-1_1289c2dc7293efce883280253a6dc58e.jpg',NULL,NULL,'2023-04-21 11:39:16','2023-04-21 11:39:16',NULL,NULL),(42,9,13,'Kids6',NULL,'Kids6','Kids6',NULL,NULL,NULL,NULL,'Kids6','kids-4_f63873e48535feecae55387155ebf0e6.jpg',NULL,NULL,'2023-04-21 11:39:57','2023-04-21 11:39:57',NULL,NULL),(43,9,13,'Kids7',NULL,'Kids7','Kids7',NULL,NULL,NULL,NULL,'Kids7','kids-5_6aea278362981f4a3e371b8100dbf3ca.jpg',NULL,NULL,'2023-04-21 11:40:43','2023-04-21 11:40:43',NULL,NULL),(44,9,13,'Historical1',NULL,'Historical1','Historical1',NULL,NULL,NULL,NULL,'Historical1','historical-1_9a8c338f31daec2ced47a8de6d5bcdc6.jpg',NULL,NULL,'2023-04-21 11:41:13','2023-04-21 11:41:13',NULL,NULL),(45,7,14,'Historical2',NULL,'Historical2','Historical2',NULL,NULL,NULL,NULL,'Historical2','historical-3_7babebe5b4a3dbe26b41c70022b0012c.jpg',NULL,NULL,'2023-04-21 11:42:10','2023-04-21 11:42:10',NULL,NULL),(46,7,14,'Historical3',NULL,'Historical3','Historical3',NULL,NULL,NULL,NULL,'Historical3','historical-4_3494347855b7e8280ae957c69c915d8e.jpg',NULL,NULL,'2023-04-21 11:42:37','2023-04-21 11:42:37',NULL,NULL),(47,7,14,'Historical4',NULL,'Historical4','Historical4',NULL,NULL,NULL,NULL,'Historical4','historical-5_6e89d8098d07a0774ebe0b8b1f61adf1.jpg',NULL,NULL,'2023-04-21 11:42:58','2023-04-21 11:42:58',NULL,NULL),(48,7,14,'Historical5',NULL,'Historical5','Historical5',NULL,NULL,NULL,NULL,'Historical5','historical-1_02a8f7d789ed8d994b65cfd94fc2721d.jpg',NULL,NULL,'2023-04-21 11:43:30','2023-04-21 11:43:30',NULL,NULL),(50,5,11,'asdasd','asdasd','assdasdasd','asdasd','asdasdas','dasdas','dasdasd','asdasdasd','asdasd','12_0250048d3cd8d0b2027e778a0b3d0751_7091f6b1993ca3fa10f008c98a34eb9e.jpg','images_7091f6b1993ca3fa10f008c98a34eb9e.jpeg',NULL,'2023-04-26 20:38:03','2023-04-26 20:38:03',NULL,NULL),(51,7,14,'Historynew','historynew','Historynew','Historynew','Historynew','Historynew','Historynew','30','<p>Historynew</p>','historical-3_df2b4edfd4aa17ececde6d9ea8e91dee.jpg',NULL,NULL,'2023-04-27 06:55:32','2023-04-27 06:52:37',NULL,NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin',NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sliders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(1) NOT NULL COMMENT '1->home,2->category',
  `category_id` int(11) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `path` text DEFAULT NULL,
  `mobile_image` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sliders`
--

LOCK TABLES `sliders` WRITE;
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
INSERT INTO `sliders` VALUES (10,2,5,'slider','slider_1_ce1a5c81972d57d1d62aa4fb9a3c5a3e.webp',NULL,NULL,'2023-04-20 19:34:05',NULL,'2023-04-20 19:34:05'),(11,2,5,'slider','slider_2_7d32b2ffaef3bff6319e3bd6471a9806.webp',NULL,NULL,'2023-04-20 19:34:46',NULL,'2023-04-20 19:34:46'),(12,2,5,'slider','slider_3_9b6e090c1300b269fb862de5e54138ed.webp',NULL,NULL,'2023-04-20 19:37:13',NULL,'2023-04-20 19:37:13'),(13,1,NULL,'Home slider','slider_1_eace48750f998475addc3b99a39c706f.webp',NULL,NULL,'2023-04-21 12:09:31',NULL,'2023-04-21 12:09:31'),(14,1,NULL,'Home Slider 2','slider_2_266f28954eac29641bd6b3415afd7534.webp',NULL,NULL,'2023-04-21 12:15:40',NULL,'2023-04-21 12:15:40'),(15,1,NULL,'Home Slider 3','slider_3_96a8e9567b1ae3a9ff78c4d822f999f4.webp',NULL,NULL,'2023-04-21 12:15:57',NULL,'2023-04-21 12:15:57');
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subcategories`
--

DROP TABLE IF EXISTS `subcategories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL COMMENT '1->on,2->off	',
  `meta` text DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `show_home` int(11) DEFAULT 0,
  `desktop_image` varchar(255) DEFAULT NULL,
  `mobile_image` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `slider_desktop_image` varchar(255) DEFAULT NULL,
  `mobile_slider_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcategories`
--

LOCK TABLES `subcategories` WRITE;
/*!40000 ALTER TABLE `subcategories` DISABLE KEYS */;
INSERT INTO `subcategories` VALUES (6,5,'Love Story',0,'Love Story','Love Story','<p>Love Story</p>',1,NULL,'love-story-3_879af9f814ec207e46f14e6f61e6108b.jpg',NULL,'2023-04-21 12:59:31','2023-04-18 13:35:12',NULL,NULL),(7,5,'Crime/Thriller',0,'Crime/Thriller','Crime/Thriller','<p>Crime/Thriller</p>',0,NULL,'top-gallery-3_9f528de78008d6ea7f22894ec72af408.jpg',NULL,'2023-04-21 13:01:40','2023-04-20 10:52:32',NULL,NULL),(11,5,'Horror',0,'<title>Horror</title>','Horror','<p>test</p>',0,NULL,'top-gallery-4_87b01962d21ff174ac056714b56d2da1.jpg',NULL,'2023-04-21 13:01:03','2023-04-20 20:10:26',NULL,NULL),(12,9,'Book Summary',0,'<title>Book Summary</title>','Book Summary','<p>dfdsf</p>',0,NULL,NULL,NULL,'2023-04-21 11:28:24','2023-04-20 20:11:17',NULL,NULL),(13,9,'Kids',0,'Kids','Kids','fdds',0,NULL,NULL,NULL,'2023-04-20 20:11:49','2023-04-20 20:11:49',NULL,NULL),(14,7,'Historical',0,'sdf','Historical','sdf',0,NULL,NULL,NULL,'2023-04-20 20:12:15','2023-04-20 20:12:15',NULL,NULL),(15,5,'Drama',0,'Drama','Drama','<p>sdfdsf</p>',0,NULL,'top-gallery-1_1af613b05ad91bb748dd78fb143f766e.jpg',NULL,'2023-04-21 12:51:52','2023-04-20 20:19:53',NULL,NULL);
/*!40000 ALTER TABLE `subcategories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_profile`
--

DROP TABLE IF EXISTS `user_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_profile`
--

LOCK TABLES `user_profile` WRITE;
/*!40000 ALTER TABLE `user_profile` DISABLE KEYS */;
INSERT INTO `user_profile` VALUES (1,1,'Super','admin',NULL,'1234567890',NULL,NULL),(2,2,'normal','user',NULL,'1234567890',NULL,NULL);
/*!40000 ALTER TABLE `user_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'','admin@gmail.com',NULL,'$2y$10$0Fpo7lPFFB9dreuNnfSGaed7DoAzg/H/vBMqqHxxpdK30svAPUkke',NULL,NULL,NULL),(2,2,'','user@gmail.com',NULL,'$2y$10$0Fpo7lPFFB9dreuNnfSGaed7DoAzg/H/vBMqqHxxpdK30svAPUkke',NULL,NULL,NULL);
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

-- Dump completed on 2023-04-29  8:38:27
