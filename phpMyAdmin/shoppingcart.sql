-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 16, 2024 lúc 03:39 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shoppingcart`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `product_title` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `Product_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `name`, `email`, `phone`, `address`, `product_title`, `price`, `quantity`, `image`, `Product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(33, 'user', 'user@gmail.com', '1301430149', 'akdnfdajfk', 'Bar', '110000', '1', '1704906111.png', '8', '1', '2024-02-09 09:51:07', '2024-02-09 09:51:07'),
(34, 'user', 'user@gmail.com', '1301430149', 'akdnfdajfk', 'Pen', '50000', '1', '1704905834.png', '4', '1', '2024-02-09 09:53:04', '2024-02-09 09:53:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catagories`
--

CREATE TABLE `catagories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catagory_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `catagories`
--

INSERT INTO `catagories` (`id`, `catagory_name`, `created_at`, `updated_at`) VALUES
(12, 'Electric', '2024-01-08 10:34:23', '2024-01-08 10:34:23'),
(13, 'Toy', '2024-01-08 10:46:23', '2024-01-08 10:46:23'),
(14, 'Flammable', '2024-01-08 22:17:55', '2024-01-08 22:17:55'),
(15, 'Sport', '2024-01-09 05:39:27', '2024-01-09 05:39:27'),
(16, 'Drink', '2024-01-09 06:29:00', '2024-01-09 06:29:00'),
(17, 'Food', '2024-01-09 06:29:07', '2024-01-09 06:29:07'),
(18, 'Stationery', '2024-01-09 06:29:45', '2024-01-09 06:29:45'),
(19, 'Clothes', '2024-01-09 06:29:59', '2024-01-09 06:29:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `comment` longtext DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `name`, `comment`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'user', 'save my money', '1', '2024-02-02 02:27:42', '2024-02-02 02:27:42'),
(2, 'user', 'second comment', '1', '2024-02-02 20:35:20', '2024-02-02 20:35:20'),
(3, 'number1', 'I want to buy more', '3', '2024-02-02 22:58:27', '2024-02-02 22:58:27'),
(4, 'number1', 'HAHAHAHA', '3', '2024-02-02 23:18:35', '2024-02-02 23:18:35'),
(5, 'user', 'da', '1', '2024-02-03 05:49:00', '2024-02-03 05:49:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_01_06_113958_create_sessions_table', 1),
(7, '2024_01_08_121611_create_catagories_table', 2),
(9, '2024_01_10_085324_create_carts_table', 4),
(10, '2024_01_08_154049_create_products_table', 5),
(11, '2024_01_11_130100_create_orders_table', 6),
(12, '2024_01_19_090719_create_notifications_table', 7),
(13, '2024_02_02_083920_create_comments_table', 8),
(14, '2024_02_02_084019_create_replies_table', 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `product_title` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `delivery_status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `user_id`, `product_title`, `quantity`, `price`, `image`, `product_id`, `payment_status`, `delivery_status`, `created_at`, `updated_at`) VALUES
(9, 'number1', 'num1@gmail.com', '023892839314', 'ànoapfao', '3', 'Dumbell', '4', '360000', '1704906072.png', '7', 'cash on delivery', 'delivered', '2024-01-12 02:12:44', '2024-01-14 09:47:19'),
(10, 'number1', 'num1@gmail.com', '023892839314', 'ànoapfao', '3', 'Bar', '5', '550000', '1704906111.png', '8', 'Paid', 'delivered', '2024-01-12 02:12:44', '2024-01-14 10:09:05'),
(11, 'number1', 'num1@gmail.com', '023892839314', 'ànoapfao', '3', 'Black Shirt', '4', '360000', '1704905758.png', '2', 'cash on delivery', 'processing', '2024-01-12 02:12:44', '2024-01-12 02:12:44'),
(12, 'number1', 'num1@gmail.com', '023892839314', 'ànoapfao', '3', 'Dumbell', '4', '360000', '1704906072.png', '7', 'cash on delivery', 'processing', '2024-01-12 02:27:36', '2024-01-12 02:27:36'),
(13, 'number1', 'num1@gmail.com', '023892839314', 'ànoapfao', '3', 'Bar', '1', '110000', '1704906111.png', '8', 'cash on delivery', 'processing', '2024-01-12 02:27:36', '2024-01-12 02:27:36'),
(14, 'number1', 'num1@gmail.com', '023892839314', 'ànoapfao', '3', 'Abs Wheel', '1', '100000', '1704906160.png', '9', 'cash on delivery', 'processing', '2024-01-12 02:27:36', '2024-01-12 02:27:36'),
(15, 'number1', 'num1@gmail.com', '023892839314', 'ànoapfao', '3', 'Nuclear Bomb', '10', '0', '1705066659.png', '13', 'Paid', 'processing', '2024-01-12 08:24:43', '2024-01-12 08:24:43'),
(16, 'number1', 'num1@gmail.com', '023892839314', 'ànoapfao', '3', 'Pepsi', '1', '16000', '1704906232.png', '11', 'Paid', 'processing', '2024-01-12 08:24:43', '2024-01-12 08:24:43'),
(17, 'th', 'wolfthunder217dcmm@gmail.com', '01938183313', 'sfsfsbgbgb', '4', 'Dumbell', '2', '180000', '1704906072.png', '7', 'cash on delivery', 'You Canceled the Order', '2024-01-20 09:50:26', '2024-01-24 03:02:08'),
(18, 'th', 'wolfthunder217dcmm@gmail.com', '01938183313', 'sfsfsbgbgb', '4', 'Abs Wheel', '1', '100000', '1704906160.png', '9', 'cash on delivery', 'You Canceled the Order', '2024-02-01 21:23:34', '2024-02-01 21:23:42'),
(19, 'user', 'user@gmail.com', '1301430149', 'akdnfdajfk', '1', 'Pen', '1', '50000', '1704905834.png', '4', 'Paid', 'You Canceled the Order', '2024-02-09 08:26:50', '2024-02-09 08:33:45'),
(20, 'user', 'user@gmail.com', '1301430149', 'akdnfdajfk', '1', 'Dumbell', '1', '90000', '1704906072.png', '7', 'Paid', 'You Canceled the Order', '2024-02-09 08:33:30', '2024-02-09 08:33:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `catagory` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `discount_price` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `catagory`, `quantity`, `price`, `discount_price`, `created_at`, `updated_at`) VALUES
(1, 'Gray Shirt', 'For men', '1704905717.png', 'Clothes', '1000', '100000', '90000', '2024-01-10 09:55:17', '2024-01-10 09:55:17'),
(2, 'Black Shirt', 'For men', '1704905758.png', 'Clothes', '1000', '100000', '90000', '2024-01-10 09:55:58', '2024-01-10 09:55:58'),
(3, 'Puple Dress', 'For women', '1704905793.png', 'Clothes', '1000', '100000', '90000', '2024-01-10 09:56:33', '2024-01-10 09:56:33'),
(4, 'Pen', 'Fountain pen', '1704905834.png', 'Stationery', '10000', '60000', '50000', '2024-01-10 09:57:14', '2024-01-10 09:57:14'),
(5, 'Book', 'x10', '1704905871.png', 'Stationery', '1000', '200000', '190000', '2024-01-10 09:57:51', '2024-01-10 09:57:51'),
(6, 'Colored Pencils', 'Pencils', '1704905916.png', 'Stationery', '10000', '60000', '50000', '2024-01-10 09:58:36', '2024-01-10 09:58:36'),
(7, 'Dumbell', '10kg', '1704906072.png', 'Sport', '100', '100000', '90000', '2024-01-10 10:01:12', '2024-01-10 10:01:12'),
(8, 'Bar', 'Single bar', '1704906111.png', 'Sport', '1000', '120000', '110000', '2024-01-10 10:01:51', '2024-01-10 10:01:51'),
(9, 'Abs Wheel', 'Abs practice', '1704906160.png', 'Sport', '1000', '120000', '100000', '2024-01-10 10:02:40', '2024-01-10 10:02:40'),
(10, 'Coca Cola', 'Soft drink', '1704906199.png', 'Drink', '1000000', '16000', NULL, '2024-01-10 10:03:19', '2024-01-10 10:03:19'),
(11, 'Pepsi', 'Soft drink', '1704906232.png', 'Drink', '1000000', '16000', NULL, '2024-01-10 10:03:52', '2024-01-10 10:03:52'),
(12, 'Lays chip', 'Snack', '1704906269.png', 'Food', '1000000', '25000', NULL, '2024-01-10 10:04:29', '2024-01-10 10:04:29'),
(13, 'Nuclear Bomb', 'Large vacuum cleaner', '1705066659.png', 'Flammable', '10000', '0', NULL, '2024-01-12 06:37:39', '2024-01-12 06:37:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `replies`
--

CREATE TABLE `replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `comment_id` varchar(255) DEFAULT NULL,
  `reply` longtext DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `replies`
--

INSERT INTO `replies` (`id`, `name`, `comment_id`, `reply`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'number1', '1', 'really???', '3', '2024-02-02 22:34:32', '2024-02-02 22:34:32'),
(2, 'number1', '2', 'haha', '3', '2024-02-02 22:58:45', '2024-02-02 22:58:45'),
(3, 'number1', '2', 'haha', '3', '2024-02-02 23:01:14', '2024-02-02 23:01:14'),
(4, 'number1', '2', 'spam', '3', '2024-02-02 23:29:02', '2024-02-02 23:29:02'),
(5, 'user', '5', 'da', '1', '2024-02-03 05:49:05', '2024-02-03 05:49:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3czbVRwI8bKwl3XKRVO0kiPfzRIbUYd5vCANMMIk', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU2U3YUZYOG9zNlB5NzIzT3R4YUZ0NVBUaUpBU3NHbVA4ZUhRRmRPMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1708047650),
('98MT2XWs1hFCZ29lQ5mdbjPt9Ak31Roskht0UQ1d', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidzJ4Rm5MY3pHSUl3WDljWUlKZEdUVGhuWmNCU1pFNjQ1Nlh6QlZvaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1708047648),
('gfHx4oVMWhVXYkGKsrrEA4hdQwvH0fRQH18E2iyW', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieW01aXRNek1UYVZ1eXBYOEtXM21raGxITGhSNVlZSFFEdTFSaXo4WiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1708047669),
('loaRBaI5VrIc7HAyKjagaSpuU0TCMYdmBCrQBofU', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSHVOUjNaN0RBVno0VDY1VkQ5M2dsWEVidGFzTFM0Rml6TEJYRkJWbyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZWRpcmVjdCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo1OiJhbGVydCI7YTowOnt9fQ==', 1707497585);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT '0',
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `usertype`, `phone`, `address`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'user', 'user@gmail.com', '0', '1301430149', 'akdnfdajfk', '2024-01-14 07:39:23', '$2y$12$iSx1rQqE4RvVKq9YxTi1v.LK1TdJUAZVzlNSaYub8aoM1/JvGLFPi', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-06 06:59:18', '2024-01-06 06:59:18'),
(2, 'admin', 'admin@gmail.com', '1', '313791389', 'dànkfnalfnk', '2024-01-01 07:39:52', '$2y$12$zxCcwgTuB3tI1LGSJyBVNOZ/VlSsdFPtLcoY7iE/mCR9OoLzBRmxm', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-06 07:03:15', '2024-01-06 07:03:15'),
(3, 'number1', 'num1@gmail.com', '0', '023892839314', 'ànoapfao', '2024-01-10 07:40:20', '$2y$12$C7P.GeEzEJLMzTU54q08dORSFMT3Dw3AiWoSs/qXc9gJ6uTvIa8r6', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-11 03:03:23', '2024-01-11 03:03:23'),
(4, 'th', 'wolfthunder217dcmm@gmail.com', '0', '01938183313', 'sfsfsbgbgb', '2024-01-19 00:34:50', '$2y$12$LRKX31vpA5eOQOzZB1P9bex9P3DNgBApBsj2o8gjFS.ZXooACPnli', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-19 00:30:26', '2024-01-19 00:34:50'),
(5, 'ada', 'nkgsngs@gmail.com', '0', '764646', '646gdgd', NULL, '$2y$12$w.1llF34yOzRdD.PxNAqDO.Puj5V9oMexX6zH5sZxlyx9/vjohdhG', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-19 00:49:21', '2024-01-19 00:49:21');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `catagories`
--
ALTER TABLE `catagories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `replies`
--
ALTER TABLE `replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
