<?php
include 'sensorDAO.php';

$sensorDAO = new sensorDAO();
$sensor = new Sensor(null,$_POST['id_pcd'],$_POST['id_tipo'],$_POST['periodicidade_med'],$_POST['estado'],null);

if($sensorDAO->Criar($sensor)){
	echo'<script>window.location="../pesquisarSensor.php";</script>';
}else{
	echo'<script>window.location="../pesquisarSensor.php";</script>';
}

?>