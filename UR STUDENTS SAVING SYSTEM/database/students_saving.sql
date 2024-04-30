-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 01:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `students_saving`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountants`
--

CREATE TABLE `accountants` (
  `id` int(11) NOT NULL,
  `accountantID` varchar(20) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `accountID` int(11) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `owner` varchar(100) NOT NULL,
  `moneyDeposited` decimal(10,2) NOT NULL,
  `moneyWithdrawn` decimal(10,2) NOT NULL,
  `dateOpened` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`accountID`, `balance`, `owner`, `moneyDeposited`, `moneyWithdrawn`, `dateOpened`) VALUES
(1, 89898.00, 'toujour', 234567.00, 8000.00, '2024-04-30'),
(2, 324254.00, 'omah nifa', 999090.00, 9000.00, '2024-04-27');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_details` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deposits`
--

INSERT INTO `deposits` (`id`, `amount`, `payment_method`, `payment_details`, `created_at`) VALUES
(1, 234.00, 'mtn number', 'jhgfd', '2024-04-30 08:24:25');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentID` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `faculty` varchar(100) DEFAULT NULL,
  `deposit` int(11) DEFAULT NULL,
  `withdraw` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL,
  `regNumber` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `studentID` varchar(20) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int(11) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `studentID`, `fullName`, `phoneNumber`, `gender`, `age`, `dateOfBirth`, `address`, `email`, `password`) VALUES
(1, '1', '', '', '', 0, '0000-00-00', '', '', '$2y$10$zzdMqbVBcr//agm8VUFUl.IfID0t3tsK2FIckPciiqXwkmmJlSgvu'),
(2, '1', 'nifa', 'omah', 'male', 15, '2009-08-28', 'nyamasheke', 'nifa@gmail.com', '$2y$10$raGR3pzLWGQtTn9GlO59HuWXZWvEUpcBtmxZy8IoKXuDiSnvY73H.'),
(10, '23456', 'fe5r6t7', '2345678', 'male', 23, '2024-04-08', 'fwgestrjdtfygu', 'ascdvbr@gmail.com', '$2y$10$qyV5XfXuWHV1uAeA3.ooN.KJ.uWc.m4Jh.ZRryZbBNdt49O6u5o/u'),
(11, '23456', 'fe5r6t7', '2345678', 'male', 23, '2024-04-08', 'fwgestrjdtfygu', 'ascdvbr@gmail.com', '$2y$10$ladONWe6wBH4iX9GG7AGY.JRgiyJkJ0PFx4o3IWosqQfebmHmvUsu'),
(12, '23456', 'fe5r6t7', '2345678', 'male', 23, '2024-04-08', 'fwgestrjdtfygu', 'ascdvbr@gmail.com', '$2y$10$ox0Hq72tJCtAqlJxRu3/m.mBcz8krQzPnLIulrsffxVUO3hpKGWDS'),
(13, '4', 'gfdefg', '3456', 'male', 32, '2024-05-09', 'hg', 'm@gmail.com', '$2y$10$z14WQ7kZtciqnEw0lPD.le9an/Szdxv6lbfgq5.VSKjX/8QYzF59.'),
(14, '31245', 'dfagsrhtrf', '12345', 'male', 23, '2024-04-04', 'qw345656', 'mm@gmail.com', '$2y$10$1ETcGJvqEXjPrmgv0NOnYukc5SiaJIVD4XV0IR4Oc99flfkLYbWom'),
(15, '12345', 'sqdwfaes', '1234', 'male', 23, '2024-04-17', '2w3e4rt', 'sw@gmail.com', '$2y$10$ClI.OL/ejMJZAm1zFA7nVuNHtsyrDLUVEVEvnuPDnHEw3ht4Qh1lO'),
(16, '12', 'asdf', '2345', 'male', 12, '2024-04-24', 'sdfg', 'a@s', '$2y$10$JsSyGzMjiCtPDxrB./XmAuBriYiW4EVHVBq9v7v/K98tdezRr.oc.'),
(17, '12', 'asdf', '2345', 'male', 12, '2024-04-24', 'sdfg', 'a@gmail.com', '$2y$10$jpYgRun9KdU49ajwcSD5q.IWOo8hLzDOvn.jABGOSmYrtNhJ/tIbC'),
(18, '23456', 'tgshd', '23456', 'male', 8, '2024-04-17', 'wwert', 'eqfwerjt@gmail.com', '$2y$10$qzc/ZStTtcboQdBaM/Z3zuWx7po8qlmXSfpisy/crOZnmaIO8eHoy'),
(19, '123456', 'qwerty', '1234567890', 'male', 10, '2024-05-01', 'asdfghjkl', 'zxcvb@gmail.com', '$2y$10$f89kyUQ/z0xPclvnFrsaSOD/saJxHWQf8xspl.hNso.phtkbS2ylG'),
(20, '12', 'kanani', '098765', 'male', 32, '2024-04-15', 'nyanze', 'ert@sghj', '$2y$10$tc4i7Vb3Nc65xvilKbwLkOU8L3XkfHuoTMoyXULqs5VADyKllB/ve'),
(21, '43', 'og', '2345', 'male', 33, '2024-04-17', 'asdf', 'sdf@gmail.com', '$2y$10$qlWJbcECD8wPTOrGoZvYK.hwZ7ITVp75vpO2GthJHZFbU92bAl2uW'),
(22, '12', 'asdf', '23', 'male', 34, '2024-04-16', 'ghj', 're@gmail.com', '$2y$10$xF66xmL70CY0aHnBX9C/..mUfZFH0zBObH5peTKUN3zLCHv/kq0cu'),
(23, '12', 'asdf', '23', 'male', 34, '2024-04-16', 'ghj', 're@gmail.com', '$2y$10$F82WztmGDIJy4mc092G/1e7LfDHX7aZVam1qAiFntr/7R0TO2hP0K');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `withdrawal_method` varchar(255) NOT NULL,
  `withdrawal_details` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountants`
--
ALTER TABLE `accountants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`accountID`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountants`
--
ALTER TABLE `accountants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `accountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
