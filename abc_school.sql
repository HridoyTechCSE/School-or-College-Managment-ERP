-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2021 at 06:41 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abc_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_employee_salaries`
--

CREATE TABLE `account_employee_salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id=user_id',
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_employee_salaries`
--

INSERT INTO `account_employee_salaries` (`id`, `employee_id`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(2, 9, '2020-12', 23400, '2020-12-19 09:58:43', '2020-12-19 09:58:43'),
(3, 10, '2020-12', 81000, '2020-12-19 09:58:43', '2020-12-19 09:58:43');

-- --------------------------------------------------------

--
-- Table structure for table `account_other_costs`
--

CREATE TABLE `account_other_costs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_other_costs`
--

INSERT INTO `account_other_costs` (`id`, `date`, `amount`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, '2020-12-16', 2000, 'marker 3pcs', '202012191728126289984_364494641279819_1249416742363622064_n.jpg', '2020-12-19 10:55:32', '2020-12-19 11:28:40'),
(2, '2020-12-20', 100, 'By duster', '202012221637furniture-logo-template-png_31293.jpg', '2020-12-22 10:37:14', '2020-12-22 10:37:14');

-- --------------------------------------------------------

--
-- Table structure for table `account_student_fees`
--

CREATE TABLE `account_student_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `fee_category_id` int(11) DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_student_fees`
--

INSERT INTO `account_student_fees` (`id`, `year_id`, `class_id`, `student_id`, `fee_category_id`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(2, 5, 1, 7, 3, '2020-12', 50, '2020-12-19 01:21:07', '2020-12-19 01:21:07'),
(3, 5, 1, 8, 3, '2020-12', 100, '2020-12-19 01:21:07', '2020-12-19 01:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `assign_students`
--

CREATE TABLE `assign_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL COMMENT 'user_id=student_id',
  `roll` int(11) DEFAULT NULL,
  `class_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_students`
--

INSERT INTO `assign_students` (`id`, `student_id`, `roll`, `class_id`, `year_id`, `group_id`, `shift_id`, `created_at`, `updated_at`) VALUES
(1, 4, NULL, 1, 3, NULL, NULL, '2020-12-12 04:53:43', '2020-12-12 04:53:43'),
(2, 5, NULL, 2, 5, NULL, NULL, '2020-12-12 05:50:19', '2020-12-12 05:50:19'),
(3, 6, NULL, 5, 4, NULL, 1, '2020-12-12 05:51:19', '2020-12-12 05:51:19'),
(4, 7, 1, 1, 5, 4, 1, '2020-12-12 06:57:11', '2020-12-13 06:48:14'),
(5, 8, 2, 1, 5, 2, 1, '2020-12-12 23:42:05', '2020-12-13 06:48:14');

-- --------------------------------------------------------

--
-- Table structure for table `assign_subjects`
--

CREATE TABLE `assign_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `full_mark` double NOT NULL,
  `pass_mark` double NOT NULL,
  `subjective_mark` double NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_subjects`
--

INSERT INTO `assign_subjects` (`id`, `class_id`, `subject_id`, `full_mark`, `pass_mark`, `subjective_mark`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(4, 2, 2, 100, 33, 100, NULL, NULL, '2020-12-11 06:29:24', '2020-12-11 06:29:24'),
(5, 2, 3, 100, 33, 100, NULL, NULL, '2020-12-11 06:29:24', '2020-12-11 06:29:24'),
(6, 2, 4, 100, 33, 100, NULL, NULL, '2020-12-11 06:29:24', '2020-12-11 06:29:24'),
(16, 1, 2, 100, 333, 1003, NULL, 1, '2020-12-11 07:29:18', '2020-12-23 10:51:38'),
(17, 1, 3, 100, 333, 1003, NULL, 1, '2020-12-11 07:29:18', '2020-12-23 10:51:38'),
(18, 1, 4, 100, 330, 1000, NULL, 1, '2020-12-11 07:29:18', '2020-12-23 10:51:38'),
(19, 5, 2, 100, 33, 100, NULL, NULL, '2020-12-18 06:19:09', '2020-12-18 06:19:09'),
(20, 5, 3, 100, 33, 100, NULL, NULL, '2020-12-18 06:19:09', '2020-12-18 06:19:09'),
(21, 5, 4, 100, 33, 100, NULL, NULL, '2020-12-18 06:19:09', '2020-12-18 06:19:09'),
(28, 7, 2, 100, 33, 100, NULL, 1, '2020-12-18 08:02:46', '2020-12-18 08:28:11'),
(29, 7, 3, 100, 33, 100, NULL, 1, '2020-12-18 08:02:46', '2020-12-18 08:28:11'),
(30, 7, 4, 100, 33, 100, NULL, 1, '2020-12-18 08:02:46', '2020-12-18 08:28:11'),
(31, 7, 5, 100, 33, 100, NULL, 1, '2020-12-18 08:02:46', '2020-12-18 08:28:11'),
(32, 7, 6, 100, 33, 100, NULL, 1, '2020-12-18 08:02:46', '2020-12-18 08:28:11'),
(34, 7, 7, 100, 33, 100, NULL, 1, '2020-12-18 08:28:58', '2020-12-18 08:28:58'),
(35, 6, 2, 100, 33, 100, 1, NULL, '2020-12-18 08:30:40', '2020-12-18 08:30:40'),
(36, 6, 3, 100, 33, 100, 1, NULL, '2020-12-18 08:30:40', '2020-12-18 08:30:40'),
(37, 6, 4, 100, 33, 100, 1, NULL, '2020-12-18 08:30:40', '2020-12-18 08:30:40'),
(38, 6, 6, 100, 33, 100, 1, NULL, '2020-12-18 08:30:40', '2020-12-18 08:30:40');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Assistant Teacher', '2020-12-11 09:04:22', '2020-12-15 09:04:54'),
(2, 'Teacher', '2020-12-11 09:04:29', '2020-12-15 09:05:07'),
(3, 'Head Teacher', '2020-12-11 09:04:47', '2020-12-11 09:04:47');

-- --------------------------------------------------------

--
-- Table structure for table `discount_students`
--

CREATE TABLE `discount_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assign_student_id` int(11) NOT NULL,
  `fee_category_id` int(11) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount_students`
--

INSERT INTO `discount_students` (`id`, `assign_student_id`, `fee_category_id`, `discount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 30, '2020-12-12 04:53:43', '2020-12-12 04:53:43'),
(2, 2, 1, 50, '2020-12-12 05:50:19', '2020-12-12 05:50:19'),
(3, 3, 1, 20, '2020-12-12 05:51:19', '2020-12-12 05:51:19'),
(4, 4, 1, 50, '2020-12-12 06:57:11', '2020-12-12 10:53:17'),
(5, 5, 1, 0, '2020-12-12 23:42:05', '2020-12-12 23:42:05');

-- --------------------------------------------------------

--
-- Table structure for table `employee_attedences`
--

CREATE TABLE `employee_attedences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id = user_id',
  `date` date NOT NULL,
  `attend_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_attedences`
--

INSERT INTO `employee_attedences` (`id`, `employee_id`, `date`, `attend_status`, `created_at`, `updated_at`) VALUES
(9, 6, '2020-12-18', 'Present', '2020-12-17 08:39:57', '2020-12-17 08:39:57'),
(10, 7, '2020-12-18', 'Present', '2020-12-17 08:39:57', '2020-12-17 08:39:57'),
(11, 9, '2020-12-18', 'Present', '2020-12-17 08:39:57', '2020-12-17 08:39:57'),
(12, 10, '2020-12-18', 'Present', '2020-12-17 08:39:57', '2020-12-17 08:39:57'),
(13, 6, '2020-12-17', 'Absent', '2020-12-17 08:40:10', '2020-12-17 08:40:10'),
(14, 7, '2020-12-17', 'Absent', '2020-12-17 08:40:10', '2020-12-17 08:40:10'),
(15, 9, '2020-12-17', 'Absent', '2020-12-17 08:40:10', '2020-12-17 08:40:10'),
(16, 10, '2020-12-17', 'Absent', '2020-12-17 08:40:10', '2020-12-17 08:40:10'),
(17, 6, '2020-12-19', 'Absent', '2020-12-17 10:55:19', '2020-12-17 10:55:19'),
(18, 7, '2020-12-19', 'Present', '2020-12-17 10:55:19', '2020-12-17 10:55:19'),
(19, 9, '2020-12-19', 'Absent', '2020-12-17 10:55:19', '2020-12-17 10:55:19'),
(20, 10, '2020-12-19', 'Absent', '2020-12-17 10:55:19', '2020-12-17 10:55:19'),
(21, 6, '2020-12-20', 'Present', '2020-12-17 10:56:59', '2020-12-17 10:56:59'),
(22, 7, '2020-12-20', 'Present', '2020-12-17 10:56:59', '2020-12-17 10:56:59'),
(23, 9, '2020-12-20', 'Absent', '2020-12-17 10:56:59', '2020-12-17 10:56:59'),
(24, 10, '2020-12-20', 'Absent', '2020-12-17 10:56:59', '2020-12-17 10:56:59');

-- --------------------------------------------------------

--
-- Table structure for table `employee_leaves`
--

CREATE TABLE `employee_leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id=user_id',
  `leave_purpose_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_leaves`
--

INSERT INTO `employee_leaves` (`id`, `employee_id`, `leave_purpose_id`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 10, 2, '2020-12-17', '2020-12-20', '2020-12-16 12:23:33', '2020-12-16 23:52:12'),
(2, 9, 1, '2020-12-17', '2020-12-20', '2020-12-16 12:25:10', '2020-12-16 23:53:15');

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary_logs`
--

CREATE TABLE `employee_salary_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id=user_id',
  `previous_salary` int(11) DEFAULT NULL,
  `present_salary` int(11) DEFAULT NULL,
  `increment_salary` int(11) DEFAULT NULL,
  `effected_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_salary_logs`
--

INSERT INTO `employee_salary_logs` (`id`, `employee_id`, `previous_salary`, `present_salary`, `increment_salary`, `effected_date`, `created_at`, `updated_at`) VALUES
(3, 10, 80000, 82000, 2000, '2021-01-01', '2020-12-16 09:23:54', '2020-12-16 09:23:54'),
(4, 10, 82000, 90000, 8000, '2021-02-01', '2020-12-16 09:25:11', '2020-12-16 09:25:11'),
(5, 9, 24352, NULL, 648, '2021-01-01', '2020-12-16 09:59:22', '2020-12-16 09:59:22'),
(6, 9, 25000, 25500, 500, '2021-02-01', '2020-12-16 10:01:50', '2020-12-16 10:01:50'),
(7, 9, 25500, 26000, 500, '2021-05-01', '2020-12-16 10:07:00', '2020-12-16 10:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `exam_types`
--

CREATE TABLE `exam_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_types`
--

INSERT INTO `exam_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'first term', '2020-12-10 22:46:23', '2020-12-10 22:46:23'),
(4, 'secound term', '2020-12-10 22:46:37', '2020-12-10 22:46:37'),
(5, 'final term', '2020-12-10 22:46:43', '2020-12-10 22:46:43');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fee_categories`
--

CREATE TABLE `fee_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_categories`
--

INSERT INTO `fee_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'monthly fee', '2020-12-10 06:29:17', '2020-12-10 06:29:17'),
(3, 'registation fee', '2020-12-10 06:29:25', '2020-12-10 06:29:25'),
(4, 'exam fee', '2020-12-10 06:29:32', '2020-12-10 06:29:32');

-- --------------------------------------------------------

--
-- Table structure for table `fee_category_amounts`
--

CREATE TABLE `fee_category_amounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fee_category_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_category_amounts`
--

INSERT INTO `fee_category_amounts` (`id`, `fee_category_id`, `class_id`, `amount`, `created_at`, `updated_at`) VALUES
(6, 3, 1, 100, '2020-12-10 08:49:11', '2020-12-10 08:49:11'),
(7, 3, 2, 200, '2020-12-10 08:49:11', '2020-12-10 08:49:11'),
(8, 3, 5, 300, '2020-12-10 08:49:11', '2020-12-10 08:49:11'),
(9, 3, 6, 400, '2020-12-10 08:49:11', '2020-12-10 08:49:11'),
(10, 3, 7, 500, '2020-12-10 08:49:11', '2020-12-10 08:49:11'),
(11, 4, 1, 10, '2020-12-10 08:49:46', '2020-12-10 08:49:46'),
(12, 4, 2, 20, '2020-12-10 08:49:46', '2020-12-10 08:49:46'),
(13, 4, 5, 30, '2020-12-10 08:49:46', '2020-12-10 08:49:46'),
(14, 4, 6, 40, '2020-12-10 08:49:46', '2020-12-10 08:49:46'),
(15, 4, 7, 50, '2020-12-10 08:49:46', '2020-12-10 08:49:46'),
(30, 2, 1, 1000, '2020-12-10 12:33:32', '2020-12-10 12:33:32'),
(31, 2, 2, 2000, '2020-12-10 12:33:32', '2020-12-10 12:33:32'),
(32, 2, 5, 3000, '2020-12-10 12:33:32', '2020-12-10 12:33:32'),
(33, 2, 6, 4000, '2020-12-10 12:33:32', '2020-12-10 12:33:32'),
(34, 2, 7, 500, '2020-12-10 12:33:32', '2020-12-10 12:33:32');

-- --------------------------------------------------------

--
-- Table structure for table `leave_purposes`
--

CREATE TABLE `leave_purposes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_purposes`
--

INSERT INTO `leave_purposes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Famaly Problem', NULL, NULL),
(2, 'Personal Problem', NULL, NULL),
(3, 'he have physical problem', '2020-12-16 12:25:10', '2020-12-16 12:25:10');

-- --------------------------------------------------------

--
-- Table structure for table `marks_grades`
--

CREATE TABLE `marks_grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_point` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_marks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_marks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_point` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_point` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marks_grades`
--

INSERT INTO `marks_grades` (`id`, `grade_name`, `grade_point`, `start_marks`, `end_marks`, `start_point`, `end_point`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'A+', '5.00', '80', '100', '5.00', '5.00', 'Excelent', '2020-12-18 11:49:33', '2020-12-18 11:54:26'),
(2, 'A', '4.00', '70', '79', '4.00', '4.99', 'very Good', '2020-12-18 11:56:16', '2020-12-18 11:56:16'),
(3, 'A-', '3.50', '60', '69', '3.50', '3.99', 'good', '2020-12-18 11:58:55', '2020-12-18 11:58:55'),
(4, 'B', '3.00', '50', '59', '3.00', '3.49', 'Average', '2020-12-18 12:00:26', '2020-12-18 12:00:26'),
(5, 'C', '2.00', '40', '49', '2.00', '2.99', 'Disappoint', '2020-12-18 12:01:23', '2020-12-18 12:01:23'),
(6, 'D', '1.00', '33', '39', '1.00', '1.99', 'bad', '2020-12-18 12:02:35', '2020-12-18 12:02:35'),
(7, 'F', '0.00', '00', '32', '0.00', '0.99', 'Fail', '2020-12-18 12:03:13', '2020-12-18 12:03:13');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2020_11_20_152038_create_sliders_table', 4),
(6, '2020_12_09_131049_create_student_classes_table', 5),
(7, '2020_12_09_154307_create_years_table', 6),
(8, '2020_12_09_160418_create_student_groups_table', 7),
(9, '2020_12_10_054410_create_student_shifts_table', 8),
(10, '2020_12_10_060429_create_fee_categories_table', 9),
(11, '2020_12_10_065226_create_fee_category_amounts_table', 10),
(12, '2020_12_11_043507_create_exam_types_table', 11),
(13, '2020_12_11_045226_create_subjects_table', 12),
(14, '2020_12_11_054106_create_assign_subjects_table', 13),
(15, '2020_12_11_145355_create_designations_table', 14),
(17, '2014_10_12_000000_create_users_table', 15),
(18, '2020_12_11_164509_create_assign_students_table', 16),
(19, '2020_12_11_165109_create_discount_students_table', 16),
(20, '2020_12_15_150239_create_employee_salary_logs_table', 17),
(21, '2020_12_16_162245_create_leave_purposes_table', 18),
(22, '2020_12_16_162744_create_employee_leaves_table', 18),
(23, '2020_12_17_062506_create_employee_attedences_table', 19),
(24, '2020_12_18_105410_create_student_marks_table', 20),
(25, '2020_12_18_162625_create_marks_grades_table', 21),
(26, '2020_12_19_040054_create_account_student_fees_table', 22),
(27, '2020_12_19_132451_create_account_employee_salaries_table', 23),
(28, '2020_12_19_155215_create_account_other_costs_table', 24);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `short_title`, `long_title`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, '20201120163022688780_1607937759267869_3745264629294384951_n.jpg', 'this is heading 3434', 'this is headingthis is headingthis is headingthis is heading', 8, 8, '2020-11-20 10:30:53', '2020-11-23 05:02:42'),
(3, '20201120163114379845_10206816440676891_921234504083354416_o.jpg', 'this is heading 1', 'this is headingthis is headingthis is headingthis is heading 1', 8, NULL, '2020-11-20 10:31:01', '2020-11-20 10:31:01');

-- --------------------------------------------------------

--
-- Table structure for table `student_classes`
--

CREATE TABLE `student_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_classes`
--

INSERT INTO `student_classes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'one', '2020-12-09 07:35:58', '2020-12-10 06:40:44'),
(2, 'two', '2020-12-09 07:36:04', '2020-12-10 06:40:49'),
(5, 'three', '2020-12-10 06:40:54', '2020-12-10 06:40:54'),
(6, 'four', '2020-12-10 06:41:00', '2020-12-10 06:41:00'),
(7, 'five', '2020-12-10 06:41:06', '2020-12-10 06:41:06');

-- --------------------------------------------------------

--
-- Table structure for table `student_groups`
--

CREATE TABLE `student_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_groups`
--

INSERT INTO `student_groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'commerce', '2020-12-09 10:15:21', '2020-12-09 10:15:21'),
(3, 'artce', '2020-12-09 10:15:36', '2020-12-09 10:15:36'),
(4, 'science', '2020-12-09 23:40:05', '2020-12-09 23:40:05');

-- --------------------------------------------------------

--
-- Table structure for table `student_marks`
--

CREATE TABLE `student_marks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL COMMENT 'student_id = user_id',
  `in_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `assign_subject_id` int(11) DEFAULT NULL,
  `exam_type_id` int(11) DEFAULT NULL,
  `marks` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_marks`
--

INSERT INTO `student_marks` (`id`, `student_id`, `in_no`, `year_id`, `class_id`, `assign_subject_id`, `exam_type_id`, `marks`, `created_at`, `updated_at`) VALUES
(3, 7, '20200007', 5, 1, 16, 3, 55, '2020-12-18 09:10:45', '2020-12-18 09:10:45'),
(4, 8, '20200008', 5, 1, 16, 3, 45, '2020-12-18 09:10:45', '2020-12-18 09:10:45'),
(5, 7, '20200007', 5, 1, 17, 3, 66, '2020-12-23 10:49:17', '2020-12-23 10:49:17'),
(6, 8, '20200008', 5, 1, 17, 3, NULL, '2020-12-23 10:49:17', '2020-12-23 10:49:17'),
(7, 7, '20200007', 5, 1, 18, 3, 90, '2020-12-23 10:49:32', '2020-12-23 10:49:32'),
(8, 8, '20200008', 5, 1, 18, 3, NULL, '2020-12-23 10:49:32', '2020-12-23 10:49:32');

-- --------------------------------------------------------

--
-- Table structure for table `student_shifts`
--

CREATE TABLE `student_shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_shifts`
--

INSERT INTO `student_shifts` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Day', '2020-12-09 23:51:55', '2020-12-09 23:52:15'),
(3, 'evening', '2020-12-09 23:52:27', '2020-12-09 23:52:27');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Bangla', '2020-12-10 23:01:13', '2020-12-10 23:01:13'),
(3, 'english', '2020-12-10 23:01:19', '2020-12-10 23:01:19'),
(4, 'math', '2020-12-10 23:01:23', '2020-12-10 23:01:23'),
(5, 'social science', '2020-12-10 23:01:31', '2020-12-10 23:01:31'),
(6, 'general Science', '2020-12-10 23:01:46', '2020-12-10 23:01:46'),
(7, 'Islamic Studies', '2020-12-10 23:01:59', '2020-12-10 23:01:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usertype` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'user type = student,employee,admin',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'admin=head of software, operator=computer operator, user=employee',
  `join_date` date DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=inactive,1=active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `name`, `email`, `email_verified_at`, `password`, `mobile`, `address`, `gender`, `image`, `fname`, `mname`, `religion`, `id_no`, `dob`, `code`, `role`, `join_date`, `designation_id`, `salary`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'jarif khan rr', 'jarif@gmail.com', NULL, '$2y$10$e2H14ZwKwWLc0nbFoaEoH.lZ1vLeORF/ZYiVdxrG/P2OU.rp.Ltj.', '01631143435', 'uttara dhaka 1230', 'male', '20201119062814379845_10206816440676891_921234504083354416_o.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, NULL, 1, NULL, NULL, NULL),
(2, 'Admin', 'hridoy', 'tanvir@gmail.com', NULL, '$2y$10$BWNhM3m3FxnCPf7tmNmMgOA8i8ioJwXboV0LMB8lgtCpLi5lnNxLa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, NULL, 1, NULL, '2020-12-11 10:57:31', '2020-12-11 11:05:40'),
(3, 'Admin', 'hridoy khan14', 'hridoy.khan05@yahoo.com', NULL, '$2y$10$sTPamSemn8b89aTpeaph2eBm7XoxrDEcY4bPaFYW0E7HwVrXxzwcu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2832', 'Operator', NULL, NULL, NULL, 1, NULL, '2020-12-11 11:35:27', '2020-12-11 11:35:27'),
(4, 'student', 'hridoy', NULL, NULL, '$2y$10$N6jXFurzqJQHdj./RLd.Eep3oRPoBwTD1BkcktPUxoWtX1RcTD.CG', '01631143435', 'uttara dhaka', 'Male', '20201212105326232583_1512662468851587_2133007951478874646_o.jpg', 'rokon uddin', 'samiran', 'Islam', '20190001', '1996-12-19', '8708', NULL, NULL, NULL, NULL, 1, NULL, '2020-12-12 04:53:43', '2020-12-12 04:53:43'),
(5, 'student', 'bijoy', NULL, NULL, '$2y$10$jkd4.Hx9hWNpYccyZQq5VO4yLs34i7z/CQQpGCw9x4bYuMmfRd2LG', '0163003477', 'uttara dhaka 1230', 'Male', '202012121150117237392_2668315153487801_5732350455080703475_n.jpg', 'kabir', 'nasima', 'Islam', '20200005', '2004-11-10', '6261', NULL, NULL, NULL, NULL, 1, NULL, '2020-12-12 05:50:19', '2020-12-12 05:50:19'),
(6, 'employee', 'upol', NULL, NULL, '$2y$10$TZkhtMqQlci.YexTr5T64.m3PTzMb0yDcXvxcnhVSeSswIfmAnAFy', '01631143435', 'uttara dhaka', 'Male', '20201212115135645581_1638546986244361_5211151629180469248_o.jpg', 'giyash', 'mojilatunnessa', 'Hindu', '20180006', '2007-12-14', '295', NULL, NULL, NULL, NULL, 1, NULL, '2020-12-12 05:51:19', '2020-12-12 05:51:19'),
(7, 'employee', 'sayem khan', NULL, NULL, '$2y$10$yMdP9lnVLtigTNVlCkCFN.Xm6oa4L0gTC0lNkJAAjGZ8Urk9jVzwK', '0163003477', 'uttara dhaka 1230', 'Male', '20201224061014446085_1114724811930276_896634913789327085_n.jpg', 'kabir', 'nasima', 'Islam', '20200007', '2020-12-15', '4429', NULL, NULL, NULL, NULL, 1, NULL, '2020-12-12 06:57:11', '2020-12-24 00:10:43'),
(8, 'student', 'hridoy', NULL, NULL, '$2y$10$WLeJvp6hUq/xfOQBgCi0wOfOpH3Wg9Es63wNeyiel/qNJA2xJIXNu', '01631143435', 'uttara dhaka', 'Male', '202012130542Screenshot_12.png', 'rokon uddin', 'samiran', 'Islam', '20200008', '1996-12-19', '4133', NULL, NULL, NULL, NULL, 1, NULL, '2020-12-12 23:42:05', '2020-12-12 23:42:45'),
(9, 'employee', 'mobile', NULL, NULL, '$2y$10$FHYEliJL9wMrHINFTrkw3ODTWhaRcTIj82deDiTAHUlN38aw0wklC', '0163003477', 'uttara dhaka 1230', 'Male', '20201215181430629583_2096808807204754_4589263518888361984_n.jpg', 'giyash', 'mojilatunnessa', 'Islam', '20200008', '2020-12-14', '5657', NULL, '2020-12-13', 2, 26000, 1, NULL, '2020-12-15 12:14:47', '2020-12-16 10:07:00'),
(10, 'employee', 'sagor khan', NULL, NULL, '$2y$10$aP8DIs6Rwm8JNJnIY07XieveO3j2ktcA/wISFQ//c/AqGRhxgA5fC', '01963003477', 'uttara dhaka 1230', 'Male', '20201216061414379845_10206816440676891_921234504083354416_o.jpg', 'rokon uddin khan', 'mojilatunnessa', 'Islam', '2020070010', '2004-12-08', '5883', NULL, '2020-12-16', 1, 90000, 1, NULL, '2020-12-15 12:15:45', '2020-12-16 09:25:11');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, '2019', '2020-12-12 01:36:36', '2020-12-12 01:36:36'),
(4, '2018', '2020-12-12 01:36:43', '2020-12-12 01:36:43'),
(5, '2020', '2020-12-12 01:36:49', '2020-12-12 01:36:49'),
(6, '2017', '2020-12-12 01:37:04', '2020-12-12 01:37:04'),
(7, '2016', '2020-12-12 01:37:09', '2020-12-12 01:37:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_employee_salaries`
--
ALTER TABLE `account_employee_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_other_costs`
--
ALTER TABLE `account_other_costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_student_fees`
--
ALTER TABLE `account_student_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_students`
--
ALTER TABLE `assign_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `designations_name_unique` (`name`);

--
-- Indexes for table `discount_students`
--
ALTER TABLE `discount_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_attedences`
--
ALTER TABLE `employee_attedences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_salary_logs`
--
ALTER TABLE `employee_salary_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_types`
--
ALTER TABLE `exam_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `exam_types_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_categories`
--
ALTER TABLE `fee_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fee_categories_name_unique` (`name`);

--
-- Indexes for table `fee_category_amounts`
--
ALTER TABLE `fee_category_amounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_purposes`
--
ALTER TABLE `leave_purposes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `leave_purposes_name_unique` (`name`);

--
-- Indexes for table `marks_grades`
--
ALTER TABLE `marks_grades`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_classes`
--
ALTER TABLE `student_classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_classes_name_unique` (`name`);

--
-- Indexes for table `student_groups`
--
ALTER TABLE `student_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_groups_name_unique` (`name`);

--
-- Indexes for table `student_marks`
--
ALTER TABLE `student_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_shifts`
--
ALTER TABLE `student_shifts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_shifts_name_unique` (`name`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subjects_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `years_name_unique` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_employee_salaries`
--
ALTER TABLE `account_employee_salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `account_other_costs`
--
ALTER TABLE `account_other_costs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `account_student_fees`
--
ALTER TABLE `account_student_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `assign_students`
--
ALTER TABLE `assign_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `discount_students`
--
ALTER TABLE `discount_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee_attedences`
--
ALTER TABLE `employee_attedences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_salary_logs`
--
ALTER TABLE `employee_salary_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `exam_types`
--
ALTER TABLE `exam_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_categories`
--
ALTER TABLE `fee_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fee_category_amounts`
--
ALTER TABLE `fee_category_amounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `leave_purposes`
--
ALTER TABLE `leave_purposes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `marks_grades`
--
ALTER TABLE `marks_grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_classes`
--
ALTER TABLE `student_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_groups`
--
ALTER TABLE `student_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_marks`
--
ALTER TABLE `student_marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_shifts`
--
ALTER TABLE `student_shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
