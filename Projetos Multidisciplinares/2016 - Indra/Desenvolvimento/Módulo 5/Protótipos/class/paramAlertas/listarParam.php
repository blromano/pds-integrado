<?php
require_once '../../dao/paramDAO.php';

$paramDAO = new paramDAO();
echo json_encode($paramDAO->listarSensor($_POST['id']));
