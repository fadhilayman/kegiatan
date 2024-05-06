-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Bulan Mei 2024 pada 08.47
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

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
-- Struktur dari tabel `administrators`
--

CREATE TABLE `administrators` (
  `role` int(1) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `administrators`
--

INSERT INTO `administrators` (`role`, `username`, `password`) VALUES
(1, 'admin', '12345678'),
(2, 'user', '12345678');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id` int(11) NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `ruangan` varchar(50) NOT NULL,
  `mulai` timestamp NULL DEFAULT NULL,
  `selesai` timestamp NULL DEFAULT NULL,
  `keterangan` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id`, `kegiatan`, `ruangan`, `mulai`, `selesai`, `keterangan`) VALUES
(1, 'Rapat Orang Tua', 'Ruang rapat', '2023-12-08 02:45:00', '2023-12-08 08:45:00', '-'),
(2, 'Workshop GTK', 'Ruang Rapat', '2023-12-05 02:47:00', '2023-12-07 08:47:00', '-'),
(3, 'Rapat Koordinasi', 'Ruang Rapat', '2023-12-06 02:00:00', '2023-12-06 04:00:00', '-'),
(4, 'Rapat Koordinasi', 'Ruang Rapat', '2023-12-08 06:00:00', '2023-12-08 07:00:00', '-'),
(5, 'PFM Tingkat 11 2024', 'Gd. Mesin', '2024-04-22 00:00:00', '2024-04-26 08:00:00', '-'),
(6, 'Uji Kompetensi', 'Lab RPL', '2024-04-15 00:30:00', '2024-04-18 08:30:00', '-'),
(7, 'Rapat', 'Ruang Rapat', '2024-04-22 03:00:00', '2024-04-22 05:00:00', '-'),
(8, 'RAPAT', 'E1 ', '2024-05-07 06:39:00', '2024-05-07 10:39:00', 'Rapat Eskul'),
(9, 'Kegiatan', 'Lapang', '2024-05-09 02:24:00', '2024-05-20 00:41:00', 'Pfm');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(18) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `role`) VALUES
('1', 'kepsek2cmi', '$2y$10$la03zJ7ned6yDf9q6radFu7F8vaYcXaDMgNEop4MO0CxeY8f1BzDW', 4),
('198111032008011005', '198111032008011005', '$2y$10$o9aXx4NjGEi3.JSRGPmr9eFYKw3ujvQiPHWm8aSMssfzYJgv3htNG', 2),
('198111032008011006', '198111032008011006', '$2y$10$xjCJNZnu03DD1Id8.j3Gw.zyZFcv.fI2fJlGgx0PVfmo5ldC3AD1e', 2),
('198111032008011007', '198111032008011007', '$2y$10$73juMyw0o9dnU7g5Ks5Bl.ag1APRMR23T1BxkdFT0ZQMhxBc1z7QK', 2),
('2', 'admin', '12345678', 1),
('A10001', 'xanimasia', '$2y$10$HxXBSIkT.2hLP69zGpYnnuwfHh08npB6YRssSVFy56CC0osZOtSri', 3),
('A10002', 'xanimasib', '$2y$10$wCbEbTjx2WxibkkbG2mSbeBCFNb8VbyB6g.Q3gEz9AF1O8IE2H03e', 3),
('A20001', 'xianimasia', '$2y$10$ylQGNVM6Zdh2/umXnrQIZen08Y4DW0axUCdmk7lFu9Yv3eStBSg5u', 3),
('A20002', 'xianimasib', '$2y$10$WxCAhLTQmH.bzPkcAfDQ.uZS3cFL3H2qlZ49oZWwPzW2mrl4qkqQm', 3),
('D10001', 'xdkva', '$2y$10$EPe74oitZSqGkLcdv06lfeU0swg0QHa5g3lOTgbYE1l2rKTx/8Mpq', 3),
('D10002', 'xdkvb', '$2y$10$tMPNqbikiC9JEULGJKJKZuAWD69LKduVWaD52mZvTXbmII9Jz8ecy', 3),
('D10003', 'xdkvc', '$2y$10$fGD5wAHdMK9cyWVqbQrSfeCeVNRHxOH7TKD51GXnV4wBlFKups1Na', 3),
('D20001', 'xidkva', '$2y$10$EKb.yY1tSC83UNVHomtXI.AqJTLjIJllHi27Kn.uIOf.eOgIrFYLy', 3),
('D20002', 'xidkvb', '$2y$10$fv5PXJUJTXjcnkf/so.ccesKnZ9WIqAIC5.39bLiWPQm5dvWozY.e', 3),
('D20003', 'xidkvc', '$2y$10$v/6nCH24Zz.WuWwWTenwO.1oyRXv4Ik1T.L/yum0DDceWeE12D.Aq', 3),
('E10001', 'xelektronikaa', '$2y$10$m/TUydi7jA1.EJAts1.b6OMYZYU6laXec2FfsZbQwmQM0I9NQDIii', 3),
('E10002', 'xelektronikab', '$2y$10$VXWkrjNCAFy2oYkpD5wL6eLBpSRpY6Myv7H6cGCxZt1Ek.yg72cSO', 3),
('E10003', 'xelektronikac', '$2y$10$KPbhOzlvA6fMQhVYgmDnyuGbLohACrSSMUxLwnRXKfkAdelJ83x76', 3),
('E10004', 'xelektronikad', '$2y$10$Ubmnf38KFtM6KbtMk9mur.U.x6UumrjivWRGhjwRB8RMkzkN/5GXS', 3),
('E20001', 'xielektronikaa', '$2y$10$Zekn8uORjhcNoHznn2qxyuMB.kcyWElVqE3XwDbQcNTXlcabaLij6', 3),
('E20002', 'xielektronikab', '$2y$10$hv63Y4GlYQ4y3zhKHuVqiefQrB2Xn1b9KpCMgcbhUNRYdd2P2.Ceu', 3),
('E20003', 'xielektronikac', '$2y$10$jm4UMEqWXXWvgosk2IJWYOwtaY/FCVkDON7z3ifxRgbJOy8DPN4vG', 3),
('E20004', 'xielektronikad', '$2y$10$jbk8fh/3O0xZIJVnJhC41OF5UMGiAPvt.NIvFmf5slFH0GhhpKoJa', 3),
('K10001', 'xkimiaa', '$2y$10$vb0jnDGaFHqjiPYph2vhxujaCHsYX9li5Xhahlmp/SJnvNUN695DK', 3),
('K10002', 'xkimiab', '$2y$10$1QFf6MxEkV0LLICmt8jfBeLh5YyZ2M5HplDLw61gCIMwyMSrS17..', 3),
('K10003', 'xkimiac', '$2y$10$qFzOYCdUedJCEKNu0mvj0.Wn7.YLrJqOijAbtZoiVnYNW6dKAGGfe', 3),
('K20001', 'xikimiaa', '$2y$10$MXHy2LahbtaB9xF3cACboOzzYgFd8SCOcZH4BCfc8o1P..Fm0s7Q2', 3),
('K20002', 'xikimiab', '$2y$10$A7wCQqHOFdhTxHIozjMLPeC8MZaI24FtAJPgduPaQLLpW71xOs81.', 3),
('K20003', 'xikimiac', '$2y$10$2OiK4RFF31NzVrk9DS3DfeLg8FiMgpVCISIF7OjCdDwYV.5S2d5x2', 3),
('P10001', 'xpplga', '$2y$10$9SITSqMtG9xwCltLVcUAfuLy0Bak1xEDVHpx1J8r60yEyeZ8yKjUq', 3),
('P10002', 'xpplgb', '$2y$10$klK1cO4dJ/bdQvz5SHgpQOGraz1MmEtJ8mCZMrbffj9HYHiPrKz1i', 3),
('P20001', 'xipplga', '$2y$10$UcV6EamW0yDQHapKaAbLh.AMh3MDIXTmPaHycknC0kzA2nZVYZd7S', 3),
('P20002', 'xipplgb', '$2y$10$yzVAc0L.r4BuYIStjVAD8u8RL1c4rXUeNzt9c9aHiOf5cOtwpt61G', 3),
('T10001', 'xpemesinana', '$2y$10$Ddlnw4zE5zNNWJxGtnhlouJluinL0LR9KWoKoMtWO21lgXEd8I0ku', 3),
('T10002', 'xpemesinanb', '$2y$10$JL9e9sgeDbsj9u6hwHFr..E866dwm.7qcja7IJ/pwM0V2YIEB/GHu', 3),
('T20001', 'xipemesinana', '$2y$10$jgQVWNrNgov8WTz1erWxGOMgMVW8z8krGUdbuj2JFYmWVaonb98pC', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`role`);

--
-- Indeks untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
