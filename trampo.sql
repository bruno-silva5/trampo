-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 26, 2019 at 10:12 PM
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
-- Table structure for table `occupation`
--

CREATE TABLE `occupation` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `occupation`
--

INSERT INTO `occupation` (`id`, `name`) VALUES
(1, 'Serviços de Limpeza'),
(2, 'Serviços de Ar-condicionado'),
(3, 'Serviços Elétricos'),
(4, 'Serviços Hidráulicos'),
(5, 'Serviços de Reforma'),
(6, 'Montagem de Móveis'),
(7, 'Fretes'),
(8, 'Serviços de informática');

-- --------------------------------------------------------

--
-- Table structure for table `occupation_subcategory`
--

CREATE TABLE `occupation_subcategory` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `id_occupation` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `occupation_subcategory`
--

INSERT INTO `occupation_subcategory` (`id`, `name`, `id_occupation`) VALUES
(1, 'Diaristas e Faxineiras', 1),
(2, 'Limpeza de Caixa D\'água', 1),
(3, 'Limpeza de Ar-Condicionado', 2),
(4, 'Instalação de Ar-Condicionado', 2),
(5, 'Desinstalação de Ar-Condicionado', 2),
(6, 'Conserto de Ar-Condicionado', 2),
(7, 'Manutenção de Ar-Condicionado', 2),
(8, 'Pré-Instalação de Ar-Condicionado', 2),
(9, 'Instalação de Chuveiro Elétrico', 3),
(10, 'Instalação de Ventilador de Teto', 3),
(11, 'Instalação de Tomada e Interruptor', 3),
(12, 'Instalação de Disjuntor', 3),
(13, 'Instalação de Luminária', 3),
(14, 'Instalação de Coifa e Depurador', 3),
(15, 'Eletricista', 3),
(16, 'Instalação de Aquecedor a Gás', 4),
(17, 'Conserto de Aquecedor a Gás', 4),
(18, 'Conserto de Vazamento', 4),
(19, 'Instalação de Máquina de Lavar Louça', 4),
(20, 'Instalação de Máquina de Lavar Roupa', 4),
(21, 'Limpeza de Caixa D\'água', 4),
(22, 'Instalação de Torneira', 4),
(23, 'Desentupir Vaso Sanitário', 4),
(24, 'Encanador', 4),
(25, 'Pintura Externa', 5),
(26, 'Pintura de Portas e Janelas', 5),
(27, 'Pintura de Portão e Grade', 5),
(28, 'Pintura de Parede e Teto(Interna)', 5),
(29, 'Colocação de Piso Porcelanato', 5),
(30, 'Instalação de Piso Laminado', 5),
(31, 'Colocação de Piso Cerâmico', 5),
(32, 'Instalação de Piso Vinílico', 5),
(33, 'Instalação de Revestimento na Parede', 5),
(34, 'Reparar Piso ou Revestimento\r\n', 5),
(35, 'Marido de Aluguel', 5),
(36, 'Instalação de Persiana e Cortina', 5),
(37, 'Conserto de Persianas', 5),
(38, 'Instalação de Rodapé', 5),
(39, 'Instalação de Rede de Proteção', 5),
(40, 'Instalação de Papel de Parede', 5),
(41, 'Instalação de Suporte de TV', 6),
(42, 'Montador de Móveis', 6),
(43, 'Pequenos Fretes(Até 100KM)', 7),
(44, 'Instalação de Rede Wi-fi', 8),
(45, 'Formatação de Computadores', 8);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `professional` varchar(200) DEFAULT NULL,
  `time_remaining` varchar(200) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `is_visible` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `professional`, `time_remaining`, `title`, `description`, `is_visible`) VALUES
(17, 'Pediatra', 'now', 'asd', 'asdadas', NULL),
(18, 'Pediatra', 'now', 'asd', 'asdasdasda', NULL),
(19, 'Pediatra', 'now', 'Quebra', 'asdasdasda', NULL),
(20, 'Pediatra', 'now', 'asdad', 'asdad', NULL),
(21, 'Pediatra', 'now', 'asdasd', 'asd', NULL),
(22, 'Pediatra', 'now', 'asdad', 'asdasdasd', NULL),
(23, 'Pediatra', 'now', 'asdad', 'asdasdasd', NULL),
(24, 'Pediatra', 'now', 'asdasdasd', 'asdasdasd', NULL),
(25, 'Pediatra', 'now', 'asdad', 'asdadas', NULL),
(26, 'Pediatra', 'now', 'asdasd', 'asdasd', NULL),
(27, 'asdada', 'now', 'asdas', 'asdasdasd', NULL),
(28, 'Piloto de linha aérea regular', 'now', 'Pilotar meu jatinho', 'Preciso de um piloto particular', NULL),
(29, 'asda', 'now', 'ashdba', 'ashdbasdh', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `full_name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `cnpj` varchar(20) DEFAULT NULL,
  `birth_date` varchar(20) DEFAULT NULL,
  `cep` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `uf` varchar(5) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `neighborhood` varchar(100) DEFAULT NULL,
  `home_number` varchar(10) DEFAULT NULL,
  `address_complement` varchar(100) DEFAULT NULL,
  `service` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `full_name`, `email`, `password`, `gender`, `phone_number`, `cpf`, `cnpj`, `birth_date`, `cep`, `address`, `uf`, `city`, `neighborhood`, `home_number`, `address_complement`, `service`) VALUES
(8, 'Marcos Silva', 'marcao@Live.com', 'Defina uma senha', 'M', '(11) 93425-4333', '272.882.290-50', NULL, '1970-01-01', '55190-536', 'Rua Paulo Lucena de Mendonça', 'PE', 'sp ', 'Malaquias Cardoso', '32', '(Lot S Jorge)', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `occupation`
--
ALTER TABLE `occupation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `occupation_subcategory`
--
ALTER TABLE `occupation_subcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_occupation` (`id_occupation`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `occupation`
--
ALTER TABLE `occupation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `occupation_subcategory`
--
ALTER TABLE `occupation_subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `occupation_subcategory`
--
ALTER TABLE `occupation_subcategory`
  ADD CONSTRAINT `occupation_subcategory_ibfk_1` FOREIGN KEY (`id_occupation`) REFERENCES `occupation` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
