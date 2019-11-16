-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2019 at 09:29 AM
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
-- Table structure for table `autopool_tree`
--

CREATE TABLE `autopool_tree` (
  `id` int(10) NOT NULL,
  `parent_id` int(10) NOT NULL,
  `autochildp1` int(10) NOT NULL,
  `autochildp2` int(10) NOT NULL,
  `autochildp3` int(10) NOT NULL,
  `autochildp4` int(10) NOT NULL,
  `creation_date` date NOT NULL,
  `level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `autopool_user`
--

CREATE TABLE `autopool_user` (
  `id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `user_status` varchar(20) NOT NULL,
  `created_date` date NOT NULL,
  `modification_date` date NOT NULL,
  `deleted_status` enum('0','1') NOT NULL,
  `level` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `compose`
--

CREATE TABLE `compose` (
  `id` int(20) NOT NULL,
  `to_email` varchar(50) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `text` varchar(500) NOT NULL,
  `created_time` datetime(6) NOT NULL,
  `modified_time` datetime(6) NOT NULL,
  `deleted` int(2) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `from_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compose`
--

INSERT INTO `compose` (`id`, `to_email`, `subject`, `text`, `created_time`, `modified_time`, `deleted`, `date`, `from_email`) VALUES
(1, '1', 'fdgdfsg', 'gdfsgdfsg dfsgdfs gfd sg', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, '2019-05-28 13:31:38', '16'),
(2, '1', 'dsfds', '                                            \r\n                             dsgdfsg           ', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, '2019-05-28 13:31:43', '16'),
(3, '1', 'ewrewt', '                                            \r\n                         rewtrewt               ', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, '2019-05-28 13:31:47', '16'),
(4, '1', 'rdsewft', '       dsfdsaf                                     \r\n                                        ', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, '2019-05-28 13:31:51', '16'),
(5, '1', 'rdsewft', '       dsfdsaf                                     \r\n                                        ', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, '2019-05-28 13:31:55', '16'),
(6, '8', 'sadsa', 'dfdsafdsfds fdsafdswfdsagds                           \r\n                                        ', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, '2019-05-28 13:29:48', '1');

-- --------------------------------------------------------

--
-- Table structure for table `kyc`
--

CREATE TABLE `kyc` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `kyc_image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kyc`
--

INSERT INTO `kyc` (`id`, `user_id`, `kyc_image`) VALUES
(1, 16, 'Desert.jpg');

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
  `pan_no` int(11) NOT NULL,
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

INSERT INTO `official_users` (`id`, `Introducer_id`, `refer_id`, `name`, `gender`, `email`, `mobile`, `user_name`, `password`, `salt`, `date_of_join`, `pan_no`, `address`, `city`, `state`, `country`, `bank_name`, `account_holder_name`, `account_no`, `ifsc`) VALUES
(1, '', 'A1', 'A1', '', 'rtytr@gmail.com', '1478523699', '', '', '', '0000-00-00 00:00:00', 0, 'fdsgdf fdh gf hfgh dfghfg                                       ', 'hfgh', 'ghjgfdhj', 'INDIA', '', '', '', ''),
(2, 'A1', 'A2', 'A2', '', 'gdfsg@gmail.com', '1478523699', '', '', '', '0000-00-00 00:00:00', 0, 'sdefgdg dfgdf sdfg fdsfdsg dfsgh fdsfa                            ', 'dfsgdfs', 'dfgdfh', 'INDIA', '', '', '', ''),
(3, 'A2', 'A3', 'A3', '', 'sdfg@gmail.com', '8514723699', '', '', '', '0000-00-00 00:00:00', 0, 'gdfs gdfsghfdhdfsg     d      f                                                                                                                                      ', 'fgdhdfgh', 'hdfghfgd', '1478523369', 'SBI', 'Priya', '', 'SBI00000000'),
(4, 'A3', 'A4', 'gA4', '', 'dfgfdg@gmail.com', '1234567899', '', '', '', '0000-00-00 00:00:00', 0, 'dsadfds sdg fdssa                                           ', 'dfgdfs', 'fgdfg', 'INDIA', 'fdgdfs', 'sdfg', '12345698745', 'gfdgfdgfh'),
(5, 'A4', 'A5', 'A5', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', ''),
(6, 'A5', 'A6', 'A6', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', ''),
(7, 'A6', 'A7', 'A7', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', ''),
(8, 'A7', 'A8', 'A8', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', ''),
(9, 'A8', 'A9', 'A9', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', ''),
(10, 'A9', 'A10', 'A10', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', ''),
(11, 'A10', 'A11', 'A11', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', ''),
(12, 'A11', 'A12', 'A12', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', ''),
(13, 'A12', 'A13', 'A13', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', ''),
(14, 'A13', 'A14', 'A14', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', ''),
(15, 'A14', 'A15', 'A15', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', ''),
(16, 'A15', 'A16', 'A16', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', ''),
(17, 'A16', 'A17', 'A17', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', ''),
(18, 'A17', 'A18', 'A18', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', ''),
(19, 'A18', 'A19', 'A19', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', ''),
(20, 'A19', 'A20', 'A20', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', ''),
(21, 'A20', 'A21', 'A21', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', ''),
(22, 'A21', 'A22', 'A22', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', ''),
(23, 'A22', 'A23', 'A23', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', ''),
(24, 'A23', 'A24', 'A24', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', ''),
(25, 'A24', 'A25', 'A25', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', ''),
(26, 'A25', 'A26', 'A26', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', ''),
(27, 'A26', 'A27', 'A27', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', ''),
(28, 'A27', 'A28', 'A28', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', ''),
(29, 'A28', 'A29', 'A29', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', '');

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
(38, 23, 24, 1000, 1, '0000-00-00 00:00:00'),
(39, 21, 24, 500, 1, '0000-00-00 00:00:00'),
(40, 17, 24, 500, 1, '0000-00-00 00:00:00'),
(41, 16, 24, 500, 1, '0000-00-00 00:00:00');

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
(1, 0, 'FINEXT_ADMIN', 1, 'Admin', 'hippi123@gmail.com', '8919031931', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '34324324', NULL, 0, '0', '0', 'Chennai', 'Chennai', 'Ontario', 'INDIA', NULL, 0, 0, '2019-05-23 18:25:17', '2019-05-23 18:25:17', 1, ''),
(2, 0, 'FX19460213', 2, 'user1', 'u1@gmail.com', '8121815502', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', 'gfhfghf', NULL, 0, '0', '0', 'sfghrza dfsgfsz dfsgdfszdfg hfsg                     ', 'fd gf', 'gdf gdf', 'INDIA', NULL, 0, 0, '2019-05-23 18:26:47', '2019-05-23 18:26:47', 3, 'IMG-20180709-WA0020.jpg'),
(3, 2, 'FX19460214', 2, 'user2', 'u2@gmail.com', '8121815502', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', '', NULL, 2, '0', '0', '', '', '', '', NULL, 0, 0, '2019-05-23 18:27:13', '2019-05-23 18:27:13', 3, ''),
(4, 3, 'FX19460215', 2, 'user3', 'u3@gmail.com', '8121815502', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', '', NULL, 3, '0', '0', '', '', '', '', NULL, 0, 0, '2019-05-23 18:27:13', '2019-05-23 18:27:13', 3, ''),
(5, 4, 'FX19460216', 2, 'user4', 'u4@gmail.com', '8121815502', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', '', NULL, 4, '0', '0', '', '', '', '', NULL, 0, 0, '2019-05-23 18:27:13', '2019-05-23 18:27:13', 3, ''),
(6, 5, 'FX19460217', 2, 'user5', 'u5@gmail.com', '8121815502', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', '', NULL, 5, '0', '0', '', '', '', '', NULL, 0, 0, '2019-05-23 18:27:13', '2019-05-23 18:27:13', 3, ''),
(7, 6, 'FX19460218', 2, 'user6', 'u6@gmail.com', '8121815502', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', '', NULL, 6, '0', '0', '', '', '', '', NULL, 500, 0, '2019-05-23 18:27:13', '2019-05-23 18:27:13', 3, ''),
(8, 7, 'FX19460219', 2, 'user7', 'u7@gmail.com', '8121815502', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', '', NULL, 7, '0', '0', '', '', '', '', NULL, 500, 0, '2019-05-23 18:27:13', '2019-05-23 18:27:13', 3, ''),
(9, 8, 'FX19460220', 2, 'user8', 'u8@gmail.com', '8121815502', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', '', NULL, 8, '0', '0', '', '', '', '', NULL, 500, 0, '2019-05-23 18:27:13', '2019-05-23 18:27:13', 3, ''),
(10, 9, 'FX19460221', 2, 'user9', 'u9@gmail.com', '8121815502', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', '', NULL, 9, '0', '0', '', '', '', '', NULL, 500, 0, '2019-05-23 18:27:13', '2019-05-23 18:27:13', 3, ''),
(11, 10, 'FX19494401', 2, 'sdfds', 'sadas@gmail.com', '5555555555', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', '', 'L', 10, NULL, NULL, '', '', '', '', NULL, 1000, 0, '2019-05-24 14:38:36', '2019-05-24 18:08:36', 3, ''),
(12, 11, 'FX19242022', 2, 'Mahi', 'mahi@gmail.com', '8121815502', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', '', 'L', 11, NULL, NULL, '', '', '', '', NULL, 1500, 0, '2019-05-24 16:19:46', '2019-05-24 19:49:46', 3, ''),
(13, 12, 'FX19353233', 2, 'mahi', 'mahi1@gmail.com', '5587876897', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', '', 'L', 12, NULL, NULL, '', '', '', '', NULL, 1500, 0, '2019-05-24 16:24:33', '2019-05-24 19:54:33', 3, ''),
(14, 13, 'FX19198924', 2, 'Mahi', 'mahi2@gmail.com', '3424343434', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', '', 'L', 13, NULL, NULL, '', '', '', '', NULL, 2000, 0, '2019-05-24 16:25:52', '2019-05-24 19:55:52', 3, ''),
(15, 14, 'FX19520525', 2, 'suri', 'hippi123@gmail.com', '5587876897', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', '', 'L', 14, NULL, NULL, '', '', '', '', NULL, 1500, 0, '2019-05-24 17:14:31', '2019-05-24 20:44:31', 3, ''),
(16, 15, 'FX19408425', 2, 'Mahesh', 'mahi@gmail.com', '1111111111', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '', 'L', 15, NULL, NULL, '', '', '', '', NULL, 500, 0, '2019-05-27 16:55:35', '2019-05-27 20:25:35', 3, ''),
(17, 16, 'FX19316454', 2, 'mahi', 'm@gmail.com', '4444444444', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '', 'L', 16, NULL, NULL, '', '', '', '', NULL, 500, 0, '2019-05-27 17:01:23', '2019-05-27 20:31:23', 3, ''),
(18, 16, 'FX19493750', 2, 'Mahi2', 'mahi2@gmail.com', '5222222222', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '', 'M', 16, NULL, NULL, '', '', '', '', NULL, 0, 0, '2019-05-27 17:02:58', '2019-05-27 20:32:58', 3, ''),
(19, 16, 'FX19539559', 2, 'ftrde', 'saik.uiyu@gmail.com', '9030300882', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '', 'R', 16, NULL, NULL, '', '', '', '', NULL, 0, 0, '2019-05-28 14:04:13', '2019-05-28 17:34:13', 3, ''),
(20, 17, 'FX19521846', 2, 'fdsfds', 'saik.grepthor@gmail.com', '9010989032', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '', 'L', 17, NULL, NULL, '', '', '', '', NULL, 0, 0, '2019-05-28 14:07:05', '2019-05-28 17:37:05', 3, ''),
(21, 17, 'FX19410734', 2, 'dfdhsfdsjnb', 'maji@g.com', '3423423423', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '', 'M', 17, NULL, NULL, '', '', '', '', NULL, 500, 0, '2019-05-28 14:12:29', '2019-05-28 17:42:29', 3, ''),
(22, 21, 'FX19183496', 2, 'qwewqeqwe', 'saik.gsdsdor@gmail.com', '9030333333', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '', 'L', 21, NULL, NULL, '', '', '', '', NULL, 0, 0, '2019-05-28 14:17:12', '2019-05-28 17:47:12', 3, ''),
(23, 21, 'FX19526337', 2, 'dsdsadsa', 'saik.grdddddddhor@gmail.com', '9848023333', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '', 'M', 21, NULL, NULL, '', '', '', '', NULL, 1000, 0, '2019-05-28 14:20:48', '2019-05-28 17:50:48', 3, ''),
(24, 23, 'FX19519505', 2, 'Priya', 'dfsf@gmail.com', '1478523699', '1d28c120568c10e19b9d8abe8b66d0983fa3d2e11ee7751aca50f83c6f4a43aa', '', 'L', 23, NULL, NULL, '', '', '', '', NULL, 0, 4, '2019-05-29 07:51:59', '2019-05-29 11:21:59', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_detail`
--
ALTER TABLE `account_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `autopool_tree`
--
ALTER TABLE `autopool_tree`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `autopool_user`
--
ALTER TABLE `autopool_user`
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
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `autopool_tree`
--
ALTER TABLE `autopool_tree`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `autopool_user`
--
ALTER TABLE `autopool_user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `compose`
--
ALTER TABLE `compose`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kyc`
--
ALTER TABLE `kyc`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `official_users`
--
ALTER TABLE `official_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `refer_benifit`
--
ALTER TABLE `refer_benifit`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
