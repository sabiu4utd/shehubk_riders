-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 19, 2026 at 09:21 AM
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
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE IF NOT EXISTS `locations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `location` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `latitude` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `longitude` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=110 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location`, `latitude`, `longitude`) VALUES
(1, 'Waziri Umaru Federal Polytechnic (WUFPBK)', '12.4527', '4.1996'),
(2, 'Federal Medical Centre (FMC) Birnin Kebbi', '12.4582', '4.2065'),
(3, 'Kebbi State Government House', '12.457', '4.199'),
(4, 'Central Mosque Birnin Kebbi', '12.4535', '4.197'),
(5, 'Birnin Kebbi Central Market', '12.4548', '4.1985'),
(6, 'Sir Ahmadu Bello International Airport', '12.479', '4.197'),
(7, 'Ahmadu Bello Way', '12.4526', '4.1999'),
(8, 'Halliru Abdu Stadium', '12.4581', '4.1932'),
(9, 'Police Headquarter', '12.4462', '4.195'),
(10, 'Yauri Road', '12.4285', '4.2041'),
(11, 'Emir Round About', '12.4511', '4.1947'),
(12, 'Sir Ahmadu Bello College', '12.4695', '4.1843'),
(13, 'Ashmed Hospital', '12.4625', '4.215'),
(14, 'Azbir Arena', '12.4678', '4.2112'),
(15, 'Olumbo Plaza', '12.4532', '4.2005'),
(16, 'School of Nursing', '12.4646', '4.2033'),
(17, 'Sir Yahaya Memorial Hospital', '12.4542', '4.1885'),
(18, 'Fati Lami (Maternity)', '12.455', '4.1891'),
(19, 'Kangiwa Motors', '12.459', '4.1932'),
(20, 'Kebbi Medical Center', '12.4705', '4.2215'),
(21, 'Fidelity Bank', '12.4528', '4.201'),
(22, 'Old Market', '12.4502', '4.1935'),
(23, 'Dan Mama Round About', '12.4556', '4.2045'),
(24, 'Dakin Gari Quarters', '12.443', '4.185'),
(25, 'Badariya Area', '12.475', '4.212'),
(26, 'Gwadan Gwaji Area', '12.482', '4.225'),
(27, 'Marina', '12.438', '4.182'),
(28, 'Birnin Kebbi Mall', '12.4585', '4.2055'),
(29, 'State Secretariat', '12.4655', '4.2185'),
(30, 'Army Barrack', '12.432', '4.175'),
(31, 'Kebbi State Library', '12.4563', '4.1988'),
(32, 'Kebbi State High Court', '12.461', '4.2105'),
(33, 'Kebbi State Polytechnic', '12.4527', '4.1996'),
(34, 'KSUSTA Liaison Office', '12.4535', '4.1975'),
(35, 'Sunshine Hospital', '12.4682', '4.2095'),
(36, 'Al-Ameen Clinic', '12.4615', '4.202'),
(37, 'Hilltop Hospital', '12.469', '4.2155'),
(38, 'Maryam Hospital', '12.4595', '4.196'),
(39, 'Kebbi University Teaching Hospital', '12.478', '4.223'),
(40, 'Nassarawa Clinic', '12.454', '4.1975'),
(41, 'General Hospital Birnin Kebbi', '12.4542', '4.1885'),
(42, 'UBA Bank', '12.453', '4.2015'),
(43, 'GT Bank', '12.4522', '4.2008'),
(44, 'Zenith Bank', '12.4534', '4.2022'),
(45, 'First Bank', '12.4515', '4.1985'),
(46, 'Union Bank', '12.4508', '4.1972'),
(47, 'Access Bank', '12.4538', '4.203'),
(48, 'Eco Bank', '12.4531', '4.2012'),
(49, 'Keystone Bank', '12.46', '4.2'),
(50, 'Jaiz Bank', '12.4605', '4.2005'),
(51, 'Bakin Kasuwa', '12.4545', '4.1975'),
(52, 'Birnin Kebbi Motor Park', '12.44', '4.21'),
(53, 'Aliero Quarters', '12.469', '4.231'),
(54, 'Nassara Quarters', '12.462', '4.1855'),
(55, 'Annoor Motors', '12.44486258', '4.232324333'),
(56, 'Azbir Arena', '12.44318629', '4.2182481'),
(57, 'Shehubk ICT Professionals', '12.45533911', '4.18460247'),
(58, 'Kebbi Capital College', '12.45617722', '4.246658058'),
(59, 'Halliru Abdu Stadium', '12.44243196', '4.186662406'),
(60, 'Safar Guest Inn Limited', '12.45198667', '4.220222206'),
(61, 'Gesse Phase I Jummat Mosque', '12.45743437', '4.222453803'),
(62, 'Azbir Hotels', '12.44226433', '4.21704647'),
(63, 'Peace Exclusive Suit', '12.44444351', '4.223097534'),
(64, 'Plus Center', '12.45035233', '4.228376121'),
(65, 'Aberta Guest Inn', '12.44329226', '4.213739634'),
(66, 'Nakowa Hotel', '12.44744105', '4.224597216'),
(67, 'Motor Park', '12.44098735', '4.209576845'),
(68, 'Dalili Restaurant', '12.44811155', '4.191423655'),
(69, 'Shaaban Super Market', '12.44496855', '4.186531305'),
(70, 'NYSC Zonal Office', '12.45426125', '4.188247919'),
(71, 'Madona Guest Inn', '12.43951011', '4.182969332'),
(72, 'Sunking Store Kebbi North', '12.44940017', '4.192582369'),
(73, 'Old Cemetery', '12.45614699', '4.208418131'),
(74, 'Kebbi College of Nursing ', '12.45765558', '4.205070734'),
(75, 'Kwalliya Super Market', '12.43867195', '4.203697443'),
(76, 'Regal Suite Hotel', '12.44374276', '4.177390337'),
(77, 'Umar Liman Suru Road', '12.44376328', '4.183464579'),
(78, 'Muhammad Abarshi Road', '12.44434629', '4.182889653'),
(79, 'Boyi Dikko Road', '12.44531798', '4.183243453'),
(80, 'Ummaru Yaro Road', '12.44607373', '4.183022328'),
(81, 'Ya\'adu Road', '12.44669992', '4.186792514'),
(82, 'Dr Bello Jummaat Mosque', '12.44504807', '4.187278989'),
(83, 'Bindawa Plaza', '12.44591174', '4.196355986'),
(84, 'Giga Star Computer', '12.44533954', '4.195582067'),
(85, 'Godiya Hospital', '12.44700215', '4.202381499'),
(86, 'Gods Favour Restaurant', '12.44267287', '4.198058608'),
(87, 'Musab Textiles and Wears', '12.43976864', '4.198290784'),
(88, 'Ambar Constructions', '12.44133412', '4.20036931'),
(89, 'Kakale Guest Inn', '12.43961749', '4.215073773'),
(90, 'Nafiu Saidu Estate', '12.43800882', '4.219894183'),
(91, 'Sani Abacha Bye-Pass', '12.44468097', '4.217185466'),
(92, 'AMB Shamaks', '12.44153925', '4.22384117'),
(93, 'Nakowa Hotel', '12.44747718', '4.224139682'),
(94, 'Labana Rice', '12.44639756', '4.235969588'),
(95, 'Shongai Plaza', '12.45197216', '4.231849493'),
(96, 'Nagarta Blocks Industry Limited', '12.45146929', '4.228974165'),
(97, 'Customs Office', '12.46635594', '4.253457369'),
(98, 'Police Headquaters', '12.46368458', '4.252435863'),
(99, 'New State Secretariate', '12.4623227', '4.249034822'),
(100, 'Jamb Office', '12.47102814', '4.248305261'),
(101, 'Kebbi State High Court', '12.47036817', '4.251298606'),
(102, 'Comprehension International School', '12.47652782', '4.254045188'),
(103, 'Oando Filling Station', '12.47883242', '4.257971942'),
(104, 'Musaal Asari', '12.47273567', '4.259806573'),
(105, 'NNPC Filling Station', '12.48297016', '4.263958633'),
(106, 'Labana Rice', '12.44679029', '4.24442646'),
(107, 'WF Hospital', '12.45246858', '4.219642848'),
(108, 'CAERPAC Office', '12.45617722', '4.223998756'),
(109, 'Kebbi City Complex', '12.44735603', '4.218999118');

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
  `ride_id` int NOT NULL AUTO_INCREMENT,
  `rider_id` int NOT NULL,
  `driver_id` int DEFAULT NULL,
  `pickup_address` text NOT NULL,
  `pickup_lat` decimal(9,6) NOT NULL,
  `pickup_lng` decimal(9,6) NOT NULL,
  `destination_address` text NOT NULL,
  `destination_lat` decimal(9,6) NOT NULL,
  `destination_lng` decimal(9,6) NOT NULL,
  `vehicle_type` varchar(30) NOT NULL,
  `number_of_km` decimal(8,2) NOT NULL DEFAULT '0.00',
  `amount` decimal(10,2) NOT NULL,
  `surge_multiplier` decimal(4,2) NOT NULL DEFAULT '1.00',
  `payment_method` varchar(20) NOT NULL DEFAULT 'cash',
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending',
  `status` enum('requested','accepted','arrived','en_route_to_pickup','in_progress','completed','cancelled') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'requested',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estimated_arrival_time` datetime DEFAULT NULL,
  `actual_pickup_time` datetime DEFAULT NULL,
  `dropoff_time` datetime DEFAULT NULL,
  `cancellation_reason` text,
  `cancelled_by` varchar(20) DEFAULT NULL,
  `driver_rating` decimal(2,1) DEFAULT NULL,
  `rider_rating` decimal(2,1) DEFAULT NULL,
  PRIMARY KEY (`ride_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rides_old`
--

DROP TABLE IF EXISTS `rides_old`;
CREATE TABLE IF NOT EXISTS `rides_old` (
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
