<?php

include '../../../../controle/UsuariosDAO.php';
include '../../../../modelo/Usuarios.php';
include '../../../../controle/AdministradoresDAO.php';

$UsuariosDAO = new UsuariosDAO();
$Usuarios = new Usuarios();
$AdministradoresDAO = new AdministradoresDAO();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$Usuarios->setId(0);
	$Usuarios->setEmail($_POST['email']);
	$emailEmUso = $UsuariosDAO->emailEmUso($Usuarios);
	
	if (!$emailEmUso) {
		$Usuarios->setNome($_POST['nome']);
		$Usuarios->setSenha($_POST['senha']);
		$Usuarios->setTelefone("0");
		$usu_id = $UsuariosDAO->inserir($Usuarios);

		$AdministradoresDAO->inserir($_POST['privilegio'],$usu_id);
		echo "<script>alert('Administrador inserido com sucesso!')</script><script>window.location='../../../index.php?pagina=7';</script>";
	}else{
		echo "<script>alert('O e-mail informado já se encontra em uso!')</script><script>window.location='../../../index.php?pagina=7';</script>";
	}	
	
	
}
?> 