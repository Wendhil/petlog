-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 17, 2024 at 04:34 PM
-- Server version: 10.3.39-MariaDB-0ubuntu0.20.04.2
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bpa_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `adoption`
--

CREATE TABLE `adoption` (
  `adopt_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` bigint(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `pet_name` varchar(200) NOT NULL,
  `pet_type` enum('dog','cat') NOT NULL,
  `reason` longtext NOT NULL,
  `experience` enum('yes','no') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adoption`
--

INSERT INTO `adoption` (`adopt_id`, `name`, `email`, `phone`, `address`, `pet_name`, `pet_type`, `reason`, `experience`, `created_at`) VALUES
(5, 'ace', 'acefelixerp.manganaan@yahoo.com', 9064075290, 'saranay', 'ash', 'dog', 'cute', 'yes', '2024-11-03 09:38:59'),
(6, 'Barangay ', 'wendhil09@gmail.com', 6448049464, 'Hwywhah', 'Ace', 'cat', 'Hotdgo', 'yes', '2024-11-05 04:34:36'),
(7, 'Maria', 'maryangi@gmail.com', 912345678, 'secret', 'Chimin', 'dog', 'secret', 'yes', '2024-11-12 05:16:53');

-- --------------------------------------------------------

--
-- Table structure for table `Missing`
--

CREATE TABLE `Missing` (
  `m_id` int(11) NOT NULL,
  `m_name` varchar(50) NOT NULL,
  `m_mail` varchar(50) NOT NULL,
  `m_phone` bigint(20) NOT NULL,
  `m_breed` varchar(50) NOT NULL,
  `m_place` longtext NOT NULL,
  `m_descript` longtext NOT NULL,
  `m_photo` blob NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `email` varchar(500) NOT NULL,
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

INSERT INTO `register` (`id`, `owner`, `email`, `pet`, `age`, `breed`, `address`, `pet_image`, `pet_vaccine`, `additional_info`, `created_at`) VALUES
(12, 'ace', '', 'dan', '1', 'chuahua', 'Bahay', 0x2e2e2f73746f7265642f7065745f696d6167652f51525f436f64655f3233706e67, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f51525f436f64655f3233706e67, 'asdawwwdwaxww', '2024-11-14 01:08:47'),
(13, 'H', '', 'dan', '1', 'Chuahua', 'saranay', 0x2e2e2f73746f7265642f7065745f696d6167652f51525f436f64655f3233706e67, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f51525f436f64655f3233706e67, 'dasdsadasd', '2024-11-14 02:05:31'),
(14, 'H', '', 'wendhil', '1', 'Tseetsu', 'sadasd', 0x2e2e2f73746f7265642f7065745f696d6167652f51525f436f64655f3233706e67, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f51525f436f64655f3233706e67, 'asdasda', '2024-11-14 02:06:58'),
(15, 'hakdog', '', 'morikat', '5', 'Puspin', '123 acnaicn St.', 0x2e2e2f73746f7265642f7065745f696d6167652f637279696e672d6361742d6d656d656a7067, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f637279696e672d6361742d6d656d656a7067, 'wala naman', '2024-11-14 05:56:32'),
(16, 'H', 'macefelixerp@gmail.com', 'ace', '1', 'dog', 'saranat', 0x2e2e2f73746f7265642f7065745f696d6167652f53637265656e73686f7438706e67, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f53637265656e73686f743130706e67, 'cacadasd', '2024-11-14 16:49:20'),
(17, 'H', 'macefelixerp@gmail.com', 'ace', '1', 'dog', 'saranat', 0x2e2e2f73746f7265642f7065745f696d6167652f53637265656e73686f7438706e67, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f53637265656e73686f743130706e67, 'cacadasd', '2024-11-14 16:54:44'),
(18, 'burger', 'macefelixerp@gmail.com', 'merry', '1', 'Chuahua', 'Saranay', 0x2e2e2f73746f7265642f7065745f696d6167652f53637265656e73686f7438706e67, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f53637265656e73686f7437706e67, 'asdasdasd', '2024-11-14 16:55:31'),
(19, 'burger', 'macefelixerp@gmail.com', 'merry', '1', 'Chuahua', 'Saranay', 0x2e2e2f73746f7265642f7065745f696d6167652f53637265656e73686f7438706e67, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f53637265656e73686f7437706e67, 'asdasdasd', '2024-11-14 16:58:31'),
(20, 'ace', 'acefelixerp.manganaan@yahoo.com', 'Ace', '12', 'dog', 'Saranay', 0x2e2e2f73746f7265642f7065745f696d6167652f53637265656e73686f7439706e67, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f53637265656e73686f743130706e67, 'dsdabskdjsad', '2024-11-14 16:59:10'),
(21, 'burger', 'userace@gmail.com', 'Me', '1', 'chuahhua', 'Saranay', 0x2e2e2f73746f7265642f7065745f696d6167652f53637265656e73686f7439706e67, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f53637265656e73686f7435706e67, 'mhvmhv', '2024-11-14 17:01:19'),
(22, 'burger', 'userace@gmail.com', 'Me', '1', 'chuahhua', 'Saranay', 0x2e2e2f73746f7265642f7065745f696d6167652f53637265656e73686f7439706e67, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f53637265656e73686f7435706e67, 'mhvmhv', '2024-11-14 17:04:03'),
(23, 'burger', 'userace@gmail.com', 'Me', '1', 'chuahhua', 'Saranay', 0x2e2e2f73746f7265642f7065745f696d6167652f53637265656e73686f7439706e67, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f53637265656e73686f7435706e67, 'mhvmhv', '2024-11-14 17:04:15'),
(24, 'H', 'acefelixerp.manganaan@yahoo.com', 'merry', '1', 'chuahhua', 'Saranay', 0x2e2e2f73746f7265642f7065745f696d6167652f53637265656e73686f7437706e67, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f53637265656e73686f7438706e67, 'dccsdcsd', '2024-11-14 17:04:46'),
(25, 'H', 'acefelixerp.manganaan@yahoo.com', 'merry', '1', 'chuahhua', 'Saranay', 0x2e2e2f73746f7265642f7065745f696d6167652f53637265656e73686f7437706e67, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f53637265656e73686f7438706e67, 'dccsdcsd', '2024-11-14 17:07:37'),
(26, 'burger', 'acefelixerp.manganaan@yahoo.com', 'Ace', '1', 'chuahua', 'Saranay', 0x2e2e2f73746f7265642f7065745f696d6167652f53637265656e73686f7437706e67, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f53637265656e73686f7439706e67, 'jhcvhgfhxgvgfh', '2024-11-14 17:08:33'),
(27, 'ace', 'acefelixerp.manganaan@yahoo.com', 'Me', '1', 'dasdasdas', 'Saranay', 0x2e2e2f73746f7265642f7065745f696d6167652f53637265656e73686f7436706e67, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f53637265656e73686f7437706e67, 'dasjhdvajhsd', '2024-11-14 17:09:59'),
(28, 'ace', 'acefelixerp.manganaan@yahoo.com', 'Me', '1', 'dasdasdas', 'Saranay', 0x2e2e2f73746f7265642f7065745f696d6167652f53637265656e73686f7436706e67, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f53637265656e73686f7437706e67, 'dasjhdvajhsd', '2024-11-14 17:11:21'),
(29, 'ace', 'acefelixerp.manganaan@yahoo.com', 'merry', '1', 'Chuahua', 'Saranay', 0x2e2e2f73746f7265642f7065745f696d6167652f53637265656e73686f7435706e67, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f53637265656e73686f7434706e67, 'vhhvgblghhlkjvh;jioul', '2024-11-14 17:15:22'),
(30, 'burger', 'acefelixerp.manganaan@yahoo.com', 'wendhil', '1', 'chuahua', 'Saranay', 0x2e2e2f73746f7265642f7065745f696d6167652f53637265656e73686f7435706e67, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f53637265656e73686f7436706e67, 'x;mkas;xa;ksx', '2024-11-14 18:57:49'),
(31, 'burger', 'acefelixerp.manganaan@yahoo.com', 'Ace', '1', 'dog', 'Saranay', 0x2e2e2f73746f7265642f7065745f696d6167652f53637265656e73686f7436706e67, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f53637265656e73686f7438706e67, 'saddjhsadkashj', '2024-11-14 19:13:43'),
(32, 'burger', 'acefelixerp.manganaan@yahoo.com', 'wendhil', '1', 'chuahua', 'Saranay', 0x2e2e2f73746f7265642f7065745f696d6167652f53637265656e73686f7435706e67, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f53637265656e73686f7436706e67, 'x;mkas;xa;ksx', '2024-11-14 19:14:19'),
(33, 'burger', 'acefelixerp.manganaan@yahoo.com', 'wendhil', '1', 'chuahua', 'Saranay', 0x2e2e2f73746f7265642f7065745f696d6167652f53637265656e73686f7435706e67, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f53637265656e73686f7436706e67, 'x;mkas;xa;ksx', '2024-11-14 19:14:55'),
(34, 'ace', 'acefelixerp.manganaan@yahoo.com', 'hahueihsv', '12', 'chuahhua', 'asdasd', 0x2e2e2f73746f7265642f7065745f696d6167652f53637265656e73686f7433706e67, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f53637265656e73686f7438706e67, 'asdasdasda\r\n', '2024-11-14 19:34:15'),
(35, 'burger', 'acefelixerp.manganaan@yahoo.com', 'dan', '1', 'Tseetsu', 'Saranay', 0x73746f7265642f7065745f696d6167652f53637265656e73686f7437706e67, 0x73746f7265642f76616363696e655f7265636f72642f53637265656e73686f743130706e67, 'dsadasds', '2024-11-14 19:34:57'),
(36, 'ace', 'acefelixerp.manganaan@yahoo.com', 'dan', '1', 'Tseetsu', 'Saranay', 0x73746f7265642f7065745f696d6167652f53637265656e73686f743130706e67, 0x73746f7265642f76616363696e655f7265636f72642f53637265656e73686f743131706e67, 'dasdasdas', '2024-11-14 19:37:00'),
(37, 'ace', 'acefelixerp.manganaan@yahoo.com', 'dan', '1', 'chuahua', 'saranay', 0x73746f7265642f7065745f696d6167652f53637265656e73686f7433706e67, 0x73746f7265642f76616363696e655f7265636f72642f53637265656e73686f7437706e67, 'asasdasdasd', '2024-11-14 19:40:46'),
(38, 'ace', 'acefelixerp.manganaan@yahoo.com', 'dan', '1', 'chuahhua', 'Saranay', 0x73746f7265642f7065745f696d6167652f53637265656e73686f7433706e67, 0x73746f7265642f76616363696e655f7265636f72642f53637265656e73686f7436706e67, 'asdasdasd', '2024-11-14 19:48:02'),
(39, 'burger', 'acefelixerp.manganaan@yahoo.com', 'dan', '1', 'chuahhua', 'adasdasd', 0x73746f7265642f7065745f696d6167652f53637265656e73686f7437706e67, 0x73746f7265642f76616363696e655f7265636f72642f53637265656e73686f7436706e67, 'adasd', '2024-11-14 20:02:20'),
(40, 'burger', 'acefelixerp.manganaan@yahoo.com', 'dan', '1', 'chuahhua', 'adasdasd', 0x73746f7265642f7065745f696d6167652f53637265656e73686f7437706e67, 0x73746f7265642f76616363696e655f7265636f72642f53637265656e73686f7436706e67, 'adasd', '2024-11-14 20:03:47'),
(41, 'burger', 'acefelixerp.manganaan@yahoo.com', 'dan', '1', 'chuahhua', 'adasdasd', 0x73746f7265642f7065745f696d6167652f53637265656e73686f7437706e67, 0x73746f7265642f76616363696e655f7265636f72642f53637265656e73686f7436706e67, 'adasd', '2024-11-14 20:06:31'),
(42, 'burger', 'acefelixerp.manganaan@yahoo.com', 'dan', '1', 'chuahhua', 'adasdasd', 0x73746f7265642f7065745f696d6167652f53637265656e73686f7437706e67, 0x73746f7265642f76616363696e655f7265636f72642f53637265656e73686f7436706e67, 'adasd', '2024-11-14 20:08:12'),
(43, 'burger', 'acefelixerp.manganaan@yahoo.com', 'dan', '1', 'chuahhua', 'adasdasd', 0x73746f7265642f7065745f696d6167652f53637265656e73686f7437706e67, 0x73746f7265642f76616363696e655f7265636f72642f53637265656e73686f7436706e67, 'adasd', '2024-11-14 20:09:19'),
(44, 'burger', 'acefelixerp.manganaan@yahoo.com', 'wendhil', '1', 'Tseetsu', 'Saranay', 0x73746f7265642f7065745f696d6167652f53637265656e73686f7437706e67, 0x73746f7265642f76616363696e655f7265636f72642f53637265656e73686f7438706e67, 'gfcgvhjnjhkb', '2024-11-14 20:18:18'),
(45, 'burger', 'acefelixerp.manganaan@yahoo.com', 'Me', '1', 'chuahua', 'Saranay', 0x2e2e2f73746f7265642f7065745f696d6167652f53637265656e73686f7437706e67, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f53637265656e73686f7439706e67, 'dasdasd', '2024-11-14 20:24:08'),
(46, 'burger', 'acefelixerp.manganaan@yahoo.com', 'merry', '12', 'chuahua', 'Saranay', 0x2e2e2f73746f7265642f7065745f696d6167652f53637265656e73686f7439706e67, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f53637265656e73686f743131706e67, 'asdadjgas', '2024-11-14 20:25:12'),
(47, 'burger', 'acefelixerp.manganaan@yahoo.com', 'dan', '1', 'sasdas', 'Saranay', 0x2e2e2f73746f7265642f7065745f696d6167652f53637265656e73686f7437706e67, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f53637265656e73686f7438706e67, 'dhalshdlajshdas', '2024-11-14 20:27:30'),
(48, 'burger', 'acefelixerp.manganaan@yahoo.com', 'Ace', '1', 'fsdfsdfsd', 'Saranay', 0x2e2e2f73746f7265642f7065745f696d6167652f53637265656e73686f7436706e67, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f53637265656e73686f743130706e67, 'hfjyjgjm', '2024-11-14 20:34:00'),
(49, 'burger', 'acefelixerp.manganaan@yahoo.com', 'Me', '1', 'dog', 'Saranay', 0x2e2e2f73746f7265642f7065745f696d6167652f53637265656e73686f7437706e67, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f53637265656e73686f7439706e67, 'mhfghgvnhbk', '2024-11-14 20:37:01'),
(50, 'mhv', 'userace@gmail.com', 'wendhil', '1', 'chuahhua', 'saranay', 0x73746f7265642f7065745f696d6167652f53637265656e73686f7435706e67, 0x73746f7265642f76616363696e655f7265636f72642f53637265656e73686f743130706e67, 'hfxbgnvjkgufjcvh', '2024-11-14 20:37:44'),
(51, 'burger', 'acefelixerp.manganaan@yahoo.com', 'wendhil', '1', 'kguvjbkuh', 'mmvn bm', 0x73746f7265642f7065745f696d6167652f53637265656e73686f7438706e67, 0x73746f7265642f76616363696e655f7265636f72642f53637265656e73686f743132706e67, 'bvn bmjbh', '2024-11-14 20:38:27'),
(52, 'H', 'acefelixerp.manganaan@yahoo.com', 'hahueihsv', '1', 'Chuahua', 'Saranay', 0x2e2e2f73746f7265642f7065745f696d6167652f53637265656e73686f7435706e67, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f53637265656e73686f7437706e67, 'dasdasdasdas', '2024-11-14 20:41:07'),
(53, 'burger', 'acefelixerp.manganaan@yahoo.com', 'acee', '1', 'Tseetsu', 'Saranay', 0x2e2e2f73746f7265642f7065745f696d6167652f53637265656e73686f7438706e67, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f53637265656e73686f743131706e67, 'dasdasdas', '2024-11-14 20:43:37'),
(54, 'burger', 'acefelixerp.manganaan@yahoo.com', 'hahueihsv', '1', 'sadasd', 'asdsad', 0x2e2e2f73746f7265642f7065745f696d6167652f53637265656e73686f7438706e67, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f53637265656e73686f743131706e67, 'dsadasdas', '2024-11-14 20:47:53'),
(55, 'burger', 'acefelixerp.manganaan@yahoo.com', 'alxvbsvhahuaysvuhxsluh', '1', 'ahxgisaugxausvx', 'Saranay', 0x2e2e2f73746f7265642f7065745f696d6167652f53637265656e73686f7437706e67, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f53637265656e73686f7434706e67, 'a.jbxnaslklnxh,bnhkahy', '2024-11-14 20:49:52'),
(56, 'burger', 'acefelixerp.manganaan@yahoo.com', 'alxvbsvhahuaysvuhxsluh', '1', 'ahxgisaugxausvx', 'Saranay', 0x2e2e2f73746f7265642f7065745f696d6167652f53637265656e73686f7437706e67, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f53637265656e73686f7434706e67, 'a.jbxnaslklnxh,bnhkahy', '2024-11-14 20:51:44'),
(57, 'burger', 'acefelixerp.manganaan@yahoo.com', 'g kvhghbhkgjvggj', '2', 'vvgjhg', 'nhvhv', 0x2e2e2f73746f7265642f7065745f696d6167652f646f67326a7067, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f646f676a7067, 'nhgcvh', '2024-11-14 20:54:00'),
(58, 'burger', 'acefelixerp.manganaan@yahoo.com', 'hahueihsv', '1', 'dasdasdas', 'Saranay', 0x2e2e2f73746f7265642f7065745f696d6167652f636174336a7067, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f646f676a7067, 'dasdas', '2024-11-15 00:04:57'),
(59, 'burger', 'userace@gmail.com', 'Ace', '12', 'Tseetsu', 'Saranay', 0x2e2e2f73746f7265642f7065745f696d6167652f6361746a7067, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f646f676a7067, 'asdasd', '2024-11-16 03:28:12'),
(60, 'burger', 'acefelixerp.manganaan@yahoo.com', 'Me', '1', 'Tseetsu', 'Saranay', 0x2e2e2f73746f7265642f7065745f696d6167652f636174336a7067, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f646f676a7067, 'dasdasd', '2024-11-16 06:24:16'),
(61, 'burger', 'acefelixerp.manganaan@yahoo.com', 'merry', '1', 'dasdasdas', 'Saranay', 0x2e2e2f73746f7265642f7065745f696d6167652f636174326a7067, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f646f67316a7067, 'efdgsfdsDFG', '2024-11-16 06:26:39'),
(62, 'burger', 'acefelixerp.manganaan@yahoo.com', 'merry', '1', 'Tseetsu', 'saranay', 0x2e2e2f73746f7265642f7065745f696d6167652f636174316a7067, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f646f67316a7067, 'cadsvfd fgdxgd', '2024-11-16 06:31:58'),
(63, 'Jp', 'jp@gmail.com', 'Ace', '999', 'Unkown', 'Celina kingstown', 0x2e2e2f73746f7265642f7065745f696d6167652f696e626f756e643836373333343732343534313235343630386a7067, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f696e626f756e64323731313737343231343639333131323935306a7067, 'Wala', '2024-11-16 15:48:38'),
(64, 'Jp', 'jp@gmail.com', 'Ace Felixerp', '99', 'Unkown ', 'Celina kingstown', 0x2e2e2f73746f7265642f7065745f696d6167652f53637265656e73686f745f323032342d31312d31362d32332d35302d32372d3930375f636f6d616e64726f69646368726f6d656a7067, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f53637265656e73686f745f323032342d31312d31362d32332d35302d32372d3930375f636f6d616e64726f69646368726f6d656a7067, 'Wala', '2024-11-16 16:00:54'),
(65, 'burger', 'acefelixerp.manganaan@yahoo.com', 'merry', '1', 'Chuahua', 'Saranay', 0x2e2e2f73746f7265642f7065745f696d6167652f646f676a7067, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f53637265656e73686f743130706e67, 'defwrebrgfrwewfrgt', '2024-11-17 10:49:48'),
(66, 'burger', 'acefelixerp.manganaan@yahoo.com', 'merry', '1', 'Chuahua', 'Saranay', 0x2e2e2f73746f7265642f7065745f696d6167652f646f676a7067, 0x2e2e2f73746f7265642f76616363696e655f7265636f72642f53637265656e73686f743130706e67, 'defwrebrgfrwewfrgt', '2024-11-17 10:53:18');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` bigint(55) NOT NULL,
  `email` varchar(200) NOT NULL,
  `species` varchar(200) NOT NULL,
  `breed` varchar(200) NOT NULL,
  `numabuse` bigint(50) NOT NULL,
  `typeabuse` enum('physical abuse','emotional abuse','sexual abuse','abandonment') NOT NULL,
  `descript` longtext NOT NULL,
  `evidence` blob NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `name`, `phone`, `email`, `species`, `breed`, `numabuse`, `typeabuse`, `descript`, `evidence`, `created_at`) VALUES
(11, 'ace', 9064075290, 'acefelixerp.manganaan@yahoo.com', 'dog', 'chuahua', 1, 'physical abuse', 'abuse', 0x2e2e2f73746f7265642f7265706f727445766964656e6365696d616765732e6a7067, '2024-11-03 09:39:31'),
(12, 'ace', 9064075290, 'acefelixerp.manganaan@yahoo.com', 'dog', 'chuahua', 1, 'emotional abuse', 'dasdasdas', 0x2e2e2f73746f7265642f7265706f727445766964656e63652f696d616765732e6a7067, '2024-11-04 01:20:56'),
(13, 'H', 909090, 'wendhil09@gmail.com', 'Cookie', 'Swetsu', 1, 'physical abuse', 'Vubjib', 0x2e2e2f73746f7265642f7265706f727445766964656e63652f53637265656e73686f745f323032342d31312d30352d30302d31342d30342d34355f65323633363830613065353232306236656165663038316662323265303235352e6a7067, '2024-11-05 04:35:45');

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
(1, 'userace', 'userace@a', '$2y$10$SHLGDT88JPR0GNwK3qK6K.AJpFgessO89.kSLAxLcsUw/x1iPmhHG', 'user'),
(2, 'admin', 'admin1@a', '$2y$10$wUeFunJOJ2o9HnrRRhBD9ur.QavLJP6C9JH2xL6bME1OoQf9uc.Qi', 'admin'),
(9, 'ace', 'acefelixerp.manganaan@yahoo.com', '$2y$10$9bSCZGBDO6VEtwndAL.iWOdw9MqlOmd24c6ORGhUltp3f7oV.CNxy', 'user'),
(10, 'wendhil02', 'wendhil01@gmail.com', '$2y$10$00Ihn.9DvkjP9kdd2o/Do.ZJK5sr/h9VnfdsrchlsDy6rrKaNKfYO', 'user'),
(11, 'admin1', 'admin1@gmail.com', '$2y$10$NNeyJ6IOtvjMIjvMZLGaye1A6JIt9uUBat3CxqHCZMp.yhGyrGt9y', 'user'),
(12, 'Mark James F. Salvadora', 'sheepmail@dumuzid.com', '$2y$10$zWEFhQNW4teSu/rYzTDlBeSZet7VWmnJ3vStwiX1dJ6H4Zyadrby.', 'user'),
(13, 'thedog', 'thedog@gmail.com', '$2y$10$okpPU9pcn65LpQ758ZV3seYvqDJhWDAjYOY3SZoD410iKuSqsGc2i', 'user'),
(14, 'we', 'wendhil10@gmail.co', '$2y$10$QIa6R2T6ygxBH3nYThc0s.q1yBuUhy4i72H1TvrDVHWKH3isbDEX.', 'user'),
(15, 'maryangi', 'maryang@gmail.com', '$2y$10$cq5NrDaxyRLOJmEfjLDVte16Swfua47oKAxxFDyfBBCM6yd0LZwDG', 'user'),
(16, 'wen', 'wendhil08@gmail.com', '$2y$10$Y53kEGbHq0bNIdTITFHYO.uUOhqbAy5kCpTTmo0AVXbfl1cFtmVG2', 'user'),
(17, 'nayeonie', 'mail@mail.com', '$2y$10$SO7B8oBtSHbdeteUCqVmieIIxAXOi1Ck7CPY3IgF4oq4eYIuKdAYq', 'user'),
(18, 'test', 'test@gmail.com', '$2y$10$8V0iIYLtoYDoprfWzdVy7OnWuXAUTsut7VCP6RpGAoEg8.FD7xM8a', 'user'),
(19, 'Jp', 'jp@gmail.com', '$2y$10$k1qoJDlCSh.UHLKu6PTnjucWspBRQDQOhR2iBRmbydAT0Fof5q1Pa', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adoption`
--
ALTER TABLE `adoption`
  ADD PRIMARY KEY (`adopt_id`);

--
-- Indexes for table `Missing`
--
ALTER TABLE `Missing`
  ADD PRIMARY KEY (`m_id`);

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
  MODIFY `adopt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Missing`
--
ALTER TABLE `Missing`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
