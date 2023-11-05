<?php
session_start();
include '../../../../controle/UsuarioDAO.php';
include '../../../../controle/AdministradoresDAO.php';

$UsuariosDAO = new UsuariosDAO();
$AdministradoresDAO = new AdministradoresDAO();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$AdministradoresDAO->excluir($_POST['id']);
	$UsuariosDAO->excluir($_POST['id']);
	
	$_SESSION["Modal"] = ["Administradores","Administrador deletado com sucesso!"];
	header("location: ../../../../admin.php?pagina=7");
}
?> 