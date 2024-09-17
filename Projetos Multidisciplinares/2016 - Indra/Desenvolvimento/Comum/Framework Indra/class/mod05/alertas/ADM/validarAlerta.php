<?php
include '../../../../dao/mod05/alertaUserDAO.php';

$alertaDAO = new alertaUserDAO();
if (($_POST['valid'] === "sim")) $valid = "Aprovado";
else if (($_POST['valid'] === "nao")) $valid = "Reprovado";

echo $alertaDAO->validarAlerta($_POST['id'], $valid);

