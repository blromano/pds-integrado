<?php  
    require_once '../../../classes/DAO/programa_de_treinamentoDAO.php';
    require_once '../../../classes/programa_de_treinamento.php';

   $obj_pt= new Programas_de_treinamento();

   $obj_pt->setPtg_nome($_POST["pt_nome"]);
   $obj_pt->setPtg_dificuldade($_POST["pt_dificuldade"]);

   $obj_pt_DAO= new Programas_de_treinamentoDAO();
   $resultado=$obj_pt_DAO->inserir($obj_pt);

   if ($resultado=="ok"){
   		echo "<script> alert('Inserido com sucesso')</script>";
   }else{
   	echo "<script> alert('Erro ao inserir')</script>";
   }

   header("location:?mod=fesportiva&sub=programa_treinamento");



?>
