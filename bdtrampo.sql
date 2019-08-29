-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29-Ago-2019 às 22:33
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 7.2.5

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
-- Estrutura da tabela `tbcliente`
--

CREATE TABLE `tbcliente` (
  `idCliente` int(11) NOT NULL,
  `nomeCliente` varchar(40) NOT NULL,
  `emailCliente` varchar(80) NOT NULL,
  `senhaCliente` varchar(20) NOT NULL,
  `contatoCliente` varchar(15) NOT NULL,
  `dataNascCliente` date NOT NULL,
  `sexoCliente` varchar(5) DEFAULT NULL,
  `cnpjCliente` varchar(14) DEFAULT NULL,
  `cpfCliente` varchar(14) NOT NULL,
  `ufCliente` varchar(2) NOT NULL,
  `cidadeCliente` varchar(25) NOT NULL,
  `logradouroCliente` varchar(40) NOT NULL,
  `bairroCliente` varchar(20) NOT NULL,
  `numCasaCliente` int(11) NOT NULL,
  `complementoCliente` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbcliente`
--

INSERT INTO `tbcliente` (`idCliente`, `nomeCliente`, `emailCliente`, `senhaCliente`, `contatoCliente`, `dataNascCliente`, `sexoCliente`, `cnpjCliente`, `cpfCliente`, `ufCliente`, `cidadeCliente`, `logradouroCliente`, `bairroCliente`, `numCasaCliente`, `complementoCliente`) VALUES
(8, 'Roberval', 'adm@adm.com', '12345678', '', '2019-08-29', 'M', NULL, '986.069.630-62', 'SP', '', 'Rua JosÃ© Amato', 'Cidade Tiradentes', 54, 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbprestador`
--

CREATE TABLE `tbprestador` (
  `idPrestador` int(11) NOT NULL,
  `nomePrestador` varchar(40) NOT NULL,
  `sexoPrestador` varchar(10) DEFAULT NULL,
  `emailPrestador` varchar(80) NOT NULL,
  `senhaPrestador` varchar(20) NOT NULL,
  `contatoPrestador` varchar(15) NOT NULL,
  `cpfPrestador` varchar(14) NOT NULL,
  `dataNascPrestador` date NOT NULL,
  `logradouroPrestador` varchar(20) NOT NULL,
  `ufPrestador` varchar(2) NOT NULL,
  `cidadePrestador` varchar(25) NOT NULL,
  `bairroPrestador` varchar(25) NOT NULL,
  `numCasaPrestador` int(11) NOT NULL,
  `complementoPrestador` varchar(45) NOT NULL,
  `cnpjPrestador` int(15) DEFAULT NULL,
  `servicoPrestador` varchar(200) NOT NULL,
  `cargoPrestador` varchar(20) NOT NULL,
  `anoAtuacaoPrestador` varchar(4) NOT NULL,
  `curriculoPrestador` blob,
  `disponivelEmpregoPrestador` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbprestador`
--

INSERT INTO `tbprestador` (`idPrestador`, `nomePrestador`, `sexoPrestador`, `emailPrestador`, `senhaPrestador`, `contatoPrestador`, `cpfPrestador`, `dataNascPrestador`, `logradouroPrestador`, `ufPrestador`, `cidadePrestador`, `bairroPrestador`, `numCasaPrestador`, `complementoPrestador`, `cnpjPrestador`, `servicoPrestador`, `cargoPrestador`, `anoAtuacaoPrestador`, `curriculoPrestador`, `disponivelEmpregoPrestador`) VALUES
(10, 'Leonardo', 'M', 'leo@leo.com', '12345678', '', '986.069.630-62', '0000-00-00', 'Rua JosÃ© Amato', 'SP', 'sp ', 'Cidade Tiradentes', 54, 'A', NULL, 'Teatro', '', '1995', NULL, 'yes');

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
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbprestador`
--
ALTER TABLE `tbprestador`
  MODIFY `idPrestador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
