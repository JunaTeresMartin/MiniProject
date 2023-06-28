-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2023 at 08:25 PM
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
-- Table structure for table `women_pregnancy_details`
--

CREATE TABLE `women_pregnancy_details` (
  `woman_id` int(11) NOT NULL,
  `expectedDeliveryDate` date DEFAULT NULL,
  `lmp` date DEFAULT NULL,
  `numberOfPregnancies` int(11) DEFAULT NULL,
  `NumberOfLiveBirths` int(11) DEFAULT NULL,
  `numberOfMiscarriages` int(11) DEFAULT NULL,
  `numberOfAbortions` int(11) DEFAULT NULL,
  `currentWeight` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `women_pregnancy_details`
--

INSERT INTO `women_pregnancy_details` (`woman_id`, `expectedDeliveryDate`, `lmp`, `numberOfPregnancies`, `NumberOfLiveBirths`, `numberOfMiscarriages`, `numberOfAbortions`, `currentWeight`) VALUES
(1, '2023-09-15', '2022-06-15', 0, 0, 0, 0, 99),
(2, '2023-06-30', '2022-08-30', 0, 0, 0, 0, 99);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `women_pregnancy_details`
--
ALTER TABLE `women_pregnancy_details`
  ADD KEY `woman_id` (`woman_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `women_pregnancy_details`
--
ALTER TABLE `women_pregnancy_details`
  MODIFY `woman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `women_pregnancy_details`
--
ALTER TABLE `women_pregnancy_details`
  ADD CONSTRAINT `women_pregnancy_details_ibfk_1` FOREIGN KEY (`woman_id`) REFERENCES `women_personal_details` (`woman_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
