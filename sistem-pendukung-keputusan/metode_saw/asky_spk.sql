-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2018 at 08:56 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asky_spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_komputer`
--

CREATE TABLE `data_komputer` (
  `idcom` int(11) NOT NULL,
  `namacom` varchar(25) NOT NULL,
  `harga` float NOT NULL,
  `idvendor` float NOT NULL,
  `namavendor` varchar(25) NOT NULL,
  `ram` float NOT NULL,
  `hardisk` float NOT NULL,
  `idso` float NOT NULL,
  `namaso` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_komputer`
--

INSERT INTO `data_komputer` (`idcom`, `namacom`, `harga`, `idvendor`, `namavendor`, `ram`, `hardisk`, `idso`, `namaso`) VALUES
(1, 'komputer A', 6, 1, 'acer', 4, 400, 2, 'Unix'),
(2, 'komputer B', 8, 2, 'Toshiba', 2, 500, 1, 'Windows'),
(3, 'komputer C', 7.5, 3, 'Apple', 3, 550, 3, 'Macintosh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_komputer`
--
ALTER TABLE `data_komputer`
  ADD PRIMARY KEY (`idcom`),
  ADD UNIQUE KEY `namacom` (`namacom`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
