<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "reclame_sao_joao";
	
	#Verifica se tem um email para pesquisa
	if(isset($_POST['CON_CPF']))
	{ 

		#Recebe o Email Postado
			$cpfPostado = $_POST['CON_CPF'];

		#Conecta banco de dados
			$con = mysqli_connect($servidor, $usuario, $senha, $dbname);
			$sql = mysqli_query($con, "SELECT * FROM consumidores WHERE CON_CPF = '{$cpfPostado}'") or print mysql_error();

		#Se o retorno for maior do que zero, diz que já existe um.
			if(mysqli_num_rows($sql)>0)
				// Já existe um usuário cadastrado com este CNPJ
					{
						echo json_encode(array('CON_CPF' => '1'));
					}
					
			else if ($cpfPostado == "00000000000" || 
					 $cpfPostado == "11111111111" || 
					 $cpfPostado == "22222222222" || 
					 $cpfPostado == "33333333333" || 
					 $cpfPostado == "44444444444" || 
					 $cpfPostado == "55555555555" || 
					 $cpfPostado == "66666666666" || 
					 $cpfPostado == "77777777777" || 
					 $cpfPostado == "88888888888" || 
					 $cpfPostado == "99999999999" || 
					 $cpfPostado == "")
				{
					echo json_encode(array('CON_CPF' => '2' ));
				}
			
			else 
				// Usuário Válido
					{
						echo json_encode(array('CON_CPF' => '3' )); 
					}
	}
	
	
?>