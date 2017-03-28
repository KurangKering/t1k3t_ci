-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.19-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for tiket
CREATE DATABASE IF NOT EXISTS `tiket` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `tiket`;

-- Dumping structure for table tiket.bulan
CREATE TABLE IF NOT EXISTS `bulan` (
  `id_bulan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bulan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_bulan`),
  UNIQUE KEY `nama_bulan` (`nama_bulan`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Dumping data for table tiket.bulan: ~12 rows (approximately)
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
CREATE TABLE IF NOT EXISTS `konfig` (
  `persen` decimal(5,4) NOT NULL,
  `fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table tiket.konfig: ~0 rows (approximately)
/*!40000 ALTER TABLE `konfig` DISABLE KEYS */;
INSERT INTO `konfig` (`persen`, `fee`) VALUES
	(0.0500, 10000);
/*!40000 ALTER TABLE `konfig` ENABLE KEYS */;

-- Dumping structure for table tiket.maskapai
CREATE TABLE IF NOT EXISTS `maskapai` (
  `id_maskapai` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id_maskapai`),
  UNIQUE KEY `nama` (`nama`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table tiket.maskapai: ~4 rows (approximately)
/*!40000 ALTER TABLE `maskapai` DISABLE KEYS */;
INSERT INTO `maskapai` (`id_maskapai`, `nama`, `status`) VALUES
	(1, 'Air Asia', 'ACTIVE'),
	(3, 'Garuda', 'ACTIVE'),
	(4, 'Citilink', 'INACTIVE'),
	(5, 'Cicak', 'ACTIVE');
/*!40000 ALTER TABLE `maskapai` ENABLE KEYS */;

-- Dumping structure for table tiket.penjualan
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
  `tanggal_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`booking_code`),
  KEY `FK_penjualan_tc` (`id_tc`),
  KEY `FK_penjualan_maskapai` (`id_maskapai`),
  CONSTRAINT `FK_penjualan_maskapai` FOREIGN KEY (`id_maskapai`) REFERENCES `maskapai` (`id_maskapai`) ON UPDATE CASCADE,
  CONSTRAINT `FK_penjualan_tc` FOREIGN KEY (`id_tc`) REFERENCES `tc` (`id_tc`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table tiket.penjualan: ~10 rows (approximately)
/*!40000 ALTER TABLE `penjualan` DISABLE KEYS */;
INSERT INTO `penjualan` (`booking_code`, `id_tc`, `id_maskapai`, `tanggal`, `hpp`, `persen`, `invoice`, `q`, `fee`, `tanggal_insert`) VALUES
	('1', 1, 1, '2017-03-26', 20000, 0.0500, 700000, 1, 10000, '2017-03-26 22:04:56'),
	('10231', 1, 1, '2017-01-10', 12412, 0.0500, 1213131, 1, 10000, '2017-03-28 12:28:32'),
	('112e1', 1, 1, '0000-00-00', 634100, 0.0500, 720000, 1, 10000, '2017-03-28 12:28:00'),
	('123123', 1, 1, '0000-00-00', 131312312, 0.0500, 1312, 1, 10000, '2017-03-28 12:28:56'),
	('2', 1, 4, '2017-03-26', 200000, 0.0500, 600000, 1, 10000, '2017-03-26 22:05:08'),
	('3', 1, 1, '2017-03-27', 60000, 0.0500, 500000, 1, 10000, '2017-03-26 22:06:19'),
	('4', 4, 3, '2017-03-28', 700000, 0.0050, 400000, 1, 10000, '2017-03-26 22:06:33'),
	('5', 1, 1, '2017-03-26', 800000, 0.0050, 400000, 1, 10000, '2017-03-26 22:18:28'),
	('6', 1, 1, '2017-04-26', 500000, 0.0500, 500000, 1, 10000, '2017-03-26 23:48:24'),
	('7', 1, 1, '2018-03-28', 900000, 0.0050, 60000, 1, 10000, '2017-03-28 10:59:48');
/*!40000 ALTER TABLE `penjualan` ENABLE KEYS */;

-- Dumping structure for table tiket.tc
CREATE TABLE IF NOT EXISTS `tc` (
  `id_tc` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id_tc`),
  UNIQUE KEY `nama` (`nama`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table tiket.tc: ~2 rows (approximately)
/*!40000 ALTER TABLE `tc` DISABLE KEYS */;
INSERT INTO `tc` (`id_tc`, `nama`, `status`) VALUES
	(1, 'Bahlul', 'INACTIVE'),
	(4, 'Budi', 'ACTIVE');
/*!40000 ALTER TABLE `tc` ENABLE KEYS */;

-- Dumping structure for table tiket.user
CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table tiket.user: ~1 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`username`, `password`) VALUES
	('admin', 'admin');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for view tiket.view_penjualan
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_penjualan` (
	`tanggal_insert` TIMESTAMP NOT NULL,
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
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_penjualan`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `view_penjualan` AS select `penjualan`.`tanggal_insert` AS `tanggal_insert`, `penjualan`.`id_tc` AS `id_tc`,`penjualan`.`id_maskapai` AS `id_maskapai`,`penjualan`.`tanggal` AS `tanggal`,`penjualan`.`booking_code` AS `booking_code`,`penjualan`.`hpp` AS `hpp`,`penjualan`.`persen` AS `persen`,`penjualan`.`invoice` AS `invoice`,`penjualan`.`q` AS `q`,`penjualan`.`fee` AS `fee`,`tc`.`nama` AS `nama_tc`,`maskapai`.`nama` AS `nama_maskapai`,cast((`penjualan`.`hpp` * `penjualan`.`persen`) as unsigned) AS `NTA`,cast((`penjualan`.`hpp` + (`penjualan`.`hpp` * `penjualan`.`persen`)) as unsigned) AS `harga_jual`,cast((`penjualan`.`invoice` - (`penjualan`.`hpp` + (`penjualan`.`hpp` * `penjualan`.`persen`))) as unsigned) AS `up_salling`,cast(((`penjualan`.`hpp` * `penjualan`.`persen`) + (`penjualan`.`invoice` - (`penjualan`.`hpp` + (`penjualan`.`hpp` * `penjualan`.`persen`)))) as unsigned) AS `profit_1`,(`penjualan`.`q` * `penjualan`.`fee`) AS `adm_fee`,cast((((`penjualan`.`hpp` * `penjualan`.`persen`) + (`penjualan`.`invoice` - (`penjualan`.`hpp` + (`penjualan`.`hpp` * `penjualan`.`persen`)))) - (`penjualan`.`q` * `penjualan`.`fee`)) as unsigned) AS `profit_2`,(`penjualan`.`hpp` + (`penjualan`.`q` * `penjualan`.`fee`)) AS `jumlah` from ((`penjualan` join `maskapai` on((`penjualan`.`id_maskapai` = `maskapai`.`id_maskapai`))) join `tc` on((`penjualan`.`id_tc` = `tc`.`id_tc`))) ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
