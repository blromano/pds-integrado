<?php 

include '../../dao/pcdDAO.php';

$pcdDAO = new pcdDAO();

echo json_encode($pcdDAO->listarPCDInteresse($_POST['idPCD']));
