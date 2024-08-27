<?php
	include_once '../../controle/ConsumidorDAO.php';
	
	#Verifica se tem um email para pesquisa
	if(isset($_POST['CON_CPF']))
		{ 

			#Recebe o Email Postado
				$cpfPostado = $_POST['CON_CPF'];

			#Conecta banco de dados
				
				$ConsumidorDAO = new ConsumidorDAO();
				
				$cpfPostado = str_replace("." , "" , $cpfPostado ); // Primeiro tira os pontos
				$cpfPostado = str_replace("-" , "" , $cpfPostado); // Depois tira o traço
				
				$verificar_cpf = $ConsumidorDAO->verificar_cpf($cpfPostado);
				#Se o retorno for maior do que zero, diz que já existe um.
				if($verificar_cpf>0)
					// Já existe um usuário cadastrado com este CNPJ
						echo json_encode(array('CON_CPF' => '1')); 
			
			else 
				// Usuário Válido
					{
							$cpf = preg_replace('/[^0-9]/', '', (string) $cpfPostado);
							// Valida tamanho
							if (strlen($cpf) != 11){
								echo json_encode(array('CON_CPF' => '2' )); 
								return;
							}
							// Calcula e confere primeiro dígito verificador
							for ($i = 0, $j = 10, $soma = 0; $i < 9; $i++, $j--)
								$soma += $cpf{$i} * $j;
							$resto = $soma % 11;
							if ($cpf{9} != ($resto < 2 ? 0 : 11 - $resto))
							{
								echo json_encode(array('CON_CPF' => '2' )); 
								return;
							}
							// Calcula e confere segundo dígito verificador
							for ($i = 0, $j = 11, $soma = 0; $i < 10; $i++, $j--)
								$soma += $cpf{$i} * $j;
							$resto = $soma % 11;
							if ($cpf{10} == ($resto < 2 ? 0 : 11 - $resto))
							{
								echo json_encode(array('CON_CPF' => '3' )); 		
							}
							else echo json_encode(array('CON_CPF' => '2' )); 
					}
	}
	
	
?>