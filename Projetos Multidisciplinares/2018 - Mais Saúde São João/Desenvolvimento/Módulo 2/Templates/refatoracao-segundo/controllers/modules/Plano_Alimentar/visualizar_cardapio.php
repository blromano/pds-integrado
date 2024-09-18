<?php


include('classes/DAO/cardapio_alimentar_nutricionistaDAO.php'); 

$obj_can_dao = new CARDAPIO_ALIMENTAR_NUTRICIONISTA_DAO();
$cardapio = $obj_can_dao->listarTodos();
