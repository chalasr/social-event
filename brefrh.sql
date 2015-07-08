-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 08, 2015 at 09:54 PM
-- Server version: 5.5.43-0+deb7u1
-- PHP Version: 5.4.41-0+deb7u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inscription_trophees_innovation_bref_com`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE IF NOT EXISTS `activities` (
`id` int(10) unsigned NOT NULL,
  `ca_2013` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `net_2013` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `effectif_2013` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rd_2013` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `effectif_rd_2013` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ca_2014` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `net_2014` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `effectif_2014` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rd_2014` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `effectif_rd_2014` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ca_2015` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `net_2015` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `effectif_2015` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rd_2015` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `effectif_rd_2015` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enterprise_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `ca_2013`, `net_2013`, `effectif_2013`, `rd_2013`, `effectif_rd_2013`, `ca_2014`, `net_2014`, `effectif_2014`, `rd_2014`, `effectif_rd_2014`, `ca_2015`, `net_2015`, `effectif_2015`, `rd_2015`, `effectif_rd_2015`, `enterprise_id`, `created_at`, `updated_at`) VALUES
(10, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', 28, '2015-07-08 17:33:13', '2015-07-08 17:33:13');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(11, 'ENVIRONNEMENT ET ENERGIE', 'Consciente de l’urgence de diminuer l’impact de son activité sur l’environnement (pollution de l’air, du sol, de l’eau), l’entreprise récompensée aura mis en œuvre une politique environnementale sur le long terme, conçu une technique ou un produit permettant de diminuer la pollution ou d’abaisser la consommation énergétique, contribué au développement des énergies renouvelables, etc.', '2015-07-08 14:23:34', '2015-07-08 14:23:34'),
(12, 'EQUIPEMENTS ET PRODUITS DU SPORT, DES LOISIRS ET DE LA MONTAGNE', 'Sera récompensée une entreprise qui aura créé ou fabriqué un article de sport/loisirs ou un équipement touristique ou sportif innovant, en élevant particulièrement son niveau de confort, de sécurité, de praticité et de durabilité. Tous les sports, d’été ou d’hiver, d’intérieur ou d’extérieur, sont concernés. L’éco-conception sera un élément pris en compte dans le choix du jury. En cas d’égalité, priorité sera donnée à une entreprise produisant en Rhône-Alpes et en France (par rapport à une production délocalisée).', '2015-07-08 14:23:34', '2015-07-08 14:23:34'),
(13, 'INDUSTRIES', 'Il s’agit de récompenser une entreprise qui aura conçu et réalisé un produit industriel apportant des améliorations sensibles en matière de qualité, de productivité et/ou de prix par rapport aux produits ou équipements existants sur le marché, voire constituant un véritable saut technologique. Priorité sera donnée à une entreprise produisant en Rhône-Alpes et en France (par rapport à une production délocalisée). Tous les secteurs industriels (hors ceux, déjà représentés dans des catégories particulières) sont concernés.', '2015-07-08 14:23:34', '2015-07-08 14:23:34'),
(14, 'JEUNE POUSSE', 'Anglicisée par le terme "start up", la "jeune pousse" est une entreprise de création récente dont le potentiel de croissance est particulièrement élevé, par la nature de son activité, généralement hautement technologique (santé, biotech, nanotech, logiciel et numérique, etc.) mais pas seulement. Contrairement aux autres catégories, les perspectives des produits et technologies développés pourront primer sur la santé économique (rentabilité…) de l’entreprise.', '2015-07-08 14:23:34', '2015-07-08 14:23:34'),
(15, 'OBJETS CONNECTÉS', 'Qu’ils touchent au monde du sport (vêtements, chaussures), de l’image (vidéo), de l’habitat (domotique), de la sécurité (surveillance, géolocalisation) et plus généralement de l’acquisition et du traitement de données à distance, les objets connectés (dotés d’une puce électronique) ont fait leur apparition dans notre quotidien. Sera récompensé dans cette catégorie, à travers l’entreprise qui l’aura conçu et/ou fabriqué, un objet qui bouscule les usages, apportant de nouvelles fonctionnalités dans la vie quotidienne et/ou professionnelle, grâce au numérique. ', '2015-07-08 14:23:34', '2015-07-08 14:23:34'),
(16, 'PRODUITS GRAND PUBLIC', 'L’entreprise lauréate sera récompensée grâce à l’intérêt, l’utilité ou le design particulièrement innovants qu’elle aura apportés à un article de grande consommation. Eco-conception et impact écologique (bilan carbone…) seront particulièrement appréciés.', '2015-07-08 14:23:34', '2015-07-08 14:23:34'),
(17, 'SANTÉ / BIOTECHNOLOGIES', 'L’entreprise récompensée aura conçu un médicament, un vaccin ou tout autre produit, équipement ou service apportant une amélioration sensible du confort ou un l’allongement de la vie, de la protection de la santé humaine ou de la prise en charge des malades.', '2015-07-08 14:23:34', '2015-07-08 14:23:34'),
(18, 'SERVICES', 'Il s’agit de récompenser une entreprise proposant un service innovant qui n’existait pas encore sur le marché et/ou qui apporte une grande amélioration en matière de qualité, d’efficacité et d’usage. Sont concernés les services à la personne comme les services aux entreprises.', '2015-07-08 14:23:34', '2015-07-08 14:23:34'),
(19, 'TRANSPORTS ET VÉHICULES DU FUTUR', 'Sera récompensée une entreprise qui aura contribué au développement d’un véhicule existant ou conçu un véhicule nouveau (terrestre, aérien, maritime ou fluvial) qui améliore de façon significative les économies d’énergie, le bilan carbone, la sécurité et les usages des produits actuels. Les candidates pourront être des sociétés de conception, des fabricants ou des sociétés de service.', '2015-07-08 14:23:34', '2015-07-08 14:23:34'),
(20, 'URBANISME, CONSTRUCTION DURABLE', 'Le bâtiment (habitat, tertiaire, industriel) est au cœur de notre société : il façonne les centres urbains ; il a une grande influence sur les relations sociales, les déplacements, l’utilisation de l’espace ; il est un grand consommateur d’énergie… Le Trophée « Urbanisme, construction durable » sera remis à une entreprise qui aura apporté des améliorations conséquentes  dans l’un ou plusieurs de ces domaines. Cette catégorie s’adresse à l’ensemble des acteurs de la filière : urbanisme, architecture, matériaux, construction et techniques du bâtiment, gestion de l’énergie, domotique, etc. ', '2015-07-08 14:23:34', '2015-07-08 14:23:34');

-- --------------------------------------------------------

--
-- Table structure for table `enterprises`
--

CREATE TABLE IF NOT EXISTS `enterprises` (
`id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `registration_state` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `juridical_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creation_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `member_of_group` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_address` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telecopie` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `candidate_informations` text COLLATE utf8_unicode_ci NOT NULL,
  `candidate_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `candidate_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activity_id` int(11) DEFAULT NULL,
  `external_collaborators_type` text COLLATE utf8_unicode_ci,
  `project_certificates` text COLLATE utf8_unicode_ci,
  `survey_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `is_pay` int(11) NOT NULL,
  `leader_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `internal_collaborators` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `leader_phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `leader_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `leader_firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `leader_position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `candidate_firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `candidate_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_complement` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `enterprises`
--

INSERT INTO `enterprises` (`id`, `created_at`, `updated_at`, `registration_state`, `name`, `juridical_status`, `creation_date`, `member_of_group`, `postal_address`, `phone`, `telecopie`, `website`, `candidate_informations`, `candidate_phone`, `candidate_email`, `activity_id`, `external_collaborators_type`, `project_certificates`, `survey_id`, `user_id`, `is_pay`, `leader_name`, `internal_collaborators`, `city`, `postal_code`, `leader_phone`, `leader_email`, `leader_firstname`, `leader_position`, `candidate_firstname`, `candidate_name`, `address_complement`) VALUES
(28, '2015-07-08 14:23:13', '2015-07-08 17:33:13', 'step5', 'Robin Chalas', 'personne morale', '2014-02-02', 'celui ci', '104 Rue Baraban', '+33658211073', NULL, NULL, 'dev', '+33658211073', 'robin.chalas@epitech.eu', 10, NULL, '4', 22, 38, 0, 'Chalas', '4', 'LYON', '69003', '+33658211073', 'robin.chalas@epitech.eu', 'Robin', 'dev', 'Robin', 'Chalas', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `enterprise_id` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=37 ;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name`, `path`, `created_at`, `updated_at`, `enterprise_id`) VALUES
(35, 'candidat-29.pdf', 'uploads/38', '2015-07-08 14:26:24', '2015-07-08 14:26:24', 28),
(36, 'todomvc-master.zip', 'uploads/38', '2015-07-08 17:37:25', '2015-07-08 17:37:25', 28);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reminders`
--

CREATE TABLE IF NOT EXISTS `password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE IF NOT EXISTS `surveys` (
`id` int(10) unsigned NOT NULL,
  `enterprise_activity` text COLLATE utf8_unicode_ci NOT NULL,
  `project_origin` text COLLATE utf8_unicode_ci NOT NULL,
  `innovative_arguments` text COLLATE utf8_unicode_ci NOT NULL,
  `wanted_impact` text COLLATE utf8_unicode_ci NOT NULL,
  `product_informations` text COLLATE utf8_unicode_ci NOT NULL,
  `project_results` text COLLATE utf8_unicode_ci NOT NULL,
  `project_partners` text COLLATE utf8_unicode_ci NOT NULL,
  `project_rewards` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `surveys`
--

INSERT INTO `surveys` (`id`, `enterprise_activity`, `project_origin`, `innovative_arguments`, `wanted_impact`, `product_informations`, `project_results`, `project_partners`, `project_rewards`, `created_at`, `updated_at`) VALUES
(22, 'Test1', 'Test1', 'test1', 'test1', 'test3', 'test55', 'test', 'ytest', '2015-07-08 14:26:26', '2015-07-08 14:26:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `society` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `role_id` int(11) NOT NULL DEFAULT '1',
  `enterprise_id` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=39 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `society`, `firstname`, `lastname`, `phone`, `city`, `remember_token`, `created_at`, `updated_at`, `role_id`, `enterprise_id`) VALUES
(38, 'sututest@prod.fr', '$2y$10$OBB.x3saYu.Um6cSgi.2ruPjY9OAhevm0XC0y1w9t7dGZ0vzHFQ7G', NULL, NULL, NULL, NULL, NULL, NULL, '2015-07-08 14:22:44', '2015-07-08 14:23:13', 1, 28);

-- --------------------------------------------------------

--
-- Table structure for table `users_categories`
--

CREATE TABLE IF NOT EXISTS `users_categories` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=65 ;

--
-- Dumping data for table `users_categories`
--

INSERT INTO `users_categories` (`id`, `user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(63, 38, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 38, 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
 ADD PRIMARY KEY (`id`), ADD KEY `activities_enterprise_id_foreign` (`enterprise_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enterprises`
--
ALTER TABLE `enterprises`
 ADD PRIMARY KEY (`id`), ADD KEY `enterprises_survey_id_foreign` (`survey_id`), ADD KEY `enterprises_user_id_foreign` (`user_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
 ADD PRIMARY KEY (`id`), ADD KEY `files_enterprise_id_foreign` (`enterprise_id`);

--
-- Indexes for table `password_reminders`
--
ALTER TABLE `password_reminders`
 ADD KEY `password_reminders_email_index` (`email`), ADD KEY `password_reminders_token_index` (`token`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surveys`
--
ALTER TABLE `surveys`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD KEY `users_enterprise_id_foreign` (`enterprise_id`);

--
-- Indexes for table `users_categories`
--
ALTER TABLE `users_categories`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `enterprises`
--
ALTER TABLE `enterprises`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `users_categories`
--
ALTER TABLE `users_categories`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=65;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
ADD CONSTRAINT `activities_enterprise_id_foreign` FOREIGN KEY (`enterprise_id`) REFERENCES `enterprises` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enterprises`
--
ALTER TABLE `enterprises`
ADD CONSTRAINT `enterprises_survey_id_foreign` FOREIGN KEY (`survey_id`) REFERENCES `surveys` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `enterprises_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `files`
--
ALTER TABLE `files`
ADD CONSTRAINT `files_enterprise_id_foreign` FOREIGN KEY (`enterprise_id`) REFERENCES `enterprises` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `users_enterprise_id_foreign` FOREIGN KEY (`enterprise_id`) REFERENCES `enterprises` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
