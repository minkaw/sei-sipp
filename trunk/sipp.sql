/*
Navicat MySQL Data Transfer

Source Server         : basdat
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : sipp

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2014-06-26 21:58:58
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
  `daftar_plgn` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`no_am`),
  UNIQUE KEY `nik` (`nik`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of t_accountmanager
-- ----------------------------
INSERT INTO `t_accountmanager` VALUES ('9392', '1', 'Anang Siswanto', 'Blora', '0353-511822', 'anang@siswanto', '1243', 'ON', '0');
INSERT INTO `t_accountmanager` VALUES ('13123123', '2', 'test', 'test', '23231', '1313123', '1245', 'ON', '0');

-- ----------------------------
-- Table structure for `t_aktivitas`
-- ----------------------------
DROP TABLE IF EXISTS `t_aktivitas`;
CREATE TABLE `t_aktivitas` (
  `no_ak` int(5) NOT NULL,
  `tgl_ak` date NOT NULL,
  `pekerjaan` longtext COLLATE latin1_general_ci NOT NULL,
  `anggaran` int(11) NOT NULL,
  `progress` int(11) NOT NULL,
  `aksi` longtext COLLATE latin1_general_ci NOT NULL,
  `status_ak` enum('active','non_active') COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of t_aktivitas
-- ----------------------------

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
  `daftar_po` varchar(10) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_plgn`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of t_pelanggan
-- ----------------------------
INSERT INTO `t_pelanggan` VALUES ('1', '', 'PT POS', 'Jl. Merdeka', 'Agung 022-122233', '0', 'ON', '');
INSERT INTO `t_pelanggan` VALUES ('6', 'PL25062014-090414', 'tset', 'tset', 'test', '9392', 'ON', '');
INSERT INTO `t_pelanggan` VALUES ('7', 'PL26062014-164006', 'tset', 'test', '3434', '13123123', 'ON', '');

-- ----------------------------
-- Table structure for `t_penjualan`
-- ----------------------------
DROP TABLE IF EXISTS `t_penjualan`;
CREATE TABLE `t_penjualan` (
  `no_penj` int(11) NOT NULL,
  `tgl_penj` date NOT NULL,
  `jml_penj` int(11) NOT NULL,
  `totHrg_penj` int(11) NOT NULL,
  `keuntungan` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of t_penjualan
-- ----------------------------

-- ----------------------------
-- Table structure for `t_preorder`
-- ----------------------------
DROP TABLE IF EXISTS `t_preorder`;
CREATE TABLE `t_preorder` (
  `no_po` int(11) NOT NULL,
  `tgl_po` date NOT NULL,
  `jml_po` int(11) NOT NULL,
  `totHrg_po` int(11) NOT NULL,
  `deadline` date NOT NULL,
  `status_po` enum('process','overtime','finish') COLLATE latin1_general_ci NOT NULL,
  `daftar_prod` varchar(20) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of t_preorder
-- ----------------------------

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
INSERT INTO `t_produk` VALUES ('3', '1234', 'Solar Home System', '3000000', '3400');
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
  `use_user` int(2) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=1248 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of t_user
-- ----------------------------
INSERT INTO `t_user` VALUES ('1234', 'Aulia Siska Narastiti', '1234a', 'A', 'ON', '2014-06-26', '0');
INSERT INTO `t_user` VALUES ('1243', 'test', 'test', 'AM', 'ON', '2014-06-25', '1');
INSERT INTO `t_user` VALUES ('1244', 'test', 'test', 'PL', 'ON', '2014-06-26', '0');
INSERT INTO `t_user` VALUES ('1245', 'test22', 'test2', 'AM', 'ON', '2014-06-26', '0');
INSERT INTO `t_user` VALUES ('1246', 'test3', 'test3', 'AM', 'ON', '2014-06-26', '0');
INSERT INTO `t_user` VALUES ('1247', 'test', '1223', 'PL', 'ON', '2014-06-26', '0');
