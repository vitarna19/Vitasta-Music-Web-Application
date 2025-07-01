-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 14, 2024 at 09:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trip`
--

-- --------------------------------------------------------

--
-- Table structure for table `trip`
--

CREATE TABLE `trip` (
  `sno` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(22) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trip`
--

INSERT INTO `trip` (`sno`, `name`, `email`, `password`, `date`) VALUES
(1, 'Astha Agrawal', 'suhanibgbr@gmail.com', '$2y$10$vqALQcdv96R.BZt2n22jFOfthkPbfJ9BqjjI/FDbqsUmJTqRwONCC', '2024-04-13 18:45:36'),
(2, 'Vitarna Sharma', 'astha@gmail.com', '$2y$10$ozzQWyBqhUXpS.sangLY0.T069xYuactG66UD5tN5eWqct4Wy0J5.', '2024-04-13 19:47:36'),
(3, 'ACM', 'piyushhumai@gmail.com', '$2y$10$T0mXMFSUY4x/OptW14I3.ehUM0XtfHw48tBhDTiilk1oXScNxVxgy', '2024-04-14 11:01:33'),
(4, 'Astha Agrawal', 'vitarna@gmail.com', '$2y$10$WCzjv2s.mR58.tUjJOIbFu9ObtuGrnj01wSALHKIM9BzWI6AgAApq', '2024-04-14 11:02:52'),
(5, 'Vitarna Sharma', 'suhani@gmail.com', '$2y$10$zrbiL/TCHQttcwq1gNcT/Oz1o9q04x06J0JbT/omCIj2ePY8LRECS', '2024-04-14 11:06:27'),
(6, 'Astha Agrawal', 'asthaa@gmail.com', '$2y$10$2JMpgqq9ZgyMxa5fXQCsgu4dzSAcHi1DcWdU9R3B7uRwSzRFhEiP.', '2024-04-14 16:16:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trip`
--
ALTER TABLE `trip`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
