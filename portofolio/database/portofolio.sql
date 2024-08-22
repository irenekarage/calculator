-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2024 at 11:22 AM
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
-- Database: `portofolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(50) NOT NULL,
  `video_file` varchar(50) NOT NULL,
  `event_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `category`, `location`, `date`, `description`, `created_at`, `title`, `video_file`, `event_date`) VALUES
(5, 'JAVA DEVELOPMENT', 'UDSM', '', 'spring boot short course', '2024-08-02 06:24:14', 'MICROSERVICES', 'e115c00a02839c6013760905abe36b97.mp4', '2024-08-06'),
(6, 'FLUTTER EVENT', 'UBUNGO', '', 'How to develop mobile apps with flutter ', '2024-08-02 06:25:31', 'Flutter development course', '2c23fc57ba3f963aec01f4a7e1474b81.mp4', '2024-08-14'),
(7, 'TEST EVENT ', 'MBEZI', '', 'test event', '2024-08-02 06:34:44', 'WEB DEVELOMENT EVENT', 'f2b05bd102746f509cd0a6aada4ca17f.mp4', '2024-08-12');

-- --------------------------------------------------------

--
-- Table structure for table `my_gallery`
--

CREATE TABLE `my_gallery` (
  `id` int(11) NOT NULL,
  `upload_photo` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `my_gallery`
--

INSERT INTO `my_gallery` (`id`, `upload_photo`, `description`, `created_at`) VALUES
(2, '3f931fe6d8b88fa5915775eb2d94e3ae.png', 'this is event one ', '2024-07-31 22:41:19'),
(3, '30a244e649924f9506a369f307103cd1.png', 'this s test two', '2024-07-31 23:34:56'),
(4, '4a5e5f8b063121f87eb7b069846074db.png', 'this is test four', '2024-07-31 23:35:11'),
(5, '19bcf36eb1846f4e98353b4fa22205de.png', 'this is test five', '2024-07-31 23:35:24');

-- --------------------------------------------------------

--
-- Table structure for table `my_projects`
--

CREATE TABLE `my_projects` (
  `project_id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `zipped_file` varchar(50) NOT NULL,
  `technologies` varchar(50) NOT NULL,
  `language` varchar(50) NOT NULL,
  `database_used` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `my_projects`
--

INSERT INTO `my_projects` (`project_id`, `category`, `zipped_file`, `technologies`, `language`, `database_used`, `description`, `created_at`) VALUES
(2, 'Food ordering  system', '375053229c380e5b25aba3fc0d8fe699.zip', 'html5.css with bootstrap and javascript', 'php8.9', 'Mysql', 'for commercal purpose', '2024-07-31 21:30:03'),
(3, 'E LEARNING', 'a360a3e0515096834b18db26465ab737.zip', 'html5.css with bootstrap and nuxt.js', 'Java and spring boot', 'Mysql', 'test upload', '2024-08-02 09:00:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fullName` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullName`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'System admin', 'admin123@gmail.com', '3008476a9614994b2538c9faa1b7e808', 'admin', '2024-07-29 20:44:14'),
(2, 'USER TESTv3', 'userv7@gmail.com', 'ecd05b8fe3e815e72b9c0c62fa42c302', 'csm_leader', '2024-08-01 10:36:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `my_gallery`
--
ALTER TABLE `my_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_projects`
--
ALTER TABLE `my_projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `my_gallery`
--
ALTER TABLE `my_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `my_projects`
--
ALTER TABLE `my_projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
