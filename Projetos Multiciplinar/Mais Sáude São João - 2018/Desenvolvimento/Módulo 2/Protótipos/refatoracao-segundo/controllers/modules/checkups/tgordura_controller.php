<?php

require_once CLASS_PATH . '/DAO/testes_taxa_gordura_dao.php';
require_once CLASS_PATH . '/testes_taxa_gordura.php';

class ControllerTGordura {
    public static function get_tgo_list($user) {
        $tgo_dao = new testes_taxa_gordura_dao();
        $class = new ReflectionClass('testes_taxa_gordura');
        $args = $tgo_dao->select('FK_USUARIOS_USU_CODIGO = '.$user);
        $timc = array();
        foreach($args as $arg) {
            $filtered_arg = array();
            foreach($arg as $k => $a) { if(!is_numeric($k)) $filtered_arg[] = $a; }
            $timc[] = $class->newInstanceArgs($filtered_arg);
        }        
        return $timc;
    }
}
