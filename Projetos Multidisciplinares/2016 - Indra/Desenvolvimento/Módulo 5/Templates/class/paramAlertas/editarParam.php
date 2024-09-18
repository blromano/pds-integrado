<?php

include '../../dao/paramDAO.php';

$paramDAO = new paramDAO();
$valorMax = (!empty($_POST['valorMax'])) ? $_POST['valorMax'] : null;
$valorMin = (!empty($_POST['valorMin'])) ? $_POST['valorMin'] : null;
$param = new paramAlertas($_POST['id'], $valorMax, $valorMin, $_POST['corMax'], $_POST['corMin'], null);
echo json_encode(array(
    'valido' => $paramDAO->editar($param),
));


?>
