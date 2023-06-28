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
-- Table structure for table `women_medical_history_details`
--

CREATE TABLE `women_medical_history_details` (
  `woman_id` int(11) NOT NULL,
  `existingMedicalConditions` varchar(800) DEFAULT NULL,
  `previousPregnancyComplications` varchar(800) DEFAULT NULL,
  `currentMedications` varchar(800) DEFAULT NULL,
  `allergies` varchar(800) DEFAULT NULL,
  `bloodType` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `women_medical_history_details`
--

INSERT INTO `women_medical_history_details` (`woman_id`, `existingMedicalConditions`, `previousPregnancyComplications`, `currentMedications`, `allergies`, `bloodType`) VALUES
(1, 'nil', 'nil', 'nil', 'nil', 'A-'),
(2, 'nil', 'nil', 'nil', 'nil', 'AB+');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `women_medical_history_details`
--
ALTER TABLE `women_medical_history_details`
  ADD KEY `woman_id` (`woman_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `women_medical_history_details`
--
ALTER TABLE `women_medical_history_details`
  MODIFY `woman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `women_medical_history_details`
--
ALTER TABLE `women_medical_history_details`
  ADD CONSTRAINT `women_medical_history_details_ibfk_1` FOREIGN KEY (`woman_id`) REFERENCES `women_personal_details` (`woman_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
