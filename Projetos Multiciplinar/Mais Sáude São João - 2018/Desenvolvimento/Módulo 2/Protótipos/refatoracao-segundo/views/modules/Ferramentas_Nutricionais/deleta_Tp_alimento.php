<?php
session_start();
  
   
   require_once("dao/TiposAlimentosDAO.php");
     require_once("modelo/TiposAlimentos.php");
     $NtiposAlimentos= new TiposAlimentos();
     $NtiposAlimentos->setidTipoAlimento($_POST["id"]);
     
	
	$editar_Tp_alimento = new TiposAlimentosDAO(); 
	$editar_Tp_alimento = $editar_Tp_alimento->delete($NtiposAlimentos);
        
        $emodal=7;
        $_SESSION['emodal']=$emodal;

        header("location:?mod=fnutricionais&sub=tipo_alimento");
       ?>
