-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2023 at 02:15 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pma_fajar`
--

-- --------------------------------------------------------

--
-- Table structure for table `gap`
--

CREATE TABLE `gap` (
  `id` int(11) NOT NULL,
  `nama_penduduk` varchar(100) NOT NULL,
  `jenis_kelamin` int(1) NOT NULL,
  `pekerjaan` decimal(10,1) NOT NULL,
  `penghasilan` decimal(10,1) NOT NULL,
  `jml_tanggungan` decimal(10,1) NOT NULL,
  `tempat_tgl` decimal(10,1) NOT NULL,
  `umur` decimal(10,1) NOT NULL,
  `sts_kawin` decimal(10,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gap`
--

INSERT INTO `gap` (`id`, `nama_penduduk`, `jenis_kelamin`, `pekerjaan`, `penghasilan`, `jml_tanggungan`, `tempat_tgl`, `umur`, `sts_kawin`) VALUES
(1, 'Indra', 1, '5.0', '5.0', '4.5', '5.0', '4.0', '3.0'),
(2, 'Kita', 1, '5.0', '4.5', '5.0', '4.0', '5.0', '5.0'),
(3, 'Berkarya', 1, '4.5', '5.0', '4.5', '4.0', '5.0', '4.0');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id` int(11) NOT NULL,
  `nama_penduduk` varchar(25) NOT NULL,
  `hasil` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id`, `nama_penduduk`, `hasil`) VALUES
(1, 'Indra', '4.40'),
(2, 'Kita', '4.77'),
(3, 'Berkarya', '4.50');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `jenis` enum('cf','sf') NOT NULL,
  `ket` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama`, `jenis`, `ket`) VALUES
(1, 'Pekerjaan', 'cf', 'pekerjaan'),
(2, 'Penghasilan', 'cf', 'penghasilan'),
(3, 'Jumlah Tanggungan', 'sf', 'jml_tanggungan'),
(4, 'Tempat Tinggal', 'sf', 'tempat_tgl'),
(5, 'Umur', 'sf', 'umur'),
(6, 'Status Pernikahan', 'cf', 'sts_kawin');

-- --------------------------------------------------------

--
-- Table structure for table `pembobotan`
--

CREATE TABLE `pembobotan` (
  `id` int(11) NOT NULL,
  `selisih` float NOT NULL,
  `bobot` float NOT NULL,
  `ket` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pembobotan`
--

INSERT INTO `pembobotan` (`id`, `selisih`, `bobot`, `ket`) VALUES
(1, 0, 5, 'Tidak Ada Selisih (kompetensi sesuai dengan yang dibutuhkan)'),
(2, 1, 4.5, 'Kompetensi individu kelebihan 1 tingkat/level'),
(3, -1, 4, 'Kompetensi individu kekurangan 1 tingkat/level'),
(4, 2, 3.5, 'Kompetensi individu kelebihan 2 tingkat/level'),
(5, -2, 3, 'Kompetensi individu kekurangan 2 tingkat/level'),
(6, 3, 2.5, 'Kompetensi individu kelebihan 3 tingkat/level'),
(7, -3, 2, 'Kompetensi individu kekurangan 3 tingkat/level'),
(8, 4, 1.5, 'Kompetensi individu kelebihan 4 tingkat/level'),
(9, -4, 1, 'Kompetensi individu kekurangan 4 tingkat/level');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `id` int(11) NOT NULL,
  `nama_penduduk` varchar(100) NOT NULL,
  `jenis_kelamin` int(1) NOT NULL,
  `pekerjaan` int(11) NOT NULL,
  `penghasilan` int(11) NOT NULL,
  `jml_tanggungan` int(11) NOT NULL,
  `tempat_tgl` int(11) NOT NULL,
  `umur` int(11) NOT NULL,
  `sts_kawin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`id`, `nama_penduduk`, `jenis_kelamin`, `pekerjaan`, `penghasilan`, `jml_tanggungan`, `tempat_tgl`, `umur`, `sts_kawin`) VALUES
(1, 'Indra', 1, 3, 4, 4, 5, 3, 3),
(2, 'Kita', 1, 3, 5, 3, 4, 4, 5),
(3, 'Berkarya', 1, 4, 3, 4, 4, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `peringkat`
--

CREATE TABLE `peringkat` (
  `id` int(11) NOT NULL,
  `mhs_id` int(11) NOT NULL,
  `nilai_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `peringkat`
--

INSERT INTO `peringkat` (`id`, `mhs_id`, `nilai_total`) VALUES
(1, 1, 3.85),
(2, 2, 4.35);

-- --------------------------------------------------------

--
-- Table structure for table `profil_standar`
--

CREATE TABLE `profil_standar` (
  `id` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `subkriteria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `profil_standar`
--

INSERT INTO `profil_standar` (`id`, `kriteria_id`, `subkriteria_id`) VALUES
(1, 1, 1),
(2, 2, 5),
(3, 3, 8),
(4, 4, 12),
(5, 5, 14),
(6, 6, 18);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `nama` varchar(68) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id`, `kriteria_id`, `nama`, `nilai`) VALUES
(1, 1, 'Buruh Harian Lepas', 3),
(2, 1, 'Wiraswasta', 4),
(3, 1, 'Karyawan Swasta', 5),
(4, 2, '2.000.000', 3),
(5, 2, '>500.000 & < 1.000.000', 4),
(6, 2, '<=500.000', 5),
(7, 3, '3 Orang', 3),
(8, 3, '4-5', 4),
(9, 3, '>5', 5),
(10, 4, 'Layak', 3),
(11, 4, 'Tidak Layak', 4),
(12, 4, 'Sangat Tidak Layak', 5),
(13, 5, '< 40 Tahun', 3),
(14, 5, '40 - 45 Tahun', 4),
(15, 5, '>45', 5),
(16, 6, 'Menikah', 3),
(17, 6, 'Cerai Hidup', 4),
(18, 6, 'Cerai Mati', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'kepala', '870f669e4bbbfa8a6fde65549826d1c4', 2),
(5, 'admin2@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_penduduk`
-- (See below for the actual view)
--
CREATE TABLE `vw_penduduk` (
`id` int(11)
,`nama_penduduk` varchar(100)
,`pekerjaan` varchar(68)
,`penghasilan` varchar(68)
,`jml_tanggungan` varchar(68)
,`tempat_tgl` varchar(68)
,`umur` varchar(68)
,`sts_kawin` varchar(68)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_penduduk`
--
DROP TABLE IF EXISTS `vw_penduduk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_penduduk`  AS SELECT `p`.`id` AS `id`, `p`.`nama_penduduk` AS `nama_penduduk`, `pekerjaan`.`nama` AS `pekerjaan`, `penghasilan`.`nama` AS `penghasilan`, `jml_tanggungan`.`nama` AS `jml_tanggungan`, `tempat_tgl`.`nama` AS `tempat_tgl`, `umur`.`nama` AS `umur`, `sts_kawin`.`nama` AS `sts_kawin` FROM ((((((`penduduk` `p` join `sub_kriteria` `pekerjaan` on(`pekerjaan`.`nilai` = `p`.`pekerjaan` and `pekerjaan`.`kriteria_id` = 1)) join `sub_kriteria` `penghasilan` on(`penghasilan`.`nilai` = `p`.`penghasilan` and `penghasilan`.`kriteria_id` = 2)) join `sub_kriteria` `jml_tanggungan` on(`jml_tanggungan`.`nilai` = `p`.`jml_tanggungan` and `jml_tanggungan`.`kriteria_id` = 3)) join `sub_kriteria` `tempat_tgl` on(`tempat_tgl`.`nilai` = `p`.`tempat_tgl` and `tempat_tgl`.`kriteria_id` = 4)) join `sub_kriteria` `umur` on(`umur`.`nilai` = `p`.`umur` and `umur`.`kriteria_id` = 5)) join `sub_kriteria` `sts_kawin` on(`sts_kawin`.`nilai` = `p`.`sts_kawin` and `sts_kawin`.`kriteria_id` = 6))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gap`
--
ALTER TABLE `gap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembobotan`
--
ALTER TABLE `pembobotan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peringkat`
--
ALTER TABLE `peringkat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mhs_id` (`mhs_id`);

--
-- Indexes for table `profil_standar`
--
ALTER TABLE `profil_standar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kriteria_id` (`kriteria_id`),
  ADD KEY `subkriteria_id` (`subkriteria_id`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_kriteria_ibfk_1` (`kriteria_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gap`
--
ALTER TABLE `gap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembobotan`
--
ALTER TABLE `pembobotan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `peringkat`
--
ALTER TABLE `peringkat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `profil_standar`
--
ALTER TABLE `profil_standar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peringkat`
--
ALTER TABLE `peringkat`
  ADD CONSTRAINT `peringkat_ibfk_1` FOREIGN KEY (`mhs_id`) REFERENCES `mhs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profil_standar`
--
ALTER TABLE `profil_standar`
  ADD CONSTRAINT `profil_standar_ibfk_1` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `profil_standar_ibfk_2` FOREIGN KEY (`subkriteria_id`) REFERENCES `sub_kriteria` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD CONSTRAINT `sub_kriteria_ibfk_1` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
