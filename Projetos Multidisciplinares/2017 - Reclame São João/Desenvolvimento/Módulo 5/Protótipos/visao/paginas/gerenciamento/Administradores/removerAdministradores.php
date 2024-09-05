<?php

include '../../../../controle/UsuariosDAO.php';
include '../../../../controle/AdministradoresDAO.php';

$UsuariosDAO = new UsuariosDAO();
$AdministradoresDAO = new AdministradoresDAO();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$AdministradoresDAO->excluir($_POST['id']);
	$UsuariosDAO->excluir($_POST['id']);
	
	echo "<script>alert('Administrador deletado com sucesso!')</script><script>window.location='../../../index.php?pagina=7';</script>";
}
?> 