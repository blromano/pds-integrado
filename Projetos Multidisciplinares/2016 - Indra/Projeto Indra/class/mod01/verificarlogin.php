<?php

session_start();




require_once "../../dao/mod01/UsuarioDAO.php";
require_once "../../modelo/mod01/UsuarioLogin.php";



$usuarioDAO = new UsuarioDAO();


$conteudo = $usuarioDAO->logar($_POST['senha'], $_POST['email']);


if($conteudo[0] >  0){

	
	
	$_SESSION['user'] = new UsuarioLogin($conteudo[1]['USU_ID'] , $conteudo[1]['USU_NOME']  , $conteudo[1]['USU_SENHA']  , $conteudo[1]['USU_DATA_NASCIMENTO']  ,  $conteudo[1]['USU_EMAIL']  ,  $conteudo[1]['USU_NUMERO_RESIDENCIA'] , $conteudo[1]['USU_RUA'] , $conteudo[1]['USU_ESTADO'], $conteudo[1]['USU_CIDADE'], $conteudo[1]['USU_STATUS_ATIVACAO'] , $conteudo[1]['USU_DATA_ATIVACAO'] , $conteudo[1]['NIV_ID'] , $conteudo[1]['USU_CODIGO_ATIVACAO'] , $conteudo[1]['USU_DATA_RECUPERACAO_SENHA'], $conteudo[1]['USU_CEP'], $conteudo[1]['USU_COMPLEMENTO'] );
	//


	switch ($_SESSION['user']->getNivelAcesso()) {
		case 1:
			header('Location: ../../indra/mod01/indexNivel1.php');
			break;
		case 2:
			header('Location: ../../indra/mod01/indexNivel2.php');
			break;
		case 3:
			header('Location: ../../indra/mod01/indexNivel3.php');
			break;
		case 4:
			header('Location: ../../indra/mod01/indexNivel4.php');
			break;		
		default:
			echo" <script> window.location='../../indra/mod01/index1.php' </script>";
			break;
	}


}else{
	


		echo "<script>alert('Email ou senha inválidos!')</script>";	

		echo" <script> window.location='../../indra/mod01/index1.php' </script>";
}













?>