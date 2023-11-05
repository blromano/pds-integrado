<?php
include '../../modelo/Estabelecimentos.php';
include '../../controle/EstabelecimentosDAO.php';


$estabelecimento = new Estabelecimentos();
$estabelecimentoDAO = new EstabelecimentosDAO();
	
$estabelecimento->setEST_ID($_POST['EST_ID']);
$estabelecimento->setEST_RUA($_POST['EST_RUA']);
$estabelecimento->setEST_BAIRRO($_POST['EST_BAIRRO']);
$estabelecimento->setEST_NUMERO($_POST['EST_NUMERO']);
$estabelecimento->setEST_COMPLEMENTO($_POST['EST_COMPLEMENTO']);
$estabelecimento->setEST_CEP($_POST['EST_CEP']);
	
	$estabelecimentoDAO->editarEndereco($estabelecimento);

header("location:../../../php/mod03/mod03-perfil.php"); 

?>
