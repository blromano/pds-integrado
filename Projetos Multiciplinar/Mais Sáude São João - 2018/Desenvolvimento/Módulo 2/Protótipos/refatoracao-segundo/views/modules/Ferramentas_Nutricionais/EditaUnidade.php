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
     require_once("modelo/UnidadeMedida.php");

     if (isset($_POST["nome"]) && isset($_POST["abreviatura"]))
        {        
            $UMN_NOME = $_POST["nome"];
            $UMN_ABREVIATURA = $_POST["abreviatura"];

			$select = $conn->prepare("select * from unidades_medidas_nutricionais");
			$select->execute();
			$variavel = $select->fetchAll();
			$controle = 0;
			foreach($variavel as $edita)
			{
				if($edita['UMN_NOME'] == $_POST['nome'])
				{
					$controle = 1;
				}
			}
			if($controle == 0)
			{       
				$NunidadesMedidas= new UnidadesMedidas();
				$NunidadesMedidas->setNome($_POST["nome"]);
				$NunidadesMedidas->setAbreviatura($_POST["abreviatura"]);
				$NunidadesMedidas->setidUnidadeMedida($_POST["id"]);
				$editar_un_medida = new UnidadeMedidaDAO(); 
				$editar_un_medida = $editar_un_medida->update($NunidadesMedidas);
				$nomeed = "";
				$abreviaturaed = "";
				$_SESSION['nomeed'] = $nomeed;
				$_SESSION['abreviaturaed'] = $abreviaturaed;
				$emodal=4;
				$_SESSION['emodal']=$emodal;
				header ("location: ?mod=fnutricionais&sub=unidade_medida");
				
				}
			else
			{
				$_SESSION['nomeed'] = $_POST['nome'];
				$_SESSION['abreviaturaed'] = $_POST['abreviatura'];
				$emodal=5;
				$_SESSION['emodal']=$emodal;
				header ("location: ?mod=fnutricionais&sub=unidade_medida");
}

		}  
        else
        {
			header ("location: ?mod=fnutricionais&sub=unidade_medida");
            }
     

    
       
     
       ?>
