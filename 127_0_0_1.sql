-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2014 at 03:34 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cdcol`
--

-- --------------------------------------------------------

--
-- Table structure for table `cds`
--

CREATE TABLE IF NOT EXISTS `cds` (
  `titel` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `interpret` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `jahr` int(11) DEFAULT NULL,
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cds`
--

INSERT INTO `cds` (`titel`, `interpret`, `jahr`, `id`) VALUES
('Beauty', 'Ryuichi Sakamoto', 1990, 1),
('Goodbye Country (Hello Nightclub)', 'Groove Armada', 2001, 4),
('Glee', 'Bran Van 3000', 1997, 5);
--
-- Database: `phpmyadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `pma_bookmark`
--

CREATE TABLE IF NOT EXISTS `pma_bookmark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pma_column_info`
--

CREATE TABLE IF NOT EXISTS `pma_column_info` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin' AUTO_INCREMENT=40 ;

--
-- Dumping data for table `pma_column_info`
--

INSERT INTO `pma_column_info` (`id`, `db_name`, `table_name`, `column_name`, `comment`, `mimetype`, `transformation`, `transformation_options`) VALUES
(15, 'sipp', 't_penjualan', 'id_penj', '', '', '_', ''),
(14, 'sipp', 't_preorder', 'id_po', '', '', '_', ''),
(32, 'sipp', 't_reportMonitoring', 'anggaran', '', '', '_', ''),
(18, 'sipp', 't_preorder', 'status_po', '', '', '_', ''),
(8, 'sipp', 't_manajemensurat', 'nama_file', '', '', '_', ''),
(9, 'sipp', 't_manajemensurat', 'status_surat', '', '', '_', ''),
(10, 'sipp', 't_manajemensurat', 'nama_am', '', '', '_', ''),
(11, 'sipp', 't_manajemensurat', 'keterangan', '', '', '_', ''),
(12, 'sipp', 't_manajemensurat', 'id_surat', '', '', '_', ''),
(31, 'sipp', 't_reportMonitoring', 'pekerjaan', '', '', '_', ''),
(30, 'sipp', 't_reportMonitoring', 'tgl_report', '', '', '_', ''),
(23, 'sipp', 't_accountmanager', 'daftar_report', '', '', '_', ''),
(29, 'sipp', 't_reportMonitoring', 'no_report', '', '', '_', ''),
(28, 'sipp', 't_reportMonitoring', 'id_report', '', '', '_', ''),
(33, 'sipp', 't_reportMonitoring', 'progress', '', '', '_', ''),
(34, 'sipp', 't_reportMonitoring', 'aksi', '', '', '_', ''),
(35, 'sipp', 't_reportMonitoring', 'status_report', '', '', '_', ''),
(36, 'sipp', 't_reportmonitoring', 'id_report', '', '', '_', ''),
(37, 'sipp', 't_manajemensurat', 'nama_subjek', '', '', '_', ''),
(38, 'sipp', 't_produk', 'no_prod', '', '', '_', ''),
(39, 'sipp', 't_accountmanager', 'daftar_plgn', '', '', '_', '');

-- --------------------------------------------------------

--
-- Table structure for table `pma_designer_coords`
--

CREATE TABLE IF NOT EXISTS `pma_designer_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `x` int(11) DEFAULT NULL,
  `y` int(11) DEFAULT NULL,
  `v` tinyint(4) DEFAULT NULL,
  `h` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`db_name`,`table_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma_history`
--

CREATE TABLE IF NOT EXISTS `pma_history` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`,`db`,`table`,`timevalue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pma_pdf_pages`
--

CREATE TABLE IF NOT EXISTS `pma_pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  PRIMARY KEY (`page_nr`),
  KEY `db_name` (`db_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pma_recent`
--

CREATE TABLE IF NOT EXISTS `pma_recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma_recent`
--

INSERT INTO `pma_recent` (`username`, `tables`) VALUES
('root', '[{"db":"sipp","table":"t_accountmanager"},{"db":"sipp","table":"t_produk"},{"db":"sipp","table":"t_user"},{"db":"sipp","table":"t_reportmonitoring"},{"db":"sipp","table":"t_preorder"},{"db":"sipp","table":"t_penjualan"},{"db":"sipp","table":"t_pelanggan"},{"db":"sipp","table":"t_manajemensurat"},{"db":"sipp","table":"t_detail_preorder"},{"db":"sipp","table":"t_aktivitas"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma_relation`
--

CREATE TABLE IF NOT EXISTS `pma_relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  KEY `foreign_field` (`foreign_db`,`foreign_table`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma_table_coords`
--

CREATE TABLE IF NOT EXISTS `pma_table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float unsigned NOT NULL DEFAULT '0',
  `y` float unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma_table_info`
--

CREATE TABLE IF NOT EXISTS `pma_table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`db_name`,`table_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma_table_uiprefs`
--

CREATE TABLE IF NOT EXISTS `pma_table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`username`,`db_name`,`table_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma_tracking`
--

CREATE TABLE IF NOT EXISTS `pma_tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) unsigned NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`db_name`,`table_name`,`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma_userconfig`
--

CREATE TABLE IF NOT EXISTS `pma_userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma_userconfig`
--

INSERT INTO `pma_userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2014-06-18 16:53:37', '{"collation_connection":"utf8mb4_unicode_ci"}');
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
  `daftar_plgn` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `daftar_report` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `status_am` varchar(3) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`no_am`),
  UNIQUE KEY `nik` (`nik`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `t_accountmanager`
--

INSERT INTO `t_accountmanager` (`nik`, `no_am`, `nama_am`, `alamat_am`, `tlp_am`, `email_am`, `id_user`, `daftar_plgn`, `daftar_report`, `status_am`) VALUES
(0, 6, '', '', '', '', 0, '', '0', '0'),
(12312, 7, 'sddasf', 'adsf', '234', 'asdd@dsf', 1235, 'ON', '0', '0'),
(12323, 8, 'dsf', 'df', '123', '23s@ldf', 0, 'ON', '0', '0'),
(23, 9, 'sf', 'sdg', '345', 'dsf@rg', 1236, 'ON', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `t_detail_preorder`
--

CREATE TABLE IF NOT EXISTS `t_detail_preorder` (
  `id_detail_po` int(11) NOT NULL AUTO_INCREMENT,
  `id_po` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  PRIMARY KEY (`id_detail_po`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_manajemensurat`
--

CREATE TABLE IF NOT EXISTS `t_manajemensurat` (
  `id_surat` int(11) NOT NULL AUTO_INCREMENT,
  `no_pelanggan` varchar(20) NOT NULL,
  `nama_subjek` varchar(150) NOT NULL,
  `status_surat` varchar(10) NOT NULL,
  `no_am` int(11) NOT NULL,
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
  PRIMARY KEY (`id_plgn`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `t_pelanggan`
--

INSERT INTO `t_pelanggan` (`id_plgn`, `no_pelanggan`, `nama_plgn`, `alamat_plgn`, `cp_plgn`, `nik`, `status_plgn`) VALUES
(11, 'PL12072014-1', 'PT Pos Indonesia', 'Jl. Pos 01', '022-12345', 0, 'ON'),
(12, 'PL15072014-12', 'PT ABC', 'Jl. ABC', 'ABC', 0, 'ON'),
(13, 'PL04082014-13', 'aa', 'asdfhj', 'asd', 0, 'ON');

-- --------------------------------------------------------

--
-- Table structure for table `t_penjualan`
--

CREATE TABLE IF NOT EXISTS `t_penjualan` (
  `id_penj` int(11) NOT NULL AUTO_INCREMENT,
  `id_po` int(11) NOT NULL,
  `no_penj` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tgl_penj` date NOT NULL,
  `status_penjualan` int(11) NOT NULL,
  PRIMARY KEY (`id_penj`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `t_penjualan`
--

INSERT INTO `t_penjualan` (`id_penj`, `id_po`, `no_penj`, `tgl_penj`, `status_penjualan`) VALUES
(10, 13, 'PJ04082014-1', '2014-08-04', 1),
(11, 14, 'PJ04082014-11', '2014-08-03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_preorder`
--

CREATE TABLE IF NOT EXISTS `t_preorder` (
  `id_po` int(11) NOT NULL AUTO_INCREMENT,
  `no_po` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `no_pelanggan` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tgl_po` date NOT NULL,
  `deadline` date NOT NULL,
  `status_po` varchar(8) COLLATE latin1_general_ci NOT NULL,
  `persetujuan_po` int(11) NOT NULL,
  PRIMARY KEY (`id_po`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `t_preorder`
--

INSERT INTO `t_preorder` (`id_po`, `no_po`, `no_pelanggan`, `tgl_po`, `deadline`, `status_po`, `persetujuan_po`) VALUES
(13, 'PO12072014-1', 'PL12072014-1', '2014-07-13', '2014-07-14', 'Finish', 0),
(14, 'PO21072014-14', 'PL15072014-12', '2014-07-21', '2014-07-21', 'Finish', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_produk`
--

CREATE TABLE IF NOT EXISTS `t_produk` (
  `id_prod` int(11) NOT NULL AUTO_INCREMENT,
  `no_prod` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `nama_prod` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `hrg_prod` int(11) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  PRIMARY KEY (`id_prod`),
  UNIQUE KEY `no_prod` (`no_prod`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `t_produk`
--

INSERT INTO `t_produk` (`id_prod`, `no_prod`, `nama_prod`, `hrg_prod`, `kapasitas`) VALUES
(11, 'PDHS1', 'PV-Diesel Hybrid Sys', 9000000, 1000),
(10, 'SHS1', 'Solar Home System', 8000000, 500),
(12, 'PWDHS1', 'PV-Wind-Diesel Hybri', 10000000, 850),
(13, 'SAPS1', 'Stand Alone PV Syste', 11000000, 50),
(14, 'SSL1', 'Solar Street Light', 5000000, 200),
(15, 'STS1', 'Solar Tree System', 7000000, 500),
(16, 'GCPS1', 'Grid-Connection PV S', 1000000, 1000),
(17, 'GCPS2', 'Grid-Connection PV S', 12000000, 1200),
(18, 'SG1', 'Smart Grid', 15000000, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `t_reportmonitoring`
--

CREATE TABLE IF NOT EXISTS `t_reportmonitoring` (
  `id_report` int(11) NOT NULL AUTO_INCREMENT,
  `no_report` varchar(10) NOT NULL,
  `tgl_report` date NOT NULL,
  `pekerjaan` varchar(200) NOT NULL,
  `anggaran` int(11) NOT NULL,
  `progress` longtext NOT NULL,
  `aksi` longtext NOT NULL,
  `status_report` enum('ON','OFF') NOT NULL,
  PRIMARY KEY (`id_report`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `t_reportmonitoring`
--

INSERT INTO `t_reportmonitoring` (`id_report`, `no_report`, `tgl_report`, `pekerjaan`, `anggaran`, `progress`, `aksi`, `status_report`) VALUES
(2, '0', '0000-00-00', 'PT Pos Indonesia', 100000000, 'Pembuatan prototype', '0', ''),
(3, '0', '0000-00-00', 'PT Pos Indonesia', 100000000, 'Pembuatan prototype', '0', '');

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
  `use_user` int(11) DEFAULT NULL,
  `no_pelanggan` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1246 ;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id_user`, `username`, `password`, `level`, `status_user`, `last_login`, `use_user`, `no_pelanggan`) VALUES
(1234, 'Aulia Siska Narastiti', '1234a', 'A', 'ON', '2014-08-04', 0, ''),
(1235, 'Account Manager 1', 'am1', 'AM', 'ON', '2014-07-12', 1, ''),
(1236, 'Aaa', 'aaa', 'AM', 'ON', '2014-08-04', 1, ''),
(1237, 'aa', 'aa', 'PL', 'ON', '2014-08-04', 0, '');
--
-- Database: `test`
--
--
-- Database: `webauth`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_pwd`
--

CREATE TABLE IF NOT EXISTS `user_pwd` (
  `name` char(30) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `pass` char(32) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `user_pwd`
--

INSERT INTO `user_pwd` (`name`, `pass`) VALUES
('xampp', 'wampp');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
