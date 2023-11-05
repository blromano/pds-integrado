<?php
session_start();
include '../../../../controle/ContatoDAO.php';

$ContatoDAO = new ContatoDAO();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	include '../../email.php';
	enviarEmail("Contato Respondido!","Assunto: <b>".$_POST['assunto']."</b><br>Mensagem: <b>".$_POST['resposta']."</b>",$_POST['remetente']);
	$ContatoDAO->editarADM($_POST);
	$_SESSION["Modal"] = ["Contato","Contato respondido com sucesso!"];
	header("location: ../../../../admin.php?pagina=12");
}
?> 