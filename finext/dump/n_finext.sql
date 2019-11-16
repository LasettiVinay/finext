-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2019 at 02:03 PM
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
-- Database: `n_finext`
--

-- --------------------------------------------------------

--
-- Table structure for table `refer_benifit`
--

CREATE TABLE `refer_benifit` (
  `id` int(15) NOT NULL,
  `introducer_id` int(15) NOT NULL,
  `refer_id` int(15) NOT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT '2' COMMENT '0=deleted,1=active,2=inactive',
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `introducer_id` int(11) NOT NULL,
  `refer_id` varchar(30) NOT NULL,
  `role_id` int(11) NOT NULL,
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
  `row_status` tinyint(4) NOT NULL DEFAULT '3' COMMENT '0=Deleted,1=Active,2=Inactive,3=Registered'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `introducer_id`, `refer_id`, `role_id`, `name`, `email`, `mobile`, `password`, `pan_number`, `position`, `place_id`, `nomini`, `relation`, `address`, `city`, `state`, `country`, `activedate`, `walet`, `payment_conferm`, `created_at`, `modified_at`, `row_status`) VALUES
(1, 0, 'FX19460212', 1, 'Admin', 'admin@gmail.com', '8121815502', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', '', NULL, 0, '0', '0', '', '', '', '', NULL, 0, 0, '2019-05-23 18:25:17', '2019-05-23 18:25:17', 1),
(2, 0, 'FX19460213', 2, 'user1', 'u1@gmail.com', '8121815502', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', '', NULL, 0, '0', '0', '', '', '', '', NULL, 0, 0, '2019-05-23 18:26:47', '2019-05-23 18:26:47', 3),
(3, 2, 'FX19460213', 2, 'user2', 'u2@gmail.com', '8121815502', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', '', NULL, 0, '0', '0', '', '', '', '', NULL, 0, 0, '2019-05-23 18:27:13', '2019-05-23 18:27:13', 3),
(4, 3, 'FX19460213', 2, 'user3', 'u3@gmail.com', '8121815502', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', '', NULL, 0, '0', '0', '', '', '', '', NULL, 0, 0, '2019-05-23 18:27:13', '2019-05-23 18:27:13', 3),
(5, 4, 'FX19460213', 2, 'user4', 'u4@gmail.com', '8121815502', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', '', NULL, 0, '0', '0', '', '', '', '', NULL, 0, 0, '2019-05-23 18:27:13', '2019-05-23 18:27:13', 3),
(6, 5, 'FX19460213', 2, 'user5', 'u5@gmail.com', '8121815502', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', '', NULL, 0, '0', '0', '', '', '', '', NULL, 0, 0, '2019-05-23 18:27:13', '2019-05-23 18:27:13', 3),
(7, 6, 'FX19460213', 2, 'user6', 'u6@gmail.com', '8121815502', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', '', NULL, 0, '0', '0', '', '', '', '', NULL, 0, 0, '2019-05-23 18:27:13', '2019-05-23 18:27:13', 3),
(8, 7, 'FX19460213', 2, 'user7', 'u7@gmail.com', '8121815502', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', '', NULL, 0, '0', '0', '', '', '', '', NULL, 0, 0, '2019-05-23 18:27:13', '2019-05-23 18:27:13', 3),
(9, 8, 'FX19460213', 2, 'user8', 'u8@gmail.com', '8121815502', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', '', NULL, 0, '0', '0', '', '', '', '', NULL, 0, 0, '2019-05-23 18:27:13', '2019-05-23 18:27:13', 3),
(10, 9, 'FX19460213', 2, 'user9', 'u9@gmail.com', '8121815502', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', '', NULL, 0, '0', '0', '', '', '', '', NULL, 0, 0, '2019-05-23 18:27:13', '2019-05-23 18:27:13', 3);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `refer_benifit`
--
ALTER TABLE `refer_benifit`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
