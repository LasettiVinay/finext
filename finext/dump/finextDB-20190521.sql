-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2019 at 03:26 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finext`
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
(1, '', 'FX19520737', 'dsfds', 'adsfads', '', 'dsafdas', 'adsfdsa', '2019-05-16', '0000-00-00', '0'),
(2, '', 'FX19512276', 'SBI', '12345677', '', 'sai krishna', '11111', '2019-05-16', '0000-00-00', '0'),
(3, '', 'FX19372148', 'hgfh', 'jhgj', '', 'hfgj', 'fghjfghj', '2019-05-21', '0000-00-00', '0');

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
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `autopool_details`
--

INSERT INTO `autopool_details` (`id`, `parent_id`, `user_id`, `level`, `position`, `created_at`, `modified_at`, `row_status`) VALUES
(1, 'A29', 'FX19373918', 3, 0, '2019-05-21 18:29:07', NULL, 1),
(2, 'FX19373918', 'FX19373919', 0, 1, '2019-05-21 18:29:20', NULL, 1),
(3, 'FX19373918', 'FX19373920', 0, 2, '2019-05-21 18:29:34', NULL, 1),
(4, 'FX19373918', 'FX19373921', 0, 3, '2019-05-21 18:29:47', NULL, 1);

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
-- Table structure for table `autopull_benifit_user`
--

CREATE TABLE `autopull_benifit_user` (
  `id` int(11) NOT NULL,
  `parent_id` varchar(12) NOT NULL,
  `child_id` varchar(12) NOT NULL,
  `get_amount` varchar(15) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modification_date` datetime DEFAULT NULL,
  `status` enum('1','0') NOT NULL
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
  `country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `official_users`
--

INSERT INTO `official_users` (`id`, `Introducer_id`, `refer_id`, `name`, `gender`, `email`, `mobile`, `user_name`, `password`, `salt`, `date_of_join`, `pan_no`, `address`, `city`, `state`, `country`) VALUES
(1, '', 'A1', 'A1', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', ''),
(2, 'A1', 'A2', 'A2', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', ''),
(3, 'A2', 'A3', 'A3', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', ''),
(4, 'A3', 'A4', 'A4', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', ''),
(5, 'A4', 'A5', 'A5', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', ''),
(6, 'A5', 'A6', 'A6', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', ''),
(7, 'A6', 'A7', 'A7', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', ''),
(8, 'A7', 'A8', 'A8', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', ''),
(9, 'A8', 'A9', 'A9', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', ''),
(10, 'A9', 'A10', 'A10', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', ''),
(11, 'A10', 'A11', 'A11', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', ''),
(12, 'A11', 'A12', 'A12', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', ''),
(13, 'A12', 'A13', 'A13', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', ''),
(14, 'A13', 'A14', 'A14', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', ''),
(15, 'A14', 'A15', 'A15', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', ''),
(16, 'A15', 'A16', 'A16', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', ''),
(17, 'A16', 'A17', 'A17', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', ''),
(18, 'A17', 'A18', 'A18', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', ''),
(19, 'A18', 'A19', 'A19', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', ''),
(20, 'A19', 'A20', 'A20', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', ''),
(21, 'A20', 'A21', 'A21', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', ''),
(22, 'A21', 'A22', 'A22', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', ''),
(23, 'A22', 'A23', 'A23', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', ''),
(24, 'A23', 'A24', 'A24', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', ''),
(25, 'A24', 'A25', 'A25', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', ''),
(26, 'A25', 'A26', 'A26', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', ''),
(27, 'A26', 'A27', 'A27', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', ''),
(28, 'A27', 'A28', 'A28', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', ''),
(29, 'A28', 'A29', 'A29', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `payment_detail`
--

CREATE TABLE `payment_detail` (
  `id` int(2) NOT NULL,
  `user_id` int(2) NOT NULL,
  `payment_amount` varchar(10) NOT NULL,
  `created_date` datetime NOT NULL,
  `Modification_date` datetime NOT NULL,
  `detelet` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `refer_benifit`
--

CREATE TABLE `refer_benifit` (
  `id` int(2) NOT NULL,
  `benifitial_id` varchar(100) NOT NULL,
  `refer_id` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `modification_date` datetime NOT NULL,
  `deleted_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `refer_benifit`
--

INSERT INTO `refer_benifit` (`id`, `benifitial_id`, `refer_id`, `amount`, `created_date`, `modification_date`, `deleted_status`) VALUES
(17, 'FX19512276', 'FX19247129', '1000', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(18, 'FX19460212', 'FX19247129', '500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(19, '0', 'FX19247129', '1000', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(20, 'FX19460212', 'FX19554169', '1000', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(21, '0', 'FX19554169', '1500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(22, 'FX19460212', 'FX19372148', '1000', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(23, 'FX19460212', 'FX19372148', '1500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(24, 'FX19460212', 'FX19372148', '1000', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(25, 'FX19460212', 'FX19372148', '1500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(26, 'FX19372148', 'FX19373918', '1000', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(27, 'FX19460212', 'FX19373918', '500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(28, 'FX19460212', 'FX19373918', '1000', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(29, 'FX19372148', 'FX19400505', '1000', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(30, 'FX19460212', 'FX19400505', '500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(31, 'FX19460212', 'FX19400505', '1000', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(32, 'FX19372148', 'FX19250211', '1000', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(33, 'FX19460212', 'FX19250211', '500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(34, 'FX19460212', 'FX19250211', '1000', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(35, 'FX19400505', 'FX19173341', '1000', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(36, 'FX19372148', 'FX19173341', '500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(37, 'FX19460212', 'FX19173341', '500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(38, 'FX19460212', 'FX19173341', '500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `register_user`
--

CREATE TABLE `register_user` (
  `id` int(2) NOT NULL,
  `parent_id` int(2) NOT NULL,
  `child_id` int(2) NOT NULL,
  `place_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registration_detail`
--

CREATE TABLE `registration_detail` (
  `id` int(11) NOT NULL,
  `introducer_id` varchar(100) NOT NULL,
  `refer_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `salt` varchar(10) NOT NULL,
  `date_of_join` date NOT NULL,
  `pan_no` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `country` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL,
  `activedate` date NOT NULL,
  `profile_image` varchar(225) NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0->Inactive,1->active',
  `position` enum('L','M','R') DEFAULT NULL COMMENT 'L->Left,C->Center,R->Right',
  `payment` varchar(6) NOT NULL,
  `creation_date` datetime NOT NULL,
  `place_id` varchar(10) NOT NULL,
  `nomini` varchar(100) NOT NULL,
  `relation` varchar(225) NOT NULL,
  `payment_conferm` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration_detail`
--

INSERT INTO `registration_detail` (`id`, `introducer_id`, `refer_id`, `name`, `gender`, `email`, `mobile`, `user_name`, `password`, `salt`, `date_of_join`, `pan_no`, `address`, `city`, `state`, `country`, `level`, `activedate`, `profile_image`, `active_status`, `position`, `payment`, `creation_date`, `place_id`, `nomini`, `relation`, `payment_conferm`) VALUES
(1, '0', 'FX19460212', 'admin', 'male', 'admin@gmail.com', '1478523699', 'FX19460212', '908232b66d712049b49bc04524395f2e', '123456', '0000-00-00', '', '', '', '', '', '', '0000-00-00', 'Hydrangeas.jpg', 1, NULL, '', '0000-00-00 00:00:00', '0', '', '', 0),
(16, 'FX19460212', 'FX19372148', 'dsdsd', 'male', 'dd@gmail.com', '9848023338', 'FX19372148', '05f9dc8d3b12780a148421ca3ae225eb', '25822561', '2019-05-16', '', '', '', '', '', '', '0000-00-00', 'Lighthouse.jpg', 1, 'M', '2500', '0000-00-00 00:00:00', 'FX19460212', '', '', 0),
(17, 'FX19372148', 'FX19373918', 'dhfg', 'male', 'fgdf@gmial.com', '0147865674', 'FX19373918', 'c0c88c20f4c52706e4871f54767b8f9d', '44059346', '2019-05-17', '', '', '', '', '', '', '0000-00-00', '', 0, 'L', '2500', '2019-05-17 07:35:26', 'FX19372148', '', '', 4),
(18, 'FX19372148', 'FX19400505', 'Priya', 'male', 'aaa@gmail.com', '1478523669', 'FX19400505', '1f557585e8bfc8ab138921413345e8f8', '30380794', '2019-05-17', '', '', '', '', '', '', '0000-00-00', '', 1, 'R', '2500', '2019-05-17 08:23:34', 'FX19372148', '', '', 4),
(19, 'FX19372148', 'FX19250211', 'hello', 'female', 'adsa@gmail.com', '1478523699', 'FX19250211', 'e48807112796b2978a338498ddb7b2ca', '41238272', '2019-05-17', '', '', '', '', '', '', '0000-00-00', '', 0, 'M', '2500', '2019-05-17 09:53:09', 'FX19372148', '', '', 2),
(20, 'FX19400505', 'FX19173341', 'test', 'female', 'test@gmailc.om', '1234567899', 'FX19173341', 'e6151aaf2bdab533b3a0568148ed6eb8', '38336640', '2019-05-17', '', '', '', '', '', '', '0000-00-00', '', 0, 'L', '2500', '2019-05-17 09:55:01', 'FX19400505', '', '', 4);

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
-- Indexes for table `payment_detail`
--
ALTER TABLE `payment_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refer_benifit`
--
ALTER TABLE `refer_benifit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register_user`
--
ALTER TABLE `register_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration_detail`
--
ALTER TABLE `registration_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_detail`
--
ALTER TABLE `account_detail`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `autopool_details`
--
ALTER TABLE `autopool_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT for table `autopull_benifit_user`
--
ALTER TABLE `autopull_benifit_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `compose`
--
ALTER TABLE `compose`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `payment_detail`
--
ALTER TABLE `payment_detail`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refer_benifit`
--
ALTER TABLE `refer_benifit`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `register_user`
--
ALTER TABLE `register_user`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registration_detail`
--
ALTER TABLE `registration_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
