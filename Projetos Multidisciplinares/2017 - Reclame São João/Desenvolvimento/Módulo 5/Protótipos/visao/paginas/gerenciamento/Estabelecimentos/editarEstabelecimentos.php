<?php

include '../../../../controle/EstabelecimentosDAO.php';
include '../../../../modelo/Estabelecimentos.php';
include '../../../../controle/UsuariosDAO.php';
include '../../../../modelo/Usuarios.php';
include '../../../../controle/LocalizacaoDAO.php';
include '../../../../modelo/Localizacao.php';

$UsuariosDAO = new UsuariosDAO();
$Usuarios = new Usuarios();
$EstabelecimentosDAO = new EstabelecimentosDAO();
$Estabelecimentos = new Estabelecimentos();
$LocalizacaoDAO = new LocalizacaoDAO();
$Localizacao = new Localizacao();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$Usuarios->setId($_POST['usu_id']);
	$Usuarios->setEmail($_POST['email']);
	$emailEmUso = $UsuariosDAO->emailEmUso($Usuarios);
	
	if (!$emailEmUso) {
		$Usuarios->setNome($_POST['nome']);
		$Usuarios->setTelefone($_POST['telefone']);
		$UsuariosDAO->editar($Usuarios);
		
		$Estabelecimentos->setEST_ID($_POST['est_id']);
		$Estabelecimentos->setEST_CNPJ($_POST['cnpj']);
		$Estabelecimentos->setEST_PUBLICO_ALVO($_POST['alvo']);
		$Estabelecimentos->setEST_NOME_FANTASIA($_POST['nome']);
		$Estabelecimentos->setEST_NOME_RESPONSAVEL($_POST['responsavel']);
		$Estabelecimentos->setEST_SITE_EMPRESA($_POST['site']);
		$Estabelecimentos->setEST_FACEBOOK_EMPRESA($_POST['facebook']);
		$Estabelecimentos->setEST_NUMERO($_POST['facebook']);
		$Estabelecimentos->setEST_COMPLEMENTO($_POST['facebook']);
		$EstabelecimentosDAO->editarEstabelecimento($Estabelecimentos,$_POST['tipo']);
		
		$Localizacao->setId($_POST['loc_id']);
		$Localizacao->setRua($_POST['rua']);
		$Localizacao->setBairro($_POST['bairro']);
		$Localizacao->setEstado($_POST['estado']);
		$Localizacao->setCidade($_POST['cidade']);
		$LocalizacaoDAO->editar($Localizacao);
		
		echo "<script>alert('Estabelecimento editado com sucesso!')</script><script>window.location='../../../index.php?pagina=6';</script>";
	}else{
		echo "<script>alert('O e-mail informado já se encontra em uso!')</script><script>window.location='../../../index.php?pagina=6';</script>";
	}
}

?>