<?php

session_start();
require_once "./classes/usuarios_treinamentos_prontos.php";
require_once "./controllers/modules/Resultado_dos_treinos/controle_verificar_existencia.php";
require_once "./classes/DAO/usuarios_treinamentos_prontos_dao.php";  
        
$usuarios_treinamentos_prontos_dao = new usuarios_treinamentos_prontos_dao();
$vinculo = $usuarios_treinamentos_prontos_dao->verificarExistenciaVinculo(1, $resultado[$i]["PTP_CODIGO"]);

$obj_usuario_programa = new usuarios_treinamentos_prontos();
$obj_usuario_programa->setptp_codigo($resultado[$i]["PTP_CODIGO"]);
$obj_usuario_programa->setfk_usuarios_usu_codigo($obj_usuario->getUSU_CODIGO());

$obj_usuario_programa_dao = new usuarios_treinamentos_prontos_dao();

if (count(selecionar($vinculo)) > 0) {
    $obj_usuario_programa_dao->excluir_usuarios_treinamentos_prontos($obj_usuario_programa);
    $_SESSION["VINCULO"] = TRUE;
} else {
    $obj_usuario_programa_dao->inserir_usuarios_treinamentos_prontos($obj_usuario_programa);
    $_SESSION["VINCULO"] = FALSE;
}

header("location:?mod=rtreinos&sub=visualizar_programa_pronto");