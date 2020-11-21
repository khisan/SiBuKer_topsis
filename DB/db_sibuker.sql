-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2020 at 04:22 AM
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
(1, 'Administrator', 'coba', 'coba');

-- --------------------------------------------------------

--
-- Table structure for table `tb_alumni`
--

CREATE TABLE `tb_alumni` (
  `id_alumni` int(11) NOT NULL,
  `nim` varchar(8) NOT NULL,
  `password` char(60) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `umur` varchar(50) NOT NULL,
  `foto` text NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `kualifikasi_pendidikan` varchar(50) NOT NULL,
  `ipk` varchar(50) NOT NULL,
  `pengalaman_kerja` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_alumni`
--

INSERT INTO `tb_alumni` (`id_alumni`, `nim`, `password`, `nama`, `jenis_kelamin`, `umur`, `foto`, `jurusan`, `kualifikasi_pendidikan`, `ipk`, `pengalaman_kerja`, `created_at`, `updated_at`) VALUES
(63, '1718006', 'coba', 'Khisan Ihza Wahyu Rifaldi', 'Laki-laki', '<= 25 Tahun', '1605791279_1ee746f7c4f4e4d48b0e.jpg', 'Teknik Informatika', 'S1', '> 3.00', '> 1 Tahun', '2020-11-19 06:53:37', '2020-11-19 06:53:37');

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
(6, 'C5', 'Pengalaman Kerja', 'cost'),
(8, 'C4', 'Jenis Kelamin', 'benefit'),
(9, 'C6', 'Jurusan', 'benefit');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lowongan`
--

CREATE TABLE `tb_lowongan` (
  `id_lowongan` int(11) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `nama_lowongan` varchar(100) NOT NULL,
  `umur` varchar(50) NOT NULL,
  `kualifikasi_pendidikan` varchar(50) NOT NULL,
  `ipk` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `pengalaman_kerja` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `deskripsi_lowongan` text NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_lowongan`
--

INSERT INTO `tb_lowongan` (`id_lowongan`, `nama_perusahaan`, `nama_lowongan`, `umur`, `kualifikasi_pendidikan`, `ipk`, `jenis_kelamin`, `pengalaman_kerja`, `jurusan`, `deskripsi_lowongan`, `gambar`) VALUES
(3, 'PT. Tirta Freshindo Jaya Plant 2', 'Analyst', '<= 30 Tahun', 'SMA/SMK', '-', '-', '-', 'Teknik Kimia', '<p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left:3.05pt;mso-add-space:\r\nauto;text-align:justify;text-indent:-6.35pt;mso-list:l0 level1 lfo1\"><span style=\"font-size:12.0pt;line-height:107%;font-family:\"Times New Roman\",serif\">- Usia\r\nmaks 30 Tahun<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpLast\" style=\"margin-left:3.05pt;mso-add-space:auto;\r\ntext-align:justify;text-indent:-6.35pt;mso-list:l0 level1 lfo1\"><span style=\"font-size:12.0pt;line-height:107%;font-family:\"Times New Roman\",serif\">- Pendidikan\r\nmin.SMK Teknik Kimia, Kimia Analis, Kimia Industri</span></p><p class=\"MsoListParagraphCxSpLast\" style=\"margin-left:3.05pt;mso-add-space:auto;\r\ntext-align:justify;text-indent:-6.35pt;mso-list:l0 level1 lfo1\"><span style=\"font-size:12.0pt;line-height:107%;font-family:\"Times New Roman\",serif\">- </span><span style=\"font-family: \"Times New Roman\", serif; font-size: 12pt; text-align: left;\">Bersedia bekerja\r\nsistem 3 shift</span></p>', '1605690216_dd5c0e66f276acd98594.jpg');

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

--
-- Dumping data for table `tb_sub_kriteria_alumni`
--

INSERT INTO `tb_sub_kriteria_alumni` (`id_sub_kriteria_alumni`, `kode`, `sub_kriteria`, `bobot`, `cost_benefit`) VALUES
(4, 'C1', '<= 25 Tahun', 1, 'cost'),
(5, 'C2', '-', 1, 'benefit'),
(6, 'C1', '<= 30 Tahun', 2, 'cost'),
(7, 'C2', 'D4', 4, 'benefit'),
(8, 'C1', '<= 35 Tahun', 3, 'cost'),
(9, 'C2', '-', 5, 'cost'),
(10, 'C2', 'S1', 5, 'benefit'),
(11, 'C2', 'D3', 3, 'benefit'),
(12, 'C2', 'SMA/SMK', 2, 'benefit'),
(13, 'C3', '< 2.00', 3, 'cost'),
(14, 'C3', '2.00 - 3.00', 2, 'cost'),
(15, 'C3', '> 3.00', 1, 'cost'),
(16, 'C3', '-', 4, 'cost'),
(17, 'C4', '-', 1, 'benefit'),
(18, 'C4', 'Laki-laki', 4, 'benefit'),
(19, 'C4', 'Perempuan', 4, 'benefit'),
(20, 'C5', '-', 4, 'cost'),
(21, 'C5', '> 1 Tahun', 3, 'cost'),
(22, 'C5', '2 - 3 Tahun', 2, 'cost'),
(23, 'C5', '>  3 Tahun', 1, 'cost'),
(24, 'C6', '-', 1, 'benefit'),
(25, 'C6', 'Teknik Informatika', 3, 'benefit'),
(26, 'C6', 'Teknik Industri', 3, 'benefit'),
(27, 'C6', 'Teknik Mesin', 3, 'benefit'),
(28, 'C6', 'Teknik Elektro', 3, 'benefit'),
(29, 'C6', 'Teknik Kimia', 3, 'benefit'),
(30, 'C6', 'Teknik Sipil', 3, 'benefit'),
(31, 'C6', 'Arsitektur', 3, 'benefit'),
(32, 'C6', 'Perencanan Wilayah dan Kota', 3, 'benefit'),
(33, 'C6', 'Teknik Geodesi', 3, 'benefit'),
(34, 'C6', 'Teknik Lingkungan', 3, 'benefit'),
(35, 'C1', '<= 40 Tahun', 4, 'cost'),
(37, 'C1', '-', 5, 'cost');

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
(4, 'C1', '<= 25 Tahun', 1, 'cost'),
(5, 'C2', '-', 1, 'benefit'),
(6, 'C1', '<= 30 Tahun', 2, 'cost'),
(7, 'C2', 'D4', 4, 'benefit'),
(8, 'C1', '<= 35 Tahun', 3, 'cost'),
(9, 'C1', '-', 5, 'cost'),
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
(25, 'C6', 'Teknik Informatika', 2, 'benefit'),
(26, 'C6', 'Teknik Industri', 2, 'benefit'),
(27, 'C6', 'Teknik Mesin', 2, 'benefit'),
(28, 'C6', 'Teknik Elektro', 2, 'benefit'),
(29, 'C6', 'Teknik Kimia', 2, 'benefit'),
(30, 'C6', 'Teknik Sipil', 2, 'benefit'),
(31, 'C6', 'Arsitektur', 2, 'benefit'),
(32, 'C6', 'Perencanan Wilayah dan Kota', 2, 'benefit'),
(33, 'C6', 'Teknik Geodesi', 2, 'benefit'),
(34, 'C6', 'Teknik Lingkungan', 2, 'benefit'),
(35, 'C1', '<= 40 Tahun', 4, 'cost');

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
  MODIFY `id_alumni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tb_kriteria_lowongan`
--
ALTER TABLE `tb_kriteria_lowongan`
  MODIFY `id_kriteria_lowongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_lowongan`
--
ALTER TABLE `tb_lowongan`
  MODIFY `id_lowongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_sub_kriteria_alumni`
--
ALTER TABLE `tb_sub_kriteria_alumni`
  MODIFY `id_sub_kriteria_alumni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tb_sub_kriteria_lowongan`
--
ALTER TABLE `tb_sub_kriteria_lowongan`
  MODIFY `id_sub_kriteria_lowongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
