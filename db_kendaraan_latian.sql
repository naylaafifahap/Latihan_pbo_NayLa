-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 25, 2026 at 03:42 AM
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
-- Database: `db_kendaraan_latian`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_kendaraan`
--

CREATE TABLE `tabel_kendaraan` (
  `id_kendaraan` int NOT NULL,
  `nomor_rangka` varchar(50) NOT NULL,
  `merek` varchar(50) NOT NULL,
  `tahun_produksi` int NOT NULL,
  `harga_sewa_per_hari` decimal(12,2) NOT NULL,
  `jenis_kendaraan` enum('Mobil','Motor','Truk') NOT NULL,
  `kapasitas_penumpang` int DEFAULT NULL,
  `tipe_mobil` varchar(20) DEFAULT NULL,
  `kapasitas_cc` int DEFAULT NULL,
  `tipe_stang` varchar(30) DEFAULT NULL,
  `kapasitas_muatan_ton` decimal(4,1) DEFAULT NULL,
  `jumlah_roda` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_kendaraan`
--

INSERT INTO `tabel_kendaraan` (`id_kendaraan`, `nomor_rangka`, `merek`, `tahun_produksi`, `harga_sewa_per_hari`, `jenis_kendaraan`, `kapasitas_penumpang`, `tipe_mobil`, `kapasitas_cc`, `tipe_stang`, `kapasitas_muatan_ton`, `jumlah_roda`) VALUES
(1, 'MBL-Avanza-2023', 'Toyota Avanza', 2023, '450000.00', 'Mobil', 7, 'MPV', NULL, NULL, NULL, NULL),
(2, 'MBL-Pajero-2024', 'Mitsubishi Pajero', 2024, '900000.00', 'Mobil', 7, 'SUV', NULL, NULL, NULL, NULL),
(3, 'MBL-Civic-2022', 'Honda Civic', 2022, '1200000.00', 'Mobil', 5, 'Sedan', NULL, NULL, NULL, NULL),
(4, 'MBL-Brio-2021', 'Honda Brio', 2021, '350000.00', 'Mobil', 5, 'City Car', NULL, NULL, NULL, NULL),
(5, 'MBL-Innova-2024', 'Toyota Innova Zenix', 2024, '750000.00', 'Mobil', 7, 'MPV', NULL, NULL, NULL, NULL),
(6, 'MBL-Fortuner-2023', 'Toyota Fortuner', 2023, '850000.00', 'Mobil', 7, 'SUV', NULL, NULL, NULL, NULL),
(7, 'MBL-Ioniq-2024', 'Hyundai Ioniq 5', 2024, '1500000.00', 'Mobil', 5, 'Hatchback Elektrik', NULL, NULL, NULL, NULL),
(8, 'MTR-Nmax-2023', 'Yamaha NMAX', 2023, '150000.00', 'Motor', NULL, NULL, 155, 'Skuter Matik', NULL, NULL),
(9, 'MTR-Beat-2022', 'Honda Beat', 2022, '80000.00', 'Motor', NULL, NULL, 110, 'Skuter Matik', NULL, NULL),
(10, 'MTR-CBR-2023', 'Honda CBR 250RR', 2023, '300000.00', 'Motor', NULL, NULL, 250, 'Sport Berfairing', NULL, NULL),
(11, 'MTR-Vespa-2024', 'Vespa Primavera', 2024, '250000.00', 'Motor', NULL, NULL, 150, 'Klasik Matik', NULL, NULL),
(12, 'MTR-KLX-2021', 'Kawasaki KLX 150', 2021, '200000.00', 'Motor', NULL, NULL, 150, 'Trail / Offroad', NULL, NULL),
(13, 'MTR-W175-2022', 'Kawasaki W175', 2022, '180000.00', 'Motor', NULL, NULL, 175, 'Retro Naked', NULL, NULL),
(14, 'MTR-Aerox-2023', 'Yamaha Aerox', 2023, '140000.00', 'Motor', NULL, NULL, 155, 'Sporty Matik', NULL, NULL),
(15, 'TRK-Canter-2021', 'Mitsubishi Fuso Canter', 2021, '1200000.00', 'Truk', NULL, NULL, NULL, NULL, '4.0', 6),
(16, 'TRK-Hino-2022', 'Hino Ranger', 2022, '2500000.00', 'Truk', NULL, NULL, NULL, NULL, '15.0', 10),
(17, 'TRK-IszElf-2020', 'Isuzu Elf Giga', 2020, '950000.00', 'Truk', NULL, NULL, NULL, NULL, '3.5', 4),
(18, 'TRK-Scania-2023', 'Scania V8 Heavy Duty', 2023, '5000000.00', 'Truk', NULL, NULL, NULL, NULL, '30.0', 12),
(19, 'TRK-Fuso-2022', 'Mitsubishi Fuso Fighter', 2022, '2200000.00', 'Truk', NULL, NULL, NULL, NULL, '12.0', 6),
(20, 'TRK-Volvo-2024', 'Volvo FH16', 2024, '5500000.00', 'Truk', NULL, NULL, NULL, NULL, '35.0', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_kendaraan`
--
ALTER TABLE `tabel_kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`),
  ADD UNIQUE KEY `nomor_rangka` (`nomor_rangka`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_kendaraan`
--
ALTER TABLE `tabel_kendaraan`
  MODIFY `id_kendaraan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
