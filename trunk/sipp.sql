-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2014 at 11:30 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sipp`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_accountmanager`
--

CREATE TABLE IF NOT EXISTS `t_accountmanager` (
  `nik` int(11) NOT NULL,
  `no_am` int(5) NOT NULL AUTO_INCREMENT,
  `nama_am` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `alamat_am` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `tlp_am` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `email_am` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_am` varchar(3) COLLATE latin1_general_ci NOT NULL,
  `daftar_plgn` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`no_am`),
  UNIQUE KEY `nik` (`nik`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `t_accountmanager`
--

INSERT INTO `t_accountmanager` (`nik`, `no_am`, `nama_am`, `alamat_am`, `tlp_am`, `email_am`, `id_user`, `status_am`, `daftar_plgn`) VALUES
(9392, 1, 'Anang Siswanto', 'Blora', '0353-511822', 'anang@siswanto', 1243, 'ON', '0');

-- --------------------------------------------------------

--
-- Table structure for table `t_aktivitas`
--

CREATE TABLE IF NOT EXISTS `t_aktivitas` (
  `no_ak` int(5) NOT NULL AUTO_INCREMENT,
  `tgl_ak` date NOT NULL,
  `pekerjaan` longtext COLLATE latin1_general_ci NOT NULL,
  `anggaran` int(11) NOT NULL,
  `progress` longtext COLLATE latin1_general_ci NOT NULL,
  `aksi` longtext COLLATE latin1_general_ci NOT NULL,
  `status_ak` enum('ON','OFF') COLLATE latin1_general_ci NOT NULL,
  `id_ak` int(11) NOT NULL,
  PRIMARY KEY (`no_ak`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_manajemensurat`
--

CREATE TABLE IF NOT EXISTS `t_manajemensurat` (
  `id_surat` int(11) NOT NULL AUTO_INCREMENT,
  `nama_file` varchar(30) NOT NULL,
  `status_surat` varchar(10) NOT NULL,
  `nama_am` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_surat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_pelanggan`
--

CREATE TABLE IF NOT EXISTS `t_pelanggan` (
  `id_plgn` int(11) NOT NULL AUTO_INCREMENT,
  `no_pelanggan` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nama_plgn` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `alamat_plgn` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `cp_plgn` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nik` int(11) NOT NULL,
  `status_plgn` varchar(3) COLLATE latin1_general_ci NOT NULL,
  `daftar_po` varchar(10) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_plgn`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `t_pelanggan`
--

INSERT INTO `t_pelanggan` (`id_plgn`, `no_pelanggan`, `nama_plgn`, `alamat_plgn`, `cp_plgn`, `nik`, `status_plgn`, `daftar_po`) VALUES
(6, 'PL25062014-090414', 'tset', 'tset', 'test', 9392, 'ON', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_penjualan`
--

CREATE TABLE IF NOT EXISTS `t_penjualan` (
  `id_penj` int(11) NOT NULL AUTO_INCREMENT,
  `no_penj` int(11) NOT NULL,
  `tgl_penj` date NOT NULL,
  `jml_penj` int(11) NOT NULL,
  `totHrg_penj` int(11) NOT NULL,
  `keuntungan` int(11) NOT NULL,
  PRIMARY KEY (`id_penj`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_preorder`
--

CREATE TABLE IF NOT EXISTS `t_preorder` (
  `id_po` int(11) NOT NULL AUTO_INCREMENT,
  `no_po` int(11) NOT NULL,
  `tgl_po` date NOT NULL,
  `jml_po` int(11) NOT NULL,
  `totHrg_po` int(11) NOT NULL,
  `deadline` date NOT NULL,
  `status_po` varchar(8) COLLATE latin1_general_ci NOT NULL,
  `daftar_prod` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_po`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_produk`
--

CREATE TABLE IF NOT EXISTS `t_produk` (
  `id_prod` int(11) NOT NULL AUTO_INCREMENT,
  `no_prod` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `nama_prod` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `hrg_prod` int(11) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  PRIMARY KEY (`id_prod`),
  UNIQUE KEY `no_prod` (`no_prod`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `t_produk`
--

INSERT INTO `t_produk` (`id_prod`, `no_prod`, `nama_prod`, `hrg_prod`, `kapasitas`) VALUES
(8, '54253', 'Solar PV Hybrid', 20000000, 234);

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE IF NOT EXISTS `t_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `status_user` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `last_login` date NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1245 ;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id_user`, `username`, `password`, `level`, `status_user`, `last_login`) VALUES
(1234, 'Aulia Siska Narastiti', '1234a', 'A', 'ON', '2014-07-02'),
(1243, 'test', 'test', 'AM', 'ON', '2014-07-04'),
(1244, 'test', 'test', 'PL', 'ON', '2014-06-30');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
