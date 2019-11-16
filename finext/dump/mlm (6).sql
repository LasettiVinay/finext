-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2019 at 11:44 PM
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
-- Table structure for table `account_detail`
--

CREATE TABLE `account_detail` (
  `id` int(3) NOT NULL,
  `mode_of_payment` varchar(50) NOT NULL,
  `user_id` int(10) NOT NULL,
  `bank_name` varchar(150) NOT NULL,
  `account_no` int(11) NOT NULL,
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
(1, '', 1980, 'SBI', 1234567899, '', 'admin', 'SFsdf1478520', '2019-05-01', '0000-00-00', '0'),
(2, '', 5, '234345', 24324, '12345454565', 'dfjkhd', 'sfhdsfkjQDSJH', '2019-05-01', '0000-00-00', '');

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

--
-- Dumping data for table `autopool_user`
--

INSERT INTO `autopool_user` (`id`, `user_id`, `user_status`, `created_date`, `modification_date`, `deleted_status`, `level`) VALUES
(4, 3131, '', '0000-00-00', '0000-00-00', '0', '');

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
(1, 2, 'Desert.jpg'),
(2, 2, 'Desert.jpg');

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
(55, 1980, 4, '1000', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(56, 1980, 5, '1000', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(57, 1980, 3131, '2500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(58, 1980, 7, '2500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(59, 3131, 3654, '1000', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(60, 3131, 1640, '1000', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(61, 3131, 2375, '1000', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(62, 3131, 3980, '1000', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

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
  `introducer_id` varchar(5) NOT NULL,
  `refer_id` varchar(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `salt` varchar(10) NOT NULL,
  `date_of_join` datetime NOT NULL,
  `pan_no` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `country` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL,
  `activedate` date NOT NULL,
  `profile_image` varchar(225) NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0->Inactive,1->active',
  `position` enum('L','C','M') DEFAULT NULL COMMENT 'L->Left,C->Center,R->Right',
  `payment` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration_detail`
--

INSERT INTO `registration_detail` (`id`, `introducer_id`, `refer_id`, `name`, `gender`, `email`, `mobile`, `user_name`, `password`, `salt`, `date_of_join`, `pan_no`, `address`, `city`, `state`, `country`, `level`, `activedate`, `profile_image`, `active_status`, `position`, `payment`) VALUES
(3, '0', '1980', 'admin', '', '', '', 'admin', 'ffd3417e597e3c002c6e69eae3df8a13', '55299528 ', '2019-05-02 06:11:24', '', '', '', '', '', '', '0000-00-00', '', 1, 'L', '2500'),
(6, '1980', '3131', 'Priya', 'female', 'priya@grepthorsoftware.com', '7661980970', 'priya', 'fb1c2c0df3475f6c60097e997cf0ec83', '39419620', '2019-05-03 10:11:09', '', '', '', '', '', '', '0000-00-00', '', 1, 'L', '2500'),
(7, '1980', '3008', 'fdsgdsgd', 'female', 'priyadfgdsfg@grepthorsoftware.com', '7894561230', 'gggg', 'a181c42b3c252513bac044c107b84e17', '34194731', '2019-05-03 03:28:30', '', '', '', '', '', '', '0000-00-00', '', 1, '', '2500'),
(8, '3131', '3654', 'rani', 'female', 'adsa@gmail.com', '1478996321', 'rani', '6be62ed04facd6d354de3c32d2be3e67', '29066205', '2019-05-03 19:54:45', '', '', '', '', '', '', '0000-00-00', '', 0, 'L', '2500'),
(9, '3131', '1640', 'mani', 'female', 'priyaaaaa@grepthorsoftware.com', '7894561230', 'mani', 'e690bf6e3348c37405e62f12a9021402', '15758069', '2019-05-03 19:55:31', '', '', '', '', '', '', '0000-00-00', '', 0, 'M', '2500'),
(10, '3131', '2375', 'priyanka', 'female', 'priyawert@grepthorsoftware.com', '7894561230', 'priyanka', 'f331f6f185fd0d8c8755d53d15b5ca9e', '32505246', '2019-05-03 20:19:48', '', '', '', '', '', '', '0000-00-00', '', 0, '', '2500'),
(11, '3131', '3980', 'Manisha', 'female', 'asad@gmail.com', '1478523699', 'manisha', 'e1f2634b5229a11f591e0059e292b100', '26196583', '2019-05-03 23:25:28', '', '', '', '', '', '', '0000-00-00', '', 0, 'L', '2500');

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
-- Indexes for table `kyc`
--
ALTER TABLE `kyc`
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
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `autopool_tree`
--
ALTER TABLE `autopool_tree`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `autopool_user`
--
ALTER TABLE `autopool_user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kyc`
--
ALTER TABLE `kyc`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_detail`
--
ALTER TABLE `payment_detail`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `refer_benifit`
--
ALTER TABLE `refer_benifit`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `register_user`
--
ALTER TABLE `register_user`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registration_detail`
--
ALTER TABLE `registration_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
