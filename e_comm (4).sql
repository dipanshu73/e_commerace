-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 23, 2026 at 11:46 AM
-- Server version: 5.7.24
-- PHP Version: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_comm`
--

-- --------------------------------------------------------

--
-- Table structure for table `aad_to_card`
--

CREATE TABLE `aad_to_card` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `product_id` int(11) NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL DEFAULT '0',
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `description` text COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `show_on_home` tinyint(1) DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `description`, `created_at`, `show_on_home`, `image`) VALUES
(1, 'Indian Dress', 'Traditional wear like Saree, Suit, Dupatta, Lehenga, Choli, Ghaghra', '2026-07-23 07:16:02', 1, 'uploads/1784801085_20ecf2fVNANDTanviRed_1.avif'),
(2, 'Western Dress', 'Modern outfits like Jeans, Tops, T-shirts, Skirts, Short Kurtis', '2026-07-23 07:16:02', 1, 'uploads/1784801072_2.avif'),
(3, 'Footwear', 'Shoes, Sandals, Heels, Sneakers, Flats', '2026-07-23 07:16:02', 1, 'uploads/1784801058_a64496e800214White_1.avif'),
(4, 'Accessories', 'Makeup, Earrings, Jhumke, Chudiya, Clutch, Hair Clips', '2026-07-23 07:16:02', 1, 'uploads/1784801039_aa.avif');

-- --------------------------------------------------------

--
-- Table structure for table `create_table_cart`
--

CREATE TABLE `create_table_cart` (
  `id` int(11) NOT NULL,
  `usre_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `creat_table_order_items`
--

CREATE TABLE `creat_table_order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `creat_table_order_items`
--

INSERT INTO `creat_table_order_items` (`id`, `order_id`, `product_id`, `product_name`, `price`, `quantity`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 11, 101, 'Demo Product', '500.00', 2, '1000.00', '2026-07-04 10:41:36', '2026-07-04 10:41:36'),
(2, 22, 1, 'Red Saree', '499.00', 1, '499.00', '2026-07-04 12:44:08', '2026-07-04 12:44:08'),
(3, 23, 1, 'Red Saree', '499.00', 1, '499.00', '2026-07-04 12:44:24', '2026-07-04 12:44:24'),
(4, 24, 1, 'Red Saree', '499.00', 1, '499.00', '2026-07-04 12:44:39', '2026-07-04 12:44:39');

-- --------------------------------------------------------

--
-- Table structure for table `in_stock`
--

CREATE TABLE `in_stock` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity_added` int(11) DEFAULT NULL,
  `purchase_price` decimal(10,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_bin,
  `size` int(11) NOT NULL DEFAULT '0',
  `add_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `in_stock`
--

INSERT INTO `in_stock` (`id`, `product_id`, `quantity_added`, `purchase_price`, `date`, `remarks`, `size`, `add_date`) VALUES
(1, 1, 18, '350.00', '2026-06-23', '2', 0, NULL),
(2, 2, 15, '1200.00', '2026-06-23', '5', 0, NULL),
(3, 1, 2, '122.00', NULL, 'asasasas', 12, '2026-07-02 10:18:03'),
(4, 1, 1, '4000.00', NULL, '', 32, '2026-07-23 06:07:14');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `total_amount` decimal(10,2) NOT NULL,
  `payment_status` varchar(50) DEFAULT 'Pending',
  `delivery_status` varchar(50) DEFAULT 'Processing',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `order_date`, `total_amount`, `payment_status`, `delivery_status`, `created_at`, `updated_at`) VALUES
(58, 1, '2026-07-07 09:52:23', '2298.00', 'Prepaid', 'Processing', '2026-07-07 09:52:23', '2026-07-07 09:52:23');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_name`, `price`, `quantity`, `subtotal`, `created_at`) VALUES
(1, 58, 2, 'Blue Kurti', '1499.00', 1, '1499.00', '2026-07-07 04:22:23'),
(2, 58, 3, 'Party Dress', '799.00', 1, '799.00', '2026-07-07 04:22:23');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `id` int(11) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `customer_name` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `order_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) DEFAULT 'Delivered'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `category_id` int(11) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `minium_stock` int(11) DEFAULT NULL,
  `date_added` date DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `display_location` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `category_id`, `supplier_id`, `quantity`, `price`, `minium_stock`, `date_added`, `image_path`, `display_location`, `created_at`) VALUES
(1, 'Red Saree', 12, 1, 50, '14900.00', 50, '2026-06-23', 'uploads/1784785651_redsareee.jpg', 'category_list', NULL),
(2, 'Blue Shirt', 2, 2, 30, '599.00', 5, '2026-06-23', 'uploads/1784785680_7ca948cSLOUNG00000474_1.avif', 'category_list', NULL),
(3, 'short kurti', 1, 3, 20, '799.00', 20, '2026-06-23', 'uploads/1784785892_1.avif', 'category_list', NULL),
(5, 'shose', 3, 9, 6, '600.00', 2, '2026-06-25', 'uploads/1784785931_258cd3522L1053WhiteBlue_1.avif', 'category_list', NULL),
(6, 'Shose', 3, 9, 6, '900.00', 2, '2026-06-25', 'uploads/1784786021_shozie.webp', 'category_list', NULL),
(7, 'Suit', 1, NULL, NULL, '2000.00', NULL, NULL, 'uploads/1784786231_shopping (4).webp', 'category_list', '2026-07-02 10:08:21'),
(8, 'New purse', 4, NULL, NULL, '2300.00', NULL, NULL, 'uploads/1784785977_p.avif', 'category_list', '2026-07-02 10:32:24'),
(9, 'Suit', 1, NULL, NULL, '2300.00', NULL, NULL, 'uploads/1784787210_punjabi-suit-for-women-9.jpg', 'category_list', '2026-07-23 06:13:30'),
(10, 'Sandal', 3, NULL, NULL, '1200.00', NULL, NULL, 'uploads/1784787253_1b5c7f0mhw7911pearlwhite_1.avif', 'category_list', '2026-07-23 06:14:13'),
(11, 'Denvar', 4, NULL, NULL, '100.00', NULL, NULL, 'uploads/1784790140_2-6-6-na-kashmiri chudiya.webp', 'category_list', '2026-07-23 07:02:20'),
(12, 'Titan Stainless steel Watch', 4, NULL, NULL, '200.00', NULL, NULL, 'uploads/1784790193_m.avif', 'category_list', '2026-07-23 07:03:13'),
(13, 'Sonata', 4, NULL, NULL, '500.00', NULL, NULL, 'uploads/1784790214_a.avif', 'category_list', '2026-07-23 07:03:34'),
(14, 'Saree', 1, NULL, NULL, '2300.00', NULL, NULL, 'uploads/1784790614_20ecf2fVNANDTanviRed_1.avif', 'category_list', '2026-07-23 07:10:14'),
(15, 'Saree', 1, NULL, NULL, '1500.00', NULL, NULL, 'uploads/1784790654_PINK_1.avif', 'category_list', '2026-07-23 07:10:54'),
(16, 'Saree', 1, NULL, NULL, '1800.00', NULL, NULL, 'uploads/1784790685_ss.avif', 'category_list', '2026-07-23 07:11:25'),
(17, 'Anarcli Suit', 1, NULL, NULL, '2890.00', NULL, NULL, 'uploads/1784791423_3xl-rohita-skyliner-original-imahfwz9nmrmtm7c.webp', 'category_list', '2026-07-23 07:23:43'),
(18, 'Suit', 1, NULL, NULL, '1499.00', NULL, NULL, 'uploads/1784791449_pinkkk.avif', 'category_list', '2026-07-23 07:24:09'),
(19, 'Saree', 1, NULL, NULL, '7890.00', NULL, NULL, 'uploads/1784791479_puplee.avif', 'category_list', '2026-07-23 07:24:39'),
(20, 'Saree', 1, NULL, NULL, '4500.00', NULL, NULL, 'uploads/1784791507_sar.avif', 'category_list', '2026-07-23 07:25:07'),
(21, 'Saree', 1, NULL, NULL, '1600.00', NULL, NULL, 'uploads/1784791532_s.avif', 'category_list', '2026-07-23 07:25:32'),
(22, 'Saree', 1, NULL, NULL, '1800.00', NULL, NULL, 'uploads/1784791560_saaaree.webp', 'category_list', '2026-07-23 07:26:00'),
(23, 'Saree', 1, NULL, NULL, '1480.00', NULL, NULL, 'uploads/1784791596_sareee.avif', 'category_list', '2026-07-23 07:26:36'),
(24, 'Saree', 1, NULL, NULL, '1350.00', NULL, NULL, 'uploads/1784791644_sareeeaa.avif', 'category_list', '2026-07-23 07:27:24'),
(25, 'Saree', 1, NULL, NULL, '1570.00', NULL, NULL, 'uploads/1784791706_sd.avif', 'category_list', '2026-07-23 07:28:26'),
(26, 'Suit', 1, NULL, NULL, '800.00', NULL, NULL, 'uploads/1784791789_puple_suit.webp', 'category_list', '2026-07-23 07:29:49'),
(27, 'Suit', 1, NULL, NULL, '1250.00', NULL, NULL, 'uploads/1784791817_r1-scaled-1.jpg.webp', 'category_list', '2026-07-23 07:30:17'),
(28, 'T-Shirt', 2, NULL, NULL, '400.00', NULL, NULL, 'uploads/1784792113_19bdbe4A39070061_1.avif', 'category_list', '2026-07-23 07:35:13'),
(29, 'T-Shirt', 2, NULL, NULL, '500.00', NULL, NULL, 'uploads/1784792134_05322ff659430_1.avif', 'category_list', '2026-07-23 07:35:34'),
(30, 'T-Shirt', 2, NULL, NULL, '300.00', NULL, NULL, 'uploads/1784792156_49e4bfc352065-NavyBlue_1.avif', 'category_list', '2026-07-23 07:35:56'),
(31, 'Top', 2, NULL, NULL, '250.00', NULL, NULL, 'uploads/1784792206_1fd3634CNLWN000121_1.avif', 'category_list', '2026-07-23 07:36:46'),
(32, 'T-Shirt', 2, NULL, NULL, '350.00', NULL, NULL, 'uploads/1784792231_44efd6eEOUTZI00059087_1.avif', 'category_list', '2026-07-23 07:37:11'),
(33, 'Shirt', 2, NULL, NULL, '600.00', NULL, NULL, 'uploads/1784792264_8e70c9f215538_1.avif', 'category_list', '2026-07-23 07:37:44'),
(34, 'shirt', 2, NULL, NULL, '300.00', NULL, NULL, 'uploads/1784792285_3e64c5c19961_1.avif', 'category_list', '2026-07-23 07:38:05'),
(35, 'shirt', 2, NULL, NULL, '300.00', NULL, NULL, 'uploads/1784792310_73a67a62K877S24_1.avif', 'category_list', '2026-07-23 07:38:30'),
(36, 'New purse', 4, NULL, NULL, '799.00', NULL, NULL, 'uploads/1784796307_u.avif', 'category_list', '2026-07-23 08:45:07'),
(37, 'New purse', 4, NULL, NULL, '1000.00', NULL, NULL, 'uploads/1784796695_bag anda.jpg', 'category_list', '2026-07-23 08:51:35'),
(38, 'New purse', 4, NULL, NULL, '780.00', NULL, NULL, 'uploads/1784796824_purse.avif', 'category_list', '2026-07-23 08:53:44'),
(39, 'New Sandal', 3, NULL, NULL, '3000.00', NULL, NULL, 'uploads/1784796884_9c79ac4BD39HW945CR_1.avif', 'category_list', '2026-07-23 08:54:44'),
(40, 'New Sandal', 3, NULL, NULL, '800.00', NULL, NULL, 'uploads/1784796927_3d7d234JokeBeige_1.avif', 'category_list', '2026-07-23 08:55:27'),
(41, 'New Sandal', 3, NULL, NULL, '950.00', NULL, NULL, 'uploads/1784796952_9df242cAOTHEHS00001193_1.avif', 'category_list', '2026-07-23 08:55:52'),
(42, 'New Sandal', 3, NULL, NULL, '1600.00', NULL, NULL, 'uploads/1784796975_9df242cAOTHEHS00001202_1.avif', 'category_list', '2026-07-23 08:56:15'),
(43, 'New Sandal', 3, NULL, NULL, '1700.00', NULL, NULL, 'uploads/1784797005_36f2174Boost-White_1.avif', 'category_list', '2026-07-23 08:56:45'),
(44, 'New Sandal', 3, NULL, NULL, '1500.00', NULL, NULL, 'uploads/1784797034_73d6dadVianBlueBoho2023VM003_1.avif', 'category_list', '2026-07-23 08:57:14'),
(45, 'New Sandal', 3, NULL, NULL, '1900.00', NULL, NULL, 'uploads/1784797062_91d56ac102817TAN_1.avif', 'category_list', '2026-07-23 08:57:42'),
(46, 'New Sandal', 3, NULL, NULL, '800.00', NULL, NULL, 'uploads/1784797085_8f7ca5d102489TAN_1.avif', 'category_list', '2026-07-23 08:58:05'),
(48, 'New Sandal', 3, NULL, NULL, '4000.00', NULL, NULL, 'uploads/1784797125_9b314ea60002481002250_1.avif', 'category_list', '2026-07-23 08:58:45'),
(49, 'New Sandal', 3, NULL, NULL, '5000.00', NULL, NULL, 'uploads/1784797160_9b314ea60002481002271_1.avif', 'category_list', '2026-07-23 08:59:20'),
(50, 'New Sandal', 3, NULL, NULL, '3300.00', NULL, NULL, 'uploads/1784797188_9b314ea60002481003895_1.avif', 'category_list', '2026-07-23 08:59:48'),
(51, 'New Sandal', 3, NULL, NULL, '2050.00', NULL, NULL, 'uploads/1784797214_9b314ea60002481003733_1.avif', 'category_list', '2026-07-23 09:00:14'),
(52, 'New Sandal', 3, NULL, NULL, '1300.00', NULL, NULL, 'uploads/1784797250_96a3b3cRSVPSS02_1.avif', 'category_list', '2026-07-23 09:00:50'),
(53, 'New Sandal', 3, NULL, NULL, '700.00', NULL, NULL, 'uploads/1784797285_91d56ac601149GOLD_1.avif', 'category_list', '2026-07-23 09:01:25'),
(54, 'New Sandal', 3, NULL, NULL, '1900.00', NULL, NULL, 'uploads/1784797338_8855f80AR923CRM_1.avif', 'category_list', '2026-07-23 09:02:18'),
(55, 'New Sandal', 3, NULL, NULL, '1200.00', NULL, NULL, 'uploads/1784797528_224c576SABBIAIN342Green_1.avif', 'category_list', '2026-07-23 09:05:28'),
(56, 'New Sandal', 3, NULL, NULL, '400.00', NULL, NULL, 'uploads/1784797589_7682375EL-AAA-Wn-102Olive_1.avif', 'category_list', '2026-07-23 09:06:29'),
(57, 'New Sandal', 3, NULL, NULL, '1350.00', NULL, NULL, 'uploads/1784797612_08533d82630080White_1.avif', 'category_list', '2026-07-23 09:06:52'),
(58, 'New Sandal', 3, NULL, NULL, '1100.00', NULL, NULL, 'uploads/1784797642_8855f80AR936CRM_1.avif', 'category_list', '2026-07-23 09:07:22'),
(59, 'New Sandal', 3, NULL, NULL, '1000.00', NULL, NULL, 'uploads/1784797665_9902ba1ZZYOHOX00004301_1.avif', 'category_list', '2026-07-23 09:07:45'),
(60, 'New Sandal', 3, NULL, NULL, '900.00', NULL, NULL, 'uploads/1784797687_24413c21319807001_1.avif', 'category_list', '2026-07-23 09:08:07'),
(61, 'New Sandal', 3, NULL, NULL, '550.00', NULL, NULL, 'uploads/1784797717_5947680CL-AT-Wn-02Beige_1.avif', 'category_list', '2026-07-23 09:08:37'),
(62, 'New Sandal', 3, NULL, NULL, '450.00', NULL, NULL, 'uploads/1784797745_a077eb3YOSD25W107C55F_1.avif', 'category_list', '2026-07-23 09:09:05'),
(63, 'New Sandal', 3, NULL, NULL, '1450.00', NULL, NULL, 'uploads/1784797889_577850aAATHECJ00001156_1.avif', 'category_list', '2026-07-23 09:11:29'),
(64, 'New Sandal', 3, NULL, NULL, '13800.00', NULL, NULL, 'uploads/1784797926_da7f78360002481003726A_1.avif', 'category_list', '2026-07-23 09:12:06'),
(65, 'women neckles', 4, NULL, NULL, '1300.00', NULL, NULL, 'uploads/1784798066_jewellery.avif', 'category_list', '2026-07-23 09:14:26'),
(66, 'women neckles', 4, NULL, NULL, '650.00', NULL, NULL, 'uploads/1784798088_jokerorwitch.avif', 'category_list', '2026-07-23 09:14:48'),
(67, 'women neckles', 4, NULL, NULL, '1350.00', NULL, NULL, 'uploads/1784798235_4c68ee2SOOMPH00007023_1.avif', 'category_list', '2026-07-23 09:17:15'),
(68, 'women neckles', 4, NULL, NULL, '550.00', NULL, NULL, 'uploads/1784798259_download.webp', 'category_list', '2026-07-23 09:17:39'),
(69, 'women neckles', 4, NULL, NULL, '1200.00', NULL, NULL, 'uploads/1784798284_images (1).jpg', 'category_list', '2026-07-23 09:18:04'),
(70, 'women neckles', 4, NULL, NULL, '300.00', NULL, NULL, 'uploads/1784798308_images (3).jpg', 'category_list', '2026-07-23 09:18:28'),
(71, 'women neckles', 4, NULL, NULL, '400.00', NULL, NULL, 'uploads/1784798333_images (2).jpg', 'category_list', '2026-07-23 09:18:53'),
(72, 'women neckles', 4, NULL, NULL, '350.00', NULL, NULL, 'uploads/1784798361_images (4).jpg', 'category_list', '2026-07-23 09:19:21'),
(73, 'women neckles', 4, NULL, NULL, '200.00', NULL, NULL, 'uploads/1784798387_images (7).jpg', 'category_list', '2026-07-23 09:19:47'),
(74, 'women neckles', 4, NULL, NULL, '150.00', NULL, NULL, 'uploads/1784798413_Necklaces.avif', 'category_list', '2026-07-23 09:20:13'),
(75, 'women neckles', 4, NULL, NULL, '500.00', NULL, NULL, 'uploads/1784798443_images (5).jpg', 'category_list', '2026-07-23 09:20:43'),
(76, 'women neckles', 4, NULL, NULL, '1500.00', NULL, NULL, 'uploads/1784798465_shopping (7).webp', 'category_list', '2026-07-23 09:21:05'),
(77, 'women neckles', 4, NULL, NULL, '1680.00', NULL, NULL, 'uploads/1784798499_shopping (8).webp', 'category_list', '2026-07-23 09:21:39'),
(78, 'women neckles', 4, NULL, NULL, '2220.00', NULL, NULL, 'uploads/1784798523_shopping (9).webp', 'category_list', '2026-07-23 09:22:03'),
(79, 'women neckles', 4, NULL, NULL, '2300.00', NULL, NULL, 'uploads/1784798555_shopping (10).webp', 'category_list', '2026-07-23 09:22:35'),
(80, 'Ring', 4, NULL, NULL, '320.00', NULL, NULL, 'uploads/1784798598_ringg.avif', 'category_list', '2026-07-23 09:23:18'),
(81, 'Ring', 4, NULL, NULL, '550.00', NULL, NULL, 'uploads/1784798636_ring.avif', 'category_list', '2026-07-23 09:23:56'),
(82, 'Ring', 4, NULL, NULL, '300.00', NULL, NULL, 'uploads/1784798794_images (8).jpg', 'category_list', '2026-07-23 09:26:34'),
(83, 'Ring', 4, NULL, NULL, '600.00', NULL, NULL, 'uploads/1784798820_images (10).jpg', 'category_list', '2026-07-23 09:27:00'),
(84, 'Ring', 4, NULL, NULL, '500.00', NULL, NULL, 'uploads/1784798843_images (11).jpg', 'category_list', '2026-07-23 09:27:23'),
(85, 'Ring', 4, NULL, NULL, '700.00', NULL, NULL, 'uploads/1784798865_images (12).jpg', 'category_list', '2026-07-23 09:27:45'),
(86, 'Ring', 4, NULL, NULL, '1250.00', NULL, NULL, 'uploads/1784798895_images (13).jpg', 'category_list', '2026-07-23 09:28:15'),
(87, 'Ring', 4, NULL, NULL, '1350.00', NULL, NULL, 'uploads/1784798923_images (14).jpg', 'category_list', '2026-07-23 09:28:43'),
(88, 'Earrings ', 4, NULL, NULL, '200.00', NULL, NULL, 'uploads/1784799210_images (15).jpg', 'category_list', '2026-07-23 09:33:30'),
(89, 'Earrings ', 4, NULL, NULL, '400.00', NULL, NULL, 'uploads/1784799239_images (16).jpg', 'category_list', '2026-07-23 09:33:59'),
(90, 'Earring', 4, NULL, NULL, '300.00', NULL, NULL, 'uploads/1784799271_images (23).jpg', 'category_list', '2026-07-23 09:34:31'),
(91, 'Earring', 4, NULL, NULL, '300.00', NULL, NULL, 'uploads/1784799299_images (22).jpg', 'category_list', '2026-07-23 09:34:59'),
(92, 'Earring', 4, NULL, NULL, '350.00', NULL, NULL, 'uploads/1784799320_images (21).jpg', 'category_list', '2026-07-23 09:35:20'),
(93, 'Earring', 4, NULL, NULL, '230.00', NULL, NULL, 'uploads/1784799342_images (19).jpg', 'category_list', '2026-07-23 09:35:42'),
(94, 'Traditional glass chudiya', 4, NULL, NULL, '300.00', NULL, NULL, 'uploads/1784799546_images (26).jpg', 'category_list', '2026-07-23 09:39:06'),
(95, 'Traditional glass chudiya', 4, NULL, NULL, '300.00', NULL, NULL, 'uploads/1784799591_images (25).jpg', 'category_list', '2026-07-23 09:39:51'),
(96, 'Traditional glass chudiya', 4, NULL, NULL, '700.00', NULL, NULL, 'uploads/1784799618_images (29).jpg', 'category_list', '2026-07-23 09:40:18'),
(97, 'Traditional glass chudiya', 4, NULL, NULL, '120.00', NULL, NULL, 'uploads/1784799640_images (27).jpg', 'category_list', '2026-07-23 09:40:40'),
(98, 'Traditional glass chudiya', 4, NULL, NULL, '1250.00', NULL, NULL, 'uploads/1784799675_images (24).jpg', 'category_list', '2026-07-23 09:41:15'),
(99, 'Women Watch', 4, NULL, NULL, '799.00', NULL, NULL, 'uploads/1784799799_images (31).jpg', 'category_list', '2026-07-23 09:43:19'),
(100, 'Women Watch', 4, NULL, NULL, '900.00', NULL, NULL, 'uploads/1784799824_images (32).jpg', 'category_list', '2026-07-23 09:43:44'),
(101, 'Women Watch', 4, NULL, NULL, '400.00', NULL, NULL, 'uploads/1784799849_images (35).jpg', 'category_list', '2026-07-23 09:44:09'),
(102, 'Women Watch', 4, NULL, NULL, '1600.00', NULL, NULL, 'uploads/1784799885_images (34).jpg', 'category_list', '2026-07-23 09:44:45'),
(103, 'Women Watch', 4, NULL, NULL, '1200.00', NULL, NULL, 'uploads/1784799919_woman watch.webp', 'category_list', '2026-07-23 09:45:19'),
(104, 'Women Watch', 4, NULL, NULL, '4450.00', NULL, NULL, 'uploads/1784799954_-treviyaa-women-.webp', 'category_list', '2026-07-23 09:45:54'),
(105, 'Women Jhumka', 4, NULL, NULL, '200.00', NULL, NULL, 'uploads/1784800003_Kashmiri.avif', 'category_list', '2026-07-23 09:46:43'),
(106, 'Fashion Frill Star Moon Design Studded Multi Layered Cuff Bangle Bracelet', 4, NULL, NULL, '900.00', NULL, NULL, 'uploads/1784800114_cubin.avif', 'category_list', '2026-07-23 09:48:34'),
(107, 'Fashion Frill Star Moon Design Studded Multi Layered Cuff Bangle Bracelet', 4, NULL, NULL, '1400.00', NULL, NULL, 'uploads/1784800137_images (28).jpg', 'category_list', '2026-07-23 09:48:57'),
(108, 'Fashion Frill Star Moon Design Studded Multi Layered Cuff Bangle Bracelet', 4, NULL, NULL, '1500.00', NULL, NULL, 'uploads/1784800166_images (36).jpg', 'category_list', '2026-07-23 09:49:26'),
(109, 'Fashion Frill Star Moon Design Studded Multi Layered Cuff Bangle Bracelet', 4, NULL, NULL, '1300.00', NULL, NULL, 'uploads/1784800197_images (37).jpg', 'category_list', '2026-07-23 09:49:57'),
(110, 'Fashion Frill Star Moon Design Studded Multi Layered Cuff Bangle Bracelet', 4, NULL, NULL, '1100.00', NULL, NULL, 'uploads/1784800221_jokerwitch.avif', 'category_list', '2026-07-23 09:50:21'),
(111, 'Fashion Frill Star Moon Design Studded Multi Layered Cuff Bangle Bracelet', 4, NULL, NULL, '500.00', NULL, NULL, 'uploads/1784800252_shopping (11).webp', 'category_list', '2026-07-23 09:50:52'),
(112, 'Fashion Frill Star Moon Design Studded Multi Layered Cuff Bangle Bracelet', 4, NULL, NULL, '1200.00', NULL, NULL, 'uploads/1784800278_shopping (12).webp', 'category_list', '2026-07-23 09:51:18'),
(113, 'women hair band', 4, NULL, NULL, '200.00', NULL, NULL, 'uploads/1784800398_shopping (13).webp', 'category_list', '2026-07-23 09:53:18'),
(114, 'women hair band', 4, NULL, NULL, '500.00', NULL, NULL, 'uploads/1784800426_shopping (13).webp', 'category_list', '2026-07-23 09:53:46'),
(115, 'Lehenga', 4, NULL, NULL, '4000.00', NULL, NULL, 'uploads/1784800488_white4.webp', 'category_list', '2026-07-23 09:54:48'),
(116, 'Lehenga choli', 1, NULL, NULL, '5000.00', NULL, NULL, 'uploads/1784800526_Navratri Chaniya Choli.webp', 'category_list', '2026-07-23 09:55:26'),
(117, 'Lehenga', 1, NULL, NULL, '8500.00', NULL, NULL, 'uploads/1784800569_white4.webp', 'category_list', '2026-07-23 09:56:09'),
(118, 'Women kurti', 1, NULL, NULL, '5600.00', NULL, NULL, 'uploads/1784800615_green.avif', 'category_list', '2026-07-23 09:56:55'),
(119, 'Women Suit', 1, NULL, NULL, '1600.00', NULL, NULL, 'uploads/1784800670_shopping (6).webp', 'category_list', '2026-07-23 09:57:50'),
(120, 'Women kurti', 1, NULL, NULL, '1500.00', NULL, NULL, 'uploads/1784800713_s-sara-decizeclothing-original-imahjnfnhguzrans.webp', 'category_list', '2026-07-23 09:58:33');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` int(11) NOT NULL,
  `review_text` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stocks_out`
--

CREATE TABLE `stocks_out` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity_removed` int(11) NOT NULL,
  `reason` text COLLATE utf8mb4_bin NOT NULL,
  `add_date` date DEFAULT NULL,
  `remark` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `stocks_out`
--

INSERT INTO `stocks_out` (`id`, `product_id`, `quantity_removed`, `reason`, `add_date`, `remark`) VALUES
(1, 1, 5, 'sale', '2026-06-23', 'sold to customer'),
(2, 2, 10, 'sale', '2026-06-23', 'online order'),
(5, 3, 9, '1', '2026-06-23', ''),
(6, 2, 1, 'Damage', '2026-07-02', ''),
(7, 2, 1, 'Expried', '2026-07-04', '');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `supplier_name` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `address` text COLLATE utf8mb4_bin NOT NULL,
  `company_name` varchar(100) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `supplier_name`, `phone`, `email`, `address`, `company_name`) VALUES
(1, 'Rahul Sharma1', '9876543210', 'Rahul@gmail.com', 'Delhi1', 'ABC Pvt Ltd'),
(2, 'Rahul Sharma', '9876543210', 'Rahul@gmail.com', 'Delhi', 'ABC Pvt Ltd'),
(5, 'Rahul Sharma', '9876543210', 'Rahul@gmail.com', 'Delhi', 'ABC Pvt Ltd'),
(6, 'Rahul Sharma', '9876543210', 'Rahul@gmail.com', 'Delhi', 'ABC Pvt Ltd'),
(7, 'Demo1', '7351334717', 'demo@gmail.com', 'Haridwar', 'Demo Comm');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `check_password` text COLLATE utf8mb4_bin,
  `email` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `priv` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `check_password`, `email`, `priv`) VALUES
(1, 'admin', '5e8ff9bf55ba3508199d22e984129be6', 'sample', 'rahil@gmail.com', 'admin'),
(2, 'priya', '5e8ff9bf55ba3508199d22e984129be6', 'sample', 'priya@gmail.com', 'cust'),
(3, 'aman', '5e8ff9bf55ba3508199d22e984129be6', '5e8ff9bf55ba3508199d22e984129be6', 'aman@123gmial.com', 'cust');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_new`
--

CREATE TABLE `wishlist_new` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aad_to_card`
--
ALTER TABLE `aad_to_card`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `create_table_cart`
--
ALTER TABLE `create_table_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `creat_table_order_items`
--
ALTER TABLE `creat_table_order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `in_stock`
--
ALTER TABLE `in_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks_out`
--
ALTER TABLE `stocks_out`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist_new`
--
ALTER TABLE `wishlist_new`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `create_table_cart`
--
ALTER TABLE `create_table_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `creat_table_order_items`
--
ALTER TABLE `creat_table_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `in_stock`
--
ALTER TABLE `in_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `stocks_out`
--
ALTER TABLE `stocks_out`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlist_new`
--
ALTER TABLE `wishlist_new`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
