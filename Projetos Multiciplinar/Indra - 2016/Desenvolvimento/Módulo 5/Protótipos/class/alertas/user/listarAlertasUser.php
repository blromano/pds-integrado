<?php

include '../../../dao/alertaUserDAO.php';

$DAO = new alertaUserDAO();

$lista = $DAO->listarByUser();
$numLinhas = $lista->rowCount();
$conteudo = $lista->fetchAll(PDO::FETCH_ASSOC);

$idAlertas = $DAO->getIdAlertas();
$qntAlertas = count($idAlertas);

$json = "[{\"qntAlertas\":\"" . $qntAlertas . "\"},";
for ($i=0 ; $i < $qntAlertas ; $i++ ) { 
	if($i != 0 || ($i-1) == $qntAlertas) $json = $json .","; 
	$json = $json . "{\"id\":\"" . $idAlertas[$i] . "\",\"alerta\":\"" . $DAO->tipoAlerta($idAlertas[$i]) . "\"}";
}
if ($numLinhas >= 1) {
	$i = 0;
	$json = $json . ',';
	foreach($conteudo as $conteudo) {
		$info = pathinfo('../' . $conteudo['ALU_URL_FOTO_1']);
		$dataHora = date_create($conteudo['ALU_DATA_HORA_ALERTA']);
		$dia = date_format($dataHora, "d/m/Y");
		$hora = date_format($dataHora, "H:i:s");
		$json = $json . "{\"id\":\"" . $conteudo['ALU_ID'] . "\",\"status\":\"" . $conteudo['ALU_STATUS'] . "\", \"data\":\"" . $dia . "\",\"hora\":\"" . $hora . "\",\"cidade\":\"" . $conteudo['ALU_CIDADE'] . "\",\"alerta\":\"" . $DAO->tipoAlerta($conteudo['TAL_ID']) . "\",\"rua\":\"" . $conteudo['ALU_RUA'] . "\",\"bairro\":\"" .
			$conteudo['ALU_BAIRRO'] . "\",\"desc\":\"" . $conteudo['ALU_DESCRICAO'] . "\",\"img1\":\"" . $conteudo['ALU_URL_FOTO_1'] . "\",\"img2\":\"" .
			$conteudo['ALU_URL_FOTO_2'] . "\",\"img3\":\"" . $conteudo['ALU_URL_FOTO_3'] . "\",\"img4\":\"" . $conteudo['ALU_URL_FOTO_4'] . "\",\"idAlerta\":\"" . $conteudo['TAL_ID'] . "\",\"img5\":\"" .
			$conteudo['ALU_URL_FOTO_5'] . "\",\"caminhoPasta\":\"" . $info['dirname'] . "\"}";
		$i++;
		if($numLinhas != $i && $numLinhas != 1) $json = $json . ',';
		//$orgs[] = $DAO->jsonSerialize($dataHora[0], $dataHora[1], $conteudo['ALU_CIDADE'], $DAO->tipoAlerta($conteudo['TAL_ID']));
	}
}
$json = $json . "]";

//$teste = json_encode($orgs);
echo $json;

//echo json_encode($orgs);
