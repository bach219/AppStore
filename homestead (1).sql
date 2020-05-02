-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2020 at 06:48 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homestead`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `phone`, `email`, `password`, `sex`, `image`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'nam nguyen', '0966343456', 'bach@gmail.com', '$2y$10$mA0QQzVzOz6J7uSeWeFV3.kt0jg0vPNohPDTY0.UNhv9Y3GnhsS6a', 'Nam', NULL, '141 đường Chiến Thắng, Tân Triều, Thanh Trì, Hà Nội', 'xS8sKUoNEWwhk65WAVftcpizpgucbNcU9K4k9FlwBegUbe879FiL3kC1JwrU', '2020-04-14 01:55:51', '2020-04-14 01:55:51'),
(2, 'nam nguyen', '0966343457', 'bach123@gmail.com', '$2y$10$isoFXaPGJifIbYeGrg/R9e2Ms.6TpBc.Wt/kZ2lQ4Re.VENz9XXWu', 'Nam', NULL, '141 đường Chiến Thắng, Tân Triều, Thanh Trì, Hà Nội', 'o98ymrvyBU96OMSaL12hiKCtvq9r6qC5ewk2UfC5RhVw0MvqZkOUj5BWxKeI', '2020-04-15 16:47:00', '2020-04-15 16:47:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2019_09_28_101901_vp_categories', 1),
(8, '2014_10_12_000000_create_users_table', 2),
(9, '2014_10_12_100000_create_password_resets_table', 2),
(10, '2017_06_26_000000_create_shopping_cart_table', 2),
(11, '2019_08_19_000000_create_failed_jobs_table', 2),
(12, '2019_09_28_093701_vp_user', 2),
(13, '2019_12_10_154307_vp_clients', 3),
(14, '2019_11_18_081905_vp_customers', 4),
(15, '2019_11_18_081925_vp_bills', 5),
(16, '2019_12_20_044406_vp_galleries', 6),
(17, '2019_09_28_093941_vp_comment', 7),
(18, '2019_11_18_082113_vp_bill_detail', 8),
(21, '2020_04_15_042551_vp_sales', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Bachs', 'bach@gmail.com', NULL, '$2y$10$Dkb5yD8gPLZLlpQ6QdJJZeqLWZCj2kG0vMkJE7kSnlZHWfa2n6Gbq', '90090170_2623877784536233_9170097773382073471_n.jpg', 'Admin', 'Gnw8lWBDhPfwyBGoP7c0SjNWfQp6xJ4dRLUbBJLzGIHs44A5DDwxPXiCdB6f', NULL, '2020-04-14 00:46:01'),
(2, 'ahihi', 'long@gmail.com', NULL, '$2y$10$moNJ6QtvljRjFVXYdQ1kRe1KXVksRC0idCl3h051gEwNd2gKpfx72', NULL, 'Mod', '75FUh0HXkdqt4QW90cU8CO2BWrZN0c9JeXM3YBfZ184WwXpenMfsPzZUAqhl', NULL, NULL),
(3, 'ahihi', 'linh@gmail.com', NULL, '$2y$10$FIY7mvp5wwAqyI46ufxa5eVT7J/n/xWwdehL8/K3Do5yDJuCShUrq', NULL, 'Mod', NULL, NULL, NULL),
(4, 'ahihi', 'nam@gmail.com', NULL, '$2y$10$LKchpeDbnPbUhOxOemFykez5UWLEzEOydCP/lGqNb/.vFQg9gRcMq', NULL, 'Mod', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vp_bills`
--

CREATE TABLE `vp_bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) UNSIGNED NOT NULL,
  `date_order` datetime NOT NULL,
  `total` double NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill_check` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vp_bills`
--

INSERT INTO `vp_bills` (`id`, `customer_id`, `date_order`, `total`, `note`, `method`, `bill_check`, `created_at`, `updated_at`) VALUES
(1, 2, '2020-04-14 14:17:48', 74209005.82, 'iouiuouyug', 'Tiền mặt', 1, '2020-04-14 07:17:48', '2020-04-14 21:33:41'),
(2, 3, '2020-04-14 14:26:38', 14840100, 'hgfhg', 'Tiền mặt', 0, '2020-04-14 07:26:38', '2020-04-14 19:19:58'),
(3, 4, '2020-04-14 14:27:30', 8505.82, 'ahihi', 'Tiền mặt', 0, '2020-04-14 07:27:31', '2020-04-14 07:32:37'),
(4, 5, '2020-04-14 16:37:33', 14848605.82, 'test', 'Tiền mặt', 0, '2020-04-14 09:37:33', '2020-04-14 18:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `vp_bill_details`
--

CREATE TABLE `vp_bill_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `bill_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vp_bill_details`
--

INSERT INTO `vp_bill_details` (`id`, `bill_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, 13491000, '2020-04-14 07:17:48', '2020-04-14 07:17:48'),
(2, 1, 2, 1, 7732.56, '2020-04-14 07:17:48', '2020-04-14 07:17:48'),
(3, 2, 1, 1, 13491000, '2020-04-14 07:26:38', '2020-04-14 07:26:38'),
(4, 3, 2, 1, 7732.56, '2020-04-14 07:27:31', '2020-04-14 07:27:31'),
(5, 4, 2, 1, 7732.56, '2020-04-14 09:37:33', '2020-04-14 09:37:33'),
(6, 4, 1, 1, 13491000, '2020-04-14 09:37:33', '2020-04-14 09:37:33');

-- --------------------------------------------------------

--
-- Table structure for table `vp_categories`
--

CREATE TABLE `vp_categories` (
  `cate_id` int(10) UNSIGNED NOT NULL,
  `cate_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_present` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vp_categories`
--

INSERT INTO `vp_categories` (`cate_id`, `cate_name`, `cate_slug`, `cate_image`, `cate_present`, `created_at`, `updated_at`) VALUES
(1, 'Iphone', 'iphone', 'neu-phan-van-hay-mua-iPhone.jpg', '<p>Iphone</p>', '2020-04-14 00:47:48', '2020-04-14 01:25:15'),
(2, 'Samsung', 'samsung', 'Samsung-logo.jpg', '<p>Samsung</p>', '2020-04-14 01:24:53', '2020-04-14 01:24:53'),
(3, 'Vivo', 'vivo', '4a2df1cfe75dfcddabd8ca7471a03c94.jpg', '<p>Vivo</p>', '2020-04-14 01:25:39', '2020-04-14 01:25:39'),
(4, 'Oppo', 'oppo', 'vf8rPf6w_400x400.png', '<p>Oppo</p>', '2020-04-14 01:25:58', '2020-04-14 01:25:58'),
(5, 'VSmart', 'vsmart', 'Vsmart-logo.jpg', '<p>VSmart</p>', '2020-04-14 01:26:23', '2020-04-14 01:26:23'),
(6, 'Xiaomi', 'xiaomi', 'xiaomi-logo-vector-download-300x300.jpg', '<p>Xiaomi</p>', '2020-04-14 02:00:52', '2020-04-14 02:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `vp_comment`
--

CREATE TABLE `vp_comment` (
  `com_id` int(10) UNSIGNED NOT NULL,
  `com_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `com_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `com_content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `com_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `com_product` int(10) UNSIGNED NOT NULL,
  `com_reply` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `com_check` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vp_comment`
--

INSERT INTO `vp_comment` (`com_id`, `com_email`, `com_name`, `com_content`, `com_image`, `com_product`, `com_reply`, `com_check`, `created_at`, `updated_at`) VALUES
(1, 'bach@gmail.com', 'nam nguyen', 'dsds', NULL, 1, '<p>ahihi</p>', 1, '2020-04-14 07:23:59', '2020-04-14 07:24:22');

-- --------------------------------------------------------

--
-- Table structure for table `vp_contacts`
--

CREATE TABLE `vp_contacts` (
  `con_id` int(11) NOT NULL,
  `con_email` text COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `con_name` text COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `con_img` text COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `sex` varchar(3) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `con_message` text COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `con_check` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `vp_contacts`
--

INSERT INTO `vp_contacts` (`con_id`, `con_email`, `con_name`, `con_img`, `sex`, `con_message`, `con_check`, `created_at`, `updated_at`) VALUES
(1, 'cuavip1999@gmail.com', 'nam nguyen', NULL, 'Nam', 'ioiiuouoi', 1, '2020-04-15 06:05:46', '2020-04-14 23:05:46');

-- --------------------------------------------------------

--
-- Table structure for table `vp_customers`
--

CREATE TABLE `vp_customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `con_email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` int(11) NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vp_customers`
--

INSERT INTO `vp_customers` (`id`, `name`, `con_email`, `sex`, `address`, `phone_number`, `note`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 'nam nguyen', 'bach@gmail.com', 'Nam', '141 đường Chiến Thắng, Tân Triều, Thanh Trì, Hà Nội', 966343456, NULL, 1, '2020-04-14 07:12:04', '2020-04-14 07:12:04'),
(2, 'nam nguyen', 'bach@gmail.com', 'Nam', '141 đường Chiến Thắng, Tân Triều, Thanh Trì, Hà Nội', 966343456, NULL, 1, '2020-04-14 07:17:48', '2020-04-14 07:17:48'),
(3, 'nam nguyen', 'bach@gmail.com', 'Nam', '141 đường Chiến Thắng, Tân Triều, Thanh Trì, Hà Nội', 966343456, NULL, 1, '2020-04-14 07:26:38', '2020-04-14 07:26:38'),
(4, 'nam nguyen', 'bach@gmail.com', 'Nam', '141 đường Chiến Thắng, Tân Triều, Thanh Trì, Hà Nội', 966343456, NULL, 1, '2020-04-14 07:27:30', '2020-04-14 07:27:30'),
(5, 'nam nguyen', 'bach@gmail.com', 'Nam', '141 đường Chiến Thắng, Tân Triều, Thanh Trì, Hà Nội', 966343456, NULL, 1, '2020-04-14 09:37:33', '2020-04-14 09:37:33');

-- --------------------------------------------------------

--
-- Table structure for table `vp_galleries`
--

CREATE TABLE `vp_galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vp_galleries`
--

INSERT INTO `vp_galleries` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'Xiaomi Mi Note 10 Pro_1.jpg', 1, '2020-04-14 06:13:39', '2020-04-14 06:13:39'),
(2, 'Xiaomi Mi Note 10 Pro_2.jpg', 1, '2020-04-14 06:13:50', '2020-04-14 06:13:50'),
(3, 'Xiaomi Mi Note 10 Pro_3.jpg', 1, '2020-04-14 06:14:02', '2020-04-14 06:14:02');

-- --------------------------------------------------------

--
-- Table structure for table `vp_products`
--

CREATE TABLE `vp_products` (
  `prod_id` int(10) UNSIGNED NOT NULL,
  `prod_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_price` int(11) NOT NULL,
  `prod_sale` float NOT NULL,
  `prod_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_ram` int(11) NOT NULL,
  `prod_hardDrive` int(11) NOT NULL,
  `prod_warranty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_accessories` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_condition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_promotion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_featured` tinyint(4) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `prod_cate` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vp_products`
--

INSERT INTO `vp_products` (`prod_id`, `prod_name`, `prod_slug`, `prod_price`, `prod_sale`, `prod_img`, `prod_ram`, `prod_hardDrive`, `prod_warranty`, `prod_accessories`, `prod_condition`, `prod_promotion`, `prod_description`, `prod_featured`, `prod_qty`, `prod_cate`, `created_at`, `updated_at`) VALUES
(1, 'Xiaomi Mi Note 10 Pro', 'xiaomi-mi-note-10-pro', 14990000, 10, 'XiaomiMiNote10Pro.png', 4, 32, 'Bảo hành chính hãng 12 tháng.', 'Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim, Nắp lưng', 'Trả góp 0%', '<p>Giảm ngay 1.5 triệu (đã trừ vào giá)Tặng 2 suất mua Đồng hồ thời trang giảm 40% (kh&ocirc;ng &aacute;p dụng th&ecirc;m khuyến m&atilde;i kh&aacute;c)&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/dong-ho-giam-gia-thang-moi-1246102\" target=\"_blank\">(click xem chi tiết)</a></p>', '<h3>Th&ocirc;ng số kỹ thuật chi tiết Xiaomi Mi Note 10 Pro</h3>\r\n\r\n<p><img alt=\"Thông số kỹ thuật 213590\" src=\"https://cdn.tgdd.vn/Products/Images/42/213590/Kit/xiaomi-mi-note-10-pro-mo-ta.jpg\" style=\"height:430px; width:500px\" /></p>\r\n\r\n<ul>\r\n	<li>M&agrave;n h&igrave;nh</li>\r\n	<li>C&ocirc;ng nghệ m&agrave;n h&igrave;nh\r\n	<p><a href=\"https://www.thegioididong.com/hoi-dap/man-hinh-amoled-la-gi-905766\" target=\"_blank\">AMOLED</a></p>\r\n	</li>\r\n	<li>Độ ph&acirc;n giải\r\n	<p><a href=\"https://www.thegioididong.com/tin-tuc/do-phan-giai-man-hinh-qhd-hd-fullhd-2k-4k-la-gi--592178#fullhd\" target=\"_blank\">Full HD+ (1080 x 2340 Pixels)</a></p>\r\n	</li>\r\n	<li>M&agrave;n h&igrave;nh rộng\r\n	<p>6.47&quot;</p>\r\n	</li>\r\n	<li>\r\n	<p>Mặt k&iacute;nh cảm ứng</p>\r\n\r\n	<p><a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-ve-cac-mat-kinh-cuong-luc-gorilla-glass-1172198#glass5\" target=\"_blank\">K&iacute;nh cường lực Corning Gorilla Glass 5</a></p>\r\n	</li>\r\n	<li>Camera sau</li>\r\n	<li>Độ ph&acirc;n giải\r\n	<p>Ch&iacute;nh 108 MP &amp; Phụ 20 MP, 12 MP, 5 MP, 2 MP</p>\r\n	</li>\r\n	<li>Quay phim\r\n	<p><a href=\"https://www.thegioididong.com/hoi-dap/quay-phim-sieu-cham-super-slow-motion-960fps-la-1144253\" target=\"_blank\">Quay phim HD 720p@960fps</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/cac-chuan-quay-phim-tren-dien-thoai-tablet-pho-bi-1174134#fullhd\" target=\"_blank\">Quay phim FullHD 1080p@30fps</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/cac-chuan-quay-phim-tren-dien-thoai-tablet-pho-bi-1174134#fullhd\" target=\"_blank\">Quay phim FullHD 1080p@60fps</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/cac-chuan-quay-phim-tren-dien-thoai-tablet-pho-bi-1174134#fullhd\" target=\"_blank\">Quay phim FullHD 1080p@120fps</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/cac-chuan-quay-phim-tren-dien-thoai-tablet-pho-bi-1174134#fullhd\" target=\"_blank\">Quay phim FullHD 1080p@240fps</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/cac-chuan-quay-phim-tren-dien-thoai-tablet-pho-bi-1174134#4k\" target=\"_blank\">Quay phim 4K 2160p@30fps</a></p>\r\n	</li>\r\n	<li>Đ&egrave;n Flash\r\n	<p><a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-cac-loai-den-flash-tren-camera-dien-thoai-1143808#flash4bongled\" target=\"_blank\">4 đ&egrave;n LED (2 t&ocirc;ng m&agrave;u)</a></p>\r\n	</li>\r\n	<li>Chụp ảnh n&acirc;ng cao\r\n	<p><a href=\"https://www.thegioididong.com/hoi-dap/quay-phim-sieu-cham-super-slow-motion-960fps-la-gi-1144253\" target=\"_blank\">Quay si&ecirc;u chậm (Super Slow Motion)</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-cong-nghe-lay-net-theo-pha-tren-smartph-1007275\" target=\"_blank\">Lấy n&eacute;t theo pha (PDAF)</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/ai-camera-la-gi-co-tac-dung-gi-trong-may-anh-1169103\" target=\"_blank\">A.I Camera</a>,&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/cac-che-do-chup-anh-tren-smartphone-tiep-theo--739084#sieudophangiai\" target=\"_blank\">Si&ecirc;u độ ph&acirc;n giải</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/che-do-chup-dem-night-mode-la-gi-907873\" target=\"_blank\">Ban đ&ecirc;m (Night Mode)</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/che-do-quay-phim-timelapse-la-gi-1172228\" target=\"_blank\">Tr&ocirc;i nhanh thời gian (Time Lapse)</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/slow-motion-la-gi-1013728\" target=\"_blank\">Quay chậm (Slow Motion)</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/chup-anh-xoa-phong-la-gi-no-co-tac-dung-nhu-the-na-1138006\" target=\"_blank\">Xo&aacute; ph&ocirc;ng</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/zoom-quang-hoc-tren-camera-smartphone-la-gi-1172374\" target=\"_blank\">Zoom quang học</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/lay-net-laser-la-gi-756447\" target=\"_blank\">L&acirc;́y nét bằng laser</a>, L&agrave;m đẹp,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/camera-goc-rong-goc-sieu-rong-tren-smartphone-l-1172240\" target=\"_blank\">G&oacute;c rộng (Wide)</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/che-do-chup-macro-la-gi-907851\" target=\"_blank\">Si&ecirc;u cận (Macro)</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/camera-goc-rong-goc-sieu-rong-tren-smartphone-l-1172240\" target=\"_blank\">G&oacute;c si&ecirc;u rộng (Ultrawide)</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/che-do-autofocus-trong-chup-anh-tren-smartphone-906408\" target=\"_blank\">Tự động lấy n&eacute;t (AF)</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/che-do-touch-focus-khi-chup-anh-tren-smartphone-906412\" target=\"_blank\">Chạm lấy n&eacute;t</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/chuc-nang-nhan-dien-khuon-mat-la-gi-907903\" target=\"_blank\">Nhận diện khu&ocirc;n mặt</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/che-do-chup-anh-hdr-tren-smartphone-la-gi-906400\" target=\"_blank\">HDR</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/chup-anh-panorama-toan-canh-tren-camera-cua-smar-906425\" target=\"_blank\">To&agrave;n cảnh (Panorama)</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/che-do-chong-rung-quang-hoc-ois-chup-anh-tren-sm-906416\" target=\"_blank\">Chống rung quang học (OIS)</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/che-do-lam-dep-beautify-tren-smartphone-tablet-1172231\" target=\"_blank\">L&agrave;m đẹp (Beautify)</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/che-do-chup-anh-manual-mode-pro-tren-smartphone-906405\" target=\"_blank\">Chuy&ecirc;n nghiệp (Pro)</a></p>\r\n	</li>\r\n	<li>Camera trước</li>\r\n	<li>Độ ph&acirc;n giải\r\n	<p>32 MP</p>\r\n	</li>\r\n	<li>Videocall\r\n	<p><a href=\"https://www.thegioididong.com/hoi-dap/goi-video-call-la-gi-neu-may-khong-trang-bi-san-1174141\" target=\"_blank\">Hỗ trợ VideoCall th&ocirc;ng qua ứng dụng</a></p>\r\n	</li>\r\n	<li>Th&ocirc;ng tin kh&aacute;c\r\n	<p><a href=\"https://www.thegioididong.com/hoi-dap/chup-anh-xoa-phong-la-gi-no-co-tac-dung-nhu-the-na-1138006\" target=\"_blank\">Xo&aacute; ph&ocirc;ng</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/cac-chuan-quay-phim-tren-dien-thoai-tablet-pho-1174134#hd\" target=\"_blank\">Quay video HD</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/chuc-nang-nhan-dien-khuon-mat-la-gi-907903\" target=\"_blank\">Nhận diện khu&ocirc;n mặt</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/che-do-lam-dep-beautify-tren-smartphone-tablet-1172231\" target=\"_blank\">L&agrave;m đẹp (Beautify)</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/cac-chuan-quay-phim-tren-dien-thoai-tablet-pho-1174134#fullhd\" target=\"_blank\">Quay video Full HD</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/che-do-autofocus-trong-chup-anh-tren-smartphone-906408\" target=\"_blank\">Tự động lấy n&eacute;t (AF)</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/che-do-chup-anh-hdr-tren-smartphone-la-gi-906400\" target=\"_blank\">HDR</a></p>\r\n	</li>\r\n	<li>Hệ điều h&agrave;nh - CPU</li>\r\n	<li>Hệ điều h&agrave;nh\r\n	<p><a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-android-90-pie-va-nhung-tinh-nang-moi-noi-1107119\" target=\"_blank\">Android 9.0 (Pie)</a></p>\r\n	</li>\r\n	<li>Chipset (h&atilde;ng SX CPU)\r\n	<p><a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-chip-qualcomm-snapdragon-730-1174819\" target=\"_blank\">Snapdragon 730G 8 nh&acirc;n</a></p>\r\n	</li>\r\n	<li>Tốc độ CPU\r\n	<p>2 nh&acirc;n 2.2 GHz &amp; 6 nh&acirc;n 1.8 GHz</p>\r\n	</li>\r\n	<li>Chip đồ họa (GPU)\r\n	<p><a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-chip-qualcomm-snapdragon-730-1174819#adreno618\" target=\"_blank\">Adreno 618</a></p>\r\n	</li>\r\n	<li>Bộ nhớ &amp; Lưu trữ</li>\r\n	<li>RAM\r\n	<p>8 GB</p>\r\n	</li>\r\n	<li>Bộ nhớ trong\r\n	<p>256 GB</p>\r\n	</li>\r\n	<li>Bộ nhớ c&ograve;n lại (khả dụng)\r\n	<p>Đang cập nhật</p>\r\n	</li>\r\n	<li>Thẻ nhớ ngo&agrave;i\r\n	<p>Kh&ocirc;ng</p>\r\n	</li>\r\n	<li>Kết nối</li>\r\n	<li>Mạng di động\r\n	<p><a href=\"https://www.thegioididong.com/hoi-dap/mang-du-lieu-di-dong-4g-la-gi-731757\" target=\"_blank\">Hỗ trợ 4G</a></p>\r\n	</li>\r\n	<li>SIM\r\n	<p><a href=\"https://www.thegioididong.com/tin-tuc/tim-hieu-cac-loai-sim-thong-dung-sim-thuong-micro--590216#nanosim\" target=\"_blank\">2 Nano SIM</a></p>\r\n	</li>\r\n	<li>Wifi\r\n	<p><a href=\"https://www.thegioididong.com/tin-tuc/wifi-la-gi-cai-dat-wifi-hotspot-nhu-the-nao--590309#80211ac\" target=\"_blank\">Wi-Fi 802.11 a/b/g/n/ac</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/wifi-dual-band-la-gi-736489\" target=\"_blank\">Dual-band</a>,&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/wi-fi-direct-la-gi--590298\" target=\"_blank\">Wi-Fi Direct</a>,&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/wifi-la-gi-cai-dat-wifi-hotspot-nhu-the-nao--590309#wifihotspot\" target=\"_blank\">Wi-Fi hotspot</a></p>\r\n	</li>\r\n	<li>GPS\r\n	<p><a href=\"https://www.thegioididong.com/hoi-dap/gps-la-gi-806129#bds\" target=\"_blank\">BDS</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/gps-la-gi-806129#a-gps\" target=\"_blank\">A-GPS</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/gps-la-gi-806129#glonass\" target=\"_blank\">GLONASS</a></p>\r\n	</li>\r\n	<li>Bluetooth\r\n	<p><a href=\"https://www.thegioididong.com/hoi-dap/cong-nghe-bluetooth-a2dp-la-gi-723725\" target=\"_blank\">A2DP</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/cong-nghe-bluetooth-743602#le\" target=\"_blank\">LE</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/cong-nghe-bluetooth-743602#aptx\" target=\"_blank\">apt-X</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/bluetooth-50-chuan-bluetooth-danh-cho-thoi-dai-1113891\" target=\"_blank\">v5.0</a></p>\r\n	</li>\r\n	<li>C&ocirc;̉ng k&ecirc;́t n&ocirc;́i/sạc\r\n	<p><a href=\"https://www.thegioididong.com/hoi-dap/usb-typec-chuan-muc-cong-ket-noi-moi-723760\" target=\"_blank\">USB Type-C</a></p>\r\n	</li>\r\n	<li>Jack tai nghe\r\n	<p>3.5 mm</p>\r\n	</li>\r\n	<li>Kết nối kh&aacute;c\r\n	<p><a href=\"https://www.thegioididong.com/hoi-dap/ket-noi-nfc-tren-dien-thoai-may-tinh-bang-la-gi-1172835\" target=\"_blank\">NFC</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/ket-noi-otg-la-gi-otg-duoc-su-dung-cho-muc-dich-gi-1172882\" target=\"_blank\">OTG</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/cam-bien-hong-ngoai-tren-dien-thoai-la-gi-926657\" target=\"_blank\">Hồng Ngoại</a></p>\r\n	</li>\r\n	<li>Thiết kế &amp; Trọng lượng</li>\r\n	<li>Thiết kế\r\n	<p><a href=\"https://www.thegioididong.com/tin-tuc/tim-hieu-cac-kieu-thiet-ke-tren-di-dong-va-may-tin-597153#nguyenkhoi\" target=\"_blank\">Nguy&ecirc;n khối</a></p>\r\n	</li>\r\n	<li>Chất liệu\r\n	<p>Khung kim loại &amp; Mặt lưng k&iacute;nh cường lực</p>\r\n	</li>\r\n	<li>K&iacute;ch thước\r\n	<p>D&agrave;i 157.8 mm - Ngang 74.2 mm - D&agrave;y 9.67 mm</p>\r\n	</li>\r\n	<li>Trọng lượng\r\n	<p>208 g</p>\r\n	</li>\r\n	<li>Th&ocirc;ng tin pin &amp; Sạc</li>\r\n	<li>Dung lượng pin\r\n	<p>5260 mAh</p>\r\n	</li>\r\n	<li>Loại pin\r\n	<p><a href=\"https://www.thegioididong.com/hoi-dap/so-sanh-pin-li-ion-va-pin-li-po-651833#lipo\" target=\"_blank\">Pin chuẩn Li-Po</a></p>\r\n	</li>\r\n	<li>\r\n	<p>C&ocirc;ng nghệ pin</p>\r\n\r\n	<p><a href=\"https://www.thegioididong.com/hoi-dap/che-do-tiet-kiem-pin-va-sieu-tiet-kiem-pin-la-gi-926730\" target=\"_blank\">Tiết kiệm pin</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/che-do-tiet-kiem-pin-va-sieu-tiet-kiem-pin-la-gi-926730\" target=\"_blank\">Si&ecirc;u tiết kiệm pin</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/cong-nghe-sac-nhanh-tren-smartphone-755549\" target=\"_blank\">Sạc pin nhanh</a></p>\r\n	</li>\r\n	<li>Tiện &iacute;ch</li>\r\n	<li>Bảo mật n&acirc;ng cao\r\n	<p><a href=\"https://www.thegioididong.com/hoi-dap/tinh-nang-mo-khoa-bang-khuon-mat-la-gi-1167784\" target=\"_blank\">Mở kho&aacute; khu&ocirc;n mặt</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-ve-cam-bien-van-tay-duoi-man-hinh-1171916\" target=\"_blank\">Mở kho&aacute; v&acirc;n tay dưới m&agrave;n h&igrave;nh</a></p>\r\n	</li>\r\n	<li>T&iacute;nh năng đặc biệt\r\n	<p><a href=\"https://www.thegioididong.com/hoi-dap/man-hinh-luon-hien-thi-always-on-display-la-gi-1169208\" target=\"_blank\">M&agrave;n h&igrave;nh lu&ocirc;n hiển thị AOD</a><br />\r\n	Đ&egrave;n pin<br />\r\n	<a href=\"https://www.thegioididong.com/hoi-dap/tong-hop-mot-so-tinh-nang-quen-thuoc-tren-dien-t-1144487#chan\" target=\"_blank\">Chặn cuộc gọi</a><br />\r\n	<a href=\"https://www.thegioididong.com/hoi-dap/tong-hop-mot-so-tinh-nang-quen-thuoc-tren-dien-t-1144487#chan\" target=\"_blank\">Chặn tin nhắn</a><br />\r\n	<a href=\"https://www.thegioididong.com/hoi-dap/man-hinh-cong-25d-chuan-muc-moi-cho-smartphone-837574\" target=\"_blank\">Mặt k&iacute;nh 2.5D</a></p>\r\n	</li>\r\n	<li>Ghi &acirc;m\r\n	<p><a href=\"https://www.thegioididong.com/hoi-dap/microphone-chong-on-la-gi-894183\" target=\"_blank\">C&oacute;, microphone chuy&ecirc;n dụng chống ồn</a></p>\r\n	</li>\r\n	<li>Radio\r\n	<p>C&oacute;</p>\r\n	</li>\r\n	<li>Xem phim\r\n	<p><a href=\"https://www.thegioididong.com/hoi-dap/cac-dinh-dang-video-va-am-thanh-740243#3gp\" target=\"_blank\">3GP</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/cac-dinh-dang-video-va-am-thanh-740243#mp4\" target=\"_blank\">MP4</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/cac-dinh-dang-video-va-am-thanh-740243#avi\" target=\"_blank\">AVI</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/cac-dinh-dang-video-va-am-thanh-740243#wmv\" target=\"_blank\">WMV</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/cac-dinh-dang-video-va-am-thanh-pho-bien-hien-nay-740243#divx\" target=\"_blank\">DivX</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/cac-dinh-dang-video-va-am-thanh-pho-bien-hien-nay-740243#xvid\" target=\"_blank\">Xvid</a></p>\r\n	</li>\r\n	<li>Nghe nhạc\r\n	<p><a href=\"https://www.thegioididong.com/hoi-dap/cac-dinh-dang-video-va-am-thanh-740243#midi\" target=\"_blank\">Midi</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/cac-dinh-dang-video-va-am-thanh-740243#mp3\" target=\"_blank\">MP3</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/cac-dinh-dang-video-va-am-thanh-740243#wav\" target=\"_blank\">WAV</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/cac-dinh-dang-video-va-am-thanh-740243#wma\" target=\"_blank\">WMA</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/cac-dinh-dang-video-va-am-thanh-740243#aac\" target=\"_blank\">AAC</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/cac-dinh-dang-video-va-am-thanh-740243#ogg\" target=\"_blank\">OGG</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/cac-dinh-dang-video-va-am-thanh-740243#flac\" target=\"_blank\">FLAC</a></p>\r\n	</li>\r\n	<li>Th&ocirc;ng tin kh&aacute;c</li>\r\n	<li>Thời điểm ra mắt\r\n	<p>12/2019</p>\r\n	</li>\r\n</ul>', 1, 100, 3, '2020-04-14 01:36:55', '2020-04-14 01:36:55'),
(2, 'dgdfgd', 'dgdfgd', 8787, 12, 'huawei-p30-pro-1-400x460.png', 23, 35, 'Bảo hành chính hãng 12 tháng.', 'Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim, Nắp lưng', 'Trả góp 0%', '<p>ẻwterw</p>', '<p>dfsd</p>', 1, 34, 2, '2020-04-14 06:13:03', '2020-04-14 06:13:03');

-- --------------------------------------------------------

--
-- Table structure for table `vp_sales`
--

CREATE TABLE `vp_sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `bill_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vp_sales`
--

INSERT INTO `vp_sales` (`id`, `user_id`, `bill_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-04-14 21:33:41', '2020-04-14 21:33:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vp_clients_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vp_bills`
--
ALTER TABLE `vp_bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bills_customer_id` (`customer_id`);

--
-- Indexes for table `vp_bill_details`
--
ALTER TABLE `vp_bill_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bill_details_product_id` (`product_id`),
  ADD KEY `fk_bill_details_bills_id` (`bill_id`);

--
-- Indexes for table `vp_categories`
--
ALTER TABLE `vp_categories`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `vp_comment`
--
ALTER TABLE `vp_comment`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `vp_comment_com_product_foreign` (`com_product`);

--
-- Indexes for table `vp_contacts`
--
ALTER TABLE `vp_contacts`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `vp_customers`
--
ALTER TABLE `vp_customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_customer_client_id` (`client_id`);

--
-- Indexes for table `vp_galleries`
--
ALTER TABLE `vp_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_galleries_product_id` (`product_id`);

--
-- Indexes for table `vp_products`
--
ALTER TABLE `vp_products`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `fk_category_id` (`prod_cate`);

--
-- Indexes for table `vp_sales`
--
ALTER TABLE `vp_sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vp_sales_bill_id_foreign` (`bill_id`),
  ADD KEY `vp_sales_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vp_bills`
--
ALTER TABLE `vp_bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vp_bill_details`
--
ALTER TABLE `vp_bill_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vp_categories`
--
ALTER TABLE `vp_categories`
  MODIFY `cate_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vp_comment`
--
ALTER TABLE `vp_comment`
  MODIFY `com_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vp_contacts`
--
ALTER TABLE `vp_contacts`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vp_customers`
--
ALTER TABLE `vp_customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vp_galleries`
--
ALTER TABLE `vp_galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vp_products`
--
ALTER TABLE `vp_products`
  MODIFY `prod_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vp_sales`
--
ALTER TABLE `vp_sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vp_bills`
--
ALTER TABLE `vp_bills`
  ADD CONSTRAINT `fk_bills_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `vp_customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vp_bill_details`
--
ALTER TABLE `vp_bill_details`
  ADD CONSTRAINT `fk_bill_details_bills_id` FOREIGN KEY (`bill_id`) REFERENCES `vp_bills` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_bill_details_product_id` FOREIGN KEY (`product_id`) REFERENCES `vp_products` (`prod_id`) ON DELETE CASCADE;

--
-- Constraints for table `vp_comment`
--
ALTER TABLE `vp_comment`
  ADD CONSTRAINT `vp_comment_com_product_foreign` FOREIGN KEY (`com_product`) REFERENCES `vp_products` (`prod_id`) ON DELETE CASCADE;

--
-- Constraints for table `vp_customers`
--
ALTER TABLE `vp_customers`
  ADD CONSTRAINT `fk_customer_client_id` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vp_galleries`
--
ALTER TABLE `vp_galleries`
  ADD CONSTRAINT `fk_galleries_product_id` FOREIGN KEY (`product_id`) REFERENCES `vp_products` (`prod_id`) ON DELETE CASCADE;

--
-- Constraints for table `vp_products`
--
ALTER TABLE `vp_products`
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`prod_cate`) REFERENCES `vp_categories` (`cate_id`) ON DELETE CASCADE;

--
-- Constraints for table `vp_sales`
--
ALTER TABLE `vp_sales`
  ADD CONSTRAINT `vp_sales_bill_id_foreign` FOREIGN KEY (`bill_id`) REFERENCES `vp_bills` (`id`),
  ADD CONSTRAINT `vp_sales_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
