<?php

 session_start ();
	
	include "../mod03/enviarImagem.php";

	include '../../modelo/Usuario.php';

	include '../../controle/UsuarioDAO.php';		
			
			$usuario= new Usuario();
			$usuarioDAO = new UsuarioDAO();
			
			//aqui começa o codigo do upload da imagem:
		if (! empty($_FILES['USU_FOTO_PERFIL']))
			{
				$upload = new Upload($_FILES['USU_FOTO_PERFIL'], 2000, 1600, "../../images/foto_perfil/");
				echo $upload->salvar();		
			}
		
			$REC_IMAGEM = $_SESSION['USU_FOTO_PERFIL'];//pego esse codigo do upload.class
			$USU_FOTO_PERFIL = 'images/foto_perfil/'.$_SESSION['USU_FOTO_PERFIL'];

			$usuario->setUSU_FOTO_PERFIL($USU_FOTO_PERFIL);
			$usuario->setUSU_ID($_POST['USU_ID']);
			
			
		$usuarioDAO->editarFotoPerfil($usuario);																		
			
			header("location:../../est_perfil.php"); 
?>
