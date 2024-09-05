<?php
include 'sensorDAO.php';

$sensorDAO = new sensorDAO();
echo $_POST['id_sensor_editar'];


$sensor = new Sensor($_POST['id_sensor_editar'],$_POST['id_pcd_editar'],$_POST['id_tipo_editar'],$_POST['periodicidade_med_editar'],null);





if($sensorDAO->Atualizar($sensor)){
	echo "<script>alert('Dados editados com sucesso!');</script>";
	
	echo'<script>window.location="../pesquisarSensor.php";</script>';
	
}else{
	echo'<script>window.location="../pesquisarSensor.php";</script>';
}


?>