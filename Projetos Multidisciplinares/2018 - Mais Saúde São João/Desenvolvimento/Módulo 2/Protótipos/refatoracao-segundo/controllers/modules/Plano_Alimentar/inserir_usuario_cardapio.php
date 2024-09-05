<?php

include('classes/DAO/usuariosDAO.php'); 

$obj_usu_dao = new usuariosDAO();
$usuario = $obj_usu_dao->listarTodos();










