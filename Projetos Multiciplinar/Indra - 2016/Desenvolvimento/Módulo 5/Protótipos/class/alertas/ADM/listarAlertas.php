<?php
include '../../../dao/alertaUserDAO.php';

$alertaDAO = new alertaUserDAO();

echo json_encode($alertaDAO->listar());

?>
