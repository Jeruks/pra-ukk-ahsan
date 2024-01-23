-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2024 at 10:11 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id_album` int(11) NOT NULL,
  `nama_album` varchar(25) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_dibuat` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id_album`, `nama_album`, `deskripsi`, `tgl_dibuat`, `id_user`) VALUES
(1, 'Keluarga', 'Keluarga Saya', '2024-01-22', 12),
(3, 'Alam', 'Muncak bersama teman-teman', '2024-01-22', 12),
(4, 'Gandoss', 'mantapp', '2024-01-23', 19),
(5, 'Sekolah Kono Kae', 'Kenangan to boss', '2024-01-23', 19),
(6, 'hanggeh', 'hajshakshaks', '2024-01-23', 19),
(7, 'aodihawodh', 'aoidhaoidhaw', '2024-01-23', 19),
(8, 'punya kita', 'awokaowk', '2024-01-23', 19);

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL,
  `judul_foto` varchar(255) NOT NULL,
  `deskripsi_foto` text NOT NULL,
  `tgl_unggah` date NOT NULL,
  `lokasi_file` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_album` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id_foto`, `judul_foto`, `deskripsi_foto`, `tgl_unggah`, `lokasi_file`, `id_user`, `id_album`) VALUES
(12, 'logo  smk', 'Bisa digunakan untuk pembuatan surat, proposal, dsb.', '2024-01-23', 'LOGO.png', 12, 0),
(13, 'FotoAesthetic', 'Keren buat pamer', '2024-01-23', 'bad7b215e04d260f231d5195b7a3f50b.jpg', 12, 0),
(15, 'buku', 'smkkkkkk', '2024-01-23', 'main-qimg-354a79b913b8c5f877ab52fc96efddbe-lq.jpg', 12, 0),
(16, 'kartun keren', 'keren lah pokoknya', '2024-01-23', 'd3e9b0d3e15cf9acec813dc7d26d39bd.jpg', 12, 0),
(17, 'gajal', 'hyo gajal', '2024-01-23', 'anak-stm-6221f6c0e2d60e198475ecc4.jpg', 19, 5),
(18, 'logo smk', 'gandy', '2024-01-23', 'LOGO.png', 19, 8);

-- --------------------------------------------------------

--
-- Table structure for table `komentar_foto`
--

CREATE TABLE `komentar_foto` (
  `id_komentar` int(11) NOT NULL,
  `id_foto` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `isi_komentar` text NOT NULL,
  `tgl_komentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komentar_foto`
--

INSERT INTO `komentar_foto` (`id_komentar`, `id_foto`, `id_user`, `isi_komentar`, `tgl_komentar`) VALUES
(4, 12, 19, 'mantapp', '2024-01-23'),
(5, 12, 19, 'gg', '2024-01-23'),
(9, 16, 19, 'wedeeehhhhhhh', '2024-01-23'),
(14, 13, 19, 'awokawok', '2024-01-23'),
(15, 13, 19, 'awokawok', '2024-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `like_foto`
--

CREATE TABLE `like_foto` (
  `id_like` int(11) NOT NULL,
  `id_foto` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_like` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `like_foto`
--

INSERT INTO `like_foto` (`id_like`, `id_foto`, `id_user`, `tgl_like`) VALUES
(1, 12, 19, '2024-01-23'),
(2, 15, 19, '2024-01-23'),
(3, 13, 19, '2024-01-23'),
(4, 13, 14, '2024-01-23'),
(5, 15, 14, '2024-01-23'),
(6, 16, 14, '2024-01-23'),
(7, 12, 14, '2024-01-23'),
(8, 12, 12, '2024-01-23'),
(9, 16, 19, '2024-01-23'),
(10, 18, 19, '2024-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `nama_lengkap`, `alamat`) VALUES
(5, 'ahmad', '$2y$10$d6ISK4QmGblWbBphR7k/HO0PBwClxTl2LsVaT9d/6oLiO.5gqcGCO', 'ahmadirwan@gmail.com', 'Ahmad Irwansyah', 'Sipagrak, Mangunrejo, Kajoran'),
(12, 'jeruk', '$2y$10$K4RFD8DCM5iV0hG7VINTp.gjzLIOf3lbz7Y4rFNu/qt5ETv315ksm', '', '', ''),
(14, 'gavinn', '$2y$10$TA0CNbmvkKOGhvxpiq.ADedajb5.OSS5OBOxNmbo9pfTZ9YKaX5YW', '', '', ''),
(15, 'zuma', '$2y$10$JrCUg3a.Tm6uUe.PLEoSge0kGn3zH03GaJVFbhOoyJ1F7HAluCuvu', '', '', ''),
(16, 'zuma', '$2y$10$TNsH2fcGWNPRcEVJzNgsp.Ri42AcKuJlujOOxzGib8mR3VPf9HfMO', '', '', ''),
(17, 'nopal', '$2y$10$Ze2LQI9ZwdioTdAppr1vfuHbGK7Ddanblau.ls45mBVAqj66rFg6K', '', '', ''),
(18, 'sigit', '$2y$10$Muu1aJiy8dLJgpgun3LlnO5uQWUa790HzGUJPFnR4kNzeWb1taAAC', '', '', ''),
(19, 'nopal', '$2y$10$TEPcYlbOfnSIcXQ.ZmZcYuyf2nXY0kCus8adnzLH2IhGxUwQg7ByW', 'noval@gmail.com', 'Noval Hariyanto', 'kaliangkrik'),
(20, 'taufan', '$2y$10$DIkX68kNJgimUq5Tjvj6RulNbZf0zeVW0ixw0zuPr91VE4jY1.VLe', '', '', ''),
(21, 'nopal', '$2y$10$.sq98v9qmB76o6A.yR2Zoe/lzo6x2y8Vymdi0iqnvU0WPq58Wlx7u', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `komentar_foto`
--
ALTER TABLE `komentar_foto`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `like_foto`
--
ALTER TABLE `like_foto`
  ADD PRIMARY KEY (`id_like`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `komentar_foto`
--
ALTER TABLE `komentar_foto`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `like_foto`
--
ALTER TABLE `like_foto`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
