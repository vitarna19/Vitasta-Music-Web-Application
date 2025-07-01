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
-- Database: `music`
--

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE `music` (
  `sno` int(11) NOT NULL,
  `music_name` varchar(50) NOT NULL,
  `filepath` varchar(50) NOT NULL,
  `coverpath` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`sno`, `music_name`, `filepath`, `coverpath`) VALUES
(1, 'bolo har har har', 'songs/bolo har har.mp3', 'covers/bolo har har.jpeg'),
(2, '440 Volt', 'songs/440 volt.mp3', 'covers/440 volt.jpeg'),
(3, 'Aaj Jane Ki Zid Na Karo', 'songs/aaj jane ki zid.mp3', 'covers/aaj jane ki zid.jpeg'),
(4, 'Bezubaan Phir Se', 'songs/bezubaan fhir se.mp3', 'covers/bezubaan firse.jpg'),
(5, 'Gulabi 2.0', 'songs/gulabi 2.0.mp3', 'covers/gulabi.jpeg'),
(6, 'Ek Vaari Aa', 'songs/ik vaari aa.mp3', 'covers/ek vaari aa.jpeg'),
(7, 'Love You Zindagi', 'songs/love you zindagi.mp3', 'covers/love youu zindagi.jpeg'),
(8, 'Mann Mera', 'songs/maan mera.mp3', 'covers/maan mera.jpeg'),
(9, 'Naach Meri Jaan', 'songs/naach meri jaan.mp3', 'covers/naach meri jaan.jpeg'),
(10, 'Tera Hoke Rahoon', 'songs/tera hoke rahunga.mp3', 'covers/tere hoke rahoon.jpeg'),
(11, 'Naina - Crew', 'songs/Naina-Crew.mp3', 'covers/naina.jpg'),
(12, 'Akhiyaan Gulaab', 'songs/Akhiyaan Gulaab.mp3', 'covers/akhiyaan gulaab.jpg'),
(13, 'Hass Hass', 'songs/Hass Hass.mp3', 'covers/hass hass.jpg'),
(14, 'Lutt Putt Gaya', 'songs/Lutt Putt Gaya - Mohammad Rafi.mp3', 'covers/lutt putt gaya.jpg'),
(15, 'Raat Akeli Thi', 'songs/Raat Akeli Thi.mp3', 'covers/raat akeli thi.jpg'),
(16, 'Tiranga - Yodha', 'songs/Tiranga - Yodha.mp3', 'covers/tiranga.jpg'),
(17, 'Tum Se', 'songs/Tum Se.mp3', 'covers/tum se.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`sno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
