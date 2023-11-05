<?php

include '../../../../controle/TiposProdutoseServicoDAO.php';
include '../../../../modelo/TiposProdutoseServico.php';

$TiposProdutoseServicoDAO = new TiposProdutoseServicoDAO();
$TiposProdutoseServico = new TiposProdutoseServico();



if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(!empty($_POST['nomeadd'])){
		if ($TiposProdutoseServicoDAO->pesquisar_igual($_POST['nomeadd']) > 0) {
			echo "<script>alert('Produto/Serviço ja existente!')</script><script>window.location='../../../index.php?pagina=11';</script>";
		}else{
			$TiposProdutoseServico->setDescricao($_POST['nomeadd']);
			$TiposProdutoseServicoDAO->inserir($TiposProdutoseServico);
			echo "<script>alert('Produto/Serviço inserido com sucesso!')</script><script>window.location='../../../index.php?pagina=11';</script>";
		}
	}
};

?>