-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2023 at 05:35 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esp`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL,
  `branch_code` varchar(50) NOT NULL,
  `name` varchar(20) NOT NULL,
  `createdAt` date NOT NULL,
  `createdBy` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_code`, `name`, `createdAt`, `createdBy`) VALUES
(1, 'LXI0001', 'GUM', '2023-12-26', 'admin'),
(2, 'LXI0002', 'PAM', '2023-12-26', 'admin'),
(3, 'LXI0003', 'TBSM', '2023-12-26', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `m_ch`
--

CREATE TABLE `m_ch` (
  `ch_id` int(11) NOT NULL,
  `company` text NOT NULL,
  `ch_estate` varchar(10) NOT NULL,
  `ch_division` varchar(5) NOT NULL,
  `ch` decimal(6,2) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `createdat` datetime DEFAULT NULL,
  `createdby` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_ch`
--

INSERT INTO `m_ch` (`ch_id`, `company`, `ch_estate`, `ch_division`, `ch`, `date`, `time`, `createdat`, `createdby`) VALUES
(1, 'GUM', 'MELAMOR', '1', '24.75', '2023-12-25', '07:58:00', '0000-00-00 00:00:00', 'a'),
(3, 'GUM', 'SEDADUNG', '1', '30.00', '2023-12-24', '08:21:00', '0000-00-00 00:00:00', 'a'),
(4, 'GUM', 'MULAU', '2', '25.36', '2023-12-25', '09:11:00', '0000-00-00 00:00:00', NULL),
(5, 'GUM', 'NGARING', '1', '25.00', '2024-01-01', '09:12:00', '0000-00-00 00:00:00', NULL),
(6, 'GUM', 'NGARING', '1', '0.00', '2023-12-25', '09:19:00', '0000-00-00 00:00:00', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `m_division`
--

CREATE TABLE `m_division` (
  `division_id` int(11) NOT NULL,
  `company` text NOT NULL,
  `estate_name` varchar(25) NOT NULL,
  `division` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_division`
--

INSERT INTO `m_division` (`division_id`, `company`, `estate_name`, `division`) VALUES
(1, 'GUM', 'SEDADUNG', '1'),
(2, 'GUM', 'SEDADUNG', '2'),
(3, 'GUM', 'SEDADUNG', '3'),
(4, 'GUM', 'SEDADUNG', '4'),
(5, 'GUM', 'SEDADUNG', '5'),
(6, 'GUM', 'SEDADUNG', '6'),
(7, 'GUM', 'MELAMOR', '1'),
(8, 'GUM', 'MELAMOR', '2'),
(9, 'GUM', 'MELAMOR', '3'),
(10, 'GUM', 'MELAMOR', '4'),
(11, 'GUM', 'TUGANG', '1'),
(12, 'GUM', 'TUGANG', '2'),
(13, 'GUM', 'TUGANG', '3'),
(14, 'GUM', 'TUGANG', '4'),
(15, 'GUM', 'TUGANG', '5'),
(16, 'GUM', 'MULAU', '1'),
(17, 'GUM', 'MULAU', '2'),
(18, 'GUM', 'MULAU', '3'),
(19, 'GUM', 'MULAU', '4'),
(20, 'GUM', 'MULAU', '5'),
(21, 'GUM', 'NGARING', '1');

-- --------------------------------------------------------

--
-- Table structure for table `m_estate`
--

CREATE TABLE `m_estate` (
  `estate_id` int(11) NOT NULL,
  `company` text NOT NULL,
  `estate_code` varchar(10) NOT NULL,
  `estate_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_estate`
--

INSERT INTO `m_estate` (`estate_id`, `company`, `estate_code`, `estate_name`) VALUES
(1, 'GUM', 'EMA', 'MELAMOR'),
(2, 'GUM', 'ESG', 'SEDADUNG'),
(3, 'GUM', 'ETG', 'TUGANG'),
(4, 'GUM', 'EMU', 'MULAU'),
(5, 'GUM', 'ENG', 'NGARING');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(150) NOT NULL,
  `image` varchar(100) NOT NULL,
  `is_active` int(1) NOT NULL,
  `role_id` int(11) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  `createdAt` date DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `updatedAt` date DEFAULT NULL,
  `updatedBy` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user`, `username`, `password`, `image`, `is_active`, `role_id`, `email`, `createdAt`, `createdBy`, `updatedAt`, `updatedBy`) VALUES
(1, 'Admin', 'admin', '$2y$10$oNn5QgWKB691pHsL1WxU6.NC9cEjy4VuhzxUCBJsEJ.st4T0O5Ht.', 'avatar.png', 1, 1, '', '2020-12-27', 'slamet', '2020-12-27', 'slamet'),
(2, 'Meinar Sari Lubis', 'mlubis', '$2y$10$IEox71NDnD4WcS.n/u0aXO5fIdL1txDtXQyoSJc7xhZY58olaA/si', 'avatar.png', 1, 1, '', '2023-11-20', 'admin', '2023-11-20', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Mgr');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `m_ch`
--
ALTER TABLE `m_ch`
  ADD PRIMARY KEY (`ch_id`);

--
-- Indexes for table `m_division`
--
ALTER TABLE `m_division`
  ADD PRIMARY KEY (`division_id`);

--
-- Indexes for table `m_estate`
--
ALTER TABLE `m_estate`
  ADD PRIMARY KEY (`estate_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_ch`
--
ALTER TABLE `m_ch`
  MODIFY `ch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `m_division`
--
ALTER TABLE `m_division`
  MODIFY `division_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `m_estate`
--
ALTER TABLE `m_estate`
  MODIFY `estate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
