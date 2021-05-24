-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 24, 2021 at 03:37 AM
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
-- Database: `emlakofisi_db`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `calisanKazandirdigi` (IN `calisanIsim` VARCHAR(50), OUT `kazanilan` DOUBLE(15,2))  BEGIN
	select
    	(km.kira*0.03) into kazanilan 
    FROM
    	KiralikMulk km, Calisan c
	WHERE
    	km.calisanID=c.calisanID AND
        km.kiralanmaTarihi IS NOT NULL AND 
        c.adi=calisanIsim;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Calisan`
--

CREATE TABLE `Calisan` (
  `calisanID` int(11) NOT NULL,
  `adi` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `soyadi` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `pozisyon` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `cinsiyet` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `maas` double(15,2) NOT NULL,
  `ofisID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `Calisan`
--

INSERT INTO `Calisan` (`calisanID`, `adi`, `soyadi`, `pozisyon`, `cinsiyet`, `maas`, `ofisID`) VALUES
(1, 'Furkan', 'Kaya', 'Müdür', 'Erkek', 15000.00, 1),
(2, 'Özgür', 'Özdemir', 'Çalışan', 'Erkek', 5000.00, 1),
(3, 'Ahmet', 'Selçuk', 'Çalışan', 'Erkek', 2500.00, 2),
(4, 'Pınar', 'Efe', 'Müdür', 'Kadın', 10000.00, 2);

-- --------------------------------------------------------

--
-- Table structure for table `EmlakOfisi`
--

CREATE TABLE `EmlakOfisi` (
  `ofisID` int(11) NOT NULL,
  `cadde` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `sehir` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `postaKodu` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `EmlakOfisi`
--

INSERT INTO `EmlakOfisi` (`ofisID`, `cadde`, `sehir`, `postaKodu`) VALUES
(1, 'Galata Cad', 'İstanbul', '34084'),
(2, 'Kartal cd.', 'Sakarya', '54000');

-- --------------------------------------------------------

--
-- Table structure for table `Kayit`
--

CREATE TABLE `Kayit` (
  `musteriID` int(11) NOT NULL,
  `ofisID` int(11) NOT NULL,
  `calisanID` int(11) NOT NULL,
  `kayitTarihi` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `Kayit`
--

INSERT INTO `Kayit` (`musteriID`, `ofisID`, `calisanID`, `kayitTarihi`) VALUES
(1, 1, 2, '2021-05-22 15:38:34'),
(2, 2, 3, '2021-05-22 15:38:34');

-- --------------------------------------------------------

--
-- Table structure for table `KiralikMulk`
--

CREATE TABLE `KiralikMulk` (
  `mulkID` int(11) NOT NULL,
  `cadde` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `sehir` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `postaKodu` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `tip` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `odaSayisi` int(11) NOT NULL,
  `kira` double(15,2) NOT NULL,
  `mulkSahibiID` int(11) NOT NULL,
  `calisanID` int(11) NOT NULL,
  `ofisID` int(11) NOT NULL,
  `kiralanmaTarihi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `KiralikMulk`
--

INSERT INTO `KiralikMulk` (`mulkID`, `cadde`, `sehir`, `postaKodu`, `tip`, `odaSayisi`, `kira`, `mulkSahibiID`, `calisanID`, `ofisID`, `kiralanmaTarihi`) VALUES
(1, 'Yusuf cd.', 'İstanbul', '34588', 'Daire', 4, 4000.00, 1, 2, 1, '2021-05-22'),
(2, 'Elvin cd.', 'Sakarya', '54255', 'Müstakil', 8, 15000.00, 2, 3, 2, '2021-04-15'),
(3, 'Turan cd.', 'Balıkesir', '78888', 'Müstakil', 10, 10000.00, 2, 3, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `MulkGosterme`
--

CREATE TABLE `MulkGosterme` (
  `musteriID` int(11) NOT NULL,
  `mulkID` int(11) NOT NULL,
  `gostermeZamani` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `yorum` text COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `MulkGosterme`
--

INSERT INTO `MulkGosterme` (`musteriID`, `mulkID`, `gostermeZamani`, `yorum`) VALUES
(1, 1, '2021-05-12 12:30:00', 'Tek kelimeyle harikaydı! En yakın sürede kiralama işlemlerine başlayalım!'),
(2, 2, '2021-05-15 15:28:00', 'Gerçekten güzel bir ev. Başka bir evi görmemize gerek yok!');

-- --------------------------------------------------------

--
-- Table structure for table `MulkSahibi`
--

CREATE TABLE `MulkSahibi` (
  `mulkSahibiID` int(11) NOT NULL,
  `adi` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `soyadi` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `adres` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `MulkSahibi`
--

INSERT INTO `MulkSahibi` (`mulkSahibiID`, `adi`, `soyadi`, `adres`, `tel`) VALUES
(1, 'Hakan', 'Çelik', 'Namık cd., Sultan sk., No:22, Daire:1', '+90 588 745 45 12'),
(2, 'Burkan', 'Yılmaz', 'Jale cd., Razı sk., No:38, Daire:2', '+90 544 447 44 41');

-- --------------------------------------------------------

--
-- Table structure for table `Musteri`
--

CREATE TABLE `Musteri` (
  `musteriID` int(11) NOT NULL,
  `adi` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `soyadi` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `maxKira` double(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `Musteri`
--

INSERT INTO `Musteri` (`musteriID`, `adi`, `soyadi`, `tel`, `maxKira`) VALUES
(1, 'Arda', 'Turan', '+90 504 455 44 44', 1557.54),
(2, 'Yusuf', 'Demir', '+90 588 745 54 54', 5555.00),
(3, 'Osman', 'Yazar', '+90 544 44 77 25', 10000.00);

--
-- Triggers `Musteri`
--
DELIMITER $$
CREATE TRIGGER `delete_musteri` AFTER DELETE ON `Musteri` FOR EACH ROW DELETE k, mg FROM Kayit k, MulkGosterme mg
WHERE (OLD.musteriID=k.musteriID or OLD.musteriID=mg.musteriID) 
AND k.musteriID=mg.musteriID
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Calisan`
--
ALTER TABLE `Calisan`
  ADD PRIMARY KEY (`calisanID`);

--
-- Indexes for table `EmlakOfisi`
--
ALTER TABLE `EmlakOfisi`
  ADD PRIMARY KEY (`ofisID`);

--
-- Indexes for table `Kayit`
--
ALTER TABLE `Kayit`
  ADD PRIMARY KEY (`musteriID`,`ofisID`,`calisanID`);

--
-- Indexes for table `KiralikMulk`
--
ALTER TABLE `KiralikMulk`
  ADD PRIMARY KEY (`mulkID`);

--
-- Indexes for table `MulkGosterme`
--
ALTER TABLE `MulkGosterme`
  ADD PRIMARY KEY (`musteriID`,`mulkID`);

--
-- Indexes for table `MulkSahibi`
--
ALTER TABLE `MulkSahibi`
  ADD PRIMARY KEY (`mulkSahibiID`);

--
-- Indexes for table `Musteri`
--
ALTER TABLE `Musteri`
  ADD PRIMARY KEY (`musteriID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Calisan`
--
ALTER TABLE `Calisan`
  MODIFY `calisanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `EmlakOfisi`
--
ALTER TABLE `EmlakOfisi`
  MODIFY `ofisID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `KiralikMulk`
--
ALTER TABLE `KiralikMulk`
  MODIFY `mulkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `MulkSahibi`
--
ALTER TABLE `MulkSahibi`
  MODIFY `mulkSahibiID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Musteri`
--
ALTER TABLE `Musteri`
  MODIFY `musteriID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
