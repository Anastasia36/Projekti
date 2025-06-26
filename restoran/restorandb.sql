-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2024 at 08:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoran`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `ime` varchar(20) NOT NULL,
  `prezime` varchar(20) NOT NULL,
  `e_mail` varchar(50) NOT NULL,
  `k_ime` varchar(20) NOT NULL,
  `lozinka` varchar(20) NOT NULL,
  `uloga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `ime`, `prezime`, `e_mail`, `k_ime`, `lozinka`, `uloga`) VALUES
(1, 'Admin', 'Adminović', 'admin@restoran.com', 'admin', '123456', 'admin'),
(2, 'Ivan', 'Ivić', 'ivan.ivic@restoran.com', 'ivanovic', 'lozinka123', 'kupac'),
(3, 'Ana', 'Anić', 'ana.anic@restoran.com', 'ana123', 'mojaLozinka', 'kupac'),
(4, 'Marko', 'Marek', 'marko.marek@restoran.com', 'marek89', 'lozinka456', 'kupac');

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi` (jela)
--

CREATE TABLE `proizvodi` (
  `id` int(5) NOT NULL,
  `naziv` varchar(100) NOT NULL,
  `opis` varchar(1000) NOT NULL,
  `cijena` varchar(100) NOT NULL,
  `slika` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`id`, `naziv`, `opis`, `cijena`, `slika`) VALUES
(1, 'Pizza Margherita', 'Klasična pizza s rajčicom, mozzarellom i bosiljkom.', '50.00', 'https://example.com/images/pizza-margherita.png'),
(2, 'Pasta Carbonara', 'Pasta s jajima, pancetom, sirom i vrhnjem.', '45.00', 'https://example.com/images/pasta-carbonara.png'),
(3, 'Burger Deluxe', 'Burger sa slasnim goveđim mesom, sirom, povrćem i umakom.', '60.00', 'https://example.com/images/burger-deluxe.png'),
(4, 'Sushi Set', 'Raznovrsni sushi s lososom, tunom i povrćem.', '120.00', 'https://example.com/images/sushi-set.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `proizvodi`
--
ALTER TABLE `proizvodi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
