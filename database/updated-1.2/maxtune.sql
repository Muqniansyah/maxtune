-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table maxtune.booking
CREATE TABLE IF NOT EXISTS `booking` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nohp` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `provinsi` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kota` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `motor` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jenis_servis` int NOT NULL,
  `jadwal` date NOT NULL,
  `jam` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_booking_jenis_servis` (`jenis_servis`),
  CONSTRAINT `fk_booking_jenis_servis` FOREIGN KEY (`jenis_servis`) REFERENCES `jenis_servis` (`id_servis`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table maxtune.booking: ~3 rows (approximately)
INSERT INTO `booking` (`id`, `nama`, `email`, `nohp`, `alamat`, `provinsi`, `kota`, `motor`, `jenis_servis`, `jadwal`, `jam`) VALUES
	(1, 'acep', 'acep@gmail.com', '089607886367', 'sdfd', 'Jawa Barat', 'Cimahi', 'Motor Matic - Rangga', 6, '2025-06-21', '10:48:00'),
	(2, 'haikal', 'haikal@gmail.com', '089607886452', 'jalan jalan', 'Dki Jakarta', 'Jakarta Selatan', 'Motor Matic - Haikal', 6, '2025-06-13', '10:49:00');

-- Dumping structure for table maxtune.customer
CREATE TABLE IF NOT EXISTS `customer` (
  `id_customer` int NOT NULL AUTO_INCREMENT,
  `username` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_lengkap` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `no_telepon` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table maxtune.customer: ~4 rows (approximately)
INSERT INTO `customer` (`id_customer`, `username`, `password`, `email`, `nama_lengkap`, `no_telepon`) VALUES
	(0, 'admin', 'b93d83634de0b8143a418f91495b4fdb', 'admin@gmail.com', 'admin aja', '089607886354'),
	(5, 'muni', 'e10adc3949ba59abbe56e057f20f883e', 'muni@gmail.com', 'muqniansyah arifin', '089607886367'),
	(6, 'alex', '25d55ad283aa400af464c76d713c07ad', 'alex@gmail.com', 'alex xnya 3', '089607886319'),
	(7, 'haikal', '25d55ad283aa400af464c76d713c07ad', 'haikal@gmail.com', 'haikal', '089607886452');

-- Dumping structure for table maxtune.formkontak
CREATE TABLE IF NOT EXISTS `formkontak` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pesan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table maxtune.formkontak: ~1 rows (approximately)
INSERT INTO `formkontak` (`id`, `nama`, `email`, `pesan`) VALUES
	(1, 'muni', 'muni@gmail.com', 'bagus banget pelayanannya!');

-- Dumping structure for table maxtune.jenis_servis
CREATE TABLE IF NOT EXISTS `jenis_servis` (
  `id_servis` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) NOT NULL,
  `harga` int NOT NULL,
  PRIMARY KEY (`id_servis`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table maxtune.jenis_servis: ~10 rows (approximately)
INSERT INTO `jenis_servis` (`id_servis`, `nama`, `harga`) VALUES
	(1, 'Ganti oli mesin', 50000),
	(2, 'Tune up', 70000),
	(3, 'Ganti oli gardan', 15000),
	(4, 'Ganti busi', 50000),
	(5, 'Ganti filter udara', 60000),
	(6, 'Ganti kampas rem', 60000),
	(7, 'Perawatan aki', 150000),
	(8, 'Bongkar pasang mesin', 500000),
	(9, 'Tambal ban', 15000),
	(10, 'Bore up', 700000);

-- Dumping structure for table maxtune.pembayaran
CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id_pembayaran` int NOT NULL AUTO_INCREMENT,
  `booking_id` int NOT NULL,
  `jenis_servis` varchar(128) NOT NULL,
  `status` enum('pending','lunas','gagal') DEFAULT 'pending',
  `upload_file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pembayaran`),
  KEY `fk_booking` (`booking_id`),
  CONSTRAINT `fk_booking` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table maxtune.pembayaran: ~1 rows (approximately)
INSERT INTO `pembayaran` (`id_pembayaran`, `booking_id`, `jenis_servis`, `status`, `upload_file`, `created_at`, `updated_at`) VALUES
	(34, 2, '6', 'pending', 'bukti_1750736908.png', '2025-06-24 03:48:28', '2025-06-24 03:48:28');

-- Dumping structure for table maxtune.subscribe
CREATE TABLE IF NOT EXISTS `subscribe` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table maxtune.subscribe: ~6 rows (approximately)
INSERT INTO `subscribe` (`id`, `email`) VALUES
	(1, 'rahman@gmail.com'),
	(2, 'rois@rois.co.id'),
	(3, 'revand@gmail.co'),
	(4, 'rangga@info.co'),
	(5, 'kelvin@kelvin.net'),
	(6, 'haikal@gmail.com');

-- Dumping structure for table maxtune.users
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table maxtune.users: ~3 rows (approximately)
INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`) VALUES
	(1, 'admin', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
	(7, 'muni', 'muni@gmail.com', 'muniaja', '827ccb0eea8a706c4c34a16891f84e7b'),
	(8, 'haikal', 'haikal@gmail.com', 'haikal', '25d55ad283aa400af464c76d713c07ad');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
