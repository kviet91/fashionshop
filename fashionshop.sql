-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 21, 2018 lúc 04:26 AM
-- Phiên bản máy phục vụ: 10.1.33-MariaDB
-- Phiên bản PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `fashionshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catalogs`
--

CREATE TABLE `catalogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_catalog_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `catalogs`
--

INSERT INTO `catalogs` (`id`, `parent_catalog_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 0, 'ĐỒ NAM', '', '2018-08-01 17:00:00', NULL),
(2, 0, 'ĐỒ NỮ', '', '2018-08-01 17:00:00', NULL),
(3, 0, 'TRẺ EM', '', '2018-08-01 17:00:00', NULL),
(4, 0, 'PHỤ KIỆN', '', '2018-08-01 17:00:00', NULL),
(5, 1, 'SƠ MI NAM', '', '2018-08-01 17:00:00', NULL),
(6, 1, 'ĐỒ BỘ- ĐỒ NGỦ NAM', '', NULL, NULL),
(7, 1, 'T-SHIRT NAM', '', NULL, NULL),
(8, 1, 'ÁO KHOÁC NAM', '', NULL, NULL),
(9, 1, 'QUẦN JEANS NAM', '', '2018-08-01 17:00:00', NULL),
(10, 2, 'VÁY DẠ HỘI', '', NULL, NULL),
(11, 2, 'ĐỒ BỘ- ĐỒ NGỦ NỮ', '', NULL, NULL),
(12, 2, 'ÁO SƠ MI NỮ', '', NULL, NULL),
(13, 2, 'QUẦN ÁO CÔNG SỞ', '', NULL, NULL),
(14, 2, 'T-SHIRT NỮ', '', NULL, NULL),
(15, 2, 'ÁO KHOÁC NỮ', '', NULL, NULL),
(16, 4, 'TÚI XÁCH', '', NULL, NULL),
(17, 4, 'GIÀY DÉP', '', NULL, NULL),
(18, 4, 'ĐỒNG HỒ', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `product_id`, `user_id`, `content`, `rate`, `created_at`, `updated_at`) VALUES
(3, 13, 15, 'Sản phẩm này còn hàng không ad?', 2, '2018-09-20 03:23:21', '2018-09-20 03:23:21'),
(4, 1, 15, 'Rất đẹp', 3, '2018-09-20 18:37:20', '2018-09-20 18:37:20'),
(5, 1, 18, 'Vừa với mình luôn', 4, '2018-09-20 18:39:28', '2018-09-20 18:39:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `img_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `product_id`, `img_link`, `created_at`, `updated_at`) VALUES
(5, 12, 'ao-dai-tay-nam-1.jpg', '2018-08-04 11:02:34', '2018-08-04 11:02:34'),
(6, 12, 'ao-dai-tay-nam-2.jpg', '2018-08-04 11:02:34', '2018-08-04 11:02:34'),
(7, 12, 'ao-dai-tay-nam-3.jpg', '2018-08-04 11:02:34', '2018-08-04 11:02:34'),
(8, 13, 'ao-vest-cao-cap-den-1.jpg', '2018-08-04 11:05:32', '2018-08-04 11:05:32'),
(9, 13, 'ao-vest-cao-cap-den-2.jpg', '2018-08-04 11:05:32', '2018-08-04 11:05:32'),
(10, 13, 'ao-vest-cao-cap-den-3.jpg', '2018-08-04 11:05:32', '2018-08-04 11:05:32'),
(11, 14, 'quan-jean-den-nam-1.jpg', '2018-08-04 11:09:48', '2018-08-04 11:09:48'),
(12, 14, 'quan-jean-den-nam-2.jpg', '2018-08-04 11:09:48', '2018-08-04 11:09:48'),
(13, 14, 'quan-jean-den-nam-3.jpg', '2018-08-04 11:09:49', '2018-08-04 11:09:49'),
(14, 15, 'ao-thun-ba-lo-xam-xanh-nam-1.jpg', '2018-08-04 11:15:39', '2018-08-04 11:15:39'),
(15, 15, 'ao-thun-ba-lo-xam-xanh-nam-2.jpg', '2018-08-04 11:15:39', '2018-08-04 11:15:39'),
(16, 15, 'ao-thun-ba-lo-xam-xanh-nam-3.jpg', '2018-08-04 11:15:39', '2018-08-04 11:15:39'),
(17, 16, 'ao-so-mi-ngan-tay-den-nam-1.jpg', '2018-08-04 11:33:24', '2018-08-04 11:33:24'),
(18, 16, 'ao-so-mi-ngan-tay-den-nam-2.jpg', '2018-08-04 11:33:24', '2018-08-04 11:33:24'),
(19, 16, 'ao-so-mi-ngan-tay-den-nam-3.jpg', '2018-08-04 11:33:24', '2018-08-04 11:33:24'),
(20, 19, 'giay-boot-co-cao-den-nam-1.jpg', '2018-08-05 23:48:47', '2018-08-05 23:48:47'),
(21, 19, 'giay-boot-co-cao-den-nam-2.jpg', '2018-08-05 23:48:48', '2018-08-05 23:48:48'),
(22, 19, 'giay-boot-co-cao-den-nam-3.jpg', '2018-08-05 23:48:48', '2018-08-05 23:48:48'),
(23, 20, 'vi-da-nam-mau-bo-1.jpg', '2018-08-06 00:15:17', '2018-08-06 00:15:17'),
(24, 20, 'vi-da-nam-mau-bo-2.jpg', '2018-08-06 00:15:17', '2018-08-06 00:15:17'),
(27, 6, 'that-lung-nam-nau-2.jpg', '2018-08-06 01:21:07', '2018-08-06 01:21:07'),
(28, 6, 'that-lung-nam-nau-3.jpg', '2018-08-06 01:21:07', '2018-08-06 01:21:07'),
(29, 6, 'that-lung-nam-nau-4.jpg', '2018-08-06 01:21:07', '2018-08-06 01:21:07'),
(32, 22, 'dam-thiet-ke-nu-1.jpg', '2018-08-07 04:05:23', '2018-08-07 04:05:23'),
(33, 22, 'dam-thiet-ke-nu-2.jpg', '2018-08-07 04:05:23', '2018-08-07 04:05:23'),
(34, 22, 'dam-thiet-ke-nu-3.jpg', '2018-08-07 04:05:23', '2018-08-07 04:05:23'),
(35, 1, 'ao_so_mi_nu1.jpg', NULL, NULL),
(36, 2, 'ao_khoac_nu1.jpg\r\n', NULL, NULL),
(37, 6, 'that-lung-nam-nau-4.jpg', NULL, NULL),
(39, 8, 'tre_em1.jpg', NULL, NULL),
(40, 9, 'ao-so-mi-han-quoc-den-nam-3.jpg', NULL, NULL),
(41, 12, 'ao-dai-tay-nam-3.jpg', NULL, NULL),
(42, 12, 'ao-dai-tay-nam-2.jpg', NULL, NULL),
(43, 12, 'ao-dai-tay-nam-3.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_07_25_015026_create_catalogs_table', 1),
(4, '2018_07_25_015059_create_products_table', 1),
(5, '2018_07_25_015158_create_transactions_table', 1),
(6, '2018_07_25_015254_create_orders_table', 1),
(7, '2018_07_25_015330_create_comments_table', 1),
(8, '2018_07_25_015402_create_rates_table', 1),
(9, '2018_08_02_060747_create_slides_table', 1),
(10, '2018_08_03_070944_create_images_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `transaction_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `count` int(10) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `status` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `transaction_id`, `product_id`, `count`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 1, 140000, 0, '2018-09-20 18:35:40', '2018-09-20 18:35:40'),
(2, 1, 2, 1, 720000, 0, '2018-09-20 18:35:40', '2018-09-20 18:35:40'),
(3, 1, 19, 3, 720000, 0, '2018-09-20 18:35:40', '2018-09-20 18:35:40'),
(4, 2, 1, 1, 400000, 0, '2018-09-20 18:39:45', '2018-09-20 18:39:45'),
(5, 2, 2, 2, 1440000, 0, '2018-09-20 18:39:46', '2018-09-20 18:39:46'),
(6, 2, 22, 1, 280000, 0, '2018-09-20 18:39:46', '2018-09-20 18:39:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `catalog_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `discount` double(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `img_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_list` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `count_buy` int(10) UNSIGNED DEFAULT NULL,
  `count` int(10) UNSIGNED NOT NULL,
  `views` int(10) UNSIGNED DEFAULT NULL,
  `rate` double(8,2) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `catalog_id`, `name`, `price`, `discount`, `description`, `status`, `img_link`, `img_list`, `count_buy`, `count`, `views`, `rate`, `created_at`, `updated_at`) VALUES
(1, 12, 'SƠ MI NỮ', 500000.00, 0.20, 'SƠ MI NỮ', 0, 'ao_so_mi_nu1.jpg', 'ao_so_mi_nu1.jpg', 2, 10, 1, 2.00, NULL, NULL),
(2, 15, 'ÁO KHOÁC NỮ', 800000.00, 0.10, 'ÁO KHOÁC NỮ', 1, 'ao_khoac_nu1.jpg', 'ao_khoac_nu1.jpg', 20, 100, 50, 6.00, NULL, NULL),
(6, 4, 'THẮT LƯNG DA', 200000.00, 0.30, 'THẮT LƯNG DA', 1, 'that-lung-nam-nau-4.jpg', 'product01.jpg, , that-lung-nam-nau-2.jpg, that-lung-nam-nau-3.jpg, that-lung-nam-nau-4.jpg', 3, 20, 1, 3.00, NULL, '2018-08-06 01:53:57'),
(8, 3, 'ÁO KHOÁC TRẺ EM', 550000.00, 0.00, 'ÁO KHOÁC TRẺ EM', 1, 'tre_em1.jpg', 'tre_em1.jpg', 0, 0, 0, 0.00, NULL, NULL),
(9, 5, 'SƠ MI THIẾT KẾ SM84387', 340000.00, 0.00, 'SƠ MI THIẾT KẾ SM84387', 1, 'ao-so-mi-han-quoc-den-nam-3.jpg', 'ao-so-mi-han-quoc-den-nam-1.jpg, ao-so-mi-han-quoc-den-nam-2.jpg, ao-so-mi-han-quoc-den-nam-3.jpg', 0, 0, 0, 0.00, NULL, NULL),
(12, 6, 'ÁO SƠ DÀI TAY NAM', 150000.00, 0.20, 'ÁO SƠ DÀI TAY NAM', 1, 'ao-dai-tay-nam-3.jpg', ', ao-dai-tay-nam-1.jpg, ao-dai-tay-nam-2.jpg, ao-dai-tay-nam-3.jpg', 0, 15, 0, 0.00, '2018-08-04 11:02:33', '2018-08-06 01:13:26'),
(13, 8, 'ÁO VEST ĐEN NAM', 300000.00, 0.30, 'ÁO VEST ĐEN NAM', 1, 'ao-vest-cao-cap-den-3.jpg', ', ao-vest-cao-cap-den-1.jpg, ao-vest-cao-cap-den-2.jpg, ao-vest-cao-cap-den-3.jpg', 0, 15, 0, 0.00, '2018-08-04 11:05:32', '2018-08-06 07:10:24'),
(14, 9, 'QUẦN JEANS ĐEN NAM', 300000.00, 0.20, 'QUẦN JEANS ĐEN NAM', 1, 'quan-jean-den-nam-3.jpg', ', quan-jean-den-nam-1.jpg, quan-jean-den-nam-2.jpg, quan-jean-den-nam-3.jpg', 0, 12, 0, 0.00, '2018-08-04 11:09:48', '2018-08-04 11:09:49'),
(15, 7, 'ÁO THUN BA LỖ XÁM XANH NAM', 150000.00, 0.20, 'ÁO THUN BA LỖ XÁM XANH NAM', 1, 'ao-thun-ba-lo-xam-xanh-nam-3.jpg', ', ao-thun-ba-lo-xam-xanh-nam-1.jpg, ao-thun-ba-lo-xam-xanh-nam-2.jpg, ao-thun-ba-lo-xam-xanh-nam-3.jpg', 0, 15, 0, 0.00, '2018-08-04 11:15:39', '2018-08-04 11:15:39'),
(16, 5, 'ÁO SƠ MI NGẮN TAY ĐEN NAM', 200000.00, 0.20, 'ÁO SƠ MI NGẮN TAY ĐEN NAM', 1, 'ao-so-mi-ngan-tay-den-nam-3.jpg', ', ao-so-mi-ngan-tay-den-nam-1.jpg, ao-so-mi-ngan-tay-den-nam-2.jpg, ao-so-mi-ngan-tay-den-nam-3.jpg', 0, 12, 0, 0.00, '2018-08-04 11:33:24', '2018-08-04 11:33:24'),
(19, 17, 'GIẦY BOOT CỔ CAO ĐEN NAM', 300000.00, 0.20, 'GIẦY BOOT CỔ CAO ĐEN NAM', 1, 'giay-boot-co-cao-den-nam-3.jpg', ', giay-boot-co-cao-den-nam-1.jpg, giay-boot-co-cao-den-nam-2.jpg, giay-boot-co-cao-den-nam-3.jpg', 0, 12, 0, 0.00, '2018-08-05 23:48:47', '2018-08-05 23:48:48'),
(20, 16, 'VÍ DA NAM MÀU BÒ', 200000.00, 0.20, 'VÍ DA NAM MÀU BÒ', 1, 'vi-da-nam-mau-bo-2.jpg', ', vi-da-nam-mau-bo-1.jpg, vi-da-nam-mau-bo-2.jpg', 0, 12, 0, 0.00, '2018-08-06 00:15:17', '2018-08-06 00:15:17'),
(22, 13, 'ĐẦM THIẾT KẾ NỮ', 350000.00, 0.20, 'ĐẦM THIẾT KẾ NỮ', 1, 'dam-thiet-ke-nu-3.jpg', ', dam-thiet-ke-nu-1.jpg, dam-thiet-ke-nu-2.jpg, dam-thiet-ke-nu-3.jpg', 0, 10, 0, 0.00, '2018-08-07 04:05:23', '2018-08-07 04:05:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rates`
--

CREATE TABLE `rates` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `rate` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rates`
--

INSERT INTO `rates` (`id`, `user_id`, `product_id`, `rate`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 3.00, '2018-09-19 15:24:32', '2018-09-19 15:24:32'),
(2, 1, 6, 2.00, '2018-09-19 15:24:57', '2018-09-19 15:24:57'),
(3, 15, 13, 2.00, '2018-09-20 03:23:21', '2018-09-20 03:23:21'),
(4, 15, 1, 3.00, '2018-09-20 18:37:20', '2018-09-20 18:37:20'),
(5, 18, 1, 4.00, '2018-09-20 18:39:28', '2018-09-20 18:39:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slides`
--

CREATE TABLE `slides` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slides`
--

INSERT INTO `slides` (`id`, `name`, `img_link`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'slide1.jpg', 'slide1.jpg', 'BIG SALE', 'BIG SALE', NULL, NULL),
(2, 'slide2.jpg', 'slide2.jpg', 'HOT DEALS', 'HOT DEALS', NULL, NULL),
(3, 'slide3.png', 'slide3.png', 'FASHION KID', 'FASHION KID', NULL, NULL),
(4, 'slide4.jpg', 'slide4.jpg', 'NEW PRODUCTS', 'NEW PRODUCTS', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `msg` text COLLATE utf8mb4_unicode_ci,
  `amount` double NOT NULL,
  `payment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_fee` double(8,2) NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `transactions`
--

INSERT INTO `transactions` (`id`, `status`, `user_id`, `fullname`, `email`, `phone`, `address`, `msg`, `amount`, `payment`, `delivery_fee`, `total`, `created_at`, `updated_at`) VALUES
(1, 0, 15, 'Đinh Trọng Tuấn', 'dinhtrongtuan@gmail.com', '0969749883', 'Nghệ An', NULL, 1580000, 'Thanh toán trực tiếp', 0.00, 1580000, '2018-09-20 18:35:40', '2018-09-20 18:35:40'),
(2, 0, 18, 'Đinh Trọng Thiện', 'dinhtrongthien@gmail.com', '0979234912', 'Nghệ An', NULL, 2120000, 'Thanh toán qua ATM', 25000.00, 2145000, '2018-09-20 18:39:45', '2018-09-20 18:39:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `email`, `status`, `password`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Phan Đức Bảo', 'ducbao.phan@gmail.com', 1, '$2y$10$eKn9Z4249xIj7jSW9qA1o.XRtld85Ii4JEBS8OXvStWszqB01wkHW', '0965352673', 'Hà Nội', 'pHT9SXQgE2IEU3JIee6CrXTZ1Br0Jlzt9eOEm5eRK1uHJv8h3cC97SUsev45', '2018-09-18 09:48:49', '2018-09-20 17:45:18'),
(15, 'dinhtuan', 'Đinh Trọng Tuấn', 'dinhtrongtuan@gmail.com', 0, '$2y$10$q4DncT20BmFC4eI811cCBuNBlGyBBPUbyQVwIiROBaFAf4MEEBtU.', '0969749883', 'Nghệ An', 'Hqaco78H0PgyYYiZtL37E5n0psTMFVUGYcnnQkipzEhmmjkxtmQIzaAfF4fG', '2018-09-17 13:41:01', '2018-09-20 02:28:40'),
(18, 'dinhthien', 'Đinh Trọng Thiện', 'dinhtrongthien@gmail.com', 0, '$2y$10$acv.6ivJaD6DFwKkfpAOc.a.rpl2wpOZvbDmCQZNlc61fNk3zckoC', '0979234912', 'Nghệ An', 'KZQ9KhMPFEH1dMWCnipo5JBAqbtvTdW4xFPx7lyCwQPyJwp5WFVAf9rKe3ic', '2018-09-18 10:39:39', '2018-09-19 15:38:27');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `catalogs`
--
ALTER TABLE `catalogs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_product_id_foreign` (`product_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_transaction_id_foreign` (`transaction_id`),
  ADD KEY `orders_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_catalog_id_foreign` (`catalog_id`);

--
-- Chỉ mục cho bảng `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rates_user_id_foreign` (`user_id`),
  ADD KEY `rates_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `catalogs`
--
ALTER TABLE `catalogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orders_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_catalog_id_foreign` FOREIGN KEY (`catalog_id`) REFERENCES `catalogs` (`id`);

--
-- Các ràng buộc cho bảng `rates`
--
ALTER TABLE `rates`
  ADD CONSTRAINT `rates_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `rates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
