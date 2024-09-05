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
     $NmeusAlimentos= new MeusAlimentos();
     
     $NmeusAlimentos->setIdMeuAlimento($_POST["id"]);
     
     
	
	$excluir_meu_alimento = new MeuAlimentoDAO(); 
	$excluir_meu_alimento->delete($NmeusAlimentos);
               
			   $emodal=7;
        $_SESSION['emodal']=$emodal;

        header ("location: ?mod=fnutricionais&sub=meu_alimento");
    
       
   //echo "<script>alert('Deletado com sucesso!')</script> <script>window.location='http://localhost:3000/refatoracao-segundo/?mod=fnutricionais&sub=unidade_medida';</script>"; 
    
?>
