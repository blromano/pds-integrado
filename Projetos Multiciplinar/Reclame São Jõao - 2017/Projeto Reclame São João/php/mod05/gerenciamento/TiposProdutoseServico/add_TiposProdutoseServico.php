<?php
session_start();
include '../../../../controle/TiposProdutoseServicoDAO.php';
include '../../../../modelo/TiposProdutoseServico.php';

$TiposProdutoseServicoDAO = new TiposProdutoseServicoDAO();
$TiposProdutoseServico = new TiposProdutoseServico();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(!empty($_POST['nomeadd'])){
		if ($TiposProdutoseServicoDAO->pesquisar_igual($_POST['nomeadd']) > 0) {
			$_SESSION["Modal"] = ["Produtos/Serviços","Produto/Serviço já existe!"];
			header("location: ../../../../admin.php?pagina=11");
		}else{
			$TiposProdutoseServico->setDescricao($_POST['nomeadd']);
			$TiposProdutoseServicoDAO->inserir($TiposProdutoseServico);
			$_SESSION["Modal"] = ["Produtos/Serviços","Produto/Serviço inserido com sucesso!"];
			header("location: ../../../../admin.php?pagina=11");
		}
	}
};

?>