<?php
session_start();
include '../../../../controle/ConsumidorDAO.php';
include '../../../../modelo/Consumidor.php';
include '../../../../controle/UsuarioDAO.php';
//include '../../../../modelo/Usuario.php';
include '../../../../controle/LocalizacaoDAO.php';
include '../../../../modelo/Localizacao.php';

$UsuarioDAO = new UsuarioDAO();
$Usuario = new Usuario();
$ConsumidorDAO = new ConsumidorDAO();
$Consumidor = new Consumidor();
$LocalizacaoDAO = new LocalizacaoDAO();
$Localizacao = new Localizacao();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$Usuario->setUSU_ID($_POST['usu_id']);
	$Usuario->setUSU_EMAIL($_POST['email']);
	$emailEmUso = $UsuarioDAO->emailEmUsoADM($Usuario);
	
	if (!$emailEmUso) {
		$Usuario->setUSU_NOME($_POST['nome']);
		$Usuario->setUSU_TELEFONE($_POST['telefone1']);
		$UsuarioDAO->editarADM($Usuario);

		$Consumidor->setCON_ID($_POST['con_id']);
		$Consumidor->setCON_NUMERO($_POST['numero']);
		$Consumidor->setCON_COMPLEMENTO($_POST['complemento']);
		$Consumidor->setCON_TELEFONE2($_POST['telefone2']);
		$Consumidor->setCON_DATA_NASCIMENTO($_POST['dataNascimento']);
		$Consumidor->setCON_CPF($_POST['cpf']);
		$ConsumidorDAO->editarADM($Consumidor);
		
		$Localizacao->setLOC_ID($_POST['loc_id']);
		$Localizacao->setLOC_RUA($_POST['rua']);
		$Localizacao->setLOC_BAIRRO($_POST['bairro']);
		$Localizacao->setLOC_CIDADE($_POST['cidade']);
		$Localizacao->setLOC_ESTADO($_POST['estado']);
		$Localizacao->setLOC_CEP($_POST['cidade']);
		$LocalizacaoDAO->editarADM($Localizacao);
		
		$_SESSION["Modal"] = ["Consumidores","Consumidor editado com sucesso!"];
		header("location: ../../../../admin.php?pagina=5");
	}else{
		$_SESSION["Modal"] = ["Consumidores","O e-mail informado já se encontra em uso!"];
		header("location: ../../../../admin.php?pagina=5");
	}
	
	
}
?> 