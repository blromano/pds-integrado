-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14-Jun-2019 às 19:50
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
-- Database: `geracoes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cud_tipo`
--

CREATE TABLE `cud_tipo` (
  `CUD_TIPO_ID` int(11) NOT NULL,
  `CUD_CUIDADO` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cuida`
--

CREATE TABLE `cuida` (
  `FK_IDOSOS_IDS_ID` int(11) NOT NULL,
  `FK_ENFERMEIROS_ENF_ID` int(11) NOT NULL,
  `ID_CUIDA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cuidados_diarios`
--

CREATE TABLE `cuidados_diarios` (
  `CUD_VALOR` varchar(5) DEFAULT NULL,
  `CUD_ID` int(11) NOT NULL,
  `CUD_DATA` date NOT NULL,
  `CUD_HORA` time NOT NULL,
  `FK_CUD_TIPO_CUD_TIPO_ID` int(11) NOT NULL,
  `FK_IDOSOS_IDS_ID` int(11) NOT NULL,
  `FK_ENFERMEIROS_ENF_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `eliminacoes`
--

CREATE TABLE `eliminacoes` (
  `ELI_DATA` date NOT NULL,
  `ELI_HORA` time NOT NULL,
  `ELI_ID` int(11) NOT NULL,
  `ELI_VALOR` varchar(5) DEFAULT NULL,
  `FK_ELI_TIPO_ELI_TIPO_ID` int(11) NOT NULL,
  `FK_IDOSOS_IDS_ID` int(11) NOT NULL,
  `FK_ENFERMEIROS_ENF_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `eli_tipo`
--

CREATE TABLE `eli_tipo` (
  `ELI_ELIMINACAO` varchar(8) NOT NULL,
  `ELI_TIPO_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `enfermeiros`
--

CREATE TABLE `enfermeiros` (
  `ENF_ID` int(11) NOT NULL,
  `ENF_NOME` varchar(50) NOT NULL,
  `ENF_SENHA` varchar(16) NOT NULL,
  `ENF_PRONTUARIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `higiene`
--

CREATE TABLE `higiene` (
  `HIG_DATA` date NOT NULL,
  `HIG_ID` int(11) NOT NULL,
  `HIG_HORA` time NOT NULL,
  `HIG_VALOR` varchar(5) DEFAULT NULL,
  `FK_HIG_TIPO_HIG_TIPO_ID` int(11) NOT NULL,
  `FK_IDOSOS_IDS_ID` int(11) NOT NULL,
  `FK_ENFERMEIROS_ENF_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `hig_tipo`
--

CREATE TABLE `hig_tipo` (
  `HIG_TIPO_ID` int(11) NOT NULL,
  `HIG_HIGIENE` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `idosos`
--

CREATE TABLE `idosos` (
  `IDS_ID` int(11) NOT NULL,
  `IDS_NOME` varchar(50) NOT NULL,
  `IDS_DATA_NASCIMENTO` date NOT NULL,
  `IDS_DATA_INGRESSO` date NOT NULL,
  `IDS_PRONTUARIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sinais_vitais`
--

CREATE TABLE `sinais_vitais` (
  `SVT_ID` int(11) NOT NULL,
  `SVT_DATA` date NOT NULL,
  `SVT_HORA` time NOT NULL,
  `SVT_VALOR` varchar(5) DEFAULT NULL,
  `FK_SVT_TIPOS_SVT_TIPO_ID` int(11) NOT NULL,
  `FK_IDOSOS_IDS_ID` int(11) NOT NULL,
  `FK_ENFERMEIROS_ENF_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `svt_tipos`
--

CREATE TABLE `svt_tipos` (
  `SVT_TIPO_ID` int(11) NOT NULL,
  `SVT_SINAL_VITAL` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cud_tipo`
--
ALTER TABLE `cud_tipo`
  ADD PRIMARY KEY (`CUD_TIPO_ID`);

--
-- Indexes for table `cuida`
--
ALTER TABLE `cuida`
  ADD PRIMARY KEY (`ID_CUIDA`),
  ADD KEY `FK_CUIDA_2` (`FK_IDOSOS_IDS_ID`),
  ADD KEY `FK_CUIDA_3` (`FK_ENFERMEIROS_ENF_ID`);

--
-- Indexes for table `cuidados_diarios`
--
ALTER TABLE `cuidados_diarios`
  ADD PRIMARY KEY (`CUD_ID`),
  ADD KEY `FK_CUIDADOS_DIARIOS_2` (`FK_CUD_TIPO_CUD_TIPO_ID`),
  ADD KEY `FK_CUIDADOS_DIARIOS_3` (`FK_IDOSOS_IDS_ID`),
  ADD KEY `FK_CUIDADOS_DIARIOS_4` (`FK_ENFERMEIROS_ENF_ID`);

--
-- Indexes for table `eliminacoes`
--
ALTER TABLE `eliminacoes`
  ADD PRIMARY KEY (`ELI_ID`),
  ADD KEY `FK_ELIMINACOES_2` (`FK_ELI_TIPO_ELI_TIPO_ID`),
  ADD KEY `FK_ELIMINACOES_3` (`FK_IDOSOS_IDS_ID`),
  ADD KEY `FK_ELIMINACOES_4` (`FK_ENFERMEIROS_ENF_ID`);

--
-- Indexes for table `eli_tipo`
--
ALTER TABLE `eli_tipo`
  ADD PRIMARY KEY (`ELI_TIPO_ID`);

--
-- Indexes for table `enfermeiros`
--
ALTER TABLE `enfermeiros`
  ADD PRIMARY KEY (`ENF_ID`);

--
-- Indexes for table `higiene`
--
ALTER TABLE `higiene`
  ADD PRIMARY KEY (`HIG_ID`),
  ADD KEY `FK_HIGIENE_2` (`FK_HIG_TIPO_HIG_TIPO_ID`),
  ADD KEY `FK_HIGIENE_3` (`FK_IDOSOS_IDS_ID`),
  ADD KEY `FK_HIGIENE_4` (`FK_ENFERMEIROS_ENF_ID`);

--
-- Indexes for table `hig_tipo`
--
ALTER TABLE `hig_tipo`
  ADD PRIMARY KEY (`HIG_TIPO_ID`);

--
-- Indexes for table `idosos`
--
ALTER TABLE `idosos`
  ADD PRIMARY KEY (`IDS_ID`);

--
-- Indexes for table `sinais_vitais`
--
ALTER TABLE `sinais_vitais`
  ADD PRIMARY KEY (`SVT_ID`),
  ADD KEY `FK_SINAIS_VITAIS_2` (`FK_SVT_TIPOS_SVT_TIPO_ID`),
  ADD KEY `FK_SINAIS_VITAIS_3` (`FK_IDOSOS_IDS_ID`),
  ADD KEY `FK_SINAIS_VITAIS_4` (`FK_ENFERMEIROS_ENF_ID`);

--
-- Indexes for table `svt_tipos`
--
ALTER TABLE `svt_tipos`
  ADD PRIMARY KEY (`SVT_TIPO_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cud_tipo`
--
ALTER TABLE `cud_tipo`
  MODIFY `CUD_TIPO_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cuida`
--
ALTER TABLE `cuida`
  MODIFY `ID_CUIDA` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cuidados_diarios`
--
ALTER TABLE `cuidados_diarios`
  MODIFY `CUD_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `eliminacoes`
--
ALTER TABLE `eliminacoes`
  MODIFY `ELI_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `eli_tipo`
--
ALTER TABLE `eli_tipo`
  MODIFY `ELI_TIPO_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `enfermeiros`
--
ALTER TABLE `enfermeiros`
  MODIFY `ENF_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `higiene`
--
ALTER TABLE `higiene`
  MODIFY `HIG_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hig_tipo`
--
ALTER TABLE `hig_tipo`
  MODIFY `HIG_TIPO_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `idosos`
--
ALTER TABLE `idosos`
  MODIFY `IDS_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sinais_vitais`
--
ALTER TABLE `sinais_vitais`
  MODIFY `SVT_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `svt_tipos`
--
ALTER TABLE `svt_tipos`
  MODIFY `SVT_TIPO_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cuida`
--
ALTER TABLE `cuida`
  ADD CONSTRAINT `FK_CUIDA_2` FOREIGN KEY (`FK_IDOSOS_IDS_ID`) REFERENCES `idosos` (`IDS_ID`),
  ADD CONSTRAINT `FK_CUIDA_3` FOREIGN KEY (`FK_ENFERMEIROS_ENF_ID`) REFERENCES `enfermeiros` (`ENF_ID`);

--
-- Limitadores para a tabela `cuidados_diarios`
--
ALTER TABLE `cuidados_diarios`
  ADD CONSTRAINT `FK_CUIDADOS_DIARIOS_2` FOREIGN KEY (`FK_CUD_TIPO_CUD_TIPO_ID`) REFERENCES `cud_tipo` (`CUD_TIPO_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_CUIDADOS_DIARIOS_3` FOREIGN KEY (`FK_IDOSOS_IDS_ID`) REFERENCES `idosos` (`IDS_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_CUIDADOS_DIARIOS_4` FOREIGN KEY (`FK_ENFERMEIROS_ENF_ID`) REFERENCES `enfermeiros` (`ENF_ID`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `eliminacoes`
--
ALTER TABLE `eliminacoes`
  ADD CONSTRAINT `FK_ELIMINACOES_2` FOREIGN KEY (`FK_ELI_TIPO_ELI_TIPO_ID`) REFERENCES `eli_tipo` (`ELI_TIPO_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_ELIMINACOES_3` FOREIGN KEY (`FK_IDOSOS_IDS_ID`) REFERENCES `idosos` (`IDS_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_ELIMINACOES_4` FOREIGN KEY (`FK_ENFERMEIROS_ENF_ID`) REFERENCES `enfermeiros` (`ENF_ID`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `higiene`
--
ALTER TABLE `higiene`
  ADD CONSTRAINT `FK_HIGIENE_2` FOREIGN KEY (`FK_HIG_TIPO_HIG_TIPO_ID`) REFERENCES `hig_tipo` (`HIG_TIPO_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_HIGIENE_3` FOREIGN KEY (`FK_IDOSOS_IDS_ID`) REFERENCES `idosos` (`IDS_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_HIGIENE_4` FOREIGN KEY (`FK_ENFERMEIROS_ENF_ID`) REFERENCES `enfermeiros` (`ENF_ID`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `sinais_vitais`
--
ALTER TABLE `sinais_vitais`
  ADD CONSTRAINT `FK_SINAIS_VITAIS_2` FOREIGN KEY (`FK_SVT_TIPOS_SVT_TIPO_ID`) REFERENCES `svt_tipos` (`SVT_TIPO_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_SINAIS_VITAIS_3` FOREIGN KEY (`FK_IDOSOS_IDS_ID`) REFERENCES `idosos` (`IDS_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_SINAIS_VITAIS_4` FOREIGN KEY (`FK_ENFERMEIROS_ENF_ID`) REFERENCES `enfermeiros` (`ENF_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
