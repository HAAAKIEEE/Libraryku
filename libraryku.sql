-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2023 at 05:40 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libraryku`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `status` enum('Aktif','Tidak Aktif','','') NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `status`, `create_date`, `password`) VALUES
(1, 'admin', 'Aktif', '2023-12-09 04:22:02', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `mdt_buku`
--

CREATE TABLE `mdt_buku` (
  `id_buku` int(5) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `jenis_buku` enum('Buku Bacaan','Buku Ajar(Diktat)','','') NOT NULL,
  `id_admin` int(5) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mdt_buku`
--

INSERT INTO `mdt_buku` (`id_buku`, `judul_buku`, `deskripsi`, `pengarang`, `jenis_buku`, `id_admin`, `gambar`, `create_date`, `file`) VALUES
(70, 'suikoden 2', 'Suikoden I berlatar bertahun-tahun setelah peristiwa dalam kisah Suikoden pertama dan menceritakan invasi dari Kerajaan Highland ke Negara kota Jowston. ', 'hajime', 'Buku Bacaan', 1, 'Suikoden 2_.jpg', '2023-12-30 04:25:32', '39-Article Text-58-1-10-20160318.pdf'),
(74, 'javascript the definitive guide', 'JavaScript is the programming language of the web and is used by more software developers today than any other programming language. For nearly 25 years this best seller has been the go-to guide for JavaScript programmers. The seventh edition is fully updated to cover the 2020 version of JavaScript, and new chapters cover classes, modules, iterators, generators, Promises, async/await, and metaprogramming. You’ll find illuminating and engaging example code throughout.', 'David Flanagan', 'Buku Bacaan', 1, 'download.jpg', '2023-12-30 04:30:19', 'h.pdf'),
(75, 'Rich Dad Poor Dad', 'Rich Dad Poor Dad adalah buku tahun 1997 karya Robert Kiyosaki dan Sharon Lechter. Rich Dad, Poor Dad adalah buku yang membahas masalah finansial yang dihadapi banyak orang dikarenakan ajaran keliru orang tua mereka mengenai keuangan, yang juga dialaminya semasa kecil dan remaja', 'Robert Kiyosaki dan Sharon Lechter', 'Buku Bacaan', 1, '51AHZGhzZEL._SL500_.jpg', '2023-12-30 04:31:40', 'Rich Dad Poor Dad bahasa indonesia (SFILE.MOBI).pdf');

-- --------------------------------------------------------

--
-- Table structure for table `mdt_laporan_ta`
--

CREATE TABLE `mdt_laporan_ta` (
  `id_laporan` int(5) NOT NULL,
  `judul_laporan` varchar(255) NOT NULL,
  `abstrak` text NOT NULL,
  `nim` int(8) NOT NULL,
  `id_prodi` int(5) NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` enum('Proses','Selesai','','') NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mdt_laporan_ta`
--

INSERT INTO `mdt_laporan_ta` (`id_laporan`, `judul_laporan`, `abstrak`, `nim`, `id_prodi`, `file`, `status`, `create_date`) VALUES
(7, 'anjay', 'akay', 22302009, 1, 'SK045 Tentang Penetapan Mahasiswa Yang Diusulkan Untuk Menerima Beasiswa Kartu Indonesia Pintar (Kip) Kuliah Politeknik Hasnur (On Going).pdf', 'Proses', '2023-12-30 04:22:10');

-- --------------------------------------------------------

--
-- Table structure for table `mhs`
--

CREATE TABLE `mhs` (
  `nim` int(8) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `jenkel` enum('Laki-Laki','Perempuan','','') NOT NULL,
  `id_prodi` int(5) NOT NULL,
  `id_smt` int(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` enum('Aktif','Cuti','DO','Undir') NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mhs`
--

INSERT INTO `mhs` (`nim`, `nama_mhs`, `jenkel`, `id_prodi`, `id_smt`, `email`, `password`, `status`, `username`) VALUES
(22302008, 'baihaqi', 'Laki-Laki', 1, 3, 'haqi20082004@gmail.com', 'baihaqi123', 'Aktif', 'baihaqi'),
(22302009, 'noriah', 'Perempuan', 1, 6, 'yahh@gmail.com', 'noriah', 'Aktif', 'noriah');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(5) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL,
  `jenjang` enum('D3','D4','','') NOT NULL,
  `status` enum('Aktif','Tidak Aktif','','') NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama_prodi`, `jenjang`, `status`, `create_date`) VALUES
(1, 'Teknik Informatika', 'D3', 'Aktif', '2023-11-24 14:40:32'),
(2, 'Teknik Otomotif', 'D3', 'Aktif', '2023-11-24 14:40:32');

-- --------------------------------------------------------

--
-- Table structure for table `smt`
--

CREATE TABLE `smt` (
  `id_smt` int(5) NOT NULL,
  `nama_smt` enum('I','II','III','IV','V','VI','VII','VIII') NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `smt`
--

INSERT INTO `smt` (`id_smt`, `nama_smt`, `create_date`) VALUES
(1, 'I', '2023-11-24 14:41:41'),
(2, 'II', '2023-11-24 14:41:41'),
(3, 'III', '2023-11-24 14:41:41'),
(4, 'IV', '2023-11-24 14:41:41'),
(5, 'V', '2023-11-24 14:41:41'),
(6, 'VI', '2023-11-24 14:41:41'),
(7, 'VII', '2023-11-24 14:41:41'),
(8, 'VIII', '2023-11-24 14:41:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `mdt_buku`
--
ALTER TABLE `mdt_buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `mdt_laporan_ta`
--
ALTER TABLE `mdt_laporan_ta`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `nim` (`nim`,`id_prodi`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `id_prodi` (`id_prodi`,`id_smt`),
  ADD KEY `id_smt` (`id_smt`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `smt`
--
ALTER TABLE `smt`
  ADD PRIMARY KEY (`id_smt`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mdt_buku`
--
ALTER TABLE `mdt_buku`
  MODIFY `id_buku` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `mdt_laporan_ta`
--
ALTER TABLE `mdt_laporan_ta`
  MODIFY `id_laporan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mhs`
--
ALTER TABLE `mhs`
  MODIFY `nim` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22302010;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `smt`
--
ALTER TABLE `smt`
  MODIFY `id_smt` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mdt_buku`
--
ALTER TABLE `mdt_buku`
  ADD CONSTRAINT `mdt_buku_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mdt_laporan_ta`
--
ALTER TABLE `mdt_laporan_ta`
  ADD CONSTRAINT `mdt_laporan_ta_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mhs` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mdt_laporan_ta_ibfk_2` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mhs`
--
ALTER TABLE `mhs`
  ADD CONSTRAINT `mhs_ibfk_1` FOREIGN KEY (`id_smt`) REFERENCES `smt` (`id_smt`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mhs_ibfk_2` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
