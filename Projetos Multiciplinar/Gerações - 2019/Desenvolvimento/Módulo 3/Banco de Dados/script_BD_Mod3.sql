-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14-Jun-2019 às 20:59
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
-- Database: `modulo03`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atv_fisicas`
--

CREATE TABLE `atv_fisicas` (
  `ATV_NOME` varchar(50) DEFAULT NULL,
  `ATV_ID` int(11) DEFAULT NULL,
  `ATV_DATA` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `banhos_sol`
--

CREATE TABLE `banhos_sol` (
  `SOL_DATA_HORA_FIM` datetime DEFAULT NULL,
  `SOL_DATA_HORA_INICIO` datetime DEFAULT NULL,
  `SOL_ID` int(11) DEFAULT NULL,
  `FK_IDOSOS_IDO_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

CREATE TABLE `cidades` (
  `CID_NOME` varchar(80) DEFAULT NULL,
  `CID_ID` int(11) DEFAULT NULL,
  `FK_ESTADOS_EST_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `eliminacoes`
--

CREATE TABLE `eliminacoes` (
  `ELI_ID` int(11) DEFAULT NULL,
  `ELI_DATA_HORA` datetime DEFAULT NULL,
  `ELI_VALOR` varchar(20) DEFAULT NULL,
  `FK_ENFERMEIROS_ENF_ID` int(11) DEFAULT NULL,
  `FK_IDOSOS_IDO_ID` int(11) DEFAULT NULL,
  `FK_TIPO_ELIMINACOES_TEL_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `enfermeiros`
--

CREATE TABLE `enfermeiros` (
  `ENF_NOME` varchar(80) DEFAULT NULL,
  `ENF_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE `estados` (
  `EST_SIGLA` varchar(2) DEFAULT NULL,
  `EST_NOME` varchar(20) DEFAULT NULL,
  `EST_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evolucao_diaria`
--

CREATE TABLE `evolucao_diaria` (
  `EVO_DATA_HORA` datetime DEFAULT NULL,
  `EVO_MELHORIA` text,
  `EVO_ID` int(11) DEFAULT NULL,
  `FK_ENFERMEIROS_ENF_ID` int(11) DEFAULT NULL,
  `FK_IDOSOS_IDO_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `financas`
--

CREATE TABLE `financas` (
  `FIN_PROXIMO_PAGAMENTO` date DEFAULT NULL,
  `FIN_PERIODO_PAGAMENTO` varchar(10) DEFAULT NULL,
  `FIN_VALOR_PAGAMENTO` float DEFAULT NULL,
  `FIN_DATA_PAGAMENTO` date DEFAULT NULL,
  `FIN_FORMA_PAGAMENTO` varchar(10) DEFAULT NULL,
  `FIN_ID` int(11) DEFAULT NULL,
  `FK_RESPONSAVEIS_RES_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `hidratacoes`
--

CREATE TABLE `hidratacoes` (
  `HID_DATA_HORA` datetime DEFAULT NULL,
  `HID_QUANTIDADE_AGUA` float DEFAULT NULL,
  `HID_ID` int(11) DEFAULT NULL,
  `FK_IDOSOS_IDO_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `higienes`
--

CREATE TABLE `higienes` (
  `HIG_ID` int(11) DEFAULT NULL,
  `HIG_VALOR` varchar(15) DEFAULT NULL,
  `HIG_DATA_HORA` datetime DEFAULT NULL,
  `FK_TIPO_HIGIENES_THI_ID` int(11) DEFAULT NULL,
  `FK_IDOSOS_IDO_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `idosos`
--

CREATE TABLE `idosos` (
  `IDO_ID` int(11) DEFAULT NULL,
  `IDO_NOME` varchar(80) DEFAULT NULL,
  `FK_RESPONSAVEIS_RES_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicamentos`
--

CREATE TABLE `medicamentos` (
  `MED_ID` int(11) DEFAULT NULL,
  `MED_NOME` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `padrao_alimentar`
--

CREATE TABLE `padrao_alimentar` (
  `PAL_ACEITACAO` varchar(10) DEFAULT NULL,
  `PAL_ID` int(11) DEFAULT NULL,
  `FK_REFEICOES_REF_ID` int(11) DEFAULT NULL,
  `FK_IDOSOS_IDO_ID` int(11) DEFAULT NULL,
  `FK_ENFERMEIROS_ENF_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `padrao_sono`
--

CREATE TABLE `padrao_sono` (
  `SON_ID` int(11) DEFAULT NULL,
  `SON_DATA_HORA` datetime DEFAULT NULL,
  `SON_STATUS` varchar(15) DEFAULT NULL,
  `FK_IDOSOS_IDO_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `participacao_atividades_idosos`
--

CREATE TABLE `participacao_atividades_idosos` (
  `FK_ATV_FISICAS_ATV_ID` int(11) DEFAULT NULL,
  `FK_IDOSOS_IDO_ID` int(11) DEFAULT NULL,
  `PAI_ID` int(11) DEFAULT NULL,
  `PAI_OBSERVACOES` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `patologias`
--

CREATE TABLE `patologias` (
  `PAT_ID` int(11) DEFAULT NULL,
  `PAT_NOME` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `patologias_idosos`
--

CREATE TABLE `patologias_idosos` (
  `PID_ID` int(11) DEFAULT NULL,
  `PID_GRAU` varchar(10) DEFAULT NULL,
  `PID_DATA` date DEFAULT NULL,
  `FK_PATOLOGIAS_PAT_ID` int(11) DEFAULT NULL,
  `FK_ENFERMEIROS_ENF_ID` int(11) DEFAULT NULL,
  `FK_IDOSOS_IDO_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `prescricoes_medicas`
--

CREATE TABLE `prescricoes_medicas` (
  `PRE_VALIDADE` date DEFAULT NULL,
  `PRE_ID` int(11) DEFAULT NULL,
  `PRE_DATA` date DEFAULT NULL,
  `PRE_POSOLOGIA` float DEFAULT NULL,
  `FK_MEDICAMENTOS_MED_ID` int(11) DEFAULT NULL,
  `FK_ENFERMEIROS_ENF_ID` int(11) DEFAULT NULL,
  `FK_IDOSOS_IDO_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `refeicoes`
--

CREATE TABLE `refeicoes` (
  `REF_ID` int(11) DEFAULT NULL,
  `REF_DATA_HORA` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `repelentes`
--

CREATE TABLE `repelentes` (
  `REP_DATA_INICIO` date DEFAULT NULL,
  `REP_ID` int(11) DEFAULT NULL,
  `REP_DATA_FIM` date DEFAULT NULL,
  `FK_IDOSOS_IDO_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `responsaveis`
--

CREATE TABLE `responsaveis` (
  `RES_RG` varchar(18) DEFAULT NULL,
  `RES_ENDERECO` varchar(100) DEFAULT NULL,
  `RES_DATA_NASCIMENTO` date DEFAULT NULL,
  `RES_CPF` varchar(18) DEFAULT NULL,
  `RES_TELEFONE` varchar(12) DEFAULT NULL,
  `RES_ID` int(11) DEFAULT NULL,
  `RES_NOME` varchar(80) DEFAULT NULL,
  `RES_EMAIL` varchar(80) DEFAULT NULL,
  `FK_CIDADES_CID_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sinais_vitais`
--

CREATE TABLE `sinais_vitais` (
  `SIV_VALOR` varchar(10) DEFAULT NULL,
  `SIV_DATA_HORA` datetime DEFAULT NULL,
  `SIV_ID` int(11) DEFAULT NULL,
  `FK_TIPOS_SINAIS_VITAIS_TSV_ID` int(11) DEFAULT NULL,
  `FK_IDOSOS_IDO_ID` int(11) DEFAULT NULL,
  `FK_ENFERMEIROS_ENF_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_sinais_vitais`
--

CREATE TABLE `tipos_sinais_vitais` (
  `TSV_ID` int(11) DEFAULT NULL,
  `TSV_NOME` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_eliminacoes`
--

CREATE TABLE `tipo_eliminacoes` (
  `TEL_ID` int(11) DEFAULT NULL,
  `TEL_NOME` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_higienes`
--

CREATE TABLE `tipo_higienes` (
  `THI_ID` int(11) DEFAULT NULL,
  `THI_NOME` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vacinacoes`
--

CREATE TABLE `vacinacoes` (
  `VAC_ID` int(11) DEFAULT NULL,
  `VAC_NOME` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vacinas_idosos`
--

CREATE TABLE `vacinas_idosos` (
  `FK_VACINACOES_VAC_ID` int(11) DEFAULT NULL,
  `FK_IDOSOS_IDO_ID` int(11) DEFAULT NULL,
  `FK_ENFERMEIROS_ENF_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
