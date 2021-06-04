-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2021 at 11:27 AM
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
-- Table structure for table `kode_atk`
--

CREATE TABLE `kode_atk` (
  `id_kodeatk` int(11) NOT NULL,
  `kode_atk` varchar(128) NOT NULL,
  `nm_barang` varchar(128) NOT NULL,
  `tgl` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kode_atk`
--

INSERT INTO `kode_atk` (`id_kodeatk`, `kode_atk`, `nm_barang`, `tgl`) VALUES
(1, '1010', 'Pulpen', '0000-00-00 00:00:00'),
(2, '1011', 'Pensil', '0000-00-00 00:00:00'),
(3, '1012', 'Penghapus', '0000-00-00 00:00:00'),
(4, '1013', 'Spidol', '0000-00-00 00:00:00'),
(5, '1014', 'Penggaris', '0000-00-00 00:00:00'),
(6, '2010', 'HVS', '0000-00-00 00:00:00'),
(7, '3010', 'Flashdisk', '0000-00-00 00:00:00'),
(8, '1015', 'Rautan', '0000-00-00 00:00:00');

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
  `status` int(11) NOT NULL COMMENT '0: dari adm, 1: dari user',
  `tgl_permintaan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ambil_atk`
--

INSERT INTO `tb_ambil_atk` (`id`, `no_ambilatk`, `user_nama`, `nama_pt`, `status`, `tgl_permintaan`) VALUES
(33, 'ATK-20210530-001', 'IDRIS ABDUL AZIS', 'PT MULIA SAWIT AGRO LESTARI (HO)', 0, '2021-05-30 08:40:43'),
(34, 'ATK-20210531-002', 'ERLANGGA RAMADUNI PRAMUDIA', 'PT MULIA SAWIT AGRO LESTARI (HO)', 0, '2021-05-31 09:09:43'),
(35, 'ATK-20210531-003', 'SILVI FATIN NABILAH', 'PT MULIA SAWIT AGRO LESTARI (HO)', 0, '2021-05-31 13:06:51'),
(36, 'ATK-20210601-004', 'IDRIS ABDUL AZIS', 'PT MULIA SAWIT AGRO LESTARI (HO)', 0, '2021-06-01 18:54:33'),
(37, 'ATK-20210603-005', 'IDRIS ABDUL AZIS', 'PT MULIA SAWIT AGRO LESTARI (HO)', 0, '2021-06-03 14:47:18'),
(38, 'ATK-20210604-006', 'IDRIS ABDUL AZIS', 'PT MULIA SAWIT AGRO LESTARI (HO)', 0, '2021-06-04 10:27:47'),
(39, 'ATK-20210604-007', 'MUHAMMAD ALVI BISYRI', 'PT MULIA SAWIT AGRO LESTARI (HO)', 0, '2021-06-04 10:40:27'),
(41, 'ATK-20210604-008', 'ANANDA AQILLA SABRINA', 'PT MULIA SAWIT AGRO LESTARI (HO)', 0, '2021-06-04 10:58:43'),
(42, 'ATK-20210604-009', 'SILVI FATIN NABILAH', 'PT MULIA SAWIT AGRO LESTARI (HO)', 1, '2021-06-04 11:03:13'),
(43, 'ATK-20210604-0010', 'SUSANTO', 'PT MULIA SAWIT AGRO LESTARI (HO)', 1, '2021-06-04 16:04:11'),
(44, 'ATK-20210604-0011', 'MUHAMMAD IMAM HAKIKI', 'PT MULIA SAWIT AGRO LESTARI (HO)', 1, '2021-06-04 11:07:11');

-- --------------------------------------------------------

--
-- Table structure for table `tb_atk_rusak`
--

CREATE TABLE `tb_atk_rusak` (
  `id_atk` int(11) NOT NULL,
  `no_ambilatk` varchar(128) NOT NULL,
  `id_detail_ambilatk` int(11) NOT NULL,
  `user_nama` varchar(255) NOT NULL,
  `nm_barang` varchar(128) NOT NULL,
  `kode_atk` varchar(128) NOT NULL,
  `kd_inputatk` varchar(128) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `kat_barang` varchar(128) NOT NULL,
  `qty_rusak` int(11) NOT NULL,
  `alasan` varchar(255) NOT NULL,
  `tgl_retur` datetime NOT NULL,
  `status` int(11) NOT NULL COMMENT '0: belumfix; 1: sudah dikembalikan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_atk_rusak`
--

INSERT INTO `tb_atk_rusak` (`id_atk`, `no_ambilatk`, `id_detail_ambilatk`, `user_nama`, `nm_barang`, `kode_atk`, `kd_inputatk`, `harga`, `kat_barang`, `qty_rusak`, `alasan`, `tgl_retur`, `status`) VALUES
(2, 'ATK-20210530-001', 140, 'IDRIS ABDUL AZIS', 'Pensil', '1011', 'ATK-20210528355', '12000', 'Alat Menulis', 20, 'aw', '2021-05-30 09:18:44', 1),
(4, 'ATK-20210531-002', 146, 'ERLANGGA RAMADUNI PRAMUDIA', 'Flashdisk', '3010', 'ATK-20210520164', '90000', 'Elektronik', 1, 'Flashdisk berfirus', '2021-05-31 11:12:54', 1),
(6, 'ATK-20210531-002', 143, 'ERLANGGA RAMADUNI PRAMUDIA', 'Penghapus', '1012', 'ATK-20210520669', '30000', 'Alat Menulis', 3, 'sss', '2021-05-31 11:25:47', 0),
(7, 'ATK-20210530-001', 140, 'IDRIS ABDUL AZIS', 'Pensil', '1011', 'ATK-20210528355', '12000', 'Alat Menulis', 15, 'pulpen balikin 15', '2021-05-31 11:26:36', 0),
(8, 'ATK-20210531-002', 143, 'ERLANGGA RAMADUNI PRAMUDIA', 'Penghapus', '1012', 'ATK-20210520669', '30000', 'Alat Menulis', 6, 'ucul mawe', '2021-05-31 11:36:08', 0),
(9, 'ATK-20210531-003', 147, 'SILVI FATIN NABILAH', 'Pulpen', '1010', 'ATK-20210520018', '12000', 'Alat Menulis', 5, 'tidak naa', '2021-05-31 13:07:49', 0),
(10, 'ATK-20210531-002', 143, 'ERLANGGA RAMADUNI PRAMUDIA', 'Penghapus', '1012', 'ATK-20210520669', '30000', 'Alat Menulis', 5, 'hh', '2021-05-31 16:30:54', 0),
(11, 'ATK-20210531-003', 148, 'SILVI FATIN NABILAH', 'HVS', '2010', 'ATK-20210527061', '75000', 'Kertas', 3, 'nn', '2021-05-31 16:31:59', 0),
(12, 'ATK-20210601-004', 150, 'IDRIS ABDUL AZIS', 'Pensil', '1011', 'ATK-20210528355', '12000', 'Alat Menulis', 10, 'aa', '2021-06-01 19:02:35', 0),
(14, 'ATK-20210601-004', 150, 'IDRIS ABDUL AZIS', 'Pensil', '1011', 'ATK-20210528355', '12000', 'Alat Menulis', 20, 'sssssss', '2021-06-02 15:45:25', 0);

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
(16, 'MSAL20210520082', 'Penggaris', 'Butterfly', '12000', 'Alat Menulis', '1014', 48, 'PT MAPA', 'Pcs', 'Ya untuk garis', '2021-05-20 13:09:20'),
(17, 'ATK-20210520669', 'Penghapus', '2B', '30000', 'Alat Menulis', '1012', 120, 'PT MSAL (HO)', 'Pcs', 'Untuk Menghapus', '2021-05-20 14:36:44'),
(18, 'ATK-20210520036', 'Pulpen', 'Fastel', '10000', 'Alat Menulis', '1010', 22, 'PT MSAL (HO)', 'Pack', 'menulis', '2021-05-20 14:52:33'),
(19, 'ATK-20210520018', 'Pulpen', 'Butterfly', '12000', 'Alat Menulis', '1010', 54, 'PT MSAL (HO)', 'Pcs', 'Pulpen satuan pcs', '2021-05-20 15:00:50'),
(20, 'ATK-20210520164', 'Flashdisk', 'Sandisk', '90000', 'Elektronik', '3010', 24, 'PT MSAL (HO)', 'Pcs', 'Ket', '2021-05-20 16:02:31'),
(21, 'ATK-20210527061', 'HVS', 'Joyko', '75000', 'Kertas', '2010', 24, 'PT MSAL (HO)', 'Pack', 'Untuk mencoret-coret tinta', '2021-05-27 11:11:21'),
(22, 'ATK-20210528355', 'Pensil', '2B', '12000', 'Alat Menulis', '1011', 2000, 'PT MSAL (HO)', 'Pcs', 'Pensil Ujian', '2021-05-28 10:53:44'),
(23, 'ATK-20210601381', 'Spidol', 'Kijang', '10000', 'Alat Menulis', '1013', 12, 'PT MSAL (HO)', 'Pcs', 'Buat Meeting', '2021-06-01 18:24:29');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_ambilatk`
--

CREATE TABLE `tb_detail_ambilatk` (
  `id_detail_ambilatk` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `no_ambilatk` varchar(128) NOT NULL,
  `nm_barang` varchar(128) NOT NULL,
  `kode_atk` varchar(128) NOT NULL,
  `kd_inputatk` varchar(128) NOT NULL,
  `kat_barang` varchar(128) NOT NULL,
  `qty` int(11) NOT NULL,
  `sat` varchar(128) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0: ready, 1: fix, 2:wait , 3: dari user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_ambilatk`
--

INSERT INTO `tb_detail_ambilatk` (`id_detail_ambilatk`, `no_urut`, `no_ambilatk`, `nm_barang`, `kode_atk`, `kd_inputatk`, `kat_barang`, `qty`, `sat`, `harga`, `keperluan`, `status`) VALUES
(140, 1, 'ATK-20210530-001', 'Pensil', '1011', 'ATK-20210528355', 'Alat Menulis', 15, 'Pcs', '12000', 'a', 3),
(141, 1, 'ATK-20210530-001', 'Pulpen', '1010', 'ATK-20210520018', 'Alat Menulis', 20, 'Pcs', '12000', 'adwa', 1),
(142, 1, 'ATK-20210530-001', 'Flashdisk', '3010', 'ATK-20210520164', 'Elektronik', 15, 'Pcs', '90000', '2as', 1),
(143, 2, 'ATK-20210531-002', 'Penghapus', '1012', 'ATK-20210520669', 'Alat Menulis', 1, 'Pcs', '30000', 'tes', 3),
(144, 2, 'ATK-20210531-002', 'Pulpen', '1010', 'ATK-20210520036', 'Alat Menulis', 5, 'Pack', '10000', 'tes pack', 3),
(145, 2, 'ATK-20210531-002', 'Penggaris', '1014', 'MSAL20210520082', 'Alat Menulis', 8, 'Pcs', '12000', 'tes garis', 1),
(146, 2, 'ATK-20210531-002', 'Flashdisk', '3010', 'ATK-20210520164', 'Elektronik', 15, 'Pcs', '90000', 'uu', 3),
(147, 3, 'ATK-20210531-003', 'Pulpen', '1010', 'ATK-20210520018', 'Alat Menulis', 25, 'Pcs', '12000', 'pulp', 1),
(148, 3, 'ATK-20210531-003', 'HVS', '2010', 'ATK-20210527061', 'Kertas', 15, 'Pack', '75000', 'heheh', 1),
(149, 4, 'ATK-20210601-004', 'Spidol', '1013', 'ATK-20210601381', 'Alat Menulis', 4, 'Pcs', '10000', 's', 1),
(150, 4, 'ATK-20210601-004', 'Pensil', '1011', 'ATK-20210528355', 'Alat Menulis', 15, 'Pcs', '12000', 'as', 1),
(151, 5, 'ATK-20210603-005', 'Pensil', '1011', 'ATK-20210528355', 'Alat Menulis', 200, 'Pcs', '12000', 'coret', 1),
(152, 5, 'ATK-20210603-005', 'Flashdisk', '3010', 'ATK-20210520164', 'Elektronik', 15, 'Pcs', '90000', 'ppp', 1),
(153, 5, 'ATK-20210603-005', 'Penggaris', '1014', 'MSAL20210520082', 'Alat Menulis', 23, 'Pcs', '12000', 'aadw', 1),
(154, 6, 'ATK-20210604-006', 'Spidol', '1013', 'ATK-20210601381', 'Alat Menulis', 2, 'Pcs', '10000', 'user', 1),
(157, 7, 'ATK-20210604-007', 'Pensil', '1011', 'ATK-20210528355', 'Alat Menulis', 2, 'Pcs', '12000', 'asdw', 1),
(160, 8, 'ATK-20210604-008', 'HVS', '2010', 'ATK-20210527061', 'Kertas', 2, 'Pack', '75000', 'adw', 1),
(161, 8, 'ATK-20210604-008', 'Spidol', '1013', 'ATK-20210601381', 'Alat Menulis', 6, 'Pcs', '10000', 'aa', 1),
(162, 9, 'ATK-20210604-009', 'Pensil', '1011', 'ATK-20210528355', 'Alat Menulis', 200, 'Pcs', '12000', 'kkk', 2),
(163, 9, 'ATK-20210604-009', 'Pulpen', '1010', 'ATK-20210520018', 'Alat Menulis', 4, 'Pcs', '12000', 'aaa', 2),
(164, 9, 'ATK-20210604-009', 'Penghapus', '1012', 'ATK-20210520669', 'Alat Menulis', 5, 'Pcs', '30000', 'as', 2),
(165, 10, 'ATK-20210604-0010', 'Pulpen', '1010', 'ATK-20210520036', 'Alat Menulis', 10, 'Pack', '10000', 'pupin', 2),
(166, 10, 'ATK-20210604-0010', 'Penggaris', '1014', 'MSAL20210520082', 'Alat Menulis', 10, 'Pcs', '12000', 'gars', 2),
(167, 11, 'ATK-20210604-0011', 'Penghapus', '1012', 'ATK-20210520669', 'Alat Menulis', 20, 'Pcs', '30000', 'buat ngapus', 2),
(168, 11, 'ATK-20210604-0011', 'Pensil', '1011', 'ATK-20210528355', 'Alat Menulis', 1000, 'Pcs', '12000', 'pens', 2),
(169, 11, 'ATK-20210604-0011', 'Pulpen', '1010', 'ATK-20210520036', 'Alat Menulis', 2, 'Pack', '10000', 'pulp', 2),
(170, 11, 'ATK-20210604-0011', 'Penggaris', '1014', 'MSAL20210520082', 'Alat Menulis', 6, 'Pcs', '12000', 'a', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kat`);

--
-- Indexes for table `kode_atk`
--
ALTER TABLE `kode_atk`
  ADD PRIMARY KEY (`id_kodeatk`);

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
-- AUTO_INCREMENT for table `kode_atk`
--
ALTER TABLE `kode_atk`
  MODIFY `id_kodeatk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_sat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_ambil_atk`
--
ALTER TABLE `tb_ambil_atk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tb_atk_rusak`
--
ALTER TABLE `tb_atk_rusak`
  MODIFY `id_atk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_detail_ambilatk`
--
ALTER TABLE `tb_detail_ambilatk`
  MODIFY `id_detail_ambilatk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
