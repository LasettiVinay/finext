-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2019 at 02:52 PM
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

--
-- Dumping data for table `account_detail`
--

INSERT INTO `account_detail` (`id`, `mode_of_payment`, `user_id`, `bank_name`, `account_no`, `pay_phone_no`, `account_holder`, `ifsc`, `creation_date`, `modification_date`, `dalete_status`) VALUES
(4, '', '2', 'sbi dsfdsg', 'iluoi', '', 'uiyhuiq', 'kjk', '2019-05-25', '0000-00-00', '0');

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
(1, 13, 14, 1000, 1, '0000-00-00 00:00:00'),
(2, 14, 5, 1000, 2, '0000-00-00 00:00:00'),
(3, 13, 5, 500, 1, '0000-00-00 00:00:00'),
(4, 12, 5, 500, 2, '0000-00-00 00:00:00'),
(5, 11, 5, 500, 2, '0000-00-00 00:00:00');

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
(1, 'system_name', 'MyPulse', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(2, 'system_title', 'MyPulse', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(3, 'address', 'Hyderabad', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(4, 'phone', '9739195391', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(5, 'paypal_email', '', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(6, 'currency', '', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(7, 'system_email', 'mypulsecare@gmail.com', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(8, 'email_password', 'MyPulse@123', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(9, 'purchase_code', '[ your-purchase-code-here ]', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(11, 'three_matrix', '2500', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(12, 'four_matrix', '3000', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(13, 'system_currency_id', '1', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(14, 'sms_username', 'mypulsecare@gmail.com', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(15, 'sms_sender', 'TXTLCL', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(16, 'sms_hash', 'Hp1qPEPiNj0-Q9HXoTR77OZ12cqTlOcohqW928oJzA', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(17, 'GST', '', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(19, 'privacy', '<h1 style=\"text-align: center;\"><span style=\"color:#008000\"><u><span style=\"font-size:22px\"><span style=\"font-family:lucida sans unicode,lucida grande,sans-serif\"><var><strong><em>MyPulse</em></strong></var></span></span></u></span></h1>\r\n', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(20, 'terms', '<p>hi this is for testing</p>\r\n', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1);

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
  `walet` float NOT NULL,
  `payment_conferm` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `row_status` tinyint(4) NOT NULL DEFAULT '3' COMMENT '0=Deleted,1=Active,2=Inactive,3=Registered',
  `profile_image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `introducer_id`, `refer_id`, `role_id`, `name`, `email`, `mobile`, `password`, `pan_number`, `position`, `place_id`, `nomini`, `relation`, `address`, `city`, `state`, `country`, `activedate`, `walet`, `payment_conferm`, `created_at`, `modified_at`, `row_status`, `profile_image`) VALUES
(1, 0, 'FX19460212', 1, 'Admin', 'admin@gmail.com', '8121815502', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', '', NULL, 0, '0', '0', '', '', '', '', NULL, 0, 0, '2019-05-23 18:25:17', '2019-05-23 18:25:17', 1, ''),
(2, 0, 'FX19460213', 2, 'user1', 'u1@gmail.com', '8121815502', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', 'gfhfghf', NULL, 0, '0', '0', 'sfghrza dfsgfsz dfsgdfszdfg hfsg                     ', 'fd gf', 'gdf gdf', 'INDIA', NULL, 0, 0, '2019-05-23 18:26:47', '2019-05-23 18:26:47', 3, 'Penguins.jpg'),
(3, 2, 'FX19460213', 2, 'user2', 'u2@gmail.com', '8121815502', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', '', NULL, 2, '0', '0', '', '', '', '', NULL, 0, 0, '2019-05-23 18:27:13', '2019-05-23 18:27:13', 3, ''),
(4, 3, 'FX19460213', 2, 'user3', 'u3@gmail.com', '8121815502', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', '', NULL, 3, '0', '0', '', '', '', '', NULL, 0, 0, '2019-05-23 18:27:13', '2019-05-23 18:27:13', 3, ''),
(5, 4, 'FX19460213', 2, 'user4', 'u4@gmail.com', '8121815502', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', '', NULL, 4, '0', '0', '', '', '', '', NULL, 0, 0, '2019-05-23 18:27:13', '2019-05-23 18:27:13', 3, ''),
(6, 5, 'FX19460213', 2, 'user5', 'u5@gmail.com', '8121815502', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', '', NULL, 5, '0', '0', '', '', '', '', NULL, 0, 0, '2019-05-23 18:27:13', '2019-05-23 18:27:13', 3, ''),
(7, 6, 'FX19460213', 2, 'user6', 'u6@gmail.com', '8121815502', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', '', NULL, 6, '0', '0', '', '', '', '', NULL, 0, 0, '2019-05-23 18:27:13', '2019-05-23 18:27:13', 3, ''),
(8, 7, 'FX19460213', 2, 'user7', 'u7@gmail.com', '8121815502', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', '', NULL, 7, '0', '0', '', '', '', '', NULL, 0, 0, '2019-05-23 18:27:13', '2019-05-23 18:27:13', 3, ''),
(9, 8, 'FX19460213', 2, 'user8', 'u8@gmail.com', '8121815502', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', '', NULL, 8, '0', '0', '', '', '', '', NULL, 0, 0, '2019-05-23 18:27:13', '2019-05-23 18:27:13', 3, ''),
(10, 9, 'FX19460213', 2, 'user9', 'u9@gmail.com', '8121815502', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', '', NULL, 9, '0', '0', '', '', '', '', NULL, 0, 0, '2019-05-23 18:27:13', '2019-05-23 18:27:13', 3, ''),
(11, 10, 'FX19494401', 2, 'sdfds', 'sadas@gmail.com', '5555555555', '1d28c120568c10e19b9d8abe8b66d0983fa3d2e11ee7751aca50f83c6f4a43aa', '', 'L', 10, NULL, NULL, '', '', '', '', NULL, 500, 0, '2019-05-24 14:38:36', '2019-05-24 18:08:36', 3, ''),
(12, 11, 'FX19242042', 2, 'Mahi', 'mahi@gmail.com', '8121815502', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '', 'L', 1, NULL, NULL, '', '', '', '', NULL, 500, 0, '2019-05-24 16:19:46', '2019-05-24 19:49:46', 3, ''),
(13, 12, 'FX19353260', 2, 'mahi', 'mahi1@gmail.com', '5587876897', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', '', 'L', 12, NULL, NULL, '', '', '', '', NULL, 500, 0, '2019-05-24 16:24:33', '2019-05-24 19:54:33', 3, ''),
(14, 13, 'FX19198991', 2, 'Mahi', 'mahi2@gmail.com', '3424343434', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '', 'L', 13, NULL, NULL, '', '', '', '', NULL, 1000, 0, '2019-05-24 16:25:52', '2019-05-24 19:55:52', 3, ''),
(15, 14, 'FX19520595', 2, 'suri', 'hippi123@gmail.com', '5587876897', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '', 'L', 14, NULL, NULL, '', '', '', '', NULL, 0, 0, '2019-05-24 17:14:31', '2019-05-24 20:44:31', 3, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_detail`
--
ALTER TABLE `account_detail`
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
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `refer_benifit`
--
ALTER TABLE `refer_benifit`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
