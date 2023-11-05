<?php

include '../../../../controle/TiposProdutoseServicoDAO.php';
include '../../../../modelo/TiposProdutoseServico.php';

$bd = new TiposProdutoseServicoDAO();
$delip = new TiposProdutoseServico();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
	$bd->excluir($_POST['delid']);
};
?>
