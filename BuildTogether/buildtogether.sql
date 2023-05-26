-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 11:46 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buildtogether`
--

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `team_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(250) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `techprofession` text NOT NULL,
  `experience` varchar(250) NOT NULL,
  `signup_date` date NOT NULL,
  `team_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `techprofession`, `experience`, `signup_date`, `team_name`) VALUES
(1, 'test', 'ademail@gmail.com', 'product designer', '1', '2023-01-10', 'NULL'),
(2, 'canvo', 'aolayemisrael5@gmail.com', '', '2', '2023-04-14', 'NULL'),
(3, 'mike', 'misrael5@gmail.com', 'product manager', '3', '2023-03-14', 'NULL'),
(4, 'new', 'layemisel5@gmail.com', 'product manager', '3', '2023-04-20', 'NULL'),
(5, 'test', 'aolaysrael5@gmail.com', 'product manager', '2', '2023-04-20', 'NULL'),
(6, 'olu', 'olu@gmail.com', 'product designer', '3', '2023-04-20', 'NULL'),
(7, 'Connor Vaughan', 'dyvagesyz@mailinator.com', 'product designer', '2', '2023-04-20', 'NULL'),
(8, 'Keelie Arnold', 'cufafi@mailinator.com', 'frontend', '1', '2023-04-20', 'NULL'),
(9, 'Thane Ayala', 'moqoxu@mailinator.com', '', '1', '2023-04-20', 'NULL'),
(10, 'Stone Gentry', 'lomuxytifa@mailinator.com', 'backend', '1', '2022-09-08', 'NULL'),
(11, 'Dolan Tanner', 'kumivec@mailinator.com', '', '3', '2023-04-20', 'NULL'),
(12, 'Belle Hall', 'qacyjeba@mailinator.com', '', '2', '2023-04-20', 'NULL'),
(13, 'Vernon Jimenez', 'nufylydepy@mailinator.com', 'product designer', '1', '2023-04-20', 'NULL'),
(14, 'Cheyenne Bender', 'jovata@mailinator.com', 'product designer', '3', '2023-05-07', 'NULL'),
(15, 'Margaret Roach', 'kodeximiru@mailinator.com', 'frontend', '3', '2023-05-07', 'NULL'),
(16, 'Linda Griffith', 'xureposo@mailinator.com', 'product designer', '3', '2023-05-07', 'NULL'),
(17, 'Hakeem Roach', 'vawasikyz@mailinator.com', 'product manager', '2', '2023-05-07', 'NULL'),
(18, 'Danielle Gross', 'haqefevaz@mailinator.com', 'product manager', '1', '2023-05-07', 'NULL'),
(31, 'Aidan Moses', 'zojihu@mailinator.com', 'product manager', '3', '2023-05-25', 'NULL'),
(36, 'Madeline Johnson', 'zocate@mailinator.com', 'backend', '3', '2023-05-25', 'NULL'),
(37, 'Zeus Richardson', 'vabeh@mailinator.com', 'frontend', '3', '2023-05-25', 'NULL'),
(38, 'Glenna Petty', 'xadopo@mailinator.com', 'product manager', '1', '2023-05-25', 'NULL'),
(39, 'MacKensie Fuentes', 'miqywuwe@mailinator.com', 'frontend', 'Experience', '2023-05-25', 'NULL'),
(40, 'Camille Cruz', 'fetufaqabo@mailinator.com', 'backend', '2', '2023-05-25', 'NULL'),
(41, 'Dakota Bond', 'nomefytahe@mailinator.com', 'backend', '2', '2023-05-25', 'NULL'),
(42, 'Morgan Calderon', 'celidorod@mailinator.com', 'product designer', '3', '2023-05-25', 'NULL'),
(43, 'Savannah Lindsey', 'haqux@mailinator.com', 'product designer', '1', '2023-05-25', 'NULL'),
(44, 'Zelenia Dotson', 'jokujomo@mailinator.com', 'product manager', '2', '2023-05-25', 'NULL'),
(45, 'Raymond Silva', 'horuxazyz@mailinator.com', 'backend', 'Experience', '2023-05-25', 'NULL'),
(46, 'Imogene Sargent', 'tysetyx@mailinator.com', 'product manager', '3', '2023-05-25', 'NULL'),
(47, 'Basia Gallagher', 'ferexody@mailinator.com', 'frontend', 'Experience', '2023-05-25', 'NULL'),
(48, 'Fuller Buck', 'xocyputyl@mailinator.com', 'product designer', '3', '2023-05-25', 'NULL');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
