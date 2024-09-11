-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2024 at 07:36 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_sim`
--

-- --------------------------------------------------------

--
-- Table structure for table `compatible_devices`
--

CREATE TABLE `compatible_devices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model` varchar(255) DEFAULT NULL,
  `os` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `esim_customers`
--

CREATE TABLE `esim_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `esim_loginrs`
--

CREATE TABLE `esim_loginrs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `esim_users`
--

CREATE TABLE `esim_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `country_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `front_homes`
--

CREATE TABLE `front_homes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(14, '2024_06_03_063841_create_compatible_devices_table', 1),
(15, '2014_10_12_000000_create_users_table', 2),
(16, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(17, '2014_10_12_100000_create_password_resets_table', 2),
(18, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(19, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(20, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(21, '2016_06_01_000004_create_oauth_clients_table', 2),
(22, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2),
(23, '2019_08_19_000000_create_failed_jobs_table', 2),
(24, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(25, '2024_02_08_110222_create_signups_table', 2),
(26, '2024_05_29_103401_create_front_homes_table', 2),
(27, '2024_05_29_115050_create_countries_table', 2),
(28, '2024_06_06_065922_create_topup_orders_table', 2),
(29, '2024_06_06_110810_create_orders_table', 2),
(30, '2024_06_06_112248_create_sims_table', 2),
(31, '2024_06_06_114825_create_statuses_table', 2),
(32, '2024_06_07_050202_create_esim_users_table', 2),
(33, '2024_06_14_062423_create_esim_loginrs_table', 2),
(34, '2024_06_15_060639_create_esim_customers_table', 2),
(35, '2024_06_17_093544_create_socialite_controllers_table', 2),
(36, '2024_07_18_060304_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(4, 'App\\Models\\User', 10),
(7, 'App\\Models\\User', 3),
(7, 'App\\Models\\User', 7),
(11, 'App\\Models\\User', 8);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `esim_type` varchar(255) DEFAULT NULL,
  `validity` int(11) DEFAULT NULL,
  `package` varchar(255) DEFAULT NULL,
  `data` varchar(255) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `ids` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `manual_installation` varchar(255) DEFAULT NULL,
  `qrcode_installation` varchar(255) DEFAULT NULL,
  `installation_guide_en` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(33) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Create User', 'web', '2024-09-02 03:38:05', '2024-09-02 03:38:05', 'Active'),
(2, 'Edit Role', 'web', '2024-06-25 19:29:38', '2024-06-26 23:59:44', 'Active'),
(3, 'Delete User', 'web', '2024-06-25 19:30:05', '2024-06-27 00:29:35', 'Active'),
(5, 'View User', 'web', '2024-06-25 20:19:16', '2024-06-27 00:29:55', 'Active'),
(8, 'Edit Permission', 'web', '2024-06-26 23:55:11', '2024-06-26 23:55:11', 'Active'),
(9, 'Delete Permission', 'web', '2024-06-26 23:56:00', '2024-06-26 23:56:00', 'Active'),
(10, 'Create Role', 'web', '2024-06-26 23:58:08', '2024-06-26 23:58:08', 'Active'),
(11, 'Delete Role', 'web', '2024-06-27 00:01:55', '2024-06-27 00:01:55', 'Active'),
(12, 'Give Permission', 'web', '2024-06-27 00:05:00', '2024-06-27 00:05:00', 'Active'),
(13, 'Create permission', 'web', '2024-06-27 00:09:18', '2024-06-27 00:30:35', 'Active'),
(14, 'Edit User', 'web', '2024-06-27 00:35:33', '2024-06-27 00:35:33', 'Active'),
(15, 'Edit Home Banner', 'web', '2024-06-28 00:02:37', '2024-06-28 00:03:49', 'Active'),
(16, 'Create Home Banner', 'web', '2024-06-28 00:03:38', '2024-06-28 00:03:38', 'Active'),
(17, 'Delete Home Banner', 'web', '2024-06-28 00:04:17', '2024-06-28 00:04:17', 'Active'),
(18, 'View Home Banner', 'web', '2024-06-28 00:22:29', '2024-06-28 00:22:29', 'Active'),
(19, 'Home About', 'web', '2024-06-28 00:35:36', '2024-06-28 00:35:36', 'Active'),
(20, 'Home Sustainability', 'web', '2024-06-28 00:48:10', '2024-06-28 00:48:10', 'Active'),
(21, 'Home Career', 'web', '2024-06-28 00:50:20', '2024-06-28 00:50:20', 'Active'),
(22, 'Create Product', 'web', '2024-06-28 00:54:09', '2024-06-28 01:01:01', 'Active'),
(23, 'Edit Product', 'web', '2024-06-28 00:54:23', '2024-06-28 00:54:23', 'Active'),
(24, 'Delete Product', 'web', '2024-06-28 00:54:40', '2024-06-28 00:54:40', 'Active'),
(25, 'View Product', 'web', '2024-06-28 00:54:51', '2024-06-28 00:54:51', 'Active'),
(26, 'Create Plant', 'web', '2024-06-28 01:05:46', '2024-06-28 01:05:46', 'Active'),
(27, 'Edit Plant', 'web', '2024-06-28 01:05:57', '2024-06-28 01:05:57', 'Active'),
(28, 'Delete Plant', 'web', '2024-06-28 01:06:11', '2024-06-28 01:06:11', 'Active'),
(29, 'Home Brand Banner', 'web', '2024-06-28 01:37:24', '2024-06-28 01:37:24', 'Active'),
(30, 'Home Brand Create', 'web', '2024-06-28 01:39:57', '2024-06-28 01:39:57', 'Active'),
(31, 'Home Brand Edit', 'web', '2024-06-28 01:40:14', '2024-06-28 01:40:14', 'Active'),
(32, 'Home Brand Delete', 'web', '2024-06-28 01:40:45', '2024-06-28 01:40:45', 'Active'),
(33, 'Home Brand View', 'web', '2024-06-28 01:41:03', '2024-06-28 01:41:03', 'Active'),
(34, 'Who We Are Banner', 'web', '2024-06-28 01:56:56', '2024-06-28 01:56:56', 'Active'),
(35, 'Create Gallery', 'web', '2024-06-28 02:02:43', '2024-06-28 02:02:43', 'Active'),
(36, 'Edit Gallery', 'web', '2024-06-28 02:03:03', '2024-06-28 02:03:03', 'Active'),
(37, 'Delete Gallery', 'web', '2024-06-28 02:03:18', '2024-06-28 02:03:18', 'Active'),
(38, 'Create Our Journey', 'web', '2024-06-28 02:19:46', '2024-06-28 02:19:46', 'Active'),
(39, 'Edit Our Journey', 'web', '2024-06-28 02:19:58', '2024-06-28 02:19:58', 'Active'),
(40, 'Delete Our Journey', 'web', '2024-06-28 02:20:19', '2024-06-28 02:20:19', 'Active'),
(41, 'View Our Journey', 'web', '2024-06-28 02:20:35', '2024-06-28 02:20:35', 'Active'),
(42, 'Create Awards', 'web', '2024-06-28 03:13:06', '2024-06-28 03:13:06', 'Active'),
(43, 'Edit Awards', 'web', '2024-06-28 03:13:20', '2024-06-28 03:13:20', 'Active'),
(44, 'Delete Awards', 'web', '2024-06-28 03:13:30', '2024-06-28 03:13:30', 'Active'),
(45, 'View Awards', 'web', '2024-06-28 03:13:39', '2024-06-28 03:13:39', 'Active'),
(46, 'Our Vision', 'web', '2024-06-28 03:29:00', '2024-06-28 03:29:00', 'Active'),
(47, 'Our Mission', 'web', '2024-06-28 03:30:51', '2024-06-28 03:30:51', 'Active'),
(48, 'Our Value', 'web', '2024-06-28 03:32:53', '2024-06-28 03:32:53', 'Active'),
(49, 'Create Sustainability', 'web', '2024-06-28 03:36:12', '2024-06-28 03:36:12', 'Active'),
(50, 'Edit Sustainability', 'web', '2024-06-28 03:36:24', '2024-06-28 03:36:24', 'Active'),
(51, 'Delete Sustainability', 'web', '2024-06-28 03:36:34', '2024-06-28 03:36:34', 'Active'),
(52, 'View Sustainability', 'web', '2024-06-28 03:36:46', '2024-06-28 03:36:46', 'Active'),
(53, 'Create Career', 'web', '2024-06-28 03:59:15', '2024-06-28 03:59:15', 'Active'),
(54, 'Edit Career', 'web', '2024-06-28 03:59:27', '2024-06-28 03:59:27', 'Active'),
(55, 'Delete Career', 'web', '2024-06-28 03:59:39', '2024-06-28 03:59:39', 'Active'),
(56, 'View Career', 'web', '2024-06-28 03:59:51', '2024-06-28 03:59:51', 'Active'),
(57, 'Career Banner', 'web', '2024-06-28 04:11:35', '2024-06-28 04:11:35', 'Active'),
(58, 'Job Banner', 'web', '2024-06-28 04:14:24', '2024-06-28 04:14:24', 'Active'),
(59, 'Craete Department', 'web', '2024-06-28 04:16:12', '2024-06-28 04:16:12', 'Active'),
(60, 'Edit Department', 'web', '2024-06-28 04:16:23', '2024-06-28 04:16:23', 'Active'),
(61, 'Delete Department', 'web', '2024-06-28 04:16:33', '2024-06-28 04:16:33', 'Active'),
(63, 'Create Qualification', 'web', '2024-06-28 04:26:07', '2024-06-28 04:26:07', 'Active'),
(64, 'Edit Qualification', 'web', '2024-06-28 04:26:18', '2024-06-28 04:26:18', 'Active'),
(65, 'Delete Qualification', 'web', '2024-06-28 04:26:30', '2024-06-28 04:26:30', 'Active'),
(66, 'Create Job', 'web', '2024-06-28 04:33:57', '2024-06-28 04:33:57', 'Active'),
(67, 'Edit Job', 'web', '2024-06-28 04:34:12', '2024-06-28 04:34:12', 'Active'),
(68, 'View Job', 'web', '2024-06-28 04:34:28', '2024-06-28 04:34:28', 'Active'),
(69, 'Delete Job', 'web', '2024-06-28 04:34:40', '2024-06-28 04:34:40', 'Active'),
(70, 'Candidate View', 'web', '2024-06-28 04:48:15', '2024-06-28 04:51:10', 'Active'),
(71, 'Create Team Banner', 'web', '2024-06-28 04:52:56', '2024-06-28 04:52:56', 'Active'),
(72, 'Carete Team', 'web', '2024-06-28 05:06:36', '2024-06-28 06:20:00', 'Active'),
(73, 'Edit Our Team', 'web', '2024-06-28 05:07:14', '2024-06-28 05:07:14', 'Active'),
(74, 'Delete Our Team', 'web', '2024-06-28 05:07:34', '2024-06-28 05:07:34', 'Active'),
(75, 'View Our Team', 'web', '2024-06-28 05:07:47', '2024-06-28 05:07:47', 'Active'),
(76, 'Brand Banner', 'web', '2024-06-28 06:21:36', '2024-06-28 06:21:36', 'Active'),
(77, 'Create Brand', 'web', '2024-06-28 06:23:24', '2024-06-28 06:23:24', 'Active'),
(78, 'Edit Barnd', 'web', '2024-06-28 06:23:37', '2024-06-28 06:23:37', 'Active'),
(79, 'Delete Brand', 'web', '2024-06-28 06:23:58', '2024-06-28 06:23:58', 'Active'),
(80, 'View Brand', 'web', '2024-06-28 06:24:14', '2024-06-28 06:24:14', 'Active'),
(81, 'Craete Media', 'web', '2024-06-28 06:44:21', '2024-06-28 06:44:21', 'Active'),
(82, 'Edit Media', 'web', '2024-06-28 06:44:35', '2024-06-28 06:44:35', 'Active'),
(83, 'Delete Media', 'web', '2024-06-28 06:44:48', '2024-06-28 06:44:48', 'Active'),
(84, 'View Media', 'web', '2024-06-28 06:45:02', '2024-06-28 06:45:02', 'Active'),
(85, 'Create Terms', 'web', '2024-06-28 06:52:24', '2024-06-28 06:52:24', 'Active'),
(86, 'Create Privacy Center', 'web', '2024-06-28 06:54:28', '2024-06-28 06:54:28', 'Active'),
(87, 'Edit Privacy Center', 'web', '2024-06-28 06:54:42', '2024-06-28 06:54:42', 'Active'),
(88, 'View Privacy Center', 'web', '2024-06-28 06:54:53', '2024-06-28 06:54:53', 'Active'),
(89, 'Delete Privacy Center', 'web', '2024-06-28 06:55:03', '2024-06-28 06:55:03', 'Active'),
(90, 'Dashboard', 'web', '2024-06-29 03:57:23', '2024-06-29 03:57:23', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(34) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `status`) VALUES
(4, 'Admin', 'web', '2024-06-25 20:36:16', '2024-06-25 20:36:39', 'Active'),
(7, 'Super Admin', 'web', '2024-06-25 23:47:42', '2024-06-29 01:45:40', 'Active'),
(10, 'HR', 'web', '2024-07-02 09:14:18', '2024-07-02 09:21:10', 'Active'),
(11, 'User', 'web', '2024-07-02 09:18:30', '2024-07-02 09:18:30', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 7),
(1, 11),
(2, 7),
(2, 11),
(3, 11),
(5, 7),
(5, 11),
(8, 7),
(9, 7),
(10, 7),
(10, 11),
(11, 7),
(11, 11),
(12, 7),
(12, 11),
(13, 7),
(14, 11),
(15, 4),
(15, 7),
(16, 4),
(16, 7),
(17, 4),
(17, 7),
(18, 4),
(18, 7),
(19, 4),
(19, 7),
(20, 4),
(20, 7),
(21, 4),
(21, 7),
(22, 4),
(22, 7),
(23, 4),
(23, 7),
(24, 4),
(24, 7),
(25, 4),
(25, 7),
(26, 4),
(26, 7),
(27, 4),
(27, 7),
(28, 4),
(28, 7),
(29, 4),
(29, 7),
(30, 4),
(30, 7),
(31, 4),
(31, 7),
(32, 4),
(32, 7),
(33, 4),
(33, 7),
(34, 4),
(34, 7),
(35, 4),
(35, 7),
(36, 4),
(36, 7),
(37, 4),
(37, 7),
(38, 4),
(38, 7),
(39, 4),
(39, 7),
(40, 4),
(40, 7),
(41, 4),
(41, 7),
(42, 4),
(42, 7),
(43, 4),
(43, 7),
(44, 4),
(44, 7),
(45, 4),
(45, 7),
(46, 4),
(46, 7),
(47, 4),
(47, 7),
(48, 4),
(48, 7),
(49, 4),
(49, 7),
(50, 4),
(50, 7),
(51, 4),
(51, 7),
(52, 4),
(52, 7),
(53, 4),
(53, 7),
(53, 11),
(54, 4),
(54, 7),
(54, 11),
(55, 4),
(55, 7),
(55, 11),
(56, 4),
(56, 7),
(56, 11),
(57, 4),
(57, 7),
(57, 11),
(58, 4),
(58, 7),
(59, 4),
(59, 7),
(60, 4),
(60, 7),
(61, 4),
(61, 7),
(63, 4),
(63, 7),
(63, 10),
(64, 4),
(64, 7),
(64, 10),
(65, 4),
(65, 7),
(65, 10),
(66, 4),
(66, 7),
(66, 10),
(67, 4),
(67, 7),
(67, 10),
(68, 4),
(68, 7),
(68, 10),
(69, 4),
(69, 7),
(69, 10),
(70, 4),
(70, 7),
(70, 10),
(71, 4),
(71, 7),
(72, 4),
(72, 7),
(73, 4),
(73, 7),
(74, 4),
(74, 7),
(75, 4),
(75, 7),
(76, 4),
(76, 7),
(77, 4),
(77, 7),
(78, 4),
(78, 7),
(79, 4),
(79, 7),
(80, 4),
(80, 7),
(81, 4),
(81, 7),
(82, 4),
(82, 7),
(83, 4),
(83, 7),
(84, 4),
(84, 7),
(85, 4),
(85, 7),
(86, 4),
(86, 7),
(87, 4),
(87, 7),
(88, 4),
(88, 7),
(89, 4),
(89, 7),
(90, 4),
(90, 7),
(90, 11);

-- --------------------------------------------------------

--
-- Table structure for table `signups`
--

CREATE TABLE `signups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sims`
--

CREATE TABLE `sims` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `iccid` varchar(255) DEFAULT NULL,
  `lpa` varchar(255) DEFAULT NULL,
  `imsis` varchar(255) DEFAULT NULL,
  `matching_id` varchar(255) DEFAULT NULL,
  `qrcode` varchar(255) DEFAULT NULL,
  `qrcode_url` varchar(255) DEFAULT NULL,
  `airalo_code` varchar(255) DEFAULT NULL,
  `apn_type` varchar(255) DEFAULT NULL,
  `apn_value` varchar(255) DEFAULT NULL,
  `is_roaming` varchar(255) DEFAULT NULL,
  `confirmation_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `socialite_controllers`
--

CREATE TABLE `socialite_controllers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `topup_orders`
--

CREATE TABLE `topup_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `esim_type` varchar(255) DEFAULT NULL,
  `validity` int(11) DEFAULT NULL,
  `package` varchar(255) DEFAULT NULL,
  `data` varchar(255) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `ids` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `manual_installation` varchar(255) DEFAULT NULL,
  `qrcode_installation` varchar(255) DEFAULT NULL,
  `installation_guide_en` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT '1 for active and 2 for inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `contact_number` varchar(500) DEFAULT NULL,
  `designation` varchar(500) DEFAULT NULL,
  `gender` varchar(500) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `role` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `created_at`, `updated_at`, `contact_number`, `designation`, `gender`, `image`, `role`) VALUES
(3, 'Super Admin', 'hariss@gmail.com', NULL, '$2y$10$eOMttbsTXIBuNS5BDt6AhO8XDNfqxTbMB8SaN5/CABTzeRxyW.G3u', NULL, '1', '2024-02-27 01:35:44', '2024-09-02 04:12:47', '93475834856', NULL, NULL, '65dd89c803986.png', 'Super Admin'),
(7, 'HR -  Hariss International', 'test@gmail.com', NULL, '$2y$10$dzl24NxUHwWWBA5312YExOHnAkErc2MWiGP9Xe3GkK4NmM7ZILJGC', NULL, '1', '2024-07-02 09:22:42', '2024-09-02 04:12:59', '99999999', NULL, NULL, '6684143a1241f.png', 'Super Admin'),
(8, 'create', '1test@gmail.com', NULL, '$2y$10$2sEa.dxCFY77yAMF2mE3iO9bpjiyQ3rLcg6nNtsLBxV7EI17YHMGq', NULL, '1', '2024-09-02 03:38:55', '2024-09-02 04:14:14', '3456346346', NULL, NULL, NULL, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `compatible_devices`
--
ALTER TABLE `compatible_devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `esim_customers`
--
ALTER TABLE `esim_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `esim_loginrs`
--
ALTER TABLE `esim_loginrs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `esim_users`
--
ALTER TABLE `esim_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `front_homes`
--
ALTER TABLE `front_homes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `signups`
--
ALTER TABLE `signups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `signups_email_unique` (`email`);

--
-- Indexes for table `sims`
--
ALTER TABLE `sims`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socialite_controllers`
--
ALTER TABLE `socialite_controllers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topup_orders`
--
ALTER TABLE `topup_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `compatible_devices`
--
ALTER TABLE `compatible_devices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `esim_customers`
--
ALTER TABLE `esim_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `esim_loginrs`
--
ALTER TABLE `esim_loginrs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `esim_users`
--
ALTER TABLE `esim_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `front_homes`
--
ALTER TABLE `front_homes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `signups`
--
ALTER TABLE `signups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sims`
--
ALTER TABLE `sims`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `socialite_controllers`
--
ALTER TABLE `socialite_controllers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `topup_orders`
--
ALTER TABLE `topup_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
