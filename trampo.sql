-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Out-2019 às 22:51
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.0

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
-- Estrutura da tabela `complaint`
--

CREATE TABLE `complaint` (
  `id` int(11) NOT NULL,
  `complainant_id` int(11) NOT NULL,
  `accused_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `title` varchar(50) NOT NULL,
  `text` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `conversation`
--

CREATE TABLE `conversation` (
  `id` int(11) NOT NULL,
  `id_user_1` int(11) NOT NULL,
  `id_user_2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `conversation`
--

INSERT INTO `conversation` (`id`, `id_user_1`, `id_user_2`) VALUES
(25, 30, 31),
(26, 31, 36);

-- --------------------------------------------------------

--
-- Estrutura da tabela `grade`
--

CREATE TABLE `grade` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `grade` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `conversation` int(11) NOT NULL,
  `id_user_from` int(11) NOT NULL,
  `id_user_to` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `message`
--

INSERT INTO `message` (`id`, `conversation`, `id_user_from`, `id_user_to`, `text`) VALUES
(226, 25, 30, 31, 'oi, tudo bem, gostaria de saber se você pd fazer o bolo'),
(227, 25, 31, 30, 'oiii!'),
(228, 25, 31, 30, 'sim, posso sim'),
(229, 26, 31, 36, 'oi me ajude por favor'),
(230, 26, 36, 31, 'ola ajudo sim');

-- --------------------------------------------------------

--
-- Estrutura da tabela `occupation`
--

CREATE TABLE `occupation` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `occupation`
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
(10, 'Serviços Automotivos'),
(11, 'a'),
(12, ''),
(13, 'b');

-- --------------------------------------------------------

--
-- Estrutura da tabela `occupation_subcategory`
--

CREATE TABLE `occupation_subcategory` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `id_occupation` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `occupation_subcategory`
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
-- Estrutura da tabela `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `time_remaining` varchar(200) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `picture` varchar(500) DEFAULT NULL,
  `is_visible` varchar(20) DEFAULT NULL,
  `id_occupation_subcategory` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `service`
--

INSERT INTO `service` (`id`, `time_remaining`, `title`, `description`, `picture`, `is_visible`, `id_occupation_subcategory`, `id_user`) VALUES
(103, 'now', 'Entregar um animal', 'preciso que entregue o meu animal de estimação, é um cachorro e possui 3kg, porte médio', '../_img/service_picture/filhotes-de-cachorro-alcanc3a7am-o-c3a1pice-de-fofura-com-8-semanas1.png', 'false', 43, 30),
(104, 'next_week', 'Bolo de aniversário ', 'Gostaria de fazer um bolo de aniversário para a festa do meu filho na semana que vem', NULL, 'false', 46, 30),
(105, 'now', 'Pia com vazamento', 'Minha pia possui um vazamento', NULL, 'true', 24, 31);

-- --------------------------------------------------------

--
-- Estrutura da tabela `service_request`
--

CREATE TABLE `service_request` (
  `id` int(11) NOT NULL,
  `id_service` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `price` decimal(14,2) NOT NULL,
  `description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `service_request`
--

INSERT INTO `service_request` (`id`, `id_service`, `id_user`, `price`, `description`) VALUES
(71, 105, 30, '250.50', 'trampo bem'),
(72, 105, 30, '15.00', 'faço mais barato ta bom?'),
(73, 105, 30, '10.00', 'faço mais barato ainda'),
(74, 105, 36, '200.00', 'conserto rapidao mando po pai');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `full_name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `birth_date` varchar(20) DEFAULT NULL,
  `cep` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `uf` varchar(5) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `neighborhood` varchar(100) DEFAULT NULL,
  `home_number` varchar(10) DEFAULT NULL,
  `address_complement` varchar(100) DEFAULT NULL,
  `profile_picture` varchar(400) NOT NULL DEFAULT '../_img/user_profile_picture/user.svg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `full_name`, `email`, `password`, `gender`, `phone_number`, `cpf`, `birth_date`, `cep`, `address`, `uf`, `city`, `neighborhood`, `home_number`, `address_complement`, `profile_picture`) VALUES
(30, 'Bruno Silva', 'bruno@live.com', 'Defina uma senha', 'M', '(11) 98969-5672', '494.022.368-05', '1995-01-13', '08246106', 'Rua Juçaral', 'SP', 'sp ', 'Parada XV de Novembro', '45', 'de 135/136 ao fim', '../_img/user_profile_picture/user.svg'),
(31, 'Marcela Tavares', 'marcela@live.com', 'Defina uma senha', 'F', '(11) 97987-9879', '491.024.080-23', '1998-01-13', '08246106', 'Rua Juçaral', 'SP', 'sp ', 'Parada XV de Novembro', '4', 'de 135/136 ao fim', '../_img/user_profile_picture/xmarcela-temer2.jpg.pagespeed.ic.zF7HsPE9tu.jpg'),
(33, 'sfgsgs', 'julia@live.com', 'Defina uma senha', 'M', '(11) 97123-7983', '503.850.338-18', '1333-12-13', '08246-106', 'Rua Juçaral', 'SP', 'sp ', 'Parada XV de Novembro', '2', 'de 135/136 ao fim', '../_img/user_profile_picture/user.svg'),
(35, 'Contratante Teste', 'julio@live.com', 'Defina uma senha', 'M', '(11) 21413-4242', '882.422.920-43', '1998-09-16', '29120-050', 'Rua Luiz Americano', 'ES', 'sp ', 'Aribiri', '45', '', '../_img/user_profile_picture/user.svg'),
(36, 'Paulo Almeida Alencar', 'paulo@live.com', 'Defina uma senha', 'M', '(11) 98987-8986', '882.422.920-43', '1998-12-20', '71725-100', 'QR 1', 'DF', 'sp ', 'Candangolândia', '5', '', '../_img/user_profile_picture/user.svg'),
(37, 'Mariana Almeida', 'mariana@live.com', 'Defina uma senha', 'F', '(11) 98798-4764', '882.422.920-43', '1999-04-20', '08246-106', 'Rua Juçaral', 'SP', 'sp ', 'Parada XV de Novembro', '5', 'de 135/136 ao fim', '../_img/user_profile_picture/user.svg'),
(38, 'Poliana Almeida Tavares Cabral', 'almeida@live.com', 'Defina uma senha', 'F', '(11) 98748-9498', '086.675.870-44', '1991-09-18', '68903-627', 'Travessa SétimaConj. Habitacional da Embrapa', 'AP', 'sp ', 'Universidade', '2', '', '../_img/user_profile_picture/user.svg'),
(39, 'Roberty Santos', 'ricardo@live.com', '12345678', 'M', '(11) 98749-6764', '518.037.678-55', '1990-09-04', '64039-530', 'Quadra F5', 'PI', 'sp ', 'Esplanada', '2', '(Cj P Alegre)', '../_img/user_profile_picture/user.svg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_occupation`
--

CREATE TABLE `user_occupation` (
  `id` int(11) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `id_occupation` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user_occupation`
--

INSERT INTO `user_occupation` (`id`, `description`, `id_occupation`, `id_user`) VALUES
(143, 'Já trabalhei nos correios, hoje eu trabalho fazendo fretes por conta própria com o meu caminhão próprio', 7, 31),
(144, 'monto imoveis ', 6, 30),
(145, 'aaaaaaaa', 4, 36),
(146, 'aaaaaaaa', 7, 36);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_1` (`id_user_1`),
  ADD KEY `id_user_2` (`id_user_2`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conversation` (`conversation`),
  ADD KEY `id_user_from` (`id_user_from`),
  ADD KEY `id_user_to` (`id_user_to`);

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
-- Indexes for table `service_request`
--
ALTER TABLE `service_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_service` (`id_service`),
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
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT for table `occupation`
--
ALTER TABLE `occupation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `occupation_subcategory`
--
ALTER TABLE `occupation_subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `service_request`
--
ALTER TABLE `service_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user_occupation`
--
ALTER TABLE `user_occupation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `conversation`
--
ALTER TABLE `conversation`
  ADD CONSTRAINT `conversation_ibfk_1` FOREIGN KEY (`id_user_1`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `conversation_ibfk_2` FOREIGN KEY (`id_user_2`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`conversation`) REFERENCES `conversation` (`id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`id_user_from`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `message_ibfk_3` FOREIGN KEY (`id_user_to`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `occupation_subcategory`
--
ALTER TABLE `occupation_subcategory`
  ADD CONSTRAINT `occupation_subcategory_ibfk_1` FOREIGN KEY (`id_occupation`) REFERENCES `occupation` (`id`);

--
-- Limitadores para a tabela `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`id_occupation_subcategory`) REFERENCES `occupation_subcategory` (`id`),
  ADD CONSTRAINT `service_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `service_request`
--
ALTER TABLE `service_request`
  ADD CONSTRAINT `service_request_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`),
  ADD CONSTRAINT `service_request_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `user_occupation`
--
ALTER TABLE `user_occupation`
  ADD CONSTRAINT `user_occupation_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_occupation_ibfk_2` FOREIGN KEY (`id_occupation`) REFERENCES `occupation` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
