-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2021 at 01:26 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gasup`
--

-- --------------------------------------------------------

--
-- Table structure for table `couriers`
--

CREATE TABLE `couriers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_number` int(11) NOT NULL,
  `cnic` varchar(255) NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `address` text DEFAULT NULL,
  `descriptions` text DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `card_front` varchar(255) DEFAULT NULL,
  `card_back` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `couriers`
--

INSERT INTO `couriers` (`id`, `user_id`, `first_name`, `last_name`, `email`, `mobile_number`, `cnic`, `city`, `gender`, `dob`, `address`, `descriptions`, `profile_image`, `card_front`, `card_back`, `status`, `created_at`, `update_at`) VALUES
(1, 1, 'Michel', 'John', 'john@gmail.com', 3226985, '3656882366', NULL, 'Male', '2021-01-01 00:00:00', NULL, NULL, 'user2-160x160.jpg', 'images.jpg', 'backend.PNG', 1, '2021-01-11 13:39:02', '2021-01-11 13:39:02');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `courier_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `order_detail` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `courier_id`, `first_name`, `last_name`, `address`, `order_detail`, `quantity`, `price`, `order_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'james', 'bond', '123', 1, 2, 123, 1, 0, '2021-01-12 12:58:11', '2021-01-12 12:58:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `mobile_number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_id` int(11) DEFAULT 0,
  `referral_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referral_id` bigint(20) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_joining` date DEFAULT NULL,
  `marital_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `store_registered` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_experience` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `total_points` float NOT NULL DEFAULT 0,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` int(11) DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `gender`, `dob`, `mobile_number`, `name`, `email`, `phone`, `restaurant_id`, `referral_code`, `referral_id`, `email_verified_at`, `password`, `remember_token`, `role`, `father_name`, `mother_name`, `city`, `date_joining`, `marital_status`, `photo`, `role_id`, `store_registered`, `address`, `permanent_address`, `work_experience`, `descriptions`, `status`, `total_points`, `avatar`, `provider`, `provider_id`, `facebook_id`, `google_id`, `access_token`, `created_at`, `updated_at`) VALUES
(1, 'Abid', 'Khan', 'admin', 'Male', '2019-07-30', '3006762399', 'Abid khan', 'admin@gmail.com', '3006762399', 0, NULL, NULL, NULL, '$2y$10$KN.rAMuAphwGu1hw6thwv..f66pcysxtYAMypLqhPoGycLq.XpjEa', NULL, 'Admin', 'Rab  Nawaz', NULL, 'Layyah', '2019-07-30', 'Single', NULL, 1, NULL, 'streat#3', 'Streat#4', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-23 15:35:16', '2020-08-03 08:05:20'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, 'Mohammad Asif jalal', 'malangbabaaya@gmail.com', NULL, 0, NULL, NULL, NULL, 'eyJpdiI6IitKd0NmZVN6MldRRGszbklyR1J5cEE9PSIsInZhbHVlIjoieEZpS09icjJ2ZVBOM09NUDFRVlJ0VFMwcGxjOGRhMVlSSUdiSGdKNEthWT0iLCJtYWMiOiI0MWY4ODQwN2I3MTIzYzdhMjkzNDc5NTM4ZmU1OGZlYzQwMjk0ODc4OWIyNjJiNzc4NWFjNWNhZjc4OTgyYzRlIn0=', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '117505295249666334489', NULL, '2021-01-16 07:50:55', '2021-01-16 07:50:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `couriers`
--
ALTER TABLE `couriers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
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
-- AUTO_INCREMENT for table `couriers`
--
ALTER TABLE `couriers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
