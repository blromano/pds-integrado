<?php

include '../../../../controle/UsuariosDAO.php';
include '../../../../modelo/Usuarios.php';
include '../../../../controle/AdministradoresDAO.php';

$UsuariosDAO = new UsuariosDAO();
$Usuarios = new Usuarios();
$AdministradoresDAO = new AdministradoresDAO();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$Usuarios->setId($_POST['usu_id']);
	$Usuarios->setEmail($_POST['email']);
	$emailEmUso = $UsuariosDAO->emailEmUso($Usuarios);
	
	if (!$emailEmUso) {
		$Usuarios->setNome($_POST['nome']);
		$Usuarios->setTelefone("0");
		$UsuariosDAO->editar($Usuarios);
		
		$AdministradoresDAO->editar($_POST['privilegio'],$_POST['usu_id']);
		echo "<script>alert('Usuário editado com sucesso!')</script><script>window.location='../../../index.php?pagina=7';</script>";
	}else{
		echo "<script>alert('O e-mail informado já se encontra em uso!')</script><script>window.location='../../../index.php?pagina=7';</script>";
	}
	
	
}
?> 