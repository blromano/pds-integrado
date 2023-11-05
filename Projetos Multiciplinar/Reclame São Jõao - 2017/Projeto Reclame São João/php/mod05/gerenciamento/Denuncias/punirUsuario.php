<?php
session_start();
include '../../../../controle/PunirUsuarioDAO.php';

$PunirUsuarioDAO = new PunirUsuarioDAO();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$PunirUsuarioDAO->inserirBloqueio($_POST);
	$PunirUsuarioDAO->alterarStatus($_POST['des_id']);
	
	$_SESSION["Modal"] = ["Administradores","Usuário banido com sucesso!"];
	header("location: ../../../../admin.php?pagina=4");
	/*
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
	}	*/
	
	
}
?> 