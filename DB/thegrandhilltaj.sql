-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2022 at 04:59 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thegrandhilltaj`
--

-- --------------------------------------------------------

--
-- Table structure for table `billings`
--

CREATE TABLE `billings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `booking_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alternative_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addreas` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billings`
--

INSERT INTO `billings` (`id`, `user_id`, `booking_id`, `name`, `email`, `mobile`, `alternative_mobile`, `nid`, `addreas`, `notes`, `created_at`, `updated_at`) VALUES
(31, 1, 1033, 'Sohag', 'mahafijursohag@gmail.com', '01723019475', NULL, '123', 'Merul Badda, Dhaka', 'test', '2022-01-12 19:49:29', '2022-01-12 19:49:29'),
(32, 1, 1034, 'Sohag', 'mahafijursohag@gmail.com', '01717172300', NULL, NULL, 'Thakurgaon', 'test2', '2022-01-12 19:57:07', '2022-01-12 19:57:07'),
(33, 1, 1035, 'Rahul', NULL, '01724700421', '01724700421', '0', 'Dhaka', NULL, '2022-01-17 06:23:32', '2022-01-17 06:23:32'),
(34, 1, 1036, 'Rahul', NULL, '01724700421', '01724700421', NULL, 'Dhaka', NULL, '2022-01-17 06:25:04', '2022-01-17 06:25:04'),
(35, 1, 1037, 'Tanvir', NULL, '01890263560', '01890263560', NULL, 'Dhaka', NULL, '2022-01-17 06:26:49', '2022-01-17 06:26:49'),
(36, 1, 1038, 'Farid Ahammed', NULL, '01739635665', '01739635665', NULL, 'Dhaka', NULL, '2022-01-17 06:28:16', '2022-01-17 06:28:16'),
(37, 1, 1039, 'NUR AHAMMED', NULL, '01920988017', '15e200', NULL, 'Dhaka', NULL, '2022-01-25 08:40:28', '2022-01-25 08:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `is_admin` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `checkin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkout` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `after_discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `original_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booking_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `still_dues` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cash',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `checkin`, `checkout`, `vat`, `tax`, `total_price`, `after_discount`, `original_amount`, `booking_type`, `paid_amount`, `still_dues`, `payment_method`, `status`, `created_at`, `updated_at`) VALUES
(1033, 1, '2022-01-13', '2022-01-14', NULL, NULL, '12000', '8000', '8000', 'booking', '7000', '1000', 'cash', 'pending', '2022-01-12 19:49:29', '2022-01-12 19:58:47'),
(1034, 1, '2022-01-14', '2022-01-15', NULL, NULL, '12000', '8000', '8000', 'rent', '8000', '0', 'DBBL', 'pending', '2022-01-12 19:57:07', '2022-01-12 19:59:53'),
(1035, 1, '2022-01-17', '2022-01-19', '00', NULL, '8000', '5000', '5000', 'rent', '00', '5000', 'cash', 'pending', '2022-01-17 06:23:32', '2022-01-17 06:23:32'),
(1036, 1, '2022-01-17', '2022-01-19', NULL, NULL, '3500', '2500', '2500', 'rent', '00', '2500', 'cash', 'pending', '2022-01-17 06:25:04', '2022-01-17 06:25:04'),
(1037, 1, '2022-01-21', '2022-01-22', NULL, NULL, '8000', '5000', '5000', 'rent', '00', '5000', 'cash', 'pending', '2022-01-17 06:26:49', '2022-01-17 06:26:49'),
(1038, 1, '2022-01-22', '2022-01-23', NULL, NULL, '12000', '8000', '8000', 'rent', '1000', '7000', 'cash', 'pending', '2022-01-17 06:28:16', '2022-01-17 06:28:16'),
(1039, 1, '2022-01-25', '2022-01-26', NULL, NULL, '12000', '8000', '8000', 'rent', '5000', '3000', 'cash', 'pending', '2022-01-25 08:40:28', '2022-01-25 08:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `person` int(11) DEFAULT NULL,
  `booking_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checkin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checkout` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`id`, `booking_id`, `room_id`, `person`, `booking_type`, `checkin`, `checkout`, `status`, `created_at`, `updated_at`) VALUES
(47, 1033, 13, 2, 'booking', '2022-01-13', '2022-01-14', 'pending', '2022-01-12 19:49:29', '2022-01-12 19:49:29'),
(48, 1034, 13, 1, 'booking', '2022-01-14', '2022-01-15', 'pending', '2022-01-12 19:57:07', '2022-01-12 19:57:07'),
(49, 1035, 8, 4, 'rent', '2022-01-17', '2022-01-19', 'pending', '2022-01-17 06:23:32', '2022-01-17 06:23:32'),
(50, 1036, 10, 2, 'rent', '2022-01-17', '2022-01-19', 'pending', '2022-01-17 06:25:04', '2022-01-17 06:25:04'),
(51, 1037, 20, 2, 'rent', '2022-01-21', '2022-01-22', 'pending', '2022-01-17 06:26:49', '2022-01-17 06:26:49'),
(52, 1038, 18, 0, 'rent', '2022-01-22', '2022-01-23', 'pending', '2022-01-17 06:28:16', '2022-01-17 06:28:16'),
(53, 1039, 17, 2, 'rent', '2022-01-25', '2022-01-26', 'pending', '2022-01-25 08:40:28', '2022-01-25 08:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `cartId` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payable_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `room_id`, `cartId`, `price`, `payable_amount`, `discount_price`, `person`, `created_at`, `updated_at`) VALUES
(65, 8, 'cdYPU413', '8000', '5000', '5000', '1', '2022-01-29 19:30:30', '2022-01-29 19:30:30');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(11, 'DELUXE COUPLE AC ROOM', '2021-12-25 03:56:27', '2021-12-25 03:56:27'),
(12, 'DELUXE COUPLE NON AC ROOM', '2021-12-25 03:56:57', '2021-12-25 03:56:57'),
(13, 'TWIN AC ROOM', '2021-12-25 03:57:01', '2021-12-25 03:57:01'),
(14, 'TWIN NON AC ROOM', '2021-12-25 03:57:06', '2021-12-25 03:57:06');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '\'1\'',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `address`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Avye Hobbs', 'xizalix@mailinator.com', '+1 (309) 175-1513', 'Repudiandae sint et', 'Consequat Ullamco v', '\'1\'', '2021-11-18 17:14:52', '2021-11-18 17:14:52'),
(2, 'Gregory Christian', 'pymucysav@mailinator.com', '+1 (729) 863-5911', 'Harum veritatis magn', 'Reiciendis excepteur', '\'1\'', '2021-11-20 08:16:57', '2021-11-20 08:16:57'),
(6, 'Md. Mahafijur Rahman Sohag', 'mahafijursohag@gmail.com', '01723019475', 'Kadosuka, Kalmegh, Baliadangi', 'Test', '\'1\'', '2021-12-07 18:49:24', '2021-12-07 18:49:24'),
(7, 'Maurine Tazewell', 'tazewell.maurine@msn.com', '071 355 67 86', 'Postfach 99', 'Hi , \r\n\r\nI don’t need to tell you how important it is to optimize every step in your SEO pipeline. \r\n\r\nBut unfortunately, it’s nearly impossible to cut out time or money when it comes to getting good content.\r\n\r\nAt least that’s what I thought until I came across Article Forge...\r\n\r\nBuilt by a team of AI researchers from MIT, Carnegie Mellon, Harvard, Article Forge is an artificial intelligence (AI) powered content writer that uses deep learning models to write entire articles about any topic in less than 60 seconds.\r\n\r\nTheir team trained AI models on millions of articles to teach Article Forge how to draw connections between topics so that each article it writes is relevant, interesting and useful.\r\n\r\nAll their hard work means you just enter a few keywords and Article Forge will write a complete article from scratch making sure every thought flows naturally into the next, resulting in readable, high quality, and unique content.\r\n\r\nPut simply, this is a secret weapon for anyone who needs content.\r\n\r\nI get how impossible that sounds so you need to see how Article Forge writes a complete article in less than 60 seconds! =>> https://myarticleforge.blogspot.com/\r\n\r\nI had to share this with you because I know this will be a game changer for your business.\r\n\r\nIf you’re writing your own content, Article Forge can take a long and difficult process and turn it into a single button click. \r\n\r\nIf you’re buying content, Article Forge’s flat fee, unlimited articles, and 60 second turnaround will be cheaper and faster than any other content provider. \r\n\r\nEither way, Article Forge will help you take your content creation process to the next level.\r\n\r\nMore importantly, Article Forge offers a free 5-day trial so you can see for yourself how this technology will revolutionize your content pipeline for your niche and your use case. \r\n\r\nSo what are you waiting for? Click here to get your 5-day Free Trial and start generating unlimited unique content =>> https://myarticleforge.blogspot.com/\r\n\r\nAnd make sure to thank me later when this tool has changed the way you create content :)\r\n\r\nBrahma.', '\'1\'', '2021-12-22 09:41:49', '2021-12-22 09:41:49'),
(8, 'Carmine Loftus', 'loftus.carmine@msn.com', '(03) 5346 0320', '53 Walpole Avenue', 'As a video marketer, your most powerful tool is YouTube. The world’s most popular video site which is nearly synonymous to video marketing on the Internet.\r\n\r\n YouTube’s domination on the video marketing world is absolute. Not even Facebook has been able to shake its strong grip on the market.\r\n\r\nJust how powerful video marketing on is? Have a look at this hard, cold data.\r\n\r\n=>> https://tubetraffic.bizoppsguide.com?traffic_source=cf&cost=0', '\'1\'', '2022-01-05 07:28:00', '2022-01-05 07:28:00'),
(9, 'Sabbir', 'srnumaer@gmail.com', '01316-869767', 'Bangladesh', 'Please send me the details, need to book for upcoming weekend.', '\'1\'', '2022-02-02 07:34:04', '2022-02-02 07:34:04');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entry_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `entry_by`, `update_by`, `date`, `reference`, `purpose`, `remarks`, `amount`, `created_at`, `updated_at`) VALUES
(7, 'Admin', NULL, '2022-01-13T02:10', 'Sohag', 'Software Purchase', 'test', '20000', '2022-01-12 20:11:20', '2022-01-12 20:11:20'),
(8, 'Admin', NULL, '2022-01-01T20:36', 'Gold Chicken', 'TGHT', '1.450gm', '406', '2022-01-17 06:31:23', '2022-01-17 06:31:23'),
(9, 'Admin', NULL, '2022-01-01T20:38', 'Soyaben oil', 'TGHT', '4 liter', '700', '2022-01-17 06:33:36', '2022-01-17 06:33:36'),
(10, 'Admin', NULL, '2022-01-01T20:40', 'Brecing', 'TGHT', '8p', '16', '2022-01-17 06:34:31', '2022-01-17 06:34:31'),
(11, 'Admin', NULL, '2022-01-01T20:40', 'Brecing', 'TGHT', '8p', '16', '2022-01-17 06:34:31', '2022-01-17 06:34:31'),
(12, 'Admin', NULL, '2022-01-01T20:41', 'Mug dal', 'TGHT', '3kg', '390', '2022-01-17 06:35:23', '2022-01-17 06:35:23'),
(13, 'Admin', NULL, '2022-01-04T20:42', 'Onion', 'TGHT', '7kg', '385', '2022-01-17 06:37:26', '2022-01-17 06:37:26'),
(14, 'Admin', NULL, '2022-01-25T23:35', 'FISH', 'TGHT', 'TALAPIA', '448', '2022-01-25 08:42:21', '2022-01-25 08:42:21');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `food_category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `name`, `food_category_id`, `price`, `image`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Md Abu Taleb', '1', '250', 'uploads/food/62026041a555a.png', 'Active', '2022-02-08 12:21:21', '2022-02-08 12:21:21');

-- --------------------------------------------------------

--
-- Table structure for table `food_categories`
--

CREATE TABLE `food_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `food_categories`
--

INSERT INTO `food_categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Md Abu Taleb 2', 'uploads/foodcategory/6202140176e3b.png', '2022-02-08 06:56:01', '2022-02-08 08:48:27'),
(3, 'Obaidullah Tuhin', 'uploads/foodcategory/62022d374c9f5.png', '2022-02-08 08:43:35', '2022-02-08 08:43:35');

-- --------------------------------------------------------

--
-- Table structure for table `fund_withdraws`
--

CREATE TABLE `fund_withdraws` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entry_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `available_amount` double(8,2) DEFAULT NULL,
  `withdraw_amount` double(8,2) DEFAULT NULL,
  `payment_mode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `image`, `created_at`, `updated_at`) VALUES
(4, 'public/images/Gallery/6198ce0be9c82.jfif', '2021-11-20 10:29:31', '2021-11-20 10:29:31'),
(5, 'public/images/Gallery/6198ce139b462.jfif', '2021-11-20 10:29:39', '2021-11-20 10:29:39'),
(6, 'public/images/Gallery/6198ce201734a.jfif', '2021-11-20 10:29:52', '2021-11-20 10:29:52'),
(7, 'public/images/Gallery/6198ce288e99e.jfif', '2021-11-20 10:30:00', '2021-11-20 10:30:00'),
(10, 'public/images/Gallery/6198ce3cd556a.jfif', '2021-11-20 10:30:20', '2021-11-20 10:30:20'),
(12, 'public/images/Gallery/619dbb2d57d64.jpeg', '2021-11-24 04:10:21', '2021-11-24 04:10:21'),
(13, 'public/images/Gallery/61a4509af13ed.jpeg', '2021-11-29 04:01:30', '2021-11-29 04:01:30'),
(14, 'public/images/Gallery/61a450a42402a.jpeg', '2021-11-29 04:01:40', '2021-11-29 04:01:40'),
(16, 'public/images/Gallery/61aa4342d3f04.jpg', '2021-12-03 16:18:10', '2021-12-03 16:18:10'),
(20, 'public/images/Gallery/61aa43c1a567a.jpg', '2021-12-03 16:20:17', '2021-12-03 16:20:17'),
(23, 'public/images/Gallery/61ac3c73b49cd.jpeg', '2021-12-05 04:13:39', '2021-12-05 04:13:39'),
(24, 'public/images/Gallery/61ac3c7ec6a53.jpeg', '2021-12-05 04:13:50', '2021-12-05 04:13:50'),
(29, 'public/images/Gallery/61ac3ca656cc4.jpeg', '2021-12-05 04:14:30', '2021-12-05 04:14:30'),
(32, 'public/images/Gallery/61ac3cc516db9.jpeg', '2021-12-05 04:15:01', '2021-12-05 04:15:01'),
(34, 'public/images/Gallery/61ac3ce7c6c21.jpeg', '2021-12-05 04:15:35', '2021-12-05 04:15:35'),
(35, 'public/images/Gallery/61ac3cf4def0d.jpeg', '2021-12-05 04:15:48', '2021-12-05 04:15:48'),
(37, 'public/images/Gallery/61ac3d04d5d81.jpeg', '2021-12-05 04:16:04', '2021-12-05 04:16:04'),
(39, 'public/images/Gallery/61ae0f604cd22.jpeg', '2021-12-06 13:25:52', '2021-12-06 13:25:52'),
(42, 'public/images/Gallery/61ae101dbbca1.jpeg', '2021-12-06 13:29:01', '2021-12-06 13:29:01'),
(43, 'public/images/Gallery/61ae1025071e6.jpeg', '2021-12-06 13:29:09', '2021-12-06 13:29:09'),
(44, 'public/images/Gallery/61b8911050d44.jpg', '2021-12-14 12:41:52', '2021-12-14 12:41:52'),
(45, 'public/images/Gallery/61b8912694f67.jpg', '2021-12-14 12:42:14', '2021-12-14 12:42:14'),
(46, 'public/images/Gallery/61b891373ae6e.jpg', '2021-12-14 12:42:31', '2021-12-14 12:42:31'),
(47, 'public/images/Gallery/61b9b0926f350.jpeg', '2021-12-15 09:08:34', '2021-12-15 09:08:34'),
(50, 'public/images/Gallery/61b9dafeafca2.jpeg', '2021-12-15 12:09:34', '2021-12-15 12:09:34'),
(51, 'public/images/Gallery/61b9db0f7c868.jpeg', '2021-12-15 12:09:51', '2021-12-15 12:09:51'),
(53, 'public/images/Gallery/61b9db2d602bb.jpeg', '2021-12-15 12:10:21', '2021-12-15 12:10:21'),
(54, 'public/images/Gallery/61b9db34a6301.jpeg', '2021-12-15 12:10:28', '2021-12-15 12:10:28'),
(55, 'public/images/Gallery/61b9db409d8d2.jpeg', '2021-12-15 12:10:40', '2021-12-15 12:10:40'),
(56, 'public/images/Gallery/61b9db50e3776.jpeg', '2021-12-15 12:10:56', '2021-12-15 12:10:56'),
(57, 'public/images/Gallery/61b9db657d115.jpeg', '2021-12-15 12:11:17', '2021-12-15 12:11:17'),
(58, 'public/images/Gallery/61b9db7459d54.jpeg', '2021-12-15 12:11:32', '2021-12-15 12:11:32'),
(59, 'public/images/Gallery/61b9db7f64c4a.jpeg', '2021-12-15 12:11:43', '2021-12-15 12:11:43'),
(60, 'public/images/Gallery/61b9db8ce9d72.jpeg', '2021-12-15 12:11:56', '2021-12-15 12:11:56'),
(61, 'public/images/Gallery/61b9db940fb80.jpeg', '2021-12-15 12:12:04', '2021-12-15 12:12:04'),
(62, 'public/images/Gallery/61b9db9e75ca2.jpeg', '2021-12-15 12:12:14', '2021-12-15 12:12:14'),
(68, 'public/images/Gallery/61b9df3f6bde4.jpeg', '2021-12-15 12:27:43', '2021-12-15 12:27:43'),
(69, 'public/images/Gallery/61b9df45407a4.jpeg', '2021-12-15 12:27:49', '2021-12-15 12:27:49'),
(70, 'public/images/Gallery/61b9df4c533a7.jpeg', '2021-12-15 12:27:56', '2021-12-15 12:27:56'),
(71, 'public/images/Gallery/61b9df52cc822.jpeg', '2021-12-15 12:28:02', '2021-12-15 12:28:02'),
(72, 'public/images/Gallery/61b9df7b3984d.jpeg', '2021-12-15 12:28:43', '2021-12-15 12:28:43'),
(73, 'public/images/Gallery/61b9dffb2151a.jpeg', '2021-12-15 12:30:51', '2021-12-15 12:30:51'),
(74, 'public/images/Gallery/61b9e0026c243.jpeg', '2021-12-15 12:30:58', '2021-12-15 12:30:58'),
(75, 'public/images/Gallery/61b9e9d258dd6.jpg', '2021-12-15 13:12:50', '2021-12-15 13:12:50'),
(76, 'public/images/Gallery/61b9e9da0f341.jpg', '2021-12-15 13:12:58', '2021-12-15 13:12:58'),
(77, 'public/images/Gallery/61b9e9f1e938b.jpg', '2021-12-15 13:13:21', '2021-12-15 13:13:21'),
(78, 'public/images/Gallery/61b9e9fd24fbf.jpg', '2021-12-15 13:13:33', '2021-12-15 13:13:33'),
(79, 'public/images/Gallery/61b9ea06e23fb.jpg', '2021-12-15 13:13:42', '2021-12-15 13:13:42'),
(80, 'public/images/Gallery/61b9ea1137188.jpg', '2021-12-15 13:13:53', '2021-12-15 13:13:53'),
(81, 'public/images/Gallery/61b9ea1c2fb94.jpg', '2021-12-15 13:14:04', '2021-12-15 13:14:04'),
(82, 'public/images/Gallery/61b9ea273572c.jpg', '2021-12-15 13:14:15', '2021-12-15 13:14:15'),
(83, 'public/images/Gallery/61b9ea323e721.jpg', '2021-12-15 13:14:26', '2021-12-15 13:14:26'),
(84, 'public/images/Gallery/61b9ea3ecba56.jpeg', '2021-12-15 13:14:38', '2021-12-15 13:14:38'),
(85, 'public/images/Gallery/61b9ea50ceb1f.jpg', '2021-12-15 13:14:56', '2021-12-15 13:14:56'),
(86, 'public/images/Gallery/61b9ea5a43ef5.jpg', '2021-12-15 13:15:06', '2021-12-15 13:15:06'),
(87, 'public/images/Gallery/61bc86c3b3124.jpg', '2021-12-17 12:46:59', '2021-12-17 12:46:59'),
(88, 'public/images/Gallery/61bc86efa4408.jpg', '2021-12-17 12:47:43', '2021-12-17 12:47:43'),
(89, 'public/images/Gallery/61beb6c682746.jpeg', '2021-12-19 04:36:22', '2021-12-19 04:36:22'),
(90, 'public/images/Gallery/61beb6cf1484f.jpeg', '2021-12-19 04:36:31', '2021-12-19 04:36:31');

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ledger_statements`
--

CREATE TABLE `ledger_statements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `debit` double(8,2) DEFAULT NULL,
  `credit` double(8,2) DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_mode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ledger_statements`
--

INSERT INTO `ledger_statements` (`id`, `amount`, `debit`, `credit`, `remarks`, `booking_id`, `reference`, `mobile`, `payment_mode`, `created_at`, `updated_at`) VALUES
(38, 5000.00, 0.00, 5000.00, 'Booking', 1033, NULL, '01723019475', 'cash', '2022-01-12 19:49:29', '2022-01-12 19:49:29'),
(39, 13000.00, 0.00, 8000.00, 'Booking', 1034, NULL, '01717172300', 'DBBL', '2022-01-12 19:57:07', '2022-01-12 19:57:07'),
(40, 15000.00, 0.00, 2000.00, 'Booking', 1033, NULL, NULL, 'Cash', '2022-01-12 19:58:47', '2022-01-12 19:58:47'),
(41, -5000.00, 20000.00, 0.00, 'test', NULL, NULL, NULL, NULL, '2022-01-12 20:11:20', '2022-01-12 20:11:20'),
(42, -5000.00, 0.00, 0.00, 'Booking', 1035, NULL, '01724700421', 'cash', '2022-01-17 06:23:32', '2022-01-17 06:23:32'),
(43, -5000.00, 0.00, 0.00, 'Booking', 1036, NULL, '01724700421', 'cash', '2022-01-17 06:25:04', '2022-01-17 06:25:04'),
(44, -5000.00, 0.00, 0.00, 'Booking', 1037, NULL, '01890263560', 'cash', '2022-01-17 06:26:49', '2022-01-17 06:26:49'),
(45, -4000.00, 0.00, 1000.00, 'Booking', 1038, NULL, '01739635665', 'cash', '2022-01-17 06:28:16', '2022-01-17 06:28:16'),
(46, -4406.00, 406.00, 0.00, '1.450gm', NULL, NULL, NULL, NULL, '2022-01-17 06:31:23', '2022-01-17 06:31:23'),
(47, -5106.00, 700.00, 0.00, '4 liter', NULL, NULL, NULL, NULL, '2022-01-17 06:33:36', '2022-01-17 06:33:36'),
(48, -5122.00, 16.00, 0.00, '8p', NULL, NULL, NULL, NULL, '2022-01-17 06:34:31', '2022-01-17 06:34:31'),
(49, -5138.00, 16.00, 0.00, '8p', NULL, NULL, NULL, NULL, '2022-01-17 06:34:31', '2022-01-17 06:34:31'),
(50, -5512.00, 390.00, 0.00, '3kg', NULL, NULL, NULL, NULL, '2022-01-17 06:35:23', '2022-01-17 06:35:23'),
(51, -5897.00, 385.00, 0.00, '7kg', NULL, NULL, NULL, NULL, '2022-01-17 06:37:26', '2022-01-17 06:37:26'),
(52, -897.00, 0.00, 5000.00, 'Booking', 1039, NULL, '01920988017', 'cash', '2022-01-25 08:40:28', '2022-01-25 08:40:28'),
(53, -1345.00, 448.00, 0.00, 'TALAPIA', NULL, NULL, NULL, NULL, '2022-01-25 08:42:21', '2022-01-25 08:42:21');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2021_02_26_230816_create_sliders_table', 1),
(10, '2021_02_26_230853_create_notices_table', 1),
(11, '2021_04_17_181803_create_social_media_table', 1),
(12, '2021_07_29_181907_create_countries_table', 1),
(13, '2021_07_30_055423_create_blog_categories_table', 1),
(14, '2021_07_30_055734_create_blogs_table', 1),
(15, '2021_07_30_055934_create_roles_table', 1),
(16, '2021_07_30_074926_create_contacts_table', 1),
(17, '2021_08_03_062340_create_languages_table', 1),
(18, '2021_08_03_071035_create_web_settings_table', 1),
(19, '2021_08_10_164631_create_genders_table', 1),
(20, '2021_08_10_165014_create_districts_table', 1),
(21, '2021_08_10_165108_create_religions_table', 1),
(23, '2021_10_31_161155_create_properties_table', 1),
(24, '2021_11_01_153821_create_resorts_table', 1),
(25, '2021_11_18_235228_create_users_subscribes_table', 2),
(26, '2021_11_19_004543_create_galleries_table', 3),
(27, '2021_11_19_183532_create_rooms_table', 4),
(28, '2021_11_19_191216_create_categories_table', 5),
(31, '2021_11_20_003216_create_bookings_table', 6),
(32, '2021_12_24_220435_create_room_floors_table', 7),
(33, '2021_12_29_115109_create_bookings_table', 8),
(34, '2021_12_29_151255_create_billings_table', 8),
(35, '2021_12_29_153117_create_booking_details_table', 8),
(36, '2021_12_30_103923_create_carts_table', 8),
(37, '2021_12_30_124046_create_payment_histories_table', 9),
(40, '2022_01_08_172404_create_expenses_table', 10),
(41, '2022_01_09_104529_create_fund_withdraws_table', 10),
(42, '2022_01_09_160559_create_ledger_statements_table', 11),
(43, '2022_02_08_001215_create_food_categories_table', 12),
(44, '2022_02_08_001249_create_food_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noticesfile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_histories`
--

CREATE TABLE `payment_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_histories`
--

INSERT INTO `payment_histories` (`id`, `user_id`, `booking_id`, `amount`, `created_at`, `updated_at`) VALUES
(58, 1, 1033, '5000', '2022-01-12 19:49:29', '2022-01-12 19:49:29'),
(59, 1, 1034, '8000', '2022-01-12 19:57:07', '2022-01-12 19:57:07'),
(60, 1, 1033, '2000', '2022-01-12 19:58:47', '2022-01-12 19:58:47'),
(61, 1, 1035, '00', '2022-01-17 06:23:32', '2022-01-17 06:23:32'),
(62, 1, 1036, '00', '2022-01-17 06:25:04', '2022-01-17 06:25:04'),
(63, 1, 1037, '00', '2022-01-17 06:26:49', '2022-01-17 06:26:49'),
(64, 1, 1038, '1000', '2022-01-17 06:28:16', '2022-01-17 06:28:16'),
(65, 1, 1039, '5000', '2022-01-25 08:40:28', '2022-01-25 08:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `religions`
--

CREATE TABLE `religions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resorts`
--

CREATE TABLE `resorts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_floor_id` int(10) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT 'public/images/room/default.jpeg',
  `bed` varchar(110) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_size` varchar(110) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bathroom` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `discount_price` int(11) DEFAULT NULL,
  `is_offer` int(11) DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `room_no`, `room_floor_id`, `category_id`, `photo`, `bed`, `room_size`, `bathroom`, `description`, `price`, `discount_price`, `is_offer`, `status`, `created_at`, `updated_at`) VALUES
(8, 'BASEMENT', 'B1', 1, 13, 'public/images/room/61c6980208148.jpeg', '2 KING SIZE BEDS', 'LARGE 18\' X 14\'', 'ATTACHED BATHROOM R', '<p>na</p>', 8000, 5000, 1, 1, '2021-12-25 04:03:14', '2021-12-25 04:03:14'),
(9, 'TWIN NON AC ROOM', 'B2', 1, 14, 'public/images/room/61c69847a68d9.jpeg', '2 SINGLE SIZE BEDS', 'LARGE 18\' X 14\'', 'ATTACHED BATHROOM', '<p>na</p>', 7000, 4000, 1, 1, '2021-12-25 04:04:23', '2021-12-25 04:04:23'),
(10, 'DELUXE COUPLE NON AC ROOM', 'B3', 1, 12, 'public/images/room/61c698cd62937.jpeg', '1 KING SIZE BED', 'SMALL 13\' X 12\'', 'ATTACHED BATHROOM', '<p>na</p>', 3500, 2500, 1, 1, '2021-12-25 04:06:37', '2021-12-25 04:06:37'),
(11, 'DELUXE COUPLE AC ROOM', 'B4', 1, 11, 'public/images/room/61c699235b79c.jpeg', '1 KING SIZE BED', 'LARGE 18\' X 14\'', 'ATTACHED BATHROOM', '<p>na</p>', 5000, 3500, 1, 1, '2021-12-25 04:08:03', '2021-12-25 04:08:03'),
(12, 'DELUXE COUPLE AC ROOM', 'B5', 1, 11, 'public/images/room/61c69a008e2c4.jpeg', '1 KING SIZE BED', 'LARGE 18\' X 14\'', 'ATTACHED BATHROOM', '<p>na</p>', 4500, 3000, NULL, 1, '2021-12-25 04:11:44', '2021-12-25 04:11:44'),
(13, 'DELUXE COUPLE AC ROOM', '101', 2, 11, 'public/images/room/61c69a42ed852.jpeg', '1 KING SIZE BED', 'LARGE 20\' X 16\'', 'ATTACHED BATHROOM', '<p>na</p>', 12000, 8000, 1, 1, '2021-12-25 04:12:50', '2021-12-25 04:12:50'),
(14, 'DELUXE COUPLE AC ROOM', '104', 2, 11, 'public/images/room/61c69a42ed852.jpeg', '1 KING SIZE BED', 'LARGE 20\' X 16\'', 'ATTACHED BATHROOM', '<p>na</p>', 12000, 8000, 1, 1, '2021-12-25 04:12:50', '2021-12-25 04:12:50'),
(15, 'DELUXE COUPLE AC ROOM', '102', 2, 11, 'public/images/room/61c69a42ed852.jpeg', '1 KING SIZE BED', 'SMALL 14.5\' X 12\'', 'ATTACHED BATHROOM', '<p>na</p>', 8000, 5000, 1, 1, '2021-12-25 04:12:50', '2021-12-25 04:12:50'),
(16, 'DELUXE COUPLE AC ROOM', '103', 2, 11, 'public/images/room/61c69a42ed852.jpeg', '1 KING SIZE BED', 'SMALL 14.5\' X 12\'', 'ATTACHED BATHROOM', '<p>na</p>', 8000, 5000, 1, 1, '2021-12-25 04:12:50', '2021-12-25 04:12:50'),
(17, 'DELUXE COUPLE AC ROOM', '201', 3, 11, 'public/images/room/61c69a42ed852.jpeg', '1 KING SIZE BED', 'LARGE 20\' X 16\'', 'ATTACHED BATHROOM', '<p>na</p>', 12000, 8000, 1, 1, '2021-12-25 04:12:50', '2021-12-25 04:12:50'),
(18, 'DELUXE COUPLE AC ROOM', '204', 3, 11, 'public/images/room/61c69a42ed852.jpeg', '1 KING SIZE BED', 'LARGE 20\' X 16\'', 'ATTACHED BATHROOM', '<p>na</p>', 12000, 8000, 1, 1, '2021-12-25 04:12:50', '2021-12-25 04:12:50'),
(19, 'DELUXE COUPLE AC ROOM', '203', 3, 11, 'public/images/room/61c69a42ed852.jpeg', '1 KING SIZE BED', 'SMALL 14.5\' X 12\'', 'ATTACHED BATHROOM', '<p>na</p>', 8000, 5000, 1, 1, '2021-12-25 04:12:50', '2021-12-25 04:12:50'),
(20, 'DELUXE COUPLE AC ROOM', '202', 3, 11, 'public/images/room/61c69a42ed852.jpeg', '1 KING SIZE BED', 'SMALL 14.5\' X 12\'', 'ATTACHED BATHROOM', '<p>na</p>', 8000, 5000, 1, 1, '2021-12-25 04:12:50', '2021-12-25 04:12:50');

-- --------------------------------------------------------

--
-- Table structure for table `room_floors`
--

CREATE TABLE `room_floors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_floors`
--

INSERT INTO `room_floors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'BASEMENT', '2021-12-24 16:10:03', '2021-12-24 16:10:06'),
(2, '1ST FLOOR', '2021-12-24 16:10:10', '2021-12-24 16:10:14'),
(3, '2ND FLOOR', '2021-12-24 16:10:17', '2021-12-24 16:10:19'),
(4, '3RD FLOOR', '2021-12-24 16:10:22', '2021-12-24 16:10:24');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `description`, `status`, `created_at`, `updated_at`) VALUES
(3, NULL, 'public/images/sliders/61ae3cf1d660d.jpeg', NULL, 1, '2021-12-06 16:40:17', '2021-12-06 16:40:17'),
(6, NULL, 'public/images/sliders/61af36a66f942.jpeg', NULL, 1, '2021-12-07 10:25:42', '2021-12-07 10:25:42'),
(7, NULL, 'public/images/sliders/61af36dae8f48.jpeg', NULL, 1, '2021-12-07 10:26:34', '2021-12-07 10:26:34'),
(8, NULL, 'public/images/sliders/61af376ade9f2.jpg', NULL, 1, '2021-12-07 10:28:58', '2021-12-07 10:28:58'),
(9, NULL, 'public/images/sliders/61af3774cc24f.jpeg', NULL, 1, '2021-12-07 10:29:08', '2021-12-07 10:29:08'),
(11, NULL, 'public/images/sliders/61b9b12e350ac.jpeg', NULL, 1, '2021-12-15 09:11:10', '2021-12-15 09:11:10'),
(12, NULL, 'public/images/sliders/61b9dfbeed43c.jpeg', NULL, 1, '2021-12-15 12:29:50', '2021-12-15 12:29:50'),
(14, NULL, 'public/images/sliders/61b9dfdc6cef7.jpeg', NULL, 1, '2021-12-15 12:30:20', '2021-12-15 12:30:20'),
(15, NULL, 'public/images/sliders/61bd86cd9fc57.jpg', NULL, 1, '2021-12-18 06:59:25', '2021-12-18 06:59:25'),
(16, NULL, 'public/images/sliders/61bd86e1733ad.jpg', NULL, 1, '2021-12-18 06:59:45', '2021-12-18 06:59:45'),
(17, NULL, 'public/images/sliders/61bd8706e7fe6.jpg', NULL, 1, '2021-12-18 07:00:22', '2021-12-18 07:00:22'),
(18, NULL, 'public/images/sliders/61bd87279d918.jpg', NULL, 1, '2021-12-18 07:00:55', '2021-12-18 07:00:55'),
(19, NULL, 'public/images/sliders/61bd874e8df0c.jpg', NULL, 1, '2021-12-18 07:01:34', '2021-12-18 07:01:34'),
(20, NULL, 'public/images/sliders/61bd876d445ed.jpg', NULL, 1, '2021-12-18 07:02:05', '2021-12-18 07:02:05'),
(21, NULL, 'public/images/sliders/61beb6eef2245.jpeg', NULL, 1, '2021-12-19 04:37:02', '2021-12-19 04:37:02'),
(22, NULL, 'public/images/sliders/61beb702bd691.jpeg', NULL, 1, '2021-12-19 04:37:22', '2021-12-19 04:37:22');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT 1,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `name_ar`, `username`, `first_name`, `last_name`, `mobile`, `email`, `email_verified_at`, `remember_token`, `password`, `image`, `role_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 'admin', NULL, NULL, NULL, 'admin@gmail.com', NULL, NULL, '$2a$12$RZVShNYk9xjET1855/Zi4Oq6Eyr0uur/vTrb4vOMRy/1ETlNy0xrq', NULL, 1, 1, '2021-11-01 18:34:43', '2021-11-01 18:34:43');

-- --------------------------------------------------------

--
-- Table structure for table `users_subscribes`
--

CREATE TABLE `users_subscribes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_subscribes`
--

INSERT INTO `users_subscribes` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '2021-11-18 18:01:37', '2021-11-18 18:01:37');

-- --------------------------------------------------------

--
-- Table structure for table `web_settings`
--

CREATE TABLE `web_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `homepage_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sitebanner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `local_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_settings`
--

INSERT INTO `web_settings` (`id`, `site_name`, `homepage_title`, `about`, `meta_tags`, `meta_description`, `sitebanner`, `logo`, `footer_logo`, `favicon`, `email`, `phone`, `state_address`, `local_address`, `address`, `map_code`, `created_at`, `updated_at`) VALUES
(1, 'The Grand Hill Taj', 'The Grand Hill Taj', 'The Grand Hill Taj', 'The Grand Hill Taj', 'The Grand Hill Taj', 'public/images/website/61b9f18d11c95.jpg', 'public/images/website/61b9f14e1c96f.jpg', 'public/images/website/61992a3bda468.png', NULL, 'grandhilltaj@gmail.com', '+880 15 8149 5115 / +880 18 9033 1021', NULL, NULL, 'The Grand Hill Taj, Kaptai Lake, Rangamati Sadar Upazila Porisod, Hill Track, Chittagong-4500, Bangladesh', NULL, NULL, '2021-12-15 13:45:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billings`
--
ALTER TABLE `billings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `billings_user_id_foreign` (`user_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_room_id_foreign` (`room_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uid_unique` (`uid`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_categories`
--
ALTER TABLE `food_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fund_withdraws`
--
ALTER TABLE `fund_withdraws`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ledger_statements`
--
ALTER TABLE `ledger_statements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_histories`
--
ALTER TABLE `payment_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_histories_user_id_foreign` (`user_id`),
  ADD KEY `payment_histories_booking_id_foreign` (`booking_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `religions`
--
ALTER TABLE `religions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resorts`
--
ALTER TABLE `resorts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_floors`
--
ALTER TABLE `room_floors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_subscribes`
--
ALTER TABLE `users_subscribes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_settings`
--
ALTER TABLE `web_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billings`
--
ALTER TABLE `billings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1040;

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `food_categories`
--
ALTER TABLE `food_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fund_withdraws`
--
ALTER TABLE `fund_withdraws`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ledger_statements`
--
ALTER TABLE `ledger_statements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_histories`
--
ALTER TABLE `payment_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `religions`
--
ALTER TABLE `religions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resorts`
--
ALTER TABLE `resorts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `room_floors`
--
ALTER TABLE `room_floors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_subscribes`
--
ALTER TABLE `users_subscribes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `web_settings`
--
ALTER TABLE `web_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billings`
--
ALTER TABLE `billings`
  ADD CONSTRAINT `billings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment_histories`
--
ALTER TABLE `payment_histories`
  ADD CONSTRAINT `payment_histories_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payment_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
