-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2017 at 10:03 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+07:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `videos_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `id` int(11) NOT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ads_type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ads_script` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(2) DEFAULT '0',
  `status` int(1) DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`id`, `title`, `description`, `ads_type`, `location`, `ads_script`, `image`, `video_id`, `order`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'ads header', 'Add Test', 'Banner', 'Header', NULL, '/laravel-filemanager/photos/2/Would-a-career-in-construction-or-property-suit-me.jpg', NULL, 0, 1, NULL, NULL, '2017-10-10 09:29:53', '2017-10-10 02:29:53'),
(3, 'Ads Body', 'Add Body', 'Banner', 'Body', NULL, '/laravel-filemanager/photos/1/ads.jpg', NULL, 1, 0, NULL, NULL, '2017-10-10 03:10:48', '2017-10-09 20:10:48'),
(4, 'Side Right', 'Side Right', 'Banner', 'Side_Right', NULL, '/laravel-filemanager/photos/2/Unti3tled-1.gif', NULL, 2, 1, NULL, NULL, '2017-10-11 07:35:43', '2017-10-11 00:35:43'),
(5, 'Side Right', 'Side Right', 'Banner', 'Side_Right', NULL, '/laravel-filemanager/photos/2/efawefaZEWD.gif', NULL, 3, 1, NULL, NULL, '2017-10-11 07:56:40', '2017-10-11 00:56:40'),
(6, 'Ads Side', 'In Side Left', 'Banner', 'Side_Left', NULL, '/laravel-filemanager/photos/2/dfws.gif', 'L6CtJ7YcLgc', 4, 1, NULL, NULL, '2017-10-11 07:46:48', '2017-10-11 00:46:48'),
(7, 'ads side', 'ads side test 2', 'Banner', 'Side_Left', NULL, '/laravel-filemanager/photos/2/Untitled-1.gif', 'L6CtJ7YcLgc', 5, 1, NULL, NULL, '2017-10-11 07:36:01', '2017-10-11 00:36:01'),
(8, 'Ads Side Left', 'Ads Side Left', 'Banner', 'Side_Left', NULL, '/laravel-filemanager/photos/2/--------.gif', NULL, 6, 1, NULL, NULL, '2017-10-11 07:41:00', '2017-10-11 00:41:00'),
(9, 'side left', NULL, 'Banner', 'Side_Left', NULL, '/laravel-filemanager/photos/2/Unti3tled-1.gif', NULL, 7, 1, NULL, NULL, '2017-10-11 00:48:12', '2017-10-11 00:48:12'),
(10, 'side right', NULL, 'Banner', 'Side_Right', NULL, '/laravel-filemanager/photos/2/Untitled-331.gif', NULL, 8, 1, NULL, NULL, '2017-10-11 00:52:20', '2017-10-11 00:52:20');

-- --------------------------------------------------------

--
-- Table structure for table `block_ip`
--

CREATE TABLE `block_ip` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` smallint(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `block_ip`
--

INSERT INTO `block_ip` (`id`, `ip_address`, `created_at`, `updated_at`, `status`, `user_id`) VALUES
(1, '::1', '2017-08-31 03:16:51', '2017-08-30 23:24:14', 0, 1),
(2, '192.168.56.2', '2017-08-31 03:18:35', '2017-08-30 23:25:24', 0, 1),
(3, '192.168.1.106', '2017-08-30 23:38:15', '2017-08-30 23:38:15', 1, 1),
(4, '192.15.5.66', '2017-08-30 23:38:58', '2017-09-14 23:31:09', 1, 1),
(5, '192.168.0.11', '2017-08-31 00:44:21', '2017-08-31 01:01:51', 0, 1),
(6, '::1', '2017-09-14 23:31:15', '2017-09-14 23:34:58', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `name` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `order` int(3) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  `language_code` varchar(5) DEFAULT 'en',
  `slug` varchar(250) DEFAULT 'home'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `icon`, `group_id`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `order`, `status`, `language_code`, `slug`) VALUES
(3, 'mbri-video-play', 2, 'More', '2017-09-27 03:58:22', '2017-10-10 20:10:34', NULL, 2, 10, 1, 'en', 'video'),
(4, 'mbri-video-play', 2, 'ផ្សេងៗទៀត', '2017-09-27 03:58:48', '2017-10-10 20:10:34', NULL, 2, 10, 1, 'kh', 'video'),
(5, NULL, 3, 'Civil', '2017-10-10 20:07:23', '2017-10-10 20:10:03', 2, 2, 1, 1, 'en', 'BKFr0v20171011030723'),
(6, NULL, 3, 'សំណង់ស៊ីវិល', '2017-10-10 20:07:23', '2017-10-10 20:10:03', 2, 2, 1, 1, 'kh', 'BKFr0v20171011030723'),
(7, NULL, 4, 'Account', '2017-10-10 20:07:57', '2017-10-10 20:10:13', 2, 2, 2, 1, 'en', 'PihrjB20171011030757'),
(8, NULL, 4, 'គណនេយ្យ', '2017-10-10 20:07:57', '2017-10-10 20:10:13', 2, 2, 2, 1, 'kh', 'PihrjB20171011030757'),
(9, NULL, 5, 'Architect', '2017-10-10 20:09:10', '2017-10-10 20:10:22', 2, 2, 3, 1, 'en', '2l4a4W20171011030910'),
(10, NULL, 5, 'ស្ថាបត្យកម្ម', '2017-10-10 20:09:10', '2017-10-10 20:10:23', 2, 2, 3, 1, 'kh', '2l4a4W20171011030910');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT '1',
  `post_group_id` int(11) DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(1) DEFAULT '1',
  `rating` int(2) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `customer_id`, `post_group_id`, `description`, `created_at`, `updated_at`, `status`, `rating`) VALUES
(1, 81, 20, 'With wide screen videos, the YouTube logo is displayed on the bottom (right) black bar. Then the stretching setting is forced to \"fill\". If you don\'t understand what I explained here, simply visit the website, right click.', '2017-10-04 23:51:35', '2017-10-04 23:51:35', 1, 0),
(2, 81, 20, 'With wide screen videos, the YouTube logo is displayed on the bottom (right) black bar. Then the stretching setting is forced to \"fill\". If you don\'t understand what I explained here, simply visit the website, right click.', '2017-10-04 23:55:45', '2017-10-04 23:55:45', 1, 0),
(3, 81, 20, 'With wide screen videos, the YouTube logo is displayed on the bottom (right) black bar. Then the stretching setting is forced to \"fill\". If you don\'t understand what I explained here, simply visit the website, right click.', '2017-10-04 23:55:48', '2017-10-04 23:55:48', 1, 0),
(4, 81, 20, 'និងឧស្សាហកម្មទូទាំងពិភពលោកនៅក្រុមហ៊ុន Microsoft ក្នុងការពិភាក្សានេះអំពីការច្នៃប្រឌិតយុទ្ធសាស្ត្រនិងភាពទទួលខុសត្រូវ។', '2017-10-05 00:07:32', '2017-10-05 00:07:32', 1, 0),
(5, 81, 20, 'និងឧស្សាហកម្មទូទាំងពិភពលោកនៅក្រុមហ៊ុន Microsoft ក្នុងការពិភាក្សានេះអំពីការច្នៃប្រឌិតdfcaWsdយុទ្ធសាស្ត្រនិងភាពទទួលខុសត្រូវ។', '2017-10-05 00:09:17', '2017-10-05 00:09:17', 1, 0),
(6, 81, 17, 'fedfaw', '2017-10-05 00:35:56', '2017-10-05 00:35:56', 1, 0),
(7, 81, 17, 'because of turbolinks. It only works with a refresh. Thus why I\'ve removed it.', '2017-10-05 00:37:33', '2017-10-05 00:37:33', 1, 0),
(8, 81, 17, 'You\'ll notice I completely removed the bkLib.onDomLoaded line and just called the equivelant of document function do $ ->. The reason is bkLib.onDomLoaded fails to load initially because of turbolinks. It only works with a refresh. Thus why I\'ve removed it.', '2017-10-05 00:39:11', '2017-10-05 00:39:11', 1, 0),
(9, 81, 17, 'because of turbolinks. It only works with a refresh. Thus why I\'ve removed it.', '2017-10-05 00:41:17', '2017-10-05 00:41:17', 1, 0),
(10, 81, 17, 'onDomLoaded fails to load initially because of turbolinks. It only works with a refresh', '2017-10-05 00:44:22', '2017-10-05 00:44:22', 1, 0),
(11, 81, NULL, 'onDomLoaded fails to load initially because of turbolinks. It only works with a refresh', '2017-10-05 00:44:26', '2017-10-05 00:44:26', 1, 0),
(12, 81, NULL, 'onDomLoaded fails to load initially because of turbolinks. It only works with a refresh', '2017-10-05 00:44:32', '2017-10-05 00:44:32', 1, 0),
(13, 81, NULL, 'f3w', '2017-10-05 00:45:45', '2017-10-05 00:45:45', 1, 0),
(14, 81, 17, 'onDomLoaded fails to load initially because of turbolinks. It only works with a refresh', '2017-10-05 00:45:59', '2017-10-05 00:45:59', 1, 0),
(15, 81, NULL, 'onDomLoaded fails to load initially because of turbolinks. It only works with a refresh', '2017-10-05 00:46:04', '2017-10-05 00:46:04', 1, 0),
(16, 81, NULL, 'onDomLoaded fails to load initially because of turbolinks. It only works with a refresh', '2017-10-05 00:46:26', '2017-10-05 00:46:26', 1, 0),
(17, 81, 17, 'You\'ll notice I completely removed the bkLib.onDomLoaded line and just called the equivelant of document function do $ ->. The reason is bkLib.onDomLoaded fails to load initially because of turbolinks. It only works with a refresh. Thus why I\'ve removed it.', '2017-10-05 00:55:09', '2017-10-05 00:55:09', 1, 0),
(18, 81, 17, 'bkLib.onDomLoaded fails to load initially because of turbolinks. It only works with a refresh. Thus why I\'ve removed it.', '2017-10-05 00:57:06', '2017-10-05 00:57:06', 1, 0),
(19, 81, 17, 'You\'ll notice I completely removed the bkLib.onDomLoaded line and just called the equivelant of document function do $ ->. The reason is bkLib.onDomLoaded fails to load initially because of turbolinks. It only works with a refresh. Thus why I\'ve removed it.', '2017-10-05 00:57:16', '2017-10-05 00:57:16', 1, 0),
(20, 81, 17, 'You\'ll notice I completely removed the bkLib.onDomLoaded line and just called the equivelant of document function do $ ->. The reason is bkLib.onDomLoaded fails to load initially because of turbolinks. It only works with a refresh. Thus why I\'ve removed it.', '2017-10-05 00:57:25', '2017-10-05 00:57:25', 1, 0),
(21, 81, 17, 'ABC', '2017-10-05 00:57:38', '2017-10-05 00:57:38', 1, 0),
(22, 81, 17, 'DEFG', '2017-10-05 00:57:52', '2017-10-05 00:57:52', 1, 0),
(23, 81, 17, 'You\'ll notice I completely removed the bkLib.onDomLoaded line and just called the equivelant of document function do $ ->. The reason is bkLib.onDomLoaded fails to load initially because of turbolinks. It only works with a refresh. Thus why I\'ve removed it.', '2017-10-05 01:01:24', '2017-10-05 01:01:24', 1, 0),
(24, 81, 17, 'because of turbolinks. It only works with a refresh. Thus why I\'ve removed it.', '2017-10-05 01:01:30', '2017-10-05 01:01:30', 1, 0),
(25, 81, 17, 'because of turbolinks. It only works with a refresh. Thus why I\'ve removed it.', '2017-10-05 01:01:34', '2017-10-05 01:01:34', 1, 0),
(26, 81, 20, 'Then the stretching setting is forced to \"fill\". If you don\'t understand what I explained here, simply visit the website, right click.', '2017-10-05 01:49:46', '2017-10-05 01:49:46', 1, 0),
(27, 81, 20, 'ក្នុងការពិភាក្សានេះអំពីការច្នៃប្រឌិតយុទ្ធសាស្ត្រនិងភាពទទួលខុសត្រូវ។', '2017-10-05 01:50:13', '2017-10-05 01:50:13', 1, 0),
(28, 74, 17, 'bkLib.onDomLoaded line and just called the equivelant of document function do', '2017-10-06 19:06:52', '2017-10-06 19:06:52', 1, 0),
(29, 74, 19, 'How often do entrepreneurs and corporate leaders think about issues like fairness, accessibility or unseen biases', '2017-10-06 20:27:58', '2017-10-06 20:27:58', 1, 0),
(30, 74, 19, 'How often do entrepreneurs and corporate leaders think about issues', '2017-10-06 20:30:19', '2017-10-06 20:30:19', 1, 0),
(31, 74, 20, 'apple', '2017-10-06 22:02:21', '2017-10-06 22:02:21', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirm_password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `firstname`, `lastname`, `gender`, `username`, `password`, `confirm_password`, `email`, `phone`, `dob`, `status`, `address`, `image`, `created_at`, `updated_at`, `created_by`, `updated_by`, `is_deleted`) VALUES
(1, 'sor', 'bunthoeun', 'Male', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'bunthoeun@gmail.com', 'bunthoeun', '0000-00-00', 1, 'bunthoeun', 'public/uploads/images/employee/2017-06-07_940915_493043900900056_6360277654067618874_n.jpg', '2017-06-14 17:00:00', '2017-09-22 01:48:00', NULL, NULL, 1),
(2, 'market', 'Bopha Som', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'bopha.som@gmail.com', '098564712', '0000-00-00', 1, 'Tax', 'public/uploads/images/user.jpg', '2017-07-13 02:43:50', '2017-09-15 00:20:53', NULL, NULL, 1),
(3, 'staff', 'Bora Kry', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'bora.kry@gmail.com', '087550324', '0000-00-00', 1, 'Stock', 'public/uploads/images/user.jpg', '2017-07-13 02:53:49', '2017-09-22 01:47:57', NULL, NULL, 1),
(4, 'thw', 'Bun Ratha', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'ratha@gmail.com', '0988836464', '0000-00-00', 1, 'Stock', 'public/uploads/images/user.jpg', '2017-07-13 03:11:10', '2017-09-22 01:47:56', NULL, NULL, 1),
(5, 'english', 'Bunhong Chheang', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'bunhong.chheang@gmail.com', '098635210', '0000-00-00', 1, 'Tax', 'public/uploads/images/user.jpg', '2017-07-13 02:55:46', '2017-09-22 01:47:54', NULL, NULL, 1),
(6, 'added', 'Bunrath Heng', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'bunrath.heng@gmail.com', '016592857', '0000-00-00', 1, 'Stock', 'public/uploads/images/user.jpg', '2017-07-13 02:54:47', '2017-09-22 01:47:58', NULL, NULL, 1),
(7, 'B-Site', 'bunthoeun', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'bunthoeun@pos.com', '09983543', '0000-00-00', 1, 'CRM', 'public/uploads/images/user.jpg', '2017-07-17 08:21:22', '2017-09-22 01:48:00', NULL, NULL, 1),
(8, 'css', 'bunthoeun', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'sor_bunthoeun@yahoo.com', '03938423', '0000-00-00', 1, 'CRM', 'public/uploads/images/user.jpg', '2017-07-23 01:39:41', '2017-09-22 01:47:53', NULL, NULL, 1),
(9, 'erfwefztwe', 'bunthoeun', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'lina@test.com', '03938423', '0000-00-00', 1, 'CRM', 'public/uploads/images/user.jpg', '2017-07-23 02:00:39', '2017-09-22 01:47:52', NULL, NULL, 1),
(10, 'Oun', 'single', 'Female', 'singleoun', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'sima@test.com', '03938423', '2000-11-30', 1, 'ERP', 'public/uploads/images/user.jpg', '2017-07-23 01:42:21', '2017-09-22 01:47:50', NULL, 2, 1),
(11, 'work', 'Chenda Hong', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'chenda.hong@gmail.com', '015370279', '0000-00-00', 1, 'School', 'public/uploads/images/user.jpg', '2017-07-13 02:48:28', '2017-09-22 01:47:48', NULL, NULL, 1),
(12, 'esoftech', 'Chenda Kong', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'chenda.kong@esoftech.com.kh', '0184499556', '0000-00-00', 1, 'HRM', 'public/uploads/images/user.jpg', '2017-07-13 00:32:52', '2017-09-22 01:47:47', NULL, NULL, 1),
(13, 'army', 'Chory Vichey', 'Female', 'S00013', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'vichey.chory@gmail.com', '099231312', '2000-11-30', 1, 'School', 'public/uploads/images/user.jpg', '2017-07-13 03:04:41', '2017-09-22 01:47:45', NULL, 2, 1),
(14, 'office', 'Dara Eang', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'dara.eang@gmail.com', '098673525', '0000-00-00', 1, 'ERP', 'public/uploads/images/user.jpg', '2017-07-13 02:44:53', '2017-09-22 01:47:43', NULL, NULL, 1),
(15, 'toka', 'Den Dany', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'dany.den@gmail.com', '0183845753', '0000-00-00', 1, 'ERP', 'public/uploads/images/user.jpg', '2017-07-13 03:14:11', '2017-09-22 01:47:41', NULL, NULL, 1),
(16, 'dont', 'Don Ben', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'don.ben@gmail.com', '0193284743', '0000-00-00', 1, 'School', 'public/uploads/images/user.jpg', '2017-07-13 03:12:12', '2017-09-22 01:47:39', NULL, NULL, 1),
(17, 'ted', 'Ea Ratanak', 'Female', 'S00017', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'ratanak.ea@gmail.com', '095324645', '2000-11-30', 0, 'Stock', 'public/uploads/images/user.jpg', '2017-07-13 03:10:41', '2017-09-22 01:47:39', NULL, 2, 1),
(18, 'smpr', 'Ka Davan', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'davan.ka@gmail.com', '0983423232', '0000-00-00', 1, 'CRM', 'public/uploads/images/user.jpg', '2017-07-13 03:08:57', '2017-09-22 01:47:37', NULL, NULL, 1),
(19, 'ktt', 'Kai Davan', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'davan@gmail.com', '0494854933', '0000-00-00', 1, 'Stock', 'public/uploads/images/user.jpg', '2017-07-13 03:11:42', '2017-09-22 01:47:36', NULL, NULL, 1),
(20, 'tog', 'Kany Vanda', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'vanda.kany@gmail.com', '0973423234', '0000-00-00', 1, 'Stock', 'public/uploads/images/user.jpg', '2017-07-13 02:42:49', '2017-09-22 01:47:35', NULL, NULL, 1),
(21, 'pro', 'Keo Kakada', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'kakada.keo@gmail.com', '0123848533', '0000-00-00', 1, 'HRM', 'public/uploads/images/user.jpg', '2017-07-13 03:09:28', '2017-09-15 00:20:56', NULL, NULL, 1),
(22, 'idea', 'Kimleang Eng', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'kimleang.eng@mgail.com', '098452372', '0000-00-00', 1, 'School', 'public/uploads/images/user.jpg', '2017-07-13 03:07:49', '2017-09-15 00:20:56', NULL, NULL, 1),
(23, 'come', 'Kimsreav khem', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'kimsreav.khem@gmail.com', '098756435', '0000-00-00', 1, 'CRM', 'public/uploads/images/user.jpg', '2017-07-13 03:10:43', '2017-09-15 00:20:56', NULL, NULL, 1),
(24, 'solder', 'Leakena Hay', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'leakena.hay@gmail.com', '078343876', '0000-00-00', 1, 'Stock', 'public/uploads/images/user.jpg', '2017-07-13 02:41:18', '2017-09-15 00:20:56', NULL, NULL, 1),
(25, 'teach', 'Linda Thorn', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'linda.thorn098@gmail.com', '087982853', '0000-00-00', 1, 'ERP', 'public/uploads/images/user.jpg', '2017-07-13 02:33:07', '2017-09-15 00:20:56', NULL, NULL, 1),
(26, 'from', 'Lyheng Vet', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'lyheng.vet@gmail.com', '098764527', '0000-00-00', 1, 'CRM', 'public/uploads/images/user.jpg', '2017-07-13 03:12:22', '2017-09-15 00:20:57', NULL, NULL, 1),
(27, 'iforb', 'Makara Ngoem', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'makara.ngoen@gmail.com', '0813847573', '0000-00-00', 1, 'ERP', 'public/uploads/images/user.jpg', '2017-07-13 02:51:29', '2017-09-15 00:20:57', NULL, NULL, 1),
(28, 'student', 'Mara Dy', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'mara.dy@gmail.com', '098773528', '0000-00-00', 1, 'HRM', 'public/uploads/images/user.jpg', '2017-07-13 02:52:21', '2017-09-15 00:20:57', NULL, NULL, 1),
(29, 'test1', 'Mes Sok', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'messok@gmail.com', '0962233044', '0000-00-00', 1, 'HRM', 'public/uploads/images/user.jpg', '2017-07-13 02:35:22', '2017-09-15 00:20:57', NULL, NULL, 1),
(30, 'hitech', 'Mongka Tong', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'mongka@yahoo.com', '098367844', '0000-00-00', 1, 'Tax', 'public/uploads/images/user.jpg', '2017-07-13 00:35:14', '2017-09-15 00:20:57', NULL, NULL, 1),
(31, 'family', 'Mouysim Nay', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'mouysim.nay@gmail.com', '087653452', '0000-00-00', 1, 'Tax', 'public/uploads/images/user.jpg', '2017-07-13 03:05:44', '2017-09-15 00:20:57', NULL, NULL, 1),
(32, 'chair', 'Nara Rath', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'nara.rath@gmail.com', '0774378384', '0000-00-00', 1, 'Tax', 'public/uploads/images/user.jpg', '2017-07-13 03:02:12', '2017-09-15 00:20:58', NULL, NULL, 1),
(33, 'rotati', 'Nov Sochetra', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'sochertra.nov@gmail.com', '078455676', '0000-00-00', 1, 'Stock', 'public/uploads/images/user.jpg', '2017-07-13 03:06:37', '2017-09-15 00:20:58', NULL, NULL, 1),
(34, 'star', 'Pel Prek', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'pel.prek@gmail.com', '0962435095', '0000-00-00', 1, 'HRM', 'public/uploads/images/user.jpg', '2017-07-13 03:02:03', '2017-09-15 18:14:09', NULL, NULL, 1),
(35, 'telle', 'Pich Pen', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'pich.pen@gmail.com', '010234543', '0000-00-00', 1, 'School', 'public/uploads/images/user.jpg', '2017-07-13 02:50:13', '2017-09-15 00:20:58', NULL, NULL, 1),
(36, 'toyi', 'Ra Rothani', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'ra.rathani@gmail.com', '010858763', '0000-00-00', 1, 'CRM', 'public/uploads/images/user.jpg', '2017-07-13 03:16:10', '2017-09-15 00:20:58', NULL, NULL, 1),
(37, 'hotel', 'Raksa Doung', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'raksa.doung@gmail.com', '081463282', '0000-00-00', 1, 'Tax', 'public/uploads/images/user.jpg', '2017-07-13 02:58:27', '2017-09-15 00:20:58', NULL, NULL, 1),
(38, 'data', 'Raksme Chun', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'raksmey.chun@gmail.com', '081672076', '0000-00-00', 1, 'School', 'public/uploads/images/user.jpg', '2017-07-13 02:42:36', '2017-09-15 00:20:58', NULL, NULL, 1),
(39, 'train', 'Reach Borey', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'borey@gmail.com', '0962434094', '0000-00-00', 1, 'School', 'public/uploads/images/user.jpg', '2017-07-13 03:17:01', '2017-09-15 00:20:58', NULL, NULL, 1),
(40, 'tiar', 'Ren Rain', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'ren@gmail.com', '0931234433', '0000-00-00', 1, 'Tax', 'public/uploads/images/user.jpg', '2017-07-13 03:13:28', '2017-09-15 00:20:59', NULL, NULL, 1),
(41, 'dentist', 'Sengchhum Chhong', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'sengchhun.chhong@gmail.com', '098763423', '0000-00-00', 1, 'ERP', 'public/uploads/images/user.jpg', '2017-07-13 03:16:29', '2017-09-15 00:20:59', NULL, NULL, 1),
(42, 'read', 'Senghong Tang', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'senghong.tang@gmail.com', '017452910', '0000-00-00', 1, 'HRM', 'public/uploads/images/user.jpg', '2017-07-13 02:59:22', '2017-09-15 00:20:59', NULL, NULL, 1),
(43, 'doctor', 'Seyha Mean', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'seyha.mean@gmail.com', '017983518', '0000-00-00', 1, 'ERP', 'public/uploads/images/user.jpg', '2017-07-13 02:56:39', '2017-09-15 00:20:59', NULL, NULL, 1),
(44, 'time', 'Sok Panha', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'panha.som@gmail.com', '0888823233', '0000-00-00', 1, 'CRM', 'public/uploads/images/user.jpg', '2017-07-13 03:07:38', '2017-09-15 00:20:59', NULL, NULL, 1),
(45, 'test', 'Sok Penh', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'sok.penh@gmail.com', '0962535083', '2000-11-30', 1, 'ERP', 'public/uploads/images/user.jpg', '2017-07-13 02:33:12', '2017-09-15 00:20:59', NULL, 1, 1),
(46, 'success', 'Sokha Chorn', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'sokha.chorn@gmail.com', '015673529', '0000-00-00', 1, 'HRM', 'public/uploads/images/user.jpg', '2017-07-13 02:46:35', '2017-09-15 00:21:00', NULL, NULL, 1),
(47, 'teller', 'Sokhay Chhean', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'sokhay.chhean@gmail.com', '087984627', '0000-00-00', 1, 'HRM', 'public/uploads/images/user.jpg', '2017-07-13 02:35:55', '2017-09-15 00:21:00', NULL, NULL, 1),
(48, 'listen', 'Sokheng Hong', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'sokheng.hong@gmail.com', '098645323', '0000-00-00', 1, 'CRM', 'public/uploads/images/user.jpg', '2017-07-13 03:08:46', '2017-09-15 00:21:00', NULL, NULL, 1),
(49, 'intern', 'Sokhom Neath', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'sokhom.neath@gmail.com', '016385357', '0000-00-00', 1, 'HRM', 'public/uploads/images/user.jpg', '2017-07-13 02:57:43', '2017-09-15 00:21:00', NULL, NULL, 1),
(50, 'mouse', 'Sokun Kea', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'sokun.kea@gmail.com', '087982853', '0000-00-00', 1, 'School', 'public/uploads/images/user.jpg', '2017-07-13 03:14:57', '2017-09-15 00:21:01', NULL, NULL, 1),
(51, 'book', 'Sopheak Heak', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'sopheak.heak@mail.com', '016873543', '0000-00-00', 1, 'Stock', 'public/uploads/images/user.jpg', '2017-07-13 03:00:06', '2017-09-15 00:21:01', NULL, NULL, 1),
(52, 'eup', 'Sor Vichey', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'sor.vichey@gmail.com', '0123434095', '0000-00-00', 1, 'ERP', 'public/uploads/images/user.jpg', '2017-07-13 03:00:22', '2017-09-15 00:21:01', NULL, NULL, 1),
(53, 'company', 'Sorya chea', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'sorya.chea@gmail.com', '098562859', '0000-00-00', 1, 'HRM', 'public/uploads/images/user.jpg', '2017-07-13 03:03:36', '2017-09-15 00:21:01', NULL, NULL, 1),
(54, 'Sou', 'Boran', 'Female', 'Boran123', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'boran.sou@gmaill.com', '010122333', '2000-11-30', 1, '#PP', 'public/uploads/images/user.jpg', '2017-07-13 03:03:46', '2017-09-22 01:22:30', NULL, 2, 1),
(55, 'spb', 'Sou Borat', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'borat.sou@gmail.com', '016232343', '0000-00-00', 1, 'Stock', 'public/uploads/images/user.jpg', '2017-07-13 03:02:53', '2017-09-15 00:21:02', NULL, NULL, 1),
(56, 'bike', 'Souytry Hak', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'souytry.hak@gmail.com', '070986543', '0000-00-00', 1, 'CRM', 'public/uploads/images/user.jpg', '2017-07-13 03:11:30', '2017-09-15 00:21:02', NULL, NULL, 1),
(57, 'developer', 'Sreyleak Meas', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'sreyleak.meas@gmail.com', '070053761', '0000-00-00', 1, 'Tax', 'public/uploads/images/user.jpg', '2017-07-13 02:50:05', '2017-09-15 00:21:02', NULL, NULL, 1),
(58, 'hope', 'Sreyneath Phan', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'sreyneth.phan@gmail.com', '092175839', '0000-00-00', 1, 'School', 'public/uploads/images/user.jpg', '2017-07-13 03:00:52', '2017-09-15 00:21:02', NULL, NULL, 1),
(59, 'home', 'Sreypov Vy', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'sreypov.vy@gmail.com', '098734637', '0000-00-00', 1, 'HRM', 'public/uploads/images/user.jpg', '2017-07-13 03:06:36', '2017-09-15 00:21:02', NULL, NULL, 1),
(60, 'teee', 'Te Tan', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'tetan@gmail.com', '0394873222', '0000-00-00', 1, 'CRM', 'public/uploads/images/user.jpg', '2017-07-13 03:13:52', '2017-09-22 01:47:34', NULL, NULL, 1),
(61, 'rth', 'Tim Ratha', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'ratha.tim@gmail.com', '0983874853', '0000-00-00', 1, 'ERP', 'public/uploads/images/user.jpg', '2017-07-13 03:10:01', '2017-09-22 01:47:33', NULL, NULL, 1),
(62, 'detail', 'Tivang Yeom', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'tivang.yeom@mail.com', '010762843', '0000-00-00', 1, 'CRM', 'public/uploads/images/user.jpg', '2017-07-13 02:39:14', '2017-09-22 01:47:31', NULL, NULL, 1),
(63, 'admin', 'Vandy Chhay', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'vandy.chhay@gmail.com', '017874017', '0000-00-00', 1, 'Stock', 'public/uploads/images/user.jpg', '2017-07-13 02:47:34', '2017-09-15 00:21:03', NULL, NULL, 1),
(64, 'warehouse', 'Veasna Dim', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'veasna.dim@gmail.com', '078453627', '0000-00-00', 1, 'CRM', 'public/uploads/images/user.jpg', '2017-07-13 03:13:20', '2017-09-22 01:47:30', NULL, NULL, 1),
(65, 'c21mekong', 'Vireak Lin', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'vireak.lin@c21mekong.com', '093482883', '0000-00-00', 1, 'ERP', 'public/uploads/images/user.jpg', '2017-07-13 00:29:56', '2017-09-22 01:47:29', NULL, NULL, 1),
(66, 'board', 'Vitou Chham', 'Female', 'bbu234', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'vitou.chham@gmail.com', '098675432', '2000-11-30', 1, 'Tax', 'public/uploads/images/user.jpg', '2017-07-13 03:09:39', '2017-09-22 01:47:28', NULL, 2, 1),
(67, 'trainer', 'Vongkol Hak', 'Female', 'vongkol', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'vongkol.hak@gmail.com', '092473837', '2000-11-30', 1, 'ERP', 'public/uploads/images/user.jpg', '2017-07-13 02:51:28', '2017-09-22 01:47:27', NULL, 2, 1),
(68, 'Ya', 'Yati', 'Female', 'Yati', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'yati.ya@gmail.com', '045221284', '2000-11-30', 1, 'ERP', 'public/uploads/images/user.jpg', '2017-07-13 03:15:28', '2017-09-22 01:47:26', NULL, 2, 1),
(69, 'Yem', 'Sokna', 'Female', 'Sokna123', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'sokna.yem@gmail.com', '0128475822', '1999-11-30', 1, 'CRM', 'public/uploads/images/user.jpg', '2017-07-13 03:05:33', '2017-09-22 01:47:25', NULL, 2, 1),
(70, 'Yoem', 'Sima', 'Male', 'Yoem', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'yoemsimar@gmail.com', '0962434084', '2000-11-09', 1, '#PP', 'public/uploads/images/user.jpg', '2017-07-13 02:41:04', '2017-09-22 01:47:24', NULL, 2, 1),
(71, 'bora', 'ma', 'Male', 'jojo', 'e10adc3949ba59abbe56e057f20f883e', '123456', NULL, '098 372 383', '2000-09-06', 1, 'pp', NULL, '2017-09-05 20:25:34', '2017-09-22 01:47:24', NULL, 2, 1),
(72, 'Mouy', 'Srey', 'Male', 'pp9362', 'e10adc3949ba59abbe56e057f20f883e', '123456', NULL, '098 276 382', '2000-09-01', 1, '#PP', NULL, '2017-09-05 20:28:40', '2017-09-22 01:47:23', NULL, 1, 1),
(73, 'Ma', 'Maly', 'Male', 's09384', 'e10adc3949ba59abbe56e057f20f883e', '123456', NULL, '098 383 772', '1992-09-08', 1, '#PP', NULL, '2017-09-05 20:29:20', '2017-09-22 01:47:22', NULL, 2, 1),
(74, 'bunthoeun', 'sor', 'Male', 'bunthoeun', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'bun@gmail.com', NULL, NULL, 1, NULL, NULL, '2017-09-05 21:13:14', '2017-09-22 01:10:39', 1, 1, 1),
(75, 'bun', 'thoeun', 'Male', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, '098 287 273', '2017-09-06', 1, '#pp', NULL, '2017-09-06 02:44:22', '2017-09-22 01:47:21', 1, 1, 1),
(76, 'Mey', 'Mey', 'Female', 'mey', 'fe3ca9163ddfabb95b2e8e15f3aa6aeb', 'mey', 'mey@gmail.com', '098 384 482', NULL, 1, '#PP', NULL, '2017-09-15 00:07:09', '2017-09-22 01:48:15', 2, NULL, 1),
(77, 'momo', 'ly', 'Male', 'S00077', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'S00077@gmail.com', '098 834 938', '2000-09-15', 1, '#PP', NULL, '2017-09-21 18:51:16', '2017-09-22 01:47:18', 2, 2, 1),
(78, NULL, NULL, NULL, 'customer1', '123456', NULL, 'customer1@gmail.com', '098 476 384', NULL, 1, NULL, NULL, '2017-10-04 20:17:53', '2017-10-04 20:17:53', NULL, NULL, 1),
(79, NULL, NULL, NULL, 'fwedfa', '827ccb0eea8a706c4c34a16891f84e7b', '12345', 'bunthoeun2@gmail.com', '098 094 932', NULL, 1, NULL, NULL, '2017-10-04 20:27:04', '2017-10-04 20:27:04', NULL, NULL, 1),
(80, NULL, NULL, NULL, 'bunthoeun2', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'rothana.por3@gmail.com', NULL, NULL, 1, NULL, NULL, '2017-10-04 20:28:04', '2017-10-04 20:28:04', NULL, NULL, 1),
(81, NULL, NULL, NULL, 'bunthoeun3', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'bunthoeun3@gmail.com', '098 838 393', NULL, 1, NULL, NULL, '2017-10-04 21:08:28', '2017-10-04 21:08:28', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `feed_back`
--

CREATE TABLE `feed_back` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feed_back`
--

INSERT INTO `feed_back` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Bunthoeun', 'bunthoeun@gmail.com', 'Send Test Messang', '2017-10-08 18:41:46', '2017-10-08 18:41:46', 1),
(2, 'efqawe', 'bunthoeun@gmail.com', 'dvgasedfvaesz', '2017-10-10 18:59:27', '2017-10-10 18:59:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `code` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  `cteated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `code`, `name`, `status`, `cteated_at`, `updated_at`) VALUES
(1, 'en', 'English', 1, '2017-09-27 03:56:52', '0000-00-00 00:00:00'),
(2, 'kh', 'ភាសា​ខ្មែរ', 1, '2017-09-27 03:57:36', '0000-00-00 00:00:00'),
(3, 'th', 'ไทย', 0, '2017-09-27 06:07:06', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `link_download`
--

CREATE TABLE `link_download` (
  `id` int(11) NOT NULL,
  `post_group_id` int(11) DEFAULT NULL,
  `title` varbinary(300) DEFAULT NULL,
  `link` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `slug` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `link_download`
--

INSERT INTO `link_download` (`id`, `post_group_id`, `title`, `link`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `slug`) VALUES
(1, 16, 0x5468657265206172652074776f20746f6f6c73207468617420796f75206e65656420746f20646576656c6f70206170707320, 'https://drive.google.com/file/d/0B1dv5sqSPsPbUHM1SlBWNG9jYWs/view?usp=sharing', 1, NULL, NULL, '2017-10-05 09:43:11', '0000-00-00 00:00:00', '0B1dv5sqSPsPbUHM1SlBWNG9jYWs'),
(2, 16, 0x362de19e80e19f92e19e9ae19e9fe19ebde19e84e19e9ce19e94e19f92e19e94e19e92e19e98e19f8c20e19e93e19eb7e19e84e19e9ce19eb7e19e85e19eb7e19e8fe19f92e19e9ae19e9fe19eb7e19e9be19f92e19e94e19f88, 'https://drive.google.com/file/d/0B1dv5sqSPsPbZE5DSkg5emRBYkU/view?usp=sharing', 1, NULL, NULL, '2017-10-05 09:33:02', '0000-00-00 00:00:00', '0B1dv5sqSPsPbZE5DSkg5emRBYkU'),
(3, 20, 0x5f5f727a695f302e32343620446f776e6c6f61642046726565, 'https://drive.google.com/file/d/0B2z2GYr8c_ugUEdVcFRyMThkdGM/view?usp=sharing', 1, 2, NULL, '2017-10-05 18:57:02', '2017-10-05 18:57:02', 'dDtCCZ20171006015702'),
(4, 20, 0x4672656520646f776e6c6f616420466f726d2e68746d6c, 'https://drive.google.com/open?id=0B2z2GYr8c_ugTkZaZS1XdjRtTDQ', 1, 2, NULL, '2017-10-05 18:58:18', '2017-10-05 18:58:18', 'lfyewB20171006015818'),
(5, 18, 0x5465737420646f776e6c6f6164207a6970, 'https://drive.google.com/open?id=0B2z2GYr8c_ugeHFpUkxBMXZjbGc', 1, 2, 2, '2017-10-06 02:25:32', '2017-10-05 19:25:32', 'oAk9sr20171006021952');

-- --------------------------------------------------------

--
-- Table structure for table `log_history`
--

CREATE TABLE `log_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `log_history`
--

INSERT INTO `log_history` (`id`, `user_id`, `ip_address`, `date`, `status`) VALUES
(1, 1, '::1', '2017-08-17 09:55:25', 0),
(2, 1, '::1', '2017-08-17 10:04:48', 1),
(3, 1, '::1', '2017-08-17 10:05:02', 1),
(4, 1, '::1', '2017-08-17 10:10:34', 1),
(5, 1, '::1', '2017-08-17 12:47:26', 1),
(6, 1, '::1', '2017-08-17 12:48:00', 1),
(7, 1, '::1', '2017-08-17 12:49:30', 1),
(8, 1, '::1', '2017-08-17 14:08:40', 1),
(9, 1, '::1', '2017-08-18 01:12:32', 1),
(10, 1, '::1', '2017-08-18 01:14:03', 1),
(11, 1, '::1', '2017-08-18 01:37:33', 1),
(15, 1, '::1', '2017-08-18 03:55:20', 1),
(16, 1, '::1', '2017-08-18 06:30:36', 1),
(17, 1, '::1', '2017-08-18 07:17:33', 1),
(18, 1, '::1', '2017-08-18 07:54:28', 1),
(19, 1, '::1', '2017-08-18 08:07:34', 1),
(20, 1, '::1', '2017-08-18 09:12:58', 1),
(22, 1, '::1', '2017-08-19 01:09:50', 1),
(24, 1, '::1', '2017-08-19 04:45:49', 1),
(25, 1, '::1', '2017-08-19 12:16:01', 1),
(26, 1, '::1', '2017-08-19 12:16:14', 1),
(27, 1, '::1', '2017-08-19 12:16:28', 1),
(28, 1, '::1', '2017-08-19 16:58:12', 1),
(29, 1, '::1', '2017-08-19 16:59:18', 1),
(30, 1, '::1', '2017-08-20 05:19:46', 1),
(31, 1, '::1', '2017-08-20 12:01:19', 1),
(32, 1, '::1', '2017-08-21 01:00:05', 1),
(34, 1, '::1', '2017-08-21 03:18:31', 1),
(36, 1, '::1', '2017-08-21 06:24:11', 1),
(37, 1, '::1', '2017-08-22 01:02:22', 1),
(38, 1, '::1', '2017-08-22 01:19:37', 1),
(39, 1, '::1', '2017-08-23 01:00:10', 1),
(40, 1, '::1', '2017-08-23 08:02:03', 1),
(41, 1, '::1', '2017-08-23 08:49:27', 1),
(42, 1, '::1', '2017-08-23 08:50:58', 1),
(43, 1, '::1', '2017-08-23 08:51:41', 1),
(44, 1, '::1', '2017-08-23 09:11:04', 1),
(45, 1, '192.168.56.2', '2017-08-23 11:08:42', 1),
(47, 1, '::1', '2017-08-24 01:00:37', 1),
(49, 1, '192.168.56.2', '2017-08-24 04:48:59', 1),
(50, 1, '::1', '2017-08-24 07:51:03', 1),
(53, 1, '::1', '2017-08-24 09:23:55', 1),
(55, 1, '::1', '2017-08-25 00:58:09', 1),
(58, 1, '::1', '2017-08-25 03:32:51', 1),
(60, 1, '::1', '2017-08-25 08:35:49', 1),
(63, 1, '::1', '2017-08-25 09:24:20', 1),
(64, 1, '::1', '2017-08-25 09:38:58', 1),
(65, 1, '192.168.1.106', '2017-08-25 14:12:39', 1),
(66, 1, '::1', '2017-08-25 14:17:53', 1),
(67, 1, '::1', '2017-08-26 01:05:14', 1),
(68, 1, '::1', '2017-08-26 01:38:15', 1),
(69, 1, '::1', '2017-08-26 02:25:49', 1),
(70, 1, '::1', '2017-08-26 12:09:07', 1),
(71, 1, '::1', '2017-08-28 01:04:49', 1),
(72, 1, '::1', '2017-08-28 02:53:45', 1),
(73, 1, '192.168.56.2', '2017-08-28 05:22:58', 1),
(74, 2, '::1', '2017-08-28 06:22:05', 1),
(75, 1, '::1', '2017-08-28 08:25:27', 1),
(76, 1, '::1', '2017-08-29 01:08:45', 1),
(77, 1, '::1', '2017-08-30 02:54:33', 1),
(78, 1, '::1', '2017-08-30 02:58:00', 1),
(79, 2, '::1', '2017-08-30 02:58:24', 1),
(80, 1, '::1', '2017-08-31 01:21:49', 1),
(81, 1, '::1', '2017-08-31 01:50:50', 1),
(82, 1, '::1', '2017-08-31 01:55:47', 1),
(83, 1, '::1', '2017-08-31 02:49:13', 1),
(84, 1, '::1', '2017-08-31 03:22:05', 1),
(85, 1, '::1', '2017-08-31 03:49:50', 1),
(86, 1, '::1', '2017-08-31 07:01:58', 1),
(88, 3, '192.168.0.11', '2017-08-31 07:32:39', 1),
(89, 1, '::1', '2017-08-31 07:37:30', 1),
(90, 1, '::1', '2017-08-31 07:56:47', 1),
(91, 1, '::1', '2017-09-01 01:09:23', 1),
(92, 3, '::1', '2017-09-01 01:12:12', 1),
(94, 1, '::1', '2017-09-01 07:18:37', 1),
(95, 1, '::1', '2017-09-01 08:35:11', 1),
(96, 1, '127.0.0.1', '2017-09-01 08:40:18', 1),
(97, 1, '127.0.0.1', '2017-09-02 02:45:43', 1),
(99, 3, '127.0.0.1', '2017-09-02 04:02:17', 1),
(101, 1, '127.0.0.1', '2017-09-04 02:31:52', 1),
(102, 1, '::1', '2017-09-04 13:30:31', 1),
(103, 2, '::1', '2017-09-15 03:21:32', 1),
(104, 2, '::1', '2017-09-15 03:21:32', 1),
(105, 2, '::1', '2017-09-15 03:29:06', 1),
(106, 2, '::1', '2017-09-15 03:36:56', 1),
(107, 2, '::1', '2017-09-15 03:43:44', 1),
(108, 2, '::1', '2017-09-15 03:45:56', 1),
(109, 2, '::1', '2017-09-15 03:47:49', 1),
(110, 2, '::1', '2017-09-15 03:48:01', 1),
(111, 2, '::1', '2017-09-15 03:49:02', 1),
(112, 2, '::1', '2017-09-15 03:50:45', 1),
(113, 2, '::1', '2017-09-15 03:51:16', 1),
(114, 1, '::1', '2017-09-15 04:01:30', 1),
(115, 2, '::1', '2017-09-15 04:02:00', 1),
(116, 2, '::1', '2017-09-15 04:02:39', 1),
(117, 3, '::1', '2017-09-15 04:03:53', 1),
(118, 2, '::1', '2017-09-15 04:33:42', 1),
(119, 2, '::1', '2017-09-15 04:38:06', 1),
(120, 2, '::1', '2017-09-15 04:38:19', 1),
(121, 2, '::1', '2017-09-15 04:38:39', 1),
(122, 2, '::1', '2017-09-15 06:22:13', 1),
(123, 3, '::1', '2017-09-15 06:35:22', 1),
(124, 3, '::1', '2017-09-15 06:52:40', 1),
(125, 2, '::1', '2017-09-16 01:12:16', 1),
(126, 2, '::1', '2017-09-22 01:24:03', 1),
(127, 2, '::1', '2017-09-22 01:41:49', 1),
(128, 2, '::1', '2017-09-22 01:44:31', 1),
(129, 2, '::1', '2017-09-23 01:49:47', 1),
(130, 2, '::1', '2017-09-27 03:16:49', 1),
(131, 2, '::1', '2017-09-27 04:46:45', 1),
(132, 1, '::1', '2017-09-27 09:16:31', 1),
(133, 1, '::1', '2017-09-27 09:36:44', 1),
(134, 1, '::1', '2017-09-27 09:49:51', 1),
(135, 2, '::1', '2017-09-28 01:10:05', 1),
(136, 2, '::1', '2017-09-28 02:39:30', 1),
(137, 2, '::1', '2017-09-28 03:07:34', 1),
(138, 2, '::1', '2017-09-28 07:07:30', 1),
(139, 2, '::1', '2017-09-29 02:37:08', 1),
(140, 1, '::1', '2017-09-29 08:08:42', 1),
(141, 1, '::1', '2017-10-02 03:10:10', 1),
(142, 1, '::1', '2017-10-03 01:51:38', 1),
(143, 1, '::1', '2017-10-04 01:42:48', 1),
(144, 1, '::1', '2017-10-05 01:09:02', 1),
(145, 2, '::1', '2017-10-06 01:27:46', 1),
(146, 4, '::1', '2017-10-06 07:05:43', 1),
(147, 2, '::1', '2017-10-09 01:50:35', 1),
(148, 2, '::1', '2017-10-10 03:03:48', 1),
(149, 2, '::1', '2017-10-11 03:04:41', 1),
(150, 2, '::1', '2017-10-11 06:24:51', 1);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_08_25_143013_create_item_table', 2),
(4, '2017_08_25_144726_entrust_setup_tables', 2);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'List Role', 'See only Listing Of Role', '2017-08-25 08:00:02', '2017-08-25 08:00:02'),
(2, 'role-create', 'Add Role', 'Create New Role', '2017-08-25 08:00:02', '2017-08-25 08:00:02'),
(3, 'role-edit', 'Edit Role', 'Edit Role', '2017-08-25 08:00:02', '2017-08-25 08:00:02'),
(4, 'user-list', 'List User', '', '2017-08-25 08:00:02', '2017-08-25 08:00:02'),
(5, 'user-create', 'Add User', '', '2017-08-25 08:00:02', '2017-08-25 08:00:02'),
(6, 'user-edit', 'Edit User', '', '2017-08-25 08:00:03', '2017-08-25 08:00:03'),
(7, 'student-exam', 'List Exam Student', '', '2017-08-25 08:00:03', '2017-08-25 08:00:03'),
(8, 'student-check-exam', 'Check Exam Student', '', '2017-08-25 08:00:03', '2017-08-25 08:00:03'),
(9, 'student-add-exam', 'Add Student To Exam', '', NULL, NULL),
(11, 'course-list', 'List Course', NULL, NULL, NULL),
(12, 'course-create', 'Add Course', NULL, NULL, NULL),
(13, 'course-edit', 'Edit Course', NULL, NULL, NULL),
(14, 'category-list', 'List Category', NULL, NULL, NULL),
(15, 'category-create', 'Add Category', NULL, NULL, NULL),
(16, 'category-edit', 'Edit Category', NULL, NULL, NULL),
(17, 'exam-list', 'Exam List', NULL, NULL, NULL),
(21, 'exam-create', 'Add Exam', NULL, NULL, NULL),
(22, 'exam-edit', 'Edit Exam', NULL, NULL, NULL),
(23, 'question-list', 'List Question', NULL, NULL, NULL),
(25, 'question-create', 'Add Question', NULL, NULL, NULL),
(26, 'question-edit', 'Edit Question', NULL, NULL, NULL),
(27, 'student-list', 'List Student', NULL, NULL, NULL),
(28, 'student-create', 'Add Student', NULL, NULL, NULL),
(29, 'student-edit', 'Edit Student', NULL, NULL, NULL),
(30, 'setting', 'Setting', NULL, NULL, NULL),
(31, 'report-student', 'Report Student', NULL, NULL, NULL),
(32, 'report-question', 'Report Question', NULL, NULL, NULL),
(33, 'report-question-answer', 'Report Question Answer', NULL, NULL, NULL),
(34, 'report-student-test-daily', 'Report Studennt Test Daily', NULL, NULL, NULL),
(35, 'report-student-test-history', 'Report Studennt Test History', NULL, NULL, NULL),
(36, 'security', 'Security', 'Show History User Login and Block IP', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 4),
(1, 5),
(2, 1),
(2, 2),
(2, 4),
(2, 5),
(3, 1),
(3, 2),
(3, 4),
(3, 5),
(4, 1),
(4, 2),
(4, 4),
(4, 5),
(5, 1),
(5, 2),
(5, 4),
(5, 5),
(6, 1),
(6, 2),
(6, 4),
(6, 5),
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(7, 5),
(8, 1),
(8, 2),
(8, 4),
(8, 5),
(9, 1),
(9, 2),
(9, 5),
(10, 5),
(11, 1),
(12, 1),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(21, 1),
(21, 2),
(22, 1),
(22, 2),
(23, 1),
(25, 1),
(25, 2),
(26, 1),
(26, 2),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(30, 2),
(31, 1),
(31, 2),
(32, 1),
(32, 2),
(33, 1),
(33, 2),
(34, 1),
(34, 2),
(35, 1),
(35, 2),
(36, 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `category_group_id` int(11) DEFAULT '0',
  `sub_category_group_id` int(11) DEFAULT '0',
  `title` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `image` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_status` varchar(100) COLLATE utf8_unicode_ci DEFAULT 'normal',
  `video_type` varchar(100) COLLATE utf8_unicode_ci DEFAULT 'youtube',
  `status` int(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(1) DEFAULT '0',
  `updated_by` int(1) DEFAULT '0',
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `language_code` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `download_type` varchar(25) COLLATE utf8_unicode_ci DEFAULT 'sale',
  `file_type_1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity_file_type_1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_type_2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity_file_type_2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author_photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author_description` longtext COLLATE utf8_unicode_ci,
  `price` decimal(18,2) DEFAULT '0.00',
  `count_view` int(11) DEFAULT '0',
  `rating` int(2) DEFAULT '0',
  `like` int(11) DEFAULT '0',
  `dislike` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `group_id`, `category_group_id`, `sub_category_group_id`, `title`, `description`, `content`, `image`, `video_id`, `post_status`, `video_type`, `status`, `created_at`, `created_by`, `updated_by`, `updated_at`, `language_code`, `slug`, `download_type`, `file_type_1`, `quantity_file_type_1`, `file_type_2`, `quantity_file_type_2`, `author_name`, `author_photo`, `author_description`, `price`, `count_view`, `rating`, `like`, `dislike`) VALUES
(31, 16, 3, 4, 'ងាយស្រួល និងសុក្រិត (Labor Wage)', 'video Tutorial Engerneer', NULL, NULL, 'IQsov8ijLEc', 'normal', 'youtube', 1, '2017-10-11 04:13:03', 1, 2, '2017-10-10 21:13:03', 'en', 'isezKVIoJnDK20171004034437', 'sale', 'Excel', '40', 'Video', '23', NULL, NULL, '<span style=\"color: rgb(36, 39, 41); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px;\">I\'ve been trying to use nicedit (http://nicedit.com/) on a form for my website (which I am using to submit short stories). The form includes several textareas (). One of them is for the content of the short story, which i want to use nicedit on. The other text area is for tags, which i do not want to use nicedit on. However, nicedit gets applied to both.</span>', '59.00', 2, 4, 0, 0),
(32, 16, 3, 4, 'ការបើកលុយអោយកម្មករយ៉ាងងាយស្រួ', 'ការបើកលុយអោយកម្មករយ៉ាងងាយស្រួល និងសុក្រិត (Labor Wage)', NULL, NULL, 'IQsov8ijLEc', 'normal', 'youtube', 1, '2017-10-11 04:13:03', 1, 2, '2017-10-10 21:13:03', 'kh', 'isezKVIoJnDK20171004034437', 'sale', 'Excel', '40', 'វីដេអូ', '23', NULL, NULL, '<span style=\"color: rgb(36, 39, 41); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px;\">I\'ve been trying to use nicedit (http://nicedit.com/) on a form for my website (which I am using to submit short stories). The form includes several textareas (). One of them is for the content of the short story, which i want to use nicedit on. The other text area is for tags, which i do not want to use nicedit on. However, nicedit gets applied to both.</span>', '59.00', 2, 4, 0, 0),
(33, 17, 2, 4, '16 How to create BOQ Part 12', '16 How to create BOQ Part 12', NULL, NULL, '8Cpp0e1-AWw', 'normal', 'youtube', 1, '2017-10-09 01:48:32', 1, 0, '2017-10-08 18:48:32', 'en', 'Ybrh6fWrhcGrhbKiHb20171004035305', 'sale', 'Excel', '20', 'Videos', '30', NULL, NULL, '<span style=\"color: rgb(36, 39, 41); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px;\">You\'ll notice I completely removed the&nbsp;</span><code style=\"margin: 0px; padding: 1px 5px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 13px; line-height: inherit; font-family: Consolas, Menlo, Monaco, &quot;Lucida Console&quot;, &quot;Liberation Mono&quot;, &quot;DejaVu Sans Mono&quot;, &quot;Bitstream Vera Sans Mono&quot;, &quot;Courier New&quot;, monospace, sans-serif; vertical-align: baseline; background-color: rgb(239, 240, 241); white-space: pre-wrap; color: rgb(36, 39, 41);\">bkLib.onDomLoaded</code><span style=\"color: rgb(36, 39, 41); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px;\">&nbsp;line and just called the equivelant of document function do&nbsp;</span><code style=\"margin: 0px; padding: 1px 5px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 13px; line-height: inherit; font-family: Consolas, Menlo, Monaco, &quot;Lucida Console&quot;, &quot;Liberation Mono&quot;, &quot;DejaVu Sans Mono&quot;, &quot;Bitstream Vera Sans Mono&quot;, &quot;Courier New&quot;, monospace, sans-serif; vertical-align: baseline; background-color: rgb(239, 240, 241); white-space: pre-wrap; color: rgb(36, 39, 41);\">$ -&gt;</code><span style=\"color: rgb(36, 39, 41); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px;\">. The reason is&nbsp;</span><code style=\"margin: 0px; padding: 1px 5px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 13px; line-height: inherit; font-family: Consolas, Menlo, Monaco, &quot;Lucida Console&quot;, &quot;Liberation Mono&quot;, &quot;DejaVu Sans Mono&quot;, &quot;Bitstream Vera Sans Mono&quot;, &quot;Courier New&quot;, monospace, sans-serif; vertical-align: baseline; background-color: rgb(239, 240, 241); white-space: pre-wrap; color: rgb(36, 39, 41);\">bkLib.onDomLoaded</code><span style=\"color: rgb(36, 39, 41); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px;\">&nbsp;fails to load initially because of&nbsp;</span><strong style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 15px; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; vertical-align: baseline; color: rgb(36, 39, 41);\">turbolinks</strong><span style=\"color: rgb(36, 39, 41); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px;\">. It only works with a refresh. Thus why I\'ve removed it.</span><br>', '49.00', 15, 4, 0, 0),
(34, 17, 2, 4, 'របៀបបង្កើតតារាងតំលៃសាងសងភាគ១២', 'របៀបបង្កើតតារាងតំលៃសាងសងភាគ១២', NULL, NULL, '8Cpp0e1-AWw', 'normal', 'youtube', 1, '2017-10-09 01:48:32', 1, 0, '2017-10-08 18:48:32', 'kh', 'Ybrh6fWrhcGrhbKiHb20171004035305', 'sale', 'Excel', '20', 'វីដេអូ', '30', NULL, NULL, '<span style=\"color: rgb(36, 39, 41); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px;\">You\'ll notice I completely removed the&nbsp;</span><code style=\"margin: 0px; padding: 1px 5px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 13px; line-height: inherit; font-family: Consolas, Menlo, Monaco, &quot;Lucida Console&quot;, &quot;Liberation Mono&quot;, &quot;DejaVu Sans Mono&quot;, &quot;Bitstream Vera Sans Mono&quot;, &quot;Courier New&quot;, monospace, sans-serif; vertical-align: baseline; background-color: rgb(239, 240, 241); white-space: pre-wrap; color: rgb(36, 39, 41);\">bkLib.onDomLoaded</code><span style=\"color: rgb(36, 39, 41); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px;\">&nbsp;line and just called the equivelant of document function do&nbsp;</span><code style=\"margin: 0px; padding: 1px 5px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 13px; line-height: inherit; font-family: Consolas, Menlo, Monaco, &quot;Lucida Console&quot;, &quot;Liberation Mono&quot;, &quot;DejaVu Sans Mono&quot;, &quot;Bitstream Vera Sans Mono&quot;, &quot;Courier New&quot;, monospace, sans-serif; vertical-align: baseline; background-color: rgb(239, 240, 241); white-space: pre-wrap; color: rgb(36, 39, 41);\">$ -&gt;</code><span style=\"color: rgb(36, 39, 41); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px;\">. The reason is&nbsp;</span><code style=\"margin: 0px; padding: 1px 5px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 13px; line-height: inherit; font-family: Consolas, Menlo, Monaco, &quot;Lucida Console&quot;, &quot;Liberation Mono&quot;, &quot;DejaVu Sans Mono&quot;, &quot;Bitstream Vera Sans Mono&quot;, &quot;Courier New&quot;, monospace, sans-serif; vertical-align: baseline; background-color: rgb(239, 240, 241); white-space: pre-wrap; color: rgb(36, 39, 41);\">bkLib.onDomLoaded</code><span style=\"color: rgb(36, 39, 41); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px;\">&nbsp;fails to load initially because of&nbsp;</span><strong style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 15px; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; vertical-align: baseline; color: rgb(36, 39, 41);\">turbolinks</strong><span style=\"color: rgb(36, 39, 41); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px;\">. It only works with a refresh. Thus why I\'ve removed it.</span><br>', '49.00', 15, 4, 0, 0),
(35, 18, 3, 0, 'Site Engineer Work Investigation sheet', 'Did you know that Beethoven\'s favorite food was macaroni and cheese? Did you know that John F. Kennedy used to bark like', NULL, NULL, '_ir20-VJuEQ', 'normal', 'youtube', 1, '2017-10-11 08:01:58', 1, 2, '2017-10-11 01:01:58', 'en', 'Xzqt0VVShHIA2Bp0h20171004041354', 'sale', 'Excel', '20', 'Video', '30', NULL, NULL, '<div><span style=\"color: rgb(37, 129, 188); font-family: calluna-sans; font-size: 29.808px; letter-spacing: -0.29808px;\">Kathleen Krull</span><span style=\"color: rgb(0, 0, 0); font-family: Verdana, &quot;Trebuchet MS&quot;, &quot;Helvetica Neue&quot;, Arial, Helvetica, sans-serif; font-size: 12.96px;\"><br></span></div><span style=\"color: rgb(0, 0, 0); font-family: Verdana, &quot;Trebuchet MS&quot;, &quot;Helvetica Neue&quot;, Arial, Helvetica, sans-serif; font-size: 12.96px;\"><div><span style=\"color: rgb(0, 0, 0); font-family: Verdana, &quot;Trebuchet MS&quot;, &quot;Helvetica Neue&quot;, Arial, Helvetica, sans-serif; font-size: 12.96px;\"><br></span></div>Did you know that Beethoven\'s favorite food was macaroni and cheese? Did you know that John F. Kennedy used to bark like a seal before giving important speeches? Well, if you read Kathleen Krull\'s biographies for young readers, you\'ll learn many such facts. Through solid research, lively writing, and juicy \"gossip\", Krull transforms iconic figures from the past into real human beings. \"We\'re all secretly&nbsp;</span><em style=\"color: rgb(0, 0, 0); font-family: Verdana, &quot;Trebuchet MS&quot;, &quot;Helvetica Neue&quot;, Arial, Helvetica, sans-serif; font-size: 12.96px;\">People</em><span style=\"color: rgb(0, 0, 0); font-family: Verdana, &quot;Trebuchet MS&quot;, &quot;Helvetica Neue&quot;, Arial, Helvetica, sans-serif; font-size: 12.96px;\">&nbsp;magazine readers at heart,\" she explains, \"even though we might not admit it.\"</span>', '0.00', 49, 3, 0, 0),
(36, 18, 3, 0, 'ពេលចូលក្នុងការដ្ឋានតើវិស្វករគួរធ្វើអ្វី', 'របៀបបង្កើតតារាងតំលៃសាងសងភាគ១២', NULL, NULL, '_ir20-VJuEQ', 'normal', 'youtube', 1, '2017-10-11 08:01:58', 1, 2, '2017-10-11 01:01:58', 'kh', 'Xzqt0VVShHIA2Bp0h20171004041354', 'sale', 'Excel', '20', 'វីដេអូ', '30', NULL, NULL, '<div><span style=\"color: rgb(37, 129, 188); font-family: calluna-sans; font-size: 29.808px; letter-spacing: -0.29808px;\">Kathleen Krull</span><span style=\"color: rgb(0, 0, 0); font-family: Verdana, &quot;Trebuchet MS&quot;, &quot;Helvetica Neue&quot;, Arial, Helvetica, sans-serif; font-size: 12.96px;\"><br></span></div><span style=\"color: rgb(0, 0, 0); font-family: Verdana, &quot;Trebuchet MS&quot;, &quot;Helvetica Neue&quot;, Arial, Helvetica, sans-serif; font-size: 12.96px;\"><div><span style=\"color: rgb(0, 0, 0); font-family: Verdana, &quot;Trebuchet MS&quot;, &quot;Helvetica Neue&quot;, Arial, Helvetica, sans-serif; font-size: 12.96px;\"><br></span></div>Did you know that Beethoven\'s favorite food was macaroni and cheese? Did you know that John F. Kennedy used to bark like a seal before giving important speeches? Well, if you read Kathleen Krull\'s biographies for young readers, you\'ll learn many such facts. Through solid research, lively writing, and juicy \"gossip\", Krull transforms iconic figures from the past into real human beings. \"We\'re all secretly&nbsp;</span><em style=\"color: rgb(0, 0, 0); font-family: Verdana, &quot;Trebuchet MS&quot;, &quot;Helvetica Neue&quot;, Arial, Helvetica, sans-serif; font-size: 12.96px;\">People</em><span style=\"color: rgb(0, 0, 0); font-family: Verdana, &quot;Trebuchet MS&quot;, &quot;Helvetica Neue&quot;, Arial, Helvetica, sans-serif; font-size: 12.96px;\">&nbsp;magazine readers at heart,\" she explains, \"even though we might not admit it.\"</span>', '0.00', 49, 3, 0, 0),
(37, 19, 3, 4, '15 How to create BOQ Part 11', '15 How to create BOQ Part 11 របៀបបង្កើតតារាងតំលៃសាងសងភាគ១១', NULL, NULL, 'tnNv6p-qZqI', 'normal', 'youtube', 1, '2017-10-11 04:12:07', 1, 2, '2017-10-10 21:12:07', 'en', 'iuHa5HpQY6MEk20171004060725', 'sale', 'Excel', '10', 'Video', '20', NULL, NULL, '<h3><b>Toni Townes-Whitley</b></h3><p><b><i>How often do entrepreneurs and corporate leaders think about issues like fairness, accessibility or unseen biases in the technologies they invent and advance? That’s the challenge for companies leading the digital transformation that’s disrupting every aspect of society, says Toni Townes-Whitley, Corporate Vice President of Worldwide Public Sector and Industry at Microsoft, in this talk about innovating strategically and responsibly.</i></b></p>', '33.00', 2, 3, 0, 0),
(38, 19, 3, 4, 'របៀបបង្កើតតារាងតំលៃសាងសងភាគ១១', '15 How to create BOQ Part 11 របៀបបង្កើតតារាងតំលៃសាងសងភាគ១១', NULL, NULL, 'tnNv6p-qZqI', 'normal', 'youtube', 1, '2017-10-11 04:12:07', 1, 2, '2017-10-10 21:12:07', 'kh', 'iuHa5HpQY6MEk20171004060725', 'sale', 'Excel', '10', 'វីដេអូ', '20', NULL, NULL, '<h3><b>Toni Townes-Whitley</b></h3><p><b><i>How often do entrepreneurs and corporate leaders think about issues like fairness, accessibility or unseen biases in the technologies they invent and advance? That’s the challenge for companies leading the digital transformation that’s disrupting every aspect of society, says Toni Townes-Whitley, Corporate Vice President of Worldwide Public Sector and Industry at Microsoft, in this talk about innovating strategically and responsibly.</i></b></p>', '33.00', 2, 3, 0, 0),
(39, 20, 5, 0, '1-BOQ-GROUP I-PART III-23-09-2016', '1-BOQ-GROUP I-PART III-23-09-2016', NULL, NULL, 'NtZs6HlOmS4', 'new', 'youtube', 1, '2017-10-11 06:30:40', 1, 2, '2017-10-10 23:30:40', 'en', '8oz4pfLOEJU1c20171004062251', 'sale', 'Excel', '30', 'Videos', '30', 'Toni Townes', NULL, 'Toni Townes-Whitley អនុប្រធានក្រុមហ៊ុនសាជីវកម្មនិងឧស្សាហកម្មទូទាំងពិភពលោកនៅក្រុមហ៊ុន Microsoft ក្នុងការពិភាក្សានេះអំពីការច្នៃប្រឌិតយុទ្ធសាស្ត្រនិងភាពទទួលខុសត្រូវ', '0.00', 39, 4, 0, 0),
(40, 20, 5, 0, '1-BOQ - ក្រុម I - ផ្នែក III -23-09-2016', '1-BOQ - ក្រុម I - ផ្នែក III -23-09-2016', NULL, NULL, 'NtZs6HlOmS4', 'new', 'youtube', 1, '2017-10-11 06:30:40', 1, 2, '2017-10-10 23:30:40', 'kh', '8oz4pfLOEJU1c20171004062251', 'sale', 'Excel', '30', 'វីដេអូ', '30', 'Toni Townes', NULL, 'Toni Townes-Whitley អនុប្រធានក្រុមហ៊ុនសាជីវកម្មនិងឧស្សាហកម្មទូទាំងពិភពលោកនៅក្រុមហ៊ុន Microsoft ក្នុងការពិភាក្សានេះអំពីការច្នៃប្រឌិតយុទ្ធសាស្ត្រនិងភាពទទួលខុសត្រូវ', '0.00', 39, 4, 0, 0),
(41, 21, 5, 5, 'How to create BOQ Part 11', '15 How to create BOQ Part 11 របៀបបង្កើតតារាងតំលៃសាងសងភាគ១១', NULL, NULL, 'tnNv6p-qZqI', 'normal', 'youtube', 1, '2017-10-11 04:18:19', 2, 2, '2017-10-10 21:18:19', 'en', 'H2ifFeRzeKJrhpg20171006025654', 'sale', 'Excel', '10', 'Video', '30', NULL, NULL, '<b><font size=\"5\">BOQ&nbsp;</font></b><div><font size=\"3\" style=\"\"><div style=\"font-weight: 700; text-align: justify;\">All rights reserved. No part of this book may be reproduced, stored in a retrieval&nbsp;<span style=\"background-color: transparent;\">system, or ransmitted in any form or by any means, without the prior written&nbsp;</span><span style=\"background-color: transparent;\">permission of the publisher, except in the case of brief quotations embedded in&nbsp;</span><span style=\"background-color: transparent;\">critical articles or reviews.</span></div><div style=\"\"><div style=\"text-align: justify;\"><b><br></b></div><br></div></font></div><div><b><font size=\"5\"><br></font></b></div>', '30.00', 10, 3, 0, 0),
(42, 21, 5, 5, 'របៀបបង្កើតតារាងតំលៃសាងសងភាគ១១', '15 How to create BOQ Part 11 របៀបបង្កើតតារាងតំលៃសាងសងភាគ១១', NULL, NULL, 'tnNv6p-qZqI', 'normal', 'youtube', 1, '2017-10-11 04:18:19', 2, 2, '2017-10-10 21:18:19', 'kh', 'H2ifFeRzeKJrhpg20171006025654', 'sale', 'Excel', '10', 'Videos', '30', NULL, NULL, '<b><font size=\"5\">BOQ&nbsp;</font></b><div><font size=\"3\" style=\"\"><div style=\"font-weight: 700; text-align: justify;\">All rights reserved. No part of this book may be reproduced, stored in a retrieval&nbsp;<span style=\"background-color: transparent;\">system, or ransmitted in any form or by any means, without the prior written&nbsp;</span><span style=\"background-color: transparent;\">permission of the publisher, except in the case of brief quotations embedded in&nbsp;</span><span style=\"background-color: transparent;\">critical articles or reviews.</span></div><div style=\"\"><div style=\"text-align: justify;\"><b><br></b></div><br></div></font></div><div><b><font size=\"5\"><br></font></b></div>', '30.00', 10, 3, 0, 0),
(43, 22, 4, 5, 'How to create BOQ Part 12', '17 How to create BOQ Part 12 របៀបបង្កើតតារាងតំលៃសាងសងភាគ១២', NULL, NULL, 'X7Nbd_ZxqFU', 'new', 'youtube', 1, '2017-10-11 04:04:30', 2, 2, '2017-10-10 21:04:30', 'en', 'TAf83ShSH20171006030132', 'sale', 'Excel', '10', 'Video', '10', 'Packt Publishing', '/laravel-filemanager/photos/2/940915_493043900900056_6360277654067618874_n.jpg', 'rademark information about all of the companies and products mentioned in this book by the appropriate use of capitals. However, Packt Publishing cannot guarantee the accuracy of this information', '10.00', 1, 4, 0, 0),
(44, 22, 4, 5, 'របៀបបង្កើតតារាងតំលៃសាងសងភាគ១២', '17 How to create BOQ Part 12 របៀបបង្កើតតារាងតំលៃសាងសងភាគ១២', NULL, NULL, 'X7Nbd_ZxqFU', 'new', 'youtube', 1, '2017-10-11 04:04:30', 2, 2, '2017-10-10 21:04:30', 'kh', 'TAf83ShSH20171006030132', 'sale', 'Excel', '10', 'Video', '10', 'Packt Publishing', '/laravel-filemanager/photos/2/940915_493043900900056_6360277654067618874_n.jpg', 'rademark information about all of the companies and products mentioned in this book by the appropriate use of capitals. However, Packt Publishing cannot guarantee the accuracy of this information', '10.00', 1, 4, 0, 0),
(45, 23, 4, 5, 'How to create BOQ Part 10', '14 How to create BOQ Part 10 របៀបបង្កើតតារាងតំលៃសាងសងភាគ១០', NULL, NULL, 'Fe7yO_kUa4Y', 'new', 'youtube', 1, '2017-10-11 04:03:45', 2, 2, '2017-10-10 21:03:45', 'en', 'PSdp40lE4dIe20171006030546', 'sale', 'Excel', '10', 'Video', '10', 'BOQ', '/laravel-filemanager/photos/2/940915_493043900900056_6360277654067618874_n.jpg', 'endeavored to provide trademark information about all of the companies and products mentioned in this book by the appropriate use of capitals. However, Packt Publishing cannot guarantee the accuracy of this information.', '15.00', 11, 0, 0, 0),
(46, 23, 4, 5, 'របៀបបង្កើតតារាងតំលៃសាងសងភាគ១០', '14 How to create BOQ Part 10 របៀបបង្កើតតារាងតំលៃសាងសងភាគ១០', NULL, NULL, 'Fe7yO_kUa4Y', 'new', 'youtube', 1, '2017-10-11 04:03:45', 2, 2, '2017-10-10 21:03:45', 'kh', 'PSdp40lE4dIe20171006030546', 'sale', 'Excel', '10', 'Video', '10', 'BOQ', '/laravel-filemanager/photos/2/940915_493043900900056_6360277654067618874_n.jpg', 'endeavored to provide trademark information about all of the companies and products mentioned in this book by the appropriate use of capitals. However, Packt Publishing cannot guarantee the accuracy of this information.', '15.00', 11, 0, 0, 0),
(47, 24, 5, 0, 'how to create BOQ form part 1', 'in this video you will learn how to create BOQ form .\r\nthank you for watching this video.', NULL, NULL, 'VdJ8Hl8f4SY', 'new', 'youtube', 1, '2017-10-11 04:19:19', 2, 2, '2017-10-10 21:19:19', 'en', '23aCU4e20171006030824', 'sale', 'Excel', '10', 'Video', '10', NULL, NULL, NULL, '14.00', 1, 0, 0, 0),
(48, 24, 5, 0, 'ការបង្កើតតារាងតំលៃសាងសង់ ភាគ១', 'ការបង្កើតតារាងតំលៃសាងសង់ ភាគ១', NULL, NULL, 'VdJ8Hl8f4SY', 'new', 'youtube', 1, '2017-10-11 08:02:13', 2, 2, '2017-10-11 01:02:13', 'kh', '23aCU4e20171006030824', 'sale', 'Excel', '10', 'Video', '10', NULL, NULL, NULL, '14.00', 1, 0, 0, 0),
(49, 25, 4, 0, 'How to create BOQ Part 7', 'Description is the fiction-writing mode for transmitting a mental image of the particulars of a story. Together with dialogue, narration, exposition, and summarization, description is one of the most widely recognized of the fiction-writing modes. As stated in Writing from A to Z', NULL, NULL, 'c5lBqpDGvnI', 'new', 'youtube', 1, '2017-10-11 05:03:10', 2, 2, '2017-10-10 22:03:10', 'en', 'zPicNviY21UeSXDHFFcyKDTp4MXj9f20171009060700', 'free', 'Excel', '10', 'Video', '10', 'Bunthoeun', '/laravel-filemanager/photos/2/940915_493043900900056_6360277654067618874_n.jpg', 'ការពិពណ៌នាគឺជារបៀបសរសេរប្រឌិតសម្រាប់ការបញ្ជូនរូបភាពផ្លូវចិត្តនៃរឿងរ៉ាវនៃរឿងមួយ។ រួមគ្នាជាមួយការសន្ទនាការនិទានរឿងការពន្យល់និងការសង្ខេបសេចក្ដីពិពណ៌នាគឺជាការទទួលស្គាល់យ៉ាងទូលំទូលាយបំផុតនៃរបៀបសរសេរប្រឌិត។ ដូចមានចែងក្នុងការសរសេរពី A ដល់ Z', '10.00', 14, 3, 0, 0),
(50, 25, 4, 0, 'របៀបបង្កើតតារាងតំលៃសាងសងភាគ៧', 'ការពិពណ៌នាគឺជារបៀបសរសេរប្រឌិតសម្រាប់ការបញ្ជូនរូបភាពផ្លូវចិត្តនៃរឿងរ៉ាវនៃរឿងមួយ។ រួមគ្នាជាមួយការសន្ទនាការនិទានរឿងការពន្យល់និងការសង្ខេបសេចក្ដីពិពណ៌នាគឺជាការទទួលស្គាល់យ៉ាងទូលំទូលាយបំផុតនៃរបៀបសរសេរប្រឌិត។ ដូចមានចែងក្នុងការសរសេរពី A ដល់ Z', NULL, NULL, 'c5lBqpDGvnI', 'new', 'youtube', 1, '2017-10-11 05:03:10', 2, 2, '2017-10-10 22:03:10', 'kh', 'zPicNviY21UeSXDHFFcyKDTp4MXj9f20171009060700', 'free', 'Excel', '10', 'Video', '10', 'Bunthoeun', '/laravel-filemanager/photos/2/940915_493043900900056_6360277654067618874_n.jpg', 'ការពិពណ៌នាគឺជារបៀបសរសេរប្រឌិតសម្រាប់ការបញ្ជូនរូបភាពផ្លូវចិត្តនៃរឿងរ៉ាវនៃរឿងមួយ។ រួមគ្នាជាមួយការសន្ទនាការនិទានរឿងការពន្យល់និងការសង្ខេបសេចក្ដីពិពណ៌នាគឺជាការទទួលស្គាល់យ៉ាងទូលំទូលាយបំផុតនៃរបៀបសរសេរប្រឌិត។ ដូចមានចែងក្នុងការសរសេរពី A ដល់ Z', '10.00', 14, 3, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`, `status`) VALUES
(1, 'admin', 'Admin', 'All', NULL, NULL, 1),
(2, 'User', 'User', 'Something', NULL, NULL, 1),
(3, 'Member', 'Member', 'Member', NULL, '2017-09-05 18:40:30', 1),
(4, 'student', 'Student', 'Test Exam', '2017-09-05 18:17:24', '2017-09-05 18:41:31', 1),
(5, 'Cashier', 'Cashier', 'Collect money payment', '2017-09-13 23:40:09', '2017-09-13 23:40:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 2),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `develop_by` varchar(200) NOT NULL,
  `develop_address` varchar(250) NOT NULL,
  `develop_phone` varchar(200) NOT NULL,
  `develop_email` varchar(200) NOT NULL,
  `develop_website` varchar(200) NOT NULL,
  `copy_right` varchar(200) NOT NULL,
  `develop_for_client` varchar(200) NOT NULL,
  `client_address` varchar(250) NOT NULL,
  `client_phone` varchar(60) NOT NULL,
  `client_email` varchar(60) NOT NULL,
  `client_map` varchar(1000) DEFAULT NULL,
  `client_website` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `link_youtube` varchar(300) DEFAULT NULL,
  `link_facebook` varchar(300) DEFAULT NULL,
  `link_instagram` varchar(300) DEFAULT NULL,
  `youtube_id` varchar(100) DEFAULT NULL,
  `facebook_id` varchar(100) DEFAULT NULL,
  `instagram_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `develop_by`, `develop_address`, `develop_phone`, `develop_email`, `develop_website`, `copy_right`, `develop_for_client`, `client_address`, `client_phone`, `client_email`, `client_map`, `client_website`, `status`, `user_id`, `created_at`, `updated_at`, `link_youtube`, `link_facebook`, `link_instagram`, `youtube_id`, `facebook_id`, `instagram_id`) VALUES
(1, 'Cam App Technology', '#162, Street 150, Sangkat Toek Laork I, Toul Kok, Phnom Penh', '(+855)85 911 912', 'info@cam-app.com', 'www.cam-app.com', 'E-Cam School', 'E-Cam School', '#162, Street 150, Sangkat Toek Laork I, Toul Kok, Phnom Penh', '093 88 11 82 / 099 88 11 82', 'ecamschool168@gmail.com', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3908.7052917940987!2d104.9209015143589!3d11.57297204178403!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3109514442da53f3%3A0x101b66669f6fb459!2sCamEd+Business+School!5e0!3m2!1sen!2skh!4v1506332468628\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'cam-school.com.kh', 1, 2, '2017-08-18 00:05:22', '2017-10-10 23:25:11', 'https://www.youtube.com/channel/UCwKzFWl7SJ2A6tP2Z7AxWxg', 'https://www.facebook.com/postandshare007/', 'https://www.instagram.com/bunthoeun_single/', 'UCwKzFWl7SJ2A6tP2Z7AxWxg', '1826860480870472', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `category_group_id` int(11) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `order` int(3) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  `language_code` varchar(5) DEFAULT 'en',
  `slug` varchar(250) DEFAULT 'home'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `icon`, `group_id`, `category_group_id`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `order`, `status`, `language_code`, `slug`) VALUES
(1, NULL, 1, 2, 'Videos English', '2017-09-27 04:05:52', '2017-10-05 20:11:08', NULL, 2, 5, 1, 'en', '04160f3b6'),
(2, NULL, 1, 2, 'វីដេអូភាសាអង់គ្លេស', '2017-09-27 04:05:55', '2017-10-05 20:11:08', NULL, 2, 5, 1, 'kh', '04160f3b6'),
(3, NULL, 2, 2, 'Videos Thai', '2017-09-27 04:09:46', '2017-10-05 20:11:19', NULL, 2, 4, 1, 'en', '04160f3b6r'),
(4, NULL, 2, 2, 'វីដេអូភាសាថៃ', '2017-09-27 04:09:59', '2017-10-05 20:11:19', NULL, 2, 4, 1, 'kh', '04160f3b6r'),
(5, NULL, 3, 2, 'Leaning PHP', '2017-09-27 01:21:19', '2017-09-27 01:33:52', 2, 2, 3, 1, 'en', '04160f3b6r4'),
(6, NULL, 3, 2, 'រៀន PHP', '2017-09-27 01:21:19', '2017-09-27 01:33:32', 2, 2, 3, 1, 'kh', '04160f3b6r4'),
(7, NULL, 4, 2, 'learn Excel', '2017-09-27 23:40:33', '2017-10-05 20:10:57', 2, 2, 2, 1, 'en', '04160f3b6rg'),
(8, NULL, 4, 2, 'រៀន Excel', '2017-09-27 23:40:33', '2017-10-05 20:10:57', 2, 2, 2, 1, 'kh', '04160f3b6rg'),
(9, NULL, 5, 2, 'BOQ', '2017-10-05 19:53:09', '2017-10-05 20:10:46', 2, 2, 1, 1, 'en', 'xt1PYq20171006025309'),
(10, NULL, 5, 2, 'BOQ', '2017-10-05 19:53:09', '2017-10-05 20:10:46', 2, 2, 1, 1, 'kh', 'xt1PYq20171006025309');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$10$r/p5IfZKcCqcmrYJrpaH/eeeL8luZv1Eg7RYmkDcVT7yVz7gDH77S', NULL, '2017-08-25 08:13:44', '2017-09-15 21:01:51', 1),
(2, 'Bunthoeun', 'bunthoeun@gmail.com', '$2y$10$r/p5IfZKcCqcmrYJrpaH/eeeL8luZv1Eg7RYmkDcVT7yVz7gDH77S', 'QCQB96qosUVkg76J3pS5zMZbHDMBcj1Ig3fYVwxXtZnLrh13PAPukglydhAc', '2017-08-25 08:13:44', '2017-08-25 08:48:58', 1),
(3, 'Sokha', 'sokha@gmail.com', '$2y$10$G.ECuis9nq7ZpqhHGNtM8eGbF2r8lNCVPf4NvksQdWC7MAYY2HBDK', 'KHS0DLC4Iz8Dao3XMgJC1BWTJpYzHZsojCFkpiqS4w7J5qyJ5BI2K7jzdwYg', '2017-09-13 21:45:20', '2017-09-14 23:52:58', 0),
(4, 'ABC', 'abc@gmail.com', '$2y$10$gSXZOPigPLbGCPc4iHcYeeCCKuv63mboHOQcrgyRFA/7rCQkfYBpm', NULL, '2017-10-05 23:57:42', '2017-10-05 23:59:48', 1),
(5, 'Mola', 'admin1@admin.com', '$2y$10$.epzB5ZUMHbeijZy4.mXqu9rRC.X/N.t2hWLOYBmnUy.M79vxHZLu', NULL, '2017-10-06 00:17:52', '2017-10-06 00:18:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `video_list`
--

CREATE TABLE `video_list` (
  `id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `post_group_id` int(11) DEFAULT NULL,
  `title` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  `language_code` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `slug` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `video_list`
--

INSERT INTO `video_list` (`id`, `group_id`, `post_group_id`, `title`, `video_id`, `image`, `status`, `language_code`, `order`, `slug`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 20, 'Site Engineer Work Investigation sheet', 'A3gtQh0Rzpg', NULL, 1, 'en', 1, 'h1jW7e20171004080028', '2017-10-04 08:04:59', '2017-10-04 01:00:28', 1, NULL),
(2, 1, 20, 'ពេលចូលក្នុងការដ្ឋានតើវិស្វករគួរធ្វើអ្វី', 'A3gtQh0Rzpg', NULL, 1, 'kh', 1, 'h1jW7e20171004080028', '2017-10-04 08:05:03', '2017-10-04 01:00:28', 1, NULL),
(3, 2, 20, 'Project & Cost estimating part 1', '_ir20-VJuEQ', NULL, 1, 'en', 2, 'scj54m20171004080414', '2017-10-04 01:04:14', '2017-10-04 01:04:14', 1, NULL),
(4, 2, 20, 'គម្រោងនិងចំណាយការប៉ាន់ស្មានផ្នែកទី 1', '_ir20-VJuEQ', NULL, 1, 'kh', 2, 'scj54m20171004080414', '2017-10-04 01:04:14', '2017-10-04 01:04:14', 1, NULL),
(5, 3, 20, 'How to create BOQ Part 7', 'c5lBqpDGvnI', NULL, 1, 'en', 3, '3zUtSs20171004084019', '2017-10-04 08:42:52', '2017-10-04 01:42:52', 1, 1),
(6, 3, 20, 'របៀបបង្កើតតារាងតំលៃសាងសងភាគ៧', 'c5lBqpDGvnI', NULL, 1, 'kh', 3, '3zUtSs20171004084019', '2017-10-04 08:42:52', '2017-10-04 01:42:52', 1, 1),
(7, 4, 25, 'how to create BOQ form part 1', 'L6CtJ7YcLgc', NULL, 1, 'en', 1, 'uhQtsi20171009065047', '2017-10-09 07:05:35', '2017-10-09 00:05:35', 2, 2),
(8, 4, 25, 'ការបង្កើតតារាងតំលៃសាងសង់ ភាគ១', 'L6CtJ7YcLgc', NULL, 1, 'kh', 1, 'uhQtsi20171009065047', '2017-10-09 07:05:35', '2017-10-09 00:05:35', 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `block_ip`
--
ALTER TABLE `block_ip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feed_back`
--
ALTER TABLE `feed_back`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `link_download`
--
ALTER TABLE `link_download`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_history`
--
ALTER TABLE `log_history`
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
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `video_list`
--
ALTER TABLE `video_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `block_ip`
--
ALTER TABLE `block_ip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `feed_back`
--
ALTER TABLE `feed_back`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `link_download`
--
ALTER TABLE `link_download`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `log_history`
--
ALTER TABLE `log_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `video_list`
--
ALTER TABLE `video_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
