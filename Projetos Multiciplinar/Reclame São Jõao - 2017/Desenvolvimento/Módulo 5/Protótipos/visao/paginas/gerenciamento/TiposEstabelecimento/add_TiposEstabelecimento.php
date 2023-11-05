<?php
include '../../../../controle/TiposEstabelecimentosDAO.php';
include '../../../../modelo/TiposEstabelecimentos.php';

$TiposEstabelecimentosDAO = new TiposEstabelecimentosDAO();
$TiposEstabelecimentos    = new TiposEstabelecimentos();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$verifica_nome = $TiposEstabelecimentosDAO->pesquisar_igual($_POST['nomeadd']);
	if (empty($_POST['nomeadd'])) {
		echo "<script>alert('Por favor, insira um valor válido!')</script> <script>window.location='../../../index.php?pagina=10';</script>";
	}else{
		if ($verifica_nome > 0) {
			echo "<script>alert('Tipo de estabelecimento já existente!')</script> <script>window.location='../../../index.php?pagina=10';</script>";
		}else{
			$TiposEstabelecimentos->setCategoria($_POST['nomeadd']);
			$TiposEstabelecimentosDAO->inserir($TiposEstabelecimentos);
			header("location: ../../../index.php?pagina=10");
		}
	}
};
?>