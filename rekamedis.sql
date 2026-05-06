-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 25, 2025 at 01:35 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekamedis`
--

-- --------------------------------------------------------

--
-- Table structure for table `ambil_sampel`
--

CREATE TABLE `ambil_sampel` (
  `id_ambil_sampel` int NOT NULL,
  `id_pasien` int NOT NULL,
  `jenis_sampel` enum('Darah','Urine','Swab','Faeces','Jaringan','Sputum','Cairan','Lain-lain') NOT NULL,
  `volume` varchar(50) NOT NULL,
  `kelayakan` enum('Layak','Tidak Layak') NOT NULL,
  `alasan_tidak_layak` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `lokasi_pengambilan` enum('Tangan','Paha','Rectal','Nasofaring','Orofaring','Lain-lain') DEFAULT NULL,
  `jam_pengambilan` enum('Biasa','Cito') DEFAULT 'Biasa',
  `tanggal_permintaan` date DEFAULT NULL,
  `informasi_tambahan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ambil_sampel`
--

INSERT INTO `ambil_sampel` (`id_ambil_sampel`, `id_pasien`, `jenis_sampel`, `volume`, `kelayakan`, `alasan_tidak_layak`, `created_at`, `lokasi_pengambilan`, `jam_pengambilan`, `tanggal_permintaan`, `informasi_tambahan`) VALUES
(4, 5, 'Darah', '2ml', 'Layak', NULL, '2025-09-16 07:08:16', 'Tangan', 'Cito', '2025-09-20', '-'),
(6, 16, 'Darah', '6ml', 'Tidak Layak', 'Volume tidak mencukupi', '2025-09-17 02:31:33', 'Tangan', 'Biasa', '2025-09-18', 'Volume dibawah standar'),
(7, 15, 'Darah', '3ml', 'Tidak Layak', 'Tidak steril', '2025-09-19 04:15:32', 'Paha', 'Biasa', '2025-09-19', ''),
(8, 28, '', '', 'Layak', NULL, '2025-09-23 07:52:49', '', '', '0000-00-00', ''),
(9, 29, 'Darah', '3ml', 'Layak', NULL, '2025-09-24 02:01:22', 'Tangan', '', '2025-09-27', 'Sering istirahat'),
(10, 30, '', '', 'Layak', NULL, '2025-09-24 02:36:12', '', '', '0000-00-00', ''),
(11, 31, '', '', 'Layak', NULL, '2025-09-24 02:37:00', '', '', '0000-00-00', ''),
(12, 32, 'Darah', '3ml', 'Layak', NULL, '2025-09-24 07:28:14', 'Tangan', '', '2025-09-25', 'Tidak ada'),
(13, 33, 'Urine', '3ml', 'Layak', NULL, '2025-09-24 08:18:29', 'Tangan', '', '2025-09-27', 'Dkde');

-- --------------------------------------------------------

--
-- Table structure for table `dokter_pengirim`
--

CREATE TABLE `dokter_pengirim` (
  `id_dokter_pengirim` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text,
  `no_telp` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dokter_pengirim`
--

INSERT INTO `dokter_pengirim` (`id_dokter_pengirim`, `nama`, `alamat`, `no_telp`, `created_at`) VALUES
(16, 'dr. Tirta', 'Jl. RA, Kartini', '0893978284773', '2025-09-24 07:28:14'),
(17, 'dr. Gastam', 'Jl. Jenderal Sudirman', '089234324325', '2025-09-24 08:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `form_permintaan`
--

CREATE TABLE `form_permintaan` (
  `id` int NOT NULL,
  `no_register` varchar(50) DEFAULT NULL,
  `nama_pasien` varchar(100) DEFAULT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `jk` varchar(20) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `umur` varchar(20) DEFAULT NULL,
  `alamat_pasien` text,
  `telp_pasien` varchar(20) DEFAULT NULL,
  `nama_dokter` varchar(100) DEFAULT NULL,
  `alamat_pengirim` text,
  `telp_pengirim` varchar(20) DEFAULT NULL,
  `tgl_form` date DEFAULT NULL,
  `diagnosa_klinis` text,
  `obat_dikonsumsi` text,
  `asal_sampel` text,
  `puasa` varchar(20) DEFAULT NULL,
  `lokasi_pengambilan` text,
  `lokasi_lainnya` varchar(100) DEFAULT NULL,
  `jenis_spesimen` text,
  `spesimen_lainnya` varchar(100) DEFAULT NULL,
  `tgl_permintaan` date DEFAULT NULL,
  `volume_spesimen` varchar(20) DEFAULT NULL,
  `tgl_pengambilan` date DEFAULT NULL,
  `jam_pengambilan` time DEFAULT NULL,
  `prioritas` varchar(20) DEFAULT NULL,
  `info_tambahan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `form_permintaan`
--

INSERT INTO `form_permintaan` (`id`, `no_register`, `nama_pasien`, `nik`, `jk`, `tgl_lahir`, `umur`, `alamat_pasien`, `telp_pasien`, `nama_dokter`, `alamat_pengirim`, `telp_pengirim`, `tgl_form`, `diagnosa_klinis`, `obat_dikonsumsi`, `asal_sampel`, `puasa`, `lokasi_pengambilan`, `lokasi_lainnya`, `jenis_spesimen`, `spesimen_lainnya`, `tgl_permintaan`, `volume_spesimen`, `tgl_pengambilan`, `jam_pengambilan`, `prioritas`, `info_tambahan`) VALUES
(8, 'PSN.20250923.0001', 'Radeva Mumtaza', '11111111', 'Laki-laki', '2002-11-17', '22 thn', 'Jl. Pahlawan 12', '0898983933', '', '', '', '2025-09-23', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '00:00:00', 'Biasa', ''),
(9, 'PSN.20250923.0003', 'taza', '2222222', 'Perempuan', '2025-09-01', '22 thn', 'Jl. Pahlawan 12', '0898983933', '', '', '', '2025-09-23', '', '', '', NULL, '', '', '', '', '0000-00-00', '', '0000-00-00', '00:00:00', 'Biasa', ''),
(10, 'PSN.20250924.0001', 'Radeva Mumtaza', '123456789', '', '2002-11-28', '22 thn', 'Jl. Pahlawan 12', '0898983933', 'dr. Tirta', 'Jl. RA, Kartini', '0893978284773', '2025-09-24', 'Batuk-batuk', 'Bodrek', 'Rujuk', 'Puasa', 'Tangan', '', 'Darah', '', '2025-09-27', '3ml', '2025-09-24', '09:01:00', 'Cito', 'Sering istirahat'),
(11, 'PSN.20250924.0002', 'Radeva', '0987654321', '', '1999-12-31', '25 thn', 'Jl. Pahlawan 12', '0898983933', '', '', '', '2025-09-24', '', '', '', NULL, '', '', '', '', '0000-00-00', '', '0000-00-00', '00:00:00', 'Biasa', ''),
(12, 'PSN.20250924.0002', 'Radeva', '0987654321', 'Laki-laki', '1999-06-24', '26 thn', '', '0898983933', '', '', '', '2025-09-24', '', '', '', NULL, '', '', '', '', '0000-00-00', '', '0000-00-00', '00:00:00', 'Biasa', ''),
(13, 'PSN.20250924.0001', 'Radeva Mumtaza', '0987654321', 'Laki-laki', '2009-11-24', '15 thn', 'Jl. Pahlawan 12', '0898983933', 'dr. Tirta', 'Jl. RA, Kartini', '0893978284773', '2025-09-24', 'Batuk-batuk', 'Paracetamol', 'Langsung', 'Tidak Puasa', 'Tangan', '', 'Darah', '', '2025-09-25', '3ml', '2025-09-24', '14:28:00', 'Biasa', 'Tidak ada'),
(14, 'PSN.20250924.0002', 'Budiman', '1234567890', '', '1993-06-08', '32 thn', 'Jl. Pahlawan 10', '0898983911', 'dr. Gastam', 'Jl. Jenderal Sudirman', '089234324325', '2025-09-24', 'sakit perut', 'balsem', 'Kiriman', 'Puasa', 'Tangan', '', 'Urine', '', '2025-09-27', '3ml', '2025-09-24', '15:19:00', 'Cito', 'Dkde');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int NOT NULL,
  `no_register` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `gender` enum('Laki-laki','Perempuan') NOT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `status_pasien` enum('Rujukan','Mandiri') DEFAULT 'Mandiri',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_dokter_pengirim` int DEFAULT NULL,
  `diagnosa` text,
  `obat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `no_register`, `nama`, `nik`, `tgl_lahir`, `alamat`, `gender`, `no_telp`, `status_pasien`, `created_at`, `id_dokter_pengirim`, `diagnosa`, `obat`) VALUES
(32, 'PSN.20250924.0001', 'Radeva Mumtaza', '0987654321', '2009-11-24', 'Jl. Pahlawan 12', 'Laki-laki', '0898983933', 'Rujukan', '2025-09-24 07:28:14', 16, 'Batuk-batuk', 'Paracetamol'),
(33, 'PSN.20250924.0002', 'Budiman', '1234567890', '1993-06-08', 'Jl. Pahlawan 10', '', '0898983911', 'Rujukan', '2025-09-24 08:18:29', 17, 'sakit perut', 'balsem');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int NOT NULL,
  `id_pasien` int DEFAULT NULL,
  `no_register` varchar(50) DEFAULT NULL,
  `keterangan` text,
  `total_biaya` decimal(10,2) DEFAULT NULL,
  `metode_pembayaran` enum('Tunai','BPJS','Lain-lain') DEFAULT NULL,
  `status` enum('Belum Lunas','Lunas') DEFAULT NULL,
  `tanggal_pelunasan` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pasien`, `no_register`, `keterangan`, `total_biaya`, `metode_pembayaran`, `status`, `tanggal_pelunasan`, `created_at`, `updated_at`) VALUES
(1, NULL, 'PSN.20250916.0001', '', '12000.00', 'Lain-lain', 'Belum Lunas', NULL, '2025-09-17 10:34:53', '2025-09-17 15:21:57'),
(2, NULL, 'PSN.20250917.0001', 'Selesai Pemeriksaan sampel 1x', '20000.00', 'Tunai', 'Lunas', '2025-09-19 04:17:36', '2025-09-17 15:02:59', '2025-09-19 11:17:36'),
(3, NULL, 'PSN.20250924.0001', '', '20000.00', 'Tunai', 'Lunas', '2025-09-24 07:57:44', '2025-09-24 14:57:44', '2025-09-24 14:57:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `role` enum('admin','petugas','dokter') NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `nama`, `role`, `created_at`) VALUES
(1, 'admin', '$2y$10$kA7xwDb8jVmPRwHXc6jF1.USGbHT.9UzVDBN.KwLmo2n2foAslUbC', 'Administrator', 'admin', '2025-09-15 06:27:22'),
(2, 'petugasklinik', '$2y$10$4kJwM15WwF.6KXZFvGgkFeqGBhTUKNhoTJMT3jycEMhbIm8FFsEni', 'Petugas Klinik', 'petugas', '2025-09-15 06:57:10'),
(3, 'dokter', '$2y$10$6Uymoop9MYVvgrvJDbYCyelps2ukjFvKOAvu9FrwYsb6Um8U6rhlS', 'dokter', 'dokter', '2025-09-15 07:23:23'),
(7, 'petugaskesmas', '$2y$10$Jggxk1m10CdlBdI9DBgBvefZOtyZB40zwmgYs02CXFdjblsAqrE9y', 'Petugas Kesmas', 'petugas', '2025-09-24 08:34:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ambil_sampel`
--
ALTER TABLE `ambil_sampel`
  ADD PRIMARY KEY (`id_ambil_sampel`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indexes for table `dokter_pengirim`
--
ALTER TABLE `dokter_pengirim`
  ADD PRIMARY KEY (`id_dokter_pengirim`);

--
-- Indexes for table `form_permintaan`
--
ALTER TABLE `form_permintaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ambil_sampel`
--
ALTER TABLE `ambil_sampel`
  MODIFY `id_ambil_sampel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dokter_pengirim`
--
ALTER TABLE `dokter_pengirim`
  MODIFY `id_dokter_pengirim` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `form_permintaan`
--
ALTER TABLE `form_permintaan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
