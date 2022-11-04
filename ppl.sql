-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2022 at 03:26 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppl`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `nama`, `email`, `alamat`, `no_hp`, `foto`) VALUES
('1981042020050120', 'anais', 'anais@lectures.undip.ac.id', 'laut indonesia', '081234567890', 'anais.jpg'),
('1981042020050121', 'tika', 'tika@lectures.undip.ac.id', 'semarang', '081245678392', 'tika.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `irs`
--

CREATE TABLE `irs` (
  `no_irs` int(11) NOT NULL,
  `irs_id` int(11) NOT NULL,
  `semester_aktif` int(11) NOT NULL,
  `jumlah_sks` int(11) NOT NULL,
  `berkas_irs` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `irs`
--

INSERT INTO `irs` (`no_irs`, `irs_id`, `semester_aktif`, `jumlah_sks`, `berkas_irs`) VALUES
(1, 100001, 1, 18, '100001.jpg'),
(2, 200001, 2, 18, '200001.jpg'),
(3, 300001, 3, 18, '300001.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `kecamatan_id` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kelurahan_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`kecamatan_id`, `kecamatan`, `kelurahan_id`) VALUES
('', 'Tembalang', '1'),
('1', 'Tembalang', '1');

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `kelurahan_id` varchar(100) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `kode_pos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`kelurahan_id`, `kelurahan`, `kode_pos`) VALUES
('1', 'Tembalang', 25573);

-- --------------------------------------------------------

--
-- Table structure for table `khs`
--

CREATE TABLE `khs` (
  `khs_id` varchar(10) NOT NULL,
  `semester_aktif` varchar(2) NOT NULL,
  `sks_semester` int(100) NOT NULL,
  `sks_kumulatif` int(100) NOT NULL,
  `ip_semester` int(100) NOT NULL,
  `ip_kumulatif` int(100) NOT NULL,
  `berkas_khs` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khs`
--

INSERT INTO `khs` (`khs_id`, `semester_aktif`, `sks_semester`, `sks_kumulatif`, `ip_semester`, `ip_kumulatif`, `berkas_khs`) VALUES
('200001', '1', 18, 18, 0, 0, '200001.jpg'),
('200002', '8', 18, 144, 4, 4, '200002.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kota_kab`
--

CREATE TABLE `kota_kab` (
  `kode_kotakab` varchar(10) NOT NULL,
  `nama_kotakab` varchar(30) NOT NULL,
  `kode_provinsi` varchar(10) NOT NULL,
  `kecamatan_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kota_kab`
--

INSERT INTO `kota_kab` (`kode_kotakab`, `nama_kotakab`, `kode_provinsi`, `kecamatan_id`) VALUES
('1', 'Aceh', '1', '1'),
('2', 'Semarang', '2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `mahasiswaid` int(10) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status_mahasiswa` varchar(10) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `angkatan` varchar(4) NOT NULL,
  `jalur_masuk` varchar(10) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `ipk` int(5) NOT NULL,
  `nip_dosenwali` varchar(20) NOT NULL,
  `kode_kotakab` varchar(20) NOT NULL,
  `irs_id` varchar(20) NOT NULL,
  `khs_id` varchar(20) NOT NULL,
  `pkl_id` varchar(20) NOT NULL,
  `skripsi_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`mahasiswaid`, `nim`, `nama`, `email`, `status_mahasiswa`, `alamat`, `no_hp`, `angkatan`, `jalur_masuk`, `foto`, `ipk`, `nip_dosenwali`, `kode_kotakab`, `irs_id`, `khs_id`, `pkl_id`, `skripsi_id`) VALUES
(1, '24060120130056', 'atika rahmanda', 'atikarahmanda@students.undip.ac.id', 'aktif', 'semarang', '083181048662', '2020', 'SBMPTN', 'darwin.jpg', 0, '19810420200501200', '2', '100001', '200001', '300001', '400001'),
(2, '24060120130057', 'veronika', 'vero@students.undip.ac.id', 'aktif', 'semarang', '083181048663', '2016', 'SBMPTN', 'vero.jpg', 4, '19810420200501202', '2', '100002', '200002', '300002', '400002');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `kode` varchar(11) NOT NULL,
  `nama` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`kode`, `nama`) VALUES
('50001', 'ppl');

-- --------------------------------------------------------

--
-- Table structure for table `pkl`
--

CREATE TABLE `pkl` (
  `pkl_id` varchar(10) NOT NULL,
  `status` varchar(15) NOT NULL,
  `nilai` int(5) NOT NULL,
  `berkas_pkl` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pkl`
--

INSERT INTO `pkl` (`pkl_id`, `status`, `nilai`, `berkas_pkl`) VALUES
('300001', 'belum', 4, '300001'),
('300002', 'lulus', 4, '300002.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `kode_provinsi` varchar(10) NOT NULL,
  `nama_provinsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`kode_provinsi`, `nama_provinsi`) VALUES
('1', 'Nanggroe Aceh Darussalam'),
('2', 'Jawa Tengah');

-- --------------------------------------------------------

--
-- Table structure for table `skripsi`
--

CREATE TABLE `skripsi` (
  `skripsi_id` varchar(10) NOT NULL,
  `status` varchar(15) NOT NULL,
  `nilai` varchar(5) NOT NULL,
  `berkas_skripsi` varchar(100) NOT NULL,
  `lama_study` varchar(10) NOT NULL,
  `tanggal_sidang` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skripsi`
--

INSERT INTO `skripsi` (`skripsi_id`, `status`, `nilai`, `berkas_skripsi`, `lama_study`, `tanggal_sidang`) VALUES
('400001', 'belum', '1', '400001.jpg', '1', '0000-00-00'),
('400002', 'lulus', '4', '400002.jpg', '4', '2022-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `peran` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nama`, `email`, `password`, `peran`) VALUES
('admin', 'admin@gmail.com', '123', 'admin'),
('atika', 'atikarahmanda@students.undip.ac.id', '123', 'mahasiswa'),
('Gumball Watterson, S.Kom,. M.T', 'gumbalworld@gmail.com', '123', 'dosen'),
('informatika', 'informatika@gmail.com', '123', 'departemen'),
('veronika', 'vero@students.undip.ac.id', '123', 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `irs`
--
ALTER TABLE `irs`
  ADD PRIMARY KEY (`no_irs`),
  ADD KEY `irs_id` (`irs_id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`kecamatan_id`),
  ADD KEY `kelurahan_id` (`kelurahan_id`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`kelurahan_id`);

--
-- Indexes for table `khs`
--
ALTER TABLE `khs`
  ADD PRIMARY KEY (`khs_id`);

--
-- Indexes for table `kota_kab`
--
ALTER TABLE `kota_kab`
  ADD PRIMARY KEY (`kode_kotakab`),
  ADD KEY `kode_provinsi` (`kode_provinsi`),
  ADD KEY `kode_provinsi_2` (`kode_provinsi`),
  ADD KEY `kecamatan_id` (`kecamatan_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `kode_kotakab` (`kode_kotakab`),
  ADD KEY `irs_id` (`irs_id`),
  ADD KEY `khs_id` (`khs_id`),
  ADD KEY `pkl_id` (`pkl_id`),
  ADD KEY `skripsi_id` (`skripsi_id`);

--
-- Indexes for table `pkl`
--
ALTER TABLE `pkl`
  ADD PRIMARY KEY (`pkl_id`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`kode_provinsi`);

--
-- Indexes for table `skripsi`
--
ALTER TABLE `skripsi`
  ADD PRIMARY KEY (`skripsi_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `kecamatan_ibfk_1` FOREIGN KEY (`kelurahan_id`) REFERENCES `kelurahan` (`kelurahan_id`);

--
-- Constraints for table `kota_kab`
--
ALTER TABLE `kota_kab`
  ADD CONSTRAINT `kota_kab_ibfk_1` FOREIGN KEY (`kode_provinsi`) REFERENCES `provinsi` (`kode_provinsi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kota_kab_ibfk_2` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`kecamatan_id`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`kode_kotakab`) REFERENCES `kota_kab` (`kode_kotakab`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mahasiswa_ibfk_3` FOREIGN KEY (`khs_id`) REFERENCES `khs` (`khs_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mahasiswa_ibfk_4` FOREIGN KEY (`pkl_id`) REFERENCES `pkl` (`pkl_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mahasiswa_ibfk_5` FOREIGN KEY (`skripsi_id`) REFERENCES `skripsi` (`skripsi_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
