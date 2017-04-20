-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.2.3-MariaDB-log - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for pos_db
CREATE DATABASE IF NOT EXISTS `pos_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `pos_db`;

-- Dumping structure for table pos_db.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table pos_db.categories: ~4 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`) VALUES
	(1, 'NON ALCOHOLIC'),
	(2, 'BEER'),
	(3, 'COFFEE'),
	(4, 'FOOD');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table pos_db.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total_amount` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_order_users_idx` (`user_id`),
  CONSTRAINT `fk_order_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table pos_db.orders: ~1 rows (approximately)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `total_amount`, `created_at`, `user_id`) VALUES
	(1, 345, '2017-03-29 13:04:31', 3);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table pos_db.order_product
CREATE TABLE IF NOT EXISTS `order_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `fk_order_product_order1_idx` (`order_id`),
  KEY `fk_order_product_products1_idx` (`product_id`),
  CONSTRAINT `fk_order_product_order1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_order_product_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table pos_db.order_product: ~1 rows (approximately)
/*!40000 ALTER TABLE `order_product` DISABLE KEYS */;
INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `amount`) VALUES
	(1, 1, 1, 0);
/*!40000 ALTER TABLE `order_product` ENABLE KEYS */;

-- Dumping structure for table pos_db.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `price` varchar(50) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_products_categories1_idx` (`category_id`),
  CONSTRAINT `fk_products_categories1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- Dumping data for table pos_db.products: ~25 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name`, `price`, `category_id`) VALUES
	(1, 'Coca Cola 0.25', '2.00', 1),
	(2, 'Coca Cola Zero 0.25', '2.10', 1),
	(3, 'Fanta 0.25', '2.00', 1),
	(4, 'Sprite 0.25', '2.00', 1),
	(5, 'Schweps Tonic 0.25', '2.50', 1),
	(6, 'Schweps Bitter Lemon 0.25', '2.50', 1),
	(7, 'Still Water 0.25', '1.50', 1),
	(8, 'Sparkling Water 0.25', '1.80', 1),
	(13, 'Draft Beer 0.3', '1.80', 2),
	(14, 'Draft Beer 0.5', '2.10', 2),
	(15, 'Becks 0.5', '2.60', 2),
	(19, 'Tuborg 0.5', '2.60', 2),
	(20, 'Corona 0.35', '2.60', 2),
	(21, 'Non Alc. Beer 0.5', '2.00', 2),
	(22, 'Espresso', '1.50', 3),
	(23, 'Macchiato', '2.00', 3),
	(24, 'Cappuccino', '2.30', 3),
	(25, 'Double Espresso', '2.50', 3),
	(26, 'Latte', '2.70', 3),
	(27, 'Milk 0.2', '1.50', 3),
	(28, 'Hamburger', '8.00', 4),
	(29, 'Cheesburger', '9.00', 4),
	(30, 'Club Sandwich', '9.00', 4),
	(31, 'Hot Dog', '5.00', 4),
	(32, 'French Fries', '4.00', 4);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table pos_db.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '0',
  `password` varchar(50) NOT NULL DEFAULT '0',
  `role` varchar(50) NOT NULL DEFAULT '0',
  `token` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `password` (`password`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table pos_db.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `role`, `token`) VALUES
	(3, 'Milos', 'c2ba1bc54b239208cb37b901c0d3b363', '0', ''),
	(6, 'Admin', '81dc9bdb52d04dc20036dbd8313ed055', '1', 'pos_58f7d850850b8');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
