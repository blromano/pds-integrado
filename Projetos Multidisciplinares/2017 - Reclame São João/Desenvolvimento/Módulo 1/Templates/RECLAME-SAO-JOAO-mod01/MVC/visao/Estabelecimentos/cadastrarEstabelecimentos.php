<?php

include '../../modelo/Estabelecimentos.php';
include '../../controle/EstabelecimentosDAO.php';

	session_start();
	
	$EST_CNPJ =             $_SESSION['EST_CNPJ'];
	$EST_FOTO_PERFIL =      $_SESSION['EST_NOME_FANTASIA']; 
	$EST_NOME_FANTASIA =    $_SESSION['EST_NOME_FANTASIA']; 
	$EST_RUA      =			$_SESSION['EST_RUA'];
	$EST_BAIRRO =			$_SESSION['EST_BAIRRO'];
	$EST_NUMERO =			$_SESSION['EST_NUMERO'];
	$EST_COMPLEMENTO =		$_SESSION['EST_COMPLEMENTO'];
	$EST_NOME_RESPONSAVEL = $_SESSION['EST_NOME_RESPONSAVEL'];
	$EST_NOME_EMPRESA =	    $_SESSION['EST_NOME_EMPRESA'];
	$EST_SITE_EMPRESA =	    $_SESSION['EST_SITE_EMPRESA'];
	$EST_EMAIL =		    $_SESSION['EST_EMAIL'];
	$EST_CEP =		        $_SESSION['EST_CEP'];
	
	
	$estabelecimentos = new Estabelecimentos();
    $estabelecimentosDAO = new EstabelecimentosDAO();

	$estabelecimentos->setEST_CNPJ($EST_CNPJ);
	$estabelecimentos->setEST_FOTO_PERFIL($EST_FOTO_PERFIL);
	$estabelecimentos->setEST_NOME_FANTASIA($EST_NOME_FANTASIA);
	$estabelecimentos->setEST_RUA($EST_RUA);
	$estabelecimentos->setEST_BAIRRO($EST_BAIRRO);
	$estabelecimentos->setEST_NUMERO($EST_NUMERO);
	$estabelecimentos->setEST_COMPLEMENTO($EST_COMPLEMENTO);
	$estabelecimentos->setEST_NOME_RESPONSAVEL($EST_NOME_RESPONSAVEL);
	$estabelecimentos->setEST_NOME_EMPRESA($EST_NOME_EMPRESA);
	$estabelecimentos->setEST_PUBLICO_ALVO($_POST['EST_PUBLICO_ALVO']);
	$estabelecimentos->setEST_VISAO_GERAL_EMPRESA($_POST['EST_VISAO_GERAL_EMPRESA']);
	$estabelecimentos->setEST_SITE_EMPRESA($EST_SITE_EMPRESA);
	$estabelecimentos->setEST_EMAIL($EST_EMAIL);
	$estabelecimentos->setEST_CEP($EST_CEP);

	$estabelecimentosDAO->inserirEstabelecimento($estabelecimentos);


header("location:../../../php/mod03/mod03-preencher-perfil.php"); 

?>
