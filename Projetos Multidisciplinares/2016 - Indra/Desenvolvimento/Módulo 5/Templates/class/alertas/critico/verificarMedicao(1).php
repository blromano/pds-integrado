<?php

require_once '../../../dao/alertaCriticoDAO.php';

$alertaDAO = new alertaCriticoDAO();
$lastId = json_decode(file_get_contents("lastId.json", true));
$lastIdMedicao = get_object_vars($lastId)['lastIdMedicao'];
$lastIdAlerta = get_object_vars($lastId)['lastIdAlerta'];
$lastIdMedicao = $alertaDAO->verificaMedicao($lastIdMedicao);
$lastIdAlerta = $alertaDAO->checarAlertasUsuarios($lastIdAlerta);
$lastId = '{"lastIdMedicao":"' . $lastIdMedicao . '","lastIdAlerta":"' . $lastIdAlerta . '"}';
file_put_contents("lastId.json", $lastId);
