<?php

    require_once "classes/DAO/exercicios_fisicos_DAO.php";
    
    $obj_ef_dao = new exercicios_fisicos_DAO();
    $todos = $obj_ef_dao -> listarTodos();
