-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2020 at 01:44 AM
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
(1, 'Administrator', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_alumni`
--

CREATE TABLE `tb_alumni` (
  `id_alumni` int(11) NOT NULL,
  `nim` varchar(8) NOT NULL,
  `password` char(60) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` int(11) NOT NULL,
  `umur` int(11) NOT NULL,
  `foto` text NOT NULL,
  `jurusan` int(11) NOT NULL,
  `kualifikasi_pendidikan` int(11) NOT NULL,
  `ipk` int(11) NOT NULL,
  `pengalaman_kerja` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_alumni`
--

INSERT INTO `tb_alumni` (`id_alumni`, `nim`, `password`, `nama`, `jenis_kelamin`, `umur`, `foto`, `jurusan`, `kualifikasi_pendidikan`, `ipk`, `pengalaman_kerja`, `created_at`, `updated_at`) VALUES
(63, '1718006', 'coba', 'Khisan Ihza Wahyu Rifaldi', 2, 5, '1605791279_1ee746f7c4f4e4d48b0e.jpg', 2, 5, 4, 3, '2020-11-19 06:53:37', '2020-11-19 06:53:37');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kode` char(2) NOT NULL,
  `kriteria` varchar(50) NOT NULL,
  `cost_benefit` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`id_kriteria`, `kode`, `kriteria`, `cost_benefit`) VALUES
(2, 'C1', 'Umur', 'cost'),
(3, 'C2', 'Kualifikasi Pendidikan', 'benefit'),
(4, 'C3', 'IPK', 'benefit'),
(6, 'C4', 'Pengalaman Kerja', 'benefit');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lowongan`
--

CREATE TABLE `tb_lowongan` (
  `id_lowongan` int(11) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `nama_lowongan` varchar(100) NOT NULL,
  `umur` int(11) NOT NULL,
  `kualifikasi_pendidikan` int(11) NOT NULL,
  `ipk` int(11) NOT NULL,
  `pengalaman_kerja` int(11) NOT NULL,
  `deskripsi_lowongan` text NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_lowongan`
--

INSERT INTO `tb_lowongan` (`id_lowongan`, `nama_perusahaan`, `nama_lowongan`, `umur`, `kualifikasi_pendidikan`, `ipk`, `pengalaman_kerja`, `deskripsi_lowongan`, `gambar`) VALUES
(3, 'PT. Tirta Freshindo Jaya Plant 2', 'Analyst', 3, 2, 1, 1, '<p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left: 3.05pt;\"><span style=\"line-height: 107%;\" times=\"\" new=\"\" roman\",serif\"=\"\">- Usia\r\nmaks 30 Tahun<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpLast\" style=\"margin-left: 3.05pt;\"><span style=\"line-height: 107%;\" times=\"\" new=\"\" roman\",serif\"=\"\">- Pendidikan\r\nmin.SMK Teknik Kimia, Kimia Analis, Kimia Industri</span></p><p class=\"MsoListParagraphCxSpLast\" style=\"margin-left: 3.05pt;\"><span style=\"line-height: 107%;\" times=\"\" new=\"\" roman\",serif\"=\"\">- </span><span style=\"font-family: \" times=\"\" new=\"\" roman\",=\"\" serif;=\"\" font-size:=\"\" 12pt;=\"\" text-align:=\"\" left;\"=\"\">Bersedia bekerja\r\nsistem 3 </span></p>', '1605690216_dd5c0e66f276acd98594.jpg'),
(4, 'PT. Tirta Freshindo Jaya Plant 2', 'Staff Continous Improvement', 2, 3, 0, 4, '<p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-&nbsp;</span><span style=\"line-height: 107%;\">Usia\r\nMaks 30 Tahun<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpLast\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-&nbsp;</span><span style=\"line-height: 107%;\">Pendidikan\r\nD3/S1 Teknik Mesin, Teknik Elektro<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left: 3.05pt;\">\r\n\r\n\r\n\r\n<span style=\"line-height: 107%;\">- Memiliki pemahaman\r\nmengenai GMP dan 5R</span><br></p>', '1607061887_f9a3c8ac0750c9bab35f.jpg'),
(5, 'PT. Tirta Freshindo Jaya Plant 2', 'Operator Water Waste Treatment Plant', 2, 2, 4, 4, '<p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Usia\r\nmaks 30 tahun<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpLast\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Pendidikan\r\nmin.SMK Teknik Kimia, Kimia Industri, Teknik Lingkungan<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n<span style=\"line-height: 107%;\">-&nbsp; &nbsp;Bersedia bekerja sistem\r\n3 shift</span><br></p>', '1607062318_7731324578b0ce1c8cf6.jpg'),
(6, 'PT. Rajawali Nusantara Indonesia', 'Management Trainee Program', 2, 5, 1, 2, '<p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">S1\r\nAkuntansi, Ekonomi, Manajemen, Psikologi, Hukum,\r\nArgonomi/Agroteknologi/Proteksi Tanaman, Teknik Kimia<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">IPK\r\nminimal (skala 4) : <o:p></o:p></span></p><ul><li style=\"margin-left: 22pt;\"><span style=\"line-height: 107%;\"><span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp;&nbsp;</span></span><span style=\"line-height: 107%;\">PTN : min 3.00</span></li><li style=\"margin-left: 22pt;\"><span style=\"line-height: 107%;\"><span style=\"font-size: 14px;\">&nbsp; </span>PTS : min 3.25</span></li></ul><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Usia\r\nmaksimal 28 tahun (per 26 Oktober 2020)<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Belum\r\nmenikah dan bersedia tidak menikah selama menjalani masa Management Trainee\r\nProgram (MTP)<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoListParagraphCxSpLast\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Bersedia\r\nditempatkan di seluruh wilayah kerja PT RNI (Persero)<font face=\"Times New Roman, serif\"><span style=\"font-size: 12pt;\"><o:p></o:p></span></font></span></p>', '1607062511_a60046fe5a7fc462d211.jpg'),
(7, 'PT. Karisma Persada', 'Business Development Engineer', 5, 3, 0, 4, '<p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Laki-laki<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Pendidikan\r\nminimal D3/S1 Teknik Elektro/Sipil/Arsitektur.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Memahami\r\nbisnis proses pembangunan &amp; renovasi rumah tinggi, UKM dan retail, bulding\r\nfacility dan utilitas industry<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoListParagraphCxSpLast\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Mampu\r\ndan memahami/membaca gambar teknik dari Autocad, Sketchup</span></p><p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Memahami\r\nbahan baku proyek untuk perumahan, UKM dan retail serta industry<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpLast\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Memiliki\r\njaringan dan potensi bisnis untuk segmen perumahan dan UKM serta industrial\r\nskala menengah<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpLast\" style=\"margin-left: 3.05pt;\">\r\n\r\n\r\n\r\n<span style=\"line-height: 107%;\">-&nbsp; Domisili kerja di\r\nkota Malang, serta bersedia ditugaskan ke Bekasi, Jawa Barat secara temporer</span><br></p>', '1607062764_560b9bae1524e8f21dac.jpg'),
(9, 'PT. Karisma Persada', 'Drafter & Estimator MEP', 1, 3, 4, 3, '<p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Laki-laki<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Pendidikan\r\nminimal D3 Jurusan Teknik Elektro.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Mampu\r\nmenggambar teknik &amp; menggunakan AutoCad<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Mampu\r\nmenyusun RAB dan RAPP dengan tepat, cepat dan akurat<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Pengalaman\r\nbekerja di perusahaan kontruktor bidang MEP sebagai Drafter/Estimasi min.1\r\nTahun<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Mampu\r\nberkoordinasi dengan sub kontraktor &amp; tenaga lapangan<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpLast\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Memiliki\r\npengetahuan tentang material proyek &amp; bahan baku<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<span style=\"line-height: 107%;\">-&nbsp; &nbsp;Diutamakan tidak\r\nmerokok</span><br></p>', '1607330185_587eeb278b178132422d.jpg'),
(10, 'PT. Tatal Metal Lestari', 'PT. Tatal Metal Lestari', 1, 5, 4, 4, '<p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Laki-laki<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Lulusan\r\nTeknik Kimia (*Kimia Fisik, Stereokimia, Thermodinamika kimia, Spektroskopi\r\nkimia*)<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Lulusan\r\nTeknik Metalurgi (*Engineer)<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Fresh\r\nGraduate<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Tidak\r\ntakut ketinggian<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Mampu presentasi dengan baik</span><span style=\"line-height: 107%;\"><o:p></o:p></span></p><p class=\"MsoListParagraphCxSpLast\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Dapat bekerja di bawah tekanan</span><span style=\"line-height: 107%;\"><o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<span style=\"line-height: 107%;\">-&nbsp; &nbsp;Bersedia di tempatkan di Cikarang</span><br></p>', 'default.png'),
(11, 'PT. Wings Group', 'Supervisor Produksi (EP-PRD)', 4, 5, 4, 2, '<p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">S1\r\nTeknik Mesin/Teknik Kimia<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Laki-laki,\r\nusia max 35 Tahun, Sehat jasmani dan rohani<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Memiliki\r\npengalaman min 3 tahun di bagian operating DCS/PLC<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoListParagraphCxSpLast\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Familiar\r\ndi bidang Biodiesel and Distillation process</span></p><p class=\"MsoListParagraph\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Memiliki\r\nBasic Engineering &amp; Chemical process yang baik<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpLast\" style=\"margin-left: 3.05pt;\">\r\n\r\n<span style=\"line-height: 107%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">-&nbsp; Menguasai program AutoCad and Design</span><br></p>', '1607336197_78d0769988582160618a.jpg'),
(12, 'PT. Wings Group', 'Supervisor Produksi (DR-PRD)', 4, 5, 2, 4, '<p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">S1\r\nTeknik Mesin/Teknik Elektro<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">IPK\r\nmin. 3.00<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpLast\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Laki-laki,\r\nusia max 35 Tahun, Sehat jasmani dan rohani<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n<span style=\"line-height: 107%;\">-&nbsp; Bersedia bekerja\r\nshift, memiliki ketahanan kerja yang baik</span><br></p>', '1607336295_d320192cb1c6742dd354.jpg'),
(13, 'PT. Tri Link Indonesia (PLTGU Senipah)', 'PT. Tri Link Indonesia (PLTGU Senipah) - Karyawan', 2, 1, 1, 4, '<p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Fresh\r\ngraduate atau umur maks 25 Tahun<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">IPK\r\nmin. 3.25<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Mau\r\nditempatkan di Senipah<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpLast\" style=\"margin-left: 3.05pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Teknik\r\nMesin dan Teknik Elektro<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<span style=\"line-height: 107%;\">-&nbsp; &nbsp;Laki-laki</span><br></p>', '1607336434_6eabbc60cbb7469a6f2d.jpg'),
(14, 'PT. Mitsol Teknik Indonesia', 'Electric Engineer', 3, 4, 2, 4, '<p class=\"MsoNormal\" style=\"\"><span style=\"line-height: 107%;\">Persyaratan Umum<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left: 7.85pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Pria\r\nusia maks 27 tahun<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 7.85pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Pendidikan\r\nS1 atau D4<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 7.85pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">T.Elektro\r\narus kuat/lemah<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 7.85pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">IPK\r\nmin. 3.00<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 7.85pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Memiliki\r\nkemampuan komunikasi dan analisa yang baik<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 7.85pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Dapat\r\nbekerja sama secara tim<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 7.85pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Memiliki\r\ninisiatif belajar dan kreatif<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 7.85pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Bisa\r\nbekerja lembur<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 7.85pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Menguasai\r\nBahasa inggris yang baik lisan dan tulisan<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpLast\" style=\"margin-left: 7.85pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Minim\r\nmemiliki sim C, jika ada sim A<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-left: 0.75pt;\"><span style=\"line-height: 107%;\">Persyaratan\r\nteknik :</span></p><p class=\"MsoNormal\" style=\"margin-left: 0.75pt;\"><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp;&nbsp;&nbsp;</span></span><span style=\"line-height: 107%;\">Menguasai pemrograman PLC, HMI, Servo</span></p><p class=\"MsoNormal\" style=\"margin-left: 0.75pt;\"><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp;&nbsp;&nbsp;</span></span><span style=\"line-height: 107%;\">Menguasai auto cad</span></p><p class=\"MsoNormal\" style=\"margin-left: 0.75pt;\"><span style=\"line-height: 107%;\"><span style=\"line-height: 107%;\">-&nbsp; &nbsp;Dapat membaca gambar\r\ninstalasi elektrik dan control</span><br></span></p>', '1607336720_6f70220c3face2bd0859.jpg'),
(15, 'PT Tirta Investama – Banyuwangi', 'Staff QA dan QC', 3, 1, 4, 4, '<p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left: 4.1pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Pria\r\n/ wanita<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpLast\" style=\"margin-left: 4.1pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Usia\r\nmaks. 28 thun<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n<span style=\"line-height: 107%;\">&nbsp;-&nbsp; Jurusan : teknik\r\nkimia, teknik pangan, biologi</span><br></p>', '1607336878_61ea5f6076ecd1e39c7e.jpg'),
(16, 'PT Karya Mas Makmur', 'Admin Penjualan', 3, 3, 0, 4, '<p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left: 4.1pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">D3/S1\r\nManajemen<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 4.1pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Usia\r\nmax 28 tahun<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 4.1pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Teliti,\r\njujur<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 4.1pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Memiliki\r\nktp, sim c, skck<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpLast\" style=\"margin-left: 4.1pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Menguasai\r\nMs.Office terutama rumus excel<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left: 4.1pt;\">\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<span style=\"line-height: 107%;\">-&nbsp; Bersedia ditempatkan\r\ndi Surabaya</span><br></p>', '1607337108_88a51e324b5f2baddb84.jpg'),
(17, 'PT Karya Mas Makmur', 'Admin Produksi', 3, 3, 4, 4, '<p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left: 4.1pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">D3/S1\r\nTeknik Industri, Biologi, paham ISO, HACCP, K3/5R<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 4.1pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Usia\r\nmax 28 tahun<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 4.1pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Teliti,\r\njujur<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 4.1pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Memiliki\r\nktp, sim c, skck<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpLast\" style=\"margin-left: 4.1pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Menguasai\r\nMs.Office terutama rumus excel<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<span style=\"line-height: 107%;\">-&nbsp; &nbsp;Bersedia ditempatkan\r\ndi Surabaya</span><br></p>', '1607337269_f6183b6af65f88221546.jpg'),
(18, 'PT Karya Mas Makmur', 'Staff Accounting', 3, 3, 0, 4, '<p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left: 4.1pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">D3/S1\r\nAkuntansi<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 4.1pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Menguasai\r\nSAP, MYOB, Accurate<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 4.1pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Paham\r\nperpajakan<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 4.1pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Usia\r\nmax 28 tahun<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 4.1pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Teliti,\r\njujur<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left: 4.1pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Memiliki\r\nktp, sim c, skck<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpLast\" style=\"margin-left: 4.1pt;\"><!--[if !supportLists]--><span style=\"line-height: 107%;\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal;\">&nbsp; </span></span><!--[endif]--><span style=\"line-height: 107%;\">Menguasai\r\nMs.Office terutama rumus excel</span></p><p class=\"MsoListParagraphCxSpLast\" style=\"margin-left: 4.1pt;\">-&nbsp; &nbsp;Bersedia ditempatkan\r\ndi surabaya</p>', '1607344208_9e34fa23d1b69e3c7677.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sub_kriteria_alumni`
--

CREATE TABLE `tb_sub_kriteria_alumni` (
  `id_sub_kriteria_alumni` int(11) NOT NULL,
  `kode` char(2) NOT NULL,
  `sub_kriteria` varchar(50) NOT NULL,
  `bobot` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sub_kriteria_alumni`
--

INSERT INTO `tb_sub_kriteria_alumni` (`id_sub_kriteria_alumni`, `kode`, `sub_kriteria`, `bobot`) VALUES
(6, 'C1', '<= 25 Tahun', 2),
(7, 'C2', 'D4', 4),
(8, 'C1', '26 - 30 Tahun', 3),
(10, 'C2', 'S1', 5),
(11, 'C2', 'D3', 3),
(12, 'C2', 'SMA/SMK', 2),
(13, 'C3', '< 2.00', 2),
(14, 'C3', '2.00 - 3.00', 3),
(15, 'C3', '> 3.00', 4),
(21, 'C4', '>= 3 Tahun', 4),
(22, 'C4', '2 - 3 Tahun', 3),
(23, 'C4', '<=  1 Tahun', 2),
(35, 'C1', '31 - 35 Tahun', 4),
(37, 'C1', '>= 40 Tahun', 5),
(40, 'C4', '-', 1);

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
(4, 'C1', '-', 1, 'cost'),
(5, 'C2', '-', 1, 'benefit'),
(6, 'C1', '<= 25 Tahun', 2, 'cost'),
(7, 'C2', 'D4', 4, 'benefit'),
(8, 'C1', '26 - 30 Tahun', 3, 'cost'),
(9, 'C1', '>=40 Tahun', 5, 'cost'),
(10, 'C2', 'S1', 5, 'benefit'),
(11, 'C2', 'D3', 3, 'benefit'),
(12, 'C2', 'SMA/SMK', 2, 'benefit'),
(35, 'C1', '31 - 35 Tahun', 4, 'cost'),
(36, 'C3', '-', 1, 'benefit'),
(37, 'C3', '< 2.00', 2, 'benefit'),
(38, 'C3', '2.00 - 3.00', 3, 'benefit'),
(39, 'C3', '> 3.00', 4, 'benefit'),
(40, 'C4', '-', 1, 'benefit'),
(41, 'C4', '<= 1 Tahun', 2, 'benefit'),
(42, 'C4', '2 - 3 Tahun', 3, 'benefit'),
(43, 'C4', '>=  4 Tahun', 4, 'benefit');

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
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`id_kriteria`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `tb_lowongan`
--
ALTER TABLE `tb_lowongan`
  ADD PRIMARY KEY (`id_lowongan`);

--
-- Indexes for table `tb_sub_kriteria_alumni`
--
ALTER TABLE `tb_sub_kriteria_alumni`
  ADD PRIMARY KEY (`id_sub_kriteria_alumni`),
  ADD KEY `kode` (`kode`);

--
-- Indexes for table `tb_sub_kriteria_lowongan`
--
ALTER TABLE `tb_sub_kriteria_lowongan`
  ADD PRIMARY KEY (`id_sub_kriteria_lowongan`),
  ADD KEY `kode` (`kode`);

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
-- AUTO_INCREMENT for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_lowongan`
--
ALTER TABLE `tb_lowongan`
  MODIFY `id_lowongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_sub_kriteria_alumni`
--
ALTER TABLE `tb_sub_kriteria_alumni`
  MODIFY `id_sub_kriteria_alumni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tb_sub_kriteria_lowongan`
--
ALTER TABLE `tb_sub_kriteria_lowongan`
  MODIFY `id_sub_kriteria_lowongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_sub_kriteria_alumni`
--
ALTER TABLE `tb_sub_kriteria_alumni`
  ADD CONSTRAINT `tb_sub_kriteria_alumni_ibfk_1` FOREIGN KEY (`kode`) REFERENCES `tb_kriteria` (`kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_sub_kriteria_lowongan`
--
ALTER TABLE `tb_sub_kriteria_lowongan`
  ADD CONSTRAINT `tb_sub_kriteria_lowongan_ibfk_1` FOREIGN KEY (`kode`) REFERENCES `tb_kriteria` (`kode`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
