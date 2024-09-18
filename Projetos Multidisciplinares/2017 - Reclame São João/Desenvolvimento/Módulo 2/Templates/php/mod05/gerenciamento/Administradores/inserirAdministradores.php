<?php
session_start();
include '../../../../controle/UsuarioDAO.php';
include '../../../../modelo/Usuario.php';
include '../../../../controle/AdministradoresDAO.php';

$UsuarioDAO = new UsuarioDAO();
$Usuario = new Usuario();
$AdministradoresDAO = new AdministradoresDAO();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$Usuario->setUSU_ID(0);
	$Usuario->setUSU_EMAIL($_POST['email']);
	$emailEmUso = $UsuarioDAO->emailEmUsoADM($Usuario);
	
	if (!$emailEmUso) {
		$Usuario->setUSU_NOME($_POST['nome']);
		$Usuario->setUSU_SENHA($_POST['senha']);
		$Usuario->setUSU_TELEFONE("0");
		$usu_id = $UsuarioDAO->inserirADM($Usuario);

		$AdministradoresDAO->inserir($_POST['privilegio'],$usu_id);
		$_SESSION["Modal"] = ["Administradores","Administrador inserido com sucesso!"];
		header("location: ../../../../admin.php?pagina=7");
	}else{
		$_SESSION["Modal"] = ["Administradores","O e-mail informado j? se encontra em uso!"];
		header("location: ../../../../admin.php?pagina=7");
	}	
	
	
}
?> 