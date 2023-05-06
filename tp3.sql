/*
 Navicat Premium Data Transfer

 Source Server         : MySQL
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : tp3

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 06/05/2023 19:30:45
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for barang
-- ----------------------------
DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang`  (
  `idBarang` bigint NOT NULL AUTO_INCREMENT,
  `namaBarang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `satuan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `idPengguna` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`idBarang`) USING BTREE,
  INDEX `idPengguna`(`idPengguna` ASC) USING BTREE,
  CONSTRAINT `barang_relation` FOREIGN KEY (`idPengguna`) REFERENCES `pengguna` (`idPengguna`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 42 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of barang
-- ----------------------------
INSERT INTO `barang` VALUES (1, 'Laptop Asus VivoBook X512DA', 'Laptop dengan spesifikasi AMD Ryzen 5, RAM 8GB, dan storage 512GB SSD', 'Unit', 1);
INSERT INTO `barang` VALUES (2, 'Smartphone Samsung Galaxy A52', 'Smartphone dengan spesifikasi Qualcomm Snapdragon 720G, RAM 8GB, dan storage 128GB', 'Unit', 2);
INSERT INTO `barang` VALUES (3, 'Kamera Mirrorless Fujifilm X-T30', 'Kamera dengan sensor 26.1MP dan prosesor gambar X-Processor 4', 'Unit', 3);
INSERT INTO `barang` VALUES (4, 'Monitor LG 27MK600M', 'Monitor dengan ukuran 27 inch dan resolusi Full HD', 'Unit', 4);
INSERT INTO `barang` VALUES (5, 'Printer Canon PIXMA G5070', 'Printer dengan sistem tangki tinta dan konektivitas Wi-Fi', 'Unit', 5);
INSERT INTO `barang` VALUES (6, 'Headset JBL Quantum 800', 'Headset gaming dengan teknologi QuantumSURROUND, ANC, dan microphone yang dapat dilepas', 'Unit', 4);
INSERT INTO `barang` VALUES (7, 'Speaker JBL Flip 5', 'Speaker portabel dengan baterai tahan lama dan konektivitas Bluetooth', 'Unit', 4);
INSERT INTO `barang` VALUES (8, 'Keyboard Gaming Logitech G213', 'Keyboard gaming dengan lampu RGB dan tahan cipratan air', 'Unit', 4);
INSERT INTO `barang` VALUES (9, 'Mouse Logitech G502 Hero', 'Mouse gaming dengan sensor HERO 25K dan 11 tombol yang dapat diprogram', 'Unit', 4);
INSERT INTO `barang` VALUES (10, 'Scanner Epson Perfection V19', 'Scanner flatbed dengan resolusi optik 4800 dpi dan konektivitas USB', 'Unit', 4);

-- ----------------------------
-- Table structure for hak_akses
-- ----------------------------
DROP TABLE IF EXISTS `hak_akses`;
CREATE TABLE `hak_akses`  (
  `idAkses` bigint NOT NULL AUTO_INCREMENT,
  `namaAkses` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idAkses`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of hak_akses
-- ----------------------------
INSERT INTO `hak_akses` VALUES (1, 'Administrator', 'Memiliki akses penuh ke seluruh sistem');
INSERT INTO `hak_akses` VALUES (2, 'Manajer', 'Memiliki akses ke fungsi manajerial dalam sistem');
INSERT INTO `hak_akses` VALUES (3, 'Kasir', 'Memiliki akses untuk melakukan transaksi penjualan');
INSERT INTO `hak_akses` VALUES (4, 'Gudang', 'Memiliki akses untuk mengelola stok barang');
INSERT INTO `hak_akses` VALUES (5, 'Marketing', 'Memiliki akses untuk melihat data pelanggan dan melakukan kampanye marketing');
INSERT INTO `hak_akses` VALUES (6, 'Keuangan', 'Memiliki akses untuk mengelola laporan keuangan');
INSERT INTO `hak_akses` VALUES (7, 'Teknisi', 'Memiliki akses untuk melakukan perbaikan dan maintenance sistem');
INSERT INTO `hak_akses` VALUES (8, 'HRD', 'Memiliki akses untuk mengelola data karyawan dan administrasi');
INSERT INTO `hak_akses` VALUES (9, 'Supervisor', 'Memiliki akses untuk mengawasi kinerja karyawan');
INSERT INTO `hak_akses` VALUES (10, 'Purchasing', 'Memiliki akses untuk melakukan pembelian barang dan mengelola supplier');

-- ----------------------------
-- Table structure for pelanggan
-- ----------------------------
DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE `pelanggan`  (
  `idPelanggan` bigint NOT NULL AUTO_INCREMENT,
  `NamaDepan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `NamaBelakang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `noHp` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idPelanggan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of pelanggan
-- ----------------------------
INSERT INTO `pelanggan` VALUES (1, 'Siti', 'Wati', 'Jl. Raya Bogor KM 25', '081234567891');
INSERT INTO `pelanggan` VALUES (2, 'Budi', 'Santoso', 'Jl. Asia Afrika No. 8', '082345678912');
INSERT INTO `pelanggan` VALUES (3, 'Dewi', 'Sari', 'Jl. KH Hasyim Ashari No. 23', '081345678923');
INSERT INTO `pelanggan` VALUES (4, 'Agus', 'Setiawan', 'Jl. Cempaka Putih Barat No. 18', '082456789034');
INSERT INTO `pelanggan` VALUES (5, 'Rina', 'Lestari', 'Jl. Taman Mini Indonesia Indah', '081567890145');
INSERT INTO `pelanggan` VALUES (6, 'Andi', 'Saputra', 'Jl. KH Wahid Hasyim No. 21', '082678901256');
INSERT INTO `pelanggan` VALUES (7, 'Lina', 'Kurniawati', 'Jl. Raya Bekasi No. 15', '081789012367');
INSERT INTO `pelanggan` VALUES (8, 'Rudi', 'Haryanto', 'Jl. Sudirman No. 99', '082890123478');
INSERT INTO `pelanggan` VALUES (9, 'Nina', 'Susanti', 'Jl. Raya Depok No. 18', '081901234589');
INSERT INTO `pelanggan` VALUES (10, 'Feri', 'Gunawan', 'Jl. Raya Serpong No. 8', '082012345690');
INSERT INTO `pelanggan` VALUES (11, 'Wulan', 'Sari', 'Jl. Pangeran Antasari No. 21', '081123456701');
INSERT INTO `pelanggan` VALUES (12, 'Rizki', 'Maulana', 'Jl. KH Abdullah Syafei No. 9', '082234567812');
INSERT INTO `pelanggan` VALUES (13, 'Siska', 'Putri', 'Jl. Raya Cikarang No. 15', '081345678923');
INSERT INTO `pelanggan` VALUES (14, 'Adi', 'Sutanto', 'Jl. Letjen Suprapto No. 17', '082456789034');
INSERT INTO `pelanggan` VALUES (15, 'Dini', 'Rahmawati', 'Jl. Raya Bogor KM 18', '081567890145');
INSERT INTO `pelanggan` VALUES (16, 'Eko', 'Prabowo', 'Jl. Raya Sukabumi No. 8', '082678901256');
INSERT INTO `pelanggan` VALUES (17, 'Widi', 'Astuti', 'Jl. Jendral Sudirman No. 15', '081789012367');
INSERT INTO `pelanggan` VALUES (18, 'Fira', 'Amalia', 'Jl. Raya Jakarta-Bogor KM 25', '082890123478');
INSERT INTO `pelanggan` VALUES (19, 'Rian', 'Hakim', 'Jl. Raya Cibubur No. 21', '081901234589');
INSERT INTO `pelanggan` VALUES (20, 'Laras', 'Sari', 'Jl. Veteran No. 9', '082012345690');

-- ----------------------------
-- Table structure for pembelian
-- ----------------------------
DROP TABLE IF EXISTS `pembelian`;
CREATE TABLE `pembelian`  (
  `idPembelian` bigint NOT NULL AUTO_INCREMENT,
  `jumlahPembelian` int NULL DEFAULT NULL,
  `hargaBeli` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `idBarang` bigint NULL DEFAULT NULL,
  `idPengguna` bigint NULL DEFAULT NULL,
  `idSupplier` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`idPembelian`) USING BTREE,
  INDEX `idBarang`(`idBarang` ASC) USING BTREE,
  INDEX `idPengguna`(`idPengguna` ASC) USING BTREE,
  INDEX `pembelian_ibfk_3`(`idSupplier` ASC) USING BTREE,
  CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`idBarang`) REFERENCES `barang` (`idBarang`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`idPengguna`) REFERENCES `barang` (`idPengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pembelian_ibfk_3` FOREIGN KEY (`idSupplier`) REFERENCES `supplier` (`idSupplier`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of pembelian
-- ----------------------------
INSERT INTO `pembelian` VALUES (3, 3, '8000000', 3, 3, 3);
INSERT INTO `pembelian` VALUES (4, 2, '2000000', 4, 4, 4);
INSERT INTO `pembelian` VALUES (5, 8, '7000000', 5, 5, 5);
INSERT INTO `pembelian` VALUES (6, 4, '6000000', 6, 4, 6);
INSERT INTO `pembelian` VALUES (7, 6, '9000000', 7, 4, 7);
INSERT INTO `pembelian` VALUES (8, 1, '1000000', 8, 4, 8);
INSERT INTO `pembelian` VALUES (9, 3, '12000000', 9, 4, 9);
INSERT INTO `pembelian` VALUES (10, 7, '10000000', 10, 4, 10);
INSERT INTO `pembelian` VALUES (11, 5, '4000000', 1, 4, 3);
INSERT INTO `pembelian` VALUES (12, 2, '15000000', 2, 4, 4);
INSERT INTO `pembelian` VALUES (13, 8, '8000000', 3, 4, 5);
INSERT INTO `pembelian` VALUES (14, 1, '5000000', 4, 4, 1);
INSERT INTO `pembelian` VALUES (15, 10, '7000000', 5, 4, 2);

-- ----------------------------
-- Table structure for pengguna
-- ----------------------------
DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE `pengguna`  (
  `idPengguna` bigint NOT NULL AUTO_INCREMENT,
  `namaPengguna` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `namaDepan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `namaBelakang` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `noHp` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `idAkses` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`idPengguna`) USING BTREE,
  INDEX `idAkses`(`idAkses` ASC) USING BTREE,
  CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`idAkses`) REFERENCES `hak_akses` (`idAkses`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of pengguna
-- ----------------------------
INSERT INTO `pengguna` VALUES (1, 'ridwan.nasution', 'nasution123', 'Ridwan', 'Nasution', '081234567890', 'Jl. Raya Bogor No. 1, Jakarta', 1);
INSERT INTO `pengguna` VALUES (2, 'rina.maharani', 'maharani123', 'Rina', 'Maharani', '081234567891', 'Jl. Pemuda No. 2, Jakarta', 2);
INSERT INTO `pengguna` VALUES (3, 'hafiz.saputra', 'saputra123', 'Hafiz', 'Saputra', '081234567892', 'Jl. Taman Sari No. 3, Jakarta', 3);
INSERT INTO `pengguna` VALUES (4, 'siska.putri', 'putri123', 'Siska', 'Putri', '081234567893', 'Jl. Asia Afrika No. 4, Jakarta', 4);
INSERT INTO `pengguna` VALUES (5, 'fadilah.rahman', 'rahman123', 'Fadilah', 'Rahman', '081234567894', 'Jl. Jend. Sudirman No. 5, Jakarta', 5);
INSERT INTO `pengguna` VALUES (6, 'aris.kurniawan', 'kurniawan123', 'Aris', 'Kurniawan', '081234567895', 'Jl. Pluit No. 6, Jakarta', 6);
INSERT INTO `pengguna` VALUES (7, 'nabila.rizky', 'rizky123', 'Nabila', 'Rizky', '081234567896', 'Jl. Pangeran Jayakarta No. 7, Jakarta', 7);
INSERT INTO `pengguna` VALUES (8, 'faridah.sari', 'sari123', 'Faridah', 'Sari', '081234567897', 'Jl. Tomang Raya No. 8, Jakarta', 8);
INSERT INTO `pengguna` VALUES (9, 'bima.satria', 'satria123', 'Bima', 'Satria', '081234567898', 'Jl. Kemanggisan No. 9, Jakarta', 9);
INSERT INTO `pengguna` VALUES (10, 'siti.maulida', 'maulida123', 'Siti', 'Maulida', '081234567899', 'Jl. Palmerah No. 10, Jakarta', 10);

-- ----------------------------
-- Table structure for penjualan
-- ----------------------------
DROP TABLE IF EXISTS `penjualan`;
CREATE TABLE `penjualan`  (
  `idPenjualan` bigint NOT NULL AUTO_INCREMENT,
  `jumlahPenjualan` int NULL DEFAULT NULL,
  `hargaJual` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `idBarang` bigint NULL DEFAULT NULL,
  `idPengguna` bigint NULL DEFAULT NULL,
  `idPelanggan` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`idPenjualan`) USING BTREE,
  INDEX `idBarang`(`idBarang` ASC) USING BTREE,
  INDEX `idPengguna`(`idPengguna` ASC) USING BTREE,
  INDEX `penjualan_ibfk_3`(`idPelanggan` ASC) USING BTREE,
  CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`idBarang`) REFERENCES `barang` (`idBarang`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`idPengguna`) REFERENCES `barang` (`idPengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `penjualan_ibfk_3` FOREIGN KEY (`idPelanggan`) REFERENCES `pelanggan` (`idPelanggan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of penjualan
-- ----------------------------
INSERT INTO `penjualan` VALUES (4, 1, '9000000', 4, 4, 4);
INSERT INTO `penjualan` VALUES (22, 3, '20000000', 3, 1, 19);
INSERT INTO `penjualan` VALUES (23, 8, '10000000', 5, 1, 12);
INSERT INTO `penjualan` VALUES (24, 1, '1500000', 8, 1, 18);

-- ----------------------------
-- Table structure for supplier
-- ----------------------------
DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier`  (
  `idSupplier` bigint NOT NULL AUTO_INCREMENT,
  `namaSupplier` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `noHp` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idSupplier`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of supplier
-- ----------------------------
INSERT INTO `supplier` VALUES (1, 'CV. Jaya Abadi', 'Jl. Raya Bogor KM 25', '081234567891');
INSERT INTO `supplier` VALUES (2, 'PT. Indo Makmur', 'Jl. Asia Afrika No. 8', '082345678912');
INSERT INTO `supplier` VALUES (3, 'UD. Makin Jaya', 'Jl. KH Hasyim Ashari No. 23', '081345678923');
INSERT INTO `supplier` VALUES (4, 'CV. Bersama Jaya', 'Jl. Cempaka Putih Barat No. 18', '082456789034');
INSERT INTO `supplier` VALUES (5, 'PT. Sinar Jaya Mandiri', 'Jl. Taman Mini Indonesia Indah', '081567890145');
INSERT INTO `supplier` VALUES (6, 'UD. Bumi Jaya', 'Jl. KH Wahid Hasyim No. 21', '082678901256');
INSERT INTO `supplier` VALUES (7, 'CV. Maju Lancar', 'Jl. Raya Bekasi No. 15', '081789012367');
INSERT INTO `supplier` VALUES (8, 'PT. Sejahtera Makmur', 'Jl. Sudirman No. 99', '082890123478');
INSERT INTO `supplier` VALUES (9, 'UD. Jaya Baru', 'Jl. Raya Depok No. 18', '081901234589');
INSERT INTO `supplier` VALUES (10, 'CV. Abadi Bersama', 'Jl. Raya Serpong No. 8', '082012345690');
INSERT INTO `supplier` VALUES (11, 'PT. Megah Jaya', 'Jl. Pangeran Antasari No. 21', '081123456701');
INSERT INTO `supplier` VALUES (12, 'UD. Mandiri Jaya', 'Jl. KH Abdullah Syafei No. 9', '082234567812');
INSERT INTO `supplier` VALUES (13, 'CV. Nusantara Jaya', 'Jl. Raya Cikarang No. 15', '081345678923');
INSERT INTO `supplier` VALUES (14, 'PT. Jaya Makmur', 'Jl. Letjen Suprapto No. 17', '082456789034');
INSERT INTO `supplier` VALUES (15, 'UD. Sinar Jaya', 'Jl. Raya Bogor KM 18', '081567890145');
INSERT INTO `supplier` VALUES (16, 'CV. Makin Lancar', 'Jl. Raya Sukabumi No. 8', '082678901256');
INSERT INTO `supplier` VALUES (17, 'PT. Maju Jaya Bersama', 'Jl. Jendral Sudirman No. 15', '081789012367');
INSERT INTO `supplier` VALUES (18, 'UD. Abadi Makmur', 'Jl. Raya Jakarta-Bogor KM 25', '082890123478');
INSERT INTO `supplier` VALUES (19, 'CV. Bumi Jaya Sejahtera', 'Jl. Raya Cibubur No. 21', '081901234589');
INSERT INTO `supplier` VALUES (20, 'PT. Lancar Makmur Jaya', 'Jl. Veteran No. 9', '082012345690');

SET FOREIGN_KEY_CHECKS = 1;
