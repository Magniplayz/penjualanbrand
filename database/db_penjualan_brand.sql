-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2021 at 11:01 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penjualan_brand`
--

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `uang_pembeli` double NOT NULL,
  `total_harga` double NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `id_bayar` varchar(5) NOT NULL,
  `id_karyawan` varchar(7) NOT NULL,
  `no_antrean` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bayar`
--

INSERT INTO `bayar` (`uang_pembeli`, `total_harga`, `tanggal_bayar`, `id_bayar`, `id_karyawan`, `no_antrean`) VALUES
(1000000, 1000000, '2021-06-15', 'b-084', 'p-34578', 21967);

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE `harga` (
  `ukuran_produk` varchar(4) NOT NULL,
  `harga_produk` double NOT NULL,
  `id_harga` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`ukuran_produk`, `harga_produk`, `id_harga`) VALUES
('M', 130000, 'h-031'),
('L', 140000, 'h-492'),
('S', 125000, 'h-628'),
('XXXL', 170000, 'h-691'),
('XL', 150000, 'h-852');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` varchar(7) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `email_karyawan` varchar(50) NOT NULL,
  `pin_karyawan` int(4) NOT NULL,
  `nohp_karyawan` varchar(13) NOT NULL,
  `pass_karyawan` varchar(100) NOT NULL,
  `level` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `email_karyawan`, `pin_karyawan`, `nohp_karyawan`, `pass_karyawan`, `level`) VALUES
('k-25709', 'Owner', 'owner@gmail.com', 9752, '08123123123', 'owner', 1),
('k-58469', 'Tes1', 'tes1@gmail.com', 5613, '000', 'tes', 0),
('p-34578', 'Karyawan', 'karyawan@gmail.com', 1234, '081345776756', 'karyawan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `noinvoice` varchar(100) NOT NULL,
  `id_pembeli` varchar(7) NOT NULL,
  `id_produk` varchar(7) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` varchar(7) NOT NULL,
  `nama_pembeli` varchar(30) NOT NULL,
  `alamat_pembeli` varchar(50) NOT NULL,
  `nohp_pembeli` varchar(13) NOT NULL,
  `email_pembeli` varchar(50) NOT NULL,
  `pin_pembeli` int(4) NOT NULL,
  `pass_pembeli` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama_pembeli`, `alamat_pembeli`, `nohp_pembeli`, `email_pembeli`, `pin_pembeli`, `pass_pembeli`) VALUES
('u-18903', 'Pembeli', 'Jl. Raya', '082145673487', 'pembeli@gmail.com', 2075, 'pembeli');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(7) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `id_harga` varchar(5) NOT NULL,
  `foto_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `id_harga`, `foto_produk`) VALUES
('p-36915', 'TRAVERN BASIC WHITE', 'h-492', 'TRAVERN_BASIC_WHITE14062021-000145.jpg'),
('p-37521', 'Kaos 1', 'h-852', 'Kaos_113062021-051957.jpg'),
('p-80612', 'TRAVERN Green on Black', 'h-852', 'TRAVERN_Green_on_Black14062021-000110.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `produk_keluar`
--

CREATE TABLE `produk_keluar` (
  `id_produk` varchar(7) NOT NULL,
  `id_keluar` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_keluar` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk_keluar`
--

INSERT INTO `produk_keluar` (`id_produk`, `id_keluar`, `jumlah`, `tanggal_keluar`) VALUES
('p-36915', 1, 5, '0000-00-00 00:00:00'),
('p-37521', 2, 2, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `produk_masuk`
--

CREATE TABLE `produk_masuk` (
  `id_produk` varchar(7) NOT NULL,
  `id_masuk` int(11) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk_masuk`
--

INSERT INTO `produk_masuk` (`id_produk`, `id_masuk`, `jumlah`, `tanggal_masuk`) VALUES
('p-37521', 3, 10, '2021-06-13'),
('p-37521', 4, 5, '2021-06-12'),
('p-36915', 5, 10, '2021-06-14');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `id_karyawan` varchar(7) NOT NULL,
  `no_antrean` int(5) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `id_karyawan`, `no_antrean`, `status`) VALUES
(1, 'p-34578', 21967, 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_produk` varchar(7) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `tanggal_transaksi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_pembeli` varchar(7) NOT NULL,
  `no_antrean` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_produk`, `jumlah`, `id_transaksi`, `tanggal_transaksi`, `id_pembeli`, `no_antrean`) VALUES
('p-36915', 5, 3, '2021-06-13 22:07:16', 'u-18903', 21967),
('p-37521', 2, 4, '2021-06-13 22:07:16', 'u-18903', 21967);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewstok`
-- (See below for the actual view)
--
CREATE TABLE `viewstok` (
`id_produk` varchar(7)
,`jumlah` int(11)
,`tanggal` datetime
,`jenis` varchar(6)
);

-- --------------------------------------------------------

--
-- Structure for view `viewstok`
--
DROP TABLE IF EXISTS `viewstok`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewstok`  AS SELECT `produk_masuk`.`id_produk` AS `id_produk`, `produk_masuk`.`jumlah` AS `jumlah`, `produk_masuk`.`tanggal_masuk` AS `tanggal`, 'masuk' AS `jenis` FROM `produk_masuk` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`id_harga`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `produk_keluar`
--
ALTER TABLE `produk_keluar`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indexes for table `produk_masuk`
--
ALTER TABLE `produk_masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produk_keluar`
--
ALTER TABLE `produk_keluar`
  MODIFY `id_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produk_masuk`
--
ALTER TABLE `produk_masuk`
  MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
