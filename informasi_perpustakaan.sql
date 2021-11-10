-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 10, 2021 at 10:34 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `informasi_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(11, 'icwr', 'be4b323be195c063ffe8fc09b220a7b531ce8c4b');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_buku`
--

CREATE TABLE `daftar_buku` (
  `id_buku` int(11) NOT NULL,
  `nama_buku` text NOT NULL,
  `nomor_seri` varchar(300) NOT NULL,
  `gambar` text NOT NULL,
  `jumlah` varchar(300) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(500) NOT NULL,
  `id_daftarbuku` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftar_buku`
--

INSERT INTO `daftar_buku` (`id_buku`, `nama_buku`, `nomor_seri`, `gambar`, `jumlah`, `deskripsi`, `status`, `id_daftarbuku`) VALUES
(55, 'Ini Buku Bagus', '129ad0k92', 'default.jpeg', '100', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '30', '');

-- --------------------------------------------------------

--
-- Table structure for table `data_sekolah`
--

CREATE TABLE `data_sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `nama_perpustakaan` varchar(700) NOT NULL,
  `alamat_perpustakaan` varchar(1000) NOT NULL,
  `nama_kepsek` varchar(700) NOT NULL,
  `nip` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_sekolah`
--

INSERT INTO `data_sekolah` (`id_sekolah`, `nama_perpustakaan`, `alamat_perpustakaan`, `nama_kepsek`, `nip`) VALUES
(1, 'SMKN 25 MALANG', 'JL. Merdeka No. 01 Kode Pos: 15050', 'Billy, S.Pd, M.Pd, S.Kom.', '159033492039009');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`id_kelas`, `kelas`) VALUES
(1, 'XII TKJ 3'),
(2, 'XII TKJ 2'),
(3, 'XII TKJ 1'),
(10, 'XII UPW 1'),
(11, 'XII AP 1');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_peminjaman`
--

CREATE TABLE `riwayat_peminjaman` (
  `id_riwayat` int(11) NOT NULL,
  `nama` varchar(400) NOT NULL,
  `kelas` varchar(400) NOT NULL,
  `nomor_perpus` varchar(700) NOT NULL,
  `nisn` text NOT NULL,
  `id_riwayatuser` text NOT NULL,
  `jumlah_pinjam` varchar(500) NOT NULL,
  `id_riwayatbuku` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat_peminjaman`
--

INSERT INTO `riwayat_peminjaman` (`id_riwayat`, `nama`, `kelas`, `nomor_perpus`, `nisn`, `id_riwayatuser`, `jumlah_pinjam`, `id_riwayatbuku`) VALUES
(111, 'Billy', 'XII TKJ 3', '61889a987112e-0-0', '15050', '27', '30', '55');

-- --------------------------------------------------------

--
-- Table structure for table `user_perpus`
--

CREATE TABLE `user_perpus` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `kelas` varchar(500) NOT NULL,
  `nisn` varchar(1000) NOT NULL,
  `nomor_seriperpus` varchar(1000) NOT NULL,
  `email` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_perpus`
--

INSERT INTO `user_perpus` (`id_user`, `nama`, `kelas`, `nisn`, `nomor_seriperpus`, `email`) VALUES
(27, 'Billy', 'XII TKJ 3', '15050', '61889a987112e-0-0', 'billy@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_buku`
--
ALTER TABLE `daftar_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `data_sekolah`
--
ALTER TABLE `data_sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `riwayat_peminjaman`
--
ALTER TABLE `riwayat_peminjaman`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- Indexes for table `user_perpus`
--
ALTER TABLE `user_perpus`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `daftar_buku`
--
ALTER TABLE `daftar_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `data_sekolah`
--
ALTER TABLE `data_sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `riwayat_peminjaman`
--
ALTER TABLE `riwayat_peminjaman`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `user_perpus`
--
ALTER TABLE `user_perpus`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
