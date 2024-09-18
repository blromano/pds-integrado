<?php

include "../../../classes/DAO/exercicios_fisicos_DAO.php";
include "../../../classes/exercicios_fisicos.php";

$codigo = $_POST["txt_c_exercicio"];
$obj_ef = new exercicios_fisicos();
$obj_ef ->setexf_codigo($codigo);


$obj_ef_dao = new exercicios_fisicos_dao();
$obj_ef_dao ->excluir($obj_ef);

try {
         echo "<script> alert('Excluido com sucesso');</script>";
    } 
    catch (Exception $e) {
         echo 'Erro ao excluir:', $e->getMessage(), "\n";
    }

    header("location:../../../index.php?mod=fesportivas&sub=view_ef");
