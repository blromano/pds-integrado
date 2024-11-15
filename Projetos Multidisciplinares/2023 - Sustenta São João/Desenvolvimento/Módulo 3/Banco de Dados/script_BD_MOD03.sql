/* L�gico_1: */

CREATE TABLE DENUNCIAS (
    DEN_ID INTEGER AUTO_INCREMENT PRIMARY KEY,
    DEN_TITULO VARCHAR(100) NOT NULL,
    DEN_DESCRICAO TEXT NOT NULL,
    DEN_FOTO_VIDEO VARCHAR(255) NOT NULL,
    DEN_DATA_PUBLICACAO DATETIME NOT NULL,
    DEN_STATUS_DENUNCIA ENUM( 'R', 'A', 'NR') NOT NULL,
    DEN_DATA_ALT_STATUS DATETIME NOT NULL,
    DEN_CEP INTEGER NOT NULL,
    DEN_RUA VARCHAR(100) NOT NULL,
    DEN_NUMERO INTEGER NOT NULL,
    DEN_COMPLEMENTO VARCHAR(100),
    DEN_BAIRRO VARCHAR(100) NOT NULL,
    DEN_QDE_CURTIDA INTEGER,
    FK_USUARIOS_USR_ID INTEGER,
    FK_GESTORES_GES_ID INTEGER
);

CREATE TABLE COMENTARIOS (
    COM_ID INTEGER AUTO_INCREMENT PRIMARY KEY,
    COM_DATA_HORA DATETIME NOT NULL,
    COM_TEXTO TEXT NOT NULL,
    FK_DENUNCIAS_DEN_ID INTEGER,
    FK_USUARIOS_USR_ID INTEGER
);

CREATE TABLE USUARIOS (
    USR_ID INTEGER AUTO_INCREMENT PRIMARY KEY,
    USR_NOME VARCHAR(50) NOT NULL
);

CREATE TABLE GESTORES (
    GES_ID INTEGER AUTO_INCREMENT PRIMARY KEY
);

CREATE TABLE VIOLACOES (
    VIO_ID INTEGER AUTO_INCREMENT PRIMARY KEY,
    VIO_DESCRICAO TEXT NOT NULL,
    VIO_IMAGEM VARCHAR(255) NOT NULL,
    FK_DENUNCIAS_DEN_ID INTEGER,
    FK_USUARIOS_USR_ID INTEGER
);

CREATE TABLE PUNICOES (
    PUN_ID INTEGER AUTO_INCREMENT PRIMARY KEY,
    PUN_JUSTIFICATIVA TEXT NOT NULL,
    PUN_MOTIVO ENUM('PALAVRAS PERJORATIVAS','ODIO GRATUITO,�CONTEUDO PORNOGRAFICO','COMENTARIOS OFENSIVOS') NOT NULL,
    PUN_TEMPO ENUM('24 HORAS','7 DIAS','1 MES','BANIMENTO DEFINITIVO') NOT NULL,
    FK_VIOLACOES_VIO_ID INTEGER
);

CREATE TABLE DENUNCIAS_CURTIDAS (
    FK_DENUNCIAS_DEN_ID INTEGER,
    FK_USUARIOS_USR_ID INTEGER,
    DEC_ID INTEGER AUTO_INCREMENT PRIMARY KEY
);
 
ALTER TABLE DENUNCIAS ADD CONSTRAINT FK_DENUNCIAS_2
    FOREIGN KEY (FK_USUARIOS_USR_ID)
    REFERENCES USUARIOS (USR_ID)
    ON DELETE CASCADE;
 
ALTER TABLE DENUNCIAS ADD CONSTRAINT FK_DENUNCIAS_3
    FOREIGN KEY (FK_GESTORES_GES_ID)
    REFERENCES GESTORES (GES_ID)
    ON DELETE SET NULL;
 
ALTER TABLE COMENTARIOS ADD CONSTRAINT FK_COMENTARIOS_2
    FOREIGN KEY (FK_DENUNCIAS_DEN_ID)
    REFERENCES DENUNCIAS (DEN_ID)
    ON DELETE CASCADE;
 
ALTER TABLE COMENTARIOS ADD CONSTRAINT FK_COMENTARIOS_3
    FOREIGN KEY (FK_USUARIOS_USR_ID)
    REFERENCES USUARIOS (USR_ID)
    ON DELETE CASCADE;
 
ALTER TABLE VIOLACOES ADD CONSTRAINT FK_VIOLACOES_2
    FOREIGN KEY (FK_DENUNCIAS_DEN_ID)
    REFERENCES DENUNCIAS (DEN_ID)
    ON DELETE CASCADE;
 
ALTER TABLE VIOLACOES ADD CONSTRAINT FK_VIOLACOES_3
    FOREIGN KEY (FK_USUARIOS_USR_ID)
    REFERENCES USUARIOS (USR_ID)
    ON DELETE CASCADE;
 
ALTER TABLE PUNICOES ADD CONSTRAINT FK_PUNICOES_2
    FOREIGN KEY (FK_VIOLACOES_VIO_ID)
    REFERENCES VIOLACOES (VIO_ID)
    ON DELETE CASCADE;
 
ALTER TABLE DENUNCIAS_CURTIDAS ADD CONSTRAINT FK_DENUNCIAS_CURTIDAS_2
    FOREIGN KEY (FK_DENUNCIAS_DEN_ID)
    REFERENCES DENUNCIAS (DEN_ID)
    ON DELETE SET NULL;
 
ALTER TABLE DENUNCIAS_CURTIDAS ADD CONSTRAINT FK_DENUNCIAS_CURTIDAS_3
    FOREIGN KEY (FK_USUARIOS_USR_ID)
    REFERENCES USUARIOS (USR_ID)
    ON DELETE SET NULL;