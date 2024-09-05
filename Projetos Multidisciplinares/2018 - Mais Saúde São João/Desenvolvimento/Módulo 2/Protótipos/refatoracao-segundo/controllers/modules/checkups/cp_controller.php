<?php
require_once CLASS_PATH . '/DAO/testes_capacidade_pulmonar_dao.php';
require_once CLASS_PATH . '/testes_capacidade_pulmonar.php';


class ControllerCP {
    public static function get_cp_list($user) {
        $cp_dao = new testes_capacidade_pulmonar_dao();
        $class = new ReflectionClass('testes_capacidade_pulmonar');
        $args = $cp_dao->select('FK_USUARIOS_USU_CODIGO = '.$user);
        $tcp = array();
        foreach($args as $arg) {
            $filtered_arg = array();
            foreach($arg as $k => $a) { if(!is_numeric($k)) $filtered_arg[] = $a; }
            $tcp[] = $class->newInstanceArgs($filtered_arg);
        }        
        return $tcp;
    }
}