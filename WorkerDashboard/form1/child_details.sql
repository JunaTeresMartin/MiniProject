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
-- Table structure for table `child_details`
--

CREATE TABLE `child_details` (
  `child_id` int(11) NOT NULL,
  `woman_id` int(11) DEFAULT NULL,
  `child_name` varchar(255) DEFAULT NULL,
  `child_age` int(11) DEFAULT NULL,
  `child_dob` date DEFAULT NULL,
  `child_mp` varchar(255) DEFAULT NULL,
  `child_blockNumber` int(11) DEFAULT NULL,
  `child_city` varchar(255) DEFAULT NULL,
  `child_district` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `father_occupation` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `mother_occupation` varchar(255) DEFAULT NULL,
  `no_of_family_members` int(11) DEFAULT NULL,
  `annual_income` int(11) DEFAULT NULL,
  `medical_issue_details` varchar(1000) DEFAULT NULL,
  `child_guardian_phone_no` bigint(20) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `child_details`
--

INSERT INTO `child_details` (`child_id`, `woman_id`, `child_name`, `child_age`, `child_dob`, `child_mp`, `child_blockNumber`, `child_city`, `child_district`, `father_name`, `father_occupation`, `mother_name`, `mother_occupation`, `no_of_family_members`, `annual_income`, `medical_issue_details`, `child_guardian_phone_no`, `height`, `weight`) VALUES
(1, 1, 'Anna', 3, '2021-04-16', 'chry', 123, 'chry', 'ktm', 'Joffin', 'business', 'Jiya', 'business', 876756453, 100000, '', 11111111111, 31, 13),
(2, 2, 'Sara John', 2, '2021-03-12', 'chry', 5, 'chry', 'erkm', 'John', 'nil', 'Sinu', 'nil', 4, 1000000, '', 987745122, 24, 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `child_details`
--
ALTER TABLE `child_details`
  ADD PRIMARY KEY (`child_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `child_details`
--
ALTER TABLE `child_details`
  MODIFY `child_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
