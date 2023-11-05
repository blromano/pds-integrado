<?php 

include '../../../dao/mod05/pcdDAO.php';

$pcdDAO = new pcdDAO();

echo json_encode($pcdDAO->listarPCDInteresse($_POST['idPCD']));
