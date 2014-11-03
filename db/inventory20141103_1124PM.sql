/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : inventory

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2014-11-03 23:23:21
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
INSERT INTO `categories` VALUES ('17', 'Lemari Plastik dan Kursi', 'Y', '1', '2012-08-11 07:29:00', '1', '2012-08-11 10:35:00');
INSERT INTO `categories` VALUES ('19', 'Termos Panas, Nasi, dan Es', 'Y', '1', '2012-08-11 07:30:32', '0', '0000-00-00 00:00:00');
INSERT INTO `categories` VALUES ('20', 'Kasur Lantai dan Busa', 'Y', '1', '2012-08-11 07:31:01', '1', '2012-08-11 07:49:08');
INSERT INTO `categories` VALUES ('21', 'Kipas Angin', 'Y', '1', '2012-08-11 07:49:01', '0', '0000-00-00 00:00:00');
INSERT INTO `categories` VALUES ('22', 'Tikar, Rak Piring, Jemuran, dan Sepatu', 'Y', '1', '2012-08-11 07:51:30', '1', '2012-08-11 10:47:52');
INSERT INTO `categories` VALUES ('23', 'Kompor Gas', 'Y', '1', '2012-08-11 07:58:02', '0', '0000-00-00 00:00:00');
INSERT INTO `categories` VALUES ('24', 'Magic Com / Magic Warm / Magic Jar', 'Y', '1', '2012-08-11 08:39:05', '0', '0000-00-00 00:00:00');
INSERT INTO `categories` VALUES ('25', 'Terpal / Layar', 'Y', '5', '2012-08-04 07:48:40', '0', '0000-00-00 00:00:00');
INSERT INTO `categories` VALUES ('26', 'Hair Cream', 'Y', '1', '2014-11-03 21:08:09', null, null);

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
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `product` varchar(128) NOT NULL,
  `price` int(11) NOT NULL,
  `po_price` int(11) NOT NULL,
  `pm_price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `active` enum('N','Y') NOT NULL DEFAULT 'Y',
  `description` text NOT NULL,
  `due_date` date DEFAULT NULL,
  `created_user` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_user` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('81', '16', '10', 'test', '120000', '100000', '110000', '4', 'Y', 'test', '2014-11-03', '1', '2014-11-03 20:54:05', null, null);
INSERT INTO `products` VALUES ('1234', '21', '10', 'kipas kayu', '100000', '90000', '95000', '2', 'Y', 'test', '2014-11-03', '1', '2014-11-03 23:16:43', '1', '2014-11-03 23:18:01');
INSERT INTO `products` VALUES ('7305', '26', '11', 'Hair Cream S per Lusin', '120000', '100000', '110000', '2', 'Y', '-', '2014-11-03', '1', '2014-11-03 21:12:10', '1', '2014-11-03 23:15:23');
INSERT INTO `products` VALUES ('7310', '26', '11', 'Hair Cream L 120ml', '200000', '180000', '190000', '12', 'Y', '-', '2017-11-21', '1', '2014-11-03 21:19:06', '1', '2014-11-03 21:27:10');

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
  `active` enum('N','Y') DEFAULT 'Y',
  PRIMARY KEY (`trx_id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sales_transaction
-- ----------------------------
INSERT INTO `sales_transaction` VALUES ('90', '7310', '250000', '140000', '2', '2', '500000', '2014-11-03', '21:20:51', 'refund', '1', 'N');
INSERT INTO `sales_transaction` VALUES ('91', '7305', '5000000', '9800000', '2', '2', '10000000', '2014-11-03', '23:04:41', 'coba', '1', 'N');
INSERT INTO `sales_transaction` VALUES ('92', '7305', '200000', '100000', '1', '1', '200000', '2014-11-03', '23:10:44', 'refund', '1', 'N');
INSERT INTO `sales_transaction` VALUES ('93', '1234', '100000', '10000', '1', '1', '100000', '2014-11-03', '23:17:05', 'refund', '1', 'N');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of suppliers
-- ----------------------------
INSERT INTO `suppliers` VALUES ('5', 'Hj. Nani x', 'Jl. Pegadaian Arjawinangun, Cirebon', '', 'Y', 'Pemasok Lemari STB, Gagak Hitam, Bagiva, Rak, Karpet, dll', '1', '2012-08-11 07:24:14', '1', '2014-11-03 20:07:15');
INSERT INTO `suppliers` VALUES ('10', 'nur ichsan', 'test', '', 'Y', 'test', '1', '2014-11-03 20:09:57', '1', '2014-11-03 20:09:57');
INSERT INTO `suppliers` VALUES ('11', 'mandom', 'jakarta', '-', 'Y', 'penyupali hair cream', '1', '2014-11-03 21:07:38', '1', '2014-11-03 21:07:38');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of supp_transaction
-- ----------------------------
INSERT INTO `supp_transaction` VALUES ('1', '8', '20', '40000', '2', '80000', '-', '2014-10-10', '19:47:57', '1');
INSERT INTO `supp_transaction` VALUES ('2', '11', '7310', '100000', '6', '600000', '-', '2014-11-03', '21:26:40', '1');

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
