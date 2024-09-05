<?php
include 'sensorDAO.php';

$sensorDAO = new sensorDAO();

$sensor = new Sensor($_GET['id'],null,null,null,null);

$sensorDAO->Deletar($sensor);

echo'<script>window.location="../pesquisarSensor.php";</script>';
