-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2024 at 09:39 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yurbanweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `constituency`
--

CREATE TABLE `constituency` (
  `id` int(10) UNSIGNED NOT NULL,
  `county_id` int(10) UNSIGNED NOT NULL,
  `constituency` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `constituency`
--

INSERT INTO `constituency` (`id`, `county_id`, `constituency`) VALUES
(1, 1, 'Changamwe'),
(2, 1, 'Jomvu'),
(3, 1, 'Kisauni'),
(4, 1, 'Nyali'),
(5, 1, 'Likoni'),
(6, 1, 'Mvita'),
(7, 2, 'Msambweni'),
(8, 2, 'Lunga Lunga'),
(9, 2, 'Matuga'),
(10, 2, 'Kinango'),
(11, 3, 'Kilifi North'),
(12, 3, 'Kilifi South'),
(13, 3, 'Kaloleni'),
(14, 3, 'Rabai'),
(15, 3, 'Ganze'),
(16, 3, 'Malindi'),
(17, 3, 'Magarini'),
(18, 4, 'Garsen'),
(19, 4, 'Galole'),
(20, 4, 'Bura'),
(21, 5, 'Lamu East'),
(22, 5, 'Lamu West'),
(23, 6, 'Taveta'),
(24, 6, 'Wundanyi'),
(25, 6, 'Mwatate'),
(26, 6, 'Voi'),
(27, 7, 'Dujis'),
(28, 7, 'Balambala'),
(29, 7, 'Lagdera'),
(30, 7, 'Dadaab'),
(31, 7, 'Fafi'),
(32, 7, 'Ijara'),
(33, 8, 'Wajir North'),
(34, 8, 'Wajir East'),
(35, 8, 'Tarbaj'),
(36, 8, 'Wajir West'),
(37, 8, 'Eldas'),
(38, 8, 'Wajir South'),
(39, 9, 'Mandera West'),
(40, 9, 'Banissa'),
(41, 9, 'Mandera North'),
(42, 9, 'Mandera South'),
(43, 9, 'Mandera East'),
(44, 9, 'Lafey'),
(45, 10, 'Moyale'),
(46, 10, 'North Horr'),
(47, 10, 'Saku'),
(48, 10, 'Laisamis'),
(49, 11, 'Isiolo North'),
(50, 11, 'Isiolo South'),
(51, 12, 'Igembe South'),
(52, 12, 'Igembe Central'),
(53, 12, 'Igembe North'),
(54, 12, 'Tigania West'),
(55, 12, 'Tigania East'),
(56, 12, 'North Imenti'),
(57, 12, 'Buuri'),
(58, 12, 'Cental Imenti'),
(59, 12, 'South Imenti'),
(60, 13, 'Maara'),
(61, 13, 'Chuka/Igambang\'om'),
(62, 13, 'Tharaka'),
(63, 14, 'Manyatta'),
(64, 14, 'Runyenjes'),
(65, 14, 'Mbeere South'),
(66, 14, 'Mbeere North'),
(67, 15, 'Mwingi North'),
(68, 15, 'Mwingi West'),
(69, 15, 'Mwingi East'),
(70, 15, 'Kitui West'),
(71, 15, 'Kitui Rural'),
(72, 15, 'Kitui Central'),
(73, 15, 'Kitui East'),
(74, 15, 'Kitui South'),
(75, 16, 'Masinga'),
(76, 16, 'Yatta'),
(77, 16, 'Kangundo'),
(78, 16, 'Matungulu'),
(79, 16, 'Kathiani'),
(80, 16, 'Mavoko'),
(81, 16, 'Machakos Town'),
(82, 16, 'Mwala'),
(83, 17, 'Mbooni'),
(84, 17, 'Kilome'),
(85, 17, 'Kaiti'),
(86, 17, 'Makueni'),
(87, 17, 'Kibwezi West'),
(88, 17, 'Kibwezi East'),
(89, 18, 'Kinangop'),
(90, 18, 'Kipipiri'),
(91, 18, 'Ol Kalou'),
(92, 18, 'Ol Jorok'),
(93, 18, 'Ndaragwa'),
(94, 19, 'Tetu'),
(95, 19, 'Kieni'),
(96, 19, 'Mathira'),
(97, 19, 'Othaya'),
(98, 19, 'Mukurweni'),
(99, 19, 'Nyeri Town'),
(100, 20, 'Mwea'),
(101, 20, 'Gichugu'),
(102, 20, 'Ndia'),
(103, 20, 'Kirinyaga Central'),
(104, 21, 'Kangema'),
(105, 21, 'Mathioya'),
(106, 21, 'Kiharu'),
(107, 21, 'Kigumo'),
(108, 21, 'Maragwa'),
(109, 21, 'Kandara'),
(110, 21, 'Gatanga'),
(111, 22, 'Gatundu South'),
(112, 22, 'Gatundu North'),
(113, 22, 'Juja'),
(114, 22, 'Thika Town'),
(115, 22, 'Ruiru'),
(116, 22, 'Githunguri'),
(117, 22, 'Kiambu'),
(118, 22, 'Kiambaa'),
(119, 22, 'Kabete'),
(120, 22, 'Kikuyu'),
(121, 22, 'Limuru'),
(122, 22, 'Lari'),
(123, 23, 'Turkana North'),
(124, 23, 'Turkana West'),
(125, 23, 'Turkana Central'),
(126, 23, 'Loima'),
(127, 23, 'Turkana South'),
(128, 23, 'Turkana East'),
(129, 24, 'Kapenguria'),
(130, 24, 'Sigor'),
(131, 24, 'Kacheliba'),
(132, 24, 'Pokot South'),
(133, 25, 'Samburu West'),
(134, 25, 'Samburu North'),
(135, 25, 'Samburu East'),
(136, 26, 'Kwanza'),
(137, 26, 'Endebess'),
(138, 26, 'Saboti'),
(139, 26, 'Kiminini'),
(140, 26, 'Cherangany'),
(141, 27, 'Soy'),
(142, 27, 'Turbo'),
(143, 27, 'Moiben'),
(144, 27, 'Ainabkoi'),
(145, 27, 'Kapseret'),
(146, 27, 'Kesses'),
(147, 28, 'Marakwet East'),
(148, 28, 'Marakwet West'),
(149, 28, 'Keiyo North'),
(150, 28, 'Keiyo South'),
(151, 29, 'Tinderet'),
(152, 29, 'Aldai'),
(153, 29, 'Nandi Hills'),
(154, 29, 'Chesumei'),
(155, 29, 'Emgwen'),
(156, 29, 'Mosop'),
(157, 30, 'Tiaty'),
(158, 30, 'Baringo North'),
(159, 30, 'Baringo Central'),
(160, 30, 'Baringo South'),
(161, 30, 'Mogotio'),
(162, 30, 'Eldama Ravine'),
(163, 31, 'Laikipia West'),
(164, 31, 'Laikipia East'),
(165, 31, 'Laikipia North'),
(166, 32, 'Molo'),
(167, 32, 'Njoro'),
(168, 32, 'Naivasha'),
(169, 32, 'Gilgil'),
(170, 32, 'Kuresoi South'),
(171, 32, 'Kuresoi North'),
(172, 32, 'Subukia'),
(173, 32, 'Rongai'),
(174, 32, 'Bahati'),
(175, 32, 'Nakuru Town West'),
(176, 32, 'Nakuru Town East'),
(177, 33, 'Kilgoris'),
(178, 33, 'Emurua Dikirr'),
(179, 33, 'Narok North'),
(180, 33, 'Narok East'),
(181, 33, 'Narok South'),
(182, 33, 'Narok West'),
(183, 34, 'Kajiado North'),
(184, 34, 'Kajiado Central'),
(185, 34, 'Kajiado East'),
(186, 34, 'Kajiado West'),
(187, 34, 'Kajiado South'),
(188, 35, 'Kipkelion East'),
(189, 35, 'Kipkelion West'),
(190, 35, 'Ainamoi'),
(191, 35, 'Bureti'),
(192, 35, 'Belgut'),
(193, 35, 'Sigowet/Soin'),
(194, 36, 'Sotik'),
(195, 36, 'Chepalungu'),
(196, 36, 'Bomet East'),
(197, 36, 'Bomet Central'),
(198, 36, 'Konoin'),
(199, 37, 'Lugari'),
(200, 37, 'Likuyani'),
(201, 37, 'Malava'),
(202, 37, 'Lurambi'),
(203, 37, 'Navakholo'),
(204, 37, 'Mumias West'),
(205, 37, 'Mumias East'),
(206, 37, 'Matungu'),
(207, 37, 'Butere'),
(208, 37, 'Khwisero'),
(209, 37, 'Shinyalu'),
(210, 37, 'Ikolomani'),
(211, 38, 'Vihiga'),
(212, 38, 'Sabatia'),
(213, 38, 'Hamisi'),
(214, 38, 'Luanda'),
(215, 38, 'Emuhaya'),
(216, 39, 'Mt. Elgon'),
(217, 39, 'Sirisia'),
(218, 39, 'Kabuchai'),
(219, 39, 'Bumula'),
(220, 39, 'Kanduyi'),
(221, 39, 'Webuye East'),
(222, 39, 'Webuye West'),
(223, 39, 'Kimilili'),
(224, 39, 'Tongaren'),
(225, 40, 'Teso North'),
(226, 40, 'Teso South'),
(227, 40, 'Nambale'),
(228, 40, 'Matayos'),
(229, 40, 'Butula'),
(230, 40, 'Funyula'),
(231, 40, 'Budalangi'),
(232, 41, 'Ugenya'),
(233, 41, 'Ugunja'),
(234, 41, 'Alego Usonga'),
(235, 41, 'Gem'),
(236, 41, 'Bondo'),
(237, 41, 'Rarieda'),
(238, 42, 'Kisumu East'),
(239, 42, 'Kisumu West'),
(240, 42, 'Kisumu Central'),
(241, 42, 'Seme'),
(242, 42, 'Nyando'),
(243, 42, 'Muhoroni'),
(244, 42, 'Nyakach'),
(245, 43, 'Kasipul'),
(246, 43, 'Kabondo Kasipul'),
(247, 43, 'Karachuonyo'),
(248, 43, 'Rangwe'),
(249, 43, 'Homa Bay Town'),
(250, 43, 'Ndhiwa'),
(251, 43, 'Suba North'),
(252, 43, 'Suba South'),
(253, 44, 'Rongo'),
(254, 44, 'Awendo'),
(255, 44, 'Suna East'),
(256, 44, 'Suna West'),
(257, 44, 'Uriri'),
(258, 44, 'Nyatike'),
(259, 44, 'Kuria West'),
(260, 44, 'Kuria East'),
(261, 45, 'Bonchari'),
(262, 45, 'South Mugirango'),
(263, 45, 'Bomachoge Borabu'),
(264, 45, 'Bobasi'),
(265, 45, 'Bomachoge Chache'),
(266, 45, 'Nyaribari Masaba'),
(267, 45, 'Nyaribari Chache'),
(268, 45, 'Kitutu Chache North'),
(269, 45, 'Kitutu Chache South'),
(270, 46, 'Kitutu Masaba'),
(271, 46, 'West Mugirango'),
(272, 46, 'North Mugirango'),
(273, 46, 'Borabu'),
(274, 47, 'Westlands'),
(275, 48, 'Dagoreti North'),
(276, 47, 'Dagoretti South'),
(277, 47, 'Langata'),
(278, 47, 'Kibra'),
(279, 47, 'Roysambu'),
(280, 47, 'Kasarani'),
(281, 47, 'Ruaraka'),
(282, 47, 'Embakasi South'),
(283, 47, 'Embakasi North'),
(284, 47, 'Embakasi Central'),
(285, 47, 'Embakasi East'),
(286, 48, 'Embakasi West'),
(287, 48, 'Makadara'),
(288, 48, 'Kamukunji'),
(289, 48, 'Starehe'),
(290, 48, 'Mathare');

-- --------------------------------------------------------

--
-- Table structure for table `counties`
--

CREATE TABLE `counties` (
  `id` int(10) UNSIGNED NOT NULL,
  `county_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `counties`
--

INSERT INTO `counties` (`id`, `county_name`) VALUES
(1, 'Mombasa'),
(2, 'Kwale'),
(3, 'Kilifi'),
(4, 'Tana River'),
(5, 'Lamu'),
(6, 'Taita Taveta'),
(7, 'Garissa'),
(8, 'Wajir'),
(9, 'Mandera'),
(10, 'Marsabit'),
(11, 'Isiolo'),
(12, 'Meru'),
(13, 'Tharaka-Nith'),
(14, 'Embu'),
(15, 'Kitui'),
(16, 'Machakos'),
(17, 'Makueni'),
(18, 'Nyandarua'),
(19, 'Nyeri'),
(20, 'Kirinyaga'),
(21, 'Murang\'a'),
(22, 'Kiambu'),
(23, 'Turkana'),
(24, 'West Pokot'),
(25, 'Samburu'),
(26, 'Trans Nzoia'),
(27, 'Uasin Gishu'),
(28, 'Elgeyo-Mara'),
(29, 'Nandi'),
(30, 'Baringo'),
(31, 'Laikipia'),
(32, 'Nakuru'),
(33, 'Narok'),
(34, 'Kajiado'),
(35, 'Kericho'),
(36, 'Bomet'),
(37, 'Kakamega'),
(38, 'Vihiga'),
(39, 'Bungoma'),
(40, 'Busia'),
(41, 'Siaya'),
(42, 'Kisumu'),
(43, 'Homa Bay'),
(44, 'Migori'),
(45, 'Kisii'),
(46, 'Nyamira'),
(47, 'Nairobi');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

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
-- Table structure for table `ridetable`
--

CREATE TABLE `ridetable` (
  `id` int(255) NOT NULL,
  `date` datetime NOT NULL,
  `Customerid` int(255) NOT NULL,
  `CustomerPhone` varchar(255) NOT NULL,
  `CustomerFirstname` varchar(255) NOT NULL,
  `CustomerLastname` varchar(255) NOT NULL,
  `PickLocation` varchar(255) NOT NULL,
  `DropLocation` varchar(255) NOT NULL,
  `Passagers` int(255) NOT NULL,
  `DriverId` int(255) DEFAULT 0,
  `DriverFirstname` varchar(255) DEFAULT 'awaiting',
  `DriverLastname` varchar(255) DEFAULT 'awaiting',
  `DriverPhone` varchar(255) DEFAULT 'awaiting',
  `status` varchar(255) NOT NULL COMMENT 'reject or accept'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ridetable`
--

INSERT INTO `ridetable` (`id`, `date`, `Customerid`, `CustomerPhone`, `CustomerFirstname`, `CustomerLastname`, `PickLocation`, `DropLocation`, `Passagers`, `DriverId`, `DriverFirstname`, `DriverLastname`, `DriverPhone`, `status`) VALUES
(1, '2024-11-02 08:07:10', 10, '788888383', 'Julius', 'Ngetich', 'eldoret', 'nairobi', 4, 12, 'kevin', 'thebruine', '0756566', 'Rejected'),
(2, '2024-11-03 08:30:33', 10, '788888383', 'Julius', 'Ngetich', 'Nairobi CBD', 'Limuru', 3, 12, 'kevin', 'thebruine', '08578585', 'Rejected'),
(4, '2024-11-03 10:39:12', 10, '788888383', 'Julius', 'Ngetich', 'Machakos', 'Kitui', 6, 12, 'kevin', 'thebruine', '72973867', 'accepted'),
(5, '2024-11-03 10:42:36', 10, '788888383', 'Julius', 'Ngetich', 'Meru', 'Chuka', 5, 12, 'kevin', 'thebruine', '72973867', 'accepted'),
(6, '2024-11-03 11:13:10', 10, '788888383', 'Julius', 'Ngetich', 'Kisumu', 'Kakamega', 12, 12, 'kevin', 'thebruine', '72973867', 'accepted'),
(7, '2024-11-03 12:19:30', 10, '788888383', 'Julius', 'Ngetich', 'Kiambu', 'westland', 1, 12, 'kevin', 'thebruine', '72973867', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
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
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('A3WK7L70zQbYj2pvSGadElRPUd7pXnaJKIOOCtD3', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoialhxd3JIZHNQSHY1VzFYRVpTNVhCRUZhUUx0Q1FBUUozcnpqakFNYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZGRkcml2ZXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1730621481),
('boTzWmCL2tVLsAvUKZQYVJtWhVBzyT9k37IOEBM9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic25jcmJ5aXhkZmkzYkttZENyNDZZbFhZSHZidDV0VGFvOVE2d05TYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1730549416),
('hf9J35opGDzWvl0ntaUJusMIswiR8YAATxGeKqMX', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUW1lQURmaGZNSXlpTk1pNFF5U2pFd0NmYTdSSElsM2VMYTA2bk1sQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1730552456),
('q2rUa7uczqkjATHeZwGbvj9WV1WkTIuKb99oEAts', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYnFIUXhkVHJ5VXUzUlBucWhTVUxkMFNXOWk1OW5hYmJwcFhraHg5ZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1730573289),
('x3hvofVmNCSvUDl7AUEly0Id1dzati1XBKiPe1G2', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTHJuOXNWZ0hQdmg2eDRCUHU0cmpnRGpWeWpMSHlrd2I5RWYwMjZhZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jdXN0b21lcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1730640049);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `yurbanuser`
--

CREATE TABLE `yurbanuser` (
  `id` int(255) NOT NULL,
  `date` datetime DEFAULT NULL,
  `nationaid` int(255) DEFAULT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phonenumber` int(12) NOT NULL,
  `role` varchar(255) NOT NULL,
  `county` int(255) NOT NULL,
  `subcounty` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `driverstatus` varchar(255) DEFAULT NULL,
  `pass1` int(50) NOT NULL,
  `pass2` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `yurbanuser`
--

INSERT INTO `yurbanuser` (`id`, `date`, `nationaid`, `firstname`, `lastname`, `phonenumber`, `role`, `county`, `subcounty`, `email`, `gender`, `driverstatus`, `pass1`, `pass2`) VALUES
(2, NULL, 43406945, 'chamgei', 'fm', 73467743, '1', 1, 2, 'patricknyisang@gmail.com', '', NULL, 1234, 1234),
(6, NULL, 33888438, 'nyisang', 'patrick', 711937102, '1', 1, 2, 'patricknyisang@gmail.com', '', NULL, 1234, 1234),
(8, '2024-10-26 16:28:13', 32182220, 'Jared', 'Kipkemoi', 713536458, '1', 14, 64, 'patricknyisan3g@gmail.com', '', NULL, 1234, 1234),
(10, '2024-11-01 12:28:27', NULL, 'Julius', 'Ngetich', 788888383, '3', 6, 24, 'julius@gmail.com', 'Male', NULL, 1234, 1234),
(12, '2024-11-01 14:42:00', NULL, 'kevin', 'thebruine', 72973867, '2', 11, 50, 'keni@gmail.com', 'Other', 'online', 1234, 1234),
(14, '2024-11-03 11:40:15', NULL, 'James', 'Kamau', 788488444, '2', 1, 2, 'james@kamuu.com', 'Male', 'online', 1234, 1234),
(15, '2024-11-03 11:54:52', NULL, 'peter', 'irungu', 727482732, '2', 22, 120, 'peterirungu92@gmail.com', 'Male', 'online', 1234, 1234),
(16, '2024-11-03 11:55:42', NULL, 'Rose', 'Karanja', 712345678, '2', 4, 18, 'rose@gmail.com', 'Female', 'online', 1234, 1234),
(17, '2024-11-03 12:00:08', NULL, 'jared', 'obulei', 735478456, '2', 12, 56, 'jared@gmail.com', 'Other', 'online', 1234, 1234),
(18, '2024-11-03 12:04:47', NULL, 'Erick', 'omondi', 720304050, '3', 8, 36, 'eric@gmail.com', 'Female', NULL, 1234, 1234),
(19, '2024-11-03 12:05:43', NULL, 'william', 'ruto', 739495969, '3', 18, 91, 'ruto@gmail.com', 'Male', NULL, 1234, 1234),
(20, '2024-11-03 12:06:45', NULL, 'Rigathi', 'Gachagua', 71723456, '3', 19, 96, 'rigathi@gmail.com', 'Male', NULL, 1234, 1234),
(21, '2024-11-03 12:07:34', NULL, 'musalia', 'mudavadi', 738764562, '3', 38, 212, 'musalia@gmail.com', 'Female', NULL, 1234, 1234),
(22, '2024-11-03 12:08:21', NULL, 'dani', 'olmo', 784536582, '3', 5, 21, 'dani@gmail.com', 'Male', NULL, 1234, 1234),
(23, '2024-11-03 12:09:14', NULL, 'mary', 'mwende', 877374345, '3', 16, 78, 'mary@gmail.com', 'Female', NULL, 1234, 1234);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `counties`
--
ALTER TABLE `counties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `ridetable`
--
ALTER TABLE `ridetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `yurbanuser`
--
ALTER TABLE `yurbanuser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phonenumber` (`phonenumber`),
  ADD UNIQUE KEY `pid` (`nationaid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `counties`
--
ALTER TABLE `counties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ridetable`
--
ALTER TABLE `ridetable`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `yurbanuser`
--
ALTER TABLE `yurbanuser`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
