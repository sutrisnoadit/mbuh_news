-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2024 at 10:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mbuh_news`
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

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:7:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:11:\"Create News\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:10:\"Store News\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:9:\"Edit News\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:11:\"Update News\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:11:\"Status News\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:18:\"Update Status News\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:5:\"Draft\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}}s:5:\"roles\";a:3:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:11:\"Super Admin\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:3;s:1:\"b\";s:6:\"Writer\";s:1:\"c\";s:3:\"web\";}i:2;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:6:\"Editor\";s:1:\"c\";s:3:\"web\";}}}', 1735676312),
('user-is-online-1', 'b:1;', 1735592556),
('user-is-online-2', 'b:1;', 1735592302),
('user-online-expiration-1', 'O:25:\"Illuminate\\Support\\Carbon\":3:{s:4:\"date\";s:26:\"2024-12-30 21:02:37.239620\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}', 1735592556),
('user-online-expiration-2', 'O:25:\"Illuminate\\Support\\Carbon\":3:{s:4:\"date\";s:26:\"2024-12-30 20:58:23.063904\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}', 1735592302);

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
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `views` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `created_at`, `updated_at`, `name`, `views`) VALUES
(2, '2024-12-30 12:24:31', '2024-12-30 13:50:36', 'MOTO GP', 35),
(3, '2024-12-30 13:48:34', '2024-12-30 13:51:36', 'Science', 3);

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
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `device_id` char(36) NOT NULL,
  `news_id` bigint(20) UNSIGNED NOT NULL,
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_07_06_092450_create_category_table', 1),
(5, '2024_07_06_092452_create_news_table', 1),
(6, '2024_07_15_113208_create_notifications_table', 1),
(7, '2024_07_17_094555_create_permission_tables', 1),
(8, '2024_07_28_215028_create_likes_table', 1);

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
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `views` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `created_at`, `updated_at`, `title`, `content`, `image`, `status`, `user_id`, `category_id`, `views`) VALUES
(1, '2024-12-30 12:25:15', '2024-12-30 12:26:31', 'Marc Marquez Ikut Terseret Saat Francesco Bagnaia Membuat Sebuah Klaim Usai Gagal Juarai MotoGP 2024', '<p><br><strong>BOLASPORT.COM - Pembalap Ducati, Francesco Bagnaia, menyoroti sepak terjangnya kembali pada MotoGP 2024 di mana dia harus gagal untuk bisa mempertahankan gelar juara dunianya.</strong></p><p>Francesco Bagnaia sebagai tumpuan utama tim pabrikan Ducati di kelas MotoGP harus menuntaskan musim 2024 dengan hasil yang tidak seperti apa yang diharapkan.</p><p>Rider berkebangsaan Italia tersebut tidak berhasil memenuhi ambisinya untuk menjadi juara dunia MotoGP dalam tiga musim secara berturut-turut.</p><p>Usai merajai pada tahun 2022 dan 2023, Bagnaia dibuat tidak berdaya oleh penampilan gemilang Jorge Martin dari tim Pramac Racing yang menggulinya 10 poin di akhir musim.</p><p>Kalah saing dari Martin yang merupakan pembalap dari tim satelit Ducati tentu menjadi hal yang mengecewakan bagi pembalap berusia 27 tahun itu.</p>', 'bdxHwdq9xro1t63MixHm8yhCwVDKDiVSrn4NgId8.jpg', 'Accept', 1, 2, 0),
(2, '2024-12-30 12:26:20', '2024-12-30 12:40:56', 'Jorge Martin: Gelar Juaraku dengan Pramac Akan Sulit Terulang  Baca artikel detiksport, \"Jorge Martin: Gelar Juaraku dengan Pramac Akan Sulit Terulang\"', '<p><span style=\"background-color:rgb(255,255,255);color:rgb(0,0,0);\">Jakarta - Luca Marini mendukung Francesco Bagnaia mengalahkan Marc Marquez di 2025. Bagnaia akan layak disejajarkan dengan rider-rider terhebat dalam sejarah MotoGP.</span><br><span style=\"background-color:rgb(255,255,255);color:rgb(0,0,0);\">Tantangan sekaligus tekanan superbesar dihadapi Bagnaia setelah juara dunia back to back, lalu jadi runner-up dengan perkasa. Pebalap Ducati pabrikan itu akan bertarung secara setara melawan Marquez, tandemnya sendiri sekaligus juara dunia delapan kali.</span><br><br><span style=\"background-color:rgb(255,255,255);color:rgb(0,0,0);\">&nbsp;</span></p>', 'A6wwQjKCuQJA6poH0kVTMzRakX76Ur0HQcbFyUUz.jpg', 'Accept', 1, 2, 3),
(4, '2024-12-30 13:50:09', '2024-12-30 13:50:30', 'Why NASA Is Tracking The \'Dent\' In Earth\'s Magnetic Field', '<p>NASA scientists have been studying a mysterious \"dent\" in the Earth\'s magnetic field.</p><p>When the sun expels solar material, it is the Earth\'s magnetic field that protects the planet by repelling and trapping the charged particles. But there is a spot in the magnetic field over South America and the Atlantic Ocean where the magnetic field dips closer to the surface.</p><p>In other words, there is a \"dent\" in the Earth’s protective shield and its called the South Atlantic Anomaly (SAA).</p><p>The solar material that gets trapped in the Earth\'s magnetosphere reside in two donut-shaped belts surrounding the planet called the Van Allen Belts, the innermost belt of which being 400 miles from the surface. At this distance, the particle radiation is safely away from the surface of the Earth and the satellites around it. However, because of the difference between the Earth\'s rotational and magnetic poles and the SAA, some particles from the belt get to reach closer to the surface.</p><p>This could be problematic for future satellites that will be deployed in low-Earth orbit. Already, instruments such as the Global Ecosystem Dynamics Investigation mission on the International Space Station are being affected by the SAA, causing detector \"blips\" about once a month.</p><p>Hence, ensuring the safety of future satellites is one of the goals of scientists that are consistently tracking the SAA. Observations and information on SAA can help inform satellite design so as to make sure they will not suffer glitches, or worse, permanent damage if they happen to travel through the SAA.</p><p>\"Even though the SAA is slow-moving, it is going through some change in morphology, so it\'s also important that we keep observing it by having continued missions,\" a geophysicist at NASA\'s Goddard Space Flight Center, Terry Sabaka, said in a NASA feature. \"Because that\'s what helps us make models and predictions.\"</p>', 'F1ngmJXGH4EKvmsYzBs7pFHaDr9j54aGQMeAsj3c.png', 'Accept', 1, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `created_at`, `updated_at`, `data`, `read_at`, `user_id`) VALUES
(1, '2024-12-30 12:26:31', '2024-12-30 13:39:52', 'Marc Marquez Ikut Terseret Saat Francesco Bagnaia Membuat Sebuah Klaim Usai Gagal Juarai MotoGP 2024 has been updated to Accept', '2024-12-30 13:39:52', 1),
(2, '2024-12-30 12:26:36', '2024-12-30 13:45:21', 'Jorge Martin: Gelar Juaraku dengan Pramac Akan Sulit Terulang  Baca artikel detiksport, \"Jorge Martin: Gelar Juaraku dengan Pramac Akan Sulit Terulang\" has been updated to Accept', '2024-12-30 13:45:21', 1),
(3, '2024-12-30 12:34:45', '2024-12-30 13:45:19', 'Michael Bisping predicts four new UFC champions by end of 2025 has been updated to Accept', '2024-12-30 13:45:19', 1),
(4, '2024-12-30 13:50:30', '2024-12-30 13:54:23', 'Why NASA Is Tracking The \'Dent\' In Earth\'s Magnetic Field has been updated to Accept', '2024-12-30 13:54:23', 1),
(5, '2024-12-30 13:54:34', '2024-12-30 13:54:34', 'asfasf has been updated to Reject', NULL, 2),
(6, '2024-12-30 13:54:51', '2024-12-30 13:54:51', 'asfasf has been updated to Reject', NULL, 2),
(7, '2024-12-30 13:55:40', '2024-12-30 13:55:52', 'asfasf has been updated to Accept', '2024-12-30 13:55:52', 2),
(8, '2024-12-30 13:57:06', '2024-12-30 13:57:06', 'wwewe has been created.', NULL, 2),
(9, '2024-12-30 13:57:19', '2024-12-30 13:58:05', 'wwewe has been updated to Accept', '2024-12-30 13:58:05', 1);

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Create News', 'web', '2024-12-30 12:22:50', '2024-12-30 12:22:50'),
(2, 'Store News', 'web', '2024-12-30 12:22:50', '2024-12-30 12:22:50'),
(3, 'Edit News', 'web', '2024-12-30 12:22:50', '2024-12-30 12:22:50'),
(4, 'Update News', 'web', '2024-12-30 12:22:50', '2024-12-30 12:22:50'),
(5, 'Status News', 'web', '2024-12-30 12:22:50', '2024-12-30 12:22:50'),
(6, 'Update Status News', 'web', '2024-12-30 12:22:50', '2024-12-30 12:22:50'),
(7, 'Draft', 'web', '2024-12-30 12:22:50', '2024-12-30 12:22:50');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2024-12-30 12:22:50', '2024-12-30 12:22:50'),
(2, 'Editor', 'web', '2024-12-30 12:22:50', '2024-12-30 12:22:50'),
(3, 'Writer', 'web', '2024-12-30 12:22:50', '2024-12-30 12:22:50');

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
(1, 1),
(1, 3),
(2, 1),
(2, 3),
(3, 1),
(3, 3),
(4, 1),
(4, 3),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 3);

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
('AbcJHR73Tq32d58ocm4xpQekKEXR3DVSIEbL8vBp', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMFRMYzFFNEd5ZmVZMnR0TXBldVVQV25OMEhqMG5wWlBHM2dTNDdLaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMS9ub3RpZmljYXRpb25zL2ZldGNoIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1735587286),
('E1vnxYWPIN8RtVmcJDwThQmW50iYoUTPwu81epCs', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSGkzbDZlNHEwcjR1MlkyOUlxeEdrM0d6alAwaVZ2dGhxYVVPUEFXZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMS9ub3RpZmljYXRpb25zL2ZldGNoIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1735592243),
('MPcWWXLK6tZlelXDHEtecHHabiacLSMGoxie6YR1', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTXQ5OVZTcFNReDNHN0k1QlVWYW40Y3EzN0tlT0F5RjVqZU0xclp4RyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMS9ub3RpZmljYXRpb25zL2ZldGNoIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJkZXZpY2VfaWQiO3M6MzY6ImI0MjE4MWY0LWQxM2ItNGNlNy05Y2I5LTA5NGIxYmE1ZTZmZiI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1735592497),
('PbRKszpOHT2APVqFwkUjSxLdxEUzMLmGmMbAq2Va', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUXRpS1lJRGtXQzhRdmJZalk3NzhoRGRKcGR0WDRUNGk1b0N4aTF4eCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMS9uZXdzLzEvY2F0ZWdvcnkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735589204);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `last_seen` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `bio`, `image`, `deleted_at`, `last_seen`) VALUES
(1, 'Sutrisno  Adit Pratama', 'admin@gmail.com', NULL, '$2y$12$pqaSA.a1AKO8VQ5g6eVCDOAS6Z9h.YBqltmThZa6WSshWSSi3qQIC', NULL, '2024-12-30 12:22:50', '2024-12-30 13:53:22', 'saya suka makan nasi', NULL, NULL, '2024-12-30 14:01:37'),
(2, 'test sekarang', 'sutrisnoadit0@gmail.com', NULL, '$2y$12$t2CO3oKH1DPeU6pyQPNdke5fqfw293fnFQ7iViuQScHAD2qN4ATBa', NULL, '2024-12-30 13:53:53', '2024-12-30 13:53:53', NULL, NULL, NULL, '2024-12-30 13:57:23');

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
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name_unique` (`name`);

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
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_news_id_foreign` (`news_id`);

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
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_user_id` (`user_id`),
  ADD KEY `news_category_id` (`category_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_id` (`user_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `news_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

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
