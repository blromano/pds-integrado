<?php
include '../../../../controle/TiposEstabelecimentosDAO.php';
include '../../../../modelo/TiposEstabelecimentos.php';

$TiposEstabelecimentosDAO = new TiposEstabelecimentosDAO();
$TiposEstabelecimentos = new TiposEstabelecimentos();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$verifica_nome = $TiposEstabelecimentosDAO->pesquisar_igual($_POST['nomeup']);
	if (empty($_POST['nomeup'])) {
		echo "<script>alert('Por favor, insira um valor válido!')</script> <script>window.location='../../../index.php?pagina=10';</script>";
	}else{
		if ($verifica_nome > 0) {
			echo "<script>alert('Tipo de estabelecimento já existente!')</script> <script>window.location='../../../index.php?pagina=10';</script>";
		} else {
			$TiposEstabelecimentos->setId($_POST['idup']);
			$TiposEstabelecimentos->setCategoria($_POST['nomeup']);
			$TiposEstabelecimentosDAO->editar($TiposEstabelecimentos, $id);
			header("location: ../../../index.php?pagina=10");
		}
	}
};
?>