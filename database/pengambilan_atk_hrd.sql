-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 09:22 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengambilan_atk_hrd`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kat` int(11) NOT NULL,
  `nm_kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kat`, `nm_kategori`) VALUES
(1, 'Kertas'),
(2, 'Alat Menulis'),
(3, 'Elektronik'),
(4, 'Buku Tulis'),
(5, 'Alat Tempel'),
(6, 'Banner');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_sat` int(11) NOT NULL,
  `satuan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_sat`, `satuan`) VALUES
(1, 'Rim'),
(2, 'Lusin'),
(3, 'Pack'),
(4, 'Pcs'),
(5, 'Unit');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ambil_atk`
--

CREATE TABLE `tb_ambil_atk` (
  `id` int(11) NOT NULL,
  `no_ambilatk` varchar(128) NOT NULL,
  `user_nama` varchar(255) NOT NULL,
  `nm_barang` varchar(255) NOT NULL,
  `kat_barang` varchar(128) NOT NULL,
  `nama_pt` varchar(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `sat` varchar(128) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `tgl_permintaan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ambil_atk`
--

INSERT INTO `tb_ambil_atk` (`id`, `no_ambilatk`, `user_nama`, `nm_barang`, `kat_barang`, `nama_pt`, `qty`, `sat`, `keperluan`, `tgl_permintaan`) VALUES
(1, '1', 'idris_tes1', 'Buku', 'Kertas', 'PT MSAL (HO)', 12, 'PCS', 'a', '2021-05-19 12:17:10'),
(2, '1', 'idris_tes1', 'Pulpen', 'Alat Menulis', 'PT MSAL (HO)', 20, 'Pcs', 'Untuk Menulis Puisi', '2021-05-20 08:58:10'),
(3, '1', 'idris_tes1', 'Penghapus', 'Alat Menulis', 'PT MSAL (HO)', 5, 'Pcs', 'Ya untuk ngapus', '2021-05-20 09:54:19'),
(4, '1', 'IDRIS ABDUL AZIS', 'Spidol', 'Alat Menulis', 'PT MSAL (HO)', 12, 'Pcs', 'Spidol', '2021-05-20 10:05:04'),
(5, '1', 'idris_tes1', 'Penggaris', 'Alat Menulis', 'PT MAPA', 20, 'Pcs', '', '2021-05-20 14:19:55');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `kd_inputatk` varchar(128) NOT NULL,
  `nm_barang` varchar(128) NOT NULL,
  `merek` varchar(128) NOT NULL,
  `harga` varchar(1000) NOT NULL,
  `kat_barang` varchar(128) NOT NULL,
  `kd_barang` varchar(128) NOT NULL,
  `qty` int(255) NOT NULL,
  `nama_pt` varchar(128) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `tgl_masuk_barang` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `kd_inputatk`, `nm_barang`, `merek`, `harga`, `kat_barang`, `kd_barang`, `qty`, `nama_pt`, `satuan`, `keterangan`, `tgl_masuk_barang`) VALUES
(1, '', 'Buku', '', '', 'Kertas', 'B01', 2, 'PT MSAL (HO)', 'Pcs', '', '2021-05-18 10:16:02'),
(2, '', 'Flashdisk', '', '', 'Alat Menulis', 'F01', 20, 'PT MSAL (HO)', 'Unit', '', '2021-05-18 10:43:33'),
(3, '', 'Harddisk', '', '', 'Elektronik', 'H01', 5, 'PT MSAL (HO)', 'Unit', '', '2021-05-18 12:03:45'),
(4, '', 'Buku', '', '', 'Kertas', 'B01', 10, 'PT MSAL (HO)', 'Pcs', '', '2021-05-18 12:46:01'),
(5, '', 'Pulpen', '', '', 'Alat Menulis', 'AM-02', 10, 'PT MSAL (HO)', 'Pcs', '', '2021-05-18 14:14:37'),
(6, '', 'Pulpen', '', '', 'Alat Menulis', 'AM-02', 26, 'PT MSAL (HO)', 'Pcs', '', '2021-05-18 14:41:58'),
(8, '', 'Penghapus', '', '', 'Alat Menulis', 'AM-03', 12, 'PT MSAL (HO)', 'Pcs', '', '2021-05-19 10:02:19'),
(9, '', 'Spidol', '', '', 'Alat Menulis', 'AM-002', 12, 'PT MSAL (HO)', 'Pcs', '', '2021-05-19 13:50:31'),
(10, '', 'HVS', '', '', 'Kertas', 'KERT-001', 10, 'PT MSAL (HO)', 'Lusin', '', '2021-05-20 10:11:09'),
(11, '', 'HVS', '', '', 'Kertas', 'KERT-001', 100, 'PT MSAL (HO)', 'Pcs', '', '2021-05-20 10:12:24'),
(12, '', 'HVS', '', '', 'Kertas', 'KERT-001', 10, 'PT MSAL (HO)', 'Pcs', '', '2021-05-20 10:13:10'),
(13, '', 'HVS', '', '', 'Kertas', 'KERT-001', 200, 'PT MSAL (HO)', 'Pcs', '', '2021-05-20 10:21:54'),
(14, '', 'Rautan', '2B', '150000', 'Alat Menulis', 'kd', 20, 'PT MSAL (HO)', 'Pcs', 'Rautan mahal', '2021-05-20 11:58:14'),
(16, 'MSAL20210520082', 'Penggaris', 'Butterfly', '12000', 'Alat Menulis', 'kd', 48, 'PT MAPA', 'Pcs', 'Ya untuk garis', '2021-05-20 13:09:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kat`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_sat`);

--
-- Indexes for table `tb_ambil_atk`
--
ALTER TABLE `tb_ambil_atk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_sat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_ambil_atk`
--
ALTER TABLE `tb_ambil_atk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
