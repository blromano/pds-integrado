<?php

include ('classes/DAO/diarios_bordo_dao.php');


if (isset($_POST["escolher_data"]) && ($_POST["escolher_data"] != "")) {
    $escolha_data = $_POST["escolher_data"];
    $usuario = 1;
    $obj_can_dao = new DIARIOS_BORDO_DAO();
    $diarios_bordo = $obj_can_dao->lista_diario_bordo_data($escolha_data, $usuario);
    foreach ($diarios_bordo as $row) {
        $dib_codigo = $row["DIB_CODIGO"];
        $cafe_manha = $obj_can_dao->recuperar_cafe_manha($dib_codigo, $usuario);
        $lanche_manha = $obj_can_dao->recuperar_lanche_manha($dib_codigo, $usuario);
        $almoco = $obj_can_dao->recuperar_almoco($dib_codigo, $usuario);
        $lanche_tarde = $obj_can_dao->recuperar_lanche_tarde($dib_codigo, $usuario);
        $cafe_tarde = $obj_can_dao->recuperar_cafe_tarde($dib_codigo, $usuario);
        $jantar = $obj_can_dao->recuperar_jantar($dib_codigo, $usuario);
        $lanche_noite = $obj_can_dao->recuperar_lanche_noite($dib_codigo, $usuario);
    }
}