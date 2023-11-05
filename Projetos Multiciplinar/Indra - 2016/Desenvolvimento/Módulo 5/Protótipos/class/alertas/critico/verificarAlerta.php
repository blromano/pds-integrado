<?php

require_once '../../../dao/alertaCriticoDAO.php';

$idUser = $_POST['idUser'];
$lastId = $_POST['lastId'];

$alertaDAO = new alertaCriticoDAO();
echo json_encode(($alertaDAO->prepareData($lastId, $idUser)));