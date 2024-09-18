<?php

session_start();




require_once 'class/UsuarioDAO.php';



$usuarioDAO = new UsuarioDAO();


$conteudo = $usuarioDAO->logar($_POST['senha'], $_POST['email']);


if($conteudo[0] >  0){

	
	
	$_SESSION['user'] = new Usuario($conteudo[1]['USU_ID'] , $conteudo[1]['USU_NOME']  , $conteudo[1]['USU_SENHA']  , $conteudo[1]['USU_DATA_NASCIMENTO']  ,  $conteudo[1]['USU_EMAIL']  ,  $conteudo[1]['USU_NUMERO_RESIDENCIA'] , $conteudo[1]['USU_RUA'] , NULL, NULL, $conteudo[1]['USU_STATUS_ATIVACAO'] , $conteudo[1]['USU_DATA_ATIVACAO'] , $conteudo[1]['NIV_ID'] , $conteudo[1]['USU_CODIGO_ATIVACAO'] , $conteudo[1]['USU_DATA_RECUPERACAO_SENHA'] , $conteudo[1]['USU_PODERES_ADMINISTRATIVOS']);

	//


	switch ($_SESSION['user']->getNivelAcesso()) {
		case 1:
			header('Location: indexNivel2.php');
			break;
		case 2:
			header('Location: indexNivel3.php');
			break;
		case 3:
			header('Location: indexNivel3.php');
			break;
		case 4:
			header('Location: indexNivel4.php');
			break;		
		default:
			echo" <script> window.location='indexNivel1%20.php' </script>";
			break;
	}


}else{
	


		echo "<script>alert('Email ou senha inválidos!')</script>";	

		echo" <script> window.location='indexNivel1%20.php' </script>";
}













?>