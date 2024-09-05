<?php

	include '../../modelo/Usuario.php';

	include '../../controle/UsuarioDAO.php';		
			
			$usuario= new Usuario();
			$usuarioDAO = new UsuarioDAO();

			$usuario->setUSU_NOME($_POST['USU_NOME']);
			$usuario->setUSU_TELEFONE($_POST['USU_TELEFONE']);
			$usuario->setUSU_ID($_POST['USU_ID']);
			
			
			$usuarioDAO->editarInformacoesPessoais($usuario);
	
	include '../../modelo/Consumidor.php';
    include '../../controle/ConsumidorDAO.php';

	// Criando um Novo Consumidor
        $consumidor = new Consumidor();

        $consumidorDAO = new ConsumidorDAO();

		// EDITANDO DATA DE NASCIMENTO
		

		
																				
		//Data da Reclamação
		// $dataNasc = date('Y-m-d', strtotime($_POST['CON_DATA_NASCIMENTO']));
		

		 $valor = $_POST['CON_DATA_NASCIMENTO'];
		 // $valor = str_ireplace("/", "-", $valor);
		 // echo $valor;
			// $splitTimeStamp = explode(" ",$valor);
		 $dataNasc = date("Y-m-d", strtotime($valor) );


		 // $dia = substr($valor, 0, 2);
		 // $mes = substr($valor, 3, 2);
		 // $ano = substr($valor, 6, 4);

		 // // echo "dia: $dia";
		 // // echo "mes: $mes";
		 // // echo "ano: $ano";
		 // // $dataNova =  new DateTime($mes.'-'.$dia.'-'.$ano);

		 // $ts = strtotime($mes . ' ' . $dia . ',' . $ano);

		 // // $dataNova = date_create($dataNova);

		 
		 // // echo "<br>";
		 // // // echo date_format($dataNova, 'Y-m-d');

		 // var_dump($ts);



															
			//Data da Reclamação
				// $data = date('Y-m-d',strtotime($splitTimeStamp[0]));

		 // echo $data;

		//exit();
																		

	// Inserindo os dados do Consumidor no "SETs" em modelo	
        //$consumidor->setCON_CPF($_POST['CON_CPF']);
        $consumidor->setCON_DATA_NASCIMENTO($dataNasc);
        $consumidor->setCON_CPF($_POST['CON_CPF']);
		$consumidor->setCON_TELEFONE2($_POST['CON_TELEFONE2']);
		$consumidor->setCON_ID($_POST['CON_ID']);
        
		$consumidorDAO->editarInformacoesPessoais($consumidor);
			
			header("location:../../usu_perfil.php"); 
?>
