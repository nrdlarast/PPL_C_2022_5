-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2022 at 12:12 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`nama`, `email`, `foto`) VALUES
('admin', 'admin@gmail.com', 'admin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`nama`, `email`, `foto`) VALUES
('Informatika', 'informatika@gmail.com', 'if.jpg');

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
('12321300', 'atika', 'atikarahmanda@gmail.com', 'Jl. Prof. Sudarto No.13, Tembalang, Kec. Tembalang', '083181048662', 'asaa'),
('1981042020050120', 'anais', 'anais@lectures.undip.ac.id', 'laut indonesia', '081234567890', 'anais.jpg'),
('1981042020050121', 'tika', 'tika@lectures.undip.ac.id', 'semarang', '081245678392', 'pexels-pixabay-45201.jpg'),
('1981042020050124', 'Gumball Watterson, S.Kom,. M.T', 'gumbalworld@gmail.com', 'semarang', '083181048662', 'gumbal.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `irs`
--

CREATE TABLE `irs` (
  `no_irs` int(11) NOT NULL,
  `irs_id` varchar(15) NOT NULL,
  `semester_aktif` int(11) NOT NULL,
  `jumlah_sks` int(11) NOT NULL,
  `berkas_irs` varchar(100) NOT NULL,
  `sks_kumulatif` int(11) NOT NULL,
  `ip_semester` int(11) NOT NULL,
  `ip_kumulatif` int(11) NOT NULL,
  `berkas_khs` varchar(20) NOT NULL,
  `status_irs` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `irs`
--

INSERT INTO `irs` (`no_irs`, `irs_id`, `semester_aktif`, `jumlah_sks`, `berkas_irs`, `sks_kumulatif`, `ip_semester`, `ip_kumulatif`, `berkas_khs`, `status_irs`) VALUES
(1, '100001', 1, 18, 'hima.jpg', 0, 0, 0, 'Untitled Workspace.p', 'belum'),
(2, '200001', 2, 18, 'Untitled Workspace.png', 0, 0, 0, '', 'disetujui'),
(3, '300001', 3, 18, 'Untitled Workspace.png', 0, 0, 0, '', 'disetujui'),
(5, '100002', 2, 24, '1bbbbc0f6a5b1448ea19f543c1a8dda1.jpg', 0, 0, 0, 'Untitled Workspace.p', 'belum'),
(6, '100003', 3, 22, '1bbbbc0f6a5b1448ea19f543c1a8dda1.jpg', 0, 0, 0, 'Untitled Workspace.p', 'disetujui'),
(7, '100004', 4, 22, '1bbbbc0f6a5b1448ea19f543c1a8dda1.jpg', 0, 0, 0, 'Untitled Workspace.p', 'disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `kecamatan_id` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kode_kotakab` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`kecamatan_id`, `kecamatan`, `kode_kotakab`) VALUES
('1', 'Patii', '1'),
('2', 'Tembalang', '1');

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `kelurahan_id` varchar(100) NOT NULL,
  `kecamatan_id` varchar(100) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `kode_pos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`kelurahan_id`, `kecamatan_id`, `kelurahan`, `kode_pos`) VALUES
('1', '1', 'tembalang', 2333);

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
  `berkas_khs` varchar(100) NOT NULL,
  `status_khs` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khs`
--

INSERT INTO `khs` (`khs_id`, `semester_aktif`, `sks_semester`, `sks_kumulatif`, `ip_semester`, `ip_kumulatif`, `berkas_khs`, `status_khs`) VALUES
('200001', '1', 18, 18, 0, 0, '200001.jpg', 'belum'),
('200002', '8', 18, 144, 4, 4, '200002.jpg', 'belum');

-- --------------------------------------------------------

--
-- Table structure for table `kota_kab`
--

CREATE TABLE `kota_kab` (
  `kode_kotakab` varchar(10) NOT NULL,
  `nama_kotakab` varchar(30) NOT NULL,
  `kode_provinsi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kota_kab`
--

INSERT INTO `kota_kab` (`kode_kotakab`, `nama_kotakab`, `kode_provinsi`) VALUES
('1', 'Semarang', '1'),
('2', 'Semarang', '2');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
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
  `email_dosenwali` varchar(100) NOT NULL,
  `email_dosenpkl` varchar(100) NOT NULL,
  `email_dosenskripsi` varchar(100) NOT NULL,
  `kelurahan_id` varchar(100) NOT NULL,
  `irs_id` varchar(20) NOT NULL,
  `khs_id` varchar(20) NOT NULL,
  `pkl_id` varchar(20) NOT NULL,
  `skripsi_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `email`, `status_mahasiswa`, `alamat`, `no_hp`, `angkatan`, `jalur_masuk`, `foto`, `ipk`, `email_dosenwali`, `email_dosenpkl`, `email_dosenskripsi`, `kelurahan_id`, `irs_id`, `khs_id`, `pkl_id`, `skripsi_id`) VALUES
('24060120120005', 'Nurida Larasati', 'nrdlarast@students.undip.ac.id', 'aktif', 'JL 1', '085156104126', '2020', 'SNMPTN', 'ENbMLaPW4AA4HGZ.jpg', 3, 'gumbalworld@gmail.com', 'gumbalworld@gmail.com', 'gumbalworld@gmail.com', '1', '100001', '200001', '300001', '400001'),
('24060120130056', 'Atika Rahmandaa', 'atikarahmanda@students.undip.ac.id', 'aktif', 'semarang kotaa', '083181048662', '2021', 'Mandiri', 'tikaa.jpg', 0, 'gumbalworld@gmail.com', 'gumbalworld@gmail.com', 'gumbalworld@gmail.com', '1', '100001', '200001', '300001', '400001'),
('24060120130057', 'veronika', 'vero@students.undip.ac.id', 'aktif', 'semarang', '083181048663', '2016', 'SBMPTN', 'vero.jpg', 4, 'gumbalworlddd@gmail.com', 'gumbalworld@gmail.com', 'gumbalworld@gmail.com', '1', '100002', '200002', '300002', '400002');

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
  `status_pkl` varchar(15) NOT NULL,
  `nilai` int(5) NOT NULL,
  `berkas_pkl` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pkl`
--

INSERT INTO `pkl` (`pkl_id`, `status_pkl`, `nilai`, `berkas_pkl`) VALUES
('300001', 'belum', 4, ''),
('300002', 'sedang', 4, '300002.jpg');

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
('2', 'Jawa Tengah'),
('1', 'Nanggroe Aceh Darussalam');

-- --------------------------------------------------------

--
-- Table structure for table `skripsi`
--

CREATE TABLE `skripsi` (
  `skripsi_id` varchar(10) NOT NULL,
  `status_skripsi` varchar(15) NOT NULL,
  `nilai` varchar(5) NOT NULL,
  `berkas_skripsi` varchar(100) NOT NULL,
  `lama_study` varchar(10) NOT NULL,
  `tanggal_sidang` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skripsi`
--

INSERT INTO `skripsi` (`skripsi_id`, `status_skripsi`, `nilai`, `berkas_skripsi`, `lama_study`, `tanggal_sidang`) VALUES
('400001', 'belum', '1', 'Untitled Workspace.png', '1', '0000-00-00'),
('400002', 'belum', '4', '400002.jpg', '4', '2022-10-01');

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
('atika', 'atikarahfadmanda@gmail.com', '123', 'mahasiswa'),
('atika', 'atikarahmadadanda@gmail.com', '123', 'mahasiswa'),
('atika rahmanda', 'atikarahmanda@gmail.com', '123', 'mahasiswa'),
('atika', 'atikarahmanda@students.undip.ac.id', '123', 'mahasiswa'),
('atika', 'atikarahsdamanda@gmail.com', '123', 'mahasiswa'),
('atika rahmanda', 'atisdaakarahmanda@gmail.com', '123', 'mahasiswa'),
('Gumball Watterson, S.Kom,. M.T', 'gumbalworld@gmail.com', '123', 'dosen'),
('informatika', 'informatika@gmail.com', '123', 'departemen'),
('Nurida Larasati', 'nrdlarast@students.undip.ac.id', '123', 'mahasiswa'),
('Nurida', 'nuridalrst@gmail.com', '123', 'mahasiswa'),
('atika resti', 'tika@lectures.undip.ac.id', '123', 'dosen'),
('veronika', 'vero@students.undip.ac.id', '123', 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`email`);

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
  ADD KEY `kelurahan_id` (`kode_kotakab`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`kelurahan_id`),
  ADD KEY `kecamatan_id` (`kecamatan_id`),
  ADD KEY `kelurahan` (`kelurahan`);

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
  ADD KEY `kode_provinsi_2` (`kode_provinsi`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `kode_kotakab` (`kelurahan_id`),
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
  ADD PRIMARY KEY (`kode_provinsi`),
  ADD KEY `nama_provinsi` (`nama_provinsi`);

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
  ADD CONSTRAINT `kecamatan_ibfk_1` FOREIGN KEY (`kode_kotakab`) REFERENCES `kota_kab` (`kode_kotakab`);

--
-- Constraints for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD CONSTRAINT `kelurahan_ibfk_1` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`kecamatan_id`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_3` FOREIGN KEY (`khs_id`) REFERENCES `khs` (`khs_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mahasiswa_ibfk_4` FOREIGN KEY (`pkl_id`) REFERENCES `pkl` (`pkl_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mahasiswa_ibfk_5` FOREIGN KEY (`skripsi_id`) REFERENCES `skripsi` (`skripsi_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mahasiswa_ibfk_7` FOREIGN KEY (`irs_id`) REFERENCES `irs` (`irs_id`),
  ADD CONSTRAINT `mahasiswa_ibfk_8` FOREIGN KEY (`kelurahan_id`) REFERENCES `kelurahan` (`kelurahan_id`);

--
-- Constraints for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD CONSTRAINT `provinsi_ibfk_1` FOREIGN KEY (`kode_provinsi`) REFERENCES `kota_kab` (`kode_provinsi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
