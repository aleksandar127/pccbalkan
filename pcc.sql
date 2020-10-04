-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 04, 2020 at 12:33 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcc`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2020_10_03_082537_create_obuke_table_a', 1);

-- --------------------------------------------------------

--
-- Table structure for table `obuke`
--

DROP TABLE IF EXISTS `obuke`;
CREATE TABLE IF NOT EXISTS `obuke` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `naziv_obuke` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vrsta_obuke` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `broj_zaposlenih` int(11) NOT NULL,
  `termin` datetime NOT NULL,
  `mesto_odrzavanja_obuke` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `potrebni_resursi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `realizovano_broj_zaposlenih` int(11) DEFAULT NULL,
  `ocena` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
