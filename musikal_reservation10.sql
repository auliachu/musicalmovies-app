-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2021 at 10:12 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `musikal_reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
('A1', 'aulia', 'aulia');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` varchar(20) NOT NULL,
  `Nama_customer` varchar(20) NOT NULL,
  `No_hp` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `user` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `Nama_customer`, `No_hp`, `Email`, `user`, `pass`) VALUES
('C002', 'Raisa', '081218778110', 'raisa@gmail.com', 'user', '123'),
('C004', 'Chika', '081267679001', 'chika@gmail.com', 'aririk', '123'),
('C010', 'alwa', '085266944093', 'alwa@gmail.com', 'alwa', '123'),
('C011', 'Rita Maizona', '08736647382', 'rita@gmail.com', 'rita', '123'),
('C012', 'Agus Ahamad', '085266944093', 'agus@gmail.com', 'agus', '123'),
('C013', 'Ririn Saiul', '085266944093', 'ririn@gmail.com', 'ririn', '123');

-- --------------------------------------------------------

--
-- Table structure for table `diskon`
--

CREATE TABLE `diskon` (
  `no` varchar(20) NOT NULL,
  `id_diskon` varchar(30) NOT NULL,
  `nama_diskon` varchar(30) NOT NULL,
  `besar_diskon` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diskon`
--

INSERT INTO `diskon` (`no`, `id_diskon`, `nama_diskon`, `besar_diskon`) VALUES
('', 'D004', 'Batch Three', '3'),
('', 'D005', 'Batch One', '5'),
('', 'D006', 'Luxury', '7'),
('', 'D007', 'Tidak Ada Diskon', '0');

-- --------------------------------------------------------

--
-- Table structure for table `faktur`
--

CREATE TABLE `faktur` (
  `id_faktur` varchar(20) NOT NULL,
  `id_customer` varchar(20) NOT NULL,
  `id_jadwaltayang` varchar(20) NOT NULL,
  `id_jenistiket` varchar(20) NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `jam_pesan` time NOT NULL,
  `jumlah_tiket` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `id_sistempembayaran` varchar(20) NOT NULL,
  `id_statuspembayaran` varchar(20) NOT NULL,
  `id_diskon` varchar(20) NOT NULL,
  `id_musikal` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faktur`
--

INSERT INTO `faktur` (`id_faktur`, `id_customer`, `id_jadwaltayang`, `id_jenistiket`, `tanggal_pesan`, `jam_pesan`, `jumlah_tiket`, `total`, `id_sistempembayaran`, `id_statuspembayaran`, `id_diskon`, `id_musikal`) VALUES
('FK001', 'C004', 'D002', 'J0006', '2021-11-26', '04:36:27', 2, 700000, 'SP003', 'ST026', 'D006', 'M005'),
('FK002', 'C004', 'D002', 'J003', '2021-11-26', '04:36:59', 1, 2000000, 'ST027', 'ST027', 'D005', 'M005'),
('FK003', 'C002', 'D005', 'J007', '2021-11-26', '04:38:05', 2, 1000000, 'SP003', 'ST028', 'D007', 'M008'),
('FK004', 'C002', 'D002', 'J0006', '2021-11-26', '04:48:44', 1, 350000, 'ST029', 'ST029', 'D006', 'M005'),
('FK005', 'C012', 'D002', 'J0006', '2021-11-26', '09:46:10', 1, 350000, 'SP003', 'ST030', 'D006', 'M005'),
('FK006', 'C012', 'D002', 'J007', '2021-11-26', '10:09:54', 1, 500000, 'SP003', 'ST031', 'D007', 'M005');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_tayang`
--

CREATE TABLE `jadwal_tayang` (
  `no` varchar(20) NOT NULL,
  `id_jadwaltayang` varchar(20) NOT NULL,
  `tanggal_show` varchar(20) NOT NULL,
  `id_slot_waktu` varchar(20) NOT NULL,
  `id_musikal` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_tayang`
--

INSERT INTO `jadwal_tayang` (`no`, `id_jadwaltayang`, `tanggal_show`, `id_slot_waktu`, `id_musikal`) VALUES
('', 'D001', '13 Oktober 2021', 'T001', 'M004'),
('', 'D002', '15 Oktober 2021', 'T002', 'M005'),
('', 'D003', '20 Desember 2021', 'T003', 'M006'),
('', 'D004', '22 Desember 2021', 'T002', 'M007'),
('', 'D005', '25 Desember 2021', 'T002', 'M008'),
('', 'D006', '27 Desember 2021', 'T002', 'M009');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_tiket`
--

CREATE TABLE `jenis_tiket` (
  `no` varchar(20) NOT NULL,
  `id_jenistiket` varchar(20) NOT NULL,
  `jenis_tiket` varchar(20) NOT NULL,
  `harga_tiket` int(11) NOT NULL,
  `id_diskon` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_tiket`
--

INSERT INTO `jenis_tiket` (`no`, `id_jenistiket`, `jenis_tiket`, `harga_tiket`, `id_diskon`) VALUES
('', 'J0006', 'EKONOMI', 350000, 'D006'),
('', 'J003', 'VVIP', 2000000, 'D005'),
('', 'J007', 'REGULAR', 500000, 'D007');

-- --------------------------------------------------------

--
-- Table structure for table `kursi`
--

CREATE TABLE `kursi` (
  `no` varchar(20) NOT NULL,
  `id_kursi` varchar(20) NOT NULL,
  `no_kursi` varchar(20) NOT NULL,
  `id_jenistiket` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kursi`
--

INSERT INTO `kursi` (`no`, `id_kursi`, `no_kursi`, `id_jenistiket`, `status`) VALUES
('', 'KR001', 'E01', 'J0006', 'Booking'),
('', 'KR002', 'E02', 'J0006', 'Booking'),
('', 'KR003', 'E03', 'J0006', 'Booking'),
('', 'KR005', 'V01', 'J003', 'Booking'),
('', 'KR006', 'V02', 'J003', 'Tersedia'),
('', 'KR007', 'V03', 'J003', 'Tersedia'),
('', 'KR008', 'R01', 'J007', 'Booking'),
('', 'KR009', 'R02', 'J007', 'Tersedia'),
('', 'KR010', 'R03', 'J007', 'Booking'),
('', 'KR011', 'R04', 'J007', 'Booking'),
('', 'KR012', 'R05', 'J007', 'Booking'),
('', 'KR013', 'E04', 'J0006', 'Booking'),
('', 'KR014', 'E05', 'J0006', 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `musikal`
--

CREATE TABLE `musikal` (
  `no` varchar(20) NOT NULL,
  `id_musikal` varchar(20) NOT NULL,
  `nama_musikal` varchar(20) NOT NULL,
  `Deskripsi` varchar(100) NOT NULL,
  `Foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `musikal`
--

INSERT INTO `musikal` (`no`, `id_musikal`, `nama_musikal`, `Deskripsi`, `Foto`) VALUES
('', 'M004', 'Mueza', 'mueza ucul ', 'laskarpelangi.jfif'),
('', 'M005', 'Doremi & Youu', 'Bercerita tentang 4 sahabat di sekolah. Mereka adalah Putri (diperankan Naura), Imung (Fatih Unru).', 'doremi.jpeg'),
('', 'M006', 'Naura & Genk Juara', 'Disutradarai oleh Eugene Panji, film ini bercerita tentang Naura, Okky, dan Bimo.\r\nMerek terpilih se', 'images.jpeg'),
('', 'M007', 'Pinnocchio', 'Pinocchio was carved by a woodcarver named Geppetto in a Tuscan village. He was created as a wooden ', 'maxresdefault.jpeg'),
('', 'M008', 'Persahabatan', 'Karya: Toto Sudarto Bachtiar\r\nBiasanya dia berjalan malam-malam\r\nMenggigil karena angin terlalu taja', 'musikal 4.jpg'),
('', 'M009', 'Perpisahan', 'Suaranya masih ada di antara kesiur angin di pohon kota raya sesiapa menangkap pesan\r\nterkirim dari ', 'dramamusikal.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sistem_pembayaran`
--

CREATE TABLE `sistem_pembayaran` (
  `no` varchar(20) NOT NULL,
  `id_sistempembayaran` varchar(20) NOT NULL,
  `sistem_pembayaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sistem_pembayaran`
--

INSERT INTO `sistem_pembayaran` (`no`, `id_sistempembayaran`, `sistem_pembayaran`) VALUES
('', 'SP001', 'Transfer'),
('', 'SP002', 'Kartu Kredit'),
('', 'SP003', 'DANA  [1122334 AN. Aulia]'),
('', 'SP004', 'BCA  [1122334 AN. Aulia]');

-- --------------------------------------------------------

--
-- Table structure for table `slot_waktu`
--

CREATE TABLE `slot_waktu` (
  `no` varchar(20) NOT NULL,
  `id_slot_waktu` varchar(20) NOT NULL,
  `slot_waktu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slot_waktu`
--

INSERT INTO `slot_waktu` (`no`, `id_slot_waktu`, `slot_waktu`) VALUES
('', 'T001', '20.00'),
('', 'T002', '18.00'),
('', 'T003', '17.00');

-- --------------------------------------------------------

--
-- Table structure for table `status_pembayaran`
--

CREATE TABLE `status_pembayaran` (
  `id_statuspembayaran` varchar(20) NOT NULL,
  `id_faktur` varchar(20) NOT NULL,
  `status_pembayaran` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_pembayaran`
--

INSERT INTO `status_pembayaran` (`id_statuspembayaran`, `id_faktur`, `status_pembayaran`, `foto`) VALUES
('ST001', 'FK001', 'Menunggu', ''),
('ST002', 'FK002', 'Lunas', 'tf.jfif'),
('ST003', 'FK003', 'Menunggu', ''),
('ST004', 'FK001', 'Sudah Dibayar', 'tf.jfif'),
('ST005', 'FK002', 'Menunggu', ''),
('ST006', 'FK003', 'Lunas', 'bukti1.jfif'),
('ST007', 'FK004', 'Menunggu', ''),
('ST008', 'FK004', 'Menunggu', ''),
('ST009', 'FK005', 'Menunggu', ''),
('ST010', 'FK006', 'Menunggu', ''),
('ST011', 'FK007', 'Menunggu', ''),
('ST012', 'FK008', 'Menunggu', ''),
('ST013', 'FK009', 'Sudah Dibayar', '61cqyellow.jpg'),
('ST014', 'FK009', 'Sudah Dibayar', 'small_57blockman.jpg'),
('ST015', 'FK010', 'Menunggu', ''),
('ST016', 'FK011', 'Menunggu', ''),
('ST017', 'FK010', 'Menunggu', ''),
('ST018', 'FK001', 'Lunas', 'bukti1.jfif'),
('ST019', 'FK002', 'Menunggu', ''),
('ST020', 'FK003', 'Menunggu', ''),
('ST021', 'FK004', 'Sudah Dibayar', 'tf.jfif'),
('ST022', 'FK005', 'Menunggu', ''),
('ST023', 'FK001', 'Lunas', 'bukti1.jfif'),
('ST024', 'FK002', 'Menunggu', ''),
('ST025', 'FK003', 'Sudah Dibayar', 'tf.jfif'),
('ST026', 'FK001', 'Lunas', 'bukti1.jfif'),
('ST027', 'FK002', 'Menunggu', ''),
('ST028', 'FK003', 'Sudah Dibayar', 'tf.jfif'),
('ST029', 'FK004', 'Menunggu', ''),
('ST030', 'FK005', 'Lunas', '2.jfif'),
('ST031', 'FK006', 'Lunas', '1.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` varchar(20) NOT NULL,
  `id_faktur` varchar(20) NOT NULL,
  `no_kursitiket` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `id_faktur`, `no_kursitiket`) VALUES
('TK001', 'FK001', 'E02,E03'),
('TK002', 'FK002', 'V01'),
('TK003', 'FK003', 'R01,R03'),
('TK004', 'FK004', 'E01'),
('TK005', 'FK005', 'E04'),
('TK006', 'FK006', 'R04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id_diskon`);

--
-- Indexes for table `faktur`
--
ALTER TABLE `faktur`
  ADD PRIMARY KEY (`id_faktur`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_jadwaltayang` (`id_jadwaltayang`),
  ADD KEY `id_jenistiket` (`id_jenistiket`),
  ADD KEY `id_sistempembayaran` (`id_sistempembayaran`),
  ADD KEY `id_statuspembayaran` (`id_statuspembayaran`),
  ADD KEY `id_diskon` (`id_diskon`);

--
-- Indexes for table `jadwal_tayang`
--
ALTER TABLE `jadwal_tayang`
  ADD PRIMARY KEY (`id_jadwaltayang`),
  ADD KEY `id_musikal` (`id_musikal`),
  ADD KEY `id_slot_waktu` (`id_slot_waktu`);

--
-- Indexes for table `jenis_tiket`
--
ALTER TABLE `jenis_tiket`
  ADD PRIMARY KEY (`id_jenistiket`),
  ADD KEY `id_diskon` (`id_diskon`);

--
-- Indexes for table `kursi`
--
ALTER TABLE `kursi`
  ADD PRIMARY KEY (`id_kursi`),
  ADD KEY `id_jenistiket` (`id_jenistiket`);

--
-- Indexes for table `musikal`
--
ALTER TABLE `musikal`
  ADD PRIMARY KEY (`id_musikal`);

--
-- Indexes for table `sistem_pembayaran`
--
ALTER TABLE `sistem_pembayaran`
  ADD PRIMARY KEY (`id_sistempembayaran`);

--
-- Indexes for table `slot_waktu`
--
ALTER TABLE `slot_waktu`
  ADD PRIMARY KEY (`id_slot_waktu`);

--
-- Indexes for table `status_pembayaran`
--
ALTER TABLE `status_pembayaran`
  ADD PRIMARY KEY (`id_statuspembayaran`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`),
  ADD UNIQUE KEY `id_faktur` (`id_faktur`),
  ADD UNIQUE KEY `id_faktur_2` (`id_faktur`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faktur`
--
ALTER TABLE `faktur`
  ADD CONSTRAINT `faktur_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON UPDATE CASCADE,
  ADD CONSTRAINT `faktur_ibfk_3` FOREIGN KEY (`id_jenistiket`) REFERENCES `jenis_tiket` (`id_jenistiket`) ON UPDATE CASCADE;

--
-- Constraints for table `jadwal_tayang`
--
ALTER TABLE `jadwal_tayang`
  ADD CONSTRAINT `jadwal_tayang_ibfk_1` FOREIGN KEY (`id_musikal`) REFERENCES `musikal` (`id_musikal`) ON UPDATE CASCADE;

--
-- Constraints for table `jenis_tiket`
--
ALTER TABLE `jenis_tiket`
  ADD CONSTRAINT `jenis_tiket_ibfk_1` FOREIGN KEY (`id_diskon`) REFERENCES `diskon` (`id_diskon`);

--
-- Constraints for table `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `tiket_ibfk_1` FOREIGN KEY (`id_faktur`) REFERENCES `faktur` (`id_faktur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
