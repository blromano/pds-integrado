<?php
$USU_CODIGO = 2;
include './classes/DAO/fichas_treinamento_dao.php';
$obj_ft_dao = new fichas_treinamento_dao;
$resultado = $obj_ft_dao->selecionar($USU_CODIGO);
?>