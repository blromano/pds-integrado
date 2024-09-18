<?php
include '../../dao/paramDAO.php';


$paramDAO = new paramDAO();
$valorMax = (!empty($_POST['valorMax'])) ? $_POST['valorMax'] : null;
$valorMin = (!empty($_POST['valorMin'])) ? $_POST['valorMin'] : null;
$param = new paramAlertas(null, $valorMax, $valorMin, $_POST['corMax'], $_POST['corMin'], $_POST['idSensor']);
echo $paramDAO->create($param);
