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
     $NunidadesMedidas= new UnidadesMedidas();
     
     $NunidadesMedidas->setIdUnidadeMedida($_POST["id"]);
     
     
	
	$editar_un_medida = new UnidadeMedidaDAO(); 
	$editar_un_medida->delete($NunidadesMedidas);
               
			   $emodal=7;
        $_SESSION['emodal']=$emodal;

        header ("location: ?mod=fnutricionais&sub=unidade_medida");
    
       
   //echo "<script>alert('Deletado com sucesso!')</script> <script>window.location='http://localhost:3000/refatoracao-segundo/?mod=fnutricionais&sub=unidade_medida';</script>"; 
    
?>
