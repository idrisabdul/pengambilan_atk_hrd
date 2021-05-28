-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2021 at 01:29 PM
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
(6, 'AMBIL-ATK-20210524-004', 'idris', 'PT MSAL (HO)', 0, '2021-05-24 19:56:31'),
(8, 'AMBIL-ATK-20210524-006', 'IDRIS ABDUL AZIS', 'PT MSAL (HO)', 0, '2021-05-24 20:05:05'),
(10, 'AMBIL-ATK-20210524-007', 'idris', 'PT MSAL (HO)', 0, '2021-05-24 20:32:40'),
(13, 'AMBIL-ATK-20210525-0010', 'ANANDA AQILLA SABRINA', 'PT MULIA SAWIT AGRO LESTARI (HO)', 0, '2021-05-25 09:07:17'),
(15, 'AMBIL-ATK-20210525-0012', 'ADI TEGUH PRABOWO', 'PT MULIA SAWIT AGRO LESTARI (HO)', 0, '2021-05-25 11:36:28'),
(16, 'AMBIL-ATK-20210525-0013', 'MUHAMMAD ALVI BISYRI', 'PT MULIA SAWIT AGRO LESTARI (PKS)', 0, '2021-05-25 12:58:48'),
(20, 'AMBIL-ATK-20210525-0014', 'ERLANGGA RAMADUNI PRAMUDIA', 'PT MULIA SAWIT AGRO LESTARI (HO)', 0, '2021-05-25 15:27:01'),
(21, 'AMBIL-ATK-20210526-0015', 'idris', 'PT MULIA SAWIT AGRO LESTARI (HO)', 0, '2021-05-26 12:38:21'),
(22, 'ATK-20210526-0016', 'idris', 'PT MULIA SAWIT AGRO LESTARI (HO)', 0, '2021-05-26 19:38:30'),
(23, 'ATK-20210527-0017', 'idris', 'PT MULIA SAWIT AGRO LESTARI (HO)', 0, '2021-05-27 13:57:41'),
(24, 'ATK-20210527-0018', 'ISMIYA PEBRI YANI', 'PT MULIA SAWIT AGRO LESTARI (HO)', 0, '2021-05-27 14:34:36'),
(26, 'ATK-20210528-0020', 'ABDUL ROHMAN', 'PT MULIA SAWIT AGRO LESTARI (HO)', 0, '2021-05-28 10:26:36'),
(27, 'ATK-20210528-0021', 'SILVI FATIN NABILAH', 'PT MULIA SAWIT AGRO LESTARI (HO)', 0, '2021-05-28 14:36:38');

-- --------------------------------------------------------

--
-- Table structure for table `tb_atk_rusak`
--

CREATE TABLE `tb_atk_rusak` (
  `id_atk` int(11) NOT NULL,
  `user_nama` varchar(255) NOT NULL,
  `nm_barang` varchar(128) NOT NULL,
  `kd_inputatk` varchar(128) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `kat_barang` varchar(128) NOT NULL,
  `qty_rusak` int(11) NOT NULL,
  `alasan` varchar(255) NOT NULL,
  `tgl_retur` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_atk_rusak`
--

INSERT INTO `tb_atk_rusak` (`id_atk`, `user_nama`, `nm_barang`, `kd_inputatk`, `harga`, `kat_barang`, `qty_rusak`, `alasan`, `tgl_retur`) VALUES
(4, 'IDRIS', 'Pulpen', 'ATK-20210520018', '12000', 'Alat Menulis', 8, 'Ga nyata', '0000-00-00 00:00:00'),
(5, 'IDRIS', 'Flashdisk', 'ATK-20210520164', '90000', 'Elektronik', 1, 'Corup', '0000-00-00 00:00:00'),
(6, 'IDRIS', 'HVS', 'ATK-20210527061', '75000', 'Kertas', 6, 'Kertasnya kunyel,', '0000-00-00 00:00:00'),
(7, 'IDRIS', 'Penggaris', 'MSAL20210520082', '12000', 'Alat Menulis', 3, 'Penggarisnya lecet', '0000-00-00 00:00:00'),
(8, 'IDRIS', 'Pulpen', 'ATK-20210520036', '10000', 'Alat Menulis', 1, 'Satunya ga nyata', '0000-00-00 00:00:00'),
(9, 'IDRIS', 'Pulpen', 'ATK-20210520036', '10000', 'Alat Menulis', 2, 'tinta abis', '0000-00-00 00:00:00'),
(10, 'ISMIYA PEBRI YANI', 'Pulpen', 'ATK-20210520036', '10000', 'Alat Menulis', 1, 'tes', '0000-00-00 00:00:00'),
(11, 'SILVI FATIN NABILAH', 'Pensil', 'ATK-20210528355', '12000', 'Alat Menulis', 20, 'Pulpennya jele', '0000-00-00 00:00:00'),
(12, 'IDRIS', 'Penggaris', 'MSAL20210520082', '12000', 'Alat Menulis', 2, 'Penggarisnya patah', '0000-00-00 00:00:00'),
(13, 'IDRIS', 'Pulpen', 'ATK-20210520018', '12000', 'Alat Menulis', 12, 'aa', '0000-00-00 00:00:00'),
(14, 'ISMIYA PEBRI YANI', 'HVS', 'ATK-20210527061', '75000', 'Kertas', 2, 'robek', '0000-00-00 00:00:00'),
(15, 'IDRIS', 'Flashdisk', 'ATK-20210520164', '90000', 'Elektronik', 1, 'virus', '2021-05-28 10:51:38');

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
(20, 'ATK-20210520164', 'Flashdisk', 'Sandisk', '90000', 'Elektronik', 'kd', 24, 'PT MSAL (HO)', 'Pcs', 'Ket', '2021-05-20 16:02:31'),
(21, 'ATK-20210527061', 'HVS', 'Joyko', '75000', 'Kertas', 'kd', 24, 'PT MSAL (HO)', 'Pack', 'Untuk mencoret-coret tinta', '2021-05-27 11:11:21'),
(22, 'ATK-20210528355', 'Pensil', '2B', '12000', 'Alat Menulis', 'kd', 2000, 'PT MSAL (HO)', 'Pcs', 'Pensil Ujian', '2021-05-28 10:53:44');

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
(11, 4, 'AMBIL-ATK-20210524-004', 'Penghapus', 'ATK-20210520669', 'Alat Menulis', 9, 'Pcs', '30000', 'jhvjh', 1),
(13, 4, 'AMBIL-ATK-20210524-004', 'Pulpen', 'ATK-20210520036', 'Alat Menulis', 3, 'Pack', '10000', 'jhvjh', 1),
(19, 6, 'AMBIL-ATK-20210524-006', 'Penghapus', 'ATK-20210520669', 'Alat Menulis', 100, 'Pcs', '30000', 'buat dijual', 1),
(20, 6, 'AMBIL-ATK-20210524-006', 'Flashdisk', 'ATK-20210520164', 'Elektronik', 3, 'Pcs', '90000', 'nyimpen video parakan', 1),
(29, 7, 'AMBIL-ATK-20210524-007', 'Pulpen', 'ATK-20210520018', 'Alat Menulis', 8, 'Pcs', '12000', 'nv', 1),
(30, 7, 'AMBIL-ATK-20210524-007', 'Flashdisk', 'ATK-20210520164', 'Elektronik', 2, 'Pcs', '90000', '', 2),
(42, 10, 'AMBIL-ATK-20210525-0010', 'Flashdisk', 'ATK-20210520164', 'Elektronik', 3, 'Pcs', '90000', 'adw', 1),
(54, 12, 'AMBIL-ATK-20210525-0012', 'Flashdisk', 'ATK-20210520164', 'Elektronik', 3, 'Pcs', '90000', 'a', 1),
(58, 13, 'AMBIL-ATK-20210525-0013', 'Penggaris', 'MSAL20210520082', 'Alat Menulis', 12, 'Pcs', '12000', 'buat megnaris', 1),
(59, 13, 'AMBIL-ATK-20210525-0013', 'Pulpen', 'ATK-20210520018', 'Alat Menulis', 8, 'Pcs', '12000', 'menulis takdir', 1),
(88, 14, 'AMBIL-ATK-20210525-0014', 'Pulpen', 'ATK-20210520018', 'Alat Menulis', 8, 'Pcs', '12000', 'k', 1),
(92, 15, 'AMBIL-ATK-20210526-0015', 'Pulpen', 'ATK-20210520018', 'Alat Menulis', 1, 'Pcs', '12000', 'awda', 1),
(93, 16, 'ATK-20210526-0016', 'Penggaris', 'MSAL20210520082', 'Alat Menulis', 9, 'Pcs', '12000', 'adsadw', 1),
(94, 16, 'ATK-20210526-0016', 'Pulpen', 'ATK-20210520036', 'Alat Menulis', 6, 'Pack', '10000', 'a', 1),
(95, 17, 'ATK-20210527-0017', 'Flashdisk', 'ATK-20210520164', 'Elektronik', 2, 'Pcs', '90000', 'kk kk kk', 1),
(96, 18, 'ATK-20210527-0018', 'HVS', 'ATK-20210527061', 'Kertas', 10, 'Pack', '75000', 'Untuk bungkus', 1),
(97, 18, 'ATK-20210527-0018', 'Pulpen', 'ATK-20210520036', 'Alat Menulis', 9, 'Pack', '10000', 'p', 1),
(103, 20, 'ATK-20210528-0020', 'Penghapus', 'ATK-20210520669', 'Alat Menulis', 6, 'Pcs', '30000', 'l', 1),
(104, 20, 'ATK-20210528-0020', 'Flashdisk', 'ATK-20210520164', 'Elektronik', 1, 'Pcs', '90000', 'adw', 1),
(115, 18, 'ATK-20210527-0018', 'Pulpen', 'ATK-20210520018', 'Alat Menulis', 6, 'Pcs', '12000', 'mz', 1),
(116, 21, 'ATK-20210528-0021', 'Pensil', 'ATK-20210528355', 'Alat Menulis', 100, 'Pcs', '12000', 'Untuk menggambar', 1);

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
-- Indexes for table `tb_atk_rusak`
--
ALTER TABLE `tb_atk_rusak`
  ADD PRIMARY KEY (`id_atk`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_atk_rusak`
--
ALTER TABLE `tb_atk_rusak`
  MODIFY `id_atk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_detail_ambilatk`
--
ALTER TABLE `tb_detail_ambilatk`
  MODIFY `id_detail_ambilatk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
