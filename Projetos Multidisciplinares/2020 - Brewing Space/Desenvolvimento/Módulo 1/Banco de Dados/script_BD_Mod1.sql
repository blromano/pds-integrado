/* Modulo1_Modelo_Logico: */
CREATE DATABASE USUARIO;
USE USUARIO;

CREATE TABLE USUARIOS (
    USU_ID INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
    USU_NOME_COMPLETO VARCHAR(255) NOT NULL,
    USU_EMAIL VARCHAR(255) NOT NULL,
    USU_CPF VARCHAR(11) UNIQUE NOT NULL,
    USU_DATA_NASCIMENTO DATE NOT NULL,
    USU_SENHA VARCHAR(100) NOT NULL,
    USU_IMAGEM_PERFIL VARCHAR(255),
    USU_TIPO_USUARIO INTEGER NOT NULL,
    USU_HABILITAR_USUARIO INTEGER NOT NULL
);

CREATE TABLE MICROCERVEJARIAS (
    MIC_ID INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
    MIC_NOME VARCHAR(255) NOT NULL,
    MIC_EMAIL VARCHAR(255) NOT NULL,
    MIC_NOME_EMPRESARIO VARCHAR(255) NOT NULL,
    MIC_TELEFONE VARCHAR(13) NOT NULL,
    MIC_DESCRICAO VARCHAR(255) NOT NULL,
    MIC_IMAGEM VARCHAR(255),
    MIC_CNPJ VARCHAR(14) UNIQUE NOT NULL,
    MIC_RUA VARCHAR(255) NOT NULL,
    MIC_NUMERO INTEGER NOT NULL,
    MIC_BAIRRO VARCHAR(255) NOT NULL,
    MIC_CIDADE VARCHAR(255) NOT NULL,
    MIC_ESTADO VARCHAR(2) NOT NULL,
    MIC_CEP VARCHAR(10) NOT NULL,
    MIC_FACEBOOK VARCHAR(255),
    MIC_INSTAGRAM VARCHAR(255),
    FK_USUARIOS_USU_ID INTEGER NOT NULL
);

CREATE TABLE FEEDBACKS (
    FEE_ID INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
    FEE_EMAIL VARCHAR(255) NOT NULL,
    FEE_ASSUNTO VARCHAR(255) NOT NULL,
    FEE_MENSAGEM TEXT NOT NULL
);

CREATE TABLE CERVEJAS (
    CER_ID INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
    CER_NOME VARCHAR(100) NOT NULL
);

CREATE TABLE RESPOSTAS_FEEDBACKS (
    RES_MENSAGEM TEXT NOT NULL,
    RES_ID INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
    FK_FEEDBACKS_FEE_ID INTEGER NOT NULL,
    FK_USU_ID INTEGER NOT NULL
);

CREATE TABLE AVALIACAO_CERVEJA (
    FK_CERVEJAS_CER_ID INTEGER NOT NULL,
    FK_USUARIOS_USU_ID INTEGER NOT NULL,
    AVA_ID INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
    AVA_NOTA INTEGER NOT NULL
);

CREATE TABLE CHECKLISTS (
    FK_CERVEJAS_CER_ID INTEGER NOT NULL,
    FK_USUARIOS_USU_ID INTEGER NOT NULL,
    CHE_ID INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY
);
 
ALTER TABLE MICROCERVEJARIAS ADD CONSTRAINT FK_MICROCERVEJARIAS_2
    FOREIGN KEY (FK_USUARIOS_USU_ID)
    REFERENCES USUARIOS (USU_ID);
 
ALTER TABLE RESPOSTAS_FEEDBACKS ADD CONSTRAINT FK_RESPOSTAS_FEEDBACKS_2
    FOREIGN KEY (FK_FEEDBACKS_FEE_ID)
    REFERENCES FEEDBACKS (FEE_ID);
 
ALTER TABLE RESPOSTAS_FEEDBACKS ADD CONSTRAINT FK_RESPOSTAS_FEEDBACKS_3
    FOREIGN KEY (FK_USU_ID)
    REFERENCES USUARIOS (USU_ID);
 
ALTER TABLE AVALIACAO_CERVEJA ADD CONSTRAINT FK_AVALIACAO_CERVEJA_2
    FOREIGN KEY (FK_CERVEJAS_CER_ID)
    REFERENCES CERVEJAS (CER_ID);
 
ALTER TABLE AVALIACAO_CERVEJA ADD CONSTRAINT FK_AVALIACAO_CERVEJA_3
    FOREIGN KEY (FK_USUARIOS_USU_ID)
    REFERENCES USUARIOS (USU_ID);
 
ALTER TABLE CHECKLISTS ADD CONSTRAINT FK_CHECKLISTS_2
    FOREIGN KEY (FK_CERVEJAS_CER_ID)
    REFERENCES CERVEJAS (CER_ID);
 
ALTER TABLE CHECKLISTS ADD CONSTRAINT FK_CHECKLISTS_3
    FOREIGN KEY (FK_USUARIOS_USU_ID)
    REFERENCES USUARIOS (USU_ID);