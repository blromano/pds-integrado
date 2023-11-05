<?php
session_start();
include '../../../../controle/PunirUsuarioDAO.php';

$PunirUsuarioDAO = new PunirUsuarioDAO();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$PunirUsuarioDAO->alterar($_POST,$_POST['hbe_id']);
	
	$_SESSION["Modal"] = ["Administradores","Banimento alterado com sucesso!"];
	header("location: ../../../../admin.php?pagina=8");
}
?> 