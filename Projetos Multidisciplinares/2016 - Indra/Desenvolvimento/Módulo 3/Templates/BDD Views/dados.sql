-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: projeto
-- ------------------------------------------------------
-- Server version	5.5.16

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `alertas_criticos`
--

DROP TABLE IF EXISTS `alertas_criticos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alertas_criticos` (
  `ALC_DATA_HORA_ALERTA` datetime NOT NULL,
  `ALC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ALC_VALOR_MEDICAO` float NOT NULL,
  `SEN_ID` int(11) NOT NULL,
  PRIMARY KEY (`ALC_ID`),
  KEY `SEN_ID` (`SEN_ID`),
  CONSTRAINT `alertas_criticos_ibfk_1` FOREIGN KEY (`SEN_ID`) REFERENCES `sensores_instalados_sensores` (`SEN_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alertas_criticos`
--

LOCK TABLES `alertas_criticos` WRITE;
/*!40000 ALTER TABLE `alertas_criticos` DISABLE KEYS */;
/*!40000 ALTER TABLE `alertas_criticos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alertas_enviados_usuarios`
--

DROP TABLE IF EXISTS `alertas_enviados_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alertas_enviados_usuarios` (
  `ALU_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ALU_DESCRICAO` varchar(500) NOT NULL,
  `ALU_RUA` varchar(50) NOT NULL,
  `ALU_BAIRRO` varchar(50) NOT NULL,
  `ALU_URL_FOTO_4` varchar(100) DEFAULT NULL,
  `ALU_CIDADE` varchar(30) NOT NULL,
  `ALU_URL_FOTO_1` varchar(100) NOT NULL,
  `ALU_URL_FOTO_2` varchar(100) DEFAULT NULL,
  `ALU_URL_FOTO_3` varchar(100) DEFAULT NULL,
  `ALU_URL_FOTO_5` varchar(100) DEFAULT NULL,
  `ALU_DATA_HORA_ALERTA` datetime NOT NULL,
  `USU_ID` int(11) DEFAULT NULL,
  `TAL_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ALU_ID`),
  KEY `TAL_ID` (`TAL_ID`),
  KEY `USU_ID` (`USU_ID`),
  CONSTRAINT `alertas_enviados_usuarios_ibfk_2` FOREIGN KEY (`USU_ID`) REFERENCES `usuarios` (`USU_ID`),
  CONSTRAINT `alertas_enviados_usuarios_ibfk_1` FOREIGN KEY (`TAL_ID`) REFERENCES `tipo_alerta` (`TAL_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alertas_enviados_usuarios`
--

LOCK TABLES `alertas_enviados_usuarios` WRITE;
/*!40000 ALTER TABLE `alertas_enviados_usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `alertas_enviados_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alunos_envolvidos`
--

DROP TABLE IF EXISTS `alunos_envolvidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alunos_envolvidos` (
  `ALE_URL_CURRICULO` varchar(500) NOT NULL,
  `ALE_DESCRICAO_CURRICULO` varchar(500) NOT NULL,
  `ALE_NOME` varchar(100) NOT NULL,
  `ALE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ALE_PAPEL` varchar(11) NOT NULL,
  `ALE_URL_FOTO` varchar(250) NOT NULL,
  `MOD_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ALE_ID`),
  KEY `MOD_ID` (`MOD_ID`),
  CONSTRAINT `alunos_envolvidos_ibfk_1` FOREIGN KEY (`MOD_ID`) REFERENCES `modulo` (`MOD_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alunos_envolvidos`
--

LOCK TABLES `alunos_envolvidos` WRITE;
/*!40000 ALTER TABLE `alunos_envolvidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `alunos_envolvidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arquivo_pcd_importado`
--

DROP TABLE IF EXISTS `arquivo_pcd_importado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `arquivo_pcd_importado` (
  `API_ID` int(11) NOT NULL AUTO_INCREMENT,
  `API_DATA_HORA_IMPORTACAO` datetime NOT NULL,
  `API_URL_ARQUIVO` varchar(250) DEFAULT NULL,
  `PCD_ID` int(11) DEFAULT NULL,
  `USU_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`API_ID`),
  KEY `PCD_ID` (`PCD_ID`),
  KEY `USU_ID` (`USU_ID`),
  CONSTRAINT `arquivo_pcd_importado_ibfk_2` FOREIGN KEY (`USU_ID`) REFERENCES `usuarios` (`USU_ID`),
  CONSTRAINT `arquivo_pcd_importado_ibfk_1` FOREIGN KEY (`PCD_ID`) REFERENCES `pcds` (`PCD_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arquivo_pcd_importado`
--

LOCK TABLES `arquivo_pcd_importado` WRITE;
/*!40000 ALTER TABLE `arquivo_pcd_importado` DISABLE KEYS */;
INSERT INTO `arquivo_pcd_importado` VALUES (1,'0000-00-00 00:00:00','asdasdas',1,1),(2,'0000-00-00 00:00:00',NULL,NULL,NULL);
/*!40000 ALTER TABLE `arquivo_pcd_importado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa` (
  `EMP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `EMP_RAZAO_SOCIAL` varchar(150) NOT NULL,
  `EMP_RAMO_EMPRESA` varchar(100) NOT NULL,
  PRIMARY KEY (`EMP_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especialistas`
--

DROP TABLE IF EXISTS `especialistas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `especialistas` (
  `ESP_RG` varchar(9) NOT NULL,
  `ESP_ESPECIALIZACAO` varchar(100) NOT NULL,
  `ESP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ESP_CPF` varchar(11) NOT NULL,
  `USU_ID` int(11) DEFAULT NULL,
  `EMP_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ESP_ID`),
  KEY `EMP_ID` (`EMP_ID`),
  KEY `USU_ID` (`USU_ID`),
  CONSTRAINT `especialistas_ibfk_2` FOREIGN KEY (`USU_ID`) REFERENCES `usuarios` (`USU_ID`),
  CONSTRAINT `especialistas_ibfk_1` FOREIGN KEY (`EMP_ID`) REFERENCES `empresa` (`EMP_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especialistas`
--

LOCK TABLES `especialistas` WRITE;
/*!40000 ALTER TABLE `especialistas` DISABLE KEYS */;
/*!40000 ALTER TABLE `especialistas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback` (
  `FEE_TOPICO` varchar(50) NOT NULL,
  `FEE_VISUALIZADO` tinyint(1) DEFAULT NULL,
  `FEE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FEE_MENSAGEM` varchar(1000) NOT NULL,
  `FEE_DATA_HORA_ENVIO` datetime DEFAULT NULL,
  `USU_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`FEE_ID`),
  KEY `USU_ID` (`USU_ID`),
  CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`USU_ID`) REFERENCES `usuarios` (`USU_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historico_mudancas_status_sensores`
--

DROP TABLE IF EXISTS `historico_mudancas_status_sensores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historico_mudancas_status_sensores` (
  `HMS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `HMS_STATUS_ALTERADO` tinyint(1) NOT NULL,
  `HMS_DATA_HORA_ALTERACAO` datetime NOT NULL,
  `HMS_MOTIVO_MUDANCA_STATUS` varchar(100) NOT NULL,
  `SEN_ID` int(11) NOT NULL,
  PRIMARY KEY (`HMS_ID`),
  KEY `SEN_ID` (`SEN_ID`),
  CONSTRAINT `historico_mudancas_status_sensores_ibfk_1` FOREIGN KEY (`SEN_ID`) REFERENCES `sensores_instalados_sensores` (`SEN_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historico_mudancas_status_sensores`
--

LOCK TABLES `historico_mudancas_status_sensores` WRITE;
/*!40000 ALTER TABLE `historico_mudancas_status_sensores` DISABLE KEYS */;
/*!40000 ALTER TABLE `historico_mudancas_status_sensores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historico_status_funcionamento_pcd`
--

DROP TABLE IF EXISTS `historico_status_funcionamento_pcd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historico_status_funcionamento_pcd` (
  `HFP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `HFP_DATA_HORA_ALTERACAO` datetime NOT NULL,
  `HFP_MOTIVO_MUDANCA_STATUS` varchar(100) NOT NULL,
  `HFP_STATUS_ALTERADO` tinyint(1) NOT NULL,
  `PCD_ID` int(11) DEFAULT NULL,
  `USU_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`HFP_ID`),
  KEY `PCD_ID` (`PCD_ID`),
  KEY `USU_ID` (`USU_ID`),
  CONSTRAINT `historico_status_funcionamento_pcd_ibfk_2` FOREIGN KEY (`USU_ID`) REFERENCES `usuarios` (`USU_ID`),
  CONSTRAINT `historico_status_funcionamento_pcd_ibfk_1` FOREIGN KEY (`PCD_ID`) REFERENCES `pcds` (`PCD_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historico_status_funcionamento_pcd`
--

LOCK TABLES `historico_status_funcionamento_pcd` WRITE;
/*!40000 ALTER TABLE `historico_status_funcionamento_pcd` DISABLE KEYS */;
/*!40000 ALTER TABLE `historico_status_funcionamento_pcd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagens_pcd`
--

DROP TABLE IF EXISTS `imagens_pcd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imagens_pcd` (
  `IMG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `IMG_URL_FOTO` varchar(100) NOT NULL,
  `IMG_LEGENDA` varchar(100) NOT NULL,
  PRIMARY KEY (`IMG_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagens_pcd`
--

LOCK TABLES `imagens_pcd` WRITE;
/*!40000 ALTER TABLE `imagens_pcd` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagens_pcd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instituicoes`
--

DROP TABLE IF EXISTS `instituicoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instituicoes` (
  `INS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `INS_CNPJ` int(11) NOT NULL,
  `INS_NOME_FANTASIA` varchar(100) NOT NULL,
  `INS_RAZAO_SOCIAL` varchar(150) NOT NULL,
  `USU_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`INS_ID`),
  KEY `USU_ID` (`USU_ID`),
  CONSTRAINT `instituicoes_ibfk_1` FOREIGN KEY (`USU_ID`) REFERENCES `usuarios` (`USU_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instituicoes`
--

LOCK TABLES `instituicoes` WRITE;
/*!40000 ALTER TABLE `instituicoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `instituicoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medicoes`
--

DROP TABLE IF EXISTS `medicoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medicoes` (
  `MED_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MED_DADO` varchar(10) NOT NULL,
  `MED_DATA_HORA_MEDICAO` datetime NOT NULL,
  `API_ID` int(11) DEFAULT NULL,
  `SEN_ID` int(11) NOT NULL,
  PRIMARY KEY (`MED_ID`),
  KEY `API_ID` (`API_ID`),
  KEY `SEN_ID` (`SEN_ID`),
  CONSTRAINT `medicoes_ibfk_2` FOREIGN KEY (`SEN_ID`) REFERENCES `sensores_instalados_sensores` (`SEN_ID`),
  CONSTRAINT `medicoes_ibfk_1` FOREIGN KEY (`API_ID`) REFERENCES `arquivo_pcd_importado` (`API_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicoes`
--

LOCK TABLES `medicoes` WRITE;
/*!40000 ALTER TABLE `medicoes` DISABLE KEYS */;
INSERT INTO `medicoes` VALUES (1,'100','0000-00-00 00:00:00',1,1),(2,'200','0000-00-00 00:00:00',1,2);
/*!40000 ALTER TABLE `medicoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `medicoestemp`
--

DROP TABLE IF EXISTS `medicoestemp`;
/*!50001 DROP VIEW IF EXISTS `medicoestemp`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `medicoestemp` (
  `ID_PCD` tinyint NOT NULL,
  `DADO` tinyint NOT NULL,
  `DATA_MED` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `medicoesuv`
--

DROP TABLE IF EXISTS `medicoesuv`;
/*!50001 DROP VIEW IF EXISTS `medicoesuv`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `medicoesuv` (
  `ID_PCD` tinyint NOT NULL,
  `DADO` tinyint NOT NULL,
  `DATA_MED` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `modulo`
--

DROP TABLE IF EXISTS `modulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modulo` (
  `MOD_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MOD_NOME` varchar(100) NOT NULL,
  `MOD_DESCRICAO` varchar(100) NOT NULL,
  `PRJ_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`MOD_ID`),
  KEY `PRJ_ID` (`PRJ_ID`),
  CONSTRAINT `modulo_ibfk_1` FOREIGN KEY (`PRJ_ID`) REFERENCES `projeto` (`PRJ_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modulo`
--

LOCK TABLES `modulo` WRITE;
/*!40000 ALTER TABLE `modulo` DISABLE KEYS */;
/*!40000 ALTER TABLE `modulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `niveis_de_acessos`
--

DROP TABLE IF EXISTS `niveis_de_acessos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `niveis_de_acessos` (
  `NIV_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NIV_TIPO` varchar(40) NOT NULL,
  PRIMARY KEY (`NIV_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `niveis_de_acessos`
--

LOCK TABLES `niveis_de_acessos` WRITE;
/*!40000 ALTER TABLE `niveis_de_acessos` DISABLE KEYS */;
INSERT INTO `niveis_de_acessos` VALUES (1,'1');
/*!40000 ALTER TABLE `niveis_de_acessos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `niveis_privilegios`
--

DROP TABLE IF EXISTS `niveis_privilegios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `niveis_privilegios` (
  `NPR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PRI_ID` int(11) DEFAULT NULL,
  `NIV_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`NPR_ID`),
  KEY `PRI_ID` (`PRI_ID`),
  KEY `NIV_ID` (`NIV_ID`),
  CONSTRAINT `niveis_privilegios_ibfk_1` FOREIGN KEY (`PRI_ID`) REFERENCES `privilegios` (`PRI_ID`),
  CONSTRAINT `niveis_privilegios_ibfk_2` FOREIGN KEY (`NIV_ID`) REFERENCES `niveis_de_acessos` (`NIV_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `niveis_privilegios`
--

LOCK TABLES `niveis_privilegios` WRITE;
/*!40000 ALTER TABLE `niveis_privilegios` DISABLE KEYS */;
INSERT INTO `niveis_privilegios` VALUES (1,1,1);
/*!40000 ALTER TABLE `niveis_privilegios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orgaos_e_colaboradores`
--

DROP TABLE IF EXISTS `orgaos_e_colaboradores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orgaos_e_colaboradores` (
  `ORC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ORC_EMAIL` varchar(50) NOT NULL,
  `ORC_NOME` varchar(100) NOT NULL,
  `ORC_CONTATO` varchar(11) NOT NULL,
  PRIMARY KEY (`ORC_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orgaos_e_colaboradores`
--

LOCK TABLES `orgaos_e_colaboradores` WRITE;
/*!40000 ALTER TABLE `orgaos_e_colaboradores` DISABLE KEYS */;
/*!40000 ALTER TABLE `orgaos_e_colaboradores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parametros_de_alertas`
--

DROP TABLE IF EXISTS `parametros_de_alertas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parametros_de_alertas` (
  `PRA_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PRA_VALOR_MAXIMO` int(5) NOT NULL,
  `PRA_VALOR_MINIMO` int(11) NOT NULL,
  `PRA_COR_MINIMA` varchar(30) NOT NULL,
  `PRA_COR_MAXIMA` varchar(30) NOT NULL,
  `SEN_ID` int(11) NOT NULL,
  PRIMARY KEY (`PRA_ID`),
  KEY `SEN_ID` (`SEN_ID`),
  CONSTRAINT `parametros_de_alertas_ibfk_1` FOREIGN KEY (`SEN_ID`) REFERENCES `sensores_instalados_sensores` (`SEN_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parametros_de_alertas`
--

LOCK TABLES `parametros_de_alertas` WRITE;
/*!40000 ALTER TABLE `parametros_de_alertas` DISABLE KEYS */;
/*!40000 ALTER TABLE `parametros_de_alertas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pcds`
--

DROP TABLE IF EXISTS `pcds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pcds` (
  `PCD_CIDADE` varchar(50) DEFAULT NULL,
  `PCD_LATITUDE` varchar(100) DEFAULT NULL,
  `PCD_STATUS_FUNCIONAMENTO` tinyint(1) NOT NULL,
  `PCD_DESCRICAO` varchar(1000) DEFAULT NULL,
  `PCD_LONGITUDE` varchar(100) DEFAULT NULL,
  `PCD_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PCD_ESTADO` varchar(2) NOT NULL,
  PRIMARY KEY (`PCD_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pcds`
--

LOCK TABLES `pcds` WRITE;
/*!40000 ALTER TABLE `pcds` DISABLE KEYS */;
INSERT INTO `pcds` VALUES ('1','1111',1,'PCD_1','1111',1,'1');
/*!40000 ALTER TABLE `pcds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pcds_imagens`
--

DROP TABLE IF EXISTS `pcds_imagens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pcds_imagens` (
  `PCI_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PCI_DATA_HORA_IMAGEM` datetime NOT NULL,
  `IMG_ID` int(11) DEFAULT NULL,
  `PCD_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`PCI_ID`),
  KEY `IMG_ID` (`IMG_ID`),
  KEY `PCD_ID` (`PCD_ID`),
  CONSTRAINT `pcds_imagens_ibfk_1` FOREIGN KEY (`IMG_ID`) REFERENCES `imagens_pcd` (`IMG_ID`),
  CONSTRAINT `pcds_imagens_ibfk_2` FOREIGN KEY (`PCD_ID`) REFERENCES `pcds` (`PCD_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pcds_imagens`
--

LOCK TABLES `pcds_imagens` WRITE;
/*!40000 ALTER TABLE `pcds_imagens` DISABLE KEYS */;
/*!40000 ALTER TABLE `pcds_imagens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pcds_interesse_orgaos`
--

DROP TABLE IF EXISTS `pcds_interesse_orgaos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pcds_interesse_orgaos` (
  `PIO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PIO_DATA_HORA_INCLUSAO` datetime NOT NULL,
  `ORC_ID` int(11) DEFAULT NULL,
  `PCD_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`PIO_ID`),
  KEY `ORC_ID` (`ORC_ID`),
  KEY `PCD_ID` (`PCD_ID`),
  CONSTRAINT `pcds_interesse_orgaos_ibfk_1` FOREIGN KEY (`ORC_ID`) REFERENCES `orgaos_e_colaboradores` (`ORC_ID`),
  CONSTRAINT `pcds_interesse_orgaos_ibfk_2` FOREIGN KEY (`PCD_ID`) REFERENCES `pcds` (`PCD_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pcds_interesse_orgaos`
--

LOCK TABLES `pcds_interesse_orgaos` WRITE;
/*!40000 ALTER TABLE `pcds_interesse_orgaos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pcds_interesse_orgaos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pcds_interesse_usuario`
--

DROP TABLE IF EXISTS `pcds_interesse_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pcds_interesse_usuario` (
  `PIU_DATA_HORA_INCLUSAO` datetime NOT NULL,
  `PIU_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PCD_ID` int(11) DEFAULT NULL,
  `USU_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`PIU_ID`),
  KEY `PCD_ID` (`PCD_ID`),
  KEY `USU_ID` (`USU_ID`),
  CONSTRAINT `pcds_interesse_usuario_ibfk_1` FOREIGN KEY (`PCD_ID`) REFERENCES `pcds` (`PCD_ID`),
  CONSTRAINT `pcds_interesse_usuario_ibfk_2` FOREIGN KEY (`USU_ID`) REFERENCES `usuarios` (`USU_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pcds_interesse_usuario`
--

LOCK TABLES `pcds_interesse_usuario` WRITE;
/*!40000 ALTER TABLE `pcds_interesse_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `pcds_interesse_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `privilegios`
--

DROP TABLE IF EXISTS `privilegios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `privilegios` (
  `PRI_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PRI_NOME` varchar(100) NOT NULL,
  `PRI_DESCRICAO` varchar(1000) NOT NULL,
  PRIMARY KEY (`PRI_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `privilegios`
--

LOCK TABLES `privilegios` WRITE;
/*!40000 ALTER TABLE `privilegios` DISABLE KEYS */;
INSERT INTO `privilegios` VALUES (1,'1','1');
/*!40000 ALTER TABLE `privilegios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projeto`
--

DROP TABLE IF EXISTS `projeto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projeto` (
  `PRJ_NOME_PROJETO` varchar(100) NOT NULL,
  `PRJ_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PRJ_DESCRICAO` varchar(1000) NOT NULL,
  PRIMARY KEY (`PRJ_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projeto`
--

LOCK TABLES `projeto` WRITE;
/*!40000 ALTER TABLE `projeto` DISABLE KEYS */;
/*!40000 ALTER TABLE `projeto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sensores_instalados_sensores`
--

DROP TABLE IF EXISTS `sensores_instalados_sensores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sensores_instalados_sensores` (
  `PCD_ID` int(11) DEFAULT NULL,
  `TSE_ID` int(11) DEFAULT NULL,
  `SEN_PERIODICIDADE_MEDICAO` int(11) NOT NULL,
  `SEN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SEN_ESTADO` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`SEN_ID`),
  KEY `PCD_ID` (`PCD_ID`),
  KEY `TSE_ID` (`TSE_ID`),
  CONSTRAINT `sensores_instalados_sensores_ibfk_1` FOREIGN KEY (`PCD_ID`) REFERENCES `pcds` (`PCD_ID`),
  CONSTRAINT `sensores_instalados_sensores_ibfk_2` FOREIGN KEY (`TSE_ID`) REFERENCES `tipos_sensores` (`TSE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sensores_instalados_sensores`
--

LOCK TABLES `sensores_instalados_sensores` WRITE;
/*!40000 ALTER TABLE `sensores_instalados_sensores` DISABLE KEYS */;
INSERT INTO `sensores_instalados_sensores` VALUES (1,1,10,1,1),(1,2,5,2,1);
/*!40000 ALTER TABLE `sensores_instalados_sensores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_alerta`
--

DROP TABLE IF EXISTS `tipo_alerta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_alerta` (
  `TAL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAL_NOME` varchar(20) NOT NULL,
  PRIMARY KEY (`TAL_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_alerta`
--

LOCK TABLES `tipo_alerta` WRITE;
/*!40000 ALTER TABLE `tipo_alerta` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_alerta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_medicoes`
--

DROP TABLE IF EXISTS `tipos_medicoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipos_medicoes` (
  `TIM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TIM_NOME` varchar(100) NOT NULL,
  PRIMARY KEY (`TIM_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_medicoes`
--

LOCK TABLES `tipos_medicoes` WRITE;
/*!40000 ALTER TABLE `tipos_medicoes` DISABLE KEYS */;
INSERT INTO `tipos_medicoes` VALUES (1,'Inteiro'),(2,'Real');
/*!40000 ALTER TABLE `tipos_medicoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_sensores`
--

DROP TABLE IF EXISTS `tipos_sensores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipos_sensores` (
  `TSE_UNIDADE_MEDIDA` varchar(50) NOT NULL,
  `TSE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TSE_TIPO_SENSOR` varchar(100) NOT NULL,
  `TIM_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`TSE_ID`),
  KEY `TIM_ID` (`TIM_ID`),
  CONSTRAINT `tipos_sensores_ibfk_1` FOREIGN KEY (`TIM_ID`) REFERENCES `tipos_medicoes` (`TIM_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_sensores`
--

LOCK TABLES `tipos_sensores` WRITE;
/*!40000 ALTER TABLE `tipos_sensores` DISABLE KEYS */;
INSERT INTO `tipos_sensores` VALUES ('GRAUS',1,'Temperatura',1),('UV',2,'UV',2);
/*!40000 ALTER TABLE `tipos_sensores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `USU_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USU_NOME` varchar(100) NOT NULL,
  `USU_DATA_NASCIMENTO` date NOT NULL,
  `USU_EMAIL` varchar(100) NOT NULL,
  `USU_SENHA` varchar(40) NOT NULL,
  `USU_DATA_ATIVACAO` date NOT NULL,
  `USU_CODIGO_ATIVACAO` int(11) NOT NULL,
  `USU_RUA` varchar(100) NOT NULL,
  `USU_DATA_RECUPERACAO_SENHA` date DEFAULT NULL,
  `USU_PODERES_ADMINISTRATIVOS` tinyint(1) DEFAULT NULL,
  `USU_STATUS_ATIVACAO` tinyint(1) NOT NULL,
  `USU_NUMERO_RESIDENCIA` varchar(10) NOT NULL,
  `USU_CEP` int(11) NOT NULL,
  `USU_COMPLEMENTO` varchar(100) DEFAULT NULL,
  `NIV_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`USU_ID`),
  KEY `NIV_ID` (`NIV_ID`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`NIV_ID`) REFERENCES `niveis_de_acessos` (`NIV_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'1','0000-00-00','1','1','0000-00-00',1,'1','0000-00-00',1,1,'1',1,'1',1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `medicoestemp`
--

/*!50001 DROP TABLE IF EXISTS `medicoestemp`*/;
/*!50001 DROP VIEW IF EXISTS `medicoestemp`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `medicoestemp` AS select `pcds`.`PCD_ID` AS `ID_PCD`,`med`.`MED_DADO` AS `DADO`,`med`.`MED_DATA_HORA_MEDICAO` AS `DATA_MED` from (((`pcds` join `sensores_instalados_sensores` `sis` on((`sis`.`PCD_ID` = `pcds`.`PCD_ID`))) join `tipos_sensores` `ts` on((`ts`.`TSE_ID` = `sis`.`TSE_ID`))) join `medicoes` `med` on((`med`.`SEN_ID` = `sis`.`SEN_ID`))) where (`sis`.`SEN_ID` = 1) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `medicoesuv`
--

/*!50001 DROP TABLE IF EXISTS `medicoesuv`*/;
/*!50001 DROP VIEW IF EXISTS `medicoesuv`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `medicoesuv` AS select `pcds`.`PCD_ID` AS `ID_PCD`,`med`.`MED_DADO` AS `DADO`,`med`.`MED_DATA_HORA_MEDICAO` AS `DATA_MED` from (((`pcds` join `sensores_instalados_sensores` `sis` on((`sis`.`PCD_ID` = `pcds`.`PCD_ID`))) join `tipos_sensores` `ts` on((`ts`.`TSE_ID` = `sis`.`TSE_ID`))) join `medicoes` `med` on((`med`.`SEN_ID` = `sis`.`SEN_ID`))) where (`sis`.`SEN_ID` = 2) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-30 17:00:59
