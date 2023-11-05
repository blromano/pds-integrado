<?php
session_start();
include '../../../../controle/TiposProdutoseServicoDAO.php';
include '../../../../modelo/TiposProdutoseServico.php';

$bd = new TiposProdutoseServicoDAO();
$delip = new TiposProdutoseServico();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
	$bd->excluir($_POST['delid']);
	//$_SESSION["Modal"] = ["Produtos/Serviços","Produto/Serviço removido com sucesso!"];
	//header("location: ../../../../admin.php?pagina=11");
};
?>
