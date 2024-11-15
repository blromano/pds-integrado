CREATE DATABASE geracoes;
USE geracoes;

CREATE TABLE REFEICOES_PLANO (
    REF_PLA_ID INTEGER,
    REF_PLA_QTD_CALORIAS_REFEICAO DECIMAL(10,2),
    REF_PLA_DATA_REFEICAO DATE,
    REF_PLA_OBSERVACOES VARCHAR(255),
    FK_PLANOS_ALIMENTARES_PLA_ALI_ID INTEGER,
    FK_TIPOS_REFEICOES_RFC_ID INTEGER
);

CREATE TABLE ALIMENTOS (
    ALI_QUANTIDADE DECIMAL(10,2),
    ALI_CALORIA DECIMAL (10,2),
    ALI_ID INTEGER,
    ALI_NOME VARCHAR(50),
    FK_TIPO_ALIMENTOS_TIP_ALI_ID INTEGER,
    FK_UNIDADES_ALIMENTOS_UNI_ID INTEGER
);

CREATE TABLE PLANOS_ALIMENTARES (
    PLA_ALI_ID INTEGER,
    PLA_ALI_DATA_TERMINO DATE,
    PLA_ALI_DATA_INICIO DATE,
    FK_NUTRICIONISTAS_NUT_ID INTEGER
);

CREATE TABLE AMOSTRAS (
    AMT_NOME VARCHAR(50),
    AMT_ID INTEGER,
    AMT_FOTO BLOB,
    AMT_DATA_HORA_SAIDA DATETIME,
    AMT_DATA_HORA_ENTRADA DATETIME,
    FK_REFEICOES_PLANO_REF_PLA_ID INTEGER
);

CREATE TABLE TIPOS_REFEICOES (
    RFC_ID INTEGER,
    RFC_NOME VARCHAR(20)
);

CREATE TABLE PADRAO_ALIMENTAR_IDOSO (
    PAI_ID INTEGER,
    FK_STATUS_ALIMENTACAO_STA_ALI_ID INTEGER,
    FK_ENFERMEIROS_ENF_ID INTEGER,
    FK_REFEICOES_PLANO_REF_PLA_ID INTEGER,
    FK_IDOSOS_IDO_ID INTEGER
);

CREATE TABLE UNIDADES_ALIMENTOS (
    UNI_ID INTEGER,
    UNI_NOME VARCHAR(2)
);

CREATE TABLE TIPO_ALIMENTOS (
    TIP_ALI_NOME VARCHAR(50),
    TIP_ALI_ID INTEGER
);

CREATE TABLE NUTRICIONISTAS (
    NUT_NOME VARCHAR(100),
    NUT_ID INTEGER
);

CREATE TABLE FICHAS_CONSULTAS_NUTRICIONAIS (
    FCN_HISTORICO VARCHAR(250),
    FCN_ID INTEGER,
    FCN_OBSERVACOES VARCHAR(250),
    CON_NUT_ID INTEGER,
    CON_NUT_LOCAL VARCHAR(10),
    CON_NUT_DATA_HORA DATETIME,
    FK_IDOSOS_IDO_ID INTEGER,
    FK_NUTRICIONISTAS_NUT_ID INTEGER
);

CREATE TABLE IDOSOS (
    IDO_ID INTEGER,
    IDO_NOME VARCHAR(100)
);

CREATE TABLE STATUS_ALIMENTACAO (
    STA_ALI_DESCRICAO VARCHAR(20),
    STA_ALI_ID INTEGER
);

CREATE TABLE ENFERMEIROS (
    ENF_ID INTEGER,
    ENF_NOME VARCHAR(100)
);

CREATE TABLE REFEICOES_ALIMENTOS (
    FK_ALIMENTOS_ALI_ID INTEGER,
    FK_REFEICOES_PLANO_REF_PLA_ID INTEGER,
    DAD_ALI_ID INTEGER,
    DAD_ALI_QUANTIDADE DECIMAL(10,2)
);