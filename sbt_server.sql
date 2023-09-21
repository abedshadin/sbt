-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2023 at 10:27 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sbt_server`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `password`, `email`, `status`) VALUES
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'mhshihab.official@gmail.com', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `name`, `f_name`, `photo`, `email`, `phone`, `address`) VALUES
(1, 'abved', '', '', '', '', ''),
(2, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ltm`
--

CREATE TABLE `ltm` (
  `sl_no` bigint(20) UNSIGNED NOT NULL,
  `id` varchar(250) NOT NULL,
  `name_work` varchar(255) NOT NULL,
  `s_rate` varchar(255) NOT NULL,
  `bd` varchar(255) NOT NULL,
  `l_sell_time` varchar(255) NOT NULL,
  `l_secure_time` varchar(255) NOT NULL,
  `c_date_t` varchar(255) NOT NULL,
  `liquid` varchar(255) NOT NULL,
  `est_cost` varchar(255) NOT NULL,
  `loc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ltm`
--

INSERT INTO `ltm` (`sl_no`, `id`, `name_work`, `s_rate`, `bd`, `l_sell_time`, `l_secure_time`, `c_date_t`, `liquid`, `est_cost`, `loc`) VALUES
(1, '44', 'ioipipijo    liupip', 'oppoi', 'poipoip', '27-Sep-2023 01:02', '20-Sep-2023 01:02', '14-Sep-2023 01:02', 'opoi', 'iopoip', ''),
(2, '', '', '', '', '01-Jan-1970 01:00', '01-Jan-1970 01:00', '01-Jan-1970 01:00', '', '', ''),
(3, '', '', '', '', '01-Jan-1970 01:00', '01-Jan-1970 01:00', '01-Jan-1970 01:00', '', '', ''),
(4, '', '', '', '', '01-Jan-1970 01:00', '01-Jan-1970 01:00', '01-Jan-1970 01:00', '', '', 'Sherpur');

-- --------------------------------------------------------

--
-- Table structure for table `modal`
--

CREATE TABLE `modal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `News` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modal`
--

INSERT INTO `modal` (`id`, `News`) VALUES
(1, 'fsjdh fhsdf dsf sdfsdgf '),
(2, 'আমাদের নতুন সার্ভারের জন্য টাকা প্রয়োজন । দয়া করে টাকা দিন ।'),
(3, 'Stopped '),
(4, 'Testing '),
(5, 'Properly Running '),
(6, 'Added link to download feature.Enjoy 🥳'),
(7, 'Shop Open Now'),
(8, 'Hello Boys');

-- --------------------------------------------------------

--
-- Table structure for table `otm`
--

CREATE TABLE `otm` (
  `sl_no` bigint(20) UNSIGNED NOT NULL,
  `id` varchar(250) NOT NULL,
  `name_work` varchar(255) NOT NULL,
  `s_rate` varchar(255) NOT NULL,
  `bd` varchar(255) NOT NULL,
  `l_sell_time` varchar(255) NOT NULL,
  `l_secure_time` varchar(255) NOT NULL,
  `c_date_t` varchar(255) NOT NULL,
  `s_ex` varchar(255) NOT NULL,
  `yto` varchar(255) NOT NULL,
  `credit_l` varchar(255) NOT NULL,
  `tender_c` varchar(255) NOT NULL,
  `loc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `otm`
--

INSERT INTO `otm` (`sl_no`, `id`, `name_work`, `s_rate`, `bd`, `l_sell_time`, `l_secure_time`, `c_date_t`, `s_ex`, `yto`, `credit_l`, `tender_c`, `loc`) VALUES
(26, '72', '', '', '', '01-Jan-1970 01:00', '01-Jan-1970 01:00', '01-Jan-1970 01:00', '', '', '', '', ''),
(27, '71', '', '', '', '01-Jan-1970 01:00', '01-Jan-1970 01:00', '01-Jan-1970 01:00', '', '', '', '', ''),
(29, '172622', 'ujy    tud', '50000000000', '50000', '22-Sep-2023 01:56', '22-Sep-2023 01:56', '29-Sep-2023 06:56', '546456', '56546', '5654654', '54654645', 'Sherpur');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `num` varchar(255) NOT NULL,
  `FileName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `Status`, `num`, `FileName`) VALUES
(22, 'admin2100', 'mhshihab.official@gmail.com', 'cffa5e51227ff2fa2388a5634fc86e23', 'Block', '01794588580', 'wait.php'),
(24, 'abedshadin', 'abedshadin@gmail.com', '3cc7f617b8b11d87e00fc1a8ac025b06', 'Active', '01794588580', 'wait.php');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `ltm`
--
ALTER TABLE `ltm`
  ADD UNIQUE KEY `sl_no` (`sl_no`);

--
-- Indexes for table `modal`
--
ALTER TABLE `modal`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `otm`
--
ALTER TABLE `otm`
  ADD UNIQUE KEY `sl_no` (`sl_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ltm`
--
ALTER TABLE `ltm`
  MODIFY `sl_no` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `modal`
--
ALTER TABLE `modal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `otm`
--
ALTER TABLE `otm`
  MODIFY `sl_no` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
