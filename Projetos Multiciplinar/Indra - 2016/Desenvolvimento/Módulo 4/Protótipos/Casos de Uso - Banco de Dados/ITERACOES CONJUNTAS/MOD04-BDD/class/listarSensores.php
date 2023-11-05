<?php 
require_once 'PCDDAO.php';

$PCDDAO = new PCDDAO();


$sensorDAO = $PCDDAO->listarSensoresPCD($_POST['idPCD']);
$numSensor = $sensorDAO->rowCount();
$conteudo = $sensorDAO->fetchAll(PDO::FETCH_ASSOC);

$json = "[";
$i = 0;
if ($numSensor >= 1){
	foreach($conteudo as $sensor) {
		$json = $json . "{\"tipoSensor\":\"" . $sensor['TSE_TIPO_SENSOR'] . "\",\"desc\":\"" . $sensor['TSE_DESCRICAO'] . "\"}";
		$i++;
		if($numSensor != $i && $numSensor != 1) $json = $json . ',';
	}
}
$json = $json . "]";

echo $json;
