<?php
session_start();
require_once('conexao/request.class.php');

if (isset($_POST['email']) && !empty($_POST['pass'])) {
	if (isset($_POST['pass']) && !empty($_POST['pass'])) {
		$email = $_POST['email'];
		$pass = $_POST['pass'];

		$usuario = new usuarios();
		$info = $usuario->login($email, $pass);

		if ($info == false) {
			header("Location: index.php?erro=1");
   			exit;
		}
		$_SESSION['USU_ID'] = $info[0]['USU_ID'];

		header("Location: processoCerveja.php");
		exit;
		
	}
}
header("Location: processoCerveja.php");
?>