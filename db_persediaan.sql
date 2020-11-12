-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2020 at 05:07 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_persediaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `nama` varchar(100) NOT NULL,
  `ukuran` int(11) NOT NULL,
  `tipe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbbarang`
--

CREATE TABLE `tbbarang` (
  `kode_barang` varchar(6) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `kode_kategori` int(11) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `lokasi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbbarang`
--

INSERT INTO `tbbarang` (`kode_barang`, `nama_barang`, `kode_kategori`, `brand`, `stok`, `lokasi`) VALUES
('BRG001', 'Iconic Link 36 RG White', 1, 'Daniel Wellington', 100, 'Brankas 1'),
('BRG002', 'Classic Reading 40mm', 1, 'Daniel Wellington', 100, 'Brankas 1'),
('BRG003', 'Classic Roselyn 40mm Silver', 1, 'Daniel Wellington', 100, 'Brankas 1'),
('BRG004', 'Classic Petite Sheffield Black', 1, 'Daniel Wellington', 100, 'Brankas 1'),
('BRG005', 'QUEEN BEE CHALK BLUE & GOLD - ', 1, 'Olivia Burton', 100, 'Brankas 2'),
('BRG006', 'Love Bee Studs Black & Silver ', 4, 'Olivia Burton', 50, 'Brankas 2'),
('BRG007', 'D1 Milano - SSLJ02', 1, 'D1 MILANO', 100, 'Brankas 3'),
('BRG008', 'D1 Milano - PCBJ09', 1, 'D1 MILANO', 100, 'Brankas 3'),
('BRG009', 'District SM1 Silver / Black', 1, 'ADIDAS', 100, 'Brankas 4'),
('BRG010', 'Process C1 All Black', 1, 'ADIDAS', 100, 'Brankas 4'),
('BRG011', 'Timex MK1 - TW2R68300 40mm', 1, 'TIMEX', 100, 'Brankas 5'),
('BRG012', 'Timex Expedition Scout - TW4B0', 1, 'TIMEX', 100, 'Brankas 5'),
('BRG013', 'LULU - Acetate Tricolore', 4, 'KOMONO', 50, 'Brankas 6'),
('BRG014', 'HAILEY - Black Brown', 4, 'KOMONO', 50, 'Brankas 6'),
('BRG015', 'MOD RB3 FB01-BL 32mm', 1, 'MVMT', 100, 'Brankas 7'),
('BRG016', 'MOD S1 FB01-S 32mm', 1, 'MVMT', 100, 'Brankas 7');

-- --------------------------------------------------------

--
-- Table structure for table `tbdetail_penerimaan`
--

CREATE TABLE `tbdetail_penerimaan` (
  `id` int(11) NOT NULL,
  `kode_terima` varchar(20) NOT NULL,
  `kode_barang` varchar(6) NOT NULL,
  `jumlah_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbdetail_penerimaan`
--

INSERT INTO `tbdetail_penerimaan` (`id`, `kode_terima`, `kode_barang`, `jumlah_barang`) VALUES
(1, 'T202007200001', 'BRG001', 75),
(2, 'T202007200001', 'BRG002', 60),
(3, 'T202007200001', 'BRG003', 80),
(4, 'T202007200001', 'BRG004', 55),
(8, 'T202007200002', 'BRG005', 70),
(9, 'T202007200002', 'BRG006', 80),
(11, 'T202007200003', 'BRG007', 50),
(12, 'T202007200003', 'BRG008', 80),
(14, 'T202007200004', 'BRG009', 75),
(15, 'T202007200004', 'BRG010', 95),
(17, 'T202007200005', 'BRG011', 85),
(18, 'T202007200005', 'BRG012', 70),
(20, 'T202007200006', 'BRG013', 30),
(21, 'T202007200006', 'BRG014', 45),
(23, 'T202007200007', 'BRG015', 60),
(24, 'T202007200007', 'BRG016', 90),
(26, 'T202007200008', 'BRG007', 50),
(27, 'T202007200008', 'BRG008', 50),
(50, 'T202007270001', 'BRG006', 15),
(51, 'T202007270001', 'BRG005', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbdetail_pengeluaran`
--

CREATE TABLE `tbdetail_pengeluaran` (
  `id` int(11) NOT NULL,
  `kode_keluar` varchar(20) NOT NULL,
  `kode_barang` varchar(6) NOT NULL,
  `jumlah_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbdetail_pengeluaran`
--

INSERT INTO `tbdetail_pengeluaran` (`id`, `kode_keluar`, `kode_barang`, `jumlah_barang`) VALUES
(1, 'K202007200001', 'BRG001', 25),
(2, 'K202007200001', 'BRG007', 46),
(3, 'K202007200001', 'BRG013', 35),
(4, 'K202007200002', 'BRG003', 35),
(5, 'K202007200002', 'BRG002', 50),
(7, 'K202007200003', 'BRG004', 30),
(8, 'K202007200003', 'BRG008', 20),
(9, 'K202007200003', 'BRG014', 40),
(10, 'K202007200003', 'BRG010', 55),
(14, 'K202007200004', 'BRG016', 55),
(15, 'K202007200004', 'BRG005', 40),
(17, 'K202007200005', 'BRG009', 35),
(18, 'K202007200005', 'BRG016', 20),
(19, 'K202007270001', 'BRG008', 20),
(20, 'K202007270001', 'BRG007', 30);

-- --------------------------------------------------------

--
-- Table structure for table `tbgabung_transaksi`
--

CREATE TABLE `tbgabung_transaksi` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_barang` varchar(6) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `ket` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbgabung_transaksi`
--

INSERT INTO `tbgabung_transaksi` (`id`, `kode`, `tanggal`, `kode_barang`, `jumlah_barang`, `ket`) VALUES
(151, 'K202006220001', '2020-06-22', 'BRG004', 35, 'KELUAR'),
(153, 'K202006220001', '2020-06-22', 'BRG001', 0, 'MASUK'),
(154, 'K202006220001', '2020-06-22', 'BRG004', 0, 'MASUK'),
(155, 'T202007020001', '2020-07-02', 'BRG004', 46, 'MASUK'),
(156, 'T202007020001', '2020-07-02', 'BRG002', 50, 'MASUK'),
(158, 'T202007020001', '2020-07-02', 'BRG004', 0, 'KELUAR'),
(159, 'T202007020001', '2020-07-02', 'BRG002', 0, 'KELUAR'),
(160, 'T202007050001', '2020-07-05', 'BRG004', 45, 'MASUK'),
(161, 'T202007050001', '2020-07-05', 'BRG002', 12, 'MASUK'),
(163, 'T202007050001', '2020-07-05', 'BRG004', 0, 'KELUAR'),
(164, 'T202007050001', '2020-07-05', 'BRG002', 0, 'KELUAR'),
(166, 'T202007050001', '2020-07-05', 'BRG002', 12, 'MASUK'),
(167, 'T202007050001', '2020-07-05', 'BRG004', 10, 'MASUK'),
(169, 'T202007050001', '2020-07-05', 'BRG002', 0, 'KELUAR'),
(170, 'T202007050001', '2020-07-05', 'BRG004', 0, 'KELUAR'),
(172, 'T202007050001', '2020-07-05', 'BRG004', 10, 'MASUK'),
(173, 'T202007050001', '2020-07-05', 'BRG004', 0, 'KELUAR'),
(174, 'T202007050001', '2020-07-05', 'BRG004', 30, 'MASUK'),
(175, 'T202007050001', '2020-07-05', 'BRG003', 20, 'MASUK'),
(177, 'T202007050001', '2020-07-05', 'BRG004', 0, 'KELUAR'),
(178, 'T202007050001', '2020-07-05', 'BRG003', 0, 'KELUAR'),
(180, 'T202007050002', '2020-07-05', 'BRG003', 42, 'MASUK'),
(181, 'T202007050002', '2020-07-05', 'BRG003', 0, 'KELUAR'),
(182, 'T202007050001', '2020-07-05', 'BRG004', 20, 'MASUK'),
(183, 'T202007050001', '2020-07-05', 'BRG002', 45, 'MASUK'),
(185, 'T202007050001', '2020-07-05', 'BRG004', 0, 'KELUAR'),
(186, 'T202007050001', '2020-07-05', 'BRG002', 0, 'KELUAR'),
(188, 'T202007050001', '2020-07-05', 'BRG004', 18, 'MASUK'),
(189, 'T202007050001', '2020-07-05', 'BRG002', 56, 'MASUK'),
(191, 'T202007050001', '2020-07-05', 'BRG004', 0, 'KELUAR'),
(192, 'T202007050001', '2020-07-05', 'BRG002', 0, 'KELUAR'),
(194, 'T202007050002', '2020-07-05', 'BRG004', 12, 'MASUK'),
(195, 'T202007050002', '2020-07-05', 'BRG003', 43, 'MASUK'),
(196, 'T202007050002', '2020-07-05', 'BRG002', 23, 'MASUK'),
(197, 'T202007050002', '2020-07-05', 'BRG001', 53, 'MASUK'),
(201, 'T202007050002', '2020-07-05', 'BRG004', 0, 'KELUAR'),
(202, 'T202007050002', '2020-07-05', 'BRG003', 0, 'KELUAR'),
(203, 'T202007050002', '2020-07-05', 'BRG002', 0, 'KELUAR'),
(204, 'T202007050002', '2020-07-05', 'BRG001', 0, 'KELUAR'),
(208, 'T202007050003', '2020-07-05', 'BRG001', 24, 'MASUK'),
(209, 'T202007050003', '2020-07-05', 'BRG002', 32, 'MASUK'),
(210, 'T202007050003', '2020-07-05', 'BRG003', 41, 'MASUK'),
(211, 'T202007050003', '2020-07-05', 'BRG004', 18, 'MASUK'),
(215, 'T202007050003', '2020-07-05', 'BRG001', 0, 'KELUAR'),
(216, 'T202007050003', '2020-07-05', 'BRG002', 0, 'KELUAR'),
(217, 'T202007050003', '2020-07-05', 'BRG003', 0, 'KELUAR'),
(218, 'T202007050003', '2020-07-05', 'BRG004', 0, 'KELUAR'),
(222, 'T202007050004', '2020-07-05', 'BRG001', 52, 'MASUK'),
(223, 'T202007050004', '2020-07-05', 'BRG002', 23, 'MASUK'),
(224, 'T202007050004', '2020-07-05', 'BRG003', 15, 'MASUK'),
(225, 'T202007050004', '2020-07-05', 'BRG004', 33, 'MASUK'),
(229, 'T202007050004', '2020-07-05', 'BRG001', 0, 'KELUAR'),
(230, 'T202007050004', '2020-07-05', 'BRG002', 0, 'KELUAR'),
(231, 'T202007050004', '2020-07-05', 'BRG003', 0, 'KELUAR'),
(232, 'T202007050004', '2020-07-05', 'BRG004', 0, 'KELUAR'),
(236, 'T202007050005', '2020-07-05', 'BRG001', 83, 'MASUK'),
(237, 'T202007050005', '2020-07-05', 'BRG004', 53, 'MASUK'),
(239, 'T202007050005', '2020-07-05', 'BRG001', 0, 'KELUAR'),
(240, 'T202007050005', '2020-07-05', 'BRG004', 0, 'KELUAR'),
(242, 'K202007050001', '2020-07-05', 'BRG003', 45, 'KELUAR'),
(243, 'K202007050001', '2020-07-05', 'BRG003', 0, 'MASUK'),
(244, 'T202007160001', '2020-07-16', 'BRG004', 56, 'MASUK'),
(245, 'T202007160001', '2020-07-16', 'BRG004', 0, 'KELUAR'),
(246, 'T202007200001', '2020-07-20', 'BRG001', 75, 'MASUK'),
(247, 'T202007200001', '2020-07-20', 'BRG002', 60, 'MASUK'),
(248, 'T202007200001', '2020-07-20', 'BRG003', 80, 'MASUK'),
(249, 'T202007200001', '2020-07-20', 'BRG004', 55, 'MASUK'),
(253, 'T202007200001', '2020-07-20', 'BRG001', 0, 'KELUAR'),
(254, 'T202007200001', '2020-07-20', 'BRG002', 0, 'KELUAR'),
(255, 'T202007200001', '2020-07-20', 'BRG003', 0, 'KELUAR'),
(256, 'T202007200001', '2020-07-20', 'BRG004', 0, 'KELUAR'),
(260, 'T202007200002', '2020-07-20', 'BRG005', 70, 'MASUK'),
(261, 'T202007200002', '2020-07-20', 'BRG006', 80, 'MASUK'),
(263, 'T202007200002', '2020-07-20', 'BRG005', 0, 'KELUAR'),
(264, 'T202007200002', '2020-07-20', 'BRG006', 0, 'KELUAR'),
(266, 'T202007200003', '2020-07-20', 'BRG007', 50, 'MASUK'),
(267, 'T202007200003', '2020-07-20', 'BRG008', 80, 'MASUK'),
(269, 'T202007200003', '2020-07-20', 'BRG007', 0, 'KELUAR'),
(270, 'T202007200003', '2020-07-20', 'BRG008', 0, 'KELUAR'),
(272, 'T202007200004', '2020-07-20', 'BRG009', 75, 'MASUK'),
(273, 'T202007200004', '2020-07-20', 'BRG010', 95, 'MASUK'),
(275, 'T202007200004', '2020-07-20', 'BRG009', 0, 'KELUAR'),
(276, 'T202007200004', '2020-07-20', 'BRG010', 0, 'KELUAR'),
(278, 'T202007200005', '2020-07-20', 'BRG011', 85, 'MASUK'),
(279, 'T202007200005', '2020-07-20', 'BRG012', 70, 'MASUK'),
(281, 'T202007200005', '2020-07-20', 'BRG011', 0, 'KELUAR'),
(282, 'T202007200005', '2020-07-20', 'BRG012', 0, 'KELUAR'),
(284, 'T202007200006', '2020-07-20', 'BRG013', 30, 'MASUK'),
(285, 'T202007200006', '2020-07-20', 'BRG014', 45, 'MASUK'),
(287, 'T202007200006', '2020-07-20', 'BRG013', 0, 'KELUAR'),
(288, 'T202007200006', '2020-07-20', 'BRG014', 0, 'KELUAR'),
(290, 'T202007200007', '2020-07-20', 'BRG015', 60, 'MASUK'),
(291, 'T202007200007', '2020-07-20', 'BRG016', 90, 'MASUK'),
(293, 'T202007200007', '2020-07-20', 'BRG015', 0, 'KELUAR'),
(294, 'T202007200007', '2020-07-20', 'BRG016', 0, 'KELUAR'),
(296, 'T202007200008', '2020-07-20', 'BRG007', 50, 'MASUK'),
(297, 'T202007200008', '2020-07-20', 'BRG008', 50, 'MASUK'),
(299, 'T202007200008', '2020-07-20', 'BRG007', 0, 'KELUAR'),
(300, 'T202007200008', '2020-07-20', 'BRG008', 0, 'KELUAR'),
(302, 'K202007200001', '2020-07-20', 'BRG001', 25, 'KELUAR'),
(303, 'K202007200001', '2020-07-20', 'BRG007', 46, 'KELUAR'),
(304, 'K202007200001', '2020-07-20', 'BRG013', 35, 'KELUAR'),
(305, 'K202007200001', '2020-07-20', 'BRG001', 0, 'MASUK'),
(306, 'K202007200001', '2020-07-20', 'BRG007', 0, 'MASUK'),
(307, 'K202007200001', '2020-07-20', 'BRG013', 0, 'MASUK'),
(308, 'K202007200002', '2020-07-20', 'BRG003', 35, 'KELUAR'),
(309, 'K202007200002', '2020-07-20', 'BRG002', 50, 'KELUAR'),
(311, 'K202007200002', '2020-07-20', 'BRG003', 0, 'MASUK'),
(312, 'K202007200002', '2020-07-20', 'BRG002', 0, 'MASUK'),
(314, 'K202007200003', '2020-07-20', 'BRG004', 30, 'KELUAR'),
(315, 'K202007200003', '2020-07-20', 'BRG008', 20, 'KELUAR'),
(316, 'K202007200003', '2020-07-20', 'BRG014', 40, 'KELUAR'),
(317, 'K202007200003', '2020-07-20', 'BRG010', 55, 'KELUAR'),
(321, 'K202007200003', '2020-07-20', 'BRG004', 0, 'MASUK'),
(322, 'K202007200003', '2020-07-20', 'BRG008', 0, 'MASUK'),
(323, 'K202007200003', '2020-07-20', 'BRG014', 0, 'MASUK'),
(324, 'K202007200003', '2020-07-20', 'BRG010', 0, 'MASUK'),
(328, 'K202007200004', '2020-07-20', 'BRG016', 55, 'KELUAR'),
(329, 'K202007200004', '2020-07-20', 'BRG005', 40, 'KELUAR'),
(331, 'K202007200004', '2020-07-20', 'BRG016', 0, 'MASUK'),
(332, 'K202007200004', '2020-07-20', 'BRG005', 0, 'MASUK'),
(334, 'K202007200005', '2020-07-20', 'BRG009', 35, 'KELUAR'),
(335, 'K202007200005', '2020-07-20', 'BRG016', 20, 'KELUAR'),
(337, 'K202007200005', '2020-07-20', 'BRG009', 0, 'MASUK'),
(338, 'K202007200005', '2020-07-20', 'BRG016', 0, 'MASUK'),
(339, 'T202007270001', '2020-07-27', 'BRG014', 25, 'MASUK'),
(340, 'T202007270001', '2020-07-27', 'BRG013', 30, 'MASUK'),
(342, 'T202007270001', '2020-07-27', 'BRG014', 0, 'KELUAR'),
(343, 'T202007270001', '2020-07-27', 'BRG013', 0, 'KELUAR'),
(345, 'T202007270001', '2020-07-27', 'BRG014', 20, 'MASUK'),
(346, 'T202007270001', '2020-07-27', 'BRG013', 30, 'MASUK'),
(348, 'T202007270001', '2020-07-27', 'BRG014', 0, 'KELUAR'),
(349, 'T202007270001', '2020-07-27', 'BRG013', 0, 'KELUAR'),
(351, 'T202007270001', '2020-07-27', 'BRG014', 20, 'MASUK'),
(352, 'T202007270001', '2020-07-27', 'BRG013', 30, 'MASUK'),
(354, 'T202007270001', '2020-07-27', 'BRG014', 0, 'KELUAR'),
(355, 'T202007270001', '2020-07-27', 'BRG013', 0, 'KELUAR'),
(357, 'T202007270002', '2020-07-27', 'BRG006', 15, 'MASUK'),
(358, 'T202007270002', '2020-07-27', 'BRG006', 0, 'KELUAR'),
(359, 'T202007270001', '2020-07-27', 'BRG014', 10, 'MASUK'),
(360, 'T202007270001', '2020-07-27', 'BRG013', 20, 'MASUK'),
(362, 'T202007270001', '2020-07-27', 'BRG014', 0, 'KELUAR'),
(363, 'T202007270001', '2020-07-27', 'BRG013', 0, 'KELUAR'),
(365, 'T202007270001', '2020-07-27', 'BRG014', 10, 'MASUK'),
(366, 'T202007270001', '2020-07-27', 'BRG013', 20, 'MASUK'),
(368, 'T202007270001', '2020-07-27', 'BRG014', 0, 'KELUAR'),
(369, 'T202007270001', '2020-07-27', 'BRG013', 0, 'KELUAR'),
(371, 'T202007270002', '2020-07-27', 'BRG007', 20, 'MASUK'),
(372, 'T202007270002', '2020-07-27', 'BRG008', 15, 'MASUK'),
(374, 'T202007270002', '2020-07-27', 'BRG007', 0, 'KELUAR'),
(375, 'T202007270002', '2020-07-27', 'BRG008', 0, 'KELUAR'),
(377, 'T202007270001', '2020-07-27', 'BRG006', 20, 'MASUK'),
(378, 'T202007270001', '2020-07-27', 'BRG005', 12, 'MASUK'),
(380, 'T202007270001', '2020-07-27', 'BRG006', 0, 'KELUAR'),
(381, 'T202007270001', '2020-07-27', 'BRG005', 0, 'KELUAR'),
(383, 'T202007270001', '2020-07-27', 'BRG006', 15, 'MASUK'),
(384, 'T202007270001', '2020-07-27', 'BRG005', 10, 'MASUK'),
(386, 'T202007270001', '2020-07-27', 'BRG006', 0, 'KELUAR'),
(387, 'T202007270001', '2020-07-27', 'BRG005', 0, 'KELUAR'),
(388, 'K202007270001', '2020-07-27', 'BRG008', 20, 'KELUAR'),
(389, 'K202007270001', '2020-07-27', 'BRG007', 30, 'KELUAR'),
(391, 'K202007270001', '2020-07-27', 'BRG008', 0, 'MASUK'),
(392, 'K202007270001', '2020-07-27', 'BRG007', 0, 'MASUK');

-- --------------------------------------------------------

--
-- Table structure for table `tbkategori`
--

CREATE TABLE `tbkategori` (
  `kode_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbkategori`
--

INSERT INTO `tbkategori` (`kode_kategori`, `nama_kategori`) VALUES
(1, 'Jam tangan'),
(2, 'Strap'),
(3, 'Perhiasan'),
(4, 'Aksesoris');

-- --------------------------------------------------------

--
-- Table structure for table `tblogin`
--

CREATE TABLE `tblogin` (
  `profil` varchar(225) NOT NULL,
  `ukuran` int(11) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `id_login` varchar(6) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `status_admin` varchar(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `skype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblogin`
--

INSERT INTO `tblogin` (`profil`, `ukuran`, `tipe`, `id_login`, `username`, `password`, `nama_admin`, `status_admin`, `email`, `telepon`, `skype`) VALUES
('isaac.jpg', 144756, 'image/jpeg', 'ADM001', 'isaactbn', '123456', 'Isaac Tambunan', 'Admin', 'isaactambunan@gmail.com', '082127582327', 'isaac_tbn'),
('winda.jpg', 127967, 'image/jpeg', 'ADM002', 'winhdn', '654321', 'Winda Sishadi', 'Admin', 'winda@gmail.com', '086273621375', 'windaaa');

-- --------------------------------------------------------

--
-- Table structure for table `tbpenerimaan`
--

CREATE TABLE `tbpenerimaan` (
  `kode_terima` varchar(20) NOT NULL,
  `tanggal_terima` date NOT NULL,
  `jumlah_item` int(11) NOT NULL,
  `kode_store` varchar(6) NOT NULL,
  `id_login` varchar(6) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpenerimaan`
--

INSERT INTO `tbpenerimaan` (`kode_terima`, `tanggal_terima`, `jumlah_item`, `kode_store`, `id_login`, `keterangan`) VALUES
('T202007200001', '2020-07-20', 4, 'DEP001', 'ADM001', 'PO 001'),
('T202007200002', '2020-07-20', 2, 'DEP002', 'ADM001', 'PO 002'),
('T202007200003', '2020-07-20', 2, 'DEP003', 'ADM001', 'PO 003'),
('T202007200004', '2020-07-20', 2, 'DEP004', 'ADM001', 'PO 004'),
('T202007200005', '2020-07-20', 2, 'DEP005', 'ADM001', 'PO 005'),
('T202007200006', '2020-07-20', 2, 'DEP006', 'ADM001', 'PO 006'),
('T202007200007', '2020-07-20', 2, 'DEP007', 'ADM001', 'PO 007'),
('T202007200008', '2020-07-20', 2, 'DEP003', 'ADM002', 'URGENT'),
('T202007270001', '2020-07-27', 2, 'DEP002', 'ADM001', 'PO 3162');

-- --------------------------------------------------------

--
-- Table structure for table `tbpengeluaran`
--

CREATE TABLE `tbpengeluaran` (
  `kode_keluar` varchar(20) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `jumlah_item` int(11) NOT NULL,
  `kode_store` varchar(20) NOT NULL,
  `id_login` varchar(60) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpengeluaran`
--

INSERT INTO `tbpengeluaran` (`kode_keluar`, `tanggal_keluar`, `jumlah_item`, `kode_store`, `id_login`, `keterangan`) VALUES
('K202007200001', '2020-07-20', 3, 'DEP008', 'ADM002', 'PO 0011'),
('K202007200002', '2020-07-20', 2, 'DEP009', 'ADM002', 'PO 0012'),
('K202007200003', '2020-07-20', 4, 'DEP012', 'ADM002', 'PO 0013'),
('K202007200004', '2020-07-20', 2, 'DEP010', 'ADM002', 'PO 0014'),
('K202007200005', '2020-07-20', 2, 'DEP011', 'ADM002', 'PO 0015'),
('K202007270001', '2020-07-27', 2, 'DEP012', 'ADM001', 'PO 9972');

-- --------------------------------------------------------

--
-- Table structure for table `tbsementara`
--

CREATE TABLE `tbsementara` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `kode_barang` varchar(6) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbstore`
--

CREATE TABLE `tbstore` (
  `kode_store` varchar(6) NOT NULL,
  `nama_store` varchar(30) NOT NULL,
  `ext` varchar(20) NOT NULL,
  `nama_superviser` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbstore`
--

INSERT INTO `tbstore` (`kode_store`, `nama_store`, `ext`, `nama_superviser`) VALUES
('DEP001', 'Daniel Wellington', 'Suplier', 'Joey'),
('DEP002', 'Olivia Burton', 'Suplier', 'Michelle'),
('DEP003', 'D1 Milano', 'Suplier', 'Jack'),
('DEP004', 'ADIDAS', 'Suplier', 'Michael'),
('DEP005', 'TIMEX', 'Suplier', 'Jackson'),
('DEP006', 'KOMONO', 'Suplier', 'Peer'),
('DEP007', 'MVMT', 'Suplier', 'Kylee'),
('DEP008', 'TWC Plaza Indonesia', 'Store', 'Susan'),
('DEP009', 'TWC Pacific Place', 'Store', 'Billy'),
('DEP010', 'TWC Summarecon Mall Serpong', 'Store', 'Bondan'),
('DEP011', 'TWC AEON MALL', 'Store', 'Dandi'),
('DEP012', 'TWC Trans Studio Bandung', 'Store', 'Dila');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbbarang`
--
ALTER TABLE `tbbarang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `tbdetail_penerimaan`
--
ALTER TABLE `tbdetail_penerimaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbdetail_pengeluaran`
--
ALTER TABLE `tbdetail_pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbgabung_transaksi`
--
ALTER TABLE `tbgabung_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbkategori`
--
ALTER TABLE `tbkategori`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indexes for table `tblogin`
--
ALTER TABLE `tblogin`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `tbpenerimaan`
--
ALTER TABLE `tbpenerimaan`
  ADD PRIMARY KEY (`kode_terima`);

--
-- Indexes for table `tbpengeluaran`
--
ALTER TABLE `tbpengeluaran`
  ADD PRIMARY KEY (`kode_keluar`);

--
-- Indexes for table `tbsementara`
--
ALTER TABLE `tbsementara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbstore`
--
ALTER TABLE `tbstore`
  ADD PRIMARY KEY (`kode_store`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbdetail_penerimaan`
--
ALTER TABLE `tbdetail_penerimaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbdetail_pengeluaran`
--
ALTER TABLE `tbdetail_pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbgabung_transaksi`
--
ALTER TABLE `tbgabung_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=393;

--
-- AUTO_INCREMENT for table `tbkategori`
--
ALTER TABLE `tbkategori`
  MODIFY `kode_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbsementara`
--
ALTER TABLE `tbsementara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
