<?php
	include_once '../../controle/UsuarioDAO.php';
	
	#Verifica se tem um email para pesquisa
		if(isset($_POST['USU_EMAIL']))
		{ 

			#Recebe o Email Postado
				$emailPostado = $_POST['USU_EMAIL'];

			#Conecta banco de dados
				
				$UsuarioDAO = new UsuarioDAO();
				
				$verificar_email = $UsuarioDAO->verificar_email($emailPostado);
				
			#Se o retorno for maior do que zero, diz que já existe um.
				if($verificar_email>0)
					// Já existe um usuário cadastrado com este email
						echo json_encode(array('USU_EMAIL' => '1')); 
				else 
					// Usuário Válido
						echo json_encode(array('USU_EMAIL' => '2' )); 
		}
?>