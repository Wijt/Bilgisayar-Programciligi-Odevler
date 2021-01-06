-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 30, 2020 at 08:38 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `servis_otomasyonu`
--

-- --------------------------------------------------------

--
-- Table structure for table `arac`
--

CREATE TABLE `arac` (
  `id` int(11) NOT NULL,
  `plaka` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `model_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `arac`
--

INSERT INTO `arac` (`id`, `plaka`, `model_id`) VALUES
(1, '34 ASD 5468', 9),
(2, '54 DSA 78', 2),
(3, '34 FK 542', 12),
(4, '34 DSA 78', 10);

-- --------------------------------------------------------

--
-- Table structure for table `gider`
--

CREATE TABLE `gider` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `gider_turu` int(11) NOT NULL,
  `tutar` double(15,2) NOT NULL,
  `tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `gider`
--

INSERT INTO `gider` (`id`, `p_id`, `gider_turu`, `tutar`, `tarih`) VALUES
(1, 1, 4, 34.00, '2020-12-30 04:35:57'),
(2, 2, 3, 15.00, '2020-12-30 04:35:57'),
(3, 4, 2, 56.00, '2020-12-30 04:35:57'),
(4, 1, 1, 150.00, '2020-12-30 04:35:57'),
(5, 1, 1, 50.00, '2020-12-30 19:27:00');

-- --------------------------------------------------------

--
-- Table structure for table `gider_turu`
--

CREATE TABLE `gider_turu` (
  `id` int(11) NOT NULL,
  `tur` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `gider_turu`
--

INSERT INTO `gider_turu` (`id`, `tur`) VALUES
(1, 'Benzin'),
(2, 'Gişe'),
(3, 'Yağ'),
(4, '1. Köprü Geçiş'),
(5, '2. Köprü Geçiş'),
(6, '3. Köprü Geçiş'),
(7, 'Kaza'),
(8, 'Diğer');

-- --------------------------------------------------------

--
-- Table structure for table `maas`
--

CREATE TABLE `maas` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `verilis_tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `maas`
--

INSERT INTO `maas` (`id`, `p_id`, `verilis_tarih`) VALUES
(1, 1, '2020-12-30 04:30:14'),
(2, 4, '2020-12-30 04:30:14'),
(3, 2, '2020-12-30 04:30:14'),
(4, 3, '2020-12-30 04:30:14'),
(5, 1, '2020-12-30 21:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `marka`
--

CREATE TABLE `marka` (
  `id` int(11) NOT NULL,
  `ad` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `marka`
--

INSERT INTO `marka` (`id`, `ad`) VALUES
(1, 'Volkswagen'),
(2, 'Renault'),
(3, 'Toyota'),
(4, 'Peugeot'),
(5, 'Mercedes-Benz'),
(6, 'Audi'),
(7, 'Porsche'),
(8, 'BMW'),
(9, 'Peugeot'),
(10, 'Ford Motor Company');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `kapasite` int(11) NOT NULL,
  `yil` year(4) NOT NULL,
  `marka_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `kapasite`, `yil`, `marka_id`) VALUES
(1, 16, 2020, 1),
(2, 15, 2005, 6),
(9, 25, 2015, 3),
(10, 10, 1998, 2),
(11, 18, 2012, 8),
(12, 30, 2006, 10),
(13, 54, 1996, 9),
(14, 26, 2007, 4);

-- --------------------------------------------------------

--
-- Table structure for table `personel`
--

CREATE TABLE `personel` (
  `id` int(11) NOT NULL,
  `ad` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `soyad` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `tel` varchar(17) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `maas` double(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `personel`
--

INSERT INTO `personel` (`id`, `ad`, `soyad`, `tel`, `maas`) VALUES
(1, 'Furkan', 'Kaya', '+90 506 555 47 44', 12100.00),
(2, 'Merve', 'Erçetin', '+90 507 489 99 94', 2819.30),
(3, 'Seray', 'Ulusoy', '+90 599 344 39 49', 10707.29),
(4, 'Metin', 'Ulusoy', '+90 533 493 32 33', 4104.32),
(8, 'Ahmet', 'Selçuk', '+90 545 544 44 77', 10648.00);

-- --------------------------------------------------------

--
-- Table structure for table `personel_arac`
--

CREATE TABLE `personel_arac` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `arac_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `personel_arac`
--

INSERT INTO `personel_arac` (`id`, `p_id`, `arac_id`) VALUES
(1, 1, 3),
(2, 2, 2),
(3, 4, 1),
(4, 8, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arac`
--
ALTER TABLE `arac`
  ADD PRIMARY KEY (`id`),
  ADD KEY `model_id` (`model_id`);

--
-- Indexes for table `gider`
--
ALTER TABLE `gider`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personel_id` (`p_id`),
  ADD KEY `gider_turu` (`gider_turu`);

--
-- Indexes for table `gider_turu`
--
ALTER TABLE `gider_turu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maas`
--
ALTER TABLE `maas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `marka`
--
ALTER TABLE `marka`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marka_id` (`marka_id`);

--
-- Indexes for table `personel`
--
ALTER TABLE `personel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personel_arac`
--
ALTER TABLE `personel_arac`
  ADD PRIMARY KEY (`id`),
  ADD KEY `arac_id` (`arac_id`),
  ADD KEY `p_id` (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arac`
--
ALTER TABLE `arac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gider`
--
ALTER TABLE `gider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gider_turu`
--
ALTER TABLE `gider_turu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `maas`
--
ALTER TABLE `maas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `marka`
--
ALTER TABLE `marka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personel`
--
ALTER TABLE `personel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personel_arac`
--
ALTER TABLE `personel_arac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `arac`
--
ALTER TABLE `arac`
  ADD CONSTRAINT `arac_ibfk_1` FOREIGN KEY (`model_id`) REFERENCES `model` (`id`);

--
-- Constraints for table `gider`
--
ALTER TABLE `gider`
  ADD CONSTRAINT `gider_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `personel` (`id`),
  ADD CONSTRAINT `gider_ibfk_2` FOREIGN KEY (`gider_turu`) REFERENCES `gider_turu` (`id`);

--
-- Constraints for table `maas`
--
ALTER TABLE `maas`
  ADD CONSTRAINT `maas_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `personel` (`id`);

--
-- Constraints for table `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `model_ibfk_1` FOREIGN KEY (`marka_id`) REFERENCES `marka` (`id`);

--
-- Constraints for table `personel_arac`
--
ALTER TABLE `personel_arac`
  ADD CONSTRAINT `personel_arac_ibfk_1` FOREIGN KEY (`arac_id`) REFERENCES `arac` (`id`),
  ADD CONSTRAINT `personel_arac_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `personel` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
