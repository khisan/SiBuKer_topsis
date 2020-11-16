-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2020 at 09:17 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sibuker`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'coba', 'coba', '$2y$12$DyKQOIecPFZCJqexvbRKe.GzNgUGRG2pDcoSHPHlB18f9ObCVgGiq');

-- --------------------------------------------------------

--
-- Table structure for table `tb_alumni`
--

CREATE TABLE `tb_alumni` (
  `id_alumni` int(11) NOT NULL,
  `nim` varchar(8) NOT NULL,
  `password` char(60) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `umur` int(11) NOT NULL,
  `foto` text NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `kualifikasi_pendidikan` varchar(2) NOT NULL,
  `ipk` float NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `jurusan`) VALUES
(1, 'Teknik Informatika'),
(5, 'Teknik Industri'),
(6, 'Teknik Elektro'),
(7, 'Teknik Mesin'),
(8, 'Teknik Kimia'),
(9, 'Teknik Sipil'),
(10, 'Arsitektur'),
(11, 'PWK'),
(12, 'Teknik Geodesi'),
(13, 'Teknik Lingkungan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria_lowongan`
--

CREATE TABLE `tb_kriteria_lowongan` (
  `id_kriteria_lowongan` int(11) NOT NULL,
  `kode` char(2) NOT NULL,
  `kriteria` varchar(50) NOT NULL,
  `cost_benefit` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kriteria_lowongan`
--

INSERT INTO `tb_kriteria_lowongan` (`id_kriteria_lowongan`, `kode`, `kriteria`, `cost_benefit`) VALUES
(2, 'C1', 'Umur', 'cost'),
(3, 'C2', 'Kualifikasi Pendidikan', 'benefit'),
(4, 'C3', 'IPK', 'cost'),
(5, 'C4', 'Jenis Kelamin', 'benefit'),
(6, 'C5', 'Pengalaman Kerja', 'cost'),
(7, 'C6', 'Jurusan', 'benefit');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sub_kriteria_lowongan`
--

CREATE TABLE `tb_sub_kriteria_lowongan` (
  `id_sub_kriteria_lowongan` int(11) NOT NULL,
  `kode` char(2) NOT NULL,
  `sub_kriteria` varchar(50) NOT NULL,
  `bobot` int(1) NOT NULL,
  `cost_benefit` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sub_kriteria_lowongan`
--

INSERT INTO `tb_sub_kriteria_lowongan` (`id_sub_kriteria_lowongan`, `kode`, `sub_kriteria`, `bobot`, `cost_benefit`) VALUES
(3, 'C2', '< 25 Tahun cuyd', 5, 'benefit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_alumni`
--
ALTER TABLE `tb_alumni`
  ADD PRIMARY KEY (`id_alumni`);

--
-- Indexes for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tb_kriteria_lowongan`
--
ALTER TABLE `tb_kriteria_lowongan`
  ADD PRIMARY KEY (`id_kriteria_lowongan`);

--
-- Indexes for table `tb_sub_kriteria_lowongan`
--
ALTER TABLE `tb_sub_kriteria_lowongan`
  ADD PRIMARY KEY (`id_sub_kriteria_lowongan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_alumni`
--
ALTER TABLE `tb_alumni`
  MODIFY `id_alumni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_kriteria_lowongan`
--
ALTER TABLE `tb_kriteria_lowongan`
  MODIFY `id_kriteria_lowongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_sub_kriteria_lowongan`
--
ALTER TABLE `tb_sub_kriteria_lowongan`
  MODIFY `id_sub_kriteria_lowongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
