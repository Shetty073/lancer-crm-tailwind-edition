-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 12, 2021 at 08:02 AM
-- Server version: 10.4.18-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u399217824_crm_production`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `details`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Lodha Crown', 'Majiwada | 10 Acres | 7 towers | G+23', NULL, '2021-08-12 12:49:58', '2021-08-12 12:53:14', NULL),
(3, 'Lodha Upper Thane', 'Mankoli | 200 acres | 37 towers | G+20', NULL, '2021-08-12 12:51:17', '2021-08-12 12:53:25', NULL),
(4, 'Lodha GB Crown', 'Gaimukh | 3acres | 1 tower | G+20 | Possession: 2023', NULL, '2021-08-12 12:52:54', '2021-08-12 12:53:58', NULL),
(5, 'Lodha Splendora', 'Bhayander Pada | 42 Acres | 21 towers | G + 31 | Possession: 2022/RTMI', NULL, '2021-08-12 12:59:48', '2021-08-12 12:59:48', NULL),
(6, 'Vijay Orovia', 'Waghbil | 18 acres | 8 towers | G+29 | RTMI', NULL, '2021-08-12 13:00:42', '2021-08-12 13:00:42', NULL),
(7, 'ACE Aquaris', 'Kasarvadavli | 20 acres | 2 towers | G+18 | Possession: 2022', NULL, '2021-08-12 13:01:31', '2021-08-12 13:01:31', NULL),
(8, 'ACE Anthurium', 'Kasarvadavli | 20 acres | 2 towers | G+7 | Possession: 2022', NULL, '2021-08-12 13:02:18', '2021-08-12 13:02:18', NULL),
(9, 'Dosti West County', 'Balkum | 105 acres | 7 towers | G+30', NULL, '2021-08-12 13:03:10', '2021-08-12 13:03:10', NULL),
(10, 'Kalparatu Paramount', 'Balkum | 60 acres | 5 towers | G+33 | Possession: T1,T2 -Mid 2022/T4,T5- Mid 2024', NULL, '2021-08-12 13:04:00', '2021-08-12 13:04:00', NULL),
(11, 'Kalpataru Immensa', 'Kolshet | 8 acres | 8 towers | G+42 | Possession: 2024', NULL, '2021-08-12 13:04:44', '2021-08-12 13:04:44', NULL),
(12, 'Kalpataru Starlight', 'Kolshet | 10 acres | 10 towers | G+50 | Possession: 2026', NULL, '2021-08-12 13:05:22', '2021-08-12 13:05:22', NULL),
(13, 'Vihaang Eco Homes', 'Kasarvadavli | 3 acres | 1 tower | G+18 | Possession: Dec 2022', NULL, '2021-08-12 13:06:11', '2021-08-12 13:06:11', NULL),
(14, 'Vihaang Vermont', 'Kasarvadavli | 2 acres | 2 towers | G+30 | Possession: Dec 2021', NULL, '2021-08-12 13:06:54', '2021-08-12 13:06:54', NULL),
(15, 'Vihaang Metro Hive', 'Kasarvadavli | 1 acres | 1 tower | G+20 | Possession: Dec-2024', NULL, '2021-08-12 13:08:09', '2021-08-12 13:08:09', NULL),
(16, 'Arihant', 'Thane - Kalyan Bypass | 40 acres | 1+1+4 towers | (N=G+21 Mar-2024, D,D1,D2,F=G+12 2021, D3=G+25 Dec-2023)', NULL, '2021-08-12 13:10:52', '2021-08-12 13:10:52', NULL),
(17, 'Godrej Exquisite', 'Wagbil Naka | 3.61 acres | 3 towers | G+4 Podium + 32 | Possession: Sep-2024', NULL, '2021-08-12 13:11:42', '2021-08-12 13:11:42', NULL),
(18, 'Godrej Emerald', 'Bhayandar Pada | 4.60 acres | 7 towers | G+4 Podium + 24 | Possession: Dec-2024', NULL, '2021-08-12 13:12:38', '2021-08-12 13:12:38', NULL),
(19, 'Damji Shamji - Mahavir Spring', 'Pokhran No 2 | 3.25 Acres | 2 towers | G+3 Podium + 38 | Dec-2024', NULL, '2021-08-12 13:13:32', '2021-08-12 13:13:32', NULL),
(20, 'Raymond', 'pokhran road no. 1 Cadburry junction | 14 acres | 10 towers | G+42 | Possession: Dec-2022, Dec-2023, April-2024', NULL, '2021-08-12 13:14:26', '2021-08-12 13:15:06', NULL),
(21, 'Shapurji Pallonji - Northern Lights', 'Pokhran road no. 2 opp. tcs office | 4.8 acres | 5 towers | 7 Podium + 43 | Possession: Dec 2024', NULL, '2021-08-12 13:16:18', '2021-08-12 13:16:18', NULL),
(22, 'Runwal Eirene', 'Balkum, Thane near Dhokali | 5.15 acres | 11 towers | G+34 (June-2023), G+40 (RTMI/June-2023)', NULL, '2021-08-12 13:18:13', '2021-08-12 13:18:13', NULL),
(23, 'Raunak 108', 'Kasarvadawli | 0.75 acres | 1 towers | G+45 | Possession: 2024', NULL, '2021-08-12 13:19:12', '2021-08-12 13:19:12', NULL),
(24, 'Raunak Unnati Woods', 'Kasarvadawli | 1 acres | 3 towers | G+26 | Possession: 2023', NULL, '2021-08-12 13:19:51', '2021-08-12 13:19:51', NULL),
(25, 'Lodha Amara', 'Kolshet Road | 40 acres | 52 towers | G+30 | Possession: March 2023', NULL, '2021-08-12 13:20:34', '2021-08-12 13:20:34', NULL),
(26, 'Lodha Sterling', 'Kolshet Road | 10.5 acres | 4 towers | G+7 | Possession: Jan-2021, Oct 2021', NULL, '2021-08-12 13:21:31', '2021-08-12 13:21:31', NULL),
(27, 'Tata Serien', 'Pokhran Road No. 2 | 7.5 acres | 4 towers | G+2+29 | Possession: RERA: March 2020/ Builder: 2021', NULL, '2021-08-12 13:22:32', '2021-08-12 13:22:32', NULL),
(28, 'Wadhwa / Narang - Wadhwa Courtyard', 'Pokhran Road No. 2 | 7 acres | 7 towers | G+29+basement car park | Possession: RTMI/Oct-2021/Oct-2021', NULL, '2021-08-12 13:23:41', '2021-08-12 13:23:41', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_deleted_by_foreign` (`deleted_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
