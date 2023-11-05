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
     require_once("modelo/MeuAlimento.php");

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
				$NmeusAlimentos = new MeusAlimentos();
				$NmeusAlimentos->setNome($_POST["MEU_NOME"]);
				$NmeusAlimentos->setProteinas($_POST["MEU_PROTEINAS"]);
				$NmeusAlimentos->setCalorias($_POST["MEU_CALORIAS"]);
				$NmeusAlimentos->setPorcao($_POST["MEU_PORCAO"]);
				$NmeusAlimentos->setSodio($_POST["MEU_SODIO"]);
				$NmeusAlimentos->setGordura_trans($_POST["MEU_GORDURA_TRANS"]);
				$NmeusAlimentos->setGordura_total($_POST["MEU_GORDURA_TOTAL"]);
				$NmeusAlimentos->setCarboidratos($_POST["MEU_CARBOIDRATOS"]);
				$NmeusAlimentos->setFibras($_POST["MEU_FIBRAS"]);
				$NmeusAlimentos->setGordura_saturada($_POST["MEU_GORDURA_SATURADA"]);
				$NmeusAlimentos->setUnidade_medida($_POST["UNIDADE_MEDIDA"]);
				$NmeusAlimentos->setTipo_alimento($_POST["TIPO_ALIMENTO"]);
                                $NmeusAlimentos->setIdMeuAlimento($_POST["id"]);
				$editar_meu_alimento = new MeuAlimentoDAO(); 
				$editar_meu_alimento = $editar_meu_alimento->update($NmeusAlimentos);
				$emodal=4;
				$_SESSION['emodal']=$emodal;
				header ("location: ?mod=fnutricionais&sub=meu_alimento");
				
				}
			else
			{
				$_SESSION['nomeed'] = $_POST['MEU_NOME'];
				$_SESSION['proteinased'] = $_POST['MEU_PROTEINAS'];
                                $_SESSION['caloriased'] = $_POST['MEU_CALORIAS'];
				$_SESSION['porcaoed'] = $_POST['MEU_PORCAO'];
                                $_SESSION['sodioed'] = $_POST['MEU_SODIO'];
				$_SESSION['gordura_transed'] = $_POST['MEU_GORDURA_TRANS'];
                                $_SESSION['gordura_totaled'] = $_POST['MEU_GORDURA_TOTAL'];
				$_SESSION['carboidratosed'] = $_POST['MEU_CARBOIDRATOS'];
                                $_SESSION['fibrased'] = $_POST['MEU_FIBRAS'];
				$_SESSION['gordura_saturadaed'] = $_POST['MEU_GORDURA_SATURADA'];
                                $_SESSION['unidade_medidaed'] = $_POST['UNIDADE_MEDIDA'];
				$_SESSION['tipo_alimentoed'] = $_POST['TIPO_ALIMENTO'];
				$emodal=5;
				$_SESSION['emodal']=$emodal;
				header ("location: ?mod=fnutricionais&sub=meu_alimento");
}

		}  
        else
        {
			header ("location: ?mod=fnutricionais&sub=meu_alimento");
            }
     

    
       
     
       ?>
