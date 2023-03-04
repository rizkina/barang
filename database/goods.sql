-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.10.2-MariaDB-log - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table goods.barang
CREATE TABLE IF NOT EXISTS `barang` (
  `id_brg` varchar(7) NOT NULL,
  `id_jns` enum('Bahan Habis Pakai','Uncategorize') NOT NULL,
  `nm_brg` varchar(50) NOT NULL,
  `satuan` enum('pcs','set','liter','lbr','rim','buah','pax','pasang','box') NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `created_user` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_user` int(3) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_brg`),
  KEY `created_user` (`created_user`),
  KEY `updated_user` (`updated_user`),
  KEY `FK_barang_jns_barang` (`id_jns`),
  CONSTRAINT `FK_barang_users` FOREIGN KEY (`created_user`) REFERENCES `users` (`id_user`),
  CONSTRAINT `FK_barang_users_2` FOREIGN KEY (`updated_user`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table goods.barang: ~2 rows (approximately)
DELETE FROM `barang`;
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` (`id_brg`, `id_jns`, `nm_brg`, `satuan`, `stok`, `created_user`, `created_date`, `updated_user`, `updated_date`) VALUES
	('A000001', 'Bahan Habis Pakai', 'Conector RJ-45', 'pax', 7, 1, '2023-02-28 10:38:05', 1, '2023-03-02 22:10:35'),
	('A000002', 'Bahan Habis Pakai', 'UTP Cable Cat 5-e', 'box', 7, 1, '2023-02-28 12:25:43', 1, '2023-03-02 22:11:22');
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;

-- Dumping structure for table goods.barang_in
CREATE TABLE IF NOT EXISTS `barang_in` (
  `id_in` varchar(15) NOT NULL,
  `date_in` date NOT NULL,
  `id_brg` varchar(7) NOT NULL,
  `jml_in` int(11) NOT NULL,
  `created_user` int(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_in`),
  KEY `id_brg` (`id_brg`),
  KEY `created_user` (`created_user`),
  CONSTRAINT `FK_barang_in_barang` FOREIGN KEY (`id_brg`) REFERENCES `barang` (`id_brg`),
  CONSTRAINT `FK_barang_in_users` FOREIGN KEY (`created_user`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table goods.barang_in: ~0 rows (approximately)
DELETE FROM `barang_in`;
/*!40000 ALTER TABLE `barang_in` DISABLE KEYS */;
INSERT INTO `barang_in` (`id_in`, `date_in`, `id_brg`, `jml_in`, `created_user`, `created_date`) VALUES
	('TI-2023-0000001', '2023-03-02', 'A000002', 1, 1, '2023-03-02 22:11:22');
/*!40000 ALTER TABLE `barang_in` ENABLE KEYS */;

-- Dumping structure for table goods.barang_out
CREATE TABLE IF NOT EXISTS `barang_out` (
  `id_out` varchar(15) NOT NULL DEFAULT 'AUTO_INCREMENT',
  `date_out` date NOT NULL,
  `id_brg` varchar(7) NOT NULL,
  `jml_keluar` int(11) NOT NULL,
  `created_user` int(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_out`),
  KEY `id_brg` (`id_brg`),
  KEY `created_user` (`created_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table goods.barang_out: ~0 rows (approximately)
DELETE FROM `barang_out`;
/*!40000 ALTER TABLE `barang_out` DISABLE KEYS */;
INSERT INTO `barang_out` (`id_out`, `date_out`, `id_brg`, `jml_keluar`, `created_user`, `created_date`) VALUES
	('TO-2023-0000001', '2023-03-02', 'A000001', 1, 1, '2023-03-02 22:29:57');
/*!40000 ALTER TABLE `barang_out` ENABLE KEYS */;

-- Dumping structure for table goods.ruang
CREATE TABLE IF NOT EXISTS `ruang` (
  `id_ruang` int(4) NOT NULL AUTO_INCREMENT,
  `nm_ruang` varchar(50) NOT NULL,
  `created_user` int(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_user` int(4) NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_ruang`),
  KEY `FK_ruang_users` (`created_user`),
  KEY `FK_ruang_users_2` (`update_user`),
  CONSTRAINT `FK_ruang_users` FOREIGN KEY (`created_user`) REFERENCES `users` (`id_user`),
  CONSTRAINT `FK_ruang_users_2` FOREIGN KEY (`update_user`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table goods.ruang: ~0 rows (approximately)
DELETE FROM `ruang`;
/*!40000 ALTER TABLE `ruang` DISABLE KEYS */;
INSERT INTO `ruang` (`id_ruang`, `nm_ruang`, `created_user`, `created_date`, `update_user`, `update_date`) VALUES
	(1, 'Gudang TKJ', 1, '2023-02-28 10:38:18', 1, '2023-02-28 10:38:18'),
	(2, 'Kantor TKJ', 1, '2023-03-01 21:32:04', 1, '2023-03-01 21:32:04');
/*!40000 ALTER TABLE `ruang` ENABLE KEYS */;

-- Dumping structure for table goods.sekolah
CREATE TABLE IF NOT EXISTS `sekolah` (
  `id_sek` int(11) NOT NULL AUTO_INCREMENT,
  `npsn` char(10) NOT NULL,
  `nm_sek` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kec` varchar(50) NOT NULL,
  `kab_kota` varchar(50) NOT NULL,
  `prov` varchar(50) NOT NULL,
  `nm_ks` varchar(50) NOT NULL,
  `nip_ks` varchar(22) DEFAULT NULL,
  `pt_inv` varchar(50) NOT NULL,
  `nip_pt_inv` varchar(22) DEFAULT NULL,
  `logos` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_sek`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table goods.sekolah: ~0 rows (approximately)
DELETE FROM `sekolah`;
/*!40000 ALTER TABLE `sekolah` DISABLE KEYS */;
/*!40000 ALTER TABLE `sekolah` ENABLE KEYS */;

-- Dumping structure for table goods.users
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nip` varchar(22) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `hp` varchar(13) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `hak_akses` enum('Super Admin','Pimpinan','Petugas Inventaris') NOT NULL,
  `status` enum('aktif','blokir') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `lastvisited` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `lastlogout` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_user`),
  KEY `level` (`hak_akses`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table goods.users: ~3 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id_user`, `username`, `nama_user`, `password`, `nip`, `email`, `hp`, `foto`, `hak_akses`, `status`, `created_at`, `updated_at`, `lastvisited`, `lastlogout`) VALUES
	(1, 'admin', 'Rizki Nugroho A', '21232f297a57a5a743894a0e4a801fc3', '198204012006041004', '', '', 'avatar5.png', 'Super Admin', 'aktif', '2023-02-27 08:19:23', '2023-02-27 12:31:46', '2023-02-27 12:31:46', '2023-02-27 12:31:46'),
	(2, 'jar', 'Jaryanto', '827ccb0eea8a706c4c34a16891f84e7b', '---', NULL, NULL, NULL, 'Petugas Inventaris', 'aktif', '2023-03-02 23:06:35', '2023-03-02 23:14:16', '2023-03-02 23:14:16', '2023-03-02 23:14:16'),
	(3, 'Agus', 'Agus saja', '827ccb0eea8a706c4c34a16891f84e7b', '12324', NULL, NULL, NULL, 'Pimpinan', 'aktif', '2023-03-03 13:17:24', '2023-03-03 13:31:01', '2023-03-03 13:31:01', '2023-03-03 13:31:01');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
