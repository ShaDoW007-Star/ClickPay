-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2022 at 05:54 PM
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

--
-- Dumping data for table `bank_acc`
--

INSERT INTO `bank_acc` (`acc_no`, `customer_id`, `f_name`, `l_name`, `contact`, `adhno`, `email`, `dob`, `acc_type`, `pass`, `ttl_amount`) VALUES
(1000000001, 1001, 'ARYAN', 'PATEL', 777, 7, 'patelaryan460@gmail.com', '2022-01-03', 'Saving Account', '$2y$10$z1MpJjng3ejDjT2vLCTClOQosE7yclGYuYDE.97p0ysWZ1rYMh6UC', 1800),
(1000000002, 1002, 'Harsh', 'Bhadru', 666, 6, 'hb@gmail.com', '2022-01-05', 'Saving Account', '$2y$10$9.5HwXL0B6ll8uRGXaZLCek.ASWxe5XJF.QBefGVmftDIwOypkSgK', 700),
(1000000003, 1004, 'dev', 'kayasth', 1007, 234, 'dk@gmail.com', '2022-03-31', 'Current Account', '$2y$10$rr6b1SmCuyednb1jvpFvHuNeORTLfHXxKF3D5o8VCkBOgo8RsljYy', 1000);

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

--
-- Dumping data for table `bank_deposit`
--

INSERT INTO `bank_deposit` (`acc_no`, `customer_id`, `date`, `amount`, `transaction`) VALUES
(1000000002, 1002, '20-01-2022', 500, 'Received'),
(1000000002, 1002, '20-01-2022', 100, 'Received'),
(1000000002, 1002, '20-01-2022', 400, 'Received'),
(1000000002, 1002, '20-01-2022', 300, 'Received'),
(1000000002, 1002, '20-01-2022', 500, 'Received'),
(1000000002, 1002, '20-01-2022', 500, 'Sent'),
(1000000002, 1002, '20-01-2022', 100, 'Sent'),
(1000000002, 1002, '20-01-2022', 200, 'Sent'),
(1000000002, 1002, '20-01-2022', 300, 'Sent'),
(1000000001, 1001, '20-01-2022', 500, 'Received'),
(1000000001, 1001, '20-01-2022', 400, 'Received'),
(1000000001, 1001, '20-01-2022', 300, 'Received'),
(1000000001, 1001, '20-01-2022', 200, 'Received'),
(1000000001, 1001, '20-01-2022', 100, 'Received'),
(1000000001, 1001, '20-01-2022', 300, 'Sent'),
(1000000001, 1001, '20-01-2022', 400, 'Sent'),
(1000000001, 1001, '20-01-2022', 100, 'Sent'),
(1000000001, 1001, '20-01-2022', 500, 'Sent'),
(1000000001, 1001, '09-03-2022', 100, 'Sent'),
(1000000001, 1001, '09-03-2022', 1000, 'Received'),
(1000000001, 1001, '09-03-2022', 300, 'Sent'),
(1000000003, 1004, '04-04-2022', 999, 'Received'),
(1000000003, 1004, '04-04-2022', 101, 'Received'),
(1000000003, 1004, '04-04-2022', 100, 'Sent'),
(1000000001, 1001, '04-04-2022', 1000, 'Received');

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

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`customer_id`, `name`, `email`, `msg`) VALUES
(1001, 'Aryan Patel', 'patelaryan460@gmail.com', 'Hiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii'),
(1001, 'Aryan Patel', 'patelaryan460@gmail.com', 'kallllllllllllllllllllllllllllllllllllll'),
(0, 'nisha', 'ap@gmail.com', 'hello Aryan'),
(1001, 'nisha', 'ap@gmail.com', 'hello Aryan');

-- --------------------------------------------------------

--
-- Table structure for table `main_wallet`
--

CREATE TABLE `main_wallet` (
  `customer_id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `main_wallet`
--

INSERT INTO `main_wallet` (`customer_id`, `date`, `amount`) VALUES
(1001, '20-01-2022', 1100),
(1002, '20-01-2022', 1200),
(1004, '04-04-2022', 0);

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

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `f_name`, `l_name`, `contact`, `email`, `pass`, `customer_id`) VALUES
(1, 'ARYAN', 'PATEL', 777, 'ap@gmail.com', '$2y$10$nMrQBUy1gPKmMoYPkGHyJ.vEck.3sU7sahWW6AetmAHW3cE7qLC1C', 1001),
(2, 'Harsh', 'Bhadru', 666, 'hb@gmail.com', '$2y$10$4xmtg17s0S4c1BPXVs9WMOy219J3taZSyJdZAw2TLZMJuazGFZTPO', 1002),
(3, 'aaj', 'kal', 888, 'kal@gmail.com', '$2y$10$JFI2MeRnUbsPtgRG7Ce0MOuhqMpttqINtElown2ZuUNQEboUQfcSW', 1003),
(4, 'dev', 'kayasth', 1007, 'dk@gmail.com', '$2y$10$uj0mA303m1waVq3U1U/wFuA6xjm3TO010DZgzhbLqd1YFoatuzA42', 1004),
(5, 'ARYAN', 'PATEL', 107, 'patelaryan46@gmail.com', '$2y$10$oJ2tbDyDlcki30A7l93U.OTKyhbpYVYqSvn8AzNfYD3nGT7yexiWS', 1005);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
