-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 24, 2018 at 11:10 PM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learn`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_admin`
--

CREATE TABLE `table_admin` (
  `AdminID` int(11) NOT NULL,
  `AdminName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_admin`
--

INSERT INTO `table_admin` (`AdminID`, `AdminName`, `Email`, `Password`) VALUES
(1, 'EslaM MaGdi', 'eslam480@outlook.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(8, 'Add ', '1112@sd', '757365867fcbc5a8da0a635517b6891e98ae767f');

-- --------------------------------------------------------

--
-- Table structure for table `table_doctor`
--

CREATE TABLE `table_doctor` (
  `ID` int(11) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `doctor_email` varchar(255) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `doctor_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_doctor`
--

INSERT INTO `table_doctor` (`ID`, `doctor_name`, `doctor_email`, `doctor_id`, `doctor_password`) VALUES
(11, 'Eslam Kandil', 'eslam480@outlook.com', 1234563, '7c4a8d09ca3762af61e59520943dc26494f8941b');

-- --------------------------------------------------------

--
-- Table structure for table `table_matrial`
--

CREATE TABLE `table_matrial` (
  `top_matrial_id` int(11) NOT NULL,
  `top_matrial_name` varchar(255) NOT NULL,
  `top_matrial_level` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_matrial`
--

INSERT INTO `table_matrial` (`top_matrial_id`, `top_matrial_name`, `top_matrial_level`) VALUES
(74, 'e', 4);

-- --------------------------------------------------------

--
-- Table structure for table `table_secretary`
--

CREATE TABLE `table_secretary` (
  `id` int(11) NOT NULL,
  `sec_name` varchar(255) NOT NULL,
  `sec_email` varchar(255) NOT NULL,
  `sec_id` int(11) NOT NULL,
  `sec_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_secretary`
--

INSERT INTO `table_secretary` (`id`, `sec_name`, `sec_email`, `sec_id`, `sec_password`) VALUES
(2, 'eslamv', 'eslam480@outlook.com', 124555, '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_admin`
--
ALTER TABLE `table_admin`
  ADD PRIMARY KEY (`AdminID`),
  ADD UNIQUE KEY `AdminName` (`AdminName`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `table_doctor`
--
ALTER TABLE `table_doctor`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `doctor_name` (`doctor_name`),
  ADD UNIQUE KEY `doctor_email` (`doctor_email`),
  ADD UNIQUE KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `table_matrial`
--
ALTER TABLE `table_matrial`
  ADD PRIMARY KEY (`top_matrial_id`),
  ADD UNIQUE KEY `top_category_name` (`top_matrial_name`);

--
-- Indexes for table `table_secretary`
--
ALTER TABLE `table_secretary`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_admin`
--
ALTER TABLE `table_admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `table_doctor`
--
ALTER TABLE `table_doctor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `table_matrial`
--
ALTER TABLE `table_matrial`
  MODIFY `top_matrial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `table_secretary`
--
ALTER TABLE `table_secretary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
