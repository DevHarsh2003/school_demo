-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2024 at 09:18 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `name`, `created_at`) VALUES
(1, 'Grade 1A', '2024-11-18 10:20:00'),
(2, 'Grade 1B', '2024-11-18 10:20:00'),
(3, 'Grade 2A', '2024-11-18 10:21:00'),
(4, 'Grade 2B', '2024-11-18 10:21:00'),
(5, 'Grade 3A', '2024-11-18 10:21:00'),
(6, 'Grade 3B', '2024-11-18 10:21:00'),
(7, 'Grade 4A', '2024-11-18 10:22:00'),
(8, 'Grade 4B', '2024-11-18 10:22:00'),
(9, 'Grade 5A', '2024-11-18 10:22:00'),
(10, 'Grade 5B', '2024-11-18 10:56:00');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `class_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `address`, `created_at`, `class_id`, `image`) VALUES
(2, 'Dev Harsh Gonnabathula', 'dev@gmail.com', '58-15-92/1, GF-2, SAI CHINNAMMA NILYAM\r\nSANTHI NAGAR ,NAD KOTHA ROAD', '2024-11-19 05:10:31', 8, 'student_673c1dc752c5c.jpg'),
(3, 'Rahul', 'rahul@gmail.com', 'Kukatpally, Hyderabad', '2024-11-19 05:50:13', 1, 'student_673c271524cdf.jpg'),
(4, 'Mithun', 'miyhun@gmail.com', 'Madhpur, Hyderabad', '2024-11-19 05:51:21', 5, 'student_673c2759a5296.jpg'),
(10, 'Nithya', 'nithya@gmail.com', 'Secunderabad, Telengana', '2024-11-19 06:09:39', 3, 'student_673c2ba30500e.jpg'),
(11, 'Aarya', 'aarya@gmail.com', 'Hitech City, Hyderabad', '2024-11-19 06:10:50', 8, 'student_673c2bea18326.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
