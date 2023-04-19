-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2022 at 02:44 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

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
  `nama_admin` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
('A001', 'Aulia', 'aulia', 'aulia'),
('A004', 'Azzam', 'nana', 'nana'),
('A005', 'jaemin', 'nana', '123');

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
('C002', 'Raisa', '081218778110', 'raisa@gmail.com', 'raisa', '123'),
('C010', 'Ica', '085266944093', 'ica@gmail.com', 'ica', '123'),
('C011', 'Aji', '08736647382', 'aji@gmail.com', 'aji', '123'),
('C012', 'Nissa', '085266944093', 'nissa@gmail.com', 'nissa', '123'),
('C013', 'Yumi woong', '085266944093', 'yumi@gmail.com', 'yumi', '123'),
('C015', 'mueza', '08123232443', 'mueza@gmail.com', 'mueza', '123');

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
('', 'D006', 'Batch Two', '4'),
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
('FK009', 'C002', 'D007', 'J007', '2021-11-30', '01:19:19', 1, 200000, 'SP003', 'ST034', 'D007', 'M005'),
('FK010', 'C002', 'D008', 'J007', '2021-11-29', '11:51:45', 1, 150000, 'SP004', 'ST035', 'D007', 'M007'),
('FK011', 'C002', 'D008', 'J007', '2021-12-06', '00:43:49', 1, 150000, 'SP004', 'ST036', 'D007', 'M007'),
('FK012', 'C002', 'D007', 'J005', '2021-12-07', '02:45:18', 1, 200000, 'SP003', 'ST037', 'D004', 'M005'),
('FK013', 'C002', 'D009', 'J007', '2021-12-07', '04:26:03', 3, 450000, 'ST038', 'ST038', 'D007', 'M006'),
('FK014', 'C002', 'D009', 'J007', '2021-12-07', '04:26:56', 4, 600000, 'SP003', 'ST039', 'D007', 'M006'),
('FK015', 'C002', 'D009', 'J007', '2021-12-07', '04:27:34', 3, 450000, 'ST040', 'ST040', 'D007', 'M006'),
('FK016', 'C002', 'D009', 'J005', '2021-12-07', '04:29:20', 9, 1800000, 'SP003', 'ST041', 'D004', 'M006'),
('FK017', 'C002', 'D009', 'J0006', '2021-12-20', '10:46:26', 1, 100000, 'SP003', 'ST043', 'D006', 'M006'),
('FK018', 'C002', 'D007', 'J0006', '2021-12-20', '11:10:15', 2, 200000, 'SP003', 'ST044', 'D006', 'M005'),
('FK019', 'C002', 'D009', 'J0006', '2021-12-20', '11:10:58', 1, 100000, 'SP003', 'ST045', 'D006', 'M006'),
('FK020', 'C002', 'D007', 'J005', '2021-12-22', '08:45:43', 2, 400000, 'SP003', 'ST046', 'D004', 'M005'),
('FK021', 'C015', 'D009', 'J007', '2021-12-22', '12:51:51', 4, 600000, 'SP003', 'ST047', 'D007', 'M006'),
('FK022', 'C015', 'D009', 'J007', '2021-12-22', '13:13:14', 1, 150000, 'ST048', 'ST048', 'D007', 'M006'),
('FK023', 'C015', 'D011', 'J005', '2021-12-22', '13:19:18', 1, 200000, 'ST049', 'ST049', 'D007', 'M009'),
('FK024', 'C002', 'D011', 'J007', '2021-12-22', '15:41:43', 1, 150000, 'ST054', 'ST054', 'D007', 'M009'),
('FK025', 'C002', 'D011', 'J005', '2021-12-22', '15:44:43', 9, 1800000, 'ST055', 'ST055', 'D007', 'M009'),
('FK026', 'C010', 'D011', 'J0006', '2021-12-23', '03:39:39', 1, 100000, 'ST056', 'ST056', 'D006', 'M009');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_tayang`
--

CREATE TABLE `jadwal_tayang` (
  `no` varchar(20) NOT NULL,
  `id_jadwaltayang` varchar(20) NOT NULL,
  `tanggal_show` varchar(20) NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `id_slot_waktu` varchar(20) NOT NULL,
  `id_musikal` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_tayang`
--

INSERT INTO `jadwal_tayang` (`no`, `id_jadwaltayang`, `tanggal_show`, `tanggal_selesai`, `keterangan`, `id_slot_waktu`, `id_musikal`) VALUES
('', 'D007', '16 Desember 2021', '2022-01-01', 'Sedang Tayang', 'T003', 'M005'),
('', 'D008', '14 Oktober 2021', '2021-12-13', 'Kadaluarsa', 'T003', 'M007'),
('', 'D009', '1 Desember 2021', '2022-02-01', 'Sedang Tayang', 'T004', 'M006'),
('', 'D011', '14 Desember 2021', '2022-01-14', 'Sedang Tayang', 'T003', 'M009');

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
('', 'J0006', 'EKONOMI', 100000, 'D006'),
('', 'J005', 'VVIP', 200000, 'D007'),
('', 'J007', 'REGULAR', 150000, 'D007');

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
('', 'KR005', 'V01', 'J003', 'Booking'),
('', 'KR006', 'V012', 'J003', 'Tersedia'),
('', 'KR007', 'V03', 'J003', 'Tersedia'),
('', 'KR008', 'R01T', 'J007', 'Booking'),
('', 'KR009', 'R02T', 'J007', 'Booking'),
('', 'KR010', 'R03T', 'J007', 'Booking'),
('', 'KR011', 'R04T', 'J007', 'Booking'),
('', 'KR012', 'R05T', 'J007', 'Booking'),
('', 'KR013', 'R06D', 'J007', 'Booking'),
('', 'KR014', 'R07T', 'J007', 'Booking'),
('', 'KR015', 'R08T', 'J007', 'Tersedia'),
('', 'KR016', 'R09T', 'J007', 'Tersedia'),
('', 'KR017', 'R10T', 'J007', 'Tersedia'),
('', 'KR018', 'V01D', 'J005', 'Booking'),
('', 'KR019', 'V02D', 'J005', 'Booking'),
('', 'KR020', 'V03D', 'J005', 'Booking'),
('', 'KR021', 'V04D', 'J005', 'Booking'),
('', 'KR022', 'V05D', 'J005', 'Booking'),
('', 'KR023', 'V06D', 'J005', 'Booking'),
('', 'KR024', 'V07D', 'J005', 'Booking'),
('', 'KR025', 'V08D', 'J005', 'Booking'),
('', 'KR026', 'V09D', 'J005', 'Booking'),
('', 'KR027', 'V10D', 'J005', 'Booking'),
('', 'KR028', 'E01B', 'J0006', 'Tersedia'),
('', 'KR029', 'E02B', 'J0006', 'Tersedia'),
('', 'KR030', 'E03B', 'J0006', 'Tersedia'),
('', 'KR031', 'E04B', 'J0006', 'Tersedia'),
('', 'KR032', 'E05B', 'J0006', 'Tersedia'),
('', 'KR033', 'E06B', 'J0006', 'Tersedia'),
('', 'KR034', 'E07B', 'J0006', 'Booking'),
('', 'KR035', 'E08B', 'J0006', 'Tersedia'),
('', 'KR036', 'E09B', 'J0006', 'Tersedia'),
('', 'KR037', 'E10B', 'J0006', 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `musikal`
--

CREATE TABLE `musikal` (
  `no` varchar(20) NOT NULL,
  `id_musikal` varchar(20) NOT NULL,
  `nama_musikal` varchar(50) NOT NULL,
  `Deskripsi` varchar(500) NOT NULL,
  `Foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `musikal`
--

INSERT INTO `musikal` (`no`, `id_musikal`, `nama_musikal`, `Deskripsi`, `Foto`) VALUES
('', 'M005', 'Raya and The Last Dragon', 'Raya, a warrior, sets out to track down Sisu, a dragon, who transferred all her powers into a magical gem which is now scattered all over the kingdom of Kumandra, dividing its people.', 'b8aa77b3a936180b0b27507b7de11034.jpg'),
('', 'M006', 'Doraemon Stand by me', 'Sewashi and Doraemon find themselves way back in time and meet Nobita. It is up to Doraemon to take care of Nobita or else he will not return to the present.', '093656700_1600854405-Doraemon__Stand_by_Me_Landscape.jpg'),
('', 'M007', 'Pinnocchio', 'Pinocchio was carved by a woodcarver named Geppetto in a Tuscan village. He was created as a wooden ', 'maxresdefault.jpeg'),
('', 'M009', 'Moana', 'Moana, daughter of chief Tui, embarks on a journey to return the heart of goddess Te Fitti from Maui, a demigod, after the plants and the fish on her island start dying due to a blight.', 'scale.jpeg');

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
('', 'T003', '17.00'),
('', 'T004', '16.00'),
('', 'T005', '15.00');

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
('ST031', 'FK006', 'Lunas', '1.jfif'),
('ST032', 'FK007', 'Menunggu', ''),
('ST033', 'FK008', 'Sudah Dibayar', '2.png'),
('ST034', 'FK009', 'Lunas', '111.png'),
('ST035', 'FK010', 'Lunas', '2.png'),
('ST036', 'FK011', 'Batal', ''),
('ST037', 'FK012', 'Lunas', '1.png'),
('ST038', 'FK013', 'Menunggu', ''),
('ST039', 'FK014', 'Lunas', '1.png'),
('ST040', 'FK015', 'Menunggu', ''),
('ST041', 'FK016', 'Lunas', '2.png'),
('ST042', 'FK017', 'Menunggu', ''),
('ST043', 'FK017', 'Lunas', '11.png'),
('ST044', 'FK018', 'Lunas', '2.png'),
('ST045', 'FK019', 'Sudah Dibayar', '2.png'),
('ST046', 'FK020', 'Lunas', '22.png'),
('ST047', 'FK021', 'Lunas', '22.png'),
('ST048', 'FK022', 'Menunggu', ''),
('ST049', 'FK023', 'Menunggu', ''),
('ST050', 'FK024', 'Menunggu', ''),
('ST051', 'FK024', 'Menunggu', ''),
('ST052', 'FK024', 'Menunggu', ''),
('ST053', 'FK024', 'Menunggu', ''),
('ST054', 'FK024', 'Menunggu', ''),
('ST055', 'FK025', 'Menunggu', ''),
('ST056', 'FK026', 'Menunggu', '');

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
('TK009', 'FK009', 'R01'),
('TK010', 'FK010', 'R02'),
('TK011', 'FK011', 'R01'),
('TK012', 'FK012', 'V01D'),
('TK013', 'FK013', 'R01T,R02T,R03T'),
('TK014', 'FK014', 'R04T,R05T,R06D,R07T'),
('TK015', 'FK015', 'R08T,R09T,R10T'),
('TK016', 'FK016', 'V02D,V03D,V04D,V05D,'),
('TK017', 'FK017', 'E04B'),
('TK018', 'FK018', 'E01B,E03B'),
('TK019', 'FK019', 'E02B'),
('TK020', 'FK020', 'V01D,V02D'),
('TK021', 'FK021', 'R01T,R02T,R03T,R04T'),
('TK022', 'FK022', 'R04T'),
('TK023', 'FK023', 'V01D'),
('TK024', 'FK024', 'R07T'),
('TK025', 'FK025', 'V02D,V03D,V04D,V05D,'),
('TK026', 'FK026', 'E07B');

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
  ADD CONSTRAINT `faktur_ibfk_3` FOREIGN KEY (`id_jenistiket`) REFERENCES `jenis_tiket` (`id_jenistiket`) ON UPDATE CASCADE,
  ADD CONSTRAINT `faktur_ibfk_4` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faktur_ibfk_5` FOREIGN KEY (`id_jadwaltayang`) REFERENCES `jadwal_tayang` (`id_jadwaltayang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal_tayang`
--
ALTER TABLE `jadwal_tayang`
  ADD CONSTRAINT `jadwal_tayang_ibfk_1` FOREIGN KEY (`id_musikal`) REFERENCES `musikal` (`id_musikal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_tayang_ibfk_2` FOREIGN KEY (`id_slot_waktu`) REFERENCES `slot_waktu` (`id_slot_waktu`) ON DELETE CASCADE ON UPDATE CASCADE;

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
