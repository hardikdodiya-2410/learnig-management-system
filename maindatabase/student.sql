-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2025 at 03:19 PM
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
-- Database: `student`
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
('laravel_cache_spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:24:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:11:\"add teacher\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:12:\"view teacher\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:12:\"edit teacher\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:14:\"delete teacher\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:11:\"add student\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:12:\"view student\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:12:\"edit student\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:14:\"delete student\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:12:\"view Profile\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:12:\"edit Profile\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:9:\"view role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:10:\"add course\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:11:\"view course\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:11:\"edit course\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:14;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:13:\"delete course\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:11:\"add subject\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:16;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:12:\"edit subject\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:17;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:14:\"delete subject\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:18;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:12:\"view subject\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:19;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:9:\"add marks\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:20;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:10:\"edit marks\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:21;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:12:\"delete marks\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:22;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:16:\"view all results\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:23;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:15:\"view own result\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}}s:5:\"roles\";a:3:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:11:\"Super Admin\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:7:\"teacher\";s:1:\"c\";s:3:\"web\";}i:2;a:3:{s:1:\"a\";i:3;s:1:\"b\";s:7:\"Student\";s:1:\"c\";s:3:\"web\";}}}', 1749729650);

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
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `duration` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `subjects` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `duration`, `created_at`, `updated_at`, `subjects`) VALUES
(1, 'BCA', 'BCA is a 3-year undergraduate degree program that focuses on the fundamentals of computer science, software development, and information technology. It equips students with practical skills in programming languages (like C, C++, Java, PHP, Python), web development, databases, and computer networks.', '3 years', '2025-06-09 23:01:53', '2025-06-10 02:10:41', '[\"C++\",\"Java\",\"PHP\",\"HTML\",\"CSS\",\".NET\"]'),
(36, 'MCA', 'MCA stands for Master of Computer Applications. It\'s a postgraduate degree program, typically lasting two years, focused on computer science and its applications. This course aims to provide students with a comprehensive understanding of programming, software development, database management, and related subjects. It\'s designed for individuals seeking careers in IT, software development, or related fields', '2 years', '2025-06-10 05:11:59', '2025-06-10 05:11:59', '[\"JAVA\",\"PHP\"]'),
(37, 'Web Development', 'Learn full-stack web development from scratch. This course covers everything from basic HTML/CSS to advanced PHP and JavaScript with practical projects and real-world implementation.', '6 months', '2025-06-11 07:14:45', '2025-06-11 07:15:10', '[\"HTML & CSS Basics\",\"JavaScript Fundamentals\",\"Responsive Design with Bootstrap\",\"PHP & MySQL\",\"Laravel Framework\",\"Project Deployment\"]');

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
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_04_112510_add_role_to_users_table', 1),
(5, '2025_06_06_040926_create_permission_tables', 1),
(6, '2025_06_06_084111_make_created_by_nullable_in_users_table', 2),
(7, '2025_06_06_103609_create_courses_table', 3),
(8, '2025_06_09_101221_add_subjects_to_courses_table', 4),
(9, '2025_06_10_094739_create_student_has_course_table', 5),
(10, '2025_06_10_094950_create_student_has_course_table', 6),
(11, '2025_06_10_100603_create_student_has_courses_table', 7),
(12, '2025_06_10_115727_create_student_result_table', 8),
(14, '2025_06_10_120921_create_student_results_table', 9),
(15, '2025_06_11_052943_add_result_to_student_results_table', 9),
(16, '2025_06_11_060924_change_marks_column_in_student_results_table', 10);

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
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 19),
(2, 'App\\Models\\User', 26),
(3, 'App\\Models\\User', 6),
(3, 'App\\Models\\User', 17),
(3, 'App\\Models\\User', 23),
(3, 'App\\Models\\User', 27),
(3, 'App\\Models\\User', 28),
(3, 'App\\Models\\User', 29);

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
(1, 'add teacher', 'web', '2025-06-06 02:26:08', '2025-06-06 02:26:08'),
(2, 'view teacher', 'web', '2025-06-06 02:26:08', '2025-06-06 02:26:08'),
(3, 'edit teacher', 'web', '2025-06-06 02:26:08', '2025-06-06 02:26:08'),
(4, 'delete teacher', 'web', '2025-06-06 02:26:08', '2025-06-06 02:26:08'),
(5, 'add student', 'web', '2025-06-06 02:26:08', '2025-06-06 02:26:08'),
(6, 'view student', 'web', '2025-06-06 02:26:08', '2025-06-06 02:26:08'),
(7, 'edit student', 'web', '2025-06-06 02:26:08', '2025-06-06 02:26:08'),
(8, 'delete student', 'web', '2025-06-06 02:26:08', '2025-06-06 02:26:08'),
(9, 'view Profile', 'web', '2025-06-06 02:40:06', '2025-06-06 02:40:06'),
(10, 'edit Profile', 'web', '2025-06-06 02:40:06', '2025-06-06 02:40:06'),
(11, 'view role', 'web', '2025-06-06 02:41:34', '2025-06-06 02:41:34'),
(12, 'add course', 'web', '2025-06-06 06:28:29', '2025-06-06 06:28:29'),
(13, 'view course', 'web', '2025-06-06 06:28:29', '2025-06-06 06:28:29'),
(14, 'edit course', 'web', '2025-06-06 06:28:29', '2025-06-06 06:28:29'),
(15, 'delete course', 'web', '2025-06-06 06:28:29', '2025-06-06 06:28:29'),
(16, 'add subject', 'web', '2025-06-09 01:09:40', '2025-06-09 01:09:40'),
(17, 'edit subject', 'web', '2025-06-09 01:09:40', '2025-06-09 01:09:40'),
(18, 'delete subject', 'web', '2025-06-09 01:09:40', '2025-06-09 01:09:40'),
(19, 'view subject', 'web', '2025-06-09 01:09:40', '2025-06-09 01:09:40'),
(20, 'add marks', 'web', '2025-06-11 06:29:36', '2025-06-11 06:29:36'),
(21, 'edit marks', 'web', '2025-06-11 06:29:36', '2025-06-11 06:29:36'),
(22, 'delete marks', 'web', '2025-06-11 06:29:36', '2025-06-11 06:29:36'),
(23, 'view all results', 'web', '2025-06-11 06:29:36', '2025-06-11 06:29:36'),
(24, 'view own result', 'web', '2025-06-11 06:29:36', '2025-06-11 06:29:36');

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
(1, 'Super Admin', 'web', '2025-06-06 02:26:08', '2025-06-06 02:26:08'),
(2, 'teacher', 'web', '2025-06-06 02:30:20', '2025-06-06 02:30:20'),
(3, 'Student', 'web', '2025-06-06 02:56:15', '2025-06-06 02:56:15');

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
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 3),
(10, 1),
(10, 2),
(10, 3),
(11, 1),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(13, 3),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(22, 1),
(22, 2),
(23, 1),
(23, 2),
(24, 1),
(24, 2),
(24, 3);

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
('3NspP27QuToTiyXAG5ySp9dGC3C6QTeG1zzPhwIb', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMENwVHFCRUZZUnhSQkNyR2hXWTBRYW81RFZneWY2R3QwRFBUdUQ3dSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL3ZpZXd1c2VyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1749647932),
('K88BobNOwk3fFqvpxkgjSc06UE0eTyeibCvA9Vog', 17, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZzRKUm5uVGY1N3hVTTJuWnZpaHZQb2dOSVBHTzVaT2VmYkF6TnVaWiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0NzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL1N0dWRlbnQvcHJvZmlsZXN0dWRlbnQvMTciO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxNzt9', 1749647625);

-- --------------------------------------------------------

--
-- Table structure for table `student_has_courses`
--

CREATE TABLE `student_has_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_has_courses`
--

INSERT INTO `student_has_courses` (`id`, `user_id`, `course_id`, `course_name`, `created_at`, `updated_at`) VALUES
(5, 6, 36, 'MCA', '2025-06-10 04:48:50', '2025-06-11 04:00:53'),
(7, 17, 1, 'BCA', '2025-06-10 23:32:03', '2025-06-11 07:26:10'),
(8, 23, 1, 'BCA', '2025-06-10 23:35:36', '2025-06-10 23:35:36'),
(9, 27, 36, 'MCA', '2025-06-11 04:26:21', '2025-06-11 04:26:21'),
(10, 28, 1, 'BCA', '2025-06-11 04:35:34', '2025-06-11 04:35:34'),
(11, 29, 36, 'MCA', '2025-06-11 05:50:10', '2025-06-11 05:50:10');

-- --------------------------------------------------------

--
-- Table structure for table `student_results`
--

CREATE TABLE `student_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_name` varchar(255) NOT NULL,
  `marks` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`marks`)),
  `total_marks` int(11) NOT NULL,
  `percentage` decimal(5,2) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `result` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_results`
--

INSERT INTO `student_results` (`id`, `user_id`, `course_id`, `course_name`, `marks`, `total_marks`, `percentage`, `grade`, `created_at`, `updated_at`, `result`) VALUES
(5, 6, 36, 'MCA', '[{\"subject\":\"JAVA\",\"marks\":\"10\"},{\"subject\":\"PHP\",\"marks\":\"10\"}]', 20, 10.00, 'F', '2025-06-11 04:17:41', '2025-06-11 04:17:41', 'Fail'),
(6, 23, 1, 'BCA', '[{\"subject\":\"C++\",\"marks\":\"10\"},{\"subject\":\"Java\",\"marks\":\"10\"},{\"subject\":\"PHP\",\"marks\":\"10\"},{\"subject\":\"HTML\",\"marks\":\"10\"},{\"subject\":\"CSS\",\"marks\":\"10\"},{\"subject\":\".NET\",\"marks\":\"10\"}]', 60, 10.00, 'F', '2025-06-11 04:18:04', '2025-06-11 04:18:04', 'Fail'),
(7, 17, 1, 'BCA', '[{\"subject\":\"C++\",\"marks\":\"100\"},{\"subject\":\"Java\",\"marks\":\"10\"},{\"subject\":\"PHP\",\"marks\":\"100\"},{\"subject\":\"HTML\",\"marks\":\"100\"},{\"subject\":\"CSS\",\"marks\":\"100\"},{\"subject\":\".NET\",\"marks\":\"100\"}]', 510, 85.00, 'A', '2025-06-11 04:19:37', '2025-06-11 04:19:37', 'Fail'),
(8, 27, 36, 'MCA', '[{\"subject\":\"JAVA\",\"marks\":\"100\"},{\"subject\":\"PHP\",\"marks\":\"100\"}]', 200, 100.00, 'A+', '2025-06-11 04:33:13', '2025-06-11 05:37:41', 'Pass'),
(11, 28, 1, 'BCA', '[{\"subject\":\"C++\",\"marks\":\"100\"},{\"subject\":\"Java\",\"marks\":\"100\"},{\"subject\":\"PHP\",\"marks\":\"90\"},{\"subject\":\"HTML\",\"marks\":\"100\"},{\"subject\":\"CSS\",\"marks\":\"100\"},{\"subject\":\".NET\",\"marks\":\"100\"}]', 590, 98.33, 'A+', '2025-06-11 05:47:41', '2025-06-11 07:11:55', 'Pass');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `enrollment_no` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `created_by`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Super Admin', 'superadmin@gmail.com', NULL, '$2y$12$PI4GX6LATP1HHb7lqc/qluiwjp17WbhFPGgo8dwZZ49BPEdg2c9HS', 0, NULL, '2025-06-06 02:27:06', '2025-06-06 02:27:06', NULL),
(5, 'Teacher', 'teacher@gmail.com', NULL, '$2y$12$YBvkKMqNrJZfxuzRq493leRuMEwh6jWOcdmEBApMAOGPPx5pE8hMq', 1, NULL, '2025-06-06 02:55:27', '2025-06-06 02:55:27', NULL),
(6, 'student', 'studetn@gmail.com', NULL, '$2y$12$65nKFDMN5nJZQiIQlCt1GeSTCcz7wsGa4Nw67.Uvk3QOp8r8trB5e', 1, NULL, '2025-06-06 02:57:36', '2025-06-06 02:57:36', NULL),
(17, 'New student', 'newstudent@gmail.com', NULL, '$2y$12$qthvK8a1/obusxWyBxHN8un99sL3uqs47k///p2mPiEB8u2yrDfwC', 5, NULL, '2025-06-06 03:19:46', '2025-06-06 03:19:46', NULL),
(19, 'New teacher', 'newteacher@gmail.com', NULL, '$2y$12$TWQnifV5dZDkPwKO48Vl4OwNqY0DEupspozeEAaw.J7XgAm7tTGUO', 1, NULL, '2025-06-06 03:26:28', '2025-06-06 03:26:28', NULL),
(23, 'Aaron Michael', 'hohilimeh@mailinator.com', NULL, '$2y$12$EXlfRr.ITpu5iqgMnW8i.eOJoi4CXCGVVqAc3WagKludBnLHuHdza', 19, NULL, '2025-06-06 06:41:45', '2025-06-06 06:41:45', NULL),
(26, 'Reese Durham', 'wuqa@mailinator.com', NULL, '$2y$12$ZRuEt32oBctMrEpvwyVk3eXuTe4X2prvaSeJEV0BSjVKDmWv33Uju', 1, NULL, '2025-06-10 03:54:44', '2025-06-10 03:54:44', NULL),
(27, 'Amman', 'amman@gmail.com', NULL, '$2y$12$23XItmSQO7ilcjc51QR3d.kRRb/JZFzy7lW.lkT8QebblhBLznj4S', 1, NULL, '2025-06-10 23:37:41', '2025-06-10 23:37:41', NULL),
(28, 'Karan', 'karan@gmail.com', NULL, '$2y$12$RcYOZB12z1f.1LCYSQtErOYkEwQeJLFo5TLSCVV7Y3WT3gldRSB1i', 1, NULL, '2025-06-11 04:35:24', '2025-06-11 04:35:24', NULL),
(29, 'vinay', 'vinay@gmail.com', NULL, '$2y$12$kKK/uCE1SiNTQascNSjltetURWpFU8g2CkbdOQBHNHj6hehQ35XGG', 1, NULL, '2025-06-11 05:49:57', '2025-06-11 05:49:57', NULL);

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
-- Indexes for table `courses`
--
ALTER TABLE `courses`
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
-- Indexes for table `student_has_courses`
--
ALTER TABLE `student_has_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_has_courses_user_id_foreign` (`user_id`),
  ADD KEY `student_has_courses_course_id_foreign` (`course_id`);

--
-- Indexes for table `student_results`
--
ALTER TABLE `student_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_results_user_id_foreign` (`user_id`),
  ADD KEY `student_results_course_id_foreign` (`course_id`);

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
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student_has_courses`
--
ALTER TABLE `student_has_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student_results`
--
ALTER TABLE `student_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_has_courses`
--
ALTER TABLE `student_has_courses`
  ADD CONSTRAINT `student_has_courses_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_has_courses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_results`
--
ALTER TABLE `student_results`
  ADD CONSTRAINT `student_results_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `student_results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
