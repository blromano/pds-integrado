SELECT medTemps.DATA_MED,medTemps.DADO as temperatura, medUVs.DADO as UV FROM projeto.medicoestemp medTemps
INNER JOIN projeto.medicoesuv medUVs on (medUVs.ID_PCD = medTemps.ID_PCD)
