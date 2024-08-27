<?php
include '../../dao/mod02/tipoMedicaoDAO.php';

$tipomedicaoDAO = new tipoMedicaoDAo();
echo $tipomedicaoDAO->listarPorNome($_POST['tipomed']);
?>
