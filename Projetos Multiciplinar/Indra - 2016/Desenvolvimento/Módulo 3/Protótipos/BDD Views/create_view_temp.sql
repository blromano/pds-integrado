CREATE VIEW medicoestemp AS
SELECT pcds.PCD_ID as ID_PCD, med.MED_DADO as DADO, med.MED_DATA_HORA_MEDICAO as DATA_MED FROM projeto.pcds pcds
INNER join sensores_instalados_sensores sis on (sis.PCD_ID = pcds.PCD_ID)
inner join tipos_sensores ts on(ts.TSE_ID=sis.TSE_ID)
inner join medicoes med on(med.SEN_ID=sis.SEN_ID)
where sis.SEN_ID = 1;
