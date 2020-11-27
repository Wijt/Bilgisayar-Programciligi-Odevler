-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 27, 2020 at 02:13 PM
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
-- Database: `blogdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategoriID` int(11) NOT NULL,
  `kategori` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategoriID`, `kategori`) VALUES
(1, 'Furkan'),
(2, 'uzay');

-- --------------------------------------------------------

--
-- Table structure for table `makale`
--

CREATE TABLE `makale` (
  `makaleID` int(11) NOT NULL,
  `baslik` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `icerik` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `tarih` date NOT NULL,
  `yazarID` int(11) NOT NULL,
  `kategoriID` int(11) NOT NULL,
  `keywords` varchar(200) COLLATE utf8mb4_turkish_ci NOT NULL,
  `sayac` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `makale`
--

INSERT INTO `makale` (`makaleID`, `baslik`, `icerik`, `tarih`, `yazarID`, `kategoriID`, `keywords`, `sayac`) VALUES
(3, 'Furkanın hayatı', 'tüm sınavlardan yüksek alıp çok sevdiği dersin sınavından düşük alan öğrencinin hayatı...\r\n\r\nDikkat bu içerik oldukça hüzünlüdür..', '2020-11-04', 1, 1, 'furkan, hayatı', 2),
(4, 'İlginç Uzay', 'uzay harikadır çok severim', '2020-11-02', 2, 2, 'uzay, galaksi, evren', 5);

-- --------------------------------------------------------

--
-- Table structure for table `yazar`
--

CREATE TABLE `yazar` (
  `yazarID` int(11) NOT NULL,
  `adi` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `soyadi` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `eposta` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kullaniciadi` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `sifre` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `yazar`
--

INSERT INTO `yazar` (`yazarID`, `adi`, `soyadi`, `eposta`, `kullaniciadi`, `sifre`) VALUES
(1, 'Furkan', 'Kaya', 'Furkan@gmail.com', 'furkank', '123123'),
(2, 'Ahmet', 'Kaya', 'ahmet@gmail.com', 'ahmetk', '123sssad123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategoriID`);

--
-- Indexes for table `makale`
--
ALTER TABLE `makale`
  ADD PRIMARY KEY (`makaleID`),
  ADD KEY `kategoriID` (`kategoriID`),
  ADD KEY `yazarID` (`yazarID`);

--
-- Indexes for table `yazar`
--
ALTER TABLE `yazar`
  ADD PRIMARY KEY (`yazarID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategoriID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `makale`
--
ALTER TABLE `makale`
  MODIFY `makaleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `yazar`
--
ALTER TABLE `yazar`
  MODIFY `yazarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `makale`
--
ALTER TABLE `makale`
  ADD CONSTRAINT `makale_ibfk_1` FOREIGN KEY (`kategoriID`) REFERENCES `kategori` (`kategoriID`),
  ADD CONSTRAINT `makale_ibfk_2` FOREIGN KEY (`yazarID`) REFERENCES `yazar` (`yazarID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
