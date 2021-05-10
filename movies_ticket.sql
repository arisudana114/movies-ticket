-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2021 at 08:48 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movies_ticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `cinema`
--

CREATE TABLE `cinema` (
  `id` int(100) UNSIGNED NOT NULL,
  `cinema_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cinema`
--

INSERT INTO `cinema` (`id`, `cinema_name`) VALUES
(1, 'Grand Indonesia'),
(2, 'Central Park'),
(3, 'AEON Jakarta Garden City'),
(4, 'Sunter Mall');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(5, '2021-02-20-090508', 'App\\Database\\Migrations\\CreateTask', 'default', 'App', 1617193182, 1),
(6, '2021-02-20-090509', 'App\\Database\\Migrations\\AddTimestampsToTask', 'default', 'App', 1617193182, 1),
(7, '2021-02-28-055225', 'App\\Database\\Migrations\\CreateUser', 'default', 'App', 1617193182, 1),
(8, '2021-03-03-154750', 'App\\Database\\Migrations\\AddUserIdToTask', 'default', 'App', 1617193182, 1),
(9, '2021-03-03-171539', 'App\\Database\\Migrations\\AddIndexToTaskCreatedAt', 'default', 'App', 1617193182, 1),
(10, '2021-03-05-053335', 'App\\Database\\Migrations\\AddIsAdminToUser', 'default', 'App', 1617193182, 1),
(11, '2021-03-07-111309', 'App\\Database\\Migrations\\AddAccountActivationToUser', 'default', 'App', 1617193182, 1),
(12, '2021-03-07-164056', 'App\\Database\\Migrations\\AddPasswordResetToUser', 'default', 'App', 1617193182, 1),
(13, '2021-03-09-051811', 'App\\Database\\Migrations\\AddProfileImageToUser', 'default', 'App', 1617193182, 1),
(14, '2021-03-10-054903', 'App\\Database\\Migrations\\CreateRememberedLogin', 'default', 'App', 1617193588, 2),
(15, '2021-03-31-122409', 'App\\Database\\Migrations\\CreateMovies', 'default', 'App', 1617193588, 2);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(255) UNSIGNED NOT NULL,
  `titles_id` int(255) UNSIGNED NOT NULL,
  `cinema_id` int(255) UNSIGNED NOT NULL,
  `show_date_id` int(255) UNSIGNED NOT NULL,
  `show_time_id` int(255) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `titles_id`, `cinema_id`, `show_date_id`, `show_time_id`) VALUES
(4, 1, 1, 1, 4),
(3, 1, 2, 4, 3),
(2, 1, 3, 3, 2),
(1, 1, 4, 2, 1),
(23, 2, 1, 1, 3),
(8, 2, 1, 1, 4),
(24, 2, 2, 2, 1),
(7, 2, 2, 4, 3),
(6, 2, 3, 3, 2),
(5, 2, 4, 2, 1),
(12, 3, 1, 1, 4),
(11, 3, 2, 4, 3),
(10, 3, 3, 3, 2),
(9, 3, 4, 2, 1),
(16, 4, 1, 1, 4),
(15, 4, 2, 4, 3),
(14, 4, 3, 3, 2),
(13, 4, 4, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `remembered_login`
--

CREATE TABLE `remembered_login` (
  `token_hash` varchar(64) NOT NULL,
  `user_id` int(5) UNSIGNED NOT NULL,
  `expires_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` int(11) NOT NULL,
  `movies_id` int(10) UNSIGNED NOT NULL,
  `seats_code` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `is_taken` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `movies_id`, `seats_code`, `price`, `is_taken`) VALUES
(1, 1, 'A1', 50000, 1),
(2, 1, 'B1', 50000, 0),
(3, 1, 'C1', 50000, 1),
(4, 1, 'D1', 50000, 0),
(5, 1, 'E1', 50000, 1),
(17, 23, 'A1', NULL, 1),
(18, 23, 'B1', NULL, 1),
(19, 23, 'C1', NULL, 1),
(20, 23, 'D1', NULL, 1),
(21, 23, 'E1', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `show_date`
--

CREATE TABLE `show_date` (
  `id` int(11) UNSIGNED NOT NULL,
  `show_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `show_date`
--

INSERT INTO `show_date` (`id`, `show_date`) VALUES
(1, '2021-04-23'),
(2, '2021-04-24'),
(3, '2021-04-25'),
(4, '2021-04-26');

-- --------------------------------------------------------

--
-- Table structure for table `show_time`
--

CREATE TABLE `show_time` (
  `id` int(11) UNSIGNED NOT NULL,
  `show_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `show_time`
--

INSERT INTO `show_time` (`id`, `show_time`) VALUES
(1, '11:45:00'),
(2, '13:25:00'),
(3, '15:55:00'),
(4, '18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(5) UNSIGNED NOT NULL,
  `description` varchar(128) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `description`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Task 1', '2021-03-31 07:20:41', '2021-03-31 07:20:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `pass_key` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `movies_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `pass_key`, `user_id`, `movies_id`, `name`) VALUES
(66, NULL, 1, 1, 'a3'),
(67, NULL, 1, 1, NULL),
(68, NULL, 1, 1, 'a1, a2, a3'),
(69, NULL, 1, 1, 'A1, A2, A3, A3, A3, A3, A3, A3'),
(70, NULL, 1, 2, 'A1'),
(71, NULL, 1, 3, 'A1, A2, A3, A3, A3, A3, A3, A3'),
(72, NULL, 1, 2, 'A1'),
(73, NULL, 1, 3, 'A1, A2, A3, A4, A5, B1, B2, B3'),
(74, NULL, 1, 1, 'A1, A2'),
(75, NULL, 1, 1, 'A1, A2'),
(76, NULL, 1, 1, 'D3, A4, A5, C5, D5');

-- --------------------------------------------------------

--
-- Table structure for table `titles`
--

CREATE TABLE `titles` (
  `id` int(5) UNSIGNED NOT NULL,
  `title` varchar(128) NOT NULL,
  `description` varchar(128) NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `titles`
--

INSERT INTO `titles` (`id`, `title`, `description`, `price`, `image`) VALUES
(1, 'Evangelion 3.0 + 1.0 : Thrice Upon A Time', 'Evangelion the movie', 50000, 'evangelion.png'),
(2, 'Gintama: The Final', 'Gintama movie the final', 50000, 'gintama.jpg'),
(3, 'Kimetsu no Yaiba: Mugen Train', 'Kimetsu no Yaiba the movie', 50000, 'kny.jpg'),
(4, 'Violet Evergarden The Movie', 'Violet Evergarden The Movie', 50000, 'violet_evergarden.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `activation_hash` varchar(64) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `reset_hash` varchar(64) DEFAULT NULL,
  `reset_expires_at` datetime DEFAULT NULL,
  `profile_image` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password_hash`, `created_at`, `updated_at`, `is_admin`, `activation_hash`, `is_active`, `reset_hash`, `reset_expires_at`, `profile_image`) VALUES
(1, 'Ari Sudana', 'arisudana114@gmail.com', '$2y$10$nRONgtG1gaQWr1IEBBWxV.UYpvkvc4MUkl05ag4preGvUEgkGQpRm', '2021-03-31 07:20:01', '2021-03-31 07:20:21', 0, NULL, 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `titles_id` (`titles_id`,`cinema_id`,`show_date_id`,`show_time_id`),
  ADD KEY `movies_cinema_id_fk` (`cinema_id`),
  ADD KEY `movies_show_date_id_fk` (`show_date_id`),
  ADD KEY `movies_show_time_id_fk` (`show_time_id`);

--
-- Indexes for table `remembered_login`
--
ALTER TABLE `remembered_login`
  ADD PRIMARY KEY (`token_hash`),
  ADD KEY `remembered_login_user_id_foreign` (`user_id`),
  ADD KEY `expires_at` (`expires_at`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seats_movies_id_fk` (`movies_id`);

--
-- Indexes for table `show_date`
--
ALTER TABLE `show_date`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `show_time`
--
ALTER TABLE `show_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_user_id_fk` (`user_id`),
  ADD KEY `created_at` (`created_at`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_user_id_fk` (`user_id`),
  ADD KEY `ticket_movies_id_fk` (`movies_id`);

--
-- Indexes for table `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `activation_hash` (`activation_hash`),
  ADD UNIQUE KEY `reset_hash` (`reset_hash`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cinema`
--
ALTER TABLE `cinema`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `show_date`
--
ALTER TABLE `show_date`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `show_time`
--
ALTER TABLE `show_time`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `titles`
--
ALTER TABLE `titles`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_cinema_id_fk` FOREIGN KEY (`cinema_id`) REFERENCES `cinema` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movies_show_date_id_fk` FOREIGN KEY (`show_date_id`) REFERENCES `show_date` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movies_show_time_id_fk` FOREIGN KEY (`show_time_id`) REFERENCES `show_time` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movies_titles_id_fk` FOREIGN KEY (`titles_id`) REFERENCES `titles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `remembered_login`
--
ALTER TABLE `remembered_login`
  ADD CONSTRAINT `remembered_login_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `seats_movies_id_fk` FOREIGN KEY (`movies_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_movies_id_fk` FOREIGN KEY (`movies_id`) REFERENCES `titles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
