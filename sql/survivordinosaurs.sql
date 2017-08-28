-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2017 at 09:47 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `justin_yau_period_9`
--

-- --------------------------------------------------------

--
-- Table structure for table `survivordinosaurs`
--

CREATE TABLE `survivordinosaurs` (
  `Survivor` varchar(15) NOT NULL,
  `Dino Type` varchar(15) NOT NULL,
  `Dino Name` varchar(30) NOT NULL,
  `Dino Level` varchar(3) NOT NULL,
  `Dino Health` varchar(15) NOT NULL,
  `Dino Stamina` varchar(15) NOT NULL,
  `Dino Oxygen` varchar(15) NOT NULL,
  `Dino Food` varchar(15) NOT NULL,
  `Dino Melee Damage` varchar(15) NOT NULL,
  `Dino Movement Speed` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survivordinosaurs`
--

INSERT INTO `survivordinosaurs` (`Survivor`, `Dino Type`, `Dino Name`, `Dino Level`, `Dino Health`, `Dino Stamina`, `Dino Oxygen`, `Dino Food`, `Dino Melee Damage`, `Dino Movement Speed`) VALUES
('Justice', 'Archaeopteryx', '1', '1', '1', '1', '1', '1', '1', '1'),
('Justice', 'Vulture', 'Justice', '120', '1020120', '01020102', '120012100', '010231', '1203103', 'ASJO');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
