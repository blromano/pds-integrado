<?php

include '../../../dao/alertaUserDAO.php';

$alertUserDAO = new alertaUserDAO();
$alertUser = new alertaUser($_POST['id'], $_POST['desc'], $_POST['rua'], $_POST['bairro'], $_POST['cidade'], null, null, $_POST['tipoAlerta'], null, null);
echo $alertUserDAO->editar($alertUser);

?>
