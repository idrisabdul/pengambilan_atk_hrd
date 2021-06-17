-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2021 at 11:08 AM
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
(2, 'Alat tulis'),
(3, 'Elektronik'),
(4, 'Buku Tulis'),
(5, 'Alat Tempel'),
(6, 'Banner'),
(7, 'Benda Tajam'),
(8, 'Dan Lain-lain');

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
(8, '1015', 'Rautan', '0000-00-00 00:00:00'),
(9, '4010', 'Cutter', '0000-00-00 00:00:00'),
(10, '5010', 'Buku', '0000-00-00 00:00:00'),
(11, '6010', 'Kalender', '0000-00-00 00:00:00');

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
  `status` int(11) NOT NULL COMMENT '0: dari adm, 1: dari user/wait, 2: disetjui/boleh ambil, 3: terambil, 4: ditolak ',
  `tgl_permintaan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ambil_atk`
--

INSERT INTO `tb_ambil_atk` (`id`, `no_ambilatk`, `user_nama`, `nama_pt`, `status`, `tgl_permintaan`) VALUES
(1, 'ATK-20210617-001', 'MUHAMMAD ALVI BISYRI', 'PT MULIA SAWIT AGRO LESTARI (HO)', 0, '2021-06-17 13:24:08'),
(2, 'ATK-20210617-002', 'IDRIS ABDUL AZIS', 'PT MULIA SAWIT AGRO LESTARI (HO)', 2, '2021-06-17 14:43:01'),
(3, 'ATK-20210617-003', 'NABILA ANINDITA', 'PT MULIA SAWIT AGRO LESTARI (HO)', 1, '2021-06-17 15:57:36');

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
  `harga` decimal(10,2) NOT NULL,
  `kat_barang` varchar(128) NOT NULL,
  `kode_atk` varchar(128) NOT NULL,
  `kode_barang` varchar(128) DEFAULT NULL,
  `qty` int(255) NOT NULL,
  `nama_pt` varchar(128) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `tgl_masuk_barang` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `kd_inputatk`, `nm_barang`, `merek`, `harga`, `kat_barang`, `kode_atk`, `kode_barang`, `qty`, `nama_pt`, `satuan`, `keterangan`, `tgl_masuk_barang`) VALUES
(2, 'ATK-20210617070', 'Buku', 'Joyko', '24000.00', '4', '10', '8992221088009', 132, '1', '2', 'a', '2021-06-17 11:23:30'),
(3, 'ATK-20210617340', 'Spidol', 'Hos', '12000.00', '2', '4', '98212312', 2000, '1', '3', 'aa', '2021-06-17 12:13:08'),
(4, 'ATK-20210617376', 'HVS', 'aj', '29999.00', '1', '6', '12312123123', 1213, '1', '3', 'adaw', '2021-06-17 15:16:51');

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
  `kode_barang` varchar(128) NOT NULL,
  `kd_inputatk` varchar(128) NOT NULL,
  `kat_barang` varchar(128) NOT NULL,
  `qty` int(11) NOT NULL,
  `sat` varchar(128) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0: ready, 1: fix, 2:wait , 3: retur, 4: disetjui, 5: terambil'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_ambilatk`
--

INSERT INTO `tb_detail_ambilatk` (`id_detail_ambilatk`, `no_urut`, `no_ambilatk`, `nm_barang`, `kode_atk`, `kode_barang`, `kd_inputatk`, `kat_barang`, `qty`, `sat`, `harga`, `keperluan`, `status`) VALUES
(1, 1, 'ATK-20210617-001', 'Spidol', '4', '98212312', 'ATK-20210617340', '2', 100, '3', '12000', 'aaa', 1),
(6, 2, 'ATK-20210617-002', 'Spidol', '4', '98212312', 'ATK-20210617340', '2', 100, '3', '12000', 'prda', 4),
(12, 3, 'ATK-20210617-003', 'HVS', '6', '12312123123', 'ATK-20210617376', '1', 213, '3', '29999', 'paodapwd', 2),
(13, 3, 'ATK-20210617-003', 'Spidol', '4', '98212312', 'ATK-20210617340', '2', 100, '3', '12000', 'skidippap', 2);

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
  MODIFY `id_kat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kode_atk`
--
ALTER TABLE `kode_atk`
  MODIFY `id_kodeatk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_sat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_ambil_atk`
--
ALTER TABLE `tb_ambil_atk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_atk_rusak`
--
ALTER TABLE `tb_atk_rusak`
  MODIFY `id_atk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_detail_ambilatk`
--
ALTER TABLE `tb_detail_ambilatk`
  MODIFY `id_detail_ambilatk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
