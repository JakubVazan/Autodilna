-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2021 at 02:03 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autoservis`
--

-- --------------------------------------------------------

--
-- Table structure for table `automobily`
--

CREATE TABLE `automobily` (
  `idautomobily` int(11) NOT NULL,
  `registracni_znacka` varchar(45) NOT NULL,
  `vyrobce` varchar(45) NOT NULL,
  `typ_vozu` varchar(45) NOT NULL,
  `rok_vyroby` int(11) NOT NULL,
  `obsah_motoru` int(11) NOT NULL,
  `prevodovka` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `automobily`
--

INSERT INTO `automobily` (`idautomobily`, `registracni_znacka`, `vyrobce`, `typ_vozu`, `rok_vyroby`, `obsah_motoru`, `prevodovka`) VALUES
(1, 'SWAG 420', 'Audi', 'sporťák', 2018, 9999, 'manuál'),
(2, 'N1GG ER5', 'BMW', 'SUV', 2015, 1652, 'manuál'),
(3, 'ABCD 123', 'Škoda', 'hatchback', 2010, 1500, 'automat'),
(4, 'OAUH 465', 'Trabant', 'Off-road', 1950, 2, 'ano'),
(5, 'GJFM 264', 'Tesla', 'Sedan', 2020, 2500, 'automat'),
(6, 'RGNZ 541', 'Ford', 'Kombi', 2014, 1564, 'manuál');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `majitele`
--

CREATE TABLE `majitele` (
  `idmajitele` int(11) NOT NULL,
  `jmeno` varchar(45) NOT NULL,
  `prijmeni` varchar(45) NOT NULL,
  `adresa` varchar(45) NOT NULL,
  `telefon` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `automobily_idautomobily` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `majitele`
--

INSERT INTO `majitele` (`idmajitele`, `jmeno`, `prijmeni`, `adresa`, `telefon`, `email`, `automobily_idautomobily`) VALUES
(2, 'Malej', 'UziVert', 'Pluto', '240000000', 'uzi@hotmail.com', 2),
(3, 'CoNejrychleji', 'Kameňák', 'ano', '478266485', 'rychlejkamenak@asap.com', 3),
(4, 'David', 'Kopčil', 'Mistřice', '147852145', 'davcakopcilek@email.cz', 4),
(14, 'Princ', 'Fárkvád', 'bažina', '', 'd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nahradni_dily`
--

CREATE TABLE `nahradni_dily` (
  `iddilu` int(11) NOT NULL,
  `nazev` varchar(45) NOT NULL,
  `cena` varchar(45) NOT NULL,
  `sklad` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nahradni_dily`
--

INSERT INTO `nahradni_dily` (`iddilu`, `nazev`, `cena`, `sklad`) VALUES
(1, 'Baterie', '3000', '8'),
(2, 'Světlo', '90', '20'),
(3, 'Kolo', '2500', '4'),
(4, 'Kapota', '3000', '7'),
(5, 'Dveře', '899', '10'),
(6, 'Motor', '35000', '2');

-- --------------------------------------------------------

--
-- Table structure for table `opravy`
--

CREATE TABLE `opravy` (
  `ID` int(45) NOT NULL,
  `datum` varchar(45) NOT NULL,
  `majitel` varchar(45) NOT NULL,
  `spz` varchar(45) NOT NULL,
  `typ` varchar(45) NOT NULL,
  `znacka` varchar(45) NOT NULL,
  `dil` varchar(45) NOT NULL,
  `zamestnanec` varchar(45) NOT NULL,
  `cena` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `opravy`
--

INSERT INTO `opravy` (`ID`, `datum`, `majitel`, `spz`, `typ`, `znacka`, `dil`, `zamestnanec`, `cena`) VALUES
(1, '12.4.2019', 'Obama', 'FJD122', 'Fáro', 'Audi', 'Olej', 'Holý', 100),
(3, '25.3.2021', 'Gucci', '4Z0 2F5', 'sedan', 'škoda', 'nárazník', 'Novák', 1000),
(4, '5.8.2015', 'Dvořák', '5AY 1D8', 'SUV', 'Ford', 'Čelní sklo', 'Kučera', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$Ltre3j14L5r0ggyalUcXAeTHy97mEnIepvPb0Wc1.TKa577VDFc1q', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1620301981, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `zamestnanci`
--

CREATE TABLE `zamestnanci` (
  `jmeno` varchar(45) NOT NULL,
  `prijmeni` varchar(45) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zamestnanci`
--

INSERT INTO `zamestnanci` (`jmeno`, `prijmeni`, `id`) VALUES
('Gucci', 'Mane', 1),
('Ben', 'Doverson', 4),
('Swag', 'McHaver', 5),
('fjůčr', 'lolzena', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `automobily`
--
ALTER TABLE `automobily`
  ADD PRIMARY KEY (`idautomobily`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `majitele`
--
ALTER TABLE `majitele`
  ADD PRIMARY KEY (`idmajitele`,`automobily_idautomobily`);

--
-- Indexes for table `nahradni_dily`
--
ALTER TABLE `nahradni_dily`
  ADD PRIMARY KEY (`iddilu`);

--
-- Indexes for table `opravy`
--
ALTER TABLE `opravy`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `zamestnanci`
--
ALTER TABLE `zamestnanci`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `automobily`
--
ALTER TABLE `automobily`
  MODIFY `idautomobily` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `majitele`
--
ALTER TABLE `majitele`
  MODIFY `idmajitele` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nahradni_dily`
--
ALTER TABLE `nahradni_dily`
  MODIFY `iddilu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `opravy`
--
ALTER TABLE `opravy`
  MODIFY `ID` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `zamestnanci`
--
ALTER TABLE `zamestnanci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
