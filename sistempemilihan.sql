-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2021 at 11:39 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistempemilihan`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `pelangganid` int(11) NOT NULL,
  `periodeid` int(11) NOT NULL,
  `tanggalbayar` int(11) NOT NULL,
  `paketinternet` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id` int(11) NOT NULL,
  `pelangganid` varchar(50) NOT NULL,
  `periodeid` int(11) NOT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id`, `pelangganid`, `periodeid`, `nilai`) VALUES
(10, '172911217384', 1, 0.20465042372862),
(11, '172911204904', 1, 0.17409119869045),
(12, '172911219019', 1, 0.17057855967798);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `kode` varchar(45) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `type` enum('Benefits','Cost') NOT NULL DEFAULT 'Benefits',
  `bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `kode`, `nama`, `type`, `bobot`) VALUES
(1, 'C1', 'Kecepatan Internet', 'Benefits', 5),
(2, 'C2', 'Tanggal Pembayaran', 'Benefits', 1),
(4, 'C3', 'Periode Tahun Aktif', 'Benefits', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `idpelanggan` varchar(20) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `hp` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `aktif` varchar(45) DEFAULT NULL,
  `status` bit(1) NOT NULL DEFAULT b'1',
  `periodeid` int(11) NOT NULL,
  `tanggalbayar` varchar(20) DEFAULT NULL,
  `paket` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`idpelanggan`, `nama`, `alamat`, `hp`, `email`, `aktif`, `status`, `periodeid`, `tanggalbayar`, `paket`) VALUES
('172911202483', 'VIVIAN ARYANTI', 'Jl. Kelapa 2 entrop', '+6285298082640', 'viviansmple@mail.com', '2017', b'1', 1, 'UPPER', 'INETF10M'),
('172911204904', 'ALFA RIEUWPASSA', 'BTI Sosial Dok 8 Atas', '+6281354004422', 'kristt2688@gmail.com', '2018', b'1', 1, 'UPPER', 'INETF40M'),
('172911213638', 'APERES AYORBABA', 'Jl. Tanjung ria Pasir 2', '+6282243371777', 'aperessmple@mail.com', '2019', b'1', 1, 'MIDDLE', 'INETF20M'),
('172911216971', 'ALEXANDRA IVONA', 'Jl. Sungai Hanyaan Entrop', '+6285254391150', 'alxndrasmple@mail.com', '2020', b'1', 1, 'UPPER', 'INETF30M'),
('172911217384', 'BIMBO THALIB', 'Jl. Diponegoro Aryoko', '+6285254924951', 'kristt26@gmail.com', '2018', b'1', 1, 'LOWER', 'INETF100M'),
('172911217549', 'RULI ARIO WIBOWO', 'Kompleks AL Hamadi', '+62811480089', 'rulismple@mail.com', '2018', b'1', 1, 'MIDDLE', 'INETF10M'),
('172911217614', 'NELCE M. MANEMI ', 'Jl. Soa siu dok 5 ', '+6282195049059', 'nelcesmple@mail.com', '2017', b'1', 1, 'MIDDLE', 'INETF20M'),
('172911219019', 'MINGGU ROBEN', 'Jl. Amphibi Hamadi', '+6281344020288', 'kristt26@gmail.com', '2019', b'1', 1, 'MIDDLE', 'INETF50M');

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id` int(11) NOT NULL,
  `periode` varchar(45) NOT NULL,
  `status` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id`, `periode`, `status`) VALUES
(1, '2020', b'1'),
(2, '2021', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id` int(11) NOT NULL,
  `kriteriaid` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bobot` double NOT NULL,
  `inisial` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id`, `kriteriaid`, `nama`, `bobot`, `inisial`) VALUES
(1, 1, '100 mbps', 5, 'INETF100M'),
(2, 1, '50 mbps', 4, 'INETF50M'),
(6, 1, '40 mbps', 3, 'INETF40M'),
(7, 1, '30 mbps', 2, 'INETF30M'),
(9, 1, '20 mbps dan 10 mbps', 1, 'INETF20M, INETF10M'),
(10, 2, '5 – 20', 3, 'UPPER'),
(12, 2, '21 – 31', 2, 'MIDDLE'),
(13, 2, 'Masuk bulan baru', 1, 'LOWER'),
(14, 4, '>= 7 tahun', 5, '7'),
(16, 4, '5 – 6 tahun', 4, '5–6'),
(17, 4, '3 – 4 tahun', 3, '3–4'),
(18, 4, '2 tahun', 2, '2'),
(19, 4, '1 tahun', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `status`) VALUES
(1, 'Administrator', '$2y$10$.NsPrWfF9Yl9AmWijpg7cOedFE2WrilT1UsqhlFoW9/UF1Y/C9Q9m', 'Administrator', b'1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asPeriode_idx` (`periodeid`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asPeriodeHasil_idx` (`periodeid`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`idpelanggan`,`periodeid`),
  ADD KEY `PeriodePelanggan_idx` (`periodeid`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `askriteria_idx` (`kriteriaid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `asPeriode` FOREIGN KEY (`periodeid`) REFERENCES `periode` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `asPeriodeHasil` FOREIGN KEY (`periodeid`) REFERENCES `periode` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `PeriodePelanggan` FOREIGN KEY (`periodeid`) REFERENCES `periode` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD CONSTRAINT `askriteria` FOREIGN KEY (`kriteriaid`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
