-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2019 at 03:34 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `n_finext`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_detail`
--

CREATE TABLE `account_detail` (
  `id` int(3) NOT NULL,
  `mode_of_payment` varchar(50) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `bank_name` varchar(150) NOT NULL,
  `account_no` varchar(20) NOT NULL,
  `pay_phone_no` varchar(15) NOT NULL,
  `account_holder` varchar(225) NOT NULL,
  `ifsc` varchar(16) NOT NULL,
  `creation_date` date NOT NULL,
  `modification_date` date NOT NULL,
  `dalete_status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `autopool_details`
--

CREATE TABLE `autopool_details` (
  `id` int(11) NOT NULL,
  `parent_id` varchar(30) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `level` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'o=>''not pay'', 1=>''pay''',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT '2' COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `autopool_details`
--

INSERT INTO `autopool_details` (`id`, `parent_id`, `user_id`, `level`, `position`, `payment_status`, `created_at`, `modified_at`, `row_status`) VALUES
(1, '0', 'FX18408425', 4, 0, 1, '2019-05-31 18:28:50', NULL, 1),
(2, 'FX18408425', 'FX18408426', 4, 0, 1, '2019-05-31 18:28:50', NULL, 1),
(3, 'FX18408426', 'FX18408427', 4, 0, 0, '2019-05-31 18:28:50', NULL, 1),
(4, 'FX18408427', 'FX18408428', 4, 0, 0, '2019-05-31 18:28:50', NULL, 1),
(5, 'FX18408428', 'FX18408429', 4, 0, 0, '2019-05-31 18:28:51', NULL, 1),
(6, 'FX18408429', 'FX18408430', 4, 0, 0, '2019-05-31 18:28:51', NULL, 1),
(7, 'FX18408430', 'FX18408431', 4, 0, 0, '2019-05-31 18:28:51', NULL, 1),
(8, 'FX18408431', 'FX18408432', 4, 0, 0, '2019-05-31 18:28:51', NULL, 1),
(9, 'FX18408432', 'FX18408433', 4, 0, 0, '2019-05-31 18:28:51', NULL, 1),
(10, 'FX18408433', 'FX18408434', 4, 0, 0, '2019-05-31 18:28:51', NULL, 1),
(11, 'FX18408433', 'FX18408435', 4, 0, 0, '2019-05-31 18:28:51', NULL, 1),
(12, 'FX18408433', 'FX18408436', 4, 0, 0, '2019-05-31 18:28:51', NULL, 1),
(13, 'FX18408433', 'FX18408437', 4, 0, 0, '2019-05-31 18:28:51', NULL, 1),
(14, 'FX18408434', 'FX18408438', 1, 1, 0, '2019-05-31 18:28:51', NULL, 1),
(15, 'FX18408434', 'FX18408439', 0, 2, 0, '2019-05-31 18:30:32', NULL, 1),
(17, 'FX18408434', 'FX18408440', 0, 3, 0, '2019-05-31 18:35:50', NULL, 1),
(18, 'FX18408434', 'FX18408441', 0, 4, 0, '2019-05-31 18:35:50', NULL, 1),
(19, 'FX18408435', 'FX18408442', 0, 1, 0, '2019-05-31 18:35:50', NULL, 1),
(20, 'FX18408435', 'FX18408443', 0, 2, 0, '2019-05-31 18:35:50', NULL, 1),
(21, 'FX18408435', 'FX18408444', 0, 3, 0, '2019-05-31 18:35:50', NULL, 1),
(22, 'FX18408435', 'FX18408445', 0, 4, 0, '2019-05-31 18:35:51', NULL, 1),
(23, 'FX18408436', 'FX18408447', 0, 1, 0, '2019-05-31 18:35:51', NULL, 1),
(24, 'FX18408436', 'FX18408447', 0, 2, 0, '2019-05-31 18:35:51', NULL, 1),
(25, 'FX18408436', 'FX18408446', 0, 3, 0, '2019-05-31 18:35:51', NULL, 1),
(26, 'FX18408436', 'FX18408448', 0, 4, 0, '2019-05-31 18:35:51', NULL, 1),
(27, 'FX18408437', 'FX18408450', 0, 1, 1, '2019-05-31 18:35:51', NULL, 1),
(28, 'FX18408437', 'FX18408451', 0, 2, 1, '2019-05-31 18:35:51', NULL, 1),
(29, 'FX18408437', 'FX18408452', 0, 3, 1, '2019-05-31 18:35:51', NULL, 1),
(30, 'FX18408437', 'FX18408453', 0, 4, 1, '2019-05-31 18:35:51', NULL, 1),
(31, 'FX18408438', 'FX19460222', 0, 1, 0, '2019-06-04 18:56:57', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `autopull_benifit_user`
--

CREATE TABLE `autopull_benifit_user` (
  `id` int(10) NOT NULL,
  `parent_id` varchar(10) NOT NULL,
  `child_id` varchar(10) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modification_date` datetime NOT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `autopull_benifit_user`
--

INSERT INTO `autopull_benifit_user` (`id`, `parent_id`, `child_id`, `amount`, `created_date`, `modification_date`, `row_status`) VALUES
(29, 'FX18408438', 'FX19460222', '1000', '2019-06-04 18:56:57', '0000-00-00 00:00:00', 1),
(30, 'FX18408434', 'FX19460222', '1000', '2019-06-04 18:56:57', '0000-00-00 00:00:00', 1),
(31, 'FX18408433', 'FX19460222', '1000', '2019-06-04 18:56:58', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `compose`
--

CREATE TABLE `compose` (
  `id` int(20) NOT NULL,
  `to_email` varchar(50) NOT NULL,
  `from_email` varchar(100) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `text` varchar(500) NOT NULL,
  `created_time` datetime(6) NOT NULL,
  `modified_time` datetime(6) NOT NULL,
  `deleted` int(2) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compose`
--

INSERT INTO `compose` (`id`, `to_email`, `from_email`, `subject`, `text`, `created_time`, `modified_time`, `deleted`, `date`) VALUES
(1, '2', '1', 'Hi this is for testing', 'Hi this is from admin side im testing this for some reasons', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, '2019-06-04 07:23:40'),
(2, '1', '2', 'Hi sir Mr. Admin ', 'This is mahesh i\'m Sending message to you .                                            \r\n                                        ', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, '2019-06-04 07:32:19'),
(3, '1', '2', 'This is testing 2', 'Checking  this again', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, '2019-06-04 07:51:52');

-- --------------------------------------------------------

--
-- Table structure for table `kyc`
--

CREATE TABLE `kyc` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `kyc_image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `official_users`
--

CREATE TABLE `official_users` (
  `id` int(10) NOT NULL,
  `Introducer_id` varchar(10) NOT NULL,
  `refer_id` varchar(10) NOT NULL,
  `name` varchar(225) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(225) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `user_name` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `salt` varchar(6) NOT NULL,
  `date_of_join` datetime NOT NULL,
  `profile_image` varchar(225) NOT NULL,
  `pan_no` varchar(15) DEFAULT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `account_holder_name` varchar(50) NOT NULL,
  `account_no` varchar(20) NOT NULL,
  `ifsc` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `official_users`
--

INSERT INTO `official_users` (`id`, `Introducer_id`, `refer_id`, `name`, `gender`, `email`, `mobile`, `user_name`, `password`, `salt`, `date_of_join`, `profile_image`, `pan_no`, `address`, `city`, `state`, `country`, `bank_name`, `account_holder_name`, `account_no`, `ifsc`) VALUES
(1, '', 'FX18408425', 'Autopool User1', '', '', '', '', '', '', '2019-06-04 12:04:43', '', NULL, '', '', '', 'India', '', '', '', ''),
(2, 'FX18408425', 'FX18408426', 'Autopool User2', '', '', '', '', '', '', '2019-06-04 12:04:43', '', NULL, '', '', '', 'India', '', '', '', ''),
(3, 'FX18408426', 'FX18408427', 'Autopool User3', '', '', '', '', '', '', '2019-06-04 12:04:43', '', NULL, '', '', '', 'India', '', '', '', ''),
(4, 'FX18408427', 'FX18408428', 'Autopool User4', '', '', '', '', '', '', '2019-06-04 12:04:43', '', NULL, '', '', '', 'India', '', '', '', ''),
(5, 'FX18408428', 'FX18408429', 'Autopool User5', '', '', '', '', '', '', '2019-06-04 12:04:43', '', NULL, '', '', '', 'India', '', '', '', ''),
(6, 'FX18408429', 'FX18408430', 'Autopool User6', '', '', '', '', '', '', '2019-06-04 12:04:43', '', NULL, '', '', '', 'India', '', '', '', ''),
(7, 'FX18408430', 'FX18408431', 'Autopool User7', '', '', '', '', '', '', '2019-06-04 12:04:43', '', NULL, '', '', '', 'India', '', '', '', ''),
(8, 'FX18408431', 'FX18408432', 'Autopool User8', '', '', '', '', '', '', '2019-06-04 12:04:43', '', NULL, '', '', '', 'India', '', '', '', ''),
(9, 'FX18408432', 'FX18408433', 'Autopool User9', '', '', '', '', '', '', '2019-06-04 12:04:43', '', NULL, '', '', '', 'India', '', '', '', ''),
(10, 'FX18408433', 'FX18408434', 'Autopool User10', '', '', '', '', '', '', '2019-06-04 12:04:43', '', NULL, '', '', '', 'India', '', '', '', ''),
(11, 'FX18408434', 'FX18408435', 'Autopool User11', '', '', '', '', '', '', '2019-06-04 12:04:43', '', NULL, '', '', '', 'India', '', '', '', ''),
(12, 'FX18408435', 'FX18408436', 'Autopool User12', '', '', '', '', '', '', '2019-06-04 12:04:43', '', NULL, '', '', '', 'India', '', '', '', ''),
(13, 'FX18408436', 'FX18408437', 'Autopool User13', '', '', '', '', '', '', '2019-06-04 12:04:43', '', NULL, '', '', '', 'India', '', '', '', ''),
(14, 'FX18408437', 'FX18408438', 'Autopool User14', '', '', '', '', '', '', '2019-06-04 12:04:43', '', NULL, '', '', '', 'India', '', '', '', ''),
(15, 'FX18408438', 'FX18408439', 'Autopool User15', '', '', '', '', '', '', '2019-06-04 12:04:43', '', NULL, '', '', '', 'India', '', '', '', ''),
(16, 'FX18408439', 'FX18408440', 'Autopool User16', '', '', '', '', '', '', '2019-06-04 12:04:43', '', NULL, '', '', '', 'India', '', '', '', ''),
(17, 'FX18408440', 'FX18408441', 'Autopool User17', '', '', '', '', '', '', '2019-06-04 12:04:43', '', NULL, '', '', '', 'India', '', '', '', ''),
(18, 'FX18408441', 'FX18408442', 'Autopool User18', '', '', '', '', '', '', '2019-06-04 12:04:43', '', NULL, '', '', '', 'India', '', '', '', ''),
(19, 'FX18408442', 'FX18408443', 'Autopool User19', '', '', '', '', '', '', '2019-06-04 12:04:43', '', NULL, '', '', '', 'India', '', '', '', ''),
(20, 'FX18408443', 'FX18408444', 'Autopool User20', '', '', '', '', '', '', '2019-06-04 12:04:43', '', NULL, '', '', '', 'India', '', '', '', ''),
(21, 'FX18408444', 'FX18408445', 'Autopool User21', '', '', '', '', '', '', '2019-06-04 12:04:43', '', NULL, '', '', '', 'India', '', '', '', ''),
(22, 'FX18408445', 'FX18408446', 'Autopool User22', '', '', '', '', '', '', '2019-06-04 12:04:43', '', NULL, '', '', '', 'India', '', '', '', ''),
(23, 'FX18408446', 'FX18408447', 'Autopool User23', '', '', '', '', '', '', '2019-06-04 12:04:43', '', NULL, '', '', '', 'India', '', '', '', ''),
(24, 'FX18408445', 'FX18408448', 'Autopool User24', '', '', '', '', '', '', '2019-06-04 12:04:43', '', NULL, '', '', '', 'India', '', '', '', ''),
(25, 'FX18408448', 'FX18408449', 'Autopool User25', '', '', '', '', '', '', '2019-06-04 12:04:43', '', NULL, '', '', '', 'India', '', '', '', ''),
(26, 'FX18408449', 'FX18408450', 'Autopool User26', '', '', '', '', '', '', '2019-06-04 12:04:43', '', NULL, '', '', '', 'India', '', '', '', ''),
(27, 'FX18408450', 'FX18408451', 'Autopool User27', '', '', '', '', '', '', '2019-06-04 12:04:43', '', NULL, '', '', '', 'India', '', '', '', ''),
(28, 'FX18408451', 'FX18408452', 'Autopool User28', '', '', '', '', '', '', '2019-06-04 12:04:43', '', NULL, '', '', '', 'India', '', '', '', ''),
(29, 'FX18408452', 'FX18408453', 'Autopool User29', '', '', '', '', '', '', '2019-06-04 12:04:43', '', NULL, '', '', '', 'India', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `refer_benifit`
--

CREATE TABLE `refer_benifit` (
  `id` int(15) NOT NULL,
  `introducer_id` int(15) NOT NULL,
  `refer_id` int(15) NOT NULL,
  `amount` float NOT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT '2' COMMENT '0=deleted,1=active,2=inactive',
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `refer_benifit`
--

INSERT INTO `refer_benifit` (`id`, `introducer_id`, `refer_id`, `amount`, `row_status`, `created_date`) VALUES
(1, 11, 12, 1000, 1, '0000-00-00 00:00:00'),
(2, 10, 12, 500, 2, '0000-00-00 00:00:00'),
(3, 9, 12, 500, 2, '0000-00-00 00:00:00'),
(4, 8, 12, 500, 2, '0000-00-00 00:00:00'),
(5, 11, 13, 1000, 2, '0000-00-00 00:00:00'),
(6, 7, 13, 500, 2, '0000-00-00 00:00:00'),
(7, 6, 13, 500, 2, '0000-00-00 00:00:00'),
(8, 5, 13, 500, 2, '0000-00-00 00:00:00'),
(9, 11, 14, 1000, 1, '0000-00-00 00:00:00'),
(10, 4, 14, 500, 2, '0000-00-00 00:00:00'),
(11, 3, 14, 500, 2, '0000-00-00 00:00:00'),
(12, 2, 14, 500, 1, '0000-00-00 00:00:00'),
(13, 14, 15, 1000, 2, '0000-00-00 00:00:00'),
(14, 11, 15, 500, 2, '0000-00-00 00:00:00'),
(15, 10, 15, 500, 2, '0000-00-00 00:00:00'),
(16, 9, 15, 500, 2, '0000-00-00 00:00:00'),
(17, 14, 16, 1000, 2, '0000-00-00 00:00:00'),
(18, 8, 16, 500, 2, '0000-00-00 00:00:00'),
(19, 7, 16, 500, 2, '0000-00-00 00:00:00'),
(20, 6, 16, 500, 2, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`) VALUES
(1, 'admin', '2019-05-23 17:41:54'),
(2, 'member', '2019-05-23 17:41:54');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `setting_type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `row_status_cd` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0-Deleted 1-Active 2-Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `setting_type`, `description`, `created_by`, `created_at`, `modified_by`, `modified_at`, `row_status_cd`) VALUES
(1, 'system_name', 'finext', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(2, 'system_title', 'finext', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(3, 'address', 'Hyderabad', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(4, 'phone', ' ', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(5, 'paypal_email', '', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(6, 'currency', '', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(7, 'system_email', '', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(8, 'email_password', '', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(9, 'purchase_code', '', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(11, 'three_matrix', '2500', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(12, 'four_matrix', '3000', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(13, 'system_currency_id', '1', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(14, 'sms_username', '', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(15, 'sms_sender', '', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(16, 'sms_hash', '', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(17, 'GST', '', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(19, 'privacy', '', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(20, 'terms', '', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `introducer_id` int(11) NOT NULL,
  `refer_id` varchar(30) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '2',
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `pan_number` varchar(20) NOT NULL,
  `position` enum('L','M','R','') DEFAULT NULL,
  `place_id` int(11) NOT NULL,
  `nomini` varchar(100) DEFAULT NULL,
  `relation` varchar(100) DEFAULT NULL,
  `address` text NOT NULL,
  `city` varchar(60) NOT NULL,
  `state` varchar(60) NOT NULL,
  `country` varchar(60) NOT NULL,
  `activedate` datetime DEFAULT NULL,
  `walet` float DEFAULT NULL,
  `payment_conferm` int(11) NOT NULL,
  `autpull_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '''0''=''not a member of autopull'', ''1''=''member of autopull''',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `row_status` tinyint(4) NOT NULL DEFAULT '3' COMMENT '0=Deleted,1=Active,2=Inactive,3=Registered',
  `profile_image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `introducer_id`, `refer_id`, `role_id`, `name`, `email`, `mobile`, `password`, `pan_number`, `position`, `place_id`, `nomini`, `relation`, `address`, `city`, `state`, `country`, `activedate`, `walet`, `payment_conferm`, `autpull_status`, `created_at`, `modified_at`, `row_status`, `profile_image`) VALUES
(1, 0, 'FINEXT_ADMIN', 1, 'Admin', 'admin@gmail.com', '', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '', NULL, 0, NULL, NULL, '', '', '', 'INDIA', NULL, 0, 0, 0, '2019-05-23 18:25:17', '2019-05-23 18:25:17', 1, ''),
(2, 0, 'FX19460213', 2, 'user1', 'u1@gmail.com', '', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '', NULL, 0, NULL, NULL, '', '', '', 'INDIA', NULL, 500, 4, 0, '2019-05-23 18:26:47', '2019-05-23 18:26:47', 1, ''),
(3, 2, 'FX19460214', 2, 'user2', 'u2@gmail.com', '', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '', NULL, 0, NULL, NULL, '', '', '', 'INDIA', NULL, 500, 4, 0, '2019-05-23 18:27:13', '2019-05-23 18:27:13', 1, ''),
(4, 3, 'FX19460215', 2, 'user3', 'u3@gmail.com', '', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '', NULL, 0, NULL, NULL, '', '', '', 'INDIA', NULL, 500, 4, 0, '2019-05-23 18:27:13', '2019-05-23 18:27:13', 1, ''),
(5, 4, 'FX19460216', 2, 'user4', 'u4@gmail.com', '', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '', NULL, 0, NULL, NULL, '', '', '', 'INDIA', NULL, 500, 4, 0, '2019-05-23 18:27:13', '2019-05-23 18:27:13', 1, ''),
(6, 5, 'FX19460217', 2, 'user5', 'u5@gmail.com', '', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '', NULL, 0, NULL, NULL, '', '', '', 'INDIA', NULL, 1000, 4, 0, '2019-05-23 18:27:13', '2019-05-23 18:27:13', 1, ''),
(7, 6, 'FX19460218', 2, 'user6', 'u6@gmail.com', '', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '', NULL, 0, NULL, NULL, '', '', '', 'INDIA', NULL, 1000, 4, 0, '2019-05-23 18:27:13', '2019-05-23 18:27:13', 1, ''),
(8, 7, 'FX19460219', 2, 'user7', 'u7@gmail.com', '', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '', NULL, 0, NULL, NULL, '', '', '', 'INDIA', NULL, 1000, 4, 0, '2019-05-23 18:27:13', '2019-05-23 18:27:13', 1, ''),
(9, 8, 'FX19460220', 2, 'user8', 'u8@gmail.com', '', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '', NULL, 0, NULL, NULL, '', '', '', 'INDIA', NULL, 1000, 4, 0, '2019-05-23 18:27:13', '2019-05-23 18:27:13', 1, ''),
(10, 9, 'FX19460221', 2, 'user9', 'u9@gmail.com', '', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '', NULL, 0, NULL, NULL, '', '', '', 'INDIA', NULL, 1000, 4, 0, '2019-05-23 18:27:13', '2019-05-23 18:27:13', 1, ''),
(11, 10, 'FX19460222', 2, 'user10', 'u10@gmail.com', '1478523699', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '', NULL, 0, NULL, NULL, '', '', '', 'INDIA', NULL, 1500, 4, 1, '2019-05-24 14:38:36', '2019-05-24 18:08:36', 1, ''),
(12, 11, 'FX19270563', 2, 'Mahesh', 'mahi@gmail.com', '8121815502', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '', 'L', 11, NULL, NULL, '', '', '', '', NULL, NULL, 2, 0, '2019-06-04 10:18:49', '2019-06-04 13:48:49', 3, ''),
(13, 11, 'FX19463240', 2, 'Mahesh2', 'mahi1@gmail.com', '1231231232', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '', 'M', 11, NULL, NULL, '', '', '', '', NULL, NULL, 0, 0, '2019-06-04 10:23:48', '2019-06-04 13:53:48', 3, ''),
(14, 11, 'FX19529468', 2, 'Mahesh 2', 'mahi2@gmail.com', '4545454545', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '', 'R', 11, NULL, NULL, '', '', '', '', NULL, 2000, 0, 0, '2019-06-04 10:24:45', '2019-06-04 13:54:45', 3, ''),
(15, 14, 'FX19420249', 2, 'aaa', 'saik.grepthor@gmail.com', '9010989032', '0729563253bc11cb72714d61132adfe7ba2346b581b02546c9ac4a65fc0c02d8', '', 'L', 14, NULL, NULL, '', '', '', '', NULL, NULL, 0, 0, '2019-06-04 15:14:59', '2019-06-04 18:44:59', 3, ''),
(16, 14, 'FX19371513', 2, 'sfdsf', 'ad@gmail.com', '1478523699', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', 'M', 14, NULL, NULL, '', '', '', '', NULL, NULL, 0, 0, '2019-06-04 15:15:32', '2019-06-04 18:45:32', 3, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_detail`
--
ALTER TABLE `account_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `autopool_details`
--
ALTER TABLE `autopool_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `autopull_benifit_user`
--
ALTER TABLE `autopull_benifit_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compose`
--
ALTER TABLE `compose`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kyc`
--
ALTER TABLE `kyc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `official_users`
--
ALTER TABLE `official_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refer_benifit`
--
ALTER TABLE `refer_benifit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_detail`
--
ALTER TABLE `account_detail`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `autopool_details`
--
ALTER TABLE `autopool_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `autopull_benifit_user`
--
ALTER TABLE `autopull_benifit_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `compose`
--
ALTER TABLE `compose`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kyc`
--
ALTER TABLE `kyc`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `official_users`
--
ALTER TABLE `official_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `refer_benifit`
--
ALTER TABLE `refer_benifit`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
