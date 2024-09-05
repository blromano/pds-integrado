USE MEDLUS2022;
INSERT INTO `PLANOS` (
    PLA_ID,
    PLA_AGENCIA,
    PLA_CONTATO,
    PLA_PRECO,
    PLA_QUANTIDADEEXAMES,
    PLA_NOME,
    PLA_QUANTIDADECONSULTAS
) VALUES (
    1,
    'agencia 123',
    '123456879',
    1111.11,
    11,
    'Plano Simples',
    11
);
INSERT INTO `USUARIOS` (
    USU_ID,
    USU_CPF,
    USU_RG,
    USU_EMAIL,
    USU_SENHA,
    USU_NUMERO_CELULAR,
    USU_TELEFONE,
    USU_DATA_DE_NASCIMENTO,
    USU_NOME,
    USU_NUMERO_RESIDENCIA,
    USU_SEXO,
    USU_CEP ,
    USU_FOTO,
    USU_ATIVO
) VALUES (
    1,
    '111111111111',
    '1111111111',
    'paciente@email.com',
    'dsfghjesrwafdbvjfdsadsfbf',
    '5519111111111',
    '5519222222222',
    '20-01-2001',
    'Pessoa Aleatória',
    '101',
    'M',
    '11111111',
    'https://enderecodafoto.com/1111111111',
    TRUE
);
INSERT INTO `PACIENTES` (
    PAC_ID,
    FK_USUARIOS_USU_ID,
    FK_PLANOS_PLA_ID,
    PAC_PRONTUARIO
) VALUES (
    1,
    1,
    1,
    '111111'
);
INSERT INTO `CONSULTAS_PRESENCIAIS` (
    COP_RETORNO,
    COP_DATA_RETORNO,
    COP_DESCRICAO,
    COP_ID,
    COP_DATA_ATEDIMENTO,
    COP_HORA_ATENDIMENTO,
    FK_PACIENTES_PAC_ID
) VALUES (
    TRUE,
    '20-07-2022',
    'Uma descrição qualquer',
    1,
    '17-06-2022',
    '11:00',
    1
);

INSERT INTO `USUARIOS` (
    USU_ID,
    USU_CPF,
    USU_RG,
    USU_EMAIL,
    USU_SENHA,
    USU_NUMERO_CELULAR,
    USU_TELEFONE,
    USU_DATA_DE_NASCIMENTO,
    USU_NOME,
    USU_NUMERO_RESIDENCIA,
    USU_SEXO,
    USU_CEP ,
    USU_FOTO,
    USU_ATIVO
) VALUES (
    2,
    '111111111112',
    '1111111112',
    'secretaria@email.com',
    'dsfghjesrwafdbv21435sfbf',
    '5519111111112',
    '5519222222221',
    '20-01-1998',
    'Secretária Aleatória',
    '100',
    'M',
    '11111112',
    'https://enderecodafoto.com/1111111112',
    TRUE
);
INSERT INTO `SECRETARIAS` (
    SEC_SETOR,
    SEC_TELEFONE_PROFISSIONAL,
    SEC_PRONTUARIO,
    SEC_ID,
    SEC_EMAIL_PROFISSIONAL,
    FK_USUARIOS_USU_ID
) VALUES (
    'setor 1',
    '5519111111112',
    '111111',
    1,
    'secretariapro@email.com',
    2
);
