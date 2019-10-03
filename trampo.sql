-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2019 at 11:50 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

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
(8, 'Serviços de informática'),
(9, 'Confeitaria'),
(10, 'Serviços Automotivos');

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
(43, 'Pequenos Fretes (Até 100KM)', 7),
(44, 'Instalação de Rede Wi-fi', 8),
(45, 'Formatação de Computadores', 8),
(46, 'Confeitaria e Doces', 9),
(47, 'Pedreiro', 5),
(48, 'Mecânico', 10);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `time_remaining` varchar(200) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `is_visible` varchar(20) DEFAULT NULL,
  `id_occupation_subcategory` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `time_remaining`, `title`, `description`, `is_visible`, `id_occupation_subcategory`, `id_user`) VALUES
(32, 'now', 'asda', 'asda', NULL, 43, 11),
(33, 'next_week', 'da', 'dad', NULL, 46, 8),
(34, 'now', 'asd', 'asda', '0', 43, 8),
(35, 'now', 'asdas', 'asda', '0', 43, 8),
(36, 'now', 'asda', 'asdasd', '0', 1, 8),
(37, 'now', 'df', 'sdf', '0', 46, 8),
(38, 'now', 'adadas', 'asda', '0', 43, 8),
(39, 'now', 'asdasdadas', 'adasd', '0', 24, 8),
(40, 'now', 'sário que toda negociação fique registrado no ', 'sário que toda negociação fique registrado no ', 'true', 46, 8),
(41, 'now', 'sário que toda negociação fique registrado no ', 'sário que toda negociação fique registrado no ', 'false', 46, 8),
(42, 'now', 'teste', 'testando o servico', 'true', 43, 12),
(43, 'now', '../../../Controller/logout.php', 'php', 'true', 43, 11),
(44, 'now', 'vh', 'g', 'false', 43, 11),
(45, 'now', 'sdsa', 'asdada', 'true', 1, 11),
(46, 'now', 'sda', 'asda', 'true', 46, 11),
(47, 'now', 'adsa', 'asdada', 'true', 43, 11),
(48, 'now', 'asdsada', 'asdadad', 'true', 46, 11),
(49, 'now', 'asda', 'asda', 'true', 46, 11),
(50, 'now', 'asdad', 'asdsada', 'true', 3, 11),
(51, 'now', 'Limpar casa', 'preciso de uma faxineira que possa limpar minha casa neste próximo sabado pois nao estarei com tempo suficiente, a casa possui dois andares', 'true', 1, 13);

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
  `address_complement` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `full_name`, `email`, `password`, `gender`, `phone_number`, `cpf`, `cnpj`, `birth_date`, `cep`, `address`, `uf`, `city`, `neighborhood`, `home_number`, `address_complement`) VALUES
(8, 'Marcos Silva', 'marcao@Live.com', 'Defina uma senha', 'M', '(11) 93425-4333', '272.882.290-50', NULL, '1970-01-01', '55190-536', 'Rua Paulo Lucena de Mendonça', 'PE', 'sp ', 'Malaquias Cardoso', '32', '(Lot S Jorge)'),
(9, 'Bruno Silva', 'brucandido@Live.com', 'Defina uma senha', 'M', '(11) 99453-2845', '824.271.950-06', NULL, '2002-13-01', '57084675', 'Rua C-23', 'AL', 'sp ', 'Benedito Bentes', '32', '(Cj Benedito Bentes)'),
(10, ' Marcelo Marques', 'marcelo@live.com', 'Defina uma senha', 'M', '(11) 95884-8424', '937.702.030-11', NULL, '2019-04-09', '44002-248', 'Rua Benjamin Constant', 'BA', 'sp ', 'Centro', '58', ''),
(11, 'Julia Silva', 'julia@live.com', 'Defina uma senha', 'M', '(11) 98969-5672', '263.910.620-13', NULL, '2019-10-09', '08246106', 'Rua Juçaral', 'SP', 'sp ', 'Parada XV de Novembro', '55', 'de 135/136 ao fim'),
(12, 'Breno Tavares Almeida', 'breno@live.com', 'Defina uma senha', 'M', '(11) 93233-4242', '617.295.140-81', NULL, '1990-10-10', '72862-112', 'Quadra 12', 'GO', 'sp ', 'Boa Vista', '21', ''),
(13, 'Marcelo Almendes Pereira Tavares Oliveira', 'marcelao@live.com', 'Defina uma senha', 'M', '(11) 99483-9434', '092.436.630-38', NULL, '1995-13-01', '29106-244', 'Rua Cristovão Colombo', 'ES', 'sp ', 'Soteco', '43', ''),
(14, 'Silvano', 'silvano@live.com', 'Defina uma senha', 'M', '(11) 98549-4864', '494.022.368-05', NULL, '1994-14-04', '65071-428', 'Avenida Ametista', 'MA', 'sp ', 'Jardim Coelho Neto', '21', ''),
(15, 'Julio', 'julio@live.com', 'Defina uma senha', 'M', '(11) 95987-8989', '49402236805', NULL, '1978-13-01', '08246106', 'Rua Juçaral', 'SP', 'sp ', 'Parada XV de Novembro', '45', 'de 135/136 ao fim'),
(16, 'Vanessa Ferraz', 'vanessa@live.com', 'Defina uma senha', 'M', '(11) 94934-2342', '49402236805', NULL, '1998-13-01', '08460430', 'Rua Domingos Pinheiro', 'SP', 'sp ', 'Vila São Geraldo', '2', ''),
(17, 'Alex', 'alex@live.com', 'Defina uma senha', 'M', '(11) 98956-4846', '640.540.680-65', NULL, '1967-09-11', '88505-326', 'Rua Plínio das Graças de Oliveira', 'SC', 'sp ', 'Petrópolis', '45', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_occupation`
--

CREATE TABLE `user_occupation` (
  `id` int(11) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `id_occupation` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_occupation`
--

INSERT INTO `user_occupation` (`id`, `description`, `id_occupation`, `id_user`) VALUES
(46, 'Trabalho há mais de 10 anos fazendo serviços informais', 1, 11),
(47, 'Trabalho há mais de 10 anos fazendo serviços informais', 2, 11),
(48, 'Trabalho há mais de 10 anos fazendo serviços informais', 5, 11),
(49, 'Trabalho há mais de 10 anos fazendo serviços informais', 7, 11),
(50, 'Trabalho há mais de 10 anos fazendo serviços informais', 9, 11),
(51, 'Trabalho há mais de 10 anos fazendo serviços informais', 10, 11),
(52, 'faço tudo', 1, 17),
(53, 'faço tudo', 2, 17),
(54, 'faço tudo', 3, 17),
(55, 'faço tudo', 4, 17),
(56, 'faço tudo', 5, 17),
(57, 'faço tudo', 6, 17),
(58, 'faço tudo', 7, 17),
(59, 'faço tudo', 8, 17),
(60, 'faço tudo', 9, 17),
(61, 'faço tudo', 10, 17),
(62, 'asda', 5, 15),
(63, 'asda', 6, 15);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_occupation_subcategory` (`id_occupation_subcategory`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_occupation`
--
ALTER TABLE `user_occupation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_occupation` (`id_occupation`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `occupation`
--
ALTER TABLE `occupation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `occupation_subcategory`
--
ALTER TABLE `occupation_subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_occupation`
--
ALTER TABLE `user_occupation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `occupation_subcategory`
--
ALTER TABLE `occupation_subcategory`
  ADD CONSTRAINT `occupation_subcategory_ibfk_1` FOREIGN KEY (`id_occupation`) REFERENCES `occupation` (`id`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`id_occupation_subcategory`) REFERENCES `occupation_subcategory` (`id`),
  ADD CONSTRAINT `service_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `user_occupation`
--
ALTER TABLE `user_occupation`
  ADD CONSTRAINT `user_occupation_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_occupation_ibfk_2` FOREIGN KEY (`id_occupation`) REFERENCES `occupation` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
