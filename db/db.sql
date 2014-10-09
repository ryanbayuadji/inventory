/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : inventory

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2014-10-10 00:43:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `categories`
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) NOT NULL,
  `active` char(1) NOT NULL,
  `created_user` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_user` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('16', 'Karpet', 'Y', '1', '2012-08-11 07:28:54', '0', '0000-00-00 00:00:00');
INSERT INTO `categories` VALUES ('17', 'Lemari Plastik dan Kursi', 'Y', '1', '2012-08-11 07:29:00', '1', '2012-08-11 10:35:00');
INSERT INTO `categories` VALUES ('18', 'Guci, Kaki, Dispanser, dan Galon', 'Y', '1', '2012-08-11 07:29:33', '0', '0000-00-00 00:00:00');
INSERT INTO `categories` VALUES ('19', 'Termos Panas, Nasi, dan Es', 'Y', '1', '2012-08-11 07:30:32', '0', '0000-00-00 00:00:00');
INSERT INTO `categories` VALUES ('20', 'Kasur Lantai dan Busa', 'Y', '1', '2012-08-11 07:31:01', '1', '2012-08-11 07:49:08');
INSERT INTO `categories` VALUES ('21', 'Kipas Angin', 'Y', '1', '2012-08-11 07:49:01', '0', '0000-00-00 00:00:00');
INSERT INTO `categories` VALUES ('22', 'Tikar, Rak Piring, Jemuran, dan Sepatu', 'Y', '1', '2012-08-11 07:51:30', '1', '2012-08-11 10:47:52');
INSERT INTO `categories` VALUES ('23', 'Kompor Gas', 'Y', '1', '2012-08-11 07:58:02', '0', '0000-00-00 00:00:00');
INSERT INTO `categories` VALUES ('24', 'Magic Com / Magic Warm / Magic Jar', 'Y', '1', '2012-08-11 08:39:05', '0', '0000-00-00 00:00:00');
INSERT INTO `categories` VALUES ('25', 'Terpal / Layar', 'Y', '5', '2012-08-04 07:48:40', '0', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `employes`
-- ----------------------------
DROP TABLE IF EXISTS `employes`;
CREATE TABLE `employes` (
  `employe_id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(16) NOT NULL,
  `name` varchar(128) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `created_user` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_user` int(11) NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`employe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of employes
-- ----------------------------
INSERT INTO `employes` VALUES ('1', '2012', 'Administrator', 'Jl. Pegadaian No. 38 Arjawinangun, Cirebon', '08562121141', 'takehikoboyz@gmail.com', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00');
INSERT INTO `employes` VALUES ('6', '20120811', 'Agus Saputra', 'Jl. Pegadaian No. 38 Arjawinangun, Cirebon 45162', '08562121141', 'takehikoboyz@gmail.com', '1', '2012-08-11 07:22:41', '0', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `merks`
-- ----------------------------
DROP TABLE IF EXISTS `merks`;
CREATE TABLE `merks` (
  `merk_id` int(11) NOT NULL AUTO_INCREMENT,
  `merk` varchar(100) NOT NULL,
  `active` char(1) NOT NULL,
  `created_user` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_user` int(11) NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`merk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of merks
-- ----------------------------
INSERT INTO `merks` VALUES ('1', 'National', 'Y', '0', '2012-08-05 17:16:53', '0', '0000-00-00 00:00:00');
INSERT INTO `merks` VALUES ('2', 'GMC', 'Y', '0', '2012-08-05 17:17:06', '0', '0000-00-00 00:00:00');
INSERT INTO `merks` VALUES ('3', 'Daimaru', 'Y', '0', '2012-08-05 17:17:19', '0', '0000-00-00 00:00:00');
INSERT INTO `merks` VALUES ('4', 'Pattaya', 'Y', '0', '2012-08-05 17:17:25', '0', '0000-00-00 00:00:00');
INSERT INTO `merks` VALUES ('5', 'Napolly', 'Y', '0', '2012-08-05 17:18:09', '0', '0000-00-00 00:00:00');
INSERT INTO `merks` VALUES ('6', 'MNEOT', 'Y', '0', '2012-08-05 17:18:23', '0', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `products`
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `product` varchar(128) NOT NULL,
  `price` int(11) NOT NULL,
  `po_price` int(11) NOT NULL,
  `pm_price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `active` char(1) NOT NULL,
  `description` text NOT NULL,
  `created_user` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_user` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('16', '17', '5', 'Lemari STB 500', '225000', '145000', '150000', '-1', 'Y', '', '1', '2012-08-11 07:32:36', '5', '2012-08-12 09:35:54');
INSERT INTO `products` VALUES ('17', '17', '5', 'Lemari STB 300', '150000', '97000', '110000', '3', 'Y', '', '1', '2012-08-11 07:34:11', '0', '0000-00-00 00:00:00');
INSERT INTO `products` VALUES ('18', '17', '5', 'Lemari STB 400', '170000', '121000', '130000', '4', 'Y', '', '1', '2012-08-11 07:36:17', '5', '2012-08-12 09:35:36');
INSERT INTO `products` VALUES ('19', '18', '5', 'Galon Besar', '45000', '30000', '35000', '2', 'Y', '', '1', '2012-08-11 07:42:09', '5', '2012-08-12 09:24:25');
INSERT INTO `products` VALUES ('20', '18', '5', 'Galon Keran Besar', '50000', '35000', '38000', '0', 'Y', '', '1', '2012-08-11 07:43:23', '5', '2012-08-11 09:14:14');
INSERT INTO `products` VALUES ('21', '20', '5', 'Kasur Lantai Palembang (Tulip) 140 x 190', '135000', '93000', '100000', '3', 'Y', '', '1', '2012-08-11 07:45:30', '5', '2012-08-02 06:48:26');
INSERT INTO `products` VALUES ('22', '20', '5', 'Kasur Lantai Palembang (Tulip) 80 x 190', '75000', '53000', '60000', '3', 'Y', '', '1', '2012-08-11 07:47:01', '5', '2012-08-12 09:28:09');
INSERT INTO `products` VALUES ('23', '20', '5', 'Kasur Lantai Palembang (Tulip) 100 x 190', '100000', '70000', '75000', '1', 'Y', '', '1', '2012-08-11 07:48:10', '0', '0000-00-00 00:00:00');
INSERT INTO `products` VALUES ('24', '21', '7', 'Kipas Angin GMC', '175000', '105000', '110000', '4', 'Y', '', '1', '2012-08-11 07:50:58', '5', '2012-08-12 09:28:26');
INSERT INTO `products` VALUES ('25', '18', '6', 'Guci', '90000', '55000', '60000', '7', 'Y', '', '1', '2012-08-11 07:53:42', '0', '0000-00-00 00:00:00');
INSERT INTO `products` VALUES ('26', '18', '5', 'Kaki Guci Biasa', '35000', '15000', '20000', '11', 'Y', '', '1', '2012-08-11 07:55:59', '5', '2012-08-12 09:26:18');
INSERT INTO `products` VALUES ('27', '18', '5', 'Kaki Guci Meja', '35000', '15000', '20000', '8', 'Y', '', '1', '2012-08-11 07:56:47', '5', '2012-08-12 09:26:26');
INSERT INTO `products` VALUES ('28', '23', '7', 'Kompor ProGas Mini', '110000', '65000', '70000', '2', 'Y', '', '1', '2012-08-11 07:59:16', '0', '0000-00-00 00:00:00');
INSERT INTO `products` VALUES ('29', '22', '5', 'Tikar Helios Naga Bonar', '80000', '58000', '65000', '2', 'Y', '', '1', '2012-08-11 08:12:33', '5', '2012-08-12 09:42:56');
INSERT INTO `products` VALUES ('30', '22', '5', 'Tikar Berlian', '45000', '32000', '35000', '8', 'Y', '', '1', '2012-08-11 08:14:06', '5', '2012-08-12 09:42:44');
INSERT INTO `products` VALUES ('31', '16', '5', 'Karpet Daimaru', '10000', '7000', '8000', '5', 'Y', '1 Rol: Rp. 160.000, Isi : 24 Meter', '1', '2012-08-11 08:15:08', '5', '2012-08-12 09:27:34');
INSERT INTO `products` VALUES ('32', '16', '5', 'Karpet Pattaya', '13000', '8000', '10000', '3', 'Y', '1 Rol: Rp. 160.000, Isi: 20 Meter', '1', '2012-08-11 08:17:43', '5', '2012-08-12 09:27:23');
INSERT INTO `products` VALUES ('33', '17', '5', 'Lemari M-NEOT 115', '225000', '150000', '160000', '2', 'Y', '', '1', '2012-08-11 08:19:29', '5', '2012-08-12 09:33:52');
INSERT INTO `products` VALUES ('34', '17', '5', 'Lemari NEA 144', '225000', '155000', '165000', '2', 'Y', '', '1', '2012-08-11 08:21:07', '5', '2012-08-12 09:34:33');
INSERT INTO `products` VALUES ('35', '17', '5', 'Lemari NEA 144 Kaca', '250000', '165000', '175000', '2', 'Y', '', '1', '2012-08-11 08:22:32', '5', '2012-08-12 09:34:43');
INSERT INTO `products` VALUES ('36', '17', '5', 'Lemari Club Mini Susun 3', '350000', '260000', '270000', '3', 'Y', '', '1', '2012-08-11 08:23:32', '1', '2012-08-11 08:33:53');
INSERT INTO `products` VALUES ('37', '17', '5', 'Lemari Gagak Hitam Susun 5', '250000', '155000', '165000', '2', 'Y', '', '1', '2012-08-11 08:33:40', '5', '2012-08-06 08:18:54');
INSERT INTO `products` VALUES ('38', '17', '5', 'Lemari Gagak Hitam Susun 4', '200000', '135000', '140000', '2', 'Y', '', '1', '2012-08-11 08:34:43', '1', '2012-08-11 10:22:29');
INSERT INTO `products` VALUES ('39', '24', '7', 'Magic Com Cosmos CRJ - 520', '250000', '168000', '180000', '4', 'Y', '', '1', '2012-08-11 08:41:26', '5', '2012-08-12 09:36:42');
INSERT INTO `products` VALUES ('40', '24', '7', 'Magic Com Cosmos CRJ - 323 TS', '250000', '173000', '185000', '3', 'Y', '', '1', '2012-08-11 08:43:39', '5', '2012-08-12 09:36:24');
INSERT INTO `products` VALUES ('41', '24', '7', 'Magic Com Cosmos Mini CRJ - 101 TS', '200000', '143000', '150000', '2', 'Y', '', '1', '2012-08-11 09:43:03', '0', '0000-00-00 00:00:00');
INSERT INTO `products` VALUES ('42', '24', '7', 'Magic Com Miyako MCM 638 ', '275000', '175000', '185000', '2', 'Y', '', '1', '2012-08-11 09:44:44', '0', '0000-00-00 00:00:00');
INSERT INTO `products` VALUES ('43', '24', '7', 'Magic Jar Miyako MJ - 709 EP', '225000', '153000', '160000', '2', 'Y', '', '1', '2012-08-11 09:45:44', '0', '0000-00-00 00:00:00');
INSERT INTO `products` VALUES ('44', '24', '7', 'Magic Com National', '200000', '110000', '120000', '3', 'Y', '', '1', '2012-08-11 09:47:07', '0', '0000-00-00 00:00:00');
INSERT INTO `products` VALUES ('45', '23', '7', 'Kompor Gas Niko 2 Tungku', '175000', '100000', '105000', '3', 'Y', '', '1', '2012-08-11 09:48:24', '0', '0000-00-00 00:00:00');
INSERT INTO `products` VALUES ('46', '23', '7', 'Kompor Gas Rinnai RI 522C', '280000', '217000', '230000', '2', 'Y', '', '1', '2012-08-11 09:49:44', '0', '0000-00-00 00:00:00');
INSERT INTO `products` VALUES ('47', '23', '7', 'Kompor Gas Rinnai RI 522E', '325000', '240000', '250000', '2', 'Y', '', '1', '2012-08-11 09:50:39', '0', '0000-00-00 00:00:00');
INSERT INTO `products` VALUES ('48', '17', '6', 'Lemari Club Mini Susun 4', '450000', '340000', '350000', '1', 'Y', '', '1', '2012-08-11 10:00:49', '0', '0000-00-00 00:00:00');
INSERT INTO `products` VALUES ('49', '17', '6', 'Lemari Club Gantung', '525000', '390000', '400000', '1', 'Y', '', '1', '2012-08-11 10:06:39', '0', '0000-00-00 00:00:00');
INSERT INTO `products` VALUES ('50', '17', '6', 'Lemari Club Boneka Besar Susun 4', '525000', '370000', '385000', '1', 'Y', '', '1', '2012-08-11 10:09:27', '1', '2012-08-11 10:13:50');
INSERT INTO `products` VALUES ('51', '17', '6', 'Lemari Club Boneka Besar Susun 3', '400000', '277500', '285000', '5', 'Y', '', '1', '2012-08-11 10:12:17', '5', '2012-08-12 09:31:55');
INSERT INTO `products` VALUES ('53', '17', '6', 'Lemari Club Besar Susun 2', '280000', '200000', '210000', '1', 'Y', '', '1', '2012-08-11 10:17:27', '0', '0000-00-00 00:00:00');
INSERT INTO `products` VALUES ('54', '17', '6', 'Lemari Club Besar Susun 3', '400000', '277500', '285000', '5', 'Y', '', '1', '2012-08-11 10:19:43', '5', '2012-08-12 09:31:22');
INSERT INTO `products` VALUES ('55', '18', '7', 'Dispanser Trisonic', '110000', '55000', '60000', '3', 'Y', '', '1', '2012-08-11 10:24:03', '0', '0000-00-00 00:00:00');
INSERT INTO `products` VALUES ('56', '18', '6', 'Rak Piring Super Besar', '125000', '79000', '85000', '3', 'Y', '', '1', '2012-08-11 10:31:22', '5', '2012-08-12 09:38:23');
INSERT INTO `products` VALUES ('57', '22', '6', 'Rak Piring Super Kecil', '80000', '55000', '60000', '2', 'Y', '', '1', '2012-08-11 10:32:04', '5', '2012-08-12 09:38:55');
INSERT INTO `products` VALUES ('58', '22', '5', 'Rak Sepatu', '45000', '24000', '30000', '3', 'Y', '', '1', '2012-08-11 10:33:16', '0', '0000-00-00 00:00:00');
INSERT INTO `products` VALUES ('59', '16', '5', 'Karpet Bagiva', '55000', '38000', '40000', '8', 'Y', '', '1', '2012-08-11 10:34:25', '5', '2012-08-12 09:26:50');
INSERT INTO `products` VALUES ('60', '17', '5', 'Kursi Baso Napolly', '35000', '24000', '27000', '15', 'Y', '', '1', '2012-08-11 10:36:08', '5', '2012-08-12 09:30:02');
INSERT INTO `products` VALUES ('61', '17', '5', 'Kursi Super Biasa', '25000', '13000', '15000', '16', 'Y', '', '1', '2012-08-11 10:42:24', '5', '2012-08-12 09:30:32');
INSERT INTO `products` VALUES ('62', '22', '6', 'Rak Jemuran Star', '225000', '150000', '160000', '0', 'Y', '', '1', '2012-08-11 10:49:38', '0', '0000-00-00 00:00:00');
INSERT INTO `products` VALUES ('63', '18', '5', 'Pompa Galon', '35000', '18500', '22000', '2', 'Y', '', '1', '2012-08-11 10:51:59', '5', '2012-08-01 06:36:22');
INSERT INTO `products` VALUES ('64', '18', '5', 'Mug Elektrik', '35000', '18500', '22000', '2', 'Y', '', '1', '2012-08-11 10:53:08', '0', '0000-00-00 00:00:00');
INSERT INTO `products` VALUES ('65', '19', '5', 'Termos Panas Elephant', '37500', '23500', '27000', '3', 'Y', '', '1', '2012-08-11 10:54:20', '5', '2012-08-12 09:39:20');
INSERT INTO `products` VALUES ('66', '21', '5', 'Kipas Angin GMC Gantung', '135000', '15000', '18000', '10', 'Y', '', '1', '2012-08-11 10:58:37', '0', '0000-00-00 00:00:00');
INSERT INTO `products` VALUES ('67', '21', '7', 'Kipas Angin Niko', '150000', '90000', '100000', '2', 'Y', '', '1', '2012-08-11 10:59:49', '0', '0000-00-00 00:00:00');
INSERT INTO `products` VALUES ('68', '16', '5', 'Karpet Imitasi', '22500', '14000', '16000', '2', 'Y', '1 Rol: Rp. 560.000, Isi: 40 Meter', '1', '2012-08-11 11:01:07', '5', '2012-08-12 09:27:14');
INSERT INTO `products` VALUES ('69', '18', '8', 'Galon Keran Kecil', '35000', '22000', '25000', '1', 'Y', '', '1', '2012-08-11 19:33:25', '0', '0000-00-00 00:00:00');
INSERT INTO `products` VALUES ('70', '25', '9', 'Terpal Layar Lumba-Lumba 3 X 3', '54000', '41400', '45000', '3', 'Y', 'Modal : 1 Meter = Rp. 4.600\r\nHarga Jual : 1 Meter = Rp. 6.000\r\nHarga Paling Murah : 1 Meter = Rp. 5.000', '5', '2012-08-04 07:53:39', '5', '2012-08-12 09:41:12');
INSERT INTO `products` VALUES ('71', '25', '9', 'Terpal Layar Lumba-Lumba 4 X 6', '144000', '110400', '115200', '1', 'Y', 'Harga Jual : 1 Meter Rp. 6.000\r\nModal : 1 Meter Rp. 4.600\r\nHarga Paling Murah : 1 Meter Rp. 4.800', '5', '2012-08-04 07:56:01', '5', '2012-08-06 08:56:48');
INSERT INTO `products` VALUES ('72', '25', '9', 'Terpal Layar Lumba-Lumba 2 X 2', '24000', '18400', '20000', '4', 'Y', 'Harga Jual : 1 Meter Rp. 6.000\r\nModal : 1 Meter Rp. 4.600\r\nHarga Paling Murah : 1 Meter Rp. 5.000', '5', '2012-08-04 07:57:37', '0', '0000-00-00 00:00:00');
INSERT INTO `products` VALUES ('73', '25', '9', 'Terpal Layar Lumba-Lumba 2 X 3', '36000', '27600', '30000', '3', 'Y', 'Harga Jual : 1 Meter Rp. 6.000\r\nModal : 1 Meter Rp. 4.600\r\nHarga Paling Murah : 1 Meter Rp. 5.000', '5', '2012-08-04 07:59:56', '5', '2012-08-12 09:40:55');
INSERT INTO `products` VALUES ('74', '25', '9', 'Terpal Layar Lumba-Lumba 3 X 4', '72000', '55200', '57600', '3', 'Y', 'Harga Jual : 1 Meter Rp. 6.000\r\nModal : 1 Meter Rp. 4.600\r\nHarga Paling Murah : 1 Meter Rp. 4.800', '5', '2012-08-04 08:02:58', '5', '2012-08-12 09:41:32');
INSERT INTO `products` VALUES ('75', '25', '9', 'Terpal Layar Lumba-Lumba 4 X 4', '96000', '73600', '76800', '2', 'Y', 'Harga Jual : 1 Meter Rp. 6.000\r\nModal : 1 Meter Rp. 4.600\r\nHarga Paling Murah : 1 Meter Rp. 4.800', '5', '2012-08-04 08:04:57', '0', '0000-00-00 00:00:00');
INSERT INTO `products` VALUES ('76', '25', '9', 'Terpal Layar Lumba-Lumba 3 X 5', '90000', '69000', '72000', '2', 'Y', 'Harga Jual : 1 Meter Rp. 6.000\r\nModal : 1 Meter Rp. 4.600\r\nHarga Paling Murah : 1 Meter Rp. 4.800', '5', '2012-08-04 08:06:04', '5', '2012-08-12 09:41:50');
INSERT INTO `products` VALUES ('77', '25', '9', 'Terpal Layar Lumba-Lumba 4 X 5', '120000', '92000', '96000', '2', 'Y', 'Harga Jual : 1 Meter Rp. 6.000\r\nModal : 1 Meter Rp. 4.600\r\nHarga Paling Murah : 1 Meter Rp. 4.800', '5', '2012-08-04 08:07:21', '5', '2012-08-12 09:42:08');
INSERT INTO `products` VALUES ('78', '25', '9', 'Terpal Layar Lumba-Lumba 5 X 6', '180000', '138000', '144000', '2', 'Y', 'Harga Jual : 1 Meter Rp. 6.000\r\nModal : 1 Meter Rp. 4.600\r\nHarga Paling Murah : 1 Meter Rp. 4.800', '5', '2012-08-04 08:09:41', '0', '0000-00-00 00:00:00');
INSERT INTO `products` VALUES ('79', '23', '7', 'Selang Gas Radiator', '75000', '43000', '47000', '5', 'Y', '', '5', '2012-08-12 09:44:04', '0', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `sales_transaction`
-- ----------------------------
DROP TABLE IF EXISTS `sales_transaction`;
CREATE TABLE `sales_transaction` (
  `trx_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `sales_price` int(11) NOT NULL,
  `profit` int(11) NOT NULL,
  `sales_qty` float NOT NULL,
  `sales_stock` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `sales_date` date NOT NULL,
  `sales_time` time NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`trx_id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sales_transaction
-- ----------------------------
INSERT INTO `sales_transaction` VALUES ('1', '18', '135000', '14000', '1', '3', '135000', '2012-08-01', '06:27:56', '-', '0');
INSERT INTO `sales_transaction` VALUES ('2', '21', '110000', '17000', '1', '2', '110000', '2012-08-01', '06:28:38', '-', '0');
INSERT INTO `sales_transaction` VALUES ('3', '63', '30000', '11500', '1', '1', '30000', '2012-08-01', '06:36:06', '-', '0');
INSERT INTO `sales_transaction` VALUES ('4', '24', '115000', '10000', '1', '3', '115000', '2012-08-01', '06:36:46', '-', '0');
INSERT INTO `sales_transaction` VALUES ('5', '22', '60000', '14000', '2', '1', '120000', '2012-08-01', '06:37:42', '', '0');
INSERT INTO `sales_transaction` VALUES ('6', '40', '190000', '17000', '1', '2', '190000', '2012-08-01', '06:38:27', '-', '0');
INSERT INTO `sales_transaction` VALUES ('7', '59', '40000', '2000', '1', '7', '40000', '2012-08-01', '06:38:52', '-', '0');
INSERT INTO `sales_transaction` VALUES ('8', '31', '10000', '12000', '4', '1', '40000', '2012-08-01', '06:39:35', '4 Meter Karpet Daimaru', '0');
INSERT INTO `sales_transaction` VALUES ('9', '21', '100000', '7000', '1', '2', '100000', '2012-08-02', '06:47:04', '-', '0');
INSERT INTO `sales_transaction` VALUES ('10', '18', '140000', '19000', '1', '3', '140000', '2012-08-03', '07:41:58', '-', '0');
INSERT INTO `sales_transaction` VALUES ('11', '30', '35000', '3000', '1', '6', '35000', '2012-08-03', '07:42:16', '-', '0');
INSERT INTO `sales_transaction` VALUES ('12', '32', '11000', '3000', '1', '0', '11000', '2012-08-03', '07:43:29', '1 Meter Karpet Pattaya', '0');
INSERT INTO `sales_transaction` VALUES ('13', '16', '150000', '5000', '1', '2', '150000', '2012-08-03', '07:43:47', '-', '0');
INSERT INTO `sales_transaction` VALUES ('14', '33', '180000', '30000', '1', '1', '180000', '2012-08-04', '07:44:31', '', '0');
INSERT INTO `sales_transaction` VALUES ('15', '18', '150000', '29000', '1', '2', '150000', '2012-08-04', '07:44:56', '-', '0');
INSERT INTO `sales_transaction` VALUES ('16', '39', '210000', '42000', '1', '3', '210000', '2012-08-04', '07:45:17', '-', '0');
INSERT INTO `sales_transaction` VALUES ('17', '77', '110000', '18000', '1', '1', '110000', '2012-08-04', '08:11:02', '-', '0');
INSERT INTO `sales_transaction` VALUES ('18', '56', '85000', '6000', '1', '2', '85000', '2012-08-05', '08:14:01', '-', '0');
INSERT INTO `sales_transaction` VALUES ('19', '59', '40000', '4000', '2', '5', '80000', '2012-08-05', '08:14:32', '-', '0');
INSERT INTO `sales_transaction` VALUES ('20', '57', '65000', '10000', '1', '1', '65000', '2012-08-05', '08:14:53', '-', '0');
INSERT INTO `sales_transaction` VALUES ('21', '16', '170000', '25000', '1', '1', '170000', '2012-08-05', '08:15:18', '-', '0');
INSERT INTO `sales_transaction` VALUES ('22', '18', '130000', '9000', '1', '1', '130000', '2012-08-05', '08:15:41', '-', '0');
INSERT INTO `sales_transaction` VALUES ('23', '59', '40000', '2000', '1', '4', '40000', '2012-08-05', '08:16:18', '-', '0');
INSERT INTO `sales_transaction` VALUES ('24', '31', '10000', '15000', '5', '0', '50000', '2012-08-05', '08:16:44', '5 Meter Karpet Daimaru', '0');
INSERT INTO `sales_transaction` VALUES ('25', '29', '70000', '12000', '1', '1', '70000', '2012-08-05', '08:17:42', '-', '0');
INSERT INTO `sales_transaction` VALUES ('26', '37', '175000', '20000', '1', '1', '175000', '2012-08-06', '08:18:19', '-', '0');
INSERT INTO `sales_transaction` VALUES ('27', '37', '175000', '20000', '1', '0', '175000', '2012-08-06', '08:18:34', '-', '0');
INSERT INTO `sales_transaction` VALUES ('28', '39', '185000', '17000', '1', '2', '185000', '2012-08-06', '08:19:21', '-', '0');
INSERT INTO `sales_transaction` VALUES ('30', '29', '65000', '7000', '1', '0', '65000', '2012-08-06', '08:22:55', '-', '0');
INSERT INTO `sales_transaction` VALUES ('32', '59', '45000', '14000', '2', '2', '90000', '2012-08-06', '08:23:52', '-', '0');
INSERT INTO `sales_transaction` VALUES ('33', '32', '10000', '6000', '3', '0', '30000', '2012-08-06', '08:27:57', '3 Meter Karpet Pattaya', '0');
INSERT INTO `sales_transaction` VALUES ('34', '31', '8000', '2500', '2.5', '0', '20000', '2012-08-06', '08:48:53', '2,5 Meter Karpet Daimaru', '0');
INSERT INTO `sales_transaction` VALUES ('35', '68', '17000', '3000', '1', '0', '17000', '2012-08-06', '08:54:57', '1 Meter Imitasi', '0');
INSERT INTO `sales_transaction` VALUES ('36', '71', '115000', '4600', '1', '0', '115000', '2012-08-06', '08:56:28', '-', '0');
INSERT INTO `sales_transaction` VALUES ('38', '61', '16250', '13000', '4', '12', '65000', '2012-08-07', '08:59:26', '-', '0');
INSERT INTO `sales_transaction` VALUES ('39', '34', '160000', '5000', '1', '0', '160000', '2012-08-07', '08:59:44', '-', '0');
INSERT INTO `sales_transaction` VALUES ('40', '29', '65000', '7000', '1', '1', '65000', '2012-08-07', '09:01:05', '-', '0');
INSERT INTO `sales_transaction` VALUES ('41', '59', '40000', '2000', '1', '1', '40000', '2012-08-07', '09:01:24', '-', '0');
INSERT INTO `sales_transaction` VALUES ('42', '30', '35000', '3000', '1', '4', '35000', '2012-08-07', '09:01:48', '-', '0');
INSERT INTO `sales_transaction` VALUES ('43', '31', '8000', '2000', '2', '0', '16000', '2012-08-07', '09:02:16', '2 Meter Karpet Daimaru', '0');
INSERT INTO `sales_transaction` VALUES ('44', '54', '300000', '22500', '1', '1', '300000', '2012-08-08', '09:03:13', '-', '0');
INSERT INTO `sales_transaction` VALUES ('45', '24', '120000', '15000', '1', '2', '120000', '2012-08-08', '09:03:25', '-', '0');
INSERT INTO `sales_transaction` VALUES ('46', '59', '45000', '7000', '1', '0', '45000', '2012-08-08', '09:03:39', '-', '0');
INSERT INTO `sales_transaction` VALUES ('47', '20', '40000', '5000', '1', '1', '40000', '2012-08-08', '09:04:09', '-', '0');
INSERT INTO `sales_transaction` VALUES ('48', '32', '10000', '10000', '5', '0', '50000', '2012-08-08', '09:04:31', '5 Meter Karpet Pattaya', '0');
INSERT INTO `sales_transaction` VALUES ('49', '31', '8000', '2000', '2', '0', '16000', '2012-08-08', '09:04:56', '2 Meter Karpet Daimaru', '0');
INSERT INTO `sales_transaction` VALUES ('50', '31', '9000', '6000', '3', '0', '27000', '2012-08-08', '09:05:20', '3 Meter Karpet Daimaru', '0');
INSERT INTO `sales_transaction` VALUES ('51', '59', '45000', '7000', '1', '2', '45000', '2012-08-08', '09:05:36', '-', '0');
INSERT INTO `sales_transaction` VALUES ('52', '59', '45000', '7000', '1', '1', '45000', '2012-08-08', '09:05:46', '-', '0');
INSERT INTO `sales_transaction` VALUES ('53', '51', '310000', '32500', '1', '1', '310000', '2012-08-09', '09:06:47', '-', '0');
INSERT INTO `sales_transaction` VALUES ('54', '33', '170000', '20000', '1', '0', '170000', '2012-08-09', '09:07:02', '-', '0');
INSERT INTO `sales_transaction` VALUES ('55', '60', '30000', '18000', '3', '12', '90000', '2012-08-09', '09:07:16', '-', '0');
INSERT INTO `sales_transaction` VALUES ('57', '74', '60000', '9600', '2', '1', '120000', '2012-08-09', '09:08:26', '-', '0');
INSERT INTO `sales_transaction` VALUES ('58', '54', '290000', '12500', '1', '0', '290000', '2012-08-09', '09:08:43', '-', '0');
INSERT INTO `sales_transaction` VALUES ('59', '76', '80000', '11000', '1', '1', '80000', '2012-08-10', '09:09:30', '-', '0');
INSERT INTO `sales_transaction` VALUES ('60', '71', '115500', '5100', '1', '1', '115500', '2012-08-10', '09:09:47', '-', '0');
INSERT INTO `sales_transaction` VALUES ('61', '39', '200000', '32000', '1', '1', '200000', '2012-08-10', '09:10:00', '-', '0');
INSERT INTO `sales_transaction` VALUES ('62', '19', '40000', '10000', '1', '1', '40000', '2012-08-10', '09:10:12', '-', '0');
INSERT INTO `sales_transaction` VALUES ('63', '26', '30000', '15000', '1', '10', '30000', '2012-08-10', '09:10:57', '-', '0');
INSERT INTO `sales_transaction` VALUES ('64', '65', '30000', '6500', '1', '2', '30000', '2012-08-10', '09:11:09', '-', '0');
INSERT INTO `sales_transaction` VALUES ('65', '59', '40000', '2000', '1', '0', '40000', '2012-08-10', '09:11:19', '-', '0');
INSERT INTO `sales_transaction` VALUES ('66', '70', '50000', '8600', '1', '2', '50000', '2012-08-11', '09:13:04', '-', '0');
INSERT INTO `sales_transaction` VALUES ('67', '56', '90000', '11000', '1', '1', '90000', '2012-08-11', '09:13:22', '-', '0');
INSERT INTO `sales_transaction` VALUES ('68', '31', '8000', '6000', '6', '0', '48000', '2012-08-11', '09:13:45', '6 M Karpet Daimaru', '0');
INSERT INTO `sales_transaction` VALUES ('69', '20', '38000', '3000', '1', '0', '38000', '2012-08-11', '09:13:58', '-', '0');
INSERT INTO `sales_transaction` VALUES ('70', '62', '180000', '30000', '1', '1', '180000', '2012-08-11', '09:14:34', '-', '0');
INSERT INTO `sales_transaction` VALUES ('72', '30', '35000', '6000', '2', '2', '70000', '2012-08-12', '09:15:42', '-', '0');
INSERT INTO `sales_transaction` VALUES ('73', '70', '50000', '8600', '1', '1', '50000', '2012-08-12', '09:15:54', '-', '0');
INSERT INTO `sales_transaction` VALUES ('74', '31', '8333', '3999', '3', '0', '24999', '2012-08-12', '09:16:42', '3 Meter Karpet Daimaru', '0');
INSERT INTO `sales_transaction` VALUES ('75', '31', '10000', '9000', '3', '0', '30000', '2012-08-12', '09:17:04', '3 Meter Karpet Daimaru', '0');
INSERT INTO `sales_transaction` VALUES ('76', '70', '50000', '8600', '1', '0', '50000', '2012-08-12', '09:17:19', '-', '0');
INSERT INTO `sales_transaction` VALUES ('77', '34', '180000', '25000', '1', '1', '180000', '2012-08-12', '09:17:39', '-', '0');
INSERT INTO `sales_transaction` VALUES ('78', '35', '180000', '15000', '1', '1', '180000', '2012-08-12', '09:17:52', '-', '0');
INSERT INTO `sales_transaction` VALUES ('79', '30', '35000', '6000', '2', '0', '70000', '2012-08-12', '09:18:17', '-', '0');
INSERT INTO `sales_transaction` VALUES ('80', '32', '11666', '10998', '3', '0', '34998', '2012-08-12', '09:18:57', '3 Meter Karpet Pattaya', '0');
INSERT INTO `sales_transaction` VALUES ('81', '31', '8000', '12000', '12', '0', '96000', '2012-08-12', '11:23:01', '12 M Karpet Daimaru', '0');
INSERT INTO `sales_transaction` VALUES ('82', '32', '12000', '36000', '9', '0', '108000', '2012-08-12', '11:43:27', '9 Meter Karpet Pattaya', '0');
INSERT INTO `sales_transaction` VALUES ('83', '69', '25000', '3000', '1', '1', '25000', '2012-08-12', '11:54:26', '-', '0');
INSERT INTO `sales_transaction` VALUES ('84', '62', '200000', '50000', '1', '0', '200000', '2012-08-12', '11:54:49', '-', '0');
INSERT INTO `sales_transaction` VALUES ('85', '19', '60000', '60000', '2', '0', '120000', '2014-10-10', '00:08:43', '-', '5');
INSERT INTO `sales_transaction` VALUES ('86', '25', '60000', '10000', '2', '5', '120000', '2014-10-10', '00:16:18', '-', '5');
INSERT INTO `sales_transaction` VALUES ('87', '20', '40000', '5000', '1', '0', '40000', '2014-10-10', '00:22:28', '-', '5');
INSERT INTO `sales_transaction` VALUES ('88', '23', '60000', '-10000', '1', '1', '60000', '2014-10-10', '00:27:27', '-', '5');
INSERT INTO `sales_transaction` VALUES ('89', '16', '150000', '20000', '4', '-1', '600000', '2014-10-10', '00:31:46', '-', '5');

-- ----------------------------
-- Table structure for `suppliers`
-- ----------------------------
DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE `suppliers` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier` varchar(128) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `active` char(1) NOT NULL,
  `description` text NOT NULL,
  `created_user` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_user` int(11) NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of suppliers
-- ----------------------------
INSERT INTO `suppliers` VALUES ('5', 'Hj. Nani', 'Jl. Pegadaian Arjawinangun, Cirebon', '', 'Y', 'Pemasok Lemari STB, Gagak Hitam, Bagiva, Rak, Karpet, dll', '1', '2012-08-11 07:24:14', '1', '2012-08-11 07:25:18');
INSERT INTO `suppliers` VALUES ('6', 'Bintang Jaya (Samuel)', 'Jl. Kantor Pos Arjawinangun, Cirebon', '', 'Y', 'Pemasok Lemari S Club dan Lemari Boneka', '1', '2012-08-11 07:25:06', '0', '0000-00-00 00:00:00');
INSERT INTO `suppliers` VALUES ('7', 'Putra Jaya Elektronik', 'Jl. Ki Hajar Dewantara (Depan Polsek) Arjawinangun, Cirebon', '', 'Y', 'Pemasok Magic Com, Kompor Gas', '1', '2012-08-11 07:27:19', '0', '0000-00-00 00:00:00');
INSERT INTO `suppliers` VALUES ('8', 'Toko Anugrah Jaya', 'Jl. Pegadaian No. 38 Arjawinangun, Cirebon', '0231 - 358630', 'Y', 'Pemasok Kasur, Baby Walker', '1', '2012-08-11 07:28:32', '0', '0000-00-00 00:00:00');
INSERT INTO `suppliers` VALUES ('9', 'Toko Garam Eng Swie', 'Jl. Ki Hajar Dewantara No. 128', '', 'Y', 'Pemasok Terpal Lumba-Lumba', '5', '2012-08-04 07:46:32', '0', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `supp_transaction`
-- ----------------------------
DROP TABLE IF EXISTS `supp_transaction`;
CREATE TABLE `supp_transaction` (
  `trx_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `supp_price` int(11) NOT NULL,
  `supp_qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `description` text NOT NULL,
  `buys_date` date NOT NULL,
  `buys_time` time NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`trx_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of supp_transaction
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(32) NOT NULL,
  `passwd` varchar(32) NOT NULL,
  `level` varchar(20) NOT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `alamat` text,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '2012', 'Administrator', 'admin', '202cb962ac59075b964b07152d234b70', 'Administrator', null, null);
INSERT INTO `users` VALUES ('5', '20120811', 'Ryan Bayu Adji', 'ryan', '202cb962ac59075b964b07152d234b70', 'Sales', null, null);
INSERT INTO `users` VALUES ('7', '1234567890', 'Nur Ichsan', 'ichsan', '202cb962ac59075b964b07152d234b70', 'Administrator', '1234567890', 'brebes');
