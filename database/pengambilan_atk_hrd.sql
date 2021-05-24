-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2021 at 11:02 AM
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
  `nama_pt` varchar(255) NOT NULL,
  `jml_item_atk` int(11) NOT NULL,
  `tgl_permintaan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ambil_atk`
--

INSERT INTO `tb_ambil_atk` (`id`, `no_ambilatk`, `user_nama`, `nama_pt`, `jml_item_atk`, `tgl_permintaan`) VALUES
(5, 'AMBIL-ATK-20210523-001', 'IDRIS ABDUL AZIS', 'PT MSAL (HO)', 3, '2021-05-23 17:33:40');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `kd_inputatk` varchar(128) NOT NULL,
  `nm_barang` varchar(128) NOT NULL,
  `merek` varchar(128) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
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
(16, 'MSAL20210520082', 'Penggaris', 'Butterfly', '12000', 'Alat Menulis', 'kd', 48, 'PT MAPA', 'Pcs', 'Ya untuk garis', '2021-05-20 13:09:20'),
(17, 'ATK-20210520669', 'Penghapus', '2B', '30000', 'Alat Menulis', 'kd', 120, 'PT MSAL (HO)', 'Pcs', 'Untuk Menghapus', '2021-05-20 14:36:44'),
(18, 'ATK-20210520036', 'Pulpen', 'Fastel', '10000', 'Alat Menulis', 'kd', 22, 'PT MSAL (HO)', 'Pack', 'menulis', '2021-05-20 14:52:33'),
(19, 'ATK-20210520018', 'Pulpen', 'Butterfly', '12000', 'Alat Menulis', 'kd', 54, 'PT MSAL (HO)', 'Pcs', 'Pulpen satuan pcs', '2021-05-20 15:00:50'),
(20, 'ATK-20210520164', 'Flashdisk', 'Sandisk', '90000', 'Elektronik', 'kd', 24, 'PT MSAL (HO)', 'Pcs', 'Ket', '2021-05-20 16:02:31');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_ambilatk`
--

CREATE TABLE `tb_detail_ambilatk` (
  `id_detail_ambilatk` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `no_ambilatk` varchar(128) NOT NULL,
  `nm_barang` varchar(128) NOT NULL,
  `kd_inputatk` varchar(128) NOT NULL,
  `kat_barang` varchar(128) NOT NULL,
  `qty` int(11) NOT NULL,
  `sat` varchar(128) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_ambilatk`
--

INSERT INTO `tb_detail_ambilatk` (`id_detail_ambilatk`, `no_urut`, `no_ambilatk`, `nm_barang`, `kd_inputatk`, `kat_barang`, `qty`, `sat`, `harga`, `keperluan`, `status`) VALUES
(14, 1, 'AMBIL-ATK-20210523-001', 'Flashdisk', 'ATK-20210520164', 'Elektronik', 12, 'Pcs', '0', 'Untuk Membackup File', 1),
(15, 1, 'AMBIL-ATK-20210523-001', 'Pulpen', 'ATK-20210520018', 'Alat Menulis', 20, 'Pcs', '0', 'Menulis', 1),
(16, 1, 'AMBIL-ATK-20210523-001', 'Penghapus', 'ATK-20210520669', 'Alat Menulis', 10, 'Pcs', '0', 'Menghapus tinta kemiskinan', 1),
(22, 2, 'AMBIL-ATK-20210524-002', 'Flashdisk', 'ATK-20210520164', 'Elektronik', 1, 'Pcs', '90000', 'a', 0),
(23, 2, 'AMBIL-ATK-20210524-002', 'Pulpen', 'ATK-20210520018', 'Alat Menulis', 4, 'Pcs', '12000', 'aadw', 0),
(41, 3, 'AMBIL-ATK-20210524-003', 'Pulpen', 'ATK-20210520036', 'Alat Menulis', 7, 'Pack', '10000', 'asdaw', 0),
(42, 4, 'AMBIL-ATK-20210524-004', 'Flashdisk', 'ATK-20210520164', 'Elektronik', 3, 'Pcs', '90000', 'adw', 0),
(43, 4, 'AMBIL-ATK-20210524-004', 'Penggaris', 'MSAL20210520082', 'Alat Menulis', 12, 'Pcs', '12000', 'adw', 0);

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
-- Indexes for table `tb_detail_ambilatk`
--
ALTER TABLE `tb_detail_ambilatk`
  ADD PRIMARY KEY (`id_detail_ambilatk`);

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
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_detail_ambilatk`
--
ALTER TABLE `tb_detail_ambilatk`
  MODIFY `id_detail_ambilatk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
