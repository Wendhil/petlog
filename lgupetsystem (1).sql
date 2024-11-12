-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2024 at 11:09 AM
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
-- Database: `lgupetsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `adoption`
--

CREATE TABLE `adoption` (
  `adopt_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `pet_name` varchar(200) NOT NULL,
  `pet_type` enum('dog','cat','','') NOT NULL,
  `reason` longtext NOT NULL,
  `experience` enum('yes','no','','') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adoption`
--

INSERT INTO `adoption` (`adopt_id`, `name`, `email`, `phone`, `address`, `pet_name`, `pet_type`, `reason`, `experience`, `created_at`) VALUES
(1, 'ace', 'ace@a', 343243, 'saranay', 'ash', 'dog', 'dsfsdfsdf', 'yes', '2024-10-23 08:39:07'),
(2, 'ace', 'ace@a', 343243, 'saranay', 'ash', 'dog', 'dsfsdfsdf', 'yes', '2024-10-23 08:39:07');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `pet` varchar(50) NOT NULL,
  `age` varchar(50) NOT NULL,
  `breed` varchar(50) NOT NULL,
  `address` longtext NOT NULL,
  `pet_image` blob NOT NULL,
  `pet_vaccine` blob NOT NULL,
  `additional_info` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `owner`, `pet`, `age`, `breed`, `address`, `pet_image`, `pet_vaccine`, `additional_info`, `created_at`) VALUES
(1, 'ace', 'merry', '2', 'chuahua', 'asdsasad', 0x7065745f696d6167652f53637265656e73686f74333030706e67, 0x76616363696e655f7265636f72642f53637265656e73686f74323934706e67, 'fwdfsdf', '2024-10-23 08:51:57');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `species` varchar(200) NOT NULL,
  `breed` varchar(200) NOT NULL,
  `age` int(50) NOT NULL,
  `numabuse` int(50) NOT NULL,
  `typeabuse` enum('physical abuse','emotional abuse','sexual abuse','') NOT NULL,
  `descript` longtext NOT NULL,
  `evidence` blob NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `name`, `phone`, `email`, `species`, `breed`, `age`, `numabuse`, `typeabuse`, `descript`, `evidence`, `created_at`) VALUES
(1, 'ace', 0, '09064075290', 'dog', 'chuahua', 3, 1, 'emotional abuse', 'asdasd', 0x73746f7265642f7265706f727445766964656e63652f53637265656e73686f743239352e706e67, '2024-10-23 08:55:26'),
(2, 'ace', 0, '09064075290', 'dog', 'chuahua', 3, 1, 'emotional abuse', 'asdasd', 0x7265706f727445766964656e636553637265656e73686f743330302e706e67, '2024-10-23 08:56:33'),
(3, 'ace', 0, '09064075290', 'dog', 'chuahua', 1, 11, 'physical abuse', 'qsdfdsf', 0x7265706f727445766964656e636553637265656e73686f743239352e706e67, '2024-10-23 09:00:36'),
(4, 'ace', 0, '343243', 'dog', 'chuahua', 1, 1, 'physical abuse', 'axsddsadas', 0x7265706f727445766964656e636553637265656e73686f743239342e706e67, '2024-10-23 09:01:06'),
(5, 'asd', 4234234, 'admin@mail.com', 'dog', 'wfef', 1, 1, 'physical abuse', 'sadasdas', 0x7265706f727445766964656e636553637265656e73686f743239382e706e67, '2024-10-23 09:03:58'),
(6, 'ace', 2147483647, 'admin@mail.com', 'dog', 'chuahua', 1, 1, 'emotional abuse', 'asdasdas', 0x73746f7265642f7265706f727445766964656e636553637265656e73686f743239382e706e67, '2024-10-23 09:06:00'),
(7, 'asd', 2147483647, 'macefelixerp@gmail.com', 'dog', 'pitbull', 3, 1, 'sexual abuse', 'sqdasdsad', 0x73746f7265642f7265706f727445766964656e63652f2d7265706f727445766964656e636553637265656e73686f743239352e706e67, '2024-10-23 09:06:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pwd` varchar(200) NOT NULL,
  `role` enum('admin','user','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `pwd`, `role`) VALUES
(1, 'userace', 'userace@a', '$2y$10$jHq.HSDJIF0KFoZ4HNkoIu.gp9TI3vzETaKc56I2sOgUuz2zWKTFy', 'user'),
(2, 'admin', 'admin1@a', '$2y$10$4oI0ZM5JaZAk1LahY8Sh5.xnk22GEjSwixTzxi2lHLzYfljkCQy.G', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adoption`
--
ALTER TABLE `adoption`
  ADD PRIMARY KEY (`adopt_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
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
-- AUTO_INCREMENT for table `adoption`
--
ALTER TABLE `adoption`
  MODIFY `adopt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
