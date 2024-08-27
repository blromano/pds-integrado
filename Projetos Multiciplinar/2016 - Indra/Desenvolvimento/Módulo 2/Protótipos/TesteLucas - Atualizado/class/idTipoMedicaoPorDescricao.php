<?php
include 'tipoMedicaoDAO.php';

$tipomedicaoDAO = new tipoMedicaoDAo();
echo $tipomedicaoDAO->listarPorNome($_POST['tipomed']);
?>
