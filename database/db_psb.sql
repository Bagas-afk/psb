-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2020 at 09:20 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_psb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_beasiswa_peserta`
--

CREATE TABLE `tb_beasiswa_peserta` (
  `id_user` int(11) NOT NULL,
  `jenis_beasiswa` varchar(20) NOT NULL,
  `penyelenggara` varchar(30) NOT NULL,
  `tahun_mulai` year(4) NOT NULL,
  `tahun_selesai` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_user_admin`
--

CREATE TABLE `tb_detail_user_admin` (
  `id_user` int(11) NOT NULL,
  `tempat_lahir` varchar(35) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `kelurahan` text NOT NULL,
  `kecamatan` text NOT NULL,
  `kota` text NOT NULL,
  `provinsi` text NOT NULL,
  `agama` varchar(9) NOT NULL,
  `nik` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_user_peserta`
--

CREATE TABLE `tb_detail_user_peserta` (
  `id_user` int(11) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `no_ijazah` varchar(11) NOT NULL,
  `no_skhun` varchar(11) NOT NULL,
  `no_un` varchar(14) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tempat_lahir` varchar(35) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(9) NOT NULL,
  `berkebutuhan_khusus` text NOT NULL,
  `alamat` text NOT NULL,
  `dusun` text NOT NULL,
  `kelurahan` text NOT NULL,
  `kecamatan` text NOT NULL,
  `kota` text NOT NULL,
  `provinsi` text NOT NULL,
  `transportasi` text NOT NULL,
  `jenis_tinggal` text NOT NULL,
  `no_telp` varchar(11) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `kps` varchar(1) NOT NULL,
  `no_kps` varchar(16) NOT NULL,
  `ttd_peserta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengasuh_peserta`
--

CREATE TABLE `tb_pengasuh_peserta` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `berkebutuhan_khusus` text NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `pendidikan` varchar(5) NOT NULL,
  `penghasilan` int(11) NOT NULL,
  `role` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_periodik_peserta`
--

CREATE TABLE `tb_periodik_peserta` (
  `id_user` int(11) NOT NULL,
  `tinggi_badan` int(11) NOT NULL,
  `jarak` varchar(5) NOT NULL,
  `waktu` varchar(5) NOT NULL,
  `jumlah_sodara_kandung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_prestasi_peserta`
--

CREATE TABLE `tb_prestasi_peserta` (
  `id_user` int(11) NOT NULL,
  `jenis_prestasi` varchar(20) NOT NULL,
  `tingkat` int(15) NOT NULL,
  `nama_prestasi` text NOT NULL,
  `tahun` year(4) NOT NULL,
  `penyelenggara` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_profile_sekolah`
--

CREATE TABLE `tb_profile_sekolah` (
  `nama_sekolah` int(11) NOT NULL,
  `alamat_sekolah` int(11) NOT NULL,
  `deskripsi_sekolah` int(11) NOT NULL,
  `logo_sekolah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id_role`, `role`) VALUES
(1, 'Staff'),
(2, 'Siswa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_token`
--

CREATE TABLE `tb_token` (
  `id_token` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_role` int(11) NOT NULL,
  `foto` text NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `email`, `password`, `id_role`, `foto`, `is_active`, `date_created`) VALUES
(1, 'Muhammad ilham Fhadilah', 'ilhamelmahier21@gmail.com', '$2y$10$caRF5OQnYc/4bDaxyWSiG.6q5h.70zzLlCTkkk56S6ObJGcjkGx1C', 1, 'default.jpg', 1, '2019-12-10 10:20:34'),
(3, 'Fhadilah Ilham', 'mahier.fh@gmail.com', '$2y$10$IY2jHzmFKks5gDDddF0uheVIZgeYy9WV2xrxORANKu3NPjyeGLZvS', 2, 'default.jpg', 1, '2020-01-05 07:52:20'),
(4, 'Muhammad Ilham Fhadilah', 'fhadilah_ilham@outlook.com', '$2y$10$h2MF/P9zKp0.pQ9LTpZI2O/U1qJAsxIjvYfAwP8MY7bXNhOAMnh8i', 2, 'default.jpg', 0, '2020-04-08 15:34:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_beasiswa_peserta`
--
ALTER TABLE `tb_beasiswa_peserta`
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_detail_user_admin`
--
ALTER TABLE `tb_detail_user_admin`
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_detail_user_peserta`
--
ALTER TABLE `tb_detail_user_peserta`
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_pengasuh_peserta`
--
ALTER TABLE `tb_pengasuh_peserta`
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_periodik_peserta`
--
ALTER TABLE `tb_periodik_peserta`
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_prestasi_peserta`
--
ALTER TABLE `tb_prestasi_peserta`
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tb_token`
--
ALTER TABLE `tb_token`
  ADD PRIMARY KEY (`id_token`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_token`
--
ALTER TABLE `tb_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_beasiswa_peserta`
--
ALTER TABLE `tb_beasiswa_peserta`
  ADD CONSTRAINT `tb_beasiswa_peserta_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_detail_user_admin`
--
ALTER TABLE `tb_detail_user_admin`
  ADD CONSTRAINT `tb_detail_user_admin_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_detail_user_peserta`
--
ALTER TABLE `tb_detail_user_peserta`
  ADD CONSTRAINT `tb_detail_user_peserta_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pengasuh_peserta`
--
ALTER TABLE `tb_pengasuh_peserta`
  ADD CONSTRAINT `tb_pengasuh_peserta_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_periodik_peserta`
--
ALTER TABLE `tb_periodik_peserta`
  ADD CONSTRAINT `tb_periodik_peserta_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_prestasi_peserta`
--
ALTER TABLE `tb_prestasi_peserta`
  ADD CONSTRAINT `tb_prestasi_peserta_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `tb_role` (`id_role`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
