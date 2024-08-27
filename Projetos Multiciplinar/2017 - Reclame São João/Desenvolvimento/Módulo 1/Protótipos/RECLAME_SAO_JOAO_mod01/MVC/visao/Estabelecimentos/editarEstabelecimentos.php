<?php
include '../../modelo/Estabelecimentos.php';
include '../../controle/EstabelecimentosDAO.php';


$estabelecimento = new Estabelecimentos();
$estabelecimentoDAO = new EstabelecimentosDAO();
	
$estabelecimento->setEST_ID($_POST['EST_ID']);
$estabelecimento->setEST_PUBLICO_ALVO($_POST['EST_PUBLICO_ALVO']);
$estabelecimento->setEST_VISAO_GERAL_EMPRESA($_POST['EST_VISAO_GERAL_EMPRESA']);
	
	$estabelecimentoDAO->editarVisaoGeral_PublicoAlvo($estabelecimento);


header("location:../../../php/mod03/mod03-perfil.php"); 

?>
