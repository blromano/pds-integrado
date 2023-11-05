<?php

require_once CLASS_PATH . '/DAO/testes_pressao_arterial_dao.php';
require_once CLASS_PATH . '/testes_pressao_arterial.php';

class ControllerPressaoSanguinea {
    public static function get_psan_list($user) {
        $psan_dao = new testes_pressao_arterial_dao();
        $class = new ReflectionClass('testes_pressao_arterial');
        $args = $psan_dao->select('FK_USUARIOS_USU_CODIGO = '.$user);
        $tpsan = array();
        foreach($args as $arg) {  
            $filtered_arg = array();
            foreach($arg as $k => $a) { if(!is_numeric($k)) $filtered_arg[] = $a; }
            $tpsan[] = $class->newInstanceArgs($filtered_arg);
        }        
        return $tpsan;
    }
}
