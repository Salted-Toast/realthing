-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2023 at 04:07 PM
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
-- Database: `occupational_specialism`
--

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `case_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `user_comment` varchar(255) NOT NULL,
  `aqi` int(5) NOT NULL,
  `temperature` float NOT NULL,
  `date` date NOT NULL,
  `time` time(5) NOT NULL,
  `location` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`case_id`, `user_id`, `user_comment`, `aqi`, `temperature`, `date`, `time`, `location`) VALUES
(34, 9, 'My lungs have been stolen', 1, 12, '2023-03-29', '13:34:07.00000', 'London'),
(35, 9, 'GOLD>>> ALWAYS BELEIVE IN YOUR SOUL!!!!!', 3, 22, '2023-03-29', '15:16:05.00000', 'Madrid'),
(36, 9, 'The wind on my left toe feels nice', 1, -20, '2023-03-29', '15:17:25.00000', 'Chicken'),
(37, 9, 'Ok google, what is hypothermia?', 4, 26, '2023-03-29', '15:17:52.00000', 'antarctica'),
(38, 9, 'I think I found a cheat code, it made my hand turn purple!! ', 1, -20, '2023-03-29', '15:18:57.00000', 'Chicken'),
(39, 9, 'I love the sound of mini golf on a cold day :)', 1, 29, '2023-03-29', '15:30:05.00000', 'Manaus'),
(40, 9, 'Really informative video: --> https://www.youtube.com/watch?v=xvFZjo5PgG0', 2, 23, '2023-03-29', '15:35:54.00000', 'Brasilia'),
(41, 9, 'sample-comment', 1, 22, '2023-03-29', '15:37:29.00000', 'Bangladesh'),
(42, 9, 'Sample-comment\r\n', 5, 24, '2023-03-29', '15:37:55.00000', 'Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(5) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(7, 'test', '$2y$10$1071sP1FIzyzR77beSqn../.iTAlRmL2YICzg/1nQReF9/lFN5HB6'),
(9, 'user1', '$2y$10$wt7..NVauFEL140TwtBbdOuCPc0RFdyePSpkNDwC1dGrGLPGFgrp2');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `login_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`login_id`, `user_id`, `date`, `time`) VALUES
(4, 9, '2023-03-29', '14:42:50.000000'),
(5, 9, '2023-03-29', '14:50:29.000000'),
(6, 9, '2023-03-29', '14:51:18.000000'),
(7, 9, '2023-03-29', '14:51:29.000000'),
(8, 9, '2023-03-29', '14:51:35.000000');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `profile_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`profile_id`, `user_id`, `firstname`, `surname`, `email`) VALUES
(6, 7, 'test', 'test', 'test@test.com'),
(8, 9, 'user', '1', 'user1@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`case_id`) USING BTREE,
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`login_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `case_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `login_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `profile_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cases`
--
ALTER TABLE `cases`
  ADD CONSTRAINT `cases_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_login`
--
ALTER TABLE `user_login`
  ADD CONSTRAINT `user_login_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
