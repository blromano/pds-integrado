<?php

include '../../../../controle/ConsumidoresDAO.php';
include '../../../../modelo/Consumidores.php';
include '../../../../controle/UsuariosDAO.php';
include '../../../../modelo/Usuarios.php';
include '../../../../controle/LocalizacaoDAO.php';
include '../../../../modelo/Localizacao.php';

$UsuariosDAO = new UsuariosDAO();
$Usuarios = new Usuarios();
$ConsumidoresDAO = new ConsumidoresDAO();
$Consumidores = new Consumidores();
$LocalizacaoDAO = new LocalizacaoDAO();
$Localizacao = new Localizacao();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$Usuarios->setId($_POST['usu_id']);
	$Usuarios->setEmail($_POST['email']);
	$emailEmUso = $UsuariosDAO->emailEmUso($Usuarios);
	
	if (!$emailEmUso) {
		$Usuarios->setNome($_POST['nome']);
		$Usuarios->setTelefone($_POST['telefone1']);
		$UsuariosDAO->editar($Usuarios);

		$Consumidores->setId($_POST['con_id']);
		$Consumidores->setNumero($_POST['numero']);
		$Consumidores->setComplemento($_POST['complemento']);
		$Consumidores->setTelefone2($_POST['telefone2']);
		$Consumidores->setDataNascimento($_POST['dataNascimento']);
		$Consumidores->setCpf($_POST['cpf']);
		$ConsumidoresDAO->editar($Consumidores);
		
		$Localizacao->setId($_POST['loc_id']);
		$Localizacao->setRua($_POST['rua']);
		$Localizacao->setBairro($_POST['bairro']);
		$Localizacao->setEstado($_POST['estado']);
		$Localizacao->setCidade($_POST['cidade']);
		$LocalizacaoDAO->editar($Localizacao);
		
		echo "<script>alert('Usuário editado com sucesso!')</script><script>window.location='../../../index.php?pagina=5';</script>";
	}else{
		echo "<script>alert('O e-mail informado já se encontra em uso!')</script><script>window.location='../../../index.php?pagina=5';</script>";
	}
	
	
}
?> 