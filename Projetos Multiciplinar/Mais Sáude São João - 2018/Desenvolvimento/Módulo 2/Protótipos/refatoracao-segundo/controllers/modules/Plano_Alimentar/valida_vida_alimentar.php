<?php

session_start();
$calorias = $_POST['calorias_diarias'];
$carboidratos = $_POST['indice_carboidratos'];
$gordura = $_POST['indice_gordura'];
$nutrientes = $_POST['indice_nutrientes'];
$proteinas = $_POST['indice_proteinas'];
$vitaminas = $_POST['indice_vitaminas'];
$metas = $_POST['metas'];

require_once '../../../classes/DAO/vida_alimentarDAO.php';
require_once '../../../classes/DAO/vida_alimentar.php';



$obj_val = new VIDA_ALIMENTAR(); 
$obj_val ->setVAL_INDICE_CALORIAS($calorias);
$obj_val ->setVAL_INDICE_CARBOIDRATOS($carboidratos);
$obj_val ->setVAL_INDICE_GORDURA($gordura);
$obj_val ->setVAL_INDICE_NUTRIENTES($nutrientes);
$obj_val ->setVAL_INDICE_PROTEINAS($proteinas);
$obj_val ->setVAL_INDICE_VITAMINAS($vitaminas);
$obj_val ->setVAL_META($metas);
$obj_val ->setFK_USUARIOS_USU_CODIGO($_SESSION["CARDAPIO_USUARIO_ID"]);

$obj_val_dao = new VIDA_ALIMENTAR_DAO();
$obj_val_dao ->Insert($obj_val);


header("location:../../../?mod=palimentar&sub=visualizar_vida_alimentar");




