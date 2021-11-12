-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2021 at 11:04 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_payless`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'Henry Manampiring', 'henry', 'abcdefgh'),
(2, 'Levina Lesmana', 'levina', '112358');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(3) NOT NULL,
  `nama_bank` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`) VALUES
(1, 'Mandiri'),
(3, 'BCA');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `id_ekspedisi` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`id_pemesanan`, `jumlah_barang`, `tanggal_pembelian`, `id_user`, `id_bank`, `id_ekspedisi`, `id_admin`) VALUES
(2, 5, '0000-00-00', 3098, 3, 1, NULL),
(3, 5, '2021-01-10', 3098, 1, 1, NULL),
(4, 5, '2021-01-10', 3098, 3, 1, NULL),
(7, 1, '2021-01-10', 3098, 1, 1, NULL),
(8, 1, '2021-01-10', 3098, 1, 1, NULL),
(9, 1, '2021-01-11', 3098, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ekspedisi`
--

CREATE TABLE `ekspedisi` (
  `id_ekspedisi` int(3) NOT NULL,
  `nama_ekspedisi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ekspedisi`
--

INSERT INTO `ekspedisi` (`id_ekspedisi`, `nama_ekspedisi`) VALUES
(1, 'JNE'),
(2, 'Si Cepat');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_sepatu` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_sepatu`, `id_user`, `jumlah`) VALUES
(26, 2, 3098, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sepatu`
--

CREATE TABLE `sepatu` (
  `id_sepatu` int(11) NOT NULL,
  `nama_sepatu` varchar(40) NOT NULL,
  `harga_sepatu` int(11) NOT NULL,
  `foto_sepatu` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sepatu`
--

INSERT INTO `sepatu` (`id_sepatu`, `nama_sepatu`, `harga_sepatu`, `foto_sepatu`, `deskripsi`) VALUES
(2, 'Aerosoles Betunia (Women)', 249000, 'Aerosoles Betunia.jpg', 'Bahan : Kulit '),
(3, 'Brash Abby Long Vamp (Women)', 283000, 'Brash Abby Long Vamp.jpg', 'Bahan : Faux Suede'),
(4, 'Airwalk Legace (Boys)', 279000, 'Airwalk Legace.jpg', 'Bahan : Canvas'),
(5, 'K-Swiss casper Velcro (Boys)', 335000, 'KSwiss casper Velcro.jpg', 'Bahan : Kulit & Sintetis'),
(6, 'Airwalk Legace (Girls)', 223000, 'Airwalk Legace (girls).jpg', 'Bahan : Canvas'),
(7, 'LA Gear Boogie Retro (Girls)', 500000, 'LA Gear Boogie Retro (girls).jpg', 'Bahan : Sintetis'),
(8, 'Safe T-Step Workboot (Boys)', 500000, 'Safe T-Step Workboot (boys).jpg', 'Bahan : Sintetis (pvc) \r\nwaterproof\r\n'),
(9, 'Aerosoles Big Bet (Women)', 200000, 'Aerosoles Big Bet (women).jpg', 'Bahan : Sintetis (pu) '),
(10, 'Safe T-Step Avail Slip On (Women)', 325000, 'Safe T-Step Avail Slip On (women).jpg', 'Bahan : Kain '),
(11, 'Deflex Comfort Claire (women)', 200000, 'Deflex Comfort Claire (women).jpg', 'Bahan : Sintetis (pu) ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(8) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `tanggal_lahir`, `email`, `password`, `no_hp`, `alamat`) VALUES
(3050, 'Aditya Mahya', '1995-01-05', 'aditmahya@gmail.com', '12345678', '081336978539', 'Perum Mutiara Citra Blok A-01'),
(3096, 'Nabila Milena', '2001-01-19', 'nabilamilena@gmail.com', '23456789', '081223456781', 'Perum Angkasa Raya Blok 11C'),
(3098, 'Fany', '2000-10-30', 'parama@gmail.com', '12345', '083144290138', 'Sumber taman'),
(3099, 'Randy', '2001-10-01', 'randyansari6@gmail.com', '12345', '97978687765', 'Probolinggo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `uji` (`id_user`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_bank` (`id_bank`),
  ADD KEY `id_ekspedisi` (`id_ekspedisi`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_admin_2` (`id_admin`);

--
-- Indexes for table `ekspedisi`
--
ALTER TABLE `ekspedisi`
  ADD PRIMARY KEY (`id_ekspedisi`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_sepatu` (`id_sepatu`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `sepatu`
--
ALTER TABLE `sepatu`
  ADD PRIMARY KEY (`id_sepatu`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ekspedisi`
--
ALTER TABLE `ekspedisi`
  MODIFY `id_ekspedisi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `sepatu`
--
ALTER TABLE `sepatu`
  MODIFY `id_sepatu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3100;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD CONSTRAINT `detail_pemesanan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `detail_pemesanan_ibfk_2` FOREIGN KEY (`id_bank`) REFERENCES `bank` (`id_bank`),
  ADD CONSTRAINT `detail_pemesanan_ibfk_3` FOREIGN KEY (`id_ekspedisi`) REFERENCES `ekspedisi` (`id_ekspedisi`),
  ADD CONSTRAINT `detail_pemesanan_ibfk_4` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`id_sepatu`) REFERENCES `sepatu` (`id_sepatu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
