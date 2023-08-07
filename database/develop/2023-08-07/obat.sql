-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Aug 07, 2023 at 07:39 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nopan`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_obats`
--

CREATE TABLE `detail_obats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `obat_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `subkriteria_id` bigint(20) UNSIGNED NOT NULL,
  `cost` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `benefit` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_obats`
--

INSERT INTO `detail_obats` (`id`, `obat_id`, `kriteria_id`, `subkriteria_id`, `cost`, `benefit`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '0.00', '1.00', '2023-07-04 20:55:50', '2023-07-07 06:02:18'),
(2, 1, 2, 7, '0.50', '0.50', '2023-07-04 20:55:50', '2023-07-07 06:02:18'),
(3, 1, 3, 11, '0.33', '0.67', '2023-07-04 20:55:50', '2023-07-07 06:02:18'),
(4, 1, 4, 16, '0.67', '0.33', '2023-07-04 20:55:50', '2023-07-07 06:02:18'),
(5, 1, 5, 18, '0.00', '1.00', '2023-07-04 20:55:50', '2023-07-07 06:02:18'),
(6, 2, 1, 1, '0.00', '1.00', '2023-07-04 20:56:07', '2023-07-07 06:02:18'),
(7, 2, 2, 5, '0.00', '1.00', '2023-07-04 20:56:07', '2023-07-07 06:02:18'),
(8, 2, 3, 10, '0.00', '1.00', '2023-07-04 20:56:07', '2023-07-07 06:02:18'),
(9, 2, 4, 14, '0.00', '1.00', '2023-07-04 20:56:07', '2023-07-07 06:02:18'),
(10, 2, 5, 18, '0.00', '1.00', '2023-07-04 20:56:07', '2023-07-07 06:02:18'),
(11, 3, 1, 3, '0.67', '0.33', '2023-07-04 20:56:27', '2023-07-07 06:02:18'),
(12, 3, 2, 8, '0.75', '0.25', '2023-07-04 20:56:27', '2023-07-07 06:02:18'),
(13, 3, 3, 12, '0.67', '0.33', '2023-07-04 20:56:27', '2023-07-07 06:02:18'),
(14, 3, 4, 14, '0.00', '1.00', '2023-07-04 20:56:27', '2023-07-07 06:02:18'),
(15, 3, 5, 18, '0.00', '1.00', '2023-07-04 20:56:27', '2023-07-07 06:02:18'),
(16, 4, 1, 1, '0.00', '1.00', '2023-07-04 20:56:41', '2023-07-07 06:02:18'),
(17, 4, 2, 5, '0.00', '1.00', '2023-07-04 20:56:41', '2023-07-07 06:02:18'),
(18, 4, 3, 11, '0.33', '0.67', '2023-07-04 20:56:41', '2023-07-07 06:02:18'),
(19, 4, 4, 17, '1.00', '0.00', '2023-07-04 20:56:41', '2023-07-07 06:02:18'),
(20, 4, 5, 19, '1.00', '0.00', '2023-07-04 20:56:41', '2023-07-07 06:02:18'),
(21, 5, 1, 4, '1.00', '0.00', '2023-07-04 20:57:00', '2023-07-07 06:02:18'),
(22, 5, 2, 9, '1.00', '0.00', '2023-07-04 20:57:00', '2023-07-07 06:02:18'),
(23, 5, 3, 13, '1.00', '0.00', '2023-07-04 20:57:00', '2023-07-07 06:02:18'),
(24, 5, 4, 14, '0.00', '1.00', '2023-07-04 20:57:00', '2023-07-07 06:02:18'),
(25, 5, 5, 18, '0.00', '1.00', '2023-07-04 20:57:00', '2023-07-07 06:02:18'),
(26, 6, 1, 3, '0', '2', '2023-07-07 23:19:44', '2023-07-15 22:58:08'),
(27, 6, 2, 7, '0', '3', '2023-07-07 23:19:44', '2023-07-15 22:58:08'),
(28, 6, 3, 13, '1', '0', '2023-07-07 23:19:44', '2023-07-15 22:58:08'),
(29, 6, 4, 14, '0', '4', '2023-07-07 23:19:44', '2023-07-15 22:58:08'),
(30, 6, 5, 18, '0', '2', '2023-07-07 23:19:44', '2023-07-15 22:58:08'),
(31, 7, 1, 3, '0', '2', '2023-07-07 23:29:01', '2023-07-15 22:58:22'),
(32, 7, 2, 6, '0', '4', '2023-07-07 23:29:01', '2023-07-15 22:58:22'),
(33, 7, 3, 10, '4', '0', '2023-07-07 23:29:01', '2023-07-15 22:58:22'),
(34, 7, 4, 14, '0', '4', '2023-07-07 23:29:01', '2023-07-15 22:58:22'),
(35, 7, 5, 18, '0', '2', '2023-07-07 23:29:01', '2023-07-15 22:58:22'),
(36, 8, 1, 3, '0', '2', '2023-07-07 23:29:17', '2023-07-16 02:10:23'),
(37, 8, 2, 7, '0', '3', '2023-07-07 23:29:17', '2023-07-16 02:10:23'),
(38, 8, 3, 13, '1', '0', '2023-07-07 23:29:17', '2023-07-16 02:10:23'),
(39, 8, 4, 14, '0', '4', '2023-07-07 23:29:17', '2023-07-16 02:10:23'),
(40, 8, 5, 18, '0', '2', '2023-07-07 23:29:17', '2023-07-16 02:10:23'),
(41, 9, 1, 3, '0', '2', '2023-07-07 23:29:39', '2023-07-16 02:10:49'),
(42, 9, 2, 8, '0', '2', '2023-07-07 23:29:39', '2023-07-16 02:10:49'),
(43, 9, 3, 13, '1', '0', '2023-07-07 23:29:39', '2023-07-16 02:10:49'),
(44, 9, 4, 16, '0', '2', '2023-07-07 23:29:40', '2023-07-16 02:10:49'),
(45, 9, 5, 18, '0', '2', '2023-07-07 23:29:40', '2023-07-16 02:10:49'),
(46, 10, 1, 3, '0', '2', '2023-07-07 23:29:57', '2023-07-16 02:11:15'),
(47, 10, 2, 6, '0', '4', '2023-07-07 23:29:57', '2023-07-16 02:11:15'),
(48, 10, 3, 13, '1', '0', '2023-07-07 23:29:57', '2023-07-16 02:11:15'),
(49, 10, 4, 16, '0', '2', '2023-07-07 23:29:57', '2023-07-16 02:11:16'),
(50, 10, 5, 18, '0', '2', '2023-07-07 23:29:57', '2023-07-16 02:11:16'),
(51, 11, 1, 3, '0', '2', '2023-07-08 03:10:59', '2023-07-16 02:11:26'),
(52, 11, 2, 6, '0', '4', '2023-07-08 03:10:59', '2023-07-16 02:11:26'),
(53, 11, 3, 10, '4', '0', '2023-07-08 03:10:59', '2023-07-16 02:11:26'),
(54, 11, 4, 16, '0', '2', '2023-07-08 03:11:00', '2023-07-16 02:11:26'),
(55, 11, 5, 18, '0', '2', '2023-07-08 03:11:00', '2023-07-16 02:11:26'),
(56, 12, 1, 3, '0', '2', '2023-07-08 03:12:33', '2023-07-16 02:11:38'),
(57, 12, 2, 6, '0', '4', '2023-07-08 03:12:33', '2023-07-16 02:11:38'),
(58, 12, 3, 11, '3', '0', '2023-07-08 03:12:33', '2023-07-16 02:11:38'),
(59, 12, 4, 14, '0', '4', '2023-07-08 03:12:33', '2023-07-16 02:11:38'),
(60, 12, 5, 18, '0', '2', '2023-07-08 03:12:34', '2023-07-16 02:11:39'),
(61, 13, 1, 3, '0', '2', '2023-07-08 03:13:07', '2023-07-16 02:11:47'),
(62, 13, 2, 6, '0', '4', '2023-07-08 03:13:07', '2023-07-16 02:11:47'),
(63, 13, 3, 10, '4', '0', '2023-07-08 03:13:07', '2023-07-16 02:11:47'),
(64, 13, 4, 14, '0', '4', '2023-07-08 03:13:07', '2023-07-16 02:11:47'),
(65, 13, 5, 18, '0', '2', '2023-07-08 03:13:07', '2023-07-16 02:11:47'),
(66, 14, 1, 3, '0', '2', '2023-07-08 03:13:49', '2023-07-16 02:11:57'),
(67, 14, 2, 6, '0', '4', '2023-07-08 03:13:49', '2023-07-16 02:11:57'),
(68, 14, 3, 12, '2', '0', '2023-07-08 03:13:49', '2023-07-16 02:11:57'),
(69, 14, 4, 16, '0', '2', '2023-07-08 03:13:49', '2023-07-16 02:11:57'),
(70, 14, 5, 18, '0', '2', '2023-07-08 03:13:49', '2023-07-16 02:11:57'),
(71, 15, 1, 3, '0', '2', '2023-07-08 03:14:18', '2023-07-16 02:12:05'),
(72, 15, 2, 6, '0', '4', '2023-07-08 03:14:18', '2023-07-16 02:12:05'),
(73, 15, 3, 10, '4', '0', '2023-07-08 03:14:18', '2023-07-16 02:12:05'),
(74, 15, 4, 14, '0', '4', '2023-07-08 03:14:18', '2023-07-16 02:12:05'),
(75, 15, 5, 18, '0', '2', '2023-07-08 03:14:18', '2023-07-16 02:12:05');

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
-- Table structure for table `keluhan`
--

CREATE TABLE `keluhan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keluhan`
--

INSERT INTO `keluhan` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'nyeri ringan', '2023-08-03 03:53:25', '2023-08-03 03:53:25'),
(2, 'nyeri sedang', '2023-08-03 03:54:52', '2023-08-03 03:54:52'),
(3, 'gusi bengkak', '2023-08-03 03:55:06', '2023-08-03 03:55:06'),
(4, 'ekstraksi gigi', '2023-08-03 03:55:27', '2023-08-03 03:55:27'),
(5, 'gigi berluabang', '2023-08-03 03:55:39', '2023-08-03 03:55:39'),
(6, 'komplikasi gigi', '2023-08-03 03:55:48', '2023-08-03 03:55:48');

-- --------------------------------------------------------

--
-- Table structure for table `keluhan_obat`
--

CREATE TABLE `keluhan_obat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `obat_id` bigint(20) UNSIGNED NOT NULL,
  `keluhan_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keluhan_obat`
--

INSERT INTO `keluhan_obat` (`id`, `obat_id`, `keluhan_id`, `created_at`, `updated_at`) VALUES
(1, 6, 3, '2023-08-03 04:01:52', '2023-08-03 04:01:52'),
(2, 7, 1, '2023-08-03 04:02:13', '2023-08-03 04:02:13'),
(3, 7, 2, '2023-08-03 04:02:13', '2023-08-03 04:02:13'),
(4, 13, 1, '2023-08-03 04:02:37', '2023-08-03 04:02:37'),
(5, 13, 2, '2023-08-03 04:02:37', '2023-08-03 04:02:37'),
(6, 12, 4, '2023-08-03 04:03:15', '2023-08-03 04:03:15'),
(7, 11, 6, '2023-08-03 04:03:15', '2023-08-03 04:03:15'),
(8, 8, 5, '2023-08-03 04:03:50', '2023-08-03 04:03:50'),
(9, 10, 3, '2023-08-03 04:03:50', '2023-08-03 04:03:50'),
(10, 14, 3, '2023-08-03 04:04:17', '2023-08-03 04:04:17'),
(11, 9, 1, '2023-08-03 04:04:17', '2023-08-03 04:04:17'),
(12, 9, 2, '2023-08-03 04:04:50', '2023-08-03 04:04:50');

-- --------------------------------------------------------

--
-- Table structure for table `kriterias`
--

CREATE TABLE `kriterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_kriteria` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kriteria` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `normalisasi_bobot` double(8,2) NOT NULL DEFAULT 0.00,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'benefit',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriterias`
--

INSERT INTO `kriterias` (`id`, `kode_kriteria`, `nama_kriteria`, `bobot`, `normalisasi_bobot`, `is_deleted`, `type`, `created_at`, `updated_at`) VALUES
(1, 'C1', 'Dosis', '30', 0.00, 0, 'benefit', '2023-07-04 20:49:27', '2023-07-16 03:05:24'),
(2, 'C2', 'Efek Samping', '25', 0.00, 0, 'benefit', '2023-07-04 20:50:36', '2023-07-16 03:05:37'),
(3, 'C3', 'Harga', '20', 0.00, 0, 'cost', '2023-07-04 20:50:59', '2023-07-16 03:05:45'),
(4, 'C4', 'Bentuk', '15', 0.00, 0, 'benefit', '2023-07-04 20:51:30', '2023-07-16 03:05:53'),
(5, 'C5', 'Usia', '10', 0.00, 0, 'benefit', '2023-07-04 20:51:41', '2023-07-16 03:06:01');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_07_112732_create_kriterias_table', 1),
(6, '2023_05_07_112745_create_subkriterias_table', 1),
(7, '2023_05_07_113232_create_obats_table', 1),
(8, '2023_05_07_115728_create_detail_obats_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `obats`
--

CREATE TABLE `obats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_obat` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_akhir` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '0.00',
  `dosis_dewasa` int(100) NOT NULL,
  `takaran_per_hari` int(10) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `obats`
--

INSERT INTO `obats` (`id`, `kode_obat`, `nilai_akhir`, `dosis_dewasa`, `takaran_per_hari`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'A1', '0.34', 0, 0, 1, '2023-07-04 20:55:50', '2023-07-07 23:12:25'),
(2, 'A2', '0.50', 0, 0, 1, '2023-07-04 20:56:07', '2023-07-07 23:12:28'),
(3, 'A3', '0.65', 0, 0, 1, '2023-07-04 20:56:27', '2023-07-07 23:12:32'),
(4, 'A4', '0.32', 0, 0, 1, '2023-07-04 20:56:41', '2023-07-07 23:12:34'),
(5, 'A5', '0.75', 0, 0, 1, '2023-07-04 20:57:00', '2023-07-07 23:12:37'),
(6, 'Mefinal', '0.125', 1500, 3, 0, '2023-07-07 23:19:44', '2023-07-15 22:58:08'),
(7, 'Antalgin', '0.2', 1500, 3, 0, '2023-07-07 23:29:01', '2023-07-15 22:58:22'),
(8, 'Ponstan', '0.125', 1500, 3, 0, '2023-07-07 23:29:17', '2023-07-16 02:10:23'),
(9, 'Novalgin', '0.4', 1500, 3, 0, '2023-07-07 23:29:39', '2023-07-16 02:10:49'),
(10, 'Kataflam', '0.15', 100, 2, 0, '2023-07-07 23:29:57', '2023-07-16 02:11:15'),
(11, 'Ibuprofen', '0.35', 800, 2, 0, '2023-07-08 03:10:59', '2023-07-16 02:11:26'),
(12, 'Farsifen', '0.13333333333333', 800, 2, 0, '2023-07-08 03:12:33', '2023-07-16 02:11:38'),
(13, 'Fargetix', '0.2', 1500, 3, 0, '2023-07-08 03:13:07', '2023-07-16 02:11:47'),
(14, 'Pamol', '0.21666666666667', 1500, 3, 0, '2023-07-08 03:13:49', '2023-07-16 02:11:57'),
(15, 'Mefenamic', '0.2', 1500, 3, 0, '2023-07-08 03:14:18', '2023-07-16 02:12:05');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subkriterias`
--

CREATE TABLE `subkriterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `nama_subkriteria` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_subkriteria` int(10) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subkriterias`
--

INSERT INTO `subkriterias` (`id`, `kriteria_id`, `nama_subkriteria`, `nilai_subkriteria`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dosis Terapi', 4, 0, '2023-07-04 20:51:58', '2023-07-04 20:51:58'),
(2, 1, 'Dosis Minimum', 3, 0, '2023-07-04 20:52:06', '2023-07-04 20:52:06'),
(3, 1, 'Dosis Maksimum', 2, 0, '2023-07-04 20:52:17', '2023-07-04 20:53:23'),
(4, 1, 'Dosis Toksis', 1, 0, '2023-07-04 20:52:26', '2023-07-04 20:52:26'),
(5, 2, 'Mengantuk', 5, 0, '2023-07-04 20:52:48', '2023-07-04 20:52:48'),
(6, 2, 'Mual', 4, 0, '2023-07-04 20:53:00', '2023-07-04 20:53:00'),
(7, 2, 'Sakit Kepala', 3, 0, '2023-07-04 20:53:11', '2023-07-04 20:53:11'),
(8, 2, 'Muntah', 2, 0, '2023-07-04 20:53:40', '2023-07-04 20:53:40'),
(9, 2, 'Jantung Berdebar', 1, 0, '2023-07-04 20:53:50', '2023-07-04 20:53:50'),
(10, 3, 'Sangat Murah', 4, 0, '2023-07-04 20:54:01', '2023-07-04 20:54:01'),
(11, 3, 'Murah', 3, 0, '2023-07-04 20:54:11', '2023-07-04 20:54:11'),
(12, 3, 'Mahal', 2, 0, '2023-07-04 20:54:19', '2023-07-04 20:54:19'),
(13, 3, 'Sangat Mahal', 1, 0, '2023-07-04 20:54:27', '2023-07-04 20:54:27'),
(14, 4, 'Kaplet', 4, 0, '2023-07-04 20:54:39', '2023-07-04 20:54:39'),
(15, 4, 'Kapsul', 3, 0, '2023-07-04 20:54:46', '2023-07-04 20:54:46'),
(16, 4, 'Tablet', 2, 0, '2023-07-04 20:54:53', '2023-07-04 20:54:53'),
(17, 4, 'Cair', 1, 0, '2023-07-04 20:55:02', '2023-07-04 20:55:02'),
(18, 5, 'Dewasa', 2, 0, '2023-07-04 20:55:13', '2023-07-04 20:55:13'),
(19, 5, 'Anak-anak', 1, 0, '2023-07-04 20:55:21', '2023-07-04 20:55:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'adminsmart1', 'admin@smart.com', '2023-07-04 20:47:55', '$2y$10$cgEpt6bsqnKqYSvnZXKGfe7rZ.ljdoc4JSs7fvsgregWIdMRV8xRK', 'p1pQiSdJaa', '2023-07-04 20:47:55', '2023-07-04 20:47:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_obats`
--
ALTER TABLE `detail_obats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_obats_kriteria_id_index` (`kriteria_id`),
  ADD KEY `detail_obats_obat_id_index` (`obat_id`),
  ADD KEY `detail_obats_subkriteria_id_index` (`subkriteria_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `keluhan`
--
ALTER TABLE `keluhan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keluhan_obat`
--
ALTER TABLE `keluhan_obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `obat_keluhan` (`obat_id`),
  ADD KEY `keluhan_detail` (`keluhan_id`);

--
-- Indexes for table `kriterias`
--
ALTER TABLE `kriterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obats`
--
ALTER TABLE `obats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `subkriterias`
--
ALTER TABLE `subkriterias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subkriterias_kriteria_id_index` (`kriteria_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_obats`
--
ALTER TABLE `detail_obats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keluhan`
--
ALTER TABLE `keluhan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `keluhan_obat`
--
ALTER TABLE `keluhan_obat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kriterias`
--
ALTER TABLE `kriterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `obats`
--
ALTER TABLE `obats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subkriterias`
--
ALTER TABLE `subkriterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_obats`
--
ALTER TABLE `detail_obats`
  ADD CONSTRAINT `detail_obats_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriterias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_obats_obat_id_foreign` FOREIGN KEY (`obat_id`) REFERENCES `obats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_obats_subkriteria_id_foreign` FOREIGN KEY (`subkriteria_id`) REFERENCES `subkriterias` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `keluhan_obat`
--
ALTER TABLE `keluhan_obat`
  ADD CONSTRAINT `keluhan_detail` FOREIGN KEY (`keluhan_id`) REFERENCES `keluhan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `obat_keluhan` FOREIGN KEY (`obat_id`) REFERENCES `obats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subkriterias`
--
ALTER TABLE `subkriterias`
  ADD CONSTRAINT `subkriterias_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriterias` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
