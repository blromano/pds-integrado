<?php
session_start();
include_once '../../../../controle/UsuarioDAO.php';
include '../../../../controle/AdministradoresDAO.php';

$UsuarioDAO = new UsuarioDAO();
$AdministradoresDAO = new AdministradoresDAO();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$AdministradoresDAO->excluir($_POST['id']);
	//$UsuarioDAO->excluirADM($_POST['id']);
	
	$_SESSION["Modal"] = ["Administradores","Administrador deletado com sucesso!"];
	header("location: ../../../../admin.php?pagina=7");
}
?> 