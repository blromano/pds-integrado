<?php
include '../../../dao/alertaUserDAO.php';

$alertaDAO = new alertaUserDAO();
if (($_POST['valid'] === "sim")) $valid = "Aprovado";
else if (($_POST['valid'] === "nao")) $valid = "Reprovado";
else $valid = "Em validação";

echo $alertaDAO->validarAlerta($_POST['id'], $valid);

