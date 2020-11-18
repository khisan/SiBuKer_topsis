-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2020 at 06:44 AM
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
-- Table structure for table `tb_lowongan`
--

CREATE TABLE `tb_lowongan` (
  `id_lowongan` int(11) NOT NULL,
  `nama perusahaan` varchar(100) NOT NULL,
  `nama lowongan` varchar(100) NOT NULL,
  `umur` int(11) NOT NULL,
  `kualifikasi_pendidikan` int(11) NOT NULL,
  `ipk` int(11) NOT NULL,
  `jenis_kelamin` int(11) NOT NULL,
  `pengalaman_kerja` int(11) NOT NULL,
  `jurusan` int(11) NOT NULL,
  `deskripsi_lowongan` text NOT NULL,
  `gambar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sub_kriteria_alumni`
--

CREATE TABLE `tb_sub_kriteria_alumni` (
  `id_sub_kriteria_alumni` int(11) NOT NULL,
  `kode` char(2) NOT NULL,
  `sub_kriteria` varchar(50) NOT NULL,
  `bobot` int(1) NOT NULL,
  `cost_benefit` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(4, 'C1', '< 25 Tahun', 3, 'cost'),
(5, 'C2', '-', 1, 'benefit'),
(6, 'C1', '25 - 30 Tahun', 2, 'cost'),
(7, 'C2', 'D4', 4, 'benefit'),
(8, 'C1', '> 35 Tahun', 1, 'cost'),
(9, 'C1', '-', 4, 'cost'),
(10, 'C2', 'S1', 5, 'benefit'),
(11, 'C2', 'D3', 3, 'benefit'),
(12, 'C2', 'SMA/SMK', 2, 'benefit'),
(13, 'C3', '< 2.00', 3, 'cost'),
(14, 'C3', '2.00 - 3.00', 2, 'cost'),
(15, 'C3', '> 3.00', 1, 'cost'),
(16, 'C3', '-', 4, 'cost'),
(17, 'C4', '-', 1, 'benefit'),
(18, 'C4', 'Laki-laki', 2, 'benefit'),
(19, 'C4', 'Perempuan', 2, 'benefit'),
(20, 'C5', '-', 4, 'cost'),
(21, 'C5', '> 1 Tahun', 3, 'cost'),
(22, 'C5', '2 - 3 Tahun', 2, 'cost'),
(23, 'C5', '>  3 Tahun', 1, 'cost'),
(24, 'C6', '-', 1, 'benefit'),
(25, 'C2', 'Teknik Informatika', 2, 'benefit'),
(26, 'C6', 'Teknik Industri', 2, 'benefit'),
(27, 'C6', 'Teknik Mesin', 2, 'benefit'),
(28, 'C6', 'Teknik Elektro', 2, 'benefit'),
(29, 'C6', 'Teknik Kimia', 2, 'benefit'),
(30, 'C6', 'Teknik Sipil', 2, 'benefit'),
(31, 'C6', 'Arsitektur', 2, 'benefit'),
(32, 'C6', 'Perencanan Wilayah dan Kota', 2, 'benefit'),
(33, 'C6', 'Teknik Geodesi', 2, 'benefit'),
(34, 'C6', 'Teknik Lingkungan', 2, 'benefit');

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
-- Indexes for table `tb_lowongan`
--
ALTER TABLE `tb_lowongan`
  ADD PRIMARY KEY (`id_lowongan`);

--
-- Indexes for table `tb_sub_kriteria_alumni`
--
ALTER TABLE `tb_sub_kriteria_alumni`
  ADD PRIMARY KEY (`id_sub_kriteria_alumni`);

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
-- AUTO_INCREMENT for table `tb_lowongan`
--
ALTER TABLE `tb_lowongan`
  MODIFY `id_lowongan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_sub_kriteria_alumni`
--
ALTER TABLE `tb_sub_kriteria_alumni`
  MODIFY `id_sub_kriteria_alumni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_sub_kriteria_lowongan`
--
ALTER TABLE `tb_sub_kriteria_lowongan`
  MODIFY `id_sub_kriteria_lowongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
