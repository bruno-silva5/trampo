-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Out-2019 às 19:37
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.6

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
-- Estrutura da tabela `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `id_user_from` int(11) NOT NULL,
  `id_user_to` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `chat`
--

INSERT INTO `chat` (`id`, `id_user_from`, `id_user_to`, `message`) VALUES
(15, 17, 11, 'adad'),
(16, 9, 11, 'bom dia'),
(17, 11, 10, 'a'),
(18, 17, 11, 'asdasdadas'),
(20, 10, 11, 'mmmmmmm'),
(21, 10, 11, 'aaaa');

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
(1, 11, 10),
(2, 11, 9),
(3, 17, 12),
(4, 18, 9);

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
(144, 1, 11, 10, 'Oi, boa tarde, tudo bem?'),
(145, 1, 11, 10, 'Estou precisando de um encanador, de preferência que esteja disponível nesta quarta-feira'),
(146, 1, 10, 11, 'Opa, oi, boa tarde'),
(147, 1, 10, 11, 'sim, estou disponível esta quarta feira sim, que horário?'),
(148, 1, 10, 11, 'Então, na verdade, estive pensando bem e acho que não poderei comparecer na quarta-feira para realizar o seu serviço...'),
(149, 1, 10, 11, 'Mas logo na quinta feira ja estarei disponível'),
(150, 1, 11, 10, 'pode ser então'),
(151, 1, 11, 10, 'fechou, fica combinado assim'),
(152, 1, 11, 10, 'valeu!'),
(153, 1, 10, 11, 'eu q agradeço, uma boa noite!'),
(154, 1, 11, 10, 'salve galera'),
(155, 1, 11, 10, 'suave'),
(156, 1, 11, 10, 'ok'),
(157, 1, 10, 11, 'asdajbd '),
(158, 1, 11, 10, 'salve'),
(159, 1, 10, 11, 'canalha'),
(160, 1, 10, 11, 'oiii'),
(161, 1, 10, 11, 'oiiiiiiii'),
(162, 1, 10, 11, 'manda o zap'),
(163, 1, 11, 10, 'ok'),
(164, 1, 11, 10, 'kkkk'),
(165, 1, 11, 10, 'nao neh'),
(166, 1, 10, 11, 'kkkkkkkkkk'),
(167, 1, 11, 10, '= zap'),
(168, 1, 10, 11, 'mmm'),
(169, 1, 10, 11, ' '),
(170, 1, 10, 11, ' '),
(171, 1, 10, 11, '] '),
(172, 1, 10, 11, '   '),
(173, 1, 10, 11, '          '),
(174, 1, 10, 11, 'bianca deixa eu beijar sua boca'),
(175, 1, 10, 11, 'hein?'),
(176, 1, 11, 10, 'deixo sim brunao'),
(177, 1, 11, 10, 'me quebra no meio'),
(178, 1, 11, 10, 'daquele jeito'),
(179, 1, 11, 10, 'kkkkkkkk'),
(180, 4, 18, 9, 'Oiii rs'),
(181, 4, 9, 18, 'oi'),
(182, 4, 18, 9, 'vc eh mt gato');

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
  `is_visible` varchar(20) DEFAULT NULL,
  `id_occupation_subcategory` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `service`
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
(51, 'now', 'Limpar casa', 'preciso de uma faxineira que possa limpar minha casa neste próximo sabado pois nao estarei com tempo suficiente, a casa possui dois andares', 'true', 1, 13),
(52, 'next_week', 'Fazer brigadeiro', 'Gostaria de contratar alguém que possa fazer brigadeiro na festa da minha filha', 'true', 46, 11),
(53, 'now', 'Pia quebrada', 'quebrouuu', 'true', 24, 11),
(54, 'two_weeks', 'Iiiii', 'Hh', 'true', 43, 11);

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
  `cnpj` varchar(20) DEFAULT NULL,
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

INSERT INTO `user` (`id`, `full_name`, `email`, `password`, `gender`, `phone_number`, `cpf`, `cnpj`, `birth_date`, `cep`, `address`, `uf`, `city`, `neighborhood`, `home_number`, `address_complement`, `profile_picture`) VALUES
(8, 'Marcos Silva', 'marcao@Live.com', 'Defina uma senha', 'M', '(11) 93425-4333', '272.882.290-50', NULL, '1970-01-01', '55190-536', 'Rua Paulo Lucena de Mendonça', 'PE', 'sp ', 'Malaquias Cardoso', '32', '(Lot S Jorge)', ''),
(9, 'Bruno Silva', 'brucandido@Live.com', 'Defina uma senha', 'M', '(11) 99453-2845', '824.271.950-06', NULL, '2002-13-01', '57084675', 'Rua C-23', 'AL', 'sp ', 'Benedito Bentes', '32', '(Cj Benedito Bentes)', ''),
(10, ' Marcelo Marques', 'marcelo@live.com', 'Defina uma senha', 'M', '(11) 95884-8424', '937.702.030-11', NULL, '2019-04-09', '44002-248', 'Rua Benjamin Constant', 'BA', 'sp ', 'Centro', '58', '', ''),
(11, 'Julia Silva', 'julia@live.com', 'Defina uma senha', 'M', '(11) 98969-5672', '263.910.620-13', NULL, '1990-01-13', '08246106', 'Rua Juçaral', 'SP', 'sp ', 'Parada XV de Novembro', '55', 'de 135/136 ao fim', '../_img/user_profile_picture/_diahann_carroll-photofest-h_2019_.jpg'),
(12, 'Breno Tavares Almeida', 'breno@live.com', 'Defina uma senha', 'M', '(11) 93233-4242', '617.295.140-81', NULL, '1990-10-10', '72862-112', 'Quadra 12', 'GO', 'sp ', 'Boa Vista', '21', '', ''),
(13, 'Marcelo Almendes Pereira Tavares Oliveira', 'marcelao@live.com', 'Defina uma senha', 'M', '(11) 99483-9434', '092.436.630-38', NULL, '1995-13-01', '29106-244', 'Rua Cristovão Colombo', 'ES', 'sp ', 'Soteco', '43', '', ''),
(14, 'Silvano', 'silvano@live.com', 'Defina uma senha', 'M', '(11) 98549-4864', '494.022.368-05', NULL, '1994-14-04', '65071-428', 'Avenida Ametista', 'MA', 'sp ', 'Jardim Coelho Neto', '21', '', ''),
(15, 'Julio', 'julio@live.com', 'Defina uma senha', 'M', '(11) 95987-8989', '49402236805', NULL, '1978-13-01', '08246106', 'Rua Juçaral', 'SP', 'sp ', 'Parada XV de Novembro', '45', 'de 135/136 ao fim', ''),
(16, 'Vanessa Ferraz', 'vanessa@live.com', 'Defina uma senha', 'M', '(11) 94934-2342', '49402236805', NULL, '1998-13-01', '08460430', 'Rua Domingos Pinheiro', 'SP', 'sp ', 'Vila São Geraldo', '2', '', ''),
(17, 'Alex', 'alex@live.com', 'Defina uma senha', 'M', '(11) 98956-4846', '640.540.680-65', NULL, '1967-09-11', '88505-326', 'Rua Plínio das Graças de Oliveira', 'SC', 'sp ', 'Petrópolis', '45', '', ''),
(18, 'Bianca Nunes', 'bianca@live.com', 'Defina uma senha', 'F', '(11) 98918-9132', '761.651.000-07', NULL, '1990-10-01', '08460-430', 'Rua Domingos Pinheiro', 'SP', 'sp ', 'Vila São Geraldo', '2', '', ''),
(19, 'Letícia', 'leticia@live.com', '12345678', 'F', '(11) 93847-4747', '494.022.368-05', NULL, '1998-15-12', '08246106', 'Rua Juçaral', 'SP', 'sp ', 'Parada XV de Novembro', '3', 'de 135/136 ao fim', ''),
(20, 'Marcela Da Silva Pereira', 'marcela@live.com', 'Defina uma senha', 'F', '(11) 97123-7983', '302.591.850-00', NULL, '1997-05-08', '88036-670', 'Servidão Timóteo Borges', 'SC', 'sp ', 'Trindade', '32', '', '../_img/user_profile_picture/1 7fSw38XBRd2qRU_sRtHV3g.jpeg'),
(21, 'Paulo Almeida', 'paulo@live.com', 'Defina uma senha', 'M', '(11) 98749-6764', '590.615.850-23', NULL, '1995-10-11', '41213-570', 'Rua Fabrício Cavalcante', 'BA', 'sp ', 'Sussuarana', '45', '', '../_img/user_profile_picture/bruno.png'),
(22, 'Bruce Lee', 'bruce@live.com', 'Defina uma senha', 'M', '(11) 97123-7983', '302.591.850-00', NULL, '1990-13-01', '08246-106', 'Rua Juçaral', 'SP', 'sp ', 'Parada XV de Novembro', '2', 'de 135/136 ao fim', '../_img/user_profile_picture/user.svg'),
(23, 'Jonas', 'jonas@live.com', 'Defina uma senha', 'M', '(11) 97123-7983', '49402236805', NULL, '1990-01-13', '08451030', 'Rua Tingoassuíba', 'SP', 'sp ', 'Vila Iolanda(Lajeado)', '2', '', '../_img/user_profile_picture/user.svg');

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
(52, 'testando', 2, 17),
(53, 'testando', 2, 17),
(62, 'asda', 5, 15),
(63, 'asda', 6, 15),
(64, 'Trabalho há dez anos na area', 5, 20),
(65, 'trabalho ha mais de 10 anos', 4, 21),
(66, 'trabalho ha mais de 10 anos', 5, 21),
(125, '0012', 1, 11),
(126, '0012', 2, 11),
(127, '0012', 3, 11);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_from` (`id_user_from`),
  ADD KEY `id_user_to` (`id_user_to`);

--
-- Índices para tabela `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_1` (`id_user_1`),
  ADD KEY `id_user_2` (`id_user_2`);

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
-- AUTO_INCREMENT de tabela `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `user_occupation`
--
ALTER TABLE `user_occupation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`id_user_from`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`id_user_to`) REFERENCES `user` (`id`);

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
-- Limitadores para a tabela `user_occupation`
--
ALTER TABLE `user_occupation`
  ADD CONSTRAINT `user_occupation_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_occupation_ibfk_2` FOREIGN KEY (`id_occupation`) REFERENCES `occupation` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
