-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2022 at 04:34 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_superadmin` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_superadmin`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rohan Raj Shrestha', 'shrestharohan@gmail.com', '2022-03-19 20:41:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 1, 'eJOOcHbquw', '2022-03-19 20:41:13', '2022-03-19 20:41:13');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `number_adults` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_status` enum('processing','checkedin','checkedout','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'processing',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `room_id`, `user_id`, `checkin`, `checkout`, `number_adults`, `room_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 8, 1, '2022-03-20', '2022-03-21', '2', 'processing', '1', '2022-03-19 21:07:53', '2022-03-19 21:07:53'),
(2, 2, 1, '2022-03-20', '2022-03-21', '2', 'processing', '1', '2022-03-19 21:08:50', '2022-03-19 21:08:50'),
(3, 1, 1, '2022-03-20', '2022-03-21', '2', 'processing', '1', '2022-03-19 21:09:08', '2022-03-19 21:09:08');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `citizenship` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `contact`, `address`, `email`, `citizenship`, `email_verified_at`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Rohan Raj Shrestha', '9818721719', 'kathmandu', 'shrestharohan@gmail.com', '154245742', NULL, '$2y$10$qZGSn4wAUGtxk30KR1A5WOEfo2ku4T9ufO6ZcriseSt9CsMzDkvj6', '1', '2022-03-19 20:41:13', '2022-03-19 20:41:13');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_22_132244_create_admins_table', 1),
(6, '2022_03_04_141119_create_room_types_table', 1),
(7, '2022_03_05_120437_create_rooms_table', 1),
(8, '2022_03_08_113908_create_customers_table', 1),
(9, '2022_03_08_114949_create_bookings_table', 1),
(10, '2022_03_13_131718_create_payments_table', 1);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `paymenttype` enum('card','cash','online') COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('paid','notpaid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'notpaid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `booking_id`, `paymenttype`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'card', '4500', 'paid', '2022-03-19 21:07:53', '2022-03-19 21:07:57'),
(2, 2, 'card', '4500', 'paid', '2022-03-19 21:08:50', '2022-03-19 21:08:53'),
(3, 3, 'card', '4500', 'paid', '2022-03-19 21:09:08', '2022-03-19 21:09:11');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_type_id` bigint(20) UNSIGNED NOT NULL,
  `room_number` int(11) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_type_id`, `room_number`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 101, 'This is a awesome package for one to two customers.', '1', '2022-03-19 20:45:53', '2022-03-19 20:45:53'),
(2, 1, 102, 'This is a awesome package for one to two customers.', '1', '2022-03-19 20:45:59', '2022-03-19 20:45:59'),
(3, 2, 103, 'This is a awesome package for one to two customers.', '1', '2022-03-19 20:46:10', '2022-03-19 20:46:10'),
(4, 2, 104, 'This is a awesome package for one to two customers.', '1', '2022-03-19 20:46:18', '2022-03-19 20:46:18'),
(5, 3, 105, 'This is a awesome package for one to two customers.', '1', '2022-03-19 20:46:32', '2022-03-19 20:46:32'),
(6, 3, 106, 'A awesome place to hangout and relax your vacation.', '1', '2022-03-19 20:46:43', '2022-03-19 20:46:43'),
(7, 4, 107, 'A awesome place to hangout and relax your vacation.', '1', '2022-03-19 20:46:53', '2022-03-19 20:46:53'),
(8, 1, 108, 'A awesome place to hangout and relax your vacation.', '1', '2022-03-19 20:46:58', '2022-03-19 20:46:58'),
(9, 5, 109, 'A awesome place to hangout and relax your vacation.', '1', '2022-03-19 21:14:25', '2022-03-19 21:14:25'),
(10, 6, 110, 'A awesome place to hangout and relax your vacation.', '1', '2022-03-19 21:14:34', '2022-03-19 21:14:34'),
(11, 7, 111, 'A awesome place to hangout and relax your vacation.', '1', '2022-03-19 21:14:44', '2022-03-19 21:14:44'),
(12, 8, 112, 'A awesome place to hangout and relax your vacation.', '1', '2022-03-19 21:14:51', '2022-03-19 21:14:51'),
(13, 9, 113, 'This is a awesome package for one to two customers.', '1', '2022-03-19 21:14:58', '2022-03-19 21:14:58'),
(14, 1, 114, 'A awesome place to hangout and relax your vacation.', '1', '2022-03-19 21:15:11', '2022-03-19 21:15:11'),
(15, 10, 115, 'A awesome place to hangout and relax your vacation.', '1', '2022-03-19 21:15:34', '2022-03-19 21:15:34'),
(16, 11, 116, 'A awesome place to hangout and relax your vacation.', '1', '2022-03-19 21:15:43', '2022-03-19 21:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE `room_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_adults` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`id`, `room_name`, `room_image`, `description`, `price`, `location`, `number_adults`, `is_available`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Swoyambhu View Hotel', '1647743345-Swoyambhu View Hotel.jpg', 'This it a awesome package for one to two customers.', 4500.00, 'kathmandu', '2', 1, 'ready for use', '2022-03-19 20:44:05', '2022-03-19 20:44:05'),
(2, 'Traditional Look Room', '1647743366-Traditional Look Room.jpg', 'This it a awesome package for one to two customers.', 4500.00, 'kathmandu', '2', 1, 'ready for use', '2022-03-19 20:44:26', '2022-03-19 20:44:26'),
(3, 'Westernized Interior Room', '1647743399-Westernized Interior Room.jpg', 'This is a awesome package for one to two customers.', 5000.00, 'kathmandu', '2', 1, 'ready for use', '2022-03-19 20:44:59', '2022-03-19 20:44:59'),
(4, 'Mountain View Hotel', '1647743441-Mountain View Hotel.jpg', 'A awesome place to hangout and relax your vacation.', 5000.00, 'kathmandu', '2', 1, 'ready for use', '2022-03-19 20:45:41', '2022-03-19 20:45:41'),
(5, 'Hill View Lodge', '1647743588-Hill View Lodge.webp', 'A awesome place to hangout and relax your vacation.', 9000.00, 'pokhara', '5', 1, 'available', '2022-03-19 20:48:08', '2022-03-19 20:48:08'),
(6, 'Antique Room', '1647743636-Antique Room.jpg', 'A awesome place to hangout and relax your vacation.', 4500.00, 'pokhara', '2', 1, 'available', '2022-03-19 20:48:56', '2022-03-19 20:49:27'),
(7, 'Luxurious Room', '1647743709-Luxurious Room.webp', 'A awesome place to hangout and relax your vacation.', 5000.00, 'pokhara', '2', 1, 'ready for use', '2022-03-19 20:50:09', '2022-03-19 20:50:26'),
(8, 'Lake View Room', '1647743762-Lake View Room.jpg', 'A awesome place to hangout and relax your vacation.', 4500.00, 'pokhara', '2', 1, 'ready for use', '2022-03-19 20:51:02', '2022-03-19 20:51:15'),
(9, 'Hangout Room(1BHK)', '1647743840-Hangout Room(1BHK).jpg', 'A awesome place to hangout and relax your vacation.', 5500.00, 'kathmandu', '2', 1, 'available', '2022-03-19 20:52:20', '2022-03-19 20:52:20'),
(10, 'Sunrise View Room', '1647743902-Sunrise View Room.jpg', 'A awesome place to hangout and relax your vacation.', 3500.00, 'pokhara', '2', 1, 'available', '2022-03-19 20:53:22', '2022-03-19 20:53:22'),
(11, 'Guest Gather', '1647743941-Guest Gather.jpg', 'A awesome place to hangout and relax your vacation.', 6000.00, 'pokhara', '10', 1, 'available', '2022-03-19 20:54:01', '2022-03-19 20:54:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `citizenship` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Not Booked',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_room_id_foreign` (`room_id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_booking_id_foreign` (`booking_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_room_type_id_foreign` (`room_type_id`);

--
-- Indexes for table `room_types`
--
ALTER TABLE `room_types`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `room_types`
--
ALTER TABLE `room_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_room_type_id_foreign` FOREIGN KEY (`room_type_id`) REFERENCES `room_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
