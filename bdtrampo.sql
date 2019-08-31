-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 31, 2019 at 05:07 PM
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
-- Database: `bdtrampo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbcliente`
--

CREATE TABLE `tbcliente` (
  `idCliente` int(11) NOT NULL,
  `nomeCliente` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `emailCliente` varchar(80) CHARACTER SET latin1 DEFAULT NULL,
  `senhaCliente` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `contatoCliente` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `dataNascCliente` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `sexoCliente` varchar(5) CHARACTER SET latin1 DEFAULT NULL,
  `cnpjCliente` varchar(14) CHARACTER SET latin1 DEFAULT NULL,
  `cpfCliente` varchar(14) CHARACTER SET latin1 DEFAULT NULL,
  `ufCliente` varchar(2) CHARACTER SET latin1 DEFAULT NULL,
  `cidadeCliente` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `logradouroCliente` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `bairroCliente` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `numCasaCliente` int(11) DEFAULT NULL,
  `complementoCliente` varchar(45) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbcliente`
--

INSERT INTO `tbcliente` (`idCliente`, `nomeCliente`, `emailCliente`, `senhaCliente`, `contatoCliente`, `dataNascCliente`, `sexoCliente`, `cnpjCliente`, `cpfCliente`, `ufCliente`, `cidadeCliente`, `logradouroCliente`, `bairroCliente`, `numCasaCliente`, `complementoCliente`) VALUES
(25, 'Bruno', 'adm@adm.com', 'cidadeCliente', NULL, '13/01/2002', 'M', NULL, '494.022.368-05', 'SP', '', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbprestador`
--

CREATE TABLE `tbprestador` (
  `idPrestador` int(11) NOT NULL,
  `nomePrestador` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `sexoPrestador` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `emailPrestador` varchar(80) CHARACTER SET latin1 DEFAULT NULL,
  `senhaPrestador` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `contatoPrestador` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `cpfPrestador` varchar(14) CHARACTER SET latin1 DEFAULT NULL,
  `dataNascPrestador` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `logradouroPrestador` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `ufPrestador` varchar(2) CHARACTER SET latin1 DEFAULT NULL,
  `cidadePrestador` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `bairroPrestador` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `numCasaPrestador` int(11) DEFAULT NULL,
  `complementoPrestador` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `cnpjPrestador` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `servicoPrestador` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `cargoPrestador` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `curriculoPrestador` blob DEFAULT NULL,
  `disponivelEmpregoPrestador` varchar(3) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbprestador`
--

INSERT INTO `tbprestador` (`idPrestador`, `nomePrestador`, `sexoPrestador`, `emailPrestador`, `senhaPrestador`, `contatoPrestador`, `cpfPrestador`, `dataNascPrestador`, `logradouroPrestador`, `ufPrestador`, `cidadePrestador`, `bairroPrestador`, `numCasaPrestador`, `complementoPrestador`, `cnpjPrestador`, `servicoPrestador`, `cargoPrestador`, `curriculoPrestador`, `disponivelEmpregoPrestador`) VALUES
(10, 'Leonardo', 'M', 'leo@leo.com', '12345678', '', '986.069.630-62', '0000-00-00', 'Rua JosÃ© Amato', 'SP', 'sp ', 'Cidade Tiradentes', 54, 'A', NULL, 'Teatro', '', NULL, 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbcliente`
--
ALTER TABLE `tbcliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indexes for table `tbprestador`
--
ALTER TABLE `tbprestador`
  ADD PRIMARY KEY (`idPrestador`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbcliente`
--
ALTER TABLE `tbcliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbprestador`
--
ALTER TABLE `tbprestador`
  MODIFY `idPrestador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
