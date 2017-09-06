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
-- Table structure for table `sections_wiki`
--

CREATE TABLE `sections_wiki` (
  `nom` varchar(40) NOT NULL,
  `id` int(11) NOT NULL,
  `description` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections_wiki`
--

INSERT INTO `sections_wiki` (`nom`, `id`, `description`) VALUES
('lore', 1, 'Le lore'),
('monde', 2, 'Le monde'),
('societe', 3, 'La soci&eacute;t&eacute;'),
('faune', 4, 'La faune'),
('science', 5, 'La science'),
('mechas', 6, 'Les m&eacute;chas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sections_wiki`
--
ALTER TABLE `sections_wiki`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sections_wiki`
--
ALTER TABLE `sections_wiki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
