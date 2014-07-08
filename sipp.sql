/*
Navicat MySQL Data Transfer

Source Server         : basdat
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : sipp

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2014-07-08 10:05:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `t_accountmanager`
-- ----------------------------
DROP TABLE IF EXISTS `t_accountmanager`;
CREATE TABLE `t_accountmanager` (
  `nik` int(11) NOT NULL,
  `no_am` int(5) NOT NULL AUTO_INCREMENT,
  `nama_am` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `alamat_am` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `tlp_am` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `email_am` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_am` varchar(3) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`no_am`),
  UNIQUE KEY `nik` (`nik`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of t_accountmanager
-- ----------------------------
INSERT INTO `t_accountmanager` VALUES ('9392', '1', 'Anang Siswanto', 'Blora', '0353-511822', 'anang@siswanto', '1243', 'ON');

-- ----------------------------
-- Table structure for `t_aktivitas`
-- ----------------------------
DROP TABLE IF EXISTS `t_aktivitas`;
CREATE TABLE `t_aktivitas` (
  `id_ak` int(11) NOT NULL AUTO_INCREMENT,
  `no_ak` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tgl_ak` date NOT NULL,
  `pekerjaan` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `anggaran` int(11) NOT NULL,
  `progress` longtext COLLATE latin1_general_ci NOT NULL,
  `aksi` longtext COLLATE latin1_general_ci NOT NULL,
  `status_ak` enum('ON','OFF') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_ak`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of t_aktivitas
-- ----------------------------
INSERT INTO `t_aktivitas` VALUES ('2', 'AK06072014-1', '0000-00-00', 'tset', '343', '338test', 'ydryyrdyrdydry', 'ON');
INSERT INTO `t_aktivitas` VALUES ('3', 'AK06072014-3', '0000-00-00', 'test', '343', 'testse', 'testset', 'ON');
INSERT INTO `t_aktivitas` VALUES ('4', 'AK06072014-4', '0000-00-00', 'tes', '343', 'tse', 'tse', 'ON');

-- ----------------------------
-- Table structure for `t_detail_preorder`
-- ----------------------------
DROP TABLE IF EXISTS `t_detail_preorder`;
CREATE TABLE `t_detail_preorder` (
  `id_detail_po` int(11) NOT NULL AUTO_INCREMENT,
  `id_po` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  PRIMARY KEY (`id_detail_po`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_detail_preorder
-- ----------------------------
INSERT INTO `t_detail_preorder` VALUES ('5', '8', '8', '34');
INSERT INTO `t_detail_preorder` VALUES ('7', '8', '8', '12');

-- ----------------------------
-- Table structure for `t_manajemensurat`
-- ----------------------------
DROP TABLE IF EXISTS `t_manajemensurat`;
CREATE TABLE `t_manajemensurat` (
  `id_surat` int(11) NOT NULL AUTO_INCREMENT,
  `nama_file` varchar(150) NOT NULL,
  `status_surat` varchar(10) NOT NULL,
  `no_am` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_surat`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_manajemensurat
-- ----------------------------
INSERT INTO `t_manajemensurat` VALUES ('2', 'ttsetset', 'APPROVE', '1', '342342342');

-- ----------------------------
-- Table structure for `t_pelanggan`
-- ----------------------------
DROP TABLE IF EXISTS `t_pelanggan`;
CREATE TABLE `t_pelanggan` (
  `id_plgn` int(11) NOT NULL AUTO_INCREMENT,
  `no_pelanggan` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nama_plgn` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `alamat_plgn` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `cp_plgn` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nik` int(11) NOT NULL,
  `status_plgn` varchar(3) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_plgn`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of t_pelanggan
-- ----------------------------
INSERT INTO `t_pelanggan` VALUES ('7', 'PL07072014-1', 'test pelanggan', 'test', 'test', '9392', 'ON');

-- ----------------------------
-- Table structure for `t_penjualan`
-- ----------------------------
DROP TABLE IF EXISTS `t_penjualan`;
CREATE TABLE `t_penjualan` (
  `id_penj` int(11) NOT NULL AUTO_INCREMENT,
  `id_po` int(11) NOT NULL,
  `no_penj` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tgl_penj` date NOT NULL,
  `status_penjualan` int(11) NOT NULL,
  PRIMARY KEY (`id_penj`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of t_penjualan
-- ----------------------------
INSERT INTO `t_penjualan` VALUES ('9', '7', 'PJ07072014-1', '2014-07-10', '1');

-- ----------------------------
-- Table structure for `t_preorder`
-- ----------------------------
DROP TABLE IF EXISTS `t_preorder`;
CREATE TABLE `t_preorder` (
  `id_po` int(11) NOT NULL AUTO_INCREMENT,
  `no_po` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `no_pelanggan` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tgl_po` date NOT NULL,
  `deadline` date NOT NULL,
  `status_po` varchar(8) COLLATE latin1_general_ci NOT NULL,
  `persetujuan_po` int(11) NOT NULL,
  PRIMARY KEY (`id_po`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of t_preorder
-- ----------------------------
INSERT INTO `t_preorder` VALUES ('8', 'PO07072014-8', 'PL07072014-1', '2014-07-08', '2014-08-22', 'Process', '0');
INSERT INTO `t_preorder` VALUES ('7', 'PO07072014-7', 'PL07072014-1', '2014-07-07', '2014-07-08', 'Finish', '0');

-- ----------------------------
-- Table structure for `t_produk`
-- ----------------------------
DROP TABLE IF EXISTS `t_produk`;
CREATE TABLE `t_produk` (
  `id_prod` int(11) NOT NULL AUTO_INCREMENT,
  `no_prod` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `nama_prod` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `hrg_prod` int(11) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  PRIMARY KEY (`id_prod`),
  UNIQUE KEY `no_prod` (`no_prod`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of t_produk
-- ----------------------------
INSERT INTO `t_produk` VALUES ('8', '54253', 'Solar PV Hybrid', '20000000', '234');

-- ----------------------------
-- Table structure for `t_user`
-- ----------------------------
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `status_user` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `last_login` date NOT NULL,
  `use_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=1246 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of t_user
-- ----------------------------
INSERT INTO `t_user` VALUES ('1234', 'Aulia Siska Narastiti', '1234a', 'A', 'ON', '2014-07-08', '0');
INSERT INTO `t_user` VALUES ('1243', 'test', 'test', 'AM', 'ON', '2014-07-07', '1');
