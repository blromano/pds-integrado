<?php

require_once CLASS_PATH . '/DAO/testes_saturacao_oxigenio_dao.php';
require_once CLASS_PATH . '/testes_saturacao_oxigenio.php';

class ControllerOximetria {
    public static function get_oxi_list($user) {
        $oxi_dao = new testes_saturacao_oxigenio_dao();
        $class = new ReflectionClass('testes_saturacao_oxigenio');
        $args = $oxi_dao->select('FK_USUARIOS_USU_CODIGO = '.$user);
        $timc = array();
        foreach($args as $arg) {
            $filtered_arg = array();
            foreach($arg as $k => $a) { if(!is_numeric($k)) $filtered_arg[] = $a; }
            $timc[] = $class->newInstanceArgs($filtered_arg);
        }        
        return $timc;
    }
}
