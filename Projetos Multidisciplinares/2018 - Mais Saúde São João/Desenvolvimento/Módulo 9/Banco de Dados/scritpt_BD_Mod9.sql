CREATE DATABASE IF NOT EXISTS BD_MOD_09;
USE BD_MOD_09 ;


CREATE TABLE TIPOS_ALIMENTOS (
TPA_CODIGO INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
TPA_NOME VARCHAR(100) NOT NULL,
NUT_CODIGO INTEGER
);

CREATE TABLE RECEITA (
REC_CODIGO INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
REC_NOME VARCHAR(100) NOT NULL,
REC_FOTO VARCHAR(255),
REC_RENDIMENTO DECIMAL(10,2),
REC_TEMPO_PREPARO INTEGER,
REC_MODO_PREPARO VARCHAR(5000) NOT NULL,
REC_INGREDIENTES VARCHAR(500) NOT NULL,
USU_CODIGO INTEGER
);
CREATE DATABASE IF NOT EXISTS BD_MOD_09;
USE BD_MOD_09 ;
CREATE TABLE USUARIOS (
USU_CODIGO INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
USU_NOME VARCHAR(100) NOT NULL
);

CREATE TABLE UNIDADE_DE_MEDIDA (
UNI_CODIGO INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
UNI_NOME VARCHAR(50) NOT NULL,
UNI_NOME_ABREVIADO VARCHAR(10) NOT NULL,
NUT_CODIGO INTEGER
);

CREATE TABLE NUTRICIONISTA (
NUT_CODIGO INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
NUT_NOME VARCHAR(50) NOT NULL
);

CREATE TABLE ALIMENTOS (
ALI_CODIGO INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
ALI_NOME VARCHAR(100) NOT NULL,
ALI_CALORICAS DECIMAL(10,2),
ALI_CARBOIDRATOS DECIMAL(10,2),
ALI_PROTEINA DECIMAL(10,2),
ALI_PORCAO DECIMAL(10,2),
ALI_GORDURA_TOTAL DECIMAL(10,2),
ALI_GORDURA_SATURADA DECIMAL(10,2),
ALI_GORDURA_TRANS DECIMAL(10,2),
ALI_FIBRA DECIMAL(10,2),
ALI_SODIO DECIMAL(10,2),
NUT_CODIGO INTEGER,
UNI_CODIGO INTEGER,
TPA_CODIGO INTEGER,
FOREIGN KEY(NUT_CODIGO) REFERENCES NUTRICIONISTA (NUT_CODIGO),
FOREIGN KEY(UNI_CODIGO) REFERENCES UNIDADE_DE_MEDIDA (UNI_CODIGO),
FOREIGN KEY(TPA_CODIGO) REFERENCES TIPOS_ALIMENTOS (TPA_CODIGO)
);

CREATE TABLE ADMINISTRADOR (
ADM_CODIGO INTEGER  NOT NULL PRIMARY KEY,
ADM_NOME VARCHAR (100) NOT NULL
);

CREATE TABLE MEUS_ALIMENTOS (
MEU_CODIGO INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
MEU_NOME VARCHAR(100) NOT NULL,
MEU_PORCAO DECIMAL(10,2),
MEU_CARBOIDRATOS DECIMAL(10,2),
MEU_CALORIAS DECIMAL(10,2),
MEU_PROTEINAS DECIMAL(10,2),
MEU_GOR_TOTAL DECIMAL(10,2),
MEU_GOR_SATURADA DECIMAL(10,2),
MEU_GOR_TRANS DECIMAL(10,2),
MEU_FIBRAS DECIMAL(10,2),
MEU_SODIO DECIMAL(10,2),
USU_CODIGO INTEGER,
TPA_CODIGO INTEGER,
UNI_CODIGO INTEGER,
FOREIGN KEY(USU_CODIGO) REFERENCES USUARIOS (USU_CODIGO),
FOREIGN KEY(TPA_CODIGO) REFERENCES TIPOS_ALIMENTOS (TPA_CODIGO),
FOREIGN KEY(UNI_CODIGO) REFERENCES UNIDADE_DE_MEDIDA (UNI_CODIGO)
);

CREATE TABLE RECEITAS_DENUNCIADAS (
RED_CODIGO INTEGER AUTO_INCREMENT NOT NULL,
RED_DATA_HORA_DENUNCIA DATETIME,
RED_MOTIVO VARCHAR(500) NOT NULL,
USU_CODIGO INTEGER NOT NULL,
REC_CODIGO INTEGER NOT NULL,
ADM_CODIGO INTEGER  NOT NULL,
PRIMARY KEY(RED_CODIGO,USU_CODIGO,REC_CODIGO,ADM_CODIGO)
);

ALTER TABLE TIPOS_ALIMENTOS ADD FOREIGN KEY(NUT_CODIGO) REFERENCES NUTRICIONISTA (NUT_CODIGO);
ALTER TABLE RECEITA ADD FOREIGN KEY(USU_CODIGO) REFERENCES USUARIOS (USU_CODIGO);
ALTER TABLE UNIDADE_DE_MEDIDA ADD FOREIGN KEY(NUT_CODIGO) REFERENCES NUTRICIONISTA (NUT_CODIGO)
