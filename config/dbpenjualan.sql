-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2022 at 09:49 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpenjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `namabarang` varchar(255) NOT NULL,
  `harga` text NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telp` int(11) NOT NULL,
  `prov` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `pos` int(11) NOT NULL,
  `status` enum('Tidak Disetujui','Disetujui','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `namabarang`, `harga`, `nama`, `alamat`, `telp`, `prov`, `kota`, `pos`, `status`) VALUES
(2, 'Paracetamol', '5000', 'syamsul rijal asri', 'dsdsd', 232323, 'sdsds', 'sdsd', 12121, 'Tidak Disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','user','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `level`) VALUES
(1, 'rijal', '$2y$10$07DsLc5eiOmXGAJQ/VsV8u7VQ4VgcPjT0gRyYGdmJu3FkVTvIgQ1O', 'user'),
(4, 'admin', '$2y$10$grMX8Idqu1qfbfjaBSt6H.CrkgS2EbfOEd3xXRCAycz5KaV9/TIui', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_barang` int(11) NOT NULL,
  `namabarang` varchar(255) NOT NULL,
  `harga` text NOT NULL,
  `stock` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_barang`, `namabarang`, `harga`, `stock`, `foto`, `keterangan`, `tanggal`) VALUES
(3, 'Paracetamol', '5000', 2, '09102022190928paracetamol.jpg', 'Tersedia', '2022-10-09');

-- --------------------------------------------------------

--
-- Table structure for table `perlengkapan`
--

CREATE TABLE `perlengkapan` (
  `id_barang` int(11) NOT NULL,
  `namabarang` varchar(255) NOT NULL,
  `harga` text NOT NULL,
  `stock` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perlengkapan`
--

INSERT INTO `perlengkapan` (`id_barang`, `namabarang`, `harga`, `stock`, `foto`, `keterangan`, `tanggal`) VALUES
(1, 'AA', '111', 1, '09102022211159paracetamol.jpg', 'sdds', '2022-10-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `perlengkapan`
--
ALTER TABLE `perlengkapan`
  ADD PRIMARY KEY (`id_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `perlengkapan`
--
ALTER TABLE `perlengkapan`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
