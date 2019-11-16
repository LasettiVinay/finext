-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2019 at 08:55 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mlm`
--

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

--
-- Dumping data for table `payment_detail`
--

INSERT INTO `payment_detail` (`id`, `user_id`, `payment_amount`, `created_date`, `Modification_date`, `detelet`) VALUES
(1, 7, '2500', '2019-04-14 00:00:00', '2019-04-14 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `refer_benifit`
--

CREATE TABLE `refer_benifit` (
  `id` int(2) NOT NULL,
  `benifitial_id` int(2) NOT NULL,
  `refer_id` int(2) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `modification_date` datetime NOT NULL,
  `deleted_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `refer_benifit`
--

INSERT INTO `refer_benifit` (`id`, `benifitial_id`, `refer_id`, `amount`, `created_date`, `modification_date`, `deleted_status`) VALUES
(43, 0, 44, '2500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(44, 0, 45, '2500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(45, 0, 46, '2500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(46, 0, 47, '2500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(47, 1, 48, '1000', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(48, 2, 6, '1000', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(49, 2, 7, '1000', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `register_user`
--

CREATE TABLE `register_user` (
  `id` int(2) NOT NULL,
  `reference_id` int(2) NOT NULL,
  `reffer_id` int(2) NOT NULL,
  `place_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register_user`
--

INSERT INTO `register_user` (`id`, `reference_id`, `reffer_id`, `place_id`) VALUES
(44, 0, 0, ''),
(45, 1, 2, ''),
(46, 1, 3, ''),
(47, 1, 4, ''),
(48, 2, 5, ''),
(49, 2, 6, ''),
(50, 2, 7, '');

-- --------------------------------------------------------

--
-- Table structure for table `registration_detail`
--

CREATE TABLE `registration_detail` (
  `id` int(11) NOT NULL,
  `introducer_id` varchar(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `salt` varchar(10) NOT NULL,
  `date_of_join` varchar(100) NOT NULL,
  `pan_no` varchar(20) NOT NULL,
  `adhar_no` varchar(16) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `country` varchar(100) NOT NULL,
  `mode_of_payment` varchar(100) NOT NULL,
  `account_holder` varchar(100) NOT NULL,
  `ifsc` varchar(100) NOT NULL,
  `pay_mobile_no` varchar(10) NOT NULL,
  `level` varchar(20) NOT NULL,
  `activedate` date NOT NULL,
  `profile_image` varchar(225) NOT NULL,
  `payment` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration_detail`
--

INSERT INTO `registration_detail` (`id`, `introducer_id`, `name`, `gender`, `email`, `mobile`, `user_name`, `password`, `salt`, `date_of_join`, `pan_no`, `adhar_no`, `address`, `city`, `state`, `country`, `mode_of_payment`, `account_holder`, `ifsc`, `pay_mobile_no`, `level`, `activedate`, `profile_image`, `payment`) VALUES
(1, '', 'Company', 'male', 'admin@gmail.com', '0000000000', 'admin', 'ef7b9a1c3f310d73047244fcc8b5c740', '47466574', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '2500'),
(2, '1', 'Priya', 'female', 'priya@grepthorsoftware.com', '1234567899', 'priya', 'c76d8587d2b121a73945cff0cb271cd5', '47715617', '2019/04/23', '123456789', '123456197423', 'dsgdfh f y dfghf                                                       ', 'fghfg', 'fsgxhfg', 'INDIA', '', '', '', '', '', '0000-00-00', 'Desert.jpg', '2500'),
(3, '1', 'Latha', 'female', 'latha@gmail.com', '1478523699', 'latha', '46fc357ceb4b57617330e84abd6054ad', '42595852', '2019/04/23', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '2500'),
(4, '1', 'Pavani', 'female', 'pavni@gmail.com', '7894561236', 'pavani', 'eb86f7e616c62b55761ce7d9c3216a9e', '41452008', '2019/04/23', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '2500'),
(5, '2', 'trupti', 'female', 'trupti@gmail.com', '1478523698', 'trupti', '1a70ef033be7f86b9c207f5f9146a9d6', '36974247', '2019/04/23', '123456987', '1478523693692581', '                                        dfghdfshfgh fdghfgh fghgf                                                                             ', 'Lucknow', 'UP', 'INDIA', '', '', '', '', '', '0000-00-00', 'Koala.jpg', '2500'),
(6, '2', 'dsgtg', 'male', 'aaaaa@gmailc.om', '7894561230', 'asasa', '8297d75698c3f75cbe970b1ef65e9f46', '37531151', '2019/04/25', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', ''),
(7, '2', 'dsfgdsg', 'female', 'fgdsgfd@gmail.com', '7894561230', 'asasasas', '13bb4af63befd0afb606d89bd4c8e346', '48960830', '2019/04/25', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `payment_detail`
--
ALTER TABLE `payment_detail`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `refer_benifit`
--
ALTER TABLE `refer_benifit`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `register_user`
--
ALTER TABLE `register_user`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `registration_detail`
--
ALTER TABLE `registration_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
