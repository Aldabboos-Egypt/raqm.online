-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2023 at 01:37 PM
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
-- Database: `clinics`
--

-- --------------------------------------------------------

--
-- Table structure for table `adds`
--

CREATE TABLE `adds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `page` varchar(255) DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adds`
--

INSERT INTO `adds` (`id`, `image`, `link`, `page`, `date_from`, `date_to`, `created_at`, `updated_at`) VALUES
(1, 'uploads/adds/Vjm9RP3KTv57KpQi8adY4SfxBMzVXKrVtLuTyNNG.png', 'https://meet.google.com/', 'home', '2023-08-01', '2023-08-31', '2023-08-31 11:24:56', '2023-08-31 11:24:56');

-- --------------------------------------------------------

--
-- Table structure for table `add_translaitons`
--

CREATE TABLE `add_translaitons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `add_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `add_translaitons`
--

INSERT INTO `add_translaitons` (`id`, `locale`, `title`, `description`, `add_id`, `created_at`, `updated_at`) VALUES
(1, 'ar', '-', '-', 1, NULL, NULL),
(2, 'en', '-', '-', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test@test.com', '$2y$10$Uqb8JUa9Py65YmLc3X.dM.TlncJewbCI/el9zEAEnbiqzMZZL4DVm', '2023-08-31 11:19:17', '2023-08-31 11:19:17'),
(2, 'محمود', 'mahmoud@gmail.com', '$2y$10$MQh8yjkB5chyqTQ7Ahw1.uB3FDcS0nCyysIJvyveWI8v/hKUZ/wam', '2023-08-31 11:26:55', '2023-08-31 11:26:55');

-- --------------------------------------------------------

--
-- Table structure for table `ads_view`
--

CREATE TABLE `ads_view` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ads_id` bigint(20) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'عيادات', '-', '2023-08-31 11:23:00', '2023-08-31 11:23:00');

-- --------------------------------------------------------

--
-- Table structure for table `clinics`
--

CREATE TABLE `clinics` (
  `clinic_id` int(10) UNSIGNED NOT NULL,
  `url` text DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `neighborhood` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country_code` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `phone_unformatted` varchar(255) DEFAULT NULL,
  `claim_this_business` tinyint(4) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `location_name` varchar(255) DEFAULT NULL,
  `total_score` decimal(3,2) DEFAULT NULL,
  `permanently_closed` tinyint(4) DEFAULT NULL,
  `temporarily_closed` tinyint(4) DEFAULT NULL,
  `place_id` varchar(255) DEFAULT NULL,
  `reviews_count` int(11) DEFAULT NULL,
  `reviews_one_star` int(11) DEFAULT NULL,
  `reviews_two_star` int(11) DEFAULT NULL,
  `reviews_three_star` int(11) DEFAULT NULL,
  `reviews_four_star` int(11) DEFAULT NULL,
  `reviews_five_star` int(11) DEFAULT NULL,
  `images_count` int(11) DEFAULT NULL,
  `scraped_at` date DEFAULT NULL,
  `reserve_table_url` varchar(255) DEFAULT NULL,
  `google_food_url` varchar(255) DEFAULT NULL,
  `hotel_stars` int(11) DEFAULT NULL,
  `hotel_description` text DEFAULT NULL,
  `check_in_date` date DEFAULT NULL,
  `check_out_date` date DEFAULT NULL,
  `similar_hotels_nearby` text DEFAULT NULL,
  `opening_hours` text DEFAULT NULL,
  `amenities` text DEFAULT NULL,
  `accepts_new_patients` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clinics`
--

INSERT INTO `clinics` (`clinic_id`, `url`, `title`, `description`, `price`, `category_name`, `address`, `neighborhood`, `street`, `city_id`, `postal_code`, `state`, `country_code`, `website`, `phone`, `phone_unformatted`, `claim_this_business`, `latitude`, `longitude`, `location_name`, `total_score`, `permanently_closed`, `temporarily_closed`, `place_id`, `reviews_count`, `reviews_one_star`, `reviews_two_star`, `reviews_three_star`, `reviews_four_star`, `reviews_five_star`, `images_count`, `scraped_at`, `reserve_table_url`, `google_food_url`, `hotel_stars`, `hotel_description`, `check_in_date`, `check_out_date`, `similar_hotels_nearby`, `opening_hours`, `amenities`, `accepts_new_patients`, `created_at`, `updated_at`) VALUES
(1, NULL, 'عيادة د.يوسف', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '423423423', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-02 05:00:50', '2023-09-02 06:06:44');

-- --------------------------------------------------------

--
-- Table structure for table `clinic_comments`
--

CREATE TABLE `clinic_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `clinic_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clinic_comments`
--

INSERT INTO `clinic_comments` (`id`, `clinic_id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'fsdf sd sd fsd fsd fsd f', '2023-09-02 08:20:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clinic_keywords`
--

CREATE TABLE `clinic_keywords` (
  `clinic_id` int(10) UNSIGNED NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clinic_requests`
--

CREATE TABLE `clinic_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `clinic_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `subcategory_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clinic_requests`
--

INSERT INTO `clinic_requests` (`id`, `clinic_id`, `user_id`, `subcategory_id`, `name`, `phone`, `whatsapp`, `description`, `notes`, `latitude`, `longitude`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 1, 1, 'عيادة د.محمد', '423423423', NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-02 05:18:58', 'approved'),
(2, 1, 1, 1, 'عيادة د.يوسف', '423423423', NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-02 06:06:44', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `clinic_subcategories`
--

CREATE TABLE `clinic_subcategories` (
  `clinic_id` int(10) UNSIGNED NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clinic_views`
--

CREATE TABLE `clinic_views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `clinic_id` bigint(20) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clinic_views`
--

INSERT INTO `clinic_views` (`id`, `clinic_id`, `ip`, `created_at`, `updated_at`) VALUES
(1, 1, '192.168.1.1', '2023-09-02 10:50:20', '2023-09-02 10:50:20'),
(2, 1, '192.168.1.2', '2023-09-02 10:50:20', '2023-09-02 10:50:20'),
(3, 1, '192.168.1.3', '2023-09-04 10:50:20', '2023-09-02 10:50:20'),
(4, 1, '192.168.1.4', '2023-09-05 10:50:20', '2023-09-02 10:50:20'),
(5, 1, '192.168.1.5', '2023-09-06 10:50:20', '2023-09-02 10:50:20'),
(6, 1, '192.168.1.6', '2023-09-07 10:50:20', '2023-09-02 10:50:20'),
(7, 1, '192.168.1.3', '2023-09-04 10:50:20', '2023-09-02 10:50:20'),
(8, 1, '192.168.1.3', '2023-09-04 10:50:20', '2023-09-02 10:50:20'),
(9, 1, '192.168.1.6', '2023-09-07 10:50:20', '2023-09-02 10:50:20'),
(10, 1, '192.168.1.6', '2023-09-07 10:50:20', '2023-09-02 10:50:20'),
(11, 1, '192.168.1.6', '2023-09-07 10:50:20', '2023-09-02 10:50:20'),
(12, 1, '192.168.1.6', '2023-09-07 10:50:20', '2023-09-02 10:50:20'),
(13, 1, '192.168.1.3', '2023-09-04 10:50:20', '2023-09-02 10:50:20'),
(14, 1, '192.168.1.6', '2023-09-07 10:50:20', '2023-09-02 10:50:20');

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
-- Table structure for table `geographicdata`
--

CREATE TABLE `geographicdata` (
  `city_id` int(10) UNSIGNED NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `geographicdata`
--

INSERT INTO `geographicdata` (`city_id`, `city`, `state`, `country_code`, `created_at`, `updated_at`) VALUES
(1, 'مكه', '-', '-', '2023-08-31 11:23:19', '2023-08-31 11:23:19');

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `id` int(10) UNSIGNED NOT NULL,
  `keyword` varchar(255) NOT NULL,
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_27_184533_create_categories_table', 1),
(6, '2023_08_27_185041_create_clinics_table', 1),
(7, '2023_08_27_190232_create_clinic_keywords_table', 1),
(8, '2023_08_27_190751_create_clinic_subcategories_table', 1),
(9, '2023_08_27_191046_create_geographicdata_table', 1),
(10, '2023_08_27_191533_create_keywords_table', 1),
(11, '2023_08_27_191747_create_peoplealsosearch_table', 1),
(12, '2023_08_27_192301_create_searchhistory_table', 1),
(13, '2023_08_27_192715_create_subcategories_table', 1),
(14, '2023_08_27_192949_create_usersubscriptions_table', 1),
(15, '2023_08_27_195643_create_admins_table', 1),
(16, '2023_08_28_212013_create_adds_table', 1),
(17, '2023_08_28_212117_create_add_translaitons_table', 1),
(18, '2023_08_29_173031_laratrust_setup_tables', 1),
(19, '2023_09_01_130152_create_clinic_requests_table', 2),
(20, '2023_09_01_131648_create_clinic_comments', 2),
(21, '2023_09_01_131920_create_clinic_views_table', 2),
(22, '2023_09_02_075359_add_status_to_clinic_requests_table', 3),
(23, '2023_09_02_104544_create_ads_view_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peoplealsosearch`
--

CREATE TABLE `peoplealsosearch` (
  `search_id` int(11) NOT NULL,
  `related_category` varchar(255) DEFAULT NULL,
  `related_title` varchar(255) DEFAULT NULL,
  `related_reviews_count` int(11) DEFAULT NULL,
  `related_total_score` decimal(5,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `path`, `created_at`, `updated_at`) VALUES
(1, 'read-dashboard', 'Read Dashboard', 'عرض لوحة التحكم', 'dashboard', '2023-08-31 11:19:17', '2023-08-31 11:19:17'),
(2, 'read-admin', 'Read Admin', 'عرض المسؤلين', 'admins', '2023-08-31 11:19:17', '2023-08-31 11:19:17'),
(3, 'create-admin', 'Create Admin', 'اضافة المسؤلين', 'admins', '2023-08-31 11:19:17', '2023-08-31 11:19:17'),
(4, 'update-admin', 'Update Admin', 'تعديل المسؤلين', 'admins', '2023-08-31 11:19:17', '2023-08-31 11:19:17'),
(5, 'delete-admin', 'Delete Admin', 'حذف المسؤلين', 'admins', '2023-08-31 11:19:17', '2023-08-31 11:19:17'),
(6, 'read-category ', 'Read Cagtegory ', 'عرض الاقسام', 'categories', '2023-08-31 11:19:17', '2023-08-31 11:19:17'),
(7, 'create-category ', 'Create Cagtegory ', 'اضافة الاقسام', 'categories', '2023-08-31 11:19:17', '2023-08-31 11:19:17'),
(8, 'update-category ', 'Update Cagtegory ', 'تعديل الاقسام', 'categories', '2023-08-31 11:19:17', '2023-08-31 11:19:17'),
(9, 'delete-category ', 'Delete Cagtegory ', 'حذف الاقسام', 'categories', '2023-08-31 11:19:17', '2023-08-31 11:19:17'),
(10, 'read-city ', 'Read City ', 'عرض المدن', 'cities', '2023-08-31 11:19:17', '2023-08-31 11:19:17'),
(11, 'create-city ', 'Create City ', 'اضافة المدن', 'cities', '2023-08-31 11:19:17', '2023-08-31 11:19:17'),
(12, 'update-city ', 'Update City ', 'تعديل المدن', 'cities', '2023-08-31 11:19:17', '2023-08-31 11:19:17'),
(13, 'delete-city ', 'Delete City ', 'حذف المدن', 'cities', '2023-08-31 11:19:17', '2023-08-31 11:19:17'),
(14, 'read-add ', 'Read Add ', 'عرض الاعلانات', 'adds', '2023-08-31 11:19:17', '2023-08-31 11:19:17'),
(15, 'create-add ', 'Create Add ', 'اضافة الاعلانات', 'adds', '2023-08-31 11:19:17', '2023-08-31 11:19:17'),
(16, 'update-add ', 'Update Add ', 'تعديل الاعلانات', 'adds', '2023-08-31 11:19:17', '2023-08-31 11:19:17'),
(17, 'delete-add ', 'Delete Add ', 'حذف الاعلانات', 'adds', '2023-08-31 11:19:17', '2023-08-31 11:19:17'),
(18, 'read-role', 'Read Role', 'عرض الادوار', 'roles', '2023-08-31 11:19:17', '2023-08-31 11:19:17'),
(19, 'create-role', 'Create Role', 'اضافة الادوار', 'roles', '2023-08-31 11:19:17', '2023-08-31 11:19:17'),
(20, 'update-role', 'Update Role', 'تعديل الادوار', 'roles', '2023-08-31 11:19:17', '2023-08-31 11:19:17'),
(21, 'delete-role', 'Delete Role', 'حذف الادوار', 'roles', '2023-08-31 11:19:17', '2023-08-31 11:19:17'),
(22, 'read-clinic_requests', 'Read Clnic requests', 'عرض تعديلات العيادات', 'clinic_requests', '2023-09-02 08:33:36', '2023-09-02 08:33:36'),
(23, 'read-clinic_comments', 'Read Clnic Comments', 'عرض تعليقات العيادات', 'clinic_comments', '2023-09-02 08:33:36', '2023-09-02 08:33:36');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'المدير', '-', '2023-08-31 11:21:39', '2023-08-31 11:21:51'),
(2, 'clinic_manager', 'مسؤل العيادات', '-', '2023-08-31 11:25:59', '2023-08-31 11:25:59');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(2, 2, 'App\\Models\\Admin');

-- --------------------------------------------------------

--
-- Table structure for table `searchhistory`
--

CREATE TABLE `searchhistory` (
  `search_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `search_string` varchar(255) NOT NULL,
  `rank` int(11) DEFAULT NULL,
  `search_page_url` varchar(255) DEFAULT NULL,
  `search_page_loaded_url` varchar(255) DEFAULT NULL,
  `is_advertisement` tinyint(4) DEFAULT NULL,
  `search_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'باطن', 'hfg', '2023-09-02 04:16:26', '2023-09-02 04:16:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `registratoin_date` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `registratoin_date`, `created_at`, `updated_at`) VALUES
(1, 'ali farag', '', 'ali@gmail.com', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usersubscriptions`
--

CREATE TABLE `usersubscriptions` (
  `subscription_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `subscription_type` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adds`
--
ALTER TABLE `adds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_translaitons`
--
ALTER TABLE `add_translaitons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `add_translaitons_add_id_foreign` (`add_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `ads_view`
--
ALTER TABLE `ads_view`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clinics`
--
ALTER TABLE `clinics`
  ADD PRIMARY KEY (`clinic_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `clinic_comments`
--
ALTER TABLE `clinic_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clinic_keywords`
--
ALTER TABLE `clinic_keywords`
  ADD PRIMARY KEY (`clinic_id`),
  ADD KEY `keyword_id` (`keyword_id`);

--
-- Indexes for table `clinic_requests`
--
ALTER TABLE `clinic_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clinic_subcategories`
--
ALTER TABLE `clinic_subcategories`
  ADD PRIMARY KEY (`clinic_id`),
  ADD KEY `subcategory_id` (`subcategory_id`);

--
-- Indexes for table `clinic_views`
--
ALTER TABLE `clinic_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `geographicdata`
--
ALTER TABLE `geographicdata`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `keywords_keyword_unique` (`keyword`);

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
-- Indexes for table `peoplealsosearch`
--
ALTER TABLE `peoplealsosearch`
  ADD KEY `search_id` (`search_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `searchhistory`
--
ALTER TABLE `searchhistory`
  ADD PRIMARY KEY (`search_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `usersubscriptions`
--
ALTER TABLE `usersubscriptions`
  ADD PRIMARY KEY (`subscription_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adds`
--
ALTER TABLE `adds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `add_translaitons`
--
ALTER TABLE `add_translaitons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ads_view`
--
ALTER TABLE `ads_view`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clinics`
--
ALTER TABLE `clinics`
  MODIFY `clinic_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clinic_comments`
--
ALTER TABLE `clinic_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clinic_keywords`
--
ALTER TABLE `clinic_keywords`
  MODIFY `clinic_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clinic_requests`
--
ALTER TABLE `clinic_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clinic_subcategories`
--
ALTER TABLE `clinic_subcategories`
  MODIFY `clinic_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clinic_views`
--
ALTER TABLE `clinic_views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `geographicdata`
--
ALTER TABLE `geographicdata`
  MODIFY `city_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `searchhistory`
--
ALTER TABLE `searchhistory`
  MODIFY `search_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usersubscriptions`
--
ALTER TABLE `usersubscriptions`
  MODIFY `subscription_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_translaitons`
--
ALTER TABLE `add_translaitons`
  ADD CONSTRAINT `add_translaitons_add_id_foreign` FOREIGN KEY (`add_id`) REFERENCES `adds` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
