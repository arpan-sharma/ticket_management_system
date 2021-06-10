-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 10, 2021 at 09:38 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `neosoft`
--

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

CREATE TABLE `activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activations`
--

INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'kygBUb7uLY2EVVm7dSbtWvmD1Pq06Dt7', 1, NULL, '2021-06-08 08:01:36', '2021-06-08 08:01:36'),
(2, 4, '5vE3WrOUG1AH9JNspX6X9LuoXNJmT5JZ', 1, '2021-06-08 17:02:23', '2021-06-08 17:02:23', '2021-06-08 17:02:23'),
(3, 5, 'OKNEtRiwgaK8lQiDFCw8VlDDqmI5CUgL', 1, '2021-06-08 17:03:08', '2021-06-08 17:03:08', '2021-06-08 17:03:08'),
(4, 6, 'isTleFE030yAMW0R3ofk36V3nld0IGzO', 1, '2021-06-09 02:50:07', '2021-06-09 02:50:07', '2021-06-09 02:50:07'),
(5, 7, 'dNEc57D3sAqwv8GLkP6czTm1y12vL2mB', 1, '2021-06-09 03:42:16', '2021-06-09 03:42:16', '2021-06-09 03:42:16'),
(6, 8, 'Cs1IoK2rkzC1BJOMyBNeYt1j6YsMeur5', 1, '2021-06-09 03:43:56', '2021-06-09 03:43:56', '2021-06-09 03:43:56'),
(7, 9, 'FWB6mpDhSkCMIxq6hY3rjnTOgfiI7naX', 1, '2021-06-09 21:48:26', '2021-06-09 21:48:26', '2021-06-09 21:48:26'),
(8, 10, 'nGLdYahe1JeDIAnuTuMWVnVa2mf7RSTM', 1, '2021-06-09 21:50:05', '2021-06-09 21:50:05', '2021-06-09 21:50:05'),
(9, 12, 'YxpiXzSaQebYUGEyFjelcshS7DquOlY1', 1, '2021-06-09 21:52:16', '2021-06-09 21:52:16', '2021-06-09 21:52:16'),
(10, 13, 'FJHnWd35gPxXq4oApp5xP69Hsm2w37Nh', 1, '2021-06-09 22:08:30', '2021-06-09 22:08:30', '2021-06-09 22:08:30'),
(11, 14, 'ldOgYLiptdFfYk63AXFML1UKmswijA4E', 1, '2021-06-09 22:09:26', '2021-06-09 22:09:26', '2021-06-09 22:09:26'),
(12, 15, 'kxPzq4ONY26LAQp14sn7yR7i0VqQEPzV', 1, '2021-06-09 22:17:26', '2021-06-09 22:17:26', '2021-06-09 22:17:26'),
(13, 16, '9nGXB64zsFsan6Y2XvOYWizvdiokzevp', 1, '2021-06-09 22:20:24', '2021-06-09 22:20:24', '2021-06-09 22:20:24'),
(14, 17, 'VSa5B6DHNqDh2WOX1TPMsiowDCaNLey3', 1, '2021-06-09 22:23:33', '2021-06-09 22:23:33', '2021-06-09 22:23:33');

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
(1, '2014_07_02_230147_migration_cartalyst_sentinel', 1),
(2, '2021_06_08_182548_create_tickets_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `persistences`
--

CREATE TABLE `persistences` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `persistences`
--

INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(1, 1, '6QeLUaaEljFnHbTVrURzUmojlYDqN2qL', '2021-06-08 09:05:05', '2021-06-08 09:05:05'),
(2, 1, 'X7D6TQ5KxtGrs5QiM6J2RW2PA6TVjHCP', '2021-06-08 09:05:15', '2021-06-08 09:05:15'),
(4, 1, '9gdWJ9smBDl33V4NJG020uPwof9iFus9', '2021-06-08 11:00:32', '2021-06-08 11:00:32'),
(5, 1, 'PKrLfCKBGzIrBMYFRlEBJzArUgkRF6WB', '2021-06-08 11:25:13', '2021-06-08 11:25:13'),
(6, 1, '5Je6eShY9JM7iWUDNzHCGI4Hnhul33Q2', '2021-06-08 14:56:21', '2021-06-08 14:56:21'),
(9, 5, 'azs5i5Wwt38QSczTeieqnMzozJzO7vzw', '2021-06-09 02:12:51', '2021-06-09 02:12:51'),
(10, 5, 'kZUYks1a3ysGS95pfwK7ygj0q2AmeOEv', '2021-06-09 02:13:44', '2021-06-09 02:13:44'),
(11, 5, 'OqHgByh0rGOljVAsLMVotqcxML1PvPUs', '2021-06-09 02:17:39', '2021-06-09 02:17:39'),
(12, 5, 'PctftU4oGRXvADvGSoVELKVtzjt1w3zh', '2021-06-09 02:18:23', '2021-06-09 02:18:23'),
(17, 5, 'bVX9ECFZaXL3sm0ZimJBIZFFN3jWKDyV', '2021-06-09 09:16:00', '2021-06-09 09:16:00'),
(22, 8, 'tm3OiYN3r6rxGuzRYgLtVQQNL59YIPVR', '2021-06-10 01:15:30', '2021-06-10 01:15:30');

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', NULL, NULL, NULL),
(2, 'subadmin', 'Subadmin', NULL, NULL, NULL),
(3, 'agent', 'Agent', NULL, NULL, NULL),
(4, 'user', 'User', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-06-08 08:01:36', '2021-06-08 08:01:36'),
(3, 3, '2021-06-08 16:59:37', '2021-06-08 16:59:37'),
(4, 3, '2021-06-08 17:02:23', '2021-06-08 17:02:23'),
(5, 3, '2021-06-08 17:03:08', '2021-06-08 17:03:08'),
(6, 2, '2021-06-09 02:50:07', '2021-06-09 02:50:07'),
(7, 2, '2021-06-09 03:42:16', '2021-06-09 03:42:16'),
(8, 4, '2021-06-09 03:43:56', '2021-06-09 03:43:56'),
(9, 2, '2021-06-09 21:48:26', '2021-06-09 21:48:26'),
(10, 2, '2021-06-09 21:50:05', '2021-06-09 21:50:05'),
(12, 2, '2021-06-09 21:52:16', '2021-06-09 21:52:16'),
(13, 2, '2021-06-09 22:08:30', '2021-06-09 22:08:30'),
(14, 2, '2021-06-09 22:09:26', '2021-06-09 22:09:26'),
(15, 2, '2021-06-09 22:17:26', '2021-06-09 22:17:26'),
(16, 2, '2021-06-09 22:20:24', '2021-06-09 22:20:24'),
(17, 2, '2021-06-09 22:23:33', '2021-06-09 22:23:33');

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE `throttle` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `type`, `ip`, `created_at`, `updated_at`) VALUES
(1, NULL, 'global', NULL, '2021-06-08 08:48:51', '2021-06-08 08:48:51'),
(2, NULL, 'ip', '127.0.0.1', '2021-06-08 08:48:51', '2021-06-08 08:48:51'),
(3, NULL, 'global', NULL, '2021-06-08 08:49:12', '2021-06-08 08:49:12'),
(4, NULL, 'ip', '127.0.0.1', '2021-06-08 08:49:12', '2021-06-08 08:49:12'),
(5, NULL, 'global', NULL, '2021-06-08 08:49:29', '2021-06-08 08:49:29'),
(6, NULL, 'ip', '127.0.0.1', '2021-06-08 08:49:29', '2021-06-08 08:49:29'),
(7, NULL, 'global', NULL, '2021-06-08 08:52:23', '2021-06-08 08:52:23'),
(8, NULL, 'ip', '127.0.0.1', '2021-06-08 08:52:23', '2021-06-08 08:52:23'),
(9, NULL, 'global', NULL, '2021-06-08 08:53:34', '2021-06-08 08:53:34'),
(10, NULL, 'ip', '127.0.0.1', '2021-06-08 08:53:34', '2021-06-08 08:53:34'),
(11, NULL, 'global', NULL, '2021-06-08 15:34:39', '2021-06-08 15:34:39'),
(12, NULL, 'ip', '127.0.0.1', '2021-06-08 15:34:39', '2021-06-08 15:34:39'),
(13, NULL, 'global', NULL, '2021-06-08 15:59:27', '2021-06-08 15:59:27'),
(14, NULL, 'ip', '127.0.0.1', '2021-06-08 15:59:27', '2021-06-08 15:59:27'),
(15, NULL, 'global', NULL, '2021-06-08 22:57:53', '2021-06-08 22:57:53'),
(16, NULL, 'ip', '127.0.0.1', '2021-06-08 22:57:53', '2021-06-08 22:57:53'),
(17, 2, 'user', NULL, '2021-06-08 22:57:53', '2021-06-08 22:57:53'),
(18, NULL, 'global', NULL, '2021-06-09 01:06:46', '2021-06-09 01:06:46'),
(19, NULL, 'ip', '127.0.0.1', '2021-06-09 01:06:46', '2021-06-09 01:06:46'),
(20, NULL, 'global', NULL, '2021-06-09 01:09:41', '2021-06-09 01:09:41'),
(21, NULL, 'ip', '127.0.0.1', '2021-06-09 01:09:41', '2021-06-09 01:09:41'),
(22, NULL, 'global', NULL, '2021-06-09 01:10:32', '2021-06-09 01:10:32'),
(23, NULL, 'ip', '127.0.0.1', '2021-06-09 01:10:32', '2021-06-09 01:10:32'),
(24, NULL, 'global', NULL, '2021-06-09 01:10:36', '2021-06-09 01:10:36'),
(25, NULL, 'ip', '127.0.0.1', '2021-06-09 01:10:36', '2021-06-09 01:10:36'),
(26, NULL, 'global', NULL, '2021-06-09 01:10:37', '2021-06-09 01:10:37'),
(27, NULL, 'ip', '127.0.0.1', '2021-06-09 01:10:37', '2021-06-09 01:10:37'),
(28, NULL, 'global', NULL, '2021-06-10 01:14:40', '2021-06-10 01:14:40'),
(29, NULL, 'ip', '127.0.0.1', '2021-06-10 01:14:40', '2021-06-10 01:14:40'),
(30, 8, 'user', NULL, '2021-06-10 01:14:40', '2021-06-10 01:14:40'),
(31, NULL, 'global', NULL, '2021-06-10 01:14:55', '2021-06-10 01:14:55'),
(32, NULL, 'ip', '127.0.0.1', '2021-06-10 01:14:55', '2021-06-10 01:14:55'),
(33, 8, 'user', NULL, '2021-06-10 01:14:55', '2021-06-10 01:14:55');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` int(11) NOT NULL,
  `mobileno` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assets` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial_no` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_no` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` enum('High','Medium','Low','Emergency') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket_status` enum('Pending','Approved','Ready_To_Dispatched','Closed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `agent_id`, `mobileno`, `assets`, `serial_no`, `model_no`, `priority`, `ticket_status`, `created_at`, `updated_at`) VALUES
(1, 8, 5, '8989898787', 'hello', '12345', '78787', 'Medium', 'Approved', '2021-06-09 04:47:47', '2021-06-10 00:16:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobileno` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` enum('Admin','Subadmin','User','Agent') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `last_login`, `first_name`, `last_name`, `username`, `profile_pic`, `mobileno`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 'admin@ticketneosoft.com', '$2y$10$4mN65iO6Vz0K3TJ1dAeEi.c1L1y.qzdvivoVZhpKImU6pGO8BXezK', NULL, '2021-06-10 00:37:35', 'Arpan', NULL, 'admin@neosoft.com', '', '', 'Admin', '2021-06-08 08:01:36', '2021-06-10 00:37:35'),
(2, 'admin@neosoft.com', '$2y$10$W/HxTzeq.AbaCqGHZgHNoeMaIaDpvaCXnzjNKDEMjicQT6PeLJcz6', NULL, NULL, 'Arpan', 'sharma', 'admin@neosoft1.com', 'Lg6A3kC9Ai.jpeg', '9098787876', 'Agent', '2021-06-08 16:55:04', '2021-06-08 16:55:04'),
(3, 'admin@neosoft3.com', '$2y$10$FqPwA9b4nUtBMg9vdhHiee4AQ3euNF8WuZKIlmdoGpJ7dsx8i1E5e', NULL, NULL, 'Arpan', 'sharma', 'admin@neosoft3.com', 'eWrGXxRmeZ.jpeg', '9098787878', 'Agent', '2021-06-08 16:59:37', '2021-06-08 16:59:37'),
(4, 'admin@neosoft4.com', '$2y$10$WLuHI56kELf3QmKrwuwU4.795SZm.M3dgItDOxmPWuWz8Cff5MyRC', NULL, NULL, 'Arpan', 'sharma', 'admin@neosoft4.com', 'EysyTTzHXZ.jpeg', '9098787848', 'Agent', '2021-06-08 17:02:23', '2021-06-08 17:02:23'),
(5, 'admin@neosoft5.com', '$2y$10$4mN65iO6Vz0K3TJ1dAeEi.c1L1y.qzdvivoVZhpKImU6pGO8BXezK', NULL, '2021-06-10 01:15:38', 'Arpan', 'sharma', 'admin@neosoft5.com', 'HmgPhzTS1h.jpeg', '9098787048', 'Agent', '2021-06-08 17:03:08', '2021-06-10 01:15:38'),
(6, 'ajay@gmail.com', '$2y$10$M9zIZoA0y/N02KaQkK24TOxdCy6XRSfF6enPUuUiDCHpSSGbw7bIS', NULL, '2021-06-09 02:50:46', 'Ajay', 'jay', 'ajay@gmail.com', 'J8sOnI0cHz.jpeg', '7878766554', 'Subadmin', '2021-06-09 02:50:07', '2021-06-09 02:50:46'),
(7, 'jay@gmail.com', '$2y$10$nQ.rOQvkGVXkWYUTL4vHIu/DoINQTIUrZfPIx0VuaeyNvwV.yTqEq', NULL, NULL, 'Jayes', 'Sharma', 'jay@gmail.com', 'HDZTZWiUSl.jpeg', '5678788898', 'Subadmin', '2021-06-09 03:42:16', '2021-06-09 03:42:16'),
(8, 'Singh@gmail.com', '$2y$10$4mN65iO6Vz0K3TJ1dAeEi.c1L1y.qzdvivoVZhpKImU6pGO8BXezK', NULL, '2021-06-10 01:15:30', 'Arpan', 'sharma', 'arpansharma256@gmail.com', 'lMZAJZzV3l.jpeg', '7654355446', 'User', '2021-06-09 03:43:56', '2021-06-10 01:15:30'),
(9, 'arpansharma26@gmail.com', '$2y$10$XWw72tNdButGeFryWogS1OWm/JE6BzO8Wae7VMGhIKLeUaWjKkeFi', NULL, NULL, 'Arpan', 'Sharma', 'arpansharma25@gmail.com', 'A13rcf67ug.jpeg', '8765432334', 'Subadmin', '2021-06-09 21:48:26', '2021-06-09 21:48:26'),
(10, 'arpansharma6@gmail.com', '$2y$10$F9BI2FMIvEJuvZO3kWzs6uR8kgNHBY5eIQLDcoF2gaNxMWmloIN2a', NULL, NULL, 'Arpan', 'Sharma', 'arpansharma6@gmail.com', 'vhYhAC2bZ1.jpeg', '8765432934', 'Subadmin', '2021-06-09 21:50:05', '2021-06-09 21:50:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activations`
--
ALTER TABLE `activations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persistences`
--
ALTER TABLE `persistences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `persistences_code_unique` (`code`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `throttle_user_id_index` (`user_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activations`
--
ALTER TABLE `activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `persistences`
--
ALTER TABLE `persistences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
