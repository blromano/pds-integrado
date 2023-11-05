<?php
require_once CLASS_PATH . '/DAO/testes_visao_dao.php';
require_once CLASS_PATH . '/testes_visao.php';


class ControllerVisao {
    public static function get_vis_list($user) {
        $vis_dao = new testes_visao_dao();
        $class = new ReflectionClass('testes_visao');
        $args = $vis_dao->select('FK_USUARIOS_USU_CODIGO = '.$user);
        $tvis = array();
        foreach($args as $arg) {
            $filtered_arg = array();
            foreach($arg as $k => $a) { if(!is_numeric($k)) $filtered_arg[] = $a; }
            $tvis[] = $class->newInstanceArgs($filtered_arg);
        }        
        return $tvis;
    }
}