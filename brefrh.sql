-- MySQL dump 10.13  Distrib 5.5.43, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: brefrh
-- ------------------------------------------------------
-- Server version	5.5.43-0ubuntu0.14.04.1

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
-- Table structure for table `activities`
--

DROP TABLE IF EXISTS `activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ca_2013` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `net_2013` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `effectif_2013` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rd_2013` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `effectif_rd_2013` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ca_2014` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `net_2014` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `effectif_2014` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rd_2014` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `effectif_rd_2014` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ca_2015` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `net_2015` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `effectif_2015` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rd_2015` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `effectif_rd_2015` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enterprise_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `activities_enterprise_id_foreign` (`enterprise_id`),
  CONSTRAINT `activities_enterprise_id_foreign` FOREIGN KEY (`enterprise_id`) REFERENCES `enterprises` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activities`
--

LOCK TABLES `activities` WRITE;
/*!40000 ALTER TABLE `activities` DISABLE KEYS */;
INSERT INTO `activities` VALUES (1,'150','150','150','150','150','150','150','150','150','150','150','150','150','150','150',NULL,'2015-06-17 07:42:54','2015-06-17 07:42:54'),(2,'150','150','150','150','150','150','150','150','150','150','150','150','150','150','150',NULL,'2015-06-17 07:44:19','2015-06-17 07:44:19'),(3,'150','150','150','150','150','150','150','150','150','150','150','150','150','150','150',15,'2015-06-17 07:45:12','2015-06-17 07:45:12');
/*!40000 ALTER TABLE `activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'ENVIRONNEMENT ET ENERGIE','Consciente de l’urgence de diminuer l’impact de son activité sur l’environnement (pollution de l’air, du sol, de l’eau), l’entreprise récompensée aura mis en œuvre une politique environnementale sur le long terme, conçu une technique ou un produit permettant de diminuer la pollution ou d’abaisser la consommation énergétique, contribué au développement des énergies renouvelables, etc.','2015-06-10 14:11:22','2015-06-10 14:11:22'),(2,'EQUIPEMENTS ET PRODUITS DU SPORT, DES LOISIRS ET DE LA MONTAGNE','Sera récompensée une entreprise qui aura créé ou fabriqué un article de sport/loisirs ou un équipement touristique ou sportif innovant, en élevant particulièrement son niveau de confort, de sécurité, de praticité et de durabilité. Tous les sports, d’été ou d’hiver, d’intérieur ou d’extérieur, sont concernés. L’éco-conception sera un élément pris en compte dans le choix du jury. En cas d’égalité, priorité sera donnée à une entreprise produisant en Rhône-Alpes et en France (par rapport à une production délocalisée).','2015-06-10 14:11:22','2015-06-10 14:11:22'),(3,'INDUSTRIES','Il s’agit de récompenser une entreprise qui aura conçu et réalisé un produit industriel apportant des améliorations sensibles en matière de qualité, de productivité et/ou de prix, aux produits ou équipements existants sur le marché, voire constituant un véritable saut technologique. Priorité sera donnée à une entreprise produisant en Rhône-Alpes et en France (par rapport à une production délocalisée). Tous les secteurs industriels (hors \"sport, loisirs et montagne\", déjà représentés dans des catégories particulières) sont concernés.','2015-06-10 14:11:22','2015-06-10 14:11:22'),(4,'JEUNE POUSSE','Anglicisée par le terme \"start up\", la \"jeune pousse\" est une entreprise de création récente dont le potentiel de croissance est particulièrement élevé, par la nature de son activité, généralement hautement technologique (santé, biotech, nanotech, logiciel et numérique, etc.) mais pas seulement. Contrairement aux autres catégories, les perspectives constituées par les produits et technologies développés pourra primer sur la santé économique (rentabilité…) de l’entreprise.','2015-06-10 14:11:22','2015-06-10 14:11:22'),(5,'OBJETS CONNECTÉS','Qu’ils touchent au monde du sport (vêtements, chaussures), de l’image (vidéo), de l’habitat (domotique), de la sécurité (surveillance, géolocalisation) et plus généralement de l’acquisition et du traitement de données à distance, les objets connectés (dotés d’une puce électronique) ont fait leur apparition dans notre quotidien. Sera récompensé dans cette catégorie, à travers l’entreprise qui l’aura conçu et/ou fabriqué, un objet qui bouscule les usages, apportant de nouvelles fonctionnalités dans la vie quotidienne et/ou professionnelle, grâce au numérique. ','2015-06-10 14:11:22','2015-06-10 14:11:22'),(6,'PRODUITS GRAND PUBLIC','L’entreprise lauréate sera récompensée grâce à l’intérêt, l’utilité ou le design particulièrement innovants qu’elle aura apportés à un article de grande consommation. Eco-conception et impact écologique (bilan carbone…) seront particulièrement appréciés. A noter que les produits concernant « le sport, les loisirs et la montagne » sont déjà représentés dans une catégorie spécifique.','2015-06-10 14:11:22','2015-06-10 14:11:22'),(7,'SANTÉ / BIOTECHNOLOGIES','L’entreprise récompensée aura conçu un médicament, un vaccin ou tout autre produit, équipement ou service apportant une amélioration sensible du confort et de l’allongement de la vie, de la protection de la santé humaine ou de la prise en charge des malades.','2015-06-10 14:11:22','2015-06-10 14:11:22'),(8,'SERVICES','Il s’agit de récompenser une entreprise proposant un service innovant qui n’existait pas encore sur le marché et/ou qui apporte une grande amélioration en matière de qualité, d’efficacité et d’usage. Sont concernés les services à la personne comme les services aux entreprises.','2015-06-10 14:11:22','2015-06-10 14:11:22'),(9,'TRANSPORTS ET VÉHICULES DU FUTUR','Sera récompensée une entreprise qui aura contribué au développement d’un véhicule existant ou conçu un véhicule nouveau (terrestre, aérien, maritime ou fluvial) qui améliore de façon significative les économies d’énergie, le bilan carbone, la sécurité et les usages des produits actuels. Les candidates pourront être des sociétés de conception, des fabricants ou des sociétés de service.','2015-06-10 14:11:22','2015-06-10 14:11:22'),(10,'URBANISME, CONSTRUCTION DURABLE','Le bâtiment (habitat, tertiaire, industriel) est au cœur de notre société : il façonne les centres urbains ; il a une grande influence sur les relations sociales, les déplacements, l’utilisation de l’espace ; il est un grand consommateur d’énergie… Le Trophée « Urbanisme, construction durable » sera remis à une entreprise qui aura apporté des améliorations conséquentes  dans l’un ou plusieurs de ces domaines. Cette catégorie s’adresse à l’ensemble des acteurs de la filière : urbanisme, architecture, matériaux, construction et techniques du bâtiment, gestion de l’énergie, domotique, etc. ','2015-06-10 14:11:22','2015-06-10 14:11:22');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enterprises`
--

DROP TABLE IF EXISTS `enterprises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enterprises` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `juridical_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creation_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `member_of_group` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_address` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telecopie` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `leaders_informations` text COLLATE utf8_unicode_ci NOT NULL,
  `candidate_informations` text COLLATE utf8_unicode_ci NOT NULL,
  `candidate_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `candidate_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `registration_state` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  `activity_id` int(11) DEFAULT NULL,
  `internal_collaborators` int(11) DEFAULT NULL,
  `external_collaborators_type` text COLLATE utf8_unicode_ci,
  `project_certificates` text COLLATE utf8_unicode_ci,
  `survey_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `enterprises_survey_id_foreign` (`survey_id`),
  KEY `enterprises_user_id_foreign` (`user_id`),
  CONSTRAINT `enterprises_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `enterprises_survey_id_foreign` FOREIGN KEY (`survey_id`) REFERENCES `surveys` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enterprises`
--

LOCK TABLES `enterprises` WRITE;
/*!40000 ALTER TABLE `enterprises` DISABLE KEYS */;
INSERT INTO `enterprises` VALUES (7,'Tst12','12','2012-12-12',NULL,'12','1212121212',NULL,NULL,'12','12','1212121212','12@12.fr','2015-06-15 11:39:55','2015-06-15 11:39:55','step2',NULL,NULL,NULL,NULL,NULL,NULL),(8,'rrrr','errr','2013-01-01',NULL,'dd','0552563669',NULL,NULL,'lol','kik','2525252525','test@test.te','2015-06-15 14:13:39','2015-06-15 14:13:39','step2',NULL,NULL,NULL,NULL,NULL,NULL),(9,'step','step','2011-01-01',NULL,'11','1111111111',NULL,NULL,'11','11','1111111111','11@21.fr','2015-06-16 08:17:40','2015-06-17 05:42:02','step3',NULL,NULL,NULL,NULL,7,NULL),(10,'tty','tty','2015-01-01',NULL,'tty','0485585959',NULL,NULL,'58','58','5656565656','56@52.fr','2015-06-16 10:21:21','2015-06-16 13:25:14','step3',NULL,NULL,NULL,NULL,6,NULL),(11,'tty','tty','0005-01-02','tt','tt','0415585858',NULL,NULL,'ft','FG','4235252525','tt@tt.fr','2015-06-16 14:30:25','2015-06-16 14:30:25','step2',NULL,NULL,NULL,NULL,NULL,NULL),(13,'11','11','2015-01-01',NULL,'tt','0475858585',NULL,NULL,'ty','ty','0475585858','ty@ty.fr','2015-06-17 06:11:57','2015-06-17 06:11:57','step2',NULL,NULL,NULL,NULL,NULL,NULL),(15,'nouveau','nouveau','2015-01-01','nouveau','nouveau','0415585858',NULL,NULL,'nouveau','nouveau','0475858585','test@test.te','2015-06-17 06:43:31','2015-06-17 07:45:12','step5',3,0,'uuiiii','uiiii',10,22),(16,'new','new','2015-01-01',NULL,'new','0767676767',NULL,NULL,'tt','tt','0658211073','test@test.te','2015-06-17 07:02:21','2015-06-17 07:03:03','step3',NULL,NULL,NULL,NULL,NULL,23);
/*!40000 ALTER TABLE `enterprises` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `enterprise_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `files_enterprise_id_foreign` (`enterprise_id`),
  CONSTRAINT `files_enterprise_id_foreign` FOREIGN KEY (`enterprise_id`) REFERENCES `enterprises` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` VALUES (10,'New Spreadsheet.ots','public/uploads/22','2015-06-17 06:43:53','2015-06-17 06:43:53',15);
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2015_06_10_075909_create_users_table',1),('2015_06_10_083528_create_enterprises_table',1),('2015_06_10_085214_create_categories_table',1),('2015_06_10_090131_create_users_categories_table',2),('2015_06_10_094102_add_role_to_users',3),('2015_06_10_095240_create_roles_table',4),('2015_06_10_104419_add_timestamps_to_roles',5),('2015_06_10_104646_add_default_role_to_users',6),('2015_06_10_134227_create_enterprises_table',7),('2015_06_10_152753_add_done_field_to_enterprises',8),('2015_06_11_082951_add_enterprise_to_users',9),('2015_06_11_084107_add_effectif_to_enterprise',10),('2015_06_11_094814_add_fields_to_enterprises',11),('2015_06_11_131758_remove_legalstatus_from_enterprises',12),('2015_06_12_082756_remove_username_from_users',13),('2015_06_12_180039_add_default_value_to_enterprise_id_users',14),('2015_06_15_083836_create_files_table',14),('2015_06_15_152513_drop_fields_from_enterprises',15),('2015_06_15_153309_create_surveys_table',16),('2015_06_16_080748_remove_enterprise_id_for_unsign',17),('2015_06_16_081113_remove_enterprise_from_files',18),('2015_06_16_081219_add_foreign_key_to_files',19),('2015_06_16_081418_remove_enterprise_from_files',20),('2015_06_16_081931_remove_enterprise_id',21),('2015_06_16_081612_add_foreign_key',22),('2015_06_16_082033_remove_enterprise_id_from_users',23),('2015_06_16_082224_add_enterprise_id_to_users',24),('2015_06_16_082538_remove_enterprise_id_from_surveys',25),('2015_06_16_082810_re-add_enterprise_id_to_surveys',26),('2015_06_16_083631_create_activities_table',27),('2015_06_16_104725_add_survey_to_enterprises',28),('2015_06_16_104919_remove_enterpriseid_from_surveys',29),('2015_06_17_081717_remove_userid_from_enterprises',30),('2015_06_16_114027_add_userid_to_enterprises',31);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'candidat','2015-06-10 08:45:04','2015-06-10 08:45:04'),(2,'jury','2015-06-10 08:45:04','2015-06-10 08:45:04'),(3,'admin','2015-06-10 08:45:04','2015-06-10 08:45:04');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `surveys`
--

DROP TABLE IF EXISTS `surveys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `surveys` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `enterprise_activity` text COLLATE utf8_unicode_ci NOT NULL,
  `project_origin` text COLLATE utf8_unicode_ci NOT NULL,
  `innovative_arguments` text COLLATE utf8_unicode_ci NOT NULL,
  `wanted_impact` text COLLATE utf8_unicode_ci NOT NULL,
  `product_informations` text COLLATE utf8_unicode_ci NOT NULL,
  `project_results` text COLLATE utf8_unicode_ci NOT NULL,
  `project_partners` text COLLATE utf8_unicode_ci NOT NULL,
  `project_rewards` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `surveys`
--

LOCK TABLES `surveys` WRITE;
/*!40000 ALTER TABLE `surveys` DISABLE KEYS */;
INSERT INTO `surveys` VALUES (1,'survey','survey','survey','survey','survey','survey','','survey','2015-06-16 08:48:12','2015-06-16 08:48:12'),(2,'new','survey','new','new','survey','new','new','new','2015-06-16 11:52:41','2015-06-16 11:52:41'),(3,'new','new','new','new','survey','new','new','new','2015-06-16 11:53:51','2015-06-16 11:53:51'),(4,'new','new','survey','new','survey','survey','new','survey','2015-06-16 12:51:19','2015-06-16 12:51:19'),(5,'mysurvey','surv','surv','surv','surv','surv','surv','surv','2015-06-16 13:17:51','2015-06-16 13:17:51'),(6,'ui','ui','ui','ui²','ui','ui','ui','ui','2015-06-16 13:25:14','2015-06-16 13:25:14'),(7,'55','55','55','855','55','55','','55','2015-06-17 05:42:02','2015-06-17 05:42:02'),(10,'new','nouveau','nouveau','nouveau','v','nouveau','','nouveau','2015-06-17 06:43:53','2015-06-17 06:43:53');
/*!40000 ALTER TABLE `surveys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '1',
  `society` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `enterprise_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_enterprise_id_foreign` (`enterprise_id`),
  CONSTRAINT `users_enterprise_id_foreign` FOREIGN KEY (`enterprise_id`) REFERENCES `enterprises` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'robin.chalas@epitech.eu','$2y$10$C0RmBRyzJVkMsovlTnNHk.7wsmropFjWWoR93YrzCnDmNiVb4StA2',3,NULL,NULL,NULL,NULL,NULL,'KHqYLo0SLWyMBRubmCs2VzEDllW9rDYGLWXMOnaPgeHgAwDlO177e9rpLyTr','2015-06-10 07:05:59','2015-06-16 06:49:55',NULL),(5,'robin.chalas@gmail.com','$2y$10$CSlDWlJhHZqRKs7kaE3Q0.NvyYeWF/KdUnQjqOVW7HDBak/b2hb9i',1,NULL,NULL,NULL,NULL,NULL,'EDkhrmYIvwIuXBqB50oylV5HBbn2J9KLjOZidqYLYiLpwMDmvBwXOecmS7Qc','2015-06-10 11:14:19','2015-06-10 11:16:20',NULL),(7,'test@test.fr','$2y$10$jo5jd/1rXOsFHg6iH1EM9uVReMKt0RvLDm3nqEQ/kQhgmW2gHdL.2',1,NULL,NULL,NULL,NULL,NULL,'MNDIRpKL3hXLmEAWSVaJ4CZTFL8yEloqadC4jsTd9EeUaB553SADgvjXGhC1','2015-06-10 11:20:05','2015-06-12 07:00:31',NULL),(8,'test1@test.fr','$2y$10$97PNbtZpBJyz2HyQCo0NNe6fHVQtiHowlpQJAFfW9G7qyqkcGqsH.',1,NULL,NULL,NULL,NULL,NULL,'pO4mg3dos6SgUkw7ZyHzKxDU0Pf6mdqKk9RIa4M8OzpMkmovuzv97czSI4Hs','2015-06-10 11:38:11','2015-06-10 13:17:55',NULL),(9,'test@testttt.fr','$2y$10$o1RX3FczKxV/8C43OJWaLu.n1ClinhXBq2/wPS3f0VaptzRsbfa1a',1,NULL,NULL,NULL,NULL,NULL,'6Lw5hn6rnwAnjCrTfIGbKOy2OnxkCmpwWmkKcj68KzhQsMVRJA8HwvjKbFJc','2015-06-12 05:55:40','2015-06-12 05:57:48',NULL),(10,'sutu@test.fr','$2y$10$eSCO.Nb7xeo79MroTqD2G.dpp4aQEz1yv1TNvuDkDGY/iMNeW1ski',1,NULL,NULL,NULL,NULL,NULL,'UVUvwIAarFcBqGvDcP7XoBLsMdFbyzTRdHduCVX8t1Obs0U32QEEFt4PdLCP','2015-06-12 06:05:19','2015-06-16 14:30:25',11),(11,'testsutu@testsutu.fr','$2y$10$eQZmT/yMlSNWjNDotWk4N.f616mlCG5PUghoctSMZLR//lsaJOSs6',1,NULL,NULL,NULL,NULL,NULL,'RjUPBHnIbNKgXj8XJovcgkCuuXjhhEA45UHU2CmZzP5Y5qNua1XIGVISjMob','2015-06-12 06:05:49','2015-06-12 06:35:37',NULL),(12,'suututest@test.fr','$2y$10$UZ3czj6IOaKNip/TrNLTwunPaCcineIebpwB4P/DcP9hDVV7zn0ry',1,NULL,NULL,NULL,NULL,NULL,'5HO5UEieW5b1XEmkI8hHs0yUVbKKc6mu5kNOUnFILbS3U79OPZsTlRJCOGFf','2015-06-12 06:45:28','2015-06-12 06:45:40',NULL),(13,'testtttttt@test.fr','$2y$10$8OUrzYW3qWbrHAdK24Mm8O03xtPWJAyzRYrJ2qSUDYuqVKL8p2Rn.',2,'Test','test','test',505252526,'Lyon',NULL,'2015-06-12 07:01:19','2015-06-12 07:01:19',NULL),(14,'test12@12.fr','$2y$10$gy5aWsY2UNlJ/UUiUVq8.OUvRoP7RzYyaaMhWazRz7h.W0r7tnwx2',1,NULL,NULL,NULL,NULL,NULL,'C2xseDEZnlYDWtLELTT9tRJEa2SJiB1rCuf4EjwVJeSk3czupgoya4RFWQLZ','2015-06-15 11:39:10','2015-06-15 12:17:43',NULL),(15,'test2222@22.fr','$2y$10$RHDh5uup3P8f5YbrybcscOVRrjwCuj9GjgPL8t8extS8vLWjU5nTa',1,NULL,NULL,NULL,NULL,NULL,'DHmcCOGqwCqAl46yaHBpf1hyEQjXwNs5zKZSmH5eaetDFLlENM4Y8VyOL91g','2015-06-15 12:19:20','2015-06-15 12:21:53',NULL),(16,'tt@tt.fr','$2y$10$Jn2q2MKf6gZc/MnjMxmeteXIUiY.Lw6zxdq1gXn61C5.potT0ZW7e',1,NULL,NULL,NULL,NULL,NULL,NULL,'2015-06-15 14:12:40','2015-06-15 14:13:39',NULL),(17,'step@step.fr','$2y$10$3gZTcPSdPS.r8tObEUz3dOG30ES261f8cjxtjq4FMVRMx5yZHpqXC',1,NULL,NULL,NULL,NULL,NULL,'sFqaDwJKafUkNE1HwqswKPCZuXyKRDCFFJ6esAjZPFiTNzFx4fJRMLj2OhOt','2015-06-16 08:17:03','2015-06-17 06:07:27',9),(18,'yo@yo.fr','$2y$10$n0Wh9arXEQWzzQ08mcSquOPOHW5s50tD3Jy3WgKABZtMa33JAs77O',1,NULL,NULL,NULL,NULL,NULL,'TQolzR9gJ147HemnKSTC3ZOs9gFjbTOp5ULtEjKC5544xfU419BaOESEIGKP','2015-06-16 09:37:53','2015-06-16 13:38:14',10),(19,'newtest@test.ru','$2y$10$3SPZh5ZdUE/2ObBMFoBPwOvM6e.Y9Eer87pGJLhoVNmMsGJAjTufu',1,NULL,NULL,NULL,NULL,NULL,'Hvsqdz3JdXaOmf6NgrwTDHEbeRV3wv6u8EQ7OQYxtWvz1PaNQD0qeptVTKRJ','2015-06-16 14:16:08','2015-06-16 14:17:03',NULL),(22,'robin.chalas@ep.eu','$2y$10$ALRX.Qu7m10WjJ/xiv22e.EU1SDaRDR9hS1R01VfqIZCBsYrzz96q',1,NULL,NULL,NULL,NULL,NULL,NULL,'2015-06-17 06:42:52','2015-06-17 06:43:31',15),(23,'new@new.new','$2y$10$cErbgTMf7dbAkxp2uU1QcOeEw/RmEzMP66rcjDUqk8BsTeIbjwtY.',1,NULL,NULL,NULL,NULL,NULL,NULL,'2015-06-17 07:01:31','2015-06-17 07:02:21',16);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_categories`
--

DROP TABLE IF EXISTS `users_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_categories`
--

LOCK TABLES `users_categories` WRITE;
/*!40000 ALTER TABLE `users_categories` DISABLE KEYS */;
INSERT INTO `users_categories` VALUES (1,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,1,2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,9,4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,9,5,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,7,8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,7,9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,10,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,14,8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(9,14,9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(10,16,8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(11,16,9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(12,17,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(13,17,4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(14,17,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(15,17,4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(16,17,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(17,17,4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(18,18,8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(19,18,9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(20,20,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(21,20,4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(22,20,5,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(23,21,7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(24,21,8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(25,22,4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(26,22,5,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(27,23,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(28,23,2,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `users_categories` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-06-17 11:54:06
