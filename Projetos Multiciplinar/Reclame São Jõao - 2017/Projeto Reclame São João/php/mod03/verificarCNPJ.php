<?php
	include_once '../../controle/EstabelecimentosDAO.php';
	
	#Verifica se tem um email para pesquisa
		if(isset($_POST['EST_CNPJ']))
		{ 

			#Recebe o Email Postado
				$cnpjPostado = somente_numeros($_POST['EST_CNPJ']);

			#Conecta banco de dados
				
				$EstabelecimentosDAO = new EstabelecimentosDAO();
				
				$verificar_cnpj = $EstabelecimentosDAO->verificar_cnpj($cnpjPostado);
				
				
			#Se o retorno for maior do que zero, diz que já existe um.
				if($verificar_cnpj>0)
					// Já existe um usuário cadastrado com este CNPJ
						echo json_encode(array('EST_CNPJ' => '1')); 
						
				else if ($cnpjPostado == "00000000000000" || 
						 $cnpjPostado == "11111111111111" || 
						 $cnpjPostado == "22222222222222" || 
						 $cnpjPostado == "33333333333333" || 
						 $cnpjPostado == "44444444444444" || 
						 $cnpjPostado == "55555555555555" || 
						 $cnpjPostado == "66666666666666" || 
						 $cnpjPostado == "77777777777777" || 
						 $cnpjPostado == "88888888888888" || 
						 $cnpjPostado == "99999999999999" || 
						 $cnpjPostado == "")
					{
						echo json_encode(array('EST_CNPJ' => '2' ));
					}
				
				else 
					// Usuário Válido
						{
							echo json_encode(array('EST_CNPJ' => '3' )); 
						}
		}
	
	// Função para deixar somente números
		function somente_numeros($str) 
			{
				return preg_replace("/[^0-9]/", "", $str);
			}
?>