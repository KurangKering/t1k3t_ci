-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.19-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5169
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for tiket
DROP DATABASE IF EXISTS `tiket`;
CREATE DATABASE IF NOT EXISTS `tiket` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `tiket`;

-- Dumping structure for table tiket.bulan
DROP TABLE IF EXISTS `bulan`;
CREATE TABLE IF NOT EXISTS `bulan` (
  `id_bulan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bulan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_bulan`),
  UNIQUE KEY `nama_bulan` (`nama_bulan`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Dumping data for table tiket.bulan: ~12 rows (approximately)
DELETE FROM `bulan`;
/*!40000 ALTER TABLE `bulan` DISABLE KEYS */;
INSERT INTO `bulan` (`id_bulan`, `nama_bulan`) VALUES
	(8, 'Agustus'),
	(4, 'April'),
	(12, 'Desember'),
	(2, 'Februari'),
	(1, 'Januari'),
	(7, 'Juli'),
	(6, 'Juni'),
	(3, 'Maret'),
	(5, 'Mei'),
	(11, 'November'),
	(10, 'Oktober'),
	(9, 'September');
/*!40000 ALTER TABLE `bulan` ENABLE KEYS */;

-- Dumping structure for table tiket.konfig
DROP TABLE IF EXISTS `konfig`;
CREATE TABLE IF NOT EXISTS `konfig` (
  `persen` decimal(5,4) NOT NULL,
  `fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table tiket.konfig: ~1 rows (approximately)
DELETE FROM `konfig`;
/*!40000 ALTER TABLE `konfig` DISABLE KEYS */;
INSERT INTO `konfig` (`persen`, `fee`) VALUES
	(0.0500, 10000);
/*!40000 ALTER TABLE `konfig` ENABLE KEYS */;

-- Dumping structure for table tiket.maskapai
DROP TABLE IF EXISTS `maskapai`;
CREATE TABLE IF NOT EXISTS `maskapai` (
  `id_maskapai` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id_maskapai`),
  UNIQUE KEY `nama` (`nama`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table tiket.maskapai: ~5 rows (approximately)
DELETE FROM `maskapai`;
/*!40000 ALTER TABLE `maskapai` DISABLE KEYS */;
INSERT INTO `maskapai` (`id_maskapai`, `nama`, `status`) VALUES
	(1, 'AIR ASIA', 'ACTIVE'),
	(3, 'CITILINK', 'ACTIVE'),
	(4, 'LION', 'ACTIVE'),
	(5, 'BATIK', 'ACTIVE'),
	(7, 'SRIWIJAYA', 'ACTIVE');
/*!40000 ALTER TABLE `maskapai` ENABLE KEYS */;

-- Dumping structure for table tiket.penjualan
DROP TABLE IF EXISTS `penjualan`;
CREATE TABLE IF NOT EXISTS `penjualan` (
  `booking_code` varchar(10) NOT NULL,
  `id_tc` int(11) NOT NULL,
  `id_maskapai` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `hpp` int(11) NOT NULL,
  `persen` decimal(5,4) NOT NULL,
  `invoice` int(11) NOT NULL,
  `q` tinyint(4) NOT NULL,
  `fee` int(11) NOT NULL,
  PRIMARY KEY (`booking_code`),
  KEY `FK_penjualan_tc` (`id_tc`),
  KEY `FK_penjualan_maskapai` (`id_maskapai`),
  CONSTRAINT `FK_penjualan_maskapai` FOREIGN KEY (`id_maskapai`) REFERENCES `maskapai` (`id_maskapai`) ON UPDATE CASCADE,
  CONSTRAINT `FK_penjualan_tc` FOREIGN KEY (`id_tc`) REFERENCES `tc` (`id_tc`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table tiket.penjualan: ~10 rows (approximately)
DELETE FROM `penjualan`;
/*!40000 ALTER TABLE `penjualan` DISABLE KEYS */;
INSERT INTO `penjualan` (`booking_code`, `id_tc`, `id_maskapai`, `tanggal`, `hpp`, `persen`, `invoice`, `q`, `fee`) VALUES
	('BOVNVR', 1, 4, '2016-11-11', 707700, 0.0500, 821000, 1, 10000),
	('FRCOKW', 1, 4, '2016-11-20', 561300, 0.0500, 754500, 1, 10000),
	('J9QUNW', 1, 3, '2016-11-08', 634100, 0.0500, 754100, 1, 10000),
	('JHHLXI', 1, 4, '2016-11-16', 403400, 0.0500, 613000, 1, 10000),
	('KFKNXP', 1, 4, '2016-11-22', 241100, 0.0500, 400000, 1, 10000),
	('MLVTTK', 2, 5, '2016-11-22', 638500, 0.0500, 755000, 1, 10000),
	('MTMXAT', 1, 4, '2016-11-29', 403400, 0.0500, 507000, 1, 10000),
	('TIBJLI', 1, 4, '2016-11-03', 6555600, 0.0500, 6855000, 1, 10000),
	('UTOAOI', 1, 4, '2016-11-24', 293900, 0.0500, 342500, 1, 10000),
	('ZVDZFH', 1, 4, '2016-11-20', 830600, 0.0500, 1012000, 1, 10000);
/*!40000 ALTER TABLE `penjualan` ENABLE KEYS */;

-- Dumping structure for table tiket.tc
DROP TABLE IF EXISTS `tc`;
CREATE TABLE IF NOT EXISTS `tc` (
  `id_tc` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id_tc`),
  UNIQUE KEY `nama` (`nama`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table tiket.tc: ~2 rows (approximately)
DELETE FROM `tc`;
/*!40000 ALTER TABLE `tc` DISABLE KEYS */;
INSERT INTO `tc` (`id_tc`, `nama`, `status`) VALUES
	(1, 'Meimei', 'ACTIVE'),
	(2, 'Budi', 'ACTIVE');
/*!40000 ALTER TABLE `tc` ENABLE KEYS */;

-- Dumping structure for table tiket.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role_name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table tiket.user: ~2 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `password`, `role_name`) VALUES
	(1, 'admin', 'admin', 'admin'),
	(2, 'manager', 'manager', 'manager');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for view tiket.view_penjualan
DROP VIEW IF EXISTS `view_penjualan`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_penjualan` (
	`id_tc` INT(11) NOT NULL,
	`id_maskapai` INT(11) NOT NULL,
	`tanggal` DATE NOT NULL,
	`booking_code` VARCHAR(10) NOT NULL COLLATE 'utf8_general_ci',
	`hpp` INT(11) NOT NULL,
	`persen` DECIMAL(5,4) NOT NULL,
	`invoice` INT(11) NOT NULL,
	`q` TINYINT(4) NOT NULL,
	`fee` INT(11) NOT NULL,
	`nama_tc` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`nama_maskapai` VARCHAR(30) NOT NULL COLLATE 'utf8_general_ci',
	`NTA` BIGINT(17) UNSIGNED NOT NULL,
	`harga_jual` BIGINT(18) UNSIGNED NOT NULL,
	`up_salling` BIGINT(19) UNSIGNED NOT NULL,
	`profit_1` BIGINT(20) UNSIGNED NOT NULL,
	`adm_fee` BIGINT(14) NOT NULL,
	`profit_2` BIGINT(21) UNSIGNED NOT NULL,
	`jumlah` BIGINT(15) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view tiket.view_penjualan
DROP VIEW IF EXISTS `view_penjualan`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_penjualan`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_penjualan` AS select  `penjualan`.`id_tc` AS `id_tc`,`penjualan`.`id_maskapai` AS `id_maskapai`,`penjualan`.`tanggal` AS `tanggal`,`penjualan`.`booking_code` AS `booking_code`,`penjualan`.`hpp` AS `hpp`,`penjualan`.`persen` AS `persen`,`penjualan`.`invoice` AS `invoice`,`penjualan`.`q` AS `q`,`penjualan`.`fee` AS `fee`,`tc`.`nama` AS `nama_tc`,`maskapai`.`nama` AS `nama_maskapai`,cast((`penjualan`.`hpp` * `penjualan`.`persen`) as unsigned) AS `NTA`,cast((`penjualan`.`hpp` + (`penjualan`.`hpp` * `penjualan`.`persen`)) as unsigned) AS `harga_jual`,cast((`penjualan`.`invoice` - (`penjualan`.`hpp` + (`penjualan`.`hpp` * `penjualan`.`persen`))) as unsigned) AS `up_salling`,cast(((`penjualan`.`hpp` * `penjualan`.`persen`) + (`penjualan`.`invoice` - (`penjualan`.`hpp` + (`penjualan`.`hpp` * `penjualan`.`persen`)))) as unsigned) AS `profit_1`,(`penjualan`.`q` * `penjualan`.`fee`) AS `adm_fee`,cast((((`penjualan`.`hpp` * `penjualan`.`persen`) + (`penjualan`.`invoice` - (`penjualan`.`hpp` + (`penjualan`.`hpp` * `penjualan`.`persen`)))) - (`penjualan`.`q` * `penjualan`.`fee`)) as unsigned) AS `profit_2`,(`penjualan`.`hpp` + (`penjualan`.`q` * `penjualan`.`fee`)) AS `jumlah` from ((`penjualan` join `maskapai` on((`penjualan`.`id_maskapai` = `maskapai`.`id_maskapai`))) join `tc` on((`penjualan`.`id_tc` = `tc`.`id_tc`))) ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
