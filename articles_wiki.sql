-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 06, 2017 at 02:12 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `WebSA`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles wiki`
--

CREATE TABLE `articles wiki` (
  `nom` varchar(200) NOT NULL,
  `id` int(11) NOT NULL,
  `id_section` int(11) NOT NULL,
  `texte` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles wiki`
--

INSERT INTO `articles wiki` (`nom`, `id`, `id_section`, `texte`) VALUES
('villes', 1, 2, 'Ceci est un magnifique texte sur les villes'),
('guildes', 2, 2, 'Ceci est un magnifique texte sur les guildes'),
('wartz', 3, 4, 'Ceci est un magnifique texte sur les wartz'),
('biodiversite', 4, 4, 'Ceci est un magnifique texte sur la biodiversité'),
('magie_mecanique', 5, 6, 'Ceci est un magnifique texte sur la magie mécanique'),
('usage_magie', 6, 5, 'Ceci est un magnifique texte sur l\'usage de la magie');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles wiki`
--
ALTER TABLE `articles wiki`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_section` (`id_section`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles wiki`
--
ALTER TABLE `articles wiki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles wiki`
--
ALTER TABLE `articles wiki`
  ADD CONSTRAINT `section_de_article` FOREIGN KEY (`id_section`) REFERENCES `sections_wiki` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
