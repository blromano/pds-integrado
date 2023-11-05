<?php

//require_once '../../../classes/DAO/alimentos_dao.php'; 
include('classes/DAO/alimentos_dao.php'); 

$obj_ali_dao = new alimentos_dao();
$alimentos = $obj_ali_dao->select_alimentos();


