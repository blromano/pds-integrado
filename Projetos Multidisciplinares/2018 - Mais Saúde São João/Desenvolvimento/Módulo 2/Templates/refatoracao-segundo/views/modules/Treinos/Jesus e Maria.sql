INSERT INTO USUARIOS (USU_NOME, USU_SENHA, USU_EMAIL, USU_SOBRENOME,
USU_GENERO, USU_CPF, USU_TELEFONE, USU_DATA_CADASTRO, USU_CODIGO, USU_ENDERECO,
USU_RECEBER_LEMBRETES, USU_DATA_NASCIMENTO, USU_TIPO) VALUES ('Jesus', 'deusepai',
'jesus@gmail.com', 'Cristo', '1', '06848188840', '36314565', '2000-02-17', '1',
'Rua dos Bobos N0', '1', '1999-02-17', '1');

INSERT INTO USUARIOS (USU_NOME, USU_SENHA, USU_EMAIL, USU_SOBRENOME,
USU_GENERO, USU_CPF, USU_TELEFONE, USU_DATA_CADASTRO, USU_CODIGO, USU_ENDERECO,
USU_RECEBER_LEMBRETES, USU_DATA_NASCIMENTO, USU_TIPO) VALUES ('Maria', 'deusepai',
'maria@gmail.com', 'Cristo', '1', '47456735824', '36314565', '2000-02-17', '2',
'Rua dos Bobos N0', '1', '1999-02-17', '1');

INSERT INTO EDUCADORES_FISICOS (EDF_CREF, EDF_FOCO, EDF_STATUS, EDF_DESC_PROFISSIONAL,
FK_USUARIOS_USU_CODIGO) VALUES ('123', '1', '1', 'filho de deus',(SELECT USU_CODIGO
FROM USUARIOS WHERE USU_NOME = 'Jesus'));

UPDATE USUARIOS SET FK_EDUCADORES_FISICOS_FK_USUARIOS_USU_CODIGO =
(SELECT FK_USUARIOS_USU_CODIGO FROM EDUCADORES_FISICOS
WHERE EDF_CREF = '123') WHERE USU_CODIGO = '2';

INSERT INTO FICHAS_TREINAMENTO (FTR_DATA_INICIO, FTR_CODIGO, FTR_DATA_ATUALIZACAO,
FTR_NOME, FTR_DATA_TERMINO, FK_USUARIOS_USU_CODIGO, FK_EDUCADORES_FISICOS_FK_USUARIOS_USU_CODIGO)
VALUES ('2000-02-17', '1', '2000-03-17', 'Supino Lebron James', '2000-04-17', (SELECT USU_CODIGO
FROM USUARIOS WHERE USU_CODIGO = '2'), (SELECT USU_CODIGO FROM USUARIOS WHERE USU_CODIGO = '1'));
INSERT INTO FICHAS_TREINAMENTO (FTR_DATA_INICIO, FTR_CODIGO, FTR_DATA_ATUALIZACAO,
FTR_NOME, FTR_DATA_TERMINO, FK_USUARIOS_USU_CODIGO, FK_EDUCADORES_FISICOS_FK_USUARIOS_USU_CODIGO)
VALUES ('2000-02-17', '2', '2000-03-17', 'Supino Neymar', '2000-04-17', (SELECT USU_CODIGO
FROM USUARIOS WHERE USU_CODIGO = '2'), (SELECT USU_CODIGO FROM USUARIOS WHERE USU_CODIGO = '1'));
INSERT INTO FICHAS_TREINAMENTO (FTR_DATA_INICIO, FTR_CODIGO, FTR_DATA_ATUALIZACAO,
FTR_NOME, FTR_DATA_TERMINO, FK_USUARIOS_USU_CODIGO, FK_EDUCADORES_FISICOS_FK_USUARIOS_USU_CODIGO)
VALUES ('2001-02-17', '3', '2001-03-17', 'Painho invertido', '2001-04-17', (SELECT USU_CODIGO
FROM USUARIOS WHERE USU_CODIGO = '2'), (SELECT USU_CODIGO FROM USUARIOS WHERE USU_CODIGO = '1'));