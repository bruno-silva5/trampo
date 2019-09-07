-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 07, 2019 at 05:06 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trampo`
--

-- --------------------------------------------------------

--
-- Table structure for table `contratante`
--

CREATE TABLE `contratante` (
  `id` int(11) NOT NULL,
  `full_name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `birth_date` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `cnpj` varchar(20) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `cep` varchar(20) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `neighborhood` varchar(100) DEFAULT NULL,
  `home_number` varchar(10) DEFAULT NULL,
  `address_complement` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contratante`
--

INSERT INTO `contratante` (`id`, `full_name`, `email`, `password`, `phone_number`, `birth_date`, `gender`, `cnpj`, `cpf`, `cep`, `uf`, `city`, `address`, `neighborhood`, `home_number`, `address_complement`) VALUES
(13, 'Bruno Silva', 'bruno@live.com', '12345678', NULL, '1970-01-01', 'M', NULL, '494.022.368-05', '08246-106', 'SP', '', 'Rua Juçaral', 'Parada XV de Novembro', '345', '');

-- --------------------------------------------------------

--
-- Table structure for table `prestador`
--

CREATE TABLE `prestador` (
  `id` int(11) NOT NULL,
  `full_name` varchar(200) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `cnpj` varchar(30) DEFAULT NULL,
  `birth_date` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `cep` varchar(20) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `neighborhood` varchar(100) DEFAULT NULL,
  `home_number` varchar(10) DEFAULT NULL,
  `address_complement` varchar(100) DEFAULT NULL,
  `service` varchar(100) DEFAULT NULL,
  `available_for_job` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prestador`
--

INSERT INTO `prestador` (`id`, `full_name`, `email`, `gender`, `password`, `phone_number`, `cpf`, `cnpj`, `birth_date`, `address`, `cep`, `uf`, `city`, `neighborhood`, `home_number`, `address_complement`, `service`, `available_for_job`) VALUES
(2, 'Marcos Aurélio', 'marcao@live.com', 'M', 'Defina uma senha', NULL, '494.022.368-05', NULL, '1970-01-01', 'Rua Juçaral', '08246-106', 'SP', 'sp ', 'Parada XV de Novembro', '45', '', 'Música', 'yes'),
(3, 'César Cordél', 'cesar@live.com', 'M', '12345678', NULL, '494.022.368-05', NULL, '1970-01-01', 'Rua Juçaral', '08246-106', 'SP', 'sp ', 'Parada XV de Novembro', '345', 'perto da escola julio dinis', 'Conservação e Restauro', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contratante`
--
ALTER TABLE `contratante`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prestador`
--
ALTER TABLE `prestador`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contratante`
--
ALTER TABLE `contratante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `prestador`
--
ALTER TABLE `prestador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
