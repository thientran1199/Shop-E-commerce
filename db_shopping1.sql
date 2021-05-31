-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 30, 2021 lúc 10:39 AM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_shopping1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'thientran', '$2y$10$.rjybxG7PUGsXBlyJaLcce7OVQpGJnL4xroxyFEhNqiiplUASyfye', 'customer', 'fcaodkDsXt2PJzgyCrvgHwqC8ERJcCOC4V4aekncRKpyGQ263Tumpm8b7c3J', '2021-05-16 20:12:20', '2021-05-16 20:12:20'),
(2, 'admin', '$2y$10$90JHOKUsCoDykvXLlANqS.J884W1xSusznWSX.Q5ABZoCzH6Wq.xC', 'admin', 'SvpR6c8euELO1KBOgcfw55T9U4fy35mzagyLYXdVmIG9nYozLHubbLWOLgvn', '2021-05-17 18:51:37', '2021-05-17 18:51:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `person_id` int(10) UNSIGNED NOT NULL,
  `identity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `person_id`, `identity`, `created_at`, `updated_at`) VALUES
(1, 2, '61616066', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', '2021-05-17 21:23:10', '2021-05-17 21:23:10'),
(2, 'Smartphone', '2021-05-17 21:23:19', '2021-05-17 21:23:19'),
(3, 'Tablet', '2021-05-17 21:23:27', '2021-05-17 21:23:27'),
(4, 'Heahphones', '2021-05-17 21:23:35', '2021-05-17 21:23:35'),
(5, 'Camera', '2021-05-17 21:23:42', '2021-05-17 21:23:42'),
(6, 'Accesories', '2021-05-17 21:23:50', '2021-05-17 21:23:50'),
(7, 'TV', '2021-05-17 21:23:58', '2021-05-17 21:23:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `person_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Thường',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `person_id`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 'Vip', '2021-05-16 20:12:20', '2021-05-17 20:24:11'),
(2, 2, 'Thường', '2021-05-17 18:51:37', '2021-05-17 18:51:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer_shipping_address`
--

CREATE TABLE `customer_shipping_address` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `recipient_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipient_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wards` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer_shipping_address`
--

INSERT INTO `customer_shipping_address` (`id`, `customer_id`, `recipient_name`, `recipient_phone`, `province`, `district`, `wards`, `address_detail`, `default`, `created_at`, `updated_at`) VALUES
(1, 1, 'NAM', '0162326306216', 'Huế', 'Huế', 'Huế', 'NO-NAME', 1, '2021-05-17 18:05:48', '2021-05-17 18:05:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image`
--

CREATE TABLE `image` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `image`
--

INSERT INTO `image` (`id`, `product_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, '1621312728ProductId1ImageId0.png', '2021-05-17 21:38:48', '2021-05-17 21:38:48'),
(2, 1, '1621312728ProductId1ImageId0.png', '2021-05-17 21:38:48', '2021-05-17 21:38:48'),
(3, 2, '1621418112ProductId2ImageId0.png', '2021-05-19 02:55:12', '2021-05-19 02:55:12'),
(4, 2, '1621418112ProductId2ImageId0.png', '2021-05-19 02:55:12', '2021-05-19 02:55:12'),
(5, 3, '1622341781ProductId3ImageId0.png', '2021-05-29 19:29:41', '2021-05-29 19:29:41'),
(6, 3, '1622341781ProductId3ImageId1.png', '2021-05-29 19:29:41', '2021-05-29 19:29:41'),
(7, 3, '1622341781ProductId3ImageId2.png', '2021-05-29 19:29:41', '2021-05-29 19:29:41'),
(12, 1, '1621312728ProductId1ImageId0.png', '2021-05-17 21:38:48', '2021-05-17 21:38:48'),
(13, 2, '1621418112ProductId2ImageId0.png', '2021-05-19 02:55:12', '2021-05-19 02:55:12'),
(14, 4, '1622344008ProductId4ImageId0.png', '2021-05-29 20:06:48', '2021-05-29 20:06:48'),
(15, 5, '1622344212ProductId5ImageId0.png', '2021-05-29 20:10:12', '2021-05-29 20:10:12'),
(16, 6, '1622344880ProductId6ImageId0.png', '2021-05-29 20:21:20', '2021-05-29 20:21:20'),
(17, 7, '1622344988ProductId7ImageId0.png', '2021-05-29 20:23:08', '2021-05-29 20:23:08'),
(18, 8, '1622345086ProductId8ImageId0.png', '2021-05-29 20:24:46', '2021-05-29 20:24:46'),
(19, 9, '1622345382ProductId9ImageId0.png', '2021-05-29 20:29:42', '2021-05-29 20:29:42'),
(20, 9, '1622345382ProductId9ImageId1.png', '2021-05-29 20:29:42', '2021-05-29 20:29:42'),
(21, 9, '1622345382ProductId9ImageId2.png', '2021-05-29 20:29:42', '2021-05-29 20:29:42'),
(22, 10, '1622345779ProductId10ImageId0.png', '2021-05-29 20:36:19', '2021-05-29 20:36:19'),
(23, 11, '1622345868ProductId11ImageId0.png', '2021-05-29 20:37:48', '2021-05-29 20:37:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_05_16_072012_create_accounts_table', 1),
(2, '2021_05_16_072223_create_admins_table', 1),
(3, '2021_05_16_072236_create_carts_table', 1),
(4, '2021_05_16_072258_create_cart_items_table', 1),
(5, '2021_05_16_072339_create_categories_table', 1),
(6, '2021_05_16_072447_create_customers_table', 1),
(7, '2021_05_16_072521_create_customer_shipping_addresses_table', 1),
(8, '2021_05_16_072839_create_images_table', 1),
(9, '2021_05_16_072858_create_orders_table', 1),
(10, '2021_05_16_072915_create_order_items_table', 1),
(11, '2021_05_16_072930_create_payments_table', 1),
(12, '2021_05_16_072948_create_person_table', 1),
(13, '2021_05_16_073013_create_products_table', 1),
(14, '2021_05_16_073028_create_reviews_table', 1),
(15, '2021_05_16_073051_create_shipping_addresses_table', 1),
(16, '2021_05_16_073104_create_slides_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `shipping_address_id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Chờ xử lý',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `shipping_address_id`, `payment_id`, `customer_id`, `total_quantity`, `grand_total`, `note`, `status`, `created_at`, `updated_at`) VALUES
(5, 8, 7, 1, 2, 16269000, NULL, 'Đã nhận hàng', '2021-05-28 19:38:24', '2021-05-28 19:38:46'),
(6, 9, 8, 1, 2, 16269000, 'Hàng Giao Vào lúc 2h Chiều nhá', 'Chờ xử lý', '2021-05-29 19:19:18', '2021-05-29 19:19:18'),
(7, 10, 9, 1, 3, 20398000, 'Nhanh lên nhá shop', 'Đã nhận hàng', '2021-05-29 21:37:52', '2021-05-29 21:38:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_item`
--

CREATE TABLE `order_item` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `review_id` int(10) UNSIGNED NOT NULL,
  `price_sell` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_item`
--

INSERT INTO `order_item` (`id`, `order_id`, `product_id`, `review_id`, `price_sell`, `quantity`, `sub_total`, `created_at`, `updated_at`) VALUES
(5, 5, 2, 6, 12000000, 1, 12000000, '2021-05-28 19:38:24', '2021-05-28 19:38:24'),
(6, 5, 1, 7, 4269000, 1, 4269000, '2021-05-28 19:38:24', '2021-05-28 19:38:24'),
(7, 6, 2, 8, 12000000, 1, 12000000, '2021-05-29 19:19:18', '2021-05-29 19:19:18'),
(8, 6, 1, 9, 4269000, 1, 4269000, '2021-05-29 19:19:18', '2021-05-29 19:19:18'),
(9, 7, 4, 10, 20000000, 1, 20000000, '2021-05-29 21:37:52', '2021-05-29 21:37:52'),
(10, 7, 3, 11, 199000, 2, 398000, '2021-05-29 21:37:52', '2021-05-29 21:37:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment`
--

CREATE TABLE `payment` (
  `id` int(10) UNSIGNED NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Chưa thanh toán	',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `payment`
--

INSERT INTO `payment` (`id`, `method`, `status`, `created_at`, `updated_at`) VALUES
(7, 'COD', 'Đã thanh toán', '2021-05-28 19:38:24', '2021-05-28 19:38:46'),
(8, 'COD', 'Chưa thanh toán	', '2021-05-29 19:19:18', '2021-05-29 19:19:18'),
(9, 'COD', 'Đã thanh toán', '2021-05-29 21:37:52', '2021-05-29 21:38:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `person`
--

CREATE TABLE `person` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `person`
--

INSERT INTO `person` (`id`, `account_id`, `full_name`, `gender`, `address`, `date_of_birth`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nam', 'Nam', 'Huế', '1999-11-11', '0123652985', 'namdeptrai@mail', '2021-05-16 20:12:20', '2021-05-17 20:12:39'),
(2, 2, 'Nam', 'Nam', 'Huế', '1999-11-11', '0616616663', 'adminvip@mail', '2021-05-17 18:51:37', '2021-05-17 18:51:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL,
  `promotion_price` int(11) NOT NULL,
  `description` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(4) NOT NULL DEFAULT 1,
  `quantity_in_stock` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `brand`, `origin`, `price`, `promotion_price`, `description`, `enabled`, `quantity_in_stock`, `views`, `created_at`, `updated_at`) VALUES
(1, 3, 'iPad PRO', 'iPad PRO', 'Mỹ', 5000000, 4269000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente nesciunt atque nemo neque ut officiis nostrum incidunt maiores, magni optio et sunt suscipit iusto nisi totam quis, nobis mollitia necessitatibus.', 1, 8, 114, '2021-05-17 21:38:48', '2021-05-29 21:31:45'),
(2, 1, 'Dell 3547', 'Dell', 'Mỹ', 12000000, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente nesciunt atque nemo neque ut officiis nostrum incidunt maiores, magni optio et sunt suscipit iusto nisi totam quis, nobis mollitia necessitatibus.', 1, 20, 23, '2021-05-19 02:55:12', '2021-05-29 21:32:42'),
(3, 4, 'Heahphones', 'Heahphones', 'Nhật Bản', 300000, 199000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente nesciunt atque nemo neque ut officiis nostrum incidunt maiores, magni optio et sunt suscipit iusto nisi totam quis, nobis mollitia necessitatibus.', 1, 28, 45, '2021-05-29 19:29:41', '2021-05-29 21:38:12'),
(4, 5, 'Canon 675-D', 'Canon', 'Nhật Bản', 20000000, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente nesciunt atque nemo neque ut officiis nostrum incidunt maiores, magni optio et sunt suscipit iusto nisi totam quis, nobis mollitia necessitatibus.', 1, 4, 7, '2021-05-29 20:06:48', '2021-05-29 21:38:11'),
(5, 7, 'Smart TV 4K 43 inch UA43TU8100', 'Samsung', 'Mỹ', 12000000, 10000000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente nesciunt atque nemo neque ut officiis nostrum incidunt maiores, magni optio et sunt suscipit iusto nisi totam quis, nobis mollitia necessitatibus.', 1, 10, 0, '2021-05-29 20:10:12', '2021-05-29 20:15:59'),
(6, 6, 'iMac 27\"', 'Apple', 'Nhật Bản', 20000000, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente nesciunt atque nemo neque ut officiis nostrum incidunt maiores, magni optio et sunt suscipit iusto nisi totam quis, nobis mollitia necessitatibus.', 1, 30, 0, '2021-05-29 20:21:20', '2021-05-29 20:23:25'),
(7, 7, 'Smart Tivi Sony 4K 48 inch', 'Sony', 'Nhật Bản', 15000000, 12900000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente nesciunt atque nemo neque ut officiis nostrum incidunt maiores, magni optio et sunt suscipit iusto nisi totam quis, nobis mollitia necessitatibus.', 1, 10, 0, '2021-05-29 20:23:08', '2021-05-29 20:23:08'),
(8, 2, 'APPLE', 'Apple', 'Mỹ', 11000000, 9999000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente nesciunt atque nemo neque ut officiis nostrum incidunt maiores, magni optio et sunt suscipit iusto nisi totam quis, nobis mollitia necessitatibus.', 1, 0, 1, '2021-05-29 20:24:46', '2021-05-29 20:47:06'),
(9, 2, 'Samsung  Galaxy Note 20 Ultral 5G', 'Samsung', 'Mỹ', 20000000, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente nesciunt atque nemo neque ut officiis nostrum incidunt maiores, magni optio et sunt suscipit iusto nisi totam quis, nobis mollitia necessitatibus.', 1, 20, 0, '2021-05-29 20:29:42', '2021-05-29 20:29:42'),
(10, 2, 'Oppo A74', 'Oppo', 'Nhật Bản', 2000000, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente nesciunt atque nemo neque ut officiis nostrum incidunt maiores, magni optio et sunt suscipit iusto nisi totam quis, nobis mollitia necessitatibus.', 1, 20, 1, '2021-05-29 20:36:19', '2021-05-29 20:38:46'),
(11, 2, 'Vivo Y72', 'Vivo', 'Mỹ', 12000000, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente nesciunt atque nemo neque ut officiis nostrum incidunt maiores, magni optio et sunt suscipit iusto nisi totam quis, nobis mollitia necessitatibus.', 1, 30, 0, '2021-05-29 20:37:48', '2021-05-29 20:37:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `review`
--

CREATE TABLE `review` (
  `id` int(10) UNSIGNED NOT NULL,
  `rate` int(11) DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reviewed` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `review`
--

INSERT INTO `review` (`id`, `rate`, `comment`, `reviewed`, `created_at`, `updated_at`) VALUES
(6, 5, 'Hàng xài khac OK', 1, '2021-05-28 19:38:24', '2021-05-28 19:39:29'),
(7, 3, 'Hàng xài chữa cháy thì ok', 1, '2021-05-28 19:38:24', '2021-05-28 19:40:00'),
(8, NULL, NULL, 0, '2021-05-29 19:19:18', '2021-05-29 19:19:18'),
(9, NULL, NULL, 0, '2021-05-29 19:19:18', '2021-05-29 19:19:18'),
(10, NULL, NULL, 0, '2021-05-29 21:37:52', '2021-05-29 21:37:52'),
(11, 5, 'Hàng Xài Khá OK', 1, '2021-05-29 21:37:52', '2021-05-29 22:00:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shipping_address`
--

CREATE TABLE `shipping_address` (
  `id` int(10) UNSIGNED NOT NULL,
  `recipient_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipient_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wards` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `shipping_address`
--

INSERT INTO `shipping_address` (`id`, `recipient_name`, `recipient_phone`, `province`, `district`, `wards`, `address_detail`, `created_at`, `updated_at`) VALUES
(8, 'NAM', '0162326306216', 'Huế', 'Huế', 'Huế', 'NO-NAME', '2021-05-28 19:38:24', '2021-05-28 19:38:24'),
(9, 'NAM', '0162326306216', 'Huế', 'Huế', 'Huế', 'NO-NAME', '2021-05-29 19:19:18', '2021-05-29 19:19:18'),
(10, 'NAM', '0162326306216', 'Huế', 'Huế', 'Huế', 'NO-NAME', '2021-05-29 21:37:51', '2021-05-29 21:37:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '1621559471ecommerce2.jpg', '2021-05-20 18:11:11', '2021-05-20 18:11:11'),
(2, '1621559478ecommerce3.jpg', '2021-05-20 18:11:18', '2021-05-20 18:11:18'),
(3, '1621559486ecommerce4.jpg', '2021-05-20 18:11:26', '2021-05-20 18:11:26'),
(4, '1621559493ecommerce6.jpg', '2021-05-20 18:11:33', '2021-05-20 18:11:33');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_username_unique` (`username`);

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name_unique` (`name`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer_shipping_address`
--
ALTER TABLE `customer_shipping_address`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `customer_shipping_address`
--
ALTER TABLE `customer_shipping_address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `image`
--
ALTER TABLE `image`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `person`
--
ALTER TABLE `person`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `review`
--
ALTER TABLE `review`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `shipping_address`
--
ALTER TABLE `shipping_address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
