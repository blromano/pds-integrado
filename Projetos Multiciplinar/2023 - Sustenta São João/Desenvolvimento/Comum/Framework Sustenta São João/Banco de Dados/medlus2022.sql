-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 01-Set-2022 às 04:49
-- Versão do servidor: 5.7.36
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `medlus2022`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administradores`
--

DROP TABLE IF EXISTS `administradores`;
CREATE TABLE IF NOT EXISTS `administradores` (
  `ADM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ADM_EMAIL_PROFISSIONAL` varchar(255) NOT NULL,
  `ADM_PRONTUARIO` varchar(6) NOT NULL,
  `ADM_TELEFONE_PROFISSIONAL` varchar(13) DEFAULT NULL,
  `FK_USUARIOS_USU_ID` int(11) NOT NULL,
  PRIMARY KEY (`ADM_ID`,`FK_USUARIOS_USU_ID`),
  UNIQUE KEY `ADM_PRONTUARIO` (`ADM_PRONTUARIO`),
  KEY `FK_ADMINISTRADORES_2` (`FK_USUARIOS_USU_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `consultas_online`
--

DROP TABLE IF EXISTS `consultas_online`;
CREATE TABLE IF NOT EXISTS `consultas_online` (
  `CTO_PRESCRICAO` varchar(200) DEFAULT NULL,
  `CTO_HORA_TERMINO` time NOT NULL,
  `CTO_JUSTIFICATIVA` varchar(200) NOT NULL,
  `CTO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CTO_DIAGNOSTICO` varchar(1000) NOT NULL,
  `CTO_OBSERVACOES` varchar(1000) DEFAULT NULL,
  `CTO_DATA` date NOT NULL,
  `CTO_LINK_MEET` varchar(255) NOT NULL,
  `CTO_STATUS` int(11) DEFAULT NULL,
  `CTO_HORA_INICIO` time NOT NULL,
  `FK_PACIENTES_PAC_ID` int(11) DEFAULT NULL,
  `FK_MEDICOS_MED_ID` int(11) DEFAULT NULL,
  `FK_SOLICITACAO_AGEND_CON_ONLINE_SOL_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`CTO_ID`),
  KEY `FK_CONSULTAS_ONLINE_2` (`FK_SOLICITACAO_AGEND_CON_ONLINE_SOL_ID`),
  KEY `FK_CONSULTAS_ONLINE_3` (`FK_PACIENTES_PAC_ID`),
  KEY `FK_CONSULTAS_ONLINE_4` (`FK_MEDICOS_MED_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `consultas_presenciais`
--

DROP TABLE IF EXISTS `consultas_presenciais`;
CREATE TABLE IF NOT EXISTS `consultas_presenciais` (
  `COP_RETORNO` tinyint(1) NOT NULL,
  `COP_DATA_RETORNO` date DEFAULT NULL,
  `COP_DESCRICAO` varchar(255) NOT NULL,
  `COP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `COP_DATA_ATEDIMENTO` date DEFAULT NULL,
  `COP_HORA_ATENDIMENTO` time DEFAULT NULL,
  `FK_PACIENTES_PAC_ID` int(11) DEFAULT NULL,
  `COP_LOCAL_CONSULTA_DIRECIONADA` text NOT NULL,
  `COP_NIVEL_PRIORIDADE` varchar(20) NOT NULL,
  `FK_MEDICOS_MED_ID` int(11) DEFAULT NULL,
  `FK_CONSULTAS_ONLINE_CTO_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`COP_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos_setoriais`
--

DROP TABLE IF EXISTS `contatos_setoriais`;
CREATE TABLE IF NOT EXISTS `contatos_setoriais` (
  `CTT_RESPONSAVEL` varchar(100) NOT NULL,
  `CTT_EMAIL` varchar(255) DEFAULT NULL,
  `CTT_TELEFONE` varchar(13) NOT NULL,
  `CTT_ID` int(11) NOT NULL,
  `CTT_SETOR` varchar(50) NOT NULL,
  `CTT_WHATSAAP` varchar(13) NOT NULL,
  `FK_SECRETARIAS_SEC_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`CTT_ID`),
  UNIQUE KEY `CTT_SETOR` (`CTT_SETOR`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dependentes_pacientes`
--

DROP TABLE IF EXISTS `dependentes_pacientes`;
CREATE TABLE IF NOT EXISTS `dependentes_pacientes` (
  `DEP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FK_USUARIOS_USU_ID` int(11) DEFAULT NULL,
  `FK_PACIENTES_PAC_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`DEP_ID`),
  KEY `FK_DEPENDENTES_PACIENTES_2` (`FK_USUARIOS_USU_ID`),
  KEY `FK_DEPENDENTES_PACIENTES_3` (`FK_PACIENTES_PAC_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `enfermeiros`
--

DROP TABLE IF EXISTS `enfermeiros`;
CREATE TABLE IF NOT EXISTS `enfermeiros` (
  `ENF_EMAIL_PROFISSIONAL` varchar(255) DEFAULT NULL,
  `ENF_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ENF_PRONTUARIO` varchar(6) NOT NULL,
  `ENF_COREN` varchar(255) NOT NULL,
  `ENF_TELEFONE_PROFISSIONAL` varchar(13) DEFAULT NULL,
  `FK_USUARIOS_USU_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ENF_ID`),
  UNIQUE KEY `ENF_PRONTUARIO` (`ENF_PRONTUARIO`),
  UNIQUE KEY `ENF_COREN` (`ENF_COREN`),
  KEY `FK_ENFERMEIROS_2` (`FK_USUARIOS_USU_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `especialidades`
--

DROP TABLE IF EXISTS `especialidades`;
CREATE TABLE IF NOT EXISTS `especialidades` (
  `ESP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ESP_NOME` varchar(100) NOT NULL,
  PRIMARY KEY (`ESP_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `especialidades_medicos`
--

DROP TABLE IF EXISTS `especialidades_medicos`;
CREATE TABLE IF NOT EXISTS `especialidades_medicos` (
  `FK_ESPECIALIDADES_ESP_ID` int(11) DEFAULT NULL,
  `FK_MEDICOS_MED_ID` int(11) DEFAULT NULL,
  `EPM_ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`EPM_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

DROP TABLE IF EXISTS `fornecedores`;
CREATE TABLE IF NOT EXISTS `fornecedores` (
  `FOR_NOME` varchar(100) NOT NULL,
  `FOR_TELEFONE` varchar(13) NOT NULL,
  `FOR_EMAIL` varchar(255) NOT NULL,
  `FOR_CNPJ` varchar(18) NOT NULL,
  `FOR_ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`FOR_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `internações_medicas`
--

DROP TABLE IF EXISTS `internações_medicas`;
CREATE TABLE IF NOT EXISTS `internações_medicas` (
  `INM_TEMPOINTERNACAO` int(11) NOT NULL,
  `INM_ACOMPANHAMENTOCLINICO` varchar(50) NOT NULL,
  `INM_NECESSIDADESCLINICAS` varchar(100) DEFAULT NULL,
  `INM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `INM_PRESCRICAOMEDICA` varchar(255) NOT NULL,
  `INM_CAUSAINTERNACAO` varchar(100) NOT NULL,
  `FK_CONSULTAS_PRESENCIAIS_COP_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`INM_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicos`
--

DROP TABLE IF EXISTS `medicos`;
CREATE TABLE IF NOT EXISTS `medicos` (
  `MED_CRM` varchar(6) NOT NULL,
  `MED_TELEFONE_PROFISSIONAL` varchar(13) DEFAULT NULL,
  `MED_EMAIL_PROFISSIONAL` varchar(255) DEFAULT NULL,
  `MED_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MED_PRONTUARIO` varchar(6) NOT NULL,
  `MED_VALOR_CONSULTA` decimal(10,2) NOT NULL,
  `MED_OBSERVACOES` text,
  `MED_FORMACAO` varchar(50) NOT NULL,
  `FK_USUARIOS_USU_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`MED_ID`),
  UNIQUE KEY `MED_CRM` (`MED_CRM`),
  UNIQUE KEY `MED_PRONTUARIO` (`MED_PRONTUARIO`),
  KEY `FK_MEDICOS_2` (`FK_USUARIOS_USU_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ouvidoria`
--

DROP TABLE IF EXISTS `ouvidoria`;
CREATE TABLE IF NOT EXISTS `ouvidoria` (
  `OUV_RECADO` varchar(500) NOT NULL,
  `OUV_SITUACAO` int(11) NOT NULL,
  `OUV_MOTIVO` varchar(50) DEFAULT NULL,
  `OUV_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FK_USUARIOS_USU_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`OUV_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
CREATE TABLE IF NOT EXISTS `pacientes` (
  `PAC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PAC_PRONTUARIO` varchar(6) NOT NULL,
  `FK_USUARIOS_USU_ID` int(11) DEFAULT NULL,
  `FK_PLANOS_PLA_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`PAC_ID`),
  UNIQUE KEY `PAC_PRONTUARIO` (`PAC_PRONTUARIO`),
  KEY `FK_PACIENTES_2` (`FK_USUARIOS_USU_ID`),
  KEY `FK_PACIENTES_3` (`FK_PLANOS_PLA_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pacientes`
--

INSERT INTO `pacientes` (`PAC_ID`, `PAC_PRONTUARIO`, `FK_USUARIOS_USU_ID`, `FK_PLANOS_PLA_ID`) VALUES
(1, 'Ever', 1, 1),
(16, 'ever21', 13, 14);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos`
--

DROP TABLE IF EXISTS `pagamentos`;
CREATE TABLE IF NOT EXISTS `pagamentos` (
  `PAG_DATAPAGAMENTO` date NOT NULL,
  `PAG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PAG_VALORPAGAMENTO` decimal(8,2) NOT NULL,
  `PAG_DATAVENCIMENTO` date NOT NULL,
  `FK_PLANOS_PLA_ID` int(11) DEFAULT NULL,
  `FK_PACIENTES_PAC_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`PAG_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `planos`
--

DROP TABLE IF EXISTS `planos`;
CREATE TABLE IF NOT EXISTS `planos` (
  `PLA_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PLA_AGENCIA` varchar(50) NOT NULL,
  `PLA_CONTATO` varchar(100) DEFAULT NULL,
  `PLA_PRECO` decimal(8,2) NOT NULL,
  `PLA_QUANTIDADEEXAMES` int(11) DEFAULT NULL,
  `PLA_NOME` varchar(255) DEFAULT NULL,
  `PLA_QUANTIDADECONSULTAS` int(11) DEFAULT NULL,
  PRIMARY KEY (`PLA_ID`),
  UNIQUE KEY `PLA_NOME` (`PLA_NOME`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `planos`
--

INSERT INTO `planos` (`PLA_ID`, `PLA_AGENCIA`, `PLA_CONTATO`, `PLA_PRECO`, `PLA_QUANTIDADEEXAMES`, `PLA_NOME`, `PLA_QUANTIDADECONSULTAS`) VALUES
(1, 'teste', 'teste', '123.00', 123, 'teste', 1),
(2, 'teste2', 'teste2', '10.00', 11, 'teste2', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `prescricao_remedios`
--

DROP TABLE IF EXISTS `prescricao_remedios`;
CREATE TABLE IF NOT EXISTS `prescricao_remedios` (
  `FK_PRESCRIÇÕES_MEDICAS_PM_ID` int(11) DEFAULT NULL,
  `FK_REMEDIOS_REM_ID` int(11) DEFAULT NULL,
  `PRR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PRR_PERIODICIDADE_HORAS` int(11) NOT NULL,
  `PRR_PERIODO_DIAS` int(11) NOT NULL,
  PRIMARY KEY (`PRR_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `prescrições_medicas`
--

DROP TABLE IF EXISTS `prescrições_medicas`;
CREATE TABLE IF NOT EXISTS `prescrições_medicas` (
  `PM_URL_ARQUIVO_PRESCRICAO_MEDICA` varchar(255) NOT NULL,
  `PM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FK_CONSULTAS_PRESENCIAIS_COP_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`PM_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `PRO_VALOR` decimal(5,2) NOT NULL,
  `PRO_NOME` varchar(100) NOT NULL,
  `PRO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PRO_QUANTIDADE` int(11) NOT NULL,
  `FK_FORNECEDORES_FOR_ID` int(11) DEFAULT NULL,
  `FK_TIPOS_PRODUTOS_TPP_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`PRO_ID`),
  KEY `FK_PRODUTOS_2` (`FK_FORNECEDORES_FOR_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `remedios`
--

DROP TABLE IF EXISTS `remedios`;
CREATE TABLE IF NOT EXISTS `remedios` (
  `REM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `REM_NOME` varchar(100) NOT NULL,
  `REM_DOSAGEM` varchar(50) NOT NULL,
  `REM_CONTRAINDICACAO` varchar(500) NOT NULL,
  `REM_INDICACAO` varchar(200) NOT NULL,
  `REM_OBSERVACOES` text,
  `FK_TIPOS_REMEDIOS_TIP_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`REM_ID`),
  UNIQUE KEY `REM_NOME` (`REM_NOME`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `secretarias`
--

DROP TABLE IF EXISTS `secretarias`;
CREATE TABLE IF NOT EXISTS `secretarias` (
  `SEC_SETOR` varchar(50) NOT NULL,
  `SEC_TELEFONE_PROFISSIONAL` varchar(13) DEFAULT NULL,
  `SEC_PRONTUARIO` varchar(6) NOT NULL,
  `SEC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SEC_EMAIL_PROFISSIONAL` varchar(255) DEFAULT NULL,
  `FK_USUARIOS_USU_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`SEC_ID`),
  UNIQUE KEY `SEC_PRONTUARIO` (`SEC_PRONTUARIO`),
  KEY `FK_SECRETARIAS_2` (`FK_USUARIOS_USU_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacao_agend_con_online`
--

DROP TABLE IF EXISTS `solicitacao_agend_con_online`;
CREATE TABLE IF NOT EXISTS `solicitacao_agend_con_online` (
  `SOL_STATUS` int(11) NOT NULL,
  `SOL_HORARIO` time NOT NULL,
  `SOL_DATA` date NOT NULL,
  `SOL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FK_SECRETARIAS_SEC_ID` int(11) DEFAULT NULL,
  `FK_ESPECIALIDADES_ESP_ID` int(11) DEFAULT NULL,
  `FK_PACIENTES_PAC_ID` int(11) DEFAULT NULL,
  `SOL_JUSTIFICATIVARECUSAO` varchar(200) NOT NULL,
  PRIMARY KEY (`SOL_ID`),
  KEY `FK_SOLICITACAO_AGEND_CON_ONLINE_2` (`FK_ESPECIALIDADES_ESP_ID`),
  KEY `FK_SOLICITACAO_AGEND_CON_ONLINE_3` (`FK_PACIENTES_PAC_ID`),
  KEY `FK_SOLICITACAO_AGEND_CON_ONLINE_4` (`FK_SECRETARIAS_SEC_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacoes_compras_produtos`
--

DROP TABLE IF EXISTS `solicitacoes_compras_produtos`;
CREATE TABLE IF NOT EXISTS `solicitacoes_compras_produtos` (
  `SCP_STATUS` int(11) NOT NULL,
  `PSC_QUANTIDADE_PRODUTO_SOLICITADO` int(11) NOT NULL,
  `SCP_DATA_HORA` datetime NOT NULL,
  `SCP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SCP_JUSTIFICATIVA_RECUSAO` varchar(200) NOT NULL,
  `FK_USUARIOS_USU_ID` int(11) DEFAULT NULL,
  `FK_PRODUTOS_PRO_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`SCP_ID`),
  KEY `FK_SOLICITACOES_COMPRAS_PRODUTOS_2` (`FK_USUARIOS_USU_ID`),
  KEY `FK_SOLICITACOES_COMPRAS_PRODUTOS_3` (`FK_PRODUTOS_PRO_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_produtos`
--

DROP TABLE IF EXISTS `tipos_produtos`;
CREATE TABLE IF NOT EXISTS `tipos_produtos` (
  `TPP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TPP_NOME` varchar(50) NOT NULL,
  PRIMARY KEY (`TPP_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_remedios`
--

DROP TABLE IF EXISTS `tipos_remedios`;
CREATE TABLE IF NOT EXISTS `tipos_remedios` (
  `TIP_OBSERVACOES` text,
  `TIP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TIP_NOME` varchar(100) NOT NULL,
  PRIMARY KEY (`TIP_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `triagem_c_online`
--

DROP TABLE IF EXISTS `triagem_c_online`;
CREATE TABLE IF NOT EXISTS `triagem_c_online` (
  `TRO_COLESTEROL` int(11) NOT NULL,
  `TRO_FALTA_DE_AR` tinyint(1) NOT NULL,
  `TRO_PESO` int(11) NOT NULL,
  `TRO_DOR_NO_CORPO` tinyint(1) NOT NULL,
  `TRO_DOR_DE_GARGANTA` tinyint(1) NOT NULL,
  `TRO_VOMITO` tinyint(1) NOT NULL,
  `TRO_CORIZA` tinyint(1) NOT NULL,
  `TRO_DOR_DE_CABECA` tinyint(1) NOT NULL,
  `TRO_DIABETES` int(11) NOT NULL,
  `TRO_TOSSE` tinyint(1) NOT NULL,
  `TRO_DIARREIA` tinyint(1) NOT NULL,
  `TRO_FEBRE` tinyint(1) NOT NULL,
  `TRO_LESAO` int(11) NOT NULL,
  `TRO_HIPERTENSAO` int(11) NOT NULL,
  `TRO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FK_CONSULTAS_ONLINE_CTO_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`TRO_ID`),
  KEY `FK_TRIAGEM_C_ONLINE_2` (`FK_CONSULTAS_ONLINE_CTO_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `triagens`
--

DROP TABLE IF EXISTS `triagens`;
CREATE TABLE IF NOT EXISTS `triagens` (
  `TRI_ENDERECO_SETOR` varchar(30) NOT NULL,
  `TRI_PRESSAOSISTOLICA` int(11) NOT NULL,
  `TRI_ID` int(11) NOT NULL,
  `TRI_ALTURA` decimal(3,1) NOT NULL,
  `TRI_SINTOMAS` varchar(200) NOT NULL,
  `TRI_HORA_TRIAGEM` time NOT NULL,
  `TRI_ATENDIMENTOPREFERENCIAL` tinyint(1) NOT NULL,
  `TRI_TEMPERATURA` decimal(3,1) NOT NULL,
  `TRI_PRESSAODIASTOLICA` int(11) NOT NULL,
  `TRI_PESO` decimal(4,2) NOT NULL,
  `TRI_ALERGIAS` varchar(150) NOT NULL,
  `TRI_INFORMACOESADICIONAIS` varchar(100) NOT NULL,
  `FK_ENFERMEIROS_ENF_ID` int(11) DEFAULT NULL,
  `FK_CONSULTAS_PRESENCIAIS_COP_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`TRI_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `USU_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USU_CPF` varchar(12) NOT NULL,
  `USU_RG` varchar(10) NOT NULL,
  `USU_EMAIL` varchar(255) NOT NULL,
  `USU_SENHA` varchar(20) NOT NULL,
  `USU_NUMERO_CELULAR` varchar(13) NOT NULL,
  `USU_TELEFONE` varchar(13) DEFAULT NULL,
  `USU_DATA_DE_NASCIMENTO` date NOT NULL,
  `USU_NOME` varchar(100) NOT NULL,
  `USU_NUMERO_RESIDENCIA` varchar(4) NOT NULL,
  `USU_SEXO` enum('M','F','O') NOT NULL,
  `USU_CEP` varchar(8) NOT NULL,
  `USU_COMPLEMENTO` varchar(100) DEFAULT NULL,
  `USU_FOTO` varchar(255) DEFAULT NULL,
  `USU_ATIVO` tinyint(1) DEFAULT NULL,
  `USU_NOME_SOCIAL` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`USU_ID`),
  UNIQUE KEY `USU_CPF` (`USU_CPF`),
  UNIQUE KEY `USU_EMAIL` (`USU_EMAIL`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`USU_ID`, `USU_CPF`, `USU_RG`, `USU_EMAIL`, `USU_SENHA`, `USU_NUMERO_CELULAR`, `USU_TELEFONE`, `USU_DATA_DE_NASCIMENTO`, `USU_NOME`, `USU_NUMERO_RESIDENCIA`, `USU_SEXO`, `USU_CEP`, `USU_COMPLEMENTO`, `USU_FOTO`, `USU_ATIVO`, `USU_NOME_SOCIAL`) VALUES
(1, '1234', '1234', 'teste@teste.com.br', '123455', '12313', '123', '2022-08-09', 'teste', '1', 'M', '13456788', 'teste', 'teste.jpg', 1, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
