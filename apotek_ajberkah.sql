-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 22, 2022 at 02:57 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek_ajberkah`
--

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_bl` int(10) NOT NULL,
  `faktur` varchar(200) DEFAULT NULL,
  `tgl_bl` date DEFAULT NULL,
  `supp_id` int(10) DEFAULT NULL,
  `jth_tempo` date DEFAULT NULL,
  `item_bl` int(5) DEFAULT NULL,
  `total_bl` int(10) DEFAULT NULL,
  `disk_bl` varchar(50) DEFAULT NULL,
  `byr_bl` int(10) DEFAULT NULL,
  `user_id` int(10) DEFAULT '0',
  `wkt_bl` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_detail`
--

CREATE TABLE `pembelian_detail` (
  `id_bdet` int(11) NOT NULL,
  `beli_id` int(10) NOT NULL,
  `prd_id` int(10) NOT NULL,
  `jml_bdet` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_lr` int(10) NOT NULL,
  `tgl_lr` date NOT NULL,
  `jns_lr` varchar(150) NOT NULL,
  `nmnl_lr` int(10) NOT NULL,
  `wkt_lr` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_jl` int(10) NOT NULL,
  `tgl_jl` date DEFAULT NULL,
  `nama_customer` varchar(100) DEFAULT NULL,
  `item_jl` int(5) DEFAULT NULL,
  `total_jl` int(10) DEFAULT NULL,
  `disk_jl` int(3) DEFAULT NULL,
  `byr_jl` int(10) DEFAULT NULL,
  `user_id` int(10) DEFAULT '0',
  `wkt_jl` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `id_jdet` int(11) NOT NULL,
  `jual_id` int(10) NOT NULL,
  `prd_id` int(10) NOT NULL,
  `jml_jdet` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_prd` int(10) NOT NULL,
  `nama_prd` varchar(200) NOT NULL,
  `stn_id` int(10) NOT NULL,
  `beli_prd` int(10) NOT NULL,
  `jual_prd` int(10) NOT NULL,
  `stok_prd` int(5) NOT NULL,
  `tgl_ed` date DEFAULT NULL,
  `wkt_prd` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_prd`, `nama_prd`, `stn_id`, `beli_prd`, `jual_prd`, `stok_prd`, `tgl_ed`, `wkt_prd`) VALUES
(337446908, 'PROMODEX TAB @10', 398907743, 18500, 23000, 10, '2026-11-22', '2022-11-22 22:45:16');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_stn` int(10) NOT NULL,
  `nama_stn` varchar(50) NOT NULL,
  `wkt_stn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_stn`, `nama_stn`, `wkt_stn`) VALUES
(123456789, 'TABLET', '2020-03-21 16:40:14'),
(398907743, 'STRIP', '2020-03-21 17:37:50'),
(612432497, 'BOX', '2022-10-09 14:20:39'),
(740540712, 'BOTOL', '2022-05-30 11:07:13');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supp` int(10) NOT NULL,
  `nama_supp` varchar(150) NOT NULL,
  `almt_supp` text NOT NULL,
  `kntk_supp` varchar(15) NOT NULL,
  `wkt_supp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supp`, `nama_supp`, `almt_supp`, `kntk_supp`, `wkt_supp`) VALUES
(778393905, 'PT. BINA SAN PRIMA', 'jalan basuki rahmat, air hitam', '085246805241', '2020-03-24 23:48:18');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_usr` int(10) NOT NULL,
  `nama_usr` varchar(150) NOT NULL,
  `user_usr` varchar(50) NOT NULL,
  `pass_usr` varchar(150) NOT NULL,
  `lvl_usr` int(2) NOT NULL,
  `wkt_usr` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_usr`, `nama_usr`, `user_usr`, `pass_usr`, `lvl_usr`, `wkt_usr`) VALUES
(703095392, 'ADMINISTRATOR WEBSITE', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '2020-03-21 23:02:31'),
(904345146, 'OPERATOR', 'operator', 'e10adc3949ba59abbe56e057f20f883e', 2, '2022-05-30 11:07:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_bl`);

--
-- Indexes for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  ADD PRIMARY KEY (`id_bdet`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_lr`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_jl`);

--
-- Indexes for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD PRIMARY KEY (`id_jdet`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_prd`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_stn`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supp`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_usr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  MODIFY `id_bdet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  MODIFY `id_jdet` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
