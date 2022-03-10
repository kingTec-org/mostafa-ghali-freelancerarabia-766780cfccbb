-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 07, 2022 at 08:35 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freelancer_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `additional_services`
--

DROP TABLE IF EXISTS `additional_services`;
CREATE TABLE IF NOT EXISTS `additional_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `title` text,
  `price` int(11) DEFAULT NULL,
  `description` longtext,
  `deliver_time` text,
  `deliver_at_same_time` int(11) DEFAULT NULL,
  `additional_days` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `service_id` (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `additional_services`
--

INSERT INTO `additional_services` (`id`, `service_id`, `title`, `price`, `description`, `deliver_time`, `deliver_at_same_time`, `additional_days`, `created_at`, `updated_at`, `deleted_at`) VALUES
(39, 29, 'Necessitatibus est', 120, NULL, '22', 1, 0, '2022-02-14 19:41:18', '2022-02-14 18:41:18', '2022-02-14 18:41:18'),
(40, 29, 'Ipsum nostrum offic tes', 23, NULL, '22', 1, 0, '2022-02-15 07:04:35', '2022-02-15 06:04:35', NULL),
(41, 29, 'lllll', 4000, NULL, '22', 1, 0, '2022-02-14 20:11:56', '2022-02-14 19:11:56', '2022-02-14 19:11:56'),
(42, 42, 'lllll', 22, NULL, NULL, 0, 12, '2022-02-08 17:09:17', '2022-02-08 17:09:17', NULL),
(43, 43, 'asdasd', 132, NULL, NULL, 0, 123, '2022-02-08 17:13:42', '2022-02-08 17:13:42', NULL),
(44, 44, 'asdasd', 132, NULL, NULL, 0, 123, '2022-02-08 17:14:39', '2022-02-08 17:14:39', NULL),
(45, 48, 'asdasd', 132, NULL, NULL, 0, 123, '2022-02-08 17:17:26', '2022-02-08 17:17:26', NULL),
(46, 50, 'asdasd', 132, NULL, NULL, 0, 123, '2022-02-08 17:19:03', '2022-02-08 17:19:03', NULL),
(53, 29, NULL, 345345, NULL, '22', 1, 0, '2022-02-14 20:11:02', '2022-02-14 19:11:02', '2022-02-14 19:11:02'),
(54, 29, NULL, 88, NULL, '22', 1, 0, '2022-02-17 07:19:46', '2022-02-17 06:19:46', '2022-02-17 06:19:46'),
(55, 51, 'iuyiuhiuiuh', 76, NULL, NULL, 0, 76, '2022-02-16 17:59:53', '2022-02-16 17:59:53', NULL),
(56, 51, 'oiuoijoijio', 98098, NULL, NULL, 0, 87686, '2022-02-16 17:59:53', '2022-02-16 17:59:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` text COLLATE utf8mb4_unicode_ci,
  `active` int(11) DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `email_verified_at`, `password`, `user_type`, `active`, `image`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(23, 'محمد الشوربجي', 'admin@admin.com', NULL, '$2y$10$k21H9CfE2x87uskproCETOvEf7Uah/WQJzVyFDuspPYFSnpRG70Hq', '1', 1, 'd1a1c15870bcf15422ae074298d41d32.jpeg', NULL, '2021-11-10 16:01:04', '2022-02-10 17:30:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

DROP TABLE IF EXISTS `advertisement`;
CREATE TABLE IF NOT EXISTS `advertisement` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `t1_ar` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t2_ar` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t3_ar` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t4_ar` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t1_en` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t2_en` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t3_en` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t4_en` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_type` enum('none','restaurant') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `link_reference_id` int(11) DEFAULT NULL,
  `color` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`id`, `image`, `t1_ar`, `t2_ar`, `t3_ar`, `t4_ar`, `t1_en`, `t2_en`, `t3_en`, `t4_en`, `link_type`, `link_reference_id`, `color`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'cc1a283fc6b03df9be283c98d17a42cf.jpg', 'هدية', 'بيتزا الطابون', 'الجمعة السوداء', 'الجمعة السوداء', 'Gift Voucher', 'Pizza Altaboon', 'Black Friday', 'Combo', 'restaurant', 154, '#ff2600', 1, '2021-09-11 19:06:28', '2021-11-04 20:53:06', '2021-11-04 20:53:06'),
(6, '6cf0c7cad88e22bcc136e7b3c19d4ca7.png', 'خصومات كبيرة', 'فقط', '06.00 د.إ', 'درهم اماراتي', 'Big Discount', 'Only', 'AED: 06.00', 'Banh Mi', 'restaurant', 161, '#0184f7', 1, '2021-09-13 16:01:51', '2021-11-04 20:52:39', '2021-11-04 20:52:39'),
(7, '296cc2ce9e671f01327d096c022957f3.jpeg', 'ونتر جاردن', 'كن الأول', 'احصل على خصم 10 %', 'CODE: F10', 'WINTER GARDEN', 'BE THE FIRST ONE', 'GET 10 %', 'CODE: F10', 'restaurant', 181, '#36612c', 1, '2021-11-05 19:15:05', '2021-11-25 23:53:53', NULL),
(8, '3381972ea7242b31ce505761cdf8dc8e.jpeg', 'FUDGE CLUSTER SWEETS', 'Best Hot chocolate', 'CODE: WG35', '35 offf!!', 'FUDGE CLUSTER SWEETS', 'Best Hot chocolate', 'CODE: WG35', '35 offf!!', 'restaurant', 256, '#cc0b00', 0, '2021-11-06 02:29:30', '2021-11-25 23:55:44', NULL),
(9, '85774f99f63c61700f76dc3cf2992111.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'restaurant', 222, '#ffffff', 1, '2021-11-27 23:20:13', '2021-11-27 23:20:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `app_constants`
--

DROP TABLE IF EXISTS `app_constants`;
CREATE TABLE IF NOT EXISTS `app_constants` (
  `id` int(11) NOT NULL,
  `vat` float NOT NULL,
  `app_fee` float NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_constants`
--

INSERT INTO `app_constants` (`id`, `vat`, `app_fee`) VALUES
(1, 0.05, 0);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cart_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` int(11) NOT NULL,
  `quantity` smallint(5) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `total_price` double NOT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci,
  `attachment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carts_user_id_foreign` (`user_id`),
  KEY `carts_service_id_foreign` (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `cart_id`, `user_id`, `service_id`, `quantity`, `price`, `total_price`, `notes`, `attachment`, `created_at`, `updated_at`) VALUES
(11, 'ffc8934a-5d6d-4b16-a7a4-fce1d4f1a8f7', 4, 51, 2, 8787, 17574, 'LKMDFLKDMF', '712a29c7d9109d542d59605a5c3cb28c.jpeg', '2022-02-22 12:48:43', '2022-02-22 12:48:43'),
(12, 'ffc8934a-5d6d-4b16-a7a4-fce1d4f1a8f7', 4, 32, 7, 0, 0, ',MNJK', 'c0a6039ccac9e6d82dc1b2303ed1d1a6.png', '2022-02-22 12:49:09', '2022-02-22 12:49:09'),
(13, 'ffc8934a-5d6d-4b16-a7a4-fce1d4f1a8f7', 4, 31, 8, 32, 256, 'KJBNJ', 'fdff2410b1a0376ee14a97cd1252d327.jpeg', '2022-02-22 12:49:33', '2022-02-22 12:49:33'),
(14, '14531bac-ee51-4365-9d21-c6212a504777', 3, 51, 12, 8787, 105444, 'erewr', '3292128c6052c43b1531c6fba5015895.png', '2022-02-27 18:06:40', '2022-02-27 18:06:40'),
(15, '14531bac-ee51-4365-9d21-c6212a504777', 3, 30, 1, 15, 15, 's', '71b4b97020bbc6480cc027bfe392c714.png', '2022-02-27 18:07:11', '2022-02-27 18:07:11'),
(35, 'b9d201fd-92f1-4c73-b5ab-4b7301474d73', 1, 51, 2, 8787, 17574, 'kljasd', '6fc5777bdcb176747ea56f898c3221ed.png', '2022-03-04 14:56:06', '2022-03-04 14:56:06'),
(40, 'bb92eed3-1746-499e-aefe-c5544b04ccfd', 3, 51, 4, 8787, 35148, 'سي', '4efa5eda7b56bcf4a6e71632a33ece6c.png', '2022-03-05 16:59:20', '2022-03-05 16:59:20'),
(42, '4c91f874-3110-4658-925a-cc02ca227a82', 3, 30, 3, 15, 45, 'asd', 'f2b8cbed676723baddd87d8e124fe579.png', '2022-03-06 09:33:26', '2022-03-06 09:33:26'),
(43, '038bd7da-b0c8-4711-a1d4-1b110bdc1b82', 3, 51, 2, 8787, 17574, 'asdasd', '5adde4d774f3e0078b28704ea0f10d9f.jpg', '2022-03-06 16:43:48', '2022-03-06 16:43:48');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_ar` text NOT NULL,
  `name_en` text NOT NULL,
  `image` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name_ar`, `name_en`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'كتابة، تحرير، ترجمة', 'Writing, editing, translating', 'a8bdbd2e55742bf1d8d07f81dea39b31.jpeg', '2022-02-24 16:03:33', '2022-02-24 14:03:33', NULL),
(2, 'تسويق إلكتروني', 'E-Marketing', '83672f61e48ac512af4620b1c1b6cdfa.png', '2022-02-24 16:04:28', '2022-02-24 14:04:28', NULL),
(3, 'تصميم وأعمال فنية وإبداعية', 'Design, artwork and creativity', '15d810853f023a00308a3f2d27d2a8df.png', '2022-02-24 16:05:06', '2022-02-24 14:05:06', NULL),
(4, 'موسيقى و صوت', 'music and sound', '84c330545ab72719ead36aac4d16f29e.png', '2022-02-24 16:05:29', '2022-02-24 14:05:29', NULL),
(5, 'أعمال وخدمات استشارية وإدارية', 'Business, consulting and management services', '0a190b4e668bd72fa08cdd7424dddb57.png', '2022-02-24 16:05:47', '2022-02-24 14:05:47', NULL),
(6, 'برمجة، تطوير وبناء المواقع والتطبيقات', 'Programming, development and construction of websites and applications', '634403f9c54d58eb953bd87e5f715b12.png', '2022-02-24 16:06:08', '2022-02-24 14:06:08', NULL),
(7, 'برمجة، تطوير وبناء المواقع والتطبيقات\r\n', 'Programming, development and construction of websites and applications', 'service-6.png', '2022-02-24 16:06:35', '2022-02-24 14:06:35', '2022-02-24 14:06:35'),
(8, 'test ar', 'test en', '2d5de75613e58fcf340098f699159684.png', '2022-02-24 16:06:20', '2022-02-24 14:06:20', '2022-02-24 14:06:20'),
(9, 'test Ar', 'Test En', '8c30369267996059848903e55fcf0201.png', '2022-02-24 16:06:28', '2022-02-24 14:06:28', '2022-02-24 14:06:28'),
(10, 'test Ar Up', 'Test en Up', '9d71e3d293fb0de1d8cd42f0d974fbb9.png', '2022-02-24 16:06:24', '2022-02-24 14:06:24', '2022-02-24 14:06:24'),
(11, 'test Ar', 'Test en', NULL, '2022-01-26 20:28:38', '2022-01-26 19:28:38', '2022-01-26 19:28:38'),
(12, 'test Ar Update', 'Test en Update', NULL, '2022-01-26 20:28:48', '2022-01-26 19:28:48', '2022-01-26 19:28:48'),
(13, 'Test Arabic', 'Test Arabic', '3f48229d92f51913641b5eec48e436b5.png', '2022-02-05 18:00:10', '2022-02-05 17:00:10', '2022-02-05 17:00:10');

-- --------------------------------------------------------

--
-- Table structure for table `comments_reply`
--

DROP TABLE IF EXISTS `comments_reply`;
CREATE TABLE IF NOT EXISTS `comments_reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `comment` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comment_id` (`comment_id`),
  KEY `service_id` (`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL,
  `code` varchar(7) NOT NULL,
  `name_ar` varchar(150) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `dialing_code` varchar(7) DEFAULT NULL,
  `flag` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `code`, `name_ar`, `name_en`, `dialing_code`, `flag`, `status`) VALUES
(1, 'ae', 'الإمارات العربية المتحدة', 'United Arab Emirates', '+971', 'assets/img/flags/ae.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorite_meal`
--

DROP TABLE IF EXISTS `favorite_meal`;
CREATE TABLE IF NOT EXISTS `favorite_meal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorite_meal`
--

INSERT INTO `favorite_meal` (`id`, `meal_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(65, 27, 76, '2021-10-20 14:54:20', '2021-10-20 14:54:20', NULL),
(67, 28, 76, '2021-10-20 15:11:07', '2021-10-20 15:11:07', NULL),
(68, 32, 132, '2021-10-20 19:53:25', '2021-11-04 20:53:06', '2021-11-04 20:53:06'),
(72, 32, 67, '2021-10-20 22:40:30', '2021-11-04 20:53:06', '2021-11-04 20:53:06'),
(74, 32, 150, '2021-10-21 03:35:41', '2021-11-04 20:53:06', '2021-11-04 20:53:06'),
(75, 40, 133, '2021-10-22 02:44:48', '2021-11-04 20:52:16', '2021-11-04 20:52:16'),
(76, 39, 133, '2021-10-22 02:44:52', '2021-11-04 20:52:16', '2021-11-04 20:52:16'),
(77, 38, 105, '2021-11-01 18:43:10', '2021-11-01 18:44:06', '2021-11-01 18:44:06'),
(78, 38, 105, '2021-11-01 18:44:09', '2021-11-04 20:52:16', '2021-11-04 20:52:16'),
(79, 32, 230, '2021-11-03 20:30:52', '2021-11-03 20:30:55', '2021-11-03 20:30:55'),
(80, 35, 230, '2021-11-03 20:36:34', '2021-11-04 20:52:39', '2021-11-04 20:52:39'),
(81, 32, 230, '2021-11-03 20:50:53', '2021-11-03 21:45:05', '2021-11-03 21:45:05'),
(82, 34, 230, '2021-11-03 21:26:35', '2021-11-04 20:53:06', '2021-11-04 20:53:06'),
(83, 32, 244, '2021-11-03 21:53:36', '2021-11-04 20:53:06', '2021-11-04 20:53:06'),
(84, 32, 249, '2021-11-04 15:43:29', '2021-11-04 20:53:06', '2021-11-04 20:53:06'),
(85, 34, 249, '2021-11-04 15:44:26', '2021-11-04 20:53:06', '2021-11-04 20:53:06'),
(86, 107, 249, '2021-11-07 15:24:09', '2021-11-07 15:24:09', NULL),
(87, 100, 249, '2021-11-07 15:58:18', '2021-11-07 15:58:18', NULL),
(88, 116, 107, '2021-11-09 18:01:15', '2021-11-09 18:01:15', NULL),
(89, 73, 268, '2021-11-10 15:11:31', '2021-11-10 15:11:43', '2021-11-10 15:11:43'),
(90, 116, 268, '2021-11-10 19:33:22', '2021-11-10 19:33:37', '2021-11-10 19:33:37'),
(91, 117, 268, '2021-11-10 19:33:25', '2021-11-10 19:33:38', '2021-11-10 19:33:38'),
(92, 118, 268, '2021-11-10 19:33:27', '2021-11-10 19:33:40', '2021-11-10 19:33:40'),
(93, 119, 268, '2021-11-10 19:33:29', '2021-11-10 20:45:51', '2021-11-10 20:45:51'),
(94, 104, 285, '2021-11-15 22:35:01', '2021-11-15 22:35:01', NULL),
(95, 97, 285, '2021-11-15 22:35:06', '2021-11-15 22:35:06', NULL),
(96, 92, 234, '2021-11-16 00:25:35', '2021-11-16 00:25:35', NULL),
(97, 73, 268, '2021-11-16 18:02:04', '2021-11-16 18:02:04', NULL),
(98, 77, 268, '2021-11-16 18:02:05', '2021-11-16 18:02:05', NULL),
(99, 82, 268, '2021-11-16 18:02:07', '2021-11-16 18:02:07', NULL),
(100, 86, 268, '2021-11-16 18:02:10', '2021-11-16 18:02:10', NULL),
(101, 87, 268, '2021-11-16 18:02:11', '2021-11-16 18:10:40', '2021-11-16 18:10:40'),
(102, 88, 268, '2021-11-16 18:02:12', '2021-11-16 18:02:33', '2021-11-16 18:02:33'),
(103, 89, 268, '2021-11-16 18:02:14', '2021-11-16 18:02:35', '2021-11-16 18:02:35'),
(104, 90, 268, '2021-11-16 18:02:16', '2021-11-16 18:02:41', '2021-11-16 18:02:41'),
(105, 91, 268, '2021-11-16 18:02:18', '2021-11-16 18:02:30', '2021-11-16 18:02:30'),
(106, 106, 268, '2021-11-16 18:14:30', '2021-11-16 18:14:33', '2021-11-16 18:14:33'),
(107, 107, 268, '2021-11-16 18:14:30', '2021-11-16 18:14:33', '2021-11-16 18:14:33'),
(108, 110, 268, '2021-11-16 18:14:30', '2021-11-16 18:14:33', '2021-11-16 18:14:33'),
(109, 109, 268, '2021-11-16 18:14:30', '2021-11-16 18:14:33', '2021-11-16 18:14:33'),
(110, 106, 268, '2021-11-16 18:14:43', '2021-11-16 18:14:43', NULL),
(111, 109, 268, '2021-11-16 18:14:43', '2021-11-16 18:14:43', NULL),
(112, 110, 268, '2021-11-16 18:14:43', '2021-11-16 18:14:43', NULL),
(113, 107, 268, '2021-11-16 18:14:43', '2021-11-16 18:14:43', NULL),
(114, 94, 234, '2021-11-16 22:08:07', '2021-11-16 22:08:07', NULL),
(115, 99, 234, '2021-11-16 22:15:11', '2021-11-16 22:15:11', NULL),
(116, 112, 286, '2021-11-16 23:12:40', '2021-11-16 23:13:36', '2021-11-16 23:13:36'),
(117, 114, 286, '2021-11-16 23:13:12', '2021-11-16 23:13:23', '2021-11-16 23:13:23'),
(118, 115, 286, '2021-11-16 23:13:14', '2021-11-16 23:14:01', '2021-11-16 23:14:01'),
(119, 115, 286, '2021-11-16 23:14:01', '2021-11-16 23:14:01', NULL),
(120, 118, 286, '2021-11-16 23:14:28', '2021-11-16 23:15:14', '2021-11-16 23:15:14'),
(121, 116, 286, '2021-11-16 23:15:03', '2021-11-16 23:16:50', '2021-11-16 23:16:50'),
(122, 119, 286, '2021-11-16 23:15:28', '2021-11-16 23:15:33', '2021-11-16 23:15:33'),
(123, 117, 286, '2021-11-16 23:15:34', '2021-11-16 23:17:13', '2021-11-16 23:17:13'),
(124, 119, 286, '2021-11-16 23:16:49', '2021-11-16 23:16:49', NULL),
(125, 73, 286, '2021-11-16 23:19:27', '2021-11-16 23:19:27', NULL),
(126, 106, 286, '2021-11-16 23:20:00', '2021-11-16 23:20:04', '2021-11-16 23:20:04'),
(127, 106, 286, '2021-11-16 23:20:20', '2021-11-16 23:20:26', '2021-11-16 23:20:26'),
(128, 120, 286, '2021-11-16 23:20:27', '2021-11-16 23:20:33', '2021-11-16 23:20:33'),
(129, 105, 286, '2021-11-16 23:20:37', '2021-11-16 23:20:37', NULL),
(130, 106, 286, '2021-11-16 23:20:42', '2021-11-16 23:20:47', '2021-11-16 23:20:47'),
(131, 120, 286, '2021-11-16 23:20:42', '2021-11-16 23:20:52', '2021-11-16 23:20:52'),
(132, 107, 286, '2021-11-16 23:21:03', '2021-11-16 23:21:10', '2021-11-16 23:21:10'),
(133, 110, 286, '2021-11-16 23:21:06', '2021-11-16 23:21:10', '2021-11-16 23:21:10'),
(134, 106, 286, '2021-11-16 23:21:09', '2021-11-16 23:21:14', '2021-11-16 23:21:14'),
(135, 120, 286, '2021-11-16 23:21:10', '2021-11-16 23:21:18', '2021-11-16 23:21:18'),
(136, 107, 286, '2021-11-16 23:21:14', '2021-11-16 23:21:32', '2021-11-16 23:21:32'),
(137, 110, 286, '2021-11-16 23:21:14', '2021-11-16 23:21:32', '2021-11-16 23:21:32'),
(138, 106, 286, '2021-11-16 23:21:32', '2021-11-16 23:21:37', '2021-11-16 23:21:37'),
(139, 107, 286, '2021-11-16 23:21:37', '2021-11-16 23:21:49', '2021-11-16 23:21:49'),
(140, 110, 286, '2021-11-16 23:21:37', '2021-11-16 23:21:49', '2021-11-16 23:21:49'),
(141, 109, 286, '2021-11-16 23:21:45', '2021-11-16 23:21:49', '2021-11-16 23:21:49'),
(142, 106, 286, '2021-11-16 23:21:49', '2021-11-16 23:21:52', '2021-11-16 23:21:52'),
(143, 107, 286, '2021-11-16 23:21:56', '2021-11-16 23:22:06', '2021-11-16 23:22:06'),
(144, 109, 286, '2021-11-16 23:21:56', '2021-11-16 23:22:10', '2021-11-16 23:22:10'),
(145, 110, 286, '2021-11-16 23:21:56', '2021-11-16 23:22:10', '2021-11-16 23:22:10'),
(146, 106, 286, '2021-11-16 23:21:59', '2021-11-16 23:23:56', '2021-11-16 23:23:56'),
(147, 109, 286, '2021-11-16 23:22:15', '2021-11-16 23:22:32', '2021-11-16 23:22:32'),
(148, 110, 286, '2021-11-16 23:22:15', '2021-11-16 23:22:32', '2021-11-16 23:22:32'),
(149, 109, 286, '2021-11-16 23:22:36', '2021-11-16 23:22:43', '2021-11-16 23:22:43'),
(150, 110, 286, '2021-11-16 23:22:36', '2021-11-16 23:22:43', '2021-11-16 23:22:43'),
(151, 109, 286, '2021-11-16 23:22:49', '2021-11-16 23:23:07', '2021-11-16 23:23:07'),
(152, 110, 286, '2021-11-16 23:22:49', '2021-11-16 23:23:07', '2021-11-16 23:23:07'),
(153, 109, 286, '2021-11-16 23:23:12', '2021-11-16 23:23:20', '2021-11-16 23:23:20'),
(154, 110, 286, '2021-11-16 23:23:13', '2021-11-16 23:23:21', '2021-11-16 23:23:21'),
(155, 109, 286, '2021-11-16 23:23:26', '2021-11-16 23:23:28', '2021-11-16 23:23:28'),
(156, 110, 286, '2021-11-16 23:23:26', '2021-11-16 23:23:37', '2021-11-16 23:23:37'),
(157, 109, 286, '2021-11-16 23:23:31', '2021-11-16 23:23:44', '2021-11-16 23:23:44'),
(158, 110, 286, '2021-11-16 23:23:44', '2021-11-16 23:23:54', '2021-11-16 23:23:54'),
(159, 109, 286, '2021-11-16 23:23:48', '2021-11-16 23:24:00', '2021-11-16 23:24:00'),
(160, 106, 286, '2021-11-16 23:23:59', '2021-11-16 23:24:04', '2021-11-16 23:24:04'),
(161, 110, 286, '2021-11-16 23:24:00', '2021-11-16 23:24:10', '2021-11-16 23:24:10'),
(162, 109, 286, '2021-11-16 23:24:04', '2021-11-16 23:24:15', '2021-11-16 23:24:15'),
(163, 106, 286, '2021-11-16 23:24:15', '2021-11-16 23:24:19', '2021-11-16 23:24:19'),
(164, 110, 286, '2021-11-16 23:24:15', '2021-11-16 23:24:23', '2021-11-16 23:24:23'),
(165, 109, 286, '2021-11-16 23:24:19', '2021-11-16 23:24:29', '2021-11-16 23:24:29'),
(166, 106, 286, '2021-11-16 23:24:29', '2021-11-16 23:24:33', '2021-11-16 23:24:33'),
(167, 110, 286, '2021-11-16 23:24:29', '2021-11-16 23:24:39', '2021-11-16 23:24:39'),
(168, 109, 286, '2021-11-16 23:24:33', '2021-11-16 23:24:44', '2021-11-16 23:24:44'),
(169, 106, 286, '2021-11-16 23:24:44', '2021-11-16 23:24:50', '2021-11-16 23:24:50'),
(170, 110, 286, '2021-11-16 23:24:44', '2021-11-16 23:24:53', '2021-11-16 23:24:53'),
(171, 109, 286, '2021-11-16 23:24:50', '2021-11-16 23:24:59', '2021-11-16 23:24:59'),
(172, 106, 286, '2021-11-16 23:24:58', '2021-11-16 23:25:07', '2021-11-16 23:25:07'),
(173, 110, 286, '2021-11-16 23:24:59', '2021-11-16 23:25:13', '2021-11-16 23:25:13'),
(174, 109, 286, '2021-11-16 23:25:07', '2021-11-16 23:25:32', '2021-11-16 23:25:32'),
(175, 106, 286, '2021-11-16 23:25:31', '2021-11-16 23:25:34', '2021-11-16 23:25:34'),
(176, 110, 286, '2021-11-16 23:25:32', '2021-11-16 23:25:37', '2021-11-16 23:25:37'),
(177, 109, 286, '2021-11-16 23:25:34', '2021-11-16 23:25:41', '2021-11-16 23:25:41'),
(178, 106, 286, '2021-11-16 23:25:41', '2021-11-16 23:25:41', NULL),
(179, 110, 286, '2021-11-16 23:25:41', '2021-11-16 23:25:41', NULL),
(180, 101, 234, '2021-11-17 01:05:47', '2021-11-17 01:05:47', NULL),
(181, 112, 268, '2021-11-17 17:45:29', '2021-11-17 17:45:29', NULL),
(182, 116, 268, '2021-11-17 18:53:00', '2021-11-17 18:53:00', NULL),
(183, 117, 268, '2021-11-17 18:53:03', '2021-11-17 18:53:03', NULL),
(184, 118, 268, '2021-11-17 18:53:06', '2021-11-17 18:53:06', NULL),
(185, 119, 268, '2021-11-17 18:53:11', '2021-11-17 18:53:11', NULL),
(186, 115, 268, '2021-11-17 18:58:50', '2021-11-17 18:58:50', NULL),
(187, 103, 234, '2021-11-17 21:05:18', '2021-11-17 21:05:18', NULL),
(188, 89, 234, '2021-11-17 23:51:02', '2021-11-17 23:51:15', '2021-11-17 23:51:15'),
(189, 73, 234, '2021-11-17 23:53:02', '2021-11-18 17:43:46', '2021-11-18 17:43:46'),
(190, 87, 234, '2021-11-18 00:09:57', '2021-11-18 00:09:57', NULL),
(191, 52, 268, '2021-11-18 00:28:50', '2021-11-18 02:51:14', '2021-11-18 02:51:14'),
(192, 51, 268, '2021-11-18 02:51:31', '2021-11-18 02:51:34', '2021-11-18 02:51:34'),
(193, 51, 268, '2021-11-18 17:10:35', '2021-11-18 17:10:41', '2021-11-18 17:10:41'),
(194, 106, 234, '2021-11-18 17:43:35', '2021-11-18 17:43:36', '2021-11-18 17:43:36'),
(195, 120, 234, '2021-11-18 17:43:35', '2021-11-18 17:43:36', '2021-11-18 17:43:36'),
(196, 106, 234, '2021-11-18 17:43:37', '2021-11-18 17:43:39', '2021-11-18 17:43:39'),
(197, 120, 234, '2021-11-18 17:43:37', '2021-11-18 17:43:39', '2021-11-18 17:43:39'),
(198, 106, 234, '2021-11-18 17:43:42', '2021-11-18 17:43:43', '2021-11-18 17:43:43'),
(199, 120, 234, '2021-11-18 17:43:42', '2021-11-18 17:43:43', '2021-11-18 17:43:43'),
(200, 106, 234, '2021-11-18 17:43:45', '2021-11-18 17:43:45', '2021-11-18 17:43:45'),
(201, 120, 234, '2021-11-18 17:43:45', '2021-11-18 17:43:46', '2021-11-18 17:43:46'),
(202, 120, 234, '2021-11-18 17:43:51', '2021-11-18 17:44:28', '2021-11-18 17:44:28'),
(203, 120, 234, '2021-11-18 17:44:42', '2021-11-18 17:44:45', '2021-11-18 17:44:45'),
(204, 120, 234, '2021-11-18 17:44:50', '2021-11-18 17:44:50', NULL),
(205, 108, 234, '2021-11-18 19:27:57', '2021-11-18 19:27:57', NULL),
(206, 83, 268, '2021-11-18 23:17:23', '2021-11-18 23:17:23', NULL),
(207, 81, 268, '2021-11-18 23:17:26', '2021-11-18 23:17:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fav_services`
--

DROP TABLE IF EXISTS `fav_services`;
CREATE TABLE IF NOT EXISTS `fav_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fav_services`
--

INSERT INTO `fav_services` (`id`, `service_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 29, 3, '2022-02-28 12:52:36', '2022-02-28 12:52:36', NULL),
(2, 32, 2, '2022-03-06 04:15:53', '2022-03-06 04:15:53', NULL),
(3, 30, 3, '2022-03-06 18:11:12', '2022-03-06 18:11:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `first_splash`
--

DROP TABLE IF EXISTS `first_splash`;
CREATE TABLE IF NOT EXISTS `first_splash` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `first_splash`
--

INSERT INTO `first_splash` (`id`, `icon`, `image`, `app_name_ar`, `description_ar`, `app_name_en`, `description_en`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1624195065.png', '1624195065.png', 'اسم عربي', 'وصف عربي', 'Name Emglish ', 'EatUp Application  update', 1, '2021-06-07 06:52:40', '2021-06-24 09:03:25', NULL),
(3, '1624195243.png', '1624195243.png', 'Jayme Beard', 'Voluptatem neque del', NULL, 'Lorem est voluptate', 0, '2021-06-20 12:19:49', '2021-06-20 12:20:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `general_questions`
--

DROP TABLE IF EXISTS `general_questions`;
CREATE TABLE IF NOT EXISTS `general_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_ar` text,
  `answer_ar` longtext,
  `question_en` longtext,
  `answer_en` longtext,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `general_questions`
--

INSERT INTO `general_questions` (`id`, `question_ar`, `answer_ar`, `question_en`, `answer_en`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'السؤال 1 test', 'الجواب 1الجواب 1الجواب 1الجواب 1الجواب 1الجواب 1الجواب 1الجواب 1الجواب 1الجواب 1الجواب 1الجواب 1الجواب 1الجواب 1الجواب 1الجواب 1الجواب 1الجواب 1الجواب 1الجواب 1الجواب 1الجواب 1الجواب 1الجواب 1الجواب 1الجواب 1الجواب 1الجواب 1الجواب 1الجواب 1الجواب 1الجواب 1الجواب 1الجواب 1الجواب 1الجواب 1الجواب 1الجواب 1الجواب 1الجواب 1 test الجواب 1الجواب 1الجواب 1الجواب 1', 'question1question1', 'answer 1answer 1answer 1answer 1answer 1answer 1answer 1answer 1answer 1answer 1answer 1answer 1answer 1answer 1answer 1answer', '2021-11-16 10:11:55', '2022-03-02 16:38:51', NULL),
(2, 'السؤال 2', 'الجواب 2', 'question2', 'answer 2', '2021-11-16 10:11:55', NULL, NULL),
(3, 'السؤال 3', 'الجواب 3', 'question3', 'answer 3', '2021-11-16 10:11:55', '2022-02-09 14:29:26', '2022-02-09 14:29:26'),
(4, 'السؤال 4', 'الجواب 4', 'question4', 'answer 4', '2021-11-16 10:11:55', '2022-02-09 14:29:13', '2022-02-09 14:29:13'),
(5, 'In eiusmod duis labo', 'Expedita reiciendis', 'Ut itaque in praesen', 'Alias dolore exercit', '2022-02-09 15:18:01', '2022-02-09 15:18:01', NULL),
(6, 'Doloribus eiusmod es', 'Nihil libero expedit', 'Et provident illum', 'Eos excepturi vero', '2022-02-09 15:22:52', '2022-02-09 15:22:52', NULL),
(7, 'Quia proident commo', 'Vel laborum perspici', 'Qui enim doloremque', 'Odit consectetur do', '2022-02-09 15:24:01', '2022-02-09 15:24:10', '2022-02-09 15:24:10');

-- --------------------------------------------------------

--
-- Table structure for table `home_slider`
--

DROP TABLE IF EXISTS `home_slider`;
CREATE TABLE IF NOT EXISTS `home_slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_1_ar` text,
  `title_1_en` text,
  `title_2_ar` text,
  `title_2_en` text,
  `description_1_ar` text,
  `description_1_en` text,
  `description_2_ar` text,
  `description_2_en` text,
  `image` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `home_slider`
--

INSERT INTO `home_slider` (`id`, `title_1_ar`, `title_1_en`, `title_2_ar`, `title_2_en`, `description_1_ar`, `description_1_en`, `description_2_ar`, `description_2_en`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'title_1_ar update', 'update title_1_en', 'update title_2_ar', 'update title_2_en', 'update description_1_ar', 'update description_1_en', 'update description_2_ar', 'update description_2_en', '98ae3010b79e86f16dd25dd1a4a306f9.jpeg', '2021-11-16 11:20:54', '2022-02-09 17:52:55', NULL),
(2, 'title_1_ar', 'title_1_en', 'title_2_ar', 'title_2_en', 'description_1_ar', 'description_1_en', 'description_2_ar', 'description_2_en', '6337-4.jpg', '2021-11-16 11:20:54', '2022-02-09 17:52:59', NULL),
(3, 'title_1_ar', 'title_1_en', 'title_2_ar', 'title_2_en', 'description_1_ar', 'description_1_en', 'description_2_ar', 'description_2_en', '6337-4.jpg', '2021-11-16 11:20:54', '2022-02-09 17:53:02', NULL),
(4, 'title_1_ar', 'title_1_en', 'title_2_ar', 'title_2_en', 'description_1_ar', 'description_1_en', 'description_2_ar', 'description_2_en', '6337-4.jpg', '2021-11-16 11:20:54', '2022-02-09 16:48:21', '2022-02-09 16:48:21'),
(7, 'Eaque do magnam quae', 'Elit aut eos qui d', 'Dolore est modi ali', 'Cum ut est vel natu', 'Minim blanditiis del', 'Reiciendis ad accusa', 'Accusamus mollit ame', 'Ipsam laboriosam bl', '4a141ca967b83c3157ceb13c32382cba.jpeg', '2022-02-09 17:23:40', '2022-02-09 17:51:25', '2022-02-09 17:51:25');

-- --------------------------------------------------------

--
-- Table structure for table `labels`
--

DROP TABLE IF EXISTS `labels`;
CREATE TABLE IF NOT EXISTS `labels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `screen_id` int(11) NOT NULL,
  `language_id` int(4) NOT NULL,
  `label_id` varchar(60) DEFAULT NULL,
  `label_text_en` varchar(1000) DEFAULT NULL,
  `label_text_automated` varchar(1000) DEFAULT NULL,
  `label_text_override` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `language_id` (`language_id`),
  KEY `screen_id` (`screen_id`)
) ENGINE=InnoDB AUTO_INCREMENT=279 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `labels`
--

INSERT INTO `labels` (`id`, `screen_id`, `language_id`, `label_id`, `label_text_en`, `label_text_automated`, `label_text_override`) VALUES
(1, 1, 1, 'english', 'English', 'انجليزية', NULL),
(2, 1, 2, 'english', 'English', 'English', NULL),
(3, 1, 2, 'communicate_with_service', 'Communicate with service owners and get the best quality service\r\n', 'Communicate with service owners and get the best quality service\r\n', NULL),
(4, 1, 1, 'communicate_with_service', 'Communicate with service owners and get the best quality service\r\n', 'تواصل مع أصحاب الخدمات واحصل على خدمة بأفضل جودة\r\n', NULL),
(5, 1, 1, 'here_you_will_find_freelance_services', 'Here you will find freelance services similar to your request\r\n', 'هنا تجد خدمات العمل الحر المماثلة لطلبك\r\n', NULL),
(6, 1, 2, 'here_you_will_find_freelance_services', 'Here you will find freelance services similar to your request\r\n', 'Here you will find freelance services similar to your request\r\n', NULL),
(7, 1, 2, 'search', 'Search', 'Search', NULL),
(8, 1, 1, 'search', 'Search', 'ابحث', NULL),
(9, 1, 1, 'most_wanted', 'most wanted\r\n', 'الأكثر طلبا', NULL),
(10, 1, 2, 'most_wanted', 'most wanted\r\n', 'Most Popular\n', NULL),
(11, 1, 1, 'whole_world_of_premium_services', 'A whole world of premium services at your fingertips', 'عالم كامل من أصحاب الخدمات المميزة في متناول يدك\r\n', NULL),
(12, 1, 2, 'whole_world_of_premium_services', 'A whole world of premium services at your fingertips', 'A whole world of premium services at your fingertips', NULL),
(13, 1, 1, 'guaranteed_payment_method', 'Guaranteed payment method', 'طريقة دفع مضمونة', NULL),
(14, 1, 2, 'guaranteed_payment_method', 'Guaranteed payment method', 'Guaranteed payment method', NULL),
(15, 1, 1, 'dont_pay_until_you_agree_to_work', 'Don\'t pay until you agree to work', 'لا تدفع حتى توافق على العمل', NULL),
(16, 1, 2, 'dont_pay_until_you_agree_to_work', 'Don\'t pay until you agree to work', 'Don\'t pay until you agree to work', NULL),
(17, 1, 1, 'get_your_work_done_quickly', 'Get your work done quickly', 'انجز أعمالك بسرعه', NULL),
(18, 1, 2, 'get_your_work_done_quickly', 'Get your work done quickly', 'Get your work done quickly', NULL),
(19, 1, 1, 'choose_the_right_freelancer_to_get', 'Choose the right freelancer to get your work done quickly\r\n', ' اختر المستقل المناسب لإنجاز عملك في أسرع وقت', NULL),
(20, 1, 2, 'choose_the_right_freelancer_to_get', 'Choose the right freelancer to get your work done quickly\r\n', 'Choose the right freelancer to get your work done quickly\r\n', NULL),
(21, 1, 1, 'implement_your_projects', 'Implement your projects at lower costs', 'نفذ مشاريعك بتكاليف أقل', NULL),
(22, 1, 2, 'implement_your_projects', 'Implement your projects at lower costs', 'Implement your projects at lower costs', NULL),
(23, 1, 1, 'choose_your_service_according', 'Choose your service according to your budget\r\n', 'اختر خدمتك بما يتناسب مع ميزانيتك', NULL),
(24, 1, 2, 'choose_your_service_according', 'Choose your service according to your budget\r\n', 'Choose your service according to your budget\r\n', NULL),
(25, 1, 2, 'service_sections', 'Service Sections', 'Service Sections', NULL),
(26, 1, 1, 'service_sections', 'Service Sections', 'أقسام الخدمات', NULL),
(27, 1, 1, 'service_models', 'Service models', 'نماذج خدمات', NULL),
(28, 1, 2, 'service_models', 'Service models\r\n\r\n\r\n', 'Service models', NULL),
(29, 1, 2, 'find_the_talent_needed_to_grow', 'Find the talent needed to grow your business\r\n', 'Find the talent needed to grow your business\r\n', NULL),
(30, 1, 1, 'find_the_talent_needed_to_grow', 'Find the talent needed to grow your business\r\n', 'ابحث عن الموهبة اللازمة لتنمية أعمالك', NULL),
(31, 1, 1, 'start_now', 'Start Now', 'ابدأ الآن', NULL),
(32, 1, 2, 'start_now', 'Start Now', 'Start Now', NULL),
(33, 1, 1, 'about_us', 'About Us\n', 'من نحن\r\n', NULL),
(34, 1, 2, 'about_us', 'About Us\n', 'About Us\n', NULL),
(35, 1, 1, 'privacy_policy', 'Privacy policy\r\n', ' سياسة الخصوصية', NULL),
(36, 1, 2, 'privacy_policy', 'Privacy policy\r\n', 'Privacy policy\r\n', NULL),
(37, 1, 1, 'terms_conditions', 'Terms and Conditions\r\n', 'الشروط و الأحكام', NULL),
(38, 1, 2, 'terms_conditions', 'Terms and Conditions\r\n', 'Terms and Conditions\r\n', NULL),
(39, 1, 1, 'contact_us', 'Contact Us\r\n', 'تواصل معنا\r\n', NULL),
(40, 1, 2, 'contact_us', 'Contact Us\r\n', 'Contact Us\r\n', NULL),
(41, 1, 1, 'service_owner', 'Service Owners\n', 'صاحب خدمة', NULL),
(42, 1, 2, 'service_owner', 'Service Owners\n', 'Service Owners\n', NULL),
(43, 1, 1, 'common_questions', 'Frequently Asked Questions\n', 'الأسئلة الشائعة', NULL),
(44, 1, 2, 'common_questions', 'Frequently Asked Questions\n', 'Frequently Asked Questions\n', NULL),
(45, 1, 1, 'subscribe', 'Join Us\n', 'اشترك معنا\r\n', NULL),
(46, 1, 2, 'subscribe', 'Join Us', 'Join Us', NULL),
(47, 1, 1, 'proposals', 'Proposals', 'مقترحات', NULL),
(48, 1, 2, 'proposals', 'Proposals', 'Proposals', NULL),
(49, 1, 1, 'rights_reserved', 'All rights reserved', 'كل الحقوق محفوظة', NULL),
(50, 1, 2, 'rights_reserved', 'All rights reserved', 'All rights reserved', NULL),
(51, 1, 1, 'entrepreneur', 'Service Buyers\n', 'صاحب مشروع\r\n', NULL),
(52, 1, 2, 'entrepreneur', 'Service Buyers\n', 'Service Buyers\n', NULL),
(53, 1, 1, 'login', 'Login', 'تسجيل دخول', NULL),
(54, 1, 2, 'login', 'Login', 'Login', NULL),
(55, 1, 1, 'or', 'OR', 'أو', NULL),
(56, 1, 2, 'or', 'OR', 'OR', NULL),
(57, 1, 1, 'forgot_pass', 'Forgot password?', 'نسيت كلمة المرور؟\r\n', NULL),
(58, 1, 2, 'forgot_pass', 'Forgot password?', 'Forgot password?', NULL),
(59, 1, 1, 'remember', 'remember', 'تذكرني', NULL),
(60, 1, 2, 'remember', 'remember', 'remember', NULL),
(61, 1, 1, 'dont_have_account', 'I dont have an account?', 'ليس لدي حساب؟', NULL),
(62, 1, 2, 'dont_have_account', 'I dont have an account?', 'I dont have an account?', NULL),
(63, 1, 2, 'create_accont', 'Create Account', 'Create Account', NULL),
(64, 1, 1, 'create_accont', 'Create Account', 'انشاء حساب', NULL),
(65, 1, 1, 'joining_means_agreeing_to', 'Joining means agreeing to', 'انضمامي يعني الموافقة على', NULL),
(66, 1, 2, 'joining_means_agreeing_to', 'Joining means agreeing to', 'Joining means agreeing to', NULL),
(67, 1, 2, 'have_account', 'have account? ', 'have account? ', NULL),
(68, 1, 1, 'have_account', 'have account? ', 'لدي حساب؟', NULL),
(69, 1, 1, 'service_details', 'Service Details', 'تفاصيل الخدمة', NULL),
(70, 1, 2, 'service_details', 'Service Details', 'Service Details', NULL),
(71, 1, 1, 'welcome', 'Welcome,', 'أهلاً بك أستاذ/ة', NULL),
(72, 1, 2, 'welcome', 'Welcome,', 'Welcome,', NULL),
(73, 1, 1, 'get_the_service_you_want', 'Find the service owner you\'re looking for!\n', 'احصل على الخدمة التي تريدها من أصحاب خدمات مميزين هنا\r\n', NULL),
(74, 1, 2, 'get_the_service_you_want', 'Find the service owner you\'re looking for!\n', 'Find the service owner you\'re looking for!\n', NULL),
(75, 1, 1, 'latest_services', 'Latest Services', 'أحدث الخدمات', NULL),
(76, 1, 2, 'latest_services', 'Latest Services', 'Latest Services', NULL),
(77, 1, 1, 'services_you_may_like', 'Services you may like', 'خدمات قد تعجبك', NULL),
(78, 1, 2, 'services_you_may_like', 'Services you may like', 'Services you may like', NULL),
(79, 1, 1, 'be_a_service_owner', 'Are you a service owner?', 'كن صاحب خدمة؟', NULL),
(80, 1, 2, 'be_a_service_owner', 'Are you a service owner?', 'Are you a service owner?', NULL),
(81, 1, 1, 'settings', 'settings', 'الاعدادات', NULL),
(82, 1, 2, 'settings', 'settings', 'settings', NULL),
(83, 1, 2, 'help', 'Help', 'Help', NULL),
(84, 1, 1, 'help', 'Help', 'مساعدة', NULL),
(85, 1, 1, 'logout', 'Logout', 'تسجيل خروج', NULL),
(86, 1, 2, 'logout', 'Logout', 'Logout', NULL),
(87, 1, 2, 'service_models', 'Service models\r\n', 'Service models\r\n', NULL),
(88, 1, 1, 'service_models', 'Service models\r\n', 'نماذج الخدمات\r\n', NULL),
(89, 1, 2, 'description', 'Description', 'Description', NULL),
(90, 1, 1, 'description', 'Description', 'نبذة عني', NULL),
(91, 1, 2, 'date_registration', 'Member since\n', 'Member since\n', NULL),
(92, 1, 1, 'date_registration', 'Member since\n', 'تاريخ التسجيل\r\n', NULL),
(93, 1, 1, 'last_seen', 'last seen\r\n', 'اخر تواجد', NULL),
(94, 1, 2, 'last_seen', 'last seen\r\n', 'last seen\r\n', NULL),
(95, 1, 1, 'rate', 'Rate', 'التقييم', NULL),
(96, 1, 2, 'rate', 'Rate', 'Rate', NULL),
(97, 1, 1, 'skills', 'Skills', 'مهاراتي', NULL),
(98, 1, 2, 'skills', 'Skills', 'Skills', NULL),
(99, 1, 2, 'languages', 'Languages', 'Languages', NULL),
(100, 1, 1, 'languages', 'Languages', 'اللغات', NULL),
(101, 1, 2, 'education', 'Education', 'Education', NULL),
(102, 1, 1, 'education', 'Education', 'التعليم', NULL),
(103, 1, 2, 'watch_video', 'Watch video', 'Watch video', NULL),
(104, 1, 1, 'watch_video', 'Watch video', 'شاهد الفيديو', NULL),
(105, 1, 2, 'purchases', 'Purchases', 'Purchases', NULL),
(106, 1, 1, 'purchases', 'Purchases', 'المشتريات', NULL),
(107, 1, 2, 'incoming_orders', 'Incoming orders', 'Incoming orders', NULL),
(108, 1, 1, 'incoming_orders', 'Incoming orders', 'الطلبات الواردة', NULL),
(109, 1, 2, 'add_service', 'add service', 'add service', NULL),
(110, 1, 1, 'add_service', 'add service', 'أضف خدمة', NULL),
(111, 1, 2, 'common_questions_footer', 'FAQ', 'FAQ', NULL),
(112, 1, 1, 'common_questions_footer', 'FAQ', 'الاسئلة الشائعة', NULL),
(113, 1, 2, 'seller_rate', 'Seller\'s rating\r\n', 'Seller\'s rating\r\n', NULL),
(114, 1, 1, 'seller_rate', 'Seller\'s rating\r\n', 'تقييم البائع', NULL),
(115, 1, 2, 'edit_profile', 'Edit Profile', 'Edit Profile', NULL),
(116, 1, 1, 'edit_profile', 'Edit Profile', 'تعديل الملف الشخصي', NULL),
(117, 1, 2, 'name', 'Name', 'Name', NULL),
(118, 1, 1, 'name', 'Name', 'الاسم', NULL),
(119, 1, 2, 'job', 'Job', 'Job', NULL),
(120, 1, 1, 'job', 'Job', 'الوظيفة', NULL),
(121, 1, 2, 'skills', 'Skills', 'Skills', NULL),
(122, 1, 1, 'skills', 'Skills', 'مهاراتي', NULL),
(123, 1, 2, 'university', 'University', 'University', NULL),
(124, 1, 1, 'university', 'University', 'الجامعة', NULL),
(125, 1, 2, 'graduation_date', 'Graduation Date', 'Graduation Date', NULL),
(126, 1, 1, 'graduation_date', 'Graduation Date', 'تاريخ التخرج', NULL),
(127, 1, 2, 'about', 'About', 'About', NULL),
(128, 1, 1, 'about', 'About', 'نبذة عني', NULL),
(129, 1, 2, 'country', 'Country', 'Country', NULL),
(130, 1, 1, 'country', 'Country', 'الدولة', NULL),
(131, 1, 2, 'personal_photo', 'Personal photo', 'Personal photo', NULL),
(132, 1, 1, 'personal_photo', 'Personal photo', 'الصورة الشخصية', NULL),
(133, 1, 2, 'scientific_certificate', 'Scientific certificate', 'Scientific certificate', NULL),
(134, 1, 1, 'scientific_certificate', 'Scientific certificate', 'الشهادة العلمية', NULL),
(135, 1, 1, 'education', 'Education', 'التعليم', NULL),
(136, 1, 2, 'education', 'Education', 'Education', NULL),
(137, 1, 2, 'update', 'update', 'update', NULL),
(138, 1, 1, 'update', 'update', 'تحديث', NULL),
(139, 1, 2, 'service_rating', 'Service Rating', 'Service Rating', NULL),
(140, 1, 1, 'service_rating', 'Service Rating', 'تقييم الخدمة', NULL),
(141, 1, 2, 'additional_services', 'Additional Services', 'Additional Services', NULL),
(142, 1, 1, 'additional_services', 'Additional Services', 'خدمات اضافية', NULL),
(143, 1, 2, 'buyers_reviews', 'Buyers Reviews', 'Buyers Reviews', NULL),
(144, 1, 1, 'buyers_reviews', 'Buyers Reviews', 'آراء المشترين', NULL),
(145, 1, 1, 'add_to_cart', 'Add to cart', 'اضافة الى السلة', NULL),
(146, 1, 2, 'add_to_cart', 'Add to cart', 'Add to cart', NULL),
(147, 1, 2, 'number_times', 'number of times', 'number of times', NULL),
(148, 1, 1, 'number_times', 'number of times', 'عدد المرات', NULL),
(149, 1, 2, 'some_help', 'Some help', 'Some help', NULL),
(150, 1, 1, 'some_help', 'Some help', 'بعض التعليمات', NULL),
(151, 1, 2, 'attachment', 'Attachment', 'Attachment', NULL),
(152, 1, 1, 'attachment', 'Attachment', 'مرفق', NULL),
(153, 1, 2, 'keywords', 'Keywords', 'Keywords', NULL),
(154, 1, 1, 'keywords', 'Keywords', 'كلمات مفتاحية', NULL),
(155, 1, 2, 'suggested_services', 'Suggested Services', 'Suggested Services', NULL),
(156, 1, 1, 'suggested_services', 'Suggested Services', 'خدمات مقترحة', NULL),
(157, 1, 2, 'contact_service_owner', 'Contact with service owner', 'Contact with service owner', NULL),
(158, 1, 1, 'contact_service_owner', 'Contact with service owner', 'تواصل مع صاحب الخدمة', NULL),
(159, 1, 1, 'response_speed', 'Response speed', 'م.سرعة الرد', NULL),
(160, 1, 2, 'response_speed', 'Response speed', 'Response speed', NULL),
(161, 1, 2, 'hours', 'hours', 'hours', NULL),
(162, 1, 1, 'hours', 'hours', 'ساعات', NULL),
(163, 1, 1, 'message_to', 'message to', 'رسالة الى ', NULL),
(164, 1, 2, 'message_to', 'message to', 'message to', NULL),
(165, 1, 2, 'service', 'Service', 'Service', NULL),
(166, 1, 1, 'service', 'Service', 'الخدمة', NULL),
(167, 1, 2, 'message_content', 'Message content', 'Message content', NULL),
(168, 1, 1, 'message_content', 'Message content', 'محتوى الرسالة', NULL),
(169, 1, 2, 'ask_service_owner', 'Ask the service provider what you want to know about this service. It is forbidden to put external means of communication', 'Ask the service provider what you want to know about this service. It is forbidden to put external means of communication', NULL),
(170, 1, 1, 'ask_service_owner', 'Ask the service provider what you want to know about this service. It is forbidden to put external means of communication', 'اسأل مقدم الخدمة ما تريد معرفته عن هذه الخدمة. يمنع وضع وسائل تواصل خارجية\r\n', NULL),
(171, 1, 2, 'remaining', 'remaining', 'remaining', NULL),
(172, 1, 1, 'remaining', 'remaining', 'متبقي', NULL),
(173, 1, 2, 'message_does_not_contain', 'This message does not contain external means of communication and I send it because I want to purchase the offered service', 'This message does not contain external means of communication and I send it because I want to purchase the offered service', NULL),
(174, 1, 1, 'message_does_not_contain', 'This message does not contain external means of communication and I send it because I want to purchase the offered service', 'هذه الرسالة لا تحتوي على وسائل تواصل خارجية وأرسلها لأني أرغب بشراء الخدمة المعروضة', NULL),
(175, 1, 1, 'I_checked', 'I checked', 'لقد راجعت', NULL),
(176, 1, 2, 'I_checked', 'I checked', 'I checked', NULL),
(177, 1, 2, 'this_message', 'This message does not contradict it', 'This message does not contradict it', NULL),
(178, 1, 1, 'this_message', 'This message does not contradict it', ' وهذه الرسالة لا تخالفها بشيء', NULL),
(179, 1, 2, 'send_message', 'send message', 'send message', NULL),
(180, 1, 1, 'send_message', 'send message', 'ارسال الرسالة', NULL),
(181, 1, 2, 'all_chats', 'All Chats', 'All Chats', NULL),
(182, 1, 1, 'all_chats', 'All Chats', 'جميع المحادثات', NULL),
(183, 1, 2, 'add_new_service', 'Add a new service\r\n', 'Add a new service\r\n', NULL),
(184, 1, 1, 'add_new_service', 'Add a new service\r\n', 'أضف خدمة جديدة\r\n', NULL),
(185, 1, 2, 'service_title', 'Service title', 'Service title', NULL),
(186, 1, 1, 'service_title', 'Service title', 'عنوان الخدمة', NULL),
(187, 1, 2, 'category', 'Category', 'Category', NULL),
(188, 1, 1, 'category', 'Category', 'التصنيف', NULL),
(189, 1, 2, 'choose_section', 'Choose section', 'Choose section', NULL),
(190, 1, 1, 'choose_section', 'Choose section', 'اختر القسم', NULL),
(191, 1, 1, 'enter_accurate_service_description', 'Enter an accurate service description. Make sure you include all necessary details. Including external means of communication is strictly prohibited.\r\n', 'أدخل وصف الخدمة بدقة يتضمن جميع المعلومات والشروط . يمنع وضع البريد الالكتروني، رقم الهاتف أو أي معلومات اتصال أخرى', NULL),
(192, 1, 2, 'enter_accurate_service_description', 'Enter an accurate service description. Make sure you include all necessary details. Including external means of communication is strictly prohibited.\r\n', 'Enter an accurate service description. Make sure you include all necessary details. Including external means of communication is strictly prohibited.\r\n', NULL),
(193, 1, 1, 'delivery_time', 'Delivery time', 'مدة التسليم (يوم)', NULL),
(194, 1, 2, 'delivery_time', 'Delivery time', 'Delivery time', NULL),
(195, 1, 2, 'price', 'Price', 'Price', NULL),
(196, 1, 1, 'price', 'Price', 'السعر', NULL),
(197, 1, 1, 'instructions_service_buyer', 'Instructions for service buyer', 'تعليمات للمشتري', NULL),
(198, 1, 2, 'instructions_service_buyer', 'Instructions for service buyer', 'Instructions for service buyer', NULL),
(199, 1, 1, 'details_client_should_provide', 'Specify what details the client should provide you with before starting the project.\r\n', 'المعلومات التي تحتاجها من المشتري لتنفيذ الخدمة. تظهر هذه المعلومات بعد شراء الخدمة فقط', NULL),
(200, 1, 2, 'details_client_should_provide', 'Specify what details the client should provide you with before starting the project.\r\n', 'Specify what details the client should provide you with before starting the project.\r\n', NULL),
(201, 1, 2, 'service_gallery', 'Service Gallery\r\n', 'Service Gallery\r\n', NULL),
(202, 1, 1, 'service_gallery', 'Service Gallery\r\n', 'معرض الخدمة', NULL),
(203, 1, 1, 'gallery_notes', 'Choosing a well-designed video or image will make your service look professional and help you increase your sales.', 'اختيار فيديو أو صورة مصممة بشكل جيد ستظهر خدمتك بشكل احترافي وتزيد من مبيعاتك.', NULL),
(204, 1, 2, 'gallery_notes', 'Choosing a well-designed video or image will make your service look professional and help you increase your sales.\r\n', 'Choosing a well-designed video or image will make your service look professional and help you increase your sales.\r\n', NULL),
(205, 1, 2, 'additional_services', 'Additional services', 'Additional services', NULL),
(206, 1, 1, 'additional_services', 'Additional services', 'خدمات اضافية', NULL),
(207, 1, 2, 'service_description', 'Service description', 'Service description', NULL),
(208, 1, 1, 'service_description', 'Service description', 'وصف الخدمة', NULL),
(209, 1, 2, 'add_question', 'Add Question', 'Add Question', NULL),
(210, 1, 1, 'add_question', 'Add Question', 'اضف سؤال', NULL),
(211, 1, 1, 'add_answer', 'Add Answer', 'أضف الاجابة', NULL),
(212, 1, 2, 'add_answer', 'Add Answer', 'Add Answer', NULL),
(213, 1, 2, 'add_cost', 'cost of addition', 'cost of addition', NULL),
(214, 1, 1, 'add_cost', 'cost of addition', 'تكلفة الاضافة', NULL),
(215, 1, 2, 'same_date', 'same date', 'same date', NULL),
(216, 1, 1, 'same_date', 'same date', 'نفس الموعد', NULL),
(217, 1, 2, 'extra_date', 'extra date', 'extra date', NULL),
(218, 1, 1, 'extra_date', 'extra date', 'موعد اضافي', NULL),
(219, 1, 2, 'extra_days', 'Extra days for delivery', 'Extra days for delivery', NULL),
(220, 1, 1, 'extra_days', 'Extra days for delivery', 'عدد الايام الاضافية للتسليم', NULL),
(221, 1, 2, 'delete', 'Delete', 'Delete', NULL),
(222, 1, 1, 'delete', 'Delete', 'حذف', NULL),
(223, 1, 2, 'add_additional_service', 'add additional service', 'add additional service', NULL),
(224, 1, 1, 'add_additional_service', 'add additional service', 'أضف خدمة إضافية', NULL),
(225, 1, 2, 'add_service', 'Add Service', 'Add Service', NULL),
(226, 1, 1, 'add_service', 'Add Service', 'اضف الخدمة', NULL),
(227, 1, 2, 'settings', 'Settings', 'Settings', NULL),
(228, 1, 1, 'settings', 'Settings', 'الاعدادات', NULL),
(229, 1, 2, 'deactivate_account', 'Your profile and services will not be displayed on the site anymore', 'Your profile and services will not be displayed on the site anymore', NULL),
(230, 1, 1, 'deactivate_account', 'Your profile and services will not be displayed on the site anymore', 'لن يتم عرض ملفك الشخصي وخدماتك على الموقع بعد الآن', NULL),
(231, 1, 2, 'cancel_account', 'Cancel Account', 'Cancel Account', NULL),
(232, 1, 1, 'cancel_account', 'Cancel Account', 'الغاء الحساب', NULL),
(233, 1, 2, 'delete_account_reasone', 'Reason for account cancellation', 'Reason for account cancellation', NULL),
(234, 1, 1, 'delete_account_reasone', 'Reason for account cancellation', 'سبب الغاء الحساب\r\n', NULL),
(235, 1, 2, 'select_reason', 'Select Reason', 'Select Reason', NULL),
(236, 1, 1, 'select_reason', 'Select Reason', 'اختر السبب', NULL),
(237, 1, 2, 'i_have_another_account', 'I have another account on the site', 'I have another account on the site', NULL),
(238, 1, 1, 'i_have_another_account', 'I have another account on the site', 'لدي حساب آخر على الموقع', NULL),
(239, 1, 1, 'i_want_change_user_name', 'I want to change my username', 'أريد تغيير اسم المستخدم', NULL),
(240, 1, 2, 'i_want_change_user_name', 'I want to change my username', 'I want to change my username', NULL),
(241, 1, 1, 'i_not_getting_good_offers', 'I\'m not getting good offers', 'لا أتلقى عروض جيدة', NULL),
(242, 1, 2, 'i_not_getting_good_offers', 'I\'m not getting good offers', 'I\'m not getting good offers', NULL),
(243, 1, 1, 'site_difficult_use', 'The site is difficult to use', 'الموقع صعب استخدامه', NULL),
(244, 1, 2, 'site_difficult_use', 'The site is difficult to use', 'The site is difficult to use', NULL),
(245, 1, 1, 'site_policies_inconvenient', 'Site policies are inconvenient', 'سياسات الموقع لم تعجبني', NULL),
(246, 1, 2, 'site_policies_inconvenient', 'Site policies are inconvenient', 'Site policies are inconvenient', NULL),
(247, 1, 2, 'account', 'Account', 'Account', NULL),
(248, 1, 1, 'account', 'Account', 'حسابي', NULL),
(249, 1, 1, 'notifications', 'Notifications', 'الاشعارات', NULL),
(250, 1, 2, 'notifications', 'Notifications', 'Notifications', NULL),
(251, 1, 1, 'your_feedback', 'Write your feedback here\r\n', 'اكتب ملاحظاتك هنا\r\n', NULL),
(252, 1, 2, 'your_feedback', 'Write your feedback here\r\n', 'Write your feedback here\r\n', NULL),
(253, 1, 1, 'disable_account', 'Disable Account', 'تعطيل الحساب', NULL),
(254, 1, 2, 'disable_account', 'Disable Account', 'Disable Account', NULL),
(255, 1, 2, 'enable', 'Enable', 'Enable', NULL),
(256, 1, 1, 'enable', 'Enable', 'مفعل', NULL),
(257, 1, 1, 'not_enabled', 'Not enabled', 'غير مفعل', NULL),
(258, 1, 2, 'not_enabled', 'Not enabled', 'Not enabled', NULL),
(259, 1, 2, 'pass', 'Password', 'Password', NULL),
(260, 1, 1, 'pass', 'Password', 'كلمة المرور', NULL),
(261, 1, 1, 'email', 'Email', 'البريد الإلكتروني', NULL),
(262, 1, 2, 'email', 'Email', 'Email', NULL),
(263, 1, 2, 'username', 'User Name', 'User Name', NULL),
(264, 1, 1, 'username', 'User Name', 'اسم المستخدم', NULL),
(265, 1, 1, 'view_cart', 'View cart', 'عرض سلة المشتريات', NULL),
(266, 1, 2, 'view_cart', 'View cart', 'View cart', NULL),
(267, 1, 2, 'all_messages', 'All messages', 'All messages', NULL),
(268, 1, 1, 'all_messages', 'All messages', 'جميع الرسائل', NULL),
(269, 1, 2, 'all_notifications', 'All notifications', 'All notifications', NULL),
(270, 1, 1, 'all_notifications', 'All notifications', 'جميع الاشعارات', NULL),
(271, 1, 1, 'company_name', 'Company Name', 'اسم الشركة', NULL),
(272, 1, 2, 'company_name', 'Company Name', 'Company Name', NULL),
(273, 1, 2, 'complete_address', 'Complete Office Address', 'Complete Office Address', NULL),
(274, 1, 1, 'complete_address', 'Complete Office Address', 'عنوان الشركة الكامل', NULL),
(275, 1, 1, 'contact_nu', 'Contact Number', 'رقم الاتصال', NULL),
(276, 1, 2, 'contact_nu', 'Contact Number', 'Contact Number', NULL),
(277, 1, 1, 'sub_cat', 'Sub Category', 'التصنيف الفرعي', NULL),
(278, 1, 2, 'sub_cat', 'Sub Category', 'Sub Category', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_code` varchar(6) DEFAULT NULL,
  `lang_name` varchar(40) DEFAULT NULL,
  `lang_name_automated` varchar(150) DEFAULT NULL,
  `lang_flag` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `lang_code`, `lang_name`, `lang_name_automated`, `lang_flag`) VALUES
(1, 'ar', 'Arabic', 'العربية', NULL),
(2, 'en', 'English', 'English', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `meal`
--

DROP TABLE IF EXISTS `meal`;
CREATE TABLE IF NOT EXISTS `meal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float DEFAULT NULL,
  `discount_percent` float DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meal`
--

INSERT INTO `meal` (`id`, `name_ar`, `name_en`, `description_ar`, `description_en`, `price`, `discount_percent`, `image`, `restaurant_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(32, 'بيتزا الطابون ◀️ طعم بيحكي 💛', 'بيتزا الطابون ◀️ طعم بيحكي 💛', 'وأنت بتقدر تاكل كل حاجة بحاجة وحدة 😎🍕', 'وأنت بتقدر تاكل كل حاجة بحاجة وحدة 😎🍕', 60, 0, '796a40af9b6a790d086162c0e84bcf4f.jpg', 154, '2021-10-20 19:13:37', '2021-11-04 20:53:06', '2021-11-04 20:53:06'),
(33, 'بيتزا الطابون ◀️ طعم بيحكي 💛', 'بيتزا الطابون ◀️ طعم بيحكي 💛', 'وأنت بتقدر تاكل كل حاجة بحاجة وحدة 😎🍕', 'وأنت بتقدر تاكل كل حاجة بحاجة وحدة 😎🍕', 50, NULL, '5e5d82292dc406d6ee4d1a6118c2f783.jpg', 155, '2021-10-20 19:13:37', '2021-10-20 19:35:40', '2021-10-20 19:35:40'),
(34, 'بيتزا سوبريم 💪⚡', 'sea bream pizza 💪⚡', 'خيارات الطاقة متعددة 🍕😋بيتزا الطابون ◀️ طعم بيحكي ❤', 'خيارات الطاقة متعددة 🍕😋بيتزا الطابون ◀️ طعم بيحكي ❤', 52.488, 10, 'b773e4339c995fa8cc2be1c639cb1494.jpg', 154, '2021-10-20 19:51:29', '2021-11-04 20:53:06', '2021-11-04 20:53:06'),
(35, 'بيج تايستي', 'Big Tasty', 'قطعة من اللحم البقري الحلال الشّهي منقوعة لحد الكمال بصلصة', 'A piece of juicy halal beef marinated to perfection in a sauce', 60, 0, '35c2410314091e6cb87a3e0fee34d123.png', 161, '2021-10-20 20:41:09', '2021-11-04 20:52:39', '2021-11-04 20:52:39'),
(36, 'بيج ماك®', 'Big Mac®', 'قطعة من اللحم البقري الحلال الشّهي منقوعة لحد الكمال بصلصة', 'A piece of juicy halal beef marinated to perfection in a sauce', 80, 0, '962a9d3e06c06c599ab1f844d990db5d.png', 161, '2021-10-20 20:43:02', '2021-11-04 20:52:39', '2021-11-04 20:52:39'),
(37, 'ماك رويال', 'Mac Royal', 'تمتلك ماك رويال خصائص السندويتش الكاملة جميعها! بداية من قطعة لحم البقر المشوي الحلال إلى الخس المقرمش', 'McRoyal has all the features of a full sandwich! From halal roast beef to crunchy lettuce', 50, 0, '2b91aa673822f08cb9a0191783115c59.png', 161, '2021-10-20 20:45:17', '2021-11-04 20:52:39', '2021-11-04 20:52:39'),
(38, 'تويستر تشارجر', 'Twister Charger', 'تويستر تشارجر بوكس', 'Twister Charger Box', 30, 0, '5e84eb7e4df4bc9e20255e5d31f1bca8.png', 162, '2021-10-20 22:50:22', '2021-11-04 20:52:16', '2021-11-04 20:52:16'),
(39, 'بيغ هيت باكت', 'Big Heat Bucket', 'كنتاكي فرايد تشيكن هي سلسلة مطاعم وجبات سريعة', 'Kentucky Fried Chicken is an American fast food', 90, 0, '53d87cd1db2bc53ded19fd77a96915d0.png', 162, '2021-10-20 22:52:17', '2021-11-04 20:52:16', '2021-11-04 20:52:16'),
(40, 'وجبة سوبر دينر', 'Super Dinner Meal', 'وجبة سوبر دينر', 'Super Dinner Meal', 10, 0, '94fd2a0bef8a8272b6d035eae9e12373.png', 162, '2021-10-20 22:53:49', '2021-11-04 20:52:16', '2021-11-04 20:52:16'),
(41, 'طبق كواترو', 'quattro platter', 'بيتزا هت هي سلسلة مطاعم أمريكية متعددة الجنسيات وامتياز دولي تم تأسيسها', 'Pizza Hut is an American multinational restaurant chain and international franchise founded', 20, 0, '6b79ed1b3be5ef55e25f53ca97b5a6d9.png', 166, '2021-10-20 23:02:56', '2021-11-04 20:51:57', '2021-11-04 20:51:57'),
(42, 'ايس كريم فانيلا', 'Vanilla Ice Cream', 'نكهة الفانيلا ، كريمه طعام ،حليب ،سكر', 'vanilla essence, cream, milk and sugar.', 10, 0, 'd5d275e7521d56a599f5cb3f8b83a99a.png', 175, '2021-10-22 20:22:14', '2021-11-04 20:51:47', '2021-11-04 20:51:47'),
(43, 'باستا', 'Pasta', 'جبن', 'Cheese', 24, 0, '80cdcb5ce0cd68a9f88c623c69703173.jpeg', 193, '2021-10-24 17:51:39', '2021-10-28 18:30:43', '2021-10-28 18:30:43'),
(44, 'بيتزا', 'Pizza', 'خضار', 'Vegtabel', 49, 0, '304878e4de1abf9b7a58d46e4148aedc.jpeg', 193, '2021-10-24 17:52:51', '2021-10-28 18:30:43', '2021-10-28 18:30:43'),
(45, 'سمورز جوكليت', 'Chocolate Smores', 'جوكليت', 'Biscuit bite topped with milk chocolate and marshmallow', 20, 0, '140f073b103ff983d8c15050f80e3826.jpeg', 219, '2021-10-28 18:55:34', '2021-11-04 20:54:36', '2021-11-04 20:54:36'),
(46, 'ترافل البندق', 'Hazelnut Truffle', '٣ حبات من ترافل البندق', '3 pieces of hazelnut spread covered with chocolate', 20, 0, '88b0cae190d568d4935de416ff3343e0.jpeg', 219, '2021-10-28 18:59:48', '2021-11-04 20:54:36', '2021-11-04 20:54:36'),
(47, 'حليب الشوكولاته', 'Hot Chocolate', 'افضل مذاق شوكولاته', 'A chocolate ball filled with marshmallows and hot cocoa mix', 25.65, 0, 'b2c0916c0769a68357bea3dc0a478540.jpeg', 219, '2021-10-28 19:02:09', '2021-11-04 20:54:36', '2021-11-04 20:54:36'),
(48, 'شاورما سوري 💛', 'شاورما سوري 💛', 'شاورما سوري', 'شاورما سوري', 20, 0, 'fb615b5843e4e025a380baa9c4e479f5.png', 157, '2021-11-04 14:33:18', '2021-11-04 20:52:58', '2021-11-04 20:52:58'),
(49, 'سبايسي ليمون ايس كريم', 'Cheetos Pasta', 'ايس كريم', 'Pasta', 23, 0, '47e500b095f9cb183012fc3a6c657a54.jpeg', 253, '2021-11-06 16:25:30', '2021-11-06 17:11:40', '2021-11-06 17:11:40'),
(50, 'سبايسي ليمون ايس كريم', 'Spicy Lemon Ice Cream', 'ايس كريم', 'Ice cream', 23, 0, '388c687a39ec7b3c40a79b8832f7b8c3.jpeg', 253, '2021-11-06 16:25:31', '2021-11-06 17:11:45', '2021-11-06 17:11:45'),
(51, 'سبايسي ليمون ايس كريم', 'Spicy Lemon Ice Cream', 'ايس كريم', 'Ice cream', 23, 0, '99045e4e9f8930b8d2ff353ebfe29e07.jpeg', 253, '2021-11-06 16:25:31', '2021-11-11 21:23:15', NULL),
(52, 'تشيتوس باستا', 'CHEETOS PASTA', 'باستا', 'Pasta', 38, 0, '4a1e56160f41666d6365c22abc26131d.jpeg', 253, '2021-11-06 16:29:03', '2021-11-06 16:29:03', NULL),
(53, 'دوريتوس باستا', 'Doritos Pasta', 'باستا', 'Pasta', 38, 0, '4bc8be1f1d3023beaeb86a54c8a8b66c.jpeg', 253, '2021-11-06 16:30:25', '2021-11-06 16:30:25', NULL),
(54, 'باستا تشييس عمان', 'Oman Pasta', 'باستا', 'Pasta', 38, 0, '3aa931dfac1edfcdc863b7bd46d4443c.jpeg', 253, '2021-11-06 16:31:45', '2021-11-06 16:31:45', NULL),
(55, 'تشيتوس باستا', 'Cheetos Pasta', 'باستا', 'Pasta', 38, 0, '11268122a947381d13fe42450ac1f22a.jpeg', 253, '2021-11-06 16:42:26', '2021-11-06 16:42:26', NULL),
(56, 'تشيبس عمان باستا', 'Oman Pasta', 'باستا', 'Pasta', 38, 0, '63b2d4504fa7119ba575f2289901ea40.jpeg', 253, '2021-11-06 16:43:48', '2021-11-06 16:43:48', NULL),
(57, 'دوريتوس باستا', 'Doritos Pasta', 'باستا', 'Pasta', 38, 0, '43259c1b5b1e7519979ca5aa7ee3dbd4.jpeg', 253, '2021-11-06 16:45:22', '2021-11-06 16:45:22', NULL),
(58, 'ريد ستيكس باستا', 'Red Stix Pasta', 'باستا', 'Pasta', 38, 0, 'a328433fdb8103d2f699a03ff3ed1d3b.jpeg', 253, '2021-11-06 16:50:00', '2021-11-06 16:50:00', NULL),
(59, 'بلاك ستيكس باستا', 'Black Stix Pasta', 'باستا', 'Pasta', 30, 0, 'c9b99a56b289694e39657c3884a2d207.jpeg', 253, '2021-11-06 16:51:30', '2021-11-06 16:51:30', NULL),
(60, 'بلاك ستيكس باستا', 'Black Stix Pasta', 'باستا', 'Pasta', 30, 0, '3528aae9c6bbde839f38f1fc107606e3.jpeg', 253, '2021-11-06 16:51:32', '2021-11-06 17:05:14', '2021-11-06 17:05:14'),
(61, 'بيتزا الطابون ◀️ طعم بيحكي 💛', 'بيتزا الطابون ◀️ طعم بيحكي 💛', 'Test', 'Test', 100, 0, 'f85f3d0f18d515fba0d84e16371e0e0d.jpg', 154, '2021-11-06 17:19:41', '2021-11-06 17:20:01', '2021-11-06 17:20:01'),
(62, 'كلاسيك واجو برجر', 'Classic Wagu Burger', 'برجر', 'Burger', 38, 0, '951d6f656a8c2751cb8f8397529f2ff3.jpeg', 253, '2021-11-06 18:12:01', '2021-11-06 18:12:01', NULL),
(63, 'جوسي لوسي برجر', 'Jusey Lucy Burger', 'برجر', 'Burger', 38, 0, 'eeb65728e41a3edbe28a7d7e9650793e.jpeg', 253, '2021-11-06 18:13:36', '2021-11-06 18:13:36', NULL),
(64, 'برجر لحم', 'Beef Burger', 'برجر', 'Burger', 33, 0, '7752fef74cbd85b30c49a3835a99c386.jpeg', 253, '2021-11-06 18:16:20', '2021-11-06 18:16:20', NULL),
(65, 'برجر دجاج', 'Chicken Burger', 'برجر', 'Burger', 33, 0, '84ab68a551a6f64d12e0318b2cefc947.jpeg', 253, '2021-11-06 18:31:35', '2021-11-06 18:31:35', NULL),
(66, 'برجر شرمبس', 'Shrimp Burger', 'برجر', 'Burger', 33, 0, 'b924357b9924fc55e51478ea215caf5f.jpeg', 253, '2021-11-06 18:33:11', '2021-11-06 18:33:11', NULL),
(67, 'داينامايت شرمبس', 'Shrimp Dynamite', 'شرمبس', 'Shrimps', 28, 0, '90e281d5dcd18fdda55598a1b8310929.jpeg', 253, '2021-11-06 22:39:58', '2021-11-06 22:39:58', NULL),
(68, 'تشيكن داينمايت', 'Chicken Dynamite', 'دجاج', 'Chicken', 20, 0, '6220d66f229c21e31ae8cf09c7bf4b23.jpeg', 253, '2021-11-06 22:42:05', '2021-11-06 22:42:05', NULL),
(69, 'ريش اللحم', 'Lamp Chops', 'ريش اللحم', 'Lamp chops', 38, 0, 'e9a0db6f0f2d61628e819e6ea24b22f5.jpeg', 253, '2021-11-06 22:45:09', '2021-11-06 22:45:09', NULL),
(70, 'حلقات البصل', 'Onion Rings', 'مقبلات', 'Appetizers', 15, 0, 'f6516c68b468da28c2ba3766f2d1d115.jpeg', 253, '2021-11-06 22:46:54', '2021-11-06 22:46:54', NULL),
(71, 'اصابع الجبنه المقليه', 'Mozzarella Sticks', 'مقبلات', 'Appetizers', 20, 0, '591d186072aeb2f5b1ff15e845170d95.jpeg', 253, '2021-11-06 22:48:54', '2021-11-07 03:25:59', '2021-11-07 03:25:59'),
(72, 'اصابع الجبنه المقليه', 'Mozzarella Sticks', 'مقبلات', 'Appetizers', 20, 0, '8837a94033364710382aa405db33d255.jpeg', 253, '2021-11-06 22:48:56', '2021-11-06 22:48:56', NULL),
(73, 'سنو فليك ❄️', 'Snowflake Drink ❄️', 'هوت تجوكليت', 'Hot chocolate', 38, 0, '397f71c138c3ae752b0a295ade48c584.jpeg', 181, '2021-11-06 23:54:46', '2021-12-25 21:45:44', NULL),
(74, 'عبالي فرايز', 'Aballii frise', 'فرايز', 'Frise', 28, 0, 'dfc306d18a4943ed8378d5651b86be61.webp', 253, '2021-11-06 23:57:00', '2021-11-06 23:57:00', NULL),
(75, 'كريزي بيف', 'Crazy Beef', 'لحم', 'Beef', 33, 0, '20da941f420d4b8202da71f318ecbb06.webp', 253, '2021-11-06 23:58:14', '2021-11-06 23:58:14', NULL),
(76, 'كريزي تشيكن', 'Crazy Chicken', 'دجاج', 'Chicken', 33, 0, '0a2442b155a4cd5a7fbbde510bb21f69.jpeg', 253, '2021-11-06 23:59:28', '2021-11-06 23:59:28', NULL),
(77, '🌞🏝 عرض الكومبو الصيفي', 'Combo Deal Summer Boxes 🌞🏝', '🏝🌞 عرض الكومبو الصيفى يحتوي على : بوكس بيكان بوكس لندن استيك بوكس كرانشى شوكلت', 'Combo Deal Summer Boxes 🏝🌞 Including: pecan box London Stick crunchy chocolate', 150, 0, '84f06d3a5d69c6cc1f4d22cc9ce73f38.jpeg', 181, '2021-11-06 23:59:32', '2021-11-06 23:59:32', NULL),
(78, 'بلو دراجون موهيتو', 'Blue Dragon Mojito', 'موهيتو', 'Mojito', 23, 0, 'ed92aa88dac957eedae517a3e6e00666.webp', 253, '2021-11-07 00:01:42', '2021-11-07 00:01:42', NULL),
(79, 'موهيتو فروله', 'Strawberry Mojito', 'موهيتو', 'Mojito', 23, 0, 'ec13dde788dc90737123b1caf03f5a34.webp', 253, '2021-11-07 00:02:59', '2021-11-07 00:02:59', NULL),
(80, 'باشن فروت مهيتو', 'Passion Fruit Mojito', 'موهيتو', 'Mojito', 23, 0, '0332dee0ba895000c65f913c088f1ebc.jpeg', 253, '2021-11-07 00:06:14', '2021-11-07 00:06:14', NULL),
(81, 'موهيتو الزعفران', 'Zaffran Mojito', 'موهيتو', 'Mojito', 23, 0, '607dface350b554cae397f7035dabeaf.jpeg', 253, '2021-11-07 00:09:01', '2021-11-07 00:09:01', NULL),
(82, '٤ بوكسات', '4 Box Combo 😍✨', '😍✨ بوكس بوكس كرات اللوز مع مربعات الشوكولاتة شوكولاته بالمكسرات مع مع رول الويفير بوكس اصابع الشوكولاتة المملحه بالمكسرات مع بسكويت المتنوع المذاق', 'Combo deal includes 😍✨ Pecan caramel & mix Box Nutty bars & wafer rolls mix Box Chocolate round & sticks mix Box Almond balls & caramel squares Box', 600, 0, '94c8a0f36cf0adc5ccb0ff11fc19641d.jpeg', 181, '2021-11-07 00:09:29', '2021-11-07 00:09:29', NULL),
(83, 'كولا', 'Cola', 'كولا', 'Cola', 5, 0, 'f8db4c5dd7ffc8530573407b6d739e7a.webp', 253, '2021-11-07 00:10:25', '2021-11-07 00:10:25', NULL),
(84, 'فانتا', 'Fanta', 'فانتا', 'Fanta', 5, 0, '55b7ca31f74103dee298c8cd5d416e86.webp', 253, '2021-11-07 00:11:00', '2021-11-07 00:11:00', NULL),
(85, 'سبرايت', 'Sprite', 'سبرايت', 'Sprite', 5, 0, '0cb32e3165cb1efd5f66562b5ff2123e.webp', 253, '2021-11-07 00:11:47', '2021-11-07 00:11:47', NULL),
(86, '🍦💖 بوكس الآيس كريم', 'Ice Cream Box 🍦💖', 'بوكس التميز بوظه ١ كيلو رول و ٦ كوب من الكنافه المقرمشه و ٤ علب من المكسرات اللذيذه و ٢ من الصوص كريمه الفستق و اللوتس اللذيذ', '‏Ice Cream Box includes everything you need\r\n1 large Mastic Booza Ice cream, 6 kunafa cups, 4 toppings of nuts and chocolates, and finally 2 delicious drizzle sauces pistachio and lotus', 325, 0, 'fc524035be5ba1669045fc3197c41558.jpeg', 181, '2021-11-07 00:14:46', '2021-11-07 00:14:46', NULL),
(87, '‎🤍 بيكان بالكراميل حجم صغير', 'Pecans Caramel Small 💙', '400g Caramel بيكان ب', '400g Pecans Caramel', 120, 0, '4a325c336da1488526dcb8c14f2f0974.jpeg', 181, '2021-11-07 00:17:17', '2021-11-07 00:17:17', NULL),
(88, '‎🤍 بيكان بالكراميل حجم متوسط', 'Pecan Caramel Medium 💛', '‎بيكان بالكراميل حجم ٧٠٠ جرام', '700g Pecans Caramel', 210, 0, '42d6775506bbc47c1fb016d5bbb9cd2f.jpeg', 181, '2021-11-07 00:19:49', '2021-11-07 00:19:49', NULL),
(89, '‎💕 بيكان بالكراميل عرض خاص', 'Pecans Heart Offer 🤎', '‎ بوكس القلب بيكان بالكراميل عرض مميز', 'BOX pecans Heart Shape', 255, 0, '6fe6e3917f0e08035d6aa6e6ed7c5c2a.jpeg', 181, '2021-11-07 00:21:25', '2021-11-07 00:21:25', NULL),
(90, '‎💙 بوكس البيكان المميز', 'Exclusive pecan Box 💙', '‎بوكس البيكان المميز ٨٥٠ جرام', '850g Exclusive pecan Box', 275, 0, '85c6cdc7a3595fff1374d869827f6414.jpeg', 181, '2021-11-07 00:23:04', '2021-11-07 00:23:04', NULL),
(91, 'بيكان بالكراميل', 'Pecan Caramel 💕', 'اختر الحجم المناسب لك ١.٢ كغ', 'choose the size you like for the sweetest treat 1.2 kg', 360, 0, 'f3311738bb6666a2d30b11a2b6b34c64.jpeg', 181, '2021-11-07 00:26:15', '2021-11-07 00:26:15', NULL),
(92, 'مانجو فليمز', 'Mango Flames', 'مغطاة بصلصة الفليمز', 'Flames Sauce', 20, 0, '0f406d3008b8538c69982cff27462dc4.jpeg', 222, '2021-11-07 00:26:22', '2021-11-07 00:26:22', NULL),
(93, 'بيكان ميكس', 'Pecans Mix 💕', 'شوكلاته الكراميل ، شوكولاته الحليب ، شكولاته بيضاء ٢٠٠غ', 'Caramel chocolate, Milk Chocolate & White Chocolate 💕200g', 60, 0, '8311a46a9b3c5ef8850215fa6ac764db.jpeg', 181, '2021-11-07 00:28:42', '2021-11-07 00:28:42', NULL),
(94, 'ليمون مثلج 🍋', 'LEMON BLAST 🍋', 'ليمون مثلج مع مكعبات المانجو', 'Lemon sorbet with mango cubes topped with chili blend lemon zest', 20, 0, 'a6e09a60c11140e3f658a5eff6e5270c.jpeg', 222, '2021-11-07 00:29:46', '2021-11-07 00:29:46', NULL),
(95, '☕️💕 ‎سبانش لاتيه بيكان كراميل', 'Spanish Latté Caramel Pecans ☕️💕', '‎سبانش لاتيه بيكان كراميل ٢٠٠ غ', 'Spanish Latté Caramel Pecans 200g', 60, 0, '5deb617b51f0a75a623fd42318708f0d.jpeg', 181, '2021-11-07 00:31:08', '2021-11-07 00:31:08', NULL),
(96, 'الكراميل بالفستق', 'Pistachio caramel 💚', 'الفستق المغطى بالكراميل ٢٠٠غ', 'Pistachio caramel coated box 200g', 60, 0, 'b57028e393caf96fed55dbf6243097dd.jpeg', 181, '2021-11-07 00:33:09', '2021-11-07 00:33:09', NULL),
(97, '‎🍩💖 ١٥ ميني دونتس بوكس', '15 Mini Donuts Box 🍩💖', '‎(بوكس الدونتس اللذيذ و اثنين من الصوص الرائع ( كريمه اللوتس و كريمه الفستق', 'Delicious Donuts box and two sauces ( creamy louts and pistachio)', 99, 0, 'bd621332c68c6284bdf50401c8998c6e.jpeg', 181, '2021-11-07 00:36:15', '2021-11-07 00:36:15', NULL),
(98, '‎🍩💕 دونتس هيفن بوكس', 'Donut Heaven Box 🍩💕', 'د‎ونتس هيفن بوكس 20', 'mini donuts : chocolate with nuts white chocolate with nuts strawberry chocolate with nuts', 99, 0, '552066cd8dac15e6d8d9dcf63975b987.jpeg', 181, '2021-11-07 00:38:46', '2021-11-07 00:38:46', NULL),
(99, 'بيري تويست', 'Berry Twist', 'عصير مانجو مثلج مع قطع المانجو و صلصه التوت البري', 'Mango slushy with mango cubes and a drizzle of tangy wild berry sauce', 20, 0, '8818b9f59a4cf9786ffea5ad5dfc9ea7.jpeg', 222, '2021-11-07 00:39:41', '2021-11-07 00:39:41', NULL),
(100, '‎💖 رينبو دونتس بوكس', 'Rainbow donuts box 🍩🌈', '‎٤ قطع من الدونتس اللذيذه', '4 PCs delicious donuts', 85, 0, 'c5516780d5273a49cb5a8500a9a311f9.jpeg', 181, '2021-11-07 00:40:42', '2021-11-07 00:40:42', NULL),
(101, 'فلفت فانيلا / موسمي', 'VELVET VANILLA / Seasonal', 'مغطاة بالمارشميلو والشوكولاتة', 'Topped with marshmallow and chocolate', 20, 0, '51a9a0a6a66271754be91aeb2194d2e4.jpeg', 222, '2021-11-07 00:41:50', '2021-11-07 00:41:50', NULL),
(102, '‎💖شوكو دونتس بوكس', 'Choco Donuts Box 🍩🍫', '‎٤ قطع دونتس بأحلى انواع الشوكولاتة و المكسرات', '4 PCs donuts with delicious chocolate and nuts', 85, 0, '1c36bc245f9d85e73fd378b484a42b58.jpeg', 181, '2021-11-07 00:45:11', '2021-11-07 00:45:11', NULL),
(103, 'فيري بيري / موسميه', 'Verry Berry / Seasonal', 'مغطاة بصلصة التوت البري', 'Topped with wild berry sauce', 20, 0, '48c5c6a2ea31a73197bae4fdaebdef64.jpeg', 222, '2021-11-07 00:48:34', '2021-11-07 00:48:34', NULL),
(104, 'ميكس بقلاوة', 'Mix Baklava', 'ميكس بقلاوة', 'The quality and premium Arabic sweets collection from the famous Turkish brand Massara are one of a kind pastries and Arabic sweets. Choose from a wide collection of luxury sweet treats.', 95, 0, '585021676bd496f35a2e897051d4d69b.jpeg', 181, '2021-11-07 00:48:52', '2021-11-07 00:48:52', NULL),
(105, 'ميكس معمول', 'Mix maamoul', 'ميكس معمول', 'The quality and premium Arabic sweets collection from the famous Turkish brand Massara are one of a kind pastries and Arabic sweets. Choose from a wide collection of luxury sweet treats', 83, 0, '65ce247f0f1db0f0760aa6f52aaaf9a3.jpeg', 181, '2021-11-07 00:50:06', '2021-11-07 00:50:06', NULL),
(106, 'معمول الفستق', 'Pistachio maamoul', 'معمول الفستق', 'The quality and premium Arabic sweets collection from the famous Turkish brand Massara are one of a kind pastries and Arabic sweets. Choose from a wide collection of luxury sweet treats', 68, 0, '937aa3c3526ac964021ec2ef452a198d.jpeg', 181, '2021-11-07 00:51:30', '2021-11-07 00:51:30', NULL),
(107, 'معمول الجوز', 'Walnut maamoul', 'معمول الجوز', 'The quality and premium Arabic sweets collection from the famous Turkish brand Massara are one of a kind pastries and Arabic sweets. Choose from a wide collection of luxury sweet treats', 68, 0, '5434dfd5f22b3ac13e6324b3336abf1f.jpeg', 181, '2021-11-07 00:52:53', '2021-11-07 00:52:53', NULL),
(108, 'مانجو باولز', 'Mango Bowls', 'مانحو', 'Mango', 27, 0, 'ae5bdcd45f0304e30b401e5edd5878ef.jpeg', 222, '2021-11-07 00:53:18', '2021-11-07 00:53:18', NULL),
(109, 'معمول التمر', 'Dates maamoul', 'معمول التمر', 'The quality and premium Arabic sweets collection from the famous Turkish brand Massara are one of a kind pastries and Arabic sweets. Choose from a wide collection of luxury sweet treats', 42, 0, '2908945833fca389dc868b4888e548b1.jpeg', 181, '2021-11-07 00:54:06', '2021-11-07 00:54:06', NULL),
(110, 'غريبة اكسترا', 'Ghraybeh extra', 'غريبة اكسترا', 'Small size . The quality and premium Arabic sweets collection from the famous Turkish brand Massara are one of a kind pastries and Arabic sweets. Choose from a wide collection of luxury sweet treats.', 41, 0, 'd35100df6c6988fdb7680d66c6361be9.jpeg', 181, '2021-11-07 00:55:24', '2021-11-07 00:55:24', NULL),
(111, 'سمورز بايتس', 'Smores Bites', 'سمورز بايتس\r\nطبقة البسكويت مغطاة بالشيكولاتة الحليب والمارشميلو', 'smores bites 3 pieces of biscuit bites topped with milk chocolate and marshmallow', 20, 0, 'e0ff99bd5293502743fc4b51fb2b7c2d.jpeg', 219, '2021-11-07 00:59:21', '2021-11-07 01:06:33', '2021-11-07 01:06:33'),
(112, 'تجوكليت سمورز بايتس', 'Chocolate Smore Bites', 'سمورز بايتس\r\nطبقة البسكويت مغطاة بالشوكولاته والمارشميلو', 'smores bites \r\n3 pieces of biscuit bites topped with milk chocolate and marshmallow', 20, 0, '3cd04351a8048d691c8305420324a3c7.jpeg', 256, '2021-11-07 01:09:57', '2021-11-07 01:09:57', NULL),
(113, 'ترافل البندق', 'Hazelnut Truffle', 'ترافل بندق\r\n    حشوة البندق مغطى بالشيكولاتة', 'hazelnut truffle \r\n3 pieces of truffles filled with hazelnut spread covered in chocolate', 20, 0, '872585910445853ae06b48c991756dc1.jpeg', 256, '2021-11-07 01:11:57', '2021-11-07 01:15:51', '2021-11-07 01:15:51'),
(114, 'ترافل البندق', 'Hazelnut Truffle', 'ترافل بندق\r\n    حشوة البندق مغطى بالشيكولاتة', 'hazelnut truffle \r\n3 pieces of truffles filled with hazelnut spread covered in chocolate', 20, 0, '7373289ba74d3594604fda07fe58120a.jpeg', 256, '2021-11-07 01:11:58', '2021-11-07 01:11:58', NULL),
(115, 'كرة الشوكولاته الساخنه', 'Hot Chocolate Bomb', 'كرة الشوكولاتة  الساخنة\r\n    كرة  شيكولاتة مليئة بالمارشميلو و خليط الكاكاو', 'hot chocolate bombs\r\nSignature hot chocolate', 27, 0, 'b0f6cdffd23a8557dfdb55709ac750f5.jpeg', 256, '2021-11-07 01:15:06', '2021-11-07 01:15:06', NULL),
(116, 'مارجريتا', 'Margherita', 'بيتزا', 'Pizza', 50, 0, '9ddc9ccfe5f6dcc54ccb94f94b53d4fb.jpeg', 261, '2021-11-08 02:25:56', '2021-11-08 02:25:56', NULL),
(117, 'تارتوفو', 'Tartufo', 'بيتزا', 'Pizza', 60, 0, '38a208cb1c0362cf05691199087ecb12.jpeg', 261, '2021-11-08 02:26:45', '2021-11-08 02:26:45', NULL),
(118, 'ديافولا', 'Diavola', 'بيتزا', 'Pizza', 58, 0, '6610bc6f45e496d7555952b8e5179c8d.jpeg', 261, '2021-11-08 02:28:08', '2021-11-08 02:28:08', NULL),
(119, 'بوراتا', 'Burrata', 'بيتزا', 'Pizza', 60, 0, 'eb1d9b1b243ae99e0a8f5c8249967074.jpeg', 261, '2021-11-08 02:29:16', '2021-11-08 02:29:16', NULL),
(120, 'بوكس الصيف', 'Summer Box', 'بوكس البيكان المميز ٨٥٠ جرام (اختار النكهه المفضله لديك( فقط اشر لذلك ٤ اسبانش لاتيه كوفى', 'Summer Box 🌺☕️ including: 850g pecan box (mix flavour or any separate flavour that you like it ) just put your notes 4 delicious Spanish Latté coffe .', 325, 0, 'bb7deb4fb8b163443f2fa61187263e87.jpeg', 181, '2021-11-08 03:04:35', '2021-11-08 03:22:41', NULL),
(121, 'بيتزا الطابون ◀️ طعم بيحكي 💛', 'بيتزا الطابون ◀️ طعم بيحكي 💛', 'بيتزا الطابون ◀️ طعم بيحكي 💛', 'بيتزا الطابون ◀️ طعم بيحكي 💛', 50, 0, 'de9e5b55ba5ca934bb1f7293c8cf9ed4.jpg', 262, '2021-11-08 15:10:41', '2021-11-08 21:23:28', '2021-11-08 21:23:28'),
(122, 'بروسكيتا', 'Bruschetta', 'خبز إيطالي محمص مغطى بزيت الزيتون ويقدم مع الثوم أو  الطماطم أو الزييتون', 'Toasted Italian bread drenched in olive oil and served typically with olive🫒, garlic🧄 or tomatoes🍅', 70, 0, 'cda6fb4185d01d3a1b698ac09c34803d.jpeg', 257, '2021-11-27 23:27:09', '2021-11-27 23:27:09', NULL),
(123, 'ريزوتو اللافندر', 'Lavender Risotto', 'الرز الايطالي اللذيذ', 'Delicious northern Italian rice', 80, 0, '8df17a0a11011a67de974151d6b7864e.jpeg', 257, '2021-11-27 23:32:04', '2021-11-27 23:32:04', NULL),
(124, 'كوكاكولا', 'Coca-Cola', 'مشروب غازي', 'Soft Drink', 10, 0, '2d208f6441c01433cefc4cc9d0a1f4ed.jpeg', 261, '2021-11-29 06:58:02', '2021-11-29 06:58:02', NULL),
(125, 'اكوا بانا', 'Aqua Panna', 'ماء', 'Water', 6, 0, 'cc2e9384262e6a16c446caf072d3de2a.jpeg', 261, '2021-11-29 07:02:20', '2021-11-29 07:02:20', NULL),
(126, 'فانتا', 'Fanta', 'مشروب غازي', 'Soft Drink', 10, 0, 'a38c8c50fedbf09871ecb07ce16f5807.jpeg', 261, '2021-11-29 07:03:06', '2021-11-29 07:03:06', NULL),
(127, 'سبرايت', 'Sprite', 'مشروب غازي', 'Soft Drink', 10, 0, '02744962ad555b44cd9f99c54238dc62.jpeg', 261, '2021-11-29 07:04:06', '2021-11-29 07:04:06', NULL),
(128, 'فيفي كولا', 'Vivi Kola', 'مشروب غازي', 'Soft Drink', 20, 0, '7eb7da10f97ea8c5d09fd0b24b946fb3.jpeg', 261, '2021-11-29 07:04:59', '2021-11-29 07:04:59', NULL),
(129, 'Cipriani', 'Cipriani', 'مشروب الدراق', 'Peach Drink 🍑', 20, 0, 'be09a90942503be9c7cb725d4318a76a.webp', 261, '2021-11-29 07:07:12', '2021-11-29 07:07:12', NULL),
(130, 'ايس كريم 🍦', 'Ice Cream 🍦', 'الشوكولا', 'Chocolate 🍫', 10, 0, '648b7ede61ea1f53a65f2eedefc4bed6.jpeg', 257, '2021-12-05 00:47:09', '2021-12-05 00:47:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` longtext,
  `is_read` int(11) DEFAULT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `message`, `is_read`, `read_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 1, 'rrrrrrrrrrrrrrrrrrrrrrrrrrrr', NULL, NULL, '2021-11-29 08:12:45', '2021-11-29 08:12:45', NULL),
(2, 1, 3, 'ttttttttttttttttt', NULL, NULL, '2021-11-29 08:18:53', '2021-11-29 08:18:53', NULL),
(3, 1, 3, 'ttttttttttttttttt', NULL, NULL, '2021-11-29 08:19:01', '2021-11-29 08:19:01', NULL),
(4, 3, 1, 'test Message', NULL, NULL, '2021-11-29 09:13:23', '2021-11-29 09:13:23', NULL),
(5, 1, 2, 'opopopo', NULL, NULL, '2021-11-30 13:39:41', '2022-02-02 17:54:31', '2022-02-02 17:54:31'),
(6, 2, 1, 'انا بدي الخدمة فثسف', NULL, NULL, '2021-11-30 13:43:45', '2022-02-02 17:54:31', '2022-02-02 17:54:31'),
(7, 2, 1, 'انا بدي الخدمة فثسف', NULL, NULL, '2021-11-30 13:44:01', '2022-02-02 17:54:31', '2022-02-02 17:54:31'),
(8, 7, 1, 'ي محمد انا بدي خدمة', NULL, NULL, '2021-12-01 07:38:53', '2021-12-01 07:38:53', NULL),
(9, 7, 1, 'Ut perferendis qui m', NULL, NULL, '2021-12-01 14:04:29', '2021-12-01 14:04:29', NULL),
(10, 1, 7, 'as./d,;asl,d', NULL, NULL, '2021-12-01 20:43:06', '2021-12-01 20:43:06', NULL),
(11, 1, 7, 'محمد الشوربجي رد', NULL, NULL, '2021-12-01 20:43:31', '2021-12-01 20:43:31', NULL),
(12, 1, 3, 'asdasdasd', NULL, NULL, '2021-12-01 20:47:51', '2021-12-01 20:47:51', NULL),
(13, 4, 4, 'rrrrrr', NULL, NULL, '2021-12-08 19:10:57', '2021-12-08 19:10:57', NULL),
(14, 1, 4, 'مرحبا', NULL, NULL, '2021-12-12 19:49:28', '2021-12-12 19:49:28', NULL),
(15, 4, 1, 'ي هلا ي معلمي', NULL, NULL, '2021-12-12 19:50:43', '2021-12-12 19:50:43', NULL),
(16, 5, 4, 'مرحبا ي محمد', NULL, NULL, '2021-12-13 15:01:31', '2021-12-13 15:01:31', NULL),
(17, 5, 4, 'asdasdasd', NULL, NULL, '2021-12-13 15:13:04', '2021-12-13 15:13:04', NULL),
(18, 5, 4, 'asdasd', NULL, NULL, '2021-12-13 15:14:51', '2021-12-13 15:14:51', NULL),
(19, 5, 4, 'asdasd', NULL, NULL, '2021-12-13 15:16:17', '2021-12-13 15:16:17', NULL),
(20, 5, 4, 'asdasdsad', NULL, NULL, '2021-12-13 15:18:10', '2021-12-13 15:18:10', NULL),
(21, 5, 4, 'asdasdsad', NULL, NULL, '2021-12-13 15:20:13', '2021-12-13 15:20:13', NULL),
(22, 5, 4, 'مصطفى', NULL, NULL, '2021-12-13 15:20:27', '2021-12-13 15:20:27', NULL),
(23, 5, 4, 'مصطفى', NULL, NULL, '2021-12-13 15:20:46', '2021-12-13 15:20:46', NULL),
(24, 5, 5, 'ي هلا ي معلمي', NULL, NULL, '2021-12-13 15:23:08', '2021-12-13 15:23:08', NULL),
(25, 4, 1, 'هلا ي محمد .. تست', NULL, NULL, '2021-12-14 15:26:26', '2021-12-14 15:26:26', NULL),
(26, 4, 1, 'هلا ي محمد .. تست', NULL, NULL, '2021-12-14 15:26:43', '2021-12-14 15:26:43', NULL),
(27, 4, 1, 'هلا ي محمد .. تست', NULL, NULL, '2021-12-14 15:29:22', '2021-12-14 15:29:22', NULL),
(28, 4, 1, 'asdsadasd', NULL, NULL, '2021-12-14 15:34:57', '2021-12-14 15:34:57', NULL),
(29, 4, 1, 'شسيشسيشسي', NULL, NULL, '2021-12-14 15:37:19', '2021-12-14 15:37:19', NULL),
(30, 4, 1, 'asdsad', NULL, NULL, '2021-12-14 15:37:30', '2021-12-14 15:37:30', NULL),
(31, 4, 1, 'شسيشسيسشيشس', NULL, NULL, '2021-12-14 15:42:40', '2021-12-14 15:42:40', NULL),
(32, 4, 1, 'asdasdasd', NULL, NULL, '2021-12-14 15:50:13', '2021-12-14 15:50:13', NULL),
(33, 4, 1, 'asdasdasd', NULL, NULL, '2021-12-14 15:50:28', '2021-12-14 15:50:28', NULL),
(34, 4, 1, 'asdasdasd', NULL, NULL, '2021-12-14 15:51:28', '2021-12-14 15:51:28', NULL),
(35, 4, 1, 'شسيشسيشسي', NULL, NULL, '2021-12-14 15:55:25', '2021-12-14 15:55:25', NULL),
(36, 4, 1, 'asdasdasd', NULL, NULL, '2021-12-14 15:59:30', '2021-12-14 15:59:30', NULL),
(37, 4, 1, 'asdasdsad', NULL, NULL, '2021-12-14 16:00:14', '2021-12-14 16:00:14', NULL),
(38, 4, 1, 'asdasdasdasdasd', NULL, NULL, '2021-12-14 16:04:49', '2021-12-14 16:04:49', NULL),
(39, 4, 1, 'sadasdasdsa', NULL, NULL, '2021-12-14 16:06:50', '2021-12-14 16:06:50', NULL),
(40, 4, 1, 'اهلا ي محمد', NULL, NULL, '2021-12-14 16:07:23', '2021-12-14 16:07:23', NULL),
(41, 4, 1, 'محمد انا بدي خدمة', NULL, NULL, '2021-12-14 16:08:24', '2021-12-14 16:08:24', NULL),
(42, 4, 1, 'asdasdddddddddd', NULL, NULL, '2021-12-14 16:09:04', '2021-12-14 16:09:04', NULL),
(43, 4, 1, 'asdasdasd', NULL, NULL, '2021-12-14 16:09:20', '2021-12-14 16:09:20', NULL),
(45, 4, 5, 'asdasdasd', NULL, NULL, '2021-12-14 16:16:19', '2021-12-14 16:16:19', NULL),
(46, 4, 5, 'asdasdasd', NULL, NULL, '2021-12-14 16:16:33', '2021-12-14 16:16:33', NULL),
(47, 4, 5, 'asdasd', NULL, NULL, '2021-12-14 16:18:11', '2021-12-14 16:18:11', NULL),
(48, 4, 5, 'asdsadasd', NULL, NULL, '2021-12-14 16:18:37', '2021-12-14 16:18:37', NULL),
(49, 4, 5, 'asdasdasd', NULL, NULL, '2021-12-14 16:20:06', '2021-12-14 16:20:06', NULL),
(50, 1, 3, 'asdasdassssssssssssssssssssssssssssssasdasdassssssssssssssssssssssssssssssasdasasdasdassssssssssssssssssssssssssssssasdasdassssssssssssssssssssssssssssssasdas', NULL, NULL, '2021-12-14 16:26:09', '2021-12-14 16:26:09', NULL),
(51, 4, 1, 'asdasdassssssssssssssssssssssssssssssasdasdassssssssssssssssssssssssssssssasdas', NULL, NULL, '2021-12-14 16:26:41', '2021-12-14 16:26:41', NULL),
(52, 4, 1, 'lvpflsakjdlsad', NULL, NULL, '2021-12-15 06:09:47', '2021-12-15 06:09:47', NULL),
(53, 4, 1, 'tysayudgasdsdsadasd', NULL, NULL, '2021-12-15 06:11:13', '2021-12-15 06:11:13', NULL),
(54, 4, 1, 'kasjdkasd', NULL, NULL, '2021-12-15 06:12:17', '2021-12-15 06:12:17', NULL),
(55, 4, 1, 'tttttttttt', NULL, NULL, '2021-12-15 06:19:58', '2021-12-15 06:19:58', NULL),
(56, 4, 1, 'jhasbdjkasnd', NULL, NULL, '2021-12-15 06:28:17', '2021-12-15 06:28:17', NULL),
(57, 4, 1, 'zcsaasd', NULL, NULL, '2021-12-15 06:28:33', '2021-12-15 06:28:33', NULL),
(58, 4, 1, 'saadddddddd', NULL, NULL, '2021-12-15 06:33:38', '2021-12-15 06:33:38', NULL),
(59, 4, 1, 'asdasdasd', NULL, NULL, '2021-12-15 06:33:50', '2021-12-15 06:33:50', NULL),
(60, 4, 1, 'akjsdnklasdnklsad', NULL, NULL, '2021-12-15 06:35:18', '2021-12-15 06:35:18', NULL),
(61, 4, 1, 'jashdkasd', NULL, NULL, '2021-12-15 07:02:51', '2021-12-15 07:02:51', NULL),
(62, 4, 1, 'tttttttttt', NULL, NULL, '2021-12-15 07:05:15', '2021-12-15 07:05:15', NULL),
(63, 2, 1, 'نمنممم', NULL, NULL, '2022-01-23 17:38:14', '2022-02-02 17:54:31', '2022-02-02 17:54:31'),
(64, 2, 1, 'سيبسيب', NULL, NULL, '2022-01-23 17:38:53', '2022-02-02 17:54:31', '2022-02-02 17:54:31'),
(65, 2, 1, 'llll', NULL, NULL, '2022-01-24 13:58:49', '2022-02-02 17:54:31', '2022-02-02 17:54:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_13_174821_create_notifications_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('083f5e5e-8cf7-4b51-b436-7e49a7c8d66a', 'App\\Notifications\\web\\ServiceRequestsNotification', 'App\\Models\\User', 2, '{\"type\":\"service_request\",\"item_id\":61,\"service_name\":\"ytytytyt\",\"requester_user_id\":1,\"title\":\" \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\",\"body\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\"}', '2022-03-06 04:31:15', '2022-03-04 12:47:06', '2022-03-06 04:31:15'),
('0936f0ec-fcd7-48fc-ba28-ae0049b0b98e', 'App\\Notifications\\web\\ServiceRequestsNotification', 'App\\Models\\User', 1, '{\"type\":\"service_request\",\"item_id\":12,\"service_name\":\"New service\",\"requester_user_id\":3,\"title\":\" \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\",\"body\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\"}', '2022-03-04 11:05:08', '2022-02-20 17:06:48', '2022-03-04 11:05:08'),
('19a2fb01-108c-4ab3-b5c2-416a33b23f11', 'App\\Notifications\\web\\ServiceRequestsNotification', 'App\\Models\\User', 1, '{\"type\":\"service_request\",\"item_id\":57,\"service_name\":\"Nam Nam incidunt es\",\"requester_user_id\":2,\"title\":\" \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\",\"body\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\"}', '2022-03-04 11:04:56', '2022-03-03 18:15:27', '2022-03-04 11:04:56'),
('1b5bb1d7-29f1-4280-9518-d19a197322c9', 'App\\Notifications\\web\\AcceptOrder\\AcceptOrderNotification', 'App\\Models\\User', 2, '{\"type\":\"service_order_accept\",\"item_id\":9,\"service_name\":\"Test Test Test\",\"requester_user_id\":2,\"service_owner_id\":2,\"title\":\" Accept  Order\",\"body\":\"Your Order is accepted\"}', '2022-01-07 17:07:49', '2022-01-07 17:07:42', '2022-01-07 17:07:49'),
('1eeff2d3-7442-4bc5-a5ab-192a7495db88', 'App\\Notifications\\web\\ServiceRequestsNotification', 'App\\Models\\User', 1, '{\"type\":\"service_request\",\"item_id\":8,\"service_name\":\"Test Test Test\",\"requester_user_id\":2,\"title\":\" \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\",\"body\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\"}', '2022-01-07 14:59:24', '2022-01-07 14:59:14', '2022-01-07 14:59:24'),
('214be015-7fba-43c2-b0d7-f11158b95221', 'App\\Notifications\\web\\ServiceRequestsNotification', 'App\\Models\\User', 1, '{\"type\":\"service_request\",\"item_id\":7,\"service_name\":\"Nam Nam incidunt es\",\"requester_user_id\":2,\"title\":\" \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\",\"body\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\"}', '2022-01-07 17:08:31', '2022-01-07 14:59:14', '2022-01-07 17:08:31'),
('2cc7e1b6-7bf6-4496-89ea-b502cdafe1dd', 'App\\Notifications\\web\\ServiceRequestsNotification', 'App\\Models\\User', 1, '{\"type\":\"service_request\",\"item_id\":48,\"service_name\":\"Nam Nam incidunt es\",\"requester_user_id\":3,\"title\":\" \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\",\"body\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\"}', '2022-03-04 11:05:08', '2022-02-28 12:34:01', '2022-03-04 11:05:08'),
('2ff9ea8d-1375-4d14-945e-53867a10c0bd', 'App\\Notifications\\web\\ReviewOrder\\ReviewOrderNotification', 'App\\Models\\User', 2, '{\"type\":\"service_order_review\",\"item_id\":67,\"service_name\":\"ytytytyt\",\"requester_user_id\":3,\"service_owner_id\":3,\"title\":\"Review Order\",\"body\":\"Your Deliver Is Review\"}', '2022-03-06 04:31:15', '2022-03-06 04:19:48', '2022-03-06 04:31:15'),
('31f15da4-5faa-479e-86ee-fa014e5a2d5f', 'App\\Notifications\\web\\ServiceRequestsNotification', 'App\\Models\\User', 1, '{\"type\":\"service_request\",\"item_id\":52,\"service_name\":\"New service\",\"requester_user_id\":3,\"title\":\" \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\",\"body\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\"}', '2022-03-04 11:05:08', '2022-03-03 13:58:08', '2022-03-04 11:05:08'),
('392e3d91-5ddf-4acc-ba05-0bd970ec7af7', 'App\\Notifications\\web\\ServiceRequestsNotification', 'App\\Models\\User', 2, '{\"type\":\"service_request\",\"item_id\":63,\"service_name\":\"ytytytyt\",\"requester_user_id\":1,\"title\":\" \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\",\"body\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\"}', '2022-03-04 15:46:25', '2022-03-04 15:06:46', '2022-03-04 15:46:25'),
('3eb19d6b-3695-4520-ae93-3eee0fd0397d', 'App\\Notifications\\web\\ReviewOrder\\ReviewOrderNotification', 'App\\Models\\User', 1, '{\"type\":\"service_order_review\",\"item_id\":9,\"service_name\":\"Test Test Test\",\"requester_user_id\":2,\"service_owner_id\":2,\"title\":\"Review Order\",\"body\":\"Your Deliver Is Review\"}', '2022-02-02 17:40:16', '2022-01-07 17:08:26', '2022-02-02 17:40:16'),
('44a202ca-821a-4f43-afb4-6f20b321facd', 'App\\Notifications\\web\\ServiceRequestsNotification', 'App\\Models\\User', 1, '{\"type\":\"service_request\",\"item_id\":13,\"service_name\":\"Nam Nam incidunt es\",\"requester_user_id\":3,\"title\":\" \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\",\"body\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\"}', '2022-03-04 11:05:08', '2022-02-20 17:13:26', '2022-03-04 11:05:08'),
('4e2129f8-b118-448f-bbee-81c750134267', 'App\\Notifications\\web\\DeliverOrder\\DeliverOrderNotification', 'App\\Models\\User', 2, '{\"type\":\"service_order_deliver\",\"item_id\":9,\"service_name\":\"Test Test Test\",\"requester_user_id\":2,\"service_owner_id\":2,\"title\":\"Deliver Order\",\"body\":\"Your Order Is Delivered\"}', '2022-03-06 04:31:15', '2022-01-07 17:09:06', '2022-03-06 04:31:15'),
('57465157-f703-49ad-8d71-2ec39ddb9177', 'App\\Notifications\\web\\ServiceRequestsNotification', 'App\\Models\\User', 1, '{\"type\":\"service_request\",\"item_id\":50,\"service_name\":\"Nam Nam incidunt es\",\"requester_user_id\":3,\"title\":\" \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\",\"body\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\"}', '2022-03-04 11:05:08', '2022-02-28 15:29:15', '2022-03-04 11:05:08'),
('5ab2a917-34e9-442b-8bf8-5be2a9ed5c08', 'App\\Notifications\\web\\DeliverOrder\\DeliverOrderNotification', 'App\\Models\\User', 3, '{\"type\":\"service_order_deliver\",\"item_id\":67,\"service_name\":\"ytytytyt\",\"requester_user_id\":3,\"service_owner_id\":3,\"title\":\"Deliver Order\",\"body\":\"Your Order Is Delivered\"}', NULL, '2022-03-06 04:19:35', '2022-03-06 04:19:35'),
('5c8a0d93-723a-4ebb-9b88-3e43cb175a03', 'App\\Notifications\\web\\ServiceRequestsNotification', 'App\\Models\\User', 1, '{\"type\":\"service_request\",\"item_id\":10,\"service_name\":\"Nam Nam incidunt es\",\"requester_user_id\":3,\"title\":\" \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\",\"body\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\"}', '2022-03-04 11:05:08', '2022-02-19 18:55:47', '2022-03-04 11:05:08'),
('6018500e-867b-4da2-8c93-1cb593428c81', 'App\\Notifications\\web\\ServiceRequestsNotification', 'App\\Models\\User', 2, '{\"type\":\"service_request\",\"item_id\":62,\"service_name\":\"ytytytyt\",\"requester_user_id\":1,\"title\":\" \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\",\"body\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\"}', '2022-03-06 04:31:15', '2022-03-04 12:52:25', '2022-03-06 04:31:15'),
('63eda566-f506-4a09-889d-69c60f9c16cd', 'App\\Notifications\\web\\DeliverOrder\\DeliverOrderNotification', 'App\\Models\\User', 2, '{\"type\":\"service_order_deliver\",\"item_id\":9,\"service_name\":\"Test Test Test\",\"requester_user_id\":2,\"service_owner_id\":2,\"title\":\"Deliver Order\",\"body\":\"Your Order Is Delivered\"}', '2022-03-06 04:31:15', '2022-01-07 17:08:01', '2022-03-06 04:31:15'),
('6a324bb4-da01-4a44-bb4c-1d480a0c35ca', 'App\\Notifications\\web\\ServiceRequestsNotification', 'App\\Models\\User', 2, '{\"type\":\"service_request\",\"item_id\":49,\"service_name\":\"ytytytyt\",\"requester_user_id\":3,\"title\":\" \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\",\"body\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\"}', '2022-03-06 04:31:15', '2022-02-28 15:29:15', '2022-03-06 04:31:15'),
('6f323aff-b41b-4247-95fc-d5f1314f1cb1', 'App\\Notifications\\web\\AcceptOrder\\AcceptOrderNotification', 'App\\Models\\User', 3, '{\"type\":\"service_order_accept\",\"item_id\":10,\"service_name\":\"Nam Nam incidunt es\",\"requester_user_id\":3,\"service_owner_id\":3,\"title\":\" Accept  Order\",\"body\":\"Your Order is accepted\"}', '2022-02-21 17:20:22', '2022-02-20 05:01:19', '2022-02-21 17:20:22'),
('7b3694a8-99d7-45a7-a05e-0bd4f9a05f69', 'App\\Notifications\\web\\ServiceRequestsNotification', 'App\\Models\\User', 1, '{\"type\":\"service_request\",\"item_id\":9,\"service_name\":\"Test Test Test\",\"requester_user_id\":2,\"title\":\" \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\",\"body\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\"}', '2022-01-07 17:07:30', '2022-01-07 17:07:20', '2022-01-07 17:07:30'),
('7b9dcb20-8396-4b2f-8453-d8db8b68ef53', 'App\\Notifications\\web\\ServiceRequestsNotification', 'App\\Models\\User', 2, '{\"type\":\"service_request\",\"item_id\":54,\"service_name\":\"tttt\",\"requester_user_id\":3,\"title\":\" \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\",\"body\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\"}', '2022-03-06 04:31:15', '2022-03-03 17:01:33', '2022-03-06 04:31:15'),
('861ea0b6-9d44-4f4c-9d12-cdf022a201ff', 'App\\Notifications\\web\\ServiceRequestsNotification', 'App\\Models\\User', 1, '{\"type\":\"service_request\",\"item_id\":14,\"service_name\":\"New service\",\"requester_user_id\":3,\"title\":\" \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\",\"body\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\"}', '2022-03-04 11:05:08', '2022-02-20 17:27:32', '2022-03-04 11:05:08'),
('87845839-3d23-47dd-a3b5-c3914a24b9d8', 'App\\Notifications\\web\\AcceptOrder\\AcceptOrderNotification', 'App\\Models\\User', 3, '{\"type\":\"service_order_accept\",\"item_id\":67,\"service_name\":\"ytytytyt\",\"requester_user_id\":3,\"service_owner_id\":3,\"title\":\" Accept  Order\",\"body\":\"Your Order is accepted\"}', '2022-03-06 04:19:23', '2022-03-06 04:19:17', '2022-03-06 04:19:23'),
('882965ce-5225-4316-98ea-b01e117b0f90', 'App\\Notifications\\web\\ServiceRequestsNotification', 'App\\Models\\User', 1, '{\"type\":\"service_request\",\"item_id\":40,\"service_name\":\"New service\",\"requester_user_id\":4,\"title\":\" \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\",\"body\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\"}', '2022-03-04 11:05:08', '2022-02-22 12:23:16', '2022-03-04 11:05:08'),
('8ae3515d-4a6c-408a-8fda-70915eefee50', 'App\\Notifications\\web\\DeliverOrder\\DeliverOrderNotification', 'App\\Models\\User', 3, '{\"type\":\"service_order_deliver\",\"item_id\":49,\"service_name\":\"ytytytyt\",\"requester_user_id\":3,\"service_owner_id\":3,\"title\":\"Deliver Order\",\"body\":\"Your Order Is Delivered\"}', '2022-03-05 14:48:40', '2022-03-04 10:05:33', '2022-03-05 14:48:40'),
('9266eac7-4864-4b3f-9bcf-04fa02b4a113', 'App\\Notifications\\web\\ServiceRequestsNotification', 'App\\Models\\User', 1, '{\"type\":\"service_request\",\"item_id\":60,\"service_name\":\"Nam Nam incidunt es\",\"requester_user_id\":1,\"title\":\" \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\",\"body\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\"}', NULL, '2022-03-04 12:47:06', '2022-03-04 12:47:06'),
('9e87ae33-d2ff-4155-abad-b7fcde79c19e', 'App\\Notifications\\web\\DeliverOrder\\DeliverOrderNotification', 'App\\Models\\User', 3, '{\"type\":\"service_order_deliver\",\"item_id\":67,\"service_name\":\"ytytytyt\",\"requester_user_id\":3,\"service_owner_id\":3,\"title\":\"Deliver Order\",\"body\":\"Your Order Is Delivered\"}', NULL, '2022-03-06 04:20:02', '2022-03-06 04:20:02'),
('a280a971-929e-4e99-af5f-76e516a23d1c', 'App\\Notifications\\web\\ServiceRequestsNotification', 'App\\Models\\User', 2, '{\"type\":\"service_request\",\"item_id\":66,\"service_name\":\"tttt\",\"requester_user_id\":3,\"title\":\" \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\",\"body\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\"}', '2022-03-06 04:31:12', '2022-03-05 16:54:31', '2022-03-06 04:31:12'),
('a98bb35e-1deb-412f-8046-27acc16baa33', 'App\\Notifications\\web\\ServiceRequestsNotification', 'App\\Models\\User', 2, '{\"type\":\"service_request\",\"item_id\":51,\"service_name\":\"tttt\",\"requester_user_id\":3,\"title\":\" \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\",\"body\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\"}', '2022-03-06 04:31:15', '2022-03-02 05:46:50', '2022-03-06 04:31:15'),
('acc64053-ceea-4a8b-9b2d-c2f83e66c2be', 'App\\Notifications\\web\\ServiceRequestsNotification', 'App\\Models\\User', 1, '{\"type\":\"service_request\",\"item_id\":33,\"service_name\":\"New service\",\"requester_user_id\":3,\"title\":\" \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\",\"body\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\"}', '2022-03-04 11:05:08', '2022-02-21 17:17:06', '2022-03-04 11:05:08'),
('b1bce854-2d77-4ea4-8f58-c1d05a4ca0bb', 'App\\Notifications\\web\\ServiceRequestsNotification', 'App\\Models\\User', 2, '{\"type\":\"service_request\",\"item_id\":56,\"service_name\":\"ytytytyt\",\"requester_user_id\":3,\"title\":\" \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\",\"body\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\"}', '2022-03-06 04:31:15', '2022-03-03 18:11:44', '2022-03-06 04:31:15'),
('b62d5a8a-5b41-4dcf-a944-4fdb48014d7d', 'App\\Notifications\\web\\ServiceRequestsNotification', 'App\\Models\\User', 2, '{\"type\":\"service_request\",\"item_id\":64,\"service_name\":\"ytytytyt\",\"requester_user_id\":3,\"title\":\" \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\",\"body\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\"}', '2022-03-06 04:31:15', '2022-03-05 14:38:18', '2022-03-06 04:31:15'),
('bc56943c-a81b-423b-bd55-0a2c1da3cff2', 'App\\Notifications\\web\\DeliverOrder\\DeliverOrderNotification', 'App\\Models\\User', 2, '{\"type\":\"service_order_deliver\",\"item_id\":7,\"service_name\":\"Nam Nam incidunt es\",\"requester_user_id\":2,\"service_owner_id\":2,\"title\":\"Deliver Order\",\"body\":\"Your Order Is Delivered\"}', '2022-01-07 16:12:13', '2022-01-07 14:59:55', '2022-01-07 16:12:13'),
('c6445ca4-a4bf-41f2-88d2-370f5fa8db3f', 'App\\Notifications\\web\\AcceptOrder\\AcceptOrderNotification', 'App\\Models\\User', 3, '{\"type\":\"service_order_accept\",\"item_id\":49,\"service_name\":\"ytytytyt\",\"requester_user_id\":3,\"service_owner_id\":3,\"title\":\" Accept  Order\",\"body\":\"Your Order is accepted\"}', '2022-03-05 14:46:45', '2022-03-04 10:05:18', '2022-03-05 14:46:45'),
('c7f548dc-36f5-48f4-8a21-a8d3f6c6454c', 'App\\Notifications\\web\\AcceptOrder\\AcceptOrderNotification', 'App\\Models\\User', 2, '{\"type\":\"service_order_accept\",\"item_id\":7,\"service_name\":\"Nam Nam incidunt es\",\"requester_user_id\":2,\"service_owner_id\":2,\"title\":\" Accept  Order\",\"body\":\"Your Order is accepted\"}', '2022-01-07 15:00:00', '2022-01-07 14:59:35', '2022-01-07 15:00:00'),
('d1cda592-7d36-4891-9cc7-d872e21370f6', 'App\\Notifications\\web\\AcceptOrder\\AcceptOrderNotification', 'App\\Models\\User', 3, '{\"type\":\"service_order_accept\",\"item_id\":10,\"service_name\":\"Nam Nam incidunt es\",\"requester_user_id\":3,\"service_owner_id\":3,\"title\":\" Accept  Order\",\"body\":\"Your Order is accepted\"}', '2022-02-21 17:20:37', '2022-02-20 05:01:19', '2022-02-21 17:20:37'),
('d2016de8-9c1a-4975-9a76-ba4b49523001', 'App\\Notifications\\web\\ServiceRequestsNotification', 'App\\Models\\User', 1, '{\"type\":\"service_request\",\"item_id\":44,\"service_name\":\"New service\",\"requester_user_id\":4,\"title\":\" \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\",\"body\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\"}', '2022-03-04 11:05:08', '2022-02-22 12:31:28', '2022-03-04 11:05:08'),
('d9a04412-f873-4274-9232-edbe7d5f9459', 'App\\Notifications\\web\\ServiceRequestsNotification', 'App\\Models\\User', 1, '{\"type\":\"service_request\",\"item_id\":59,\"service_name\":\"New service\",\"requester_user_id\":1,\"title\":\" \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\",\"body\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\"}', NULL, '2022-03-04 12:47:06', '2022-03-04 12:47:06'),
('e3cebcbe-de13-4c67-b131-7487137e1b0e', 'App\\Notifications\\web\\ServiceRequestsNotification', 'App\\Models\\User', 2, '{\"type\":\"service_request\",\"item_id\":67,\"service_name\":\"ytytytyt\",\"requester_user_id\":3,\"title\":\" \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\",\"body\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\"}', '2022-03-06 04:18:59', '2022-03-06 04:18:44', '2022-03-06 04:18:59'),
('eeee03cf-cd82-4317-8b85-e5a65d6be35a', 'App\\Notifications\\web\\ServiceRequestsNotification', 'App\\Models\\User', 1, '{\"type\":\"service_request\",\"item_id\":11,\"service_name\":\"New service\",\"requester_user_id\":3,\"title\":\" \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\",\"body\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062e\\u062f\\u0645\\u0629\"}', '2022-02-20 05:01:35', '2022-02-19 19:14:47', '2022-02-20 05:01:35');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `status` enum('UNPAID','COMPLATED','CANCELED') NOT NULL,
  `charge_id` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `status`, `charge_id`, `created_at`, `updated_at`, `deleted_at`, `tax`) VALUES
(7, 2, 1710, 'UNPAID', NULL, '2022-02-20 07:00:41', '2022-02-02 17:54:31', NULL, NULL),
(8, 2, 54, 'UNPAID', NULL, '2022-02-20 07:00:39', '2022-02-02 17:54:31', NULL, NULL),
(9, 3, 846, 'UNPAID', NULL, '2022-02-19 18:55:47', '2022-02-19 18:55:47', NULL, NULL),
(10, 3, 128, 'UNPAID', NULL, '2022-02-19 19:14:47', '2022-02-19 19:14:47', NULL, NULL),
(11, 3, 96, 'UNPAID', 'ch_3KVKn6IhXP673v2O1ks9EX1X', '2022-02-20 17:06:48', '2022-02-20 17:06:48', NULL, NULL),
(12, 3, 27918, 'UNPAID', 'ch_3KVKtZIhXP673v2O1VLIY8pm', '2022-02-20 17:13:26', '2022-02-20 17:13:26', NULL, NULL),
(13, 3, 1056, 'UNPAID', 'pi_3KVL7AIhXP673v2O1RquSLrt', '2022-02-20 17:27:32', '2022-02-20 17:27:32', NULL, NULL),
(35, 3, 32, 'UNPAID', 'pi_3KVhQgIhXP673v2O06HthRij', '2022-02-21 17:17:06', '2022-02-21 17:17:06', NULL, NULL),
(43, 4, 256, 'UNPAID', 'pi_3KVzJsIhXP673v2O2etxWLls', '2022-02-22 12:23:15', '2022-02-22 12:23:15', NULL, NULL),
(44, 4, 1056, 'UNPAID', 'pi_3KVzMbIhXP673v2O0CIy0j6W', '2022-02-22 12:26:04', '2022-02-22 12:26:04', NULL, NULL),
(45, 4, 1056, 'UNPAID', 'pi_3KVzMcIhXP673v2O2HArGpNF', '2022-02-22 12:26:05', '2022-02-22 12:26:05', NULL, NULL),
(46, 4, 1056, 'COMPLATED', 'pi_3KVzNMIhXP673v2O043UgbUn', '2022-02-22 14:29:43', '2022-02-22 12:29:43', NULL, NULL),
(47, 4, 1056, 'COMPLATED', 'pi_3KVzRRIhXP673v2O1DtULMMD', '2022-02-22 14:31:28', '2022-02-22 12:31:28', NULL, NULL),
(48, 3, 846, 'UNPAID', 'pi_3KY5HbIhXP673v2O1XB5rlAB', '2022-02-28 07:09:26', '2022-02-28 07:09:26', NULL, NULL),
(49, 3, 846, 'UNPAID', 'pi_3KY5LXIhXP673v2O14tww1nh', '2022-02-28 07:13:32', '2022-02-28 07:13:32', NULL, NULL),
(50, 3, 846, 'UNPAID', 'pi_3KY9YtIhXP673v2O0vkoakSl', '2022-02-28 11:43:32', '2022-02-28 11:43:32', NULL, NULL),
(51, 3, 846, 'COMPLATED', 'pi_3KY9vCIhXP673v2O0bEtsvms', '2022-02-28 14:33:59', '2022-02-28 12:33:59', NULL, NULL),
(52, 3, 10479, 'COMPLATED', 'pi_3KYD1UIhXP673v2O09g5TUEk', '2022-02-28 17:29:15', '2022-02-28 15:29:15', NULL, NULL),
(53, 3, 15, 'COMPLATED', 'pi_3KYmvxIhXP673v2O08Tpz1Fa', '2022-03-02 07:46:49', '2022-03-02 05:46:49', NULL, NULL),
(54, 3, 32, 'COMPLATED', 'pi_3KZH2tIhXP673v2O0GqbN7xJ', '2022-03-03 15:58:08', '2022-03-03 13:58:08', NULL, NULL),
(55, 3, 15, 'UNPAID', 'pi_3KZJu6IhXP673v2O1d3ZAH2y', '2022-03-03 16:58:11', '2022-03-03 16:58:11', NULL, NULL),
(56, 3, 15, 'COMPLATED', 'pi_3KZJvzIhXP673v2O1r6mXO7D', '2022-03-03 19:01:31', '2022-03-03 17:01:31', NULL, NULL),
(57, 3, 8787, 'UNPAID', 'pi_3KZKzHIhXP673v2O0qBBAHlu', '2022-03-03 18:07:36', '2022-03-03 18:07:36', NULL, NULL),
(58, 3, 8787, 'COMPLATED', 'pi_3KZL2FIhXP673v2O0pmK7Pwp', '2022-03-03 20:11:41', '2022-03-03 18:11:41', NULL, NULL),
(59, 2, 2538, 'COMPLATED', 'pi_3KZL5vIhXP673v2O1ZBSpFnu', '2022-03-03 20:15:24', '2022-03-03 18:15:24', NULL, NULL),
(60, 2, 1692, 'UNPAID', 'pi_3KZLZsIhXP673v2O08RqMmr1', '2022-03-03 18:45:25', '2022-03-03 18:45:25', NULL, NULL),
(61, 1, 9697, 'COMPLATED', 'pi_3KZcRrIhXP673v2O1yMYZ8Wo', '2022-03-04 14:47:03', '2022-03-04 12:47:03', NULL, NULL),
(62, 1, 8787, 'COMPLATED', 'pi_3KZcXMIhXP673v2O2qLLbnWh', '2022-03-04 14:52:20', '2022-03-04 12:52:20', NULL, NULL),
(63, 1, 17574, 'COMPLATED', 'pi_3KZedOIhXP673v2O2qNO06xY', '2022-03-04 17:06:43', '2022-03-04 15:06:43', NULL, NULL),
(64, 3, 17574, 'COMPLATED', 'pi_3Ka0fHIhXP673v2O0tTj8N1x', '2022-03-05 16:38:15', '2022-03-05 14:38:15', NULL, NULL),
(65, 3, 45, 'UNPAID', 'pi_3Ka1HfIhXP673v2O2pjmu0to', '2022-03-05 15:17:21', '2022-03-05 15:17:21', NULL, NULL),
(66, 3, 50, 'COMPLATED', 'pi_3Ka2nDIhXP673v2O0NwfPhmW', '2022-03-05 18:54:29', '2022-03-05 16:54:29', NULL, 5),
(67, 3, 19331, 'COMPLATED', 'pi_3KaDTCIhXP673v2O13oQKmhm', '2022-03-06 06:18:41', '2022-03-06 04:18:41', NULL, 1757);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double UNSIGNED NOT NULL,
  `user_owner_service_id` bigint(20) UNSIGNED NOT NULL,
  `in_progress` int(11) DEFAULT NULL,
  `is_complete` int(11) DEFAULT NULL,
  `is_canceled` int(11) DEFAULT NULL,
  `is_delivered` int(11) DEFAULT NULL,
  `waiting_acceptance` int(11) DEFAULT NULL,
  `finished` int(11) DEFAULT NULL,
  `notes` longtext,
  `attachment` text,
  `delivery_title` text,
  `delivery_desc` longtext,
  `delivery_attachment` text,
  `review_title` text,
  `review_desc` longtext,
  `review_attachment` text,
  `type` text,
  `review_item_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `service_id`, `quantity`, `price`, `user_owner_service_id`, `in_progress`, `is_complete`, `is_canceled`, `is_delivered`, `waiting_acceptance`, `finished`, `notes`, `attachment`, `delivery_title`, `delivery_desc`, `delivery_attachment`, `review_title`, `review_desc`, `review_attachment`, `type`, `review_item_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 7, 29, 2, 846, 1, 0, 0, 0, 0, 0, 1, 'Moss', 'f22e712478809c91363c4f163ef63dcc.png', NULL, NULL, NULL, NULL, NULL, NULL, 'deliver', NULL, '2022-01-07 18:05:41', '2022-01-07 17:05:41', NULL),
(10, 9, 29, 1, 846, 1, 1, 0, 0, 0, 0, 0, 'sdlksdf', 'b485a82d77a8ce024e37413641333579.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-20 07:01:18', '2022-02-20 05:01:18', NULL),
(11, 10, 31, 4, 32, 1, 0, 0, 0, NULL, 1, NULL, 'lskmdsd', '4106fa245b8640ff131717f3b7bf7880.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-19 19:14:47', '2022-02-19 19:14:47', NULL),
(12, 11, 31, 3, 32, 1, 0, 0, 0, NULL, 1, NULL, 'lkdflksdflkasfd', '22cef9524c952a9512b0c4e2434ca482.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-20 17:06:48', '2022-02-20 17:06:48', NULL),
(13, 12, 29, 33, 846, 1, 0, 0, 0, NULL, 1, NULL, 'سيبسيب', '14f0eb59b3c884a252c1f9a82eaea937.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-20 17:13:26', '2022-02-20 17:13:26', NULL),
(14, 13, 31, 33, 32, 1, 0, 0, 0, NULL, 1, NULL, 'sdfsdf', '0d565cb635b02ca89d8b8adff58e9bf1.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-20 17:27:32', '2022-02-20 17:27:32', NULL),
(33, 35, 31, 1, 32, 1, 0, 0, 0, NULL, 1, NULL, 'lsdkfsldf', 'bbf1edbba1372190418f5baeaeb6c17a.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-21 17:17:06', '2022-02-21 17:17:06', NULL),
(40, 43, 31, 8, 32, 1, 0, 0, 0, NULL, 1, NULL, 'LKJKLN', '214eaf4f6b1a71d79fee9d367fa59194.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-22 12:23:15', '2022-02-22 12:23:15', NULL),
(41, 44, 31, 33, 32, 1, 0, 0, 0, NULL, 1, NULL, ';dls,fsdf', '8893ab644866ac94348265997e1ef063.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-22 12:26:04', '2022-02-22 12:26:04', NULL),
(42, 45, 31, 33, 32, 1, 0, 0, 0, NULL, 1, NULL, ';dls,fsdf', '8893ab644866ac94348265997e1ef063.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-22 12:26:05', '2022-02-22 12:26:05', NULL),
(43, 46, 31, 33, 32, 1, 0, 0, 0, NULL, 1, NULL, ';dls,fsdf', '8893ab644866ac94348265997e1ef063.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-22 12:26:51', '2022-02-22 12:26:51', NULL),
(44, 47, 31, 33, 32, 1, 0, 0, 0, NULL, 1, NULL, ';dls,fsdf', '8893ab644866ac94348265997e1ef063.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-22 12:31:04', '2022-02-22 12:31:04', NULL),
(45, 48, 29, 1, 846, 1, 0, 0, 0, NULL, 1, NULL, 'sad', 'bb86cfa7535a90651b0e178ab778fa4f.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-28 07:09:26', '2022-02-28 07:09:26', NULL),
(46, 49, 29, 1, 846, 1, 0, 0, 0, NULL, 1, NULL, 'sad', 'bb86cfa7535a90651b0e178ab778fa4f.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-28 07:13:32', '2022-02-28 07:13:32', NULL),
(47, 50, 29, 1, 846, 1, 0, 0, 0, NULL, 1, NULL, 'sad', 'bb86cfa7535a90651b0e178ab778fa4f.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-28 11:43:32', '2022-02-28 11:43:32', NULL),
(48, 51, 29, 1, 846, 1, 0, 0, 0, NULL, 1, NULL, 'sad', 'bb86cfa7535a90651b0e178ab778fa4f.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-28 12:06:36', '2022-02-28 12:06:36', NULL),
(49, 52, 51, 1, 8787, 2, 0, 0, 0, 1, 0, 0, 'شسيشسي', 'cf7bce62c68a884e6867ed4766dd90e1.png', NULL, NULL, NULL, NULL, NULL, NULL, 'deliver', NULL, '2022-03-04 12:05:33', '2022-03-04 10:05:33', NULL),
(50, 52, 29, 2, 846, 1, 0, 0, 0, NULL, 1, NULL, '4', 'c4f641de31805748d32e1a68198e1418.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-28 15:25:17', '2022-02-28 15:25:17', NULL),
(51, 53, 30, 1, 15, 2, 0, 0, 0, NULL, 1, NULL, 'لبيل', 'fcb4d14f9e5c5a1d0978cd318b1f5ff1.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-02 05:46:00', '2022-03-02 05:46:00', NULL),
(52, 54, 31, 1, 32, 1, 0, 0, 0, NULL, 1, NULL, 'test', '3de664a1f9c30349a5a05d45c1c87040.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-03 13:55:08', '2022-03-03 13:55:08', NULL),
(53, 55, 30, 1, 15, 2, 0, 0, 0, NULL, 1, NULL, 'lsdmkf', '8af68389b1c2745066394514adadab04.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-03 16:58:11', '2022-03-03 16:58:11', NULL),
(54, 56, 30, 1, 15, 2, 0, 0, 0, NULL, 1, NULL, 'lsdmkf', '8af68389b1c2745066394514adadab04.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-03 17:00:08', '2022-03-03 17:00:08', NULL),
(55, 57, 51, 1, 8787, 2, 0, 0, 0, NULL, 1, NULL, 'wer', '8552ee14293d2e2ca99d01532a7c17fc.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-03 18:07:36', '2022-03-03 18:07:36', NULL),
(56, 58, 51, 1, 8787, 2, 0, 0, 0, NULL, 1, NULL, 'wer', '8552ee14293d2e2ca99d01532a7c17fc.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-03 18:10:40', '2022-03-03 18:10:40', NULL),
(57, 59, 29, 3, 846, 1, 0, 0, 0, NULL, 1, NULL, 'lsdmfsd', 'b138b985495ab0ed50ef845aa726f969.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-03 18:14:29', '2022-03-03 18:14:29', NULL),
(58, 60, 29, 2, 846, 1, 0, 0, 0, NULL, 1, NULL, 'we', '9741b0d20bcdf31aa2dbbfb65e8cbd95.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-03 18:45:25', '2022-03-03 18:45:25', NULL),
(59, 61, 31, 2, 32, 1, 0, 0, 0, NULL, 1, NULL, '2', 'cef5e4dee55bb667ed3b7e1c169aeb79.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-04 12:46:15', '2022-03-04 12:46:15', NULL),
(60, 61, 29, 1, 846, 1, 0, 0, 0, NULL, 1, NULL, 'سيب', '649b8025e054728a8b0a81e2c8c52310.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-04 12:46:15', '2022-03-04 12:46:15', NULL),
(61, 61, 51, 1, 8787, 2, 0, 0, 0, NULL, 1, NULL, 'sdf', '7a2a69d8f765abf16bb4a0461137e532.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-04 12:46:15', '2022-03-04 12:46:15', NULL),
(62, 62, 51, 1, 8787, 2, 0, 0, 0, NULL, 1, NULL, 'awd', '3eb014024c211894619ebb71c9ca578f.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-04 12:51:56', '2022-03-04 12:51:56', NULL),
(63, 63, 51, 2, 8787, 2, 0, 0, 0, NULL, 1, NULL, 'lksdf', '7a06c0371c99fd2b4b9f3a1a14f0604e.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-04 15:06:17', '2022-03-04 15:06:17', NULL),
(64, 64, 51, 2, 8787, 2, 0, 0, 0, NULL, 1, NULL, 'dsad', '0d77e2640ccb9bb95649e61cc65f8087.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-05 14:37:44', '2022-03-05 14:37:44', NULL),
(65, 65, 30, 3, 15, 2, 0, 0, 0, NULL, 1, NULL, 'asd', '1ea754cf09978e71a23dec846f464c1e.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-05 15:17:21', '2022-03-05 15:17:21', NULL),
(66, 66, 30, 3, 15, 2, 0, 0, 0, NULL, 1, NULL, 'asd', '1ea754cf09978e71a23dec846f464c1e.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-05 16:54:00', '2022-03-05 16:54:00', NULL),
(67, 67, 51, 2, 8787, 2, 0, 0, 0, 0, 0, 1, 'asd', '3b61c07f26f5bd46af1fffa27d25f402.png', NULL, NULL, NULL, NULL, NULL, NULL, 'deliver', NULL, '2022-03-06 06:20:17', '2022-03-06 04:20:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items_additional_services`
--

DROP TABLE IF EXISTS `order_items_additional_services`;
CREATE TABLE IF NOT EXISTS `order_items_additional_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `additional_services_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_items_additional_services`
--

INSERT INTO `order_items_additional_services` (`id`, `order_id`, `service_id`, `additional_services_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 63, 51, 56, '2022-03-04 15:06:17', '2022-03-04 15:06:46', NULL),
(5, 63, 51, 55, '2022-03-04 15:06:17', '2022-03-04 15:06:46', NULL),
(3, 62, 51, 55, '2022-03-04 12:51:56', '2022-03-04 12:52:25', '2022-03-04 12:52:25'),
(4, 62, 51, 56, '2022-03-04 12:51:56', '2022-03-04 12:52:25', '2022-03-04 12:52:25'),
(7, 64, 51, 55, '2022-03-05 14:37:44', '2022-03-05 14:37:44', NULL),
(8, 64, 51, 56, '2022-03-05 14:37:44', '2022-03-05 14:37:44', NULL),
(9, 67, 51, 55, '2022-03-06 04:18:05', '2022-03-06 04:18:05', NULL),
(10, 67, 51, 56, '2022-03-06 04:18:05', '2022-03-06 04:18:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_movements_item`
--

DROP TABLE IF EXISTS `order_movements_item`;
CREATE TABLE IF NOT EXISTS `order_movements_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_item_id` int(11) DEFAULT NULL,
  `title` text,
  `desc` longtext,
  `attachment` text,
  `type` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_movements_item`
--

INSERT INTO `order_movements_item` (`id`, `order_item_id`, `title`, `desc`, `attachment`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 7, 'trrt', 'lkdfdf', '8bcbe3328e7c718440c3766332cc36d1.png', 'finished', '2022-01-07 14:59:55', '2022-01-07 17:05:41', NULL),
(12, 9, 'yyyy', 'uuuuu', '2ede9119c103a4a9c1cd7fba083fe422.png', 'deliver', '2022-01-07 17:08:01', '2022-01-07 17:08:01', NULL),
(13, 9, 'ioooo', 'p[[[', 'dd24c21e82102bc934f18805e941d8ba.png', 'review', '2022-01-07 17:08:26', '2022-01-07 17:08:26', NULL),
(14, 9, 'pop', '[popopo', 'acbd547673529ccf87632f9b99fd5fb0.png', 'finished', '2022-01-07 17:09:06', '2022-01-07 17:09:25', NULL),
(15, 49, 'llll', 'lkmlk', '3cc8de34c0d4cd7d84f929f1acea2c48.jpg', 'deliver', '2022-03-04 10:05:33', '2022-03-04 10:05:33', NULL),
(16, 67, 'eeee', 'fsdfsdf', '7f21635bf3894566a01470029d3ed3cc.png', 'deliver', '2022-03-06 04:19:35', '2022-03-06 04:19:35', NULL),
(17, 67, 'asdsdasd', 'sdfsdfsdf', 'cd7fd810e12e61ada2a0c88b28e78212.png', 'review', '2022-03-06 04:19:48', '2022-03-06 04:19:48', NULL),
(18, 67, 'asdsad', 'asdasd', '007fcc901c3b61512bb9b1041c2a8979.jpg', 'finished', '2022-03-06 04:20:02', '2022-03-06 04:20:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '366402786', '2021-12-26 10:43:50'),
('admin@gmail.com', '735652609', '2021-12-30 12:58:08'),
('admin@gmail.com', '712500784', '2021-12-30 12:58:16');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 18, 'MyToken', 'f36a55325c8ae1d1b24020f37bff15bf1f7c83a0a3a83acd24e0ee6176f3b2b8', '[\"*\"]', NULL, '2021-12-24 12:35:34', '2021-12-24 12:35:34'),
(2, 'App\\Models\\User', 18, 'MyAuthApp', 'c643baf307342401f3f1811df6248fbf48c5cede76d1cb408b210bd8cbc31c31', '[\"*\"]', NULL, '2021-12-26 14:31:57', '2021-12-26 14:31:57'),
(3, 'App\\Models\\User', 18, 'MyAuthApp', '714ecb8cde8119d3756347568767844f1a7c1a7160aca09be9077578ea938a22', '[\"*\"]', NULL, '2021-12-26 14:39:48', '2021-12-26 14:39:48'),
(4, 'App\\Models\\User', 19, 'MyToken', 'b6a74bf70dfc1c5bbae7892ec4bc31cf7c6f4926f95feac8458f6f344ed653bf', '[\"*\"]', NULL, '2021-12-27 17:11:25', '2021-12-27 17:11:25'),
(5, 'App\\Models\\User', 18, 'MyAuthApp', 'd381e2e429ac73e85982f8fefbc141cae6de551ab9a886f5c7301bc02d0e52b3', '[\"*\"]', NULL, '2021-12-27 17:50:40', '2021-12-27 17:50:40'),
(6, 'App\\Models\\User', 18, 'MyAuthApp', 'fc78d910d851a63836b1d0a260b73d5a5e3d8187d54e1e1ea435eaba7a5fba60', '[\"*\"]', '2022-01-03 18:30:10', '2021-12-28 07:42:40', '2022-01-03 18:30:10'),
(7, 'App\\Models\\User', 18, 'MyAuthApp', '652cdb4f1a7505e16bf59487a2d32ac031db28987d945b2786f2fe291789b9de', '[\"*\"]', '2021-12-30 14:02:20', '2021-12-29 09:25:28', '2021-12-30 14:02:20'),
(8, 'App\\Models\\User', 18, 'MyAuthApp', '6fde4ed74b1608e8acaf3fc48a7d2bbc0014aa4932471b9f316ce58b977f13d0', '[\"*\"]', '2021-12-30 14:03:19', '2021-12-30 02:46:32', '2021-12-30 14:03:19'),
(9, 'App\\Models\\User', 18, 'MyAuthApp', 'fdc99d0f472ae19101467752914b75091e90304878ba6e4970d31fbc4c012273', '[\"*\"]', NULL, '2021-12-30 12:55:27', '2021-12-30 12:55:27'),
(10, 'App\\Models\\User', 20, 'MyToken', '6b73c3cdd219a09ef432fab80a2b9b76e955af4204ddeca6394efe54904b0e80', '[\"*\"]', NULL, '2021-12-30 13:11:29', '2021-12-30 13:11:29'),
(11, 'App\\Models\\User', 20, 'MyToken', '026cb5533446fd6a077f90444de8c9d711bbee93b12dfe3762eb239681c9bc0d', '[\"*\"]', NULL, '2021-12-30 13:11:37', '2021-12-30 13:11:37'),
(12, 'App\\Models\\User', 21, 'MyToken', '88b76ca6eee039c12e5da397bad41e576d9230cb340014864405be89ecea0137', '[\"*\"]', NULL, '2021-12-30 13:11:41', '2021-12-30 13:11:41'),
(13, 'App\\Models\\User', 18, 'MyAuthApp', 'c81870bebed39e0a94db7cdb49c6822e5472bd41575158a65bffdcae7fa42035', '[\"*\"]', NULL, '2021-12-30 13:59:49', '2021-12-30 13:59:49'),
(14, 'App\\Models\\User', 3, 'MyAuthApp', '96671ed5dfdd3fe38afa192d3764f8fda92a40babca2ff0661ee5cd2ac442ea1', '[\"*\"]', NULL, '2022-01-03 18:15:22', '2022-01-03 18:15:22');

-- --------------------------------------------------------

--
-- Table structure for table `recently_views`
--

DROP TABLE IF EXISTS `recently_views`;
CREATE TABLE IF NOT EXISTS `recently_views` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `screens`
--

DROP TABLE IF EXISTS `screens`;
CREATE TABLE IF NOT EXISTS `screens` (
  `id` int(11) NOT NULL,
  `screen_code` varchar(50) NOT NULL,
  `screen_name` varchar(191) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `screens`
--

INSERT INTO `screens` (`id`, `screen_code`, `screen_name`) VALUES
(1, 'web.general', 'web.general');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` longtext,
  `description` longtext,
  `sub_category_id` longtext,
  `deliver_time` text,
  `details_for_customer` longtext,
  `image` text,
  `price` int(11) DEFAULT NULL,
  `admin_accept` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `user_id`, `title`, `description`, `sub_category_id`, `deliver_time`, `details_for_customer`, `image`, `price`, `admin_accept`, `created_at`, `updated_at`, `deleted_at`) VALUES
(28, 1, 'Test Test Test', 'Test Description', '2', '4', 'Test Test', NULL, 18, 1, '2022-01-07 12:03:44', '2022-02-14 15:46:32', '2022-02-14 15:46:32'),
(29, 1, 'Nam Nam incidunt es', 'Consequuntur tempore', '2', '22', 'Error omnis reprehen', NULL, 846, 1, '2022-01-07 12:17:51', '2022-01-07 12:17:51', NULL),
(30, 2, 'tttt', 'wewqewerewrwer', '2', '2', 'lksdsdflksdf', NULL, 15, 1, '2022-01-07 13:33:36', '2022-02-02 17:54:31', NULL),
(31, 1, 'New service', 'kkk', '1', '0', 'kkklsadasd', NULL, 32, 1, '2022-01-24 16:07:17', '2022-02-03 16:50:45', NULL),
(32, 3, 'new  service', 'Description', '1', '3', 'sdfsdfsdfsd', NULL, 0, 1, '2022-02-05 17:07:27', '2022-02-05 17:09:22', NULL),
(50, 15, '594', 'Vero itaque ut et an', '3', '955', 'Tempor natus qui occ', NULL, 618, 1, '2022-02-08 17:19:03', '2022-02-10 17:53:45', '2022-02-10 17:53:45'),
(51, 2, 'ytytytyt', 'ghfgfghfhgf', '2', '76', 'hghjgjkhkjhkjh', NULL, 8787, 1, '2022-02-16 17:59:53', '2022-02-16 17:59:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_comments`
--

DROP TABLE IF EXISTS `service_comments`;
CREATE TABLE IF NOT EXISTS `service_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `comment` longtext,
  `rate` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_comments`
--

INSERT INTO `service_comments` (`id`, `service_id`, `user_id`, `seller_id`, `comment`, `rate`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 28, 2, 1, 'thanks you', '4', '2022-01-07 17:09:25', '2022-01-07 17:09:25', '2022-01-07 18:37:35'),
(4, 28, 2, 1, 'thanks you', '3', '2022-01-07 17:09:25', '2022-02-02 17:54:31', '2022-02-02 17:54:31'),
(5, 28, 2, 1, 'thanks you', '1', '2022-01-07 17:09:25', '2022-02-02 17:54:31', '2022-02-02 17:54:31'),
(6, 28, 2, 1, 'thanks you', '4', '2022-01-07 17:09:25', '2022-02-02 17:54:31', '2022-02-02 17:54:31'),
(7, 28, 2, 1, 'thanks you', '2', '2022-01-07 17:09:25', '2022-02-02 17:54:31', '2022-02-02 17:54:31'),
(8, 28, 2, 1, 'thanks you', '5', '2022-01-07 17:09:25', '2022-02-02 17:54:31', '2022-02-02 17:54:31'),
(9, 51, 3, 2, 'asdasdasdasd', '4', '2022-03-06 04:20:17', '2022-03-06 04:20:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_images`
--

DROP TABLE IF EXISTS `service_images`;
CREATE TABLE IF NOT EXISTS `service_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) DEFAULT NULL,
  `image` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_images`
--

INSERT INTO `service_images` (`id`, `service_id`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 28, '8530b4e31a9063eaa86d421ecd13fd9e.png', '2022-01-07 12:03:44', '2022-02-14 15:46:33', '2022-02-14 15:46:33'),
(2, 28, '6d24c5aeb02106a1b5eb1d12de2428fd.png', '2022-01-07 12:03:44', '2022-02-14 15:46:33', '2022-02-14 15:46:33'),
(3, 28, 'a5ab78cf348fcfa43ea90a30af76b21b.png', '2022-01-07 12:03:44', '2022-02-14 15:46:33', '2022-02-14 15:46:33'),
(4, 28, '5d0e55184bd771768e6c90717a3e7852.png', '2022-01-07 12:03:44', '2022-02-14 15:46:33', '2022-02-14 15:46:33'),
(5, 29, 'd2702e38e9ffc1d2efc922e1bc49a059.png', '2022-01-07 12:17:51', '2022-01-07 12:17:51', NULL),
(6, 29, '4734c5aa69c653aa26d32e984edb933e.png', '2022-01-07 12:17:51', '2022-01-07 12:17:51', NULL),
(7, 30, '32ec0763c561d531b2a79e7d55128fb1.png', '2022-01-07 13:33:36', '2022-01-07 13:33:36', NULL),
(8, 30, 'd5e81683ba0caa3a6422832ca2e08286.png', '2022-01-07 13:33:36', '2022-01-07 13:33:36', NULL),
(9, 31, 'db61ea7ec37a327d8582891b0b8bc13f.png', '2022-01-24 16:07:17', '2022-01-24 16:07:17', NULL),
(10, 32, 'b38d4fecde920e760f9f208d867192b7.png', '2022-02-05 17:07:27', '2022-02-05 17:09:22', NULL),
(11, 50, 'bcb1a8f35d6f5b531f2ab041efae268b.png', '2022-02-08 17:19:03', '2022-02-08 17:19:03', NULL),
(12, 50, '0c99fc14c20c451de5809874131bdb6d.png', '2022-02-08 17:19:03', '2022-02-08 17:19:03', NULL),
(13, 50, '3f9de87bf8d0b1be79ee5a38c0806dd0.png', '2022-02-08 17:19:03', '2022-02-08 17:19:03', NULL),
(14, 50, 'e6b31c799fcb0fccadb5d9a50c733778.png', '2022-02-08 17:19:03', '2022-02-08 17:19:03', NULL),
(15, 28, '8530b4e31a9063eaa86d421ecd13fd9e.png', '2022-01-07 12:03:44', '2022-02-14 15:46:33', '2022-02-14 15:46:33'),
(16, 28, '6d24c5aeb02106a1b5eb1d12de2428fd.png', '2022-01-07 12:03:44', '2022-02-14 15:46:33', '2022-02-14 15:46:33'),
(17, 28, 'a5ab78cf348fcfa43ea90a30af76b21b.png', '2022-01-07 12:03:44', '2022-02-14 15:46:33', '2022-02-14 15:46:33'),
(18, 28, '5d0e55184bd771768e6c90717a3e7852.png', '2022-01-07 12:03:44', '2022-02-14 15:46:33', '2022-02-14 15:46:33'),
(19, 28, '8530b4e31a9063eaa86d421ecd13fd9e.png', '2022-01-07 12:03:44', '2022-02-14 15:46:33', '2022-02-14 15:46:33'),
(20, 28, '6d24c5aeb02106a1b5eb1d12de2428fd.png', '2022-01-07 12:03:44', '2022-02-14 15:46:33', '2022-02-14 15:46:33'),
(21, 28, 'a5ab78cf348fcfa43ea90a30af76b21b.png', '2022-01-07 12:03:44', '2022-02-14 15:46:33', '2022-02-14 15:46:33'),
(22, 28, '5d0e55184bd771768e6c90717a3e7852.png', '2022-01-07 12:03:44', '2022-02-14 15:46:33', '2022-02-14 15:46:33'),
(23, 51, 'f364813ecc836718f069e82e33cf41ec.jpeg', '2022-02-16 17:59:53', '2022-02-16 17:59:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_questions`
--

DROP TABLE IF EXISTS `service_questions`;
CREATE TABLE IF NOT EXISTS `service_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `question` longtext,
  `answer` longtext,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_questions`
--

INSERT INTO `service_questions` (`id`, `service_id`, `question`, `answer`, `created_at`, `updated_at`, `deleted_at`) VALUES
(19, 28, 'test question', 'test answer', '2022-01-07 12:03:44', '2022-02-14 15:46:33', '2022-02-14 15:46:33'),
(20, 29, 'Omnis necessitatibus', 'Anim dolor nesciunt', '2022-01-07 12:17:51', '2022-01-07 12:17:51', NULL),
(21, 30, 'tttt', 'tttt', '2022-01-07 13:33:36', '2022-01-07 13:33:36', NULL),
(22, 31, 'test', 'test asldasd', '2022-01-24 16:07:17', '2022-01-24 16:07:17', NULL),
(23, 32, 'test q', 'test A', '2022-02-05 17:07:27', '2022-02-05 17:09:22', '2022-02-05 17:09:22'),
(24, 39, 'Sit veritatis nobis', 'Et quos aperiam sed', '2022-02-08 15:49:08', '2022-02-08 15:49:08', NULL),
(25, 41, 'Unde vitae nihil tem', 'Eos sint quis amet', '2022-02-08 17:05:49', '2022-02-08 17:05:49', NULL),
(26, 42, 'Unde vitae nihil tem', 'Eos sint quis amet', '2022-02-08 17:09:17', '2022-02-08 17:09:17', NULL),
(27, 43, 'Id quia voluptatem', 'Non non quis dolores', '2022-02-08 17:13:42', '2022-02-08 17:13:42', NULL),
(28, 44, 'Id quia voluptatem', 'Non non quis dolores', '2022-02-08 17:14:39', '2022-02-08 17:14:39', NULL),
(29, 48, 'Id quia voluptatem', 'Non non quis dolores', '2022-02-08 17:17:26', '2022-02-08 17:17:26', NULL),
(30, 50, 'Id quia voluptatem', 'Non non quis dolores', '2022-02-08 17:19:03', '2022-02-08 17:19:03', NULL),
(31, 51, 'kjhjkhk', 'kjk', '2022-02-16 17:59:53', '2022-02-16 17:59:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_tags`
--

DROP TABLE IF EXISTS `service_tags`;
CREATE TABLE IF NOT EXISTS `service_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `tag` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_tags`
--

INSERT INTO `service_tags` (`id`, `service_id`, `tag`, `created_at`, `updated_at`, `deleted_at`) VALUES
(36, 28, 'Test', '2022-01-07 12:03:44', '2022-02-14 15:46:33', '2022-02-14 15:46:33'),
(37, 29, 'Nisi et qui est ipsa', '2022-01-07 12:17:51', '2022-01-07 12:17:51', NULL),
(38, 29, 'Vitae ut sequi saepe.', '2022-01-07 12:17:51', '2022-01-07 12:17:51', NULL),
(39, 30, '2', '2022-01-07 13:33:36', '2022-01-07 13:33:36', NULL),
(40, 31, 'iii', '2022-01-24 16:07:17', '2022-01-24 16:07:17', NULL),
(41, 32, 'test', '2022-02-05 17:07:27', '2022-02-05 17:09:22', '2022-02-05 17:09:22'),
(42, 39, 'Ccl', '2022-02-08 15:49:08', '2022-02-08 15:49:08', NULL),
(43, 41, 'dd', '2022-02-08 17:05:49', '2022-02-08 17:05:49', NULL),
(44, 42, 'dd', '2022-02-08 17:09:17', '2022-02-08 17:09:17', NULL),
(45, 43, 'Soluta', '2022-02-08 17:13:42', '2022-02-08 17:13:42', NULL),
(46, 44, 'Soluta', '2022-02-08 17:14:39', '2022-02-08 17:14:39', NULL),
(47, 48, 'Soluta', '2022-02-08 17:17:26', '2022-02-08 17:17:26', NULL),
(48, 50, 'Soluta', '2022-02-08 17:19:03', '2022-02-08 17:19:03', NULL),
(49, 51, 'test', '2022-02-16 17:59:53', '2022-02-16 17:59:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stripe_tax` int(11) NOT NULL DEFAULT '0',
  `system_tax` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `stripe_tax`, `system_tax`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 5, 16, '2022-03-05 17:29:43', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stripe_customers_accounts`
--

DROP TABLE IF EXISTS `stripe_customers_accounts`;
CREATE TABLE IF NOT EXISTS `stripe_customers_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `customer_stripe_id` int(11) NOT NULL,
  `customer_stripe_account` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

DROP TABLE IF EXISTS `sub_category`;
CREATE TABLE IF NOT EXISTS `sub_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name_en` text,
  `name_ar` text,
  `image` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `category_id`, `name_en`, `name_ar`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'Test English', 'تست عربي 44', 'dd5d99086b7892a1a321a5cdd71b037c.png', '2022-03-01 13:41:33', '2022-03-01 11:41:33', NULL),
(2, 2, 'Test English 2', 'تست عربي 2', 'd0c3ce1ea6e76f24172f302ebd532a8c.png', '2022-03-02 17:43:41', '2022-03-02 15:43:41', NULL),
(3, 10, '66666Test English 3', 'تست عربي 3 6666', NULL, '2022-02-24 16:06:24', '2022-02-24 14:06:24', '2022-02-24 14:06:24'),
(4, 3, 'Test English 3', 'تست عربي 3', '448af4be982b374cfcd93ab1fc747802.png', '2022-03-02 17:43:52', '2022-03-02 15:43:52', NULL),
(5, 1, 'test new Sub cat En', 'test new Sub cat ar', '33f5d2e0d2a36bd5686460bc484b37fb.png', '2022-03-02 07:05:21', '2022-03-02 05:05:21', NULL),
(6, 2, 'Paul Gentry', 'Tatiana James', 'db444f843520334923eb09f5aaa0ce6b.png', '2022-03-02 17:44:20', '2022-03-02 15:44:20', NULL),
(7, 2, 'Mohammed Category', 'تصنيف محمد', '2f44343c60e56f5a12c405b409d2ed58.png', '2022-03-02 17:44:31', '2022-03-02 15:44:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_ar` text,
  `name_en` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` text COLLATE utf8mb4_unicode_ci,
  `service_owner` int(11) DEFAULT NULL,
  `country` text COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `education` text COLLATE utf8mb4_unicode_ci,
  `active` int(11) DEFAULT NULL,
  `deactivation_reason` text CHARACTER SET utf8,
  `deactivation_note` text CHARACTER SET utf8,
  `image` text COLLATE utf8mb4_unicode_ci,
  `certificate_image` text COLLATE utf8mb4_unicode_ci,
  `university` text COLLATE utf8mb4_unicode_ci,
  `work_title` text COLLATE utf8mb4_unicode_ci,
  `graduation_date` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_at` timestamp NULL DEFAULT NULL,
  `logout_at` timestamp NULL DEFAULT NULL,
  `social_provider_id` text COLLATE utf8mb4_unicode_ci,
  `social_provider` text COLLATE utf8mb4_unicode_ci,
  `device_key` longtext COLLATE utf8mb4_unicode_ci,
  `is_verified` int(11) DEFAULT NULL,
  `otp` text COLLATE utf8mb4_unicode_ci,
  `messages_push_notifications` int(11) DEFAULT NULL,
  `response_speed` int(11) DEFAULT NULL,
  `stripe_customer_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_stripe_account` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `user_type`, `service_owner`, `country`, `description`, `education`, `active`, `deactivation_reason`, `deactivation_note`, `image`, `certificate_image`, `university`, `work_title`, `graduation_date`, `remember_token`, `login_at`, `logout_at`, `social_provider_id`, `social_provider`, `device_key`, `is_verified`, `otp`, `messages_push_notifications`, `response_speed`, `stripe_customer_id`, `customer_stripe_account`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'محمد الشوربجي up', 'admin@adminup', NULL, '$2y$10$gJ9olG/YdtNiKhoBa8tWL.qxvSn3OvUM94IEjSL869g2UWf1ogW4C', '2', 0, 'United emiarte up', 'نبذة قصيرة عن اللمستخدم up', 'بكالوريوس - شبكات up', 1, NULL, NULL, 'a651def7fd094142e9d3eca3b2f6f3b0.png', 'b7f94446318dda02ad1d3a2e275ccea6.png', 'خليفة up', 'Web developer up', '2023-04-29', NULL, NULL, '2022-03-04 14:56:30', NULL, NULL, 'frFsSxQB43XUrp_YBJYUCy:APA91bHFYhTEbmFVqyud-27xMHCAc_4OQmfvPuaSX9_5vAGb67YvhtWxbRMvp4CIaDm_uuZOocAK8USNQ1M3SnvRv2NjoOMZERzFlfKRvPUM1sFs7_LqDhTw0sq9MD0cHxEi1AA-ByUQ', 1, NULL, NULL, NULL, 'cus_LG8j9846YdKfvt', NULL, '2021-11-10 18:01:04', '2022-03-04 15:05:56', NULL),
(2, 'Mostafa', 'admin@freelancer.ae3', NULL, '$2y$10$phGX5uBm54XbYPYhgrS9Aufvqb3SyANApHwbC8brVIxaBn2vtYx8e', '2', 0, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-06 04:40:16', NULL, NULL, 'cahZISampt0QvDtDShSiVi:APA91bF6NBAnCdk4TRPj3PLj0BbE7aold3wIRhl18ac9XVir3LgXNSCrPlxL_aXjQspz2EdgQvfBQUk_XxNaIM98mYMTmhPI3CobLxWZDBP9N38lEKfzEO3UNV3lHdkvSJbrzkiyutzu', 1, NULL, NULL, NULL, 'cus_LFqnOdPakhY7SS', NULL, '2021-11-13 19:25:28', '2022-03-06 04:40:16', NULL),
(3, 'test User', 'admin@freelancer.ae15', NULL, '$2y$10$XLnEIKU1F27YMZYNRqGOm.yLBJpFeadOvK8VN48IX/8UJbphD.216', '2', 1, 'Palestine', 'test desc', 'test', 1, NULL, NULL, '3bc372b7c468dfec32dd7d2d35f85aab.png', '0c6566eb2a82d9388bdbd834997c08e5.png', 'test', 'Test jon', '2021-11-03', NULL, NULL, '2022-03-06 17:05:18', NULL, NULL, 'dEIvJj1giBNueoudI4Bicv:APA91bHDvkDLAg-zq41oI3JL-uNnxQHXkTvyVYfd7kcVcVClVKP9GQDeF4jXTAf9dJBvE8YmWb6KdO1dQRj7gCLWALNAV7IyXl94kubQ1oPvj_E5jZGm2D7JuAui_YJXfecaw_U77Sg5', 1, NULL, NULL, NULL, 'cus_LFqjYUxxm61mdO', NULL, '2021-11-13 19:26:43', '2022-03-06 17:33:01', NULL),
(4, 'freelancer4', 'admin@freelancer.ae32', NULL, '$2y$10$BQ.wWg5bhr6PG2HxDDCL1ubOpoSzqLyBg2Am80ADwR4rK.wVHCHd6', '2', 0, 'test', 'desc desc desc desc desc desc desc', 'test', 1, NULL, NULL, '85220eeeeb11e7df0ee3824b1612a786.png', '7d6d0cfc0e6b3c50a1f1b26511328c01.png', 'test', 'job', '2021-12-02', NULL, NULL, '2022-02-23 14:08:36', NULL, NULL, 'ctcnFPy3LDjzjVhhl1yVlG:APA91bGiIHyiKfJoOG89-1FDpiEsQC7-Jm7hnEB7l0uofGdzaBvWq-7vhs8naRBsMDRyT4_La0ja27yjSIBorISJXIsVs1HTm-Qq4z4_lnuJTKbtztiuQPVxzWdFgGza4Sr6G9aiwAPC', 1, NULL, NULL, NULL, NULL, NULL, '2021-11-13 19:28:08', '2022-02-23 14:08:36', NULL),
(5, 'freelancer5', 'asdadmin@freelancer.ae', NULL, '$2y$10$y45zuyi9h91n4xKytlRgsO9hnPtrP7.eyrE.Y3lhOI9l37DAZToe2', '2', 0, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-13 16:45:51', NULL, NULL, 'dUiXOdRFOv2IrNh1FlFHPe:APA91bEjal2Pc6TTWUkquNFzu7xD2PZEpo_6amXflgEaqKwafxAs1UXTbCZWWCQ3VHJTx_RTiD6ZtlNVf1F3wy2dGvg8wV4oy7_aqMEoDzBMGGWXVPotCJlhFTNHNfC2pTUKlz53by15', 1, NULL, NULL, NULL, NULL, NULL, '2021-11-13 19:29:36', '2021-12-13 16:45:51', NULL),
(6, 'تثاشي', 'admin@freelancer.ae10', NULL, '$2y$10$NsvttKC4OH1X33UJNbcY8er//EPiXeWCBHCytf5PhTGIxSFWo2RYC', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2021-11-13 19:49:02', '2021-11-13 19:49:02', NULL),
(7, 'asdasdsad', 'admin1@freelancer.ae', NULL, '$2y$10$JdWbpPYRNE7y9j3kAlec2.Xef3AgKDuPaMQPEm1SoL2j7PRQ9vV92', '2', 0, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-01 20:45:33', NULL, NULL, 'czvcHytoDXjE4N3U1IXQfN:APA91bHlC4W437KmOKtdKl4teCUYoQdAJQFVBajqQQa0IqZSkLdha-dliUStg4rmyCnonO__iecD961dWdvFRtH4LeRIrPnMvCpdME6AduN1XyYfox9JBc3g-NgnGtniw9IR6u_CkP4u', NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-13 19:50:13', '2021-12-01 20:45:33', NULL),
(8, 'asdasd', 'adasmin@freelancer.ae', NULL, '$2y$10$SgrVOzbeVlHfPiI5OLDvr.8GNLfqRtlbH0b3PT.aFZUjS.hVfZm62', '2', 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-13 19:51:32', '2022-02-01 15:25:52', NULL),
(10, 'Mohammed', 'admin@ucas.ae', NULL, '$2y$10$Dx03t../UKNJJSG1Euwe7eUx5DpLbTQIbYSr2lCqAJ3LDX1tAPv2K', '2', 2, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'f1DGJ12ZfQfO9Jmgq8FaCj:APA91bGyU3Zd_IBExAMS_27qatFLBnfokbaN25uFY9oVWlM54yXnMbPQkXrqJx5Zx0ULzmdN3dG9azYaeoDf5G6uYfqiCk03H7h5gQ0tlgGScCNzYmQJAqQotCJerG2lGDwLLBOPAp7M', NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-04 11:45:49', '2021-12-04 11:45:50', NULL),
(11, 'joj', 'hoh@hoh', NULL, '$2y$10$6dJCgnLpHAG7fACpTR7Bsua36j6BKMSofp.zoS7lo8PPAUINba/d.', '2', 2, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'f1DGJ12ZfQfO9Jmgq8FaCj:APA91bGyU3Zd_IBExAMS_27qatFLBnfokbaN25uFY9oVWlM54yXnMbPQkXrqJx5Zx0ULzmdN3dG9azYaeoDf5G6uYfqiCk03H7h5gQ0tlgGScCNzYmQJAqQotCJerG2lGDwLLBOPAp7M', NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-04 11:49:39', '2022-02-01 15:26:07', NULL),
(12, 'joj', 'wadasdasd@asdasd', NULL, '$2y$10$f0jUUjzh6w83WqUkPU/vduxOeYaJlBxszUSZqJdVqDU9nfHj0zwF.', '2', 0, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-04 12:01:24', NULL, NULL, 'f1DGJ12ZfQfO9Jmgq8FaCj:APA91bGyU3Zd_IBExAMS_27qatFLBnfokbaN25uFY9oVWlM54yXnMbPQkXrqJx5Zx0ULzmdN3dG9azYaeoDf5G6uYfqiCk03H7h5gQ0tlgGScCNzYmQJAqQotCJerG2lGDwLLBOPAp7M', NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-04 11:50:38', '2022-02-02 16:46:09', NULL),
(13, 'asdasd', 'ASDAS@asdasd', NULL, '$2y$10$06uToH.Uoxtc1WcpNLwHTulRSb78kOX68kTBxqdAxSmDGXxUEEw6y', '2', 2, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'f1DGJ12ZfQfO9Jmgq8FaCj:APA91bGyU3Zd_IBExAMS_27qatFLBnfokbaN25uFY9oVWlM54yXnMbPQkXrqJx5Zx0ULzmdN3dG9azYaeoDf5G6uYfqiCk03H7h5gQ0tlgGScCNzYmQJAqQotCJerG2lGDwLLBOPAp7M', NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-04 12:01:34', '2021-12-04 12:01:35', NULL),
(14, '@admin', 'admin@ads', NULL, '$2y$10$1b59qluWIzczD43mE5QVx.new7PxGtcr5hsRKG5PY1twl/Y7HNwBG', '2', 0, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-04 13:06:11', NULL, NULL, 'cSyAF_sVGbyy0gFMLV-2Ik:APA91bF-k2WuBLVVZ8vG5hVXf7-Xj9WB0Nfnm8uTVu5FY5C_svc-d3_pK7XA0otIYk4LPRm8H24VHMvW6aXFZi0WQCn3rqWAoLwtGsIgTBDAD3_ZQ0RH1mRytwbbpFVbK-ASs1TzgQ5W', NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-04 13:05:41', '2021-12-04 13:06:11', NULL),
(15, 'adadad', 'admin@admin.com', NULL, '$2y$10$eu1C4nFopg1ejF4hMr7S7.CY2u2M9brjsY2hndBqn1uRREizmCC9.', '2', 0, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-05 15:14:02', NULL, NULL, 'ckIzpU3o8K8er5zIEn8YIJ:APA91bF8sVP3eN87LdUHnbgKCdEcj0oVo6R_BgMTPOvtRR8XPw_tNYUu-tzrp0X8kUI06WsxQz73YyMNXo0P0-uFjEtVsKqxKDLq0J5tiie-AIHOFCe8JYLHwKLAnip2PaxX-RcKfI2I', NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-05 15:12:55', '2021-12-05 15:14:02', NULL),
(16, 'adadad', 'asdas@ADAS', NULL, '$2y$10$XMOSXbwkIQ7rnzBIqDwbn.jdMKZ9MOywsAtS4Xu5Muj4m6nNePWLa', '2', 0, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-05 15:22:55', NULL, NULL, 'ckIzpU3o8K8er5zIEn8YIJ:APA91bF8sVP3eN87LdUHnbgKCdEcj0oVo6R_BgMTPOvtRR8XPw_tNYUu-tzrp0X8kUI06WsxQz73YyMNXo0P0-uFjEtVsKqxKDLq0J5tiie-AIHOFCe8JYLHwKLAnip2PaxX-RcKfI2I', NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-05 15:14:11', '2021-12-05 15:22:55', NULL),
(17, 'adadad', 'asdasd@ASASs', NULL, '$2y$10$IbdezqM4NqC72BlIGD0wsOOao/xyaeZwClKlG.q0/KqekLslkJL.G', '2', 2, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-05 15:24:44', '2021-12-05 15:24:44', NULL),
(18, 'Admin', 'admin@gmail.com', NULL, '$2y$10$QmYz7ygmp7efzR2QYo7GtOrpUJsKH20cb1FE7o9DxS8Tl8tS6H.2K', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-24 12:35:34', '2021-12-24 12:35:34', NULL),
(19, 'Admin', 'admin1@gmail.com', NULL, '$2y$10$oftn8v.p7nZEvHg64d6MZeX4K9jQFQ7Cpl1K75OGvq8tywLcVBi5O', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-27 17:11:25', '2021-12-27 17:11:25', NULL),
(20, 'user7672', '114757066666163887927', NULL, '$2y$10$shrCt50DGDaI2Aibd7AxiuyRrFvGtCQkU8iPKy.1yLx/zmz2UfZHu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '114757066666163887927', 'facebook', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-30 13:11:29', '2021-12-30 13:11:29', NULL),
(21, 'user5905', '1147570666661638879271', NULL, '$2y$10$Oi.y8mtevw44uYA/5LMUke1R.M0EXdzC51r9i4GwW3enOdP23mYNi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1147570666661638879271', 'facebook', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-30 13:11:41', '2021-12-30 13:11:41', NULL),
(22, 'mostafa ihab', 'jehad40348@gmail.com0', NULL, 'eyJpdiI6IkRGSklsTUtCT0dqNmo3QzAwRUhla3c9PSIsInZhbHVlIjoiUVNFeWJuQVVYWFlWTXFFK0FtQUw2RnBSZHdqbFB2VTVwU0hXM1JtRFVWST0iLCJtYWMiOiJhNjlmMzcyODdjOTI0NmI0N2NjNWE5MmQ3ODk4M2RkOTA3MWJhMmEwYzA5YmZhMzM2YzJkMTY4OTc1M2RmMmE2IiwidGFnIjoiIn0=', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '113297220530567531967', 'google', 'eNz5EKE7XbJ6yanb9bz7ES:APA91bHV5ExUae9Au_nzmvvLnaZUiHuzxZXHMotLhvaHGLtarsTFVVWsxy3RCgQyDlE0VzcnlV6M3OK-E8CTL92Yvq2DNCZ9-cB5OpjyZKX1LDdOYIE6p4loClF9AU1uvSLFtG6m9Xpd', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-05 18:15:38', '2022-01-05 18:15:53', NULL),
(23, 'Mostafa Mostafa Moa', 'mostafa@mostafa', NULL, '$2y$10$ljmRd8F.Ky8QsCn6H0aSbeB3JuE.2j3wDA9IqI.gXo47EwyYi4BQK', '2', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-02-02 15:13:29', '2022-02-02 15:13:29', NULL),
(24, 'dd', 'dd@tesr', NULL, '$2y$10$5ijcQMujgGrd8LrZXBNEAemUryarjg6MlaHgV5U1ooFI8ecJHM.SW', '2', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-02-02 15:15:16', '2022-02-02 15:15:26', NULL),
(32, 'admin@freelancer.ae15', 'jehad40348@gmail.com', NULL, '$2y$10$nCHPLO6tA/9RlOeudSU4aeyg0GgbEVyJmVvJaalWx5L91NihiVasm', '2', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '4164', 1, NULL, NULL, NULL, '2022-03-03 17:25:20', '2022-03-03 17:25:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_languages`
--

DROP TABLE IF EXISTS `user_languages`;
CREATE TABLE IF NOT EXISTS `user_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `language` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_tags`
--

DROP TABLE IF EXISTS `user_tags`;
CREATE TABLE IF NOT EXISTS `user_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `tag` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_tags`
--

INSERT INTO `user_tags` (`id`, `user_id`, `tag`, `created_at`, `updated_at`, `deleted_at`) VALUES
(12, 1, 'asdasd', '2021-11-20 17:18:22', '2021-11-20 17:18:40', '2021-11-20 17:18:40'),
(13, 1, 'ddd', '2021-11-20 17:18:40', '2021-11-20 17:19:00', '2021-11-20 17:19:00'),
(14, 1, 'tt', '2021-11-20 17:18:40', '2021-11-20 17:19:00', '2021-11-20 17:19:00'),
(15, 1, 'ddd', '2021-11-20 17:19:00', '2021-11-20 17:20:29', '2021-11-20 17:20:29'),
(16, 1, 'tt', '2021-11-20 17:19:00', '2021-11-20 17:20:29', '2021-11-20 17:20:29'),
(17, 1, 'oo', '2021-11-20 17:19:00', '2021-11-20 17:20:29', '2021-11-20 17:20:29'),
(18, 1, 'ddd', '2021-11-20 17:20:29', '2021-11-20 17:20:50', '2021-11-20 17:20:50'),
(19, 1, 'tt', '2021-11-20 17:20:29', '2021-11-20 17:20:50', '2021-11-20 17:20:50'),
(20, 1, 'oo', '2021-11-20 17:20:29', '2021-11-20 17:20:50', '2021-11-20 17:20:50'),
(21, 1, 'ddd', '2021-11-20 17:20:50', '2021-11-20 17:22:07', '2021-11-20 17:22:07'),
(22, 1, 'tt', '2021-11-20 17:20:50', '2021-11-20 17:22:07', '2021-11-20 17:22:07'),
(23, 1, 'oo', '2021-11-20 17:20:50', '2021-11-20 17:22:07', '2021-11-20 17:22:07'),
(24, 1, 'ddd', '2021-11-20 17:22:07', '2021-11-20 17:23:17', '2021-11-20 17:23:17'),
(25, 1, 'tt', '2021-11-20 17:22:07', '2021-11-20 17:23:17', '2021-11-20 17:23:17'),
(26, 1, 'oo', '2021-11-20 17:22:07', '2021-11-20 17:23:17', '2021-11-20 17:23:17'),
(27, 1, 'ddd', '2021-11-20 17:23:17', '2021-11-20 18:20:17', '2021-11-20 18:20:17'),
(28, 1, 'tt', '2021-11-20 17:23:17', '2021-11-20 18:20:17', '2021-11-20 18:20:17'),
(29, 1, 'oo', '2021-11-20 17:23:17', '2021-11-20 18:20:17', '2021-11-20 18:20:17'),
(30, 1, 'ddd', '2021-11-20 18:20:18', '2021-11-21 12:57:17', '2021-11-21 12:57:17'),
(31, 1, 'tt', '2021-11-20 18:20:18', '2021-11-21 12:57:17', '2021-11-21 12:57:17'),
(32, 1, 'oo', '2021-11-20 18:20:18', '2021-11-21 12:57:17', '2021-11-21 12:57:17'),
(33, 1, 'ddd', '2021-11-21 12:57:17', '2021-11-21 12:57:33', '2021-11-21 12:57:33'),
(34, 1, 'tt', '2021-11-21 12:57:17', '2021-11-21 12:57:33', '2021-11-21 12:57:33'),
(35, 1, 'oo', '2021-11-21 12:57:17', '2021-11-21 12:57:33', '2021-11-21 12:57:33'),
(36, 1, 'تصميم', '2021-11-21 12:57:33', '2021-11-21 13:13:56', '2021-11-21 13:13:56'),
(37, 1, 'تصميم', '2021-11-21 13:13:56', '2021-11-21 13:14:12', '2021-11-21 13:14:12'),
(38, 1, 'تصميم', '2021-11-21 13:14:12', '2021-11-21 13:15:50', '2021-11-21 13:15:50'),
(39, 1, 'تصميم', '2021-11-21 13:15:50', '2021-11-21 13:16:04', '2021-11-21 13:16:04'),
(40, 1, 'تصميم', '2021-11-21 13:16:04', '2021-11-21 13:16:15', '2021-11-21 13:16:15'),
(41, 1, 'تصميم', '2021-11-21 13:16:15', '2021-11-21 13:16:39', '2021-11-21 13:16:39'),
(42, 1, 'تصميم', '2021-11-21 13:16:39', '2021-11-21 13:16:46', '2021-11-21 13:16:46'),
(43, 1, 'تصميم', '2021-11-21 13:16:46', '2021-11-21 13:17:22', '2021-11-21 13:17:22'),
(44, 1, 'تصميم', '2021-11-21 13:17:22', '2021-11-21 13:17:38', '2021-11-21 13:17:38'),
(45, 1, 'تصميم', '2021-11-21 13:17:38', '2021-11-21 13:18:41', '2021-11-21 13:18:41'),
(46, 1, 'تصميم', '2021-11-21 13:18:41', '2021-11-22 13:05:47', '2021-11-22 13:05:47'),
(47, 1, 'تصميم', '2021-11-22 13:05:47', '2021-11-22 13:07:32', '2021-11-22 13:07:32'),
(48, 1, 'مصمم شبكات', '2021-11-22 13:05:47', '2021-11-22 13:07:32', '2021-11-22 13:07:32'),
(49, 1, 'تصميم', '2021-11-22 13:07:32', '2021-12-08 15:11:32', '2021-12-08 15:11:32'),
(50, 1, 'مصمم شبكات', '2021-11-22 13:07:32', '2021-12-08 15:11:32', '2021-12-08 15:11:32'),
(51, 3, 'test', '2021-11-22 13:10:26', '2021-11-22 13:10:26', NULL),
(52, 1, 'تصميم', '2021-12-08 15:11:32', '2021-12-08 15:11:51', '2021-12-08 15:11:51'),
(53, 1, 'مصمم شبكات', '2021-12-08 15:11:32', '2021-12-08 15:11:51', '2021-12-08 15:11:51'),
(54, 1, 'تصميم', '2021-12-08 15:11:51', '2021-12-08 15:11:51', NULL),
(55, 1, 'مصمم شبكات', '2021-12-08 15:11:51', '2021-12-08 15:11:51', NULL),
(56, 4, 'test', '2021-12-10 18:32:06', '2021-12-10 18:32:06', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `labels`
--
ALTER TABLE `labels`
  ADD CONSTRAINT `labels_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `labels_ibfk_2` FOREIGN KEY (`screen_id`) REFERENCES `screens` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
