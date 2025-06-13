-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2025 at 05:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ifsports`
--

-- --------------------------------------------------------

--
-- Table structure for table `alunos`
--

CREATE TABLE `alunos` (
  `ALN_ID` int(11) NOT NULL,
  `ALU_DATA_NASCIMENTO` date NOT NULL,
  `ALU_CPF` varchar(11) NOT NULL,
  `ALU_NOME` varchar(60) NOT NULL,
  `ALU_CURSO` varchar(30) NOT NULL,
  `ALU_PRONTUARIO` varchar(10) NOT NULL,
  `FK_LOGIN_LGN_ID` int(11) DEFAULT NULL,
  `FK_CAMPUS_CAM_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alunos_selecionados_equipe`
--

CREATE TABLE `alunos_selecionados_equipe` (
  `FK_ALUNOS_ALN_ID` int(11) DEFAULT NULL,
  `FK_MODALIDADES_DE_EVENTOS_MDE_ID` int(11) DEFAULT NULL,
  `ALS_SELECIONADO` tinyint(1) NOT NULL,
  `ALS_JUSTIFICATIVA` text NOT NULL,
  `ALS_DATA_HORA` datetime NOT NULL,
  `ALS_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `campus`
--

CREATE TABLE `campus` (
  `CAM_ID` int(11) NOT NULL,
  `CAM_NOME` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eventos`
--

CREATE TABLE `eventos` (
  `EVE_NOME` varchar(100) NOT NULL,
  `EVE_ID` int(11) NOT NULL,
  `EVE_DATA` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `LGN_ID` int(11) NOT NULL,
  `LGN_SENHA` varchar(20) NOT NULL,
  `LGN_TIPO` enum('AD','OE','SE','RE','AL') NOT NULL,
  `LGN_ATIVO` tinyint(1) DEFAULT NULL,
  `LGN_EMAIL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modalidades`
--

CREATE TABLE `modalidades` (
  `MOD_ID` int(11) NOT NULL,
  `MOD_TIPO` varchar(10) NOT NULL,
  `MOD_NOME` varchar(250) NOT NULL,
  `MOD_GENERO` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modalidades_de_eventos`
--

CREATE TABLE `modalidades_de_eventos` (
  `MDE_ID` int(11) NOT NULL,
  `MDE_VINCULADA_EVENTO` tinyint(1) NOT NULL,
  `FK_MODALIDADES_MOD_ID` int(11) DEFAULT NULL,
  `FK_EVENTOS_EVE_ID` int(11) DEFAULT NULL,
  `FK_RESPONSAVEIS_EQUIPE_RES_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `responsaveis_equipe`
--

CREATE TABLE `responsaveis_equipe` (
  `RES_CPF` varchar(11) NOT NULL,
  `RES_EMAIL` varchar(255) NOT NULL,
  `RES_ID` int(11) NOT NULL,
  `RES_PRONTUARIO` varchar(10) NOT NULL,
  `RES_NOME` varchar(60) NOT NULL,
  `FK_LOGIN_LGN_ID` int(11) DEFAULT NULL,
  `FK_CAMPUS_CAM_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`ALN_ID`),
  ADD UNIQUE KEY `ALU_CPF` (`ALU_CPF`,`ALU_PRONTUARIO`),
  ADD KEY `FK_ALUNOS_2` (`FK_LOGIN_LGN_ID`),
  ADD KEY `FK_ALUNOS_3` (`FK_CAMPUS_CAM_ID`);

--
-- Indexes for table `alunos_selecionados_equipe`
--
ALTER TABLE `alunos_selecionados_equipe`
  ADD PRIMARY KEY (`ALS_ID`),
  ADD KEY `FK_ALUNOS_SELECIONADOS_EQUIPE_2` (`FK_ALUNOS_ALN_ID`),
  ADD KEY `FK_ALUNOS_SELECIONADOS_EQUIPE_3` (`FK_MODALIDADES_DE_EVENTOS_MDE_ID`);

--
-- Indexes for table `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`CAM_ID`);

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`EVE_ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`LGN_ID`),
  ADD UNIQUE KEY `LGN_EMAIL` (`LGN_EMAIL`);

--
-- Indexes for table `modalidades`
--
ALTER TABLE `modalidades`
  ADD PRIMARY KEY (`MOD_ID`);

--
-- Indexes for table `modalidades_de_eventos`
--
ALTER TABLE `modalidades_de_eventos`
  ADD PRIMARY KEY (`MDE_ID`),
  ADD KEY `FK_MODALIDADES_DE_EVENTOS_2` (`FK_MODALIDADES_MOD_ID`),
  ADD KEY `FK_MODALIDADES_DE_EVENTOS_3` (`FK_EVENTOS_EVE_ID`),
  ADD KEY `FK_MODALIDADES_DE_EVENTOS_4` (`FK_RESPONSAVEIS_EQUIPE_RES_ID`);

--
-- Indexes for table `responsaveis_equipe`
--
ALTER TABLE `responsaveis_equipe`
  ADD PRIMARY KEY (`RES_ID`),
  ADD UNIQUE KEY `RES_CPF` (`RES_CPF`,`RES_EMAIL`,`RES_PRONTUARIO`),
  ADD KEY `FK_RESPONSAVEIS_EQUIPE_2` (`FK_LOGIN_LGN_ID`),
  ADD KEY `FK_RESPONSAVEIS_EQUIPE_3` (`FK_CAMPUS_CAM_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alunos`
--
ALTER TABLE `alunos`
  MODIFY `ALN_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `alunos_selecionados_equipe`
--
ALTER TABLE `alunos_selecionados_equipe`
  MODIFY `ALS_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `campus`
--
ALTER TABLE `campus`
  MODIFY `CAM_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `EVE_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `LGN_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modalidades`
--
ALTER TABLE `modalidades`
  MODIFY `MOD_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modalidades_de_eventos`
--
ALTER TABLE `modalidades_de_eventos`
  MODIFY `MDE_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `responsaveis_equipe`
--
ALTER TABLE `responsaveis_equipe`
  MODIFY `RES_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alunos`
--
ALTER TABLE `alunos`
  ADD CONSTRAINT `FK_ALUNOS_2` FOREIGN KEY (`FK_LOGIN_LGN_ID`) REFERENCES `login` (`LGN_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_ALUNOS_3` FOREIGN KEY (`FK_CAMPUS_CAM_ID`) REFERENCES `campus` (`CAM_ID`) ON DELETE CASCADE;

--
-- Constraints for table `alunos_selecionados_equipe`
--
ALTER TABLE `alunos_selecionados_equipe`
  ADD CONSTRAINT `FK_ALUNOS_SELECIONADOS_EQUIPE_2` FOREIGN KEY (`FK_ALUNOS_ALN_ID`) REFERENCES `alunos` (`ALN_ID`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_ALUNOS_SELECIONADOS_EQUIPE_3` FOREIGN KEY (`FK_MODALIDADES_DE_EVENTOS_MDE_ID`) REFERENCES `modalidades_de_eventos` (`MDE_ID`) ON DELETE SET NULL;

--
-- Constraints for table `modalidades_de_eventos`
--
ALTER TABLE `modalidades_de_eventos`
  ADD CONSTRAINT `FK_MODALIDADES_DE_EVENTOS_2` FOREIGN KEY (`FK_MODALIDADES_MOD_ID`) REFERENCES `modalidades` (`MOD_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_MODALIDADES_DE_EVENTOS_3` FOREIGN KEY (`FK_EVENTOS_EVE_ID`) REFERENCES `eventos` (`EVE_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_MODALIDADES_DE_EVENTOS_4` FOREIGN KEY (`FK_RESPONSAVEIS_EQUIPE_RES_ID`) REFERENCES `responsaveis_equipe` (`RES_ID`) ON DELETE CASCADE;

--
-- Constraints for table `responsaveis_equipe`
--
ALTER TABLE `responsaveis_equipe`
  ADD CONSTRAINT `FK_RESPONSAVEIS_EQUIPE_2` FOREIGN KEY (`FK_LOGIN_LGN_ID`) REFERENCES `login` (`LGN_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_RESPONSAVEIS_EQUIPE_3` FOREIGN KEY (`FK_CAMPUS_CAM_ID`) REFERENCES `campus` (`CAM_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
