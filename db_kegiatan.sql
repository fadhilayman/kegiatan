-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2024 at 06:33 AM
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
-- Database: `db_kegiatan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id` int(11) NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `ruangan` varchar(50) NOT NULL,
  `mulai` timestamp NULL DEFAULT NULL,
  `selesai` timestamp NULL DEFAULT NULL,
  `keterangan` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id`, `kegiatan`, `ruangan`, `mulai`, `selesai`, `keterangan`) VALUES
(1, 'Rapat Orang Tua', 'Ruang rapat', '2023-12-08 02:45:00', '2023-12-08 08:45:00', '-'),
(2, 'Workshop GTK', 'Ruang Rapat', '2023-12-05 02:47:00', '2023-12-07 08:47:00', '-'),
(3, 'Rapat Koordinasi', 'Ruang Rapat', '2023-12-06 02:00:00', '2023-12-06 04:00:00', '-'),
(4, 'Rapat Koordinasi', 'Ruang Rapat', '2023-12-08 06:00:00', '2023-12-08 07:00:00', '-'),
(5, 'PFM Tingkat 11 2024', 'Gd. Mesin', '2024-04-22 00:00:00', '2024-04-26 08:00:00', '-'),
(6, 'Uji Kompetensi', 'Lab RPL', '2024-04-15 00:30:00', '2024-04-18 08:30:00', '-'),
(7, 'Rapat', 'Ruang Rapat', '2024-04-22 03:00:00', '2024-04-22 05:00:00', '-');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
