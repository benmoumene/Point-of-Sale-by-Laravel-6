-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 28, 2021 at 09:39 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'Food', 1, 1, 1, '2021-03-15 03:01:12', '2021-03-19 06:16:41'),
(3, 'Electronics', 1, 1, NULL, '2021-03-19 10:04:27', '2021-03-19 10:04:27'),
(4, 'Items', 1, 1, NULL, '2021-04-04 04:18:17', '2021-04-04 04:18:17');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `mobile_no`, `email`, `address`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'Md Abiruzzaman Molla', '+8801787350229', 'abiruzzaman.molla@gmail.com', 'Joshar Bazar, Shibpur, Narshindgi', 1, 1, NULL, '2021-03-10 02:33:26', '2021-03-10 02:33:26'),
(3, 'Akram Molla', '01478745474', NULL, 'Dhaka, KamrangirChor', 1, NULL, NULL, '2021-04-08 01:39:22', '2021-04-08 01:39:22'),
(4, 'Rafiq', '01710221458', NULL, 'Bazar Morjal', 1, NULL, NULL, '2021-04-11 06:49:56', '2021-04-11 06:49:56');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE IF NOT EXISTS `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=Pending, 1=Approved',
  `created_by` int(11) DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_no`, `date`, `description`, `status`, `created_by`, `approved_by`, `created_at`, `updated_at`) VALUES
(5, '3', '2021-04-11', NULL, 1, 1, 1, '2021-04-11 06:49:56', '2021-04-11 06:52:12'),
(3, '1', '2021-04-08', 'This is first product.', 1, 1, 1, '2021-04-08 01:39:22', '2021-04-11 06:48:06'),
(4, '2', '2021-04-09', 'nothingh', 1, 1, 1, '2021-04-08 01:42:06', '2021-04-11 06:47:19'),
(6, '4', '2021-04-26', NULL, 1, 1, 1, '2021-04-26 00:31:51', '2021-04-26 00:32:45');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

DROP TABLE IF EXISTS `invoice_details`;
CREATE TABLE IF NOT EXISTS `invoice_details` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `invoice_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `selling_qty` double NOT NULL,
  `unit_price` double NOT NULL,
  `selling_price` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `date`, `invoice_id`, `category_id`, `product_id`, `selling_qty`, `unit_price`, `selling_price`, `status`, `created_at`, `updated_at`) VALUES
(1, '2021-04-08', 3, 2, 4, 5, 400, 2000, 1, '2021-04-08 01:39:22', '2021-04-08 01:39:22'),
(2, '2021-04-08', 3, 3, 3, 10, 980, 9800, 1, '2021-04-08 01:39:22', '2021-04-08 01:39:22'),
(3, '2021-04-08', 3, 4, 7, 4, 740, 2960, 1, '2021-04-08 01:39:22', '2021-04-08 01:39:22'),
(4, '2021-04-09', 4, 2, 4, 1, 8, 8, 1, '2021-04-08 01:42:06', '2021-04-08 01:42:06'),
(5, '2021-04-09', 4, 3, 1, 1, 14, 14, 1, '2021-04-08 01:42:06', '2021-04-08 01:42:06'),
(6, '2021-04-11', 5, 2, 4, 65, 300, 19500, 1, '2021-04-11 06:49:56', '2021-04-11 06:49:56'),
(7, '2021-04-26', 6, 4, 7, 10, 400, 4000, 1, '2021-04-26 00:31:51', '2021-04-26 00:32:45');

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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_03_09_090751_create_suppliers_table', 2),
(5, '2021_03_10_075217_create_customers_table', 3),
(6, '2021_03_11_110444_create_units_table', 4),
(7, '2021_03_14_115925_create_categories_table', 5),
(8, '2021_03_16_131758_create_products_table', 6),
(9, '2021_03_20_160313_create_purchases_table', 7),
(10, '2021_04_01_080604_create_invoices_table', 8),
(11, '2021_04_01_080847_create_invoice_details_table', 8),
(12, '2021_04_01_080926_create_payments_table', 8),
(13, '2021_04_01_081023_create_payment_details_table', 8);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `paid_status` varchar(51) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `due_amount` double DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `discount_amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `invoice_id`, `customer_id`, `paid_status`, `paid_amount`, `due_amount`, `total_amount`, `discount_amount`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 'partial_paid', 10000, 4360, 14360, 400, '2021-04-08 01:39:22', '2021-04-08 01:39:22'),
(2, 4, 2, 'partial_paid', 10, 10, 20, 2, '2021-04-08 01:42:06', '2021-04-08 01:42:06'),
(3, 5, 4, 'partial_paid', 10054, 9046, 19100, 400, '2021-04-11 06:49:56', '2021-04-11 06:49:56'),
(4, 6, 4, 'partial_paid', 3000, 700, 3700, 300, '2021-04-26 00:31:51', '2021-04-26 00:31:51');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

DROP TABLE IF EXISTS `payment_details`;
CREATE TABLE IF NOT EXISTS `payment_details` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `current_paid_amount` double DEFAULT NULL,
  `date` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`id`, `invoice_id`, `current_paid_amount`, `date`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 3, 10000, '2021-04-08', NULL, '2021-04-08 01:39:22', '2021-04-08 01:39:22'),
(2, 4, 10, '2021-04-09', NULL, '2021-04-08 01:42:06', '2021-04-08 01:42:06'),
(3, 5, 10054, '2021-04-11', NULL, '2021-04-11 06:49:56', '2021-04-11 06:49:56'),
(4, 6, 3000, '2021-04-26', NULL, '2021-04-26 00:31:51', '2021-04-26 00:31:51');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` double NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `supplier_id`, `unit_id`, `category_id`, `name`, `quantity`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 6, 2, 3, 'Molla', 28, 1, 1, 1, '2021-03-19 06:08:14', '2021-04-11 06:47:19'),
(3, 6, 2, 3, 'Potato', 0, 1, 1, 1, '2021-03-24 01:10:37', '2021-04-11 06:48:06'),
(4, 5, 3, 2, 'Chips', 9, 1, 1, NULL, '2021-03-24 01:11:01', '2021-04-11 06:52:12'),
(5, 5, 3, 3, 'Motor', 10, 1, 1, NULL, '2021-03-24 01:11:13', '2021-04-05 02:17:48'),
(6, 5, 3, 2, 'Mango', 13, 1, 1, NULL, '2021-03-24 10:39:19', '2021-03-30 05:11:38'),
(7, 7, 3, 4, 'Kalijira', 1, 1, 1, NULL, '2021-04-04 04:18:39', '2021-04-26 00:32:45');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

DROP TABLE IF EXISTS `purchases`;
CREATE TABLE IF NOT EXISTS `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `purchase_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `buying_qty` double NOT NULL,
  `unit_price` double NOT NULL,
  `buying_price` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=Pending,1=Approved',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `supplier_id`, `category_id`, `product_id`, `purchase_no`, `date`, `description`, `buying_qty`, `unit_price`, `buying_price`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 5, 2, 4, '12345', '2021-03-31', NULL, 10, 362, 3620, 1, 1, NULL, '2021-03-29 06:17:26', '2021-03-29 06:17:26'),
(2, 5, 2, 6, '12345', '2021-03-31', NULL, 13, 560, 7280, 1, 1, NULL, '2021-03-29 06:17:26', '2021-03-29 06:17:26'),
(3, 5, 3, 5, '456', '2021-04-01', NULL, 10, 520, 5200, 1, 1, NULL, '2021-03-29 06:19:32', '2021-03-29 06:19:32'),
(4, 5, 2, 4, '456', '2021-04-01', NULL, 5, 447, 2235, 1, 1, NULL, '2021-03-29 06:19:32', '2021-03-29 06:19:32'),
(5, 6, 3, 1, '456', '2021-04-01', NULL, 29, 568, 16472, 1, 1, NULL, '2021-03-29 06:19:32', '2021-03-29 06:19:32'),
(6, 5, 2, 4, '456878', '2021-04-22', NULL, 50, 300, 15000, 1, 1, NULL, '2021-04-05 02:17:24', '2021-04-05 02:17:24'),
(7, 5, 2, 4, '65884', '1970-01-01', 'test', 10, 400, 4000, 1, 1, NULL, '2021-04-11 06:51:44', '2021-04-11 06:51:44');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `mobile_no`, `email`, `address`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(5, 'Pran', '+8801787350229', 'abiruzzaman.molla@gmail.com', 'Joshar Bazar, Shibpur, Narshindgi', 1, 1, NULL, '2021-03-17 03:42:25', '2021-03-17 03:42:25'),
(6, 'RFL', '01787350229', 'abiruzzaman@gmail.com', 'Narshindgi', 1, 1, NULL, '2021-03-17 03:42:44', '2021-03-17 03:42:44'),
(7, 'Khash Food', '+880178735', 'abiruzla@gmail.com', 'Joshar Bazar, Shibp', 1, 1, NULL, '2021-03-30 06:16:53', '2021-03-30 06:16:53');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

DROP TABLE IF EXISTS `units`;
CREATE TABLE IF NOT EXISTS `units` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'KG', 1, 1, 1, '2021-03-12 04:18:35', '2021-03-14 04:43:21'),
(3, 'Pics', 1, 1, NULL, '2021-03-17 03:50:33', '2021-03-17 03:50:33'),
(4, 'Liter', 1, 1, NULL, '2021-03-30 06:21:02', '2021-03-30 06:21:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `name`, `email`, `email_verified_at`, `password`, `mobile`, `address`, `gender`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Md Abiruzzaman Molla', 'abiruzzaman.molla@gmail.com', NULL, '$2y$10$iMr6ERHbsLolWQCJmRAjGOLWD7xuVDok7ZEku3kIVMbNcqqGBlexG', '01787350229', 'Joshar Bazar, Shibpur, Narshindgi', 'Male', '20210304144647574826_1949429608479193_3046401954952511488_o.jpg', 1, 'AnG2gNjfGPFUXx3fZP5C1djqwOSmUz3llJUreMSY3fMKKHlFQeL3HXaBKsQg', '2021-02-16 01:52:02', '2021-03-05 00:11:09'),
(2, 'User', 'iabook', 'ask@islamicaudiobook.xyz', NULL, '12345678', NULL, NULL, NULL, NULL, 1, NULL, '2021-02-28 07:28:25', '2021-03-01 11:57:01'),
(3, 'User', 'Md Abiruzzaman', 'olla@gmail.com', NULL, '$2y$10$kSmlG/RM/QgwX/g1ckCzlu7Fxenkq1Lv0GgFMnrQNHoKe8waLT.KC', NULL, NULL, NULL, NULL, 1, NULL, '2021-03-01 12:00:29', '2021-03-01 12:00:29'),
(4, 'User', 'mollah a', 'fdafdfa@fdafsdf.faf', NULL, '$2y$10$JfpK82c4DbceBc9YEvrCeeJkTub34QPf0GPUegC6IG4pN3wGA1pte', NULL, NULL, NULL, NULL, 1, NULL, '2021-03-01 12:02:41', '2021-03-02 04:33:42');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
