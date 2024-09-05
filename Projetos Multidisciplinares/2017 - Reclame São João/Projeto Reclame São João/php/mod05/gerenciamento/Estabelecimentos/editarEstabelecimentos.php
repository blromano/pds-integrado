<?php
session_start();
include '../../../../controle/EstabelecimentosDAO.php';
include '../../../../modelo/Estabelecimentos.php';
include '../../../../controle/UsuarioDAO.php';
//include '../../../../modelo/Usuario.php';
include '../../../../controle/LocalizacaoDAO.php';
include '../../../../modelo/Localizacao.php';

$UsuarioDAO = new UsuarioDAO();
$Usuario = new Usuario();
$EstabelecimentosDAO = new EstabelecimentosDAO();
$Estabelecimentos = new Estabelecimentos();
$LocalizacaoDAO = new LocalizacaoDAO();
$Localizacao = new Localizacao();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$Usuario->setUSU_ID($_POST['usu_id']);
	$Usuario->setUSU_EMAIL($_POST['email']);
	$emailEmUso = $UsuarioDAO->emailEmUsoADM($Usuario);
	
	if (!$emailEmUso) {
		$Usuario->setUSU_NOME($_POST['nome']);
		$Usuario->setUSU_TELEFONE($_POST['telefone']);
		$UsuarioDAO->editarADM($Usuario);
		
		$Estabelecimentos->setEST_ID($_POST['est_id']);
		$Estabelecimentos->setEST_CNPJ($_POST['cnpj']);
		$Estabelecimentos->setEST_PUBLICO_ALVO($_POST['alvo']);
		$Estabelecimentos->setEST_NOME_FANTASIA($_POST['nome']);
		$Estabelecimentos->setEST_NOME_RESPONSAVEL($_POST['responsavel']);
		$Estabelecimentos->setEST_SITE_EMPRESA($_POST['site']);
		$Estabelecimentos->setEST_FACEBOOK_EMPRESA($_POST['facebook']);
		$Estabelecimentos->setEST_NUMERO_ENDERECO($_POST['facebook']);
		$Estabelecimentos->setEST_COMPLEMENTO($_POST['facebook']);
		$EstabelecimentosDAO->editarEstabelecimentoADM($Estabelecimentos,$_POST['tipo']);
		
		$Localizacao->setLOC_ID($_POST['loc_id']);
		$Localizacao->setLOC_RUA($_POST['rua']);
		$Localizacao->setLOC_BAIRRO($_POST['bairro']);
		$Localizacao->setLOC_CIDADE($_POST['cidade']);
		$Localizacao->setLOC_ESTADO($_POST['estado']);
		$Localizacao->setLOC_CEP($_POST['cidade']);
		$LocalizacaoDAO->editarADM($Localizacao);
		
		$_SESSION["Modal"] = ["Estabelecimentos","Estabelecimento editado com sucesso!"];
		header("location: ../../../../admin.php?pagina=6");
	}else{
		$_SESSION["Modal"] = ["Estabelecimentos","O e-mail informado j? se encontra em usi!"];
		header("location: ../../../../admin.php?pagina=6");
	}
}

?>