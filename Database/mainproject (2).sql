-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2022 at 02:33 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mainproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_acc`
--

CREATE TABLE `bank_acc` (
  `acc_no` int(100) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `contact` int(100) NOT NULL,
  `adhno` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `acc_type` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `ttl_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bank_deposit`
--

CREATE TABLE `bank_deposit` (
  `acc_no` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `transaction` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `msg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `main_wallet`
--

CREATE TABLE `main_wallet` (
  `customer_id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(20) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `contact` int(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wallet_history`
--

CREATE TABLE `wallet_history` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `h_date` varchar(255) NOT NULL,
  `from_name` varchar(255) NOT NULL,
  `from_contact` int(11) NOT NULL,
  `to_contact` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `transaction` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_acc`
--
ALTER TABLE `bank_acc`
  ADD PRIMARY KEY (`acc_no`),
  ADD UNIQUE KEY `contact` (`contact`),
  ADD UNIQUE KEY `adhno` (`adhno`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `customer_id` (`customer_id`);

--
-- Indexes for table `main_wallet`
--
ALTER TABLE `main_wallet`
  ADD UNIQUE KEY `customer_id` (`customer_id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `contact` (`contact`),
  ADD UNIQUE KEY `customer_id` (`customer_id`);

--
-- Indexes for table `wallet_history`
--
ALTER TABLE `wallet_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wallet_history`
--
ALTER TABLE `wallet_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
