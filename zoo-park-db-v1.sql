-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2024 at 08:43 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zoo-park-db-v1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password_enc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password_enc`) VALUES
(3, 'admin', '$2y$10$m/T6lYSmAc4O6B0wW2Ptmu2BeIGBnMgtle16tcCp8G.M.YTBcZ5nm');

-- --------------------------------------------------------

--
-- Table structure for table `community_members`
--

CREATE TABLE `community_members` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `aproval` varchar(15) DEFAULT 'pending',
  `password_enc` varchar(255) NOT NULL,
  `registered_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `community_members`
--

INSERT INTO `community_members` (`id`, `first_name`, `last_name`, `contact_number`, `gender`, `dob`, `email`, `aproval`, `password_enc`, `registered_date`) VALUES
(2, 'dan', 'eijf', '0115462265', 'female', '2024-08-12', 'abc@gmail.com', 'approved', '$2y$10$gv8svEvmAhOq7lgxLsdOveQQJIMtd3/HB/BtFGsC80fP4TCu0Ocpi', '2024-08-28 19:51:07'),
(3, 'Imeshi', 'Punsara', '0751151010', 'female', '2009-03-23', 'imeshipunsara@gmail.com', 'approved', '$2y$10$5HdV/IBZjwiEHXDPpAhYeerCiQlG62/0z7/mpvvPQsZN9tzVqlcH6', '2024-08-29 08:11:43'),
(4, 'goo', 'gle', '0781652603', 'male', '2001-08-07', 'bb@gmail.com', 'approved', '$2y$10$HD8Aoht7kYlGZW/Z3Qw0t.MC1I7noDIAMAVrl.RSmcXV2HSqCZzJS', '2024-08-29 16:28:17'),
(5, 'adsmwe', 'ddd', '0704546162', 'male', '1999-08-07', 'rrr@gmail.com', 'approved', '$2y$10$hFol7cqhQZpml3xnan2ODertvmcIEeW01N85pdNeNf614IzD8fm/u', '2024-08-29 16:43:07');

-- --------------------------------------------------------

--
-- Table structure for table `edu_info`
--

CREATE TABLE `edu_info` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `cover_image` varchar(200) DEFAULT NULL,
  `program_text` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `edu_info`
--

INSERT INTO `edu_info` (`id`, `name`, `cover_image`, `program_text`) VALUES
(1, 'edited', 'wp3521702.jpg', 'sdfcxasgs'),
(2, 'science', 'wp4064532.webp', 'blablablabalballba'),
(3, 'ooX', 'R (2).jpeg', 'pppoooooooo'),
(5, 'dda', 'Tharun IOT_bb.png', 'aefdva');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `event_image` varchar(200) DEFAULT NULL,
  `event_text` varchar(600) NOT NULL,
  `event_datetime` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `event_image`, `event_text`, `event_datetime`) VALUES
(1, 'abc', 'ZNgimckYdqLprDDSKoIO1724726069.png', 'adjoafxzsd', '2024-08-16 08:03:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `community_members`
--
ALTER TABLE `community_members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `edu_info`
--
ALTER TABLE `edu_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_event_datetime` (`event_datetime`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `community_members`
--
ALTER TABLE `community_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `edu_info`
--
ALTER TABLE `edu_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
