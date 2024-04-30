-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2024 at 06:34 AM
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
-- Database: `agenda_kegiatan`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `start_date` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `end_date` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Block'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `start_date`, `end_date`, `created`, `status`) VALUES
(1, 'This is a special events about web development', '', '2024-02-12 08:00:00', '2024-02-16 14:00:00', '2024-02-10 00:00:00', 1),
(2, 'PHP Seminar 2018', '', '2018-02-11 00:00:00', '2018-02-17 00:00:00', '2018-02-10 00:00:00', 1),
(3, 'Bootstrap events 2018', '', '2018-02-4 00:00:00', '2018-02-4 00:00:00', '2018-02-01 00:00:00', 1),
(4, 'Developers events', '', '2018-02-04 00:00:00', '2018-02-04 00:00:00', '2018-02-01 00:00:00', 1),
(5, 'Annual Conference 2018', '', '2018-02-05 00:00:00', '2018-02-05 00:00:00', '2018-02-01 00:00:00', 1),
(6, 'Bootstrap Annual events 2018', '', '2018-02-05 00:00:00', '2018-02-05 00:00:00', '2018-02-01 00:00:00', 1),
(7, 'HTML5 events', '', '2018-02-05 00:00:00', '2018-02-05 00:00:00', '2018-02-01 00:00:00', 1),
(8, 'PHP conference events 2018', '', '2018-02-08 00:00:00', '2018-02-08 00:00:00', '2018-02-02 00:00:00', 1),
(9, 'Web World events', '', '2018-02-08 00:00:00', '2018-02-08 00:00:00', '2018-02-01 00:00:00', 1),
(10, 'Wave PHP 2018', '', '2018-02-08 00:00:00', '2018-02-08 00:00:00', '2018-02-02 00:00:00', 1),
(11, 'Dev PHP 2018', '', '2018-02-08 00:00:00', '2018-02-08 00:00:00', '2018-02-01 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
