-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 29, 2018 at 05:56 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pressing`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id_categorie` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `categorie_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_categorie`, `categorie_name`, `created_at`, `updated_at`) VALUES
(1, 'cat1', '2018-03-13 16:06:13', '2018-03-13 16:06:13'),
(2, 'cat2', '2018-03-13 16:06:18', '2018-03-13 16:06:18'),
(3, 'cat3', '2018-03-13 16:06:23', '2018-03-13 16:06:23');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id_client` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_tele` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_adresse` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id_client`, `client_name`, `client_tele`, `client_adresse`, `created_at`, `updated_at`) VALUES
(14, 'abdo', '0514528996', 'casablanca', '2018-03-19 13:47:12', '2018-03-19 13:47:12'),
(26, 'adam', '0521478544', 'marrakech', '2018-03-24 15:02:39', '2018-03-24 15:02:39'),
(27, 'anas', '0521478544', 'rabat', '2018-03-25 11:22:31', '2018-03-25 11:22:31'),
(28, 'morad', '0566987452', 'agadir', '2018-03-25 11:23:42', '2018-03-25 11:23:42');

-- --------------------------------------------------------

--
-- Table structure for table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id_commande` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `commande_num` int(11) NOT NULL,
  `commande_date` datetime NOT NULL,
  `commande_date_retrait` datetime NOT NULL,
  `commande_quantity` int(11) NOT NULL,
  `commande_montant` double(8,2) NOT NULL,
  `commande_paid` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_client` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `commandes_id_client_foreign` (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commandes`
--

INSERT INTO `commandes` (`id_commande`, `commande_num`, `commande_date`, `commande_date_retrait`, `commande_quantity`, `commande_montant`, `commande_paid`, `id_client`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 18031300, '2018-03-19 00:00:00', '2018-03-22 00:00:00', 3, 150.00, 'no', 14, '2018-03-19 13:47:12', '2018-03-19 13:47:12', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `factures`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `factures`;
CREATE TABLE IF NOT EXISTS `factures` (
`id_commande` int(10) unsigned
,`commande_num` int(11)
,`commande_date` datetime
,`commande_date_retrait` datetime
,`commande_quantity` int(11)
,`commande_montant` double(8,2)
,`commande_paid` varchar(100)
,`id_client` int(10) unsigned
,`client_name` varchar(191)
,`client_tele` varchar(191)
,`client_adresse` varchar(191)
,`deleted_at` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_02_22_115500_create_categories_table', 1),
(4, '2018_02_22_115558_create_clients_table', 1),
(5, '2018_02_22_115650_create_commandes_table', 1),
(6, '2018_02_22_204433_create_services_table', 1),
(7, '2018_02_22_216001_create_vetements_table', 1),
(8, '2018_02_27_145250_create_factures_table', 1),
(9, '2018_02_28_102647_create_societes_table', 1),
(10, '2018_03_13_134235_create_payments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id_payment` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `payment_mode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_paid` double(8,2) NOT NULL,
  `payment_rest` double(8,2) NOT NULL,
  `id_commande` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_payment`),
  KEY `payments_id_commande_foreign` (`id_commande`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id_permission` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `show_commande` tinyint(1) NOT NULL DEFAULT '1',
  `create_commande` tinyint(1) NOT NULL DEFAULT '1',
  `update_commande` tinyint(1) NOT NULL DEFAULT '1',
  `delete_commande` tinyint(1) NOT NULL DEFAULT '1',
  `show_client` tinyint(1) NOT NULL DEFAULT '1',
  `create_client` tinyint(1) NOT NULL DEFAULT '1',
  `update_client` tinyint(1) NOT NULL DEFAULT '1',
  `delete_client` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_permission`),
  KEY `permissions_id_user` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id_permission`, `id_user`, `show_commande`, `create_commande`, `update_commande`, `delete_commande`, `show_client`, `create_client`, `update_client`, `delete_client`, `created_at`, `updated_at`) VALUES
(2, 5, 1, 1, 1, 1, 1, 1, 1, 1, '2018-03-23 15:46:29', '2018-03-23 15:46:29'),
(5, 6, 1, 1, 1, 1, 1, 1, 1, 1, '2018-03-26 09:28:21', '2018-03-26 09:28:21');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id_service` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `service_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_service`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id_service`, `service_name`, `created_at`, `updated_at`) VALUES
(1, 'ser1', '2018-03-13 16:06:32', '2018-03-13 16:06:32'),
(2, 'ser2', '2018-03-13 16:06:38', '2018-03-13 16:06:38'),
(3, 'ser3', '2018-03-13 16:06:42', '2018-03-13 16:06:42');

-- --------------------------------------------------------

--
-- Table structure for table `societes`
--

DROP TABLE IF EXISTS `societes`;
CREATE TABLE IF NOT EXISTS `societes` (
  `id_societe` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `societe_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `societe_adresse` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `societe_city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `societe_tele` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `societe_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `societe_website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `societe_logo` text COLLATE utf8mb4_unicode_ci,
  `societe_description` text COLLATE utf8mb4_unicode_ci,
  `societe_cnss` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `societe_rc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `societe_pattent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `societe_if` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `societe_ice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_societe`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `societes`
--

INSERT INTO `societes` (`id_societe`, `societe_name`, `societe_adresse`, `societe_city`, `societe_tele`, `societe_email`, `societe_website`, `societe_logo`, `societe_description`, `societe_cnss`, `societe_rc`, `societe_pattent`, `societe_if`, `societe_ice`, `created_at`, `updated_at`) VALUES
(1, 'pressingfast', '300 avenue abdelah 500 marrakech', 'Marrakech', '0512748963', 'pressingfast@gmail.com', 'www.pressingfast.com', 'assets/img/favicons/logo.png', NULL, '4758963260252', '5452254789655', '4584512644855', '9978622222154', '7894521632544', '2018-03-13 15:55:20', '2018-03-13 15:55:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tele` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` text COLLATE utf8mb4_unicode_ci,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `fullname`, `adresse`, `tele`, `picture`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'admin', 'admin@gmail.com', 'abdo soukrat', 'marrakech', '051247878', 'assets/img/avatars/avatar.png', '$2y$10$bNRLn4KvUyBneDqvQwTJ1OH7C6j0kFqdXDgaxehwZevkAH4sHcu2y', 1, 'CRxE05ox06ARonyY6JV4lOiT008yZx6MIY5cH4oqVpTfq3UIT7IaLVLNmyTl', '2018-03-23 15:26:29', '2018-03-23 15:26:29'),
(5, 'amine', 'amine@gmail.com', 'amine', 'rabat', '0512478988', 'assets/img/avatars/avatar.png', '$2y$10$LVQUQ.YGGw8i8pTSfGKOX.LMSYp/Rqsw/TId9Ztxme5cfHsOkuqtm', 0, 'o8jCsEvn0Kag1pz2mUrbUUYvii3gRzFOKQRbjpLuzFABcY6ZbYDlFUAFNZKU', '2018-03-23 15:46:29', '2018-03-23 15:46:29'),
(6, 'user', 'user@gmail.com', 'user', 'benguerir', NULL, 'assets/img/avatars/avatar.png', '$2y$10$UnCRANHHxWYsgFrbBNE/wOgP0lUZBYQpGD3a4iii9UTAsfFe0iAzK', 0, NULL, '2018-03-26 09:28:21', '2018-03-26 09:28:21');

-- --------------------------------------------------------

--
-- Table structure for table `vetements`
--

DROP TABLE IF EXISTS `vetements`;
CREATE TABLE IF NOT EXISTS `vetements` (
  `id_vetement` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `vetement_libelle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vetement_price` double(8,2) NOT NULL,
  `vetement_quantity` int(11) NOT NULL,
  `vetement_total` double(8,2) NOT NULL,
  `vetement_description` text COLLATE utf8mb4_unicode_ci,
  `id_service` int(10) UNSIGNED NOT NULL,
  `id_commande` int(10) UNSIGNED NOT NULL,
  `id_categorie` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_vetement`),
  KEY `vetements_id_categorie_foreign` (`id_categorie`),
  KEY `vetements_id_service_foreign` (`id_service`),
  KEY `vetements_id_commande_foreign` (`id_commande`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vetements`
--

INSERT INTO `vetements` (`id_vetement`, `vetement_libelle`, `vetement_price`, `vetement_quantity`, `vetement_total`, `vetement_description`, `id_service`, `id_commande`, `id_categorie`, `deleted_at`, `created_at`, `updated_at`) VALUES
(8, 'leb1', 50.00, 3, 150.00, NULL, 1, 5, 1, NULL, '2018-03-19 13:47:12', '2018-03-19 13:47:12');

-- --------------------------------------------------------

--
-- Structure for view `factures`
--
DROP TABLE IF EXISTS `factures`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `factures`  AS  select `commandes`.`id_commande` AS `id_commande`,`commandes`.`commande_num` AS `commande_num`,`commandes`.`commande_date` AS `commande_date`,`commandes`.`commande_date_retrait` AS `commande_date_retrait`,`commandes`.`commande_quantity` AS `commande_quantity`,`commandes`.`commande_montant` AS `commande_montant`,`commandes`.`commande_paid` AS `commande_paid`,`clients`.`id_client` AS `id_client`,`clients`.`client_name` AS `client_name`,`clients`.`client_tele` AS `client_tele`,`clients`.`client_adresse` AS `client_adresse`,`commandes`.`deleted_at` AS `deleted_at` from (`commandes` join `clients`) where (`clients`.`id_client` = `commandes`.`id_client`) ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_id_client_foreign` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_client`) ON DELETE CASCADE;

--
-- Constraints for table `vetements`
--
ALTER TABLE `vetements`
  ADD CONSTRAINT `vetements_id_categorie_foreign` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id_categorie`),
  ADD CONSTRAINT `vetements_id_commande_foreign` FOREIGN KEY (`id_commande`) REFERENCES `commandes` (`id_commande`) ON DELETE CASCADE,
  ADD CONSTRAINT `vetements_id_service_foreign` FOREIGN KEY (`id_service`) REFERENCES `services` (`id_service`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
