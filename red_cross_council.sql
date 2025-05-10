-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2025 at 04:31 AM
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
-- Database: `red_cross_council`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `urgency` enum('low','medium','high') DEFAULT 'low',
  `expiry_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `content`, `urgency`, `expiry_date`, `created_at`, `updated_at`) VALUES
(2, 'uurthrtyh4y45y', 'gerergser', 'medium', '2025-05-31', '2025-05-09 13:56:37', '2025-05-09 14:02:11'),
(3, 'gergegerger', 'erfg3ergersfgvefdesdzfr', 'high', '2025-05-14', '2025-05-09 14:02:36', '2025-05-09 14:02:36'),
(4, 'dddd', 'dddddd', 'low', '2025-05-14', '2025-05-10 00:18:05', '2025-05-10 00:18:05');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` enum('pending','approved','cancelled') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `event_date`, `start_time`, `end_time`, `location`, `description`, `status`, `created_at`) VALUES
(2, 'reergrgrg', '2025-05-15', '12:01:00', '17:04:00', 'efwef', 'erfrew gergerg', 'approved', '2025-05-09 15:32:11'),
(3, 'gtgtgtgt', '2025-05-07', '08:18:00', '09:20:00', 'gggg', 'gggggg', 'approved', '2025-05-10 00:17:25'),
(4, 'vvvv', '2025-05-14', '09:46:00', '10:46:00', 'vvvv', 'vvvvvvv', 'pending', '2025-05-10 01:47:05'),
(5, 'gggg', '2025-05-14', '10:24:00', '12:23:00', 'gggg', 'ggggg', 'pending', '2025-05-10 02:24:03');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `department` varchar(50) NOT NULL,
  `year_level` varchar(20) NOT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `student_id`, `department`, `year_level`, `status`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', '2023-0001', 'BSIT', '2nd Year', 'Active', '2025-05-10 00:22:58', '2025-05-10 00:22:58'),
(2, 'Jane Smith', '2023-0002', 'BTLED-IA', '1st Year', 'Active', '2025-05-10 00:22:58', '2025-05-10 00:22:58'),
(3, 'Mark Johnson', '2023-0003', 'BFPT', '3rd Year', 'Active', '2025-05-10 00:22:58', '2025-05-10 00:44:35'),
(4, 'Maria Santos', '2023-0004', 'BTLED-HE', '4th Year', 'Active', '2025-05-10 00:22:58', '2025-05-10 00:22:58'),
(6, 'sasa', '1111', 'BSIT', '2nd Year', 'Active', '2025-05-10 00:44:03', '2025-05-10 00:44:13'),
(7, 'rrrgrr', 'gg', 'BSIT', '4th Year', 'Active', '2025-05-10 00:47:32', '2025-05-10 00:47:32');

-- --------------------------------------------------------

--
-- Table structure for table `officers`
--

CREATE TABLE `officers` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `officers`
--

INSERT INTO `officers` (`id`, `username`, `password`, `name`, `email`, `role`) VALUES
(1, 'redcross', 'president', 'Jason', 'jasonbaroro4@gmail.com', 'President');

-- --------------------------------------------------------

--
-- Table structure for table `patient_records`
--

CREATE TABLE `patient_records` (
  `id` int(11) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `visit_date` date NOT NULL,
  `department` varchar(50) NOT NULL,
  `reason_visit` text NOT NULL,
  `treatment` text NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_records`
--

INSERT INTO `patient_records` (`id`, `patient_name`, `student_id`, `visit_date`, `department`, `reason_visit`, `treatment`, `notes`, `created_at`) VALUES
(2, 'hfhf', 'ghfhfghfh', '2025-05-14', 'BTLED-IA', 'ffhfhfgh', 'fghfghfhf', 'fghfghfhgf', '2025-05-09 16:28:40'),
(3, 'fghfhghfghfgjh', 'fghjngfjhj', '2025-05-14', 'BSIT', 'ghjjgj', 'hjgjghj', 'hjghjghj', '2025-05-09 16:29:01'),
(5, 'gjkgkhjk', 'hjkhjkhvk', '2025-05-14', 'BTLED-HE', 'hjkhkjh', 'hjkhjkh', 'hjkhkh', '2025-05-09 16:30:20'),
(7, 'h h', 'h rthr', '2025-05-15', 'BTLED-IA', 'rtrhh', 'thht', 'thth', '2025-05-09 17:42:22'),
(8, 'ssss', 'sssss', '2025-05-14', 'BTLED-IA', 'ssss', 'ssss', 'sssss', '2025-05-10 00:18:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- Indexes for table `officers`
--
ALTER TABLE `officers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `patient_records`
--
ALTER TABLE `patient_records`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `officers`
--
ALTER TABLE `officers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient_records`
--
ALTER TABLE `patient_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
