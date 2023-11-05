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
    require_once("dao/MeuAlimentoDAO.php");
    $cadastro_Meu_alimento = new MeuAlimentoDAO();

        if (isset($_POST["MEU_NOME"]))
        {        
            $MEU_NOME = $_POST["MEU_NOME"];

			$select = $conn->prepare("select * from meus_alimentos");
			$select->execute();
			$variavel = $select->fetchAll();
			$controle = 0;
			foreach($variavel as $edita)
			{
				if($edita['MEU_NOME'] == $_POST['MEU_NOME'])
				{
					
					$controle = 1;
					
				}
			}
			if($controle == 0)
			{
				//$stmt = $conn->prepare("INSERT INTO unidades_medidas_nutricionais (UMN_NOME, UMN_ABREVIATURA) VALUES ('".$UMN_NOME."', '".$UMN_ABREVIATURA."');");
				//$stmt->execute();
                                 $cadastro_Meu_alimento = $cadastro_Meu_alimento->insert($_POST["MEU_NOME"],$_POST["MEU_PROTEINAS"],$_POST["MEU_CALORIAS"],$_POST["MEU_PORCAO"],$_POST["MEU_SODIO"],$_POST["MEU_GORDURA_TRANS"],$_POST["MEU_GORDURA_TOTAL"],$_POST["MEU_CARBOIDRATOS"],$_POST["MEU_FIBRAS"],$_POST["MEU_GORDURA_SATURADA"],1,$_POST["UNIDADE_MEDIDA"],$_POST["TIPO_ALIMENTO"]);
				//echo "<script language='javascript' type='text/javascript'>alert('Unidade de medida CADASTRADA com sucesso!');window.location.href='?mod=fnutricionais&sub=unidade_medida';;</script>";    
				$emodal=1;
				$_SESSION['emodal']=$emodal;
				header ("location: ?mod=fnutricionais&sub=meu_alimento");
			}
			else
			{
				$_SESSION['nome'] = $_POST['MEU_NOME'];
				$_SESSION['proteinas'] = $_POST['MEU_PROTEINAS'];
                                $_SESSION['calorias'] = $_POST['MEU_CALORIAS'];
				$_SESSION['porcao'] = $_POST['MEU_PORCAO'];
                                $_SESSION['sodio'] = $_POST['MEU_SODIO'];
				$_SESSION['gordura_trans'] = $_POST['MEU_GORDURA_TRANS'];
                                $_SESSION['gordura_total'] = $_POST['MEU_GORDURA_TOTAL'];
				$_SESSION['carboidratos'] = $_POST['MEU_CARBOIDRATOS'];
                                $_SESSION['fibras'] = $_POST['MEU_FIBRAS'];
				$_SESSION['gordura_saturada'] = $_POST['MEU_GORDURA_SATURADA'];
				$_SESSION['unidade_medida'] = $_POST['FK_UNIDADES_MEDIDAS_NUTRICIONAIS_UMN_CODIGO'];
				$_SESSION['tipo_alimento'] = $_POST['FK_TIPOS_ALIMENTOS_TPA_CODIGO'];
				$emodal=2;
				$_SESSION['emodal']=$emodal;	
				//echo "<script language='javascript' type='text/javascript'>alert('ESSA UNIDADE JA FOI CADASTRADA!');window.location.href='?mod=fnutricionais&sub=unidade_medida';;</script>";    
				header ("location: ?mod=fnutricionais&sub=meu_alimento");
			}

		}  
        else
        {
            header ("location: ?mod=fnutricionais&sub=meu_alimento");
            }
		?>