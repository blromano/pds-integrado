<?php

include "./classes/DAO/usuarios_treinamentos_prontos_dao.php";
include "./classes/usuarios_treinamentos_prontos.php";

$obj_utp = new usuarios_treinamentos_prontos();

$obj_utp ->setfk_usuarios_usu_codigo(1);

$obj_utp_d = new usuarios_treinamentos_prontos_dao();

$lista = $obj_utp_d -> listar($obj_utp);

header("location:http://localhost:3000/Refatorado/?mod=rtreinos&sub=historico_programas#");