-- phpMyAdmin SQL Dump
-- version 5.1.4deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 02, 2024 at 11:59 AM
-- Server version: 8.0.33-0ubuntu0.22.10.2
-- PHP Version: 8.1.7-1ubuntu3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `riham_websites`
--

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Create User', 'web', 'Active', '2024-06-26 00:46:06', '2024-06-27 05:59:21'),
(2, 'Edit Role', 'web', 'Active', '2024-06-26 00:59:38', '2024-06-27 05:29:44'),
(3, 'Delete User', 'web', 'Active', '2024-06-26 01:00:05', '2024-06-27 05:59:35'),
(5, 'View User', 'web', 'Active', '2024-06-26 01:49:16', '2024-06-27 05:59:55'),
(8, 'Edit Permission', 'web', 'Active', '2024-06-27 05:25:11', '2024-06-27 05:25:11'),
(9, 'Delete Permission', 'web', 'Active', '2024-06-27 05:26:00', '2024-06-27 05:26:00'),
(10, 'Create Role', 'web', 'Active', '2024-06-27 05:28:08', '2024-06-27 05:28:08'),
(11, 'Delete Role', 'web', 'Active', '2024-06-27 05:31:55', '2024-06-27 05:31:55'),
(12, 'Give Permission', 'web', 'Active', '2024-06-27 05:35:00', '2024-06-27 05:35:00'),
(13, 'Create permission', 'web', 'Active', '2024-06-27 05:39:18', '2024-06-27 06:00:35'),
(14, 'Edit User', 'web', 'Active', '2024-06-27 06:05:33', '2024-06-27 06:05:33'),
(15, 'Edit Home Banner', 'web', 'Active', '2024-06-28 05:32:37', '2024-06-28 05:33:49'),
(16, 'Create Home Banner', 'web', 'Active', '2024-06-28 05:33:38', '2024-06-28 05:33:38'),
(17, 'Delete Home Banner', 'web', 'Active', '2024-06-28 05:34:17', '2024-06-28 05:34:17'),
(18, 'View Home Banner', 'web', 'Active', '2024-06-28 05:52:29', '2024-06-28 05:52:29'),
(19, 'Home About', 'web', 'Active', '2024-06-28 06:05:36', '2024-06-28 06:05:36'),
(20, 'Home Sustainability', 'web', 'Active', '2024-06-28 06:18:10', '2024-06-28 06:18:10'),
(21, 'Home Career', 'web', 'Active', '2024-06-28 06:20:20', '2024-06-28 06:20:20'),
(22, 'Create Product', 'web', 'Active', '2024-06-28 06:24:09', '2024-06-28 06:31:01'),
(23, 'Edit Product', 'web', 'Active', '2024-06-28 06:24:23', '2024-06-28 06:24:23'),
(24, 'Delete Product', 'web', 'Active', '2024-06-28 06:24:40', '2024-06-28 06:24:40'),
(25, 'View Product', 'web', 'Active', '2024-06-28 06:24:51', '2024-06-28 06:24:51'),
(26, 'Create Plant', 'web', 'Active', '2024-06-28 06:35:46', '2024-06-28 06:35:46'),
(27, 'Edit Plant', 'web', 'Active', '2024-06-28 06:35:57', '2024-06-28 06:35:57'),
(28, 'Delete Plant', 'web', 'Active', '2024-06-28 06:36:11', '2024-06-28 06:36:11'),
(29, 'Home Brand Banner', 'web', 'Active', '2024-06-28 07:07:24', '2024-06-28 07:07:24'),
(30, 'Home Brand Create', 'web', 'Active', '2024-06-28 07:09:57', '2024-06-28 07:09:57'),
(31, 'Home Brand Edit', 'web', 'Active', '2024-06-28 07:10:14', '2024-06-28 07:10:14'),
(32, 'Home Brand Delete', 'web', 'Active', '2024-06-28 07:10:45', '2024-06-28 07:10:45'),
(33, 'Home Brand View', 'web', 'Active', '2024-06-28 07:11:03', '2024-06-28 07:11:03'),
(34, 'Who We Are Banner', 'web', 'Active', '2024-06-28 07:26:56', '2024-06-28 07:26:56'),
(35, 'Create Gallery', 'web', 'Active', '2024-06-28 07:32:43', '2024-06-28 07:32:43'),
(36, 'Edit Gallery', 'web', 'Active', '2024-06-28 07:33:03', '2024-06-28 07:33:03'),
(37, 'Delete Gallery', 'web', 'Active', '2024-06-28 07:33:18', '2024-06-28 07:33:18'),
(38, 'Create Our Journey', 'web', 'Active', '2024-06-28 07:49:46', '2024-06-28 07:49:46'),
(39, 'Edit Our Journey', 'web', 'Active', '2024-06-28 07:49:58', '2024-06-28 07:49:58'),
(40, 'Delete Our Journey', 'web', 'Active', '2024-06-28 07:50:19', '2024-06-28 07:50:19'),
(41, 'View Our Journey', 'web', 'Active', '2024-06-28 07:50:35', '2024-06-28 07:50:35'),
(42, 'Create Awards', 'web', 'Active', '2024-06-28 08:43:06', '2024-06-28 08:43:06'),
(43, 'Edit Awards', 'web', 'Active', '2024-06-28 08:43:20', '2024-06-28 08:43:20'),
(44, 'Delete Awards', 'web', 'Active', '2024-06-28 08:43:30', '2024-06-28 08:43:30'),
(45, 'View Awards', 'web', 'Active', '2024-06-28 08:43:39', '2024-06-28 08:43:39'),
(46, 'Our Vision', 'web', 'Active', '2024-06-28 08:59:00', '2024-06-28 08:59:00'),
(47, 'Our Mission', 'web', 'Active', '2024-06-28 09:00:51', '2024-06-28 09:00:51'),
(48, 'Our Value', 'web', 'Active', '2024-06-28 09:02:53', '2024-06-28 09:02:53'),
(49, 'Create Sustainability', 'web', 'Active', '2024-06-28 09:06:12', '2024-06-28 09:06:12'),
(50, 'Edit Sustainability', 'web', 'Active', '2024-06-28 09:06:24', '2024-06-28 09:06:24'),
(51, 'Delete Sustainability', 'web', 'Active', '2024-06-28 09:06:34', '2024-06-28 09:06:34'),
(52, 'View Sustainability', 'web', 'Active', '2024-06-28 09:06:46', '2024-06-28 09:06:46'),
(53, 'Create Career', 'web', 'Active', '2024-06-28 09:29:15', '2024-06-28 09:29:15'),
(54, 'Edit Career', 'web', 'Active', '2024-06-28 09:29:27', '2024-06-28 09:29:27'),
(55, 'Delete Career', 'web', 'Active', '2024-06-28 09:29:39', '2024-06-28 09:29:39'),
(56, 'View Career', 'web', 'Active', '2024-06-28 09:29:51', '2024-06-28 09:29:51'),
(57, 'Career Banner', 'web', 'Active', '2024-06-28 09:41:35', '2024-06-28 09:41:35'),
(58, 'Job Banner', 'web', 'Active', '2024-06-28 09:44:24', '2024-06-28 09:44:24'),
(59, 'Craete Department', 'web', 'Active', '2024-06-28 09:46:12', '2024-06-28 09:46:12'),
(60, 'Edit Department', 'web', 'Active', '2024-06-28 09:46:23', '2024-06-28 09:46:23'),
(61, 'Delete Department', 'web', 'Active', '2024-06-28 09:46:33', '2024-06-28 09:46:33'),
(63, 'Create Qualification', 'web', 'Active', '2024-06-28 09:56:07', '2024-06-28 09:56:07'),
(64, 'Edit Qualification', 'web', 'Active', '2024-06-28 09:56:18', '2024-06-28 09:56:18'),
(65, 'Delete Qualification', 'web', 'Active', '2024-06-28 09:56:30', '2024-06-28 09:56:30'),
(66, 'Create Job', 'web', 'Active', '2024-06-28 10:03:57', '2024-06-28 10:03:57'),
(67, 'Edit Job', 'web', 'Active', '2024-06-28 10:04:12', '2024-06-28 10:04:12'),
(68, 'View Job', 'web', 'Active', '2024-06-28 10:04:28', '2024-06-28 10:04:28'),
(69, 'Delete Job', 'web', 'Active', '2024-06-28 10:04:40', '2024-06-28 10:04:40'),
(70, 'Candidate View', 'web', 'Active', '2024-06-28 10:18:15', '2024-06-28 10:21:10'),
(71, 'Create Team Banner', 'web', 'Active', '2024-06-28 10:22:56', '2024-06-28 10:22:56'),
(72, 'Carete Team', 'web', 'Active', '2024-06-28 10:36:36', '2024-06-28 11:50:00'),
(73, 'Edit Our Team', 'web', 'Active', '2024-06-28 10:37:14', '2024-06-28 10:37:14'),
(74, 'Delete Our Team', 'web', 'Active', '2024-06-28 10:37:34', '2024-06-28 10:37:34'),
(75, 'View Our Team', 'web', 'Active', '2024-06-28 10:37:47', '2024-06-28 10:37:47'),
(76, 'Brand Banner', 'web', 'Active', '2024-06-28 11:51:36', '2024-06-28 11:51:36'),
(77, 'Create Brand', 'web', 'Active', '2024-06-28 11:53:24', '2024-06-28 11:53:24'),
(78, 'Edit Barnd', 'web', 'Active', '2024-06-28 11:53:37', '2024-06-28 11:53:37'),
(79, 'Delete Brand', 'web', 'Active', '2024-06-28 11:53:58', '2024-06-28 11:53:58'),
(80, 'View Brand', 'web', 'Active', '2024-06-28 11:54:14', '2024-06-28 11:54:14'),
(81, 'Craete Media', 'web', 'Active', '2024-06-28 12:14:21', '2024-06-28 12:14:21'),
(82, 'Edit Media', 'web', 'Active', '2024-06-28 12:14:35', '2024-06-28 12:14:35'),
(83, 'Delete Media', 'web', 'Active', '2024-06-28 12:14:48', '2024-06-28 12:14:48'),
(84, 'View Media', 'web', 'Active', '2024-06-28 12:15:02', '2024-06-28 12:15:02'),
(85, 'Create Terms', 'web', 'Active', '2024-06-28 12:22:24', '2024-06-28 12:22:24'),
(86, 'Create Privacy Center', 'web', 'Active', '2024-06-28 12:24:28', '2024-06-28 12:24:28'),
(87, 'Edit Privacy Center', 'web', 'Active', '2024-06-28 12:24:42', '2024-06-28 12:24:42'),
(88, 'View Privacy Center', 'web', 'Active', '2024-06-28 12:24:53', '2024-06-28 12:24:53'),
(89, 'Delete Privacy Center', 'web', 'Active', '2024-06-28 12:25:03', '2024-06-28 12:25:03'),
(90, 'Dashboard', 'web', 'Active', '2024-06-29 09:27:23', '2024-06-29 09:27:23');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(15, 4),
(16, 4),
(17, 4),
(18, 4),
(19, 4),
(20, 4),
(21, 4),
(22, 4),
(23, 4),
(24, 4),
(25, 4),
(26, 4),
(27, 4),
(28, 4),
(29, 4),
(30, 4),
(31, 4),
(32, 4),
(33, 4),
(34, 4),
(35, 4),
(36, 4),
(37, 4),
(38, 4),
(39, 4),
(40, 4),
(41, 4),
(42, 4),
(43, 4),
(44, 4),
(45, 4),
(46, 4),
(47, 4),
(48, 4),
(49, 4),
(50, 4),
(51, 4),
(52, 4),
(53, 4),
(54, 4),
(55, 4),
(56, 4),
(57, 4),
(58, 4),
(59, 4),
(60, 4),
(61, 4),
(63, 4),
(64, 4),
(65, 4),
(66, 4),
(67, 4),
(68, 4),
(69, 4),
(70, 4),
(71, 4),
(72, 4),
(73, 4),
(74, 4),
(75, 4),
(76, 4),
(77, 4),
(78, 4),
(79, 4),
(80, 4),
(81, 4),
(82, 4),
(83, 4),
(84, 4),
(85, 4),
(86, 4),
(87, 4),
(88, 4),
(89, 4),
(90, 4),
(1, 7),
(2, 7),
(3, 7),
(5, 7),
(10, 7),
(11, 7),
(12, 7),
(14, 7),
(15, 7),
(16, 7),
(17, 7),
(18, 7),
(19, 7),
(20, 7),
(21, 7),
(22, 7),
(23, 7),
(24, 7),
(25, 7),
(26, 7),
(27, 7),
(28, 7),
(29, 7),
(30, 7),
(31, 7),
(32, 7),
(33, 7),
(34, 7),
(35, 7),
(36, 7),
(37, 7),
(38, 7),
(39, 7),
(40, 7),
(41, 7),
(42, 7),
(43, 7),
(44, 7),
(45, 7),
(46, 7),
(47, 7),
(48, 7),
(49, 7),
(50, 7),
(51, 7),
(52, 7),
(53, 7),
(54, 7),
(55, 7),
(56, 7),
(57, 7),
(58, 7),
(59, 7),
(60, 7),
(61, 7),
(63, 7),
(64, 7),
(65, 7),
(66, 7),
(67, 7),
(68, 7),
(69, 7),
(70, 7),
(71, 7),
(72, 7),
(73, 7),
(74, 7),
(75, 7),
(76, 7),
(77, 7),
(78, 7),
(79, 7),
(80, 7),
(81, 7),
(82, 7),
(83, 7),
(84, 7),
(85, 7),
(86, 7),
(87, 7),
(88, 7),
(89, 7),
(90, 7),
(63, 10),
(64, 10),
(65, 10),
(66, 10),
(67, 10),
(68, 10),
(69, 10),
(70, 10),
(53, 11),
(54, 11),
(55, 11),
(56, 11),
(57, 11),
(90, 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
