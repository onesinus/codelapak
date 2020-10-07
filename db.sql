-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.37-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.5124
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table codelapak.carts
CREATE TABLE IF NOT EXISTS `carts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `id_training` int(11) DEFAULT NULL,
  `id_ebook` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `unit_price` decimal(16,2) DEFAULT NULL,
  `total_price` decimal(16,2) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `order_id` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table codelapak.carts: ~30 rows (approximately)
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
INSERT INTO `carts` (`id`, `id_user`, `id_product`, `id_training`, `id_ebook`, `qty`, `unit_price`, `total_price`, `status`, `order_id`, `created_at`, `updated_at`) VALUES
	(65, 2, 6, NULL, NULL, 1, 250000.00, 250000.00, 'paid', '1903281215351553750135', '2019-03-04 09:39:59', '2019-03-04 09:39:59'),
	(67, 2, 6, NULL, NULL, 1, 250000.00, 250000.00, 'paid', '1903281215351553750135', '2019-03-04 09:40:40', '2019-03-04 09:40:40'),
	(70, 2, 6, NULL, NULL, 1, 250000.00, 250000.00, 'paid', '1903281215351553750135', '2019-03-04 09:42:03', '2019-03-04 09:42:03'),
	(71, 2, 6, NULL, NULL, 1, 250000.00, 250000.00, 'paid', '1903281215351553750135', '2019-03-04 09:44:11', '2019-03-04 09:44:11'),
	(72, 2, 6, NULL, NULL, 1, 250000.00, 250000.00, 'paid', '1903281215351553750135', '2019-03-04 09:44:26', '2019-03-04 09:44:26'),
	(75, 1, 5, NULL, NULL, 1, 75000.00, 75000.00, 'unpaid', 'unpaid', '2019-03-04 09:59:50', '2019-03-04 09:59:50'),
	(76, 1, 2, NULL, NULL, 1, 100000.00, 100000.00, 'unpaid', 'unpaid', '2019-03-04 09:59:52', '2019-03-04 09:59:52'),
	(77, 1, 2, NULL, NULL, 1, 100000.00, 100000.00, 'unpaid', 'unpaid', '2019-03-04 09:59:55', '2019-03-04 09:59:55'),
	(80, 1, 5, NULL, NULL, 1, 75000.00, 75000.00, 'unpaid', 'unpaid', '2019-03-22 00:43:45', '2019-03-22 00:43:45'),
	(81, 1, 2, NULL, NULL, 1, 100000.00, 100000.00, 'unpaid', 'unpaid', '2019-03-22 00:44:07', '2019-03-22 00:44:07'),
	(83, 1, 5, NULL, NULL, 1, 75000.00, 75000.00, 'unpaid', 'unpaid', '2019-03-22 00:50:06', '2019-03-22 00:50:06'),
	(90, 1, 5, NULL, NULL, 1, 75000.00, 75000.00, 'unpaid', 'unpaid', '2019-03-22 01:31:23', '2019-03-22 01:31:23'),
	(91, 1, 1, NULL, NULL, 1, 150000.00, 150000.00, 'unpaid', 'unpaid', '2019-03-22 01:31:30', '2019-03-22 01:31:30'),
	(92, 1, 1, NULL, NULL, 1, 150000.00, 150000.00, 'unpaid', 'unpaid', '2019-03-22 01:31:38', '2019-03-22 01:31:38'),
	(93, 1, 5, NULL, NULL, 1, 75000.00, 75000.00, 'unpaid', 'unpaid', '2019-03-24 14:19:20', '2019-03-24 14:19:20'),
	(94, 1, 5, NULL, NULL, 1, 75000.00, 75000.00, 'unpaid', 'unpaid', '2019-03-24 14:25:20', '2019-03-24 14:25:20'),
	(95, 1, 5, NULL, NULL, 1, 75000.00, 75000.00, 'unpaid', 'unpaid', '2019-03-24 14:26:10', '2019-03-24 14:26:10'),
	(96, 1, 6, NULL, NULL, 1, 250000.00, 250000.00, 'unpaid', 'unpaid', '2019-03-24 14:27:13', '2019-03-24 14:27:13'),
	(97, 1, 6, NULL, NULL, 1, 250000.00, 250000.00, 'unpaid', 'unpaid', '2019-03-24 14:27:17', '2019-03-24 14:27:17'),
	(98, 1, 0, 1, 0, 1, 250000.00, 250000.00, 'unpaid', 'unpaid', '2019-03-24 15:49:43', '2019-03-24 15:49:43'),
	(99, 1, 0, 1, 0, 1, 250000.00, 250000.00, 'unpaid', 'unpaid', '2019-03-25 12:23:35', '2019-03-25 12:23:35'),
	(100, 1, 0, 2, 0, 1, 150000.00, 150000.00, 'unpaid', 'unpaid', '2019-03-25 12:23:38', '2019-03-25 12:23:38'),
	(101, 1, 0, 3, 0, 1, 350000.00, 350000.00, 'unpaid', 'unpaid', '2019-03-25 12:23:56', '2019-03-25 12:23:56'),
	(102, 1, 0, 2, 0, 1, 150000.00, 150000.00, 'unpaid', 'unpaid', '2019-03-25 12:26:15', '2019-03-25 12:26:15'),
	(103, 1, 0, 2, 0, 1, 150000.00, 150000.00, 'unpaid', 'unpaid', '2019-03-25 12:26:18', '2019-03-25 12:26:18'),
	(106, 2, 6, NULL, NULL, 1, 250000.00, 250000.00, 'paid', '1903281215351553750135', '2019-03-27 15:16:03', '2019-03-27 15:16:03'),
	(107, 2, 6, NULL, NULL, 1, 250000.00, 250000.00, 'paid', '1903281215351553750135', '2019-03-27 15:16:07', '2019-03-27 15:16:07'),
	(108, 2, 0, 2, 0, 1, 150000.00, 150000.00, 'paid', '1903281215351553750135', '2019-03-27 15:33:43', '2019-03-27 15:33:43'),
	(109, 2, 0, 2, 0, 1, 150000.00, 150000.00, 'paid', '1903281215351553750135', '2019-03-27 15:33:53', '2019-03-27 15:33:53'),
	(110, 2, 0, 1, 0, 1, 250000.00, 250000.00, 'paid', '1903281215351553750135', '2019-03-27 15:34:04', '2019-03-27 15:34:04');
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;

-- Dumping structure for table codelapak.ebooks
CREATE TABLE IF NOT EXISTS `ebooks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(16,2) NOT NULL,
  `rating` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table codelapak.ebooks: ~4 rows (approximately)
/*!40000 ALTER TABLE `ebooks` DISABLE KEYS */;
INSERT INTO `ebooks` (`id`, `name`, `price`, `rating`, `category`, `image`, `created_at`, `updated_at`) VALUES
	(1, '3 Days with mysql for your application', 0.00, 0, 'Mysql', 'mysql.png', '2019-03-22 10:08:26', '2019-03-22 10:08:26'),
	(2, 'Basic Odoo concept', 0.00, 0, 'Odoo', 'odoo.jpg', '2019-03-22 10:09:03', '2019-03-22 10:09:04'),
	(3, '72 hours build donations web application', 50000.00, 0, 'PHP', 'php.png', '2019-03-22 10:09:22', '2019-03-22 10:09:22'),
	(4, 'Basic concept of Ecommerce with php', 0.00, 0, 'PHP', 'php.png', '2019-03-22 10:09:37', '2019-03-22 10:09:37');
/*!40000 ALTER TABLE `ebooks` ENABLE KEYS */;

-- Dumping structure for table codelapak.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table codelapak.migrations: ~7 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(2, '2014_10_12_000000_create_users_table', 1),
	(3, '2014_10_12_100000_create_password_resets_table', 1),
	(5, '2019_02_27_080627_create_products_table', 2),
	(8, '2019_02_28_040412_create_product_images_table', 3),
	(12, '2019_03_03_165047_create_cart_table', 4),
	(13, '2019_03_22_030509_create_ebooks_table', 5),
	(14, '2019_03_22_031107_create_trainings_table', 6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table codelapak.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table codelapak.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
	('kodekite@gmail.com', '$2y$10$rKxmupuAXuVxbeReP/b99uCEJSw0jHLkKZ0/Jztih9Gb4c8uBrRY.', '2019-02-23 04:58:38');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table codelapak.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(16,2) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `category` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table codelapak.products: ~4 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name`, `qty`, `price`, `rating`, `category`, `created_at`, `updated_at`) VALUES
	(1, 'Frexor KPIM Full Version', 50, 150000.00, 5, 'Desktop Application', '2019-02-27 16:00:51', '2019-02-28 07:53:16'),
	(2, 'Aplikasi Google maps integrasi dengan google fushion table untuk peta pengawasan orang asing', 99, 100000.00, 3, 'Web Application', '2019-02-28 01:53:06', '2019-02-28 02:05:21'),
	(5, 'Aplikasi penilaian karyawan berjenjang', 150, 75000.00, 4, 'Web Application', '2019-02-28 07:02:17', '2019-02-28 07:02:17'),
	(6, 'POS with Android Studio', 99, 250000.00, 2, 'Mobile Application', '2019-02-28 07:07:24', '2019-02-28 07:07:24');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table codelapak.product_images
CREATE TABLE IF NOT EXISTS `product_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_image` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table codelapak.product_images: ~12 rows (approximately)
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
INSERT INTO `product_images` (`id`, `id_product`, `filename`, `main_image`, `created_at`, `updated_at`) VALUES
	(1, 2, '2018-03-07 at 10-22-51.png', 0, '2019-02-28 11:28:05', '2019-02-28 11:28:05'),
	(2, 1, 'planet-logo.svg', 0, '2019-02-28 13:18:00', '2019-02-28 13:18:00'),
	(3, 1, 'coba.jpg', 0, '2019-02-28 13:19:59', '2019-02-28 13:19:59'),
	(4, 1, 'coba.jpg', 0, '2019-02-28 13:32:23', '2019-02-28 13:32:23'),
	(5, 1, '7666d5f8ac2a2dcccce00bd387904ac0.jpg', 1, '2019-02-28 13:32:39', '2019-02-28 13:32:39'),
	(6, 2, '2018-03-07 at 10-22-54.png', 0, '2019-02-28 13:37:02', '2019-02-28 13:37:02'),
	(7, 2, '2017-10-01 at 13-28-30.png', 1, '2019-02-28 13:37:02', '2019-02-28 13:37:02'),
	(8, 5, '2018-03-07 at 10-22-54.png', 1, '2019-02-28 14:07:01', '2019-02-28 14:07:01'),
	(9, 6, 'dd.png', 1, '2019-02-28 14:07:35', '2019-02-28 14:07:35'),
	(10, 1, '2018-03-07 at 10-22-51.png', 0, '2019-03-02 21:53:17', '2019-03-02 21:53:17'),
	(11, 1, 'petaporabatam.co.id.jpg', 0, '2019-03-02 21:59:22', '2019-03-02 21:59:22'),
	(12, 1, 'back.png', 0, '2019-03-02 22:03:20', '2019-03-02 22:03:20'),
	(13, 1, '30th-birthday-with-Nightcruiser.jpg', 0, '2019-03-02 22:03:30', '2019-03-02 22:03:30');
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;

-- Dumping structure for table codelapak.trainings
CREATE TABLE IF NOT EXISTS `trainings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(16,2) NOT NULL,
  `rating` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instructor` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail_training` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table codelapak.trainings: ~4 rows (approximately)
/*!40000 ALTER TABLE `trainings` DISABLE KEYS */;
INSERT INTO `trainings` (`id`, `name`, `price`, `rating`, `category`, `image`, `instructor`, `detail_training`, `created_at`, `updated_at`) VALUES
	(1, 'Training PHP for beginner', 250000.00, 0, 'PHP', 'php.png', 'OSPT', 'Training ini adalah training PHP untuk pemula, yang akan diajarkan dalam training kali ini adalah:\r\n                                    <br/>\r\n                                    1. Pengetahuan tentang teknologi berbasis website<br/>\r\n                                    2. Pengenalan Tipe Data<br/>\r\n                                    3. Pengenalan Variable, Konstanta<br/>\r\n                                    4. Pengenalan Function<br/>\r\n                                    5. Pengenalan Class / Object Oriented Programming di PHP<br/>\r\n                                    6. Pengenalan Framework<br/>\r\n                                    7. Membuat project sederhana dengan framework PHP<br/>\r\n		       8. Membuat project sederhana part 2 dengan framework PHP<br/>\r\n		       9. Membuat project sederhana part 3 dengan framework PHP', '2019-03-22 10:12:02', '2019-03-22 10:12:02'),
	(2, 'Training MYSQL', 150000.00, 0, 'MYSQL', 'mysql.png', 'OSPT', NULL, '2019-03-22 10:12:15', '2019-03-22 10:12:15'),
	(3, 'Training ODOO', 350000.00, 0, 'ODOO', 'odoo.jpg', 'DS', NULL, '2019-03-22 10:12:15', '2019-03-22 10:12:15'),
	(4, 'Training PART 2', 350000.00, 0, 'ODOO', 'odoo.jpg', 'DS', NULL, '2019-03-22 10:12:15', '2019-03-22 10:12:15');
/*!40000 ALTER TABLE `trainings` ENABLE KEYS */;

-- Dumping structure for table codelapak.t_transaction
CREATE TABLE IF NOT EXISTS `t_transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(125) DEFAULT NULL,
  `status_code` varchar(10) DEFAULT NULL,
  `transaction_status` varchar(50) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table codelapak.t_transaction: ~1 rows (approximately)
/*!40000 ALTER TABLE `t_transaction` DISABLE KEYS */;
INSERT INTO `t_transaction` (`id`, `order_id`, `status_code`, `transaction_status`, `id_user`, `created_at`) VALUES
	(1, '1553747329', '200', 'capture', 2, '2019-03-28 11:54:10'),
	(5, '1903281158581553749138', '200', 'capture', 2, '2019-03-28 11:59:49'),
	(6, '1903281215351553750135', '200', 'capture', 2, '2019-03-28 12:16:05');
/*!40000 ALTER TABLE `t_transaction` ENABLE KEYS */;

-- Dumping structure for table codelapak.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table codelapak.users: ~4 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Administrator', 'kodekite@gmail.com', '$2y$10$HL0sx5jKY6ZUkalP97RMPeB/wenoqat0Ol0Gn5wNejpB7VBviWE9O', 'izfvwNNOrLaZf6zNIFHYEiydoshtTBV7AN78HralJqKMIIWVX0ScsGrFHZzZ', '2019-02-23 04:44:14', '2019-02-23 04:44:14'),
	(2, 'Onesinus SPT', 'onesinus231@gmail.com', '$2y$10$HL0sx5jKY6ZUkalP97RMPeB/wenoqat0Ol0Gn5wNejpB7VBviWE9O', '43EsYQghZdCJmVXRVNYjc791aVi3d3IeOJeVgqDvTgG3PCTIuwB2gnwf6VFX', '2019-02-27 02:52:20', '2019-02-27 02:52:20'),
	(3, 'Rojali', 'rojali@gmail.com', '$2y$10$gCqwuU2QpqSDMhjgbkb.SuiAeYTuPZEZOvcWjNMAbPwDY2Xk3XJx2', 'bmscNuP5RKpNKauTtQno7ssIHhSpidVdiopxjac4ExsX9BAffxPhUocPuPob', '2019-02-27 02:56:00', '2019-02-27 03:40:12'),
	(6, 'administrator', 'admin@codelapak.com', '$2y$10$/Nk/ECJXNnfSsLwLGRzzReGbWq84b.qdx7kV6lLfEzAzwpv7SW28e', 'KIy527zgklvCpAOfJXcmml2MkavMZKTzJ7gah3wW36WOGv70eOkaADo85C0x', '2019-02-28 08:02:49', '2019-02-28 08:02:49');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for trigger codelapak.t_transaction_after_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `t_transaction_after_insert` AFTER INSERT ON `t_transaction` FOR EACH ROW BEGIN
	IF NEW.status_code = "200" THEN
		UPDATE carts SET order_id = NEW.order_id, status = "paid" WHERE status = "unpaid" AND id_user = NEW.id_user;
	END IF;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
