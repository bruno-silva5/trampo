-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 18-Nov-2019 às 02:34
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `trampo`
--

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
(36, 58, 59);

-- --------------------------------------------------------

--
-- Estrutura da tabela `evaluation`
--

CREATE TABLE `evaluation` (
  `id` int(11) NOT NULL,
  `answer_1` int(11) NOT NULL,
  `answer_2` int(11) NOT NULL,
  `answer_3` int(11) NOT NULL,
  `further_information` varchar(200) DEFAULT NULL,
  `stars_rating` int(11) NOT NULL,
  `id_user_from` int(11) NOT NULL,
  `id_user_to` int(11) NOT NULL,
  `id_service` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `evaluation`
--

INSERT INTO `evaluation` (`id`, `answer_1`, `answer_2`, `answer_3`, `further_information`, `stars_rating`, `id_user_from`, `id_user_to`, `id_service`) VALUES
(7, 2, 1, 1, 'Bruno é um bom rapaz', 4, 59, 58, 194),
(9, 2, 1, 3, '', 2, 58, 59, 194);

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
(255, 36, 58, 59, 'Bom dia blz? que horas a tarde você fazer o frete?'),
(256, 36, 58, 59, 'você consegue*'),
(257, 36, 59, 58, 'Bom dia, então, consigo fazer a qualquer horario a tarde, umas 16hras estaria bom?'),
(258, 36, 58, 59, 'Sim, está ótimo, vou aceitar a solicitação.');

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
(10, 'Serviços Automotivos');

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
  `id_user` int(11) DEFAULT NULL,
  `id_request_accepted` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `who_finished` int(11) DEFAULT NULL,
  `is_finished` tinyint(1) DEFAULT NULL,
  `issue_finished` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `service`
--

INSERT INTO `service` (`id`, `time_remaining`, `title`, `description`, `picture`, `is_visible`, `id_occupation_subcategory`, `id_user`, `id_request_accepted`, `status`, `who_finished`, `is_finished`, `issue_finished`) VALUES
(194, 'O quanto antes', 'Entrega de uma geladeira', 'Preciso que minha geladeira seja entregue lá na Penha', '../_img/service_picture/Geladeira-usada-20180118072250.jpg', 'false', 43, 58, 103, 2, NULL, 1, 0);

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
(103, 194, 59, '150.00', 'Consigo entregar amanhã, porém somente no período da tarde');

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
  `address` varchar(200) DEFAULT NULL,
  `uf` varchar(5) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `neighborhood` varchar(100) DEFAULT NULL,
  `home_number` varchar(10) DEFAULT NULL,
  `address_complement` varchar(100) DEFAULT NULL,
  `profile_picture` varchar(400) NOT NULL DEFAULT '../_img/user_profile_picture/user.svg',
  `lat` double DEFAULT NULL,
  `lon` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `full_name`, `email`, `password`, `gender`, `phone_number`, `cpf`, `birth_date`, `cep`, `address`, `uf`, `city`, `neighborhood`, `home_number`, `address_complement`, `profile_picture`, `lat`, `lon`) VALUES
(58, 'Bruno Silva', 'bruno@Live.com', 'Defina uma senha', 'M', '(11) 98120-9381', '742.532.310-98', '1993-01-13', '70673-304', 'SQSW 303 Bloco D', 'DF', 'Brasília', 'Setor Sudoeste', '33', '', '../_img/user_profile_picture/bruno.png', -15.7998967, -47.926236200000005),
(59, 'Felipe Pires', 'felipe@live.com', 'Defina uma senha', 'M', '(11) 90482-3094', '919.580.250-97', '1990-03-20', '69075-000', 'Avenida Buriti', 'AM', 'Manaus', 'Distrito Industrial I', '2', '', '../_img/user_profile_picture/felipe.png', -3.094542, -59.95207370000003);

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
(187, 'Faço carretos com minha hilux', 7, 59);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_1` (`id_user_1`),
  ADD KEY `id_user_2` (`id_user_2`);

--
-- Índices para tabela `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_service` (`id_service`),
  ADD KEY `id_user_from` (`id_user_from`),
  ADD KEY `id_user_to` (`id_user_to`);

--
-- Índices para tabela `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conversation` (`conversation`),
  ADD KEY `id_user_from` (`id_user_from`),
  ADD KEY `id_user_to` (`id_user_to`);

--
-- Índices para tabela `occupation`
--
ALTER TABLE `occupation`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `occupation_subcategory`
--
ALTER TABLE `occupation_subcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_occupation` (`id_occupation`);

--
-- Índices para tabela `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_occupation_subcategory` (`id_occupation_subcategory`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `hired_id_user` (`id_request_accepted`),
  ADD KEY `who_finished` (`who_finished`);

--
-- Índices para tabela `service_request`
--
ALTER TABLE `service_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_service` (`id_service`),
  ADD KEY `id_user` (`id_user`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `user_occupation`
--
ALTER TABLE `user_occupation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_occupation` (`id_occupation`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;

--
-- AUTO_INCREMENT de tabela `occupation`
--
ALTER TABLE `occupation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `occupation_subcategory`
--
ALTER TABLE `occupation_subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de tabela `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT de tabela `service_request`
--
ALTER TABLE `service_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de tabela `user_occupation`
--
ALTER TABLE `user_occupation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `conversation`
--
ALTER TABLE `conversation`
  ADD CONSTRAINT `conversation_ibfk_1` FOREIGN KEY (`id_user_1`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `conversation_ibfk_2` FOREIGN KEY (`id_user_2`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `evaluation_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`),
  ADD CONSTRAINT `evaluation_ibfk_2` FOREIGN KEY (`id_user_from`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `evaluation_ibfk_3` FOREIGN KEY (`id_user_to`) REFERENCES `user` (`id`);

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
  ADD CONSTRAINT `service_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `service_ibfk_3` FOREIGN KEY (`id_request_accepted`) REFERENCES `service_request` (`id`),
  ADD CONSTRAINT `service_ibfk_4` FOREIGN KEY (`who_finished`) REFERENCES `user` (`id`);

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
