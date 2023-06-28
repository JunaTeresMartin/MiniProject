-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2023 at 08:24 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paalan`
--

-- --------------------------------------------------------

--
-- Table structure for table `women_personal_details`
--

CREATE TABLE `women_personal_details` (
  `woman_id` int(11) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `aadharNo` bigint(20) DEFAULT NULL,
  `address` varchar(400) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `pCode` varchar(255) DEFAULT NULL,
  `contactNumber` bigint(20) DEFAULT NULL,
  `emailAddress` varchar(255) DEFAULT NULL,
  `delivered` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `women_personal_details`
--

INSERT INTO `women_personal_details` (`woman_id`, `firstName`, `lastName`, `dob`, `age`, `aadharNo`, `address`, `city`, `pCode`, `contactNumber`, `emailAddress`, `delivered`) VALUES
(1, 'Dia Mariam', 'Luke', '2000-02-15', 25, 14523879, 'address', 'city', '656202', 9874587452, 'email@gmail.com', 'Yes'),
(2, 'Maria', 'John', '2000-04-12', 23, 656214212, 'address', 'madapally', '656202', 11111111111, 'email@gmail.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `women_personal_details`
--
ALTER TABLE `women_personal_details`
  ADD PRIMARY KEY (`woman_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `women_personal_details`
--
ALTER TABLE `women_personal_details`
  MODIFY `woman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
