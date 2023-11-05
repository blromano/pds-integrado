<?php
require_once '../../../dao/mod05/paramDAO.php';

$paramDAO = new paramDAO();
echo json_encode($paramDAO->listarSensor($_POST['id']));
