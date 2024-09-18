<?php
require_once 'models/Diario_de_Bordo/DAO/ALIMENTOS_DAO.php';


    $obj_can_dao = new ALIMENTOS_DAO();
    $alimentos = $obj_can_dao->select_alimentos_input();

