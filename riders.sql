-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 27, 2025 at 02:19 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `riders`
--

-- --------------------------------------------------------

--
-- Table structure for table `event_log`
--

DROP TABLE IF EXISTS `event_log`;
CREATE TABLE IF NOT EXISTS `event_log` (
  `event_id` varchar(200) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `event` varchar(100) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `updated_at` timestamp(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  `deleted_at` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` varchar(200) NOT NULL,
  `rider_id` varchar(200) NOT NULL,
  `driver_id` varchar(200) NOT NULL,
  `rides_id` varchar(200) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `payment_channel` enum('Wallet','Card','Cash','Transfer') NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `updated_at` timestamp(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  `deleted_at` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`rider_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pricing`
--

DROP TABLE IF EXISTS `pricing`;
CREATE TABLE IF NOT EXISTS `pricing` (
  `pricing_id` varchar(200) NOT NULL,
  `base_fare` varchar(200) NOT NULL,
  `per_km` varchar(10) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `updated_at` timestamp(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  `deleted_at` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`pricing_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE IF NOT EXISTS `profile` (
  `profile_id` varchar(200) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `surname` varchar(25) NOT NULL,
  `role` enum('Admin','Driver','Rider') NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(65) NOT NULL,
  `address` varchar(200) NOT NULL,
  `dob` varchar(11) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `created_at` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6),
  `updated_at` timestamp(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  `deleted_at` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`profile_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `user_id`, `firstname`, `surname`, `role`, `phone`, `email`, `address`, `dob`, `gender`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
('36f11cdb-e85c-4971-aa05-c4aa34660b86', 'ddd88a4f-addb-432e-aa93-4d924a847216', 'Sabiu', 'Lawali Tsafe', 'Rider', '07067555836', 'sabiu4utd@yahoo.com', 'Dakin Gari Qtrs', '', 'Male', 'Active', '2025-10-24 17:23:01.000000', '2025-10-24 17:23:01.000000', NULL),
('ed01a374-4be4-4fbd-b89d-4c504f24633f', 'eb88f080-ee74-488d-a8e4-ac74f2a2534a', 'Sabiu', 'Lawali Tsafe', 'Driver', '07067555836', 'sabiu.lawal@fubk.edu.ng', 'No 4, Shantali Road, Opposite Birnin Kebbi LGA, M/Gandu Area.  Birnin Kebbi, Kebbi State, Nigeria\r\nNo 4, Shantali Road, Opposite Birnin Kebbi LGA, M/Gandu Area.  Birnin Kebbi, Kebbi State, Nigeria', '', 'Male', 'Active', '2025-10-24 17:23:31.000000', '2025-10-24 18:25:05.399558', NULL),
('16b874f6-c389-478d-8b49-a9cc774f58c4', '1389b103-d7c3-4f8e-91dd-fa59a3d77aff', 'Sabiu', 'Lawali Tsafe', 'Admin', '07067555836', 'sabiu4utd@gmail.com', 'Birnin Kebbi', '', 'Male', 'Active', '2025-10-24 17:25:37.000000', '2025-10-24 18:26:03.716574', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rides`
--

DROP TABLE IF EXISTS `rides`;
CREATE TABLE IF NOT EXISTS `rides` (
  `rides_id` varchar(200) NOT NULL,
  `driver_id` varchar(200) NOT NULL,
  `rider_id` varchar(200) NOT NULL,
  `pickup` varchar(100) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `amount` varchar(11) NOT NULL,
  `payment_method` enum('Card','Wallet','Cash') NOT NULL,
  `status` enum('Completed','Cancelled','Ongoing') NOT NULL,
  `distance` varchar(6) NOT NULL,
  `rating` varchar(6) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `updated_at` timestamp(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  `deleted_at` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`rides_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` varchar(200) NOT NULL,
  `username` varchar(65) NOT NULL,
  `password` varchar(200) NOT NULL,
  `mfactor` enum('No','Yes') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6),
  `updated_at` timestamp(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  `deleted_at` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `mfactor`, `created_at`, `updated_at`, `deleted_at`) VALUES
('eb88f080-ee74-488d-a8e4-ac74f2a2534a', 'sabiu.lawal@fubk.edu.ng', '4dff4ea340f0a823f15d3f4f01ab62eae0e5da579ccb851f8db9dfe84c58b2b37b89903a740e1ee172da793a6e79d560e5f7f9bd058a12a280433ed6fa46510a', 'No', '2025-10-24 17:23:31.000000', '2025-10-24 17:23:31.000000', NULL),
('1389b103-d7c3-4f8e-91dd-fa59a3d77aff', 'sabiu4utd@gmail.com', '4dff4ea340f0a823f15d3f4f01ab62eae0e5da579ccb851f8db9dfe84c58b2b37b89903a740e1ee172da793a6e79d560e5f7f9bd058a12a280433ed6fa46510a', 'No', '2025-10-24 17:25:37.000000', '2025-10-24 17:25:37.000000', NULL),
('ddd88a4f-addb-432e-aa93-4d924a847216', 'sabiu4utd@yahoo.com', '4dff4ea340f0a823f15d3f4f01ab62eae0e5da579ccb851f8db9dfe84c58b2b37b89903a740e1ee172da793a6e79d560e5f7f9bd058a12a280433ed6fa46510a', 'No', '2025-10-24 17:23:01.000000', '2025-10-24 17:23:01.000000', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
CREATE TABLE IF NOT EXISTS `vehicle` (
  `vehicle_id` varchar(200) NOT NULL,
  `driver_id` varchar(200) NOT NULL,
  `plate_number` varchar(100) NOT NULL,
  `year` varchar(6) NOT NULL,
  `color` varchar(25) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `updated_at` timestamp(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  `deleted_at` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`vehicle_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

DROP TABLE IF EXISTS `wallet`;
CREATE TABLE IF NOT EXISTS `wallet` (
  `wallet_id` varchar(200) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `updated_at` timestamp(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  `deleted_at` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`wallet_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wallet_payments`
--

DROP TABLE IF EXISTS `wallet_payments`;
CREATE TABLE IF NOT EXISTS `wallet_payments` (
  `wallet_payment_id` varchar(200) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `updated_at` timestamp(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  `deleted_at` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`wallet_payment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
