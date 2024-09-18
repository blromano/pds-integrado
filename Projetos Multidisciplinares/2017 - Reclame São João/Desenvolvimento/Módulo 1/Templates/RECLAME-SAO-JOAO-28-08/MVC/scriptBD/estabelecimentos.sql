-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12-Jun-2017 às 04:56
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estabelecimentos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `consumidores`
--

CREATE TABLE `consumidores` (
  `CON_ID` int(11) NOT NULL,
  `NOT_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estabelecimentos`
--

CREATE TABLE `estabelecimentos` (
  `EST_ID` int(11) NOT NULL,
  `EST_CNPJ` varchar(14) NOT NULL,
  `EST_FOTO_PERFIL` varchar(300) NOT NULL,
  `EST_NOME_FANTASIA` varchar(100) NOT NULL,
  `EST_RUA` varchar(300) NOT NULL,
  `EST_BAIRRO` varchar(300) NOT NULL,
  `EST_NUMERO` int(10) NOT NULL,
  `EST_COMPLEMENTO` varchar(300) DEFAULT NULL,
  `EST_CEP` varchar(10) NOT NULL,
  `EST_NOME_RESPONSAVEL` varchar(100) NOT NULL,
  `EST_NOME_EMPRESA` varchar(300) NOT NULL,
  `EST_PUBLICO_ALVO` varchar(100) NOT NULL,
  `EST_VISAO_GERAL_EMPRESA` varchar(300) NOT NULL,
  `EST_SITE_EMPRESA` varchar(100) DEFAULT NULL,
  `EST_EMAIL` varchar(100) NOT NULL,
  `TIP_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estabelecimentos`
--

INSERT INTO `estabelecimentos` (`EST_ID`, `EST_CNPJ`, `EST_FOTO_PERFIL`, `EST_NOME_FANTASIA`, `EST_RUA`, `EST_BAIRRO`, `EST_NUMERO`, `EST_COMPLEMENTO`, `EST_CEP`, `EST_NOME_RESPONSAVEL`, `EST_NOME_EMPRESA`, `EST_PUBLICO_ALVO`, `EST_VISAO_GERAL_EMPRESA`, `EST_SITE_EMPRESA`, `EST_EMAIL`, `TIP_ID`) VALUES
(28, '13181318', 'Nike Fantasia', 'Nike Fantasia', '1', '', 0, NULL, '13890000', 'Rafael Alves Camillo', 'Nike', 'PÃºblico Geral', '0', 'nike.com', '1', NULL),
(32, '33041260/1223', 'Casas Bahia', 'Casas Bahia', ' Ademar de Barros', 'Centro', 588, 'NÃ£o tem', '13870-080', 'Rafael Alves Camillo', 'Casas Bahia Ltda', 'Sei la', 'Uma empresa melhor a cada dia', 'http://www.casasbahia.com.br/', 'sac@casasbahia.com.br', NULL),
(33, '11.111.111/111', 'Camillo', 'Camillo', ' Ademar de Barros', 'Centro', 588, 'NÃ£o tem', '13890-000', 'Rafael Alves Camillo', 'Rafael Alves Camillo', 'ddd', 'ddd', 'http://www.casasbahia.com.br/', 'thacamilo@hotmail.com', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacoes`
--

CREATE TABLE `notificacoes` (
  `NOT_ID` int(11) NOT NULL,
  `NOT_DATA_EVENTO` date DEFAULT NULL,
  `NOT_NOME` varchar(100) DEFAULT NULL,
  `NOT_TIPO_NOTIFICACAO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `PRO_ID` int(11) NOT NULL,
  `PRO_NOME_PRODUTO` varchar(100) DEFAULT NULL,
  `PRO_DESCRICAO_PRODUTO` varchar(300) NOT NULL,
  `IPO_ID` int(11) DEFAULT NULL,
  `EST_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`PRO_ID`, `PRO_NOME_PRODUTO`, `PRO_DESCRICAO_PRODUTO`, `IPO_ID`, `EST_ID`) VALUES
(9, 'Silvia', '45 anos', 3, NULL),
(10, 'Rafael Alves Camillo', '18 anos', 1, NULL),
(11, 'Rovilson Aparecido Sussai', '54 anos', 1, NULL),
(14, 'Thais Alves Camillo', '25 anos', 1, NULL),
(21, 'Pizza de Mussarela', 'Borda Recheada', 1, NULL),
(22, 'v', 'ff', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `recebem_notificacoes`
--

CREATE TABLE `recebem_notificacoes` (
  `REN_ID` int(11) NOT NULL,
  `EST_ID` int(11) DEFAULT NULL,
  `NOT_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `reclamacoes`
--

CREATE TABLE `reclamacoes` (
  `REC_ID` int(11) NOT NULL,
  `REC_NOME_CONSUMIDOR` varchar(100) DEFAULT NULL,
  `REC_TITULO` varchar(100) DEFAULT NULL,
  `REC_CONTEUDO` varchar(800) DEFAULT NULL,
  `REC_DATA` date DEFAULT NULL,
  `REC_HORA` time DEFAULT NULL,
  `CON_ID` int(11) DEFAULT NULL,
  `NOT_ID` int(11) DEFAULT NULL,
  `EST_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `reclamacoes_denunciadas`
--

CREATE TABLE `reclamacoes_denunciadas` (
  `DEN_ID` int(11) NOT NULL,
  `DEN_MOTIVO` int(11) DEFAULT NULL,
  `DEN_JUSTIFICATIVA` varchar(500) DEFAULT NULL,
  `DEN_STATUS_APROVADO` tinyint(1) DEFAULT NULL,
  `DEN_DATA` date DEFAULT NULL,
  `DEN_HORA` time DEFAULT NULL,
  `EST_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostas_reclamacoes`
--

CREATE TABLE `respostas_reclamacoes` (
  `POS_ID` int(11) NOT NULL,
  `POS_DATA` date DEFAULT NULL,
  `POS_CONTEUDO` varchar(800) DEFAULT NULL,
  `POS_AVALIACAO` float DEFAULT NULL,
  `POS_NOME_EMPRESA` varchar(100) DEFAULT NULL,
  `POS_STATUS_APROVADO` tinyint(1) DEFAULT NULL,
  `NOT_ID` int(11) DEFAULT NULL,
  `REC_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `reunioes_agendadas`
--

CREATE TABLE `reunioes_agendadas` (
  `REU_ID` int(11) NOT NULL,
  `REU_LOCAL` varchar(100) DEFAULT NULL,
  `REU_HORARIO_INICIO` time DEFAULT NULL,
  `REU_DATA` date DEFAULT NULL,
  `REU_HORARIO_TERMINO` time DEFAULT NULL,
  `REU_NOME_EVENTO` varchar(100) DEFAULT NULL,
  `REU_DESCRICAO` varchar(500) DEFAULT NULL,
  `NOT_ID` int(11) DEFAULT NULL,
  `EST_ID` int(11) DEFAULT NULL,
  `CON_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_produtos`
--

CREATE TABLE `tipos_produtos` (
  `IPO_ID` int(11) NOT NULL,
  `IPO_DESCRICAO` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipos_produtos`
--

INSERT INTO `tipos_produtos` (`IPO_ID`, `IPO_DESCRICAO`) VALUES
(1, 'Alimentício'),
(2, 'Cosmético'),
(3, 'Vestimento');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_estabelecimentos`
--

CREATE TABLE `tipo_estabelecimentos` (
  `TIP_ID` int(11) NOT NULL,
  `TIP_NOME` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_estabelecimentos`
--

INSERT INTO `tipo_estabelecimentos` (`TIP_ID`, `TIP_NOME`) VALUES
(1, 'Primeiro'),
(2, 'Primeiro');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consumidores`
--
ALTER TABLE `consumidores`
  ADD PRIMARY KEY (`CON_ID`),
  ADD KEY `NOT_ID` (`NOT_ID`);

--
-- Indexes for table `estabelecimentos`
--
ALTER TABLE `estabelecimentos`
  ADD PRIMARY KEY (`EST_ID`),
  ADD UNIQUE KEY `EST_CNPJ` (`EST_CNPJ`),
  ADD KEY `TIP_ID` (`TIP_ID`);

--
-- Indexes for table `notificacoes`
--
ALTER TABLE `notificacoes`
  ADD PRIMARY KEY (`NOT_ID`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`PRO_ID`),
  ADD KEY `EST_ID` (`EST_ID`),
  ADD KEY `IPO_ID` (`IPO_ID`);

--
-- Indexes for table `recebem_notificacoes`
--
ALTER TABLE `recebem_notificacoes`
  ADD PRIMARY KEY (`REN_ID`),
  ADD KEY `EST_ID` (`EST_ID`),
  ADD KEY `NOT_ID` (`NOT_ID`);

--
-- Indexes for table `reclamacoes`
--
ALTER TABLE `reclamacoes`
  ADD PRIMARY KEY (`REC_ID`),
  ADD KEY `NOT_ID` (`NOT_ID`),
  ADD KEY `EST_ID` (`EST_ID`),
  ADD KEY `CON_ID` (`CON_ID`);

--
-- Indexes for table `reclamacoes_denunciadas`
--
ALTER TABLE `reclamacoes_denunciadas`
  ADD PRIMARY KEY (`DEN_ID`),
  ADD KEY `EST_ID` (`EST_ID`);

--
-- Indexes for table `respostas_reclamacoes`
--
ALTER TABLE `respostas_reclamacoes`
  ADD PRIMARY KEY (`POS_ID`),
  ADD KEY `NOT_ID` (`NOT_ID`),
  ADD KEY `REC_ID` (`REC_ID`);

--
-- Indexes for table `reunioes_agendadas`
--
ALTER TABLE `reunioes_agendadas`
  ADD PRIMARY KEY (`REU_ID`),
  ADD KEY `NOT_ID` (`NOT_ID`),
  ADD KEY `EST_ID` (`EST_ID`),
  ADD KEY `CON_ID` (`CON_ID`);

--
-- Indexes for table `tipos_produtos`
--
ALTER TABLE `tipos_produtos`
  ADD PRIMARY KEY (`IPO_ID`);

--
-- Indexes for table `tipo_estabelecimentos`
--
ALTER TABLE `tipo_estabelecimentos`
  ADD PRIMARY KEY (`TIP_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consumidores`
--
ALTER TABLE `consumidores`
  MODIFY `CON_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `estabelecimentos`
--
ALTER TABLE `estabelecimentos`
  MODIFY `EST_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `notificacoes`
--
ALTER TABLE `notificacoes`
  MODIFY `NOT_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `PRO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `recebem_notificacoes`
--
ALTER TABLE `recebem_notificacoes`
  MODIFY `REN_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reclamacoes`
--
ALTER TABLE `reclamacoes`
  MODIFY `REC_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reclamacoes_denunciadas`
--
ALTER TABLE `reclamacoes_denunciadas`
  MODIFY `DEN_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `respostas_reclamacoes`
--
ALTER TABLE `respostas_reclamacoes`
  MODIFY `POS_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reunioes_agendadas`
--
ALTER TABLE `reunioes_agendadas`
  MODIFY `REU_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tipos_produtos`
--
ALTER TABLE `tipos_produtos`
  MODIFY `IPO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tipo_estabelecimentos`
--
ALTER TABLE `tipo_estabelecimentos`
  MODIFY `TIP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `consumidores`
--
ALTER TABLE `consumidores`
  ADD CONSTRAINT `consumidores_ibfk_1` FOREIGN KEY (`NOT_ID`) REFERENCES `notificacoes` (`NOT_ID`);

--
-- Limitadores para a tabela `estabelecimentos`
--
ALTER TABLE `estabelecimentos`
  ADD CONSTRAINT `estabelecimentos_ibfk_1` FOREIGN KEY (`TIP_ID`) REFERENCES `tipo_estabelecimentos` (`TIP_ID`);

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`EST_ID`) REFERENCES `estabelecimentos` (`EST_ID`),
  ADD CONSTRAINT `produtos_ibfk_2` FOREIGN KEY (`IPO_ID`) REFERENCES `tipos_produtos` (`IPO_ID`);

--
-- Limitadores para a tabela `recebem_notificacoes`
--
ALTER TABLE `recebem_notificacoes`
  ADD CONSTRAINT `recebem_notificacoes_ibfk_1` FOREIGN KEY (`EST_ID`) REFERENCES `estabelecimentos` (`EST_ID`),
  ADD CONSTRAINT `recebem_notificacoes_ibfk_2` FOREIGN KEY (`NOT_ID`) REFERENCES `notificacoes` (`NOT_ID`);

--
-- Limitadores para a tabela `reclamacoes`
--
ALTER TABLE `reclamacoes`
  ADD CONSTRAINT `reclamacoes_ibfk_1` FOREIGN KEY (`NOT_ID`) REFERENCES `notificacoes` (`NOT_ID`),
  ADD CONSTRAINT `reclamacoes_ibfk_2` FOREIGN KEY (`EST_ID`) REFERENCES `estabelecimentos` (`EST_ID`),
  ADD CONSTRAINT `reclamacoes_ibfk_3` FOREIGN KEY (`CON_ID`) REFERENCES `consumidores` (`CON_ID`);

--
-- Limitadores para a tabela `reclamacoes_denunciadas`
--
ALTER TABLE `reclamacoes_denunciadas`
  ADD CONSTRAINT `reclamacoes_denunciadas_ibfk_1` FOREIGN KEY (`EST_ID`) REFERENCES `estabelecimentos` (`EST_ID`);

--
-- Limitadores para a tabela `respostas_reclamacoes`
--
ALTER TABLE `respostas_reclamacoes`
  ADD CONSTRAINT `respostas_reclamacoes_ibfk_1` FOREIGN KEY (`NOT_ID`) REFERENCES `notificacoes` (`NOT_ID`),
  ADD CONSTRAINT `respostas_reclamacoes_ibfk_2` FOREIGN KEY (`REC_ID`) REFERENCES `reclamacoes` (`REC_ID`);

--
-- Limitadores para a tabela `reunioes_agendadas`
--
ALTER TABLE `reunioes_agendadas`
  ADD CONSTRAINT `reunioes_agendadas_ibfk_1` FOREIGN KEY (`NOT_ID`) REFERENCES `notificacoes` (`NOT_ID`),
  ADD CONSTRAINT `reunioes_agendadas_ibfk_2` FOREIGN KEY (`EST_ID`) REFERENCES `estabelecimentos` (`EST_ID`),
  ADD CONSTRAINT `reunioes_agendadas_ibfk_3` FOREIGN KEY (`CON_ID`) REFERENCES `consumidores` (`CON_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
