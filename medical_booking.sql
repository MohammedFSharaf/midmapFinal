-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22 أبريل 2026 الساعة 13:56
-- إصدار الخادم: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical_booking`
--

-- --------------------------------------------------------

--
-- بنية الجدول `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `center_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'scheduled',
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `appointments`
--

INSERT INTO `appointments` (`id`, `center_id`, `patient_id`, `service_id`, `appointment_date`, `appointment_time`, `status`, `notes`, `created_at`, `updated_at`) VALUES
(6, 3, 8, 4, '2025-05-08', '15:12:00', 'scheduled', NULL, '2025-05-02 08:12:30', '2025-05-02 08:12:30'),
(7, 2, 9, 5, '2025-05-08', '02:06:00', 'scheduled', NULL, '2025-05-02 18:06:22', '2025-05-02 18:06:22'),
(8, 2, 11, 6, '2025-05-31', '21:35:00', 'scheduled', NULL, '2025-05-30 12:35:32', '2025-05-30 12:35:32');

-- --------------------------------------------------------

--
-- بنية الجدول `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('admin@admin.com|127.0.0.1', 'i:1;', 1762640428),
('admin@admin.com|127.0.0.1:timer', 'i:1762640428;', 1762640428),
('admin@xn--ogbw0cgj.com|127.0.0.1', 'i:1;', 1759070551),
('admin@xn--ogbw0cgj.com|127.0.0.1:timer', 'i:1759070551;', 1759070551),
('user@gmail.com|127.0.0.1', 'i:1;', 1759664751),
('user@gmail.com|127.0.0.1:timer', 'i:1759664751;', 1759664751),
('user@user.com|127.0.0.1', 'i:1;', 1762640397),
('user@user.com|127.0.0.1:timer', 'i:1762640397;', 1762640397),
('user1@admin.com|127.0.0.1', 'i:1;', 1760823932),
('user1@admin.com|127.0.0.1:timer', 'i:1760823932;', 1760823932),
('user1@gamail.com|127.0.0.1', 'i:1;', 1762640416),
('user1@gamail.com|127.0.0.1:timer', 'i:1762640416;', 1762640416),
('user1@user.com|127.0.0.1', 'i:1;', 1762640403),
('user1@user.com|127.0.0.1:timer', 'i:1762640403;', 1762640403),
('user2@gmail.com|127.0.0.1', 'i:1;', 1762643410),
('user2@gmail.com|127.0.0.1:timer', 'i:1762643410;', 1762643410),
('user2@user.com|127.0.0.1', 'i:1;', 1762643399),
('user2@user.com|127.0.0.1:timer', 'i:1762643399;', 1762643399);

-- --------------------------------------------------------

--
-- بنية الجدول `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'testa', 'xQHOghgCFraGj1mlxLETuzmif5g9rqVEdo9L215z.jpg', 'inactive', '2025-05-01 10:43:27', '2025-05-01 17:14:27'),
(3, 's', 'FlvW5OzNuFJLVCwsPYfSqxKpa2qW7At9qoPXr5eq.jpg', 'inactive', '2025-05-01 12:47:04', '2025-05-01 17:14:27'),
(4, 'Pediatrics Clinics', 'LVth8O6Z78fxzPsQVw6HlpKdSFF5zS9Yna9F6l90.jpg', 'active', '2025-05-01 17:13:15', '2025-05-01 17:13:15'),
(5, 'Dental Clinics', 'eTzQKgc0uqiscHflk8ReNUy6wkrglxSkFeB347NR.jpg', 'active', '2025-05-01 17:13:29', '2025-05-01 17:13:29'),
(6, 'General Clinics', 'ShGOEuGXJiK58n2pyM8dmTVDBJOX5H5uPfD3CvpL.jpg', 'active', '2025-05-01 17:13:49', '2025-05-01 17:13:49'),
(7, 'Dermatology Clinics', 'kxUYiRP3CkazlzmacbmsvMU0eaj2ZiI8OTbldfdK.jpg', 'active', '2025-05-01 17:14:08', '2025-05-01 17:14:08'),
(8, 'Gynecology Clinics', 'HPZ8pLegLiNOxJBBHLEQs3x93fxDxEEG00JH2gfY.jpg', 'active', '2025-05-01 17:14:23', '2025-05-01 17:14:23');

-- --------------------------------------------------------

--
-- بنية الجدول `centers`
--

CREATE TABLE `centers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'active',
  `category_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `center_logo` varchar(255) DEFAULT NULL,
  `center_name` varchar(255) DEFAULT NULL,
  `center_address` varchar(255) DEFAULT NULL,
  `overview` text DEFAULT NULL,
  `timezone` varchar(255) DEFAULT NULL,
  `facebook_url` varchar(255) DEFAULT NULL,
  `twitter_url` varchar(255) DEFAULT NULL,
  `instagram_url` varchar(255) DEFAULT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `youtube_url` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `currency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `maintenance_mode` tinyint(1) NOT NULL DEFAULT 0,
  `latitude` varchar(100) DEFAULT NULL,
  `longitude` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `centers`
--

INSERT INTO `centers` (`id`, `status`, `category_id`, `country_id`, `city_id`, `user_id`, `center_logo`, `center_name`, `center_address`, `overview`, `timezone`, `facebook_url`, `twitter_url`, `instagram_url`, `linkedin_url`, `youtube_url`, `phone`, `created_at`, `updated_at`, `currency_id`, `maintenance_mode`, `latitude`, `longitude`) VALUES
(2, 'active', 5, 1, 1, 10, 'N9UjQ9GUFALO0kMqPXAJ471C0vZvy4ZDGoLZF4EE.jpg', 'one1', 'Gaza', '<h3><strong>About Us</strong></h3><p>Hello, we are <strong>[Your Clinic Name]</strong>.</p><p>We specialize in <strong>General Medicine, Pediatric Care, Dental Services, Dermatology, and much more...</strong></p><p>Our team of experienced doctors and medical staff are committed to providing the best care for you and your family.</p><p>We have been serving the community for over <strong>X years</strong> and have built a reputation for compassionate, efficient, and high-quality healthcare. Whether it\'s a routine checkup, specialized treatment, or emergency care, we are here to support your health and wellbeing.</p><p>If you have any special medical requests or need personalized care, feel free to contact us. We strive to offer fast, responsive service and ensure all your needs are met in a professional and timely manner.</p><p><strong>Contact Us:</strong></p><p>Phone: [Phone Number]</p><p>Email: [email@example.com]</p><p>You can also reach us on Instagram for faster responses. Follow us and send a message – we’ll respond within 30 minutes. Please note that messages from non-followers go to the other folder, and may not be seen immediately.</p><p><strong>Follow us on Instagram!</strong></p><p>Thank you for trusting us with your health.</p><h3><strong>Our Services:</strong></h3><p>At <strong>[Your Clinic Name]</strong>, we offer a wide range of services to meet all your healthcare needs:</p><p><strong>General Medicine</strong>: Comprehensive care for everyday health concerns.</p><p><strong>Pediatrics</strong>: Expert care for children’s health, from infancy to adolescence.</p><p><strong>Dental Care</strong>: Preventative care, fillings, cleanings, and more.</p><p><strong>Dermatology</strong>: Skin health and aesthetic treatments.</p><p>We use the latest medical technology and techniques to ensure your treatment is always effective and safe. Your health is our priority!</p><p><strong>My Skills</strong>:</p><p><strong>Highly Trained Medical Professionals</strong></p><p><strong>Advanced Medical Equipment and Technology</strong></p><p><strong>Comprehensive Care in Multiple Disciplines</strong></p><p><strong>Patient-Centered Service</strong></p><p><strong>Quick Response and Care</strong></p><p><strong>Comprehensive Health Packages</strong></p><p>We are dedicated to providing <strong>clean, efficient, and compassionate healthcare</strong> for you and your loved ones.</p>', NULL, 'googel.com', 'googel.com', 'googel.com', NULL, 'googel.com', '1111', '2025-05-01 19:56:28', '2025-09-10 08:12:55', 1, 0, '31.393086341164487', '34.29957444510669'),
(3, 'active', 5, 1, 2, 11, '7G8TwKA0HkuqwDz3Gi1zYJoEzOZPtTA30VTWTp32.jpg', 'clinic 22', 'street/aa', '<h3><strong>About Us</strong></h3><p>Hello, we are <strong>[Your Clinic Name]</strong>.</p><p>We specialize in <strong>General Medicine, Pediatric Care, Dental Services, Dermatology, and much more...</strong></p><p>Our team of experienced doctors and medical staff are committed to providing the best care for you and your family.</p><p>We have been serving the community for over <strong>X years</strong> and have built a reputation for compassionate, efficient, and high-quality healthcare. Whether it\'s a routine checkup, specialized treatment, or emergency care, we are here to support your health and wellbeing.</p><p>If you have any special medical requests or need personalized care, feel free to contact us. We strive to offer fast, responsive service and ensure all your needs are met in a professional and timely manner.</p><p><strong>Contact Us:</strong></p><p>Phone: [Phone Number]</p><p>Email: [email@example.com]</p><p>You can also reach us on Instagram for faster responses. Follow us and send a message – we’ll respond within 30 minutes. Please note that messages from non-followers go to the other folder, and may not be seen immediately.</p><p><strong>Follow us on Instagram!</strong></p><p>Thank you for trusting us with your health.</p><h3><strong>Our Services:</strong></h3><p>At <strong>[Your Clinic Name]</strong>, we offer a wide range of services to meet all your healthcare needs:</p><p><strong>General Medicine</strong>: Comprehensive care for everyday health concerns.</p><p><strong>Pediatrics</strong>: Expert care for children’s health, from infancy to adolescence.</p><p><strong>Dental Care</strong>: Preventative care, fillings, cleanings, and more.</p><p><strong>Dermatology</strong>: Skin health and aesthetic treatments.</p><p>We use the latest medical technology and techniques to ensure your treatment is always effective and safe. Your health is our priority!</p><p><strong>My Skills</strong>:</p><p><strong>Highly Trained Medical Professionals</strong></p><p><strong>Advanced Medical Equipment and Technology</strong></p><p><strong>Comprehensive Care in Multiple Disciplines</strong></p><p><strong>Patient-Centered Service</strong></p><p><strong>Quick Response and Care</strong></p><p><strong>Comprehensive Health Packages</strong></p><p>We are dedicated to providing <strong>clean, efficient, and compassionate healthcare</strong> for you and your loved ones.</p>', NULL, 'www.googel.com', 'https://www.instagram.com/', 'www.googel.com', NULL, 'www.googel.com', '2344', '2025-05-02 08:06:50', '2025-05-05 09:43:39', 3, 0, '31.45389127622992', '34.376620270940556'),
(4, 'active', 6, 1, 2, 12, 'tVpV5di280szw6IxvHlDk1vxCeGojg11SVqbE3Yd.jpg', 'Clinic3', 'tstest/ street /.....', '<h3><strong>About Us</strong></h3><p>Hello, we are <strong>[Your Clinic Name]</strong>.</p><p>We specialize in <strong>General Medicine, Pediatric Care, Dental Services, Dermatology, and much more...</strong></p><p>Our team of experienced doctors and medical staff are committed to providing the best care for you and your family.</p><p>We have been serving the community for over <strong>X years</strong> and have built a reputation for compassionate, efficient, and high-quality healthcare. Whether it\'s a routine checkup, specialized treatment, or emergency care, we are here to support your health and wellbeing.</p><p>If you have any special medical requests or need personalized care, feel free to contact us. We strive to offer fast, responsive service and ensure all your needs are met in a professional and timely manner.</p><p><strong>Contact Us:</strong></p><p>Phone: [Phone Number]</p><p>Email: [email@example.com]</p><p>You can also reach us on Instagram for faster responses. Follow us and send a message – we’ll respond within 30 minutes. Please note that messages from non-followers go to the other folder, and may not be seen immediately.</p><p><strong>Follow us on Instagram!</strong></p><p>Thank you for trusting us with your health.</p><h3><strong>Our Services:</strong></h3><p>At <strong>[Your Clinic Name]</strong>, we offer a wide range of services to meet all your healthcare needs:</p><p><strong>General Medicine</strong>: Comprehensive care for everyday health concerns.</p><p><strong>Pediatrics</strong>: Expert care for children’s health, from infancy to adolescence.</p><p><strong>Dental Care</strong>: Preventative care, fillings, cleanings, and more.</p><p><strong>Dermatology</strong>: Skin health and aesthetic treatments.</p><p>We use the latest medical technology and techniques to ensure your treatment is always effective and safe. Your health is our priority!</p><p><strong>My Skills</strong>:</p><p><strong>Highly Trained Medical Professionals</strong></p><p><strong>Advanced Medical Equipment and Technology</strong></p><p><strong>Comprehensive Care in Multiple Disciplines</strong></p><p><strong>Patient-Centered Service</strong></p><p><strong>Quick Response and Care</strong></p><p><strong>Comprehensive Health Packages</strong></p><p>We are dedicated to providing <strong>clean, efficient, and compassionate healthcare</strong> for you and your loved ones.</p>', NULL, 'https://www.instagram.com/', 'v', 'https://www.instagram.com/', NULL, 'https://www.instagram.com/', '3216549852', '2025-05-03 19:30:12', '2025-05-04 19:07:21', 2, 0, '31.361375952835154', '34.268324116524404'),
(5, 'active', 4, 3, 6, 14, 'iawtLwJXT1mOX2qIX2lbOBeae5sdOULJEkkb42pW.jpg', 'clinic 5', 'Gaza', NULL, NULL, NULL, NULL, 'www.googel.com', NULL, 'googel.com', '5354906902', '2025-05-04 19:29:54', '2025-09-04 14:27:40', 1, 0, '31.34405629308882', '34.246166477913405'),
(8, 'active', 4, 1, 2, 17, 'e6LamExFNfPMyGeTQO9Eg8fwqUBeAVuFbFIN7aRg.jpg', 'test', 'Gaza', '<h4><strong>وصف</strong><br>وصف<br>وصف<br>وصف<br>وصف<br>وصف<br>&nbsp;</h4>', NULL, 'https://www.instagram.com/', 'https://www.instagram.com/', 'googel.com', NULL, 'googel.com', '5354906902', '2025-11-08 21:09:50', '2025-11-08 21:13:58', 3, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(250) DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `cities`
--

INSERT INTO `cities` (`id`, `name`, `country_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Riyadh', 1, 'active', NULL, NULL),
(2, 'Jeddah', 1, 'active', NULL, NULL),
(3, 'Cairo', 2, 'active', NULL, NULL),
(4, 'Alexandria', 2, 'active', NULL, NULL),
(5, 'New York', 3, 'active', NULL, NULL),
(6, 'Los Angeles', 3, 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `countries`
--

INSERT INTO `countries` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Saudi Arabia', 'active', NULL, '2025-05-01 13:38:09'),
(2, 'Egypt', 'active', NULL, '2025-05-01 13:38:08'),
(3, 'United States', 'active', NULL, '2025-05-01 13:38:09');

-- --------------------------------------------------------

--
-- بنية الجدول `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `symbol` varchar(255) DEFAULT NULL,
  `exchange_rate` float NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `currencies`
--

INSERT INTO `currencies` (`id`, `code`, `name`, `symbol`, `exchange_rate`, `created_at`, `updated_at`) VALUES
(1, 'USD', 'US Dollar', '$', 1, NULL, NULL),
(2, 'EUR', 'Euro', '€', 0.9, NULL, NULL),
(3, 'GBP', 'British Pound', '£', 0.78, NULL, NULL),
(4, 'JPY', 'Japanese Yen', '¥', 110.5, NULL, NULL),
(5, 'SAR', 'Saudi Riyal', '﷼', 3.75, NULL, NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `failed_jobs`
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
-- بنية الجدول `jobs`
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
-- بنية الجدول `job_batches`
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
-- بنية الجدول `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `description`, `created_at`, `updated_at`) VALUES
(2, '‪Mohammed Atta‬‏', 'drb2014.m@gmail.com', 'a', 'a', '2025-05-01 17:56:45', '2025-05-01 17:56:45'),
(3, '‪Mohammed Atta‬‏', 'drb2014.m@gmail.com', 'aa', 'aa', '2025-05-01 17:57:42', '2025-05-01 17:57:42'),
(4, '‪Mohammed Atta‬‏', 'drb2014.m@gmail.com', 'daf', 'afafada', '2025-05-30 12:39:51', '2025-05-30 12:39:51');

-- --------------------------------------------------------

--
-- بنية الجدول `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_12_03_141337_create_centers_table', 1),
(5, '2024_12_03_141748_add_center_to_users_table', 1),
(6, '2024_12_03_200754_create_currencs_table', 1),
(7, '2024_12_03_201857_create_currencies_table', 2),
(9, '2024_12_03_205039_add_fields_to_centers_table', 3),
(12, '2024_12_03_220807_add_user_id_to_centers_table', 4),
(13, '2024_12_04_133419_create_patients_table', 5),
(14, '2024_12_04_145442_create_countries_table', 6),
(15, '2024_12_04_145503_create_cities_table', 6),
(16, '2024_12_05_152153_create_services_table', 7),
(17, '2024_12_05_190734_create_appointments_table', 8),
(18, '2024_12_07_161747_create_sites_table', 9),
(19, '2024_12_08_223842_create_sliders_table', 10),
(20, '2024_12_09_195642_create_orders_table', 11),
(21, '2025_04_30_221837_create_categories_table', 12),
(22, '2025_05_01_204619_create_messages_table', 13),
(23, '2025_09_10_104748_add_lat_and_lan_to_centers', 14),
(24, '2025_10_03_151152_create_ratings_table', 15);

-- --------------------------------------------------------

--
-- بنية الجدول `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `ser_id` bigint(20) UNSIGNED DEFAULT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `center_id` int(11) DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `appointment_time` time DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `gender`, `ser_id`, `service_id`, `center_id`, `appointment_date`, `appointment_time`, `status`, `notes`, `created_at`, `updated_at`) VALUES
(15, '‪Mohammed Atta‬‏', 'drb2014.m@gmail.com', '5354906902', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, '2025-05-03 19:43:14', '2025-05-03 19:43:14'),
(16, '‪Mohammed Atta‬‏', 'drb2014.m@gmail.com', '5354906902', NULL, NULL, 4, 3, NULL, NULL, NULL, NULL, '2025-05-03 19:44:34', '2025-05-03 19:44:34'),
(17, '‪Mohammed Atta‬‏', 'drb2014.m@gmail.com', '5354906902', 'male', NULL, 7, 4, NULL, NULL, NULL, NULL, '2025-05-03 19:48:35', '2025-05-03 19:48:35'),
(18, '‪Mohammed Atta‬‏', 'drb2014.m@gmail.com', '5354906902', 'male', NULL, 5, 2, '2025-05-31', NULL, 'scheduled', 'lvda', '2025-05-30 12:31:43', '2025-05-30 12:33:06'),
(19, 'POS', NULL, '852', 'female', NULL, 5, 2, '2025-09-11', NULL, NULL, 'S', '2025-09-04 14:33:06', '2025-09-04 14:33:06'),
(20, 'a', 'drb2014.m@gmail.com', '5354906902', NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, '2025-09-10 10:12:02', '2025-09-10 10:12:02'),
(21, '‪Mohammed Atta‬‏aaa', 'drb2014.m@gmail.com', '5354906902', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, '2025-09-10 10:15:50', '2025-09-10 10:15:50'),
(22, '‪Mohammed Atta‬‏', 'drb2014.m@gmail.com', '5354906902', 'male', NULL, 5, 2, NULL, NULL, NULL, NULL, '2025-09-28 13:05:30', '2025-09-28 13:05:30');

-- --------------------------------------------------------

--
-- بنية الجدول `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `medical_history` text DEFAULT NULL,
  `blood_type` varchar(255) DEFAULT NULL,
  `allergies` text DEFAULT NULL,
  `center_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `patients`
--

INSERT INTO `patients` (`id`, `name`, `email`, `phone`, `gender`, `date_of_birth`, `address`, `city`, `state`, `country`, `medical_history`, `blood_type`, `allergies`, `center_id`, `created_at`, `updated_at`) VALUES
(8, 'patient1', 'pati@gmail.com', '1234', 'male', '2025-04-30', 'Gaza', '3', NULL, '2', NULL, NULL, NULL, 3, '2025-05-02 08:11:52', '2025-05-02 08:11:52'),
(9, 'one', 'drb2014.m@gmail.com', '11', 'male', '2025-05-29', 'Gaza', NULL, NULL, '1', NULL, NULL, NULL, 2, '2025-05-02 18:03:09', '2025-05-02 18:06:02'),
(10, 'tow', 'drb20142@gmail.com', '22', 'male', '2025-05-21', '2', '3', NULL, '2', NULL, NULL, NULL, 2, '2025-05-02 18:04:29', '2025-05-02 18:05:48'),
(11, '‪Mohammed Atta‬‏', 'drb2m@gmail.com', '5354906902', 'male', '2025-05-31', 'Gaza', NULL, NULL, '2', NULL, NULL, NULL, 2, '2025-05-30 12:35:00', '2025-05-30 12:35:00'),
(12, '‪Mohammed Atta‬‏', 'drm@gmail.com', '33', 'male', '2025-11-05', 'Gaza', '3', NULL, '2', NULL, NULL, NULL, 8, '2025-11-08 21:11:30', '2025-11-08 21:11:30');

-- --------------------------------------------------------

--
-- بنية الجدول `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `center_id` bigint(20) UNSIGNED NOT NULL,
  `rating` tinyint(4) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `ratings`
--

INSERT INTO `ratings` (`id`, `center_id`, `rating`, `comment`, `ip_address`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 5, NULL, '127.0.0.1', 'active', '2025-10-03 12:36:25', '2025-10-03 12:36:25'),
(2, 3, 4, 'ss', '127.0.0.1', 'active', '2025-10-03 12:37:41', '2025-10-03 12:37:41'),
(3, 2, 3, NULL, '127.0.0.1', 'active', '2025-10-03 12:46:44', '2025-10-03 12:46:44');

-- --------------------------------------------------------

--
-- بنية الجدول `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `center_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `duration` int(11) NOT NULL COMMENT 'Duration in minutes',
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `services`
--

INSERT INTO `services` (`id`, `center_id`, `name`, `description`, `price`, `duration`, `is_active`, `created_at`, `updated_at`) VALUES
(4, 3, 'Medical consultation', 'Description Description Description', 20.00, 50, 1, '2025-05-02 08:09:17', '2025-05-02 08:09:28'),
(5, 2, 'medical review', 'medical review', 20.00, 20, 1, '2025-05-02 17:33:52', '2025-09-04 14:16:50'),
(6, 2, 'Medical consultation', 'Medical consultation', 30.00, 50, 1, '2025-05-02 18:02:36', '2025-05-30 12:33:27'),
(7, 4, 'test', 'Description Description', 22.00, 24, 1, '2025-05-03 19:47:44', '2025-05-03 19:47:44'),
(8, 8, 'service 1', NULL, 22.00, 22, 1, '2025-11-08 21:10:38', '2025-11-08 21:10:38'),
(9, 8, 'service 2', NULL, 33.00, 33, 1, '2025-11-08 21:10:51', '2025-11-08 21:10:51');

-- --------------------------------------------------------

--
-- بنية الجدول `sessions`
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
-- إرجاع أو استيراد بيانات الجدول `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('8EXKkpNwW0Tm18HxysM4FCWCgaq4M6zW6GK8zmCN', 17, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTFJBRTlxZlhYb1pFTU5lMlVodzhaVEF2bGJPZjhDNGVtN1NzNGRHViI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jZW50ZXIvOCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE3O30=', 1762643660),
('BZ2Vn9HP1ZBUCiisueXNEdqi8w0BpHRx4ysCSZz8', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieHI3azRGcFo4MUVwVmtOWUlObEhKR1pzam9xV1BiQXhlWVRQT1hsQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1764880210),
('Hqsh0WX8VbnfFO3x1Agn76auwyzixupEsnZqghHL', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieW93b0x6V0VRV2ZXNms5Q0hGUTYyODNONWNCQ1lFaWhkOGw2cWVzYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jZW50ZXJzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1776858253),
('Y4ZizR7tPCYm2HhC0a2o2ddT7Q20rq7Adc9qlAjb', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV0x5VFBEYmQ1OUZDT045UFVvUkhXdlRDT0xTdng1YWI5SVVvVzdJUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jZW50ZXJzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1773772953);

-- --------------------------------------------------------

--
-- بنية الجدول `sites`
--

CREATE TABLE `sites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `center_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `site_logo` varchar(255) DEFAULT NULL,
  `footer_logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `title1` text DEFAULT NULL,
  `title2` text DEFAULT NULL,
  `title3` text DEFAULT NULL,
  `text1` text DEFAULT NULL,
  `text2` text DEFAULT NULL,
  `text21` text DEFAULT NULL,
  `text3` text DEFAULT NULL,
  `num1` int(11) DEFAULT NULL,
  `num2` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `slider_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `users`
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
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `center_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `center_id`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$12$3peNoFpU.Ca3KCXp7tuGsudOnIGQNx4xGXRRtb01eZ4IKIlbWQNZy', NULL, '2024-12-03 12:54:51', '2024-12-03 12:54:51', 'admin', NULL),
(10, 'one1', 'user1@gmail.com', NULL, '$2y$12$0jzHdJ3rPXRiTpOHdEOayenYnEGirbc27EZ5HUsJYgM/GFgg5i27m', NULL, '2025-05-01 19:56:28', '2025-05-01 19:56:28', 'user', NULL),
(11, 'user2', 'user2@gmail.com', NULL, '$2y$12$kgZ35N7qPtlkz3Vp60AxPebNZwBMgZZWOUO7HYFYud1asQo8gtIBy', NULL, '2025-05-02 08:06:50', '2025-05-02 08:06:50', 'user', NULL),
(12, 'user3', 'user3@gmail.com', NULL, '$2y$12$RFE5QPSMWJIctSnBQaRU0eKuDphvXYFnk9/Gwbo/8/h0c2T4lrT2K', NULL, '2025-05-03 19:30:12', '2025-05-03 19:30:12', 'user', NULL),
(13, 'user4', 'user4@gmail.com', NULL, '$2y$12$5NQKG/Vc0RxKXZ33zovVuexSUiM8il6pJHrMo9AVIDXk6NA6wilnO', NULL, '2025-05-04 19:27:46', '2025-05-04 19:27:46', 'user', NULL),
(14, 'user5', 'user5@gmail.com', NULL, '$2y$12$kamgvf4S53iBztgcn0yl/u0dDuT8.HggYd3c6x/kRzWrJtioBH.KG', NULL, '2025-05-04 19:29:54', '2025-05-04 19:29:54', 'user', NULL),
(15, '22', 'drb2014.m@gmail.com', NULL, '$2y$12$lOuKWKebQHYqoSYqJEeT9eEmOyGyU/tc53lRsDJOPLleLvtxcC32i', NULL, '2025-05-05 09:44:12', '2025-05-05 09:44:12', 'user', NULL),
(16, 'usrof1', 'os1@gmail.com', NULL, '$2y$12$cU5zGBuv5Irf3dV3l5aZ0.muLl53BJmrNRNti6RmQ3JzybVd7Lcxy', NULL, '2025-09-10 08:45:12', '2025-09-10 08:45:12', 'user', NULL),
(17, '‪Mohammed Atta‬‏', 'user@user.com', NULL, '$2y$12$Scm2qnNEXABqZ9FmwDHe/uCMbbaUxJGogh10u21VJjejHurdbQ0sC', NULL, '2025-11-08 21:09:50', '2025-11-08 21:09:50', 'user', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_center_id_foreign` (`center_id`),
  ADD KEY `appointments_patient_id_foreign` (`patient_id`),
  ADD KEY `appointments_service_id_foreign` (`service_id`);

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `centers`
--
ALTER TABLE `centers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `centers_currency_id_foreign` (`currency_id`),
  ADD KEY `centers_user_id_foreign` (`user_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_country_id_foreign` (`country_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `currencies_code_unique` (`code`);

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
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_site_id_foreign` (`ser_id`),
  ADD KEY `orders_service_id_foreign` (`service_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patients_email_unique` (`email`),
  ADD KEY `patients_center_id_foreign` (`center_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_center_id_foreign` (`center_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_center_id_foreign` (`center_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sites_slug_unique` (`slug`),
  ADD KEY `sites_center_id_index` (`center_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sliders_site_id_index` (`site_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_center_id_foreign` (`center_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `centers`
--
ALTER TABLE `centers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- قيود الجداول المُلقاة.
--

--
-- قيود الجداول `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_center_id_foreign` FOREIGN KEY (`center_id`) REFERENCES `centers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `centers`
--
ALTER TABLE `centers`
  ADD CONSTRAINT `centers_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`),
  ADD CONSTRAINT `centers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_site_id_foreign` FOREIGN KEY (`ser_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_center_id_foreign` FOREIGN KEY (`center_id`) REFERENCES `centers` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_center_id_foreign` FOREIGN KEY (`center_id`) REFERENCES `centers` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_center_id_foreign` FOREIGN KEY (`center_id`) REFERENCES `centers` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `sites`
--
ALTER TABLE `sites`
  ADD CONSTRAINT `sites_center_id_foreign` FOREIGN KEY (`center_id`) REFERENCES `centers` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `sliders`
--
ALTER TABLE `sliders`
  ADD CONSTRAINT `sliders_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_center_id_foreign` FOREIGN KEY (`center_id`) REFERENCES `centers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
