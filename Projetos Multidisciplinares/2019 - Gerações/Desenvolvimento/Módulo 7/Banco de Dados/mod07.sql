-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14-Jun-2019 às 21:48
-- Versão do servidor: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mod07`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividades_dos_treinamentos_fisicos`
--

CREATE TABLE `atividades_dos_treinamentos_fisicos` (
  `FK_ATIVIDADES_FISICAS_AFI_ID` int(11) DEFAULT NULL,
  `FK_TREINAMENTOS_FISICOS_DIARIO_TFD_ID` int(11) DEFAULT NULL,
  `ATF_ID` int(11) NOT NULL,
  `ATF_PESO` float DEFAULT NULL,
  `ATF_REPETICOES` int(11) DEFAULT NULL,
  `ATF_TEMPO_INTERVALO` int(11) DEFAULT NULL,
  `ATF_OBSERVACOES` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividades_fisicas`
--

CREATE TABLE `atividades_fisicas` (
  `AFI_ID` int(11) NOT NULL,
  `AFI_NOME` varchar(100) DEFAULT NULL,
  `FK_TIPOS_ATIVIDADES_FISICAS_TAF_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividades_recreativas`
--

CREATE TABLE `atividades_recreativas` (
  `ATR_ID` int(11) NOT NULL,
  `ATR_NOME` varchar(100) DEFAULT NULL,
  `FK_TIPO_ATIVIDADES_RECREATIVAS_TAR_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividades_recreativas_planejamento`
--

CREATE TABLE `atividades_recreativas_planejamento` (
  `ARP_DATA_HORA` datetime DEFAULT NULL,
  `ARP_FOTO` blob,
  `FK_PLANEJAMENTOS_MENSAIS_ATV_RECREATIVAS_PMR_ID` int(11) DEFAULT NULL,
  `FK_ATIVIDADES_RECREATIVAS_ATR_ID` int(11) DEFAULT NULL,
  `ARP_ID` int(11) NOT NULL,
  `ARP_LOCAL` varchar(100) DEFAULT NULL,
  `ARP_DURACAO` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `consultas_esportivas`
--

CREATE TABLE `consultas_esportivas` (
  `CES_IMC_IDOSO` float DEFAULT NULL,
  `CES_ANOTACOES` varchar(100) DEFAULT NULL,
  `CES_PRESCRICOES` varchar(100) DEFAULT NULL,
  `CES_ID` int(11) NOT NULL,
  `CES_DATA_HORA` datetime DEFAULT NULL,
  `CES_LOCAL` varchar(100) DEFAULT NULL,
  `FK_IDOSO_IDS_ID` int(11) DEFAULT NULL,
  `FK_USUARIOS_USU_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `idoso`
--

CREATE TABLE `idoso` (
  `IDS_NOME` varchar(100) DEFAULT NULL,
  `IDS_DATA_NASC` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `IDS_GENERO` varchar(15) DEFAULT NULL,
  `IDS_ID` int(11) NOT NULL,
  `IDS_CPF` varchar(15) DEFAULT NULL,
  `IDS_PESO` float DEFAULT NULL,
  `IDS_ALTURA` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `participacao_idosos_atv_recreativas`
--

CREATE TABLE `participacao_idosos_atv_recreativas` (
  `FK_IDOSO_IDS_ID` int(11) DEFAULT NULL,
  `PIR_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `planejamentos_mensais_atv_recreativas`
--

CREATE TABLE `planejamentos_mensais_atv_recreativas` (
  `PMR_ID` int(11) NOT NULL,
  `PMR_MES` varchar(50) DEFAULT NULL,
  `PMR_ANO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_atividades_fisicas`
--

CREATE TABLE `tipos_atividades_fisicas` (
  `TAF_ID` int(11) NOT NULL,
  `TAF_NOME` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_atividades_recreativas`
--

CREATE TABLE `tipo_atividades_recreativas` (
  `TAR_ID` int(11) NOT NULL,
  `TAR_NOME` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `treinamentos_fisicos_diario`
--

CREATE TABLE `treinamentos_fisicos_diario` (
  `TFD_ID` int(11) NOT NULL,
  `TFD_DATA_INICIO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `TFD_FOCO` varchar(100) DEFAULT NULL,
  `TFD_DATA_TERMINO` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `TFD_DIA_DA_SEMANA` varchar(100) DEFAULT NULL,
  `FK_IDOSO_IDS_ID` int(11) DEFAULT NULL,
  `FK_USUARIOS_USU_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `USU_DATA_NASC` date DEFAULT NULL,
  `USU_ID` int(11) NOT NULL,
  `USU_NOME` varchar(100) DEFAULT NULL,
  `USU_GENERO` varchar(15) DEFAULT NULL,
  `USU_CPF` varchar(15) DEFAULT NULL,
  `USU_ESPECIALIDADE` varchar(100) DEFAULT NULL,
  `USU_REGISTRO_PROFISSIONAL` varchar(100) DEFAULT NULL,
  `USUARIOS_TIPO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usu_pm`
--

CREATE TABLE `usu_pm` (
  `FK_USUARIOS_USU_ID` int(11) DEFAULT NULL,
  `FK_PLANEJAMENTOS_MENSAIS_ATV_RECREATIVAS_PMR_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atividades_dos_treinamentos_fisicos`
--
ALTER TABLE `atividades_dos_treinamentos_fisicos`
  ADD PRIMARY KEY (`ATF_ID`),
  ADD KEY `FK_ATIVIDADES_DOS_TREINAMENTOS_FISICOS_2` (`FK_ATIVIDADES_FISICAS_AFI_ID`),
  ADD KEY `FK_ATIVIDADES_DOS_TREINAMENTOS_FISICOS_3` (`FK_TREINAMENTOS_FISICOS_DIARIO_TFD_ID`);

--
-- Indexes for table `atividades_fisicas`
--
ALTER TABLE `atividades_fisicas`
  ADD PRIMARY KEY (`AFI_ID`),
  ADD KEY `FK_ATIVIDADES_FISICAS_2` (`FK_TIPOS_ATIVIDADES_FISICAS_TAF_ID`);

--
-- Indexes for table `atividades_recreativas`
--
ALTER TABLE `atividades_recreativas`
  ADD PRIMARY KEY (`ATR_ID`),
  ADD KEY `FK_ATIVIDADES_RECREATIVAS_2` (`FK_TIPO_ATIVIDADES_RECREATIVAS_TAR_ID`);

--
-- Indexes for table `atividades_recreativas_planejamento`
--
ALTER TABLE `atividades_recreativas_planejamento`
  ADD PRIMARY KEY (`ARP_ID`),
  ADD KEY `FK_ATIVIDADES_RECREATIVAS_PLANEJAMENTO_2` (`FK_PLANEJAMENTOS_MENSAIS_ATV_RECREATIVAS_PMR_ID`),
  ADD KEY `FK_ATIVIDADES_RECREATIVAS_PLANEJAMENTO_3` (`FK_ATIVIDADES_RECREATIVAS_ATR_ID`);

--
-- Indexes for table `consultas_esportivas`
--
ALTER TABLE `consultas_esportivas`
  ADD PRIMARY KEY (`CES_ID`),
  ADD KEY `FK_CONSULTAS_ESPORTIVAS_2` (`FK_IDOSO_IDS_ID`),
  ADD KEY `FK_CONSULTAS_ESPORTIVAS_3` (`FK_USUARIOS_USU_ID`);

--
-- Indexes for table `idoso`
--
ALTER TABLE `idoso`
  ADD PRIMARY KEY (`IDS_ID`);

--
-- Indexes for table `participacao_idosos_atv_recreativas`
--
ALTER TABLE `participacao_idosos_atv_recreativas`
  ADD PRIMARY KEY (`PIR_ID`),
  ADD KEY `FK_PARTICIPACAO_IDOSOS_ATV_RECREATIVAS_2` (`FK_IDOSO_IDS_ID`);

--
-- Indexes for table `planejamentos_mensais_atv_recreativas`
--
ALTER TABLE `planejamentos_mensais_atv_recreativas`
  ADD PRIMARY KEY (`PMR_ID`);

--
-- Indexes for table `tipos_atividades_fisicas`
--
ALTER TABLE `tipos_atividades_fisicas`
  ADD PRIMARY KEY (`TAF_ID`);

--
-- Indexes for table `tipo_atividades_recreativas`
--
ALTER TABLE `tipo_atividades_recreativas`
  ADD PRIMARY KEY (`TAR_ID`);

--
-- Indexes for table `treinamentos_fisicos_diario`
--
ALTER TABLE `treinamentos_fisicos_diario`
  ADD PRIMARY KEY (`TFD_ID`),
  ADD KEY `FK_TREINAMENTOS_FISICOS_DIARIO_2` (`FK_IDOSO_IDS_ID`),
  ADD KEY `FK_TREINAMENTOS_FISICOS_DIARIO_3` (`FK_USUARIOS_USU_ID`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`USU_ID`);

--
-- Indexes for table `usu_pm`
--
ALTER TABLE `usu_pm`
  ADD KEY `FK_USU_PM_1` (`FK_USUARIOS_USU_ID`),
  ADD KEY `FK_USU_PM_2` (`FK_PLANEJAMENTOS_MENSAIS_ATV_RECREATIVAS_PMR_ID`);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `atividades_dos_treinamentos_fisicos`
--
ALTER TABLE `atividades_dos_treinamentos_fisicos`
  ADD CONSTRAINT `FK_ATIVIDADES_DOS_TREINAMENTOS_FISICOS_2` FOREIGN KEY (`FK_ATIVIDADES_FISICAS_AFI_ID`) REFERENCES `atividades_fisicas` (`AFI_ID`),
  ADD CONSTRAINT `FK_ATIVIDADES_DOS_TREINAMENTOS_FISICOS_3` FOREIGN KEY (`FK_TREINAMENTOS_FISICOS_DIARIO_TFD_ID`) REFERENCES `treinamentos_fisicos_diario` (`TFD_ID`) ON DELETE SET NULL;

--
-- Limitadores para a tabela `atividades_fisicas`
--
ALTER TABLE `atividades_fisicas`
  ADD CONSTRAINT `FK_ATIVIDADES_FISICAS_2` FOREIGN KEY (`FK_TIPOS_ATIVIDADES_FISICAS_TAF_ID`) REFERENCES `tipos_atividades_fisicas` (`TAF_ID`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `atividades_recreativas`
--
ALTER TABLE `atividades_recreativas`
  ADD CONSTRAINT `FK_ATIVIDADES_RECREATIVAS_2` FOREIGN KEY (`FK_TIPO_ATIVIDADES_RECREATIVAS_TAR_ID`) REFERENCES `tipo_atividades_recreativas` (`TAR_ID`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `atividades_recreativas_planejamento`
--
ALTER TABLE `atividades_recreativas_planejamento`
  ADD CONSTRAINT `FK_ATIVIDADES_RECREATIVAS_PLANEJAMENTO_2` FOREIGN KEY (`FK_PLANEJAMENTOS_MENSAIS_ATV_RECREATIVAS_PMR_ID`) REFERENCES `planejamentos_mensais_atv_recreativas` (`PMR_ID`),
  ADD CONSTRAINT `FK_ATIVIDADES_RECREATIVAS_PLANEJAMENTO_3` FOREIGN KEY (`FK_ATIVIDADES_RECREATIVAS_ATR_ID`) REFERENCES `atividades_recreativas` (`ATR_ID`);

--
-- Limitadores para a tabela `consultas_esportivas`
--
ALTER TABLE `consultas_esportivas`
  ADD CONSTRAINT `FK_CONSULTAS_ESPORTIVAS_2` FOREIGN KEY (`FK_IDOSO_IDS_ID`) REFERENCES `idoso` (`IDS_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_CONSULTAS_ESPORTIVAS_3` FOREIGN KEY (`FK_USUARIOS_USU_ID`) REFERENCES `usuarios` (`USU_ID`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `participacao_idosos_atv_recreativas`
--
ALTER TABLE `participacao_idosos_atv_recreativas`
  ADD CONSTRAINT `FK_PARTICIPACAO_IDOSOS_ATV_RECREATIVAS_2` FOREIGN KEY (`FK_IDOSO_IDS_ID`) REFERENCES `idoso` (`IDS_ID`) ON DELETE SET NULL;

--
-- Limitadores para a tabela `treinamentos_fisicos_diario`
--
ALTER TABLE `treinamentos_fisicos_diario`
  ADD CONSTRAINT `FK_TREINAMENTOS_FISICOS_DIARIO_2` FOREIGN KEY (`FK_IDOSO_IDS_ID`) REFERENCES `idoso` (`IDS_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_TREINAMENTOS_FISICOS_DIARIO_3` FOREIGN KEY (`FK_USUARIOS_USU_ID`) REFERENCES `usuarios` (`USU_ID`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `usu_pm`
--
ALTER TABLE `usu_pm`
  ADD CONSTRAINT `FK_USU_PM_1` FOREIGN KEY (`FK_USUARIOS_USU_ID`) REFERENCES `usuarios` (`USU_ID`),
  ADD CONSTRAINT `FK_USU_PM_2` FOREIGN KEY (`FK_PLANEJAMENTOS_MENSAIS_ATV_RECREATIVAS_PMR_ID`) REFERENCES `planejamentos_mensais_atv_recreativas` (`PMR_ID`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
