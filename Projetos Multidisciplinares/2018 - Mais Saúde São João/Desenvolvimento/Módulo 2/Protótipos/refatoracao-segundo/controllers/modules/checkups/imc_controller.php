<?php
require_once CLASS_PATH . '/DAO/testes_indice_massa_corporal_dao.php';
require_once CLASS_PATH . '/testes_indice_massa_corporal.php';



class ControllerIMC {
    public static function get_imc_list($user) {
        $date_ini = (array_key_exists("date-ini", $_POST)) ? filter_input(INPUT_POST, "date-ini") : null;
        $date_end = (array_key_exists("date-end", $_POST)) ? filter_input(INPUT_POST, "date-end") : null;
        
        $imc_dao = new testes_indice_massa_corporal_dao();
        $class = new ReflectionClass('testes_indice_massa_corporal');
        $args = $imc_dao->select("FK_USUARIOS_USU_CODIGO = $user".((isset($date_ini) && !empty($date_ini))?" AND IMC_DATA >= $date_ini":"").((isset($date_end) && !empty($date_ini))?" AND IMC_DATA <= $date_end":""));
        $timc = array();
        foreach($args as $arg) {
            
            $filtered_arg = array();
            foreach($arg as $k => $a) { if(!is_numeric($k)) $filtered_arg[] = $a; }
            $timc[] = $class->newInstanceArgs($filtered_arg);
        }        
        return $timc;
    }
}