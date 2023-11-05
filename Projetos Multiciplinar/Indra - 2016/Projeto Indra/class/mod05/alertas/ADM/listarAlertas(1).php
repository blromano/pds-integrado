<?php
include '../../../../dao/mod05/alertaUserDAO.php';

$alertaDAO = new alertaUserDAO();


echo json_encode($alertaDAO->listar());

?>
