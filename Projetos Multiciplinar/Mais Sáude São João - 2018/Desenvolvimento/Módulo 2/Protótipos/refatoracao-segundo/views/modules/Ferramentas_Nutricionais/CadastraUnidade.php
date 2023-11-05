<?php

	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "";
	try 
	{
		$conn = new PDO("mysql:host=$servername;dbname=BANCO_MSSJ", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} 
	catch (PDOException $e) 
	{
		echo "Connection failed: " . $e->getMessage();
	}
        // NESSE AQUI SÓ FALTA A PARTE DE CONFERIR NO BANCO PRA NÃO INSERIR DUPLICADO
?>
<?php
    require_once("dao/UnidadeMedidaDAO.php");
    $cadastro_Un_medida = new UnidadeMedidaDAO();

        if (isset($_POST["UMN_NOME"]) && isset($_POST["UMN_ABREVIATURA"]))
        {        
            $UMN_NOME = $_POST["UMN_NOME"];
            $UMN_ABREVIATURA = $_POST["UMN_ABREVIATURA"];

			$select = $conn->prepare("select * from unidades_medidas_nutricionais");
			$select->execute();
			$variavel = $select->fetchAll();
			$controle = 0;
			foreach($variavel as $edita)
			{
				if($edita['UMN_NOME'] == $_POST['UMN_NOME'])
				{
					
					$controle = 1;
					
				}
			}
			if($controle == 0)
			{
				//$stmt = $conn->prepare("INSERT INTO unidades_medidas_nutricionais (UMN_NOME, UMN_ABREVIATURA) VALUES ('".$UMN_NOME."', '".$UMN_ABREVIATURA."');");
				//$stmt->execute();
                                 $cadastro_Un_medida = $cadastro_Un_medida->insert($_POST["UMN_NOME"],$_POST["UMN_ABREVIATURA"]);
				//echo "<script language='javascript' type='text/javascript'>alert('Unidade de medida CADASTRADA com sucesso!');window.location.href='?mod=fnutricionais&sub=unidade_medida';;</script>";    
				        $emodal=1;
						$_SESSION['emodal']=$emodal;
				$nome = "";
				$abreviatura = "";
				$_SESSION['nome'] = $nome;
				$_SESSION['abreviatura'] = $abreviatura;
				header ("location: ?mod=fnutricionais&sub=unidade_medida");
			}
			else
			{
				$_SESSION['nome'] = $_POST['UMN_NOME'];
				$_SESSION['abreviatura'] = $_POST['UMN_ABREVIATURA'];
				$emodal=2;
				$_SESSION['emodal']=$emodal;	
				//echo "<script language='javascript' type='text/javascript'>alert('ESSA UNIDADE JA FOI CADASTRADA!');window.location.href='?mod=fnutricionais&sub=unidade_medida';;</script>";    
				header ("location: ?mod=fnutricionais&sub=unidade_medida");
			}

		}  
        else
        {
            echo "<script language='javascript' type='text/javascript'>alert('Unidade de Medida não CADASTRADA!');window.location.href='?mod=fnutricionais&sub=unidade_medida';;</script>";
        }
		?>